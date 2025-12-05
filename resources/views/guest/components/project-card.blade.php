{{-- 
  PROJECT CARD - CARD SINGOLO PROGETTO
  
  Scopo: Renderizzare una singola card progetto con tutti i suoi dati
  
  Dati ricevuti:
  - $project: Model Project con relazioni (type, technologies)
  - $style: 'carousel' | 'grid' (default: grid)
  
  Stili:
  - carousel: Compact per carosello Netflix (focus su visual + titolo)
  - grid: Full per griglia portfolio (tutti i dettagli)
  
  Pattern: Adaptive Component con conditional styling
--}}
@php
  $cardStyle = $style ?? 'grid';
  $isCarousel = $cardStyle === 'carousel';
@endphp

<article class="project-card project-card--{{ $cardStyle }}">
  {{-- Header con immagine o placeholder --}}
  <div class="project-header">
    @if($project->image_url)
      <img src="{{ $project->image_url }}" 
           alt="{{ $project->title }}" 
           class="project-image">
    @else
      <div class="project-placeholder">
        @if($isCarousel)
          {{-- Placeholder più visivo per carosello --}}
          <img src="https://via.placeholder.com/400x250/6366f1/ffffff?text={{ urlencode($project->title) }}" 
               alt="{{ $project->title }} placeholder" 
               class="project-image placeholder-img">
        @else
          <span class="placeholder-text">{{ strtoupper(substr($project->title, 0, 2)) }}</span>
        @endif
      </div>
    @endif
  </div>
  
  {{-- Content principale --}}
  <div class="project-content">
    {{-- Badge tipo progetto --}}
    @if($project->type)
      <span class="project-type badge">{{ $project->type->name }}</span>
    @endif
    
    {{-- Titolo progetto --}}
    <h3 class="project-title">
      <a href="{{ route('projects.show', $project->slug) }}">
        {{ $project->title }}
      </a>
    </h3>
    
    {{-- Descrizione (solo grid mode) --}}
    @if(!$isCarousel && $project->description)
      <p class="project-description">
        {{ Str::limit($project->description, 100) }}
      </p>
    @endif
    
    {{-- Tecnologie (limitate in carousel) --}}
    @if($project->technologies && $project->technologies->count())
      <div class="project-technologies">
        @php $maxTechs = $isCarousel ? 2 : 3 @endphp
        @foreach($project->technologies->take($maxTechs) as $tech)
          <span class="tech-tag">{{ $tech->name }}</span>
        @endforeach
        @if($project->technologies->count() > $maxTechs)
          <span class="tech-more">+{{ $project->technologies->count() - $maxTechs }}</span>
        @endif
      </div>
    @endif
  </div>
  
  {{-- Footer con stats e azioni (solo se non carousel o se ha dati importanti) --}}
  @if(!$isCarousel || ($project->stargazers_count || $project->forks_count))
    <div class="project-footer">
      {{-- Stats GitHub --}}
      @if($project->stargazers_count || $project->forks_count)
        <div class="project-stats">
          @if($project->stargazers_count)
            <span class="stat">⭐ {{ $project->stargazers_count }}</span>
          @endif
          @if($project->forks_count)  
            <span class="stat">🔀 {{ $project->forks_count }}</span>
          @endif
        </div>
      @endif
      
      {{-- Buttons azione (solo grid mode) --}}
      @if(!$isCarousel)
        <div class="project-actions">
          @if($project->link)
            <a href="{{ $project->link }}" target="_blank" class="btn-live">Live</a>
          @endif
          @if($project->github_url)
            <a href="{{ $project->github_url }}" target="_blank" class="btn-github">GitHub</a>  
          @endif
        </div>
      @endif
    </div>
  @endif
</article>