<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Selamat Datang, {{ Auth::user()->name }}!</h3>
                    <p>Terima kasih telah menggunakan SteamKlin. Di sini Anda dapat melakukan pemesanan jadwal cuci mobil baru dan melihat riwayat transaksi Anda.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>