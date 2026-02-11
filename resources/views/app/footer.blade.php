
<footer>    
    @if (!request()->routeIs('admin.*'))
        <div class="bg-gray-800 text-gray-300 p-6">
            <div class="container mx-auto">
                About us: @todo
            </div>
        </div>
    @endif

    <div class="bg-gray-700 text-white p-4 text-center">
        © {{ date('Y') }} Toofan Tailors. All rights reserved.
    </div>
</footer>
