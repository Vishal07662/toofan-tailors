
@if (session('success'))
    <div class="bg-green-400 text-white p-3 mb-4 rounded">
        {{ session('success') }}
    </div>
@endif
