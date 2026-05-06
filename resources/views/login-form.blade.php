<!-- resources/views/components/login-form.blade.php -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Syne:wght@700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap');
    
    .font-display {
        font-family: 'Syne', sans-serif;
    }
    
    .glass-form {
        background: rgba(30, 41, 59, 0.9);
        border: 1px solid rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
    }
    
    .form-input {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: #e5e7eb;
        transition: all 0.3s ease;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    
    .form-input::placeholder {
        color: rgba(229, 231, 235, 0.5);
    }
    
    .form-input:focus {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(168, 85, 247, 0.5);
        outline: none;
        box-shadow: 0 0 0 3px rgba(168, 85, 247, 0.1);
    }
    
    .form-label {
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: #d1d5db;
        font-weight: 600;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    
    .btn-login {
        background: linear-gradient(135deg, #a855f7 0%, #ec4899 100%);
        box-shadow: 0 4px 15px rgba(168, 85, 247, 0.3);
        transition: all 0.3s ease;
        font-weight: 600;
    }
    
    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(168, 85, 247, 0.4);
    }
    
    .btn-login:active {
        transform: translateY(0);
    }
    
    @keyframes slideInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-slide-in {
        animation: slideInDown 0.4s ease-out;
    }
</style>

<div 
    x-show="showLogin"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center p-4 z-50"
    x-cloak
>
    <div class="glass-form rounded-2xl w-full max-w-md relative p-8 shadow-2xl animate-slide-in">
        <!-- Close Button -->
        <button 
            @click="showLogin = false" 
            class="absolute right-4 top-4 text-gray-400 hover:text-white transition-colors p-1"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <!-- Header -->
        <div class="text-center mb-8 space-y-3">
            <h2 class="text-3xl font-bold font-display text-white">Welcome Back</h2>
            <p class="text-gray-400 text-sm">Sign in to your SerendipityMe account</p>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('login-user') }}" class="space-y-5">
            @csrf
            
            <!-- Email Field -->
            <div class="space-y-2">
                <label for="email" class="form-label block">Email Address</label>
                <div class="relative">
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        required 
                        class="form-input w-full rounded-lg px-4 py-3 pl-4"
                        placeholder="your@email.com"
                    />
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-500 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>

            <!-- Password Field -->
            <div class="space-y-2">
                <label for="password" class="form-label block">Password</label>
                <div class="relative">
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        required 
                        class="form-input w-full rounded-lg px-4 py-3 pl-4"
                        placeholder="••••••••"
                    />
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-500 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="remember" class="w-4 h-4 rounded bg-white/10 border border-white/20 accent-purple-600 cursor-pointer" />
                    <span class="text-gray-400 hover:text-gray-300">Remember me</span>
                </label>
                <a href="#" class="text-purple-400 hover:text-purple-300 transition-colors font-medium">
                    Forgot password?
                </a>
            </div>

            <!-- Login Button -->
            <button 
                type="submit" 
                class="btn-login w-full text-white font-semibold py-3 px-4 rounded-lg transition duration-300 flex items-center justify-center gap-2 mt-6"
            >
                <span>Sign In</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </button>
        </form>

        <!-- Include Modal Components -->
        @include('password-error-modal')
        <x-password-error-modal />

        <!-- Divider -->
        <div class="relative my-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-700/50"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-2 bg-slate-800/50 text-gray-400">or</span>
            </div>
        </div>

        <!-- Switch to Signup -->
        <div class="text-center space-y-4">
            <p class="text-sm text-gray-400">
                Don't have an account? 
                <button 
                    @click="showLogin = false; showSignup = true" 
                    class="text-purple-400 hover:text-purple-300 font-semibold transition-colors ml-1"
                >
                    Create one
                </button>
            </p>
            <p class="text-xs text-gray-500">
                By signing in, you agree to our 
                <a href="#" class="text-purple-400 hover:text-purple-300">Terms of Service</a> 
                and 
                <a href="#" class="text-purple-400 hover:text-purple-300">Privacy Policy</a>
            </p>
        </div>
    </div>
</div>