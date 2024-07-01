@props(['value'])

<label {{ $attributes->merge(['class' => 'uppercase text-sm font-bold text-gray-600 mb-2']) }}>
    {{ $value ?? $slot }}
</label>
