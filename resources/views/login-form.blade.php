<!-- resources/views/components/login-form.blade.php -->
<div 
    x-show="showLogin"
    class="fixed inset-0 bg-black/50  flex items-center justify-center p-4 z-50"
    x-cloak
>
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md relative p-6">
        <!-- Close Button -->
        <button 
            @click="showLogin = false" 
            class="absolute right-2 top-2 text-gray-500 hover:text-gray-700"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <!-- Header -->
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Welcome Back</h2>
            <p class="text-gray-600">Sign in to your SerendipityMe account</p>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-4 px-6 py-6">
            @csrf

            <div>
                <label for="email" class="block font-medium text-gray-700 mb-1">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    required 
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 px-3 py-2"
                    placeholder="Enter your email"
                />
            </div>

            <div>
                <label for="password" class="block font-medium text-gray-700 mb-1">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    required 
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 px-3 py-2"
                    placeholder="Enter your password"
                />
            </div>

            <button 
                type="submit" 
                class="w-full bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-4 rounded-lg transition"
            >
                Sign In
            </button>
        </form>


        <!-- Switch to Signup -->
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Don't have an account? 
                <button 
                    @click="showLogin = false; showSignup = true" 
                    class="text-purple-600 hover:text-purple-700 font-medium ml-1"
                >
                    Sign up
                </button>
            </p>
        </div>
    </div>
</div>
