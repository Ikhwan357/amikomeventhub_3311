<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function show(Event $event)
    {
        $event->load(['category', 'organization']);

        return view('event-detail', compact('event'));
    }

    public function checkout(Event $event)
    {
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        return view('checkout', compact('event'));
    }

    public function processCheckout(Request $request, Event $event)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
        ]);

        $serviceFee = 5000;

        $transaction = Transaction::create([

            'user_id' => Auth::id(),

            'event_id' => $event->id,

            'order_id' => 'INV-' . time(),

            'customer_name' => $request->customer_name,

            'customer_email' => $request->customer_email,

            'customer_phone' => $request->customer_phone,

            'total_price' => $event->price + $serviceFee,

            'status' => 'paid',

            'snap_token' => null,

        ]);

        return redirect()->route('ticket', $transaction->id);
    }
}