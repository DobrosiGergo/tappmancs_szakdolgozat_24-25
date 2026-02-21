<x-app-layout>
  <x-ui.breadcrumbs/>
  <div class="bg-gradient-to-b from-neutral-50 via-white to-white">
    <x-ui.container class="py-10">

      <x-ui.hero
        title="Kezdjük el a jót: segítsünk új otthont találni"
        description="Böngéssz a menhelyek és kisállatok között, indíts új menhelyet, vagy kezeld a meglévődet – minden egy helyen."
        :image="asset('images/hero-shelter.svg')"
        :primary-href="route('shelters.index')"
        primary-label="Menhelyek böngészése"
        secondary-href="#"
        secondary-label="Kisállatok megtekintése"
      />

      <div class="mt-12 grid grid-cols-1 gap-6">

        @if(auth()->check() && auth()->user()->type === 'Shelterowner')
          @if(auth()->user()->shelter)
            <x-ui.action-card
              class="w-full p-8 md:p-10"
              :href="route('shelter.edit', auth()->user()->shelter)"
              title="Menhely módosítása"
              description="Adatlap, leírás, képek, elérhetőségek frissítése."
            >
              <x-slot:icon>
                <svg class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25Zm2.92 2.83H5v-.92l9.06-9.06.92.92L5.92 20.08ZM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34a1 1 0 0 0-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83Z"/></svg>
              </x-slot:icon>
            </x-ui.action-card>

            <x-ui.action-card
              class="w-full p-8 md:p-10"
              :href="route('shelters.show', auth()->user()->shelter)"
              title="Saját menhely megtekintése"
              description="Menhelyed publikus adatlapja, elérhetőségek, képek."
            >
              <x-slot:icon>
                <svg class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor"><path d="M12 5.69 5 10.19v8.31h14v-8.31l-7-4.5Zm0-2.19 9 5.79v10.71H3V9.29L12 3.5Z"/></svg>
              </x-slot:icon>
            </x-ui.action-card>
          @else
            <x-ui.action-card
              class="w-full p-8 md:p-10"
              :href="route('shelter.create')"
              title="Menhely létrehozása"
              description="Állítsd be a menhelyed nevét, leírását és tölts fel képeket."
            >
              <x-slot:icon>
                <svg class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor"><path d="M12 5.69 5 10.19v8.31h14v-8.31l-7-4.5Zm1 3.81v4h4v2h-4v4h-2v-4H7v-2h4v-4h2Z"/></svg>
              </x-slot:icon>
            </x-ui.action-card>
          @endif

          <x-ui.action-card
            class="w-full p-8 md:p-10"
            href="#"
            title="Munkatárs felvétele"
            description="Hívj meg önkénteseket vagy adj hozzá kezelői jogosultságot."
          >
            <x-slot:icon>
              <svg class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor"><path d="M15 12a5 5 0 1 0-6 0A8 8 0 0 0 3 20h2a6 6 0 0 1 12 0h2a8 8 0 0 0-4-8Zm-3-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/></svg>
            </x-slot:icon>
          </x-ui.action-card>

          <x-ui.action-card
            class="w-full p-8 md:p-10"
            :href="route('settings.index')"
            title="Fiókbeállítások"
            description="Profil- és jelszókezelés, értesítések, biztonság."
          >
            <x-slot:icon>
              <svg class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor"><path d="M19.43 12.98c.04-.32.07-.65.07-.98s-.03-.66-.07-.98l2.11-1.65a.5.5 0 0 0 .12-.64l-2-3.46a.5.5 0 0 0-.6-.22l-2.49 1a7.07 7.07 0 0 0-1.69-.98l-.38-2.65A.5.5 0 0 0 13 2h-4a.5.5 0 0 0-.5.42l-.38 2.65c-.6.24-1.17.56-1.69.98l-2.49-1a.5.5 0 0 0-.6.22l-2 3.46a.5.5 0 0 0 .12.64l2.11 1.65c-.05.32-.08.65-.08.98s.03.66.08.98l-2.11 1.65a.5.5 0 0 0-.12.64l2 3.46c.13.22.39.31.6.22l2.49-1c.52.42 1.09.74 1.69.98l.38 2.65c.04.24.25.42.5.42h4c.25 0 .46-.18.5-.42l.38-2.65c.6-.24 1.17-.56 1.69-.98l2.49 1c.21.09.47 0 .6-.22l2-3.46a.5.5 0 0 0-.12-.64l-2.11-1.65ZM11 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8Z"/></svg>
            </x-slot:icon>
          </x-ui.action-card>

        @else
          <x-ui.action-card
            class="w-full p-8 md:p-10"
            :href="route('shelters.index')"
            title="Menhelyek"
            description="Fedezd fel a menhelyeket, nézd meg a részleteket, vedd fel a kapcsolatot."
          >
            <x-slot:icon>
              <svg class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor"><path d="M3.2 10.6 11.4 4c.35-.27.85-.27 1.2 0l8.2 6.6c.52.42.23 1.27-.45 1.27H19.5v6.6c0 .88-.72 1.6-1.6 1.6H6.1c-.88 0-1.6-.72-1.6-1.6v-6.6H3.65c-.68 0-.97-.85-.45-1.27Z"/></svg>
            </x-slot:icon>
          </x-ui.action-card>

          <x-ui.action-card
            class="w-full p-8 md:p-10"
            href="#"
            title="Kisállatok"
            description="Böngészd a gazdira váró kisállatokat és szűrj típussal, várossal."
          >
            <x-slot:icon>
              <svg class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor"><path d="M7.8 14.2c1.7-1.7 4.4-2 6.4-.6 1.5 1 2.4 2.6 2.4 4.3 0 .9-.2 1.7-.6 2.4-.3.4-.7.6-1.1.6-.9 0-1.8-.6-2.5-.9-.8-.4-1.6-.4-2.4 0-.8.3-1.6.9-2.5.9-.4 0-.9-.2-1.1-.6-.4-.7-.6-1.5-.6-2.4 0-1.3.6-2.6 1.6-3.7Z"/><circle cx="6.5" cy="7" r="2"/><circle cx="12" cy="5.5" r="2"/><circle cx="17.5" cy="7.2" r="2"/></svg>
            </x-slot:icon>
          </x-ui.action-card>

          <x-ui.action-card
            class="w-full p-8 md:p-10"
            :href="route('settings.index')"
            title="Fiókbeállítások"
            description="Profil- és jelszókezelés, értesítések, biztonsági beállítások."
          >
            <x-slot:icon>
              <svg class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor"><path d="M12 12c2.7 0 5-2.2 5-5s-2.3-5-5-5-5 2.2-5 5 2.3 5 5 5Zm0 2c-3.3 0-10 1.7-10 5v2h20v-2c0-3.3-6.7-5-10-5Z"/></svg>
            </x-slot:icon>
          </x-ui.action-card>
        @endif
      </div>
    </x-ui.container>
  </div>
</x-app-layout>
