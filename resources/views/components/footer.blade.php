<footer class="site-footer">
    <div class="container pt-5 pb-4">
        
        <!-- Main 4-Column Footer Grid -->
        <div class="row g-4 justify-content-between mb-5">
            
            <!-- Col 1: Brand & Identity & Approvals -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="pe-lg-2">
                    <a href="{{ route('home') }}" class="d-inline-block mb-3">
                        <img src="{{ asset('images/navagruha-logo-white.png') }}" alt="Navagruha Infra Developers" class="brand-footer-logo" onerror="this.onerror=null; this.src='{{ asset('images/navagruha-logo.png') }}';">
                    </a>
                    <div class="brand-tagline mb-3">REDEFINING REALITY</div>

                    <!-- Social Icons -->
                    <div class="d-flex align-items-center gap-2 flex-wrap mb-4">
                        <a href="https://www.facebook.com/profile.php?id=61576325499836" target="_blank" rel="noopener noreferrer" class="footer-social-btn facebook" aria-label="Facebook" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/navagruha_infra_developers/" target="_blank" rel="noopener noreferrer" class="footer-social-btn instagram" aria-label="Instagram" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://www.youtube.com/@Navagruha" target="_blank" rel="noopener noreferrer" class="footer-social-btn youtube" aria-label="YouTube" title="YouTube"><i class="fa-brands fa-youtube"></i></a>
                        <a href="https://www.linkedin.com/feed/" target="_blank" rel="noopener noreferrer" class="footer-social-btn linkedin" aria-label="LinkedIn" title="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="https://x.com/navagruha61767" target="_blank" rel="noopener noreferrer" class="footer-social-btn twitter" aria-label="Twitter / X" title="Twitter / X"><i class="fa-brands fa-x-twitter"></i></a>
                        <a href="https://wa.me/919617699699" target="_blank" rel="noopener noreferrer" class="footer-social-btn whatsapp" aria-label="WhatsApp" title="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>

                    <!-- Statutory Approvals Badges -->
                    <div class="footer-approvals-box pt-1">
                        <div class="text-white-50 fs-11 font-copperplate text-uppercase mb-2" style="letter-spacing: 0.05em;">Statutory Approvals</div>
                        <div class="d-flex align-items-center gap-2 mb-2 flex-wrap">
                            <div style="height: 36px; display: inline-flex; align-items: center; background: #ffffff; border: 1px solid rgba(255,255,255,0.8); border-radius: 6px; padding: 4px 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.25);">
                                <img src="{{ asset('images/HMDA_logo.jpg') }}" alt="HMDA Final Approval" style="height: 26px; width: auto; object-fit: contain;">
                            </div>
                            <div style="height: 36px; display: inline-flex; align-items: center; background: #ffffff; border: 1px solid rgba(255,255,255,0.8); border-radius: 6px; padding: 4px 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.25);">
                                <img src="{{ asset('images/rera_logo.png') }}" alt="TG RERA Registered" style="height: 26px; width: auto; object-fit: contain;">
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-1">
                            <span class="footer-approval-badge mb-1"><i class="fa-solid fa-certificate text-brand-secondary"></i> HMDA Approved</span>
                            <span class="footer-approval-badge mb-1"><i class="fa-solid fa-shield-halved text-brand-secondary"></i> RERA Certified</span>
                        </div>
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

            <!-- Col 3: Venture Location - RRR Prekshitha Enclave -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="footer-widget-title">Venture Location</div>
                
                <div class="footer-contact-item mb-3">
                    <div class="footer-contact-icon">
                        <i class="fa-solid fa-map-location-dot"></i>
                    </div>
                    <div>
                        <strong class="text-white d-block font-copperplate fs-12 mb-1">RRR Prekshitha Enclave</strong>
                        <span class="text-white-50 fs-12 lh-base d-block mb-2">
                            Near AIIMS Bibinagar, NH-163 Warangal Highway, Bibinagar, Yadadri Bhuvanagiri Dist, Telangana 508126.
                        </span>
                        <a href="https://maps.app.goo.gl/jTyRs8yxpdLZE6pd7" target="_blank" rel="noopener noreferrer" class="footer-map-btn">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>Open in Google Maps</span>
                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        </a>
                    </div>
                </div>

                <div class="footer-contact-item mb-0">
                    <div class="footer-contact-icon">
                        <i class="fa-regular fa-clock"></i>
                    </div>
                    <div>
                        <strong class="text-white d-block font-copperplate fs-12 mb-0.5">Site Visit Timings</strong>
                        <span class="text-white-50 fs-12">Monday to Sunday: 9:00 AM to 6:30 PM</span>
                    </div>
                </div>
            </div>

            <!-- Col 4: Corporate Office & Address -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="footer-widget-title">Corporate Office</div>
                
                <div class="footer-contact-item mb-3">
                    <div class="footer-contact-icon">
                        <i class="fa-solid fa-building"></i>
                    </div>
                    <div>
                        <strong class="text-white d-block font-copperplate fs-12 mb-1">Corporate Headquarters</strong>
                        <span class="text-white-50 fs-12 lh-base d-block mb-2">
                            Plot No. 109, Shashank Towers, 1st Floor, Uppal Bhagayath, Near Nagole Metro Station, Hyderabad, Telangana 500039.
                        </span>
                        <a href="https://maps.app.goo.gl/nzWu5MLr211ptnJ46" target="_blank" rel="noopener noreferrer" class="footer-map-btn">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>Open in Google Maps</span>
                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        </a>
                    </div>
                </div>

                <div class="footer-contact-item mb-2">
                    <div class="footer-contact-icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div>
                        <strong class="text-white d-block font-copperplate fs-12 mb-0.5">Direct Inquiries</strong>
                        <a href="tel:+919617699699" class="text-white fw-bold text-decoration-none fs-13">+91 9617 699 699</a>
                    </div>
                </div>

                <div class="footer-contact-item mb-0">
                    <div class="footer-contact-icon">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div>
                        <strong class="text-white d-block font-copperplate fs-12 mb-0.5">Email Support</strong>
                        <a href="mailto:info@navagruha.com" class="text-white-50 text-decoration-none fs-12">info@navagruha.com</a>
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
