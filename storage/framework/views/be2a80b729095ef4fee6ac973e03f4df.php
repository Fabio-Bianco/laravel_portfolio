
<section class="projects-section" id="projects">
  
  <div class="section-header">
    <span class="section-tag">I Miei Lavori</span>
    <h2 class="section-title">Progetti Portfolio</h2>
    <p class="section-subtitle">Selezione dei miei progetti più significativi</p>
  </div>
  
  
  <?php echo $__env->make('guest.components.partials.projects-filters', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  
  
  <div class="projects-container">
<p>Qui include project.card per iterare le card</p>
  </div>
</section><?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views/guest/components/projects-component.blade.php ENDPATH**/ ?>