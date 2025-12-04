<?php
  $status = session('status');
  $error = session('error');
?>

<?php if($status || $error): ?>
  <div class="position-fixed top-0 end-0 p-3" style="z-index: 1080;">
    <div class="toast align-items-center text-bg-<?php echo e($error ? 'danger' : 'success'); ?> border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">
          <?php echo e($status ?? $error); ?>

        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php if(session('success')): ?>
  <div class="alert alert-success alert-dismissible fade show mb-3 auto-dismiss" role="alert" data-timeout="30000">
    <?php echo e(session('success')); ?>

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>
<?php if(session('error')): ?>
  <div class="alert alert-danger alert-dismissible fade show mb-3 auto-dismiss" role="alert" data-timeout="30000">
    <?php echo e(session('error')); ?>

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>
<?php if($errors->any()): ?>
  <div class="alert alert-danger alert-dismissible fade show mb-3 auto-dismiss" role="alert" data-timeout="30000">
    <div class="fw-bold mb-1">Correggi i seguenti errori:</div>
    <ul class="mb-0">
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($e); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>
<?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views/shared/partials/flash.blade.php ENDPATH**/ ?>