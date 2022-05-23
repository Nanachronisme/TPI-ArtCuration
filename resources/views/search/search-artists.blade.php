<x-app-layout>
    <x-slot name="header">
        <x-partials.header-search search="artists"></x-partials.header-search>
    </x-slot>
    <div class="max-w-7xl mx-auto my-8 sm:px-6 lg:px-8">
        <div class="grid mb-4 grid-cols-1 gap-4 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($artists as $artist)
                @if(isset($artist->artworks->first()->image_path)) {{-- //TODO Only artists with available images can be shown with that component, make an alternate version for artists without artworks  --}}
                    <x-card-artist image="{{ $artist->artworks->first()->image_path }}" 
                                artist_name="{{ $artist->artist_name }}"
                                original_name="{{ $artist->original_name }}">
                    </x-card-artist>
                @else
                    <p> {{$artist->artist_name}}</p>
                @endif
            @endforeach
        </div>
    </div>
</x-app-layout>