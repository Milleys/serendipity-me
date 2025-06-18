@php
    $events = [
        [
            'title' => 'Coffee Meetup',
            'date' => 'Today',
            'time' => '3:00 PM',
            'attendees' => 5,
            'location' => 'Central Cafe',
        ],
        [
            'title' => 'Art Gallery Walk',
            'date' => 'Tomorrow',
            'time' => '6:00 PM',
            'attendees' => 12,
            'location' => 'Downtown Gallery',
        ],
        [
            'title' => 'Hiking Adventure',
            'date' => 'This Weekend',
            'time' => '9:00 AM',
            'attendees' => 8,
            'location' => 'Mountain Trail',
        ],
    ];
@endphp

<div class="bg-white rounded-xl shadow-md w-full max-w-sm mx-auto">
    <div class="px-6 py-4 border-b">
        <h2 class="text-lg font-semibold text-gray-800">Upcoming Events</h2>
    </div>

    <div class="px-6 py-4 space-y-4">
        @foreach ($events as $event)
            <div class="p-4 border border-gray-100 rounded-lg hover:bg-gray-50 transition-colors">
                <h4 class="font-medium text-gray-900 mb-2">{{ $event['title'] }}</h4>
                <div class="space-y-1 text-xs text-gray-500">
                    <div class="flex items-center space-x-1">
                        {{-- Calendar Icon --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 4h10M5 11h14M3 5h18a2 2 0 012 2v14a2 2 0 01-2 2H3a2 2 0 01-2-2V7a2 2 0 012-2z" />
                        </svg>
                        <span>{{ $event['date'] }}</span>
                    </div>
                    <div class="flex items-center space-x-1">
                        {{-- Clock Icon --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6l4 2m6-2a10 10 0 11-20 0 10 10 0 0120 0z" />
                        </svg>
                        <span>{{ $event['time'] }}</span>
                    </div>
                    <div class="flex items-center space-x-1">
                        {{-- User Icon --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-5-4m-6 6H2v-2a4 4 0 015-4m9-4a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span>{{ $event['attendees'] }} attending</span>
                    </div>
                </div>
                <p class="text-xs text-gray-400 mt-2">{{ $event['location'] }}</p>
                <button class="w-full mt-3 text-sm border rounded px-3 py-1 text-gray-700 hover:bg-gray-100 transition">Join Event</button>
            </div>
        @endforeach

        <button class="w-full mt-4 text-sm text-purple-600 hover:underline cursor-pointer" title="Coming Soon">View All Events</button>
    </div>
</div>
