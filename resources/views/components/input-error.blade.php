@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm bg-red-100 border-l-4 border-red-400 text-red-600 font-bold p-4']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
