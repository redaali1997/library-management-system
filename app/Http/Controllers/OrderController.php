<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Book $book)
    {
        $book->orders()->create([
            'user_id' => auth()->user()->id,
            'status' => 'borrow'
        ]);

        return redirect()->back();
    }

    public function cancel(Book $book)
    {
        $book->orders()->where('user_id', auth()->user()->id)->delete();
        return redirect()->back();
    }

    public function accept(Order $order)
    {
        $order->confirmed = true;
        $order->save();
        return redirect()->back();
    }

    public function refuse(Order $order)
    {
        $order->delete();
        return redirect()->back();
    }

    public function reverse(Book $book)
    {
        $book->orders()->create([
            'user_id' => auth()->user()->id,
            'status' => 'reverse'
        ]);

        return redirect()->back();
    }

    public function confirm(Order $order)
    {
        foreach ($order->user->orders as $o) {
            if ($o->book_id == $order->book_id) {
                $o->delete();
            }
        }
        return redirect()->back();
    }
}
