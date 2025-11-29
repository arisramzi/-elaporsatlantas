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

                    <div>
                        <label class="block text-sm font-bold text-blue-400 uppercase mb-2">Detail Laporan</label>
                        <textarea name="isi_laporan" rows="5" 
                                  class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white px-4 py-3 focus:ring-2 focus:ring-blue-500">{{ $pengaduan->isi_laporan }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-blue-400 uppercase mb-2">Ganti Foto (Opsional)</label>
                        @if($pengaduan->foto_kejadian)
                            <div class="mb-2">
                                <img src="{{ asset('bukti_laporan/' . $pengaduan->foto_kejadian) }}" class="h-20 w-auto rounded border border-slate-600">
                            </div>
                        @endif
                        <input type="file" name="foto_kejadian" class="block w-full text-sm text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-blue-600 file:text-white hover:file:bg-blue-700 bg-slate-900 rounded-xl border border-slate-600">
                    </div>

                    <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-400 text-black font-bold py-4 px-4 rounded-xl shadow-lg transition transform hover:scale-[1.01]">
                        SIMPAN PERUBAHAN
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>