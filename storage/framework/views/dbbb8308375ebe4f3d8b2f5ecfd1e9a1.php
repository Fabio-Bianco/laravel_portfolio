
<nav class="sidebar-nav" id="sidebarNav" role="navigation" aria-label="Menu principale">
  <div class="sidebar-inner">
    
    
    <div class="sidebar-links" id="sidebarLinks" role="list">
      <a href="#hero" class="sidebar-item active" data-section="hero" aria-current="page" title="Home">
        <?php echo $__env->make('guest.partials.tech-icons', ['icon' => 'sidebar-home', 'size' => 24], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <span class="sidebar-label">Home</span>
      </a>
      
      <a href="#about" class="sidebar-item" data-section="about" aria-current="false" title="About">
        <?php echo $__env->make('guest.partials.tech-icons', ['icon' => 'sidebar-user', 'size' => 24], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <span class="sidebar-label">About</span>
      </a>
      
      <a href="#skills" class="sidebar-item" data-section="skills" aria-current="false" title="Skills">
        <?php echo $__env->make('guest.partials.tech-icons', ['icon' => 'sidebar-code', 'size' => 24], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <span class="sidebar-label">Skills</span>
      </a>
      
      <a href="#projects" class="sidebar-item" data-section="projects" aria-current="false" title="Work">
        <?php echo $__env->make('guest.partials.tech-icons', ['icon' => 'sidebar-briefcase', 'size' => 24], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <span class="sidebar-label">Work</span>
      </a>
      
      <a href="#contact" class="sidebar-item" data-section="contact" aria-current="false" title="Contact">
        <?php echo $__env->make('guest.partials.tech-icons', ['icon' => 'sidebar-mail', 'size' => 24], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <span class="sidebar-label">Contact</span>
      </a>
    </div>
    
    
    <div class="sidebar-footer">
      <?php echo $__env->make('guest.partials.theme-switcher-inline', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
    
  </div>
</nav>


<button class="sidebar-toggle" 
        id="sidebarToggle" 
        aria-label="Apri/Chiudi Menu"
        aria-expanded="false"
        aria-controls="sidebarNav">
  <span class="toggle-line"></span>
  <span class="toggle-line"></span>
  <span class="toggle-line"></span>
</button>


<div class="sidebar-backdrop" id="sidebarBackdrop"></div>
<?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views/guest/partials/main-nav.blade.php ENDPATH**/ ?>