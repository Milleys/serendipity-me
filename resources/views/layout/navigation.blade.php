<nav x-data="{ open: false }" class="backdrop-blur-md bg-gradient-to-r from-slate-900/80 via-slate-800/80 to-slate-900/80 border-b border-gray-700/50 sticky top-0 z-50 shadow-lg">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap');
        
        .nav-link {
            position: relative;
            color: #d1d5db;
            font-weight: 500;
            font-size: 0.95rem;
            transition: color 0.3s ease;
            padding: 0.5rem 1rem;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #a855f7, #ec4899);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover {
            color: #fff;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        .nav-link.active {
            color: #fff;
        }
        
        .nav-link.active::after {
            width: 100%;
        }
        
        .mobile-nav-link {
            color: #d1d5db;
            transition: all 0.3s ease;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
        }
        
        .mobile-nav-link:hover {
            color: #fff;
            background: rgba(255, 255, 255, 0.1);
        }
        
        .logo-text {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            background: linear-gradient(135deg, #a855f7 0%, #ec4899 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center gap-2">
                <a href="{{route('dashboard-page')}}" class="flex items-center gap-2 group">
                    <img 
                        src="{{ asset('images/serendipity254.png') }}" 
                        class="h-10 transition-transform duration-300 group-hover:scale-110"
                        alt="Serendipity"
                    >
                    <h1 class="text-xl font-bold tracking-tight hidden sm:flex items-center">
                        <span class="text-gray-200">erendipity</span>
                        <span class="logo-text ml-1">Me</span>
                    </h1>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-1">
                <a href="{{route('home-page')}}" class="nav-link">
                    Home
                </a>
                <a href="{{route('profile')}}" class="nav-link">
                    Profile
                </a>
                <a href="{{route('contactus-page')}}" class="nav-link">
                    Contact Us
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-lg text-gray-300 hover:text-white hover:bg-white/10 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500">
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
        <div x-show="open" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="md:hidden border-t border-gray-700/50">
            <div class="px-2 pt-3 pb-4 space-y-2 sm:px-3 backdrop-blur-sm">
                <a href="{{route('home-page')}}" 
                   class="mobile-nav-link block text-base font-medium"
                   @click="open = false">
                    <span class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 4l4 2m-2-2l-4-2" />
                        </svg>
                        Home
                    </span>
                </a>
                <a href="{{route('profile')}}" 
                   class="mobile-nav-link block text-base font-medium"
                   @click="open = false">
                    <span class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Profile
                    </span>
                </a>
                <a href="{{route('contactus-page')}}" 
                   class="mobile-nav-link block text-base font-medium"
                   @click="open = false">
                    <span class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Contact Us
                    </span>
                </a>
            </div>
        </div>
    </div>
</nav>