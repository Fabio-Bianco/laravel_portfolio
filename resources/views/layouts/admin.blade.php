<!doctype html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Admin')</title>
  @vite(['resources/sass/app.scss','resources/js/app.js'])
  @stack('head')
</head>
<body class="bg-light">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin</a>
      <div class="ms-auto d-flex gap-2">
        <a href="{{ route('home') }}" class="btn btn-outline-light btn-sm">Portfolio pubblico</a>
        <a href="{{ route('profile.show') }}" class="btn btn-outline-light btn-sm">Profilo</a>
      </div>
    </div>
  </nav>

  <main class="container py-4">
    @include('partials.flash')
    @yield('content')
  </main>
  @stack('scripts')
</body>
</html>
