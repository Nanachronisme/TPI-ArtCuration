@props(['create', 'edit', 'destroy'])

@if (Auth::user()->is_admin ?? false)

    <div class="flex gap-4 mb-4">
        <x-button-link color="gray" href="{{$create}}" class=" font-semibold">Create</x-button-link>
        <x-button-link color="gray" href="{{$edit}}" class=" font-semibold">Edit</x-button-link>
        <form action={{$destroy}}
            method="POST">
            @csrf
            @method('DELETE')
            {{-- same styling as x-button-link--}}
            <button class="text-black bg-gray-200 hover:bg-red-300 focus:ring-4 focus:outline-none 
            focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex 
            items-center mr-2" >   Delete
            </button>
        </form>
    </div>

@endif