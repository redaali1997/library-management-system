<?php

namespace App\Http\Controllers;

use App\Models\Order;


class UserController extends Controller
{

    public function dashboard()
    {
        return view('user.dashboard')->with('orders', auth()->user()->orders()->confirmed()->get());
    }

    public function adminPanel()
    {
        return view('user.admin-panel')->with('orders', Order::notConfirmed()->get());
    }
}
