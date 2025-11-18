<!DOCTYPE html>
<html lang="it" data-bs-theme="dark">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>b_bot</title>
  <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/css/splash.css', 'resources/js/app.js', 'resources/js/splash.js']); ?>
</head>
<body>
  <main class="splash-wrap">
    <a href="<?php echo e(route('home')); ?>" class="logo-link" aria-label="Entra nel portfolio">
      <span class="logo-badge">
        <span class="badge-text">b_bot</span>
        <span class="badge-label">Entra</span>
      </span>
    </a>
  </main>
</body>
</html>
<?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views/guest/splash.blade.php ENDPATH**/ ?>