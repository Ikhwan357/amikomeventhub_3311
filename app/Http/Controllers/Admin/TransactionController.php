<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Daftar seluruh transaksi
     */
    public function index(Request $request)
    {
        $transactions = Transaction::with([
            'event',
            'user',
        ])

            ->when($request->search, function ($query, $search) {

                $query->where(function ($q) use ($search) {

                    $q->where('order_id', 'LIKE', "%{$search}%")
                        ->orWhere('customer_name', 'LIKE', "%{$search}%")
                        ->orWhere('customer_email', 'LIKE', "%{$search}%")
                        ->orWhere('customer_phone', 'LIKE', "%{$search}%")
                        ->orWhereHas('event', function ($event) use ($search) {
                            $event->where('title', 'LIKE', "%{$search}%");
                        });

                });

            })

            ->latest()

            ->paginate(10)

            ->withQueryString();

        return view('admin.transactions', compact('transactions'));
    }

    /**
     * Detail Ticket
     */
    public function ticket($id)
    {
        $transaction = Transaction::with([
            'event.category',
            'event.organization',
            'review',
            'user',
        ])
            ->findOrFail($id);

        return view('ticket', compact('transaction'));
    }
}