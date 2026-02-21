<x-app-layout>
  <x-ui.container class="py-10 max-w-3xl">

    <div class="bg-white shadow-sm rounded-2xl p-8 border border-neutral-200">
      <div class="flex items-center gap-4 mb-6">
        <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-indigo-100 text-indigo-600">
          <svg class="h-8 w-8" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 17a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm6-6V9a6 6 0 1 0-12 0v2H4v10h16V11h-2ZM8 9a4 4 0 1 1 8 0v2H8V9Z"/>
          </svg>
        </div>
        <div>
          <h2 class="text-2xl font-semibold text-neutral-900">Jelszó módosítása</h2>
          <p class="text-sm text-neutral-600 mt-1">
            Biztonságod érdekében használj hosszú és egyedi jelszót.
          </p>
        </div>
      </div>

      <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div>
          <x-input-label for="update_password_current_password" value="Jelenlegi jelszó" />
          <x-text-input
            id="update_password_current_password"
            name="current_password"
            type="password"
            class="mt-1 block w-full"
            autocomplete="current-password"
          />
          <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
          <x-input-label for="update_password_password" value="Új jelszó" />
          <x-text-input
            id="update_password_password"
            name="password"
            type="password"
            class="mt-1 block w-full"
            autocomplete="new-password"
          />
          <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
          <x-input-label for="update_password_password_confirmation" value="Új jelszó megerősítése" />
          <x-text-input
            id="update_password_password_confirmation"
            name="password_confirmation"
            type="password"
            class="mt-1 block w-full"
            autocomplete="new-password"
          />
          <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
          <x-primary-button class="px-6 py-2 text-lg">Mentés</x-primary-button>

          @if (session('status') === 'password-updated')
            <div
              x-data="{ show: true }"
              x-show="show"
              x-transition
              x-init="setTimeout(() => show = false, 2000)"
              class="inline-flex items-center gap-2 text-sm font-medium text-emerald-700 bg-emerald-50 border border-emerald-200 rounded-full px-3 py-1"
            >
            <svg class="h-4 w-4 text-emerald-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10" class="text-emerald-600" />
                <path d="M9 12l2 2 4-4" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span>Sikeresen frissítve</span>
            </div>
          @endif
        </div>
      </form>
    </div>

  </x-ui.container>
</x-app-layout>
