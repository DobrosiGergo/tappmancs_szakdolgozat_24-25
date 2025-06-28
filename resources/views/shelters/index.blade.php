<x-app-layout>

        <div class="container mx-auto px-4 py-6">
            <h1 class="text-2xl font-bold mb-6">Elérhető menhelyek</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($shelters as $shelter)
                    <x-shelter-card :shelter="$shelter" />
                @endforeach
            </div>
        </div>

</x-app-layout>
