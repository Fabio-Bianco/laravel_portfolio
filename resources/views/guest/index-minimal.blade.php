@extends('guest.layouts.guest-minimal')

@section('title', 'Portfolio')

@section('content')
<div class="guest-container">
  
  {{-- ============================================
         HERO SECTION - Split Screen Modern Design
         - Text content on left
         - 3D visual on right with parallax effect
         - Glassmorphism accents
         - Smooth animations
         - Mobile responsive (stacks vertically)
        ============================================ --}}
    <section class="hero-section" id="hero" role="banner" aria-label="Hero section">
      <div class="hero-container">
        {{-- Left Side: Content --}}
        <div class="hero-content">
          {{-- Main Title --}}
          <h1 class="hero-title">
            <span class="title-highlight">{{ config('app.owner_name', 'Fabio Bianco') }}</span>
            <small style="display: block; font-size: 0.35em; font-weight: 400; opacity: 0.5; margin-top: 0.5rem; letter-spacing: 0.15em;">aka b_bot</small>
          </h1>
          
          {{-- Subtitle with typing effect placeholder --}}
          <p class="hero-subtitle">
            Full Stack Developer Jr
          </p>
          
          {{-- Tagline --}}
          <p class="hero-tagline">
            Creo applicazioni web moderne con codice pulito e design centrato sull'utente. 
            Specializzato in <strong>Laravel</strong>, <strong>React</strong> e <strong>JavaScript</strong>.
          </p>
          
          {{-- CTA Buttons --}}
          <div class="hero-cta" role="group" aria-label="Azioni principali">
            <a href="#projects" 
               class="btn-hero btn-hero-primary" 
               onclick="event.preventDefault(); document.getElementById('projects').scrollIntoView({behavior: 'smooth'});"
               aria-label="Esplora i miei progetti">
              <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
              </svg>
              <span>Vedi i Progetti</span>
            </a>
            <a href="#contact" 
               class="btn-hero btn-hero-secondary" 
               onclick="event.preventDefault(); document.getElementById('contact').scrollIntoView({behavior: 'smooth'});"
               aria-label="Contattami">
              <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
              </svg>
              <span>Contattami</span>
            </a>
          </div>
        </div>
        
        {{-- Right Side: Code Visual Placeholder --}}
        <div class="hero-visual">
          <div class="hero-code-display">
            <div class="code-window">
              <div class="code-header">
                <span class="code-dot" style="background: #ff5f56;"></span>
                <span class="code-dot" style="background: #ffbd2e;"></span>
                <span class="code-dot" style="background: #27c93f;"></span>
                <span class="code-title">portfolio.php</span>
              </div>
              <div class="code-content">
                <div class="code-line"><span class="code-keyword">class</span> <span class="code-class">Developer</span> <span class="code-bracket">{</span></div>
                <div class="code-line">  <span class="code-keyword">public function</span> <span class="code-function">build</span>() {</div>
                <div class="code-line">    <span class="code-keyword">return</span> [</div>
                <div class="code-line">      <span class="code-string">'passion'</span> => <span class="code-value">true</span>,</div>
                <div class="code-line">      <span class="code-string">'code'</span> => <span class="code-string">'clean'</span>,</div>
                <div class="code-line">      <span class="code-string">'coffee'</span> => <span class="code-value">Infinity</span></div>
                <div class="code-line">    ];</div>
                <div class="code-line">  }</div>
                <div class="code-line"><span class="code-bracket">}</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      {{-- Animated Gradient Background --}}
      <div class="hero-gradient-bg" aria-hidden="true"></div>
      
      {{-- Glassmorphism decorative orbs - Full viewport --}}
      <div class="glass-orb glass-orb-1" aria-hidden="true"></div>
      <div class="glass-orb glass-orb-2" aria-hidden="true"></div>
      
      {{-- Scroll Indicator --}}
      <div class="scroll-indicator" 
           role="button" 
           tabindex="0"
           onclick="document.getElementById('projects').scrollIntoView({behavior: 'smooth'});"
           onkeypress="if(event.key === 'Enter') document.getElementById('projects').scrollIntoView({behavior: 'smooth'});"
           aria-label="Scorri alla sezione progetti"
           style="cursor: pointer;">
        <span class="scroll-text">Scorri giù</span>
        <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16" class="scroll-arrow">
          <path fill-rule="evenodd" d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67z"/>
        </svg>
      </div>
    </section>

    {{-- ============================================
         ABOUT ME SECTION - Public Bio
         - Problem-solving oriented bio
         - Umana ma professionale
         - Avatar/foto con lazy loading
         - Personal stats cards
        ============================================ --}}
    <section class="about-section" id="about" role="region" aria-labelledby="about-heading">
      <div class="section-header">
        <span class="section-tag">Chi Sono</span>
        <h2 id="about-heading" class="section-title">Chi Sono</h2>
      </div>
      
      <div class="about-content">
        <div class="about-text">
          <p class="about-intro">
            Sono <strong>{{ config('app.owner_name', 'Fabio Bianco') }}</strong>, un Full Stack Developer appassionato 
            che trasforma problemi complessi in soluzioni eleganti e user-friendly.
          </p>
          <p>
            Con esperienza in <strong>Laravel</strong>, <strong>React</strong> e JavaScript moderno, 
            creo applicazioni web scalabili che danno priorità sia alle prestazioni che all'esperienza utente. 
            Credo nel codice pulito e manutenibile, e mi mantengo aggiornato con le ultime tecnologie web.
          </p>
          <p>
            Quando non programmo, esploro nuovi framework, contribuisco a progetti open-source 
            o condivido conoscenze con la community degli sviluppatori. Sempre pronto ad affrontare nuove sfide 
            e collaborare su progetti innovativi.
          </p>
        </div>
        
        <div class="about-avatar">
          <div class="avatar-container">
            <div class="avatar-image">
              {{-- simplified: removed auth() from guest view --}}
              {{ strtoupper(substr(config('app.owner_name', 'FB'), 0, 2)) }}
            </div>
            <div class="avatar-status" aria-label="Available for work">
              <span class="status-dot"></span>
              <span class="status-text">Disponibile per lavori</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- ============================================
         SKILLS SECTION - Structured & Categorized
         - Frontend / Backend / Tools
         - SVG icons + skill level
         - Grid layout responsive
         - Lazy loading per performance
        ============================================ --}}
    <section class="skills-section" id="skills" role="region" aria-labelledby="skills-heading">
      <div class="section-header">
        <span class="section-tag">Cosa Faccio</span>
        <h2 id="skills-heading" class="section-title">Competenze & Tecnologie</h2>
        <p class="section-description">
          Un toolkit completo per creare applicazioni web moderne e scalabili
        </p>
      </div>
      
      <div class="skills-minimal-grid">
        {{-- Backend --}}
        <div class="skill-category-minimal">
          <h3 class="skill-category-title">Backend</h3>
          <div class="skill-icons-grid">
            @include('guest.partials.tech-icons', ['icon' => 'php', 'size' => 48, 'title' => 'PHP'])
            @include('guest.partials.tech-icons', ['icon' => 'laravel', 'size' => 48, 'title' => 'Laravel'])
            @include('guest.partials.tech-icons', ['icon' => 'mysql', 'size' => 48, 'title' => 'MySQL'])
            @include('guest.partials.tech-icons', ['icon' => 'node', 'size' => 48, 'title' => 'Node.js'])
          </div>
        </div>        {{-- Frontend --}}
        <div class="skill-category-minimal">
          <h3 class="skill-category-title">Frontend</h3>
          <div class="skill-icons-grid">
            @include('guest.partials.tech-icons', ['icon' => 'javascript', 'size' => 48, 'title' => 'JavaScript'])
            @include('guest.partials.tech-icons', ['icon' => 'react', 'size' => 48, 'title' => 'React'])
            @include('guest.partials.tech-icons', ['icon' => 'html5', 'size' => 48, 'title' => 'HTML5'])
            @include('guest.partials.tech-icons', ['icon' => 'css3', 'size' => 48, 'title' => 'CSS3'])
            @include('guest.partials.tech-icons', ['icon' => 'tailwind', 'size' => 48, 'title' => 'Tailwind CSS'])
          </div>
        </div>        {{-- Tools & DevOps --}}
        <div class="skill-category-minimal">
          <h3 class="skill-category-title">Tools & DevOps</h3>
          <div class="skill-icons-grid">
            @include('guest.partials.tech-icons', ['icon' => 'git', 'size' => 48, 'title' => 'Git'])
            @include('guest.partials.tech-icons', ['icon' => 'github', 'size' => 48, 'title' => 'GitHub'])
            @include('guest.partials.tech-icons', ['icon' => 'vscode', 'size' => 48, 'title' => 'VS Code'])
            @include('guest.partials.tech-icons', ['icon' => 'npm', 'size' => 48, 'title' => 'NPM'])
            @include('guest.partials.tech-icons', ['icon' => 'postman', 'size' => 48, 'title' => 'Postman'])
          </div>
        </div>
      </div>
    </section>

    {{-- ============================================
       PROJECTS SECTION
      ============================================ --}}
    <section id="projects" class="projects-section" role="region" aria-labelledby="projects-heading">
      <div class="section-header">
        <span class="section-tag">Il Mio Lavoro</span>
        <h2 id="projects-heading" class="section-title">Progetti in Evidenza</h2>
      </div>

      {{-- Filtri --}}
      @if(isset($allTypes))
        <div class="filters-section">
          <div class="filter-group" style="justify-content: center;">
            <button type="button"
                    data-filter="all"
                    class="filter-chip {{ !isset($currentType) ? 'active' : '' }}">
              Tutti
              @isset($typeCounts)
                <span class="count">{{ $typeCounts->sum() }}</span>
              @endisset
            </button>
            @foreach($allTypes as $t)
              @php
                $count = $typeCounts[$t->id] ?? 0;
              @endphp
              @if($count > 0)
                <button type="button"
                        data-filter="{{ $t->slug }}"
                        class="filter-chip {{ (isset($currentType) && $currentType->id === $t->id) ? 'active' : '' }}">
                  {{ $t->name }}
                  <span class="count">{{ $count }}</span>
                </button>
              @endif
            @endforeach
          </div>
        </div>
      @endif

      {{-- Stats --}}
      <div class="stats-bar">
        <span class="stat-item">
          <strong>{{ $projects->total() }}</strong> progetti
        </span>
        @if(isset($currentType) || (isset($isFeatured) && $isFeatured))
          <span>•</span>
          <a href="{{ route('home') }}" style="color: var(--color-accent); text-decoration: none;">
            Tutti i progetti
          </a>
        @endif
        @if(!isset($isFeatured) || !$isFeatured)
          @php
            $featuredCount = \App\Models\Project::published()->featured()->count();
          @endphp
          @if($featuredCount > 0)
            <span>•</span>
            <a href="{{ route('projects.featured') }}" style="color: var(--color-accent); text-decoration: none;">
              ⭐ In Evidenza ({{ $featuredCount }})
            </a>
          @endif
        @endif
      </div>

      {{-- Projects Grid --}}
      <div class="projects-grid">
        @forelse($projects as $project)
          <article class="project-card" data-type="{{ $project->type ? $project->type->slug : '' }}">
            
            {{-- Image --}}
            @if($project->image_url)
              <div class="project-card-image">
                <img 
                  src="{{ $project->image_url }}" 
                  alt="{{ $project->title }}"
                  loading="lazy"
                  width="800"
                  height="450"
                  class="project-image"
                >
              </div>
            @else
              @php
                $gradients = [
                  '#667eea 0%, #764ba2 100%',
                  '#f093fb 0%, #f5576c 100%',
                  '#4facfe 0%, #00f2fe 100%',
                  '#43e97b 0%, #38f9d7 100%'
                ];
                $randomGradient = $gradients[array_rand($gradients)];
              @endphp
              <div class="project-card-image" style="background: linear-gradient(135deg, {{ $randomGradient }});">
                <div style="display: flex; align-items: center; justify-content: center; height: 100%; font-size: 3rem; color: white; opacity: 0.3;">
                  {{ strtoupper(substr($project->title, 0, 1)) }}
                </div>
              </div>
            @endif
            
            <div class="project-card-body">
              
              {{-- Meta badges --}}
              <div style="display: flex; flex-wrap: wrap; gap: 0.5rem; margin-bottom: 1rem;">
                @if($project->type)
                  @php
                    $typeName = strtolower($project->type->name);
                    $badgeClass = 'frontend';
                    if ($typeName === 'automazioni') $badgeClass = 'automazioni';
                    elseif ($typeName === 'backend') $badgeClass = 'backend';
                  @endphp
                  <span class="badge-type badge-type-{{ $badgeClass }}">
                    {{ $project->type->name }}
                  </span>
                @endif
                
                @if($project->technologies && $project->technologies->count())
                  @foreach($project->technologies->take(3) as $tech)
                    <span class="badge-tech">{{ $tech->name }}</span>
                  @endforeach
                  @if($project->technologies->count() > 3)
                    <span class="badge-tech" style="opacity: 0.7;">+{{ $project->technologies->count() - 3 }}</span>
                  @endif
                @endif
              </div>
              
              {{-- Title --}}
              <h2 class="project-card-title">{{ $project->title }}</h2>
              
              {{-- Description --}}
              @if($project->description)
                <p class="project-card-description">{{ $project->description }}</p>
              @endif
              
              {{-- Meta info --}}
              @if(!is_null($project->stargazers_count) || !is_null($project->forks_count))
                <div style="display: flex; gap: 1rem; margin-bottom: 1rem; color: var(--color-text-muted); font-size: 0.9rem;">
                  @if(!is_null($project->stargazers_count))
                    <span style="display: flex; align-items: center; gap: 0.35rem;">
                      ⭐ {{ $project->stargazers_count }}
                    </span>
                  @endif
                  @if(!is_null($project->forks_count))
                    <span style="display: flex; align-items: center; gap: 0.35rem;">
                      🔀 {{ $project->forks_count }}
                    </span>
                  @endif
                </div>
              @endif
              
              {{-- Action --}}
              <div style="margin-top: auto;">
                <a href="{{ route('projects.show', $project->slug) }}" class="btn-primary-minimal" style="width: 100%; justify-content: center;">
                  Vedi progetto
                  <span style="font-size: 1.2rem;">→</span>
                </a>
              </div>
              
            </div>
            
          </article>
        @empty
          <div class="empty-state" style="grid-column: 1 / -1;">
            <div class="empty-state-icon">📭</div>
            <h3 style="margin-bottom: 0.5rem;">Nessun progetto trovato</h3>
            <p class="text-muted">Prova a cambiare i filtri di ricerca</p>
            @if(isset($currentType))
              <a href="{{ route('home') }}" class="btn-minimal" style="margin-top: 1rem;">
                Mostra tutti i progetti
              </a>
            @endif
          </div>
        @endforelse
      </div>

      {{-- Pagination --}}
      @if($projects->hasPages())
        <div style="display: flex; justify-content: center;">
          {{ $projects->links() }}
        </div>
      @endif
    </section>

    {{-- Modern Contact Section --}}
    @include('guest.partials.contact-modern')




</div>
@endsection
