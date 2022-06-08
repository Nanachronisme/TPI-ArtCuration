<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-col justify-center items-center">
            <div class="div h-2/5">
                <img class="mb-3 h-full" 
                {{--TODO remove verification when url test data is removed--}}
                @if (filter_var($artwork->image_path, FILTER_VALIDATE_URL))
                    src="{{$artwork->image_path}}"
                    alt="{{$artwork->title}}"
                @else
                    src="{{asset('artworks/' . $artwork->image_path)}}"
                    alt="{{$artwork->title}}"
                @endif>
            </div>
            <h1 class="text-3xl mb-2"> {{$artwork->title}}</h1>
            <a class="hover:text-purple-900" href="{{route('artists.show', [$artist->slug])}}">
                <h2 class="text-2xl mr-2">{{$artist->artist_name}}</h2>
            </a>
            <h3 class="text-lg mb-2">{{$artist->original_name}}</h3>

            <x-admin-edit-buttons create="{{route('artists.artworks.create', [$artist->slug])}}"
                                    edit="{{route('artists.artworks.edit', [$artist->slug, $artwork->slug])}}"
                                    destroy="{{route('artists.artworks.destroy', [$artist->slug, $artwork])}}">
            </x-admin-edit-buttons>
            
            <div class="flex flex-col w-3/5 mb-4">
                <div class="text-2xl mb-2">
                    Tags :
                    <span>
                        @foreach ( $artwork->tags as $tag )
                            <x-pill class="bg-pink-700 hover:bg-pink-900">
                                {{$tag->name}}
                            </x-pill>
                        @endforeach
                    </span>
                </div>
                <div class="text-2xl">
                    Original title :
                    <span>
                        {{$artwork->original_title}}
                    </span>
                </div>
                <div class="text-2xl">
                    Source :
                    <span>
                        {{$artwork->source_link ?? ''}} {{-- TODO harmonize the isset conditions between forms  --}}
                    </span>
                </div>
                <div class="text-2xl">
                    Dimensions :
                    <span>
                        {{$artwork->dimensions ?? ''}}
                    </span>
                </div>
                <div class="text-2xl">
                    Creation date:
                    <span>
                        {{$artwork->creation_date ?? ''}}
                    </span>
                </div>
                <div class="text-2xl">
                    Time Period :
                    <span>
                        {{ $artwork->timePeriod->period ?? ''}}
                    </span>
                </div>
                <div class="text-2xl">
                    Type :
                    <span>
                        {{$artwork->type->name}}
                    </span>
                </div>
                <div class="text-2xl">
                    Mediums :
                    <span>
                        @foreach ($artwork->mediums as $medium)
                            {{ $medium->name}}
                        @endforeach
                    </span>
                </div>
                <div class="flex flex-col">
                    <div class="text-2xl">
                        Description :
                    </div>
                    <div class="text-lg">
                        {{$artwork->description}}
                    </div>
                </div>
                <div class="text-sm text-right">
                    {{$artwork->copyright}}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>