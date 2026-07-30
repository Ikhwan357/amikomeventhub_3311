@extends('layouts.organizer')

@section('title', 'Ulasan & Rating')

@section('content')

    <div class="container mx-auto px-6 py-10">

        <!-- Header -->
        <div class="mb-10">
            <h1 class="text-4xl font-bold text-gray-800">
                Ulasan & Rating
            </h1>

            <p class="mt-2 text-gray-500">
                Rekam jejak penilaian dari peserta event Anda.
            </p>
        </div>

        <!-- Summary -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-10">

            <!-- Average Rating Card -->
            <div
                class="bg-white rounded-2xl shadow-md border border-gray-100 p-8 flex flex-col items-center justify-center text-center">

                <p class="text-6xl font-black text-gray-800">
                    {{ number_format($averageRating ?? 0, 1) }}
                </p>

                <div class="flex items-center gap-1 mt-3">
                    @for ($i = 1; $i <= 5; $i++)
                        <svg class="w-6 h-6 {{ $i <= round($averageRating ?? 0) ? 'text-yellow-400' : 'text-gray-200' }}"
                            fill="currentColor" viewBox="0 0 24 24">
                            <polygon
                                points="12 2.5 15.09 8.76 22 9.77 17 14.64 18.18 21.52 12 18.27 5.82 21.52 7 14.64 2 9.77 8.91 8.76 12 2.5" />
                        </svg>
                    @endfor
                </div>

                <p class="text-gray-500 text-sm mt-3 font-medium">
                    Dari {{ $totalReviews }} ulasan
                </p>
            </div>

            <!-- Rating Breakdown -->
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-8 lg:col-span-2">

                <h3 class="font-semibold text-gray-700 mb-5">
                    Distribusi Penilaian
                </h3>

                <div class="space-y-3">
                    @foreach ($ratingBreakdown as $star => $data)
                        <div class="flex items-center gap-3">

                            <span class="text-sm font-semibold text-gray-600 w-12 flex items-center gap-1">
                                {{ $star }}
                                <svg class="w-3.5 h-3.5 text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                                    <polygon
                                        points="12 2.5 15.09 8.76 22 9.77 17 14.64 18.18 21.52 12 18.27 5.82 21.52 7 14.64 2 9.77 8.91 8.76 12 2.5" />
                                </svg>
                            </span>

                            <div class="flex-1 h-2.5 bg-gray-100 rounded-full overflow-hidden">
                                <div class="h-full bg-yellow-400 rounded-full" style="width: {{ $data['percentage'] }}%"></div>
                            </div>

                            <span class="text-sm text-gray-500 w-10 text-right">
                                {{ $data['count'] }}
                            </span>

                        </div>
                    @endforeach
                </div>

            </div>

        </div>

        <!-- Review List -->
        <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">

            <div class="px-6 py-5 border-b bg-gray-50">
                <h2 class="text-2xl font-semibold text-gray-800">
                    Semua Ulasan
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Ulasan yang diberikan peserta setelah event selesai.
                </p>
            </div>

            <div class="divide-y divide-gray-100">

                @forelse ($reviews as $review)

                    <div class="px-6 py-6 hover:bg-gray-50 transition">

                        <div class="flex items-start justify-between gap-4">

                            <div class="flex items-start gap-4">

                                <img src="{{ $review->user->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($review->user->name ?? 'User') }}"
                                    class="w-12 h-12 rounded-full object-cover">

                                <div>
                                    <h3 class="font-semibold text-gray-800">
                                        {{ $review->user->name ?? 'Pengguna' }}
                                    </h3>

                                    <p class="text-sm text-gray-500">
                                        {{ $review->event->title ?? 'Event' }}
                                    </p>

                                    <div class="flex items-center gap-0.5 mt-2">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-200' }}"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <polygon
                                                    points="12 2.5 15.09 8.76 22 9.77 17 14.64 18.18 21.52 12 18.27 5.82 21.52 7 14.64 2 9.77 8.91 8.76 12 2.5" />
                                            </svg>
                                        @endfor
                                    </div>
                                </div>

                            </div>

                            <span class="text-sm text-gray-400 whitespace-nowrap">
                                {{ $review->created_at->format('d M Y') }}
                            </span>

                        </div>

                        @if ($review->review)
                            <p class="text-gray-600 mt-4 leading-relaxed">
                                {{ $review->review }}
                            </p>
                        @endif

                    </div>

                @empty

                    <div class="py-16 text-center">

                        <div class="flex flex-col items-center">

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-gray-300 mb-4" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <polygon stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    points="12 2.5 15.09 8.76 22 9.77 17 14.64 18.18 21.52 12 18.27 5.82 21.52 7 14.64 2 9.77 8.91 8.76 12 2.5" />
                            </svg>

                            <h3 class="text-lg font-semibold text-gray-700">
                                Belum ada ulasan
                            </h3>

                            <p class="text-gray-500 mt-1">
                                Ulasan dari peserta event Anda akan muncul di sini.
                            </p>

                        </div>

                    </div>

                @endforelse

            </div>

            @if ($reviews->hasPages())
                <div class="px-6 py-5 border-t bg-gray-50">
                    {{ $reviews->links() }}
                </div>
            @endif

        </div>

    </div>

@endsection