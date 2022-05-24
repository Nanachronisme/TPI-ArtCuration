<x-app-layout>
    <x-slot name="header">
        <x-partials.header-search search="artists"></x-partials.header-search>
    </x-slot>
    <div class="max-w-7xl mx-auto my-8 sm:px-6 lg:px-8">
        <x-partials.artists-gallery>
            @foreach ($artists as $artist )
                @if($artist->artworks == null)
                    <x-card-artist image="{{ $placeholder }}" 
                        artist_name="{{ $artist->artist_name }}"
                        original_name="{{ $artist->original_name }}"
                        slug="{{$artist->slug}}">
                    </x-card-artist>

                @else
                    <x-card-artist image="{{ $artist->artworks->image_path }}" 
                        artist_name="{{ $artist->artist_name }}"
                        original_name="{{ $artist->original_name }}"
                        slug="{{$artist->slug}}">
                    </x-card-artist>
                @endif
            @endforeach
        </x-partials.artists-gallery>
        {{ $artists->links() }}
    </div>

</x-app-layout>