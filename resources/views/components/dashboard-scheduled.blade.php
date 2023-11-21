@props (['scheduled'])
<h1 class="text-lg font-bold mb-8 pb-2 border-b">
    Pending programmed publications
</h1>
@foreach ($scheduled as $sched)
    <div class="mb-1">
        <x-panel class="bg-gray-200">
            <h2 class="font-bold">{{ $sched->enunciated }}</h2>
            <p>Will be published in {{ $sched->publish_countdown }}</p>
            <div class="flex items-center">
                @foreach ($sched->media_names as $mediaName)
                    <img src="{{ asset('images/' . $mediaName . '.svg') }}" alt="{{ $mediaName }}" class="w-4 h-4 mr-2">
                @endforeach
            </div>
        </x-panel>
    </div>
@endforeach
