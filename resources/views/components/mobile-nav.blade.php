{{-- Mobile Navigation Off-Canvas Drawer & Floating WhatsApp Component --}}

<!-- Subtle Dark Overlay Backdrop -->
<div id="mobileNavOverlay" class="mobile-nav-overlay" aria-hidden="true"></div>

<!-- Off-Canvas Navigation Drawer -->
<aside id="mobileNavDrawer" class="mobile-nav-drawer" role="dialog" aria-modal="true" aria-label="Mobile Navigation" aria-hidden="true">
    
    <!-- Drawer Header: Brand Logo & Close Button -->
    <div class="mobile-nav-header">
        <a href="{{ route('home') }}" class="mobile-nav-brand d-inline-flex align-items-center" aria-label="Navagruha Infra Developers Home">
            <img src="{{ asset('images/navagruha-logo-white.png') }}" alt="Navagruha Infra Developers" class="mobile-nav-logo-img" onerror="this.onerror=null; this.src='{{ asset('images/navagruha-logo.png') }}';">
        </a>
        <button type="button" id="mobileNavClose" class="mobile-nav-close-btn" aria-label="Close navigation menu">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>

    <!-- Scrollable Drawer Body -->
    <div class="mobile-nav-body">

        <!-- Main Navigation Links List -->
        <nav class="mobile-nav-menu-wrapper" aria-label="Mobile Menu">
            <ul class="mobile-nav-list">
                
                <!-- Home -->
                <li class="mobile-nav-item">
                    <a href="{{ route('home') }}" class="mobile-nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <span class="mobile-nav-link-text"><i class="fa-solid fa-house me-2 text-brand-secondary fs-13"></i> Home</span>
                        <i class="fa-solid fa-chevron-right mobile-nav-arrow"></i>
                    </a>
                </li>

                <!-- About Us -->
                <li class="mobile-nav-item">
                    <a href="{{ route('about') }}" class="mobile-nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                        <span class="mobile-nav-link-text"><i class="fa-solid fa-building-columns me-2 text-brand-secondary fs-13"></i> About Us</span>
                        <i class="fa-solid fa-chevron-right mobile-nav-arrow"></i>
                    </a>
                </li>

                <!-- Projects Accordion -->
                <li class="mobile-nav-item mobile-nav-accordion-item">
                    <button type="button" class="mobile-nav-link mobile-nav-accordion-trigger {{ request()->routeIs('projects') ? 'active' : '' }}" id="mobileProjectsTrigger" aria-expanded="false" aria-controls="mobileProjectsSubmenu">
                        <span class="mobile-nav-link-text"><i class="fa-solid fa-city me-2 text-brand-secondary fs-13"></i> Projects</span>
                        <span class="mobile-accordion-icon-wrap">
                            <i class="fa-solid fa-chevron-down mobile-accordion-chevron"></i>
                        </span>
                    </button>
                    <div id="mobileProjectsSubmenu" class="mobile-nav-submenu" role="region" aria-labelledby="mobileProjectsTrigger">
                        <ul class="mobile-submenu-list">
                            <li>
                                <a href="{{ route('projects') }}#project-rrr-prekshitha-enclave" class="mobile-submenu-link">
                                    <span class="mobile-sub-bullet"></span>
                                    <div>
                                        <div class="mobile-sub-title">RRR Prekshitha Enclave</div>
                                        <div class="mobile-sub-desc">17-Acre Plotted Community, AIIMS Bibinagar</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('projects') }}#project-navagruha-commercial-gateway" class="mobile-submenu-link">
                                    <span class="mobile-sub-bullet"></span>
                                    <div>
                                        <div class="mobile-sub-title">Commercial Gateway</div>
                                        <div class="mobile-sub-desc">60 Ft Road Frontage, NH-163 Main Avenue</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('projects') }}#project-navagruha-rrr-meadows" class="mobile-submenu-link">
                                    <span class="mobile-sub-bullet"></span>
                                    <div>
                                        <div class="mobile-sub-title">RRR Meadows</div>
                                        <div class="mobile-sub-desc">Regional Ring Road Growth Corridor</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('projects') }}#project-prekshitha-phase-1" class="mobile-submenu-link">
                                    <span class="mobile-sub-bullet"></span>
                                    <div>
                                        <div class="mobile-sub-title">Prekshitha Enclave (Phase 1)</div>
                                        <div class="mobile-sub-desc">Completed &amp; Handed Over Residential Layout</div>
                                    </div>
                                </a>
                            </li>
                            <li class="pt-1">
                                <a href="{{ route('projects') }}" class="mobile-submenu-all-link">
                                    <span>View All Projects Portfolio &rarr;</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Plots Catalog -->
                <li class="mobile-nav-item">
                    <a href="{{ route('plots.index') }}" class="mobile-nav-link {{ request()->routeIs('plots.*') ? 'active' : '' }}">
                        <span class="mobile-nav-link-text"><i class="fa-solid fa-map me-2 text-brand-secondary fs-13"></i> Plots</span>
                        <span class="d-inline-flex align-items-center gap-2">
                            <span class="mobile-nav-pill-badge">Interactive Map</span>
                            <i class="fa-solid fa-chevron-right mobile-nav-arrow"></i>
                        </span>
                    </a>
                </li>

                <!-- Investor Corner -->
                <li class="mobile-nav-item">
                    <a href="{{ route('investor.corner') }}" class="mobile-nav-link {{ request()->routeIs('investor.corner', 'investors-guide') ? 'active' : '' }}">
                        <span class="mobile-nav-link-text"><i class="fa-solid fa-chart-line me-2 text-brand-secondary fs-13"></i> Investor Corner</span>
                        <i class="fa-solid fa-chevron-right mobile-nav-arrow"></i>
                    </a>
                </li>

                <!-- Amenities -->
                <li class="mobile-nav-item">
                    <a href="{{ route('amenities') }}" class="mobile-nav-link {{ request()->routeIs('amenities') ? 'active' : '' }}">
                        <span class="mobile-nav-link-text"><i class="fa-solid fa-tree me-2 text-brand-secondary fs-13"></i> Amenities</span>
                        <i class="fa-solid fa-chevron-right mobile-nav-arrow"></i>
                    </a>
                </li>

                <!-- Location -->
                <li class="mobile-nav-item">
                    <a href="{{ route('location') }}" class="mobile-nav-link {{ request()->routeIs('location') ? 'active' : '' }}">
                        <span class="mobile-nav-link-text"><i class="fa-solid fa-location-dot me-2 text-brand-secondary fs-13"></i> Location</span>
                        <i class="fa-solid fa-chevron-right mobile-nav-arrow"></i>
                    </a>
                </li>

                <!-- Contact Us -->
                <li class="mobile-nav-item">
                    <a href="{{ route('contact') }}" class="mobile-nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                        <span class="mobile-nav-link-text"><i class="fa-solid fa-envelope me-2 text-brand-secondary fs-13"></i> Contact Us</span>
                        <i class="fa-solid fa-chevron-right mobile-nav-arrow"></i>
                    </a>
                </li>

            </ul>
        </nav>

        <!-- Divider -->
        <div class="mobile-nav-divider"></div>

        <!-- Primary CTA: Schedule a Site Visit -->
        <div class="mobile-nav-primary-cta">
            <a href="{{ route('contact') }}" class="mobile-nav-cta-btn">
                <i class="fa-solid fa-calendar-check me-2"></i>
                <span>Schedule a Site Visit &rarr;</span>
            </a>
            <div class="mobile-nav-cta-subtext">Free cab pick-up from Uppal Metro &amp; Ghatkesar Exit 9</div>
        </div>

        <!-- Quick Lead Enquiry Area -->
        <div class="mobile-nav-quick-enquiry">
            <div class="mobile-quick-enquiry-header">
                <h4 class="mobile-quick-enquiry-title">Interested in this project?</h4>
                <p class="mobile-quick-enquiry-subtitle">Get plot availability, pricing, and project brochure.</p>
            </div>
            
            <form id="mobileDrawerEnquiryForm" class="mobile-drawer-form" novalidate>
                @csrf
                <input type="hidden" name="subject" value="Mobile Drawer Quick Enquiry">
                
                <div class="mobile-form-group mb-2">
                    <label for="drawerLeadName" class="visually-hidden">Your Full Name</label>
                    <div class="mobile-input-wrap">
                        <i class="fa-regular fa-user mobile-input-icon"></i>
                        <input type="text" id="drawerLeadName" name="name" class="mobile-form-control" placeholder="Your Full Name" required autocomplete="name">
                    </div>
                </div>

                <div class="mobile-form-group mb-2.5">
                    <label for="drawerLeadPhone" class="visually-hidden">Mobile Phone Number</label>
                    <div class="mobile-input-wrap">
                        <i class="fa-solid fa-phone mobile-input-icon"></i>
                        <input type="tel" id="drawerLeadPhone" name="phone" class="mobile-form-control" placeholder="Mobile Phone (10 digits)" required autocomplete="tel">
                    </div>
                </div>

                <button type="submit" id="drawerLeadSubmitBtn" class="mobile-lead-submit-btn">
                    <span class="submit-normal-text"><i class="fa-solid fa-paper-plane me-1.5"></i> Get Details</span>
                    <span class="submit-loading-text d-none"><i class="fa-solid fa-circle-notch fa-spin me-1.5"></i> Sending...</span>
                </button>

                <!-- Inline Feedback Status -->
                <div id="drawerLeadFeedback" class="mobile-lead-feedback d-none" role="alert"></div>
            </form>
        </div>

        <!-- Quick Contact Actions -->
        <div class="mobile-nav-contact-actions">
            <a href="https://wa.me/919617699699?text=Hi%20Navagruha%20Team%2C%20I%20am%20interested%20in%20RRR%20Prekshitha%20Enclave%20residential%20plots." target="_blank" rel="noopener" class="mobile-action-btn mobile-action-whatsapp" aria-label="Chat with Navagruha on WhatsApp">
                <i class="fa-brands fa-whatsapp"></i>
                <span>WhatsApp</span>
            </a>
            <a href="tel:+919617699699" class="mobile-action-btn mobile-action-call" aria-label="Call Navagruha sales desk">
                <i class="fa-solid fa-phone"></i>
                <span>Call Us</span>
            </a>
        </div>

        <!-- Drawer Footer Micro Text -->
        <div class="mobile-drawer-footer">
            <div class="mobile-drawer-hours">
                <i class="fa-regular fa-clock me-1 text-brand-secondary"></i> Mon - Sun: 9:00 AM - 6:30 PM
            </div>
            <div class="mobile-drawer-legal">
                HMDA Final Sanction, TSRERA Certified
            </div>
        </div>

    </div>

</aside>

<!-- Subtle Floating WhatsApp Button (Persistent across public pages) -->
<aside class="floating-whatsapp-widget" aria-label="Instant WhatsApp Assistance">
    <a href="https://wa.me/919617699699?text=Hi%20Navagruha%20Team%2C%20I%20am%20interested%20in%20RRR%20Prekshitha%20Enclave%20residential%20plots." target="_blank" rel="noopener" class="floating-whatsapp-btn" aria-label="Chat with us on WhatsApp">
        <span class="floating-whatsapp-pulse"></span>
        <i class="fa-brands fa-whatsapp floating-whatsapp-icon"></i>
        <span class="floating-whatsapp-label">Chat with Us</span>
    </a>
</aside>
