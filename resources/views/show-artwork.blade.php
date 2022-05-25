<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-col justify-center items-center">
            <div class="div h-2/5">
                <img class="mb-3 h-full" src="{{$artwork->image_path}}"
                    alt="Bonnie image">
            </div>
            <h1 class="text-3xl">{{$artwork->title}}</h1>
            <h2 class="text-xl">{{$artist->artist_name}}</h2>
            <h3 class="mb-2 text-lg">{{$artist->original_name}}</h3>

            <a href="{{route('artists.artworks.create', [$artist->slug])}}">Create</a>
            <a href="{{route('artists.artworks.edit', [$artist->slug, $artwork->slug])}}">Edit</a>
            <div class="flex flex-col w-3/5 mb-4">
                <div class="text-2xl">
                    Tags :
                    <span>
                        @foreach ( $artwork->tags as $tag )
                            {{$tag->name}}
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
                        {{$artwork->timePeriod->period}}
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
                            {{ $medium ?? ' '}}
                        @endforeach
                    </span>
                </div>
                <div class="flex flex-col gap-2">
                    <div class="text-2xl">
                        Description :
                    </div>
                    <div class="mb-2 text-lg">
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