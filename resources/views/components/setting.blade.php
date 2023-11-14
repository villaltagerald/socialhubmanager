@props(['heading','link','url'])

<section class="py-8 max-w-6xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{$heading}}
    </h1>

    <div class="flex">
        <aside class="w-30 pr-4 border-r ml-4">
            <ul>
                <li class="mb-4 uppercase">
                    <a href={{$link[0]}} class="{{ request()->is("{$url}/{$link[0]}") ? 'text-blue-500' : '' }}">{{$link[0]}}</a>
                </li>
                <li class="mb-4 uppercase">
                    <a href={{$link[1]}} class="{{ request()->is("{$url}/{$link[1]}") ? 'text-blue-500' : '' }}">{{$link[1]}}</a>
                </li>
                <li class="mb-4 uppercase">
                    <a href={{$link[2]}} class="{{ request()->is("{$url}/{$link[2]}") ? 'text-blue-500' : '' }}">{{$link[2]}}</a>
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
