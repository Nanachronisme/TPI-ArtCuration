@props(['artistSlug', 'artworkSlug' ,'image', 'title'])

<a href="{{route('artists.artworks.show', [ $artistSlug , $artworkSlug])}}">
    <div {{ $attributes->merge(['class' => "bg-gray-600 rounded-lg border border-gray-200 shadow-md"]) }}>
        <div class="flex flex-col items-center hover:opacity-60">
                <img class="object-contain h-48 w-full" 
                @if (filter_var($image, FILTER_VALIDATE_URL))
                    src="{{$image}}"
                    alt="{{$title}}"
                @else
                    src="{{asset('artworks/' . $image)}}"
                    alt="{{$title}}"
                @endif >
        </div>
        {{-- I don't know why but the component doesnt display special characters, it only works if htmlspecialchars_decode is used --}}
        <div class="bg-white w-full flex flex-col items-center">
            <h5 class="mb-1 text-xl font-medium text-gray-900 text-center">{{ htmlspecialchars_decode($title)  }}</h5>  
        </div>
    </div>
</a>
