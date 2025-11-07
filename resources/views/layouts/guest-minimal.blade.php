<!doctype html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Portfolio') • Fabio Bianco</title>
  <meta name="description" content="Portfolio di Fabio Bianco - Sviluppatore Full Stack">
  
  @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/guest-minimal.css', 'resources/js/guest-bio-sidebar.js'])
  
  @stack('head')
</head>
<body>
  
  {{-- Bio Sidebar Component --}}
  @include('partials.bio-sidebar')
  
  {{-- Contacts Widget Component --}}
  @include('partials.contacts-widget')
  
  {{-- Main Content --}}
  @yield('content')
  
  {{-- Theme Toggle --}}
  <div class="theme-toggle-guest" id="themeToggle">
    @include('partials.theme-toggle')
  </div>
  
  @stack('scripts')
  
</body>
</html>

