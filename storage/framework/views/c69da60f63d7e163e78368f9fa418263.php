

<?php $__env->startSection('title','Dettaglio Tipo'); ?>

<?php $__env->startSection('content'); ?>
  <div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3 m-0"><?php echo e(data_get($type,'name','')); ?></h1>
    <div class="d-flex gap-2">
      <a class="btn btn-outline-secondary" href="<?php echo e(route('admin.types.index')); ?>">Torna</a>
      <a class="btn btn-outline-primary" href="<?php echo e(route('admin.types.edit', $type)); ?>">Modifica</a>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
  <p class="mb-2"><strong>Slug:</strong> <span class="text-muted"><?php echo e(data_get($type,'slug') ?: '—'); ?></span></p>
  <p class="mb-0"><strong>Progetti:</strong> —</p>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin-sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views\admin\types\show.blade.php ENDPATH**/ ?>