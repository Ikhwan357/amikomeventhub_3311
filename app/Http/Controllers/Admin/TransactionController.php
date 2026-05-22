<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $transactions = Transaction::with('event')

            ->when($request->search, function ($query, $search) {

                $query->where(function ($q) use ($search) {

                    $q->where('order_id', 'LIKE', '%' . $search . '%')

                        ->orWhere('customer_name', 'LIKE', '%' . $search . '%')

                        ->orWhere('customer_email', 'LIKE', '%' . $search . '%')

                        ->orWhere('customer_phone', 'LIKE', '%' . $search . '%')

                        ->orWhereHas('event', function ($eventQuery) use ($search) {

                            $eventQuery->where('title', 'LIKE', '%' . $search . '%');

                        });

                });

            })

            ->latest()

            ->paginate(10)

            ->withQueryString();

        return view('admin.transactions', compact('transactions'));
    }

    public function ticket($id)
    {
        $transaction = Transaction::with('event.category')
            ->findOrFail($id);

        return view('ticket', compact('transaction'));
    }
}