{{-- TODO Try to make it so it can be placed inside the layouts directory --}}
@props(['search' => 'artists'])


@if ($search == 'artists')
    <header class="bg-purple-900 shadow">
@else
    <header class="bg-pink-900 shadow">
@endif
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex flex-col">
        <div class="flex flex-col justify-center mb-4">
            <h1 class="text-4xl text-center text-white mb-4">{{$slot}}</h1>
            
            <form {{ $attributes->class("flex justify-center gap-2") }} action="#" method="GET"  >

                <x-forms.input-search></x-forms>
                </div>
                <div class="flex flex-col justify-center mb-4">
                    <h2 class="text-xl text-center text-white">Advanced Search</h2>
                </div>

                <div class="flex justify-between mb-8">
                    <div class="flex gap-4">
                        {{$filters}}
                    </div>
                </div>

                <div class="flex">
                    <x-button-link class="text-xl mr-0 rounded-r-none" color="black" href="{{ route('search.artists') }}" >Artists</x-button-link>
                    <x-button-link class="text-xl ml-0 rounded-l-none" color="black" href="{{ route('search.artworks') }}" >Artworks</x-button-link>
                </div>

            </form>

    </div>
</header>