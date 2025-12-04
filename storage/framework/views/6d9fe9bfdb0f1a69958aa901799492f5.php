<!doctype html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $__env->yieldContent('title','b_bot Portfolio'); ?></title>
  
  <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss','resources/js/app.js']); ?>
  <?php echo $__env->yieldPushContent('head'); ?>
</head>
<body class="<?php echo $__env->yieldContent('body_class'); ?>">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
  <a class="navbar-brand" href="<?php echo e(route('admin.dashboard')); ?>">b_bot Portfolio</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav" aria-controls="adminNav" aria-expanded="false" aria-label="Apri/chiudi menu amministrazione">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="adminNav">
        <ul class="navbar-nav ms-auto align-items-lg-center gap-2">
          <li class="nav-item"><a class="nav-link" href="<?php echo e(route('home')); ?>">Portfolio pubblico</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.projects.index')); ?>">Progetti</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.technologies.index')); ?>">Tecnologie</a></li>
          <?php if(Route::has('admin.types.index')): ?>
          <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.types.index')); ?>">Tipi</a></li>
          <?php endif; ?>
          <li class="nav-item"><a class="nav-link text-warning" href="<?php echo e(route('admin.debug.projects')); ?>">🧹 Debug</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo e(route('profile.show')); ?>">Profilo</a></li>
          <li class="nav-item">
            <form method="POST" action="<?php echo e(route('logout')); ?>" class="d-inline">
              <?php echo csrf_field(); ?>
              <button class="btn btn-outline-light btn-sm" type="submit">Logout</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="container py-4">
    <?php echo $__env->make('shared.partials.flash', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
  </main>
  
  <!-- Modal di conferma eliminazione (disponibile in tutto l'admin) -->
  <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmDeleteLabel">Conferma eliminazione</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Vuoi eliminare definitivamente il progetto: <strong id="deleteProjectName">—</strong>?</p>
          <p class="mb-0 text-danger small">Questa azione non può essere annullata.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
          <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Elimina</button>
        </div>
      </div>
    </div>
  </div>
  <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views\admin\layouts\admin.blade.php ENDPATH**/ ?>