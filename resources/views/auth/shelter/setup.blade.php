<x-guest-layout>
<form method="POST" action="{{ route('shelter.store') }}">
    @csrf

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Bal oldal: űrlap -->
        <div>
            <h2 class="text-xl font-semibold mb-4">Hozza létre menhelyét</h2>

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Menhely név*</label>
                <input type="text" name="name" id="name"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-black focus:border-black">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Leírás*</label>
                <textarea name="description" id="description" rows="4"
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-black focus:border-black"></textarea>
            </div>

            <button type="submit"
                    class="w-full bg-black text-white py-2 px-4 rounded-md hover:bg-gray-800 transition">
                Menhely létrehozása
            </button>
        </div>

        <!-- Jobb oldal: Livewire image uploader -->
        <div>
            @livewire('shelter-image-upload')
        </div>
    </div>
</form>
</x-guest-layout>