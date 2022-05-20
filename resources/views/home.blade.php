<x-app-layout>
    <x-slot name="header">
        <x-partials.header-home>
            @foreach ( $categories as $category )
                <div class="mr-2 pb2">{{ $category->name }}</div>
            @endforeach
        </x-partials.header-home>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                    <h1 class="mb-2 text-3xl">Latest Artist Entries</h1>
                    <x-partials.carousel></x-carousel>
                    
                    <h1 class="mb-2 text-3xl">Latest Artworks</h1>

                    <div class="grid mb-4 grid-cols-1 gap-4 md:grid-cols-3 lg:grid-cols-4">
                        @foreach ($artists as $artist)
                            <x-card-artist image="{{ $artist->artworks->first()->image_path }}" 
                                           artist_name="{{ $artist->artist_name }}"
                                           original_name="{{ $artist->original_name }}">
                            </x-card-artist>
                        @endforeach
                    </div>

                    <h1 class="mb-2 text-3xl">Popular Tags</h1>

                    @foreach ($tags as $tag)
                        <span class="mr-2">{{ $tag->name }}</span>
                    @endforeach

            </div>
        </div>

        </div>
    </div>
</x-app-layout>
