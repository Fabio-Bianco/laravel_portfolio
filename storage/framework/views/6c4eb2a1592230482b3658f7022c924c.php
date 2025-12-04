

<?php $__env->startSection('page-title', 'Tecnologie'); ?>

<?php $__env->startSection('content'); ?>
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 m-0">Tecnologie</h1>
    <a class="btn btn-primary" href="<?php echo e(route('admin.technologies.create')); ?>">Nuova tecnologia</a>
  </div>

  <div class="card">
    <div class="card-body">
      <?php if($technologies->count()): ?>
        <table class="table align-middle">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Slug</th>
              <th class="text-end">Azioni</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $technologies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($tech->name); ?></td>
                <td class="text-muted"><?php echo e($tech->slug); ?></td>
                <td class="text-end">
                  <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(route('admin.technologies.show', $tech)); ?>">Vedi</a>
                  <a class="btn btn-sm btn-outline-primary" href="<?php echo e(route('admin.technologies.edit', $tech)); ?>">Modifica</a>
                  <form action="<?php echo e(route('admin.technologies.destroy', $tech)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Eliminare questa tecnologia?')">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-sm btn-outline-danger" type="submit">Elimina</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
        <?php echo e($technologies->links()); ?>

      <?php else: ?>
        <p class="mb-0 text-muted">Nessuna tecnologia presente.</p>
      <?php endif; ?>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin-sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views\admin\technologies\index.blade.php ENDPATH**/ ?>