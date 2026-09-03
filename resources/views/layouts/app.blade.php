<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Navagruha Infra Developers — AIIMS Bibinagar 17-Acre Plotted Community')</title>
    <meta name="description" content="@yield('meta_description', 'HMDA Final Approved & RERA Certified premium 17-Acre residential plotted venture near AIIMS Bibinagar and NH-163 Warangal Expressway.')">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png">

    <!-- Web Fonts (Copperplate fallback with Cinzel & Plus Jakarta Sans) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Framework & Vendor CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Official NAVAGRUHA Design System -->
    <link href="{{ asset('css/navagruha-brand.css') }}" rel="stylesheet" type="text/css">

    @stack('styles')
</head>

<body class="dark-scheme bg-brand-dark">
    <!-- 1. Smooth Loading Screen Component -->
    <x-loading-screen />

    <div id="wrapper">
        <!-- 2. Main Header / Navigation Component -->
        <x-header />

        <!-- 3. Dynamic Page Content -->
        <main>
            @yield('content')
        </main>

        <!-- 4. Main Footer Component -->
        <x-footer />
    </div>

    <!-- 5. Global Unlock Price Lead Capture Modal -->
    <x-unlock-price-modal />

    <!-- Javascript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Global Interactive Navigation & Slider Initializer -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize Hero Swiper Slider if present
            if (document.querySelector('.swiper-home-auto')) {
                new Swiper('.swiper-home-auto', {
                    loop: true,
                    speed: 1200,
                    autoplay: {
                        delay: 5500,
                        disableOnInteraction: false,
                    },
                    effect: 'fade',
                    fadeEffect: {
                        crossFade: true
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                });
            }

            // Mobile menu toggle & interactions
            const menuBtn = document.getElementById('menu-btn');
            const mainmenu = document.getElementById('mainmenu');
            const headerNav = document.querySelector('header.header-nav');

            if (menuBtn && mainmenu) {
                function toggleMobileMenu(forceState) {
                    const isOpen = typeof forceState === 'boolean' ? forceState : !mainmenu.classList.contains('show-mobile');
                    mainmenu.classList.toggle('show-mobile', isOpen);
                    menuBtn.classList.toggle('active', isOpen);
                    menuBtn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
                    if (headerNav) headerNav.classList.toggle('mobile-menu-open', isOpen);
                }

                menuBtn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    toggleMobileMenu();
                });

                // Close menu when clicking outside
                document.addEventListener('click', function (e) {
                    if (mainmenu.classList.contains('show-mobile') && !mainmenu.contains(e.target) && !menuBtn.contains(e.target)) {
                        toggleMobileMenu(false);
                    }
                });

                // Close menu when clicking any menu link
                mainmenu.querySelectorAll('a').forEach(function (link) {
                    link.addEventListener('click', function () {
                        toggleMobileMenu(false);
                    });
                });

                // Close menu on Escape key
                document.addEventListener('keydown', function (e) {
                    if (e.key === 'Escape' && mainmenu.classList.contains('show-mobile')) {
                        toggleMobileMenu(false);
                    }
                });

                // Close menu on resize to desktop
                window.addEventListener('resize', function () {
                    if (window.innerWidth >= 992 && mainmenu.classList.contains('show-mobile')) {
                        toggleMobileMenu(false);
                    }
                });
            }

            // Location Tab switcher
            const tabItems = document.querySelectorAll('.de-tab .d-tab-nav li');
            if (tabItems.length > 0) {
                tabItems.forEach(function (tab, index) {
                    tab.addEventListener('click', function () {
                        tabItems.forEach(t => t.classList.remove('active-tab'));
                        tab.classList.add('active-tab');
                    });
                });
            }

            // Sticky Header scroll effect
            const header = document.querySelector('header');
            if (header) {
                const handleScroll = function () {
                    if (window.scrollY > 40) {
                        header.classList.add('header-scrolled');
                    } else {
                        header.classList.remove('header-scrolled');
                    }
                };
                window.addEventListener('scroll', handleScroll);
                handleScroll(); // Initial check on page load
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
