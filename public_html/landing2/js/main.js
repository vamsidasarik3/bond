/**
 * NAVAGRUHA RRR PREKSHITHA ENCLAVE - DARK EDITORIAL LANDING PAGE SCRIPT
 * Matches staging.vkrishna.in design and functionality
 */

document.addEventListener('DOMContentLoaded', () => {
  'use strict';

  // --- 1. HEADER & READING PROGRESS LINE ---
  const header = document.getElementById('siteHeader');
  const readingProgress = document.getElementById('readingProgress');

  function onScroll() {
    const y = window.scrollY || window.pageYOffset;
    const docHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;

    if (y > 45) {
      header?.classList.add('scrolled');
    } else {
      header?.classList.remove('scrolled');
    }

    if (readingProgress && docHeight > 0) {
      const pct = Math.min(100, Math.max(0, (y / docHeight) * 100));
      readingProgress.style.width = pct + '%';
    }
  }

  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  // --- 2. SUBTLE SCROLL REVEALS ---
  const reveals = document.querySelectorAll('.reveal');

  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries, obs) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          obs.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.12,
      rootMargin: '0px 0px -40px 0px'
    });

    reveals.forEach(r => observer.observe(r));
  } else {
    reveals.forEach(r => r.classList.add('is-visible'));
  }

  // --- 3. MOBILE MENU ---
  const menuToggle = document.getElementById('menuToggle');
  const mobileNav = document.getElementById('mobileNav');
  const mobileLinks = document.querySelectorAll('.mobile-link');

  function toggleNav() {
    const isOpen = mobileNav?.classList.toggle('is-open');
    menuToggle?.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    document.body.style.overflow = isOpen ? 'hidden' : '';
  }

  function closeNav() {
    mobileNav?.classList.remove('is-open');
    menuToggle?.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
  }

  menuToggle?.addEventListener('click', toggleNav);
  mobileLinks.forEach(link => link.addEventListener('click', closeNav));

  document.addEventListener('click', (e) => {
    if (mobileNav?.classList.contains('is-open')) {
      if (!mobileNav.contains(e.target) && !menuToggle.contains(e.target)) {
        closeNav();
      }
    }
  });

  // --- 4. MASTER LAYOUT FULLSCREEN LIGHTBOX ---
  const viewFullLayoutBtn = document.getElementById('viewFullLayoutBtn');
  const layoutModal = document.getElementById('layoutModal');
  const closeModalBtn = document.getElementById('closeModalBtn');
  const zoomInBtn = document.getElementById('zoomInBtn');
  const zoomOutBtn = document.getElementById('zoomOutBtn');
  const zoomResetBtn = document.getElementById('zoomResetBtn');
  const modalCanvas = document.getElementById('modalCanvas');
  const modalStage = document.getElementById('modalStage');

  let scale = 1.0;
  let offsetX = 0;
  let offsetY = 0;
  let dragging = false;
  let mouseStartX = 0;
  let mouseStartY = 0;

  function renderTransform() {
    if (modalCanvas) {
      modalCanvas.style.transform = `translate(${offsetX}px, ${offsetY}px) scale(${scale})`;
    }
  }

  function openViewer() {
    if (layoutModal) {
      layoutModal.classList.add('is-active');
      document.body.style.overflow = 'hidden';
      resetViewer();
    }
  }

  function closeViewer() {
    if (layoutModal) {
      layoutModal.classList.remove('is-active');
      document.body.style.overflow = '';
      resetViewer();
    }
  }

  function zoomIn() {
    if (scale < 3.0) {
      scale = Math.min(3.0, scale + 0.3);
      renderTransform();
    }
  }

  function zoomOut() {
    if (scale > 0.6) {
      scale = Math.max(0.6, scale - 0.3);
      renderTransform();
    }
  }

  function resetViewer() {
    scale = 1.0;
    offsetX = 0;
    offsetY = 0;
    renderTransform();
  }

  const masterLayoutImg = document.getElementById('masterLayoutImg');

  viewFullLayoutBtn?.addEventListener('click', openViewer);
  masterLayoutImg?.addEventListener('click', openViewer);
  closeModalBtn?.addEventListener('click', closeViewer);
  zoomInBtn?.addEventListener('click', zoomIn);
  zoomOutBtn?.addEventListener('click', zoomOut);
  zoomResetBtn?.addEventListener('click', resetViewer);
  layoutModal?.addEventListener('click', (e) => {
    if (e.target === layoutModal) {
      closeViewer();
    }
  });

  // Esc key listener (handles layout viewer & enquiry modal)
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      const enquiryModalWrapper = document.getElementById('enquiryModalWrapper');
      if (enquiryModalWrapper?.classList.contains('is-open')) {
        if (typeof window.closeLanding2EnquiryModal === 'function') {
          window.closeLanding2EnquiryModal(true);
        }
      } else if (layoutModal?.classList.contains('is-active')) {
        closeViewer();
      }
    }
  });

  // Mouse pan/drag
  modalStage?.addEventListener('mousedown', (e) => {
    if (e.target.closest('.tool-btn') || e.target.closest('.modal-close')) return;
    dragging = true;
    mouseStartX = e.clientX - offsetX;
    mouseStartY = e.clientY - offsetY;
  });

  window.addEventListener('mousemove', (e) => {
    if (!dragging) return;
    offsetX = e.clientX - mouseStartX;
    offsetY = e.clientY - mouseStartY;
    renderTransform();
  });

  window.addEventListener('mouseup', () => {
    dragging = false;
  });

  // Touch pan/drag
  modalStage?.addEventListener('touchstart', (e) => {
    if (e.touches.length === 1) {
      dragging = true;
      mouseStartX = e.touches[0].clientX - offsetX;
      mouseStartY = e.touches[0].clientY - offsetY;
    }
  }, { passive: true });

  modalStage?.addEventListener('touchmove', (e) => {
    if (dragging && e.touches.length === 1) {
      offsetX = e.touches[0].clientX - mouseStartX;
      offsetY = e.touches[0].clientY - mouseStartY;
      renderTransform();
    }
  }, { passive: true });

  modalStage?.addEventListener('touchend', () => {
    dragging = false;
  });

  // --- 4B. LAYOUT CAROUSEL & LIVE PLOT INVENTORY STATS ---
  let currentLayoutSlide = 0;
  const layoutSlideEls = [document.getElementById('layoutSlide1'), document.getElementById('layoutSlide2')];
  const layoutTabEls = [document.getElementById('tabSlide1'), document.getElementById('tabSlide2')];
  const layoutDotEls = [document.getElementById('dotSlide1'), document.getElementById('dotSlide2')];

  window.switchLayoutSlide = function(index) {
    if (index < 0 || index >= 2) return;
    currentLayoutSlide = index;

    layoutSlideEls.forEach((slide, idx) => {
      if (slide) {
        if (idx === index) {
          slide.classList.add('is-active');
        } else {
          slide.classList.remove('is-active');
        }
      }
    });

    layoutTabEls.forEach((tab, idx) => {
      if (tab) {
        if (idx === index) {
          tab.classList.add('is-active');
        } else {
          tab.classList.remove('is-active');
        }
      }
    });

    layoutDotEls.forEach((dot, idx) => {
      if (dot) {
        if (idx === index) {
          dot.classList.add('is-active');
        } else {
          dot.classList.remove('is-active');
        }
      }
    });
  };

  window.stepLayoutSlide = function(step) {
    let nextIndex = currentLayoutSlide + step;
    if (nextIndex < 0) nextIndex = 1;
    if (nextIndex > 1) nextIndex = 0;
    window.switchLayoutSlide(nextIndex);
  };

  // Keyboard navigation when user is over layout section
  const layoutSection = document.getElementById('layout');
  if (layoutSection) {
    layoutSection.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowLeft') window.stepLayoutSlide(-1);
      if (e.key === 'ArrowRight') window.stepLayoutSlide(1);
    });
  }

  // Live plot availability inventory statistics updater
  async function loadLivePlotStatistics() {
    try {
      const res = await fetch('/api/plots', {
        headers: { 'Accept': 'application/json' }
      });
      if (!res.ok) return;
      const data = await res.json();
      const plots = Array.isArray(data) ? data : (data.data || []);
      if (!plots.length) return;

      let available = 0;
      let reserved = 0;
      let sold = 0;

      plots.forEach(p => {
        const s = (p.status || '').toLowerCase();
        if (s === 'available') available++;
        else if (s === 'reserved' || s === 'hold') reserved++;
        else if (s === 'sold' || s === 'registered' || s === 'booked') sold++;
      });

      const total = plots.length;
      const combined = available + reserved;

      if (combined > 0 || sold > 0) {
        const availEl = document.getElementById('statAvailableCombined');
        const soldEl = document.getElementById('statSoldTotal');
        const grandEl = document.getElementById('statGrandTotal');
        const progressAvailText = document.getElementById('progressAvailText');
        const progressSoldText = document.getElementById('progressSoldText');
        const progressFillAvail = document.getElementById('progressFillAvail');
        const progressFillSold = document.getElementById('progressFillSold');

        if (availEl) availEl.textContent = combined;
        if (soldEl) soldEl.textContent = sold;
        if (grandEl) grandEl.textContent = total;

        const availPct = Math.round((combined / total) * 100);
        const soldPct = 100 - availPct;

        if (progressAvailText) progressAvailText.textContent = combined;
        if (progressSoldText) progressSoldText.textContent = sold;
        if (progressFillAvail) progressFillAvail.style.width = availPct + '%';
        if (progressFillSold) progressFillSold.style.width = soldPct + '%';
      }
    } catch (e) {
      console.warn('Live plots stats fallback to default HTML values:', e);
    }
  }

  loadLivePlotStatistics();

  // --- 5. VISIT FORM VALIDATION & REAL API LEAD SUBMISSION ---
  const siteVisitForm = document.getElementById('siteVisitForm');
  const visitorName = document.getElementById('visitorName');
  const visitorEmail = document.getElementById('visitorEmail');
  const visitorPhone = document.getElementById('visitorPhone');
  const visitorDate = document.getElementById('visitorDate');
  const nameError = document.getElementById('nameError');
  const emailError = document.getElementById('emailError');
  const phoneError = document.getElementById('phoneError');
  const dateError = document.getElementById('dateError');
  const toastMessage = document.getElementById('toastMessage');
  const toastText = document.getElementById('toastText');

  if (visitorDate) {
    visitorDate.min = new Date().toISOString().split('T')[0];
  }

  function displayToast(msg, isError = false) {
    if (toastMessage && toastText) {
      toastText.textContent = msg;
      if (isError) {
        toastMessage.style.borderColor = '#ef4444';
        toastMessage.style.background = 'rgba(15, 23, 42, 0.98)';
      } else {
        toastMessage.style.borderColor = '#22c55e';
        toastMessage.style.background = 'rgba(15, 23, 42, 0.95)';
      }
      toastMessage.classList.add('show');
      setTimeout(() => {
        toastMessage.classList.remove('show');
      }, 6000);
    }
  }

  siteVisitForm?.addEventListener('submit', async (e) => {
    e.preventDefault();
    let valid = true;

    // 1. Validate Name (Required, min 2)
    const name = visitorName?.value.trim() || '';
    if (name.length < 2) {
      if (nameError) nameError.style.display = 'block';
      visitorName?.focus();
      valid = false;
    } else {
      if (nameError) nameError.style.display = 'none';
    }

    // 2. Validate Email (Required, valid format)
    const email = visitorEmail?.value.trim() || '';
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email || !emailPattern.test(email)) {
      if (emailError) emailError.style.display = 'block';
      if (valid) visitorEmail?.focus();
      valid = false;
    } else {
      if (emailError) emailError.style.display = 'none';
    }

    // 3. Validate Mobile (Required, 10-15 digits)
    const phone = visitorPhone?.value.trim() || '';
    const phonePattern = /^[0-9+\s-]{10,15}$/;
    if (!phonePattern.test(phone.replace(/\s+/g, ''))) {
      if (phoneError) phoneError.style.display = 'block';
      if (valid) visitorPhone?.focus();
      valid = false;
    } else {
      if (phoneError) phoneError.style.display = 'none';
    }

    // 4. Preferred Date (Optional, but if supplied must not be past)
    const dateVal = visitorDate?.value || '';
    if (dateVal) {
      const today = new Date().toISOString().split('T')[0];
      if (dateVal < today) {
        if (dateError) {
          dateError.textContent = 'Please choose today or an upcoming date';
          dateError.style.display = 'block';
        }
        if (valid) visitorDate?.focus();
        valid = false;
      } else {
        if (dateError) dateError.style.display = 'none';
      }
    } else {
      if (dateError) dateError.style.display = 'none';
    }

    // 5. Submit via AJAX to Laravel backend
    if (valid) {
      const submitBtn = document.getElementById('submitVisitBtn');
      const prevHtml = submitBtn?.innerHTML || '';
      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-2"></i><span>Saving Request...</span>';
      }

      // Collect URL UTM params and attribution
      const urlParams = new URLSearchParams(window.location.search);
      const payload = {
        name: name,
        email: email,
        phone: phone,
        preferred_visit_date: dateVal || null,
        project: document.getElementById('leadProject')?.value || 'RRR Prekshitha Enclave',
        landing_page: document.getElementById('leadLandingPage')?.value || window.location.pathname,
        source: document.getElementById('leadSource')?.value || 'Landing page',
        utm_source: urlParams.get('utm_source') || null,
        utm_medium: urlParams.get('utm_medium') || null,
        utm_campaign: urlParams.get('utm_campaign') || null,
        referrer: document.referrer || null,
        website_hp: document.getElementById('website_hp')?.value || ''
      };

      try {
        const response = await fetch('/api/enquiries', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
          },
          body: JSON.stringify(payload)
        });

        const data = await response.json();

        if (response.ok && data.success) {
          displayToast(`Thank you, ${name}! Your site visit request (${data.lead_number || 'Confirmed'}) has been recorded. Our property advisor will call you shortly.`);
          siteVisitForm.reset();
        } else {
          const errMsg = data.message || (data.errors ? Object.values(data.errors).flat().join(' ') : 'Unable to submit enquiry. Please call us directly.');
          displayToast(errMsg, true);
        }
      } catch (err) {
        console.error('Lead submission error:', err);
        displayToast('Network connection issue. Please contact us via WhatsApp or Phone directly.', true);
      } finally {
        if (submitBtn) {
          submitBtn.disabled = false;
          submitBtn.innerHTML = prevHtml;
        }
      }
    }
  });

  // --- 6. SMOOTH ANCHOR SCROLLING & SECTION POPUP TRIGGERS ---
  function getHeaderOffset() {
    const headerEl = document.getElementById('siteHeader');
    return (headerEl ? headerEl.offsetHeight : 75) + 12;
  }

  function scrollToTarget(targetEl) {
    if (!targetEl) return;
    const headerH = getHeaderOffset();
    const pos = targetEl.getBoundingClientRect().top + window.pageYOffset - headerH;
    window.scrollTo({
      top: Math.max(0, pos),
      behavior: 'smooth'
    });
  }

  // Helper to normalize section IDs
  function normalizeSectionId(hashOrId) {
    if (!hashOrId) return null;
    const clean = hashOrId.replace(/^#/, '');
    if (['masterLayoutImg', 'masterLayoutCanvas', 'layout'].includes(clean)) {
      return 'layout';
    }
    if (['hero', 'gallery', 'location', 'amenities', 'schedule-visit'].includes(clean)) {
      return clean;
    }
    return clean;
  }

  // Major landing page sections that trigger the attention-grabbing enquiry popup
  const majorSectionIds = ['gallery', 'layout', 'location', 'amenities', 'schedule-visit'];

  // Active section state and debounce controllers
  let isNavigatingViaClick = false;
  let navigationPopupTimer = null;
  let scrollTriggerDebounce = null;
  let lastTriggeredSection = normalizeSectionId(window.location.hash) || 'hero';
  let lastModalCloseTimestamp = 0;
  let hasSubmittedLeadSuccessfully = false;

  // Handle all section navigation clicks (header nav, mobile drawer, in-page CTAs)
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', function(e) {
      let id = this.getAttribute('href');
      if (!id || id === '#') return;

      // When clicking Master Plan links, ensure we go directly to the layout plan image
      const text = (this.textContent || '').toLowerCase();
      if ((id === '#layout' || id === '#masterLayoutImg' || id === '#masterLayoutCanvas') && 
          (text.includes('master plan') || text.includes('explore'))) {
        id = '#masterLayoutImg';
      }

      const target = document.querySelector(id);
      if (target) {
        e.preventDefault();
        scrollToTarget(target);

        if (history.pushState) {
          history.pushState(null, null, id);
        }

        const normTarget = normalizeSectionId(id);

        if (normTarget && normTarget !== 'hero') {
          // Block intermediate scroll observer events while smooth scrolling
          isNavigatingViaClick = true;

          if (scrollTriggerDebounce) {
            clearTimeout(scrollTriggerDebounce);
            scrollTriggerDebounce = null;
          }
          if (navigationPopupTimer) {
            clearTimeout(navigationPopupTimer);
            navigationPopupTimer = null;
          }

          // Trigger popup smoothly after smooth scroll arrives at the requested section
          navigationPopupTimer = setTimeout(() => {
            isNavigatingViaClick = false;
            lastTriggeredSection = normTarget;
            openEnquiryModal('navigation', normTarget);
          }, 500);
        } else if (normTarget === 'hero') {
          lastTriggeredSection = 'hero';
          if (navigationPopupTimer) clearTimeout(navigationPopupTimer);
        }
      }
    });
  });

  // Handle scroll detection: Trigger popup automatically when scrolling into a new section
  function checkScrollSectionTrigger() {
    // Suppress scroll trigger if navigating via click, modal already open, lead submitted, or closed within 1400ms
    if (isNavigatingViaClick) return;
    if (hasSubmittedLeadSuccessfully) return;
    if (typeof isModalOpen === 'function' && isModalOpen()) return;
    const enquiryModalWrapperEl = document.getElementById('enquiryModalWrapper');
    if (enquiryModalWrapperEl && enquiryModalWrapperEl.classList.contains('is-open')) return;
    if (Date.now() - lastModalCloseTimestamp < 1400) return;

    const viewportHeight = window.innerHeight || document.documentElement.clientHeight;
    let detectedSectionId = null;

    // Determine which major section currently occupies the main focal reading zone
    for (const secId of majorSectionIds) {
      const el = document.getElementById(secId);
      if (!el) continue;

      const rect = el.getBoundingClientRect();
      // Section is in the reading zone when its top is within upper 60% and bottom is still above bottom 20%
      if (rect.top <= viewportHeight * 0.60 && rect.bottom >= viewportHeight * 0.20) {
        detectedSectionId = secId;
        break;
      }
    }

    // If user scrolled into a new major section, trigger popup after a brief dwell pause
    if (detectedSectionId && detectedSectionId !== lastTriggeredSection) {
      if (scrollTriggerDebounce) clearTimeout(scrollTriggerDebounce);

      scrollTriggerDebounce = setTimeout(() => {
        // Re-check conditions before opening
        const currentWrapper = document.getElementById('enquiryModalWrapper');
        if (currentWrapper && currentWrapper.classList.contains('is-open')) return;
        if (Date.now() - lastModalCloseTimestamp < 1400) return;

        const targetEl = document.getElementById(detectedSectionId);
        if (targetEl) {
          const r = targetEl.getBoundingClientRect();
          if (r.top <= viewportHeight * 0.65 && r.bottom >= viewportHeight * 0.15) {
            lastTriggeredSection = detectedSectionId;
            openEnquiryModal('scroll', detectedSectionId);
          }
        }
      }, 420);
    }
  }

  window.addEventListener('scroll', checkScrollSectionTrigger, { passive: true });

  // Handle browser back/forward navigation hash changes
  window.addEventListener('hashchange', () => {
    const newSection = normalizeSectionId(window.location.hash);
    if (newSection && newSection !== 'hero') {
      const targetEl = document.getElementById(window.location.hash.replace(/^#/, '')) || document.getElementById(newSection);
      if (targetEl) {
        scrollToTarget(targetEl);
      }
      lastTriggeredSection = newSection;
      setTimeout(() => {
        openEnquiryModal('navigation', newSection);
      }, 450);
    }
  });

  // Handle direct hash on initial page load (e.g. #amenities, #gallery)
  const initialHash = normalizeSectionId(window.location.hash);
  if (initialHash && initialHash !== 'hero') {
    setTimeout(() => {
      const targetEl = document.getElementById(window.location.hash.replace(/^#/, '')) || document.getElementById(initialHash);
      if (targetEl) {
        scrollToTarget(targetEl);
      }
      lastTriggeredSection = initialHash;
      openEnquiryModal('navigation', initialHash);
    }, 700);
  }

  // ==============================================================
  // 7. STICKY ENQUIRY TAB, BUBBLE ANIMATION & POPUP CONTROLLER
  // ==============================================================
  const stickyEnquiryTab = document.getElementById('stickyEnquiryTab');
  const enquiryModalBackdrop = document.getElementById('enquiryModalBackdrop');
  const enquiryModalWrapper = document.getElementById('enquiryModalWrapper');
  const enquiryModalCard = document.getElementById('enquiryModalCard');
  const modalCloseBtn = document.getElementById('modalCloseBtn');
  const modalSuccessCloseBtn = document.getElementById('modalSuccessCloseBtn');
  const mobileBarEnquireBtn = document.getElementById('mobileBarEnquireBtn');
  const popupEnquiryForm = document.getElementById('popupEnquiryForm');
  const modalVisitorName = document.getElementById('modalVisitorName');
  const modalVisitorEmail = document.getElementById('modalVisitorEmail');
  const modalVisitorPhone = document.getElementById('modalVisitorPhone');
  const modalVisitorDate = document.getElementById('modalVisitorDate');
  const modalNameError = document.getElementById('modalNameError');
  const modalEmailError = document.getElementById('modalEmailError');
  const modalPhoneError = document.getElementById('modalPhoneError');
  const modalDateError = document.getElementById('modalDateError');
  const modalSubmitBtn = document.getElementById('modalSubmitBtn');
  const modalFormContainer = document.getElementById('modalFormContainer');
  const modalSuccessContainer = document.getElementById('modalSuccessContainer');
  const modalSuccessLeadPill = document.getElementById('modalSuccessLeadPill');
  const modalSuccessDateNote = document.getElementById('modalSuccessDateNote');

  // Restrict date input to today or future
  if (modalVisitorDate) {
    modalVisitorDate.min = new Date().toISOString().split('T')[0];
  }

  let isModalClosing = false;
  let modalClosingTimer = null;

  // Replay Bubble & Modal Entrance Animations fresh every time
  function replayModalAnimations() {
    if (!enquiryModalCard) return;
    enquiryModalCard.classList.remove('play-bubble-entrance');
    // Force CSS reflow so animation restarts from frame 0
    void enquiryModalCard.offsetWidth;
    enquiryModalCard.classList.add('play-bubble-entrance');
  }

  // Section metadata tailored to each major landing page section
  const sectionContentMap = {
    amenities: {
      eyebrow: 'World-Class Amenities & Features',
      title: 'Enquire About Amenities',
      subtitle: 'Schedule a guided visit to tour the grand entrance arch, landscaped parks, and sports amenities.',
      source: 'Landing page - Amenities Section Popup'
    },
    gallery: {
      eyebrow: 'Venture Showcase & Photos',
      title: 'Explore Prekshitha Enclave',
      subtitle: 'View high-resolution venture photos or book a personalized site tour to inspect plots in person.',
      source: 'Landing page - Gallery Section Popup'
    },
    layout: {
      eyebrow: 'Sanctioned Layout & Master Plan',
      title: 'Plot Availability & Pricing',
      subtitle: 'Get instant access to sanctioned layout boundaries, East/West facing plots, and price details.',
      source: 'Landing page - Master Plan Section Popup'
    },
    location: {
      eyebrow: 'Strategic Location Matrix',
      title: 'Location & Connectivity',
      subtitle: 'Discover rapid connectivity to AIIMS Bibinagar, Warangal Highway & RRR. Plan your site visit today.',
      source: 'Landing page - Location Section Popup'
    },
    'schedule-visit': {
      eyebrow: 'Exclusive Site Tour',
      title: 'Schedule Your Site Visit',
      subtitle: 'Select your preferred date and our property advisor will arrange comfortable site transportation.',
      source: 'Landing page - Schedule Visit Section Popup'
    },
    default: {
      eyebrow: 'Exclusive Site Visit & Pricing',
      title: 'Plan Your Visit',
      subtitle: 'Share your details and our property advisor will get in touch with you shortly.',
      source: 'Landing page - Sticky Tab Popup'
    }
  };

  // Open Enquiry Modal
  function openEnquiryModal(source = 'manual', sectionId = '') {
    if (!enquiryModalWrapper) return;

    // If modal is in the middle of closing, cancel closing animation immediately
    if (isModalClosing) {
      if (modalClosingTimer) clearTimeout(modalClosingTimer);
      enquiryModalWrapper.classList.remove('is-closing');
      enquiryModalBackdrop?.classList.remove('is-closing');
      isModalClosing = false;
    }

    // Reset view to form if previously submitted and closed
    if (modalSuccessContainer && modalFormContainer) {
      modalSuccessContainer.style.display = 'none';
      modalFormContainer.style.display = 'block';
    }

    // Adapt modal header, eyebrow and lead source dynamically to current section
    const normSec = normalizeSectionId(sectionId);
    const meta = sectionContentMap[normSec] || sectionContentMap.default;
    const eyebrowSpan = document.querySelector('.modal-eyebrow span:last-child');
    const titleEl = document.getElementById('modalHeadingTitle');
    const subtitleEl = document.getElementById('modalSupportingText');
    const sourceInput = document.getElementById('modalLeadSource');

    if (eyebrowSpan && meta.eyebrow) eyebrowSpan.textContent = meta.eyebrow;
    if (titleEl && meta.title) titleEl.textContent = meta.title;
    if (subtitleEl && meta.subtitle) subtitleEl.textContent = meta.subtitle;
    if (sourceInput && meta.source) sourceInput.value = meta.source;

    enquiryModalBackdrop?.classList.add('is-active');
    enquiryModalWrapper?.classList.add('is-open');
    document.body.style.overflow = 'hidden';

    // Replay floating bubble emergence animation
    replayModalAnimations();

    // Focus first input field if manual click
    if (source === 'manual') {
      setTimeout(() => {
        if (modalFormContainer && modalFormContainer.style.display !== 'none') {
          modalVisitorName?.focus();
        }
      }, 200);
    }
  }

  // Close Enquiry Modal with smooth exit animation
  function closeEnquiryModal() {
    if (!enquiryModalWrapper || isModalClosing) return;
    if (!enquiryModalWrapper.classList.contains('is-open')) return;

    isModalClosing = true;
    lastModalCloseTimestamp = Date.now();
    enquiryModalWrapper.classList.add('is-closing');
    enquiryModalBackdrop?.classList.add('is-closing');

    modalClosingTimer = setTimeout(() => {
      enquiryModalBackdrop?.classList.remove('is-active', 'is-closing');
      enquiryModalWrapper?.classList.remove('is-open', 'is-closing');
      enquiryModalCard?.classList.remove('play-bubble-entrance');
      document.body.style.overflow = '';
      isModalClosing = false;
      modalClosingTimer = null;
    }, 240);
  }

  // Expose close helper globally for Esc key handler
  window.closeLanding2EnquiryModal = closeEnquiryModal;

  // Sticky Tab & Mobile Button Click (Manual open always plays animation)
  stickyEnquiryTab?.addEventListener('click', (e) => {
    e.preventDefault();
    openEnquiryModal('manual');
  });

  mobileBarEnquireBtn?.addEventListener('click', (e) => {
    e.preventDefault();
    openEnquiryModal('manual');
  });

  // Close via 'X' button
  modalCloseBtn?.addEventListener('click', (e) => {
    e.preventDefault();
    closeEnquiryModal();
  });

  // Close via Success Card 'Close Window' button
  modalSuccessCloseBtn?.addEventListener('click', (e) => {
    e.preventDefault();
    closeEnquiryModal();
  });

  // Close via clicking on Backdrop
  enquiryModalBackdrop?.addEventListener('click', () => {
    closeEnquiryModal();
  });

  // Close via clicking outside modal card in wrapper
  enquiryModalWrapper?.addEventListener('click', (e) => {
    if (e.target === enquiryModalWrapper) {
      closeEnquiryModal();
    }
  });

  // Prevent clicks inside card from closing
  enquiryModalCard?.addEventListener('click', (e) => {
    e.stopPropagation();
  });

  // Popup Enquiry Form Submission & Duplicate Prevention
  popupEnquiryForm?.addEventListener('submit', async (e) => {
    e.preventDefault();
    let valid = true;

    // 1. Validate Name (Required, min 2 chars)
    const name = modalVisitorName?.value.trim() || '';
    if (name.length < 2) {
      if (modalNameError) modalNameError.style.display = 'block';
      modalVisitorName?.focus();
      valid = false;
    } else {
      if (modalNameError) modalNameError.style.display = 'none';
    }

    // 2. Validate Email (Required, standard email regex)
    const email = modalVisitorEmail?.value.trim() || '';
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email || !emailPattern.test(email)) {
      if (modalEmailError) modalEmailError.style.display = 'block';
      if (valid) modalVisitorEmail?.focus();
      valid = false;
    } else {
      if (modalEmailError) modalEmailError.style.display = 'none';
    }

    // 3. Validate Mobile (Required, 10-15 digits)
    const phone = modalVisitorPhone?.value.trim() || '';
    const phonePattern = /^[0-9+\s-]{10,15}$/;
    if (!phonePattern.test(phone.replace(/\s+/g, ''))) {
      if (modalPhoneError) modalPhoneError.style.display = 'block';
      if (valid) modalVisitorPhone?.focus();
      valid = false;
    } else {
      if (modalPhoneError) modalPhoneError.style.display = 'none';
    }

    // 4. Preferred Site Visit Date (Optional, but if filled cannot be in the past)
    const dateVal = modalVisitorDate?.value || '';
    if (dateVal) {
      const todayStr = new Date().toISOString().split('T')[0];
      if (dateVal < todayStr) {
        if (modalDateError) {
          modalDateError.textContent = 'Please choose today or an upcoming date';
          modalDateError.style.display = 'block';
        }
        if (valid) modalVisitorDate?.focus();
        valid = false;
      } else {
        if (modalDateError) modalDateError.style.display = 'none';
      }
    } else {
      if (modalDateError) modalDateError.style.display = 'none';
    }

    // 5. Submit via existing API
    if (valid) {
      const prevBtnHtml = modalSubmitBtn?.innerHTML || '';
      if (modalSubmitBtn) {
        modalSubmitBtn.disabled = true;
        modalSubmitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-2"></i><span>Scheduling Visit...</span>';
      }

      const urlParams = new URLSearchParams(window.location.search);
      const payload = {
        name: name,
        email: email,
        phone: phone,
        preferred_visit_date: dateVal || null,
        project: document.getElementById('modalLeadProject')?.value || 'RRR Prekshitha Enclave',
        landing_page: document.getElementById('modalLeadLandingPage')?.value || '/',
        source: document.getElementById('modalLeadSource')?.value || 'Landing page - Section Navigation Popup',
        utm_source: urlParams.get('utm_source') || null,
        utm_medium: urlParams.get('utm_medium') || null,
        utm_campaign: urlParams.get('utm_campaign') || null,
        referrer: document.referrer || null,
        website_hp: document.getElementById('modal_website_hp')?.value || ''
      };

      try {
        const response = await fetch('/api/enquiries', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
          },
          body: JSON.stringify(payload)
        });

        const data = await response.json();

        if (response.ok && data.success) {
          hasSubmittedLeadSuccessfully = true;
          // Switch to Success State inside modal
          if (modalFormContainer) modalFormContainer.style.display = 'none';
          if (modalSuccessContainer) modalSuccessContainer.style.display = 'block';

          if (modalSuccessLeadPill) {
            modalSuccessLeadPill.textContent = `REF: #${data.lead_number || 'L-CONFIRMED'}`;
          }

          if (modalSuccessDateNote) {
            if (dateVal) {
              const parts = dateVal.split('-');
              let dateFormatted = dateVal;
              if (parts.length === 3) {
                const dObj = new Date(parseInt(parts[0], 10), parseInt(parts[1], 10) - 1, parseInt(parts[2], 10));
                dateFormatted = dObj.toLocaleDateString('en-US', { day: 'numeric', month: 'long', year: 'numeric' });
              }
              modalSuccessDateNote.textContent = `Your preferred site visit date (${dateFormatted}) has also been noted. Our team will contact you to confirm availability.`;
              modalSuccessDateNote.style.display = 'block';
            } else {
              modalSuccessDateNote.style.display = 'none';
            }
          }

          displayToast(`Thank you, ${name}! Your enquiry (${data.lead_number || 'Recorded'}) has been received.`);
          popupEnquiryForm.reset();
        } else {
          const errMsg = data.message || (data.errors ? Object.values(data.errors).flat().join(' ') : 'Unable to submit enquiry. Please call us directly.');
          displayToast(errMsg, true);
          if (modalSubmitBtn) {
            modalSubmitBtn.disabled = false;
            modalSubmitBtn.innerHTML = prevBtnHtml;
          }
        }
      } catch (err) {
        console.error('Modal lead submission network error:', err);
        displayToast('Network connection issue. Please contact us via WhatsApp or Phone directly.', true);
        if (modalSubmitBtn) {
          modalSubmitBtn.disabled = false;
          modalSubmitBtn.innerHTML = prevBtnHtml;
        }
      }
    }
  });
});
