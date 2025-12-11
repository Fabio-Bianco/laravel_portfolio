{{-- Vertical Sidebar Navigation - 2025 Design --}}
<nav class="sidebar-nav" id="sidebarNav" role="navigation" aria-label="Menu principale">
  <div class="sidebar-inner">
    
    {{-- Navigation Links - Ordine richiesto dall'utente --}}
    <div class="sidebar-links" id="sidebarLinks" role="list">
      {{-- 1. Home Page --}}
      <a href="{{ route('home') }}#hero" class="sidebar-item {{ request()->routeIs('home') ? 'active' : '' }}" data-section="hero" title="Home Page">
        @include('guest.partials.tech-icons', ['icon' => 'sidebar-home', 'size' => 24])
        <span class="sidebar-label">Home</span>
      </a>
      
      {{-- 2. Projects --}}
      <a href="{{ route('home') }}#projects" class="sidebar-item" data-section="projects" title="I Miei Progetti">
        @include('guest.partials.tech-icons', ['icon' => 'sidebar-briefcase', 'size' => 24])
        <span class="sidebar-label">Projects</span>
      </a>
      
      {{-- 3. Skills (Competenze prima della bio) --}}
      <a href="{{ route('home') }}#skills" class="sidebar-item" data-section="skills" title="Le Mie Competenze">
        @include('guest.partials.tech-icons', ['icon' => 'sidebar-code', 'size' => 24])
        <span class="sidebar-label">Skills</span>
      </a>
      
      {{-- 4. Bio --}}
      <a href="{{ route('home') }}#bio" class="sidebar-item" data-section="bio" title="Chi Sono">
        @include('guest.partials.tech-icons', ['icon' => 'sidebar-user', 'size' => 24])
        <span class="sidebar-label">Bio</span>
      </a>
      
      {{-- 5. Contact --}}
      <a href="{{ route('home') }}#contact" class="sidebar-item" data-section="contact" title="Contattami">
        @include('guest.partials.tech-icons', ['icon' => 'sidebar-mail', 'size' => 24])
        <span class="sidebar-label">Contact</span>
      </a>
      
      {{-- 6. CV Download (nella sidebar) --}}
      <a href="{{ asset('files/cv-fabio-bianco.pdf') }}" 
         class="sidebar-item sidebar-item-download" 
         download="CV-Fabio-Bianco.pdf"
         title="Scarica il mio CV">
        @include('guest.partials.tech-icons', ['icon' => 'sidebar-download', 'size' => 24])
        <span class="sidebar-label">CV</span>
      </a>
    </div>
    
    {{-- Divider --}}
    <div class="sidebar-divider"></div>
    
    {{-- Social Links - Solo icone visibili, testi all'hover --}}
    <div class="sidebar-social">
      <a href="{{ config('app.owner_github', 'https://github.com/Fabio-Bianco') }}" 
         class="sidebar-social-link" 
         target="_blank" 
         rel="noopener noreferrer"
         title="GitHub"
         aria-label="Visualizza i miei progetti su GitHub">
        @include('guest.partials.tech-icons', ['icon' => 'sidebar-github', 'size' => 20])
        <span class="social-label">GitHub</span>
      </a>
      
      <a href="{{ config('app.owner_linkedin', 'https://www.linkedin.com/in/fabio-bianco-008a0b118/') }}" 
         class="sidebar-social-link" 
         target="_blank" 
         rel="noopener noreferrer"
         title="LinkedIn"
         aria-label="Collegati su LinkedIn">
        @include('guest.partials.tech-icons', ['icon' => 'sidebar-linkedin', 'size' => 20])
        <span class="social-label">LinkedIn</span>
      </a>
    </div>
    
    {{-- Theme Switcher in fondo --}}
    <div class="sidebar-footer">
      @include('guest.partials.theme-switcher-inline')
    </div>
    
  </div>
</nav>

{{-- Mobile Toggle Button --}}
<button class="sidebar-toggle" 
        id="sidebarToggle" 
        aria-label="Apri/Chiudi Menu"
        aria-expanded="false"
        aria-controls="sidebarNav">
  <span class="toggle-line"></span>
  <span class="toggle-line"></span>
  <span class="toggle-line"></span>
</button>

{{-- Mobile Backdrop Overlay --}}
<div class="sidebar-backdrop" id="sidebarBackdrop"></div>
