<x-app-layout>
    <div class="min-h-screen bg-[#0f172a] text-white font-sans py-12">
        
        <div class="absolute inset-0 bg-slate-900/50" style="background-image: linear-gradient(to right, #1e293b 1px, transparent 1px), linear-gradient(to bottom, #1e293b 1px, transparent 1px); background-size: 40px 40px; opacity: 0.5;"></div>

        <div class="relative z-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex justify-between items-center mb-8">
                <a href="{{ route('admin.laporan.index') }}" class="flex items-center text-slate-400 hover:text-white transition group font-medium">
                    <div class="bg-slate-800 p-2 rounded-lg mr-3 border border-slate-700 group-hover:border-blue-500 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    </div>
                    <span>Kembali ke Daftar</span>
                </a>

                <div class="flex items-center gap-3">
                    <span class="px-3 py-1 rounded-full bg-slate-800 border border-slate-700 text-xs font-mono text-slate-400">ID: #{{ $pengaduan->id }}</span>
                    <a href="{{ route('admin.laporan.cetak', $pengaduan->id) }}" class="flex items-center bg-blue-600 text-white px-5 py-2.5 rounded-xl hover:bg-blue-500 transition shadow-lg shadow-blue-900/20 font-bold text-sm group">
                        <svg class="w-5 h-5 mr-2 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                        Cetak PDF
                    </a>
                </div>
            </div>

            @if (session('success'))
                <div class="mb-8 p-4 bg-emerald-500/10 border border-emerald-500/20 rounded-xl text-emerald-400 flex items-center shadow-sm backdrop-blur-sm">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2 space-y-8">
                    
                    <div class="bg-slate-800 rounded-2xl shadow-2xl border border-slate-700 overflow-hidden">
                        
                        <div class="p-6 border-b border-slate-700 bg-slate-900/30">
                            <h2 class="text-xs font-bold text-blue-400 uppercase tracking-wider mb-2">Laporan Masyarakat</h2>
                            <h1 class="text-2xl md:text-3xl font-black text-white leading-tight">{{ $pengaduan->judul_laporan }}</h1>
                        </div>
                        
                        <div class="p-6 flex flex-col md:flex-row gap-6 items-stretch">
                            
                            <div class="flex-1 space-y-6">
                                <div class="bg-slate-900/50 border border-slate-700 p-3 rounded-xl flex items-center gap-3">
                                    <div class="bg-slate-800 p-2 rounded-lg text-blue-400">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-bold text-slate-500 uppercase">Kategori</p>
                                        <p class="text-sm font-bold text-white">{{ $pengaduan->kategori->nama_kategori ?? 'Umum' }}</p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div class="bg-slate-900/50 border border-slate-700 p-3 rounded-xl">
                                        <p class="text-[10px] font-bold text-slate-500 uppercase mb-1">Pelapor</p>
                                        <p class="text-sm font-bold text-white">{{ $pengaduan->user->name ?? 'Anonim' }}</p>
                                    </div>
                                    <div class="bg-slate-900/50 border border-slate-700 p-3 rounded-xl">
                                        <p class="text-[10px] font-bold text-slate-500 uppercase mb-1">Tanggal</p>
                                        <p class="text-sm font-bold text-white">{{ \Carbon\Carbon::parse($pengaduan->tgl_pengaduan)->format('d/m/Y') }}</p>
                                    </div>
                                </div>

                                <div>
                                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wide mb-2 block">Lokasi Kejadian</label>
                                    <div class="bg-slate-900 p-3 rounded-xl border border-slate-700 text-slate-300 text-sm">
                                        {{ $pengaduan->lokasi_kejadian }}
                                    </div>
                                </div>

                                <div>
                                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wide mb-2 block">Detail Laporan</label>
                                    <div class="bg-slate-900 p-4 rounded-xl border border-slate-700 text-slate-300 text-sm leading-relaxed whitespace-pre-line">
                                        {{ $pengaduan->detail_laporan ?? $pengaduan->isi_laporan }}
                                    </div>
                                </div>
                            </div>

                            <div class="w-full md:w-1/3 flex flex-col">
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wide mb-2 block">Bukti Foto</label>
                                
                                @if(!empty($pengaduan->bukti_foto) || !empty($pengaduan->foto_kejadian))
                                    <div class="group relative rounded-xl overflow-hidden border-2 border-slate-600 shadow-lg flex-grow h-full min-h-[250px]">
                                        <img src="{{ asset('bukti_laporan/' . ($pengaduan->bukti_foto ?? $pengaduan->foto_kejadian)) }}" 
                                             class="w-full h-full object-cover transition duration-500 group-hover:scale-110" 
                                             onclick="window.open(this.src)">
                                        
                                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition flex items-center justify-center cursor-pointer">
                                            <span class="text-white text-xs font-bold bg-slate-800 px-3 py-1 rounded-full border border-slate-500">Lihat Full</span>
                                        </div>
                                    </div>
                                @else
                                    <div class="flex-grow h-full min-h-[250px] bg-slate-900/50 border-2 border-dashed border-slate-700 rounded-xl flex flex-col items-center justify-center text-slate-500 text-xs">
                                        Tidak ada foto
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>

                    @if($pengaduan->tanggapan_petugas || $pengaduan->foto_penanganan)
                    <div class="bg-slate-800 rounded-2xl shadow-2xl border border-emerald-500/30 overflow-hidden relative">
                        <div class="absolute top-0 left-0 w-1 h-full bg-emerald-500"></div>
                        
                        <div class="p-6 border-b border-slate-700 bg-emerald-900/10 flex justify-between items-center">
                            <h2 class="text-xs font-bold text-emerald-400 uppercase tracking-wider flex items-center gap-2">
                                <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>
                                Laporan Hasil Petugas
                            </h2>
                        </div>

                        <div class="p-6 flex flex-col md:flex-row gap-6 items-stretch">
                            
                            <div class="flex-1 space-y-6">
                                <div class="bg-slate-900/50 border border-emerald-500/20 p-3 rounded-xl flex items-center gap-3">
                                    <div class="bg-slate-800 p-2 rounded-lg text-emerald-400">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-bold text-slate-500 uppercase">Kategori</p>
                                        <p class="text-sm font-bold text-emerald-200">{{ $pengaduan->kategori->nama_kategori ?? 'Umum' }}</p>
                                    </div>
                                </div>

                                <div class="bg-slate-900/50 border border-emerald-500/20 p-3 rounded-xl flex items-center gap-3">
                                    <div class="bg-slate-800 p-2 rounded-lg text-emerald-400">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-bold text-slate-500 uppercase">Ditangani Oleh</p>
                                        <p class="text-sm font-bold text-white">{{ $pengaduan->petugas->name ?? 'Petugas #'.$pengaduan->petugas_id }}</p>
                                    </div>
                                </div>

                                <div>
                                    <label class="text-xs font-bold text-emerald-600 uppercase mb-2 block">Deskripsi Pengerjaan</label>
                                    <div class="bg-slate-900 p-4 rounded-xl border border-emerald-500/20 text-emerald-100 text-sm leading-relaxed italic">
                                        "{{ $pengaduan->tanggapan_petugas }}"
                                    </div>
                                </div>
                            </div>

                            <div class="w-full md:w-1/3 flex flex-col">
                                <label class="text-xs font-bold text-emerald-600 uppercase mb-2 block">Bukti Selesai</label>
                                @if($pengaduan->foto_penanganan)
                                    <div class="rounded-xl overflow-hidden border-2 border-emerald-500/30 shadow-lg cursor-pointer hover:opacity-90 transition flex-grow h-full min-h-[250px]">
                                        <img src="{{ asset('bukti_laporan/' . $pengaduan->foto_penanganan) }}" 
                                             class="w-full h-full object-cover"
                                             onclick="window.open(this.src)">
                                    </div>
                                @else
                                    <div class="flex-grow h-full min-h-[250px] bg-slate-900/50 border-2 border-dashed border-emerald-500/30 rounded-xl flex items-center justify-center text-emerald-600/50 text-xs">
                                        Foto tidak ada
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                    @else
                        <div class="bg-slate-800/50 border-2 border-dashed border-slate-700 rounded-2xl p-8 text-center">
                            <p class="text-slate-500 font-bold text-sm">Petugas lapangan belum mengirimkan laporan hasil kerja.</p>
                        </div>
                    @endif

                </div>

                <div class="lg:col-span-1">
                    <div class="bg-slate-800 rounded-2xl shadow-xl border border-slate-700 overflow-hidden sticky top-6">
                        <div class="p-5 bg-slate-900 border-b border-slate-700">
                            <h3 class="text-lg font-bold text-white flex items-center gap-2">
                                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path></svg>
                                Panel Komando
                            </h3>
                            <p class="text-slate-400 text-xs mt-1">Kontrol Status & Penugasan</p>
                        </div>

                        <div class="p-6">
                            <form action="{{ route('admin.laporan.update', $pengaduan->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-6 text-center">
                                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Status Saat Ini</label>
                                    @if($pengaduan->status == '0' || $pengaduan->status == 'pending')
                                        <div class="bg-yellow-500/10 text-yellow-400 px-4 py-2 rounded-lg font-bold border border-yellow-500/20 w-full">Menunggu Verifikasi</div>
                                    @elseif($pengaduan->status == 'proses')
                                        <div class="bg-blue-500/10 text-blue-400 px-4 py-2 rounded-lg font-bold border border-blue-500/20 w-full">Sedang Diproses</div>
                                    @elseif($pengaduan->status == 'selesai')
                                        <div class="bg-emerald-500/10 text-emerald-400 px-4 py-2 rounded-lg font-bold border border-emerald-500/20 w-full">✅ Selesai</div>
                                    @elseif($pengaduan->status == 'ditolak')
                                        <div class="bg-red-500/10 text-red-400 px-4 py-2 rounded-lg font-bold border border-red-500/20 w-full">⛔ Ditolak</div>
                                    @endif
                                </div>

                                <hr class="border-slate-700 mb-6">

                                <div class="mb-4">
                                    <label class="block text-sm font-bold text-slate-300 mb-2">Update Status</label>
                                    <select name="status" class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="proses" {{ $pengaduan->status == 'proses' ? 'selected' : '' }}>Proses Laporan</option>
                                        <option value="selesai" {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                        <option value="ditolak" {{ $pengaduan->status == 'ditolak' ? 'selected' : '' }}>Tolak</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-sm font-bold text-slate-300 mb-2">Tugaskan Petugas</label>
                                    <select name="petugas_id" class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="" selected>-- Pilih Petugas --</option>
                                        @foreach($penduduk_petugas as $petugas)
                                            <option value="{{ $petugas->id }}" {{ $pengaduan->petugas_id == $petugas->id ? 'selected' : '' }}>
                                                {{ $petugas->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-6">
                                    <label class="block text-sm font-bold text-slate-300 mb-2">Catatan Admin</label>
                                    <textarea name="tanggapan" rows="3" 
                                              class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-slate-500 text-sm"
                                              placeholder="Catatan internal...">{{ $pengaduan->tanggapan }}</textarea>
                                </div>

                                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 px-4 rounded-xl transition shadow-lg shadow-blue-900/30 transform hover:scale-[1.02]">
                                    SIMPAN & UPDATE
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>