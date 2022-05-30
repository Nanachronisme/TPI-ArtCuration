<x-app-layout>
    <x-slot name="header">
        <x-partials.header-home>
            @foreach ( $categories as $category )
                <x-button-link href="{{ route('search.artworks', ['category' => $category->id]) }}"
                        color="black"
                        class="flex items-center text-center mr-2">
                    {{ $category->name }}
                </x->
            @endforeach
        </x-partials.header-home>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                    <h1 class="mb-2 text-3xl">Latest Artist Entries</h1>
                    {{--//TODO make the carousel dynamic--}}
                    
                    <x-partials.carousel :artist1="$artists->first()"
                                        :artist2="$artists->skip(1)->first()"
                                        :artist3="$artists->skip(2)->first()"
                                        placeholder={{$placeholder}}>
                    </x-carousel>

                    <h1 class="mb-2 text-3xl">Latest Artworks</h1>
                    
                    <x-partials.artworks-gallery>
                        @foreach ($artworks as $artwork)
                            @if ($loop->last)
                                <a href="{{route('search.artworks')}}">
                                    <div class= "h-full flex justify-center items-center rounded-lg border border-gray-200 shadow-md hover:bg-indigo-300">
                                        <div class="text-2xl text-center px-2">
                                            More Artworks
                                        </div>
                                    </div>
                                </a>
                            @else
                                <x-card-artwork image="{{ $artwork->image_path}}" 
                                                artistSlug="{{$artwork->artist->slug}}"
                                                artworkSlug="{{$artwork->slug}}"
                                                title="{{$artwork->title}}">
                                </x-card-artwork>
                            @endif
                        @endforeach
                    </x-partials.artworks-gallery>

                    <h1 class="mb-2 text-3xl">Popular Tags</h1>

                    @foreach ($tags as $tag)
                        <span class="mr-2">{{ $tag->name }}</span>
                    @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
