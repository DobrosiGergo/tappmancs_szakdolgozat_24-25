<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full bg-[#333333] text-white py-2 rounded-full']) }}>
    {{ $slot }}
</button>
