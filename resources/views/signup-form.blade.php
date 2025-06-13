<div x-show="showSignup"
     class="fixed inset-0 bg-black/50 flex items-center justify-center p-4 z-50"
     x-cloak>
    <div class="bg-white rounded-xl shadow-xl w-full max-w-md relative">
        <!-- Close Button -->
        <button @click="showSignup = false"
                class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 8.586L4.707 3.293A1 1 0 003.293 4.707L8.586 10l-5.293 5.293a1 1 0 001.414 1.414L10 11.414l5.293 5.293a1 1 0 001.414-1.414L11.414 10l5.293-5.293a1 1 0 00-1.414-1.414L10 8.586z" clip-rule="evenodd" />
            </svg>
        </button>

        <!-- Header -->
        <div class="text-center px-6 pt-6">
            <h2 class="text-2xl font-bold text-gray-900">Join SerendipityMe</h2>
            <p class="text-gray-600">Create your account to get started</p>
        </div>

        <!-- Form -->
        <form action="{{ route('register-submit') }}" method="post" class="space-y-4 px-6 py-6">
            @csrf

            <!-- Username with @ prefix -->
            <div>
                <label for="username" class="block font-medium text-gray-700 mb-1">Username</label>
                <div class="flex items-center border border-gray-300 rounded-md shadow-sm focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500 overflow-hidden">
                    <span class="bg-gray-100 px-3 py-2 text-gray-500 select-none">@</span>
                    <input type="text"
                        id="username"
                        name="username"
                        required
                        placeholder="Enter your username"
                        class="flex-1 px-3 py-2 focus:outline-none"/>
                </div>
            </div>

            <!-- Full Name -->
            <div>
                <label for="full_name" class="block font-medium text-gray-700 mb-1">Full Name</label>
                <input type="text"
                    id="full_name"
                    name="full_name"
                    required
                    placeholder="Enter your full name"
                    class="w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"/>
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block font-medium text-gray-700 mb-1">Email</label>
                <input type="email"
                    id="email"
                    name="email"
                    required
                    placeholder="Enter your email"
                    class="w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"/>
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block font-medium text-gray-700 mb-1">Password</label>
                <input type="password"
                    id="password"
                    name="password"
                    required
                    placeholder="Create a password"
                    class="w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"/>
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="confirmPassword" class="block font-medium text-gray-700 mb-1">Confirm Password</label>
                <input type="password"
                    id="confirmPassword"
                    name="password_confirmation"
                    required
                    placeholder="Confirm your password"
                    class="w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"/>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition">
                Create Account
            </button>
        </form>


        <!-- Switch to Login -->
        <div class="text-center pb-6 px-6">
            <p class="text-sm text-gray-600">
                Already have an account?
                <button @click="showSignup = false; showLogin = true"
                        class="text-blue-600 hover:text-blue-700 font-medium">
                    Sign in
                </button>
            </p>
        </div>
    </div>
</div>
