

<?php $__env->startSection('page-title', 'Tipi'); ?>

<?php $__env->startSection('content'); ?>
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 m-0">Tipi</h1>
    <a href="<?php echo e(route('admin.types.create')); ?>" class="btn btn-primary">Nuovo tipo</a>
  </div>

  <div class="card">
    <div class="table-responsive">
      <table class="table table-striped mb-0">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Slug</th>
            <th class="text-end">Azioni</th>
          </tr>
        </thead>
        <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
              <td><a href="<?php echo e(route('admin.types.show', $t)); ?>"><?php echo e($t->name); ?></a></td>
              <td class="text-muted"><?php echo e($t->slug); ?></td>
              <td class="text-end">
                <a href="<?php echo e(route('admin.types.edit', $t)); ?>" class="btn btn-sm btn-outline-primary">Modifica</a>
                <form action="<?php echo e(route('admin.types.destroy', $t)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Eliminare definitivamente?')">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                  <button class="btn btn-sm btn-outline-danger" type="submit">Elimina</button>
                </form>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="3" class="text-center text-muted">Nessun tipo.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin-sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views\admin\types\index.blade.php ENDPATH**/ ?>