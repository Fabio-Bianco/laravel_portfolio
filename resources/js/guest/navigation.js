/**
 * Navigation - 2025 Best Practices
 * - Intersection Observer API per scroll spy
 * - Event delegation
 * - Focus management
 * - Progressive enhancement
 */
document.addEventListener('DOMContentLoaded', () => {
  const nav = document.getElementById('mainNav');
  const navLinks = document.getElementById('navLinks');
  const navToggle = document.getElementById('navToggle');
  const navBackdrop = document.getElementById('navBackdrop');
  const navLinksElements = document.querySelectorAll('.nav-item');
  
  // Scroll alla home al caricamento della pagina
  if ('scrollRestoration' in history) {
    history.scrollRestoration = 'manual';
  }
  window.scrollTo({ top: 0, left: 0, behavior: 'instant' });
  
  // Event delegation per navigazione smooth
  navLinks?.addEventListener('click', (e) => {
    const link = e.target.closest('.nav-item');
    if (!link) return;
    
    e.preventDefault();
    const sectionId = link.dataset.section;
    const section = document.getElementById(sectionId);
    
    if (section) {
      section.scrollIntoView({ behavior: 'smooth', block: 'start' });
      
      // Chiudi menu mobile
      if (navLinks.classList.contains('active')) {
        closeMenu();
      }
    }
  });
  
  // Toggle menu mobile
  navToggle?.addEventListener('click', () => {
    const isExpanded = navToggle.getAttribute('aria-expanded') === 'true';
    
    if (isExpanded) {
      closeMenu();
    } else {
      openMenu();
    }
  });
  
  // Funzioni menu
  function openMenu() {
    navToggle?.classList.add('active');
    navLinks?.classList.add('active');
    navBackdrop?.classList.add('active');
    navToggle?.setAttribute('aria-expanded', 'true');
    document.body.style.overflow = 'hidden';
    
    // Focus trap
    const firstLink = navLinks?.querySelector('.nav-item');
    firstLink?.focus();
  }
  
  function closeMenu() {
    navToggle?.classList.remove('active');
    navLinks?.classList.remove('active');
    navBackdrop?.classList.remove('active');
    navToggle?.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
  }
  
  // Chiudi menu cliccando sul backdrop
  navBackdrop?.addEventListener('click', () => {
    if (navLinks?.classList.contains('active')) {
      closeMenu();
    }
  });
  
  // Chiudi menu con ESC
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && navLinks?.classList.contains('active')) {
      closeMenu();
      navToggle?.focus();
    }
  });
  
  // Intersection Observer per scroll spy - Performance 2025
  const observerOptions = {
    root: null,
    rootMargin: '-20% 0px -60% 0px',
    threshold: 0
  };
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const id = entry.target.id;
        
        navLinksElements.forEach(link => {
          const isActive = link.dataset.section === id;
          link.classList.toggle('active', isActive);
          link.setAttribute('aria-current', isActive ? 'page' : 'false');
        });
      }
    });
  }, observerOptions);
  
  // Osserva tutte le sezioni
  document.querySelectorAll('section[id]').forEach(section => {
    observer.observe(section);
  });
  
  // Navbar shadow on scroll - requestAnimationFrame throttling
  let scrollTimeout;
  window.addEventListener('scroll', () => {
    if (scrollTimeout) return;
    
    scrollTimeout = requestAnimationFrame(() => {
      nav?.classList.toggle('scrolled', window.scrollY > 100);
      scrollTimeout = null;
    });
  }, { passive: true });
});
