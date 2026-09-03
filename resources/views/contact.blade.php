@extends('layouts.app')

@section('title', 'Schedule a Free Site Visit & Contact Us — Navagruha Infra Developers | AIIMS Bibinagar')
@section('meta_description', 'Book a free guided site visit with complimentary AC cab pickup from Uppal Metro or Ghatkesar ORR to Navagruha 17-Acre Plotted Community at AIIMS Bibinagar.')

@section('content')

    <!-- Hero / Breadcrumb Banner -->
    <section class="section-dark text-light relative overflow-hidden py-5 border-bottom border-white-10" style="background: #142533;">
        <div class="container relative z-2">
            <div class="row g-4 justify-content-between align-items-center">
                <div class="col-md-8">
                    <div class="subtitle text-brand-secondary font-copperplate mb-2">
                        <i class="fa-solid fa-calendar-check me-1"></i> Guided Site Visits Available
                    </div>
                    <h1 class="fs-48 text-white font-copperplate lh-1-1 mb-2">
                        Schedule Your Guided Site Visit
                    </h1>
                    <p class="text-white-50 fs-16 mb-0">
                        Experience the 17-Acre master-planned plotted community in person. Submit your contact details below to schedule your visit.
                    </p>
                </div>
                <div class="col-md-4 text-md-end">
                    <ul class="crumb text-light font-copperplate fs-12 list-inline mb-0">
                        <li class="list-inline-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a> &nbsp;/</li>
                        <li class="list-inline-item active text-brand-secondary">Schedule Site Visit</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Contact & Schedule Booking Section -->
    <section class="bg-brand-dark text-light py-80">
        <div class="container">
            <div class="row g-5 justify-content-between">
                
                <!-- Left 7-Col: Interactive Schedule & Visit Form -->
                <div class="col-lg-7">
                    <div class="subtitle text-brand-secondary font-copperplate mb-1">Online Site Visit Booking</div>
                    <h2 class="fs-36 text-white font-copperplate mb-3">Reserve Your Free Venture Tour</h2>
                    <p class="text-white-50 mb-4 fs-15">
                        Submit your contact details below. Our venture relationship manager will reach out to confirm your visit.
                    </p>

                    @if(session('success'))
                        <div class="alert alert-success p-4 rounded-4 mb-4 bg-brand-primary border border-brand-secondary text-white shadow-lg">
                            <div class="d-flex align-items-start gap-3">
                                <i class="fa-solid fa-circle-check text-brand-secondary fs-28 mt-1"></i>
                                <div>
                                    <h4 class="text-brand-secondary mb-1 font-copperplate fs-20">
                                        Site Visit Scheduled Successfully!
                                    </h4>
                                    <p class="mb-2 fs-14 text-white">
                                        {{ session('success') }}
                                    </p>
                                    <div class="fs-12 text-white-50">
                                        Need immediate assistance? Call our sales desk directly at <a href="tel:+919617699699" class="text-white fw-bold text-decoration-none">+91 9617 699 699</a>.
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger p-3 rounded-3 mb-4 bg-danger bg-opacity-25 border border-danger text-white">
                            <ul class="mb-0 ps-3 fs-13">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" class="p-4 rounded-4 bg-brand-card border border-white-10">
                        @csrf
                        <div class="row g-3">
                            
                            <!-- 1. Name -->
                            <div class="col-md-6">
                                <label class="fs-12 text-white font-copperplate mb-1">Full Name *</label>
                                <input type="text" name="name" class="form-control" placeholder="e.g. Ramesh Kumar" required value="{{ old('name') }}">
                            </div>

                            <!-- 2. Phone -->
                            <div class="col-md-6">
                                <label class="fs-12 text-white font-copperplate mb-1">Mobile Phone Number *</label>
                                <input type="tel" name="phone" class="form-control" placeholder="e.g. 9876543210" required value="{{ old('phone') }}">
                            </div>

                            <!-- 3. Email -->
                            <div class="col-md-6">
                                <label class="fs-12 text-white-50 font-copperplate mb-1">Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="name@example.com" value="{{ old('email') }}">
                            </div>

                            <!-- 4. Preferred Visit Date (Optional) -->
                            <div class="col-md-6">
                                <label class="fs-12 text-white-50 font-copperplate mb-1">Preferred Visit Date (Optional)</label>
                                <input type="date" name="preferred_visit_date" class="form-control" min="{{ date('Y-m-d') }}" value="{{ old('preferred_visit_date') }}">
                            </div>

                            <!-- 8. Message / Notes -->
                            <div class="col-md-12">
                                <label class="fs-12 text-white-50 font-copperplate mb-1">Additional Requirements / Loan Queries</label>
                                <textarea name="message" class="form-control h-80px" placeholder="e.g. Travelling with family of 3. Would like to understand SBI bank loan options and inspect East-facing plots.">{{ old('message') }}</textarea>
                            </div>

                            <!-- 9. Submit Button -->
                            <div class="col-md-12 pt-2">
                                <button type="submit" class="btn-main w-100 py-3 font-copperplate fs-14">
                                    <span><i class="fa-regular fa-calendar-check me-2"></i> Confirm &amp; Schedule Free Site Visit &rarr;</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Right 5-Col: Project & Office Details -->
                <div class="col-lg-5">
                    <div class="p-4.5 rounded-4 bg-brand-card border border-white-10">
                        <h3 class="fs-22 text-white font-copperplate mb-4">Venture Tour Details</h3>

                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="rounded-circle bg-brand-secondary text-white p-3 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; flex-shrink: 0;">
                                <i class="fa-solid fa-location-dot fs-18"></i>
                            </div>
                            <div>
                                <h5 class="fs-16 font-copperplate text-white mb-1">Venture Location</h5>
                                <p class="text-white-50 fs-13 mb-0">
                                    {{ $ventureDetails['address'] ?? 'Near AIIMS 750-Bed Hospital, NH-163 Warangal Expressway, Bibinagar, Telangana 508126.' }}
                                </p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="rounded-circle bg-brand-secondary text-white p-3 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; flex-shrink: 0;">
                                 <i class="fa-solid fa-phone fs-18"></i>
                            </div>
                            <div>
                                <h5 class="fs-16 font-copperplate text-white mb-1">Direct Sales Desk</h5>
                                <p class="text-white-50 fs-13 mb-0">
                                    <a href="tel:+919617699699" class="text-white text-decoration-none fw-bold">+91 9617 699 699</a><br>
                                    <a href="mailto:info@navagruha.com" class="text-white text-decoration-none">info@navagruha.com</a> &bull; <a href="https://www.navagruha.com" target="_blank" class="text-white-50 text-decoration-none">www.navagruha.com</a>
                                </p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="rounded-circle bg-brand-secondary text-white p-3 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; flex-shrink: 0;">
                                <i class="fa-solid fa-certificate fs-18"></i>
                            </div>
                            <div>
                                <h5 class="fs-16 font-copperplate text-white mb-1">Approvals &amp; Title</h5>
                                <p class="text-white-50 fs-13 mb-0">
                                    HMDA Final Approved &bull; RERA Certified<br>
                                    <strong class="text-white">Clear Marketable Title &bull; Spot Registration</strong>
                                </p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start gap-3">
                            <div class="rounded-circle bg-brand-secondary text-white p-3 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; flex-shrink: 0;">
                                <i class="fa-regular fa-clock fs-18"></i>
                            </div>
                            <div>
                                <h5 class="fs-16 font-copperplate text-white mb-1">Site Visit Timing</h5>
                                <p class="text-white-50 fs-13 mb-0">
                                    {{ $ventureDetails['hours'] ?? 'Mon – Sun: 9:00 AM – 6:30 PM' }}
                                </p>
                            </div>
                        </div>

                        <hr class="border-white-10 my-4">

                        <a href="https://maps.app.goo.gl/jTyRs8yxpdLZE6pd7" target="_blank" class="btn btn-outline-light w-100 rounded-pill py-2.5 font-copperplate fs-12">
                            <i class="fa-solid fa-map-location-dot text-danger me-2"></i> Open Location in Google Maps &rarr;
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Google Maps Embed Section -->
    <section class="p-0">
        <div class="container-fluid p-0">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3805.8576404179354!2d78.7844005!3d17.4665427!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb76371dfa5b47%3A0x6b441fdfdf2d94cf!2sAIIMS%20Bibinagar!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin" width="100%" height="450" style="border:0; display: block;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

@endsection
