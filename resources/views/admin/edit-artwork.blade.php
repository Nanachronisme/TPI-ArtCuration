<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center">
            <div class="my-6 px-6 py-8 w-3/5 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <h1 class="mb-2 text-3xl">Edit Artwork from {{ $artist->artist_name }}</h1>
                <x-forms.add-artwork route="{{ route('artists.artworks.update', [$artist->slug , $artwork->slug] ) }}" 
                                    :categories="$categories" 
                                    :mediums="$mediums"
                                    :artist="$artist"
                                    :artwork="$artwork"
                                    method='PUT'>
                </x-forms.add-artwork>
            </div>
        </div>
    </div>
</x-app-layout>
