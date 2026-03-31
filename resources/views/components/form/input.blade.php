@props(['name', 'label', 'type' => 'text'])

<div class="mb-4">
    <label class="block text-sm font-medium mb-1">
        {{ $label }}
    </label>

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        value="{{ old($name, $slot) }}"
        {{ $attributes->merge(['class' => 'w-4/6 border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500']) }}
    >

    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>