@php
 $classes = "text-xs text-gray-600 hover:text-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"   
@endphp
{{-- Pasando los atributos, incluyendo el href del componente --}}
<a {{ $attributes->merge(['class' => $classes]) }} >
   {{ $slot }}
</a>