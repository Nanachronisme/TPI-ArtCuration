<form {{ $attributes->merge(['class' => "flex stretch sm:flex items-center"]) }} action="#" method="get"  >
    <input class="bg-white flex w-full" type="search" name="search" id="search" placeholder="Search Artists, Artworks..."
        value="{{ request('search') }}"
        class ="bg-transparent placeholder-black font-semibold text-sm">
</form>