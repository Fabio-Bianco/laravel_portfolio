{{-- Bio Sidebar Component --}}
<div class="bio-sidebar" id="bioSidebar">
  <div class="bio-sidebar-content">
    <button class="bio-close" id="bioClose">✕</button>
    
    <div class="bio-header">
      <div class="bio-avatar">
        {{ strtoupper(substr(auth()->user()->name ?? 'FB', 0, 2)) }}
      </div>
      <h2>{{ auth()->user()->name ?? 'Fabio Bianco' }}</h2>
      <p class="text-muted">Full Stack Developer</p>
    </div>
    
    <div class="bio-body">
      <h3>About Me</h3>
      <p>
        {{ auth()->user()->bio ?? 'Sviluppatore appassionato di tecnologie web moderne. Specializzato in Laravel, Vue.js e React. Sempre alla ricerca di nuove sfide e opportunità di crescita.' }}
      </p>
      
      <h3 style="margin-top: 2rem;">Skills</h3>
      <div class="skills-list">
        <span class="skill-tag">PHP</span>
        <span class="skill-tag">Laravel</span>
        <span class="skill-tag">JavaScript</span>
        <span class="skill-tag">Vue.js</span>
        <span class="skill-tag">React</span>
        <span class="skill-tag">MySQL</span>
      </div>
    </div>
  </div>
  <div class="bio-overlay" id="bioOverlay"></div>
</div>

{{-- Toggle Bio Button --}}
<button class="bio-toggle" id="bioToggle" title="About Me">
  <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
  </svg>
</button>
