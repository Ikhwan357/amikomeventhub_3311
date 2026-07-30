@extends('layouts.app')

@section('title', 'Beri Review')

@section('content')

<div class="max-w-3xl mx-auto py-16 px-6">

    <div class="bg-white rounded-3xl shadow-xl p-10">

        <h1 class="text-3xl font-black text-slate-800 mb-2">
            Berikan Penilaian
        </h1>

        <p class="text-slate-500 mb-8">
            Bagikan pengalamanmu mengikuti event ini.
        </p>

        <div class="mb-8 p-6 rounded-2xl bg-slate-50">

            <h2 class="font-bold text-xl">
                {{ $transaction->event->title }}
            </h2>

            <p class="text-slate-500 mt-2">
                {{ $transaction->event->location }}
            </p>

            <p class="text-slate-500">
                {{ $transaction->event->date->format('d M Y H:i') }}
            </p>

        </div>

        <form action="{{ route('reviews.store', $transaction) }}" method="POST">

            @csrf

            <div class="mb-8">

                <label class="block font-bold mb-4">
                    Rating
                </label>

                <div class="flex gap-2">

                    @for($i=1;$i<=5;$i++)

                        <label>

                            <input
                                type="radio"
                                name="rating"
                                value="{{ $i }}"
                                class="hidden peer"
                                {{ old('rating') == $i ? 'checked' : '' }}>
                            <span
                                class="text-5xl cursor-pointer transition peer-checked:text-yellow-400 text-gray-300 hover:text-yellow-400">
                                ★
                            </span>

                        </label>

                    @endfor

                </div>

                @error('rating')

                    <p class="text-red-500 mt-2">
                        {{ $message }}
                    </p>

                @enderror

            </div>

            <div class="mb-8">

                <label class="block font-bold mb-3">

                    Ulasan

                </label>

                <textarea
                    name="review"
                    rows="6"
                    class="w-full border rounded-2xl p-4 focus:ring-2 focus:ring-indigo-500"
                    placeholder="Ceritakan pengalamanmu..."
                >{{ old('review') }}</textarea>

                @error('review')

                    <p class="text-red-500 mt-2">

                        {{ $message }}

                    </p>

                @enderror

            </div>

            <div class="flex gap-4">

                <button
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-2xl font-bold">

                    Kirim Review

                </button>

                <a
                    href="{{ route('ticket',$transaction->id) }}"
                    class="px-8 py-3 rounded-2xl bg-slate-200 hover:bg-slate-300 font-bold">

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

@endsection