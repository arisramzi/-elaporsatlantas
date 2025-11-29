<x-app-layout>
    <div class="min-h-screen bg-[#0f172a] text-white font-sans py-12">
        
        <div class="absolute inset-0 bg-slate-900/50" style="background-image: linear-gradient(to right, #1e293b 1px, transparent 1px), linear-gradient(to bottom, #1e293b 1px, transparent 1px); background-size: 40px 40px; opacity: 0.5;"></div>

        <div class="relative z-10 max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-white tracking-tight">Edit Data Laporan</h1>
                    <p class="text-slate-400 text-sm mt-1">Halaman Admin - Perbaiki kesalahan input pelapor.</p>
                </div>
                <a href="{{ route('admin.laporan.index') }}" class="bg-slate-800 hover:bg-slate-700 text-white px-4 py-2 rounded-lg border border-slate-700 transition text-sm font-medium flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Batal
                </a>
            </div>

            <div class="bg-slate-800 rounded-2xl shadow-2xl border border-slate-700 overflow-hidden">
                
                <div class="p-8">
                    <form action="{{ route('admin.laporan.update-data', $pengaduan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-sm font-bold text-slate-400 uppercase tracking-wider mb-2">Judul Laporan</label>
                            <input type="text" name="judul_laporan" value="{{ $pengaduan->judul_laporan }}" 
                                   class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition placeholder-slate-600">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            
                            <div>
                                <label class="block text-sm font-bold text-slate-400 uppercase tracking-wider mb-2">Kategori</label>
                                <div class="relative">
                                    <select name="kategori_id" class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white px-4 py-3 appearance-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                                        @foreach($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}" {{ $pengaduan->kategori_id == $kategori->id ? 'selected' : '' }}>
                                                {{ $kategori->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-400 uppercase tracking-wider mb-2">Tanggal Kejadian</label>
                                <input type="date" name="tgl_kejadian" value="{{ $pengaduan->tgl_kejadian }}" 
                                       class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition [&::-webkit-calendar-picker-indicator]:filter [&::-webkit-calendar-picker-indicator]:invert">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-400 uppercase tracking-wider mb-2">Detail Laporan</label>
                            <textarea name="isi_laporan" rows="6" 
                                      class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">{{ $pengaduan->isi_laporan ?? $pengaduan->detail_laporan }}</textarea>
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

                        <div class="pt-4">
                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-4 px-4 rounded-xl shadow-lg shadow-blue-900/50 transition transform hover:scale-[1.01] flex justify-center items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                SIMPAN PERUBAHAN
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>