<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with([
            'event.category',
            'review'
        ])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('tickets.index', compact('transactions'));
    }
}