<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $organizationId = Auth::user()->organization_id;

        $events = Event::where('organization_id', $organizationId)
            ->latest()
            ->get();

        $totalEvents = $events->count();

        $eventIds = $events->pluck('id');

        $transactions = Transaction::whereIn('event_id', $eventIds)
            ->where('status', 'paid')
            ->get();

        $totalTickets = $transactions->count();

        $totalRevenue = $transactions->sum('total_price');

        return view('organizer.dashboard', compact(
            'events',
            'totalEvents',
            'totalTickets',
            'totalRevenue'
        ));
    }
}