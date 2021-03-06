<div>
    <select class="" name="timePeriod">
        <option value="">Time Period</option>
        @foreach ($timePeriods as $timePeriod)
            <option value="{{ $timePeriod->id }}" {{ request('timePeriod') == $timePeriod->id ? 'selected' : '' }}>
                {{ $timePeriod->period }}
            </option>
        @endforeach
    </select>
</div>

<!--Time Period-->
<div class="">
    <select class="" name="country">
        <option value="">Country</option>
        @foreach ($countries as $country)
            <option value="{{ $country->id }}"  {{ request('country') == $country->id ? 'selected' : '' }}>
                {{ $country->name }}
            </option>
        @endforeach
    </select>
</div>

<!--Order by-->
<div class="">
    <select class="" name="order">
            <option value="latest" {{ request('order') == 'latest' || '' ? 'selected' : '' }}>
                Latest
            </option>
            <option value="oldest" {{ request('order') == 'oldest' ? 'selected' : '' }}>
                Oldest
            </option>
            <option value="alphabetical" {{ request('order') == 'alphabetical' ? 'selected' : '' }}>
                Alphabetical
            </option>
    </select>
</div>
