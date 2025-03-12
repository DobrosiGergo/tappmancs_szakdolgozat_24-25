<x-app-layout>
    <x-slot name="header">
        <div class="felx justify-center items-center w-full">
            <!-- Greeting and Date -->
            <div class="mb-4">
                <h1 class="text-xl font-semibold">Üdvözöllek, Bekre Pál</h1>
                <p class="text-gray-500">Péntek, 13 December 2022</p>
            </div>
            
            <!-- Dark Section with Icon and Button -->
            <div class="flex items-center justify-between bg-gray-700 text-white rounded-lg overflow-hidden">
                <div class="p-4 flex items-center gap-2">
                    <span class="text-2xl">⚙️</span>
                </div>
                <a href="#" class="text-sm text-white underline p-4">Feltöltéseim</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
