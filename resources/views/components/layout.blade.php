<!doctype html>

<title>Social Hub Manager</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        
        <div class="mb-8 flex items-baseline justify-center">
            <button id="menu-toggle" class="text-white focus:outline-none">
                <img src="/images/menu.svg" alt="Icono del menú" class="w-6 h-6">
            </button>
            @include('dashboard._header')
        </div>
        
        

        <nav id="nav" class=" h-screen w-1/6 bg-gray-800 text-white p-4 fixed left-0 top-0 overflow-y-auto transform -translate-x-full transition-transform duration-300 ease-in-out">
            <div class="flex flex-col items-center justify-start h-full">
                <div class="mb-8">
                    <img src="/images/logo.png" alt="SocialHubManager Logo" class="w-16 h-16 mb-2">
                </div>
        
                <div>
                    @auth
                        <div>
                            <button class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}!</button>
                        </div>
                        <div class="mt-4">
                            <x-dropdown-item href="#" :active="request()->is('admin/posts')">Dashboard</x-dropdown-item>
                            <x-dropdown-item href="#" :active="request()->is('admin/posts/create')">Instantaneous</x-dropdown-item>
                            <x-dropdown-item href="#" :active="request()->is('admin/posts/create')">Queued</x-dropdown-item>
                            <x-dropdown-item href="#" :active="request()->is('admin/posts/create')">Scheduled</x-dropdown-item>
                        </div>
                        <div class="mt-4">
                            <x-dropdown-item href="#" x-data="{}" :active="false" @click.prevent="document.querySelector('#logout-form').submit()">Log Out</x-dropdown-item>
                        </div>
                        <div class="mt-4">
                            <form id="logout-form" method="POST" action="/logout" class="text-xs font-semibold text-blue-500">
                                @csrf
                            </form>
                        </div>
                    @else
                        <div class="mt-4">
                            <a href="/register" class="text-xs font-bold uppercase">Register</a>
                        </div>
                        <div class="mt-4">
                            <a href="/login" class="text-xs font-bold uppercase">Log In</a>
                        </div>
                    @endauth
                </div>
            </div>
        </nav>

        <div class="ml-1/6">
            {{ $slot }}
        </div>
        
        <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm">Promise to keep the inbox clean. No bugs.</p>
        </footer>
    </section>
    <x-flash/>

    <script>
        document.getElementById("menu-toggle").addEventListener("click", function (event) {
            event.stopPropagation(); // Evita que el clic se propague al documento
            const nav = document.getElementById("nav");
            nav.classList.toggle("-translate-x-full");
        });
    
        document.addEventListener("click", function (event) {
        const nav = document.getElementById("nav");
        const menuToggle = document.getElementById("menu-toggle");

        if (event.target !== menuToggle) {
            nav.classList.add("-translate-x-full");
        }
    });
    </script>
    
    
</body>
