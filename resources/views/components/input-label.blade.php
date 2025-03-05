@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-[#333333]']) }}>
    {{ $value ?? $slot }}
</label>
