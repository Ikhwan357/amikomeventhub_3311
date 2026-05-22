@extends('layouts.app')

@section('title', 'E-Ticket - AmikomEventHub')

@section('styles')
    <style>
        body {
            background: linear-gradient(to bottom right, #f8fafc, #ffffff, #eef2ff);
        }

        main {
            background: transparent;
        }

        @media print {

            nav,
            footer,
            .no-print {
                display: none !important;
            }

            body {
                background: #ffffff !important;
            }

            .ticket-wrapper {
                box-shadow: none !important;
                border: 1px solid #e2e8f0 !important;
            }
        }
    </style>
@endsection

@section('content')

    <div class="min-h-screen flex items-center justify-center px-6 py-16 relative overflow-hidden">

        <div class="absolute top-0 left-0 w-72 h-72 bg-slate-300 opacity-20 blur-3xl rounded-full"></div>
        <div class="absolute bottom-0 right-0 w-72 h-72 bg-indigo-200 opacity-20 blur-3xl rounded-full"></div>

        <div class="max-w-lg w-full relative z-10">

            <div class="text-center mb-10">
                <div
                    class="w-24 h-24 bg-slate-900 rounded-full flex items-center justify-center mx-auto mb-5 shadow-xl shadow-slate-300 border-4 border-white">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7">
                        </path>
                    </svg>
                </div>

                <h1 class="text-4xl font-black text-slate-900">
                    Pembayaran Berhasil
                </h1>

                <p class="text-slate-500 mt-3">
                    E-ticket Anda telah berhasil diterbitkan.
                </p>
            </div>

            <div
                class="ticket-wrapper bg-white rounded-[2.5rem] overflow-hidden shadow-2xl shadow-slate-300/70 border border-slate-200 relative">

                <div class="bg-slate-950 text-white p-8 text-center relative overflow-hidden">

                    <div class="absolute -top-10 -right-10 w-32 h-32 bg-white opacity-10 rounded-full"></div>
                    <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-white opacity-10 rounded-full"></div>

                    <p class="text-slate-400 font-bold uppercase tracking-[0.3em] text-xs mb-3">
                        Official E-Ticket
                    </p>

                    <h2 class="text-3xl font-black leading-tight">
                        {{ $transaction->event->title ?? 'Nama Event' }}
                    </h2>

                    <p class="text-slate-300 mt-2">
                        {{ $transaction->event->category->name ?? 'AmikomEventHub' }}
                    </p>
                </div>

                <div class="p-8 space-y-8">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                        <div class="bg-slate-50 border border-slate-100 p-4 rounded-2xl">
                            <p class="text-slate-400 text-xs font-black uppercase mb-1">
                                Nama Pembeli
                            </p>

                            <p class="font-black text-slate-800">
                                {{ $transaction->customer_name ?? '-' }}
                            </p>
                        </div>

                        <div class="bg-slate-50 border border-slate-100 p-4 rounded-2xl">
                            <p class="text-slate-400 text-xs font-black uppercase mb-1">
                                Tanggal Event
                            </p>

                            <p class="font-black text-slate-800">
                                {{ $transaction->event && $transaction->event->date ? $transaction->event->date->format('d M Y, H:i') : '-' }}
                            </p>
                        </div>

                        <div class="bg-slate-50 border border-slate-100 p-4 rounded-2xl">
                            <p class="text-slate-400 text-xs font-black uppercase mb-1">
                                Order ID
                            </p>

                            <p class="font-black text-slate-800">
                                {{ $transaction->order_id ?? 'TRX-' . str_pad($transaction->id, 5, '0', STR_PAD_LEFT) }}
                            </p>
                        </div>

                        <div class="bg-slate-50 border border-slate-100 p-4 rounded-2xl">
                            <p class="text-slate-400 text-xs font-black uppercase mb-1">
                                Lokasi
                            </p>

                            <p class="font-black text-slate-800">
                                {{ $transaction->event->location ?? '-' }}
                            </p>
                        </div>

                        <div class="bg-slate-50 border border-slate-100 p-4 rounded-2xl">
                            <p class="text-slate-400 text-xs font-black uppercase mb-1">
                                Email
                            </p>

                            <p class="font-black text-slate-800 break-all">
                                {{ $transaction->customer_email ?? '-' }}
                            </p>
                        </div>

                        <div class="bg-slate-50 border border-slate-100 p-4 rounded-2xl">
                            <p class="text-slate-400 text-xs font-black uppercase mb-1">
                                Total Bayar
                            </p>

                            <p class="font-black text-slate-800">
                                Rp {{ number_format($transaction->total_price ?? 0, 0, ',', '.') }}
                            </p>
                        </div>

                    </div>

                    <div class="bg-slate-50 p-8 rounded-[2rem] flex flex-col items-center border border-slate-200">

                        <p class="text-slate-500 text-xs font-black uppercase tracking-widest mb-5">
                            Kode Tiket
                        </p>

                        <div
                            class="w-52 h-52 bg-white p-4 rounded-3xl shadow-inner flex items-center justify-center border border-slate-200">

                            <div class="w-full h-full border-4 border-slate-900 flex flex-wrap p-1">
                                <div class="w-1/4 h-1/4 bg-slate-900"></div>
                                <div class="w-1/4 h-1/4 bg-white"></div>
                                <div class="w-1/4 h-1/4 bg-slate-900"></div>
                                <div class="w-1/4 h-1/4 bg-white"></div>

                                <div class="w-1/4 h-1/4 bg-white"></div>
                                <div class="w-1/4 h-1/4 bg-slate-900"></div>
                                <div class="w-1/4 h-1/4 bg-white"></div>
                                <div class="w-1/4 h-1/4 bg-slate-900"></div>

                                <div class="w-1/4 h-1/4 bg-slate-900"></div>
                                <div class="w-1/4 h-1/4 bg-white"></div>
                                <div class="w-1/4 h-1/4 bg-slate-900"></div>
                                <div class="w-1/4 h-1/4 bg-white"></div>

                                <div class="w-1/4 h-1/4 bg-white"></div>
                                <div class="w-1/4 h-1/4 bg-slate-900"></div>
                                <div class="w-1/4 h-1/4 bg-white"></div>
                                <div class="w-1/4 h-1/4 bg-slate-900"></div>
                            </div>
                        </div>

                        <p class="mt-5 font-mono font-black text-slate-800 text-lg">
                            {{ $transaction->order_id ?? 'TKT-' . str_pad($transaction->id, 8, '0', STR_PAD_LEFT) }}
                        </p>

                        <p class="text-xs text-slate-400 mt-2">
                            Tunjukkan kode ini saat check-in event.
                        </p>

                    </div>

                </div>

                <div class="px-8 pb-8 no-print">

                    <button onclick="window.print()"
                        class="w-full py-5 bg-slate-900 hover:bg-slate-800 text-white rounded-2xl font-black text-lg shadow-xl transition-all duration-300 hover:scale-[1.02]">
                        Cetak / Simpan PDF
                    </button>

                    <a href="{{ route('home') }}"
                        class="block text-center mt-5 text-slate-500 font-bold hover:text-slate-900 transition">
                        Kembali ke Beranda
                    </a>

                </div>

            </div>

        </div>

    </div>

@endsection