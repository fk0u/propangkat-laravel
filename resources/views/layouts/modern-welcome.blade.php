<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ProPangkat') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:300,400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/lucide@0.263.0/dist/umd/lucide.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Initialize Lucide icons as soon as DOM is loaded
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            } else {
                console.error('Lucide library not loaded correctly');
            }
        });
    </script>
    
    @stack('head')
</head>
<body class="font-sans antialiased overflow-x-hidden">
    <div class="min-h-screen bg-white dark:bg-gray-950 text-gray-900 dark:text-gray-100">
        <main>
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script>
        // Initialize dark mode from localStorage or user preference
        document.addEventListener('alpine:init', () => {
            Alpine.store('darkMode', {
                on: false,
                toggle() {
                    this.on = !this.on
                    localStorage.setItem('darkMode', this.on)
                }
            })
            
            // Check for dark mode preference
            if (localStorage.getItem('darkMode') === null) {
                const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches
                Alpine.store('darkMode').on = prefersDark
                localStorage.setItem('darkMode', prefersDark)
            } else {
                Alpine.store('darkMode').on = localStorage.getItem('darkMode') === 'true'
            }
            
            // Update document class
            if (Alpine.store('darkMode').on) {
                document.documentElement.classList.add('dark')
            } else {
                document.documentElement.classList.remove('dark')
            }
        })
    </script>
    
    @stack('scripts')
    
    <script>
        // Additional script to make sure Lucide icons are initialized
        // This helps if there are any icons that weren't initialized by other methods
        document.addEventListener('alpine:initialized', () => {
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        });
    </script>
</body>
</html>
