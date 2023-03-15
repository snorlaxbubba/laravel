<x-layout>
    <x-slot name="content">
            <div class="relative flex justify-center min-h-screen bg-[#fefae0] sm:items-center py-4 sm:pt-0">
                @if (auth()->user()?->isAdmin())
                    <a href="/admin/projects/" class="mt-8 mr-8 text-[#283618]">back</a>
                @else    
                    <a href="/projects" class="mt-8 mr-8 text-[#283618]">Back</a>
                @endif
                <div class="mt-6">
                    <section class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        <x-projects.project-card :project="$project" :showBody="true"/>
                    </section>
                </div>
            </div>
    </x-slot>
</x-layout>