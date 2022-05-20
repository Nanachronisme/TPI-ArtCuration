@props(['artist_name', 'original_name', 'slug', 'image'])

<div {{ $attributes->merge(['class' => "bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700"]) }}>
    <div class="flex flex-col items-center">
        <a href="test" class="hover:bg-gray-200">
        </a>
            <img class="mb-3 object-cover h-56" src="{{ $image }}"
                alt="Bonnie image">
        {{-- I don't know why but the component doesnt display special characters, it only works if htmlspecialchars_decode is used --}}
        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $artist_name }}</h5>  
        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $original_name }}</span>
    </div>
</div>