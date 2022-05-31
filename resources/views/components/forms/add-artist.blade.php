
{{-- //TODO unify the input styling--}}

<form method="post" action={{$route}}>
    @csrf
   {{--
       this route doesn't recognise POST methods, it can only accept a PUT method
       since we can't do a put method directly in PHP, we have to convert POST to PUT
    --}}
    @isset($method)
        @method($method)        
    @endisset

    <div class="text-sm mb-4">
        leave empty if unknown/not applicable. <br>
        Required fields are marked with an *
    </div>
    
    <!--Name-->
    <div class="flex gap-4">
        <div class="mb-2 w-1/2">
            <x-label for="artistName">Artist Name * :</x-label>
            <input class="w-full" type="text" name="artistName" placeholder="Artist's most used name, or pseudonym" value="@isset($artist){{ $artist->artist_name }} @endisset"/>
        </div>
        <div class="mb-4 w-1/2">
            <x-label for="originalName">Original Name :</x-label>
            <input class="w-full" type="text" name="originalName" placeholder="Artist full name in it's original language" value="@isset($artist){{ $artist->original_name }} @endisset" />
        </div>
    </div>

    <!--Birth and Death Dates-->
    <div class="flex gap-4">
        <div class="mb-4 w-52">
            <x-label for="birthDate">Birth Date :</x-label>
            <input class="w-full" type="text" name="birthDate" placeholder="circa -2000BC, 1590..." value="@isset($artist){{ $artist->birth_date }} @endisset" />
        </div>
        <div class="mb-4 w-52">
            <x-label for="deathDate">Death Date :</x-label>
            <input class="w-full" type="text" name="deathDate" placeholder="circa -2000BC, 1590..." value="@isset($artist){{ $artist->death_date }} @endisset" />
        </div>
    </div>

    <!--Time Period-->
    <span>
        <div class="text-lg">Time Period</div>
        <div class="text-sm mb-2">The artist's active time period</div>
        <select class="mb-2 w-48" name="timePeriods">
            <option value="">Time Period</option>
            @foreach ( $timePeriods as $timePeriod )
                <option value="{{ $timePeriod->id }}" 
                    @isset($artist)
                        @foreach ( $artist->timePeriods as $artistTimePeriod )
                            {{ $artistTimePeriod->id == $timePeriod->id ? 'selected':'' }}
                        @endforeach
                    @endisset>
                    {{ $timePeriod->period }}
                </option>         
            @endforeach
        </select>
    </span>
    
    <!--Country-->
    <div class="mb-4">
        <div class="text-lg">Country</div>
        <div class="text-sm mb-2">The country of appartenance or artist's ethnicity</div>
        <select class="mb-2 mr-4" name="countries">
            <option value="">Country</option>
            @foreach ( $countries as $country )
                <option value="{{ $country->id }}" 
                    @isset($artist)
                        @foreach ( $artist->countries as $artistCountry )
                            {{ $artistCountry->id == $country->id ? 'selected':'' }}
                        @endforeach
                    @endisset>
                    
                    {{ $country->name }}
                </option>         
            @endforeach
        </select>
        <x-button type="button">Add</x-button>
    </div>

    

    
    <!--Artist Websites-->
    <div class="mb-2">
        <x-label class="text-lg" >Artist Links :</x-label>
        <div class="flex">
            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-300 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                URL
            </span>
            <input type="url" name="website" class="px-4 mr-4 rounded-none rounded-r-md" placeholder="Add artist personal website or related websites" 
                    value="@isset($artist) {{$artist->websites()->first()}} @endisset"/> {{--//TODO add multiple websites selection--}}
            <x-button type="button">Add</x-button>
        </div>
    </div>

    <!--Tags-->
    {{-- TODO add a tag suggestion list 
        Tags are not functional yet, I can't assign them yet
        --}}
    <div class="mb-8">
        <x-label class="text-lg" for="tagsId" >Artist Tags :</x-label>
        <div class="text-sm mb-4">Tags are short descriptive terms for search purposes</div> 
        <div class="flex">
            <input class="px-4 mr-4 rounded-none rounded-r-md" name="tags" id="tagsId" placeholder="tag1, tag2,"/>
            <x-button type="button">Add</x-button>
        </div>
        <div class="text-xs text-gray-500"> example: surrealist, fantasy, war paintings...</div>
    </div>

    </span>
        {{-- //TODO find a way to request current route with more elegance --}}
        <x-button type="submit" name="btnSubmit">{{ str_contains(request()->route()->getName(), 'edit') ? 'Edit' : 'Add Artist' }}</x-button>
    </span>

    <!-- Error Messages -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

</form>
