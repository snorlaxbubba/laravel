

@props(['project', 'showBody' => false])

<div class="p-6  bg-white overflow-hidden shadow sm:rounded-lg max-w-sm">
    <div class="text-xl font-bold mb-5">
        @if (auth()->user()?->isAdmin())
            <a href="/admin/projects/{{ $project->slug }}">{{ $project->title }}</a>
        @else
            <a href="/projects/{{ $project->slug }}">{{ $project->title }}</a>
        @endif
    </div>

    @if ($showBody)
        <div class="space-y-9">{!! $project->body !!}</div>
        <img src="{{url('storage/' . $project->image )}}" alt="" class="max-w-m">
    @else
    <div class="mb-5 ml-4">{!! $project->excerpt !!}</div>
    <img src="{{url('storage/' . $project->thumb )}}" alt="" class="max-w-xs">
    @endif
    
    <footer>
        @if ($project->category)
            <span>Category: <a href="/categories/{{ $project->category->slug }}">{{ $project->category->name }}</a></span>
        @endif

        @if ($project->tags->count())
            <div class="flex flex-wrap">
                @foreach ($project->tags as $tag)
                    <a href="/tags/{{ $tag->slug }}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $tag->name }}</a>
                @endforeach
            </div>
        @endif

        @if ($project->url)
            <a href="{{ $project->url }}" target="_blank" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Visit Site</a>
        @endif

    </footer>


</div>
