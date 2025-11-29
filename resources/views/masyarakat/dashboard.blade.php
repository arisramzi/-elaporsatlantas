<x-app-layout>
    <div class="min-h-screen bg-[#0f172a] text-white font-sans py-12">
        
        <div class="absolute inset-0 bg-slate-900/50" style="background-image: linear-gradient(to right, #1e293b 1px, transparent 1px), linear-gradient(to bottom, #1e293b 1px, transparent 1px); background-size: 40px 40px; opacity: 0.5;"></div>
        
        <div class="relative z-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-slate-800/80 backdrop-blur-md p-6 sm:p-8 rounded-2xl shadow-2xl border border-slate-700 mb-8">
                <div class="flex justify-between items-start">
                    <div>
                        <h1 class="text-3xl font-bold text-white tracking-tight">
                            Halo, <span class="text-blue-400">{{ Auth::user()->name }}</span>!
                        </h1>
                        <p class="mt-2 text-md text-slate-400">
                            Berikut adalah daftar laporan yang telah Anda kirimkan.
                        </p>
                    </div>
                    <div class="hidden sm:block bg-blue-600/20 p-3 rounded-xl">
                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    </div>
                </div>

                @if (session('success'))
                    <div class="mt-6 p-4 bg-emerald-500/10 border border-emerald-500/20 rounded-xl text-emerald-400 flex items-center shadow-sm">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        {{ session('success') }}
                    </div>
                @endif
            </div>

            <div class="flex flex-col lg:flex-row gap-6 mb-10">
                
                <div class="lg:w-1/4 flex-shrink-0">
                    <div class="bg-gradient-to-br from-blue-900/80 to-slate-900 p-6 rounded-2xl shadow-xl border border-blue-700/50 relative overflow-hidden h-full flex flex-col justify-center">
                        <div class="absolute -right-6 -top-6 text-blue-500/20">
                            <svg class="w-32 h-32" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </div>
                        
                        <h2 class="text-lg font-bold text-white mb-2 relative z-10">Lapor Lagi?</h2>
                        <p class="text-blue-200 text-xs mb-6 relative z-10">Temukan pelanggaran? Laporkan sekarang juga.</p>
                        
                        <a href="{{ route('masyarakat.lapor.create') }}" class="inline-flex items-center justify-center px-4 py-3 bg-blue-600 hover:bg-blue-500 text-white text-sm font-bold rounded-xl shadow-lg shadow-blue-900/50 transition transform hover:scale-[1.02] relative z-10">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            BUAT LAPORAN
                        </a>
                    </div>
                </div>

                <div class="lg:w-3/4 grid grid-cols-2 md:grid-cols-5 gap-4">
                    
                    <div class="bg-slate-800/50 border border-slate-700 p-4 rounded-2xl shadow-lg flex flex-col items-center justify-center text-center hover:bg-slate-800 transition duration-300">
                        <div class="mb-2 p-2 bg-slate-700/50 rounded-lg text-slate-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Total</p>
                        <p class="text-2xl font-black text-white">{{ $totalLaporan ?? 0 }}</p>
                    </div>

                    <div class="bg-slate-800/50 border border-yellow-900/30 p-4 rounded-2xl shadow-lg flex flex-col items-center justify-center text-center hover:bg-slate-800 transition duration-300">
                        <div class="mb-2 p-2 bg-yellow-500/10 rounded-lg text-yellow-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <p class="text-[10px] font-bold text-yellow-500/80 uppercase tracking-wider">Verifikasi</p>
                        <p class="text-2xl font-black text-yellow-400">{{ $pending ?? 0 }}</p>
                    </div>

                    <div class="bg-slate-800/50 border border-blue-900/30 p-4 rounded-2xl shadow-lg flex flex-col items-center justify-center text-center hover:bg-slate-800 transition duration-300">
                        <div class="mb-2 p-2 bg-blue-500/10 rounded-lg text-blue-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        </div>
                        <p class="text-[10px] font-bold text-blue-500/80 uppercase tracking-wider">Diproses</p>
                        <p class="text-2xl font-black text-blue-400">{{ $diproses ?? 0 }}</p>
                    </div>

                    <div class="bg-slate-800/50 border border-red-900/30 p-4 rounded-2xl shadow-lg flex flex-col items-center justify-center text-center hover:bg-slate-800 transition duration-300">
                        <div class="mb-2 p-2 bg-red-500/10 rounded-lg text-red-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <p class="text-[10px] font-bold text-red-500/80 uppercase tracking-wider">Ditolak</p>
                        <p class="text-2xl font-black text-red-400">{{ $ditolak ?? 0 }}</p>
                    </div>

                    <div class="bg-slate-800/50 border border-emerald-900/30 p-4 rounded-2xl shadow-lg flex flex-col items-center justify-center text-center hover:bg-slate-800 transition duration-300">
                        <div class="mb-2 p-2 bg-emerald-500/10 rounded-lg text-emerald-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <p class="text-[10px] font-bold text-emerald-500/80 uppercase tracking-wider">Selesai</p>
                        <p class="text-2xl font-black text-emerald-400">{{ $selesai ?? 0 }}</p>
                    </div>

                </div>
            </div>

            <div class="bg-slate-800 rounded-2xl shadow-xl border border-slate-700 overflow-hidden">
                <div class="p-6 sm:p-8 border-b border-slate-700">
                    <h3 class="text-xl font-bold text-white">Riwayat Laporan Saya</h3>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-gray-300">
                        <thead class="text-xs text-gray-400 uppercase bg-slate-700/50">
                            <tr>
                                <th class="px-6 py-3 text-center">No</th>
                                <th class="px-6 py-3">Foto</th>
                                <th class="px-6 py-3">Judul</th>
                                <th class="px-6 py-3">Kategori</th>
                                <th class="px-6 py-3">Tanggal</th>
                                <th class="px-6 py-3 text-center">Status</th>
                                <th class="px-6 py-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-700">
                            @forelse($riwayatLaporan as $laporan)
                            <tr class="hover:bg-slate-700/30 transition">
                                
                                <td class="px-6 py-4 text-sm text-center text-slate-500">{{ $loop->iteration }}</td>
                                
                                <td class="px-6 py-4">
                                    @if($laporan->foto_kejadian)
                                        <a href="{{ asset('bukti_laporan/' . $laporan->foto_kejadian) }}" target="_blank">
                                            <img src="{{ asset('bukti_laporan/' . $laporan->foto_kejadian) }}" class="h-12 w-16 object-cover rounded border border-slate-600">
                                        </a>
                                    @else
                                        <span class="text-xs text-gray-500">No Foto</span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 font-bold text-white">{{ $laporan->judul_laporan }}</td>

                                <td class="px-6 py-4">
                                    <span class="bg-slate-700 text-gray-300 px-2 py-1 rounded text-xs border border-slate-600">
                                        {{ $laporan->kategori->nama_kategori ?? 'Umum' }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-sm text-slate-400">{{ \Carbon\Carbon::parse($laporan->tgl_pengaduan)->format('d M Y') }}</td>

                                <td class="px-6 py-4 text-center">
                                    @if($laporan->status == '0' || $laporan->status == 'pending' || empty($laporan->status))
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-500/10 text-yellow-400 border border-yellow-500/20">Verifikasi</span>
                                    @elseif($laporan->status == 'proses')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-500/10 text-blue-400 border border-blue-500/20">Diproses</span>
                                    @elseif($laporan->status == 'selesai')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">Selesai</span>
                                    @elseif($laporan->status == 'ditolak')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-500/10 text-red-400 border border-red-500/20">Ditolak</span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-right">
                            <div class="flex justify-end items-center gap-2">
        
                                <a href="{{ route('masyarakat.laporan.show', $laporan->id) }}" class="text-blue-400 hover:text-white border border-blue-500/30 px-3 py-1 rounded-lg text-xs font-bold transition">
                                    Detail
                                </a>

                                @if(!in_array($laporan->status, ['proses', 'selesai', 'ditolak']))
            
                                <a href="{{ route('masyarakat.laporan.edit', $laporan->id) }}" class="text-yellow-400 hover:text-white border border-yellow-500/30 px-3 py-1 rounded-lg text-xs font-bold transition">
                                    Edit
                                </a>

                                <form action="{{ route('masyarakat.laporan.destroy', $laporan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus laporan ini?');" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-white border border-red-500/30 px-3 py-1 rounded-lg text-xs font-bold transition">
                                        Hapus
                                    </button>
                                </form>
        
                                @endif

                            </div>
                        </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-10 text-gray-500">Belum ada laporan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>