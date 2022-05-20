<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex mr-3">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden flex justify-between sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        Search
                    </x-nav-link>
 
                </div>
            </div>

            <!-- Search -->
            <form class="flex items-center item-stretch w-full" action="#" method="get">
                <input  type="search" name="search" id="search" placeholder="Search Artists, Artworks..."
                    value="{{ request('search') }}"
                    class ="bg-transparent placeholder-black font-semibold text-sm w-full">
            </form>

            <!--Login buttons-->
            @if (Route::has('login'))
                <div class="inline-flex ml-8">
                    @auth
                        <div class="flex justify-center text-lg mr-4">{{ Auth::user()->name }}</div> {{--  TODO make the items align --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-button-link :href="route('logout')" color="gray"
                                    onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-button-link>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            

        </div>
    </div>
</nav>
