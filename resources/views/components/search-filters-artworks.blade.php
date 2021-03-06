<div>
    <select class="" name="category">
        <option value="">Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>


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

<div>
    <select class="" name="medium">
        <option value="">Medium</option>
        @foreach ($mediums as $medium)
            <option value="{{ $medium->id }}" {{ request('medium') == $medium->id ? 'selected' : '' }}>
                {{ $medium->name }}
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
