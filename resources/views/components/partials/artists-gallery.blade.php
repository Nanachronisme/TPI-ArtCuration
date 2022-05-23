{{-- //TODO make it so it can accept arrays giving artists as collection makes an error --}}

@props('artists')

@foreach ($artists as $artist)
        <x-card-artist image="{{ $artist->artworks->first()->image_path }}" 
                    artist_name="{{ $artist->artist_name }}"
                    original_name="{{ $artist->original_name }}">
        </x-card-artist>
@endforeach