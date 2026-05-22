@extends('layouts.app')

@section('title', 'Detail Event - ' . $event->title)

@section('content')

    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-slate-100 py-16">

        <main class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-3 gap-10">

            <div class="lg:col-span-1">

                <div class="sticky top-28 space-y-6">

                    <div class="bg-white rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/70 p-4">

                        @if ($event->poster_path)
                            <img src="{{ asset('storage/' . $event->poster_path) }}" alt="{{ $event->title }}"
                                class="w-full aspect-[3/4] rounded-[1.5rem] object-cover">
                        @else
                            <img src="{{ asset('assets/concert.png') }}" alt="{{ $event->title }}"
                                class="w-full aspect-[3/4] rounded-[1.5rem] object-cover">
                        @endif

                    </div>

                    <div class="bg-white rounded-[2rem] border border-slate-200 shadow-lg shadow-slate-200/60 p-6">

                        <p class="text-xs font-black text-slate-400 mb-4 uppercase tracking-widest">
                            Kategori Event
                        </p>

                        <div class="flex items-center gap-4">

                            <div
                                class="w-14 h-14 bg-slate-900 rounded-2xl flex items-center justify-center text-white font-black">
                                {{ strtoupper(substr($event->category->name ?? 'EV', 0, 2)) }}
                            </div>

                            <div>
                                <p class="font-black text-slate-800">
                                    {{ $event->category->name ?? 'Tanpa Kategori' }}
                                </p>

                                <p class="text-sm text-slate-500">
                                    AmikomEventHub
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="lg:col-span-2 space-y-7">

                <div class="bg-white rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-8">

                    <span
                        class="inline-block px-4 py-2 bg-slate-100 text-slate-700 rounded-full text-xs font-black uppercase tracking-wider">
                        {{ $event->category->name ?? 'Event' }}
                    </span>

                    <h1 class="text-4xl md:text-5xl font-black leading-tight text-slate-900 mt-5">
                        {{ $event->title }}
                    </h1>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-7">

                        <div class="bg-slate-50 border border-slate-100 px-5 py-4 rounded-2xl">
                            <p class="text-xs font-black uppercase tracking-wider text-slate-400 mb-2">
                                Tanggal Event
                            </p>

                            <p class="font-bold text-slate-700">
                                {{ $event->date ? $event->date->format('d F Y, H:i') : '-' }}
                            </p>
                        </div>

                        <div class="bg-slate-50 border border-slate-100 px-5 py-4 rounded-2xl">
                            <p class="text-xs font-black uppercase tracking-wider text-slate-400 mb-2">
                                Lokasi
                            </p>

                            <p class="font-bold text-slate-700">
                                {{ $event->location }}
                            </p>
                        </div>

                    </div>

                </div>

                <div class="bg-white rounded-[2rem] border border-slate-200 shadow-lg shadow-slate-200/60 p-8">

                    <h3 class="text-2xl font-black text-slate-800 mb-4">
                        Deskripsi Event
                    </h3>

                    <p class="text-slate-600 leading-relaxed text-lg">
                        {{ $event->description }}
                    </p>

                </div>

                <div class="bg-slate-950 text-white rounded-[2rem] p-8 md:p-10 shadow-2xl relative overflow-hidden">

                    <div class="absolute -right-20 -top-20 w-64 h-64 bg-white opacity-10 rounded-full blur-3xl"></div>
                    <div class="absolute -left-20 -bottom-20 w-64 h-64 bg-slate-500 opacity-20 rounded-full blur-3xl"></div>

                    <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-8">

                        <div>
                            <p class="text-slate-400 font-bold uppercase tracking-widest text-sm mb-3">
                                Harga Tiket
                            </p>

                            <h2 class="text-4xl md:text-5xl font-black">
                                Rp {{ number_format($event->price, 0, ',', '.') }}
                                <span class="text-base font-medium text-slate-400">
                                    / orang
                                </span>
                            </h2>

                            <p class="mt-5 text-slate-300">
                                Sisa stok:
                                <span class="font-black text-white">
                                    {{ $event->stock }} tiket
                                </span>
                            </p>
                        </div>

                        <a href="{{ route('checkout', ['event' => $event->id]) }}"
                            class="inline-block w-full md:w-auto px-10 py-5 bg-white text-slate-950 rounded-2xl font-black text-lg shadow-xl hover:bg-slate-200 active:scale-95 transition-all text-center">
                            Pesan Sekarang
                        </a>

                    </div>

                </div>

                <div class="bg-white rounded-[2rem] border border-slate-200 shadow-lg shadow-slate-200/60 p-8">

                    <h3 class="text-2xl font-black text-slate-800 mb-6">
                        Kebijakan Tiket
                    </h3>

                    <ul class="space-y-4 text-slate-600">

                        <li class="flex items-start gap-4 bg-slate-50 border border-slate-100 p-4 rounded-2xl">
                            <span
                                class="w-7 h-7 rounded-full bg-slate-900 text-white flex items-center justify-center text-xs font-black shrink-0">
                                1
                            </span>

                            <span>
                                E-Ticket akan tersedia setelah pembayaran berhasil dikonfirmasi.
                            </span>
                        </li>

                        <li class="flex items-start gap-4 bg-slate-50 border border-slate-100 p-4 rounded-2xl">
                            <span
                                class="w-7 h-7 rounded-full bg-slate-900 text-white flex items-center justify-center text-xs font-black shrink-0">
                                2
                            </span>

                            <span>
                                Tiket wajib ditunjukkan saat melakukan check-in di lokasi event.
                            </span>
                        </li>

                        <li class="flex items-start gap-4 bg-rose-50 border border-rose-100 p-4 rounded-2xl text-rose-600">
                            <span
                                class="w-7 h-7 rounded-full bg-rose-600 text-white flex items-center justify-center text-xs font-black shrink-0">
                                3
                            </span>

                            <span>
                                Tiket yang sudah dibeli tidak dapat dibatalkan atau direfund.
                            </span>
                        </li>

                    </ul>

                </div>

            </div>

        </main>

    </div>

@endsection