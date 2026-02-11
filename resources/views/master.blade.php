<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />

    <title>@yield('title', 'Toofan Tailors')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="{{ $page_name ?? 'page' }}" class="flex flex-col min-h-screen">

        <div id="nav">
            @yield('nav')
        </div>

        <div id="header">
            @hasSection('header')
                @yield('header')
            @else
                @include('app.header')
            @endif
        </div>

        @if (request()->routeIs('admin.*'))
            <div id="content" class="flex bg-gray-100">
                @include('admin.nav')
        @else 
            <div id="content" class="flex-1 flex flex-col items-center justify-center bg-gray-100" >
        @endif

            @yield('content')
        </div>

        <div id="footer">
            @hasSection('footer')
                @yield('footer')
            @else
                @include('app.footer')
            @endif
        </div>

    </div>
</body>
</html>
