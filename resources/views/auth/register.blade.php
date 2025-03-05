<x-app-layout>
    <div class="flex flex-col md:flex-row mb-10">
        <!-- Bal oldal: Regisztrációs űrlap -->
        <div class="w-1/2 pr-6 p-12">
            <h2 class="text-2xl font-bold mb-4">HOZZ LÉTRE SAJÁT FIÓKOT</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Teljes név')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Jelszó')" />
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-input-label for="password_confirmation" :value="__('Jelszó megerősítés')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                    type="password"
                    name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-input-label for="phoneNumber" :value="__('Telefonszám +36-')" />
                    <x-text-input id="phoneNumber" class="block mt-1 w-full" type="text" name="phoneNumber"  autocomplete="+36123123" />
                    <x-input-error :messages="$errors->get('phoneNumber')" class="mt-2" />
                </div>
                <button type="submit" class="w-full bg-[#333333] text-white py-2 rounded-full">Fiók létrehozása</button>

            </form>
        </div>
        <!-- Jobb oldal: Kép -->
        <div class="w-1/2 flex items-center justify-center">
            <img src="{{ asset('images/collar-dog.svg') }}" alt="Regisztrációs kép" class=" md:h-[1200px] md:w-[650px] border-[3px] border-[#333333] rounded-full">
        </div>
    </div>
</x-app-layout>