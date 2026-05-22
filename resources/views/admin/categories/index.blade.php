@extends('layouts.admin')

@section('page-title', 'Manajemen Kategori')
@section('page-subtitle', 'Kelola kategori event yang tersedia di platform')

@section('content')

    {{-- Action Bar --}}
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">

        <form method="GET" action="{{ route('admin.categories.index') }}" class="flex gap-3">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kategori..."
                class="border border-slate-200 bg-white rounded-2xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition">

            <button
                class="bg-slate-900 hover:bg-slate-800 text-white font-bold px-5 py-3 rounded-2xl transition text-sm shadow-sm">
                Search
            </button>
        </form>

        <a href="{{ route('admin.categories.create') }}"
            class="bg-slate-900 hover:bg-slate-800 text-white font-bold px-5 py-3 rounded-2xl transition text-sm shadow-sm">
            Tambah Kategori
        </a>
    </div>

    <p class="text-slate-500 text-sm mb-4">
        Menampilkan
        <span class="font-bold text-slate-800">
            {{ $categories->count() }}
        </span>
        kategori
    </p>

    {{-- Categories Table --}}
    <div class="bg-white rounded-[2rem] shadow-sm border border-slate-200 overflow-hidden">

        <table class="w-full text-sm">

            <thead class="bg-slate-50 border-b border-slate-200">
                <tr class="text-slate-500 uppercase text-xs tracking-wider">
                    <th class="px-6 py-4 text-left font-black">No</th>
                    <th class="px-6 py-4 text-left font-black">Nama Kategori</th>
                    <th class="px-6 py-4 text-left font-black">Slug</th>
                    <th class="px-6 py-4 text-left font-black">Jumlah Event</th>
                    <th class="px-6 py-4 text-left font-black">Created At</th>
                    <th class="px-6 py-4 text-left font-black">Updated At</th>
                    <th class="px-6 py-4 text-left font-black">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-100">

                @forelse ($categories as $category)

                    <tr class="hover:bg-slate-50/80 transition">

                        <td class="px-6 py-5 text-slate-400 font-medium">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-6 py-5">
                            <span class="bg-slate-100 text-slate-700 text-xs font-bold px-4 py-2 rounded-full">
                                {{ $category->name }}
                            </span>
                        </td>

                        <td class="px-6 py-5 text-slate-500">
                            {{ $category->slug ?? '-' }}
                        </td>

                        <td class="px-6 py-5 text-slate-500">
                            {{ $category->events_count ?? $category->events->count() }} event
                        </td>

                        <td class="px-6 py-5 text-slate-500">
                            {{ $category->created_at }}
                        </td>

                        <td class="px-6 py-5 text-slate-500">
                            {{ $category->updated_at }}
                        </td>

                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">

                                {{-- Edit --}}
                                <a href="{{ route('admin.categories.edit', $category->id) }}"
                                    class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center hover:bg-indigo-100 transition">

                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />

                                    </svg>

                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">

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
                        <td colspan="7" class="px-6 py-10 text-center text-slate-500">
                            Data kategori belum tersedia.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

@endsection