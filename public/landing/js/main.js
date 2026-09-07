/**
 * Premium Plotted Real-Estate Project Landing Page JavaScript
 * Standalone Vanilla JS - Lightweight, Robust, Fully Accessible, Zero Dependencies
 */

(function () {
  'use strict';

  // --- Project Contact Configuration ---
  const PROJECT_CONFIG = {
    projectName: 'NAVAGRUHA RRR PREKSHITHA ENCLAVE',
    contactPhone: '+91 9617 699 699',
    whatsAppNumber: '919617699699',
    defaultWhatsAppMessage: 'Hello, I am interested in Navagruha RRR Prekshitha Enclave plots near AIIMS Bibinagar. Please share the details.'
  };

  // --- DOM References ---
  const navbar = document.getElementById('mainNavbar');
  const navToggle = document.getElementById('navToggleBtn');
  const mobileDrawer = document.getElementById('mobileDrawer');
  const mobileLinks = document.querySelectorAll('.mobile-nav-link');
  const navLinks = document.querySelectorAll('.nav-link');
  const sections = document.querySelectorAll('section[id]');
  const revealElements = document.querySelectorAll('.reveal');

  // Master Layout Lightbox
  const layoutLightbox = document.getElementById('layoutLightbox');
  const viewFullLayoutBtn = document.getElementById('viewFullLayoutBtn');
  const closeLayoutBtn = document.getElementById('closeLayoutBtn');
  const zoomInBtn = document.getElementById('zoomInBtn');
  const zoomOutBtn = document.getElementById('zoomOutBtn');
  const zoomResetBtn = document.getElementById('zoomResetBtn');
  const layoutStage = document.getElementById('layoutStage');
  const layoutCanvas = document.getElementById('layoutCanvas');
  const layoutLightboxImg = document.getElementById('layoutLightboxImg');

  // Section 8 Enquiry Form
  const siteVisitForm = document.getElementById('siteVisitForm');
  const visitorNameInput = document.getElementById('visitorName');
  const visitorPhoneInput = document.getElementById('visitorPhone');
  const visitorDateInput = document.getElementById('visitorDate');
  const submitVisitBtn = document.getElementById('submitVisitBtn');

  // Toast Notice
  const toastNotice = document.getElementById('toastNotice');
  const toastMessage = document.getElementById('toastMessage');

  // Scroll Progress Bar
  const scrollProgressBar = document.getElementById('scrollProgressBar');

  // --- 1. Sticky Navbar & Scroll Progress Watcher ---
  function handleScroll() {
    if (window.scrollY > 40) {
      navbar?.classList.add('scrolled');
    } else {
      navbar?.classList.remove('scrolled');
    }

    if (scrollProgressBar) {
      const maxScroll = document.documentElement.scrollHeight - window.innerHeight;
      if (maxScroll > 0) {
        const pct = Math.min(100, Math.max(0, (window.scrollY / maxScroll) * 100));
        scrollProgressBar.style.width = pct + '%';
      }
    }
  }

  window.addEventListener('scroll', handleScroll, { passive: true });
  handleScroll();

  // --- 2. Subtle Scroll Reveal Animations ---
  if ('IntersectionObserver' in window && revealElements.length > 0) {
    const revealObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, {
      root: null,
      rootMargin: '0px 0px -40px 0px',
      threshold: 0.08
    });

    revealElements.forEach((el) => revealObserver.observe(el));
  } else {
    revealElements.forEach((el) => el.classList.add('is-visible'));
  }

  // --- 3. Active Navigation Indicator ---
  if ('IntersectionObserver' in window && sections.length > 0) {
    const observerOptions = {
      root: null,
      rootMargin: '-20% 0px -60% 0px',
      threshold: 0
    };

    const sectionObserver = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const currentId = entry.target.getAttribute('id');
          navLinks.forEach((link) => {
            if (link.getAttribute('href') === `#${currentId}`) {
              link.classList.add('active');
            } else {
              link.classList.remove('active');
            }
          });
        }
      });
    }, observerOptions);

    sections.forEach((section) => sectionObserver.observe(section));
  }

  // --- 4. Mobile Navigation Drawer ---
  if (navToggle && mobileDrawer) {
    navToggle.addEventListener('click', (e) => {
      e.stopPropagation();
      const isOpen = mobileDrawer.classList.toggle('open');
      navToggle.setAttribute('aria-expanded', String(isOpen));
      navToggle.innerHTML = isOpen
        ? '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>'
        : '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>';
    });

    mobileLinks.forEach((link) => {
      link.addEventListener('click', () => {
        mobileDrawer.classList.remove('open');
        navToggle.setAttribute('aria-expanded', 'false');
        navToggle.innerHTML = '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>';
      });
    });

    document.addEventListener('click', (e) => {
      if (mobileDrawer.classList.contains('open') && !mobileDrawer.contains(e.target) && !navToggle.contains(e.target)) {
        mobileDrawer.classList.remove('open');
        navToggle.setAttribute('aria-expanded', 'false');
        navToggle.innerHTML = '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>';
      }
    });
  }

  // --- 5. Master Layout Fullscreen Lightbox with Zoom & Pan ---
  let currentZoom = 1;
  let isPanning = false;
  let startX = 0;
  let startY = 0;
  let translateX = 0;
  let translateY = 0;

  function updateLayoutTransform() {
    if (layoutCanvas) {
      layoutCanvas.style.transform = `translate(${translateX}px, ${translateY}px) scale(${currentZoom})`;
    }
  }

  function resetLayoutZoom() {
    currentZoom = 1;
    translateX = 0;
    translateY = 0;
    updateLayoutTransform();
  }

  function openLayoutLightbox() {
    if (layoutLightbox) {
      layoutLightbox.classList.add('active');
      document.body.style.overflow = 'hidden';
      resetLayoutZoom();
    }
  }

  function closeLayoutLightbox() {
    if (layoutLightbox) {
      layoutLightbox.classList.remove('active');
      document.body.style.overflow = '';
      resetLayoutZoom();
    }
  }

  viewFullLayoutBtn?.addEventListener('click', openLayoutLightbox);
  closeLayoutBtn?.addEventListener('click', closeLayoutLightbox);

  zoomInBtn?.addEventListener('click', () => {
    currentZoom = Math.min(3.5, currentZoom + 0.35);
    updateLayoutTransform();
  });

  zoomOutBtn?.addEventListener('click', () => {
    currentZoom = Math.max(0.7, currentZoom - 0.35);
    updateLayoutTransform();
  });

  zoomResetBtn?.addEventListener('click', resetLayoutZoom);

  // Mouse pan & drag on layout stage
  layoutStage?.addEventListener('mousedown', (e) => {
    if (e.target.closest('.lightbox-controls')) return;
    isPanning = true;
    startX = e.clientX - translateX;
    startY = e.clientY - translateY;
    layoutStage.style.cursor = 'grabbing';
  });

  window.addEventListener('mousemove', (e) => {
    if (!isPanning) return;
    translateX = e.clientX - startX;
    translateY = e.clientY - startY;
    updateLayoutTransform();
  });

  window.addEventListener('mouseup', () => {
    isPanning = false;
    if (layoutStage) {
      layoutStage.style.cursor = 'grab';
    }
  });

  // Touch pan support for mobile devices
  let initialTouchDist = 0;
  layoutStage?.addEventListener('touchstart', (e) => {
    if (e.touches.length === 1) {
      isPanning = true;
      startX = e.touches[0].clientX - translateX;
      startY = e.touches[0].clientY - translateY;
    } else if (e.touches.length === 2) {
      isPanning = false;
      initialTouchDist = Math.hypot(
        e.touches[0].clientX - e.touches[1].clientX,
        e.touches[0].clientY - e.touches[1].clientY
      );
    }
  }, { passive: true });

  layoutStage?.addEventListener('touchmove', (e) => {
    if (isPanning && e.touches.length === 1) {
      translateX = e.touches[0].clientX - startX;
      translateY = e.touches[0].clientY - startY;
      updateLayoutTransform();
    } else if (e.touches.length === 2 && initialTouchDist > 0) {
      const currentDist = Math.hypot(
        e.touches[0].clientX - e.touches[1].clientX,
        e.touches[0].clientY - e.touches[1].clientY
      );
      const diff = (currentDist - initialTouchDist) * 0.005;
      currentZoom = Math.min(3.5, Math.max(0.7, currentZoom + diff));
      initialTouchDist = currentDist;
      updateLayoutTransform();
    }
  }, { passive: true });

  layoutStage?.addEventListener('touchend', () => {
    isPanning = false;
    initialTouchDist = 0;
  });

  // Close on backdrop click
  layoutLightbox?.addEventListener('click', (e) => {
    if (e.target === layoutLightbox || e.target === layoutStage) {
      closeLayoutLightbox();
    }
  });

  // Global ESC key listener for Lightbox
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && layoutLightbox?.classList.contains('active')) {
      closeLayoutLightbox();
    }
  });

  // --- 6. Toast Notification Manager ---
  let toastTimer = null;
  function showToast(msg, duration = 4000) {
    if (!toastNotice || !toastMessage) return;
    toastMessage.textContent = msg;
    toastNotice.classList.add('active');

    clearTimeout(toastTimer);
    toastTimer = setTimeout(() => {
      toastNotice.classList.remove('active');
    }, duration);
  }

  // --- 7. Section 8 Enquiry Form Validation & Submission ---
  if (visitorDateInput) {
    // Set minimum date to tomorrow
    const tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate() + 1);
    const yyyy = tomorrow.getFullYear();
    const mm = String(tomorrow.getMonth() + 1).padStart(2, '0');
    const dd = String(tomorrow.getDate()).padStart(2, '0');
    visitorDateInput.min = `${yyyy}-${mm}-${dd}`;
  }

  if (siteVisitForm) {
    siteVisitForm.addEventListener('submit', (e) => {
      e.preventDefault();
      let isValid = true;

      // Validate Name
      const nameVal = (visitorNameInput?.value || '').trim();
      const nameError = document.getElementById('nameError');
      if (nameVal.length < 2) {
        isValid = false;
        visitorNameInput?.classList.add('error');
        if (nameError) nameError.style.display = 'block';
      } else {
        visitorNameInput?.classList.remove('error');
        if (nameError) nameError.style.display = 'none';
      }

      // Validate Phone (10-15 numeric digits)
      const phoneVal = (visitorPhoneInput?.value || '').trim().replace(/[\s\-()]/g, '');
      const phoneError = document.getElementById('phoneError');
      const phoneDigits = phoneVal.replace(/\D/g, '');
      if (phoneDigits.length < 10) {
        isValid = false;
        visitorPhoneInput?.classList.add('error');
        if (phoneError) phoneError.style.display = 'block';
      } else {
        visitorPhoneInput?.classList.remove('error');
        if (phoneError) phoneError.style.display = 'none';
      }

      // Validate Preferred Date
      const dateVal = visitorDateInput?.value || '';
      const dateError = document.getElementById('dateError');
      if (!dateVal) {
        isValid = false;
        visitorDateInput?.classList.add('error');
        if (dateError) dateError.style.display = 'block';
      } else {
        visitorDateInput?.classList.remove('error');
        if (dateError) dateError.style.display = 'none';
      }

      if (!isValid) return;

      // UI submission state
      if (submitVisitBtn) {
        submitVisitBtn.disabled = true;
        submitVisitBtn.innerHTML = `
          <svg class="spin-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="animation: spin 1s linear infinite;"><path d="M21 12a9 9 0 1 1-6.219-8.56"></path></svg>
          <span>Confirming...</span>
        `;
      }

      // Simulate asynchronous booking submission (ready for future backend hook)
      setTimeout(() => {
        if (submitVisitBtn) {
          submitVisitBtn.disabled = false;
          submitVisitBtn.innerHTML = `
            <span>Book a Site Visit</span>
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
          `;
        }

        // Reset form
        siteVisitForm.reset();

        // Show friendly confirmation toast
        showToast(`Thank you, ${nameVal}! Your private site visit reservation has been received. Our senior property advisor will call you on ${phoneVal} to confirm the tour.`);
      }, 700);
    });

    // Clear validation errors on user input
    [visitorNameInput, visitorPhoneInput, visitorDateInput].forEach((input) => {
      input?.addEventListener('input', () => {
        input.classList.remove('error');
        const err = input.parentElement?.querySelector('.form-error-msg');
        if (err) err.style.display = 'none';
      });
    });
  }

  // --- 8. Smooth Scrolling for Navigation Anchors ---
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener('click', function (e) {
      const targetId = this.getAttribute('href');
      if (!targetId || targetId === '#') return;
      const targetEl = document.querySelector(targetId);
      if (targetEl) {
        e.preventDefault();
        const headerOffset = 80;
        const elementPosition = targetEl.getBoundingClientRect().top;
        const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

        window.scrollTo({
          top: offsetPosition,
          behavior: 'smooth'
        });
      }
    });
  });

})();
