<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-4">{{ $shelter->name }}</h1>
        <p class="text-gray-600 mb-2">Helyszín: {{ $shelter->location }}</p>

        @if(!empty($shelter->images))
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                @foreach($shelter->images as $image)
                    <img src="{{ asset('storage/' . $image) }}"
                        alt="Menhely kép"
                        class="w-full h-64 object-cover rounded-lg shadow"
                        onerror="this.src='https://via.placeholder.com/400x300?text=Nincs+kép';">
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>