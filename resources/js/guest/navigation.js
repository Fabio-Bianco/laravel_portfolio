/**
 * Sidebar Navigation - 2025 Best Practices
 * - Intersection Observer API per scroll spy
 * - Event delegation
 * - Focus management
 * - Progressive enhancement
 */
document.addEventListener('DOMContentLoaded', () => {
  const sidebar = document.getElementById('sidebarNav');
  const sidebarLinks = document.getElementById('sidebarLinks');
  const sidebarToggle = document.getElementById('sidebarToggle');
  const sidebarBackdrop = document.getElementById('sidebarBackdrop');
  const sidebarItems = document.querySelectorAll('.sidebar-item');
  
  // Scroll alla home al caricamento della pagina
  if ('scrollRestoration' in history) {
    history.scrollRestoration = 'manual';
  }
  window.scrollTo({ top: 0, left: 0, behavior: 'instant' });
  
  // Event delegation per navigazione smooth
  sidebarLinks?.addEventListener('click', (e) => {
    const link = e.target.closest('.sidebar-item');
    if (!link) return;
    
    e.preventDefault();
    const sectionId = link.dataset.section;
    const section = document.getElementById(sectionId);
    
    if (section) {
      section.scrollIntoView({ behavior: 'smooth', block: 'start' });
      
      // Chiudi sidebar mobile
      if (sidebar?.classList.contains('active')) {
        closeSidebar();
      }
    }
  });
  
  // Toggle sidebar mobile
  sidebarToggle?.addEventListener('click', () => {
    const isExpanded = sidebarToggle.getAttribute('aria-expanded') === 'true';
    
    if (isExpanded) {
      closeSidebar();
    } else {
      openSidebar();
    }
  });
  
  // Funzioni sidebar
  function openSidebar() {
    sidebar?.classList.add('active');
    sidebarBackdrop?.classList.add('active');
    sidebarToggle?.setAttribute('aria-expanded', 'true');
    document.body.style.overflow = 'hidden';
    
    // Focus trap
    const firstLink = sidebar?.querySelector('.sidebar-item');
    firstLink?.focus();
  }
  
  function closeSidebar() {
    sidebar?.classList.remove('active');
    sidebarBackdrop?.classList.remove('active');
    sidebarToggle?.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
  }
  
  // Chiudi sidebar cliccando sul backdrop
  sidebarBackdrop?.addEventListener('click', () => {
    if (sidebar?.classList.contains('active')) {
      closeSidebar();
    }
  });
  
  // Chiudi sidebar con ESC
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && sidebar?.classList.contains('active')) {
      closeSidebar();
      sidebarToggle?.focus();
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
        
        sidebarItems.forEach(link => {
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
});
