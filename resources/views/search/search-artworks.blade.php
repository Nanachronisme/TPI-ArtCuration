<x-app-layout>
    <x-slot name="header">
        <x-partials.header-search search="artworks">
            Search Artworks
            <x-slot name="filters">
                <x-search-filters-artworks :timePeriods="$timePeriods"
                                        :mediums="$mediums"
                                        :categories="$categories">
                </x-forms>                
            </x-slot>
        </x-partials.header-search>
    </x-slot>
    <div class="max-w-7xl my-8 mx-auto sm:px-6 lg:px-8">
        <x-partials.artists-gallery>
            @foreach ($artworks as $artwork)
                <x-card-artwork image="{{$artwork->image_path}}" 
                            artistSlug="{{$artwork->artist->slug}}"
                            artworkSlug="{{$artwork->slug}}"
                            title="{{$artwork->title}}">
                </x-card-artwork>
            @endforeach
        </x-partials.artworks-gallery>
        <div>
            {{ $artworks->links() }}
        </div>
    </div>
</x-app-layout>
