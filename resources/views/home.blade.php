
@extends('layout.default')


@section('content')
<!-- Wrapper -->
<div class="flex flex-col md:flex-row gap-6 px-6 py-8">

<div class="w-full md:w-1/6">

</div>
    <!-- Profile Section (left) -->
    <div class="w-full md:w-1/6">
        <div class="rounded-lg border bg-white border-gray-100 p-6 shadow-sm">
            <div class="flex flex-col items-center">
                <!-- Profile Avatar -->
                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M16 14a4 4 0 10-8 0m8 0a4 4 0 00-8 0m8 0v1a4 4 0 01-4 4H8a4 4 0 01-4-4v-1m12 0v1a4 4 0 01-4 4h-4a4 4 0 01-4-4v-1" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                    </svg>
                </div>

                <!-- User Info -->
                <div class="text-center">
                    <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ Auth::user()->name }}</h3>
                    <p class="text-sm text-gray-500">{{ Auth::user()->username }}</p>
                </div>

                <!-- Additional Info -->
                <div class="mt-4 pt-4 border-t border-gray-100 w-full">
                    <div class="text-center">
                        <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Member Since</p>
                        <p class="text-sm text-gray-600"><p>{{ Auth::user()->created_at->format('F Y') }}</p>

                        </p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="inline-flex items-center gap-2 px-2 py-1 bg-red-400 text-white rounded-lg hover:bg-red-500 transition-colors duration-200 text-sm font-medium shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1" />
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
             <div class="w-80 h-80 md:w-96 md:h-96 rounded-2xl overflow-hidden shadow-lg bg-gradient-to-br from-purple-50 to-blue-50 flex items-center justify-center">
             <img
                    src="{{ session('imageUrl') ?? asset('images/serendipity_cover.jpg') }}"
                    alt="Serendipity moment"
                    class="w-full h-full object-cover"
                />

                

                <!-- Overlay -->
                <div class="absolute inset-0 rounded-2xl"></div>

                <!-- Sparkle Icon -->
                <div class="absolute top-4 right-4">
                <span class="text-purple-400 text-xl">💫</span> 
                </div>
            </div>
        </div>
        
        @if(session('activityData'))
                    <div class = "mb-2">
                        <p class=" text-lg text-center text-purple-400 font-medium italic">"{{ session('activityData.activity') }}"</p>
                        <p class=" text-lg text-center text-purple-400 font-sm italic">{{ session('activityData.description') }}</p>
                       
                    </div>
                @endif

        

               



        <form  method = "POST" action="{{route('Serendipity-submit')}}">
            @csrf
        <!-- Serendipity Button -->
         
      
        
        <button type = "submit" class="cursor-pointer group bg-purple-600 hover:bg-purple-700 text-white px-8 py-3 rounded-full font-medium transition-all duration-300 transform hover:scale-105 hover:shadow-lg flex items-center space-x-2">
            <span>✨ My Serendipity</span>
        </button>

        </form>

        <form action="{{ route('serendipity.save') }}" method="post">
        @csrf
            <input type="hidden" name="activity" value="{{ session('activityData')['activity'] ?? '' }}">
            <input type="hidden" name="description" value="{{ session('activityData')['description'] ?? '' }}">
            <input type="hidden" name="activity_id" value="{{ session('activityData')['activity_id'] ?? '' }}">
            <input type="hidden" name="imgurl" value="{{ session('imageUrl') ?? ''}}">
            
            
           
            @if ($PendingSerendipityCount > 0)
                <button type="submit" disabled class="cursor-not-allowed mt-2 bg-white/10 backdrop-blur-md text-black/50 border border-black/20 px-4 py-1 rounded-full text-sm">
                    You still have a pending serendipity
                </button>
            @else
                <button type="submit" class="mt-2 bg-white/10 backdrop-blur-md text-black/70 border border-black/20 px-4 py-1 rounded-full text-sm transition-all duration-300 transform hover:scale-105 hover:shadow-xl hover:bg-white/20">
                    I'll do this
                </button>
            @endif

        </form>

        
        <!-- Subtitle -->
        <p class="mt-4 text-gray-500 text-center max-w-md px-4">
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

