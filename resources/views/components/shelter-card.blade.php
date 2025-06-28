<a href="{{ route('shelters.show', $shelter) }}" class="block hover:shadow-lg transition-shadow duration-200">
    <div class="bg-white shadow-md rounded-lg p-4">
        <h2 class="text-xl font-semibold">{{ $shelter->name }}</h2>
        <p class="text-gray-600">{{ $shelter->location }}</p>

        <img src="{{ $imageUrl() }}"
            alt="Menhely képe"
            class="w-full h-48 object-cover mt-3 rounded"
            onerror="this.src='https://via.placeholder.com/300x200?text=Nincs+kép';">
    </div>
</a>    