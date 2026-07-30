<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use App\Models\Partner;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | SUMMARY CARD
        |--------------------------------------------------------------------------
        */

        $totalRevenue = Transaction::where('status', 'paid')
            ->sum('total_price');

        $ticketsSold = Transaction::where('status', 'paid')
            ->count();

        $activeEvents = Event::count();

        $pendingOrders = Transaction::where('status', 'pending')
            ->count();

        $totalUsers = User::where('role', 'user')
            ->count();

        $totalOrganizers = User::where('role', 'organizer')
            ->count();

        $totalEvents = Event::count();

        $totalPartners = Partner::count();

        /*
        |--------------------------------------------------------------------------
        | TRANSAKSI TERBARU
        |--------------------------------------------------------------------------
        */

        $latestTransactions = Transaction::with('event')
            ->latest()
            ->take(10)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | GRAFIK USER & EVENT (6 Bulan Terakhir)
        |--------------------------------------------------------------------------
        */

        $months = [];

        $userGrowth = [];

        $eventGrowth = [];

        for ($i = 5; $i >= 0; $i--) {

            $date = Carbon::now()->subMonths($i);

            $months[] = $date->translatedFormat('M');

            $userGrowth[] = User::whereYear(
                'created_at',
                $date->year
            )
                ->whereMonth(
                    'created_at',
                    $date->month
                )
                ->count();

            $eventGrowth[] = Event::whereYear(
                'created_at',
                $date->year
            )
                ->whereMonth(
                    'created_at',
                    $date->month
                )
                ->count();
        }

        /*
        |--------------------------------------------------------------------------
        | EVENT PER KATEGORI
        |--------------------------------------------------------------------------
        */

        $categoryData = Category::withCount('events')->get();

        $categoryLabels = $categoryData
            ->pluck('name')
            ->toArray();

        $categoryTotals = $categoryData
            ->pluck('events_count')
            ->toArray();

        /*
        |--------------------------------------------------------------------------
        | EVENT TERPOPULER
        |--------------------------------------------------------------------------
        */

        $popularEvents = Event::withCount('transactions')
            ->orderByDesc('transactions_count')
            ->take(5)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view('admin.dashboard', compact(

            'totalRevenue',

            'ticketsSold',

            'activeEvents',

            'pendingOrders',

            'totalUsers',

            'totalOrganizers',

            'totalEvents',

            'totalPartners',

            'latestTransactions',

            'months',

            'userGrowth',

            'eventGrowth',

            'categoryLabels',

            'categoryTotals',

            'popularEvents'

        ));
    }
}