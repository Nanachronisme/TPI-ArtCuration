@props(['artistSlug', 'artworkSlug' ,'image'])

<a href="{{route('artists.artworks.show', [ $artistSlug , $artworkSlug])}}" class="hover:bg-gray-200">
    <div {{ $attributes->merge(['class' => "bg-gray-600 rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700"]) }}>
        <div class="flex flex-col items-center">
                <img class="object-contain h-48 w-full" src="{{ $image }}"
                    alt="Bonnie image">
        </div>
    </div>
</a>
