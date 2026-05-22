<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-indigo-50 via-white to-slate-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-slate-900 shadow-lg">
        <div class="container mx-auto flex justify-center gap-4 p-4">

            <a href="/"
                class="px-5 py-2 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-semibold transition duration-300">
                Home
            </a>

            <a href="/profil"
                class="px-5 py-2 rounded-xl bg-yellow-500 hover:bg-yellow-400 text-white font-semibold transition duration-300">
                Profil
            </a>

            <a href="/katalog"
                class="px-5 py-2 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-semibold transition duration-300">
                Katalog
            </a>

            <a href="/bantuan"
                class="px-5 py-2 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-semibold transition duration-300">
                Bantuan
            </a>

            <a href="/contact"
                class="px-5 py-2 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-semibold transition duration-300">
                Kontak
            </a>

        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-6 py-16">

        <!-- Header -->
        <div class="text-center mb-14">
            <span
                class="px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-black uppercase tracking-wider">
                My Profile
            </span>

            <h1 class="text-5xl font-black text-slate-900 mt-5">
                Profil Praktikan
            </h1>

            <p class="text-slate-500 mt-3">
                Informasi singkat mengenai praktikan AmikomEventHub.
            </p>
        </div>

        <!-- Profile Card -->
        <div
            class="max-w-4xl mx-auto bg-white rounded-[2.5rem] shadow-2xl shadow-slate-300/60 border border-slate-200 overflow-hidden">

            <div class="grid grid-cols-1 md:grid-cols-2">

                <!-- Left -->
                <div
                    class="bg-gradient-to-br from-indigo-600 to-slate-900 p-10 text-white flex flex-col justify-center items-center relative overflow-hidden">

                    <div class="absolute -top-16 -right-16 w-52 h-52 bg-white opacity-10 rounded-full blur-2xl"></div>
                    <div class="absolute -bottom-16 -left-16 w-52 h-52 bg-indigo-300 opacity-20 rounded-full blur-2xl">
                    </div>

                    <div class="relative z-10 text-center">

                        <div class="w-40 h-40 rounded-full border-8 border-white overflow-hidden mx-auto shadow-2xl">
                            <img src="/assets/profile.png" alt="Profile" class="w-full h-full object-cover">
                        </div>

                        <h2 class="text-3xl font-black mt-6">
                            Ikhwan Abdillah
                        </h2>

                        <p class="text-indigo-200 mt-2 font-medium">
                            Sistem Informasi
                        </p>

                        <div class="mt-8 flex justify-center gap-4">

                            <div class="bg-white/10 backdrop-blur px-4 py-3 rounded-2xl border border-white/10">
                                <p class="text-xs uppercase tracking-wider text-indigo-200">
                                    Status
                                </p>

                                <p class="font-black">
                                    Mahasiswa
                                </p>
                            </div>

                            <div class="bg-white/10 backdrop-blur px-4 py-3 rounded-2xl border border-white/10">
                                <p class="text-xs uppercase tracking-wider text-indigo-200">
                                    Angkatan
                                </p>

                                <p class="font-black">
                                    2024
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

                <!-- Right -->
                <div class="p-10">

                    <h3 class="text-2xl font-black text-slate-800 mb-8">
                        Informasi Detail
                    </h3>

                    <div class="space-y-6">

                        <div class="bg-slate-50 rounded-2xl p-5 border border-slate-100">
                            <p class="text-xs font-black uppercase tracking-wider text-slate-400 mb-2">
                                Nama Lengkap
                            </p>

                            <p class="text-xl font-bold text-slate-800">
                                Ikhwan Abdillah
                            </p>
                        </div>

                        <div class="bg-slate-50 rounded-2xl p-5 border border-slate-100">
                            <p class="text-xs font-black uppercase tracking-wider text-slate-400 mb-2">
                                NIM
                            </p>

                            <p class="text-xl font-bold text-slate-800">
                                24.12.3311
                            </p>
                        </div>

                        <div class="bg-slate-50 rounded-2xl p-5 border border-slate-100">
                            <p class="text-xs font-black uppercase tracking-wider text-slate-400 mb-2">
                                Jurusan
                            </p>

                            <p class="text-xl font-bold text-slate-800">
                                Sistem Informasi
                            </p>
                        </div>

                        <div class="bg-indigo-50 rounded-2xl p-6 border border-indigo-100 mt-8">
                            <p class="text-indigo-700 font-bold">
                                Tentang
                            </p>

                            <p class="text-slate-600 mt-2 leading-relaxed">
                                Mahasiswa Universitas Amikom Yogyakarta yang memiliki minat
                                pada pengembangan web, UI/UX, dan teknologi digital modern.
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>