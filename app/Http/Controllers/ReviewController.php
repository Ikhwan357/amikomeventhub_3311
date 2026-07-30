<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Form Review
     */
    public function create(Transaction $transaction)
    {
        if ($transaction->user_id != Auth::id()) {
            abort(403);
        }

        if ($transaction->review) {
            return redirect()->back()
                ->with('error', 'Review sudah pernah diberikan.');
        }

        if ($transaction->status != 'paid') {
            return redirect()->back()
                ->with('error', 'Transaksi belum selesai.');
        }

        return view('reviews.create', compact('transaction'));
    }

    /**
     * Simpan Review
     */
    public function store(Request $request, Transaction $transaction)
    {
        if ($transaction->user_id != Auth::id()) {
            abort(403);
        }

        if ($transaction->review) {
            return redirect()->back();
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:1000',
        ]);

        Review::create([

            'user_id' => Auth::id(),

            'transaction_id' => $transaction->id,

            'event_id' => $transaction->event_id,

            'organization_id' => $transaction->event->organization_id,

            'rating' => $request->rating,

            'review' => $request->review,

        ]);

        return redirect()
            ->route('ticket', $transaction->id)
            ->with('success', 'Terima kasih atas review Anda.');
    }
}