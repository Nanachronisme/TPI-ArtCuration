@props(['artist_name', 'original_name', 'slug', 'image'])

<a href="{{route('artists.show', $slug)}}" class="hover:bg-gray-200">
    <div {{ $attributes->merge(['class' => "bg-gray-600 rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700"]) }}>
        <div class="flex flex-col items-center">
                <img class="object-cover h-48 w-full" 
                @if (filter_var($image, FILTER_VALIDATE_URL))
                    src="{{$image}}"
                    alt="{{$artist_name}}"
                @else
                    src="{{asset('artworks/' . $image)}}"
                    alt="{{$artist_name}}"
                @endif >
            {{-- I don't know why but the component doesnt display special characters, it only works if htmlspecialchars_decode is used --}}
            <div class="bg-white w-full flex flex-col items-center">
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ htmlspecialchars_decode($artist_name)  }}</h5>  
                <span class="text-sm text-gray-500 dark:text-gray-400">{{ htmlspecialchars_decode($original_name) }}</span>
            </div>
        </div>
    </div>        
</a>
