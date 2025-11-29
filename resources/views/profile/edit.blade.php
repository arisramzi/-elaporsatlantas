<x-app-layout>
    <div class="min-h-screen bg-[#0f172a] text-white font-sans py-12">
        
        <div class="absolute inset-0 bg-slate-900/50" style="background-image: linear-gradient(to right, #1e293b 1px, transparent 1px), linear-gradient(to bottom, #1e293b 1px, transparent 1px); background-size: 40px 40px; opacity: 0.5;"></div>

        <div class="relative z-10 max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <div class="flex items-center gap-4 mb-8">
                <div class="bg-blue-600 p-3 rounded-xl shadow-lg shadow-blue-500/30">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-white">Pengaturan Akun</h1>
                    <p class="text-slate-400 text-sm">Perbarui profil dan keamanan akun Anda.</p>
                </div>
            </div>

            <div class="p-8 bg-slate-800 border border-slate-700 shadow-2xl rounded-2xl">
                <div class="max-w-xl">
                    <header class="mb-6">
                        <h2 class="text-lg font-bold text-blue-400 uppercase tracking-wider">Informasi Profil</h2>
                        <p class="mt-1 text-sm text-slate-400">Perbarui nama profil dan alamat email akun Anda.</p>
                    </header>

                    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
                        @csrf
                        @method('patch')

                        <div>
                            <label class="block text-sm font-bold text-slate-300 mb-2">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" required autofocus 
                                   class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-slate-600">
                            @error('name') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-300 mb-2">Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" required 
                                   class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-slate-600">
                            @error('email') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-2 px-6 rounded-lg transition shadow-lg">SIMPAN</button>
                            @if (session('status') === 'profile-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-emerald-400 font-bold">Tersimpan.</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            <div class="p-8 bg-slate-800 border border-slate-700 shadow-2xl rounded-2xl">
                <div class="max-w-xl">
                    <header class="mb-6">
                        <h2 class="text-lg font-bold text-emerald-400 uppercase tracking-wider">Ganti Password</h2>
                        <p class="mt-1 text-sm text-slate-400">Pastikan akun Anda menggunakan password yang panjang dan acak agar tetap aman.</p>
                    </header>

                    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
                        @csrf
                        @method('put')

                        <div>
                            <label class="block text-sm font-bold text-slate-300 mb-2">Password Saat Ini</label>
                            <input type="password" name="current_password" autocomplete="current-password" 
                                   class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white p-3 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                            @error('current_password') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-300 mb-2">Password Baru</label>
                            <input type="password" name="password" autocomplete="new-password" 
                                   class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white p-3 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                            @error('password') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-300 mb-2">Konfirmasi Password Baru</label>
                            <input type="password" name="password_confirmation" autocomplete="new-password" 
                                   class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white p-3 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                            @error('password_confirmation') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white font-bold py-2 px-6 rounded-lg transition shadow-lg">UPDATE PASSWORD</button>
                            @if (session('status') === 'password-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-emerald-400 font-bold">Tersimpan.</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            <div class="p-8 bg-red-900/20 border border-red-900/50 shadow-2xl rounded-2xl">
                <div class="max-w-xl">
                    <header class="mb-6">
                        <h2 class="text-lg font-bold text-red-400 uppercase tracking-wider">Hapus Akun</h2>
                        <p class="mt-1 text-sm text-slate-400">Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen.</p>
                    </header>

                    <form method="post" action="{{ route('profile.destroy') }}" class="space-y-6" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun ini secara permanen?');">
                        @csrf
                        @method('delete')

                        <div>
                            <label class="block text-sm font-bold text-slate-300 mb-2">Password untuk konfirmasi</label>
                            <input type="password" name="password" placeholder="Masukkan password Anda" 
                                   class="w-full bg-slate-900 border border-slate-600 rounded-xl text-white p-3 focus:ring-2 focus:ring-red-500 focus:border-red-500">
                            @error('password', 'userDeletion') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <button type="submit" class="bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-6 rounded-lg transition shadow-lg">HAPUS AKUN SAYA</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>