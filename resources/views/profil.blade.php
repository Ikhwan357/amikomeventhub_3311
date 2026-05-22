@extends('layouts.app')

@section('title', 'Profil - AmikomEventHub')

@section('content')

    <div class="bg-gradient-to-br from-indigo-50 via-white to-slate-100 min-h-screen">

        <div class="container mx-auto px-6 py-16">

            <div class="text-center mb-14">
                <span
                    class="px-5 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-black uppercase tracking-wider shadow-sm">
                    My Profile
                </span>

                <h1 class="text-5xl font-black text-slate-900 mt-5">
                    Profil Praktikan
                </h1>

                <p class="text-slate-500 mt-3 text-lg">
                    Informasi singkat mengenai praktikan AmikomEventHub.
                </p>
            </div>

            <div
                class="max-w-4xl mx-auto bg-white/90 backdrop-blur-xl rounded-[2.5rem] shadow-2xl shadow-indigo-200/70 border border-white overflow-hidden">

                <div class="grid grid-cols-1 md:grid-cols-2">

                    <div
                        class="bg-gradient-to-br from-indigo-700 via-purple-700 to-slate-950 p-10 text-white flex flex-col justify-center items-center relative overflow-hidden">

                        <div class="absolute -top-16 -right-16 w-56 h-56 bg-white opacity-10 rounded-full blur-3xl"></div>
                        <div class="absolute -bottom-16 -left-16 w-56 h-56 bg-indigo-300 opacity-20 rounded-full blur-3xl">
                        </div>

                        <div class="relative z-10 text-center">

                            <div
                                class="w-44 h-44 rounded-full border-8 border-white overflow-hidden mx-auto shadow-2xl bg-white ring-8 ring-white/20">
                                <img src="{{ asset('assets/profil.JPG') }}" alt="Foto Profil"
                                    class="w-full h-full object-cover">
                            </div>

                            <h2 class="text-3xl font-black mt-6">
                                Ikhwan Abdillah
                            </h2>

                            <p class="text-indigo-200 mt-2 font-medium">
                                Sistem Informasi
                            </p>

                            <div class="mt-8 flex justify-center gap-4">

                                <div
                                    class="bg-white/15 backdrop-blur px-5 py-4 rounded-2xl border border-white/20 shadow-lg">
                                    <p class="text-xs uppercase tracking-wider text-indigo-200">
                                        Status
                                    </p>

                                    <p class="font-black">
                                        Mahasiswa
                                    </p>
                                </div>

                                <div
                                    class="bg-white/15 backdrop-blur px-5 py-4 rounded-2xl border border-white/20 shadow-lg">
                                    <p class="text-xs uppercase tracking-wider text-indigo-200">
                                        Angkatan
                                    </p>

                                    <p class="font-black">
                                        2024
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="p-10 bg-white">

                        <h3 class="text-2xl font-black text-slate-800 mb-8">
                            Informasi Detail
                        </h3>

                        <div class="space-y-6">

                            <div
                                class="bg-slate-50 rounded-2xl p-5 border border-slate-100 shadow-sm hover:shadow-md transition">
                                <p class="text-xs font-black uppercase tracking-wider text-slate-400 mb-2">
                                    Nama Lengkap
                                </p>

                                <p class="text-xl font-bold text-slate-800">
                                    Ikhwan Abdillah
                                </p>
                            </div>

                            <div
                                class="bg-slate-50 rounded-2xl p-5 border border-slate-100 shadow-sm hover:shadow-md transition">
                                <p class="text-xs font-black uppercase tracking-wider text-slate-400 mb-2">
                                    NIM
                                </p>

                                <p class="text-xl font-bold text-slate-800">
                                    24.12.3311
                                </p>
                            </div>

                            <div
                                class="bg-slate-50 rounded-2xl p-5 border border-slate-100 shadow-sm hover:shadow-md transition">
                                <p class="text-xs font-black uppercase tracking-wider text-slate-400 mb-2">
                                    Jurusan
                                </p>

                                <p class="text-xl font-bold text-slate-800">
                                    Sistem Informasi
                                </p>
                            </div>

                            <div
                                class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-2xl p-6 border border-indigo-100 mt-8 shadow-sm">
                                <p class="text-indigo-700 font-black">
                                    Tentang
                                </p>

                                <p class="text-slate-600 mt-2 leading-relaxed">
                                    Mahasiswa Universitas Amikom Yogyakarta yang memiliki minat
                                    pada pengembangan web, UI/UX, dan teknologi digital modern.
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection