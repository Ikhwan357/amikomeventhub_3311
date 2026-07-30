@extends('layouts.organizer')

@section('title', 'Organizer Dashboard')

@section('content')

    <div class="container mx-auto px-6 py-10">

        <!-- Header -->
        <div class="mb-10">
            <h1 class="text-4xl font-bold text-gray-800">
                Dashboard Organizer
            </h1>

            <p class="mt-2 text-gray-500">
                Kelola event dan pantau performa penjualan tiket Anda.
            </p>
        </div>

        <!-- Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-10">

            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 hover:shadow-xl transition duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">
                            Total Event
                        </p>

                        <h2 class="mt-3 text-4xl font-bold text-gray-800">
                            {{ $totalEvents }}
                        </h2>
                    </div>

                    <div class="w-14 h-14 rounded-full bg-indigo-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-indigo-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3M5 11h14M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 hover:shadow-xl transition duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">
                            Tiket Terjual
                        </p>

                        <h2 class="mt-3 text-4xl font-bold text-gray-800">
                            {{ $totalTickets }}
                        </h2>
                    </div>

                    <div class="w-14 h-14 rounded-full bg-green-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-green-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 9V7a5 5 0 00-10 0v2M5 9h14v10H5V9z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 hover:shadow-xl transition duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">
                            Pendapatan
                        </p>

                        <h2 class="mt-3 text-3xl font-bold text-gray-800">
                            Rp {{ number_format($totalRevenue) }}
                        </h2>
                    </div>

                    <div class="w-14 h-14 rounded-full bg-yellow-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-yellow-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-2.2 0-4 1.3-4 3s1.8 3 4 3 4 1.3 4 3-1.8 3-4 3m0-12V5m0 14v-2" />
                        </svg>
                    </div>
                </div>
            </div>

        </div>

        <!-- Table -->
        <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">

            <div class="flex items-center justify-between px-6 py-5 border-b bg-gray-50">

                <div>
                    <h2 class="text-2xl font-semibold text-gray-800">
                        Event Saya
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Daftar seluruh event yang telah Anda buat.
                    </p>
                </div>

            </div>

            <div class="overflow-x-auto">

                <table class="min-w-full">

                    <thead class="bg-gray-100">

                        <tr>

                            <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wide text-gray-600">
                                Judul Event
                            </th>

                            <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wide text-gray-600">
                                Tanggal
                            </th>

                            <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wide text-gray-600">
                                Lokasi
                            </th>

                            <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wide text-gray-600">
                                Harga
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @forelse($events as $event)

                            <tr class="hover:bg-gray-50 transition">

                                <td class="px-6 py-5 font-semibold text-gray-800">
                                    {{ $event->title }}
                                </td>

                                <td class="px-6 py-5 text-gray-600">
                                    {{ $event->date->format('d M Y') }}
                                </td>

                                <td class="px-6 py-5 text-gray-600">
                                    {{ $event->location }}
                                </td>

                                <td class="px-6 py-5 font-semibold text-indigo-600">
                                    Rp {{ number_format($event->price) }}
                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4" class="py-16 text-center">

                                    <div class="flex flex-col items-center">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-gray-300 mb-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M8 7V3m8 4V3M5 11h14M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />

                                        </svg>

                                        <h3 class="text-lg font-semibold text-gray-700">
                                            Belum ada event
                                        </h3>

                                        <p class="text-gray-500 mt-1">
                                            Event yang Anda buat akan muncul di sini.
                                        </p>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection