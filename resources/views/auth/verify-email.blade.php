<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifikasi Email - Satlantas</title>
    
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
            <p class="text-slate-400 mt-2 text-sm font-medium">Verifikasi Akun Anda</p>
        </div>

        <div class="w-full sm:max-w-md mt-2 px-6 py-8 bg-slate-800 border border-slate-700 shadow-2xl overflow-hidden sm:rounded-2xl relative">
            
            <div class="flex justify-center mb-6">
                <div class="bg-slate-700/50 p-4 rounded-full ring-1 ring-slate-600">
                    <svg class="w-10 h-10 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
            </div>

            <div class="mb-6 text-sm text-slate-300 leading-relaxed text-center">
                {{ __('Terima kasih telah mendaftar! Sebelum memulai, mohon verifikasi alamat email Anda dengan mengklik tautan yang baru saja kami kirimkan ke email Anda.') }}
                <br><br>
                <span class="text-slate-500">{{ __('Jika Anda tidak menerima email tersebut, kami dengan senang hati akan mengirimkan yang baru.') }}</span>
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-6 font-medium text-sm text-emerald-400 bg-emerald-900/30 p-4 rounded-xl border border-emerald-500/30 text-center">
                    {{ __('Tautan verifikasi baru telah dikirim ke alamat email yang Anda berikan saat pendaftaran.') }}
                </div>
            @endif

            <div class="flex flex-col gap-4">
                
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-600/20 transition transform hover:scale-[1.02]">
                        {{ __('KIRIM ULANG VERIFIKASI') }}
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}" class="text-center">
                    @csrf
                    <button type="submit" class="text-sm text-slate-400 hover:text-white underline decoration-slate-600 hover:decoration-white transition">
                        {{ __('Keluar (Log Out)') }}
                    </button>
                </form>
            </div>
        </div>
        
        <div class="mt-8 text-center text-slate-600 text-xs">
            &copy; {{ date('Y') }} Sistem Pelaporan Satlantas.
        </div>

    </div>
</body>
</html>