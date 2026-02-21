<x-app-layout>
  <x-slot name="header">
    <h2 class="text-2xl font-semibold leading-tight text-neutral-900">
      Beállítások
    </h2>
  </x-slot>

  <x-ui.container class="py-8">
    <div class="grid grid-cols-1 gap-6 max-w-4xl">

      <x-ui.action-card
        class="w-full p-6 md:p-8"
        :href="route('settings.profile')"
        title="Profilinformációk módosítása"
        description="Név, e-mail, avatar frissítése."
      >
        <x-slot:icon>
          <svg class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 12c2.7 0 5-2.2 5-5s-2.3-5-5-5-5 2.2-5 5 2.3 5 5 5Zm0 2c-3.3 0-10 1.7-10 5v2h20v-2c0-3.3-6.7-5-10-5Z"/>
          </svg>
        </x-slot:icon>
      </x-ui.action-card>

      <x-ui.action-card
        class="w-full p-6 md:p-8"
        :href="route('settings.password')"
        title="Jelszó módosítása"
        description="Erős, egyedi jelszót állíts be a fiókodhoz."
      >
        <x-slot:icon>
          <svg class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 17a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm6-7h-1V7a5 5 0 1 0-10 0v3H6c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2v-8c0-1.1-.9-2-2-2ZM9 7a3 3 0 1 1 6 0v3H9V7Z"/>
          </svg>
        </x-slot:icon>
      </x-ui.action-card>

      <x-ui.action-card
        class="w-full p-6 md:p-8 border-red-200"
        :href="route('settings.delete')"
        title="Fiók törlése"
        description="A fiók és az összes kapcsolódó adat végleges eltávolítása."
      >
        <x-slot:icon>
          <svg class="h-7 w-7 text-red-600" viewBox="0 0 24 24" fill="currentColor">
            <path d="M6 7h12v12a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V7Zm3-4h6l1 2h4v2H4V5h4l1-2Z"/>
          </svg>
        </x-slot:icon>
      </x-ui.action-card>
    </div>
  </x-ui.container>
</x-app-layout>
