@extends('layouts.app')

@section('title', 'Bantuan - AmikomEventHub')

@section('content')

    <div class="bg-gradient-to-br from-slate-100 to-blue-100 min-h-screen">

        <div class="container mx-auto px-6 py-16">

            <div class="text-center mb-10">
                <h1 class="text-4xl font-bold text-slate-800 mb-2">
                    Pusat Bantuan
                </h1>

                <p class="text-slate-600">
                    Temukan jawaban dari pertanyaan yang sering ditanyakan pengguna.
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-6">

                <div
                    class="bg-white rounded-2xl shadow-lg p-6 hover:scale-105 transition duration-300 border-l-4 border-blue-500">
                    <div class="flex items-center gap-3 mb-3">
                        <div
                            class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center font-bold">
                            ?
                        </div>

                        <h2 class="text-xl font-semibold text-slate-800">
                            Apa itu website ini?
                        </h2>
                    </div>

                    <p class="text-slate-600">
                        Website ini digunakan untuk melihat berbagai event menarik dan memudahkan pengguna melakukan
                        pendaftaran event.
                    </p>
                </div>

                <div
                    class="bg-white rounded-2xl shadow-lg p-6 hover:scale-105 transition duration-300 border-l-4 border-green-500">
                    <div class="flex items-center gap-3 mb-3">
                        <div
                            class="w-10 h-10 bg-green-100 text-green-600 rounded-full flex items-center justify-center font-bold">
                            ✓
                        </div>

                        <h2 class="text-xl font-semibold text-slate-800">
                            Cara daftar event?
                        </h2>
                    </div>

                    <p class="text-slate-600">
                        Masuk ke halaman katalog, pilih event yang tersedia, lalu lakukan pendaftaran sesuai petunjuk.
                    </p>
                </div>

                <div
                    class="bg-white rounded-2xl shadow-lg p-6 hover:scale-105 transition duration-300 border-l-4 border-purple-500">
                    <div class="flex items-center gap-3 mb-3">
                        <div
                            class="w-10 h-10 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center font-bold">
                            !
                        </div>

                        <h2 class="text-xl font-semibold text-slate-800">
                            Apakah event berbayar?
                        </h2>
                    </div>

                    <p class="text-slate-600">
                        Beberapa event gratis dan beberapa event premium memerlukan biaya pendaftaran.
                    </p>
                </div>

                <div
                    class="bg-white rounded-2xl shadow-lg p-6 hover:scale-105 transition duration-300 border-l-4 border-red-500">
                    <div class="flex items-center gap-3 mb-3">
                        <div
                            class="w-10 h-10 bg-red-100 text-red-600 rounded-full flex items-center justify-center font-bold">
                            ☎
                        </div>

                        <h2 class="text-xl font-semibold text-slate-800">
                            Butuh bantuan lebih lanjut?
                        </h2>
                    </div>

                    <p class="text-slate-600">
                        Hubungi admin melalui halaman kontak untuk mendapatkan bantuan lebih lanjut.
                    </p>
                </div>

            </div>

        </div>

    </div>

@endsection