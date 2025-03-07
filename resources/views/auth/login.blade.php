<x-app-layout>
    <div class="flex justify-start m-2">
        <a class="underline" href="{{ url()->previous() }}"><-</a>
    </div>
    <div class="flex items-center justify-center min-h-screen">
    
        <div class="w-[1000px] max-w-lg bg-white p-8">
            
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full px-4 py-3" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full px-4 py-3"
                                  type="password"
                                  name="password"
                                  required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Forgot Password Link -->
                <div class="flex flex-row gap-40 mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        <a class=" underline" href="{{ route('role') }}">
                        Regisztráció
                        </a>
                    @endif
                </div>
                <div class="flex justify-start">
                   
                </div>

                <!-- Login Button -->
                <div class="mt-6">
                    <x-primary-button class="w-full py-3 text-lg">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
                
            </form>
        </div>
    </div>
</x-app-layout>
