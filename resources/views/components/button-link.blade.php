@props(['color' => 'gray', 'type' => 'button', 'href'])

@php
    //Change styling for gray button
    if ($color == 'gray') {
        //.= operator is used to concatenate strings
        $classes = "text-black bg-gray-200 hover:bg-indigo-300 focus:ring-4 focus:outline-none 
    focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex 
    items-center mr-2";
    }
    elseif ($color == 'black') {
        $classes = "text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700";
    }

@endphp

<a {{ $attributes->merge(['href' => $href, 'class' => $classes]) }}>
    {{ $slot }}
</a>