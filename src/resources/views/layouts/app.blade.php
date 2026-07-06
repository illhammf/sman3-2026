<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#1e3a5f">

    <title>@yield('title', config('app.name', 'SMA Negeri 3 Kabupaten Tangerang'))</title>
    <meta name="description" content="@yield('meta_description', 'Website resmi SMA Negeri 3 Kabupaten Tangerang - Informasi terkini tentang sekolah, PPDB, prestasi, dan kegiatan.')">
    <meta name="keywords" content="SMA Negeri 3 Kabupaten Tangerang, SMA N 3 Tangerang, PPDB, sekolah, pendidikan, Banten">

    <meta property="og:title" content="@yield('title', config('app.name', 'SMA Negeri 3 Kabupaten Tangerang'))">
    <meta property="og:description" content="@yield('meta_description', 'Website resmi SMA Negeri 3 Kabupaten Tangerang')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')

    <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800,900" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body class="font-sans antialiased bg-white text-gray-800 overflow-x-hidden">
    @include('components.navbar')

    <main class="min-h-screen">
        @yield('content')
    </main>

    @include('components.footer')

    <button id="scroll-top-btn" onclick="window.scrollTo({top:0,behavior:'smooth'})" class="fixed bottom-6 right-6 z-40 w-12 h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full shadow-lg flex items-center justify-center transition-all duration-300 opacity-0 invisible translate-y-4 hover:shadow-xl">
        <i class="fas fa-arrow-up"></i>
    </button>

    @stack('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const navbar = document.getElementById('navbar');
            const mobileMenu = document.getElementById('mobile-menu');
            const menuBtn = document.getElementById('menu-btn');
            const menuIcon = document.getElementById('menu-icon');
            const menuClose = document.getElementById('menu-close');
            const menuOverlay = document.getElementById('menu-overlay');
            const scrollBtn = document.getElementById('scroll-top-btn');

            if (menuBtn && mobileMenu) {
                const openMenu = () => {
                    mobileMenu.classList.remove('translate-x-full');
                    mobileMenu.classList.add('translate-x-0');
                    if (menuOverlay) menuOverlay.classList.remove('hidden', 'opacity-0');
                    if (menuOverlay) menuOverlay.classList.add('opacity-100');
                    document.body.style.overflow = 'hidden';
                };
                const closeMenu = () => {
                    mobileMenu.classList.remove('translate-x-0');
                    mobileMenu.classList.add('translate-x-full');
                    if (menuOverlay) menuOverlay.classList.remove('opacity-100');
                    if (menuOverlay) menuOverlay.classList.add('opacity-0');
                    setTimeout(() => { if (menuOverlay) menuOverlay.classList.add('hidden'); }, 300);
                    document.body.style.overflow = '';
                };

                menuBtn.addEventListener('click', openMenu);
                if (menuClose) menuClose.addEventListener('click', closeMenu);
                if (menuOverlay) menuOverlay.addEventListener('click', closeMenu);
            }

            let lastScroll = 0;
            window.addEventListener('scroll', function () {
                const currentScroll = window.scrollY;

                if (currentScroll > 50) {
                    navbar.classList.add('bg-white/95', 'shadow-lg', 'backdrop-blur-md');
                    navbar.classList.remove('bg-transparent');
                    if (currentScroll > lastScroll && currentScroll > 200) {
                        navbar.style.transform = 'translateY(-100%)';
                    } else {
                        navbar.style.transform = 'translateY(0)';
                    }
                } else {
                    navbar.classList.remove('bg-white/95', 'shadow-lg', 'backdrop-blur-md');
                    navbar.classList.add('bg-transparent');
                    navbar.style.transform = 'translateY(0)';
                }

                if (currentScroll > 400) {
                    scrollBtn.classList.remove('opacity-0', 'invisible', 'translate-y-4');
                    scrollBtn.classList.add('opacity-100', 'visible', 'translate-y-0');
                } else {
                    scrollBtn.classList.remove('opacity-100', 'visible', 'translate-y-0');
                    scrollBtn.classList.add('opacity-0', 'invisible', 'translate-y-4');
                }

                lastScroll = currentScroll;
            });

            const dropdowns = document.querySelectorAll('.desktop-dropdown-toggle');
            dropdowns.forEach(dropdown => {
                const menu = dropdown.nextElementSibling;
                let timeout;

                dropdown.parentElement.addEventListener('mouseenter', () => {
                    clearTimeout(timeout);
                    menu.classList.remove('opacity-0', 'invisible');
                    menu.classList.add('opacity-100', 'visible');
                });
                dropdown.parentElement.addEventListener('mouseleave', () => {
                    timeout = setTimeout(() => {
                        menu.classList.remove('opacity-100', 'visible');
                        menu.classList.add('opacity-0', 'invisible');
                    }, 100);
                });
            });

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in-up');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

            document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
        });
    </script>
</body>
</html>
