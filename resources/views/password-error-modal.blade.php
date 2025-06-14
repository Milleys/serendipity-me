@props(['open' => false, 'message' => 'The password you entered is incorrect. Please try again.'])

<div
    x-data="{ open: @json($open) }"
    x-show="open"
    x-cloak
    class="fixed inset-0 flex items-center justify-center z-50 bg-black/50"
>
    <div @click.away="open = false" class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold text-red-600 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                Password Error
            </h2>
            <button @click="open = false" class="text-gray-400 hover:text-red-500 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <p class="text-gray-600 mb-4">
            {{ $message }}
        </p>
        <button
            @click="open = false"
            class="bg-red-600 hover:bg-red-700 text-white font-semibold w-full py-2 px-4 rounded"
        >
            Close
        </button>
    </div>
</div>
