@extends('layout.default')
@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap');
    
    :root {
        --primary: #a855f7;
        --dark: #0f172a;
        --accent: #ec4899;
    }
    
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
</style>

<div class="min-h-screen bg-slate-950 p-6">
    <div class="max-w-md mx-auto">
        {{-- Header --}}
        <div class="flex items-center justify-between mb-8">
            <a href="{{ route('profile') }}" class="text-white/60 hover:text-white font-medium flex items-center text-sm transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Back
            </a>
            <button onclick="downloadStoryCard()" class="bg-gradient-to-r from-purple-600 to-pink-600 hover:shadow-lg hover:shadow-purple-500/50 text-white px-5 py-2 text-sm rounded-xl font-semibold flex items-center cursor-pointer transition-all duration-300 transform hover:scale-105">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                </svg>
                Download
            </button>
        </div>

        {{-- Story Card Container --}}
        <div id="story-card" class="relative w-full shadow-2xl overflow-hidden" style="aspect-ratio: 9/16; border-radius: 24px;">
            {{-- Background Image with Overlay --}}
            <div class="absolute inset-0 z-0">
                <img src="{{ $serendipity->image_path ? asset($serendipity->image_path) : $serendipity->imgurl }}" 
                     alt="Serendipity"
                     class="w-full h-full object-cover" />
                {{-- Gradient Overlays --}}
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent opacity-70"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-purple-900/20 to-pink-900/20"></div>
            </div>

            {{-- Content Container --}}
            <div class="relative z-10 h-full flex flex-col justify-between p-6">
                {{-- Top Section --}}
                <div class="space-y-2">
                    {{-- Logo/Brand --}}
                    <div class="inline-block">
                        <div class="text-xs font-semibold uppercase tracking-widest text-purple-300 mb-1">
                            ✨ Serendipity Moment
                        </div>
                    </div>
                </div>

                {{-- Bottom Section with Glass Effect --}}
                <div class="space-y-4">
                    {{-- Rating Badge --}}
                    <div class="flex justify-end">
                        @if($serendipity->rating == 3)
                            <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-full px-4 py-2 flex items-center space-x-2">
                                <span class="text-lg">🤩</span>
                            </div>
                        @elseif($serendipity->rating == 2)
                            <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-full px-4 py-2 flex items-center space-x-2">
                                <span class="text-lg">😐</span> 
                            </div>
                        @else
                            <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-full px-4 py-2 flex items-center space-x-2">
                                <span class="text-lg">😤</span>
                            </div>
                        @endif
                    </div>

                    {{-- Main Content Box --}}
                    <div class="bg-black/40 backdrop-blur-2xl border border-white/10 rounded-2xl p-6 space-y-4">
                        {{-- Activity Title --}}
                        <div>
                            <h2 class="font-poppins text-3xl font-bold text-white leading-tight" style="font-family: 'Poppins', sans-serif;">
                                {{ $serendipity->activity }}
                            </h2>
                        </div>

                        {{-- Description --}}
                        @if($serendipity->description)
                            <p class="text-white/80 text-sm leading-relaxed">
                                {{ Str::limit($serendipity->description, 100) }}
                            </p>
                        @endif

                        {{-- Quote/Comment --}}
                        @if($serendipity->comment)
                            <div class="border-l-3 border-purple-400 pl-3 py-1">
                                <p class="text-white/70 text-xs italic">
                                    "{{ Str::limit($serendipity->comment, 80) }}"
                                </p>
                            </div>
                        @endif

                        {{-- Meta Info --}}
                        <div class="flex items-center justify-between pt-3 border-t border-white/10 text-xs text-white/60">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M5 11h14M5 17h14M5 21h14M3 5h18a2 2 0 012 2v14a2 2 0 01-2 2H3a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                                </svg>
                                <span>{{ $serendipity->completed_at ? \Carbon\Carbon::parse($serendipity->completed_at)->format('M j') : 'N/A' }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span>{{ Auth::user()->username }}</span>
                            </div>
                        </div>

                        {{-- Website --}}
                        <div class="text-center text-xs text-purple-300/80 pt-2">
                            serendipityme.site
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <p class="text-center text-xs text-white/40 mt-6 uppercase tracking-wide">Instagram Story Format (1080×1920)</p>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js" integrity="sha512-01CJ9/g7e8cUmY0DFTMcUw/ikS799FHiOA0eyHsUWfOetgbx/t6oV4otQ5zXKQyIrQGTHSmRVPIgrgLcZi/WMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
function downloadStoryCard() {
    const storyCard = document.getElementById('story-card');
    const scale = 3;
    const style = {
        transform: 'scale(' + scale + ')',
        transformOrigin: 'top left',
        width: storyCard.offsetWidth + "px",
        height: storyCard.offsetHeight + "px"
    };
    const param = {
        width: storyCard.offsetWidth * scale,
        height: storyCard.offsetHeight * scale,
        style: style
    };
    domtoimage.toPng(storyCard, param)
        .then(function (dataUrl) {
            const link = document.createElement('a');
            link.download = '{{ $serendipity->completed_at }}-{{ $serendipity->activity }}-{{ Auth::user()->username }}.png';
            link.href = dataUrl;
            link.click();
        })
        .catch(function (error) {
            console.error('Error rendering the story card:', error);
            alert("Failed to capture image");
        });
}
</script>
@endsection