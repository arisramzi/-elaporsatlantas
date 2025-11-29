<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lapor Pelanggaran - Satlantas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; } .bg-grid { background-image: linear-gradient(to right, #1e293b 1px, transparent 1px), linear-gradient(to bottom, #1e293b 1px, transparent 1px); background-size: 40px 40px; }</style>
</head>
<body class="bg-[#0f172a] text-white antialiased overflow-x-hidden">
    <div class="fixed inset-0 z-0 pointer-events-none bg-grid opacity-20"></div>
    
    <nav class="relative z-40 px-6 py-6 border-b border-slate-800 bg-slate-900/50 backdrop-blur-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="{{ route('welcome') }}" class="flex items-center gap-3 hover:opacity-80 transition">
                <div class="bg-purple-600 p-2 rounded-xl shadow-lg shadow-purple-500/30">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                </div>
                <span class="text-lg font-bold text-white">Kembali ke Beranda</span>
            </a>
        </div>
    </nav>

    <div class="relative z-10 pt-20 pb-32 bg-purple-900/20 border-b border-purple-800/50">
        <div class="max-w-4xl mx-auto text-center px-4">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-purple-600 rounded-2xl mb-8 shadow-2xl shadow-purple-500/30">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
            </div>
            <h1 class="text-4xl sm:text-5xl font-black tracking-tight text-white mb-6 leading-tight">
                Lapor <span class="text-purple-500">Pelanggaran Lalu Lintas</span>
            </h1>
            <p class="text-xl text-purple-200 max-w-2xl mx-auto leading-relaxed">
                Laporkan tindakan yang membahayakan keselamatan pengguna jalan lain. Identitas pelapor dijamin kerahasiaannya.
            </p>
        </div>
    </div>

    <div class="relative z-10 max-w-4xl mx-auto px-4 -mt-16 pb-20">
        
        <div class="bg-slate-800 p-8 rounded-2xl border border-slate-700 shadow-xl mb-8">
            <h2 class="text-2xl font-bold text-white mb-4 flex items-center gap-3">
                <span class="w-1 h-8 bg-purple-500 rounded-full"></span>
                Jenis Pelanggaran
            </h2>
            <div class="prose prose-invert prose-lg text-slate-300">
                <p>
                    Anda dapat melaporkan berbagai jenis pelanggaran seperti: Balap liar, parkir liar yang menghambat jalan, melawan arus, penggunaan knalpot brong, atau kendaraan umum yang ugal-ugalan.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="bg-slate-800 p-8 rounded-2xl border border-slate-700 shadow-xl">
                <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                    <span class="w-1 h-8 bg-purple-500 rounded-full"></span>
                    Bukti yang Dibutuhkan
                </h2>
                <ul class="space-y-4">
                    <li class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-purple-900/50 text-purple-400 rounded-full flex items-center justify-center font-bold border border-purple-500/30">1</div>
                        <div><h4 class="font-bold text-white">Plat Nomor</h4><p class="text-sm text-slate-400">Foto plat nomor kendaraan pelanggar dengan jelas.</p></div>
                    </li>
                    <li class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-purple-900/50 text-purple-400 rounded-full flex items-center justify-center font-bold border border-purple-500/30">2</div>
                        <div><h4 class="font-bold text-white">Waktu & Tempat</h4><p class="text-sm text-slate-400">Sebutkan kapan dan di mana pelanggaran terjadi.</p></div>
                    </li>
                    <li class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-purple-900/50 text-purple-400 rounded-full flex items-center justify-center font-bold border border-purple-500/30">3</div>
                        <div><h4 class="font-bold text-white">Jenis Pelanggaran</h4><p class="text-sm text-slate-400">Jelaskan apa yang dilakukan pelanggar.</p></div>
                    </li>
                </ul>
            </div>

            <div class="bg-slate-800 p-8 rounded-2xl border border-slate-700 shadow-xl">
                <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                    <span class="w-1 h-8 bg-purple-500 rounded-full"></span>
                    Contoh Laporan
                </h2>
                <div class="bg-slate-900/50 p-4 rounded-xl border border-slate-700 mb-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-xs font-bold bg-purple-500/20 text-purple-400 px-2 py-1 rounded">Judul</span>
                        <span class="text-white font-medium">Balap Liar di Jl. Pemuda</span>
                    </div>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        Sekelompok pemuda melakukan balap liar setiap malam minggu pukul 01.00 WIB di Jl. Pemuda. Suara knalpot sangat bising dan membahayakan warga.
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-r from-purple-600 to-purple-800 p-8 rounded-2xl shadow-2xl text-center">
            <h2 class="text-2xl font-bold text-white mb-4">Lihat Pelanggaran?</h2>
            <p class="text-purple-100 mb-8 max-w-xl mx-auto">
                Mari ciptakan lingkungan berkendara yang aman dan tertib bersama-sama.
            </p>
            @auth
                <a href="{{ route('masyarakat.lapor.create') }}" class="inline-flex items-center justify-center px-8 py-4 bg-white text-purple-600 font-bold rounded-xl shadow-lg hover:bg-purple-50 transition transform hover:scale-105">
                    LAPORKAN PELANGGARAN
                </a>
            @else
                <div class="flex gap-4 justify-center">
                    <a href="{{ route('login') }}" class="px-8 py-4 bg-white text-purple-600 font-bold rounded-xl shadow-lg hover:bg-purple-50 transition">Masuk</a>
                </div>
            @endauth
        </div>

    </div>
</body>
</html>