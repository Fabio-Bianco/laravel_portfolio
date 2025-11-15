
<nav class="main-nav" id="mainNav" role="navigation" aria-label="Menu principale">
  <div class="nav-container">
    
    <a href="<?php echo e(route('home')); ?>" class="nav-brand" aria-label="Home">
      <span class="brand-text"><?php echo e(config('app.owner_name', 'FB')); ?></span>
    </a>
    
    
    <div class="nav-links" id="navLinks">
      <a href="#hero" 
         class="nav-link active" 
         onclick="event.preventDefault(); scrollToSection('hero', this)"
         data-section="hero">
        Home
      </a>
      <a href="#about" 
         class="nav-link" 
         onclick="event.preventDefault(); scrollToSection('about', this)"
         data-section="about">
        Chi Sono
      </a>
      <a href="#skills" 
         class="nav-link" 
         onclick="event.preventDefault(); scrollToSection('skills', this)"
         data-section="skills">
        Competenze
      </a>
      <a href="#projects" 
         class="nav-link" 
         onclick="event.preventDefault(); scrollToSection('projects', this)"
         data-section="projects">
        Progetti
      </a>
      <a href="#contact" 
         class="nav-link" 
         onclick="event.preventDefault(); scrollToSection('contact', this)"
         data-section="contact">
        Contatti
      </a>
    </div>
    
    
    <button class="nav-toggle" 
            id="navToggle" 
            aria-label="Apri/chiudi menu di navigazione"
            aria-expanded="false"
            aria-controls="navLinks">
      <span class="nav-toggle-icon"></span>
    </button>
  </div>
</nav>

<script>
  /**
   * Smooth scroll to section with active state
   */
  function scrollToSection(sectionId, linkElement) {
    const section = document.getElementById(sectionId);
    if (!section) return;
    
    // Remove active class from all links
    document.querySelectorAll('.nav-link').forEach(link => {
      link.classList.remove('active');
    });
    
    // Add active class to clicked link
    if (linkElement) {
      linkElement.classList.add('active');
    }
    
    // Scroll to section
    section.scrollIntoView({ behavior: 'smooth' });
    
    // Close mobile menu if open
    const navLinks = document.getElementById('navLinks');
    const navToggle = document.getElementById('navToggle');
    if (navLinks.classList.contains('active')) {
      navLinks.classList.remove('active');
      navToggle.classList.remove('active');
      navToggle.setAttribute('aria-expanded', 'false');
    }
  }
  
  /**
   * Mobile menu toggle
   */
  document.addEventListener('DOMContentLoaded', function() {
    const navToggle = document.getElementById('navToggle');
    const navLinks = document.getElementById('navLinks');
    
    if (navToggle && navLinks) {
      navToggle.addEventListener('click', function() {
        const isExpanded = this.getAttribute('aria-expanded') === 'true';
        
        this.classList.toggle('active');
        navLinks.classList.toggle('active');
        this.setAttribute('aria-expanded', !isExpanded);
      });
    }
    
  /**
   * Scroll spy - Update active link based on scroll position with improved performance
   */
  const sections = document.querySelectorAll('section[id]');
  const navLinksElements = document.querySelectorAll('.nav-link');
  let lastKnownScrollPosition = 0;
  let ticking = false;
  
  function updateActiveLink() {
    const scrollPosition = window.scrollY;
    let currentSection = '';
    const navOffset = 100; // Offset per il menu fisso
    
    // Ottimizzazione: memorizziamo le altezze delle sezioni
    const sectionPositions = Array.from(sections).map(section => ({
      id: section.id,
      top: section.offsetTop - navOffset,
      bottom: section.offsetTop + section.clientHeight - navOffset
    }));
    
    // Troviamo la sezione attiva
    for (let i = 0; i < sectionPositions.length; i++) {
      const { id, top, bottom } = sectionPositions[i];
      if (scrollPosition >= top && scrollPosition < bottom) {
        currentSection = id;
        break;
      }
    }
    
    // Gestione fine pagina
    if (!currentSection && window.innerHeight + scrollPosition >= document.documentElement.scrollHeight - navOffset) {
      currentSection = sections[sections.length - 1]?.id;
    }
    
    // Update active state
    navLinksElements.forEach(link => {
      const section = link.getAttribute('data-section');
      link.classList.toggle('active', section === currentSection);
      link.setAttribute('aria-current', section === currentSection ? 'page' : 'false');
    });
  }    // Throttled scroll handler
    window.addEventListener('scroll', () => {
      lastKnownScrollPosition = window.scrollY;
      
      if (!ticking) {
        window.requestAnimationFrame(() => {
          updateActiveLink();
          
          // Add shadow to navbar on scroll with reduced reflow
          const nav = document.getElementById('mainNav');
          nav.classList.toggle('scrolled', lastKnownScrollPosition > 100);
          
          ticking = false;
        });
        
        ticking = true;
      }
    });
    
    // Initial check
    updateActiveLink();
  });
</script>
<?php /**PATH C:\Users\Utente\Desktop\laravel_portfolio\resources\views/guest/partials/main-nav.blade.php ENDPATH**/ ?>