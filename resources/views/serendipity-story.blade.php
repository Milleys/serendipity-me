@extends('layout.default')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-100 via-pink-100 to-blue-100 p-6">
    <div class="max-w-md mx-auto">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-6">
            <a href="{{ route('profile') }}" class="text-sm text-purple-600 hover:text-purple-800 font-medium flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Back
            </a>
            <button class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-1.5 text-sm rounded-full shadow-md flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Save
            </button>
        </div>

        {{-- Story Card --}}
        <div class="relative w-full rounded-3xl shadow-2xl overflow-hidden border border-white/20" style="aspect-ratio: 9/16;">
            {{-- Background Image --}}
            <img src="{{ $serendipity->image_path ? asset($serendipity->image_path) : $serendipity->imgurl }}" 
                 alt="Serendipity"
                 class="absolute inset-0 w-full h-full object-cover z-0" />

            {{-- Top-right Badge --}}
            <div class="absolute top-4 right-4 z-10">
               
                    @if($serendipity->rating == 3)
                    <span class="bg-white text-green-600 text-xs font-semibold px-3 py-1 rounded-full shadow-lg flex items-center space-x-1">
                    <span>🤩 Fun</span>
                    @elseif($serendipity->rating == 2)
                    <span class="bg-yellow-100 text-yellow-600 text-xs font-semibold px-3 py-1 rounded-full shadow-lg flex items-center space-x-1">
                    <span>😐 Mid</span>
                    @else
                    <span class="bg-red-100 text-red-600 text-xs font-semibold px-3 py-1 rounded-full shadow-lg flex items-center space-x-1">
                    <span>😤 Nah!</span>
                    @endif

                </span>
            </div>

            {{-- Bottom Glass Details --}}
            <div class="absolute bottom-0 left-0 w-full p-5 z-10">
                <div class="bg-white/10 backdrop-blur-3xl rounded-2xl border border-white/20 p-5 shadow-lg space-y-3 text-white">
                    
                    {{-- Title --}}
                    <h2 class="text-xl font-bold">{{ $serendipity->activity }}</h2>
                    
                    {{-- Description --}}
                    <p class="text-sm text-white/90">
                        {{ $serendipity->description }}
                    </p>

                    {{-- Experience --}}
                    <div class="italic text-sm border-l-4 border-purple-300 pl-3">
                        {{ $serendipity->comment }}
                    </div>

                    {{-- Date and Location --}}
                    <div class="flex justify-between text-xs text-white/80 pt-2 border-t border-white/20">
                        <div class="flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M5 11h14M5 17h14M5 21h14M3 5h18a2 2 0 012 2v14a2 2 0 01-2 2H3a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                            </svg>
                            <span>{{ \Carbon\Carbon::parse($serendipity->created_at)->diffForHumans() }}</span>
                        </div>
                        <div class="flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 12l4.243-4.243a6 6 0 10-8.485 8.485L12 13.414l4.243 4.243a6 6 0 001.414-1.414z"/>
                            </svg>
                            <span>Downtown District</span>
                        </div>
                    </div>

                    {{-- Branding --}}
                    <div class="text-center text-xs text-white/60 pt-2 border-t border-white/10">
                        SerendipityMe
                    </div>
                </div>
            </div>
        </div>

        <p class="text-center text-sm text-gray-500 mt-5">Story layout – optimized for Instagram (1080x1920)</p>
    </div>
</div>
@endsection
