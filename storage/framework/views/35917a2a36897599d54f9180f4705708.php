
<section class="projects-section" id="projects" role="region" aria-labelledby="projects-heading">
  <div class="section-header">
    <span class="section-tag">I Miei Lavori</span>
    <h2 id="projects-heading" class="section-title">Progetti Portfolio</h2>
    <p class="section-subtitle">Selezione dei miei progetti più significativi</p>
  </div>
  
  <div class="projects-container">
    
    <div class="projects-grid">
      <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php echo $__env->make('guest.components.project-card', ['project' => $project], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="empty-projects-state">
          <div class="empty-icon">💼</div>
          <p>Nessun progetto da mostrare</p>
          <small class="text-muted">I progetti verranno visualizzati qui</small>
        </div>
      <?php endif; ?>
    </div>
    
    
    <?php if($projects->hasPages()): ?>
      <div class="projects-pagination">
        <?php echo e($projects->links()); ?>

      </div>
    <?php endif; ?>
  </div>
</section><?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views/guest/components/partials/projects-main.blade.php ENDPATH**/ ?>