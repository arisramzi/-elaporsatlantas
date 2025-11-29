<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konfirmasi Password - Satlantas</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#0f172a] text-white antialiased">

    <div class="fixed inset-0 z-0 pointer-events-none" style="background-image: linear-gradient(to right, #1e293b 1px, transparent 1px), linear-gradient(to bottom, #1e293b 1px, transparent 1px); background-size: 40px 40px; opacity: 0.4;"></div>

    <div class="relative z-10 min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 px-4">
        
        <div class="mb-6 text-center">
            <a href="/" class="flex items-center justify-center gap-2 group">
                <div class="bg-blue-600 p-2 rounded-lg shadow-lg shadow-blue-500/20 group-hover:bg-blue-500 transition">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <span class="text-2xl font-bold tracking-tight text-white">SATLANTAS</span>
            </a>
            <p class="text-slate-400 mt-2 text-sm font-medium">Area Aman Aplikasi</p>
        </div>

        <div class="w-full sm:max-w-md mt-2 px-6 py-8 bg-slate-800 border border-slate-700 shadow-2xl overflow-hidden sm:rounded-2xl relative">
            
            <div class="flex justify-center mb-6">
                <div class="bg-slate-700/50 p-3 rounded-full ring-1 ring-slate-600">
                    <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
            </div>

            <div class="mb-6 text-sm text-slate-300 leading-relaxed text-center">
                {{ __('Ini adalah area aman aplikasi. Harap konfirmasi password Anda sebelum melanjutkan tindakan ini.') }}
            </div>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-slate-300 mb-1">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="w-full px-4 py-2 bg-slate-900 border border-slate-600 rounded-lg text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition placeholder-slate-500"
                        placeholder="Masukkan password Anda">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400 text-sm" />
                </div>

                <button type="submit" class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-600/20 transition transform hover:scale-[1.02]">
                    {{ __('KONFIRMASI') }}
                </button>
            </form>
        </div>
        
        <div class="mt-8 text-center text-slate-600 text-xs">
            &copy; {{ date('Y') }} Sistem Pelaporan Satlantas.
        </div>

    </div>
</body>
</html>