<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Kép feltöltés</label>

    <!-- Drop area -->
    <div
        class="flex flex-col items-center justify-center w-full border-2 border-dashed rounded-lg border-gray-300 p-6 text-gray-500 text-sm hover:bg-gray-50 transition cursor-pointer"
        onclick="document.getElementById('imageUpload').click()"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mb-2 text-gray-400" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 15a4 4 0 004 4h10a4 4 0 004-4M7 10l5-5m0 0l5 5m-5-5v12" />
        </svg>
        <span>Válassza ki képeit vagy húzza ide</span>
        <span class="text-xs text-gray-400 mt-1">JPEG, JPG, PNG</span>
        <input type="file" multiple wire:model="images" id="imageUpload" class="hidden">
    </div>

    <!-- Previews -->
    @if ($previews)
    <div class="mt-4 space-y-2">
        @foreach ($previews as $index => $image)
            <div class="flex items-center justify-between bg-white border border-gray-200 rounded p-2 shadow-sm">
                <div class="flex items-center gap-3">
                    <img src="{{ Storage::url($image['path']) }}" class="w-12 h-12 rounded object-cover border" />
                    <span class="text-sm text-gray-800">{{ $image['name'] }}</span>
                </div>
                <button type="button" wire:click="removeImage({{ $index }})"
                        class="text-gray-400 hover:text-red-500 transition text-xl leading-none font-bold">
                    &times;
                </button>
            </div>
        @endforeach
    </div>
@endif
    @error('images.*')
        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
    @enderror
</div>
