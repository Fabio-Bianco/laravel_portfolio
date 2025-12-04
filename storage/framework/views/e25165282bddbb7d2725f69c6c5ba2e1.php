

<?php $__env->startSection('title','Dettaglio tecnologia'); ?>

<?php $__env->startSection('content'); ?>
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 m-0"><?php echo e($technology->name); ?></h1>
    <div class="d-flex gap-2">
      <a class="btn btn-outline-secondary" href="<?php echo e(route('admin.technologies.index')); ?>">Torna</a>
      <a class="btn btn-outline-primary" href="<?php echo e(route('admin.technologies.edit', $technology)); ?>">Modifica</a>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <dl class="row mb-0">
        <dt class="col-sm-3">Slug</dt>
        <dd class="col-sm-9"><?php echo e($technology->slug ?: '—'); ?></dd>
      </dl>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin-sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views\admin\technologies\show.blade.php ENDPATH**/ ?>