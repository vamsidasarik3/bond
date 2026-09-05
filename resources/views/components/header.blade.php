<header class="header-nav {{ request()->routeIs('home') ? 'header-home-overlay' : 'header-inner-page' }}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="de-flex">
                    
                    <!-- 1. Single Official Brand Logo -->
                    <div class="de-flex-col">
                        <div id="logo">
                            <a href="{{ route('home') }}" class="d-inline-flex align-items-center">
                                <img src="{{ asset('images/navagruha-logo-white.png') }}" alt="Navagruha Infra Developers" class="brand-header-logo" style="height: 72px; width: auto; max-width: 270px; object-fit: contain;" onerror="this.onerror=null; this.src='{{ asset('images/navagruha-logo.png') }}';">
                            </a>
                        </div>
                    </div>

                    <!-- 2. Navigation Menu -->
                    <div class="de-flex-col header-col-mid">
                        <ul id="mainmenu">
                            <li>
                                <a class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                                    <span>Home</span>
                                </a>
                            </li>
                            <li>
                                <a class="menu-item {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                                    <span>About Us</span>
                                </a>
                            </li>
                            <li>
                                <a class="menu-item {{ request()->routeIs('projects') ? 'active' : '' }}" href="{{ route('projects') }}">
                                    <span>Projects</span>
                                </a>
                            </li>
                            <li>
                                <a class="menu-item {{ request()->routeIs('investor.corner', 'investors-guide') ? 'active' : '' }}" href="{{ route('investor.corner') }}">
                                    <span>Investor Corner</span>
                                </a>
                            </li>
                            <li>
                                <a class="menu-item {{ request()->routeIs('plots.*') ? 'active' : '' }}" href="{{ route('plots.index') }}">
                                    <span>Plots</span>
                                </a>
                            </li>
                            <li>
                                <a class="menu-item {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                                    <span>Contact</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- 3. Right CTA & Mobile Toggle Button -->
                    <div class="de-flex-col">
                        <div class="menu_side_area d-flex align-items-center gap-2 gap-sm-3">
                            <a href="{{ route('contact') }}" class="btn-main header-cta-btn">
                                <span>Schedule Visit</span>
                            </a>
                            <button id="menu-btn" class="menu-btn" type="button" aria-label="Open navigation menu" aria-controls="mobileNavDrawer" aria-expanded="false" aria-haspopup="dialog">
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
