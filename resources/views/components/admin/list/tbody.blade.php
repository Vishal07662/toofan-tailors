@props(['rowCount', 'listType', 'items' => [], 'itemIndexes' => [], 'actions' => []])

@forelse ($items as $item)
    <tr>
        @foreach ($itemIndexes as $index => $itemIndex)
            <td class="p-2">
                @if (is_array($itemIndex))
                    @if ($itemIndex['type'] == 'badge')
                    <span class=" p-2 rounded-xl" style="background-color:{{ $itemIndex['data'][$item->{$index}]['color'] }}">
                        {{ $itemIndex['data'][$item->{$index}]['name'] }}
                    </span>
                    @else
                        {{ $itemIndex['data'][$item->{$index}] }}
                    @endif
                @else
                    {{ $item->$itemIndex }}
                @endif
            </td>
        @endforeach
        @if ($actions)
            <td class="p-2 flex gap-3">
                @if (isset($actions['edit']))
                    <a href="{{ route('admin.'.$listType.'.edit', $item) }}">
                        <x-button.primary>
                            {{ $actions['edit'] }}
                        </x-button.primary>
                    </a>
                @endif
                @if (isset($actions['delete']))

                    <form action="{{ route('admin.'.$listType.'.destroy', $item) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?')">
                        @csrf
                        @method('DELETE')
                        <x-button.danger
                            :type="'submit'"
                        >
                            {{ $actions['delete'] }}
                        </x-button.danger>
                    </form>
                @endif
            </td>                  
        @endif
    </tr>
@empty
    @include('partials.list.empty', ['colspan' => $rowCount])
@endforelse

