@props(['rowCount', 'items' => []])

@forelse ($items as $item)
    <tr>

    </tr>
@empty
    @include('partials.list.empty', ['colspan' => $rowCount])
@endforelse

