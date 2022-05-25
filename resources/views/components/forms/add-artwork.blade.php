<form action="{{$route}}" method="post" enctype="multipart/form-data">
    @csrf

    @isset($method)
        @method($method)
    @endisset

    <div class="text-sm mb-4">
        leave empty if unknown/not applicable. <br>
        Required fields are marked with an *
    </div>

    <!--Uploaded Artworks List-->

    <div class="bg-gray-500 h-48">
        <div class="text-center text-white py-24">
            Choose an Image
        </div>
    </div>
    <div class="flex flex-col items-center mb-2">
        <x-label for="fileID">Select image: </x-label>
        <input type="file" id="fileID" name="file" accept="image/*">
    </div>
    <div class="mb-2">
        <x-label class="">Image Source Url * :</x-label>
        <div class="flex">
            <span
                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-300 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                https://
            </span>
            <input type="url" class="px-4 mr-4 rounded-none rounded-r-md"
                placeholder="Add image source url"
                value="@isset($artwork){{ $artwork->source_link }}@endisset" />
        </div>
    </div>

    <div class="flex gap-4 mb-2">
        <div class="w-1/2">
            <x-label for="workTitleID">Image Title *</x-label>
            <input type="text" class="w-full" name="workTitle" id="workTitleID"
                value="@isset($artwork) {{ $artwork->title }} @endisset" />
        </div>
        <div class="w-1/2">
            <x-label for="originalWorkTitleID">Original Title</x-label>
            <input type="text" class="w-full" name="originalWorkTitle" id="originalWorkTitleID"
                value="@isset($artwork) {{ $artwork->original_title }} @endisset" />
        </div>
    </div>

    <div class="mb-2 w-1/2">
        <x-label class="text-lg" for="dimensionsID">Dimensions</x-label>
        <input type="text" name="originalWorkTitle" id="dimensionsID"
            value="@isset($artwork) {{ $artwork->dimensions }} @endisset" />
    </div>

    <div class="mb-2 w-52">
        <x-label class="text-lg" for="creationDate">Creation Date :</x-label>
        <input class="w-full" type="text" name="creationDate" placeholder="circa -2000BC, 1590..."
            value="@isset($artwork) {{ $artwork->creation_date }} @endisset" />
    </div>
    <span>
        <div class="text-lg">Time Period *</div>
        <div class="text-sm mb-2">The time period when the work was created</div>
        <div class="">
            <select class="mb-2 w-48" name="timePeriod">
                <option value="">Time Period</option>
                @foreach ($artist->timePeriods as $timePeriod)
                    <option value="{{ $timePeriod->id }}" 
                        @isset($artwork)
                            {{($artwork->timePeriod->id==$timePeriod->id)?'selected':''}}
                        @endisset>
                        {{ $timePeriod->period }}
                    </option>   
                @endforeach
            </select>
        </div>

    </span>

    <div class="flex flex-col mb-2">
        <x-label class="text-lg" for="artworkDescriptionID">Work Description</x-label>
        <textarea id="artworkDescripstionID" name="artworkDescription"
            value="@isset($artwork) {{ $artwork->description }} @endisset"></textarea>
    </div>

    <span>
        <div class="text-lg">Category *</div>
        <select class="mb-2" name="category">
            <option value="">Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" 
                        @isset($artwork)
                            {{($artwork->type_id == $category->id)?'selected':''}}
                        @endisset>
                        {{ $category->name }}
                    </option>         
                @endforeach
        </select>
    </span>

    <!--Mediums-->
    <fieldset>
        <legend class="text-lg">Mediums :</legend>

        <div class="flex gap-2">
            @foreach ($mediums as $medium)
                <div class="flex items-center mb-4">
                    <input id="{{ "checkbox-" . $medium->id }}" type="checkbox" 
                        value=""
                            @isset($artwork)
                                @foreach ($artwork->mediums as $artworkMedium)
                                    {{ $medium == $artwork->$artworkMedium ? ' checked' : ' '}}
                                @endforeach
                            @endisset 
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600" >
                    <x-label for="{{ 'checkbox-' . $medium->id }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> 
                        {{ $medium->name }}
                    </x-label>
                </div>
            @endforeach 
        </div>
    </fieldset>

    <!--Tags-->
    {{-- TODO add a tag suggestion list --}}
    <div class="mb-8">
        <x-label class="text-lg">Artwork Tags :</x-label>
        <div class="text-sm mb-4">Tags are short descriptive terms for search purposes</div>
        <div class="flex">
            <input class="px-4 mr-4 rounded-none rounded-r-md" placeholder="tag1, tag2," />
            <x-button type="button">Add</x-button>
        </div>
        <div class="text-xs text-gray-500"> example: surrealist, fantasy, war paintings...</div>
    </div>

    <x-button type="submit" name="submit">Upload Artwork</x-button>

    <x-auth-validation-errors class="mb-4" :errors="$errors" />

</form>
