

<?php $__env->startSection('title', 'Portfolio Completo - ' . config('app.owner_name')); ?>

<?php $__env->startSection('content'); ?>
<div class="guest-container">
  
  <?php echo $__env->make('guest.components.sidebar-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  
  
  <main class="main-content">
    
    <div class="mb-4">
      <a href="<?php echo e(route('home')); ?>" class="btn-minimal">← Torna alla Home</a>
    </div>
    
    
    <?php echo $__env->make('guest.components.projects-component', ['mode' => 'portfolio'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  </main>

  
  <?php echo $__env->make('guest.components.footer-component', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('guest.layouts.guest-minimal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views/guest/portfolio.blade.php ENDPATH**/ ?>