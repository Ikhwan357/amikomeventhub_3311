<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Organizer Panel')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 20px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        .nav-link {
            position: relative;
        }

        .nav-link.active::before {
            content: "";
            position: absolute;
            left: -20px;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 24px;
            border-radius: 0 4px 4px 0;
            background: #6366f1;
        }
    </style>

    @yield('styles')

</head>

<body class="bg-slate-100">

    <div class="flex min-h-screen">

        <!-- ===================== -->
        <!-- SIDEBAR -->
        <!-- ===================== -->

        <aside class="w-72 bg-slate-950 text-white flex flex-col fixed inset-y-0 left-0 overflow-y-auto">

            <div class="px-8 py-7 border-b border-slate-800/80">

                <div class="flex items-center gap-3">

                    <div
                        class="w-12 h-12 rounded-2xl bg-white flex items-center justify-center text-slate-900 font-black shadow-lg shadow-black/20">

                        AH

                    </div>

                    <div>

                        <h1 class="font-black text-xl tracking-tight">

                            AmikomEventHub

                        </h1>

                        <p class="text-xs text-slate-400 font-medium">

                            Organizer Panel

                        </p>

                    </div>

                </div>

            </div>

            <!-- USER -->

            <div class="px-8 py-6 border-b border-slate-800/80">

                <div class="flex items-center gap-4">

                    <img src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}"
                        class="w-14 h-14 rounded-full object-cover ring-2 ring-slate-700 ring-offset-2 ring-offset-slate-950">

                    <div class="min-w-0">

                        <h2 class="font-bold truncate">

                            {{ Auth::user()->name }}

                        </h2>

                        <p class="text-sm text-slate-400 truncate">

                            {{ Auth::user()->email }}

                        </p>

                        <span
                            class="inline-flex items-center gap-1.5 mt-2 bg-emerald-600 text-xs font-semibold px-3 py-1 rounded-full">

                            <span class="w-1.5 h-1.5 rounded-full bg-white"></span>

                            Organizer

                        </span>

                    </div>

                </div>

            </div>

            <!-- MENU -->

            <nav class="flex-1 px-5 py-6 space-y-1.5">

                <p class="px-5 pb-2 text-xs font-bold uppercase tracking-wider text-slate-500">
                    Menu Utama
                </p>

                <a href="{{ route('organizer.dashboard') }}"
                    class="nav-link {{ request()->routeIs('organizer.dashboard') ? 'active bg-indigo-600 text-white shadow-lg shadow-indigo-950/40' : 'text-slate-300 hover:bg-slate-900 hover:text-white' }} flex items-center gap-3 px-5 py-3 rounded-xl font-medium transition-all duration-200">

                    <svg class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="12" width="4" height="8" rx="1"></rect>
                        <rect x="10" y="7" width="4" height="13" rx="1"></rect>
                        <rect x="17" y="3" width="4" height="17" rx="1"></rect>
                    </svg>
                    Dashboard

                </a>

                <a href="{{ route('organizer.events.index') }}"
                    class="nav-link {{ request()->routeIs('organizer.events.*') ? 'active bg-indigo-600 text-white shadow-lg shadow-indigo-950/40' : 'text-slate-300 hover:bg-slate-900 hover:text-white' }} flex items-center gap-3 px-5 py-3 rounded-xl font-medium transition-all duration-200">

                    <svg class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M3 9a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v1.5a1.5 1.5 0 0 0 0 3V15a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-1.5a1.5 1.5 0 0 0 0-3V9z">
                        </path>
                        <line x1="10" y1="6" x2="10" y2="18" stroke-dasharray="2 2"></line>
                    </svg>
                    Kelola Event

                </a>

                <a href="{{ route('organizer.organization.edit') }}"
                    class="nav-link {{ request()->routeIs('organizer.organization.*') ? 'active bg-indigo-600 text-white shadow-lg shadow-indigo-950/40' : 'text-slate-300 hover:bg-slate-900 hover:text-white' }} flex items-center gap-3 px-5 py-3 rounded-xl font-medium transition-all duration-200">

                    <svg class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 21V5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v16"></path>
                        <path d="M16 10h4a1 1 0 0 1 1 1v10"></path>
                        <line x1="8" y1="7" x2="8" y2="7.01"></line>
                        <line x1="12" y1="7" x2="12" y2="7.01"></line>
                        <line x1="8" y1="11" x2="8" y2="11.01"></line>
                        <line x1="12" y1="11" x2="12" y2="11.01"></line>
                        <line x1="8" y1="15" x2="8" y2="15.01"></line>
                        <line x1="12" y1="15" x2="12" y2="15.01"></line>
                    </svg>
                    Profil Organisasi

                </a>

                <a href="{{ route('organizer.reviews.index') }}"
                    class="nav-link {{ request()->routeIs('organizer.reviews.*') ? 'active bg-indigo-600 text-white shadow-lg shadow-indigo-950/40' : 'text-slate-300 hover:bg-slate-900 hover:text-white' }} flex items-center gap-3 px-5 py-3 rounded-xl font-medium transition-all duration-200">

                    <svg class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon
                            points="12 2.5 15.09 8.76 22 9.77 17 14.64 18.18 21.52 12 18.27 5.82 21.52 7 14.64 2 9.77 8.91 8.76 12 2.5">
                        </polygon>
                    </svg>
                    Ulasan & Rating

                </a>

            </nav>

            <!-- FOOTER -->

            <div class="border-t border-slate-800/80 p-5 space-y-2.5">

                <a href="{{ route('home') }}"
                    class="flex items-center justify-center gap-2 text-center py-3 rounded-xl bg-slate-800 hover:bg-slate-700 transition-colors duration-200 font-medium text-sm">

                    <svg class="w-4 h-4 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="19" y1="12" x2="5" y2="12"></line>
                        <polyline points="12 19 5 12 12 5"></polyline>
                    </svg>
                    Kembali ke Website

                </a>

                <form action="{{ route('logout') }}" method="POST">

                    @csrf

                    <button
                        class="w-full flex items-center justify-center gap-2 py-3 rounded-xl bg-red-600 hover:bg-red-700 active:bg-red-800 transition-colors duration-200 font-semibold text-sm shadow-lg shadow-red-950/30">

                        Logout

                    </button>

                </form>

            </div>

        </aside>

        <!-- ===================== -->
        <!-- CONTENT -->
        <!-- ===================== -->

        <div class="flex-1 flex flex-col ml-72">

            <!-- HEADER -->

            <header
                class="bg-white/90 backdrop-blur border-b sticky top-0 z-10 px-10 py-6 flex justify-between items-center">

                <div>

                    <h1 class="text-3xl font-black tracking-tight text-slate-900">

                        @yield('title')

                    </h1>

                    <p class="text-slate-500 mt-1">

                        Selamat datang kembali,
                        <span class="font-semibold text-slate-700">{{ Auth::user()->name }}</span>

                    </p>

                </div>

                <div>

                    @php

                        $organization = Auth::user()->organization;

                    @endphp

                    @if($organization)

                        <div class="text-right bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3">

                            <h3 class="font-bold text-slate-900">

                                {{ $organization->name }}

                            </h3>

                            <p class="text-sm text-slate-500">

                                Organizer

                            </p>

                        </div>

                    @endif

                </div>

            </header>

            <!-- PAGE -->

            <main class="flex-1 p-10">

                @if(session('success'))

                    <div
                        class="mb-8 flex items-start gap-3 bg-green-50 border border-green-300 text-green-700 px-6 py-4 rounded-2xl">

                        <svg class="w-5 h-5 flex-shrink-0 mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="9"></circle>
                            <polyline points="8 12.5 11 15.5 16 9"></polyline>
                        </svg>

                        <span class="font-medium">{{ session('success') }}</span>

                    </div>

                @endif

                @yield('content')

            </main>

        </div>

    </div>

    @yield('scripts')

</body>

</html>