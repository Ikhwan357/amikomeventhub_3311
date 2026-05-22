@extends('layouts.app')

@section('title', 'Detail Event - Jazz Night 2024')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-slate-100 py-16">
        <main class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-3 gap-10">

            <!-- Left: Poster -->
            <div class="lg:col-span-1">
                <div class="sticky top-28 space-y-6">
                    <img src="{{ asset('assets/concert.png') }}" alt="Concert Poster"
                        class="w-full rounded-[2rem] shadow-2xl shadow-slate-300/70 border-8 border-white hover:scale-[1.02] transition duration-500">

                    <div class="bg-white rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-7">
                        <p class="text-sm font-bold text-indigo-600 mb-4 uppercase tracking-wider">
                            Penyelenggara
                        </p>

                        <div class="flex items-center gap-4">
                            <div
                                class="w-14 h-14 bg-indigo-100 rounded-2xl flex items-center justify-center text-indigo-700 font-black">
                                AB
                            </div>

                            <div>
                                <p class="font-black text-slate-800">
                                    ABP Productions
                                </p>
                                <p class="text-sm text-slate-500">
                                    Verified Organizer
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Details -->
            <div class="lg:col-span-2 space-y-8">

                <!-- Header -->
                <div class="bg-white rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-8">
                    <span
                        class="inline-block px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-black uppercase tracking-wider">
                        Music Festival
                    </span>

                    <h1 class="text-4xl md:text-5xl font-black leading-tight text-slate-900 mt-5">
                        Jazz Night 2024: A Celebration of Rhythm & Melody
                    </h1>

                    <div class="flex flex-wrap gap-5 text-slate-500 font-medium mt-6">
                        <div class="flex items-center gap-2 bg-slate-50 px-4 py-3 rounded-2xl">
                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span>Saturday, 16 Nov 2024</span>
                        </div>

                        <div class="flex items-center gap-2 bg-slate-50 px-4 py-3 rounded-2xl">
                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z">
                                </path>
                            </svg>
                            <span>The Blue Note Lounge, Metropolis</span>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="bg-white rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-8">
                    <h3 class="text-2xl font-black text-slate-800 mb-4">
                        Deskripsi Event
                    </h3>

                    <p class="text-lg text-slate-600 leading-relaxed">
                        Nikmati malam yang tak terlupakan dengan alunan jazz dari musisi internasional.
                        Jazz Night 2024 hadir untuk membawa Anda ke dalam perjalanan melodi yang menenangkan
                        dan ritme yang menggugah jiwa.
                    </p>

                    <p class="text-lg text-slate-600 leading-relaxed mt-4">
                        Tahun ini kami menghadirkan
                        <strong>The Jazz Collective</strong>,
                        <strong>Luna Vance</strong>, dan artis favorit lainnya.
                    </p>
                </div>

                <!-- Ticket Card -->
                <div class="bg-slate-900 text-white rounded-[2rem] p-8 md:p-10 shadow-2xl relative overflow-hidden">
                    <div class="absolute -right-20 -top-20 w-64 h-64 bg-indigo-500 opacity-30 rounded-full blur-3xl"></div>
                    <div class="absolute -left-20 -bottom-20 w-64 h-64 bg-blue-500 opacity-20 rounded-full blur-3xl"></div>

                    <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-8">
                        <div>
                            <p class="text-indigo-300 font-bold uppercase tracking-widest text-sm mb-3">
                                Harga Tiket
                            </p>

                            <h2 class="text-4xl md:text-5xl font-black">
                                Rp 150.000
                                <span class="text-lg font-medium text-slate-300">/ orang</span>
                            </h2>

                            <p class="mt-5 text-slate-300 flex items-center gap-2">
                                <svg class="w-5 h-5 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                                Sisa stok:
                                <span class="font-black text-white underline underline-offset-4">42 Tiket lagi!</span>
                            </p>
                        </div>

                        <a href="{{ route('checkout') }}"
                            class="inline-block px-10 py-5 bg-white text-indigo-700 rounded-2xl font-black text-lg shadow-xl hover:bg-indigo-600 hover:text-white hover:scale-105 active:scale-95 transition-all text-center">
                            Pesan Sekarang
                        </a>
                    </div>
                </div>

                <!-- Policy -->
                <div class="bg-white rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-8">
                    <h3 class="text-2xl font-black text-slate-800 mb-6">
                        Kebijakan Tiket
                    </h3>

                    <ul class="space-y-4 text-slate-600">
                        <li class="flex items-start gap-3 bg-slate-50 p-4 rounded-2xl">
                            <svg class="w-6 h-6 text-green-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            <span>E-Ticket akan dikirimkan otomatis setelah pembayaran berhasil.</span>
                        </li>

                        <li class="flex items-start gap-3 bg-slate-50 p-4 rounded-2xl">
                            <svg class="w-6 h-6 text-green-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            <span>Tiket dapat discan di pintu masuk saat check-in.</span>
                        </li>

                        <li class="flex items-start gap-3 bg-rose-50 p-4 rounded-2xl text-rose-600">
                            <svg class="w-6 h-6 text-rose-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                            <span>Tiket yang sudah dibeli tidak dapat direfund.</span>
                        </li>
                    </ul>
                </div>

            </div>
        </main>
    </div>
@endsection