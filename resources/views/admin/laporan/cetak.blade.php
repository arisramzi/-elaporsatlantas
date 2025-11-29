<x-app-layout>
    <div class="min-h-screen bg-[#0f172a] text-white font-sans py-12">
        
        <div class="absolute inset-0 bg-slate-900/50" style="background-image: linear-gradient(to right, #1e293b 1px, transparent 1px), linear-gradient(to bottom, #1e293b 1px, transparent 1px); background-size: 40px 40px; opacity: 0.5;"></div>

        <div class="relative z-10 max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-white tracking-tight">Export Laporan</h1>
                    <p class="text-slate-400 text-sm mt-1">Cetak rekapitulasi laporan dalam format PDF.</p>
                </div>
                <a href="{{ route('admin.dashboard') }}" class="text-slate-400 hover:text-white flex items-center gap-2 transition font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Dashboard
                </a>
            </div>

            <div class="bg-slate-800 rounded-2xl shadow-2xl border border-slate-700 overflow-hidden">
                <div class="p-8">
                    
                    <div class="flex items-center gap-4 mb-6">
                        <div class="bg-blue-600 p-3 rounded-xl shadow-lg shadow-blue-500/30">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-white">Filter Laporan Bulanan</h2>
                            <p class="text-slate-400 text-xs">Pilih periode bulan dan tahun yang ingin dicetak.</p>
                        </div>
                    </div>

                    <form action="{{ route('admin.laporan.cetak-rekap') }}" method="GET" target="_blank" class="space-y-6">
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-slate-300 mb-2">Bulan</label>
                                <select name="bulan" class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white p-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 cursor-pointer">
                                    <option value="">-- Semua Bulan (Setahun Penuh) --</option>
                                    @foreach(range(1, 12) as $m)
                                        <option value="{{ $m }}" {{ date('m') == $m ? 'selected' : '' }}>
                                            {{ \Carbon\Carbon::create()->month($m)->translatedFormat('F') }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-300 mb-2">Tahun</label>
                                <select name="tahun" class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white p-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 cursor-pointer">
                                    @foreach(range(date('Y'), 2020) as $y)
                                        <option value="{{ $y }}" {{ date('Y') == $y ? 'selected' : '' }}>
                                            {{ $y }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="flex gap-4 pt-4">
                            
                            <button type="submit" name="type" value="download" class="flex-1 w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-4 rounded-xl shadow-lg transition transform hover:scale-[1.02] flex justify-center items-center gap-2">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                DOWNLOAD FILE
                            </button>

                            <button type="submit" name="type" value="print" formtarget="_blank" class="flex-1 w-full bg-slate-700 hover:bg-slate-600 text-white font-bold py-4 rounded-xl border border-slate-600 transition transform hover:scale-[1.02] flex justify-center items-center gap-2">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                                PREVIEW & CETAK
                            </button>

                        </div>

                    </form>

                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                <div class="bg-slate-800/50 border border-slate-700 p-5 rounded-xl flex items-start gap-3">
                    <div class="bg-blue-500/10 p-2 rounded-lg text-blue-400 mt-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-white font-bold text-sm">Tips Cetak</h3>
                        <p class="text-slate-400 text-xs mt-1">Jika Anda memilih "Semua Bulan", sistem akan mencetak seluruh laporan dalam tahun yang dipilih.</p>
                    </div>
                </div>

                <div class="bg-slate-800/50 border border-slate-700 p-5 rounded-xl flex items-start gap-3">
                    <div class="bg-emerald-500/10 p-2 rounded-lg text-emerald-400 mt-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-white font-bold text-sm">Data Akurat</h3>
                        <p class="text-slate-400 text-xs mt-1">Pastikan semua laporan bulan ini sudah diverifikasi sebelum dicetak.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>