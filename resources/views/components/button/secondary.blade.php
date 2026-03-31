@props(['type'])

<button 
    @if (isset($type))
        type="{{ $type }}"
    @endif
    class="bg-gray-200 hover:bg-gray-300 px-3 py-2 rounded text-black hover:cursor-pointer"
>
    {{ $slot }}
</button>
