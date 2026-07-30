@extends('layouts.admin')

@section('title', 'Detail Organizer')

@section('content')

    <div class="max-w-7xl mx-auto">

        <div class="flex justify-between items-center mb-8">

            <div>

                <h1 class="text-3xl font-black">
                    Detail Organizer
                </h1>

                <p class="text-slate-500 mt-2">
                    Informasi lengkap organisasi beserta performa event.
                </p>

            </div>

            <div class="flex gap-3">

                <a href="{{ route('admin.organizers.edit', $organizer) }}"
                    class="px-6 py-3 rounded-xl bg-amber-500 text-white hover:bg-amber-600">

                    Edit

                </a>

                <a href="{{ route('admin.organizers.index') }}"
                    class="px-6 py-3 rounded-xl bg-slate-200 hover:bg-slate-300">

                    Kembali

                </a>

            </div>

        </div>


        <div class="grid lg:grid-cols-3 gap-8">

            <div>

                <div class="bg-white rounded-3xl border shadow-sm p-8">

                    @if($organizer->logo)

                        <img src="{{ asset('storage/' . $organizer->logo) }}"
                            class="w-full aspect-square rounded-3xl object-cover">

                    @else

                        <div class="w-full aspect-square rounded-3xl bg-slate-200 flex items-center justify-center">

                            <span class="text-slate-500">

                                Tidak ada Logo

                            </span>

                        </div>

                    @endif

                    <h2 class="text-2xl font-black mt-6">

                        {{ $organizer->name }}

                    </h2>

                    <p class="text-slate-500 mt-3">

                        {{ $organizer->description }}

                    </p>

                </div>

            </div>

            <div class="lg:col-span-2">

                <div class="grid md:grid-cols-2 gap-6 mb-8">

                    <div class="bg-white rounded-3xl shadow-sm border p-6">

                        <p class="text-slate-400 uppercase text-xs font-bold">

                            Owner

                        </p>

                        <h3 class="text-2xl font-black mt-2">

                            {{ $organizer->owner->name }}

                        </h3>

                        <p class="text-slate-500">

                            {{ $organizer->owner->email }}

                        </p>

                    </div>

                    <div class="bg-white rounded-3xl shadow-sm border p-6">

                        <p class="text-slate-400 uppercase text-xs font-bold">

                            Total Event

                        </p>

                        <h3 class="text-4xl font-black text-indigo-600 mt-2">

                            {{ $organizer->events->count() }}

                        </h3>

                    </div>

                </div>

                <div class="grid md:grid-cols-2 gap-6 mb-8">

                    <div class="bg-white rounded-3xl border shadow-sm p-6">

                        <p class="text-slate-400 uppercase text-xs font-bold">

                            Tiket Terjual

                        </p>

                        <h2 class="text-4xl font-black text-green-600 mt-2">

                            {{ $ticketsSold }}

                        </h2>

                    </div>

                    <div class="bg-white rounded-3xl border shadow-sm p-6">

                        <p class="text-slate-400 uppercase text-xs font-bold">

                            Total Pendapatan

                        </p>

                        <h2 class="text-4xl font-black text-indigo-600 mt-2">

                            Rp {{ number_format($totalRevenue, 0, ',', '.') }}

                        </h2>

                    </div>

                </div>

                <div class="bg-white rounded-3xl shadow-sm border overflow-hidden">

                    <div class="p-6 border-b">

                        <h3 class="text-xl font-black">

                            Daftar Event

                        </h3>

                    </div>

                    <table class="w-full">

                        <thead class="bg-slate-50">

                            <tr>

                                <th class="px-6 py-4 text-left">

                                    Event

                                </th>

                                <th class="px-6 py-4">

                                    Tanggal

                                </th>

                                <th class="px-6 py-4">

                                    Harga

                                </th>

                                <th class="px-6 py-4">

                                    Stok

                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($organizer->events as $event)

                                <tr class="border-t">

                                    <td class="px-6 py-5">

                                        <div class="font-bold">

                                            {{ $event->title }}

                                        </div>

                                        <div class="text-sm text-slate-500">

                                            {{ $event->location }}

                                        </div>

                                    </td>

                                    <td class="text-center">

                                        {{ $event->date->format('d M Y') }}

                                    </td>

                                    <td class="text-center">

                                        Rp {{ number_format($event->price, 0, ',', '.') }}

                                    </td>

                                    <td class="text-center">

                                        {{ $event->stock }}

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="4" class="text-center py-12 text-slate-500">

                                        Belum memiliki event.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

@endsection