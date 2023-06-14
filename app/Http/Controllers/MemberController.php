<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
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
        $user = User::findOrFail(Auth::user()->id);
        $user->profile()->updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'address' => $request->address,
                'phone' => $request->phone,
            ]
        );

        $userTransaction = Auth::user()->id;

        $transaction = new Transaction;
        $transaction->invoice_id = $request->invoice_id;
        $transaction->price = $request->price;
        $transaction->room_id = $request->room_id;
        $transaction->invoice_id = $request->invoice_id;
        $transaction->address = $request->address;
        $transaction->phone = $request->phone;
        $transaction->payment_method = $request->payment_method;
        $transaction->classtype_id = $request->classtype_id;
        $transaction->status = $request->status;
        $transaction->user_id = $userTransaction;
        $transaction->save();

        return redirect()->route('member.market')
        ->with('status','profile-updated-successfully');

    }
}
