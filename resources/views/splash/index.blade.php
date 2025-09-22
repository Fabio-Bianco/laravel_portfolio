<!DOCTYPE html>
<html lang="it" data-bs-theme="dark">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>b_bot</title>
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  <style>
    html, body { height: 100%; }
    body { margin: 0; background: #000; color: #fff; }
  .splash-wrap { min-height: 100%; display: grid; place-items: center; opacity: 0; transition: opacity .35s ease; }
  .splash-wrap.is-visible { opacity: 1; }
  .splash-wrap.is-leaving { opacity: 0; }
    .logo-link { text-decoration: none; color: inherit; display: inline-flex; flex-direction: column; align-items: center; gap: .75rem; }
    .logo-badge { display: inline-grid; place-items: center; width: 128px; height: 128px; border-radius: 50%; background: #111; border: 2px solid #333; box-shadow: 0 0 0 6px rgba(255,255,255,.05) inset; font-weight: 700; font-size: 32px; letter-spacing: .5px; transition: transform .15s ease, box-shadow .15s ease; }
    .logo-text { display: block; font-size: 1.1rem; color: #bbb; text-align: center; }
    .logo-link:hover .logo-badge { transform: scale(1.03); box-shadow: 0 0 0 8px rgba(255,255,255,.07) inset; }
    .logo-link:hover .logo-text { color: #fff; }
    .logo-link:focus-visible { outline: 2px dashed #888; outline-offset: 6px; border-radius: 999px; }
  </style>
</head>
<body>
  <main class="splash-wrap">
    <a href="{{ route('home') }}" class="logo-link" aria-label="Entra nel portfolio">
      <span class="logo-badge">b_bot</span>
      <span class="logo-text">Entra</span>
    </a>
  </main>
  <script>
    (function() {
      const wrap = document.querySelector('.splash-wrap');
      const link = document.querySelector('.logo-link');
      // fade-in on load
      requestAnimationFrame(() => wrap.classList.add('is-visible'));
      // fade-out on click, then navigate
      link.addEventListener('click', function(e) {
        e.preventDefault();
        try { sessionStorage.setItem('fromSplash', '1'); } catch (_) {}
        wrap.classList.add('is-leaving');
        setTimeout(() => { window.location.href = this.href; }, 350);
      });
    })();
  </script>
</body>
</html>
