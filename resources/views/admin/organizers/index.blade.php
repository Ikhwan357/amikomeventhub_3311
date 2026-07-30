@extends('layouts.admin')

@section('title', 'Kelola Organizer')

@section('content')

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-black">

                Kelola Organizer

            </h1>

            <p class="text-slate-500">

                Daftar seluruh organizer yang terdaftar.

            </p>

        </div>

        <a href="{{ route('admin.organizers.create') }}"
            class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl font-bold">

            + Tambah Organizer

        </a>

    </div>


    @if(session('success'))

        <div class="mb-6 bg-green-100 text-green-700 rounded-xl p-4">

            {{ session('success') }}

        </div>

    @endif


    <div class="bg-white rounded-3xl shadow-sm border overflow-hidden">

        <table class="w-full">

            <thead class="bg-slate-50">

                <tr>

                    <th class="px-6 py-4 text-left">Logo</th>

                    <th class="px-6 py-4 text-left">Organizer</th>

                    <th class="px-6 py-4 text-left">Owner</th>

                    <th class="px-6 py-4 text-left">Email</th>

                    <th class="px-6 py-4 text-center">Event</th>

                    <th class="px-6 py-4 text-center">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($organizations as $organization)

                    <tr class="border-t">

                        <td class="px-6 py-4">

                            @if($organization->logo)

                                <img src="{{ asset('storage/' . $organization->logo) }}" class="w-14 h-14 rounded-xl object-cover">

                            @else

                                <div class="w-14 h-14 rounded-xl bg-slate-200"></div>

                            @endif

                        </td>

                        <td class="px-6 py-4">

                            <div class="font-bold">

                                {{ $organization->name }}

                            </div>

                            <div class="text-sm text-slate-500">

                                {{ Str::limit($organization->description, 40) }}

                            </div>

                        </td>

                        <td class="px-6 py-4">

                            {{ $organization->owner->name ?? '-' }}

                        </td>

                        <td class="px-6 py-4">

                            {{ $organization->owner->email ?? '-' }}

                        </td>

                        <td class="px-6 py-4 text-center">

                            {{ $organization->events->count() }}

                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-center gap-2">

                                <a href="{{ route('admin.organizers.show', $organization) }}"
                                    class="bg-sky-500 text-white px-3 py-2 rounded-lg">

                                    Detail

                                </a>

                                <a href="{{ route('admin.organizers.edit', $organization) }}"
                                    class="bg-amber-500 text-white px-3 py-2 rounded-lg">

                                    Edit

                                </a>

                                <form action="{{ route('admin.organizers.destroy', $organization) }}" method="POST">

                                    @csrf

                                    @method('DELETE')

                                    <button onclick="return confirm('Hapus organizer ini?')"
                                        class="bg-red-500 text-white px-3 py-2 rounded-lg">

                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center py-12 text-slate-500">

                            Belum ada organizer.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-8">

        {{ $organizations->links() }}

    </div>

@endsection