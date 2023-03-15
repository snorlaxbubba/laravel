<x-layout>
    <x-slot name="content">
        <div
            class="relative flex justify-center min-h-screen bg-[#fefae0] sm:items-center py-4 sm:pt-0">
            <div class="mt-6">
                @if ($category != null)
                <a href="/projects" class="mt-8 mr-8 text-[#283618]">Back</a>
                <h2 class="text-2xl text-[#283618]">{{ $category->name }} Projects</h2>
                @endif

                @if ($tag != null)
                <a href="/projects" class="mt-8 mr-8 text-[#283618]">Back</a>
                <h2 class="text-2xl text-[#283618]">{{ $tag->name }} Projects</h2>
                @endif


                <section class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    @foreach ($projects as $project)
                        <x-projects.project-card :project="$project" />
                    @endforeach
                </section>
                @if (count($projects))
                <div class="text-xs mt-4 w-full text-right text-white">
                    @if($projects instanceof \Illuminate\Pagination\AbstractPaginator)
                        {{ $projects->links() }}
                    @else
                        Found {{ count($projects) }} Projects in total.
                    @endif
                </div>
            @else
                <div>Nothing to showcase, yet.</div>
            @endif
            </div>
        </div>    
</x-slot>
</x-layout>

