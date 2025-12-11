

<?php $__env->startSection('title', 'Portfolio'); ?>

<?php $__env->startSection('content'); ?>
<div class="guest-container">
  
  
  <?php echo $__env->make('guest.components.hero-section', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

      
    <?php echo $__env->make('guest.components.projects-component', ['mode' => 'homepage'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> 
  
  
  <?php echo $__env->make('guest.components.skills-component', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

  
  <?php echo $__env->make('guest.components.bio-section', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

  
  <?php echo $__env->make('guest.partials.contact-modern', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('guest.layouts.guest-minimal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views/guest/index-minimal.blade.php ENDPATH**/ ?>