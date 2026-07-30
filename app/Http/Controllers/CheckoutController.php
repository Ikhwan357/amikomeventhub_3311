<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Halaman Konfirmasi Checkout
     */
    public function index(Event $event)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $event->load(['category', 'organization']);

        return view('checkout', compact('event'));
    }

    /**
     * Proses Checkout
     */
    public function process(Request $request, Event $event)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Cek stok
        if ($event->stock <= 0) {
            return redirect()
                ->route('events.show', $event->id)
                ->with('error', 'Maaf, tiket untuk event ini sudah habis.');
        }

        // Event gratis (harga Rp 0) tidak dikenakan service fee
        $isFreeEvent = (float) $event->price == 0;
        $serviceFee = $isFreeEvent ? 0 : 5000;

        DB::beginTransaction();

        try {

            // Kurangi stok
            $event->decrement('stock');

            // Simpan transaksi
            $transaction = Transaction::create([

                'user_id' => Auth::id(),

                'event_id' => $event->id,

                'order_id' => 'TRX-' . strtoupper(uniqid()),

                'customer_name' => Auth::user()->name,

                'customer_email' => Auth::user()->email,

                'customer_phone' => '-',

                'total_price' => $event->price + $serviceFee,

                'status' => 'paid',

                'snap_token' => null,

            ]);

            DB::commit();

            return redirect()
                ->route('ticket', $transaction->id)
                ->with('success', $isFreeEvent
                    ? 'Tiket gratis berhasil diklaim. E-Ticket Anda sudah siap.'
                    : 'Checkout berhasil. E-Ticket Anda sudah siap.');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with('error', 'Checkout gagal. Silakan coba lagi.');

        }
    }
}