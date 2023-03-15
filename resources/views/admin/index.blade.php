<x-layout>
    <x-slot name="content">
        <div
            class="relative flex justify-center min-h-screen bg-[#fefae0] md:items-center max-w-m">
            <div class="mt-6 p-10">
                <section class="text-[#283618]" >
                    <div class="flex justify-between">
                        <h2>Projects</h2>
                        <a href="/admin/projects/create">Create Project</a>
                    </div>

                    @foreach ($projects as $project)
                        <div class="flex justify-between even:bg-[#fdf2af] odd:bg-[#fefae0] even:text-gray-900">
                            <h2 class="pr-20 pl-2 pt-2 pb-2">{{ $project->title }}</h2>
                            <div>
                                <a href="/admin/projects/{{ $project->id }}/edit">Edit</a>

                                <form method="POST" action="/admin/projects/{{$project->id}}/delete" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-red-600 pr-2 pt-2 pb-2">Delete
                                    </button>
                                </form>
                
                            </div>
                        </div>
                    @endforeach

                </section>

                <section class="text-[#283618] mt-9">
                    <div class="flex justify-between">
                        <h2>Users</h2>
                        <a href="/admin/users/create">Create User</a>
                    </div>
                    @foreach ($users as $user)
                    <div class="flex justify-between even:bg-[#fdf2af] odd:bg-[#fefae0] even:text-gray-900">
                        <h2 class="pl-2 pt-2 pb-2">{{ $user->name }}</h2>
                        <div>
                            <button>Edit</button>
                            <form method="POST" action="/admin/users/{{$user->id}}/delete" class="inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-red-600 pr-2 pt-2 pb-2">Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </section>

                <section class="text-[#283618] mt-9">
                    <div class="flex justify-between">
                        <h2>Categories</h2>
                        <a href="/admin/categories/create">Create Category</a>
                    </div>
                    @foreach ($categories as $category)
                    <div class="flex justify-between even:bg-[#fdf2af] odd:bg-[#fefae0] even:text-gray-900">
                        <h2 class="pl-2 pt-2 pb-2">{{ $category->name }}</h2>
                        <div>
                            <a href="/admin/categories/{{ $category->id }}/edit">Edit</a>
                            <form method="POST" action="/admin/categories/{{$category->id}}/delete" class="inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-red-600 pr-2 pt-2 pb-2">Delete
                                </button>
                        </div>
                    </div>
                    @endforeach
                </section>

                <section class="text-[#283618] mt-9">
                    <div class="flex justify-between">
                        <h2>Tags</h2>
                        <a href="/admin/tags/create">Create Tag</a>
                    </div>
                    @foreach ($tags as $tag)
                    <div class="flex justify-between even:bg-[#fdf2af] odd:bg-[#fefae0] even:text-gray-900">
                        <h2 class="pl-2 pt-2 pb-2">{{ $tag->name }}</h2>
                        <div>
                            <a href="/admin/tags/{{ $tag->id }}/edit">Edit</a>
                            <form method="POST" action="/admin/tags/{{$tag->id}}/delete" class="inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-red-600 pr-2 pt-2 pb-2">Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </section>
            </div>
        </div>    
</x-slot>
</x-layout>