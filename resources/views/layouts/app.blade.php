<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Navagruha Infra Developers, Residential Plots near AIIMS Bibinagar')</title>
    <meta name="description" content="@yield('meta_description', 'HMDA final approved and RERA certified 17-acre residential plotted layout near AIIMS Bibinagar and NH-163 Warangal highway.')">
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
    <link href="{{ asset('css/navagruha-brand.css') }}?v={{ filemtime(public_path('css/navagruha-brand.css')) }}" rel="stylesheet" type="text/css">

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

    <!-- 6. Mobile Off-Canvas Navigation Drawer & Floating WhatsApp -->
    <x-mobile-nav />

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

            // Mobile Off-Canvas Navigation Drawer & Accordion System
            const menuBtn = document.getElementById('menu-btn');
            const mobileDrawer = document.getElementById('mobileNavDrawer');
            const mobileOverlay = document.getElementById('mobileNavOverlay');
            const mobileCloseBtn = document.getElementById('mobileNavClose');
            const projectsTrigger = document.getElementById('mobileProjectsTrigger');
            const projectsSubmenu = document.getElementById('mobileProjectsSubmenu');
            const projectsChevron = projectsTrigger ? projectsTrigger.querySelector('.mobile-accordion-chevron') : null;

            function openMobileDrawer() {
                if (!mobileDrawer || !mobileOverlay) return;
                mobileDrawer.classList.add('is-open');
                mobileOverlay.classList.add('is-visible');
                mobileDrawer.setAttribute('aria-hidden', 'false');
                mobileOverlay.setAttribute('aria-hidden', 'false');
                if (menuBtn) {
                    menuBtn.classList.add('active');
                    menuBtn.setAttribute('aria-expanded', 'true');
                }
                document.body.classList.add('mobile-nav-locked');
                if (mobileCloseBtn) {
                    setTimeout(function () { mobileCloseBtn.focus(); }, 60);
                }
            }

            function closeMobileDrawer() {
                if (!mobileDrawer || !mobileOverlay) return;
                mobileDrawer.classList.remove('is-open');
                mobileOverlay.classList.remove('is-visible');
                mobileDrawer.setAttribute('aria-hidden', 'true');
                mobileOverlay.setAttribute('aria-hidden', 'true');
                if (menuBtn) {
                    menuBtn.classList.remove('active');
                    menuBtn.setAttribute('aria-expanded', 'false');
                }
                document.body.classList.remove('mobile-nav-locked');
            }

            if (menuBtn) {
                menuBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    if (mobileDrawer && mobileDrawer.classList.contains('is-open')) {
                        closeMobileDrawer();
                    } else {
                        openMobileDrawer();
                    }
                });
            }

            if (mobileCloseBtn) {
                mobileCloseBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    closeMobileDrawer();
                    if (menuBtn) menuBtn.focus();
                });
            }

            if (mobileOverlay) {
                mobileOverlay.addEventListener('click', function (e) {
                    e.preventDefault();
                    closeMobileDrawer();
                });
            }

            // Close drawer on Escape key
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && mobileDrawer && mobileDrawer.classList.contains('is-open')) {
                    closeMobileDrawer();
                    if (menuBtn) menuBtn.focus();
                }
            });

            // Auto close drawer if resized to desktop breakpoint
            window.addEventListener('resize', function () {
                if (window.innerWidth >= 992 && mobileDrawer && mobileDrawer.classList.contains('is-open')) {
                    closeMobileDrawer();
                }
            });

            // Projects Accordion Toggle
            if (projectsTrigger && projectsSubmenu) {
                projectsTrigger.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    const isExpanded = projectsSubmenu.classList.toggle('is-expanded');
                    projectsTrigger.setAttribute('aria-expanded', isExpanded ? 'true' : 'false');
                    if (projectsChevron) {
                        projectsChevron.classList.toggle('is-rotated', isExpanded);
                    }
                });
            }

            // Close drawer when clicking regular navigation links
            if (mobileDrawer) {
                mobileDrawer.querySelectorAll('a').forEach(function (link) {
                    link.addEventListener('click', function () {
                        setTimeout(closeMobileDrawer, 120);
                    });
                });
            }

            // Mobile Quick Lead Enquiry AJAX Submission
            const drawerEnquiryForm = document.getElementById('mobileDrawerEnquiryForm');
            if (drawerEnquiryForm) {
                drawerEnquiryForm.addEventListener('submit', async function (e) {
                    e.preventDefault();
                    const submitBtn = document.getElementById('drawerLeadSubmitBtn');
                    const feedbackEl = document.getElementById('drawerLeadFeedback');
                    const normalText = submitBtn ? submitBtn.querySelector('.submit-normal-text') : null;
                    const loadingText = submitBtn ? submitBtn.querySelector('.submit-loading-text') : null;
                    const nameInput = document.getElementById('drawerLeadName');
                    const phoneInput = document.getElementById('drawerLeadPhone');

                    const name = nameInput ? nameInput.value.trim() : '';
                    const phone = phoneInput ? phoneInput.value.trim() : '';

                    function showFeedback(msg, type) {
                        if (!feedbackEl) return;
                        feedbackEl.textContent = msg;
                        feedbackEl.className = 'mobile-lead-feedback ' + type;
                        feedbackEl.classList.remove('d-none');
                    }

                    // Validation
                    if (!name || name.length < 2) {
                        showFeedback('Please enter your full name.', 'error');
                        if (nameInput) nameInput.focus();
                        return;
                    }

                    const phoneClean = phone.replace(/\D/g, '');
                    if (!phoneClean || phoneClean.length < 10) {
                        showFeedback('Please enter a valid 10-digit mobile number.', 'error');
                        if (phoneInput) phoneInput.focus();
                        return;
                    }

                    // Loading state
                    if (submitBtn) submitBtn.disabled = true;
                    if (normalText) normalText.classList.add('d-none');
                    if (loadingText) loadingText.classList.remove('d-none');
                    if (feedbackEl) feedbackEl.classList.add('d-none');

                    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') 
                        || drawerEnquiryForm.querySelector('input[name="_token"]')?.value;

                    try {
                        const response = await fetch('{{ route('api.enquiries') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            },
                            body: JSON.stringify({
                                name: name,
                                phone: phone,
                                subject: 'Mobile Drawer Quick Enquiry'
                            })
                        });

                        const data = await response.json();

                        if (response.ok && data.success) {
                            showFeedback('Thank you! Our property executive will contact you shortly with full details.', 'success');
                            drawerEnquiryForm.reset();
                        } else {
                            const errMsg = data.message || (data.errors ? Object.values(data.errors)[0][0] : 'Submission failed. Please call us directly.');
                            showFeedback(errMsg, 'error');
                        }
                    } catch (err) {
                        showFeedback('Network error. Please call us directly at +91 9617 699 699.', 'error');
                    } finally {
                        if (submitBtn) submitBtn.disabled = false;
                        if (normalText) normalText.classList.remove('d-none');
                        if (loadingText) loadingText.classList.add('d-none');
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
