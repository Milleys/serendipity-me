<footer class="relative border-t border-gray-700/50 mt-auto bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 backdrop-blur-md">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap');
        
        .footer-link {
            color: #d1d5db;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            position: relative;
            display: inline-block;
        }
        
        .footer-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1.5px;
            background: linear-gradient(90deg, #a855f7, #ec4899);
            transition: width 0.3s ease;
        }
        
        .footer-link:hover {
            color: #fff;
        }
        
        .footer-link:hover::after {
            width: 100%;
        }
        
        .logo-gradient {
            background: linear-gradient(135deg, #a855f7 0%, #ec4899 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8 pb-8 border-b border-gray-700/50">
            
            <!-- Brand Section -->
            <div class="flex flex-col items-start md:items-start">
                <div class="mb-2">
                    <h2 class="text-xl font-bold tracking-tight text-white" style="font-family: 'Syne', sans-serif;">
                        Serendipity<span class="logo-gradient">Me</span>
                    </h2>
                    <p class="text-sm text-gray-400 mt-2">
                        Discover unexpected moments and create beautiful memories.
                    </p>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="flex flex-col items-start md:items-center">
                <h3 class="text-sm font-semibold text-white uppercase tracking-widest mb-4">Quick Links</h3>
                <div class="flex flex-col space-y-2">
                    <a href="#" class="footer-link">
                        Home
                    </a>
                    <a href="#" class="footer-link">
                        Profile
                    </a>
                    <a href="#" class="footer-link">
                        Events
                    </a>
                </div>
            </div>

            <!-- Legal Links -->
            <div class="flex flex-col items-start md:items-end">
                <h3 class="text-sm font-semibold text-white uppercase tracking-widest mb-4">Legal</h3>
                <div class="flex flex-col space-y-2">
                    <a href="#" class="footer-link">
                        Privacy Policy
                    </a>
                    <a href="#" class="footer-link">
                        Terms of Service
                    </a>
                    <a href="#" class="footer-link">
                        Support
                    </a>
                </div>
            </div>

        </div>

        <!-- Bottom Section -->
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <!-- Copyright -->
            <div class="text-sm text-gray-400">
                © 2024 <span class="font-semibold text-white">SerendipityMe</span>. All rights reserved.
            </div>

            <!-- Social Links (Optional) -->
            <div class="flex items-center gap-4">
                <span class="text-xs text-gray-500">Follow us</span>
                <div class="flex gap-3">
                    <a href="#" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-white/10 text-gray-400 hover:bg-white/20 hover:text-white transition-all duration-300" title="Twitter">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 2a6 6 0 016 6v1h1a6 6 0 016 6v7h-1.5V16a4.5 4.5 0 00-4.5-4.5h-1.5v7.5H11V9a4.5 4.5 0 00-4.5-4.5H5V2h3z" />
                        </svg>
                    </a>
                    <a href="#" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-white/10 text-gray-400 hover:bg-white/20 hover:text-white transition-all duration-300" title="Instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5" fill="none" stroke="currentColor" stroke-width="2"/>
                            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z" fill="none" stroke="currentColor" stroke-width="2"/>
                            <circle cx="17.5" cy="6.5" r="1.5" fill="currentColor"/>
                        </svg>
                    </a>
                    <a href="#" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-white/10 text-gray-400 hover:bg-white/20 hover:text-white transition-all duration-300" title="LinkedIn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Decorative Elements -->
    <div class="absolute top-0 left-0 w-40 h-40 bg-purple-500/10 rounded-full blur-3xl -z-10"></div>
    <div class="absolute bottom-0 right-0 w-40 h-40 bg-pink-500/10 rounded-full blur-3xl -z-10"></div>
</footer>