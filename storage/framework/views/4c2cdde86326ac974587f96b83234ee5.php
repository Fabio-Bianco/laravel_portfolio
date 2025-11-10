<!doctype html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  
  <title><?php echo $__env->yieldContent('title', 'Portfolio'); ?> • <?php echo e(config('app.owner_name')); ?> - Full Stack Developer</title>
  <meta name="description" content="Portfolio di <?php echo e(config('app.owner_name')); ?> - Full Stack Developer specializzato in Laravel, React e JavaScript. Scopri i miei progetti e contattami per collaborazioni.">
  <meta name="author" content="<?php echo e(config('app.owner_name')); ?>">
  <meta name="keywords" content="full stack developer, laravel, react, javascript, php, web development, portfolio">
  
  
  <meta property="og:title" content="<?php echo e(config('app.owner_name')); ?> - Full Stack Developer Portfolio">
  <meta property="og:description" content="Scopri i miei progetti e competenze nel web development. Specializzato in Laravel, React e JavaScript.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo e(url('/')); ?>">
  <meta property="og:site_name" content="<?php echo e(config('app.owner_name')); ?> Portfolio">
  
  
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo e(config('app.owner_name')); ?> - Full Stack Developer">
  <meta name="twitter:description" content="Portfolio di progetti web con Laravel, React e JavaScript">
  
  
  <link rel="canonical" href="<?php echo e(url()->current()); ?>">
  
  
  <?php echo app('Illuminate\Foundation\Vite')([
    'resources/sass/app.scss', 
    'resources/js/app.js', 
    'resources/css/guest-minimal.css', 
    'resources/js/guest-bio-sidebar.js',
    'resources/js/contact-form.js'
  ]); ?>
  
  <?php echo $__env->yieldPushContent('head'); ?>
</head>
<body>
  
  
  <?php echo $__env->make('partials.main-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  
  
  <?php echo $__env->make('partials.bio-sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  
  
  <?php echo $__env->make('partials.bio-toggle', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  
  
  <?php echo $__env->make('partials.contacts-widget', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  
  
  <?php echo $__env->yieldContent('content'); ?>
  
  
  <div class="theme-toggle-guest" id="themeToggle">
    <?php echo $__env->make('partials.theme-toggle', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  </div>
  
  <?php echo $__env->yieldPushContent('scripts'); ?>
  
</body>
</html>

<?php /**PATH C:\Users\Utente\Desktop\laravel_portfolio\resources\views/layouts/guest-minimal.blade.php ENDPATH**/ ?>