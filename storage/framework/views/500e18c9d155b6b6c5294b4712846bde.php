
<div class="bio-sidebar" id="bioSidebar">
  <div class="bio-sidebar-content">
    <button class="bio-close" id="bioClose">✕</button>
    
    <div class="bio-header">
      <div class="bio-avatar">
        <?php echo e(strtoupper(substr(auth()->user()->name ?? 'FB', 0, 2))); ?>

      </div>
      <h2><?php echo e(auth()->user()->name ?? 'Fabio Bianco'); ?></h2>
      <p class="text-muted">Full Stack Developer</p>
    </div>
    
    <div class="bio-body">
      <h3>About Me</h3>
      <p>
        <?php echo e(auth()->user()->bio ?? 'Sviluppatore appassionato di tecnologie web moderne. Specializzato in Laravel, JavaScript e React. Sempre alla ricerca di nuove sfide e opportunità di crescita.'); ?>

      </p>
      
      <h3 style="margin-top: 2rem;">Skills</h3>
      <div class="skills-list">
        <span class="skill-tag">JavaScript</span>
        <span class="skill-tag">React</span>
        <span class="skill-tag">PHP</span>
        <span class="skill-tag">Laravel</span>
        <span class="skill-tag">MySQL</span>
        <span class="skill-tag">Git</span>
        <span class="skill-tag">REST API</span>
      </div>
    </div>
  </div>
  <div class="bio-overlay" id="bioOverlay"></div>
</div><?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views/guest/partials/bio-sidebar.blade.php ENDPATH**/ ?>