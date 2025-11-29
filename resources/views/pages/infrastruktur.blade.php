<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lapor Infrastruktur - Satlantas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; } .bg-grid { background-image: linear-gradient(to right, #1e293b 1px, transparent 1px), linear-gradient(to bottom, #1e293b 1px, transparent 1px); background-size: 40px 40px; }</style>
</head>
<body class="bg-[#0f172a] text-white antialiased overflow-x-hidden">
    <div class="fixed inset-0 z-0 pointer-events-none bg-grid opacity-20"></div>
    
    <nav class="relative z-40 px-6 py-6 border-b border-slate-800 bg-slate-900/50 backdrop-blur-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="{{ route('welcome') }}" class="flex items-center gap-3 hover:opacity-80 transition">
                <div class="bg-yellow-500 p-2 rounded-xl shadow-lg shadow-yellow-500/30">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                </div>
                <span class="text-lg font-bold text-white">Kembali ke Beranda</span>
            </a>
        </div>
    </nav>

    <div class="relative z-10 pt-20 pb-32 bg-yellow-900/20 border-b border-yellow-800/50">
        <div class="max-w-4xl mx-auto text-center px-4">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-yellow-500 rounded-2xl mb-8 shadow-2xl shadow-yellow-500/30">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            </div>
            <h1 class="text-4xl sm:text-5xl font-black tracking-tight text-white mb-6 leading-tight">
                Lapor <span class="text-yellow-500">Kerusakan Jalan</span>
            </h1>
            <p class="text-xl text-yellow-200 max-w-2xl mx-auto leading-relaxed">
                Bantu kami memantau kondisi infrastruktur. Laporkan jalan berlubang, lampu lalu lintas mati, atau rambu yang rusak.
            </p>
        </div>
    </div>

    <div class="relative z-10 max-w-4xl mx-auto px-4 -mt-16 pb-20">
        
        <div class="bg-slate-800 p-8 rounded-2xl border border-slate-700 shadow-xl mb-8">
            <h2 class="text-2xl font-bold text-white mb-4 flex items-center gap-3">
                <span class="w-1 h-8 bg-yellow-500 rounded-full"></span>
                Lingkup Pelaporan
            </h2>
            <div class="prose prose-invert prose-lg text-slate-300">
                <p>
                    Kategori ini mencakup segala kerusakan fisik yang mengganggu kelancaran dan keselamatan berkendara. Termasuk di dalamnya: Jalan berlubang (potholes), Traffic Light yang tidak berfungsi, Rambu lalu lintas yang tertutup pohon/hilang, dan Genangan air yang membahayakan.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="bg-slate-800 p-8 rounded-2xl border border-slate-700 shadow-xl">
                <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                    <span class="w-1 h-8 bg-yellow-500 rounded-full"></span>
                    Tips Foto Bukti
                </h2>
                <ul class="space-y-4">
                    <li class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-yellow-900/50 text-yellow-400 rounded-full flex items-center justify-center font-bold border border-yellow-500/30">1</div>
                        <div><h4 class="font-bold text-white">Jelas & Terang</h4><p class="text-sm text-slate-400">Pastikan lubang/kerusakan terlihat jelas.</p></div>
                    </li>
                    <li class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-yellow-900/50 text-yellow-400 rounded-full flex items-center justify-center font-bold border border-yellow-500/30">2</div>
                        <div><h4 class="font-bold text-white">Pencahayaan</h4><p class="text-sm text-slate-400">Jika malam hari, gunakan flash kamera.</p></div>
                    </li>
                    <li class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-yellow-900/50 text-yellow-400 rounded-full flex items-center justify-center font-bold border border-yellow-500/30">3</div>
                        <div><h4 class="font-bold text-white">Patokan Lokasi</h4><p class="text-sm text-slate-400">Foto juga gedung atau plang jalan di sekitarnya sebagai penanda.</p></div>
                    </li>
                </ul>
            </div>

            <div class="bg-slate-800 p-8 rounded-2xl border border-slate-700 shadow-xl">
                <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                    <span class="w-1 h-8 bg-yellow-500 rounded-full"></span>
                    Contoh Laporan
                </h2>
                <div class="bg-slate-900/50 p-4 rounded-xl border border-slate-700 mb-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-xs font-bold bg-yellow-500/20 text-yellow-400 px-2 py-1 rounded">Judul</span>
                        <span class="text-white font-medium">Lampu Merah Mati di Perempatan X</span>
                    </div>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        Lampu lalu lintas di perempatan Jl. Sudirman mati total sejak pagi tadi. Lalu lintas menjadi semrawut dan rawan kecelakaan. Mohon perbaikan.
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-r from-yellow-600 to-yellow-800 p-8 rounded-2xl shadow-2xl text-center">
            <h2 class="text-2xl font-bold text-white mb-4">Ada Fasilitas Rusak?</h2>
            <p class="text-yellow-100 mb-8 max-w-xl mx-auto">
                Laporan Anda membantu kami menjaga fasilitas umum tetap layak dan aman.
            </p>
            @auth
                <a href="{{ route('masyarakat.lapor.create') }}" class="inline-flex items-center justify-center px-8 py-4 bg-white text-yellow-600 font-bold rounded-xl shadow-lg hover:bg-yellow-50 transition transform hover:scale-105">
                    LAPORKAN KERUSAKAN
                </a>
            @else
                <div class="flex gap-4 justify-center">
                    <a href="{{ route('login') }}" class="px-8 py-4 bg-white text-yellow-600 font-bold rounded-xl shadow-lg hover:bg-yellow-50 transition">Masuk</a>
                </div>
            @endauth
        </div>

    </div>
</body>
</html>