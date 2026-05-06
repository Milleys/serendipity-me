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
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes slideInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
    }
    
    .animate-slide-in-down {
        animation: slideInDown 0.8s ease-out forwards;
    }
    
    /* Gradient text */
    .text-gradient {
        background: linear-gradient(135deg, #a855f7 0%, #ec4899 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    /* Button styles */
    .btn-primary {
        background: linear-gradient(135deg, #a855f7 0%, #ec4899 100%);
        box-shadow: 0 4px 15px rgba(168, 85, 247, 0.3);
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(168, 85, 247, 0.4);
    }
    
    .btn-secondary {
        background: transparent;
        border: 2px solid rgba(168, 85, 247, 1);
        color: #a855f7;
        transition: all 0.3s ease;
    }
    
    .btn-secondary:hover {
        background: rgba(168, 85, 247, 0.1);
        border-color: rgba(236, 72, 153, 1);
        color: #ec4899;
    }
    
    /* Feature cards */
    .feature-card {
        background: rgba(30, 41, 59, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        transition: all 0.3s ease;
    }
    
    .feature-card:hover {
        background: rgba(30, 41, 59, 0.9);
        border-color: rgba(255, 255, 255, 0.2);
        transform: translateY(-4px);
        box-shadow: 0 8px 32px rgba(168, 85, 247, 0.2);
    }
    
    /* Icon backgrounds */
    .icon-bg {
        background: linear-gradient(135deg, var(--grad-from) 0%, var(--grad-to) 100%);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }
</style>

<div x-data="{ showLogin: false, showSignup: false }" class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 relative overflow-hidden">
    
    <!-- Decorative Background Elements -->
    <div class="absolute top-0 left-0 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl -z-10"></div>
    <div class="absolute top-1/2 right-0 w-96 h-96 bg-pink-500/10 rounded-full blur-3xl -z-10"></div>
    <div class="absolute bottom-0 left-1/3 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl -z-10"></div>
 
    @include('login-form')
    @include('signup-form')

    {{-- Error Modal --}}
    @if(session('login_error'))
        <div
            x-data="{ open: true }"
            x-show="open"
            x-cloak
            class="fixed inset-0 flex items-center bg-black/50 backdrop-blur-sm justify-center z-50"
        >
            <div class="bg-gradient-to-br from-slate-800/90 to-slate-900/90 border border-gray-700/50 backdrop-blur-xl p-8 rounded-2xl shadow-2xl max-w-md w-full">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="font-bold text-xl font-display">
                        <span class="text-gray-300">Login</span>
                        <span class="text-gradient">Failed</span>
                    </h2>
                    <button @click="open = false" class="text-gray-400 hover:text-white text-2xl transition">&times;</button>
                </div>
                <p class="text-gray-300 text-sm mb-6">{{ session('login_error') }}</p>
                <button
                    @click="open = false"
                    class="btn-primary w-full text-white px-4 py-2 rounded-lg font-semibold"
                >
                    Close
                </button>
            </div>
        </div>
    @endif

    {{-- Main Dashboard Page Content --}}
    <div class="relative">
        <!-- Hero Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 sm:py-28">
            <div class="text-center space-y-8 animate-slide-in-down">
                <!-- Main Heading -->
                <div class="space-y-4">
                    <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold font-display text-white leading-tight">
                        Discover Your
                    </h1>
                    <div class="flex items-center justify-center gap-3">
                        <img 
                            src="{{ asset('images/serendipity254.png') }}" 
                            class="h-16 sm:h-20 drop-shadow-lg"
                            alt="Serendipity"
                        >
                        <span class="text-gradient text-5xl sm:text-6xl lg:text-7xl font-bold font-display">
                            erendipity
                        </span>
                    </div>
                </div>

                <!-- Subheading -->
                <p class="text-lg sm:text-xl text-gray-300 mb-8 max-w-3xl mx-auto leading-relaxed">
                    Find unexpected connections, moments of joy, and meaningful experiences 
                    that transform your everyday life into something extraordinary.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center animate-fade-in-up" style="animation-delay: 0.2s;">
                    <button @click="showLogin = true"
                        class="btn-secondary px-8 py-3 text-lg rounded-lg font-semibold transition w-full sm:w-auto">
                        Sign In
                    </button>
                    <button @click="showSignup = true" 
                        class="btn-primary px-8 py-3 text-lg text-white rounded-lg font-semibold w-full sm:w-auto">
                        Get Started
                    </button>
                </div>
            </div>

            <!-- Hero Image -->
            <div class="mt-16 sm:mt-20 animate-fade-in-up" style="animation-delay: 0.4s;">
                <div class="relative">
                    <!-- Gradient border effect -->
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-pink-600 rounded-3xl blur opacity-30"></div>
                    <div class="aspect-video bg-gradient-to-br from-slate-700 to-slate-800 rounded-3xl shadow-2xl flex items-center justify-center border border-gray-700/50 relative">
                        <div class="text-center space-y-4">
                            <div class="text-6xl">✨</div>
                            <p class="text-gray-400">Your serendipitous moments await</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="py-20 sm:py-28 border-t border-gray-700/50 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="text-center mb-16 space-y-3 animate-fade-in-up" style="animation-delay: 0.2s;">
                    <h2 class="text-4xl sm:text-5xl font-bold font-display text-white">
                        Why Choose <span class="text-gradient">SerendipityMe?</span>
                    </h2>
                    <p class="text-lg text-gray-300 max-w-2xl mx-auto">
                        Experience life's beautiful moments in a whole new way
                    </p>
                    <div class="h-1 w-16 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full mx-auto mt-4"></div>
                </div>

                <!-- Features Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="feature-card rounded-2xl p-8 text-center animate-fade-in-up" style="animation-delay: 0.3s;">
                        <div class="w-20 h-20 icon-bg rounded-2xl flex items-center justify-center mx-auto mb-6" style="--grad-from: #06b6d4; --grad-to: #2563eb;">
                            <span class="text-3xl">✨</span>
                        </div>
                        <h3 class="text-2xl font-bold font-display text-white mb-3">Discover Magic</h3>
                        <p class="text-gray-300 leading-relaxed">
                            Find unexpected moments and connections that bring joy to your daily life and spark wonder.
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="feature-card rounded-2xl p-8 text-center animate-fade-in-up" style="animation-delay: 0.4s;">
                        <div class="w-20 h-20 icon-bg rounded-2xl flex items-center justify-center mx-auto mb-6" style="--grad-from: #10b981; --grad-to: #059669;">
                            <span class="text-3xl">🌟</span>
                        </div>
                        <h3 class="text-2xl font-bold font-display text-white mb-3">Create Memories</h3>
                        <p class="text-gray-300 leading-relaxed">
                            Transform ordinary experiences into extraordinary memories that last forever in your heart.
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="feature-card rounded-2xl p-8 text-center animate-fade-in-up" style="animation-delay: 0.5s;">
                        <div class="w-20 h-20 icon-bg rounded-2xl flex items-center justify-center mx-auto mb-6" style="--grad-from: #a855f7; --grad-to: #ec4899;">
                            <span class="text-3xl">💫</span>
                        </div>
                        <h3 class="text-2xl font-bold font-display text-white mb-3">Share Stories</h3>
                        <p class="text-gray-300 leading-relaxed">
                            Connect with others and share your serendipitous moments with the world around you.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="py-20 sm:py-28 relative">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="feature-card rounded-3xl p-12 text-center space-y-6 animate-fade-in-up" style="animation-delay: 0.6s;">
                    <h2 class="text-3xl sm:text-4xl font-bold font-display text-white">
                        Ready to Find Your <span class="text-gradient">Serendipity?</span>
                    </h2>
                    <p class="text-lg text-gray-300">
                        Join thousands of users discovering magical moments every day
                    </p>
                    <button @click="showSignup = true" 
                        class="btn-primary px-8 py-3 text-lg text-white rounded-lg font-semibold inline-block">
                        Start Your Journey
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection