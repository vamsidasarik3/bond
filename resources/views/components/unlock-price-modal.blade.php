<!-- Global Unlock Price Lead Capture Modal -->
<div class="modal fade" id="unlockPriceModal" tabindex="-1" aria-labelledby="unlockPriceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-brand-card border border-white-10 text-light rounded-4 shadow-2xl overflow-hidden" style="background: #142533;">
            
            <!-- Modal Header -->
            <div class="modal-header border-bottom border-white-10 px-4 pt-4 pb-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle bg-brand-primary d-flex align-items-center justify-content-center text-brand-secondary flex-shrink-0" style="width: 48px; height: 48px; border: 1.5px solid rgba(113, 182, 68, 0.4);">
                        <i class="fa-solid fa-lock fs-20"></i>
                    </div>
                    <div>
                        <span class="status-available fs-10 mb-1">
                            DIRECT DEVELOPER PRICE
                        </span>
                        <h3 class="modal-title fs-18 font-copperplate text-white mb-0" id="unlockPriceModalLabel">
                            Unlock Plot Price
                        </h3>
                        <p class="text-white-50 fs-12 mb-0" id="unlockModalPlotMeta">
                            Selected: <span class="text-brand-secondary fw-bold" id="unlockModalPlotName">Plot Inventory</span>
                        </p>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body Form -->
            <div class="modal-body px-4 py-3">
                <form id="unlockPriceForm" onsubmit="handlePriceUnlockSubmit(event)">
                    @csrf
                    <input type="hidden" name="plot_id" id="unlockModalPlotId" value="101">

                    <div id="unlockModalAlert" class="alert alert-danger d-none py-2 px-3 fs-13" role="alert"></div>

                    <!-- Lead Fields -->
                    <div class="mb-3">
                        <label class="fs-12 text-white-50 font-copperplate mb-1">Your Full Name <span class="text-brand-secondary">*</span></label>
                        <input type="text" name="name" id="unlockName" class="form-control" placeholder="e.g. Ramesh Reddy" required>
                    </div>

                    <div class="mb-3">
                        <label class="fs-12 text-white-50 font-copperplate mb-1">Mobile Phone Number <span class="text-brand-secondary">*</span></label>
                        <input type="tel" name="phone" id="unlockPhone" class="form-control" placeholder="10-digit mobile number" pattern="[0-9]{10,15}" required>
                    </div>

                    <div class="mb-3">
                        <label class="fs-12 text-white-50 font-copperplate mb-1">Email Address <span class="text-brand-secondary">*</span></label>
                        <input type="email" name="email" id="unlockEmail" class="form-control" placeholder="name@example.com" required>
                    </div>

                    <div class="mb-3">
                        <label class="fs-12 text-white-50 font-copperplate mb-1">Preferred Site Visit Date (Optional)</label>
                        <input type="date" name="preferred_visit_date" id="unlockDate" class="form-control" min="{{ date('Y-m-d') }}">
                    </div>

                    <div class="p-3 rounded-3 bg-dark bg-opacity-50 border border-white-10 mb-3">
                        <div class="d-flex align-items-center gap-2 text-white-50 fs-12">
                            <i class="fa-solid fa-shield-halved text-brand-secondary fs-16"></i>
                            <span>100% Privacy Protected, Direct Developer Sales Desk</span>
                        </div>
                    </div>

                    <button type="submit" id="unlockSubmitBtn" class="btn-secondary-brand w-100 py-3 font-copperplate">
                        <span id="unlockBtnText"><i class="fa-solid fa-lock-open me-1"></i> Unlock Price Now &rarr;</span>
                        <span id="unlockBtnSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                    </button>
                </form>

                <!-- Success State Box -->
                <div id="unlockSuccessState" class="d-none text-center py-4">
                    <div class="rounded-circle bg-brand-primary text-brand-secondary p-3 d-inline-flex align-items-center justify-content-center mb-3" style="width: 64px; height: 64px; border: 2px solid #71b644;">
                        <i class="fa-solid fa-check fs-28"></i>
                    </div>
                    <h4 class="text-white font-copperplate fs-20 mb-1">Price Successfully Unlocked!</h4>
                    <p class="text-white-50 fs-13 mb-3" id="unlockSuccessPlotName">Plot Details</p>

                    <div class="p-4 rounded-4 bg-dark bg-opacity-75 border border-white-10 mb-4">
                        <div class="text-white-50 fs-11 font-copperplate text-uppercase" style="letter-spacing: 0.05em;">Direct Developer Total Price</div>
                        <div class="fs-36 fw-800 text-brand-secondary font-copperplate mt-1" id="unlockRevealedPrice"></div>
                        
                        {{-- Per Square Yard Price --}}
                        <div class="d-inline-flex align-items-center gap-1.5 px-3 py-1.5 rounded-pill bg-brand-primary bg-opacity-25 border border-brand-primary border-opacity-30 mt-2">
                            <i class="fa-solid fa-tag text-brand-secondary fs-12"></i>
                            <span class="fs-14 fw-bold text-white font-copperplate" id="unlockRevealedPerSqYd"></span>
                        </div>

                        {{-- Exact Total Price (No onSpot amount) --}}
                        <div class="text-white-50 fs-12 mt-2" id="unlockRevealedExact"></div>
                    </div>

                    <div class="d-flex gap-2 justify-content-center">
                        <button type="button" class="btn-main py-2 px-4 fs-13" data-bs-dismiss="modal">
                            <span>Continue Browsing</span>
                        </button>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<script>
    function openUnlockPriceModal(plotId = '101', plotName = 'Plot Inventory') {
        document.getElementById('unlockModalPlotId').value = plotId;
        document.getElementById('unlockModalPlotName').textContent = plotName;
        
        // Reset form state
        document.getElementById('unlockPriceForm').classList.remove('d-none');
        document.getElementById('unlockSuccessState').classList.add('d-none');
        document.getElementById('unlockModalAlert').classList.add('d-none');
        
        const modalEl = document.getElementById('unlockPriceModal');
        if (typeof bootstrap !== 'undefined') {
            const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.show();
        }
    }

    async function handlePriceUnlockSubmit(event) {
        event.preventDefault();
        const form = event.target;
        const alertBox = document.getElementById('unlockModalAlert');
        const submitBtn = document.getElementById('unlockSubmitBtn');
        const btnText = document.getElementById('unlockBtnText');
        const btnSpinner = document.getElementById('unlockBtnSpinner');

        alertBox.classList.add('d-none');
        submitBtn.disabled = true;
        btnText.classList.add('d-none');
        btnSpinner.classList.remove('d-none');

        const formData = new FormData(form);

        try {
            const response = await fetch('{{ route('plots.unlock-price') }}', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                },
                body: formData,
            });

            const data = await response.json();

            if (response.ok && data.success) {
                // Show success in modal
                document.getElementById('unlockPriceForm').classList.add('d-none');
                document.getElementById('unlockSuccessState').classList.remove('d-none');
                document.getElementById('unlockSuccessPlotName').textContent = data.plot_number || 'Plot Details';
                document.getElementById('unlockRevealedPrice').textContent = data.price;
                
                const perSqYdText = data.price_per_sq_yard_formatted || ('₹ ' + Number(data.price_per_sq_yard || 14999).toLocaleString('en-IN') + ' / Sq. Yard');
                const revealedPerSqYd = document.getElementById('unlockRevealedPerSqYd');
                if (revealedPerSqYd) revealedPerSqYd.textContent = perSqYdText;
                const revealedExact = document.getElementById('unlockRevealedExact');
                if (revealedExact) revealedExact.textContent = data.exact_price ? ('Exact Total: ' + data.exact_price) : '';

                // Update any plot cards on the current page dynamically
                if (data.all_plots) {
                    data.all_plots.forEach(p => {
                        const rateStr = p.price_per_sq_yard_formatted || ('₹ ' + Number(p.price_per_sq_yard || 14999).toLocaleString('en-IN') + ' / Sq. Yard');
                        const priceContainer = document.getElementById('plot-price-container-' + p.id);
                        if (priceContainer) {
                            priceContainer.innerHTML = `
                                <div class="plot-price-label">Calculated Total Price</div>
                                <div class="plot-price-amount text-brand-secondary">${p.price}</div>
                                <div class="plot-price-unit text-brand-secondary font-copperplate fw-bold"><i class="fa-solid fa-tag me-1"></i> ${rateStr}</div>
                                ${p.exact_price ? `<div class="fs-11 text-white-50 mt-0.5">Exact Total: ${p.exact_price}</div>` : ''}
                            `;
                        }

                        // Also update dataset attributes on plot board tile & list table row so clicking them in drawer shows unlocked prices!
                        const tileEl = document.querySelector('.plot-tile[data-id="' + p.id + '"]');
                        if (tileEl) {
                            tileEl.dataset.price = p.price;
                            tileEl.dataset.exact = p.exact_price;
                            tileEl.dataset.perSqYd = rateStr;
                        }
                        const rowEl = document.querySelector('tr[data-id="' + p.id + '"]');
                        if (rowEl) {
                            rowEl.dataset.price = p.price;
                            rowEl.dataset.exact = p.exact_price;
                            rowEl.dataset.perSqYd = rateStr;
                        }
                    });
                }

                // If on plot show page, update sticky sidebar price
                const sidebarPriceEl = document.getElementById('sidebarPlotPrice');
                const sidebarPerSqYdEl = document.getElementById('sidebarPlotPerSqYd');
                const sidebarExactEl = document.getElementById('sidebarPlotExact');
                const sidebarLockedBox = document.getElementById('sidebarPriceLockedBox');
                const sidebarUnlockedBox = document.getElementById('sidebarPriceUnlockedBox');
                if (sidebarPriceEl && data.price) {
                    sidebarPriceEl.textContent = data.price;
                    if (sidebarPerSqYdEl) sidebarPerSqYdEl.textContent = perSqYdText;
                    if (sidebarExactEl && data.exact_price) sidebarExactEl.textContent = data.exact_price;
                    if (sidebarLockedBox) sidebarLockedBox.classList.add('d-none');
                    if (sidebarUnlockedBox) sidebarUnlockedBox.classList.remove('d-none');
                }

                // If on /plots with drawer open, update drawer price block
                const drawerPriceSection = document.getElementById('drawerPriceSection');
                if (drawerPriceSection) {
                    drawerPriceSection.innerHTML = `
                        <div class="p-3 rounded-3 text-center" style="background:rgba(113,182,68,.08);border:1px solid rgba(113,182,68,.25);">
                            <div class="font-copperplate fs-10 text-white-50 text-uppercase mb-1" style="letter-spacing:.05em;">Total Price</div>
                            <div class="fs-24 fw-800 font-copperplate" style="color:#71b644;" id="drawerPrice">${data.price}</div>
                            <div class="fs-13 fw-bold font-copperplate mt-1 text-brand-secondary" id="drawerPerSqYd">${perSqYdText}</div>
                            <div class="fs-12 text-white-50 mt-1" id="drawerExactPrice">${data.exact_price ? ('Exact Total: ' + data.exact_price) : ''}</div>
                        </div>
                    `;
                }

            } else {
                let errorMsg = data.message || 'Please verify your information and try again.';
                if (data.errors) {
                    errorMsg = Object.values(data.errors).flat().join('<br>');
                }
                alertBox.innerHTML = errorMsg;
                alertBox.classList.remove('d-none');
            }
        } catch (err) {
            alertBox.textContent = 'Connection error. Please check your network and try again.';
            alertBox.classList.remove('d-none');
        } finally {
            submitBtn.disabled = false;
            btnText.classList.remove('d-none');
            btnSpinner.classList.add('d-none');
        }
    }
</script>
