<x-app-layout>
    <x-slot name="header">
        <x-partials.header-search search="artists">
            Search Artists
            <x-slot name="filters">
                <x-search-filters-artists :timePeriods="$timePeriods" 
                                            :countries="$countries">
                </x->
            </x-slot>
        </x-partials.header-search>

    </x-slot>

    <div class="max-w-7xl my-8 mx-auto sm:px-6 lg:px-8">
        <x-partials.artists-gallery>
            @foreach ($artists as $artist)
                <x-card-artist image="{{ $artist->artworks->first()->image_path ?? $placeholder }}"
                    artist_name="{{ $artist->artist_name }}" original_name="{{ $artist->original_name }}"
                    slug="{{ $artist->slug }}">
                </x-card-artist>
            @endforeach
        </x-partials.artists-gallery>
        <div>
            {{ $artists->links() }}
        </div>
    </div>

</x-app-layout>
