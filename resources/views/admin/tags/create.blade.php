<x-layout>
    <x-slot name="content">
        <div
        class="relative flex justify-center min-h-screen bg-[#fefae0] sm:items-center py-4 sm:pt-0">


            @if ($tag)
            <h1 class="text-center font-bold text-xl mb-3 text-[#283618]">Edit Tag: {{ $tag->name }}</h1>
            <form method="POST" action="/admin/tags/{{ $tag->id }}/edit">
                @method('PATCH')
            @else
                <h1 class="text-center font-bold text-xl mb-3 text-[#283618]">Create Tag</h1>
                <form method="POST" action="/admin/tags/create">
            @endif
    
            @csrf
            <div class="mb-6">
                <label for="name" class="block mb-2 uppercase font-bold text-xs text-[#283618]">Name</label>
                <input type="text" name="name" id="name" class="border border-gray-400 p-2 w-full" value="{{ old('name') ?? $tag?->name }}">
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <div class="mt-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit</button>
                </div>
            </div>
        </form>
        </div>
    </x-slot>
</x-layout>