@php
    $events = [
        [
            'title' => 'Coffee Meetup',
            'date' => 'Today',
            'time' => '3:00 PM',
            'attendees' => 5,
            'location' => 'Central Cafe',
            'icon' => 'coffee',
            'color' => 'from-amber-500 to-orange-600',
        ],
        [
            'title' => 'Art Gallery Walk',
            'date' => 'Tomorrow',
            'time' => '6:00 PM',
            'attendees' => 12,
            'location' => 'Downtown Gallery',
            'icon' => 'palette',
            'color' => 'from-pink-500 to-rose-600',
        ],
        [
            'title' => 'Hiking Adventure',
            'date' => 'This Weekend',
            'time' => '9:00 AM',
            'attendees' => 8,
            'location' => 'Mountain Trail',
            'icon' => 'mountain',
            'color' => 'from-green-500 to-teal-600',
        ],
    ];
@endphp

<style>
    @import url('https://fonts.googleapis.com/css2?family=Syne:wght@700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap');
    
    .glass-card {
        background: rgba(30, 41, 59, 0.7);
        border: 1px solid rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
    }
    
    .event-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.3s ease;
    }
    
    .event-card:hover {
        background: rgba(255, 255, 255, 0.08);
        border-color: rgba(255, 255, 255, 0.2);
        transform: translateY(-2px);
    }
    
    .event-icon {
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }
    
    .btn-join {
        background: linear-gradient(135deg, var(--grad-from) 0%, var(--grad-to) 100%);
        transition: all 0.3s ease;
        font-weight: 600;
    }
    
    .btn-join:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }
    
    .text-meta {
        display: flex;
        align-items: center;
        gap: 0.4rem;
        font-size: 0.8rem;
    }
</style>

<div class="glass-card rounded-2xl overflow-hidden shadow-lg w-full max-w-sm mx-auto mt-6">
    <!-- Header -->
    <div class="px-6 py-5 border-b border-gray-700/50 bg-gradient-to-r from-purple-900/20 to-blue-900/20">
        <h2 class="text-lg font-semibold text-white" style="font-family: 'Syne', sans-serif;">Upcoming Events</h2>
        <p class="text-xs text-gray-400 mt-1">Discover new serendipities</p>
    </div>

    <!-- Events List -->
    <div class="px-6 py-5 space-y-3">
        @foreach ($events as $event)
            <div class="event-card rounded-xl p-4 backdrop-blur-sm">
                <!-- Event Title with Icon -->
                <div class="flex items-start gap-3 mb-3">
                    <div class="event-icon rounded-lg p-2.5 flex items-center justify-center flex-shrink-0 bg-gradient-to-br {{ $event['color'] }}">
                        @if ($event['icon'] === 'coffee')
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 5m0 0l-3-5m3 5v2" />
                            </svg>
                        @elseif ($event['icon'] === 'palette')
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                            </svg>
                        @elseif ($event['icon'] === 'mountain')
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        @endif
                    </div>
                    <div class="flex-1">
                        <h4 class="font-semibold text-white mb-1">{{ $event['title'] }}</h4>
                        <p class="text-xs text-gray-400">{{ $event['location'] }}</p>
                    </div>
                </div>

                <!-- Event Meta Info -->
                <div class="space-y-1.5 mb-3 pl-0">
                    <div class="text-meta text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 4h10M5 11h14M5 17h14M5 21h14M3 5h18a2 2 0 012 2v14a2 2 0 01-2 2H3a2 2 0 01-2-2V7a2 2 0 012-2z" />
                        </svg>
                        <span>{{ $event['date'] }}</span>
                    </div>
                    <div class="text-meta text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ $event['time'] }}</span>
                    </div>
                    <div class="text-meta text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-2a6 6 0 0112 0v2z" />
                        </svg>
                        <span>{{ $event['attendees'] }} attending</span>
                    </div>
                </div>

                <!-- Join Button -->
                <button class="btn-join w-full text-white text-sm py-2 rounded-lg transition-all duration-300" 
                        style="--grad-from: {{ str_contains($event['color'], 'amber') ? '#f59e0b' : (str_contains($event['color'], 'pink') ? '#ec4899' : '#10b981') }}; --grad-to: {{ str_contains($event['color'], 'amber') ? '#ea580c' : (str_contains($event['color'], 'pink') ? '#be185d' : '#0d9488') }};">
                    Join Event
                </button>
            </div>
        @endforeach
    </div>

    <!-- Footer -->
    <div class="px-6 py-4 border-t border-gray-700/50 bg-gradient-to-r from-gray-900/30 to-gray-800/30">
        <button class="w-full text-center text-sm text-purple-400 hover:text-purple-300 transition-colors cursor-pointer font-medium" title="Coming Soon">
            View All Events →
        </button>
    </div>
</div>