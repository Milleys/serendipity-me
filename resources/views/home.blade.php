@extends('layout.default')
@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap');
    
    * {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    
    .font-display {
        font-family: 'Syne', sans-serif;
    }
    
    :root {
        --color-dark: #0f172a;
        --color-card: #1e293b;
        --color-accent-1: #a855f7;
        --color-accent-2: #ec4899;
        --color-accent-3: #06b6d4;
    }
    
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    
    .glass-card {
        background: rgba(30, 41, 59, 0.7);
        border: 1px solid rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
    }
    
    .text-gradient {
        background: linear-gradient(135deg, var(--color-accent-1) 0%, var(--color-accent-2) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .btn-gradient {
        background: linear-gradient(135deg, var(--color-accent-1) 0%, var(--color-accent-2) 100%);
        box-shadow: 0 4px 15px rgba(168, 85, 247, 0.3);
        transition: all 0.3s ease;
    }
    
    .btn-gradient:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(168, 85, 247, 0.4);
    }
    
    .btn-glass {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
    }
    
    .btn-glass:hover {
        background: rgba(255, 255, 255, 0.15);
        border-color: rgba(255, 255, 255, 0.3);
    }
</style>

<!-- Wrapper -->
<div class="flex flex-col md:flex-row gap-6 px-6 py-8 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen">
    <!-- Profile Section (left) -->
    <div class="w-full md:w-1/6">
        <div class="glass-card rounded-2xl p-6 shadow-lg">
            <div class="flex flex-col items-center">
                <!-- Profile Avatar -->
                <div class="w-20 h-20 bg-gradient-to-br from-purple-600 to-pink-600 rounded-full flex items-center justify-center mb-4 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <!-- User Info -->
                <div class="text-center">
                    <h3 class="text-lg font-semibold text-white mb-1 font-display">{{ Auth::user()->name }}</h3>
                    <p class="text-sm text-gray-400">{{ Auth::user()->username }}</p>
                </div>
                <!-- Additional Info -->
                <div class="mt-4 pt-4 border-t border-gray-600 w-full">
                    <div class="text-center">
                        <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Member Since</p>
                        <p class="text-sm text-gray-300">{{ Auth::user()->created_at->format('F Y') }}</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="w-full mt-4">
                @csrf
                <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-4 py-2 bg-red-500/20 text-red-300 rounded-lg hover:bg-red-500/30 transition-all duration-200 text-sm font-medium border border-red-500/30 hover:border-red-500/50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1" />
                    </svg>
                    Logout
                </button>
            </form>
            </div>
        </div> <!-- end of profile box -->
        @include('layout.quick-stats')
    </div>
    <!-- Main Content Section (right) -->
    <div class="w-full md:w-2/4 flex flex-col items-center justify-center">
        <!-- Main Serendipity Image -->
        <div class="relative mb-8">
             <div class="w-100 h-100 md:w-100 md:h-100 rounded-3xl overflow-hidden shadow-2xl bg-gradient-to-br from-purple-900/20 to-pink-900/20 flex items-center justify-center border border-purple-500/20 hover:shadow-purple-500/20 transition-shadow duration-300">
             <img
                    src="{{ session('imageUrl') ?? asset('images/serendipity_cover.jpg') }}"
                    alt="Serendipity moment"
                    class="w-full h-full object-cover"
                />
                
                <!-- Overlay -->
                <div class="absolute inset-0 rounded-3xl bg-gradient-to-t from-black/40 to-transparent"></div>
                <!-- Sparkle Icon -->
                <div class="absolute top-4 right-4">
                <span class="text-2xl drop-shadow-lg">✨</span> 
                </div>
            </div>
        </div>
        
        @if(session('activityData'))
                    <div class="mb-4">
                        <p class="text-lg text-center text-gradient font-semibold font-display">"{{ session('activityData.activity') }}"</p>
                        <p class="text-sm text-center text-gray-300">{{ session('activityData.description') }}</p>
                    </div>
                @endif
        
               
        <form method="POST" action="{{route('Serendipity-submit')}}">
            @csrf
        <!-- Serendipity Button -->
        <button type="submit" class="btn-gradient cursor-pointer group text-white px-8 py-3 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 flex items-center space-x-2">
            <span>✨ My Serendipity</span>
        </button>
        </form>

        <form action="{{ route('serendipity.save') }}" method="post" class="mt-2">
        @csrf
            <input type="hidden" name="activity" value="{{ session('activityData')['activity'] ?? '' }}">
            <input type="hidden" name="description" value="{{ session('activityData')['description'] ?? '' }}">
            <input type="hidden" name="activity_id" value="{{ session('activityData')['activity_id'] ?? '' }}">
            <input type="hidden" name="imgurl" value="{{ session('imageUrl') ?? ''}}">
            
           
            @if ($PendingSerendipityCount > 0)
                <button type="submit" disabled class="cursor-not-allowed btn-glass text-gray-400 px-4 py-2 rounded-lg text-sm opacity-50">
                    ⏳ You still have a pending serendipity
                </button>
            @else
                <button type="submit" class="btn-glass text-white px-4 py-2 rounded-lg text-sm transition-all duration-300 transform hover:scale-105">
                    💾 I'll do this
                </button>
            @endif
        </form>

        <!-- Success Modal -->
        @if(session('success'))
            <div id="successModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 p-4">
                <div class="glass-card rounded-2xl p-8 max-w-sm w-full shadow-2xl transform scale-100 transition-transform duration-300">
                    <div class="flex items-center justify-center mb-4">
                        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-xl font-bold text-center text-white mb-2 font-display">Saved!</h2>
                    <p class="text-center text-gray-300 mb-6">{{ session('success') }}</p>
                    <div class="w-full h-1 bg-gray-700 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-green-500 to-emerald-600" style="animation: shrink 3s linear forwards;"></div>
                    </div>
                </div>
            </div>

            <style>
                @keyframes shrink {
                    from { width: 100%; }
                    to { width: 0%; }
                }
            </style>

            <script>
                function closeAndRedirect() {
                    const modal = document.getElementById('successModal');
                    if (modal) {
                        modal.style.opacity = '0';
                        modal.style.transition = 'opacity 0.3s ease';
                        setTimeout(() => {
                            window.location.href = "{{ route('profile') }}";
                        }, 300);
                    }
                }
                setTimeout(() => {
                    closeAndRedirect();
                }, 3000);
            </script>
        @endif
        
        <!-- Subtitle -->
        <p class="mt-4 text-gray-400 text-center max-w-md px-4">
            Discover unexpected moments and create beautiful memories
        </p>
   
        
</div>
@include('layout.upcoming-events')
<script>
// Push current URL to history stack
history.pushState(null, null, location.href);
// When back is pressed, push forward again
window.onpopstate = function () {
history.go(1);
};
</script>
@endsection