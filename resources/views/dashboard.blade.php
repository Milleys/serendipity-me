@extends('layout.default')

@section('content')
<div x-data="{ showLogin: false, showSignup: false }">
 
    @include('login-form')
    @include('signup-form')


    {{-- Main Dashboard Page Content --}}
    <div class="relative overflow-hidden bg-white">
        <!-- Hero Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6">
                    Discover Your
                    <span class="text-blue-600 block">Serendipity</span>
                </h1>
                <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
                    Find unexpected connections, moments of joy, and meaningful experiences 
                    that transform your everyday life into something extraordinary.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <button @click="showLogin = true"
                        class="px-8 py-3 text-lg border border-blue-600 text-blue-600 hover:bg-blue-50 rounded-lg font-medium transition">
                        Sign In
                    </button>

                    <button @click="showSignup = true" 
                        class="px-8 py-3 text-lg bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition">
                        Get Started
                    </button>
                </div>
            </div>

            <!-- Hero Image -->
            <div class="mt-16 relative">
                <div class="aspect-video bg-gradient-to-br from-blue-100 to-purple-100 rounded-2xl shadow-2xl flex items-center justify-center">
                    <div class="w-24 h-24 bg-blue-600 rounded-full flex items-center justify-center">
                        <span class="text-white text-3xl font-bold">S</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="bg-gray-50 py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">
                        Why Choose SerendipityMe?
                    </h2>
                    <p class="text-lg text-gray-600">
                        Experience life's beautiful moments in a whole new way
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Features... -->
                    <div class="text-center p-6">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-blue-600 text-2xl">✨</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Discover Magic</h3>
                        <p class="text-gray-600">
                            Find unexpected moments and connections that bring joy to your daily life.
                        </p>
                    </div>
                    <div class="text-center p-6">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-green-600 text-2xl">🌟</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Create Memories</h3>
                        <p class="text-gray-600">
                            Transform ordinary experiences into extraordinary memories that last forever.
                        </p>
                    </div>
                    <div class="text-center p-6">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-purple-600 text-2xl">💫</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Share Stories</h3>
                        <p class="text-gray-600">
                            Connect with others and share your serendipitous moments with the world.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
@endsection
