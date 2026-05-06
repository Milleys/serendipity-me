@php
    $stats = [
        [
            'title' => 'Serendipities',
            'value' =>  $serendipityCount,
            'icon' => 'activity',
            'color' => 'from-cyan-500 to-blue-600',
            'bg' => 'bg-cyan-500/10',
        ],
        [
            'title' => 'Completed',
            'value' =>  $CompletedSerendipityCount,
            'icon' => 'users',
            'color' => 'from-green-500 to-emerald-600',
            'bg' => 'bg-green-500/10',
        ],
        [
            'title' => 'Events',
            'value' => 4,
            'icon' => 'calendar',
            'color' => 'from-purple-500 to-pink-600',
            'bg' => 'bg-purple-500/10',
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
    
    .stat-icon {
        background: linear-gradient(135deg, var(--grad-from) 0%, var(--grad-to) 100%);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }
    
    .stat-item {
        transition: all 0.3s ease;
    }
    
    .stat-item:hover {
        transform: translateX(4px);
    }
    
    .stat-value {
        font-family: 'Syne', sans-serif;
        background: linear-gradient(135deg, var(--grad-from) 0%, var(--grad-to) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>

<div class="w-full max-w-sm mx-auto mt-10 glass-card rounded-2xl overflow-hidden shadow-lg">
    <!-- Header -->
    <div class="px-6 py-5 border-b border-gray-700/50 bg-gradient-to-r from-purple-900/20 to-pink-900/20">
        <h2 class="text-lg font-semibold text-white" style="font-family: 'Syne', sans-serif;">Your Stats</h2>
        <p class="text-xs text-gray-400 mt-1">Track your serendipity journey</p>
    </div>

    <!-- Stats List -->
    <div class="px-6 py-5 space-y-4">
        @foreach ($stats as $stat)
            <div class="stat-item flex items-center justify-between flex-wrap gap-3 p-3 rounded-xl hover:bg-white/5 transition-colors duration-300">
                <!-- Left Side: Icon + Title -->
                <div class="flex items-center space-x-3">
                    <!-- Icon Container -->
                    <div class="stat-icon rounded-lg p-2.5 flex items-center justify-center"
                         style="--grad-from: {{ str_contains($stat['color'], 'cyan') ? '#06b6d4' : (str_contains($stat['color'], 'green') ? '#10b981' : '#a855f7') }}; --grad-to: {{ str_contains($stat['color'], 'cyan') ? '#2563eb' : (str_contains($stat['color'], 'green') ? '#059669' : '#ec4899') }};">
                        
                        @if ($stat['icon'] === 'activity')
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 12h-4l-3 9L9 3 6 12H2" />
                            </svg>
                        @elseif ($stat['icon'] === 'users')
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        @elseif ($stat['icon'] === 'calendar')
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 4h10M5 11h14M5 17h14M5 21h14M3 5h18a2 2 0 012 2v14a2 2 0 01-2 2H3a2 2 0 01-2-2V7a2 2 0 012-2z" />
                            </svg>
                        @endif
                    </div>
                    <span class="text-sm text-gray-300 font-medium">{{ $stat['title'] }}</span>
                </div>

                <!-- Right Side: Value -->
                <span class="stat-value text-xl font-bold"
                      style="--grad-from: {{ str_contains($stat['color'], 'cyan') ? '#06b6d4' : (str_contains($stat['color'], 'green') ? '#10b981' : '#a855f7') }}; --grad-to: {{ str_contains($stat['color'], 'cyan') ? '#2563eb' : (str_contains($stat['color'], 'green') ? '#059669' : '#ec4899') }};">
                    {{ $stat['value'] }}
                </span>
            </div>
        @endforeach
    </div>

    <!-- Footer -->
    <div class="px-6 py-3 border-t border-gray-700/50 bg-gradient-to-r from-gray-900/30 to-gray-800/30">
        <p class="text-xs text-gray-400 text-center">Keep creating amazing memories! ✨</p>
    </div>
</div>