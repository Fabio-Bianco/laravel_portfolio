<!doctype html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  {{-- SEO Meta Tags --}}
  <title>@yield('title', 'Portfolio') • {{ config('app.owner_name') }} - Full Stack Developer</title>
  <meta name="description" content="Portfolio di {{ config('app.owner_name') }} - Full Stack Developer specializzato in Laravel, React e JavaScript. Scopri i miei progetti e contattami per collaborazioni.">
  <meta name="author" content="{{ config('app.owner_name') }}">
  <meta name="keywords" content="full stack developer, laravel, react, javascript, php, web development, portfolio">
  
  {{-- Open Graph Meta Tags --}}
  <meta property="og:title" content="{{ config('app.owner_name') }} - Full Stack Developer Portfolio">
  <meta property="og:description" content="Scopri i miei progetti e competenze nel web development. Specializzato in Laravel, React e JavaScript.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url('/') }}">
  <meta property="og:site_name" content="{{ config('app.owner_name') }} Portfolio">
  
  {{-- Twitter Card Meta Tags --}}
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="{{ config('app.owner_name') }} - Full Stack Developer">
  <meta name="twitter:description" content="Portfolio di progetti web con Laravel, React e JavaScript">
  
  {{-- Canonical URL --}}
  <link rel="canonical" href="{{ url()->current() }}">
  
  {{-- Assets --}}
  @vite([
    'resources/sass/app.scss', 
    'resources/js/app.js', 
    'resources/css/guest-minimal.css', 
    'resources/js/guest-bio-sidebar.js',
    'resources/js/contact-form.js'
  ])
  
  @stack('head')
</head>
<body>
  {{-- Skip Link for Accessibility --}}
  <a href="#main-content" class="skip-link">Salta al contenuto principale</a>
  
  {{-- Main Navigation --}}
  @include('partials.main-nav')
  
  {{-- Bio Sidebar Component --}}
  @include('partials.bio-sidebar')
  
  {{-- Bio Toggle Button --}}
  @include('partials.bio-toggle')
  
  {{-- Contacts Widget Component --}}
  @include('partials.contacts-widget')
  
  {{-- Main Content --}}
  <main id="main-content" role="main">
    @yield('content')
  </main>
  
  {{-- Theme Toggle --}}
  <div class="theme-toggle-guest" id="themeToggle" aria-label="Cambia tema">
    @include('partials.theme-toggle')
  </div>
  
  {{-- Accessibility Script --}}
  <script>
    // Gestione accessibilità da tastiera
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Tab') {
        document.body.classList.add('keyboard-nav');
      }
    });
    
    document.addEventListener('mousedown', function() {
      document.body.classList.remove('keyboard-nav');
    });
  </script>
  
  @stack('scripts')
  
</body>
</html>

