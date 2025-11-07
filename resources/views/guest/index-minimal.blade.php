@extends('layouts.guest-minimal')

@section('title', 'Portfolio')

@section('content')
<div class="guest-container">
  
  @if(!isset($currentType) && (!isset($isFeatured) || !$isFeatured))
    {{-- Hero Section - Only on homepage --}}
    <section class="hero-section">
      <h1 class="hero-title">{{ auth()->user()->name ?? 'Fabio Bianco' }}</h1>
      <p class="hero-subtitle">Full Stack Developer</p>
      <div class="hero-cta">
        <a href="#projects" class="btn-hero btn-hero-primary" onclick="event.preventDefault(); document.getElementById('projects').scrollIntoView({behavior: 'smooth'});">
          Esplora Progetti
        </a>
      </div>
    </section>

    {{-- Skills Showcase --}}
    <section style="margin-bottom: 4rem;">
      <div class="skills-showcase">
        <span class="skill-badge skill-badge-primary">PHP</span>
        <span class="skill-badge skill-badge-primary">Laravel</span>
        <span class="skill-badge skill-badge-primary">JavaScript</span>
        <span class="skill-badge skill-badge-primary">React</span>
        <span class="skill-badge skill-badge-primary">MySQL</span>
        <span class="skill-badge skill-badge-primary">Git</span>
        <span class="skill-badge skill-badge-primary">REST API</span>
      </div>
    </section>

    {{-- Stats Minimal - Subtle footer before projects --}}
    <div class="stats-minimal" style="margin-bottom: 2rem;">
      @php
        $totalProjects = \App\Models\Project::published()->count();
        $featuredCount = \App\Models\Project::published()->featured()->count();
        $techCount = \App\Models\Technology::count();
      @endphp
      <span class="stat-minimal-item">{{ $totalProjects }} progetti</span>
      <span class="stat-minimal-separator">•</span>
      <span class="stat-minimal-item">{{ $featuredCount }} in evidenza</span>
      <span class="stat-minimal-separator">•</span>
      <span class="stat-minimal-item">{{ $techCount }} tecnologie</span>
    </div>
  @else
    {{-- Filtered header for category pages --}}
    <header style="margin-bottom: 3rem; text-align: center;">
      <h1 style="font-size: 2.5rem; font-weight: 700; margin-bottom: 0.5rem;">
        @if(isset($isFeatured) && $isFeatured)
          ⭐ Progetti in Evidenza
        @elseif(isset($currentType))
          {{ $currentType->name }}
        @endif
      </h1>
      <p class="text-muted" style="font-size: 1.1rem;">
        @if(isset($currentType))
          Progetti {{ strtolower($currentType->name) }}
        @else
          I migliori progetti del portfolio
        @endif
      </p>
    </header>
  @endif

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
        Mostra tutti
      </a>
    @endif
    @if(!isset($isFeatured) || !$isFeatured)
      @php
        $featuredCount = \App\Models\Project::published()->featured()->count();
      @endphp
      @if($featuredCount > 0)
        <span>•</span>
        <a href="{{ route('projects.featured') }}" style="color: var(--color-accent); text-decoration: none;">
          ⭐ Featured ({{ $featuredCount }})
        </a>
      @endif
    @endif
  </div>

  {{-- Projects Grid --}}
  <div id="projects" class="projects-grid">
    @forelse($projects as $project)
      <article class="project-card">
        
        {{-- Image --}}
        @if($project->image_url)
          <div class="project-card-image">
            <img src="{{ $project->image_url }}" alt="{{ $project->title }}">
          </div>
        @else
          <div class="project-card-image" style="background: linear-gradient(135deg, {{ ['#667eea 0%, #764ba2 100%', '#f093fb 0%, #f5576c 100%', '#4facfe 0%, #00f2fe 100%', '#43e97b 0%, #38f9d7 100%'][rand(0,3)] }});">
            <div style="display: flex; align-items: center; justify-content: center; height: 100%; font-size: 3rem; color: white; opacity: 0.3;">
              {{ strtoupper(substr($project->title, 0, 1)) }}
            </div>
          </div>
        @endif
        
        <div class="project-card-body">
          
          {{-- Meta badges --}}
          <div style="display: flex; flex-wrap: wrap; gap: 0.5rem; margin-bottom: 1rem;">
            @if($project->type)
              @php($typeName = strtolower($project->type->name))
              <span class="badge-type badge-type-{{ $typeName === 'automazioni' ? 'automazioni' : ($typeName === 'backend' ? 'backend' : 'frontend') }}">
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
  
</div>
@endsection
