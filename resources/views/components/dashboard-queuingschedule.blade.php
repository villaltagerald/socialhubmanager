@props (['queuingschedule'])

<h1 class="text-lg font-bold mb-8 pb-2 border-b">
    Queue time for publication
</h1>

@foreach ($queuingschedule as $queuing)
    <div class="mb-1">
        <x-panel class="bg-gray-200">
            <h2 class="font-bold">{{ $queuing->name }}</h2>
            <p>Next posting in {{ $queuing->publish_countdown }}</p>
        </x-panel>
    </div>
@endforeach
