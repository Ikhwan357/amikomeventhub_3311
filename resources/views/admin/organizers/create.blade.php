@extends('layouts.admin')

@section('title', 'Tambah Organizer')

@section('content')

    <div class="max-w-5xl mx-auto">

        <div class="flex justify-between items-center mb-8">

            <div>

                <h1 class="text-3xl font-black">
                    Tambah Organizer
                </h1>

                <p class="text-slate-500 mt-2">
                    Buat organisasi baru beserta akun organizer secara otomatis.
                </p>

            </div>

            <a href="{{ route('admin.organizers.index') }}"
                class="px-5 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 transition">

                ← Kembali

            </a>

        </div>

        @if ($errors->any())

            <div class="mb-6 bg-red-100 border border-red-300 rounded-xl p-5">

                <ul class="list-disc ml-5 text-red-700">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('admin.organizers.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="grid lg:grid-cols-3 gap-8">

                {{-- Logo --}}

                <div>

                    <div class="bg-white rounded-3xl shadow-sm border p-6">

                        <h3 class="font-bold mb-5">

                            Logo Organizer

                        </h3>

                        <img id="preview" src="https://placehold.co/300x300?text=Logo"
                            class="rounded-2xl w-full aspect-square object-cover border">

                        <input type="file" name="logo" id="logo" class="mt-5 w-full">

                    </div>

                </div>

                {{-- Form --}}

                <div class="lg:col-span-2">

                    <div class="bg-white rounded-3xl shadow-sm border p-8">

                        <h2 class="text-xl font-black mb-6">

                            Informasi Organizer

                        </h2>

                        <div class="mb-5">

                            <label class="font-semibold">

                                Nama Organizer

                            </label>

                            <input type="text" name="organization_name" value="{{ old('organization_name') }}"
                                class="mt-2 w-full rounded-xl border px-4 py-3" required>

                        </div>

                        <div class="mb-8">

                            <label class="font-semibold">

                                Deskripsi

                            </label>

                            <textarea name="description" rows="5"
                                class="mt-2 w-full rounded-xl border px-4 py-3">{{ old('description') }}</textarea>

                        </div>

                        <hr class="my-8">

                        <h2 class="text-xl font-black mb-6">

                            Akun Organizer

                        </h2>

                        <div class="grid md:grid-cols-2 gap-6">

                            <div>

                                <label class="font-semibold">

                                    Nama Owner

                                </label>

                                <input type="text" name="owner_name" value="{{ old('owner_name') }}"
                                    class="mt-2 w-full rounded-xl border px-4 py-3" required>

                            </div>

                            <div>

                                <label class="font-semibold">

                                    Email

                                </label>

                                <input type="email" name="owner_email" value="{{ old('owner_email') }}"
                                    class="mt-2 w-full rounded-xl border px-4 py-3" required>

                            </div>

                            <div>

                                <label class="font-semibold">

                                    Password

                                </label>

                                <input type="password" name="password" class="mt-2 w-full rounded-xl border px-4 py-3"
                                    required>

                            </div>

                            <div>

                                <label class="font-semibold">

                                    Konfirmasi Password

                                </label>

                                <input type="password" name="password_confirmation"
                                    class="mt-2 w-full rounded-xl border px-4 py-3" required>

                            </div>

                        </div>

                        <div class="mt-10 flex justify-end gap-4">

                            <a href="{{ route('admin.organizers.index') }}"
                                class="px-6 py-3 rounded-xl bg-slate-200 hover:bg-slate-300">

                                Batal

                            </a>

                            <button class="px-8 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-bold">

                                Simpan Organizer

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </form>

    </div>

    <script>

        document
            .getElementById('logo')
            .addEventListener('change', function (e) {

                const reader = new FileReader();

                reader.onload = function () {

                    document
                        .getElementById('preview')
                        .src = reader.result;

                }

                reader.readAsDataURL(e.target.files[0]);

            });

    </script>

@endsection