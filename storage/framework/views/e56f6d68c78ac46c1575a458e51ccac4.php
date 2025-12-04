
<div class="learning-skill-card">
  
  <div class="learning-icon-wrapper">
    <?php if($technology->logo): ?>
      <i class="<?php echo e($technology->logo); ?> learning-icon" aria-hidden="true"></i>
    <?php else: ?>
      <div class="learning-icon learning-icon-fallback">
        <?php echo e(strtoupper(substr($technology->name, 0, 1))); ?>

      </div>
    <?php endif; ?>
  </div>
  
  
  <div class="learning-content">
    <span class="learning-name"><?php echo e($technology->name); ?></span>
    <?php if($technology->category): ?>
      <span class="learning-category"><?php echo e(ucfirst($technology->category)); ?></span>
    <?php endif; ?>
  </div>
  
  
  <div class="learning-status">
    <span class="learning-badge">In Studio</span>
    <?php if(isset($progress) && $progress): ?>
      <div class="learning-progress">
        <div class="progress-bar" style="width: <?php echo e($progress); ?>%"></div>
      </div>
    <?php endif; ?>
  </div>
  
  
  <?php if(isset($startedAt) && $startedAt): ?>
    <div class="learning-time">
      <small class="text-muted">Da <?php echo e($startedAt->diffForHumans()); ?></small>
    </div>
  <?php endif; ?>
</div><?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views/guest/components/learning-skill-card.blade.php ENDPATH**/ ?>