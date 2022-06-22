<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\App;

class UserController extends Controller
{

    public function dashboard()
    {
        if (session()->has('locale')) {
            App::setLocale(session()->get('locale'));
        };
        return view('user.dashboard')->with('orders', auth()->user()->orders()->confirmed()->get());
    }

    public function adminPanel()
    {
        return view('user.admin-panel')->with('orders', Order::notConfirmed()->get());
    }

    public function changeLang($locale = 'en')
    {
        return redirect()->back()->with('locale', $locale);
    }
}
