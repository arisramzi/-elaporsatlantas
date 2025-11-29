<x-app-layout>
    <div class="min-h-screen bg-[#0f172a] text-white font-sans py-12">
        
        <div class="absolute inset-0 bg-slate-900/50" style="background-image: linear-gradient(to right, #1e293b 1px, transparent 1px), linear-gradient(to bottom, #1e293b 1px, transparent 1px); background-size: 40px 40px; opacity: 0.5;"></div>

        <div class="relative z-10 max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-black text-white tracking-tight">Buat Laporan Baru</h1>
                    <p class="text-slate-400 mt-1">Isi formulir di bawah ini dengan data yang valid.</p>
                </div>
                <a href="{{ route('masyarakat.dashboard') }}" class="bg-slate-800 hover:bg-slate-700 text-white px-4 py-2 rounded-lg border border-slate-700 transition text-sm font-medium flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Batal
                </a>
            </div>

            <div class="bg-slate-800 rounded-2xl shadow-2xl border border-slate-700 overflow-hidden">
                
                <div class="h-1 w-full bg-slate-700">
                    <div class="h-full bg-blue-600 w-1/3 rounded-r-full"></div>
                </div>

                <div class="p-8">
                    @if ($errors->any())
                        <div class="mb-6 bg-red-500/10 border border-red-500/50 p-4 rounded-xl">
                            <ul class="list-disc list-inside text-sm text-red-400">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('masyarakat.lapor.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div>
                            <label class="block text-sm font-bold text-blue-400 uppercase tracking-wider mb-2">Judul Laporan</label>
                            <input type="text" name="judul_laporan" placeholder="Contoh: Jalan Berlubang di Pasar Baru" 
                                   class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition placeholder-slate-600">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            
                            <div>
                                <label class="block text-sm font-bold text-blue-400 uppercase tracking-wider mb-2">Kategori</label>
                                <div class="relative">
                                    <select name="kategori_id" class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white px-4 py-3 appearance-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                                        <option value="" disabled selected>-- Pilih Kategori --</option>
                                        @foreach($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-blue-400 uppercase tracking-wider mb-2">Tanggal Kejadian</label>
                                <input type="date" name="tgl_kejadian" 
                                       class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition  [&::-webkit-calendar-picker-indicator]:filter [&::-webkit-calendar-picker-indicator]:invert">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-blue-400 uppercase tracking-wider mb-2">Lokasi Kejadian</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                </div>
                                <input type="text" name="lokasi_kejadian" placeholder="Nama Jalan, Gedung, atau Patokan terdekat" 
                                       class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white pl-10 pr-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition placeholder-slate-600">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-blue-400 uppercase tracking-wider mb-2">Detail Laporan</label>
                            <textarea name="isi_laporan" rows="5" placeholder="Jelaskan kronologi kejadian secara rinci..." 
                                      class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition placeholder-slate-600"></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-blue-400 uppercase tracking-wider mb-2">Bukti Foto</label>
                            <div class="flex items-center justify-center w-full">
                                <label for="foto_kejadian" class="flex flex-col items-center justify-center w-full h-32 border-2 border-slate-600 border-dashed rounded-xl cursor-pointer bg-slate-900 hover:bg-slate-800 transition group">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-3 text-gray-500 group-hover:text-blue-500 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                        <p class="mb-2 text-sm text-gray-400"><span class="font-bold text-white">Klik untuk upload</span> atau drag and drop</p>
                                        <p class="text-xs text-gray-500">PNG, JPG atau JPEG (MAX. 2MB)</p>
                                    </div>
                                    <input id="foto_kejadian" type="file" name="foto_kejadian" class="hidden" />
                                </label>
                            </div>
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-4 px-4 rounded-xl shadow-lg shadow-blue-900/50 transition transform hover:scale-[1.01] flex justify-center items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                KIRIM LAPORAN
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>