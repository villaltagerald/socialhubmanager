<!doctype html>

<title>Social Hub Manager</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div class="flex items-center">
                <a href="/">
                    <img src="/images/logo.png" alt="SocialHubManager Logo" width="70" height="70">
                    <span class="ml-2">Social Hub Manager</span>
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                @auth
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }} !</button>
                        </x-slot>

                        <x-dropdown-item href="#" :active="request()->is('admin/posts')">Dashboard</x-dropdown-item>
                        <x-dropdown-item href="#" :active="request()->is('admin/posts/create')">Instantaneous publication</x-dropdown-item>
                        <x-dropdown-item href="#" :active="request()->is('admin/posts/create')">Queued publication</x-dropdown-item>
                        <x-dropdown-item href="#" :active="request()->is('admin/posts/create')">Scheduled publishing</x-dropdown-item>
                        
                        <x-dropdown-item href="#" x-data="{}" :active="false" @click.prevent="document.querySelector('#logout-form').submit()">Log Out</x-dropdown-item>

                        <form id="logout-form" method="POST" action="/logout" class="text-xs font-semibold text-blue-500 ml-6">
                            @csrf
                        </form>

                    </x-dropdown>
                    
                    
                @else
                    <a href="/register" class="text-xs font-bold uppercase">Register</a>
                    <a href="/login" class="ml-6 text-xs font-bold uppercase">Log In</a>
                @endauth

            </div>
        </nav>
        {{ $slot }}
        <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm">Promise to keep the inbox clean. No bugs.</p>
        </footer>
    </section>
    <x-flash/>
</body>
