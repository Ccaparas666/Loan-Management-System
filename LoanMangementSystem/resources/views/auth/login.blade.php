<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <section class="mt-5 bg-gray-400 dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="flex flex-col items-center justify-center ">
            <a class="mt-5  flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-8 h-8 mr-2" src="data:image/png;base64,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" alt="logo">
                Loan Management System
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="bg-gray-50 rounded-lg shadow dark:border text-center text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Sign in to your account
                    </h1>
                    <form method="POST" action="{{ route('login') }}" class="space-y-4 md:space-y-6">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@gmail.com" required="">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                
                            </div>
                            <a href="{{ route('password.request') }}" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                        </div>
                        <button type="submit" class="w-full text-white bg-gray-600 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
