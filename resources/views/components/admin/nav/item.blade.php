
@props(['route', 'active'])

<li>    
    <a href="{{ route($route) }}"
        class="{{ request()->routeIs($active) ? 'bg-gray-700' : '' }} block px-3 py-2 rounded">
        {{ $slot }}
    </a>
</li>
