<header class="header-nav {{ request()->routeIs('home') ? 'header-home-overlay' : 'header-inner-page' }}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="de-flex">
                    
                    <!-- 1. Single Official Brand Logo -->
                    <div class="de-flex-col">
                        <div id="logo">
                            <a href="{{ route('home') }}" class="d-inline-flex align-items-center">
                                <img src="{{ asset('images/navagruha-logo-white.png') }}" alt="Navagruha Infra Developers" style="height: 46px; width: auto;" onerror="this.onerror=null; this.src='{{ asset('images/navagruha-logo.png') }}';">
                            </a>
                        </div>
                    </div>

                    <!-- 2. Navigation Menu -->
                    <div class="de-flex-col header-col-mid">
                        <ul id="mainmenu">
                            <li>
                                <a class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                                    <span>Home</span>
                                    <i class="fa-solid fa-chevron-right d-lg-none mobile-chevron"></i>
                                </a>
                            </li>
                            <li>
                                <a class="menu-item {{ request()->routeIs('projects') ? 'active' : '' }}" href="{{ route('projects') }}">
                                    <span>Projects</span>
                                    <i class="fa-solid fa-chevron-right d-lg-none mobile-chevron"></i>
                                </a>
                            </li>
                            <li>
                                <a class="menu-item {{ request()->routeIs('investors-guide') ? 'active' : '' }}" href="{{ route('investors-guide') }}">
                                    <span>Investors Guide</span>
                                    <i class="fa-solid fa-chevron-right d-lg-none mobile-chevron"></i>
                                </a>
                            </li>
                            <li>
                                <a class="menu-item {{ request()->routeIs('plots.*') ? 'active' : '' }}" href="{{ route('plots.index') }}">
                                    <span>Plots</span>
                                    <i class="fa-solid fa-chevron-right d-lg-none mobile-chevron"></i>
                                </a>
                            </li>
                            <li>
                                <a class="menu-item {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                                    <span>Contact</span>
                                    <i class="fa-solid fa-chevron-right d-lg-none mobile-chevron"></i>
                                </a>
                            </li>

                            <!-- Mobile Quick Action CTA -->
                            <li class="mobile-menu-actions d-lg-none pt-3 mt-2 border-top border-white-10">
                                <a href="{{ route('contact') }}" class="btn-main w-100 py-3 text-center d-flex align-items-center justify-content-center gap-2">
                                    <i class="fa-solid fa-calendar-check text-brand-secondary"></i>
                                    <span>Schedule Site Visit &rarr;</span>
                                </a>
                                <div class="d-flex align-items-center justify-content-center gap-3 mt-3">
                                    <a href="{{ asset('venture/docs/RRR PREKSHITHA ENCLAVE LAYOUT.pdf') }}" target="_blank" rel="noopener" class="font-copperplate fs-11 text-white-50 text-decoration-none d-inline-flex align-items-center gap-1">
                                        <i class="fa-solid fa-file-pdf text-danger"></i> Blueprint PDF
                                    </a>
                                    <span class="text-white-50">&bull;</span>
                                    <a href="{{ route('contact') }}" class="font-copperplate fs-11 text-brand-secondary text-decoration-none d-inline-flex align-items-center gap-1">
                                        <i class="fa-solid fa-phone"></i> Contact Team
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- 3. Right CTA & Mobile Toggle Button -->
                    <div class="de-flex-col">
                        <div class="menu_side_area d-flex align-items-center gap-2 gap-sm-3">
                            <a href="{{ route('contact') }}" class="btn-main header-cta-btn">
                                <span>Schedule Visit</span>
                            </a>
                            <button id="menu-btn" class="menu-btn" type="button" aria-label="Toggle navigation" aria-expanded="false">
                                <span class="menu-btn-line menu-btn-line-1"></span>
                                <span class="menu-btn-line menu-btn-line-2"></span>
                                <span class="menu-btn-line menu-btn-line-3"></span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>
