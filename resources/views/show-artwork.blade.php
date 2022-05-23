<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-col justify-center items-center">
            <div class="div h-2/5">
                <img class="mb-3 h-" src="https://picsum.photos/800/500"
                    alt="Bonnie image">
            </div>
            <h1 class="text-3xl">Title</h1>
            <h2 class="mb-2 text-2xl">Artist + link</h2>

            <div class="flex flex-col w-3/5 mb-4">
                <div class="text-2xl">
                    Tags :
                    <span>
                        Tag1 Tag2
                    </span>
                </div>
                <div class="text-2xl">
                    Original title :
                    <span>
                        original full title in native language
                    </span>
                </div>
                <div class="text-2xl">
                    Dimensions :
                    <span>
                        2005x2500px
                    </span>
                </div>
                <div class="text-2xl">
                    Creation date:
                    <span>
                        entre 1500 - 1520
                    </span>
                </div>
                <div class="text-2xl">
                    Time Period :
                    <span>
                        1500-1599
                    </span>
                </div>
                <div class="text-2xl">
                    Type :
                    <span>
                        Traditional Painting
                    </span>
                </div>
                <div class="text-2xl">
                    Mediums :
                    <span>
                        display if exists
                    </span>
                </div>
                <div class="flex flex-col gap-2">
                    <div class="text-2xl">
                        Description :
                    </div>
                    <div class="">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque feugiat odio tortor. 
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque feugiat odio tortor. 
                    </div>
                </div>
                <div class="text-sm">
                    copyright artistname
                </div>
            </div>
        </div>
    </div>

</x-app-layout>