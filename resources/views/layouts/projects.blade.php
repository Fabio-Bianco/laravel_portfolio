<!doctype html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Projects')</title>
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">Portfolio</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          @auth
            @if(auth()->user()->is_admin)
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.projects.index') }}">Gestione progetti</a>
              </li>
            @endif
            <li class="nav-item">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-light btn-sm" type="submit">Logout</button>
              </form>
            </li>
          @else
            <li class="nav-item">
              <a class="btn btn-outline-light btn-sm" href="{{ route('login') }}">Login Admin</a>
            </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>
  <div class="container my-4">
    <h1 class="mb-3">@yield('title','Projects')</h1>
    @yield('content')
  </div>
</body>
</html>
</html>
  </div>
</body>
</html>
