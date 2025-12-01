<x-app-layout>
    <div class="min-h-screen bg-[#0f172a] text-white font-sans py-12">
        <div class="relative z-10 max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-8 flex items-center justify-between">
                <h1 class="text-3xl font-black text-white">Edit Laporan</h1>
                <a href="{{ route('masyarakat.dashboard') }}" class="bg-slate-800 hover:bg-slate-700 text-white px-4 py-2 rounded-lg border border-slate-700 transition text-sm">
                    Batal
                </a>
            </div>

            <div class="bg-slate-800 rounded-2xl shadow-2xl border border-slate-700 p-8">
                <form action="{{ route('masyarakat.laporan.update', $pengaduan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT') <div>
                        <label class="block text-sm font-bold text-blue-400 uppercase mb-2">Judul Laporan</label>
                        <input type="text" name="judul_laporan" value="{{ $pengaduan->judul_laporan }}" 
                               class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white px-4 py-3 focus:ring-2 focus:ring-blue-500">
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-blue-400 uppercase mb-2">Kategori</label>
                            <select name="kategori_id" class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white px-4 py-3 focus:ring-2 focus:ring-blue-500">
                                <option value="">-- Pilih Kategori (Opsional) --</option>
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{ $pengaduan->kategori_id == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-blue-400 uppercase mb-2">Tanggal Kejadian</label>
                            <input type="date" name="tgl_kejadian" value="{{ $pengaduan->tgl_kejadian }}" class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white px-4 py-3 focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-blue-400 uppercase mb-2">Detail Laporan</label>
                        <textarea name="isi_laporan" rows="5" 
                                  class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white px-4 py-3 focus:ring-2 focus:ring-blue-500">{{ $pengaduan->isi_laporan }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-blue-400 uppercase mb-2">Lokasi Kejadian</label>
                        <input type="text" name="lokasi_kejadian" value="{{ $pengaduan->lokasi_kejadian }}" class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white px-4 py-3 focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                            <label class="block text-sm font-bold text-slate-400 uppercase tracking-wider mb-2">Bukti Foto (Opsional)</label>
                            
                            <div class="flex flex-col md:flex-row gap-6 items-start">
                                @if($pengaduan->bukti_foto || $pengaduan->foto_kejadian)
                                    <div class="shrink-0">
                                        <p class="text-xs text-slate-500 mb-2">Foto Saat Ini:</p>
                                        <img src="{{ asset('bukti_laporan/' . ($pengaduan->bukti_foto ?? $pengaduan->foto_kejadian)) }}" 
                                             class="h-32 w-auto rounded-lg border border-slate-600 shadow-md object-cover">
                                    </div>
                                @endif

                                <div class="w-full">
                                    <p class="text-xs text-slate-500 mb-2">Upload foto baru jika ingin mengganti:</p>
                                    <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-slate-600 border-dashed rounded-xl cursor-pointer bg-slate-900 hover:bg-slate-800 transition group">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-3 text-gray-500 group-hover:text-blue-500 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                            <p class="mb-2 text-sm text-gray-400"><span class="font-bold text-white">Klik untuk ganti foto</span></p>
                                            <p class="text-xs text-gray-500">JPG, PNG (Max 2MB)</p>
                                        </div>
                                        <input type="file" name="foto_kejadian" class="hidden" />
                                    </label>
                                </div>
                            </div>
                        </div>

                    <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-400 text-black font-bold py-4 px-4 rounded-xl shadow-lg transition transform hover:scale-[1.01]">
                        SIMPAN PERUBAHAN
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>