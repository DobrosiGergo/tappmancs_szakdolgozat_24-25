<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Kép feltöltés</label>

    <div
        class="flex flex-col items-center justify-center w-full border-2 border-dashed rounded-lg border-gray-300 p-6 text-gray-500 text-sm hover:bg-gray-50 transition cursor-pointer"
        onclick="document.getElementById('imageUpload-{{ $uid }}').click()"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mb-2 text-gray-400" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 15a4 4 0 004 4h10a4 4 0 004-4M7 10l5-5m0 0l5 5m-5-5v12" />
        </svg>
        <span class="font-medium">Válassza ki képeit vagy húzza ide</span>
        <span class="text-xs text-gray-400 mt-1">JPEG, JPG, PNG</span>
        <input type="file" multiple wire:model="images" id="imageUpload-{{ $uid }}" class="hidden">
    </div>

    @if ($previews)
        <div class="mt-6 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            @foreach ($previews as $index => $image)
                <div class="relative group">
                    <x-ui.lazy-image
                        src="{{ Storage::url($image['path']) }}"
                        alt=""
                        class="w-full h-32 object-cover rounded-lg shadow-sm border"
                    />
                    <button type="button"
                            wire:click="removeImage({{ $index }})"
                            class="absolute top-2 right-2 bg-black bg-opacity-50 text-white rounded-full w-7 h-7 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                        &times;
                    </button>
                    <div class="mt-1 text-xs text-gray-700 truncate text-center">
                        {{ $image['name'] }}
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @error('images') <span class="text-red-500 text-sm mt-2 block">{{ $message }}</span> @enderror
    @error('images.*') <span class="text-red-500 text-sm mt-2 block">{{ $message }}</span> @enderror
</div>
