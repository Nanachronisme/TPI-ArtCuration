<form method="post" action=#>
    @csrf
   {{--
       since this route doesn't recognise POST methods, it can only accept a PUT method
       since we can't do a put method directly in PHP, we have to convert the POST to PUT
    --}}

    @isset($method)
        @method($method)        
    @endisset
    
    <p>
        <label for="artistName">Artist Name:</label>
        <input type="text" name="artistName" value="@isset($artist){{ $artist->artist_name }} @endisset"/>
    </p>
    <p>
        <label for="orignalName">Original Name :</label>
        <input type="text" name="orignalName" value="@isset($artist){{ $artist->orignal_name }} @endisset" />
    </p>

    <p>
        <x-label class="text-lg" for="description" :value="__('Description')"/>
        <textarea type="text" name="description" value="@isset($artist){{ $artist->description }} @endisset"></textarea>
    </p>
    <p>
        <select name="timePeriod">
            <option value="">Time Period</option>
            {{-- @foreach ( $timePeriods as $timePeriod )
                <option value="{{ $timePeriod->id }}" 
                    @isset($artist)
                        {{($artist->timePeriods==$timePeriod->id)?'selected':''}}
                    @endisset>

                    {{ $timePeriod->period }}
                </option>         
            @endforeach --}}
        </select>
    </p>

    <p>
        <select name="category">
            <option value="">Category</option>
            {{-- @foreach ( $types as $type )
                <option value="{{ $timePeriod->id }}" 
                    @isset($artist)
                        {{($artist->type==$timePeriod->id)?'selected':''}}
                    @endisset>

                    {{ $timePeriod->period }}
                </option>         
            @endforeach --}}
        </select>
    </p>
    
    <fieldset>
        <legend class="sr-only">Mediums</legend>

        <div class="flex">

            <div class="flex items-center mb-4 mr-2">
                <input checked id="checkbox-1" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" >
                <label for="checkbox-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> medium 1 </label>
            </div>
            <div class="flex items-center mb-4 mr-2">
                <input checked id="checkbox-1" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" >
                <label for="checkbox-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> medium 2 </label>
            </div>
        </div>

      
        {{-- @foreach ($mediums as $medium )
            <div class="flex items-center mb-4">
                <input checked id="checkbox-1" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" >
                <label for="checkbox-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> {{ $medium->name }}</label>
            </div>
        @endforeach --}}
    
      </fieldset>

    <p>
        {{-- TODO change find a way to request current route with more elegance --}}
        <x-button type="submit" name="btnSubmit">{{ str_contains(request()->route()->getName(), 'edit') ? 'Modifier' : 'Ajouter' }}</x-button>
    </p>

    {{-- Error Messages --}}
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p style="color:red">
                {{ $error }}
            </p>
        @endforeach
    @endif

</form>
