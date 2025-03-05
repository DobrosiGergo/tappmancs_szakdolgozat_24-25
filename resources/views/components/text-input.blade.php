@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500']) }}>
