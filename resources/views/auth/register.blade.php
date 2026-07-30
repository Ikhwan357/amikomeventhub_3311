@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div
    class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-slate-100 flex items-center justify-center px-6 py-16">

    <div class="grid lg:grid-cols-2 max-w-6xl w-full bg-white rounded-[2rem] shadow-2xl overflow-hidden">

        <!-- LEFT -->
        <div class="hidden lg:flex bg-indigo-600 text-white p-12 flex-col justify-center">

            <span class="uppercase tracking-widest font-bold text-indigo-200">
                AmikomEventHub
            </span>

            <h1 class="text-5xl font-black mt-6 leading-tight">
                Bergabung Bersama Kami
            </h1>

            <p class="mt-6 text-indigo-100 leading-relaxed">
                Buat akun baru untuk mulai menjelajahi berbagai event menarik,
                membeli tiket, dan mengelola riwayat transaksi Anda.
            </p>

            <img src="/assets/concert.png" class="mt-10 rounded-3xl shadow-xl" alt="Concert">

        </div>

        <!-- RIGHT -->
        <div class="p-10 lg:p-14">

            <h2 class="text-4xl font-black text-slate-800 mb-2">
                Register
            </h2>

            <p class="text-slate-500 mb-8">
                Lengkapi data berikut untuk membuat akun.
            </p>

            @if ($errors->any())

            <div class="mb-6 rounded-xl bg-red-100 border border-red-300 text-red-700 px-4 py-3">

                <ul class="list-disc ml-5">

                    @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

            @endif

            <form method="POST" action="{{ route('register.store') }}">

                @csrf

                <div class="mb-5">

                    <label class="font-semibold text-slate-700">
                        Nama Lengkap
                    </label>

                    <input type="text" name="name" value="{{ old('name') }}" required
                        placeholder="Masukkan nama lengkap"
                        class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none">

                </div>

                <div class="mb-5">

                    <label class="font-semibold text-slate-700">
                        Email
                    </label>

                    <input type="email" name="email" value="{{ old('email') }}" required placeholder="Masukkan email"
                        class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none">

                </div>

                <div class="mb-5">

                    <label class="font-semibold text-slate-700">
                        Password
                    </label>

                    <input type="password" name="password" required placeholder="Minimal 8 karakter"
                        class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none">

                </div>

                <div class="mb-6">

                    <label class="font-semibold text-slate-700">
                        Konfirmasi Password
                    </label>

                    <input type="password" name="password_confirmation" required placeholder="Ulangi password"
                        class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none">

                </div>

                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-xl font-bold transition">

                    Register

                </button>

            </form>

            <!-- Divider -->

            <div class="flex items-center my-8">

                <div class="flex-1 border-t border-slate-300"></div>

                <span class="mx-4 text-slate-500 text-sm font-semibold">
                    ATAU
                </span>

                <div class="flex-1 border-t border-slate-300"></div>

            </div>

            <!-- Google -->

            <a href="{{ route('google.login') }}"
                class="flex items-center justify-center gap-3 border border-slate-300 rounded-xl py-3 hover:bg-slate-100 transition">

                <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-6 h-6">

                <span class="font-semibold text-slate-700">

                    Continue with Google

                </span>

            </a>

            <div class="text-center mt-8">

                <p class="text-slate-500">

                    Sudah punya akun?

                    <a href="{{ route('login') }}" class="text-indigo-600 font-bold hover:underline">

                        Login

                    </a>

                </p>

            </div>

        </div>

    </div>

</div>
@endsection