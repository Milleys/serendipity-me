@extends('layout.default')
@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap');
    
    :root {
        --color-dark: #0f172a;
        --color-darker: #050810;
        --color-card: #1e293b;
    }
    
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    
    .font-display {
        font-family: 'Syne', sans-serif;
    }
    
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-fade-in-down {
        animation: fadeInDown 0.6s ease-out forwards;
    }
    
    .animate-fade-in-up {
        animation: fadeInUp 0.6s ease-out forwards;
    }
    
    /* Gradient background */
    .gradient-bg {
        background: linear-gradient(
            135deg,
            rgba(15, 23, 42, 1) 0%,
            rgba(30, 41, 59, 0.8) 50%,
            rgba(15, 23, 42, 1) 100%
        );
    }
    
    /* Animated gradient accent */
    .gradient-accent {
        background: linear-gradient(135deg, #a855f7 0%, #ec4899 100%);
    }
</style>

<div class="min-h-screen gradient-bg flex flex-col relative overflow-hidden">
    
    <!-- Decorative Background Elements -->
    <div class="absolute top-20 left-10 w-72 h-72 bg-purple-500/10 rounded-full blur-3xl -z-10"></div>
    <div class="absolute bottom-20 right-10 w-72 h-72 bg-pink-500/10 rounded-full blur-3xl -z-10"></div>
    
    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 flex-1">
        
        <!-- Header Section -->
        <div class="mb-12 animate-fade-in-down">
            <div class="space-y-3">
                <h1 class="text-5xl font-bold font-display text-white">
                    My Profile
                </h1>
                <p class="text-lg text-gray-400">
                    Track your serendipitous journey and celebrate your moments
                </p>
            </div>
            
            <!-- Header Accent Line -->
            <div class="mt-6 flex items-center gap-3">
                <div class="h-1 w-16 gradient-accent rounded-full"></div>
                <span class="text-sm font-semibold text-purple-400 uppercase tracking-widest">
                    ✨ Your Serendipities
                </span>
            </div>
        </div>

        <!-- Content Sections -->
        <div class="space-y-8 animate-fade-in-up" style="animation-delay: 0.2s;">
            {{-- Current Serendipity Highlight --}}
            <div class="backdrop-blur-md bg-gradient-to-br from-slate-800/50 via-slate-700/30 to-slate-800/50 rounded-3xl border border-gray-700/50 p-8 shadow-2xl hover:shadow-purple-500/10 transition-all duration-300">
                @include('layout.current-serendipity', ['serendipity' => $currentSerendipity])
            </div>

            {{-- Past Serendipities --}}
            <div class="backdrop-blur-md bg-gradient-to-br from-slate-800/50 via-slate-700/30 to-slate-800/50 rounded-3xl border border-gray-700/50 p-8 shadow-2xl">
                @include('layout.past-serendipity', ['serendipities' => $pastSerendipities])
            </div>
        </div>
    </div>
  
</div>

<!-- Additional Styles for Child Components -->
<style>
    /* Ensure child components inherit the dark theme */
    .current-serendipity-container,
    .past-serendipity-container {
        color: #e5e7eb;
    }
    
    .current-serendipity-container h2,
    .past-serendipity-container h2 {
        color: #ffffff;
        font-family: 'Syne', sans-serif;
        font-size: 1.5rem;
        font-weight: 700;
    }
    
    .serendipity-card {
        background: rgba(30, 41, 59, 0.5);
        border: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.3s ease;
    }
    
    .serendipity-card:hover {
        background: rgba(30, 41, 59, 0.7);
        border-color: rgba(255, 255, 255, 0.2);
        transform: translateY(-2px);
    }
</style>

@endsection