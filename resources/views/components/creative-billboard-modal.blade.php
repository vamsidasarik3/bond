<!-- Creative Billboard Full-Screen Lightbox Modal -->
<div id="creativeBillboardModal" class="creative-modal" onclick="closeCreativeModal(event)" role="dialog" aria-modal="true" aria-hidden="true" style="display: none;">
    <div class="creative-modal-content" onclick="event.stopPropagation()">
        
        <!-- Modal Header -->
        <div class="creative-modal-header">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-brand-primary text-brand-secondary font-copperplate fs-10 px-2.5 py-1 border border-brand-primary border-opacity-30 rounded-pill">
                        <i class="fa-solid fa-bullhorn me-1"></i> HIGHWAY OUTDOOR CAMPAIGN
                    </span>
                    <span class="text-white-50 fs-11 font-copperplate">NH-163 CORRIDOR</span>
                </div>
                <div id="creativeBillboardModalTitle" class="text-white font-copperplate fs-18 mb-0">
                    AIIMS Bibinagar - 5 Minutes Away
                </div>
                <div id="creativeBillboardModalSubtitle" class="text-white-50 fs-12 mt-0.5">
                    Official corridor marketing hoarding for RRR Prekshitha Enclave
                </div>
            </div>
            <button class="creative-modal-close" onclick="closeCreativeModal(event)" aria-label="Close billboard preview">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <!-- Modal Body (Image Container) -->
        <div class="creative-modal-body position-relative">
            <img id="creativeBillboardModalImg" src="" alt="Campaign Billboard Creative" class="creative-modal-img shadow-lg">
        </div>

        <!-- Modal Footer with Quick Actions -->
        <div class="p-3 bg-brand-card border-top border-white-10 d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div class="d-flex align-items-center gap-2 text-white-50 fs-12">
                <i class="fa-solid fa-shield-halved text-brand-secondary"></i>
                <span class="d-none d-sm-inline">HMDA Approved (LP No: 000085/LO/Plg/HMDA/2024) &bull; TG RERA: P02200008537</span>
                <span class="d-sm-none">HMDA &amp; TG RERA Approved</span>
            </div>
            <div class="d-flex align-items-center gap-2">
                <a id="creativeBillboardDirectLink" href="#" target="_blank" class="btn btn-sm btn-outline-light font-copperplate fs-11 px-3 py-1.5 rounded-pill">
                    <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Open Full HD
                </a>
                <a href="{{ route('plots.index') }}" class="btn-main fs-11 py-1.5 px-3 rounded-pill text-decoration-none">
                    <span>View Available Plots &rarr;</span>
                </a>
            </div>
        </div>

    </div>
</div>

<script>
    function openCreativeModal(imgSrc, title, subtitle) {
        const modal = document.getElementById('creativeBillboardModal');
        const img = document.getElementById('creativeBillboardModalImg');
        const titleEl = document.getElementById('creativeBillboardModalTitle');
        const subEl = document.getElementById('creativeBillboardModalSubtitle');
        const link = document.getElementById('creativeBillboardDirectLink');

        if (!modal || !img) return;

        img.src = imgSrc;
        if (titleEl) titleEl.textContent = title || 'Campaign Billboard';
        if (subEl) subEl.textContent = subtitle || 'Official highway corridor marketing campaign';
        if (link) link.href = imgSrc;

        modal.style.display = 'flex';
        // Force reflow for CSS transition
        void modal.offsetWidth;
        modal.classList.add('active');
        modal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    }

    function closeCreativeModal(e) {
        if (e && e.stopPropagation) e.stopPropagation();
        const modal = document.getElementById('creativeBillboardModal');
        if (!modal) return;

        modal.classList.remove('active');
        modal.setAttribute('aria-hidden', 'true');
        setTimeout(() => {
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }, 300);
    }

    // Escape key listener
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            const modal = document.getElementById('creativeBillboardModal');
            if (modal && modal.classList.contains('active')) {
                closeCreativeModal(event);
            }
        }
    });
</script>
