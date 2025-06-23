
@if ($serendipity)

<div class="bg-white rounded-xl shadow overflow-hidden">
    {{-- Header --}}
    <div class="px-6 py-4 border-b">
        <h2 class="text-lg font-semibold flex items-center space-x-2 text-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
            </svg>
            <span>Current Serendipity</span>
        </h2>
    </div>

    {{-- Content --}}
    <div class="p-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Image Section --}}
        <div class="relative">
            <div class="w-full h-64 rounded-lg overflow-hidden">
                <img
                    src="{{ $serendipity->imgurl }}"
                    alt="Current serendipity"
                    class="w-full h-full object-cover"
                />
                <div class="absolute top-3 right-3 bg-white bg-opacity-90 rounded-full p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                    </svg>
                </div>
            </div>
        </div>

        {{-- Text Content --}}
        <div class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-900">
                {{ $serendipity->activity }}
            </h3>
            <p class="text-gray-600 leading-relaxed">
            {{ $serendipity->description }}
            </p>

            <div class="flex items-center space-x-4 text-sm text-gray-500">
                <div class="flex items-center space-x-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M8 7V3m8 4V3m-9 4h10M5 11h14M5 17h14M5 21h14M3 5h18a2 2 0 012 2v14a2 2 0 01-2 2H3a2 2 0 01-2-2V7a2 2 0 012-2z" />
                    </svg>
                    <span>{{ \Carbon\Carbon::parse($serendipity->created_at)->diffForHumans() }}</span>
                </div>
                <div class="flex items-center space-x-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M17.657 16.657L13.414 12l4.243-4.243a6 6 0 10-8.485 8.485L12 13.414l4.243 4.243a6 6 0 001.414-1.414z" />
                    </svg>
                    <span>Downtown District</span>
                </div>
            </div>

            <div class="pt-4">
                <button class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-full font-medium transition-colors">
                    Continue Journey
                </button>
            </div>
        </div>
    </div>
</div>
@else
<p class="text-center text-gray-500">No serendipity yet.</p>
@endif