@props([
    'title',
    'headers' => [],
    'actions' => []
])

<div class="flex-1 p-6">
    <div class="flex justify-between mb-4">
        <h2 class="text-xl font-bold">{{ $title }}</h2>

        <div class="space-x-2">
            @foreach ($actions as $action)
                <a href="{{ route($action['route']) }}">
                    <button class="{{ $action['btn_color'] }}-500 hover:{{ $action['btn_color'] }}-600 px-3 py-2 rounded text-white hover:cursor-pointer">
                        {{ $action['title'] }}
                    </button>
                </a>
            @endforeach
        </div>
    </div>
    @include('layout.success')
    @include('layout.errors')

    <table class="w-full bg-white shadow-md rounded text-left">
        <thead>
            <tr class="bg-gray-200">
                @foreach ($headers as $header)
                    <th class="p-2">{{ $header }}</th>
                @endforeach
            </tr>
        </thead>

        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>
