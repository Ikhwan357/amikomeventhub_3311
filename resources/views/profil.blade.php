@extends('layouts.app')

@section('title', 'Profil - AmikomEventHub')

@section('content')

    @php
        $user = Auth::user();
    @endphp

    <div class="bg-gradient-to-br from-indigo-50 via-white to-slate-100 min-h-screen">

        <div class="container mx-auto px-6 py-16">

            <div class="text-center mb-14">
                <span
                    class="px-5 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-black uppercase tracking-wider shadow-sm">
                    My Profile
                </span>

                <h1 class="text-5xl font-black text-slate-900 mt-5">
                    Profil Saya
                </h1>

                <p class="text-slate-500 mt-3 text-lg">
                    Informasi akun Anda di AmikomEventHub.
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
                                <img src="{{ $user->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&size=256' }}"
                                    alt="Foto Profil" class="w-full h-full object-cover">
                            </div>

                            <h2 class="text-3xl font-black mt-6">
                                {{ $user->name }}
                            </h2>

                            <p class="text-indigo-200 mt-2 font-medium">
                                {{ $user->email }}
                            </p>

                            <div class="mt-8 flex justify-center">

                                <div
                                    class="bg-white/15 backdrop-blur px-6 py-4 rounded-2xl border border-white/20 shadow-lg">
                                    <p class="text-xs uppercase tracking-wider text-indigo-200">
                                        Status Akun
                                    </p>

                                    <p class="font-black text-lg">
                                        {{ ucfirst($user->role ?? 'Pengguna') }}
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
                                    {{ $user->name }}
                                </p>
                            </div>

                            <div
                                class="bg-slate-50 rounded-2xl p-5 border border-slate-100 shadow-sm hover:shadow-md transition">
                                <p class="text-xs font-black uppercase tracking-wider text-slate-400 mb-2">
                                    Email
                                </p>

                                <p class="text-xl font-bold text-slate-800 truncate">
                                    {{ $user->email }}
                                </p>
                            </div>

                            <div
                                class="bg-slate-50 rounded-2xl p-5 border border-slate-100 shadow-sm hover:shadow-md transition">
                                <p class="text-xs font-black uppercase tracking-wider text-slate-400 mb-2">
                                    Status Akun
                                </p>

                                <p class="text-xl font-bold text-slate-800">
                                    {{ ucfirst($user->role ?? 'Pengguna') }}
                                </p>
                            </div>

                            <div
                                class="bg-slate-50 rounded-2xl p-5 border border-slate-100 shadow-sm hover:shadow-md transition">
                                <p class="text-xs font-black uppercase tracking-wider text-slate-400 mb-2">
                                    Bergabung Sejak
                                </p>

                                <p class="text-xl font-bold text-slate-800">
                                    {{ $user->created_at->format('d F Y') }}
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection