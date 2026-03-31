@props(['name', 'label', 'multiple' => false, 'selected' => false, 'list' => []])

<div class="mb-4">
    <label class="block text-sm font-medium mb-1">
        {{ $label }}
    </label>

    <select name="{{ $name }}"
        @if ($multiple)
            multiple="true"
        @endif
        class="p-1 rounded border-gray-300 border min-w-35"
    >
        @forelse ($list as $selectKey => $selectOption)
            <option value="{{ $selectKey}}"
                @if ($selected == $selectKey)
                selected  
                @endif
            >
                {{ $selectOption }}
            </option>
        @empty
            <option> -- </option>
        @endforelse
    </select>

    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>