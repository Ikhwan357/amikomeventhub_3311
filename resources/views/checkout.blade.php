@extends('layouts.app')

@section('title', 'Konfirmasi Pemesanan')

@section('content')

    @php
        $isFreeEvent = (float) $event->price == 0;
        $serviceFee = $isFreeEvent ? 0 : 5000;
        $total = $event->price + $serviceFee;
    @endphp

    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-indigo-50 py-16">

        <div class="max-w-6xl mx-auto px-6">

            <a href="{{ route('events.show', $event->id) }}"
                class="inline-flex items-center gap-2 text-slate-600 hover:text-slate-900 font-bold mb-8 transition group">

                <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
                Kembali ke Detail Event

            </a>

            <div class="mb-10">

                <span class="inline-flex px-4 py-2 rounded-full bg-slate-100 text-slate-700 font-bold text-sm">

                    Konfirmasi Pemesanan

                </span>

                <h1 class="text-5xl font-black text-slate-900 mt-5">

                    Pastikan Informasi Pesanan

                </h1>

                <p class="text-slate-500 mt-3 max-w-2xl">

                    Seluruh data pemesan diambil langsung dari akun yang sedang login.
                    Silakan periksa kembali sebelum melanjutkan pembayaran.

                </p>

            </div>

            <div class="grid lg:grid-cols-3 gap-8 items-start">

                <!-- ================= LEFT ================= -->

                <div
                    class="lg:col-span-2 bg-white rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-8">

                    <h2 class="text-2xl font-black text-slate-900 mb-8">

                        Informasi Event

                    </h2>

                    <div class="grid md:grid-cols-2 gap-x-8 gap-y-7">

                        <div>

                            <p class="text-xs font-black uppercase tracking-wider text-slate-400 mb-2">

                                Nama Event

                            </p>
                            <p class="text-xl font-black text-slate-800">

                                {{ $event->title }}

                            </p>

                        </div>

                        <div>

                            <p class="text-xs font-black uppercase tracking-wider text-slate-400 mb-2">

                                Kategori

                            </p>

                            <p class="font-semibold text-slate-700">

                                {{ $event->category->name }}

                            </p>

                        </div>

                        <div>

                            <p class="text-xs font-black uppercase tracking-wider text-slate-400 mb-2">

                                Tanggal

                            </p>

                            <p class="font-semibold text-slate-700">

                                {{ $event->date->format('d M Y, H:i') }}

                            </p>

                        </div>

                        <div>

                            <p class="text-xs font-black uppercase tracking-wider text-slate-400 mb-2">

                                Lokasi

                            </p>

                            <p class="font-semibold text-slate-700">

                                {{ $event->location }}

                            </p>

                        </div>

                        <div>

                            <p class="text-xs font-black uppercase tracking-wider text-slate-400 mb-2">

                                Penyelenggara

                            </p>

                            <p class="font-semibold text-slate-700">

                                {{ $event->organization->name }}

                            </p>

                        </div>

                    </div>

                    <div class="my-10 border-t border-slate-200"></div>

                    <h2 class="text-2xl font-black text-slate-900 mb-8">

                        Data Pemesan

                    </h2>

                    <div class="grid md:grid-cols-2 gap-x-8 gap-y-6">

                        <div>

                            <p class="text-xs font-black uppercase tracking-wider text-slate-400 mb-2">

                                Nama Lengkap

                            </p>

                            <div
                                class="bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 font-medium text-slate-700">

                                {{ Auth::user()->name }}

                            </div>

                        </div>

                        <div>

                            <p class="text-xs font-black uppercase tracking-wider text-slate-400 mb-2">

                                Email

                            </p>

                            <div
                                class="bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 font-medium text-slate-700 truncate">

                                {{ Auth::user()->email }}

                            </div>

                        </div>

                        <div>

                            <p class="text-xs font-black uppercase tracking-wider text-slate-400 mb-2">

                                Status Akun

                            </p>

                            <div
                                class="bg-emerald-50 border border-emerald-200 rounded-2xl px-5 py-4 text-emerald-700 font-bold">

                                Login sebagai {{ ucfirst(Auth::user()->role) }}

                            </div>

                        </div>

                        <div>

                            <p class="text-xs font-black uppercase tracking-wider text-slate-400 mb-2">

                                ID Akun

                            </p>

                            <div
                                class="bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 font-medium text-slate-700">

                                #{{ Auth::user()->id }}

                            </div>

                        </div>

                    </div>

                    <div class="mt-10 bg-amber-50 border border-amber-200 rounded-3xl p-6">

                        <h3 class="text-lg font-black text-slate-800 mb-3">

                            Informasi

                        </h3>

                        <ul class="space-y-2 text-slate-600 text-sm">

                            <li>
                                • Tiket akan otomatis masuk ke akun Anda setelah pembayaran berhasil.
                            </li>

                            <li>
                                • Tiket hanya berlaku untuk akun yang melakukan pembelian.
                            </li>

                            <li>
                                • Pastikan data akun sudah benar sebelum melanjutkan pembayaran.
                            </li>

                        </ul>

                    </div>

                </div>

                <!-- ================= RIGHT ================= -->

                <div class="bg-slate-950 rounded-[2rem] p-7 text-white shadow-2xl h-fit sticky top-28">

                    <div class="flex items-center justify-between mb-6">

                        <h2 class="text-2xl font-black">

                            Ringkasan Pesanan

                        </h2>

                        @if ($isFreeEvent)
                            <span
                                class="px-3 py-1.5 bg-emerald-500/20 text-emerald-400 text-xs font-black uppercase rounded-full">
                                Gratis
                            </span>
                        @endif

                    </div>

                    @if($event->poster_path)

                        <img src="{{ asset('storage/' . $event->poster_path) }}"
                            class="w-full h-48 object-cover rounded-3xl mb-6">

                    @else

                        <img src="{{ asset('assets/concert.png') }}" class="w-full h-48 object-cover rounded-3xl mb-6">

                    @endif

                    <h3 class="text-xl font-black">

                        {{ $event->title }}

                    </h3>

                    <p class="text-slate-400 mt-2">

                        {{ $event->date->format('d M Y') }}

                    </p>

                    <div class="border-t border-white/10 my-6"></div>

                    <div class="space-y-4">

                        <div class="flex justify-between">

                            <span class="text-slate-300">

                                Harga Tiket

                            </span>

                            <span>

                                @if ($isFreeEvent)
                                    Gratis
                                @else
                                    Rp {{ number_format($event->price, 0, ',', '.') }}
                                @endif

                            </span>

                        </div>

                        <div class="flex justify-between">

                            <span class="text-slate-300">

                                Biaya Layanan

                            </span>

                            <span>

                                @if ($isFreeEvent)
                                    Rp 0
                                @else
                                    Rp {{ number_format($serviceFee, 0, ',', '.') }}
                                @endif

                            </span>

                        </div>

                        <div class="border-t border-white/10 pt-5 flex justify-between items-center">

                            <span class="font-bold">

                                Total

                            </span>

                            <span class="text-2xl font-black">

                                @if ($isFreeEvent)
                                    Rp 0
                                @else
                                    Rp {{ number_format($total, 0, ',', '.') }}
                                @endif

                            </span>

                        </div>

                    </div>

                    <form action="{{ route('checkout.process', $event->id) }}" method="POST" class="mt-8">

                        @csrf
                        <button type="submit"
                            class="w-full py-5 bg-white text-slate-900 rounded-2xl font-black text-lg hover:bg-slate-100 active:scale-95 transition-all">

                            {{ $isFreeEvent ? 'Klaim Tiket Gratis' : 'Bayar Sekarang' }}

                        </button>

                    </form>

                    <a href="{{ route('events.show', $event->id) }}"
                        class="block text-center mt-4 text-slate-400 hover:text-white font-semibold transition">

                        Batal

                    </a>

                    <p class="text-xs text-slate-500 mt-8 leading-relaxed">

                        @if ($isFreeEvent)
                            Dengan melanjutkan, Anda menyetujui syarat dan ketentuan
                            AmikomEventHub. E-ticket akan otomatis masuk ke akun Anda
                            tanpa proses pembayaran.
                        @else
                            Dengan melanjutkan pembayaran, Anda menyetujui syarat dan
                            ketentuan AmikomEventHub. Setelah pembayaran berhasil,
                            e-ticket akan otomatis masuk ke akun Anda.
                        @endif

                    </p>

                </div>

            </div>

        </div>

    </div>

@endsection