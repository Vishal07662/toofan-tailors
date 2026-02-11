
<div class="header-section flex justify-between items-center shadow">
    {{-- logo --}}
    <div class="website logo">
        <img src="{{ asset('images/logo.png') }}" class="max-h-20" alt="Website Logo">
    </div>
    <div class="header-actions mr-5">
        <form method="POST" action="{{ route('logout') }}">
            <nav class="space-x-4 text-white">
                @csrf
                <button class="bg-blue-500 hover:bg-blue-600 px-3 py-2 rounded">
                    <a href="{{ route('home') }}">Home</a>
                </button>
                <button type="submit" class="bg-red-500 hover:bg-red-600 px-3 py-2 rounded">
                    Logout
                </button>
            </nav>
        </form>
    </div>
</div>
