@extends('guest.layouts.guest-minimal')

@section('title', $project->title)

@section('content')
<div class="guest-container">
  
  {{-- Back button --}}
  <a href="{{ route('home') }}" class="btn-minimal" style="margin-bottom: 2rem; display: inline-flex;">
    ← Torna al portfolio
  </a>

  {{-- Hero Section --}}
  <article style="max-width: 900px; margin: 0 auto;">
    
    {{-- Header --}}
    <header style="margin-bottom: 2rem;">
      
      {{-- Meta badges --}}
      <div style="display: flex; flex-wrap: wrap; gap: 0.5rem; margin-bottom: 1rem;">
        @if($project->type)
          @php($typeName = strtolower($project->type->name))
          <span class="badge-type badge-type-{{ $typeName === 'automazioni' ? 'automazioni' : ($typeName === 'backend' ? 'backend' : 'frontend') }}">
            {{ $project->type->name }}
          </span>
        @endif
        
        @if($project->technologies && $project->technologies->count())
          @foreach($project->technologies as $tech)
            <span class="badge-tech">{{ $tech->name }}</span>
          @endforeach
        @endif
      </div>
      
      {{-- Title --}}
      <h1 style="font-size: 2.5rem; font-weight: 700; margin-bottom: 1rem; line-height: 1.2;">
        {{ $project->title }}
      </h1>
      
      {{-- Description --}}
      @if($project->description)
        <p style="font-size: 1.2rem; color: var(--color-text-muted); line-height: 1.6;">
          {{ $project->description }}
        </p>
      @endif
      
    </header>

    {{-- Hero Image --}}
    @if($project->image_url)
      <div style="margin-bottom: 2rem; border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow-lg);">
        <img src="{{ $project->image_url }}" 
             alt="{{ $project->title }}" 
             style="width: 100%; height: auto; display: block;">
      </div>
    @endif

    {{-- Stats --}}
    @if(!is_null($project->stargazers_count) || !is_null($project->forks_count) || !is_null($project->watchers_count))
      <div style="display: flex; gap: 2rem; margin-bottom: 2rem; padding: 1.5rem; background: var(--color-surface); border-radius: var(--radius); border: 1px solid var(--color-border);">
        @if(!is_null($project->stargazers_count))
          <div>
            <div style="font-size: 1.5rem; font-weight: 600; color: var(--color-text);">
              {{ $project->stargazers_count }}
            </div>
            <div style="font-size: 0.9rem; color: var(--color-text-muted);">
              ⭐ Stars
            </div>
          </div>
        @endif
        
        @if(!is_null($project->forks_count))
          <div>
            <div style="font-size: 1.5rem; font-weight: 600; color: var(--color-text);">
              {{ $project->forks_count }}
            </div>
            <div style="font-size: 0.9rem; color: var(--color-text-muted);">
              🔀 Forks
            </div>
          </div>
        @endif
        
        @if(!is_null($project->watchers_count))
          <div>
            <div style="font-size: 1.5rem; font-weight: 600; color: var(--color-text);">
              {{ $project->watchers_count }}
            </div>
            <div style="font-size: 0.9rem; color: var(--color-text-muted);">
              👁️ Watchers
            </div>
          </div>
        @endif
        
        @if(!is_null($project->updated_at_github))
          <div style="margin-left: auto;">
            <div style="font-size: 0.9rem; color: var(--color-text-muted);">
              Ultimo aggiornamento
            </div>
            <div style="font-weight: 500; color: var(--color-text);">
              {{ $project->updated_at_github->diffForHumans() }}
            </div>
          </div>
        @endif
      </div>
    @endif

    {{-- Actions --}}
    <div style="display: flex; flex-wrap: wrap; gap: 1rem; margin-bottom: 3rem;">
      @if($project->link)
        <a href="{{ $project->link }}" 
           class="btn-primary-minimal" 
           target="_blank" 
           rel="noopener"
           style="font-size: 1rem; padding: 0.85rem 1.75rem;">
          🔗 Visita il progetto
          <span style="font-size: 1.2rem;">→</span>
        </a>
      @endif
      
      @if($project->github_url)
        <a href="{{ $project->github_url }}" 
           class="btn-minimal" 
           target="_blank" 
           rel="noopener"
           style="font-size: 1rem; padding: 0.85rem 1.75rem;">
          <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
          </svg>
          Codice GitHub
        </a>
      @endif
      
      @if($project->demo_url)
        <a href="{{ $project->demo_url }}" 
           class="btn-minimal" 
           target="_blank" 
           rel="noopener"
           style="font-size: 1rem; padding: 0.85rem 1.75rem;">
          🚀 Demo Live
        </a>
      @endif
    </div>

    {{-- Tech Stack Section --}}
    @if($project->technologies && $project->technologies->count())
      <section style="padding: 2rem; background: var(--color-surface); border-radius: var(--radius); border: 1px solid var(--color-border);">
        <h2 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 1.5rem;">
          🛠️ Stack Tecnologico
        </h2>
        <div style="display: flex; flex-wrap: wrap; gap: 0.75rem;">
          @foreach($project->technologies as $tech)
            <div style="padding: 0.75rem 1.25rem; background: rgba(59, 130, 246, 0.1); border: 1px solid rgba(59, 130, 246, 0.3); border-radius: 8px; font-weight: 500; color: var(--color-accent);">
              {{ $tech->name }}
            </div>
          @endforeach
        </div>
      </section>
    @endif

  </article>
  
</div>
@endsection

@push('head')
<style>
  @media (max-width: 768px) {
    h1 {
      font-size: 2rem !important;
    }
  }
</style>
@endpush
