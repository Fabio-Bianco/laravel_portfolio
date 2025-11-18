
<nav class="nav-modern" id="mainNav" role="navigation" aria-label="Menu principale">
  <div class="nav-floating">
    
    <a href="<?php echo e(route('home')); ?>" class="brand-modern" aria-label="Home">
      <div class="brand-icon">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
          <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
        </svg>
      </div>
      <span class="brand-name"><?php echo e(config('app.owner_name', 'Portfolio')); ?></span>
    </a>
    
    
    <div class="nav-menu" id="navLinks" role="list">
      <a href="#hero" class="nav-item active" data-section="hero" aria-current="page">Home</a>
      <a href="#about" class="nav-item" data-section="about" aria-current="false">About</a>
      <a href="#skills" class="nav-item" data-section="skills" aria-current="false">Skills</a>
      <a href="#projects" class="nav-item" data-section="projects" aria-current="false">Work</a>
      <a href="#contact" class="nav-item" data-section="contact" aria-current="false">Contact</a>
    </div>
    
    
    <div class="nav-actions">
      <?php echo $__env->make('guest.partials.theme-switcher-inline', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
      
      <button class="menu-toggle" 
              id="navToggle" 
              aria-label="Menu"
              aria-expanded="false"
              aria-controls="navLinks">
        <span class="menu-line"></span>
        <span class="menu-line"></span>
      </button>
    </div>
  </div>
</nav>


<div class="nav-backdrop" id="navBackdrop"></div>
<?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views/guest/partials/main-nav.blade.php ENDPATH**/ ?>