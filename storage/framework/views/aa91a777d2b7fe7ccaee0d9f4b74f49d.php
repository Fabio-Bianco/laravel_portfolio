
<section class="projects-filters-section" id="project-filters" role="region" aria-labelledby="filters-heading">
  <div class="section-header">
    <h3 id="filters-heading" class="filter-title">Filtra per Categoria</h3>
  </div>
  
  <div class="filters-container">
    
    <div class="filter-tabs">
      <a href="<?php echo e(route('home')); ?>" 
         class="filter-tab <?php echo e(!$currentType ? 'active' : ''); ?>">
        <span class="filter-name">Tutti</span>
        <span class="filter-count"><?php echo e($projects->total()); ?></span>
      </a>
      
      <?php $__currentLoopData = $allTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('home', ['type' => $type->slug])); ?>" 
           class="filter-tab <?php echo e($currentType && $currentType->id === $type->id ? 'active' : ''); ?>">
          <span class="filter-name"><?php echo e($type->name); ?></span>
          <span class="filter-count"><?php echo e($typeCounts[$type->id] ?? 0); ?></span>
        </a>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section><?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views/guest/components/partials/projects-filters.blade.php ENDPATH**/ ?>