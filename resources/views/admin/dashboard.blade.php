<x-app-layout>
    <style>
        .bg-grid-pattern {
            background-image: linear-gradient(to right, #1e293b 1px, transparent 1px),
                              linear-gradient(to bottom, #1e293b 1px, transparent 1px);
            background-size: 40px 40px;
        }
    </style>

    <div class="min-h-screen bg-[#0f172a] text-white font-sans relative flex flex-col">
        
        <div class="absolute inset-0 bg-grid-pattern opacity-20 pointer-events-none"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-[#0f172a] via-transparent to-[#0f172a] pointer-events-none"></div>

        <div class="relative z-10 w-full px-4 sm:px-6 lg:px-8 py-6">
            
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 bg-slate-800/50 border border-slate-700 p-6 rounded-2xl backdrop-blur-sm shadow-2xl">
                <div class="flex items-center gap-4">
                    <div class="bg-blue-600 p-3 rounded-xl shadow-lg shadow-blue-500/30">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h2 class="text-xs text-blue-400 font-bold tracking-[0.3em] uppercase">Administrator Panel</h2>
                        <h1 class="text-2xl md:text-3xl font-black text-white">SATLANTAS <span class="font-light text-slate-400">COMMAND CENTER</span></h1>
                    </div>
                </div>
                
                <div class="flex items-center gap-8 mt-4 md:mt-0 border-l border-slate-700 pl-8">
                    <div class="text-right">
                        <div class="text-xs text-slate-400 uppercase font-bold tracking-wider">Server Status</div>
                        <div class="text-sm text-emerald-400 font-bold flex items-center justify-end gap-2">
                            <span class="relative flex h-3 w-3">
                              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                              <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                            </span>
                            ONLINE
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-3xl font-mono font-bold text-white">{{ \Carbon\Carbon::now()->format('H:i') }}</div>
                        <div class="text-xs text-slate-400 uppercase tracking-wider">{{ \Carbon\Carbon::now()->format('d F Y') }}</div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-8">
                
                <div class="bg-slate-800 border border-slate-700 p-5 rounded-2xl shadow-lg relative overflow-hidden group hover:border-slate-500 transition duration-300">
                    <div class="absolute top-0 right-0 p-3 opacity-10 group-hover:opacity-20 transition">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <div class="flex items-center gap-3 mb-2">
                        <div class="p-2 bg-slate-700 rounded-lg text-slate-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total</p>
                    </div>
                    <div class="text-3xl font-black text-white">{{ $total }}</div>
                </div>

                <div class="bg-slate-800 border border-yellow-500/30 p-5 rounded-2xl shadow-lg relative overflow-hidden group hover:border-yellow-500 transition duration-300">
                    <div class="absolute top-0 right-0 p-3 opacity-10 group-hover:opacity-20 transition">
                        <svg class="w-16 h-16 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div class="flex items-center gap-3 mb-2">
                        <div class="p-2 bg-yellow-500/20 rounded-lg text-yellow-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        </div>
                        <p class="text-xs font-bold text-yellow-500 uppercase tracking-wider">Verifikasi</p>
                    </div>
                    <div class="text-3xl font-black text-yellow-400">{{ $pending }}</div>
                </div>

                <div class="bg-slate-800 border border-blue-500/30 p-5 rounded-2xl shadow-lg relative overflow-hidden group hover:border-blue-500 transition duration-300">
                    <div class="absolute top-0 right-0 p-3 opacity-10 group-hover:opacity-20 transition">
                        <svg class="w-16 h-16 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    </div>
                    <div class="flex items-center gap-3 mb-2">
                        <div class="p-2 bg-blue-500/20 rounded-lg text-blue-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        </div>
                        <p class="text-xs font-bold text-blue-500 uppercase tracking-wider">Proses</p>
                    </div>
                    <div class="text-3xl font-black text-blue-400">{{ $proses }}</div>
                </div>

                <div class="bg-slate-800 border border-red-500/30 p-5 rounded-2xl shadow-lg relative overflow-hidden group hover:border-red-500 transition duration-300">
                    <div class="absolute top-0 right-0 p-3 opacity-10 group-hover:opacity-20 transition">
                        <svg class="w-16 h-16 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div class="flex items-center gap-3 mb-2">
                        <div class="p-2 bg-red-500/20 rounded-lg text-red-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </div>
                        <p class="text-xs font-bold text-red-500 uppercase tracking-wider">Ditolak</p>
                    </div>
                    <div class="text-3xl font-black text-red-400">{{ $ditolak }}</div>
                </div>

                <div class="bg-slate-800 border border-emerald-500/30 p-5 rounded-2xl shadow-lg relative overflow-hidden group hover:border-emerald-500 transition duration-300">
                    <div class="absolute top-0 right-0 p-3 opacity-10 group-hover:opacity-20 transition">
                        <svg class="w-16 h-16 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div class="flex items-center gap-3 mb-2">
                        <div class="p-2 bg-emerald-500/20 rounded-lg text-emerald-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <p class="text-xs font-bold text-emerald-500 uppercase tracking-wider">Selesai</p>
                    </div>
                    <div class="text-3xl font-black text-emerald-400">{{ $selesai }}</div>
                </div>

            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                
                <div class="bg-slate-800/50 border border-slate-700 rounded-2xl p-6">
                    <h3 class="text-blue-400 font-bold uppercase text-xs tracking-wider mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                        Panel Eksekutif
                    </h3>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <a href="{{ route('admin.laporan.index') }}" class="flex items-center gap-4 bg-blue-600 hover:bg-blue-500 text-white p-4 rounded-xl shadow-lg transition-transform hover:scale-[1.02] group">
                            <div class="bg-white/20 p-3 rounded-lg group-hover:rotate-12 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <div class="font-bold text-lg">Verifikasi Data</div>
                                <div class="text-xs text-blue-200">Kelola laporan masuk</div>
                            </div>
                        </a>

                        <a href="{{ route('admin.laporan.menu-cetak') }}" class="flex items-center gap-4 bg-slate-700 hover:bg-slate-600 text-white p-4 rounded-xl border border-slate-600 transition-transform hover:scale-[1.02] mb-3 group cursor-pointer">
                            <div class="bg-slate-800 p-3 rounded-lg group-hover:rotate-12 transition-transform flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                            </div>
                            <div>
                                <div class="font-bold text-lg">Cetak Laporan</div>
                                <div class="text-xs text-slate-300">Menu Export PDF</div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="overflow-hidden rounded-lg border border-slate-700">
                        <table class="w-full text-sm text-left text-slate-400">
                            <thead class="text-xs text-slate-300 uppercase bg-slate-700/50">
                                <tr>
                                    <th class="px-4 py-3">Waktu</th>
                                    <th class="px-4 py-3">Pengguna</th>
                                    <th class="px-4 py-3">Aktivitas</th>
                                </tr>
                            </thead>
                            
                            <tbody class="divide-y divide-slate-700/50">
                                @forelse($logs as $log)
                                    <tr class="hover:bg-slate-700/20 transition">
                                        <td class="px-4 py-3 font-mono text-xs text-blue-300 whitespace-nowrap">
                                            {{ $log->created_at->diffForHumans() }}
                                        </td>
                                        
                                        <td class="px-4 py-3">
                                            <span class="text-white font-bold bg-slate-700 px-2 py-0.5 rounded text-xs border border-slate-600">
                                                {{ $log->user->name }}
                                            </span>
                                        </td>
                                        
                                        <td class="px-4 py-3 text-slate-300 text-xs">
                                            {{ Str::limit($log->description, 50) }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-4 py-6 text-center text-slate-500 text-xs italic">
                                            Belum ada aktivitas sistem tercatat.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

            </div>

        </div>
    </div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                
                <div class="bg-slate-800 border border-slate-700 p-6 rounded-2xl shadow-lg">
                    <h3 class="text-blue-400 font-bold uppercase text-xs tracking-wider mb-4">Distribusi Status Laporan</h3>
                    <div class="relative h-64 w-full flex justify-center">
                        <canvas id="statusChart"></canvas>
                    </div>
                </div>

                <div class="bg-slate-800 border border-slate-700 p-6 rounded-2xl shadow-lg">
                    <h3 class="text-emerald-400 font-bold uppercase text-xs tracking-wider mb-4">Statistik Laporan Bulanan ({{ date('Y') }})</h3>
                    <div class="relative h-64 w-full">
                        <canvas id="bulanChart"></canvas>
                    </div>
                </div>

            </div>
    
</x-app-layout>