@props([
  'items' => [],
  'homeHref' => route('dashboard'),  
  'homeLabel' => '',
])

<nav aria-label="Breadcrumb">
  <ol class="flex items-center gap-2 text-sm text-neutral-500">
    <li>
      <a href="{{ $homeHref }}" class="inline-flex items-center gap-2 hover:text-neutral-700">
        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
          <path d="M12 5.7 4 12v8a1 1 0 0 0 1 1h5v-5h4v5h5a1 1 0 0 0 1-1v-8l-8-6.3Z"/>
        </svg>
        <span>{{ $homeLabel }}</span>
      </a>
    </li>

    @foreach($items as $i => $item)
      <li class="flex items-center gap-2">
        <svg class="h-4 w-4 text-neutral-400" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
          <path d="M9 18 15 12 9 6 7.6 7.4 12.2 12 7.6 16.6 9 18Z"/>
        </svg>

        @php $isLast = $i === count($items) - 1; @endphp

        @if(!empty($item['href']))
          <a href="{{ $item['href'] }}" 
             class="hover:text-neutral-700 {{ $isLast ? 'text-neutral-700 font-medium' : '' }}">
            {{ $item['label'] }}
          </a>
        @else
          <span class="text-neutral-700 font-medium">{{ $item['label'] }}</span>
        @endif
      </li>
    @endforeach
  </ol>
</nav>
