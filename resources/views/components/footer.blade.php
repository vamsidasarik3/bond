<footer class="site-footer">
    <div class="container pt-5 pb-4">
        
        <!-- Main 4-Column Footer Grid -->
        <div class="row g-4 justify-content-between mb-5">
            
            <!-- Col 1: Brand & Identity -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="pe-lg-3">
                    <a href="{{ route('home') }}" class="d-inline-block mb-3">
                        <img src="{{ asset('images/navagruha-logo-white.png') }}" alt="Navagruha Infra Developers" style="height: 48px; width: auto;" onerror="this.onerror=null; this.src='{{ asset('images/navagruha-logo.png') }}';">
                    </a>
                    <div class="brand-tagline mb-3">REDEFINING REALITY</div>
                    <p class="text-white-50 fs-13 mb-4 leading-relaxed">
                        Navagruha Infra Developers is committed to delivering landmark residential plotted communities engineered with world-class concrete infrastructure, clear legal titles, and maximum capital growth.
                    </p>

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
                    <li><a href="{{ route('projects') }}"><i class="fa-solid fa-chevron-right"></i> Projects</a></li>
                    <li><a href="{{ route('investors-guide') }}"><i class="fa-solid fa-chevron-right"></i> Investors Guide</a></li>
                    <li><a href="{{ route('plots.index') }}"><i class="fa-solid fa-chevron-right"></i> Plots Catalog</a></li>
                    <li><a href="{{ route('amenities') }}"><i class="fa-solid fa-chevron-right"></i> Amenities</a></li>
                    <li><a href="{{ route('location') }}"><i class="fa-solid fa-chevron-right"></i> Location</a></li>
                    <li><a href="{{ route('contact') }}"><i class="fa-solid fa-chevron-right"></i> Contact Us</a></li>
                </ul>
            </div>

            <!-- Col 3: Legal Approvals & Official Documents -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="footer-widget-title">Legal Approvals &amp; Docs</div>
                <div class="d-flex flex-wrap gap-1 mb-3">
                    <span class="footer-approval-badge"><i class="fa-solid fa-certificate text-brand-secondary"></i> HMDA Approved</span>
                    <span class="footer-approval-badge"><i class="fa-solid fa-shield-halved text-brand-secondary"></i> RERA Certified</span>
                    <span class="footer-approval-badge"><i class="fa-solid fa-compass text-brand-secondary"></i> 100% Vaastu</span>
                    <span class="footer-approval-badge"><i class="fa-solid fa-file-shield text-brand-secondary"></i> Spot Registration</span>
                </div>

                {{-- Direct Official PDF Download Links --}}
                <div class="d-flex flex-column gap-2">
                    <a href="{{ asset('venture/docs/HMDA FINAL APPROVAL PHASE2.pdf') }}" target="_blank" rel="noopener"
                       class="d-flex align-items-center justify-content-between p-2 rounded-2 bg-dark bg-opacity-50 border border-white-10 text-decoration-none text-white-50"
                       style="transition: all 0.2s ease;">
                        <div class="d-flex align-items-center gap-2">
                            <i class="fa-solid fa-file-pdf text-danger fs-14"></i>
                            <div>
                                <div class="fs-11 text-white font-copperplate fw-bold lh-1">HMDA Final Approval</div>
                                <div class="fs-10 text-white-50">Phase 2 Sanction PDF &bull; LP No. 000085</div>
                            </div>
                        </div>
                        <i class="fa-solid fa-arrow-up-right-from-square fs-10 text-brand-secondary"></i>
                    </a>

                    <a href="{{ asset('venture/docs/RERA APPROVAL PHASE1.pdf') }}" target="_blank" rel="noopener"
                       class="d-flex align-items-center justify-content-between p-2 rounded-2 bg-dark bg-opacity-50 border border-white-10 text-decoration-none text-white-50"
                       style="transition: all 0.2s ease;">
                        <div class="d-flex align-items-center gap-2">
                            <i class="fa-solid fa-file-pdf text-danger fs-14"></i>
                            <div>
                                <div class="fs-11 text-white font-copperplate fw-bold lh-1">TSRERA Registration</div>
                                <div class="fs-10 text-white-50">Phase 1 Approved &bull; Reg. P02000007812</div>
                            </div>
                        </div>
                        <i class="fa-solid fa-arrow-up-right-from-square fs-10 text-brand-secondary"></i>
                    </a>

                    <a href="{{ asset('venture/docs/RRR PREKSHITHA ENCLAVE BROCHURE.pdf') }}" target="_blank" rel="noopener"
                       class="d-flex align-items-center justify-content-between p-2 rounded-2 bg-dark bg-opacity-50 border border-white-10 text-decoration-none text-white-50"
                       style="transition: all 0.2s ease;">
                        <div class="d-flex align-items-center gap-2">
                            <i class="fa-solid fa-file-pdf text-danger fs-14"></i>
                            <div>
                                <div class="fs-11 text-white font-copperplate fw-bold lh-1">Official Brochure</div>
                                <div class="fs-10 text-white-50">Master Layout &amp; Project Guide</div>
                            </div>
                        </div>
                        <i class="fa-solid fa-download fs-10 text-brand-secondary"></i>
                    </a>
                </div>
            </div>

            <!-- Col 4: Sales Desk & Address -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="footer-widget-title">Sales Desk</div>
                
                <div class="footer-contact-item">
                    <div class="footer-contact-icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div>
                        <strong class="text-white d-block font-copperplate fs-12">Venture Address</strong>
                        Near AIIMS 750-Bed Hospital, NH-163 Warangal Expressway, Bibinagar, Telangana 508126.
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
                        Mon – Sun: 9:00 AM – 6:30 PM
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
                    HMDA Final Sanction &bull; Telangana RERA &bull; Redefining Reality
                </div>
            </div>
        </div>
    </div>
</footer>
