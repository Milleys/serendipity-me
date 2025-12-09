<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{route('dashboard-page')}}">
            <h1 class="text-2xl font-bold tracking-tight flex items-center">
                  <img 
                    src="{{ asset('images/serendipity254.png') }}" 
                    class=" h-10 inline-block"
                    alt=""
                >
                <span class="text-gray-900">erendipity</span>
                <span class="text-purple-600">Me</span>
              
            </h1>

                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-8">
                    <a href="{{route('home-page')}}" class="text-gray-900 hover:text-gray-600 px-3 py-2 text-sm font-medium transition-colors duration-200">
                        Home
                    </a>
                    <a href="{{route('profile')}}" class="text-gray-900 hover:text-gray-600 px-3 py-2 text-sm font-medium transition-colors duration-200">
                        Profile
                    </a>
                    <a href="{{route('contactus-page')}}" class="text-gray-900 hover:text-gray-600 px-3 py-2 text-sm font-medium transition-colors duration-200">
                        Contact Us
                    </a>
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-900 hover:text-gray-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gray-500">
                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open" x-transition class="md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 border-t border-gray-100">
                <a href="{{route("home-page")}}" class="text-gray-900 hover:text-gray-600 block px-3 py-2 text-base font-medium transition-colors duration-200">
                    Home
                </a>
                <a href="{{route("profile")}}" class="text-gray-900 hover:text-gray-600 block px-3 py-2 text-base font-medium transition-colors duration-200">
                    Profile
                </a>
                <a href="{{route("contactus-page")}}" class="text-gray-900 hover:text-gray-600 block px-3 py-2 text-base font-medium transition-colors duration-200">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</nav>
