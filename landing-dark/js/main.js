/**
 * NAVAGRUHA RRR PREKSHITHA ENCLAVE - DARK EDITORIAL LANDING PAGE SCRIPT
 * Handles header transitions, reading line, subtle scroll reveals, layout lightbox, and form UX.
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

  viewFullLayoutBtn?.addEventListener('click', openViewer);
  closeModalBtn?.addEventListener('click', closeViewer);
  zoomInBtn?.addEventListener('click', zoomIn);
  zoomOutBtn?.addEventListener('click', zoomOut);
  zoomResetBtn?.addEventListener('click', resetViewer);
  layoutModal?.addEventListener('click', (e) => {
    if (e.target === layoutModal) {
      closeViewer();
    }
  });

  // Esc key listener
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && layoutModal?.classList.contains('is-active')) {
      closeViewer();
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

  // --- 5. VISIT FORM VALIDATION & TOAST ---
  const siteVisitForm = document.getElementById('siteVisitForm');
  const visitorName = document.getElementById('visitorName');
  const visitorPhone = document.getElementById('visitorPhone');
  const visitorDate = document.getElementById('visitorDate');
  const nameError = document.getElementById('nameError');
  const phoneError = document.getElementById('phoneError');
  const dateError = document.getElementById('dateError');
  const toastMessage = document.getElementById('toastMessage');
  const toastText = document.getElementById('toastText');

  if (visitorDate) {
    visitorDate.min = new Date().toISOString().split('T')[0];
  }

  function displayToast(msg) {
    if (toastMessage && toastText) {
      toastText.textContent = msg;
      toastMessage.classList.add('show');
      setTimeout(() => {
        toastMessage.classList.remove('show');
      }, 5000);
    }
  }

  siteVisitForm?.addEventListener('submit', (e) => {
    e.preventDefault();
    let valid = true;

    const name = visitorName?.value.trim() || '';
    if (name.length < 2) {
      if (nameError) nameError.style.display = 'block';
      visitorName?.focus();
      valid = false;
    } else {
      if (nameError) nameError.style.display = 'none';
    }

    const phone = visitorPhone?.value.trim() || '';
    const phonePattern = /^[0-9+\s-]{10,15}$/;
    if (!phonePattern.test(phone.replace(/\s+/g, ''))) {
      if (phoneError) phoneError.style.display = 'block';
      if (valid) visitorPhone?.focus();
      valid = false;
    } else {
      if (phoneError) phoneError.style.display = 'none';
    }

    const dateVal = visitorDate?.value || '';
    if (!dateVal) {
      if (dateError) dateError.style.display = 'block';
      if (valid) visitorDate?.focus();
      valid = false;
    } else {
      if (dateError) dateError.style.display = 'none';
    }

    if (valid) {
      const submitBtn = document.getElementById('submitVisitBtn');
      const prevHtml = submitBtn?.innerHTML || '';
      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span>Processing...</span>';
      }

      setTimeout(() => {
        displayToast(`Thank you, ${name}. Your site visit request has been recorded. Our team will contact you shortly.`);
        siteVisitForm.reset();
        if (submitBtn) {
          submitBtn.disabled = false;
          submitBtn.innerHTML = prevHtml;
        }
      }, 650);
    }
  });

  // --- 6. SMOOTH ANCHOR SCROLLING ---
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', function(e) {
      const id = this.getAttribute('href');
      if (!id || id === '#') return;

      const target = document.querySelector(id);
      if (target) {
        e.preventDefault();
        const headerH = 70;
        const pos = target.getBoundingClientRect().top + window.pageYOffset - headerH;
        window.scrollTo({
          top: pos,
          behavior: 'smooth'
        });
      }
    });
  });
});
