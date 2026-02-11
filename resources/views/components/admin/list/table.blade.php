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
                <a href="{{ route($action['route']) }}"
                   class="bg-blue-500 text-white px-3 py-1 rounded">
                    {{ $action['title'] }}
                </a>
            @endforeach
        </div>
    </div>

    <table class="w-full bg-white shadow-md rounded">
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
