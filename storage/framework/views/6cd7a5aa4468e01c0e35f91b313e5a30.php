
<nav class="sidebar-nav" id="sidebarNav" role="navigation" aria-label="Menu principale">
  <div class="sidebar-inner">
    
    
    <div class="sidebar-links" id="sidebarLinks" role="list">
      
      <a href="<?php echo e(route('home')); ?>#hero" class="sidebar-item <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>" data-section="hero" title="Home Page">
        <?php echo $__env->make('guest.partials.tech-icons', ['icon' => 'sidebar-home', 'size' => 24], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <span class="sidebar-label">Home</span>
      </a>
      
      
      <a href="<?php echo e(route('home')); ?>#projects" class="sidebar-item" data-section="projects" title="I Miei Progetti">
        <?php echo $__env->make('guest.partials.tech-icons', ['icon' => 'sidebar-briefcase', 'size' => 24], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <span class="sidebar-label">Projects</span>
      </a>
      
      
      <a href="<?php echo e(route('home')); ?>#skills" class="sidebar-item" data-section="skills" title="Le Mie Competenze">
        <?php echo $__env->make('guest.partials.tech-icons', ['icon' => 'sidebar-code', 'size' => 24], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <span class="sidebar-label">Skills</span>
      </a>
      
      
      <a href="<?php echo e(route('home')); ?>#bio" class="sidebar-item" data-section="bio" title="Chi Sono">
        <?php echo $__env->make('guest.partials.tech-icons', ['icon' => 'sidebar-user', 'size' => 24], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <span class="sidebar-label">Bio</span>
      </a>
      
      
      <a href="<?php echo e(route('home')); ?>#contact" class="sidebar-item" data-section="contact" title="Contattami">
        <?php echo $__env->make('guest.partials.tech-icons', ['icon' => 'sidebar-mail', 'size' => 24], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <span class="sidebar-label">Contact</span>
      </a>
      
      
      <a href="<?php echo e(asset('files/cv-fabio-bianco.pdf')); ?>" 
         class="sidebar-item sidebar-item-download" 
         download="CV-Fabio-Bianco.pdf"
         title="Scarica il mio CV">
        <?php echo $__env->make('guest.partials.tech-icons', ['icon' => 'sidebar-download', 'size' => 24], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <span class="sidebar-label">CV</span>
      </a>
    </div>
    
    
    <div class="sidebar-divider"></div>
    
    
    <div class="sidebar-social">
      <a href="<?php echo e(config('app.owner_github', 'https://github.com/Fabio-Bianco')); ?>" 
         class="sidebar-social-link" 
         target="_blank" 
         rel="noopener noreferrer"
         title="GitHub"
         aria-label="Visualizza i miei progetti su GitHub">
        <?php echo $__env->make('guest.partials.tech-icons', ['icon' => 'sidebar-github', 'size' => 20], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <span class="social-label">GitHub</span>
      </a>
      
      <a href="<?php echo e(config('app.owner_linkedin', 'https://www.linkedin.com/in/fabio-bianco-008a0b118/')); ?>" 
         class="sidebar-social-link" 
         target="_blank" 
         rel="noopener noreferrer"
         title="LinkedIn"
         aria-label="Collegati su LinkedIn">
        <?php echo $__env->make('guest.partials.tech-icons', ['icon' => 'sidebar-linkedin', 'size' => 20], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <span class="social-label">LinkedIn</span>
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
<?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views/guest/components/sidebar-nav.blade.php ENDPATH**/ ?>