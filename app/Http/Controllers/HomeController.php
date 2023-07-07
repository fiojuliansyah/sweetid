<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Category;
use App\Models\Classtype;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $classtype = Classtype::all();
        $rooms = Room::paginate(15);
        return view('home',compact('classtype','category', 'rooms'));
    }

    public function productList()
    {
        $allCategory = Category::all();
        $rooms = Room::paginate(15);
        return view('mobile.products.product-list',compact('rooms','allCategory'));
    }

    public function productShow(Room $room)
    {
        return view('mobile.products.show',compact('room'));
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
        // dd($request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if ($hashed == $request->signature_key) {
            // dd($request->all());
            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                $transaction = Transaction::where('invoice_id',$request->order_id)->first();
                $transaction->update([
                    'status' => '1'
                ]);
                
            }
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
}