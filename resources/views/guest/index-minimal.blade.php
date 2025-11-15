@extends('guest.layouts.guest-minimal')

@section('title', 'Portfolio')

@section('content')
<div class="guest-container">
  
  {{-- ============================================
         HERO SECTION - 2025 Best Practices
         - Semantic HTML5 con ARIA landmarks
         - Tagline professionale e value proposition
         - Multiple CTA con chiara gerarchia visiva
         - Social proof integrato
         - Mobile-first responsive
        ============================================ --}}
    <section class="hero-section" id="hero" role="banner" aria-label="Hero section">
      <div class="hero-content">
        {{-- Intro Tag --}}
        <div class="hero-tag" role="note" aria-label="Introduzione professionale">
          <span class="hero-tag-icon" aria-hidden="true">👋</span>
          <span>Ciao, sono</span>
        </div>
        
        {{-- Main Title con gradient --}}
        <h1 class="hero-title">{{ config('app.owner_name', 'Fabio Bianco') }}</h1>
        
        {{-- Ruolo + Tagline professionale --}}
        <p class="hero-subtitle">Full Stack Developer Jr</p>
        <p class="hero-tagline">
          Creo applicazioni web moderne con codice pulito e design centrato sull'utente. 
          Specializzato in <strong>Laravel</strong>, <strong>React</strong> e <strong>JavaScript</strong>.
        </p>
        
        {{-- Call-to-Action buttons --}}
        <div class="hero-cta" role="group" aria-label="Azioni principali">
          <a href="#projects" 
             class="btn-hero btn-hero-primary" 
             onclick="event.preventDefault(); document.getElementById('projects').scrollIntoView({behavior: 'smooth'});"
             aria-label="Esplora i miei progetti">
            <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
              <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
            </svg>
            Vedi i Progetti
          </a>
          <a href="#contact" 
             class="btn-hero btn-hero-secondary" 
             onclick="event.preventDefault(); document.getElementById('contact').scrollIntoView({behavior: 'smooth'});"
             aria-label="Contattami">
            <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
              <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
            </svg>
            Contattami
          </a>
        </div>
        
        {{-- Social Proof / Stats rapide --}}
        <div class="hero-stats" role="region" aria-label="Statistiche portfolio">
          @php
            $totalProjects = \App\Models\Project::published()->count();
            $featuredCount = \App\Models\Project::published()->featured()->count();
            $techCount = \App\Models\Technology::count();
          @endphp
          <div class="hero-stat-item">
            <strong class="hero-stat-value">{{ $totalProjects }}+</strong>
            <span class="hero-stat-label">Progetti</span>
          </div>
          <div class="hero-stat-divider" aria-hidden="true"></div>
          <div class="hero-stat-item">
            <strong class="hero-stat-value">{{ $techCount }}+</strong>
            <span class="hero-stat-label">Tecnologie</span>
          </div>
          <div class="hero-stat-divider" aria-hidden="true"></div>
          <div class="hero-stat-item">
            <strong class="hero-stat-value">{{ $featuredCount }}</strong>
            <span class="hero-stat-label">In Evidenza</span>
          </div>
        </div>
      </div>
      
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
            Ciao! Sono <strong>{{ config('app.owner_name', 'Fabio Bianco') }}</strong>, un Full Stack Developer appassionato 
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
      
      <div class="skills-grid">
        {{-- Frontend Skills --}}
        <div class="skill-category">
          <div class="skill-category-header">
            <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
              <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0h13A1.5 1.5 0 0 1 16 1.5v9A1.5 1.5 0 0 1 14.5 12h-13A1.5 1.5 0 0 1 0 10.5v-9zM1.5 1a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
              <path d="M2 2h12v8H2V2z"/>
            </svg>
            <h3>Frontend</h3>
          </div>
          <div class="skill-list">
            <div class="skill-item">
              <span class="skill-name">JavaScript (ES6+)</span>
              <div class="skill-level" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 90%"></div>
              </div>
            </div>
            <div class="skill-item">
              <span class="skill-name">React</span>
              <div class="skill-level" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 85%"></div>
              </div>
            </div>
            <div class="skill-item">
              <span class="skill-name">HTML5 / CSS3</span>
              <div class="skill-level" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 95%"></div>
              </div>
            </div>
            <div class="skill-item">
              <span class="skill-name">Tailwind CSS</span>
              <div class="skill-level" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 80%"></div>
              </div>
            </div>
          </div>
        </div>
        
        {{-- Backend Skills --}}
        <div class="skill-category">
          <div class="skill-category-header">
            <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
              <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h11A1.5 1.5 0 0 1 15 2.5v11a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 13.5v-11z"/>
              <path fill="white" d="M2.5 2a.5.5 0 0 0-.5.5v11a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 .5-.5v-11a.5.5 0 0 0-.5-.5h-11z"/>
            </svg>
            <h3>Backend</h3>
          </div>
          <div class="skill-list">
            <div class="skill-item">
              <span class="skill-name">PHP</span>
              <div class="skill-level" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 90%"></div>
              </div>
            </div>
            <div class="skill-item">
              <span class="skill-name">Laravel</span>
              <div class="skill-level" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 95%"></div>
              </div>
            </div>
            <div class="skill-item">
              <span class="skill-name">MySQL</span>
              <div class="skill-level" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 85%"></div>
              </div>
            </div>
            <div class="skill-item">
              <span class="skill-name">REST API</span>
              <div class="skill-level" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 90%"></div>
              </div>
            </div>
          </div>
        </div>
        
        {{-- Tools & Others --}}
        <div class="skill-category">
          <div class="skill-category-header">
            <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
              <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0z"/>
            </svg>
            <h3>Tools & DevOps</h3>
          </div>
          <div class="skill-list">
            <div class="skill-item">
              <span class="skill-name">Git & GitHub</span>
              <div class="skill-level" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 90%"></div>
              </div>
            </div>
            <div class="skill-item">
              <span class="skill-name">VS Code</span>
              <div class="skill-level" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 95%"></div>
              </div>
            </div>
            <div class="skill-item">
              <span class="skill-name">Composer / npm</span>
              <div class="skill-level" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 85%"></div>
              </div>
            </div>
            <div class="skill-item">
              <span class="skill-name">Postman / API Testing</span>
              <div class="skill-level" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 80%"></div>
              </div>
            </div>
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
            <a href="{{ route('home') }}" 
               class="filter-chip {{ !isset($currentType) ? 'active' : '' }}">
              Tutti
              @isset($typeCounts)
                <span class="count">{{ $typeCounts->sum() }}</span>
              @endisset
            </a>
            @foreach($allTypes as $t)
              @php
                $count = $typeCounts[$t->id] ?? 0;
              @endphp
              @if($count > 0)
                <a href="{{ route('home', ['type' => $t->slug]) }}"
                   class="filter-chip {{ (isset($currentType) && $currentType->id === $t->id) ? 'active' : '' }}">
                  {{ $t->name }}
                  <span class="count">{{ $count }}</span>
                </a>
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
          <article class="project-card">
            
            {{-- Image --}}
            @if($project->image_url)
              <div class="project-card-image">
                <img src="{{ $project->image_url }}" alt="{{ $project->title }}">
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
