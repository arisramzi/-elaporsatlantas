<x-app-layout>
    <div class="min-h-screen bg-slate-900 text-slate-100 font-sans py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4 border-b border-slate-800 pb-6">
                <div>
                    <h2 class="text-xs font-bold text-emerald-500 uppercase tracking-widest mb-1 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        Unit Reaksi Cepat
                    </h2>
                    <h1 class="text-3xl font-bold text-white">Dashboard Petugas</h1>
                </div>
                <div class="flex items-center gap-4">
                    <div class="text-right">
                        <div class="text-sm font-medium text-white flex items-center justify-end gap-2">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            {{ Auth::user()->name }}
                        </div>
                        <div class="text-xs text-slate-400">ID: P-{{ str_pad(Auth::id(), 4, '0', STR_PAD_LEFT) }}</div>
                    </div>
                    <div class="bg-emerald-500/10 text-emerald-500 px-3 py-1.5 rounded-full text-xs font-bold border border-emerald-500/20 flex items-center gap-2">
                        <span class="relative flex h-2 w-2">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                        </span>
                        SIAP TUGAS
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="mb-6 p-4 bg-emerald-900/30 border border-emerald-800 text-emerald-400 rounded-lg flex items-center text-sm font-medium animate-fade-in">
                    <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                <div class="bg-slate-800 p-4 rounded-xl border border-slate-700 relative overflow-hidden">
                    <div class="flex justify-between items-start mb-2">
                        <div class="text-slate-400 text-xs font-bold uppercase">Tugas Baru</div>
                        <div class="bg-yellow-500/20 p-1.5 rounded-lg text-yellow-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        </div>
                    </div>
                    <div class="text-3xl font-bold text-white">{{ $tugasSaya->where('status', '!=', 'proses')->count() }}</div>
                </div>
                <div class="bg-slate-800 p-4 rounded-xl border border-slate-700 relative overflow-hidden">
                    <div class="flex justify-between items-start mb-2">
                        <div class="text-slate-400 text-xs font-bold uppercase">Sedang Proses</div>
                        <div class="bg-blue-500/20 p-1.5 rounded-lg text-blue-500">
                            <svg class="w-5 h-5 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        </div>
                    </div>
                    <div class="text-3xl font-bold text-blue-400">{{ $tugasSaya->where('status', 'proses')->count() }}</div>
                </div>
                <div class="bg-slate-800 p-4 rounded-xl border border-slate-700 relative overflow-hidden">
                     <div class="flex justify-between items-start mb-2">
                        <div class="text-slate-400 text-xs font-bold uppercase">Selesai Bulan Ini</div>
                        <div class="bg-emerald-500/20 p-1.5 rounded-lg text-emerald-500">
                             <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    </div>
                    <div class="text-3xl font-bold text-emerald-400">{{ $selesaiSaya ?? 0 }}</div>
                </div>
                <div class="bg-slate-800 p-4 rounded-xl border border-slate-700 flex justify-between items-center relative overflow-hidden">
                    <div>
                        <div class="text-slate-400 text-xs font-bold uppercase mb-1 flex items-center gap-1">
                             <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                            Performa
                        </div>
                        <div class="text-lg font-bold text-white">Excellent</div>
                    </div>
                    <div class="text-2xl font-bold text-slate-500">98%</div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2 space-y-4">
                    <h3 class="font-bold text-lg text-white flex items-center gap-3 mb-4 pb-2 border-b border-slate-800">
                        <div class="bg-slate-800 p-1.5 rounded-lg border border-slate-700">
                            <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        </div>
                        Daftar Penugasan Aktif
                    </h3>

                    @forelse($tugasSaya as $tugas)
                        @php $isProses = $tugas->status == 'proses'; @endphp
                        
                        <div class="bg-slate-800 rounded-xl p-5 border {{ $isProses ? 'border-blue-500/50 ring-1 ring-blue-500/10' : 'border-slate-700' }} hover:bg-slate-750 transition group relative overflow-hidden">
                            <div class="flex justify-between items-start mb-3 relative z-10">
                                <div class="flex gap-2">
                                    <span class="bg-slate-700 text-slate-300 px-2 py-1 rounded text-[10px] font-bold uppercase flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                                        {{ $tugas->kategori->nama_kategori ?? 'Umum' }}
                                    </span>
                                    @if($isProses)
                                        <span class="bg-blue-900/40 text-blue-400 px-2 py-1 rounded text-[10px] font-bold uppercase flex items-center gap-1">
                                             <svg class="w-3 h-3 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                            Sedang Ditangani
                                        </span>
                                    @else
                                        <span class="bg-yellow-900/40 text-yellow-400 px-2 py-1 rounded text-[10px] font-bold uppercase flex items-center gap-1">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            Baru Masuk
                                        </span>
                                    @endif
                                </div>
                                <span class="text-xs text-slate-500 font-mono flex items-center gap-1">
                                     <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    {{ \Carbon\Carbon::parse($tugas->tgl_pengaduan)->format('d M Y, H:i') }}
                                </span>
                            </div>

                            <div class="relative z-10">
                                <h4 class="text-lg font-bold text-white mb-1">{{ $tugas->judul_laporan }}</h4>
                                <p class="text-sm text-slate-400 flex items-center gap-2 mb-3 font-medium">
                                    <svg class="w-4 h-4 text-slate-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    {{ $tugas->lokasi_kejadian }}
                                </p>
                                <div class="bg-slate-900/50 p-3 rounded-lg border border-slate-800/50 text-sm text-slate-300 mb-4 line-clamp-2 group-hover:line-clamp-none transition-all">
                                    {{ $tugas->isi_laporan }}
                                </div>
                            </div>

                            <div class="relative z-10">
                                @if(!$isProses)
                                    <a href="{{ route('petugas.laporan.edit', $tugas->id) }}" class="flex items-center justify-center gap-2 w-full text-center bg-emerald-600 hover:bg-emerald-500 text-white py-2.5 rounded-lg text-sm font-bold transition hover:shadow-lg hover:shadow-emerald-500/20">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11"></path></svg>
                                        Terima & Mulai Tugas
                                    </a>
                                @else
                                    <a href="{{ route('petugas.laporan.edit', $tugas->id) }}" class="flex items-center justify-center gap-2 w-full text-center bg-blue-600 hover:bg-blue-500 text-white py-2.5 rounded-lg text-sm font-bold transition hover:shadow-lg hover:shadow-blue-500/20">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        Update Progres
                                    </a>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="bg-slate-800 rounded-xl p-10 text-center border border-slate-700 border-dashed flex flex-col items-center">
                            <div class="bg-slate-700/50 p-4 rounded-full mb-4">
                                <svg class="w-10 h-10 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <p class="text-slate-300 font-bold text-lg">Tidak ada tugas aktif</p>
                            <p class="text-slate-500 text-sm mt-1 max-w-xs mx-auto">Anda dalam mode standby. Laporan baru akan muncul di sini.</p>
                        </div>
                    @endforelse
                </div>

                <div class="lg:col-span-1">
                    <div class="bg-slate-800 rounded-xl p-6 border border-slate-700 sticky top-6">
                        <h3 class="text-slate-400 text-xs font-bold uppercase mb-6 border-b border-slate-700 pb-3 flex items-center gap-2">
                            <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                            Target Bulan Ini
                        </h3>
                        
                        <div class="flex items-center justify-center mb-6">
                            <div class="relative w-36 h-36">
                                <svg class="w-full h-full transform -rotate-90">
                                    <circle class="text-slate-700/50" stroke-width="10" stroke="currentColor" fill="transparent" r="62" cx="72" cy="72" />
                                    <circle class="text-emerald-500 transition-all duration-1000" stroke-width="10" 
                                            stroke-dasharray="390" 
                                            stroke-dashoffset="{{ 390 - (390 * ($selesaiSaya > 0 ? ($selesaiSaya / ($selesaiSaya + $tugasSaya->count() + 1)) : 0)) }}" 
                                            stroke-linecap="round" stroke="currentColor" fill="transparent" r="62" cx="72" cy="72" />
                                </svg>
                                <div class="absolute inset-0 flex flex-col items-center justify-center">
                                    <svg class="w-8 h-8 text-emerald-500 mb-1 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <span class="text-4xl font-black text-white leading-none">{{ $selesaiSaya ?? 0 }}</span>
                                    <span class="text-[10px] font-bold text-slate-400 uppercase mt-1">Tugas Selesai</span>
                                </div>
                            </div>
                        </div>
                        <div class="bg-slate-700/30 rounded-lg p-3 text-center text-sm text-slate-400 border border-slate-700/50">
                            Status Kinerja: <span class="text-emerald-400 font-bold ml-1">On Track</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>