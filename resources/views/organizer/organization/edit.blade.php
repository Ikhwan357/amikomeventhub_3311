@extends('layouts.organizer')

@section('title', 'Profil Organisasi')

@section('content')

    <div class="max-w-5xl mx-auto">

        <div class="mb-8">

            <h1 class="text-3xl font-bold">
                Profil Organisasi
            </h1>

            <p class="text-slate-500 mt-2">
                Kelola informasi organisasi Anda.
            </p>

        </div>

        @if(session('success'))
            <div class="mb-6 p-4 rounded-xl bg-green-100 text-green-700 border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('organizer.organization.update') }}" method="POST" enctype="multipart/form-data"
            class="bg-white rounded-3xl shadow-lg p-8 space-y-8">

            @csrf
            @method('PUT')

            <div class="grid md:grid-cols-2 gap-8">

                <div>

                    <label class="block font-semibold mb-2">
                        Nama Organisasi
                    </label>

                    <input type="text" name="name" value="{{ old('name', $organization->name) }}"
                        class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500">

                    @error('name')
                        <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                    @enderror

                </div>

                <div>

                    <label class="block font-semibold mb-2">
                        Logo Organisasi
                    </label>

                    <input type="file" name="logo" class="w-full">

                    @error('logo')
                        <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                    @enderror

                    @if($organization->logo)

                        <img src="{{ asset('storage/' . $organization->logo) }}" class="mt-5 w-36 rounded-xl border shadow">

                    @endif

                </div>

            </div>

            <div>

                <label class="block font-semibold mb-2">
                    Deskripsi Organisasi
                </label>

                <textarea name="description" rows="6"
                    class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500">{{ old('description', $organization->description) }}</textarea>

                @error('description')
                    <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                @enderror

            </div>

            <div>

                <button type="submit" class="bg-slate-900 hover:bg-slate-800 text-white px-6 py-3 rounded-xl font-semibold">

                    Simpan Perubahan

                </button>

            </div>

        </form>

    </div>

@endsection