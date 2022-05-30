<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex mr-3">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="text-xl text-indigo-900 font-semibold ">
                        ArtCuration
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden flex justify-between gap-4 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('search.artists')" :active="request()->routeIs('dashboard')">
                        Search
                    </x-nav-link>
                    <x-nav-link :href="route('artists.random')" :active="request()->routeIs('dashboard')">
                        Random Artist
                    </x-nav-link>
                    @if (Auth::user()->is_admin ?? false)
                        <x-nav-link :href="route('artists.create')" :active="request()->routeIs('dashboard')">
                            Create Artist
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!--Login buttons-->
            @if (Route::has('login'))
                <div class="inline-flex ml-8">
                    @auth
                        <div class="flex justify-center items-center text-lg mr-4">{{ Auth::user()->name }}</div>
                        <form method="POST" action="{{ route('logout') }}" class="flex justify-center items-center">
                            @csrf
                                <x-button-link :href="route('logout')" color="gray"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-button-link>
                        </form>

                    @else
                        <x-button-link :href="route('login')" color="gray">
                                {{ __('Login') }}
                        </x-button-link>
                        @if (Route::has('register'))
                        <x-button-link :href="route('register')" color="gray">
                                {{ __('Register') }}
                        </x-button-link>
                        @endif
                    @endauth
                </div>
            @endif
            

        </div>
    </div>
</nav>
