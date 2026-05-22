@extends('layouts.app')

@section('title', 'Kontak - AmikomEventHub')

@section('content')

    <div class="bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 min-h-screen">

        <div class="container mx-auto px-6 py-16">

            <!-- Header -->
            <div class="text-center mb-12">

                <h1 class="text-5xl font-black text-slate-800 mb-4">
                    Hubungi Kami
                </h1>

                <p class="text-slate-600 max-w-xl mx-auto">
                    Jika Anda memiliki pertanyaan, kendala, atau membutuhkan bantuan terkait event,
                    silakan hubungi kami melalui kontak berikut.
                </p>

            </div>

            <!-- Contact Card -->
            <div class="max-w-3xl mx-auto bg-white rounded-[2rem] shadow-2xl p-10 border border-slate-100">

                <div class="grid md:grid-cols-2 gap-8">

                    <!-- Contact Info -->
                    <div class="space-y-6">

                        <div class="flex items-start gap-4">

                            <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center text-2xl">
                                📧
                            </div>

                            <div>
                                <h3 class="font-black text-slate-800 text-lg">
                                    Email
                                </h3>

                                <p class="text-slate-500">
                                    Ikhwanabdillah@students.amikom.ac.id
                                </p>
                            </div>

                        </div>

                        <div class="flex items-start gap-4">

                            <div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center text-2xl">
                                📱
                            </div>

                            <div>
                                <h3 class="font-black text-slate-800 text-lg">
                                    WhatsApp
                                </h3>

                                <p class="text-slate-500">
                                    +62 812-xxxx-xxxx
                                </p>
                            </div>

                        </div>

                        <div class="flex items-start gap-4">

                            <div class="w-14 h-14 bg-purple-100 rounded-2xl flex items-center justify-center text-2xl">
                                📍
                            </div>

                            <div>
                                <h3 class="font-black text-slate-800 text-lg">
                                    Lokasi
                                </h3>

                                <p class="text-slate-500">
                                    Universitas Amikom Yogyakarta
                                </p>
                            </div>

                        </div>

                    </div>

                    <!-- Contact Form -->
                    <div>

                        <h2 class="text-2xl font-black text-slate-800 mb-6">
                            Kirim Pesan
                        </h2>

                        <div class="space-y-5">

                            <input type="text" placeholder="Nama Anda"
                                class="w-full px-5 py-4 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition">

                            <input type="email" placeholder="Email Anda"
                                class="w-full px-5 py-4 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition">

                            <textarea rows="5" placeholder="Tulis pesan..."
                                class="w-full px-5 py-4 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition resize-none"></textarea>

                            <button
                                class="w-full py-4 bg-slate-900 hover:bg-indigo-700 text-white rounded-2xl font-black transition duration-300 shadow-lg">
                                Kirim Pesan
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection