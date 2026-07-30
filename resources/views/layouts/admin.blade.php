<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - AmikomEventHub')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-100 text-slate-900 flex min-h-screen">

    <!-- ===== SIDEBAR ===== -->
    <aside
        class="w-72 bg-slate-950 text-slate-300 flex flex-col p-6 space-y-8 sticky top-0 h-screen border-r border-slate-800">

        <div class="flex items-center gap-3">
            <div
                class="w-11 h-11 bg-white rounded-2xl flex items-center justify-center text-slate-950 font-black text-sm">
                AH
            </div>

            <div>
                <span class="block text-xl font-black text-white tracking-tight">
                    AmikomEventHub
                </span>

                <span class="text-xs text-slate-500 font-semibold">
                    Super Admin
                </span>
            </div>
        </div>

        <nav class="flex-1 space-y-2">
            <p class="text-[11px] font-black uppercase tracking-widest text-slate-500 mb-4 px-2">
                Main Menu
            </p>

            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-2xl font-bold transition
                {{ request()->routeIs('admin.dashboard') ? 'bg-white text-slate-950 shadow-lg' : 'text-slate-400 hover:bg-slate-900 hover:text-white' }}">
                <svg class="w-5 h-5 {{ request()->routeIs('admin.dashboard') ? 'text-slate-950' : 'text-slate-500' }}"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                    </path>
                </svg>
                Dashboard
            </a>

            <a href="{{ route('admin.events.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-2xl font-bold transition
                {{ request()->routeIs('admin.events.*') ? 'bg-white text-slate-950 shadow-lg' : 'text-slate-400 hover:bg-slate-900 hover:text-white' }}">
                <svg class="w-5 h-5 {{ request()->routeIs('admin.events.*') ? 'text-slate-950' : 'text-slate-500' }}"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
                Kelola Event
            </a>

            <a href="{{ route('admin.categories.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-2xl font-bold transition
                {{ request()->routeIs('admin.categories.*') ? 'bg-white text-slate-950 shadow-lg' : 'text-slate-400 hover:bg-slate-900 hover:text-white' }}">
                <svg class="w-5 h-5 {{ request()->routeIs('admin.categories.*') ? 'text-slate-950' : 'text-slate-500' }}"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
                Kelola Kategori
            </a>

            <a href="{{ route('admin.organizers.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-2xl font-bold transition
    {{ request()->routeIs('admin.organizers.*') ? 'bg-white text-slate-950 shadow-lg' : 'text-slate-400 hover:bg-slate-900 hover:text-white' }}">

                <svg class="w-5 h-5 {{ request()->routeIs('admin.organizers.*') ? 'text-slate-950' : 'text-slate-500' }}"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5V4H2v16h5m10 0v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5m10 0H7" />

                </svg>

                <span>Kelola Organizer</span>

            </a>

            <a href="{{ route('admin.partners.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-2xl font-bold transition
                {{ request()->routeIs('admin.partners.*') ? 'bg-white text-slate-950 shadow-lg' : 'text-slate-400 hover:bg-slate-900 hover:text-white' }}">
                <svg class="w-5 h-5 {{ request()->routeIs('admin.partners.*') ? 'text-slate-950' : 'text-slate-500' }}"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-4a4 4 0 100-8 4 4 0 000 8z">
                    </path>
                </svg>
                Kelola Partner
            </a>

            <a href="{{ route('admin.transactions.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-2xl font-bold transition
                {{ request()->routeIs('admin.transactions.*') ? 'bg-white text-slate-950 shadow-lg' : 'text-slate-400 hover:bg-slate-900 hover:text-white' }}">
                <svg class="w-5 h-5 {{ request()->routeIs('admin.transactions.*') ? 'text-slate-950' : 'text-slate-500' }}"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                    </path>
                </svg>
                Laporan Transaksi
            </a>
        </nav>

        <div class="pt-6 border-t border-slate-800">

            <div class="px-4 mb-5">

                <p class="text-white font-bold">
                    {{ Auth::user()->name }}
                </p>

                <p class="text-slate-500 text-sm">
                    {{ ucfirst(Auth::user()->role) }}
                </p>

            </div>

            <a href="{{ route('home') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-400 hover:bg-slate-900 hover:text-white transition font-bold">

                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7m-9 9V9m0 0H5m7 0h7">
                    </path>

                </svg>

                Website

            </a>

            <form action="{{ route('logout') }}" method="POST" class="mt-2">

                @csrf

                <button type="submit"
                    class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl text-red-400 hover:bg-red-600 hover:text-white transition font-bold">

                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />

                    </svg>

                    Logout

                </button>

            </form>

        </div>

    </aside>

    <!-- ===== KONTEN ADMIN ===== -->
    <main class="flex-1 p-8 lg:p-10 overflow-y-auto">
        <div class="max-w-7xl mx-auto">
            @yield('content')
        </div>
    </main>

</body>

</html>