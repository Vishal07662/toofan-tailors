@props(['entity', 'title', 'action' => 'store', 'entityObject' => false])

<div class="bg-white p-6 shadow rounded  relative">
    <h2 class="text-xl font-bold mb-4">
        {{ $title }}
    </h2>
    <div class="p-4 shadow">
        @if ($entityObject)
            <form action="{{ route('admin.'.$entity.'.'.$action, $entityObject->id) }}" method="POST" >
            @else
            <form action="{{ route('admin.'.$entity.'.'.$action) }}" method="POST" >
        @endif  
            @csrf
            {{ $slot }}
                <div class="flex space between gap-4">
                    <x-button.primary
                        :type="'submit'"
                    >
                        Save
                    </x-button.primary>
                    </div>
                </div>
        </form>
        <div class="absolute right-10 bottom-10">
            <a href="{{ route('admin.'.$entity.'.index') }}">
                <x-button.secondary>
                    Cancel
                </x-button.secondary>
            </a>
        </div>
    </div>
</div>
