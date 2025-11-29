<x-app-layout>
    <div class="min-h-screen bg-[#0f172a] text-white font-sans py-12">
        
        <div class="absolute inset-0 bg-slate-900/50" style="background-image: linear-gradient(to right, #1e293b 1px, transparent 1px), linear-gradient(to bottom, #1e293b 1px, transparent 1px); background-size: 40px 40px; opacity: 0.5;"></div>

        <div class="relative z-10 max-w-6xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-6">
                <a href="{{ route('masyarakat.dashboard') }}" class="inline-flex items-center text-gray-400 hover:text-white transition group">
                    <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Dashboard
                </a>
            </div>

            <div class="bg-slate-800 rounded-2xl shadow-2xl border border-slate-700 overflow-hidden p-8">
                
                <div class="border-b border-slate-700 pb-6 mb-8 flex flex-col md:flex-row justify-between items-start md:items-end gap-4">
                    <div class="w-full">
                        <label class="text-xs text-blue-400 font-bold uppercase tracking-wider mb-1 block">Judul Laporan</label>
                        <h1 class="text-3xl md:text-4xl font-black text-white mb-2">{{ $pengaduan->judul_laporan }}</h1>
                        
                        @if($pengaduan->status == '0' || $pengaduan->status == 'pending')
                            <span class="inline-block px-3 py-1 rounded-full bg-yellow-500/20 text-yellow-400 border border-yellow-500/30 text-sm font-bold">Menunggu Verifikasi</span>
                        @elseif($pengaduan->status == 'proses')
                            <span class="inline-block px-3 py-1 rounded-full bg-blue-500/20 text-blue-400 border border-blue-500/30 text-sm font-bold">Sedang Diproses</span>
                        @elseif($pengaduan->status == 'selesai')
                            <span class="inline-block px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 text-sm font-bold">Selesai</span>
                        @elseif($pengaduan->status == 'ditolak')
                            <span class="inline-block px-3 py-1 rounded-full bg-red-500/20 text-red-400 border border-red-500/30 text-sm font-bold">Ditolak</span>
                        @endif
                    </div>

                    <div class="text-left md:text-right min-w-fit">
                        <label class="text-xs text-slate-500 font-bold uppercase tracking-wider mb-1 block">Tanggal Dikirim</label>
                        <div class="text-lg font-medium text-slate-300">
                            {{ \Carbon\Carbon::parse($pengaduan->tgl_pengaduan)->format('d F Y') }}
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    
                    <div class="lg:col-span-2 space-y-6">
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="text-xs text-blue-400 font-bold uppercase tracking-wider mb-2 block">Waktu Kejadian</label>
                                <div class="bg-slate-900 border border-slate-600 rounded-xl p-4 text-gray-300 shadow-inner">
                                    {{ \Carbon\Carbon::parse($pengaduan->tgl_kejadian)->format('d F Y') }}
                                </div>
                            </div>

                            <div>
                                <label class="text-xs text-blue-400 font-bold uppercase tracking-wider mb-2 block">Kategori</label>
                                <div class="bg-slate-900 border border-slate-600 rounded-xl p-4 text-gray-300 shadow-inner">
                                    {{ $pengaduan->kategori->nama_kategori ?? 'Kat ID: ' . $pengaduan->kategori_id }}
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="text-xs text-blue-400 font-bold uppercase tracking-wider mb-2 block">Lokasi Kejadian</label>
                            <div class="bg-slate-900 border border-slate-600 rounded-xl p-4 text-gray-300 shadow-inner flex items-start gap-3">
                                <svg class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <span>{{ $pengaduan->lokasi_kejadian }}</span>
                            </div>
                        </div>

                        <div>
                            <label class="text-xs text-blue-400 font-bold uppercase tracking-wider mb-2 block">Detail Laporan</label>
                            <div class="bg-slate-900 border border-slate-600 rounded-xl p-4 text-gray-300 shadow-inner min-h-[150px] whitespace-pre-line leading-relaxed">
                                {{ $pengaduan->isi_laporan }}
                            </div>
                        </div>

                        @if($pengaduan->tanggapan)
                        <div class="mt-8 pt-6 border-t border-slate-700">
                            <label class="text-xs text-emerald-400 font-bold uppercase tracking-wider mb-2 block flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                                Tanggapan Petugas
                            </label>
                            <div class="bg-emerald-900/20 border border-emerald-500/30 rounded-xl p-4 text-emerald-100 italic shadow-inner">
                                "{{ $pengaduan->tanggapan }}"
                            </div>
                        </div>
                        @endif

                    </div>

                    <div class="lg:col-span-1">
                        <label class="text-xs text-blue-400 font-bold uppercase tracking-wider mb-2 block">Bukti Foto</label>
                        
                        <div class="bg-slate-900 border border-slate-600 rounded-xl p-2 shadow-inner h-full min-h-[300px] flex flex-col items-center justify-center">
                            @if($pengaduan->foto_kejadian)
                                <div class="relative group w-full h-full">
                                    <img src="{{ asset('bukti_laporan/' . $pengaduan->foto_kejadian) }}" 
                                         class="w-full h-auto object-contain rounded-lg shadow-lg" 
                                         alt="Bukti Foto">
                                    
                                    <a href="{{ asset('bukti_laporan/' . $pengaduan->foto_kejadian) }}" target="_blank" class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition flex flex-col items-center justify-center gap-2 cursor-pointer rounded-lg">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                                        <span class="text-white font-bold text-sm">Perbesar Foto</span>
                                    </a>
                                </div>
                            @else
                                <div class="text-center text-slate-500">
                                    <svg class="w-16 h-16 mx-auto mb-3 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    <p>Tidak ada foto dilampirkan</p>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>