

<?php $__env->startSection('title','b_bot Portfolio • Dettaglio Progetto'); ?>

<?php $__env->startSection('content'); ?>
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 m-0"><?php echo e($project->title); ?></h1>
    <div class="d-flex gap-2">
      <a class="btn btn-outline-secondary" href="<?php echo e(route('admin.projects.index')); ?>">Torna</a>
      <a class="btn btn-outline-primary" href="<?php echo e(route('admin.projects.edit', $project)); ?>">Modifica</a>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <?php if($project->type): ?>
        <p class="mb-2"><span class="badge bg-primary">Tipo: <?php echo e($project->type->name); ?></span></p>
      <?php endif; ?>
      
      <?php if($project->technologies && $project->technologies->count()): ?>
        <p class="mb-2 d-flex flex-wrap gap-1">
          <?php $__currentLoopData = $project->technologies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="badge bg-info text-dark"><?php echo e($tech->name); ?></span>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </p>
      <?php endif; ?>

      <?php if($project->image_url): ?>
        <img src="<?php echo e($project->image_url); ?>" alt="" class="mb-3 img-fluid" style="max-height:260px;object-fit:cover;">
      <?php endif; ?>

      <dl class="row mb-0">
        <dt class="col-sm-3">Link</dt>
        <dd class="col-sm-9">
          <?php if($project->link): ?>
            <a href="<?php echo e($project->link); ?>" target="_blank" rel="noopener"><?php echo e($project->link); ?></a>
          <?php else: ?>
            <span class="text-muted">—</span>
          <?php endif; ?>
        </dd>

        <dt class="col-sm-3">GitHub</dt>
        <dd class="col-sm-9">
          <?php if($project->github_url): ?>
            <a href="<?php echo e($project->github_url); ?>" target="_blank" rel="noopener"><?php echo e($project->github_url); ?></a>
          <?php else: ?>
            <span class="text-muted">—</span>
          <?php endif; ?>
        </dd>

        <dt class="col-sm-3">Demo</dt>
        <dd class="col-sm-9">
          <?php if($project->demo_url): ?>
            <a href="<?php echo e($project->demo_url); ?>" target="_blank" rel="noopener"><?php echo e($project->demo_url); ?></a>
          <?php else: ?>
            <span class="text-muted">—</span>
          <?php endif; ?>
        </dd>

        <dt class="col-sm-3">Descrizione</dt>
        <dd class="col-sm-9"><?php echo nl2br(e($project->description)) ?: '<span class="text-muted">—</span>'; ?></dd>
      </dl>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin-sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views\admin\projects\show.blade.php ENDPATH**/ ?>