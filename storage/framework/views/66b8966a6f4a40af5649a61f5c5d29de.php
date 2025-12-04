<?php $__env->startSection('title', 'Profilo'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">
  <h1 class="h3 mb-4">Il mio profilo</h1>
  <p class="text-muted">Clicca l’icona in basso a sinistra per aprire l’offcanvas e modificare rapidamente i tuoi dati.</p>
  <div class="card">
    <div class="card-body">
      <div class="mb-2"><strong>Nome:</strong> <?php echo e($user->name); ?></div>
      <div class="mb-2"><strong>Email:</strong> <?php echo e($user->email); ?></div>
      <div class="mb-0"><strong>Bio:</strong> <?php echo e($user->bio); ?></div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views\profile\bio.blade.php ENDPATH**/ ?>