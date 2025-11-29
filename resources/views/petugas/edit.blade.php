<x-app-layout>
    <div class="min-h-screen bg-[#0f172a] text-white font-sans py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-6">
                <a href="{{ route('petugas.dashboard') }}" class="text-slate-400 hover:text-white flex items-center gap-2 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Batal & Kembali
                </a>
            </div>

            <div class="bg-slate-800 border border-slate-700 rounded-2xl shadow-2xl overflow-hidden">
                <div class="p-6 border-b border-slate-700 bg-slate-800/50">
                    <h1 class="text-2xl font-bold text-white">Laporan Pengerjaan Tugas</h1>
                    <p class="text-slate-400 text-sm mt-1">Silakan isi hasil penanganan di lapangan.</p>
                </div>

                <div class="p-8">
                    <div class="bg-slate-900/50 p-4 rounded-xl border border-slate-600 mb-8">
                        <h3 class="text-xs text-emerald-400 font-bold uppercase mb-1">Target Tugas</h3>
                        <p class="text-white font-bold">{{ $pengaduan->judul_laporan }}</p>
                        <p class="text-slate-400 text-sm">{{ $pengaduan->lokasi_kejadian }}</p>
                    </div>

                    <form action="{{ route('petugas.laporan.update', $pengaduan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-sm font-bold text-slate-300 mb-2">Status Akhir</label>
                            <select name="status" class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white p-3 focus:ring-emerald-500">
                                <option value="proses" {{ $pengaduan->status == 'proses' ? 'selected' : '' }}>Masih Diproses (Belum Selesai)</option>
                                <option value="selesai" {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>✅ Selesai (Kasus Beres)</option>
                                <option value="ditolak" {{ $pengaduan->status == 'ditolak' ? 'selected' : '' }}>⛔ Ditolak / Tidak Valid</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-300 mb-2">Laporan Hasil Pengerjaan</label>
                            <textarea name="tanggapan_petugas" rows="4" placeholder="Contoh: Lubang jalan sudah ditambal menggunakan aspal dingin..." class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white p-3 focus:ring-emerald-500"></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-300 mb-2">Foto Bukti Penanganan (Opsional)</label>
                            <input type="file" name="foto_penanganan" class="block w-full text-sm text-slate-400
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-emerald-600 file:text-white
                                hover:file:bg-emerald-700
                            "/>
                        </div>

                        <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-500 text-white font-bold py-4 rounded-xl shadow-lg transition transform hover:scale-[1.02]">
                            KIRIM LAPORAN KERJA
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>