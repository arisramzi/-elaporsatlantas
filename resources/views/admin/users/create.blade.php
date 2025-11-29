<x-app-layout>
    <div class="min-h-screen bg-[#0f172a] text-white font-sans py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-6">
                <a href="{{ route('admin.users.index') }}" class="text-slate-400 hover:text-white flex items-center gap-2 transition font-bold">
                    &larr; Kembali ke Daftar
                </a>
            </div>

            <div class="bg-slate-800 border border-slate-700 rounded-2xl shadow-2xl overflow-hidden">
                <div class="p-6 bg-slate-900/50 border-b border-slate-700">
                    <h2 class="text-xl font-bold text-white">Tambah Pengguna Baru</h2>
                    <p class="text-slate-400 text-sm">Daftarkan Petugas Lapangan atau Admin baru.</p>
                </div>
                
                <div class="p-8">
                    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label class="block text-sm font-bold text-slate-400 mb-2">Nama Lengkap</label>
                            <input type="text" name="name" class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-slate-600" placeholder="Contoh: Briptu Asep" required>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-400 mb-2">Email</label>
                            <input type="email" name="email" class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-slate-600" placeholder="nama@polri.go.id" required>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-400 mb-2">Password</label>
                            <input type="password" name="password" class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-slate-600" placeholder="Minimal 8 karakter" required>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-400 mb-2">Peran (Role)</label>
                            <select name="role" class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="petugas">Petugas Lapangan</option>
                                <option value="admin">Administrator</option>
                                <option value="masyarakat">Masyarakat (Warga)</option>
                            </select>
                        </div>

                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-4 rounded-xl transition shadow-lg shadow-blue-900/50 transform hover:scale-[1.02]">
                            SIMPAN PENGGUNA
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>