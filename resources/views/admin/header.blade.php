
<div class="header-section flex justify-between items-center shadow-md">
    {{-- logo --}}
    <div class="website-logo min-h-20">
        <img src="{{ asset('images/logo.png') }}" class="max-h-20" alt="Website Logo">
    </div>
    <div class="header-actions mr-5 ">
        <nav class="space-x-4 flex justify-between">
                <a href="{{ route('home') }}">
                    <x-button.primary>
                        Home
                    </x-button.primary>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-button.danger
                        :type="'submit'"
                    >
                        Logout
                    </x-button.danger>
                </form>
        </nav>
    </div>
</div>
