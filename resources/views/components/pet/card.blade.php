@props([
  'href' => '#',
  'title' => null,
  'name' => null,
  'description' => '',
  'badge' => null,
  'image' => null,
  'shelterName' => null,
  'meta' => [],
])

@php
  $heading = $title ?: ($name ?: '');

  $imgUrl = null;
  if (!empty($image)) {
      $imgUrl = \Illuminate\Support\Facades\Storage::url($image);
  }

  $metaRows = [];
  foreach ($meta as $key => $value) {
      if ($value !== null && $value !== '') {
          $metaRows[$key] = $value;
      }
  }
@endphp

<a href="{{ $href }}" class="group block">
  <div class="relative overflow-hidden rounded-2xl border border-neutral-200/60 bg-white/80 backdrop-blur-sm shadow-sm transition-all hover:-translate-y-1 hover:shadow-2xl">
    <div class="flex">
      <div class="relative w-36 shrink-0 overflow-hidden bg-gradient-to-br from-neutral-100 to-neutral-200">
        @if($imgUrl)
          <img src="{{ $imgUrl }}" alt="{{ $heading }}" class="h-full w-full object-cover" />
        @else
          <div class="flex h-full w-full items-center justify-center">
            <svg class="h-12 w-12 text-neutral-500" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path d="M12 14c-3 0-5 2-5 4v2h10v-2c0-2-2-4-5-4zm-6.5-3A1.5 1.5 0 1 0 4 9.5 1.5 1.5 0 0 0 5.5 11zm13 0A1.5 1.5 0 1 0 17 9.5 1.5 1.5 0 0 0 18.5 11zM8 11a2 2 0 1 0-2-2 2 2 0 0 0 2 2zm8 0a2 2 0 1 0-2-2 2 2 0 0 0 2 2z"/>
            </svg>
          </div>
        @endif

        <div class="absolute inset-y-0 right-0 w-px bg-neutral-300/40"></div>

        @if(!empty($badge))
          <div class="absolute left-3 top-3">
            <span class="inline-flex items-center rounded-full bg-white/90 px-2.5 py-1 text-xs font-medium text-neutral-800 shadow-sm backdrop-blur border border-neutral-200">
              {{ $badge }}
            </span>
          </div>
        @endif
      </div>

      <div class="flex-1 p-5">
        <div class="flex items-start justify-between gap-3">
          <div class="min-w-0">
            <h3 class="truncate text-lg font-semibold text-neutral-900 group-hover:underline">
              {{ $heading }}
            </h3>

            @if(!empty($shelterName))
              <div class="mt-1 text-xs font-medium text-neutral-500">
                {{ $shelterName }}
              </div>
            @endif
          </div>

          <span class="inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-full border border-neutral-300 text-neutral-600 transition group-hover:bg-neutral-900 group-hover:text-white">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path d="M13.17 12 8.58 7.41 10 6l6 6-6 6-1.41-1.41L13.17 12z"/>
            </svg>
          </span>
        </div>

        @if(!empty($description))
          <p class="mt-2 line-clamp-2 text-sm leading-6 text-neutral-600">
            {{ $description }}
          </p>
        @endif

        @if(!empty($metaRows))
          <dl class="mt-3 grid grid-cols-2 gap-x-6 gap-y-2 text-sm">
            @foreach($metaRows as $key => $value)
              <div class="flex gap-1">
                <dt class="text-neutral-500">{{ $key }}:</dt>
                <dd class="font-medium text-neutral-800">{{ $value }}</dd>
              </div>
            @endforeach
          </dl>
        @endif
      </div>
    </div>
  </div>
</a>