<form action="{{$route}}" method="POST" enctype="multipart/form-data">
    @csrf

    @isset($method)
        @method($method)
    @endisset

    <div class="text-sm mb-4">
        leave empty if unknown/not applicable. <br>
        Required fields are marked with an *
    </div>

    <!--Uploaded Artworks List-->
    {{--//TODO add uploaded image dynamically--}}
    <div class="bg-gray-500 h-48 flex justify-center">
        @if(isset($artwork))
            <img class="object-contain" src="{{$artwork->image_path}}" alt="{{'upload artwork' . $artwork->title}}">
        @else
            <div class="text-center text-white py-24">
                Choose an Image
            </div>
        @endif
    </div>

    <div class="flex flex-col items-center mb-2">
        <x-label for="imageId">Select image: </x-label>
        <input type="file" id="imageId" name="image" accept="image/*"
                value="@isset($artwork) {{$artwork->image_path}} @endisset">
    </div>

    <!--Image Source Link-->
    <div class="mb-2">
        <x-label for="sourceLinkId">Image Source Url * :</x-label>
        <div class="flex">
            <span
                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-300 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                URL
            </span>
            <input type="url" class="px-4 mr-4 w-full rounded-none rounded-r-md"
                placeholder="Add image source url" name="sourceLink" id="sourceLinkId"
                value="@isset($artwork){{ $artwork->source_link }}@endisset" />
        </div>
    </div>

    <!--Artwork Title and Original Title-->
    <div class="flex gap-4 mb-2">
        <div class="w-1/2">
            <x-label for="titleId">Artwork Title *</x-label>
            <input type="text" class="w-full" name="title" id="titleId"
                value="@isset($artwork) {{ $artwork->title }} @endisset" />
        </div>
        <div class="w-1/2">
            <x-label for="originalTitleId">Original Title</x-label>
            <input type="text" class="w-full" name="originalTitle" id="originalTitleId"
                value="@isset($artwork) {{ $artwork->original_title }} @endisset" />
        </div>
    </div>

    <!--Dimensions-->
    <div class="mb-2 w-1/2">
        <x-label class="text-lg" for="dimensionsId">Dimensions</x-label>
        <input type="text" name="dimensions" id="dimensionsId"
            value="@isset($artwork) {{ $artwork->dimensions }} @endisset" />
    </div>

    <!--Creation Date-->
    <div class="mb-2 w-52">
        <x-label class="text-lg" for="creationDate">Creation Date :</x-label>
        <input class="w-full" type="text" name="creationDate" placeholder="circa -2000BC, 1590..."
            value="@isset($artwork) {{ $artwork->creation_date }} @endisset" />
    </div>

    <!--Time Period-->
    <span>
        <div class="text-lg">Time Period *</div>
        <div class="text-sm mb-2">The time period when the work was created</div>
        <div class="">
            <select class="mb-2 w-48" name="timePeriod">
                <option value="">Time Period</option>
                @foreach ($artist->timePeriods as $timePeriod)
                    <option value="{{ $timePeriod->id }}" 
                        @if ($loop->count == 1)
                            selected
                        @else   
                            @isset($artwork)
                                {{($artwork->timePeriod->id==$timePeriod->id) ? 'selected' : ''}}
                            @endisset
                        @endif >
                        {{ $timePeriod->period }}
                    </option>   
                @endforeach
            </select>
        </div>
    </span>

    <!--Description-->
    <div class="flex flex-col mb-2">
        <x-label class="text-lg" for="artworkDescriptionID">Work Description</x-label>
        <textarea id="artworkDescripstionID" name="artworkDescription">{{ $artwork->description ?? '' }}</textarea>
    </div>

    <!--Category-->
    <span>
        <div class="text-lg">Category *</div>
        <select class="mb-2" name="category">
            <option value="">Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" 
                        @isset($artwork)
                            {{($artwork->type_id == $category->id) ? 'selected' : ''}}
                        @endisset>
                        {{ $category->name }}
                    </option>         
                @endforeach
        </select>
    </span>

    <!--Mediums-->
    <fieldset>
        <legend class="text-lg">Mediums :</legend>
        <div class="flex flex-wrap gap-2"> 
            @foreach ($mediums as $medium)
                <div class="flex items-center mb-4">
                    <input id="{{ $medium->name }}" name="mediums[]" type="checkbox" 
                        value="{{$medium->id}}"
                            @isset($artwork)
                                    {{ ($artwork->mediums->contains($medium->id)) ? 'checked' : ' '}}
                            @endisset 
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600" >
                    <x-label for="{{ $medium->name }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> 
                        {{ $medium->name }}
                    </x-label>
                </div>
            @endforeach 
        </div>
    </fieldset>

    <span>
        <div class="text-lg">Copyright *</div>
        <div class="text-sm mb-2">Select artwork's copyright status</div>
        <div> {{--//TODO add copyright variables--}}
            <select class="mb-2" name="copyright"> 
                <option value="">Copyright</option>
                    <option value="Public Domain" 
                        @isset($artwork)
                            {{($artwork->copyright == 'Public Domain') ? 'selected' : ''}}
                        @endisset>
                        Public Domain
                    </option>   
                    <option value="Copyrighted Material" 
                        @isset($artwork)
                            {{($artwork->copyright == 'Copyrighted Material') ? 'selected' : ''}}
                        @endisset>
                        Copyrighted Material
                    </option>   
            </select>
        </div>
    </span>

    <!--Tags-->
    {{-- //TODO add a tag suggestion list --}}
    <div class="mb-8">
        <x-label class="text-lg" for="tagsId">Artwork Tags :</x-label>
        <div class="text-sm mb-4">Tags are short descriptive terms for search purposes</div>
        <div class="flex">
            <input class="px-4 mr-4 rounded-none rounded-r-md" name="tags" id="tagsId" placeholder="tag1, tag2," />
            <x-button type="button">Add</x-button>
        </div>
        <div class="text-xs text-gray-500"> example: surrealist, fantasy, war paintings...</div>
    </div>

    <x-button class="mb-2" type="submit" name="submit">{{ isset($artwork) ? 'Edit Artwork' : 'Add Artwork' }}</x-button>
    
    <!--Error validation-->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

</form>
