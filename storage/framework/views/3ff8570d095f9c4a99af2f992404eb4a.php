
<div class="skill-card">
  
  <div class="skill-icon-wrapper">
    <?php if($technology->logo): ?>
      <i class="<?php echo e($technology->logo); ?> skill-icon" aria-hidden="true"></i>
    <?php else: ?>
      <div class="skill-icon skill-icon-fallback">
        <?php echo e(strtoupper(substr($technology->name, 0, 1))); ?>

      </div>
    <?php endif; ?>
  </div>
  
  
  <div class="skill-content">
    <span class="skill-name"><?php echo e($technology->name); ?></span>
    <?php if($technology->category): ?>
      <span class="skill-category"><?php echo e(ucfirst($technology->category)); ?></span>
    <?php endif; ?>
  </div>
  
  
  <?php if(isset($level) && $level): ?>
    <div class="skill-level">
      <span class="level-badge level-<?php echo e($level); ?>"><?php echo e(ucfirst($level)); ?></span>
    </div>
  <?php endif; ?>
</div><?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views/guest/components/skill-card.blade.php ENDPATH**/ ?>