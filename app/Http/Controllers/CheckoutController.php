<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Event $event)
    {
        return view('checkout', compact('event'));
    }

    public function process(Request $request, Event $event)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
        ]);

        $serviceFee = 5000;

        $transaction = Transaction::create([
            'event_id' => $event->id,
            'order_id' => 'TRX-' . strtoupper(uniqid()),
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'total_price' => $event->price + $serviceFee,
            'status' => 'success',
            'snap_token' => null,
        ]);

        return redirect()->route('ticket', $transaction->id);
    }
}