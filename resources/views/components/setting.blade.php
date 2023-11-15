@props(['heading','link','url'])

<section class="py-8 max-w-6xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{$heading}}
    </h1>

    <div class="flex">
        <aside class="w-30 pr-4 border-r ml-4">
            <ul>
                @for ($i = 0; $i < count($link); $i++)
                    <li class="mb-4 uppercase">
                        <a href="{{ str_replace(' ', '', $link[$i]) }}" class="{{ request()->is("{$url}/{str_replace(' ', '', $link[$i])}") ? 'text-blue-500' : '' }}">
                            {{ $link[$i] }}
                        </a>
                    </li>
                @endfor
            </ul>
        </aside>

        <main class="flex-1 ml-6 ">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
