<x-app-layout>
    <div class="min-h-screen bg-[#0f172a] text-white font-sans py-12">
        
        <div class="absolute inset-0 bg-slate-900/50" style="background-image: linear-gradient(to right, #1e293b 1px, transparent 1px), linear-gradient(to bottom, #1e293b 1px, transparent 1px); background-size: 40px 40px; opacity: 0.5;"></div>

        <div class="relative z-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-white">Kelola Pengguna</h1>
                    <p class="text-slate-400 text-sm">Manajemen akun Petugas, Admin, dan Masyarakat.</p>
                </div>
                <a href="{{ route('admin.users.create') }}" class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-2.5 px-5 rounded-xl shadow-lg shadow-blue-900/30 transition flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Tambah User Baru
                </a>
            </div>

            @if (session('success'))
                <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 rounded-xl text-emerald-400 flex items-center shadow-sm">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-slate-800 rounded-2xl shadow-2xl border border-slate-700 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-slate-300">
                        <thead class="text-xs text-slate-400 uppercase bg-slate-900/50">
                            <tr>
                                <th class="px-6 py-4 font-bold tracking-wider">No</th>
                                <th class="px-6 py-4 font-bold tracking-wider">Nama Lengkap</th>
                                <th class="px-6 py-4 font-bold tracking-wider">Email</th>
                                <th class="px-6 py-4 font-bold tracking-wider text-center">Role</th>
                                <th class="px-6 py-4 font-bold tracking-wider text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-700">
                            @foreach($users as $user)
                            <tr class="hover:bg-slate-700/30 transition">
                                <td class="px-6 py-4 text-sm text-slate-500">{{ $loop->iteration }}</td>
                                
                                <td class="px-6 py-4">
                                    <div class="font-bold text-white">{{ $user->name }}</div>
                                    <div class="text-xs text-slate-500">Joined: {{ $user->created_at->format('d M Y') }}</div>
                                </td>
                                
                                <td class="px-6 py-4 text-sm">{{ $user->email }}</td>
                                
                                <td class="px-6 py-4 text-center">
                                    @if($user->role == 'admin')
                                        <span class="bg-purple-500/10 text-purple-400 px-3 py-1 rounded-full text-xs font-bold border border-purple-500/20">Administrator</span>
                                    @elseif($user->role == 'petugas')
                                        <span class="bg-emerald-500/10 text-emerald-400 px-3 py-1 rounded-full text-xs font-bold border border-emerald-500/20">Petugas</span>
                                    @else
                                        <span class="bg-blue-500/10 text-blue-400 px-3 py-1 rounded-full text-xs font-bold border border-blue-500/20">Masyarakat</span>
                                    @endif
                                </td>
                                
                                <td class="px-6 py-4 text-right flex justify-end gap-2">
                                    <a href="{{ route('users.edit', $user->id) }}" class="bg-yellow-500/10 text-yellow-400 px-3 py-1.5 rounded-lg border border-yellow-500/20 text-xs font-bold hover:bg-yellow-500/20 transition">
                                        EDIT
                                    </a>

                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin hapus user ini?');">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit" class="bg-red-500/10 text-red-400 px-3 py-1.5 rounded-lg border border-red-500/20 text-xs font-bold hover:bg-red-500/20 transition">
                                            HAPUS
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>