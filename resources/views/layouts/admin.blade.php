<!doctype html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','b_bot Portfolio')</title>
  
  @vite(['resources/sass/app.scss','resources/js/app.js'])
  @stack('head')
</head>
<body class="@yield('body_class')">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
  <a class="navbar-brand" href="{{ route('admin.dashboard') }}">b_bot Portfolio</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav" aria-controls="adminNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="adminNav">
        <ul class="navbar-nav ms-auto align-items-lg-center gap-2">
          <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Portfolio pubblico</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.projects.index') }}">Progetti</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.technologies.index') }}">Tecnologie</a></li>
          @if(Route::has('admin.types.index'))
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.types.index') }}">Tipi</a></li>
          @endif
          <li class="nav-item"><a class="nav-link text-warning" href="{{ route('admin.debug.projects') }}">🧹 Debug</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('profile.show') }}">Profilo</a></li>
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
              @csrf
              <button class="btn btn-outline-light btn-sm" type="submit">Logout</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="container py-4">
    @include('partials.flash')
    @yield('content')
  </main>
  
  <!-- Modal di conferma eliminazione (disponibile in tutto l'admin) -->
  <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmDeleteLabel">Conferma eliminazione</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Vuoi eliminare definitivamente il progetto: <strong id="deleteProjectName">—</strong>?</p>
          <p class="mb-0 text-danger small">Questa azione non può essere annullata.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
          <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Elimina</button>
        </div>
      </div>
    </div>
  </div>
  @stack('scripts')
</body>
</html>
