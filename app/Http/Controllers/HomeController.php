<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Image;
use App\Models\Category;
use App\Models\Classtype;
use App\Models\Discussion;
use App\Models\Competition;

use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DiscussionDetail;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $classtype = Classtype::all();
        $rooms = Room::with('images')->paginate(15);
        return view('home',compact('classtype','category', 'rooms'));
    }

    public function install()
    {
        return view('install');
    }

    public function myclass()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();
    
            // Fetch the user's competitions (rooms)
            $myClass = Competition::where('user_id', $user->id)->get();
    
            // Pass the data to the view
            return view('mobile.my-class.index', compact('myClass'));
        } else {
            // Redirect or handle the case where the user is not authenticated
            return redirect()->route('login');
        }
    }

    public function classShow(Room $room)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();
            $isJoin = $user->competition->contains($room->id);
        } else {
            // If user is not authenticated, set $isJoin to false
            $isJoin = false;
        }
    
        $room['is_joined'] = $isJoin;
    
        $courses = $room->courses;
    
        return view('mobile.my-class.show', compact('room', 'courses'));
    }

    public function productList()
    {
        $allCategory = Category::all();
        $rooms = Room::paginate(15);
        return view('mobile.products.product-list',compact('rooms','allCategory'));
    }

    public function productShow(Room $room)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $isJoin = $user->competition->contains($room->id);
        } else {
            $isJoin = false;
        }

        $imageRoom = Image::where('room_id',$room->id)->get();
    
        $room['is_joined'] = $isJoin;
    
        $courses = $room->courses;
    
        return view('mobile.products.show', compact('room', 'courses', 'imageRoom'));
    }

    public function productByCat($slug)
    {
        $allCategory = Category::all();
        $categories = Category::where('slug', $slug)->first();
        $rooms = Room::where('category_id', $categories->id)->paginate(10);
        return view('mobile.products.category',compact('rooms','categories','allCategory'));
    }

    public function checkout(Room $room)
    {
        $user = Auth::user();
        return view ('mobile.transactions.checkout',compact('room', 'user'));
    }

    public function storeCheckout(Request $request)
    {
        $userTransaction = Auth::user()->id;
        $rooms = Room::All();

        $transaction = new Transaction;

        $lastTransaction = Transaction::orderBy('id', 'desc')->first();
        $lastTransactionId = $lastTransaction ? $lastTransaction->id : 0;
        $invoiceId = 'INV-' . date('dmY') . (str_pad((int)$lastTransactionId + 1, 4, '0', STR_PAD_LEFT));

        $transaction->invoice_id = $invoiceId;
        $transaction->price = $request->price;
        $transaction->room_id = $request->room_id;
        $transaction->address = $request->address;
        $transaction->phone = $request->phone;
        $transaction->payment_method = $request->payment_method;
        $transaction->classtype_id = $request->classtype_id;
        $transaction->status = $request->status;
        $transaction->user_id = $userTransaction;
        $transaction->save();

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $invoiceId,
                'gross_amount' => $transaction->price,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'phone' => $request->phone,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view ('mobile.transactions.invoice-detail', compact ('snapToken', 'transaction', 'rooms'));

    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
    
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                $transaction = Transaction::where('invoice_id', $request->order_id)->first();
                if ($transaction) {
                    $transaction->update([
                        'status' => '1'
                    ]);
    
                    if ($transaction->status == '1') {
                        $competition = new Competition;
                        $competition->user_id = Auth::id();
                        $competition->room_id = $transaction->room_id;
                        $competition->save();
    
                        // Kirim notifikasi bahwa pembayaran berhasil
                        User::find(Auth::id())->notify(new SuccessPaid($request->order_id));
                    }
                } else {
                    // Jika tidak ditemukan transaksi yang sesuai
                    User::find(Auth::id())->notify(new FailedPaid($request->order_id));
                }
            } else {
                // Jika status transaksi bukan 'capture' atau 'settlement'
                User::find(Auth::id())->notify(new FailedPaid($request->order_id));
            }
        } else {
            // Jika penandatanganan tidak cocok
            User::find(Auth::id())->notify(new FailedPaid($request->order_id));
        }
    }    

    public function invoiceDone($id)
    {
        $transaction = Transaction::find($id);
        return view ('mobile.transactions.invoice-done', compact ('transaction'));
    }
    
    public function myOrder()
    {
        $user = Auth::user();

        if ($user) {
            $invoices = $user->transaction;
            // Tampilkan daftar invoice yang dimiliki oleh user
            return view('member.markets.invoice-list', compact('invoices'));
        } else {
        }
    }

    /**
     * Display the discussion room for a given discussion ID.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function discussion($id)
    {
      $discussion = Discussion::find($id);
      $room = Room::find($discussion->room_id);

      return view ('mobile.products.discussion_room', compact ('discussion', 'room'));
    }

    public function discussionPart($id)
    {
      $discussion = Discussion::find($id);
      $room = Room::find($discussion->room_id);

      return view ('mobile.products.discussion_room_part', compact ('discussion', 'room'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDiscussion(Request $request)
    {
      // Validate the request data
      $request->validate([
        'discussion_id' => 'required',                        
        'body' => 'required',
      ]);                        
      
      // Create a new DiscussionDetail instance
      $discussion = new DiscussionDetail;
      $discussion->discussion_id = $request->discussion_id;
      $discussion->user_id = Auth::user()->id;
      $discussion->body = $request->body;

      // Check if there is an attachment file in the request
      if ($request->hasFile('attachment')) {
        $file = $request->file('attachment');
        $filename = Str::random(9).'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/discussion', $filename);
        $discussion->attachment = $filename;
      }

      // Save the DiscussionDetail instance to the database
      $discussion->save();        

      // Redirect to the discussions room with a success message
      return redirect()->route('product.discussion',$request->discussion_id)
              ->with('success','Chat created successfully.');
    }

    public function createDiscussion($id)
    {
      $room = Room::find($id);
      return view ('mobile.products.discussion_create', compact ('room'));
    }

    public function storeDiscussionRoom(Request $request)
    {
      // Validate the request data
      $request->validate([
        'room_id' => 'required',            
        'title' => 'required',
        'body' => 'required',
      ]);                        
      
      $discussion = new Discussion;
      $discussion->room_id = $request->room_id;
      $discussion->user_id = Auth::user()->id;
      $discussion->title = $request->title;
      $discussion->body = $request->body;        
      $discussion->save();      

      // Redirect to the discussions room with a success message
      return redirect()->route('product.show',$request->room_id)
              ->with('success','Chat created successfully.');
    }

}