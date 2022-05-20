{{-- TODO Try to make it so it can be placed inside the layouts directory --}}
<header class="bg-indigo-900 shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex flex-col">
        <div class="flex flex-col justify-center mb-4">
            <h1 class="text-4xl text-center text-white mb-4">A Curated Database of Artists</h1>
            <x-forms.input-search></x-forms>
        </div>
        <div class="flex flex-col justify-center mb-4">
            <h2 class="text-xl text-center text-white">Categories</h2>
            <div class="flex justify-center text-white">
                {{ $slot }}
            </div>
        </div>
    </div>
</header>