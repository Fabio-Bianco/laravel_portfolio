<!doctype html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', config('app.name'))</title>
  @vite(['resources/sass/app.scss','resources/js/app.js'])
  @stack('head')
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">Portfolio</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="mainNav" class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto"></ul>
        <ul class="navbar-nav ms-auto">
          @auth
            @if(auth()->user()->is_admin)
              <li class="nav-item"><a class="nav-link" href="{{ route('admin.projects.index') }}">Admin</a></li>
            @endif
            <li class="nav-item"><a class="nav-link" href="{{ route('profile.show') }}">Profilo</a></li>
            <li class="nav-item">
              <form method="POST" action="{{ route('logout') }}" class="ms-lg-2">
                @csrf
                <button class="btn btn-outline-light btn-sm">Logout</button>
              </form>
            </li>
          @else
            <li class="nav-item"><a class="btn btn-outline-light btn-sm" href="{{ route('login') }}">Login</a></li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>

  <main class="py-4">
    <div class="container">
      @include('partials.flash')
      @yield('content')
    </div>
  </main>
  @stack('scripts')
</body>
</html>
