

<?php $__env->startSection('page-title', 'Tutti i Progetti'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h2 class="h4 mb-1">🗂️ Tutti i Progetti</h2>
      <p class="text-muted mb-0">Gestisci in batch i progetti: pubblica, nascondi o elimina</p>
    </div>
  </div>

  <div class="card mb-3">
    <div class="card-body">
      <div class="row g-2">
        <div class="col-auto">
          <button type="button" class="btn btn-sm btn-outline-primary" id="selectAll">✓ Seleziona Tutti</button>
          <button type="button" class="btn btn-sm btn-outline-secondary" id="deselectAll">✗ Deseleziona</button>
        </div>
        <div class="col-auto ms-auto">
          <button type="button" class="btn btn-sm btn-success" id="bulkPublish">👁️ Pubblica</button>
          <button type="button" class="btn btn-sm btn-warning" id="bulkUnpublish">🔒 Nascondi</button>
          <button type="button" class="btn btn-sm btn-danger" id="bulkDelete">🗑️ Elimina</button>
        </div>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th style="width: 40px;">
              <input type="checkbox" class="form-check-input" id="checkAll">
            </th>
            <th style="width: 60px;">#</th>
            <th>Titolo</th>
            <th>Tipo</th>
            <th>Tecnologie</th>
            <th>Stato</th>
            <th>GitHub Stars</th>
            <th>Data</th>
          </tr>
        </thead>
        <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
            <td>
              <input type="checkbox" class="form-check-input project-checkbox" value="<?php echo e($p->id); ?>">
            </td>
            <td class="text-muted small"><?php echo e($p->id); ?></td>
            <td>
              <div class="d-flex align-items-center gap-2">
                <strong><?php echo e($p->title); ?></strong>
                <?php if($p->is_featured): ?>
                  <i class="bi bi-star-fill text-warning" title="Featured"></i>
                <?php endif; ?>
              </div>
              <?php if($p->description): ?>
                <small class="text-muted d-block"><?php echo e(Str::limit($p->description, 80)); ?></small>
              <?php endif; ?>
            </td>
            <td>
              <?php if($p->type): ?>
                <span class="badge bg-primary"><?php echo e($p->type->name); ?></span>
              <?php else: ?>
                <span class="text-muted">—</span>
              <?php endif; ?>
            </td>
            <td>
              <?php if($p->technologies && $p->technologies->count()): ?>
                <div class="d-flex gap-1 flex-wrap">
                  <?php $__currentLoopData = $p->technologies->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="badge bg-info text-dark"><?php echo e($tech->name); ?></span>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php if($p->technologies->count() > 3): ?>
                    <span class="badge bg-secondary">+<?php echo e($p->technologies->count() - 3); ?></span>
                  <?php endif; ?>
                </div>
              <?php else: ?>
                <span class="text-muted">—</span>
              <?php endif; ?>
            </td>
            <td>
              <?php if($p->is_published): ?>
                <span class="badge bg-success">Pubblicato</span>
              <?php else: ?>
                <span class="badge bg-secondary">Draft</span>
              <?php endif; ?>
            </td>
            <td class="text-center">
              <?php if($p->stargazers_count): ?>
                <span class="badge bg-warning text-dark">
                  ⭐ <?php echo e($p->stargazers_count); ?>

                </span>
              <?php else: ?>
                <span class="text-muted">—</span>
              <?php endif; ?>
            </td>
            <td class="text-muted small">
              <?php echo e($p->created_at->format('d/m/Y')); ?>

            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr>
            <td colspan="8" class="text-center text-muted py-4">
              Nessun progetto trovato.
            </td>
          </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="mt-3 text-muted small">
    <strong>Totale progetti:</strong> <?php echo e($projects->count()); ?>

    <span class="ms-3"><strong>Pubblicati:</strong> <?php echo e($projects->where('is_published', true)->count()); ?></span>
    <span class="ms-3"><strong>Draft:</strong> <?php echo e($projects->where('is_published', false)->count()); ?></span>
    <span class="ms-3"><strong>Featured:</strong> <?php echo e($projects->where('is_featured', true)->count()); ?></span>
  </div>

</div>

<form id="bulkPublishForm" method="POST" action="<?php echo e(route('admin.projects.bulk-publish')); ?>" style="display:none;">
  <?php echo csrf_field(); ?>
  <div id="publishInputs"></div>
</form>

<form id="bulkUnpublishForm" method="POST" action="<?php echo e(route('admin.projects.bulk-unpublish')); ?>" style="display:none;">
  <?php echo csrf_field(); ?>
  <div id="unpublishInputs"></div>
</form>

<form id="bulkDeleteForm" method="POST" action="<?php echo e(route('admin.projects.bulk-delete')); ?>" style="display:none;">
  <?php echo csrf_field(); ?>
  <?php echo method_field('DELETE'); ?>
  <div id="deleteInputs"></div>
</form>

<?php $__env->startPush('head'); ?>
  <?php echo app('Illuminate\Foundation\Vite')(['resources/js/admin/projects-bulk.js']); ?>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin-sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views\admin\debug\projects.blade.php ENDPATH**/ ?>