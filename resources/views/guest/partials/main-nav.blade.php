{{-- Vertical Sidebar Navigation - 2025 Design --}}
<nav class="sidebar-nav" id="sidebarNav" role="navigation" aria-label="Menu principale">
  <div class="sidebar-inner">
    
    {{-- Navigation Icons --}}
    <div class="sidebar-links" id="sidebarLinks" role="list">
      <a href="#hero" class="sidebar-item active" data-section="hero" aria-current="page" title="Home">
        @include('guest.partials.tech-icons', ['icon' => 'sidebar-home', 'size' => 24])
        <span class="sidebar-label">Home</span>
      </a>
      
      <a href="#about" class="sidebar-item" data-section="about" aria-current="false" title="About">
        @include('guest.partials.tech-icons', ['icon' => 'sidebar-user', 'size' => 24])
        <span class="sidebar-label">About</span>
      </a>
      
      <a href="#skills" class="sidebar-item" data-section="skills" aria-current="false" title="Skills">
        @include('guest.partials.tech-icons', ['icon' => 'sidebar-code', 'size' => 24])
        <span class="sidebar-label">Skills</span>
      </a>
      
      <a href="#projects" class="sidebar-item" data-section="projects" aria-current="false" title="Work">
        @include('guest.partials.tech-icons', ['icon' => 'sidebar-briefcase', 'size' => 24])
        <span class="sidebar-label">Work</span>
      </a>
      
      <a href="#contact" class="sidebar-item" data-section="contact" aria-current="false" title="Contact">
        @include('guest.partials.tech-icons', ['icon' => 'sidebar-mail', 'size' => 24])
        <span class="sidebar-label">Contact</span>
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
