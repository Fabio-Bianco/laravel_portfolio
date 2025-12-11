
<section class="projects-section" id="projects">
  <?php if(isset($mode) && $mode === 'homepage'): ?>
    
    <div class="section-header">
      <span class="section-tag">I Miei Lavori</span>
      <h2 class="section-title">Progetti in Evidenza</h2>
      
    </div>
    
    
    <?php if($projects && $projects->count()): ?>
      
      <?php echo $__env->make('guest.components.projects-carousel', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
      
      
      <div class="text-center mt-4">
        <a href="<?php echo e(route('portfolio')); ?>" class="btn btn-view-all">Vedi tutti i progetti →</a>
      </div>
    <?php else: ?>
      <div class="empty-state text-center">
        <div class="empty-icon">💼</div>
        <p><strong>Debug:</strong> Nessun progetto featured trovato</p>
        <p>Controlla che ci siano progetti con <code>is_published=1</code> e <code>is_featured=1</code></p>
        <a href="<?php echo e(route('portfolio')); ?>" class="btn-secondary mt-2">Vedi tutti i progetti →</a>
      </div>
    <?php endif; ?>
  
  <?php else: ?>
    
    <div class="section-header">
      <span class="section-tag">Portfolio Completo</span>
      <h2 class="section-title">Tutti i Progetti</h2>
      <p class="section-subtitle">Esplora la collezione completa</p>
    </div>
    
    
    <?php if(isset($allTypes)): ?>
      <?php echo $__env->make('guest.components.partials.projects-filters', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php endif; ?>
    
    
    <div class="projects-container">
      <div class="projects-grid">
        <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <?php echo $__env->make('guest.components.project-card', ['project' => $project, 'style' => 'grid'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <div class="empty-projects-state">
            <div class="empty-icon">💼</div>
            <p>Nessun progetto da mostrare</p>
            <small class="text-muted">Prova a cambiare i filtri di ricerca</small>
          </div>
        <?php endif; ?>
      </div>
      
      
      <?php if($projects && method_exists($projects, 'hasPages') && $projects->hasPages()): ?>
        <div class="projects-pagination">
          <?php echo e($projects->links()); ?>

        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</section><?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views/guest/components/projects-component.blade.php ENDPATH**/ ?>