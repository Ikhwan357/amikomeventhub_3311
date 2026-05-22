<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-indigo-50 via-white to-slate-100 min-h-screen">

    <nav class="bg-slate-900 shadow-lg">
        <div class="container mx-auto flex justify-center gap-4 p-4">
            <a href="/"
                class="px-5 py-2 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-semibold transition">Home</a>
            <a href="/profil"
                class="px-5 py-2 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-semibold transition">Profil</a>
            <a href="/katalog"
                class="px-5 py-2 rounded-xl bg-yellow-500 hover:bg-yellow-400 text-white font-semibold transition">Katalog</a>
            <a href="/bantuan"
                class="px-5 py-2 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-semibold transition">Bantuan</a>
            <a href="/contact"
                class="px-5 py-2 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-semibold transition">Kontak</a>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-16">

        <div class="text-center mb-12">
            <span class="px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-black">
                Event List
            </span>

            <h1 class="text-5xl font-black text-slate-900 mt-5">
                Katalog Event
            </h1>

            <p class="text-slate-500 mt-3">
                Pilih event menarik yang ingin kamu ikuti.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <div
                class="bg-white rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-7 hover:scale-[1.03] transition duration-300">
                <div
                    class="w-14 h-14 bg-indigo-100 text-indigo-700 rounded-2xl flex items-center justify-center text-2xl mb-5">
                    💻
                </div>

                <h2 class="text-2xl font-black text-slate-800">
                    Seminar IT
                </h2>

                <p class="text-slate-500 mt-3">
                    Belajar dasar teknologi bersama pemateri berpengalaman.
                </p>

                <div class="mt-6 flex justify-between items-center">
                    <span class="text-indigo-600 font-black">Gratis</span>
                    <a href="#"
                        class="px-5 py-3 bg-slate-900 text-white rounded-xl font-bold hover:bg-indigo-700 transition">
                        Detail
                    </a>
                </div>
            </div>

            <div
                class="bg-white rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-7 hover:scale-[1.03] transition duration-300">
                <div
                    class="w-14 h-14 bg-pink-100 text-pink-700 rounded-2xl flex items-center justify-center text-2xl mb-5">
                    🎨
                </div>

                <h2 class="text-2xl font-black text-slate-800">
                    Workshop UI/UX
                </h2>

                <p class="text-slate-500 mt-3">
                    Belajar membuat desain aplikasi yang menarik dan mudah digunakan.
                </p>

                <div class="mt-6 flex justify-between items-center">
                    <span class="text-indigo-600 font-black">Rp 50.000</span>
                    <a href="#"
                        class="px-5 py-3 bg-slate-900 text-white rounded-xl font-bold hover:bg-indigo-700 transition">
                        Detail
                    </a>
                </div>
            </div>

            <div
                class="bg-white rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-7 hover:scale-[1.03] transition duration-300">
                <div
                    class="w-14 h-14 bg-green-100 text-green-700 rounded-2xl flex items-center justify-center text-2xl mb-5">
                    🏆
                </div>

                <h2 class="text-2xl font-black text-slate-800">
                    Lomba Coding
                </h2>

                <p class="text-slate-500 mt-3">
                    Kompetisi programming untuk mengasah skill dan kreativitas.
                </p>

                <div class="mt-6 flex justify-between items-center">
                    <span class="text-indigo-600 font-black">Rp 75.000</span>
                    <a href="#"
                        class="px-5 py-3 bg-slate-900 text-white rounded-xl font-bold hover:bg-indigo-700 transition">
                        Detail
                    </a>
                </div>
            </div>

        </div>

    </main>

</body>

</html>