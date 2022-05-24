<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-col justify-center items-center">
            <div class="div h-2/5">
                <img class="mb-3 h-" src="https://picsum.photos/800/500" {{-- //TODO replace with artwork --}}
                    alt="Bonnie image">
            </div>
            <h1 class="text-3xl">{{{$artist->artist_name}}}</h1>
            <h2 class="mb-2 text-2xl">{{{$artist->original_name}}}</h2>

            <div class="flex flex-col w-3/5 mb-4">

                <div class="text-2xl">
                    Tags :
                    <span>
                        @isset($artist->tags)
                            @foreach ($artist->tags as $tag)
                                {{$tag->name}}
                            @endforeach
                        @endisset
                    </span>
                </div>
                <div class="text-2xl">
                    Websites :
                    <span>
                        @foreach ( $artist->websites() as $website )
                            {{ $website }}
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
                <div class="flex flex-col gap-2">
                    <div class="text-2xl">
                        Description :
                    </div>
                    <div class="">
                        {{$artist->description}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>