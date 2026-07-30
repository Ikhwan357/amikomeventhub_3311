@extends('layouts.app')

@section('title', 'Tiket Saya')

@section('content')

    <div class="max-w-7xl mx-auto py-12">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-10">

            <div>

                <p class="uppercase tracking-[0.3em] text-xs font-bold text-indigo-600">
                    User Dashboard
                </p>

                <h1 class="text-4xl font-black text-slate-900 mt-2">
                    Tiket Saya
                </h1>

                <p class="text-slate-500 mt-2">
                    Seluruh tiket event yang pernah Anda beli.
                </p>

            </div>

            <div class="bg-white rounded-3xl shadow-lg border border-slate-200 px-8 py-6 text-center">

                <p class="text-slate-500 text-sm font-semibold">
                    Total Tiket
                </p>

                <h2 class="text-4xl font-black text-indigo-600 mt-2">
                    {{ $transactions->count() }}
                </h2>

            </div>

        </div>

        @if($transactions->count())

            <div class="grid lg:grid-cols-2 gap-8">

                @foreach($transactions as $transaction)

                    <div class="bg-white rounded-3xl shadow-lg border border-slate-200 overflow-hidden">

                        {{-- Poster --}}
                        @if($transaction->event->poster_path)

                            <img src="{{ asset('storage/' . $transaction->event->poster_path) }}" class="w-full h-60 object-cover">

                        @else

                            <div class="h-60 bg-slate-900"></div>

                        @endif

                        <div class="p-8">

                            <div class="flex justify-between items-start">

                                <div>

                                    <h2 class="text-2xl font-black text-slate-900">
                                        {{ $transaction->event->title }}
                                    </h2>

                                    <p class="text-slate-500 mt-1">
                                        {{ $transaction->event->category->name }}
                                    </p>

                                </div>

                                <span class="px-4 py-2 rounded-full text-xs font-bold
                                    {{ $transaction->status == 'paid'
                        ? 'bg-green-100 text-green-700'
                        : 'bg-yellow-100 text-yellow-700' }}">

                                    {{ strtoupper($transaction->status) }}

                                </span>

                            </div>

                            <div class="border-t border-slate-200 my-6"></div>

                            <div class="grid grid-cols-2 gap-6">

                                <div>

                                    <p class="text-slate-500 text-sm">
                                        Tanggal Event
                                    </p>

                                    <p class="font-bold text-slate-900 mt-1">
                                        {{ $transaction->event->date->format('d M Y H:i') }}
                                    </p>

                                </div>

                                <div>

                                    <p class="text-slate-500 text-sm">
                                        Lokasi
                                    </p>

                                    <p class="font-bold text-slate-900 mt-1">
                                        {{ $transaction->event->location }}
                                    </p>

                                </div>

                                <div>

                                    <p class="text-slate-500 text-sm">
                                        Order ID
                                    </p>

                                    <p class="font-bold text-slate-900 mt-1">
                                        {{ $transaction->order_id }}
                                    </p>

                                </div>

                                <div>

                                    <p class="text-slate-500 text-sm">
                                        Total Pembayaran
                                    </p>

                                    <p class="font-black text-indigo-600 mt-1">
                                        Rp {{ number_format($transaction->total_price, 0, ',', '.') }}
                                    </p>

                                </div>

                            </div>

                            <div class="flex gap-4 mt-8">

                                <a href="{{ route('ticket', $transaction->id) }}"
                                    class="flex-1 bg-slate-900 hover:bg-slate-800 text-white py-3 rounded-2xl text-center font-bold transition">

                                    Lihat E-Ticket

                                </a>

                                @if(!$transaction->review)

                                    <a href="{{ route('reviews.create', $transaction) }}"
                                        class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-2xl text-center font-bold transition">

                                        Beri Review

                                    </a>

                                @else

                                    <button class="flex-1 bg-green-100 text-green-700 py-3 rounded-2xl font-bold cursor-default">

                                        Sudah Direview

                                    </button>

                                @endif

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="bg-white rounded-3xl shadow-lg border border-slate-200 py-24 text-center">

                <h2 class="text-3xl font-black text-slate-900">
                    Belum Ada Tiket
                </h2>

                <p class="text-slate-500 mt-3">
                    Anda belum memiliki tiket event.
                </p>

                <a href="{{ route('home') }}"
                    class="inline-block mt-8 bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-4 rounded-2xl font-bold">

                    Jelajahi Event

                </a>

            </div>

        @endif

    </div>

@endsection