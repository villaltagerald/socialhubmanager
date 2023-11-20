<x-layout>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6 ml-1/6">
        @auth
            <div class="p-6">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h1 class="text-2xl font-semibold">Panel de Control</h1>
                    <p>Bienvenido al panel de control de tu aplicación.</p>

                    <div class="mt-4">
                        <div class="p-4 bg-blue-200 rounded-lg">
                            <h2 class="text-lg font-semibold">Estadísticas</h2>
                            <p>Usuarios registrados: 100</p>
                            <p>Publicaciones: 500</p>
                            <p>Comentarios: 1000</p>
                        </div>
                        <form method="POST" action="{{ route('auth.reddit') }}" enctype="multipart/form-data">
                            @csrf
            
                            <x-form.button>Publish</x-submit-button>
                        </form>
                        <form method="POST" action="{{ route('home') }}" enctype="multipart/form-data">
                            @csrf
            
                            <x-form.button>verificacion</x-submit-button>
                        </form>
                    </div>
                </div>
            </div>
        @endauth
    </main>
</x-layout>