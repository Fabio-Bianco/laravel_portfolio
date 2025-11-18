<!doctype html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'b_bot Portfolio') • {{ config('app.name') }}</title>
  
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  
  @stack('head')
</head>
<body>
  {{-- Tutti gli stili admin sono ora in resources/sass/_admin-sidebar.scss --}}
  
  <div class="admin-wrapper">
    
    {{-- Sidebar --}}
    <aside class="admin-sidebar">
      <div class="admin-sidebar-header">
        <h4>⚙️ b_bot Portfolio</h4>
        <small class="text-muted d-block mt-1">{{ auth()->user()->name }}</small>
      </div>
      
      <nav class="admin-sidebar-nav">
        
        {{-- Vedi Vetrina Guest --}}
        <div class="admin-nav-item">
          <a href="{{ route('home') }}" class="admin-nav-link" target="_blank">
            <span class="icon">🌐</span>
            <span>Vedi Vetrina Guest</span>
          </a>
        </div>
        
        <div class="admin-nav-divider"></div>
        
        {{-- Gestisci (collapsabile) --}}
        <div class="admin-nav-item">
          <button class="admin-nav-collapse-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#gestisciMenu" aria-expanded="true">
            <span class="d-flex align-items-center">
              <span class="icon">📁</span>
              <span>Gestisci</span>
            </span>
            <span class="chevron">▼</span>
          </button>
          
          <div class="collapse show" id="gestisciMenu">
            <ul class="admin-nav-submenu">
              <li>
                <a href="{{ route('admin.projects.all') }}" class="admin-nav-link {{ request()->routeIs('admin.projects.all') ? 'active' : '' }}">
                  🗂️ Tutti i Progetti
                </a>
              </li>
              <li>
                <a href="{{ route('admin.projects.cards') }}" class="admin-nav-link {{ request()->routeIs('admin.projects.cards') ? 'active' : '' }}">
                  ✏️ Modifica Progetti
                </a>
              </li>
            </ul>
          </div>
        </div>
        
        <div class="admin-nav-divider"></div>
        
        {{-- Tecnologie --}}
        <div class="admin-nav-item">
          <a href="{{ route('admin.technologies.index') }}" class="admin-nav-link {{ request()->routeIs('admin.technologies.*') ? 'active' : '' }}">
            <span class="icon">🔧</span>
            <span>Tecnologie</span>
          </a>
        </div>
        
        {{-- Tipi --}}
        <div class="admin-nav-item">
          <a href="{{ route('admin.types.index') }}" class="admin-nav-link {{ request()->routeIs('admin.types.*') ? 'active' : '' }}">
            <span class="icon">📂</span>
            <span>Tipi</span>
          </a>
        </div>
        
        <div class="admin-nav-divider"></div>
        
        {{-- Import GitHub --}}
        <div class="admin-nav-item">
          <a href="{{ route('admin.projects.index') }}" class="admin-nav-link {{ request()->routeIs('admin.projects.index') ? 'active' : '' }}">
            <span class="icon">📥</span>
            <span>Import GitHub</span>
          </a>
        </div>
        
        <div class="admin-nav-divider"></div>
        
        {{-- Profilo --}}
        <div class="admin-nav-item">
          <a href="{{ route('admin.profile.edit') }}" class="admin-nav-link {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
            <span class="icon">👤</span>
            <span>Il Mio Profilo</span>
          </a>
        </div>
        
      </nav>
    </aside>
    
    {{-- Main Content Area --}}
    <main class="admin-content">
      
      {{-- Top Bar --}}
      <div class="admin-topbar">
        <div>
          <h1 class="h4 mb-0">@yield('page-title', 'Dashboard')</h1>
        </div>
        
        <div class="admin-user-menu">
          <a href="{{ route('profile.show') }}" class="btn btn-sm btn-outline-secondary">
            👤 Profilo
          </a>
          
          <form method="POST" action="{{ route('logout') }}" class="d-inline">
            @csrf
            <button class="btn btn-sm btn-outline-danger" type="submit">Logout</button>
          </form>
        </div>
      </div>
      
      {{-- Main Content --}}
      <div class="admin-main">
        
        @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>✓</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        @endif
        
        @if(session('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>✗</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        @endif
        
        @if($errors->any())
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>⚠️ Errori:</strong>
            <ul class="mb-0 mt-2">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        @endif
        
        @yield('content')
        
      </div>
      
    </main>
    
  </div>
  
  @stack('scripts')
  
</body>
</html>
