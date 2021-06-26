<div class="p-4 sm:px-8 bg-white border-b border-gray-200 rounded">
    <div class="flex justify-between items-center">
        <h5 class="text-xl">
            <a href="{{ route('candidates.show', $candidate) }}" class="text-blue-800 hover:underline">
                {{ $candidate->name }}
            </a>
        </h5>
        <a href="{{ route('candidates.edit', $candidate) }}" class="text-blue-700 hover:text-blue-500 w-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
            </svg>
        </a>
    </div>
    <div class="mt-6 text-gray-500">
        <address>{{ $candidate->address }}</address>
        <span>{{ $candidate->phone }}</span>
    </div>
</div>
