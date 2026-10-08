<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SteamKlin') }} — {{ $title ?? 'Masuk' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-slate-100 min-h-screen">
        <div class="min-h-screen flex flex-col items-center justify-center px-4 py-12">

            {{-- Logo / Brand --}}
            <a href="/" class="flex items-center gap-2 mb-8 group">
                <div class="w-10 h-10 rounded-xl bg-cyan-600 flex items-center justify-center shadow-md group-hover:bg-cyan-700 transition-colors">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.5 12.75l6 6 9-13.5"/>
                        <!-- Steam / water wave icon -->
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 16.5c1.5-1 3-1 4.5 0s3 1 4.5 0 3-1 4.5 0 3 1 4.5 0"/>
                    </svg>
                </div>
                <span class="text-2xl font-extrabold tracking-tight text-slate-900">
                    Steam<span class="text-cyan-600">Klin</span>
                </span>
            </a>

            {{-- Card --}}
            <div class="w-full max-w-md bg-white rounded-2xl shadow-sm border border-slate-200 px-8 py-8">
                {{ $slot }}
            </div>

            {{-- Footer --}}
            <p class="mt-6 text-xs text-slate-400">
                &copy; {{ date('Y') }} SteamKlin Auto Care. All rights reserved.
            </p>
        </div>
    </body>
</html>
