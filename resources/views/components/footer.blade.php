<footer class="site-footer">
    <div class="container pt-5 pb-4">
        
        <!-- Main 4-Column Footer Grid -->
        <div class="row g-4 justify-content-between mb-5">
            
            <!-- Col 1: Brand & Identity -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="pe-lg-3">
                    <a href="{{ route('home') }}" class="d-inline-block mb-3">
                        <img src="{{ asset('images/navagruha-logo-white.png') }}" alt="Navagruha Infra Developers" class="brand-footer-logo" onerror="this.onerror=null; this.src='{{ asset('images/navagruha-logo.png') }}';">
                    </a>
                    <div class="brand-tagline mb-4">REDEFINING REALITY</div>

                    <!-- Social Icons -->
                    <div class="d-flex align-items-center gap-2">
                        <a href="#" class="footer-social-btn" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="footer-social-btn" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="footer-social-btn" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
                        <a href="https://wa.me/919617699699" target="_blank" class="footer-social-btn" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>

            <!-- Col 2: Quick Links Navigation -->
            <div class="col-lg-2 col-md-6 col-6">
                <div class="footer-widget-title">Quick Links</div>
                <ul class="footer-link-list">
                    <li><a href="{{ route('home') }}"><i class="fa-solid fa-chevron-right"></i> Home</a></li>
                    <li><a href="{{ route('about') }}"><i class="fa-solid fa-chevron-right"></i> About Us</a></li>
                    <li><a href="{{ route('projects') }}"><i class="fa-solid fa-chevron-right"></i> Projects</a></li>
                    <li><a href="{{ route('plots.index') }}"><i class="fa-solid fa-chevron-right"></i> Plots Catalog</a></li>
                    <li><a href="{{ route('investor.corner') }}"><i class="fa-solid fa-chevron-right"></i> Investor Corner</a></li>
                    <li><a href="{{ route('amenities') }}"><i class="fa-solid fa-chevron-right"></i> Amenities</a></li>
                    <li><a href="{{ route('location') }}"><i class="fa-solid fa-chevron-right"></i> Location</a></li>
                    <li><a href="{{ route('contact') }}"><i class="fa-solid fa-chevron-right"></i> Contact Us</a></li>
                </ul>
            </div>

            <!-- Col 3: Legal Approvals & Certifications -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="footer-widget-title">Legal Approvals</div>
                <div class="d-flex align-items-center gap-2 mb-3 flex-wrap">
                    <div style="height: 38px; display: inline-flex; align-items: center; background: #ffffff; border: 1px solid rgba(255,255,255,0.8); border-radius: 6px; padding: 4px 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.25);">
                        <img src="{{ asset('images/HMDA_logo.jpg') }}" alt="HMDA Final Approval" style="height: 28px; width: auto; object-fit: contain;">
                    </div>
                    <div style="height: 38px; display: inline-flex; align-items: center; background: #ffffff; border: 1px solid rgba(255,255,255,0.8); border-radius: 6px; padding: 4px 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.25);">
                        <img src="{{ asset('images/rera_logo.png') }}" alt="TG RERA Registered" style="height: 28px; width: auto; object-fit: contain;">
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-1 mb-0">
                    <span class="footer-approval-badge"><i class="fa-solid fa-certificate text-brand-secondary"></i> HMDA Approved</span>
                    <span class="footer-approval-badge"><i class="fa-solid fa-shield-halved text-brand-secondary"></i> RERA Certified</span>
                </div>
            </div>

            <!-- Col 4: Corporate Office & Address -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="footer-widget-title">Corporate Office</div>
                
                <div class="footer-contact-item">
                    <div class="footer-contact-icon">
                        <i class="fa-solid fa-building"></i>
                    </div>
                    <div>
                        <strong class="text-white d-block font-copperplate fs-12">Office Address</strong>
                        Plot No. 109, Shashank Towers, 1st Floor, Uppal Bhagayath, Near Nagole Metro Station, Hyderabad, Telangana 500039.
                    </div>
                </div>

                <div class="footer-contact-item">
                    <div class="footer-contact-icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div>
                        <strong class="text-white d-block font-copperplate fs-12">Direct Inquiries</strong>
                        <a href="tel:+919617699699" class="text-white fw-bold text-decoration-none">+91 9617 699 699</a>
                    </div>
                </div>

                <div class="footer-contact-item">
                    <div class="footer-contact-icon">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div>
                        <strong class="text-white d-block font-copperplate fs-12">Email Support</strong>
                        <a href="mailto:info@navagruha.com" class="text-white-50 text-decoration-none">info@navagruha.com</a>
                    </div>
                </div>

                <div class="footer-contact-item mb-0">
                    <div class="footer-contact-icon">
                        <i class="fa-regular fa-clock"></i>
                    </div>
                    <div>
                        <strong class="text-white d-block font-copperplate fs-12">Site Visit Timings</strong>
                        Monday to Sunday: 9:00 AM to 6:30 PM
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- 3. Bottom Subfooter Bar -->
    <div class="subfooter-bar">
        <div class="container">
            <div class="row align-items-center g-2">
                <div class="col-md-6 text-center text-md-start font-copperplate">
                    &copy; {{ date('Y') }} NAVAGRUHA INFRA DEVELOPERS. All rights reserved.
                </div>
                <div class="col-md-6 text-center text-md-end text-white-50 fs-11">
                    HMDA Final Sanction, Telangana RERA Certified
                </div>
            </div>
        </div>
    </div>
</footer>
