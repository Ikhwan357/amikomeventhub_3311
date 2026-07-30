<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AmikomEventHub')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }
    </style>

    @yield('styles')
</head>

<body class="bg-slate-50 text-slate-900">

    <!-- ===== NAVBAR ===== -->
    <nav class="glass sticky top-4 z-40 mx-4 mt-4 px-6 py-4 rounded-2xl border border-slate-200 shadow-sm">

        <div class="max-w-7xl mx-auto flex justify-between items-center">

            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-3">

                <div
                    class="w-10 h-10 bg-slate-900 rounded-xl flex items-center justify-center text-white font-black text-sm">
                    AH
                </div>

                <span class="text-xl font-black tracking-tight text-slate-900">
                    AmikomEventHub
                </span>

            </a>

            <!-- Menu -->
            <div class="hidden md:flex items-center gap-8 text-sm font-semibold text-slate-600">

                <a href="{{ route('home') }}" class="hover:text-slate-950 transition">
                    Jelajahi
                </a>

                <a href="{{ route('katalog') }}" class="hover:text-slate-950 transition">
                    Katalog
                </a>

                <a href="{{ route('bantuan') }}" class="hover:text-slate-950 transition">
                    Bantuan
                </a>

                <a href="{{ route('kontak') }}" class="hover:text-slate-950 transition">
                    Kontak
                </a>

            </div>

            <!-- User Menu -->
            <div class="flex items-center gap-3">

                @guest

                    <a href="{{ route('login') }}"
                        class="px-5 py-2 bg-indigo-600 text-white rounded-xl font-semibold hover:bg-indigo-700 transition">
                        Login
                    </a>

                @endguest

                @auth

                    <a href="{{ route('profil') }}"
                        class="px-5 py-2.5 rounded-xl text-sm font-bold text-slate-700 hover:bg-slate-100 transition">
                        {{ Auth::user()->name }}
                    </a>

                    @if(Auth::user()->role === 'superadmin')

                        <a href="{{ route('admin.dashboard') }}"
                            class="px-5 py-2.5 bg-slate-900 text-white rounded-xl text-sm font-bold hover:bg-slate-800 transition">
                            Admin
                        </a>

                    @elseif(Auth::user()->role === 'organizer')

                        <a href="{{ route('organizer.dashboard') }}"
                            class="px-5 py-2.5 bg-indigo-600 text-white rounded-xl text-sm font-bold hover:bg-indigo-700 transition">
                            Organizer
                        </a>

                    @endif

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button type="submit"
                            class="px-5 py-2.5 bg-red-600 text-white rounded-xl text-sm font-bold hover:bg-red-700 transition">
                            Logout
                        </button>

                    </form>

                @endauth

            </div>

        </div>

    </nav>

    <!-- ===== CONTENT ===== -->
    <main class="min-h-screen">

        @auth

            @if(Auth::user()->role === 'user')

                <div class="max-w-7xl mx-auto px-6 py-10 flex gap-8">

                    {{-- Content --}}
                    <section class="flex-1">

                        @yield('content')

                    </section>

                </div>

            @else

                @yield('content')

            @endif

        @else

            @yield('content')

        @endauth

    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="bg-slate-950 text-slate-300 py-10 px-6 mt-16">

        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10">

            <div class="space-y-3">

                <div class="flex items-center gap-3">

                    <div
                        class="w-9 h-9 bg-white rounded-xl flex items-center justify-center text-slate-950 font-black text-sm">
                        AH
                    </div>

                    <span class="text-xl font-black text-white">
                        AmikomEventHub
                    </span>

                </div>

                <p class="max-w-sm text-sm text-slate-400 leading-relaxed">
                    Platform reservasi tiket event online untuk mahasiswa dan penyelenggara event.
                </p>

            </div>

            <div>

                <h4 class="text-white font-bold mb-4 text-sm uppercase tracking-wider">
                    Navigasi
                </h4>

                <ul class="space-y-3 text-sm text-slate-400">

                    <li>
                        <a href="{{ route('home') }}" class="hover:text-white transition">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('katalog') }}" class="hover:text-white transition">
                            Katalog Event
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('bantuan') }}" class="hover:text-white transition">
                            Bantuan
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('kontak') }}" class="hover:text-white transition">
                            Kontak
                        </a>
                    </li>

                </ul>

            </div>

            <div>

                <h4 class="text-white font-bold mb-4 text-sm uppercase tracking-wider">
                    Kontak
                </h4>

                <ul class="space-y-3 text-sm text-slate-400">
                    <li>support@amikomeventhub.com</li>
                    <li>+62 812 3456 7890</li>
                </ul>

            </div>

        </div>

        <div class="max-w-7xl mx-auto pt-6 mt-8 border-t border-slate-800 text-center text-slate-500 text-xs">
            &copy; {{ date('Y') }} AmikomEventHub. Built with Laravel & Tailwind CSS.
        </div>

    </footer>

    @yield('scripts')

</body>

</html>