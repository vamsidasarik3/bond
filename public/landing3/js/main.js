/**
 * NAVAGRUHA RRR PREKSHITHA ENCLAVE - STANDALONE JAVASCRIPT
 * Handles scroll animations, progress bar, mobile drawer, layout lightbox, and form UX.
 */

document.addEventListener('DOMContentLoaded', () => {
  'use strict';

  // --- 1. NAVBAR & SCROLL PROGRESS ---
  const navbar = document.getElementById('mainNavbar');
  const progressBar = document.getElementById('scrollProgressBar');

  function handleScroll() {
    const scrollY = window.scrollY || window.pageYOffset;
    const docHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    
    // Navbar background blur/solid
    if (scrollY > 50) {
      navbar?.classList.add('scrolled');
    } else {
      navbar?.classList.remove('scrolled');
    }

    // Scroll progress bar
    if (progressBar && docHeight > 0) {
      const scrollPct = Math.min(100, Math.max(0, (scrollY / docHeight) * 100));
      progressBar.style.width = scrollPct + '%';
    }
  }

  window.addEventListener('scroll', handleScroll, { passive: true });
  handleScroll();

  // --- 2. INTERSECTION OBSERVER FOR SCROLL REVEAL ANIMATIONS ---
  const revealElements = document.querySelectorAll('.reveal');

  if ('IntersectionObserver' in window) {
    const revealObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, {
      root: null,
      threshold: 0.12,
      rootMargin: '0px 0px -40px 0px'
    });

    revealElements.forEach(el => revealObserver.observe(el));
  } else {
    // Fallback for older browsers
    revealElements.forEach(el => el.classList.add('is-visible'));
  }

  // --- 3. MOBILE DRAWER NAVIGATION ---
  const navToggleBtn = document.getElementById('navToggleBtn');
  const mobileDrawer = document.getElementById('mobileDrawer');
  const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');

  function toggleMobileMenu() {
    const isOpen = mobileDrawer?.classList.toggle('is-open');
    navToggleBtn?.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    document.body.style.overflow = isOpen ? 'hidden' : '';
  }

  function closeMobileMenu() {
    mobileDrawer?.classList.remove('is-open');
    navToggleBtn?.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
  }

  navToggleBtn?.addEventListener('click', toggleMobileMenu);

  mobileNavLinks.forEach(link => {
    link.addEventListener('click', closeMobileMenu);
  });

  // Close when clicking outside drawer
  document.addEventListener('click', (e) => {
    if (mobileDrawer?.classList.contains('is-open')) {
      if (!mobileDrawer.contains(e.target) && !navToggleBtn.contains(e.target)) {
        closeMobileMenu();
      }
    }
  });

  // --- 4. MASTER LAYOUT FULLSCREEN LIGHTBOX ---
  const viewFullLayoutBtn = document.getElementById('viewFullLayoutBtn');
  const layoutLightbox = document.getElementById('layoutLightbox');
  const closeLayoutBtn = document.getElementById('closeLayoutBtn');
  const zoomInBtn = document.getElementById('zoomInBtn');
  const zoomOutBtn = document.getElementById('zoomOutBtn');
  const zoomResetBtn = document.getElementById('zoomResetBtn');
  const layoutCanvas = document.getElementById('layoutCanvas');
  const layoutStage = document.getElementById('layoutStage');

  let currentZoom = 1.0;
  let panX = 0;
  let panY = 0;
  let isDragging = false;
  let startX = 0;
  let startY = 0;

  function updateTransform() {
    if (layoutCanvas) {
      layoutCanvas.style.transform = `translate(${panX}px, ${panY}px) scale(${currentZoom})`;
    }
  }

  function openLightbox() {
    if (layoutLightbox) {
      layoutLightbox.classList.add('is-active');
      document.body.style.overflow = 'hidden';
      resetZoom();
    }
  }

  function closeLightbox() {
    if (layoutLightbox) {
      layoutLightbox.classList.remove('is-active');
      document.body.style.overflow = '';
      resetZoom();
    }
  }

  function zoomIn() {
    if (currentZoom < 3.0) {
      currentZoom = Math.min(3.0, currentZoom + 0.3);
      updateTransform();
    }
  }

  function zoomOut() {
    if (currentZoom > 0.6) {
      currentZoom = Math.max(0.6, currentZoom - 0.3);
      updateTransform();
    }
  }

  function resetZoom() {
    currentZoom = 1.0;
    panX = 0;
    panY = 0;
    updateTransform();
  }

  viewFullLayoutBtn?.addEventListener('click', openLightbox);
  closeLayoutBtn?.addEventListener('click', closeLightbox);
  zoomInBtn?.addEventListener('click', zoomIn);
  zoomOutBtn?.addEventListener('click', zoomOut);
  zoomResetBtn?.addEventListener('click', resetZoom);

  // Keyboard navigation: Escape key closes lightbox
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && layoutLightbox?.classList.contains('is-active')) {
      closeLightbox();
    }
  });

  // Mouse pan/drag
  layoutStage?.addEventListener('mousedown', (e) => {
    if (e.target.closest('.lb-tool-btn') || e.target.closest('.lb-close-btn')) return;
    isDragging = true;
    startX = e.clientX - panX;
    startY = e.clientY - panY;
  });

  window.addEventListener('mousemove', (e) => {
    if (!isDragging) return;
    panX = e.clientX - startX;
    panY = e.clientY - startY;
    updateTransform();
  });

  window.addEventListener('mouseup', () => {
    isDragging = false;
  });

  // Touch drag for mobile
  layoutStage?.addEventListener('touchstart', (e) => {
    if (e.touches.length === 1) {
      isDragging = true;
      startX = e.touches[0].clientX - panX;
      startY = e.touches[0].clientY - panY;
    }
  }, { passive: true });

  layoutStage?.addEventListener('touchmove', (e) => {
    if (isDragging && e.touches.length === 1) {
      panX = e.touches[0].clientX - startX;
      panY = e.touches[0].clientY - startY;
      updateTransform();
    }
  }, { passive: true });

  layoutStage?.addEventListener('touchend', () => {
    isDragging = false;
  });

  // --- 5. ENQUIRY / SITE VISIT FORM UX ---
  const siteVisitForm = document.getElementById('siteVisitForm');
  const visitorName = document.getElementById('visitorName');
  const visitorPhone = document.getElementById('visitorPhone');
  const visitorDate = document.getElementById('visitorDate');
  const nameError = document.getElementById('nameError');
  const phoneError = document.getElementById('phoneError');
  const dateError = document.getElementById('dateError');
  const toastPopup = document.getElementById('toastPopup');
  const toastText = document.getElementById('toastText');

  // Set minimum date to today
  if (visitorDate) {
    const today = new Date().toISOString().split('T')[0];
    visitorDate.min = today;
  }

  function showToast(message) {
    if (toastPopup && toastText) {
      toastText.textContent = message;
      toastPopup.classList.add('show');
      setTimeout(() => {
        toastPopup.classList.remove('show');
      }, 5000);
    }
  }

  siteVisitForm?.addEventListener('submit', (e) => {
    e.preventDefault();
    let isValid = true;

    // Validate Name
    const nameVal = visitorName?.value.trim() || '';
    if (nameVal.length < 2) {
      if (nameError) nameError.style.display = 'block';
      visitorName?.focus();
      isValid = false;
    } else {
      if (nameError) nameError.style.display = 'none';
    }

    // Validate Phone
    const phoneVal = visitorPhone?.value.trim() || '';
    const phoneRegex = /^[0-9+\s-]{10,15}$/;
    if (!phoneRegex.test(phoneVal.replace(/\s+/g, ''))) {
      if (phoneError) phoneError.style.display = 'block';
      if (isValid) visitorPhone?.focus();
      isValid = false;
    } else {
      if (phoneError) phoneError.style.display = 'none';
    }

    // Validate Date
    const dateVal = visitorDate?.value || '';
    if (!dateVal) {
      if (dateError) dateError.style.display = 'block';
      if (isValid) visitorDate?.focus();
      isValid = false;
    } else {
      if (dateError) dateError.style.display = 'none';
    }

    if (isValid) {
      const submitBtn = document.getElementById('submitVisitBtn');
      const originalText = submitBtn?.innerHTML || '';
      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span>Processing...</span>';
      }

      setTimeout(() => {
        showToast(`Thank you, ${nameVal}! Your site visit request has been recorded. Our team will contact you shortly.`);
        siteVisitForm.reset();
        if (submitBtn) {
          submitBtn.disabled = false;
          submitBtn.innerHTML = originalText;
        }
      }, 700);
    }
  });

  // --- 6. SMOOTH ANCHOR NAVIGATION ---
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      const targetId = this.getAttribute('href');
      if (!targetId || targetId === '#') return;

      const targetElement = document.querySelector(targetId);
      if (targetElement) {
        e.preventDefault();
        const headerOffset = 70;
        const elementPosition = targetElement.getBoundingClientRect().top;
        const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

        window.scrollTo({
          top: offsetPosition,
          behavior: 'smooth'
        });
      }
    });
  });
});
