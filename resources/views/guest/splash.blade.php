<!DOCTYPE html>
<html lang="it" data-bs-theme="dark">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>b_bot</title>
  @vite(['resources/sass/app.scss', 'resources/css/splash.css', 'resources/js/app.js', 'resources/js/splash.js'])
</head>
<body>
  <main class="splash-wrap">
    <a href="{{ route('home') }}" class="logo-link" aria-label="Entra nel portfolio">
      <span class="logo-badge">
        <span class="badge-text">b_bot</span>
        <span class="badge-label">Entra</span>
      </span>
    </a>
  </main>
</body>
</html>
