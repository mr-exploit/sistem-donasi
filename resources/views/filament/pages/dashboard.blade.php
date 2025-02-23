<x-filament::page>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <x-filament::card>
            <h2 class="text-xl font-bold">Selamat Datang di Dashboard!</h2>
            <p>Ini adalah dashboard custom kamu.</p>
        </x-filament::card>

        <x-filament::card>
            <h2 class="text-xl font-bold">Statistik</h2>
            <p>Total Pengguna: {{ \App\Models\User::count() }}</p>
        </x-filament::card>
    </div>
</x-filament::page>