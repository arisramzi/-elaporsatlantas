<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lapor Satlantas - Command Center</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .bg-grid {
            background-image: linear-gradient(to right, #1e293b 1px, transparent 1px),
                              linear-gradient(to bottom, #1e293b 1px, transparent 1px);
            background-size: 50px 50px;
        }
        .glass {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .text-glow {
            text-shadow: 0 0 20px rgba(59, 130, 246, 0.5);
        }

        /* --- ANIMASI TEKS BERJALAN --- */
        .animate-marquee {
            display: inline-block;
            animation: marquee 25s linear infinite;
        }
        @keyframes marquee {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
    </style>
</head>
<body class="bg-[#0f172a] text-white antialiased overflow-x-hidden">

    <div class="fixed inset-0 z-0 pointer-events-none bg-grid opacity-20"></div>
    <div class="fixed inset-0 z-0 bg-gradient-to-b from-[#0f172a] via-transparent to-[#0f172a] pointer-events-none"></div>
    <div class="fixed top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 via-cyan-400 to-emerald-500 z-50"></div>

    <div class="relative z-40 bg-blue-900/30 border-b border-blue-800 overflow-hidden py-2">
        <div class="whitespace-nowrap animate-marquee flex gap-12 text-sm font-mono text-blue-200">
            <span class="flex items-center gap-2">📢 <b class="text-white">INFO:</b> Sistem Pelaporan Online Aktif 24 Jam</span>
            <span class="flex items-center gap-2">🚔 <b class="text-white">STATUS:</b> Petugas Siap Melayani</span>
            <span class="flex items-center gap-2">🌧️ <b class="text-white">CUACA:</b> Waspada Jalan Licin</span>
            <span class="flex items-center gap-2">🚧 <b class="text-white">LALIN:</b> Pantau Kepadatan di Pusat Kota</span>
        </div>
    </div>

    <nav class="relative z-40 px-6 py-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="bg-blue-600 p-2 rounded-xl shadow-lg shadow-blue-500/30">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <span class="text-xl font-black tracking-tight text-white block leading-none">SATLANTAS</span>
                    <span class="text-[10px] font-bold text-blue-400 tracking-[0.3em] uppercase">Command Center</span>
                </div>
            </div>

            <div class="flex items-center gap-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-5 py-2 text-sm font-bold text-white border border-blue-500/50 rounded-lg hover:bg-blue-600/20 transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-bold text-slate-300 hover:text-white transition">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-5 py-2 text-sm font-bold bg-blue-600 text-white rounded-lg hover:bg-blue-500 transition shadow-lg shadow-blue-500/30">
                                Lapor Sekarang
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <div class="relative z-10 pt-16 pb-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto text-center">
            
            <div class="inline-flex items-center px-3 py-1 rounded-full border border-blue-400/30 bg-blue-900/30 text-blue-300 text-xs font-bold mb-6 backdrop-blur-sm">
                <span class="w-2 h-2 bg-blue-400 rounded-full mr-2 animate-pulse"></span>
                INTEGRATED TRAFFIC SYSTEM
            </div>

            <h1 class="text-5xl sm:text-7xl font-black tracking-tight text-white mb-6 text-glow leading-tight">
                Wujudkan Lalu Lintas <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-cyan-300 to-emerald-400">Aman & Tertib.</span>
            </h1>

            <p class="max-w-2xl mx-auto text-lg text-slate-400 mb-10">
                Platform pelaporan insiden lalu lintas terpadu. Laporkan kemacetan, kecelakaan, atau pelanggaran secara real-time. Kami siap menindaklanjuti.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center w-full sm:w-auto mb-16">
                <a href="{{ route('register') }}" class="px-8 py-4 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-xl transition shadow-xl shadow-blue-600/20 flex items-center justify-center gap-2 group">
                    Buat Laporan
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                </a>
                <a href="#layanan" class="px-8 py-4 bg-slate-800 hover:bg-slate-700 text-white font-bold rounded-xl border border-slate-700 transition flex items-center justify-center">
                    Lihat Jenis Pelaporan
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto">
                
                <div class="glass p-6 rounded-2xl text-center relative overflow-hidden group">
                    <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition transform group-hover:scale-110">
                        <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-wider">Total Laporan</p>
                    <h3 class="text-5xl font-black text-white mt-2">{{ $total }}</h3>
                    <div class="mt-4 h-1 w-full bg-slate-700 rounded-full overflow-hidden">
                        <div class="h-full bg-blue-500 w-3/4"></div>
                    </div>
                </div>

                <div class="glass p-6 rounded-2xl text-center relative overflow-hidden group">
                    <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition transform group-hover:scale-110">
                        <svg class="w-20 h-20 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    </div>
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-wider">Sedang Ditangani</p>
                    <h3 class="text-5xl font-black text-cyan-400 mt-2">{{ $proses }}</h3>
                    <div class="mt-4 h-1 w-full bg-slate-700 rounded-full overflow-hidden">
                        <div class="h-full bg-cyan-500 w-1/2 animate-pulse"></div>
                    </div>
                </div>

                <div class="glass p-6 rounded-2xl text-center relative overflow-hidden group">
                    <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition transform group-hover:scale-110">
                        <svg class="w-20 h-20 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-wider">Kasus Selesai</p>
                    <h3 class="text-5xl font-black text-emerald-400 mt-2">{{ $selesai }}</h3>
                    <div class="mt-4 h-1 w-full bg-slate-700 rounded-full overflow-hidden">
                        <div class="h-full bg-emerald-500 w-full"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="relative z-10 py-20 bg-slate-900 border-t border-slate-800" id="layanan">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-blue-500 font-bold uppercase tracking-widest text-sm">Edukasi & Informasi</h2>
                <h3 class="text-3xl font-black text-white mt-2">Kategori Pelaporan</h3>
                <p class="text-slate-400 mt-4 max-w-2xl mx-auto">Klik pada kategori untuk melihat informasi detail dan panduan pelaporan.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                
                <a href="{{ route('info.kemacetan') }}" class="block bg-slate-800 p-8 rounded-2xl border border-slate-700 hover:border-blue-500 transition hover:-translate-y-2 duration-300 group relative overflow-hidden">
                    <div class="w-14 h-14 bg-blue-900/50 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-600 transition relative z-10">
                        <svg class="w-8 h-8 text-blue-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-white mb-2 relative z-10">Kemacetan</h4>
                    <p class="text-slate-400 text-sm relative z-10 mb-4">Informasi tentang titik macet dan cara melapor.</p>
                    <p class="text-blue-400 text-xs font-bold uppercase tracking-wider flex items-center gap-1 group-hover:underline">
                        Lihat Detail <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </p>
                </a>

                <a href="{{ route('info.kecelakaan') }}" class="block bg-slate-800 p-8 rounded-2xl border border-slate-700 hover:border-red-500 transition hover:-translate-y-2 duration-300 group relative overflow-hidden">
                    <div class="w-14 h-14 bg-red-900/50 rounded-xl flex items-center justify-center mb-6 group-hover:bg-red-600 transition relative z-10">
                        <svg class="w-8 h-8 text-red-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-white mb-2 relative z-10">Kecelakaan</h4>
                    <p class="text-slate-400 text-sm relative z-10 mb-4">Prosedur pelaporan insiden kecelakaan lalu lintas.</p>
                    <p class="text-red-400 text-xs font-bold uppercase tracking-wider flex items-center gap-1 group-hover:underline">
                        Lihat Detail <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </p>
                </a>

                <a href="{{ route('info.infrastruktur') }}" class="block bg-slate-800 p-8 rounded-2xl border border-slate-700 hover:border-yellow-500 transition hover:-translate-y-2 duration-300 group relative overflow-hidden">
                    <div class="w-14 h-14 bg-yellow-900/50 rounded-xl flex items-center justify-center mb-6 group-hover:bg-yellow-600 transition relative z-10">
                        <svg class="w-8 h-8 text-yellow-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-white mb-2 relative z-10">Jalan Rusak</h4>
                    <p class="text-slate-400 text-sm relative z-10 mb-4">Pelaporan kerusakan fasilitas umum dan jalan.</p>
                    <p class="text-yellow-400 text-xs font-bold uppercase tracking-wider flex items-center gap-1 group-hover:underline">
                        Lihat Detail <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </p>
                </a>

                <a href="{{ route('info.pelanggaran') }}" class="block bg-slate-800 p-8 rounded-2xl border border-slate-700 hover:border-purple-500 transition hover:-translate-y-2 duration-300 group relative overflow-hidden">
                    <div class="w-14 h-14 bg-purple-900/50 rounded-xl flex items-center justify-center mb-6 group-hover:bg-purple-600 transition relative z-10">
                        <svg class="w-8 h-8 text-purple-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-white mb-2 relative z-10">Pelanggaran</h4>
                    <p class="text-slate-400 text-sm relative z-10 mb-4">Jenis-jenis pelanggaran dan sanksi lalu lintas.</p>
                    <p class="text-purple-400 text-xs font-bold uppercase tracking-wider flex items-center gap-1 group-hover:underline">
                        Lihat Detail <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </p>
                </a>

            </div>
        </div>
    </div>

    <footer class="py-10 border-t border-slate-800 text-center text-slate-500 text-sm relative z-10 bg-[#0f172a]">
        <div class="mb-4 flex justify-center gap-6">
            <a href="#" class="hover:text-white transition">Tentang Kami</a>
            <a href="#" class="hover:text-white transition">Kebijakan Privasi</a>
            <a href="#" class="hover:text-white transition">Kontak</a>
        </div>
        <p>&copy; {{ date('Y') }} Sistem Informasi Pelaporan Satlantas. All rights reserved.</p>
    </footer>

</body>
</html>