<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'SMA Negeri 3 Kabupaten Tangerang'))</title>
    <meta name="description" content="@yield('meta_description', 'Website resmi SMA Negeri 3 Kabupaten Tangerang')">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="font-sans antialiased bg-white text-gray-800">
    @include('components.navbar')

    <main class="min-h-screen">
        @yield('content')
    </main>

    @include('components.footer')

    @stack('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const navbar = document.getElementById('navbar');
            const mobileMenu = document.getElementById('mobile-menu');
            const menuBtn = document.getElementById('menu-btn');

            if (menuBtn) {
                menuBtn.addEventListener('click', function () {
                    mobileMenu.classList.toggle('hidden');
                });
            }

            window.addEventListener('scroll', function () {
                if (window.scrollY > 50) {
                    navbar.classList.add('bg-white', 'shadow-lg');
                    navbar.classList.remove('bg-transparent');
                } else {
                    navbar.classList.remove('bg-white', 'shadow-lg');
                    navbar.classList.add('bg-transparent');
                }
            });

            const dropdowns = document.querySelectorAll('.dropdown-toggle');
            dropdowns.forEach(dropdown => {
                dropdown.addEventListener('click', function (e) {
                    e.preventDefault();
                    const menu = this.nextElementSibling;
                    menu.classList.toggle('hidden');
                });
            });
        });
    </script>
</body>
</html>
