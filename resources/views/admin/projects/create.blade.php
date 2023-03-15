<x-layout>
    <x-slot name="content">
        <div
        class="relative flex justify-center min-h-screen bg-[#fefae0] sm:items-center py-4 sm:pt-0">


            @if ($project)
            <h1 class="text-center font-bold text-xl mb-3 text-[#283618]">Edit Project: {{ $project->title }}</h1>
            <form method="POST" action="/admin/projects/{{ $project->id }}/edit" enctype="multipart/form-data">
                @method('PATCH')
            @else
                <h1 class="text-center font-bold text-xl mb-3 text-[#283618]">Create Project</h1>
                <form method="POST" action="/admin/projects/create" enctype="multipart/form-data">
            @endif
    
            @csrf
            <div class="mb-6">
                <label for="title" class="block mb-2 uppercase font-bold text-xs text-[#283618]">Title</label>
                <input type="text" name="title" id="title" class="border border-gray-400 p-2 w-full" value="{{ old('title') ?? $project?->title }}">
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-[#283618]">Excerpt</label>
                <textarea name="excerpt" id="excerpt" cols="30" rows="10"
                    class="border border-gray-400 p-2 w-full">{{ old('excerpt') ?? $project?->excerpt }}</textarea>
                @error('excerpt')

                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <label for="body" class="block mb-2 uppercase font-bold text-xs text-[#283618]">Body</label>
                <textarea name="body" id="body" cols="30" rows="10"
                    class="border border-gray-400 p-2 w-full">{{ old('body') ?? $project?->body }}</textarea>
                @error('body')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <label for="url" class="block mb-2 uppercase font-bold text-xs text-[#283618]">URL</label>
                <input type="text" name="url" id="url" class="border border-gray-400 p-2 w-full" value="{{ old('url') ?? $project?->url }}">
                @error('url')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <label for="published_date" class="block mb-2 uppercase font-bold text-xs text-[#283618]">Published Date</label>
                <input type="date" name="published_date" id="published_date" class="border border-gray-400 p-2 w-full"
                    value="{{ old('published_date') ?? $project?->published_date }}">
                @error('published_date')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                
                <label for="category_id" class="block mb-2 uppercase font-bold text-xs text-[#283618]">Category</label>
                <select name="category_id" id="category_id">
                    <option value="" selected disabled>Select a Category</option>
                    <option value="">None</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($category->id == old('category_id')) selected @endif>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <label for="tags" class="block mb-2 uppercase font-bold text-xs text-gray-700">Tags</label>
                <select name="tags[]" id="tags" multiple="multiple">
                @foreach ($tags as $tag)
                <option value="{{ $tag->id }}"
                @if (old('tags') && in_array($tag->id, old('tags')))
                        selected
                @elseif ($project && $project->tags)
                    @foreach ($project->tags as $projectTag)
                        @if ($tag->id == $projectTag->id)
                            selected
                        @endif
                    @endforeach
                @endif
                >
                {{ $tag->name }}</option>
                @endforeach
                </select>
                @error('tags')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror


                <label for="thumb" class="block mb-2 uppercase font-bold text-xs text-gray-700">Thumbnail</label>
                <input type="file" name="thumb" id="thumb"
                    value="{{ old('thumb') ?? $project?->thumb }}"
                    class="border border-gray-400 rounded p2 w-full">
                @error('thumb')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <label for="image" class="block mb-2 uppercase font-bold text-xs text-gray-700">Image</label>
                <input type="file" name="image" id="image"
                    value="{{ old('image') ?? $project?->image }}"
                    class="border border-gray-400 rounded p2 w-full">
                @error('image')
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