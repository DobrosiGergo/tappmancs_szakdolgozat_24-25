@props([
  'images'   => [],
  'interval' => 5000,
  'ratio'    => '56.25%',
  'autoplay' => true,
  'class'    => '',
])

@php
  $imgs = array_values($images ?? []);
  $n = count($imgs);
  $uid = 'crs-'.\Illuminate\Support\Str::uuid();
@endphp

@if ($n)
<section id="{{ $uid }}"
         data-carousel
         data-interval="{{ (int) $interval }}"
         data-autoplay="{{ $autoplay ? '1' : '0' }}"
         class="relative w-full rounded-2xl overflow-hidden bg-neutral-100 shadow-lg {{ $class }}">
  <div class="relative select-none">
    <div class="relative w-full" style="padding-bottom: {{ $ratio }}">
      <div class="flex absolute inset-0 transition-transform duration-500 ease-out" data-track style="transform: translate3d(0,0,0);">
        @foreach ($imgs as $img)
          <div class="min-w-full shrink-0 bg-neutral-200">
            <img src="{{ asset('storage/'.$img) }}" alt="" class="h-full w-full object-cover block" loading="lazy" draggable="false">
          </div>
        @endforeach
      </div>
      <div class="pointer-events-none absolute inset-0 bg-gradient-to-b from-black/10 via-transparent to-black/20"></div>
    </div>
  </div>

  @if ($n > 1)
  <button type="button" data-prev
          class="absolute left-3 md:left-5 top-1/2 -translate-y-1/2 z-10 grid place-items-center h-10 w-10 md:h-11 md:w-11 rounded-full bg-neutral-900/75 text-white shadow backdrop-blur hover:bg-neutral-900 focus:outline-none focus:ring-2 focus:ring-white/70 transition"
          aria-label="Előző">
    <svg viewBox="0 0 24 24" class="h-5 w-5"><path fill="currentColor" d="M15.41 7.41 14 6l-6 6 6 6 1.41-1.41L10.83 12z"/></svg>
  </button>
  <button type="button" data-next
          class="absolute right-3 md:right-5 top-1/2 -translate-y-1/2 z-10 grid place-items-center h-10 w-10 md:h-11 md:w-11 rounded-full bg-neutral-900/75 text-white shadow backdrop-blur hover:bg-neutral-900 focus:outline-none focus:ring-2 focus:ring-white/70 transition"
          aria-label="Következő">
    <svg viewBox="0 0 24 24" class="h-5 w-5"><path fill="currentColor" d="M8.59 16.59 13.17 12 8.59 7.41 10 6l6 6-6 6z"/></svg>
  </button>

  <div class="absolute bottom-4 left-0 right-0 flex justify-center gap-2">
    @for ($k = 0; $k < $n; $k++)
      <button type="button" data-dot="{{ $k }}"
              class="h-2.5 w-2.5 rounded-full bg-white/60 hover:bg-white/90 ring-1 ring-black/10 transition"
              aria-label="Ugrás a {{ $k+1 }}. képre"></button>
    @endfor
  </div>
  @endif
</section>
@else
<section class="w-full rounded-2xl border border-dashed border-neutral-300 bg-white p-10 text-center {{ $class }}">
  <svg class="mx-auto mb-3 h-8 w-8 text-neutral-400" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M19 3H5a2 2 0 0 0-2 2v14l4-4h12a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2Z"/></svg>
  <p class="text-neutral-700 font-medium">Még nincs feltöltött kép.</p>
  <p class="text-neutral-500 text-sm">A menhely tulajdonosa bármikor hozzáadhat képeket.</p>
</section>
@endif
