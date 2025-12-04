<!doctype html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $__env->yieldContent('title', config('app.name')); ?></title>
  
  
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css" />
  
  <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss','resources/js/app.js']); ?>
  <?php echo $__env->yieldPushContent('head'); ?>
</head>
<body class="<?php echo $__env->yieldContent('body_class'); ?>">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="<?php echo e(route('home')); ?>">Portfolio</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-label="Apri/chiudi menu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="mainNav" class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto align-items-lg-center gap-2">
          
          <li class="nav-item"><a class="nav-link" href="<?php echo e(route('home')); ?>">Home</a></li>
          
          <?php if(auth()->guard()->check()): ?>
            <?php if(auth()->user()->is_admin): ?>
              <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.projects.index')); ?>">Admin</a></li>
            <?php endif; ?>
          <?php endif; ?>
          
          <li class="nav-item"><a class="nav-link" href="<?php if(auth()->guard()->check()): ?><?php echo e(route('profile.show')); ?><?php else: ?><?php echo e(route('login')); ?><?php endif; ?>">Profilo</a></li>
          
          <?php if(auth()->guard()->check()): ?>
            <li class="nav-item">
              <form method="POST" action="<?php echo e(route('logout')); ?>" class="ms-lg-2">
                <?php echo csrf_field(); ?>
                <button class="btn btn-outline-light btn-sm" type="submit">Logout</button>
              </form>
            </li>
          <?php else: ?>
            <li class="nav-item"><a class="btn btn-outline-light btn-sm" href="<?php echo e(route('login')); ?>">Login</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  <main class="py-4">
    <div class="<?php echo $__env->yieldContent('container_class','container'); ?>">
      <?php echo $__env->make('shared.partials.flash', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
      <?php echo $__env->yieldContent('content'); ?>
    </div>
  </main>
  
  <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views\layouts\app.blade.php ENDPATH**/ ?>