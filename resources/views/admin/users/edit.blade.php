<x-app-layout>
    <div class="min-h-screen bg-[#0f172a] text-white font-sans py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-6">
                <a href="{{ route('users.index') }}" class="text-slate-400 hover:text-white flex items-center gap-2 font-bold">
                    &larr; Kembali
                </a>
            </div>

            <div class="bg-slate-800 border border-slate-700 rounded-2xl shadow-xl p-8">
                <h2 class="text-2xl font-bold mb-6 text-white">Edit Pengguna</h2>

                <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT') <div>
                        <label class="block text-sm font-bold text-slate-400 mb-2">Nama</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white p-3 focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-400 mb-2">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white p-3 focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-400 mb-2">Password Baru (Opsional)</label>
                        <input type="password" name="password" placeholder="Kosongkan jika tidak ingin mengganti" class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white p-3 focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-400 mb-2">Role</label>
                        <select name="role" class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white p-3">
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="petugas" {{ $user->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
                            <option value="masyarakat" {{ $user->role == 'masyarakat' ? 'selected' : '' }}>Masyarakat</option>
                        </select>
                    </div>

                    <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-400 text-black font-bold py-3 rounded-xl transition transform hover:scale-[1.02]">
                        SIMPAN PERUBAHAN
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>