
@extends('layout.default')


@section('content')
<!-- Wrapper -->
<div class="flex flex-col md:flex-row gap-6 px-6 py-8">

<div class="w-full md:w-1/6">

</div>
    <!-- Profile Section (left) -->
    <div class="w-full md:w-1/6">
        <div class="rounded-lg border border-gray-100 p-6 shadow-sm">
            <div class="flex flex-col items-center">
                <!-- Profile Avatar -->
                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M16 14a4 4 0 10-8 0m8 0a4 4 0 00-8 0m8 0v1a4 4 0 01-4 4H8a4 4 0 01-4-4v-1m12 0v1a4 4 0 01-4 4h-4a4 4 0 01-4-4v-1" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                    </svg>
                </div>

                <!-- User Info -->
                <div class="text-center">
                    <h3 class="text-lg font-semibold text-gray-900 mb-1">John Doe</h3>
                    <p class="text-sm text-gray-500">@johndoe</p>
                </div>

                <!-- Additional Info -->
                <div class="mt-4 pt-4 border-t border-gray-100 w-full">
                    <div class="text-center">
                        <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Member Since</p>
                        <p class="text-sm text-gray-600">January 2024</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
            </div>
        </div>
    </div>

    <!-- Main Content Section (right) -->
    <div class="w-full md:w-2/4 flex flex-col items-center justify-center">
        <!-- Main Serendipity Image -->
        <div class="relative mb-8">
             <div class="w-80 h-80 md:w-96 md:h-96 rounded-2xl overflow-hidden shadow-lg bg-gradient-to-br from-purple-50 to-blue-50 flex items-center justify-center">
                <img
                    src="{{asset('images/serendipity_cover.jpg')}}"
                    alt="Serendipity moment"
                    class="w-full h-full object-cover"
                />

                <!-- Overlay -->
                <div class="absolute inset-0 rounded-2xl"></div>

                <!-- Sparkle Icon -->
                <div class="absolute top-4 right-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M12 2l1.5 4.5L18 8l-4.5 1.5L12 14l-1.5-4.5L6 8l4.5-1.5L12 2z" />
                    </svg>
                </div>
            </div>
        </div>

        <form action="{{route('Serendipity-submit')}}" method = "post">
            @csrf
        <!-- Serendipity Button -->
         <input type="hidden" name="username" value = "John Wilson">
        <button type = "submit" class="group bg-purple-600 hover:bg-purple-700 text-white px-8 py-3 rounded-full font-medium transition-all duration-300 transform hover:scale-105 hover:shadow-lg flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 group-hover:animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M12 2l1.5 4.5L18 8l-4.5 1.5L12 14l-1.5-4.5L6 8l4.5-1.5L12 2z" />
            </svg>
            <span>My Serendipity</span>
        </button>

        </form>

        <!-- Subtitle -->
        <p class="mt-4 text-gray-500 text-center max-w-md px-4">
            Discover unexpected moments and create beautiful memories
        </p>
    </div>

</div>

@endsection

