@props([
  'href' => '#',
  'title' => '',
  'image' => null,
  'description' => '',
  'status' => null,
])

@php
  $badge = null;
  if ($status === 'free') $badge = ['Elérhető', 'bg-emerald-50 text-emerald-700 ring-1 ring-emerald-200'];
  elseif ($status === 'adopted') $badge = ['Örökbefogadott', 'bg-neutral-100 text-neutral-700 ring-1 ring-neutral-200'];
@endphp

<a href="{{ $href }}"
   {{ $attributes->merge(['class' => 'block overflow-hidden rounded-3xl border border-neutral-200 bg-white shadow-sm hover:shadow-lg hover:-translate-y-0.5 transition']) }}>
  <div class="relative w-full aspect-[16/9] bg-neutral-100">
    @if($image)
      <img src="{{ $image }}" alt="" class="absolute inset-0 h-full w-full object-cover">
    @endif
  </div>

  <div class="p-6">
    <div class="flex items-start justify-between gap-3">
      <h3 class="text-xl font-semibold text-neutral-900 line-clamp-1">{{ $title }}</h3>
      @if($badge)
        <span class="shrink-0 inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $badge[1] }}">{{ $badge[0] }}</span>
      @endif
    </div>
    @if($description)
      <p class="mt-2 text-neutral-600 leading-relaxed line-clamp-3">{{ $description }}</p>
    @endif
  </div>
</a>
