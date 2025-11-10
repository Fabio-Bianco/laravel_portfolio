
<nav class="main-nav" id="mainNav" role="navigation" aria-label="Main navigation">
  <div class="nav-container">
    
    <a href="#hero" class="nav-brand" onclick="event.preventDefault(); document.getElementById('hero').scrollIntoView({behavior: 'smooth'});" aria-label="Home">
      <span class="brand-text"><?php echo e(auth()->user()->name ?? 'FB'); ?></span>
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
        About
      </a>
      <a href="#skills" 
         class="nav-link" 
         onclick="event.preventDefault(); scrollToSection('skills', this)"
         data-section="skills">
        Skills
      </a>
      <a href="#projects" 
         class="nav-link" 
         onclick="event.preventDefault(); scrollToSection('projects', this)"
         data-section="projects">
        Projects
      </a>
      <a href="#contact" 
         class="nav-link" 
         onclick="event.preventDefault(); scrollToSection('contact', this)"
         data-section="contact">
        Contact
      </a>
    </div>
    
    
    <button class="nav-toggle" 
            id="navToggle" 
            aria-label="Toggle navigation menu"
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
     * Scroll spy - Update active link based on scroll position
     */
    const sections = document.querySelectorAll('section[id]');
    const navLinksElements = document.querySelectorAll('.nav-link');
    
    function updateActiveLink() {
      let currentSection = '';
      
      sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        
        if (window.scrollY >= (sectionTop - 200)) {
          currentSection = section.getAttribute('id');
        }
      });
      
      navLinksElements.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('data-section') === currentSection) {
          link.classList.add('active');
        }
      });
    }
    
    // Update on scroll (throttled)
    let scrollTimeout;
    window.addEventListener('scroll', function() {
      if (scrollTimeout) {
        window.cancelAnimationFrame(scrollTimeout);
      }
      scrollTimeout = window.requestAnimationFrame(function() {
        updateActiveLink();
        
        // Add shadow to navbar on scroll
        const nav = document.getElementById('mainNav');
        if (window.scrollY > 100) {
          nav.classList.add('scrolled');
        } else {
          nav.classList.remove('scrolled');
        }
      });
    });
    
    // Initial check
    updateActiveLink();
  });
</script>
<?php /**PATH C:\Users\Utente\Desktop\laravel_portfolio\resources\views/partials/main-nav.blade.php ENDPATH**/ ?>