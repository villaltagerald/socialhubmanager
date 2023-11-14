@props(['heading'])

<section class="py-8 max-w-6xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{$heading}}
    </h1>

    <div class="flex">
        <aside class="w-30 pr-4 border-r ml-4">
            <ul>
                <li class="mb-4">
                    <a href="instant" class="{{ request()->is('publishing/instant') ? 'text-blue-500' : '' }}">Instant</a>
                </li>
                <li class="mb-4">
                    <a href="queued" class="{{ request()->is('publishing/queued') ? 'text-blue-500' : '' }}">Queued</a>
                </li>
                <li class="mb-4">
                    <a href="scheduled" class="{{ request()->is('publishing/scheduled') ? 'text-blue-500' : '' }}">Scheduled</a>
                </li>
            </ul>
        </aside>

        <main class="flex-1 ml-6 ">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
