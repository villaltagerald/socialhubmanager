<x-layout>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6 ml-1/6">
        <h1 class="text-3xl font-bold mb-8 pb-2 border-b">Dashboard</h1>
        @auth
        <div class="grid grid-rows-3 grid-flow-col gap-4">
            <div class="row-start-2 row-span-2 ">
                <x-panel class="bg-blue-300">
                    <x-dashboard-queued :queued="$queued"/>
                </x-panel>
            </div>
            <div class="row-end-3 row-span-2 ">
                <x-panel class="bg-green-300">
                    <x-dashboard-queuingschedule :queuingschedule="$queuingschedule"/>
                </x-panel>
            </div>
            <div class="row-start-1 row-end-4">
                <x-panel class="bg-red-300">
                    <x-dashboard-scheduled :scheduled="$scheduled"/>
                </x-panel>
            </div>
        </div>
        @endauth
        @guest
            <div class="text-center">
                <h1 class="text-3xl font-semibold mb-6">¡Bienvenido!</h1>
                <p class="text-gray-600">Por favor, inicia sesión para acceder al dashboard.</p>
            </div>
        @endguest
    </main>
</x-layout>