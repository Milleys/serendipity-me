@php
    $stats = [
        [
            'title' => 'Serendipities',
            'value' =>  $serendipityCount,
            'icon' => 'activity',
            'color' => 'text-blue-600',
        ],
        [
            'title' => 'Completed',
            'value' =>  $CompletedSerendipityCount,
            'icon' => 'users',
            'color' => 'text-green-600',
        ],
        [
            'title' => 'Events',
            'value' => 4,
            'icon' => 'calendar',
            'color' => 'text-purple-600',
        ],
    ];
@endphp

<div class="w-full max-w-sm mx-auto mt-10 rounded-lg border bg-white border-gray-100 shadow-sm">
    <div class="px-6 py-4 border-b">
        <h2 class="text-lg font-semibold text-gray-800">Your Stats</h2>
    </div>

    <div class="px-6 py-4 space-y-4">
        @foreach ($stats as $stat)
            <div class="flex items-center justify-between flex-wrap gap-2">
                <div class="flex items-center space-x-3">
                    <div class="p-2 rounded-lg bg-gray-50 {{ $stat['color'] }}">
                        @if ($stat['icon'] === 'activity')
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M22 12h-4l-3 9L9 3 6 12H2" />
                            </svg>
                        @elseif ($stat['icon'] === 'users')
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        @elseif ($stat['icon'] === 'calendar')
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 4h10M5 11h14M5 17h14M5 21h14M3 5h18a2 2 0 012 2v14a2 2 0 01-2 2H3a2 2 0 01-2-2V7a2 2 0 012-2z" />
                            </svg>
                        @endif
                    </div>
                    <span class="text-sm text-gray-600">{{ $stat['title'] }}</span>
                </div>
                <span class="font-semibold text-gray-900">{{ $stat['value'] }}</span>
            </div>
        @endforeach
    </div>
</div>
