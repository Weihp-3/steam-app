<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SteamKlin Auto Care - Layanan Cuci Mobil Steam Online & Home Service</title>
        <meta name="description" content="Layanan cuci mobil steam profesional. Pilihan home service panggilan ke rumah atau booking antrean outlet tanpa ribet. Bersih higienis hingga ke sela interior.">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="font-sans antialiased text-slate-800 bg-slate-50 selection:bg-cyan-500 selection:text-white" x-data="{ mobileMenuOpen: false }">

        <!-- Top Announcement Bar -->
        <aside aria-label="Informasi Operasional" class="bg-slate-900 text-slate-200 text-xs sm:text-sm py-2 px-4 border-b border-slate-800">
            <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-2">
                <div class="flex items-center gap-3">
                    <span class="inline-flex items-center px-2 py-0.5 rounded bg-cyan-950 text-cyan-300 font-medium text-xs border border-cyan-800">Buka Setiap Hari</span>
                    <span>Jam Operasional: 08.00 - 18.00 WIB</span>
                </div>
                <div class="flex items-center gap-4 text-xs sm:text-sm">
                    <a href="tel:081234567890" class="hover:text-cyan-400 focus-visible:outline-2 focus-visible:outline-cyan-400 transition">Call: 0812-3456-7890</a>
                    <span class="text-slate-600">|</span>
                    <a href="#kontak" class="hover:text-cyan-400 focus-visible:outline-2 focus-visible:outline-cyan-400 transition">Lokasi Workshop</a>
                </div>
            </div>
        </aside>

        <!-- Main Navigation Bar -->
        <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-20">
                    
                    <!-- Brand Identity -->
                    <a href="#" class="flex items-center gap-3 group focus-visible:outline-2 focus-visible:outline-cyan-500 rounded p-1">
                        <div class="w-11 h-11 rounded-lg bg-cyan-700 text-white flex items-center justify-center font-bold text-xl shadow-sm group-hover:bg-cyan-800 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="text-xl font-bold tracking-tight text-slate-900 block leading-tight">SteamKlin</span>
                            <span class="text-xs font-medium text-slate-500 tracking-wide uppercase">Online Car Wash</span>
                        </div>
                    </a>

                    <!-- Desktop Menu -->
                    <nav class="hidden md:flex items-center gap-8" aria-label="Navigasi Utama">
                        <a href="#layanan" class="text-sm font-semibold text-slate-600 hover:text-cyan-700 focus-visible:outline-2 focus-visible:outline-cyan-500 rounded py-1 transition">Layanan & Harga</a>
                        <a href="#tentang" class="text-sm font-semibold text-slate-600 hover:text-cyan-700 focus-visible:outline-2 focus-visible:outline-cyan-500 rounded py-1 transition">Tentang Kami</a>
                        <a href="#cara-kerja" class="text-sm font-semibold text-slate-600 hover:text-cyan-700 focus-visible:outline-2 focus-visible:outline-cyan-500 rounded py-1 transition">Cara Reservasi</a>
                        <a href="#kontak" class="text-sm font-semibold text-slate-600 hover:text-cyan-700 focus-visible:outline-2 focus-visible:outline-cyan-500 rounded py-1 transition">Kontak & Lokasi</a>
                    </nav>

                    <!-- CTA & Auth -->
                    <div class="hidden md:flex items-center gap-3">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-slate-700 hover:text-slate-900 px-3 py-2 rounded-md hover:bg-slate-100 transition focus-visible:outline-2 focus-visible:outline-cyan-500">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-700 hover:text-slate-900 px-3 py-2 rounded-md hover:bg-slate-100 transition focus-visible:outline-2 focus-visible:outline-cyan-500">
                                    Masuk
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="text-sm font-semibold text-slate-600 hover:text-slate-900 px-3 py-2 rounded-md hover:bg-slate-100 transition focus-visible:outline-2 focus-visible:outline-cyan-500">
                                        Daftar
                                    </a>
                                @endif
                            @endauth
                        @endif

                        <a href="#booking" class="inline-flex items-center justify-center min-h-[44px] px-5 py-2.5 rounded-lg bg-cyan-700 hover:bg-cyan-800 text-white font-semibold text-sm shadow-sm transition focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-600">
                            Booking Cuci Mobil
                        </a>
                    </div>

                    <!-- Mobile Menu Trigger -->
                    <div class="flex items-center md:hidden">
                        <button 
                            type="button" 
                            @click="mobileMenuOpen = !mobileMenuOpen" 
                            :aria-expanded="mobileMenuOpen"
                            aria-controls="mobile-menu"
                            class="min-h-[44px] min-w-[44px] inline-flex items-center justify-center p-2 rounded-lg text-slate-600 hover:text-slate-900 hover:bg-slate-100 focus-visible:outline-2 focus-visible:outline-cyan-500"
                            aria-label="Buka menu navigasi"
                        >
                            <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                            <svg x-show="mobileMenuOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>

                </div>
            </div>

            <!-- Mobile Menu Dropdown -->
            <div 
                id="mobile-menu"
                x-show="mobileMenuOpen" 
                x-cloak 
                @click.away="mobileMenuOpen = false"
                @keydown.escape.window="mobileMenuOpen = false"
                class="md:hidden border-t border-slate-200 bg-white px-4 pt-3 pb-6 space-y-3"
            >
                <nav class="flex flex-col space-y-2" aria-label="Navigasi Mobile">
                    <a href="#layanan" @click="mobileMenuOpen = false" class="px-3 py-2 rounded-md text-base font-semibold text-slate-700 hover:bg-slate-100">Layanan & Harga</a>
                    <a href="#tentang" @click="mobileMenuOpen = false" class="px-3 py-2 rounded-md text-base font-semibold text-slate-700 hover:bg-slate-100">Tentang Kami</a>
                    <a href="#cara-kerja" @click="mobileMenuOpen = false" class="px-3 py-2 rounded-md text-base font-semibold text-slate-700 hover:bg-slate-100">Cara Reservasi</a>
                    <a href="#kontak" @click="mobileMenuOpen = false" class="px-3 py-2 rounded-md text-base font-semibold text-slate-700 hover:bg-slate-100">Kontak & Lokasi</a>
                </nav>
                <div class="pt-3 border-t border-slate-200 flex flex-col gap-2">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-3 py-2 rounded-md text-center text-sm font-semibold text-slate-700 bg-slate-100">
                                Dashboard Akun
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="px-3 py-2 rounded-md text-center text-sm font-semibold text-slate-700 bg-slate-100">
                                Masuk ke Akun
                            </a>
                        @endauth
                    @endif
                    <a href="#booking" @click="mobileMenuOpen = false" class="w-full text-center min-h-[44px] flex items-center justify-center px-4 py-2.5 rounded-lg bg-cyan-700 text-white font-semibold text-sm">
                        Booking Cuci Mobil
                    </a>
                </div>
            </div>
        </header>

        <!-- Hero Section -->
        <section id="hero" class="relative bg-gradient-to-b from-slate-100 via-white to-slate-50 py-16 sm:py-24 border-b border-slate-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                    
                    <div class="lg:col-span-7 space-y-6">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-cyan-100 text-cyan-900 text-xs sm:text-sm font-semibold border border-cyan-200">
                            <span class="w-2 h-2 rounded-full bg-cyan-600"></span>
                            Tersedia Panggilan Home Service & Booking Outlet
                        </div>

                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-slate-900 leading-tight">
                            Cuci Mobil Steam Berkualitas Tinggi, Tanpa Repot Antre Berjam-jam
                        </h1>

                        <p class="text-base sm:text-lg text-slate-600 leading-relaxed max-w-2xl">
                            Nikmati mobil bersih maksimal dengan teknologi uap panas bertekanan tinggi. Efektif merontokkan kotoran kolong, debu interior, hingga membasmi bakteri kabin tanpa membuat cat baret.
                        </p>

                        <!-- CTA Row -->
                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 pt-2">
                            <a href="#booking" class="inline-flex items-center justify-center min-h-[48px] px-6 py-3 rounded-lg bg-cyan-700 hover:bg-cyan-800 text-white font-semibold text-base shadow-sm transition focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-600">
                                Pesan Jadwal Sekarang
                            </a>
                            <a href="#layanan" class="inline-flex items-center justify-center min-h-[48px] px-6 py-3 rounded-lg bg-white hover:bg-slate-100 text-slate-800 font-semibold text-base border border-slate-300 transition focus-visible:outline-2 focus-visible:outline-slate-400">
                                Lihat Menu Layanan & Harga
                            </a>
                        </div>

                        <!-- 3 Poin Keuntungan Ringkas -->
                        <div class="pt-6 border-t border-slate-200 grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 rounded bg-cyan-100 text-cyan-800 flex items-center justify-center font-bold text-xs shrink-0 mt-0.5">1</div>
                                <div>
                                    <h2 class="text-sm font-semibold text-slate-900">Hemat Air & Waktu</h2>
                                    <p class="text-xs text-slate-600">Teknologi steam hanya butuh sedikit air, pengerjaan lebih rapi dan presisi.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 rounded bg-cyan-100 text-cyan-800 flex items-center justify-center font-bold text-xs shrink-0 mt-0.5">2</div>
                                <div>
                                    <h2 class="text-sm font-semibold text-slate-900">Sabun pH Netral</h2>
                                    <p class="text-xs text-slate-600">Formula wax aman yang menjaga lapisan kilap clear coat mobil tetap terjaga.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 rounded bg-cyan-100 text-cyan-800 flex items-center justify-center font-bold text-xs shrink-0 mt-0.5">3</div>
                                <div>
                                    <h2 class="text-sm font-semibold text-slate-900">Sanitasi Panas</h2>
                                    <p class="text-xs text-slate-600">Uap panas hingga 100 derajat membantu matikan jamur dan bau apek interior.</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Right Column: Visual Box Card -->
                    <div class="lg:col-span-5">
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8 space-y-6">
                            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                                <div>
                                    <span class="text-xs font-semibold text-cyan-700 uppercase tracking-wider block">Ringkasan Sistem Booking</span>
                                    <h2 class="text-lg font-bold text-slate-900">Pilih Metode Sesuai Kebutuhan</h2>
                                </div>
                                <span class="px-2.5 py-1 rounded bg-emerald-50 text-emerald-800 font-semibold text-xs border border-emerald-200">Siap Layani</span>
                            </div>

                            <div class="space-y-4">
                                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200 hover:border-cyan-400 transition">
                                    <div class="flex items-center justify-between mb-1">
                                        <h3 class="text-sm font-bold text-slate-900">Home Service (Panggilan)</h3>
                                        <span class="text-xs font-medium text-slate-600">Mulai 60 Menit</span>
                                    </div>
                                    <p class="text-xs text-slate-600">Tim kami membawa generator listrik portable, mesin steam uap, dan perlengkapan mandiri ke garasi rumah Anda.</p>
                                </div>

                                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200 hover:border-cyan-400 transition">
                                    <div class="flex items-center justify-between mb-1">
                                        <h3 class="text-sm font-bold text-slate-900">Reservasi Slot Outlet</h3>
                                        <span class="text-xs font-medium text-slate-600">Langsung Masuk Bay</span>
                                    </div>
                                    <p class="text-xs text-slate-600">Datang ke workshop sesuai jam janji temu, tanpa antrean tunggu kendaraan lain yang belum tentu selesai.</p>
                                </div>
                            </div>

                            <div class="bg-cyan-50 rounded-xl p-4 border border-cyan-200 text-xs text-cyan-900 space-y-1">
                                <p class="font-semibold text-slate-900">Garansi Pengerjaan Ulang 24 Jam</p>
                                <p class="text-slate-700">Jika ada sudut atau noda yang terlewat setelah selesai dicuci, teknisi siap membersihkan ulang tanpa biaya tambahan.</p>
                            </div>

                            <a href="#booking" class="block text-center w-full min-h-[44px] py-2.5 px-4 rounded-lg bg-slate-900 hover:bg-slate-800 text-white font-semibold text-sm transition focus-visible:outline-2 focus-visible:outline-slate-900">
                                Mulai Buat Janji Cuci
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Layanan & Katalog Harga Section -->
        <section id="layanan" class="py-16 sm:py-20 bg-white border-b border-slate-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="max-w-3xl mb-12">
                    <span class="text-xs font-bold text-cyan-700 uppercase tracking-wider block mb-2">Pilihan Paket & Transparansi Biaya</span>
                    <h2 class="text-2xl sm:text-3xl font-bold text-slate-900 tracking-tight">
                        Paket Perawatan Steam Cuci Mobil
                    </h2>
                    <p class="text-slate-600 text-sm sm:text-base mt-2">
                        Harga disesuaikan dengan ukuran mobil dan ruang lingkup pengerjaan. Tidak ada biaya siluman saat teknisi bekerja.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    
                    <!-- Paket 1 -->
                    <div class="rounded-xl border border-slate-200 bg-white p-6 sm:p-8 flex flex-col justify-between hover:shadow-md transition">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-bold text-slate-900">Steam Express Eksterior</h3>
                                <span class="text-xs font-semibold px-2 py-0.5 rounded bg-slate-100 text-slate-700">30 - 45 Menit</span>
                            </div>
                            <p class="text-xs text-slate-600">Pilihan cepat untuk bodi mobil yang kotor setelah dipakai harian atau kehujanan.</p>
                            
                            <div class="py-2 border-y border-slate-100">
                                <div class="text-2xl font-black text-slate-900">Rp 50.000 <span class="text-xs font-normal text-slate-500">/ City Car</span></div>
                                <div class="text-sm font-semibold text-slate-700 mt-1">Rp 65.000 <span class="text-xs font-normal text-slate-500">/ SUV & MPV</span></div>
                            </div>

                            <ul class="text-xs text-slate-700 space-y-2.5 pt-2">
                                <li class="flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-cyan-600"></span>
                                    Bilas tekanan uap panas & salju aktif
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-cyan-600"></span>
                                    Pembersihan velg & spakbor
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-cyan-600"></span>
                                    Pengeringan lap microfiber sintetis
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-cyan-600"></span>
                                    Semir ban silikon mengkilap tahan air
                                </li>
                            </ul>
                        </div>

                        <div class="pt-6 mt-6 border-t border-slate-100">
                            <a href="#booking" class="block text-center w-full min-h-[44px] py-2.5 px-4 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-800 font-semibold text-xs uppercase tracking-wider transition focus-visible:outline-2 focus-visible:outline-slate-400">
                                Pilih Paket Express
                            </a>
                        </div>
                    </div>

                    <!-- Paket 2 (Recommended) -->
                    <div class="rounded-xl border-2 border-cyan-600 bg-white p-6 sm:p-8 flex flex-col justify-between shadow-sm relative">
                        <div class="absolute -top-3 left-6 px-3 py-0.5 rounded bg-cyan-700 text-white font-semibold text-xs tracking-wide">
                            Paling Banyak Dipilih
                        </div>

                        <div class="space-y-4 pt-2">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-bold text-slate-900">Steam Komplit Luar Dalam</h3>
                                <span class="text-xs font-semibold px-2 py-0.5 rounded bg-cyan-50 text-cyan-800">60 - 75 Menit</span>
                            </div>
                            <p class="text-xs text-slate-600">Solusi menyeluruh membersihkan eksterior dan menyegarkan kabin interior yang berdebu.</p>
                            
                            <div class="py-2 border-y border-slate-100">
                                <div class="text-2xl font-black text-cyan-800">Rp 85.000 <span class="text-xs font-normal text-slate-500">/ City Car</span></div>
                                <div class="text-sm font-semibold text-slate-700 mt-1">Rp 100.000 <span class="text-xs font-normal text-slate-500">/ SUV & MPV</span></div>
                            </div>

                            <ul class="text-xs text-slate-700 space-y-2.5 pt-2">
                                <li class="flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-cyan-600"></span>
                                    Semua item pada paket Express Eksterior
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-cyan-600"></span>
                                    Vakum debu karpet lantai & sela jok
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-cyan-600"></span>
                                    Lap pembersih dashboard & konsol tengah
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-cyan-600"></span>
                                    Steam uap sela pintu & kisi-kisi AC
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-cyan-600"></span>
                                    Pembersihan kaca luar & dalam bebas jamur
                                </li>
                            </ul>
                        </div>

                        <div class="pt-6 mt-6 border-t border-slate-100">
                            <a href="#booking" class="block text-center w-full min-h-[44px] py-2.5 px-4 rounded-lg bg-cyan-700 hover:bg-cyan-800 text-white font-semibold text-xs uppercase tracking-wider transition focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-600">
                                Pilih Paket Komplit
                            </a>
                        </div>
                    </div>

                    <!-- Paket 3 -->
                    <div class="rounded-xl border border-slate-200 bg-white p-6 sm:p-8 flex flex-col justify-between hover:shadow-md transition">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-bold text-slate-900">Full Detailing & Sanitasi</h3>
                                <span class="text-xs font-semibold px-2 py-0.5 rounded bg-slate-100 text-slate-700">90 - 120 Menit</span>
                            </div>
                            <p class="text-xs text-slate-600">Perawatan menyeluruh dengan sanitasi uap panas untuk kabin segar steril dan mesin bersih rapi.</p>
                            
                            <div class="py-2 border-y border-slate-100">
                                <div class="text-2xl font-black text-slate-900">Rp 150.000 <span class="text-xs font-normal text-slate-500">/ City Car</span></div>
                                <div class="text-sm font-semibold text-slate-700 mt-1">Rp 180.000 <span class="text-xs font-normal text-slate-500">/ SUV & MPV</span></div>
                            </div>

                            <ul class="text-xs text-slate-700 space-y-2.5 pt-2">
                                <li class="flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-cyan-600"></span>
                                    Semua item pada paket Komplit
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-cyan-600"></span>
                                    Steam ringan ruang mesin (aman kabel)
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-cyan-600"></span>
                                    Fogging disinfektan anti kuman & bau apek
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-cyan-600"></span>
                                    Lapisan sealant wax kilap tahan air bodi
                                </li>
                            </ul>
                        </div>

                        <div class="pt-6 mt-6 border-t border-slate-100">
                            <a href="#booking" class="block text-center w-full min-h-[44px] py-2.5 px-4 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-800 font-semibold text-xs uppercase tracking-wider transition focus-visible:outline-2 focus-visible:outline-slate-400">
                                Pilih Full Detailing
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- About Us Section -->
        <section id="tentang" class="py-16 sm:py-20 bg-slate-100 border-b border-slate-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                    
                    <div class="lg:col-span-6 space-y-5">
                        <span class="text-xs font-bold text-cyan-700 uppercase tracking-wider block">Mengenal SteamKlin</span>
                        <h2 class="text-2xl sm:text-3xl font-bold text-slate-900 tracking-tight leading-snug">
                            Komitmen Kami Menyediakan Cuci Mobil Praktis, Bersih, dan Terpercaya
                        </h2>
                        
                        <p class="text-slate-700 text-sm sm:text-base leading-relaxed">
                            SteamKlin berawal dari pengalaman mengantre cuci mobil di akhir pekan yang memakan waktu hingga berjam-jam. Kami menghadirkan solusi berbasis teknologi reservasi online dan mesin steam uap hemat air bertekanan tinggi.
                        </p>

                        <p class="text-slate-700 text-sm leading-relaxed">
                            Dengan teknik steam, kotoran yang menempel di celah sempit seperti grill depan, lis kaca, dan lipatan pintu dapat luntur tanpa gesekan berlebih yang berisiko menggores pernis cat mobil Anda.
                        </p>

                        <div class="pt-2">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-white p-4 rounded-lg border border-slate-200">
                                    <div class="font-bold text-slate-900 text-base">Teknisi Terlatih</div>
                                    <div class="text-xs text-slate-600 mt-1">SOP pengerjaan jelas, penggunaan kain microfiber terpisah antara bodi dan velg.</div>
                                </div>
                                <div class="bg-white p-4 rounded-lg border border-slate-200">
                                    <div class="font-bold text-slate-900 text-base">Peralatan Mandiri</div>
                                    <div class="text-xs text-slate-600 mt-1">Home service membawa tangki uap dan genset sendiri tanpa merepotkan listrik rumah Anda.</div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="lg:col-span-6">
                        <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200 shadow-sm space-y-6">
                            <h3 class="text-lg font-bold text-slate-900 border-b border-slate-100 pb-3">4 Standar Kualitas Pengerjaan</h3>

                            <div class="space-y-4">
                                <div class="flex items-start gap-4">
                                    <div class="w-8 h-8 rounded-lg bg-cyan-100 text-cyan-800 flex items-center justify-center font-bold text-sm shrink-0">A</div>
                                    <div>
                                        <h4 class="text-sm font-bold text-slate-900">Uap Bertekanan Suhu Terukur</h4>
                                        <p class="text-xs text-slate-600 mt-0.5">Suhu uap dirancang melarutkan kerak dan minyak tanpa merusak komponen karet atau seal mobil.</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-4">
                                    <div class="w-8 h-8 rounded-lg bg-cyan-100 text-cyan-800 flex items-center justify-center font-bold text-sm shrink-0">B</div>
                                    <div>
                                        <h4 class="text-sm font-bold text-slate-900">Dua Ember & Pemisah Pasir</h4>
                                        <p class="text-xs text-slate-600 mt-0.5">Sistem wash mitt dua ember dengan grit guard mencegah butiran pasir menempel kembali saat pencucian bodi.</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-4">
                                    <div class="w-8 h-8 rounded-lg bg-cyan-100 text-cyan-800 flex items-center justify-center font-bold text-sm shrink-0">C</div>
                                    <div>
                                        <h4 class="text-sm font-bold text-slate-900">Interior Bebas Bahan Kimia Menyengat</h4>
                                        <p class="text-xs text-slate-600 mt-0.5">Cairan pembersih interior berbahan water-based yang aman untuk kulit dan tidak meninggalkan bau tajam pusing.</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-4">
                                    <div class="w-8 h-8 rounded-lg bg-cyan-100 text-cyan-800 flex items-center justify-center font-bold text-sm shrink-0">D</div>
                                    <div>
                                        <h4 class="text-sm font-bold text-slate-900">Konfirmasi Sebelum Selesai</h4>
                                        <p class="text-xs text-slate-600 mt-0.5">Teknisi mengajak Anda memeriksa hasil pengerjaan bersama sebelum melakukan serah terima kendaraan.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- Cara Kerja Reservasi Section -->
        <section id="cara-kerja" class="py-16 sm:py-20 bg-white border-b border-slate-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="max-w-2xl text-center mx-auto mb-12">
                    <span class="text-xs font-bold text-cyan-700 uppercase tracking-wider block mb-2">Alur Praktis</span>
                    <h2 class="text-2xl sm:text-3xl font-bold text-slate-900 tracking-tight">
                        Cara Melakukan Booking Cuci Mobil
                    </h2>
                    <p class="text-slate-600 text-sm mt-2">
                        Pesan layanan dalam hitungan menit lewat form di bawah atau via konfirmasi WhatsApp.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div class="p-6 rounded-xl bg-slate-50 border border-slate-200 text-center space-y-3">
                        <div class="w-10 h-10 rounded-full bg-cyan-700 text-white font-bold flex items-center justify-center mx-auto text-sm">1</div>
                        <h3 class="font-bold text-slate-900 text-sm">Tentukan Metode</h3>
                        <p class="text-xs text-slate-600">Pilih antara teknisi datang ke lokasi Anda atau booking slot datang ke bengkel steam.</p>
                    </div>

                    <div class="p-6 rounded-xl bg-slate-50 border border-slate-200 text-center space-y-3">
                        <div class="w-10 h-10 rounded-full bg-cyan-700 text-white font-bold flex items-center justify-center mx-auto text-sm">2</div>
                        <h3 class="font-bold text-slate-900 text-sm">Pilih Paket Layanan</h3>
                        <p class="text-xs text-slate-600">Sesuaikan dengan jenis kendaraan (Sedan, City Car, SUV) dan tingkat kebersihan yang diinginkan.</p>
                    </div>

                    <div class="p-6 rounded-xl bg-slate-50 border border-slate-200 text-center space-y-3">
                        <div class="w-10 h-10 rounded-full bg-cyan-700 text-white font-bold flex items-center justify-center mx-auto text-sm">3</div>
                        <h3 class="font-bold text-slate-900 text-sm">Pilih Jam & Tanggal</h3>
                        <p class="text-xs text-slate-600">Tentukan jadwal pengerjaan yang pas dengan kesibukan Anda tanpa perlu antre di lokasi.</p>
                    </div>

                    <div class="p-6 rounded-xl bg-slate-50 border border-slate-200 text-center space-y-3">
                        <div class="w-10 h-10 rounded-full bg-cyan-700 text-white font-bold flex items-center justify-center mx-auto text-sm">4</div>
                        <h3 class="font-bold text-slate-900 text-sm">Mobil Bersih & Garansi</h3>
                        <p class="text-xs text-slate-600">Pengerjaan selesai tepat waktu, bayar setelah puas dengan hasil cuci mobil Anda.</p>
                    </div>
                </div>

            </div>
        </section>

        <!-- Booking Section Interaktif (Alpine.js) -->
        <section id="booking" class="py-16 sm:py-20 bg-slate-100 border-b border-slate-200" 
            x-data="{
                metode: 'home_service',
                kategoriMobil: 'city_car',
                paket: 'komplit',
                nama: '',
                nomorWa: '',
                alamat: '',
                tanggal: '{{ date('Y-m-d') }}',
                jam: '09:00',
                catatan: '',
                submitted: false,

                get hargaEstimasi() {
                    const priceTable = {
                        'express': { 'city_car': 50000, 'suv_mpv': 65000 },
                        'komplit': { 'city_car': 85000, 'suv_mpv': 100000 },
                        'detailing': { 'city_car': 150000, 'suv_mpv': 180000 }
                    };
                    return priceTable[this.paket][this.kategoriMobil];
                },

                get labelPaket() {
                    if (this.paket === 'express') return 'Steam Express Eksterior';
                    if (this.paket === 'komplit') return 'Steam Komplit Luar Dalam';
                    return 'Full Detailing & Sanitasi';
                },

                get labelMobil() {
                    return this.kategoriMobil === 'city_car' ? 'City Car / Hatchback / Sedan' : 'SUV / MPV / Van';
                },

                formatRupiah(num) {
                    return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(num);
                },

                kirimBooking() {
                    if (!this.nama || !this.nomorWa) {
                        alert('Mohon isi nama lengkap dan nomor WhatsApp aktif Anda.');
                        return;
                    }
                    if (this.metode === 'home_service' && !this.alamat) {
                        alert('Mohon masukkan alamat lengkap penjemputan / lokasi pengerjaan.');
                        return;
                    }

                    this.submitted = true;
                },

                bukaWhatsApp() {
                    const text = encodeURIComponent(
                        'Halo Admin SteamKlin, saya ingin konfirmasi booking cuci mobil online:\n\n' +
                        '- Nama: ' + this.nama + '\n' +
                        '- WhatsApp: ' + this.nomorWa + '\n' +
                        '- Layanan: ' + (this.metode === 'home_service' ? 'Home Service (Panggilan ke Rumah)' : 'Reservasi di Outlet') + '\n' +
                        '- Paket: ' + this.labelPaket + '\n' +
                        '- Kategori Mobil: ' + this.labelMobil + '\n' +
                        '- Jadwal: ' + this.tanggal + ' pukul ' + this.jam + ' WIB\n' +
                        (this.metode === 'home_service' ? '- Alamat: ' + this.alamat + '\n' : '') +
                        (this.catatan ? '- Catatan: ' + this.catatan + '\n' : '') +
                        '- Estimasi Biaya: ' + this.formatRupiah(this.hargaEstimasi) + '\n\n' +
                        'Mohon konfirmasi ketersediaan slot teknisi. Terima kasih!'
                    );
                    window.open('https://wa.me/6281234567890?text=' + text, '_blank');
                }
            }"
        >
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="max-w-2xl mx-auto text-center mb-10">
                    <span class="text-xs font-bold text-cyan-700 uppercase tracking-wider block mb-2">Formulir Pemesanan</span>
                    <h2 class="text-2xl sm:text-3xl font-bold text-slate-900 tracking-tight">
                        Booking Jadwal Cuci Mobil Sekarang
                    </h2>
                    <p class="text-slate-600 text-sm mt-1">
                        Pilih paket dan masukkan jadwal Anda. Estimasi biaya langsung dihitung secara transparan.
                    </p>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-10">
                    
                    <div x-show="!submitted">
                        <form @submit.prevent="kirimBooking()" class="space-y-6">
                            
                            <!-- 1. Pilihan Metode -->
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">1. Pilih Metode Layanan</label>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <label class="flex items-center gap-3 p-3.5 rounded-lg border cursor-pointer transition"
                                        :class="metode === 'home_service' ? 'border-cyan-600 bg-cyan-50/50' : 'border-slate-200 hover:bg-slate-50'">
                                        <input type="radio" name="metode" value="home_service" x-model="metode" class="text-cyan-700 focus:ring-cyan-500">
                                        <div>
                                            <span class="block text-sm font-bold text-slate-900">Home Service (Panggilan)</span>
                                            <span class="block text-xs text-slate-600">Teknisi datang ke rumah / kantor Anda</span>
                                        </div>
                                    </label>
                                    <label class="flex items-center gap-3 p-3.5 rounded-lg border cursor-pointer transition"
                                        :class="metode === 'outlet' ? 'border-cyan-600 bg-cyan-50/50' : 'border-slate-200 hover:bg-slate-50'">
                                        <input type="radio" name="metode" value="outlet" x-model="metode" class="text-cyan-700 focus:ring-cyan-500">
                                        <div>
                                            <span class="block text-sm font-bold text-slate-900">Datang ke Outlet Steam</span>
                                            <span class="block text-xs text-slate-600">Reservasi slot bay tanpa antre di lokasi</span>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <!-- 2. Kategori Mobil & Paket -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="kategori-mobil" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">2. Ukuran Kendaraan</label>
                                    <select id="kategori-mobil" x-model="kategoriMobil" class="w-full rounded-lg border-slate-300 text-sm focus:border-cyan-600 focus:ring-cyan-600 py-2.5">
                                        <option value="city_car">City Car / Sedan / Hatchback (Brio, Yaris, Vios, dll)</option>
                                        <option value="suv_mpv">SUV / MPV / Minivan (Innova, Pajero, Fortuner, Avanza)</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="pilihan-paket" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">3. Paket Layanan</label>
                                    <select id="pilihan-paket" x-model="paket" class="w-full rounded-lg border-slate-300 text-sm focus:border-cyan-600 focus:ring-cyan-600 py-2.5">
                                        <option value="express">Steam Express Eksterior</option>
                                        <option value="komplit">Steam Komplit Luar Dalam</option>
                                        <option value="detailing">Full Detailing & Sanitasi Kabin</option>
                                    </select>
                                </div>
                            </div>

                            <!-- 3. Jadwal Waktu -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="tgl-booking" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Tanggal Pengerjaan</label>
                                    <input type="date" id="tgl-booking" x-model="tanggal" required class="w-full rounded-lg border-slate-300 text-sm focus:border-cyan-600 focus:ring-cyan-600 py-2">
                                </div>
                                <div>
                                    <label for="jam-booking" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Pukul (WIB)</label>
                                    <select id="jam-booking" x-model="jam" class="w-full rounded-lg border-slate-300 text-sm focus:border-cyan-600 focus:ring-cyan-600 py-2.5">
                                        <option value="08:00">08:00 WIB</option>
                                        <option value="09:00">09:00 WIB</option>
                                        <option value="10:30">10:30 WIB</option>
                                        <option value="13:00">13:00 WIB</option>
                                        <option value="14:30">14:30 WIB</option>
                                        <option value="16:00">16:00 WIB</option>
                                    </select>
                                </div>
                            </div>

                            <!-- 4. Data Pemesan -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="nama-pemesan" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nama Lengkap</label>
                                    <input type="text" id="nama-pemesan" x-model="nama" placeholder="Contoh: Budi Santoso" required class="w-full rounded-lg border-slate-300 text-sm focus:border-cyan-600 focus:ring-cyan-600 py-2.5">
                                </div>
                                <div>
                                    <label for="wa-pemesan" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nomor WhatsApp Aktif</label>
                                    <input type="tel" id="wa-pemesan" x-model="nomorWa" placeholder="Contoh: 081234567890" required class="w-full rounded-lg border-slate-300 text-sm focus:border-cyan-600 focus:ring-cyan-600 py-2.5">
                                </div>
                            </div>

                            <!-- Alamat jika Home Service -->
                            <div x-show="metode === 'home_service'" x-cloak>
                                <label for="alamat-pemesan" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Alamat Lengkap & Patokan Rumah</label>
                                <textarea id="alamat-pemesan" x-model="alamat" rows="2" placeholder="Tuliskan nama jalan, nomor rumah, RT/RW, dan patokan lokasi..." class="w-full rounded-lg border-slate-300 text-sm focus:border-cyan-600 focus:ring-cyan-600"></textarea>
                            </div>

                            <!-- Ringkasan Perhitungan Biaya -->
                            <div class="p-4 rounded-xl bg-slate-50 border border-slate-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                <div>
                                    <span class="text-xs text-slate-500 uppercase tracking-wider font-semibold block">Total Estimasi Biaya</span>
                                    <span class="text-2xl font-black text-cyan-800" x-text="formatRupiah(hargaEstimasi)"></span>
                                    <span class="text-xs text-slate-600 block" x-text="labelPaket + ' • ' + labelMobil"></span>
                                </div>
                                <div class="text-xs text-slate-600 max-w-xs">
                                    <p>Metode Pembayaran: Pembayaran tunai atau transfer QRIS setelah pengerjaan selesai diperiksa.</p>
                                </div>
                            </div>

                            <!-- Tombol Submit -->
                            <div class="flex flex-col sm:flex-row items-center gap-3">
                                <button type="submit" class="w-full sm:w-auto min-h-[48px] px-8 py-3 rounded-lg bg-cyan-700 hover:bg-cyan-800 text-white font-semibold text-sm transition focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-600">
                                    Simpan & Konfirmasi Jadwal
                                </button>
                                <span class="text-xs text-slate-500">Data Anda aman dan hanya digunakan untuk konfirmasi jadwal.</span>
                            </div>

                        </form>
                    </div>

                    <!-- Notifikasi Sukses / Konfirmasi WhatsApp -->
                    <div x-show="submitted" x-cloak class="space-y-6 text-center py-6">
                        <div class="w-14 h-14 bg-emerald-100 text-emerald-800 rounded-full flex items-center justify-center mx-auto">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>

                        <div class="max-w-md mx-auto space-y-2">
                            <h3 class="text-xl font-bold text-slate-900">Reservasi Anda Telah Tercatat</h3>
                            <p class="text-sm text-slate-600">
                                Detail booking untuk <strong x-text="nama"></strong> telah disiapkan. Klik tombol di bawah untuk langsung terhubung dengan admin via WhatsApp.
                            </p>
                        </div>

                        <div class="bg-slate-50 p-4 rounded-xl border border-slate-200 text-left max-w-md mx-auto text-xs space-y-1.5 text-slate-700">
                            <div><strong>Paket:</strong> <span x-text="labelPaket"></span></div>
                            <div><strong>Jenis Mobil:</strong> <span x-text="labelMobil"></span></div>
                            <div><strong>Metode:</strong> <span x-text="metode === 'home_service' ? 'Panggilan ke Lokasi' : 'Datang ke Outlet'"></span></div>
                            <div><strong>Waktu:</strong> <span x-text="tanggal + ', jam ' + jam + ' WIB'"></span></div>
                            <div><strong>Estimasi Biaya:</strong> <strong class="text-cyan-800" x-text="formatRupiah(hargaEstimasi)"></strong></div>
                        </div>

                        <div class="flex flex-col sm:flex-row items-center justify-center gap-3 pt-2">
                            <button type="button" @click="bukaWhatsApp()" class="min-h-[44px] px-6 py-2.5 rounded-lg bg-emerald-700 hover:bg-emerald-800 text-white font-semibold text-sm transition focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600">
                                Kirim Konfirmasi ke WhatsApp Admin
                            </button>
                            <button type="button" @click="submitted = false" class="min-h-[44px] px-5 py-2.5 rounded-lg border border-slate-300 text-slate-700 hover:bg-slate-100 font-semibold text-sm transition focus-visible:outline-2 focus-visible:outline-slate-400">
                                Ubah Form Booking
                            </button>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- Kontak & Lokasi Section -->
        <section id="kontak" class="py-16 sm:py-20 bg-white border-b border-slate-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                    
                    <div class="lg:col-span-5 space-y-5">
                        <span class="text-xs font-bold text-cyan-700 uppercase tracking-wider block">Hubungi SteamKlin</span>
                        <h2 class="text-2xl sm:text-3xl font-bold text-slate-900 tracking-tight">
                            Kontak Langsung & Area Operasional
                        </h2>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            Punya pertanyaan seputar noda interior khusus, permintaan cuci armada perusahaan, atau ingin memastikan jangkauan home service ke area tempat tinggal Anda?
                        </p>

                        <div class="space-y-4 pt-2">
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded bg-slate-100 text-slate-700 flex items-center justify-center shrink-0 text-xs font-bold">WA</div>
                                <div>
                                    <div class="text-xs text-slate-500 font-medium">WhatsApp Layanan Pelanggan</div>
                                    <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer" class="text-sm font-semibold text-slate-900 hover:text-cyan-700 transition">0812-3456-7890 (Respon Cepat)</a>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded bg-slate-100 text-slate-700 flex items-center justify-center shrink-0 text-xs font-bold">TEL</div>
                                <div>
                                    <div class="text-xs text-slate-500 font-medium">Telepon Kantor Outlet</div>
                                    <a href="tel:0217654321" class="text-sm font-semibold text-slate-900 hover:text-cyan-700 transition">(021) 765-4321</a>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded bg-slate-100 text-slate-700 flex items-center justify-center shrink-0 text-xs font-bold">JAM</div>
                                <div>
                                    <div class="text-xs text-slate-500 font-medium">Jadwal Operasional Workshop & Panggilan</div>
                                    <div class="text-sm font-semibold text-slate-900">Senin - Minggu: 08.00 - 18.00 WIB</div>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded bg-slate-100 text-slate-700 flex items-center justify-center shrink-0 text-xs font-bold">LOK</div>
                                <div>
                                    <div class="text-xs text-slate-500 font-medium">Alamat Workshop Utama</div>
                                    <div class="text-sm font-semibold text-slate-900">Jl. Raya Otista No. 88, Jakarta Timur, 13330</div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="lg:col-span-7">
                        <div class="bg-slate-50 rounded-2xl border border-slate-200 p-6 sm:p-8 space-y-6">
                            <h3 class="text-base font-bold text-slate-900">Cakupan Wilayah Home Service</h3>
                            <p class="text-xs text-slate-600">
                                Tim teknisi panggilan kami siap datang melayani cuci mobil steam ke garasi Anda dengan radius hingga 15 km dari workshop:
                            </p>

                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                                <div class="p-3 bg-white rounded-lg border border-slate-200 text-xs font-semibold text-slate-800">Jakarta Timur (Free transport)</div>
                                <div class="p-3 bg-white rounded-lg border border-slate-200 text-xs font-semibold text-slate-800">Jakarta Selatan</div>
                                <div class="p-3 bg-white rounded-lg border border-slate-200 text-xs font-semibold text-slate-800">Jakarta Pusat</div>
                                <div class="p-3 bg-white rounded-lg border border-slate-200 text-xs font-semibold text-slate-800">Bekasi Barat</div>
                                <div class="p-3 bg-white rounded-lg border border-slate-200 text-xs font-semibold text-slate-800">Depok Utara</div>
                                <div class="p-3 bg-white rounded-lg border border-slate-200 text-xs font-semibold text-slate-800">Area lain (Konfirmasi)</div>
                            </div>

                            <div class="p-4 bg-cyan-50 rounded-xl border border-cyan-200 text-xs text-cyan-900">
                                <strong>Catatan Kesiapan Lokasi Panggilan:</strong>
                                <p class="mt-1 text-slate-700">Untuk pengerjaan Home Service, mohon pastikan tersedia ruang parkir yang cukup untuk membuka pintu mobil secara leluasa dan saluran pembuangan air di sekitar area cuci.</p>
                            </div>

                            <div class="pt-2">
                                <a href="https://wa.me/6281234567890?text=Halo%20Admin%20SteamKlin,%20saya%20ingin%20tanya%20jadwal%20dan%20wilayah%20layanan%20cuci%20mobil." target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center min-h-[44px] px-6 py-2.5 rounded-lg bg-emerald-700 hover:bg-emerald-800 text-white font-semibold text-sm transition focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600">
                                    Konsultasi Gratis via WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-slate-900 text-slate-300 pt-16 pb-12 border-t border-slate-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 pb-12 border-b border-slate-800">
                    
                    <!-- Brand Col -->
                    <div class="lg:col-span-2 space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-cyan-700 text-white flex items-center justify-center font-bold text-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
                                </svg>
                            </div>
                            <div>
                                <span class="text-lg font-bold text-white block leading-tight">SteamKlin Auto Care</span>
                                <span class="text-xs text-slate-400">Penyedia Layanan Cuci Mobil Steam Modern</span>
                            </div>
                        </div>

                        <p class="text-xs text-slate-400 leading-relaxed max-w-sm">
                            Menjaga nilai dan kebersihan kendaraan Anda dengan teknologi uap panas ramah lingkungan, efisien air, dan aman bagi permukaan cat mobil.
                        </p>

                        <div class="text-xs text-slate-400 space-y-1">
                            <p><strong>Workshop:</strong> Jl. Raya Otista No. 88, Jakarta Timur</p>
                            <p><strong>Operasional:</strong> Setiap hari 08.00 - 18.00 WIB</p>
                        </div>
                    </div>

                    <!-- Navigasi Menu -->
                    <div class="space-y-3">
                        <h3 class="text-xs font-bold text-white uppercase tracking-wider">Navigasi Halaman</h3>
                        <ul class="space-y-2 text-xs">
                            <li><a href="#hero" class="hover:text-cyan-400 focus-visible:outline-2 focus-visible:outline-cyan-400 transition">Beranda Utama</a></li>
                            <li><a href="#layanan" class="hover:text-cyan-400 focus-visible:outline-2 focus-visible:outline-cyan-400 transition">Paket Layanan & Harga</a></li>
                            <li><a href="#tentang" class="hover:text-cyan-400 focus-visible:outline-2 focus-visible:outline-cyan-400 transition">Tentang Kami</a></li>
                            <li><a href="#cara-kerja" class="hover:text-cyan-400 focus-visible:outline-2 focus-visible:outline-cyan-400 transition">Cara Reservasi</a></li>
                            <li><a href="#booking" class="hover:text-cyan-400 focus-visible:outline-2 focus-visible:outline-cyan-400 transition">Formulir Booking</a></li>
                            <li><a href="#kontak" class="hover:text-cyan-400 focus-visible:outline-2 focus-visible:outline-cyan-400 transition">Kontak & Lokasi</a></li>
                        </ul>
                    </div>

                    <!-- Paket Cuci -->
                    <div class="space-y-3">
                        <h3 class="text-xs font-bold text-white uppercase tracking-wider">Pilihan Layanan</h3>
                        <ul class="space-y-2 text-xs">
                            <li><a href="#layanan" class="hover:text-cyan-400 focus-visible:outline-2 focus-visible:outline-cyan-400 transition">Steam Express Eksterior</a></li>
                            <li><a href="#layanan" class="hover:text-cyan-400 focus-visible:outline-2 focus-visible:outline-cyan-400 transition">Steam Komplit Luar Dalam</a></li>
                            <li><a href="#layanan" class="hover:text-cyan-400 focus-visible:outline-2 focus-visible:outline-cyan-400 transition">Full Detailing & Sanitasi</a></li>
                            <li><a href="#kontak" class="hover:text-cyan-400 focus-visible:outline-2 focus-visible:outline-cyan-400 transition">Panggilan Home Service</a></li>
                            <li><a href="#kontak" class="hover:text-cyan-400 focus-visible:outline-2 focus-visible:outline-cyan-400 transition">Kerjasama Armada Kantor</a></li>
                        </ul>
                    </div>

                    <!-- Hubungi Kami -->
                    <div class="space-y-3">
                        <h3 class="text-xs font-bold text-white uppercase tracking-wider">Hubungi Langsung</h3>
                        <ul class="space-y-2 text-xs">
                            <li><a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer" class="hover:text-cyan-400 focus-visible:outline-2 focus-visible:outline-cyan-400 transition">WhatsApp: 0812-3456-7890</a></li>
                            <li><a href="tel:0217654321" class="hover:text-cyan-400 focus-visible:outline-2 focus-visible:outline-cyan-400 transition">Telepon: (021) 765-4321</a></li>
                            <li><span class="text-slate-400">Email: layanan@steamklin.id</span></li>
                            @if (Route::has('login'))
                                <li class="pt-2 border-t border-slate-800">
                                    @auth
                                        <a href="{{ url('/dashboard') }}" class="text-cyan-400 hover:underline">Akses Dashboard Akun</a>
                                    @else
                                        <a href="{{ route('login') }}" class="text-cyan-400 hover:underline">Masuk Akun</a> / 
                                        <a href="{{ route('register') }}" class="text-cyan-400 hover:underline">Daftar Akun</a>
                                    @endauth
                                </li>
                            @endif
                        </ul>
                    </div>

                </div>

                <!-- Bottom Copyright -->
                <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
                    <p>&copy; {{ date('Y') }} SteamKlin Auto Care. Seluruh hak cipta dilindungi.</p>
                    <div class="flex items-center gap-6">
                        <span class="text-slate-400">Layanan Cuci Mobil Bergaransi</span>
                        <a href="#hero" class="text-slate-400 hover:text-white transition">Kembali ke Atas &uarr;</a>
                    </div>
                </div>

            </div>
        </footer>

    </body>
</html>
