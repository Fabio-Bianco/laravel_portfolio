<!doctype html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $__env->yieldContent('title', 'b_bot Portfolio'); ?> • <?php echo e(config('app.name')); ?></title>
  
  <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/admin-sidebar.css']); ?>
  
  <?php echo $__env->yieldPushContent('head'); ?>
</head>
<body>
    :root {
      --sidebar-width: 260px;
      --sidebar-bg: #1a1d20;
      --sidebar-hover: #2d3238;
      --sidebar-active: #0d6efd;
      --sidebar-text: #e9ecef;
      --sidebar-text-muted: #adb5bd;
    }
    
    body {
      overflow-x: hidden;
    }
    
    .admin-wrapper {
      display: flex;
      min-height: 100vh;
    }
    
    .admin-sidebar {
      width: var(--sidebar-width);
      background: var(--sidebar-bg);
      color: var(--sidebar-text);
      position: fixed;
      top: 0;
      left: 0;
      bottom: 0;
      overflow-y: auto;
      z-index: 1000;
      transition: transform 0.3s ease;
    }
    
    .admin-sidebar-header {
      padding: 1.5rem 1rem;
      border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    
    .admin-sidebar-header h4 {
      margin: 0;
      font-size: 1.25rem;
      font-weight: 600;
    }
    
    .admin-sidebar-nav {
      padding: 1rem 0;
    }
    
    .admin-nav-item {
      margin: 0.25rem 0.75rem;
    }
    
    .admin-nav-link {
      display: flex;
      align-items: center;
      padding: 0.75rem 1rem;
      color: var(--sidebar-text);
      text-decoration: none;
      border-radius: 0.375rem;
      transition: all 0.2s ease;
      font-size: 0.95rem;
    }
    
    .admin-nav-link:hover {
      background: var(--sidebar-hover);
      color: #fff;
    }
    
    .admin-nav-link.active {
      background: var(--sidebar-active);
      color: #fff;
      font-weight: 500;
    }
    
    .admin-nav-link i,
    .admin-nav-link .icon {
      margin-right: 0.75rem;
      font-size: 1.1rem;
      width: 1.25rem;
      text-align: center;
    }
    
    .admin-nav-collapse-toggle {
      background: transparent;
      border: none;
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: 100%;
      padding: 0.75rem 1rem;
      color: var(--sidebar-text);
      border-radius: 0.375rem;
      transition: all 0.2s ease;
      cursor: pointer;
      font-size: 0.95rem;
    }
    
    .admin-nav-collapse-toggle:hover {
      background: var(--sidebar-hover);
      color: #fff;
    }
    
    .admin-nav-collapse-toggle .icon {
      margin-right: 0.75rem;
    }
    
    .admin-nav-collapse-toggle .chevron {
      transition: transform 0.3s ease;
      font-size: 0.8rem;
    }
    
    .admin-nav-collapse-toggle[aria-expanded="true"] .chevron {
      transform: rotate(180deg);
    }
    
    .admin-nav-submenu {
      list-style: none;
      padding: 0.5rem 0;
      margin: 0;
    }
    
    .admin-nav-submenu .admin-nav-link {
      padding-left: 3rem;
      font-size: 0.9rem;
      color: var(--sidebar-text-muted);
    }
    
    .admin-nav-submenu .admin-nav-link:hover {
      color: #fff;
    }
    
    .admin-nav-divider {
      height: 1px;
      background: rgba(255,255,255,0.1);
      margin: 1rem 0.75rem;
    }
    
    .admin-content {
      margin-left: var(--sidebar-width);
      flex: 1;
      min-height: 100vh;
      background: #f8f9fa;
    }
    
    .admin-topbar {
      background: #fff;
      border-bottom: 1px solid #dee2e6;
      padding: 1rem 1.5rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: sticky;
      top: 0;
      z-index: 100;
    }
    
    .admin-main {
      padding: 2rem 1.5rem;
    }
    
    .admin-user-menu {
      display: flex;
      align-items: center;
      gap: 1rem;
    }
    
    /* Mobile responsive */
    @media (max-width: 768px) {
      .admin-sidebar {
        transform: translateX(-100%);
      }
      
      .admin-sidebar.show {
        transform: translateX(0);
      }
      
      .admin-content {
        margin-left: 0;
      }
    }
    
    /* Dark mode adjustments */
    [data-bs-theme="dark"] .admin-content {
      background: #212529;
  
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
          <?php echo $__env->make('partials.theme-toggle', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
          
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
<?php /**PATH C:\Users\Utente\Desktop\laravel_portfolio\resources\views/layouts/admin-sidebar.blade.php ENDPATH**/ ?>