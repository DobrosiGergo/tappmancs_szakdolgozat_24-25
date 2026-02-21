@props(['href' => '#', 'label' => 'tappmancs'])
<a href="{{ $href }}" class="inline-flex items-center">
  <svg class="h-7 w-7 transition-colors" :class="open ? 'text-white' : 'text-neutral-900'" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
    <circle cx="7.5" cy="7" r="2.2"/>
    <circle cx="12" cy="5.5" r="2"/>
    <circle cx="16.5" cy="7.2" r="2.1"/>
    <path d="M8.2 14.2c1.6-1.6 4-1.9 5.9-.6 1.4.9 2.2 2.4 2.2 4 0 .8-.2 1.6-.6 2.2-.2.3-.6.5-1 .5-.8 0-1.6-.5-2.3-.8-.7-.3-1.4-.3-2.1 0-.7.3-1.5.8-2.3.8-.4 0-.8-.2-1-.5-.4-.6-.6-1.4-.6-2.2 0-1.2.5-2.3 1.3-3.2Z"/>
  </svg>
  <span class="ml-2 font-medium transition-colors" :class="open ? 'text-white' : 'text-neutral-900'">{{ $label }}</span>
</a>
