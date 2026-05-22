@extends('layouts.app')

@section('title', 'Bantuan - AmikomEventHub')

@section('content')

    <div class="bg-gradient-to-br from-slate-100 to-blue-100 min-h-screen">

        <div class="container mx-auto px-6 py-16">

            <div class="text-center mb-12">
                <span
                    class="px-4 py-2 bg-slate-200 text-slate-700 rounded-full text-sm font-black uppercase tracking-wider">
                    Help Center
                </span>

                <h1 class="text-5xl font-black text-slate-800 mt-5 mb-4">
                    Pusat Bantuan
                </h1>

                <p class="text-slate-600 max-w-2xl mx-auto leading-relaxed">
                    Temukan panduan singkat seputar penggunaan AmikomEventHub, mulai dari melihat katalog,
                    mendaftar event, hingga menghubungi admin.
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-6 max-w-5xl mx-auto">

                <div
                    class="bg-white/90 backdrop-blur-xl rounded-3xl shadow-lg shadow-slate-300/50 p-7 border border-white hover:-translate-y-1 transition duration-300">
                    <div class="flex items-center gap-4 mb-4">
                        <div
                            class="w-12 h-12 bg-slate-900 text-white rounded-2xl flex items-center justify-center font-black">
                            01
                        </div>

                        <h2 class="text-xl font-black text-slate-800">
                            Mengenal AmikomEventHub
                        </h2>
                    </div>

                    <p class="text-slate-600 leading-relaxed">
                        AmikomEventHub adalah website untuk menampilkan informasi event kampus secara lebih rapi,
                        sehingga pengguna dapat melihat detail acara, jadwal, dan informasi penting lainnya.
                    </p>
                </div>

                <div
                    class="bg-white/90 backdrop-blur-xl rounded-3xl shadow-lg shadow-slate-300/50 p-7 border border-white hover:-translate-y-1 transition duration-300">
                    <div class="flex items-center gap-4 mb-4">
                        <div
                            class="w-12 h-12 bg-slate-900 text-white rounded-2xl flex items-center justify-center font-black">
                            02
                        </div>

                        <h2 class="text-xl font-black text-slate-800">
                            Melihat Katalog Event
                        </h2>
                    </div>

                    <p class="text-slate-600 leading-relaxed">
                        Pengguna dapat membuka halaman katalog untuk melihat daftar event yang tersedia,
                        termasuk nama event, deskripsi, lokasi, dan informasi pendaftaran.
                    </p>
                </div>

                <div
                    class="bg-white/90 backdrop-blur-xl rounded-3xl shadow-lg shadow-slate-300/50 p-7 border border-white hover:-translate-y-1 transition duration-300">
                    <div class="flex items-center gap-4 mb-4">
                        <div
                            class="w-12 h-12 bg-slate-900 text-white rounded-2xl flex items-center justify-center font-black">
                            03
                        </div>

                        <h2 class="text-xl font-black text-slate-800">
                            Informasi Pendaftaran
                        </h2>
                    </div>

                    <p class="text-slate-600 leading-relaxed">
                        Jika event menyediakan pendaftaran, pengguna dapat mengikuti arahan yang tersedia pada detail
                        event. Pastikan data yang dimasukkan sudah benar sebelum dikirim.
                    </p>
                </div>

                <div
                    class="bg-white/90 backdrop-blur-xl rounded-3xl shadow-lg shadow-slate-300/50 p-7 border border-white hover:-translate-y-1 transition duration-300">
                    <div class="flex items-center gap-4 mb-4">
                        <div
                            class="w-12 h-12 bg-slate-900 text-white rounded-2xl flex items-center justify-center font-black">
                            04
                        </div>

                        <h2 class="text-xl font-black text-slate-800">
                            Menghubungi Admin
                        </h2>
                    </div>

                    <p class="text-slate-600 leading-relaxed">
                        Jika pengguna mengalami kendala atau membutuhkan informasi tambahan, silakan gunakan halaman
                        kontak untuk menghubungi admin AmikomEventHub.
                    </p>
                </div>

            </div>

        </div>

    </div>

@endsection