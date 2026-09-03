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

                    <!-- 2. Desktop Navigation Menu -->
                    <div class="de-flex-col header-col-mid">
                        <ul id="mainmenu">
                            <li>
                                <a class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a class="menu-item {{ request()->routeIs('projects') ? 'active' : '' }}" href="{{ route('projects') }}">
                                    Projects
                                </a>
                            </li>
                            <li>
                                <a class="menu-item {{ request()->routeIs('investors-guide') ? 'active' : '' }}" href="{{ route('investors-guide') }}">
                                    Investors Guide
                                </a>
                            </li>
                            <li>
                                <a class="menu-item {{ request()->routeIs('plots.*') ? 'active' : '' }}" href="{{ route('plots.index') }}">
                                    Plots
                                </a>
                            </li>
                            <li>
                                <a class="menu-item {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                                    Contact
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- 3. Right CTA & Mobile Toggle Button -->
                    <div class="de-flex-col">
                        <div class="menu_side_area d-flex align-items-center gap-3">
                            <a href="{{ route('contact') }}" class="btn-main">
                                <span>Schedule Visit</span>
                            </a>
                            <span id="menu-btn"></span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>
