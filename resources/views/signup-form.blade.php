<div x-show="showSignup"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center p-4 z-50"
     x-cloak>

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
        
        .btn-signup {
            background: linear-gradient(135deg, #a855f7 0%, #ec4899 100%);
            box-shadow: 0 4px 15px rgba(168, 85, 247, 0.3);
            transition: all 0.3s ease;
            font-weight: 600;
        }
        
        .btn-signup:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(168, 85, 247, 0.4);
        }
        
        .btn-signup:active {
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
        
        .username-prefix {
            background: rgba(255, 255, 255, 0.1);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            color: #9ca3af;
            font-weight: 600;
        }
        
        .input-wrapper {
            display: flex;
            align-items: center;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 0.5rem;
            background: rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
            overflow: hidden;
        }
        
        .input-wrapper:focus-within {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(168, 85, 247, 0.5);
            box-shadow: 0 0 0 3px rgba(168, 85, 247, 0.1);
        }
        
        .input-wrapper input {
            flex: 1;
            background: transparent;
            border: none;
            color: #e5e7eb;
            padding: 0.75rem 1rem;
            outline: none;
        }
        
        .input-wrapper input::placeholder {
            color: rgba(229, 231, 235, 0.5);
        }
    </style>

    <div class="glass-form rounded-2xl w-full max-w-md relative p-8 shadow-2xl animate-slide-in max-h-[90vh] overflow-y-auto">
        <!-- Close Button -->
        <button @click="showSignup = false"
                class="absolute top-4 right-4 text-gray-400 hover:text-white transition-colors p-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Header -->
        <div class="text-center mb-8 space-y-3">
            <h2 class="text-3xl font-bold font-display text-white">
                Join <span class="text-gradient">SerendipityMe</span>
            </h2>
            <p class="text-gray-400 text-sm">Create your account to get started</p>
        </div>

        <!-- Form -->
        <form action="{{ route('register-submit') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Username with @ prefix -->
            <div class="space-y-2">
                <label for="username" class="form-label block">Username</label>
                <div class="input-wrapper">
                    <span class="username-prefix px-4 py-1 select-none">@</span>
                    <input type="text"
                        id="username"
                        name="username"
                        required
                        placeholder="username"
                        class="flex-1"/>
                </div>
            </div>

            <!-- Full Name -->
            <div class="space-y-2">
                <label for="full_name" class="form-label block">Full Name</label>
                <div class="relative">
                    <input type="text"
                        id="full_name"
                        name="name"
                        required
                        placeholder="Your full name"
                        class="form-input w-full rounded-lg px-4 py-3"/>
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-500 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            </div>

            <!-- Email -->
            <div class="space-y-2">
                <label for="email" class="form-label block">Email Address</label>
                <div class="relative">
                    <input type="email"
                        id="email"
                        name="email"
                        required
                        placeholder="your@email.com"
                        class="form-input w-full rounded-lg px-4 py-3"/>
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-500 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>

            <!-- Password -->
            <div class="space-y-2">
                <label for="password" class="form-label block">Password</label>
                <div class="relative">
                    <input type="password"
                        id="password"
                        name="password"
                        required
                        placeholder="••••••••"
                        class="form-input w-full rounded-lg px-4 py-3"/>
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-500 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <p class="text-xs text-gray-500 mt-1">Must be at least 8 characters</p>
            </div>

            <!-- Confirm Password -->
            <div class="space-y-2">
                <label for="confirmPassword" class="form-label block">Confirm Password</label>
                <div class="relative">
                    <input type="password"
                        id="confirmPassword"
                        name="password_confirmation"
                        required
                        placeholder="••••••••"
                        class="form-input w-full rounded-lg px-4 py-3"/>
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-500 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>

            <!-- Terms Checkbox -->
            <label class="flex items-start gap-3 cursor-pointer group">
                <input type="checkbox" required class="w-5 h-5 rounded mt-0.5 bg-white/10 border border-white/20 accent-purple-600 cursor-pointer" />
                <span class="text-sm text-gray-400 group-hover:text-gray-300 transition-colors leading-relaxed">
                    I agree to the 
                    <a href="#" class="text-purple-400 hover:text-purple-300">Terms of Service</a> 
                    and 
                    <a href="#" class="text-purple-400 hover:text-purple-300">Privacy Policy</a>
                </span>
            </label>

            <!-- Submit Button -->
            <button type="submit"
                    class="btn-signup w-full text-white font-semibold py-3 px-4 rounded-lg transition duration-300 flex items-center justify-center gap-2 mt-6">
                <span>Create Account</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </button>
        </form>

        <!-- Divider -->
        <div class="relative my-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-700/50"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-2 bg-slate-800/50 text-gray-400">or</span>
            </div>
        </div>

        <!-- Switch to Login -->
        <div class="text-center space-y-4">
            <p class="text-sm text-gray-400">
                Already have an account?
                <button @click="showSignup = false; showLogin = true"
                        class="text-purple-400 hover:text-purple-300 font-semibold transition-colors">
                    Sign in
                </button>
            </p>
            <p class="text-xs text-gray-500">
                Secure • Fast • Free
            </p>
        </div>
    </div>
</div>

<style>
    .text-gradient {
        background: linear-gradient(135deg, #a855f7 0%, #ec4899 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>