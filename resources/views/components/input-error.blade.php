@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'border border-red-500 bg-red-200 text-red-600 font-bold uppercase p-2 mt-2 text-xs']) }}>
        @foreach ((array) $messages as $message)
            <li>* {{ $message }}</li>
        @endforeach
    </ul>
@endif
