<x-app-layout>
    <div class="min-h-screen bg-[#0f172a] text-white font-sans py-12">
        
        <div class="absolute inset-0 bg-slate-900/50" style="background-image: linear-gradient(to right, #1e293b 1px, transparent 1px), linear-gradient(to bottom, #1e293b 1px, transparent 1px); background-size: 40px 40px; opacity: 0.5;"></div>

        <div class="relative z-10 max-w-[90rem] mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-8 flex flex-col md:flex-row justify-between items-center gap-4 bg-slate-800/50 border border-slate-700 p-6 rounded-2xl backdrop-blur-sm shadow-xl">
                
                <div class="flex items-center gap-4">
                    <div class="bg-blue-600 p-3 rounded-xl shadow-lg shadow-blue-500/30">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    </div>
                    <div>
                        <h2 class="text-xs text-blue-400 font-bold tracking-wider uppercase">Data Masuk</h2>
                        <h1 class="text-2xl font-black text-white">DAFTAR LAPORAN</h1>
                    </div>
                </div>

                <div class="flex items-center gap-3 w-full md:w-auto">
                    
                    <div class="bg-slate-900 border border-slate-600 px-4 py-2 rounded-xl shadow-sm text-sm text-slate-400 whitespace-nowrap">
                        Total: <span class="font-bold text-white">{{ $laporanMasuk->count() }}</span>
                    </div>

                    <form action="{{ route('admin.laporan.index') }}" method="GET" class="relative w-full md:w-72">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}" 
                               class="block w-full pl-10 pr-4 py-2.5 text-sm text-white bg-slate-900 border border-slate-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-slate-500 transition" 
                               placeholder="Cari judul, lokasi, pelapor...">
                        @if(request('search'))
                            <a href="{{ route('admin.laporan.index') }}" class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-500 hover:text-red-400 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </a>
                        @endif
                    </form>

                </div>
            </div>

            <div class="bg-slate-800 rounded-2xl shadow-2xl border border-slate-700 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-slate-300">
                        <thead class="text-xs text-slate-400 uppercase bg-slate-900/50">
                            <tr>
                                <th class="px-6 py-4 font-bold tracking-wider">No</th>
                                <th class="px-6 py-4 font-bold tracking-wider">Foto</th>
                                <th class="px-6 py-4 font-bold tracking-wider">Pelapor</th>
                                <th class="px-6 py-4 font-bold tracking-wider">Judul Laporan</th>
                                <th class="px-6 py-4 font-bold tracking-wider">Kategori</th>
                                <th class="px-6 py-4 font-bold tracking-wider">Tanggal</th>
                                <th class="px-6 py-4 font-bold tracking-wider text-center">Status</th>
                                <th class="px-6 py-4 font-bold tracking-wider text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-700/50">
                            @forelse($laporanMasuk as $item)
                            <tr class="hover:bg-slate-700/30 transition duration-200">
                                
                                <td class="px-6 py-4 text-sm text-slate-500 font-mono">
                                    {{ $loop->iteration }}
                                </td>
                                
                                <td class="px-6 py-4">
                                    @if($item->foto_kejadian || $item->bukti_foto)
                                        <div class="h-12 w-16 rounded-lg bg-slate-700 border border-slate-600 overflow-hidden relative group">
                                            <img src="{{ asset('bukti_laporan/' . ($item->foto_kejadian ?? $item->bukti_foto)) }}" 
                                                 class="h-full w-full object-cover transition duration-300 group-hover:scale-110"
                                                 title="Bukti Foto">
                                        </div>
                                    @else
                                        <span class="text-xs text-slate-600 italic">No Img</span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-bold text-white">{{ $item->user->name ?? 'Anonim' }}</div>
                                    <div class="text-[10px] text-slate-500">{{ $item->user->email ?? '-' }}</div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="text-sm font-bold text-white">{{ Str::limit($item->judul_laporan, 30) }}</div>
                                </td>
                                
                                <td class="px-6 py-4">
                                    <span class="text-[10px] font-bold text-blue-300 bg-blue-500/10 px-2 py-1 rounded border border-blue-500/20 uppercase whitespace-nowrap">
                                        {{ $item->kategori->nama_kategori ?? $item->kategori ?? 'Umum' }}
                                    </span>
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-400">
                                    {{ \Carbon\Carbon::parse($item->tgl_pengaduan)->format('d M Y') }}
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if($item->status == '0' || $item->status == 'pending' || empty($item->status))
                                        <span class="px-3 py-1 inline-flex text-[10px] font-bold uppercase tracking-wide rounded-full bg-yellow-500/10 text-yellow-400 border border-yellow-500/20">
                                            Verifikasi
                                        </span>
                                    @elseif($item->status == 'proses')
                                        <span class="px-3 py-1 inline-flex text-[10px] font-bold uppercase tracking-wide rounded-full bg-blue-500/10 text-blue-400 border border-blue-500/20">
                                            Proses
                                        </span>
                                    @elseif($item->status == 'selesai')
                                        <span class="px-3 py-1 inline-flex text-[10px] font-bold uppercase tracking-wide rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                            Selesai
                                        </span>
                                    @elseif($item->status == 'ditolak')
                                        <span class="px-3 py-1 inline-flex text-[10px] font-bold uppercase tracking-wide rounded-full bg-red-500/10 text-red-400 border border-red-500/20">
                                            Ditolak
                                        </span>
                                    @endif
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex justify-end gap-2">
                                        
                                        <a href="{{ route('admin.laporan.show', $item->id) }}" class="inline-flex items-center gap-1 text-white bg-blue-600 hover:bg-blue-500 px-3 py-1.5 rounded-lg shadow-sm transition text-xs font-bold">
                                            Periksa
                                        </a>

                                        <a href="{{ route('admin.laporan.edit', $item->id) }}" class="inline-flex items-center gap-1 text-yellow-600 bg-yellow-100 hover:bg-yellow-200 px-3 py-1.5 rounded-lg shadow-sm transition text-xs font-bold">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.laporan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus laporan ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center gap-1 text-white bg-red-600 hover:bg-red-700 px-3 py-1.5 rounded-lg shadow-sm transition text-xs font-bold">
                                                Hapus
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="px-6 py-16 text-center text-slate-500">
                                    <div class="flex flex-col items-center justify-center opacity-50">
                                        <svg class="w-16 h-16 mb-4 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        <p class="text-lg font-medium">Data tidak ditemukan.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>