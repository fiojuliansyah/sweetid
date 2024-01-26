<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $CountUnpaid = Transaction::where('status', 0)->count();
        $CountPaid = Transaction::where('status', 1)->count();
        $CountAll = Transaction::all()->count();

        $Transaction = Transaction::take(5)->get();

        $User = User::all()->count();

        return view('admin.dashboard', compact('CountUnpaid','CountPaid','CountAll','User','Transaction'));
    }
}
