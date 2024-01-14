<nav x-data="{ open: false }" class="bg-blue-900 border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @if (Route::has('login'))
                    @auth
                        <x-nav-link href="{{ url('/dashboard') }}" :active="request()->routeIs('dashboard')" class="bg-blue-900 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</x-nav-link>
                    @else
                        <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</x=nav-link>

                        @if (Route::has('register'))
                            <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</x-nav-link>
                        @endif
                    @endauth
                    @endif
                    @endif
                </div>

    </div>
</nav>