<!doctype html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $__env->yieldContent('title', 'b_bot Portfolio'); ?> • <?php echo e(config('app.name')); ?></title>
  
  <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>
  
  <?php echo $__env->yieldPushContent('head'); ?>
</head>
<body>
  
  
  <div class="admin-wrapper">
    
    
    <aside class="admin-sidebar">
      <div class="admin-sidebar-header">
        <h4>⚙️ b_bot Portfolio</h4>
        <small class="text-muted d-block mt-1"><?php echo e(auth()->user()->name); ?></small>
      </div>
      
      <nav class="admin-sidebar-nav">
        
        
        <div class="admin-nav-item">
          <a href="<?php echo e(route('home')); ?>" class="admin-nav-link" target="_blank">
            <span class="icon">🌐</span>
            <span>Vedi Vetrina Guest</span>
          </a>
        </div>
        
        <div class="admin-nav-divider"></div>
        
        
        <div class="admin-nav-item">
          <button class="admin-nav-collapse-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#gestisciMenu" aria-expanded="true">
            <span class="d-flex align-items-center">
              <span class="icon">📁</span>
              <span>Gestisci</span>
            </span>
            <span class="chevron">▼</span>
          </button>
          
          <div class="collapse show" id="gestisciMenu">
            <ul class="admin-nav-submenu">
              <li>
                <a href="<?php echo e(route('admin.projects.all')); ?>" class="admin-nav-link <?php echo e(request()->routeIs('admin.projects.all') ? 'active' : ''); ?>">
                  🗂️ Tutti i Progetti
                </a>
              </li>
              <li>
                <a href="<?php echo e(route('admin.projects.cards')); ?>" class="admin-nav-link <?php echo e(request()->routeIs('admin.projects.cards') ? 'active' : ''); ?>">
                  ✏️ Modifica Progetti
                </a>
              </li>
            </ul>
          </div>
        </div>
        
        <div class="admin-nav-divider"></div>
        
        
        <div class="admin-nav-item">
          <a href="<?php echo e(route('admin.technologies.index')); ?>" class="admin-nav-link <?php echo e(request()->routeIs('admin.technologies.*') ? 'active' : ''); ?>">
            <span class="icon">🔧</span>
            <span>Tecnologie</span>
          </a>
        </div>
        
        
        <div class="admin-nav-item">
          <a href="<?php echo e(route('admin.types.index')); ?>" class="admin-nav-link <?php echo e(request()->routeIs('admin.types.*') ? 'active' : ''); ?>">
            <span class="icon">📂</span>
            <span>Tipi</span>
          </a>
        </div>
        
        <div class="admin-nav-divider"></div>
        
        
        <div class="admin-nav-item">
          <a href="<?php echo e(route('admin.projects.index')); ?>" class="admin-nav-link <?php echo e(request()->routeIs('admin.projects.index') ? 'active' : ''); ?>">
            <span class="icon">📥</span>
            <span>Import GitHub</span>
          </a>
        </div>
        
        <div class="admin-nav-divider"></div>
        
        
        <div class="admin-nav-item">
          <a href="<?php echo e(route('admin.profile.edit')); ?>" class="admin-nav-link <?php echo e(request()->routeIs('admin.profile.*') ? 'active' : ''); ?>">
            <span class="icon">👤</span>
            <span>Il Mio Profilo</span>
          </a>
        </div>
        
      </nav>
    </aside>
    
    
    <main class="admin-content">
      
      
      <div class="admin-topbar">
        <div>
          <h1 class="h4 mb-0"><?php echo $__env->yieldContent('page-title', 'Dashboard'); ?></h1>
        </div>
        
        <div class="admin-user-menu">
          <a href="<?php echo e(route('profile.show')); ?>" class="btn btn-sm btn-outline-secondary">
            👤 Profilo
          </a>
          
          <form method="POST" action="<?php echo e(route('logout')); ?>" class="d-inline">
            <?php echo csrf_field(); ?>
            <button class="btn btn-sm btn-outline-danger" type="submit">Logout</button>
          </form>
        </div>
      </div>
      
      
      <div class="admin-main">
        
        <?php if(session('success')): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>✓</strong> <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        <?php endif; ?>
        
        <?php if(session('error')): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>✗</strong> <?php echo e(session('error')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        <?php endif; ?>
        
        <?php if($errors->any()): ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>⚠️ Errori:</strong>
            <ul class="mb-0 mt-2">
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        <?php endif; ?>
        
        <?php echo $__env->yieldContent('content'); ?>
        
      </div>
      
    </main>
    
  </div>
  
  <?php echo $__env->yieldPushContent('scripts'); ?>
  
</body>
</html>
<?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views\admin\layouts\admin-sidebar.blade.php ENDPATH**/ ?>