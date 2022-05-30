<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-col justify-center items-center">
            <div class="div h-2/5">
                <img class="mb-3" src="@if($artist->artworks->isNotEmpty()){{ $artist->artworks->first()->image_path }} @endif" {{-- //TODO replace with artwork --}}
                    alt="Bonnie image">
            </div>
            <h1 class="text-3xl">{{{$artist->artist_name}}}</h1>
            <h2 class="mb-2 text-2xl">{{{$artist->original_name}}}</h2>

            <x-admin-edit-buttons create="{{route('artists.create')}}"
                                    edit="{{route('artists.edit', [$artist->slug])}}"
                                    destroy="{{route('artists.destroy', [$artist->slug])}}">
            </x-admin-edit-buttons>

            <div class="flex flex-col w-3/5 mb-4">
                <div class="text-2xl mb-2">
                    Tags :
                    <span>
                        @isset($artist->tags)
                            @foreach ($artist->tags as $tag)
                                <x-pill>
                                    {{$tag->name}}
                                </x-pill>
                            @endforeach
                        @endisset
                    </span>
                </div>
                <div class="text-2xl">
                    Websites :
                    <span class="flex flex-col">
                        @foreach ( $artist->websites() as $website )
                            <span>
                                {{ $website }}
                            </span>
                        @endforeach
                    </span>
                </div>
                <div class="text-2xl">
                    Time Period :
                    <span>
                        @foreach ( $artist->timePeriods as $timePeriod )
                            {{ $timePeriod->period }}
                        @endforeach
                    </span>
                </div>
                <div class="text-2xl">
                    Birth Date :
                    <span>
                        {{$artist->birth_date}}
                    </span>
                </div>
                <div class="text-2xl">
                    Death Date :
                    <span>
                        {{$artist->death_date}}
                    </span>
                </div>
                <div class="text-2xl">
                    Country :
                    <span>
                        @foreach ( $artist->countries as $country )
                        {{ $country->name }}
                    @endforeach
                    </span>
                </div>
                <div class="flex flex-col">
                    <div class="text-2xl">
                        Description :
                    </div>
                    <div class="mb-4">
                        {{$artist->description}}
                    </div>
                </div>
                <h2 class="text-3xl mb-2">Artworks</h2>
                <x-button-link class="bg-pink-700 text-white font-semi hover:bg-pink-900 w-32 mb-4" href="{{route('artists.artworks.create', [$artist->slug])}}">
                    Add Artwork
                </x-button-link>
                @if($artist->artworks->isNotEmpty())
                    <x-partials.artworks-gallery>
                        @foreach ($artist->artworks as $artwork)
                            <x-card-artwork artistSlug="{{$artist->slug}}"
                                            artworkSlug="{{$artwork->slug}}"
                                            image="{{$artwork->image_path}}"
                                            title="{{$artwork->title}}">
                            </x-card-artwork>
                        @endforeach
                    </x-partials.artworks-gallery>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>