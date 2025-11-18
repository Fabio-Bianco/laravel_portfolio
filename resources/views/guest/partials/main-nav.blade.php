{{-- Ultra Modern Floating Navigation - 2025 Design --}}
<nav class="nav-modern" id="mainNav" role="navigation" aria-label="Menu principale">
  <div class="nav-floating">
    {{-- Logo / Brand con Icon --}}
    <a href="{{ route('home') }}" class="brand-modern" aria-label="Home">
      <div class="brand-icon">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
          <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
        </svg>
      </div>
      <span class="brand-name">{{ config('app.owner_name', 'Portfolio') }}</span>
    </a>
    
    {{-- Navigation Links --}}
    <div class="nav-menu" id="navLinks" role="list">
      <a href="#hero" class="nav-item active" data-section="hero" aria-current="page">Home</a>
      <a href="#about" class="nav-item" data-section="about" aria-current="false">About</a>
      <a href="#skills" class="nav-item" data-section="skills" aria-current="false">Skills</a>
      <a href="#projects" class="nav-item" data-section="projects" aria-current="false">Work</a>
      <a href="#contact" class="nav-item" data-section="contact" aria-current="false">Contact</a>
    </div>
    
    {{-- Actions Group: Theme + Mobile Toggle --}}
    <div class="nav-actions">
      @include('guest.partials.theme-switcher-inline')
      
      <button class="menu-toggle" 
              id="navToggle" 
              aria-label="Menu"
              aria-expanded="false"
              aria-controls="navLinks">
        <span class="menu-line"></span>
        <span class="menu-line"></span>
      </button>
    </div>
  </div>
</nav>

{{-- Mobile Backdrop Overlay --}}
<div class="nav-backdrop" id="navBackdrop"></div>
