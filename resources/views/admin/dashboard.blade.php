@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

    <div class="space-y-8">

        {{-- Header --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">

            <div>

                <h1 class="text-3xl font-black text-slate-900">
                    Dashboard Admin
                </h1>

                <p class="text-slate-500 mt-1">
                    Ringkasan aktivitas seluruh platform AmikomEventHub
                </p>

            </div>

            <div class="mt-5 md:mt-0">

                <span class="px-4 py-2 rounded-xl bg-indigo-600 text-white font-semibold shadow">

                    {{ now()->format('d F Y') }}

                </span>

            </div>

        </div>

        {{-- SUMMARY CARD --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

            {{-- Pendapatan --}}
            <div class="bg-white rounded-3xl shadow-sm border p-6">

                <div class="flex justify-between">

                    <div>

                        <p class="text-slate-500 text-sm">
                            Total Pendapatan
                        </p>

                        <h2 class="text-3xl font-black mt-2">

                            Rp {{ number_format($totalRevenue, 0, ',', '.') }}

                        </h2>

                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center">

                        💰

                    </div>

                </div>

            </div>

            {{-- Tiket --}}
            <div class="bg-white rounded-3xl shadow-sm border p-6">

                <div class="flex justify-between">

                    <div>

                        <p class="text-slate-500 text-sm">
                            Tiket Terjual
                        </p>

                        <h2 class="text-3xl font-black mt-2">

                            {{ number_format($ticketsSold) }}

                        </h2>

                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center">

                        🎫

                    </div>

                </div>

            </div>

            {{-- Event --}}
            <div class="bg-white rounded-3xl shadow-sm border p-6">

                <div class="flex justify-between">

                    <div>

                        <p class="text-slate-500 text-sm">
                            Event Aktif
                        </p>

                        <h2 class="text-3xl font-black mt-2">

                            {{ $activeEvents }}

                        </h2>

                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-orange-100 flex items-center justify-center">

                        📅

                    </div>

                </div>

            </div>

            {{-- Pending --}}
            <div class="bg-white rounded-3xl shadow-sm border p-6">

                <div class="flex justify-between">

                    <div>

                        <p class="text-slate-500 text-sm">
                            Pending
                        </p>

                        <h2 class="text-3xl font-black mt-2">

                            {{ $pendingOrders }}

                        </h2>

                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-red-100 flex items-center justify-center">

                        ⏳

                    </div>

                </div>

            </div>

        </div>

        {{-- GRAFIK --}}
        <div class="grid lg:grid-cols-2 gap-6">

            {{-- User --}}
            <div class="bg-white rounded-3xl border shadow-sm">

                <div class="p-6 border-b">

                    <h2 class="font-black text-lg">

                        Pertumbuhan Pengguna

                    </h2>

                    <p class="text-sm text-slate-500">

                        Jumlah user yang mendaftar setiap bulan

                    </p>

                </div>

                <div class="p-6">

                    <canvas id="userChart" height="130"></canvas>

                </div>

            </div>

            {{-- Event --}}
            <div class="bg-white rounded-3xl border shadow-sm">

                <div class="p-6 border-b">

                    <h2 class="font-black text-lg">

                        Pertumbuhan Event

                    </h2>

                    <p class="text-sm text-slate-500">

                        Jumlah event yang dibuat setiap bulan

                    </p>

                </div>

                <div class="p-6">

                    <canvas id="eventChart" height="130"></canvas>

                </div>

            </div>

        </div>

        {{-- Statistik --}}
        <div class="grid lg:grid-cols-3 gap-6">

            {{-- Organizer --}}
            <div class="bg-white rounded-3xl border shadow-sm p-6">

                <h2 class="font-black text-xl mb-6">

                    Statistik Platform

                </h2>

                <div class="space-y-5">

                    <div class="flex justify-between">

                        <span>Total User</span>

                        <span class="font-black">

                            {{ $totalUsers }}

                        </span>

                    </div>

                    <div class="flex justify-between">

                        <span>Total Organizer</span>

                        <span class="font-black">

                            {{ $totalOrganizers }}

                        </span>

                    </div>

                    <div class="flex justify-between">

                        <span>Total Event</span>

                        <span class="font-black">

                            {{ $totalEvents }}

                        </span>

                    </div>

                    <div class="flex justify-between">

                        <span>Total Partner</span>

                        <span class="font-black">

                            {{ $totalPartners }}

                        </span>

                    </div>

                </div>

            </div>

            {{-- Kategori --}}
            <div class="bg-white rounded-3xl border shadow-sm p-6">

                <h2 class="font-black text-xl mb-6">

                    Event per Kategori

                </h2>

                <canvas id="categoryChart"></canvas>

            </div>

            {{-- Event Terlaris --}}
            <div class="bg-white rounded-3xl border shadow-sm p-6">

                <h2 class="font-black text-xl mb-6">

                    Event Terlaris

                </h2>

                @foreach($popularEvents as $event)

                    <div class="mb-5">

                        <div class="flex justify-between mb-2">

                            <span class="font-semibold">

                                {{ $event->title }}

                            </span>

                            <span>

                                {{ $event->transactions_count }}

                            </span>

                        </div>

                        <div class="h-3 rounded-full bg-slate-200">

                            <div class="bg-indigo-600 h-3 rounded-full"
                                style="width:{{ min($event->transactions_count * 10, 100) }}%">
                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

        {{-- Transaksi Terbaru --}}
        <div class="bg-white rounded-3xl shadow-sm border overflow-hidden">

            <div class="p-6 border-b flex justify-between items-center">

                <h2 class="text-xl font-black">

                    Transaksi Terbaru

                </h2>

                <a href="{{ route('admin.transactions.index') }}" class="text-indigo-600 font-semibold">

                    Lihat Semua →

                </a>

            </div>

            <table class="w-full">

                <thead class="bg-slate-100">

                    <tr>

                        <th class="p-4 text-left">Customer</th>

                        <th class="p-4 text-left">Event</th>

                        <th class="p-4 text-left">Status</th>

                        <th class="p-4 text-left">Total</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($latestTransactions as $transaction)

                        <tr class="border-t">

                            <td class="p-4">

                                {{ $transaction->customer_name }}

                            </td>

                            <td class="p-4">

                                {{ $transaction->event->title }}

                            </td>

                            <td class="p-4">

                                @if($transaction->status == "paid")

                                    <span class="px-3 py-1 bg-green-100 rounded-full text-green-700 text-xs">

                                        Paid

                                    </span>

                                @elseif($transaction->status == "pending")

                                    <span class="px-3 py-1 bg-yellow-100 rounded-full text-yellow-700 text-xs">

                                        Pending

                                    </span>

                                @else

                                    <span class="px-3 py-1 bg-gray-100 rounded-full">

                                        {{ $transaction->status }}

                                    </span>

                                @endif

                            </td>

                            <td class="p-4">

                                Rp {{ number_format($transaction->total_price, 0, ',', '.') }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="p-8 text-center text-slate-500">

                                Belum ada transaksi.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

        const months = @json($months);

        new Chart(document.getElementById('userChart'), {

            type: 'line',

            data: {

                labels: months,

                datasets: [{

                    label: 'User',

                    data: @json($userGrowth),

                    borderColor: '#4f46e5',

                    backgroundColor: 'rgba(79,70,229,.12)',

                    fill: true,

                    tension: .4,

                    borderWidth: 3,

                    pointRadius: 4

                }]

            },

            options: {

                responsive: true,

                plugins: {

                    legend: {
                        display: false
                    }

                },

                scales: {

                    y: {
                        beginAtZero: true
                    }

                }

            }

        });

        new Chart(document.getElementById('eventChart'), {

            type: 'bar',

            data: {

                labels: months,

                datasets: [{

                    label: 'Event',

                    data: @json($eventGrowth),

                    backgroundColor: '#10b981',

                    borderRadius: 10

                }]

            },

            options: {

                responsive: true,

                plugins: {

                    legend: {
                        display: false
                    }

                },

                scales: {

                    y: {
                        beginAtZero: true
                    }

                }

            }

        });

        new Chart(document.getElementById('categoryChart'), {

            type: 'doughnut',

            data: {

                labels: @json($categoryLabels),

                datasets: [{

                    data: @json($categoryTotals),

                    backgroundColor: [

                        '#4f46e5',

                        '#10b981',

                        '#f59e0b',

                        '#ef4444',

                        '#06b6d4',

                        '#8b5cf6',

                        '#14b8a6',

                        '#f97316'

                    ]

                }]

            },

            options: {

                responsive: true,

                plugins: {

                    legend: {

                        position: 'bottom'

                    }

                }

            }

        });

    </script>

@endsection