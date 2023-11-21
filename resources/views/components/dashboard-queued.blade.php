@props (['queued'])
<h1 class="text-lg font-bold mb-8 pb-2 border-b">
    Publications in queue
</h1>
@foreach ($queued as $queu)
    <div class="mb-1">
        <x-panel class="bg-gray-200">
            <h2 class="font-bold mb-1">{{ $queu->enunciated }}</h2>
            <div class="flex items-center">
                @foreach ($queu->media_names as $mediaName)
                    <img src="{{ asset('images/' . $mediaName . '.svg') }}" alt="{{ $mediaName }}" class="w-4 h-4 mr-2">
                @endforeach
            </div>
        </x-panel>
    </div>
@endforeach
