@extends('layouts.admin')

@section('title', 'Data Partner')

@section('content')

    <div class="min-h-screen bg-slate-100 p-6">

        <div class="max-w-7xl mx-auto">

            {{-- Header --}}
            <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">

                <div>
                    <h1 class="text-3xl font-black text-slate-900">
                        Data Partner
                    </h1>

                    <p class="text-slate-500 mt-1">
                        Kelola seluruh partner yang bekerja sama dengan platform.
                    </p>
                </div>

                <a href="{{ route('admin.partners.create') }}"
                    class="px-5 py-3 bg-slate-900 hover:bg-slate-800 text-white rounded-2xl font-bold transition shadow-sm text-sm">
                    Tambah Partner
                </a>

            </div>

            {{-- Search --}}
            <div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-5 mb-6">

                <form method="GET">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari partner..."
                        class="w-full border border-slate-200 bg-slate-50 px-5 py-4 rounded-2xl text-sm focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition">
                </form>

            </div>

            {{-- Table --}}
            <div class="bg-white rounded-[2rem] shadow-sm border border-slate-200 overflow-hidden">

                <table class="w-full text-sm">

                    <thead class="bg-slate-50 border-b border-slate-200">
                        <tr class="text-slate-500 uppercase text-xs tracking-wider">

                            <th class="px-6 py-4 text-left font-black">
                                ID
                            </th>

                            <th class="px-6 py-4 text-left font-black">
                                Logo
                            </th>

                            <th class="px-6 py-4 text-left font-black">
                                Nama Partner
                            </th>

                            <th class="px-6 py-4 text-left font-black">
                                Created At
                            </th>

                            <th class="px-6 py-4 text-left font-black">
                                Updated At
                            </th>

                            <th class="px-6 py-4 text-left font-black">
                                Aksi
                            </th>

                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @forelse ($partners as $partner)

                            <tr class="hover:bg-slate-50/70 transition">

                                <td class="px-6 py-5 text-slate-400 font-medium">
                                    #{{ $partner->id }}
                                </td>

                                <td class="px-6 py-5">

                                    @if ($partner->logo_url)

                                        <img src="{{ $partner->logo_url }}"
                                            class="w-16 h-16 rounded-2xl object-cover border border-slate-200 shadow-sm">

                                    @else

                                        <div
                                            class="w-16 h-16 rounded-2xl bg-slate-100 border border-slate-200 flex items-center justify-center text-xs font-bold text-slate-400">
                                            NO LOGO
                                        </div>

                                    @endif

                                </td>

                                <td class="px-6 py-5">

                                    <div class="font-bold text-slate-800">
                                        {{ $partner->name }}
                                    </div>

                                </td>

                                <td class="px-6 py-5 text-slate-500">
                                    {{ $partner->created_at }}
                                </td>

                                <td class="px-6 py-5 text-slate-500">
                                    {{ $partner->updated_at }}
                                </td>

                                <td class="px-6 py-5">

                                    <div class="flex items-center gap-3">

                                        {{-- Edit --}}
                                        <a href="{{ route('admin.partners.edit', $partner->id) }}"
                                            class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center hover:bg-indigo-100 transition">

                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />

                                            </svg>

                                        </a>

                                        {{-- Delete --}}
                                        <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin hapus partner ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="w-12 h-12 bg-rose-50 text-rose-600 rounded-2xl flex items-center justify-center hover:bg-rose-100 transition">

                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0H7m3-3h4a1 1 0 011 1v2H9V5a1 1 0 011-1z" />

                                                </svg>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="px-6 py-10 text-center text-slate-500">
                                    Data partner belum tersedia.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection