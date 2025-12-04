

<?php $__env->startSection('title','Nuovo Progetto'); ?>

<?php $__env->startSection('content'); ?>
  <h1 class="h3 mb-3">Nuovo progetto</h1>
  <div class="card">
    <div class="card-body">
      <form action="<?php echo e(route('admin.projects.store')); ?>" method="POST">
        <?php echo $__env->make('admin.projects._form', ['project' => $project, 'method' => 'POST'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
      </form>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin-sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views\admin\projects\create.blade.php ENDPATH**/ ?>