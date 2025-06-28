<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Beállítások
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto mt-8 space-y-4">
        <a href="{{ route('settings.profile') }}" class="block p-4 bg-white rounded shadow hover:bg-gray-100">
            👤 Profilinformációk módosítása
        </a>

        <a href="{{ route('settings.password') }}" class="block p-4 bg-white rounded shadow hover:bg-gray-100">
            🔒 Jelszó módosítása
        </a>

        <a href="{{ route('settings.delete') }}" class="block p-4 bg-white rounded shadow hover:bg-red-100">
            ❌ Fiók törlése
        </a>
    </div>
</x-app-layout>
