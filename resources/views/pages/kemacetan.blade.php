<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Informasi Kemacetan - Lapor Satlantas</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .bg-grid { background-image: linear-gradient(to right, #1e293b 1px, transparent 1px), linear-gradient(to bottom, #1e293b 1px, transparent 1px); background-size: 40px 40px; }
    </style>
</head>
<body class="bg-[#0f172a] text-white antialiased overflow-x-hidden">

    <div class="fixed inset-0 z-0 pointer-events-none bg-grid opacity-20"></div>
    
    <nav class="relative z-40 px-6 py-6 border-b border-slate-800 bg-slate-900/50 backdrop-blur-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="{{ route('welcome') }}" class="flex items-center gap-3 hover:opacity-80 transition">
                <div class="bg-blue-600 p-2 rounded-xl shadow-lg shadow-blue-500/30">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                </div>
                <span class="text-lg font-bold text-white">Kembali ke Beranda</span>
            </a>
        </div>
    </nav>

    <div class="relative z-10 pt-20 pb-32 bg-blue-900/30 border-b border-blue-800/50">
        <div class="max-w-4xl mx-auto text-center px-4">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-blue-600 rounded-2xl mb-8 shadow-2xl shadow-blue-500/30">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h1 class="text-4xl sm:text-5xl font-black tracking-tight text-white mb-6 leading-tight">
                Laporan <span class="text-blue-400">Kemacetan Lalu Lintas</span>
            </h1>
            <p class="text-xl text-blue-200 max-w-2xl mx-auto leading-relaxed">
                Informasi detail mengenai kategori pelaporan kemacetan, panduan pelaporan yang efektif, dan dampaknya bagi kelancaran lalu lintas.
            </p>
        </div>
    </div>

    <div class="relative z-10 max-w-4xl mx-auto px-4 -mt-16 pb-20">
        
        <div class="bg-slate-800 p-8 rounded-2xl border border-slate-700 shadow-xl mb-8">
            <h2 class="text-2xl font-bold text-white mb-4 flex items-center gap-3">
                <span class="w-1 h-8 bg-blue-500 rounded-full"></span>
                Apa itu Laporan Kemacetan?
            </h2>
            <div class="prose prose-invert prose-lg text-slate-300">
                <p>
                    Laporan Kemacetan adalah fitur untuk melaporkan kondisi lalu lintas yang padat, tersendat, atau macet total (gridlock) di lokasi tertentu. Laporan ini sangat krusial bagi Satlantas untuk segera menerjunkan petugas pengurai kemacetan atau melakukan rekayasa lalu lintas.
                </p>
                <p>
                    <b>Mengapa penting?</b> Data real-time dari masyarakat membantu kami mengidentifikasi titik-titik kemacetan baru yang mungkin belum terpantau CCTV atau patroli, sehingga respons bisa lebih cepat.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="bg-slate-800 p-8 rounded-2xl border border-slate-700 shadow-xl">
                <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                    <span class="w-1 h-8 bg-blue-500 rounded-full"></span>
                    Panduan Pelaporan Efektif
                </h2>
                <ul class="space-y-4">
                    <li class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-900/50 text-blue-400 rounded-full flex items-center justify-center font-bold border border-blue-500/30">1</div>
                        <div>
                            <h4 class="font-bold text-white">Pilih Kategori Tepat</h4>
                            <p class="text-sm text-slate-400">Pastikan memilih "Kemacetan" di form.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-900/50 text-blue-400 rounded-full flex items-center justify-center font-bold border border-blue-500/30">2</div>
                        <div>
                            <h4 class="font-bold text-white">Lokasi Presisi</h4>
                            <p class="text-sm text-slate-400">Gunakan nama jalan lengkap, patokan (misal: Depan Mall X), atau fitur Maps jika tersedia.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-900/50 text-blue-400 rounded-full flex items-center justify-center font-bold border border-blue-500/30">3</div>
                        <div>
                            <h4 class="font-bold text-white">Foto Bukti (Wajib/Opsional)</h4>
                            <p class="text-sm text-slate-400">Foto kondisi macet sangat membantu petugas menilai keparahan.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-900/50 text-blue-400 rounded-full flex items-center justify-center font-bold border border-blue-500/30">4</div>
                        <div>
                            <h4 class="font-bold text-white">Deskripsi Jelas</h4>
                            <p class="text-sm text-slate-400">Jelaskan penyebab jika tahu (misal: ada mobil mogok, pasar tumpah).</p>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="bg-slate-800 p-8 rounded-2xl border border-slate-700 shadow-xl">
                <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                    <span class="w-1 h-8 bg-blue-500 rounded-full"></span>
                    Contoh Laporan yang Baik
                </h2>
                
                <div class="bg-slate-900/50 p-4 rounded-xl border border-slate-700 mb-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-xs font-bold bg-green-500/20 text-green-400 px-2 py-1 rounded">Judul</span>
                        <span class="text-white font-medium">Macet Total di Perempatan Simpang Lima</span>
                    </div>
                    <div class="flex items-start gap-2 mb-2">
                         <span class="text-xs font-bold bg-green-500/20 text-green-400 px-2 py-1 rounded mt-1">Deskripsi</span>
                         <p class="text-slate-300 text-sm leading-relaxed">
                             Terjadi kemacetan parah dari arah Jl. A Yani menuju Simpang Lima. Kendaraan tidak bergerak selama 15 menit. Penyebabnya sepertinya traffic light mati dan ada angkot ngetem sembarangan di tikungan. Mohon petugas segera datang.
                         </p>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-bold bg-green-500/20 text-green-400 px-2 py-1 rounded">Bukti</span>
                        <span class="text-blue-400 text-sm underline flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            foto_macet_simpang5.jpg
                        </span>
                    </div>
                </div>
                <p class="text-sm text-slate-400 italic">Contoh di atas memberikan lokasi, kondisi, durasi, dugaan penyebab, dan bukti foto yang jelas.</p>
            </div>
        </div>

        <div class="bg-gradient-to-r from-blue-600 to-blue-800 p-8 rounded-2xl shadow-2xl text-center">
            <h2 class="text-2xl font-bold text-white mb-4">Temukan Kemacetan di Sekitar Anda?</h2>
            <p class="text-blue-100 mb-8 max-w-xl mx-auto">
                Jangan biarkan kemacetan semakin parah. Laporan Anda adalah langkah awal kami untuk bertindak.
            </p>
            @auth
                <a href="{{ route('masyarakat.lapor.create') }}" class="inline-flex items-center justify-center px-8 py-4 bg-white text-blue-600 font-bold rounded-xl shadow-lg hover:bg-blue-50 transition transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Buat Laporan Kemacetan Sekarang
                </a>
            @else
                <div class="flex gap-4 justify-center">
                    <a href="{{ route('login') }}" class="px-8 py-4 bg-white text-blue-600 font-bold rounded-xl shadow-lg hover:bg-blue-50 transition">Masuk untuk Melapor</a>
                    <a href="{{ route('register') }}" class="px-8 py-4 bg-blue-900/50 text-white font-bold rounded-xl border border-white/30 hover:bg-blue-900 transition">Daftar Akun</a>
                </div>
            @endauth
        </div>

    </div>

    <footer class="py-10 border-t border-slate-800 text-center text-slate-500 text-sm bg-[#0f172a]">
        <p>&copy; {{ date('Y') }} Sistem Informasi Pelaporan Satlantas. Melayani dengan Integritas.</p>
    </footer>

</body>
</html>