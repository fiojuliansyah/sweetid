<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Competition;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function dashboard()
    {
        $rooms = Room::paginate(4);

        return view ('member.dashboard',compact('rooms'));
    }

    public function myClass()
    {
        return view ('member.myclass');
    }

    public function classMarket()
    {
        return view ('member.markets.market');
    }

    public function detail(Room $room)
    {
        return view('member.markets.detail',compact('room'));
    }

    public function checkout(Room $room)
    {
        $user = Auth::user();
        return view ('member.markets.checkout',compact('room', 'user'));
    }

    public function storeCheckout(Request $request)
    {
        $userTransaction = Auth::user()->id;

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
        return view ('member.markets.invoice-detail', compact ('snapToken', 'transaction'));

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
        return view ('member.markets.invoice-done', compact ('transaction'));
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
