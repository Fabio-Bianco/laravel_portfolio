<!doctype html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Projects')</title>
  {{-- Vite carica SCSS + JS --}}
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
  <div class="container my-4">
    <h1 class="mb-3">@yield('title','Projects')</h1>
    @yield('content')
  </div>
</body>
</html>
