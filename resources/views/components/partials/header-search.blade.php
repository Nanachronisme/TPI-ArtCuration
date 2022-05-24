{{-- TODO Try to make it so it can be placed inside the layouts directory --}}
@props(['search'])

<header class="bg-purple-900 shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex flex-col">
        <div class="flex flex-col justify-center mb-4">
            <h1 class="text-4xl text-center text-white mb-4">Search {{$search == 'artists' ? 'Artists' : 'Artworks' }}</h1>
            <x-forms.input-search></x-forms>
        </div>
        <div class="flex flex-col justify-center mb-4">
            <h2 class="text-xl text-center text-white">Advanced Search</h2>
        </div>
        <div class="flex">
            <x-button>Artist</x-button>
            <x-button>Artwork</x-button>
        </div>
    </div>
</header>