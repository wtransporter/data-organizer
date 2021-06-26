<div class="p-4 sm:px-10 bg-white border-b border-gray-200 rounded">
    <div class="text-2xl">
        {{ $candidate->name }}
    </div>

    <div class="mt-6 text-gray-500">
        <address>{{ $candidate->address }}</address>
        <span>{{ $candidate->phone }}</span>
    </div>
</div>
