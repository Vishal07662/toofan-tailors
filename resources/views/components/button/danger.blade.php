@props(['type'])

<button 
    @if (isset($type))
        type="{{ $type }}"
    @endif
    class="bg-red-500 hover:bg-red-600 px-3 py-2 rounded text-white hover:cursor-pointer"
>
    {{ $slot }}
</button>
