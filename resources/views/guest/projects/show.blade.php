@extends('layouts.app')

@section('title', $project->title)

@section('content')
  <a class="btn btn-outline-secondary mb-3" href="{{ route('home') }}">← Torna al portfolio</a>

  <div class="card">
    <div class="card-body">
      <h1 class="h3 mb-1">{{ $project->title }}</h1>
      @if($project->type)
        <p class="mb-2"><span class="badge bg-primary">Tipo: {{ $project->type->name }}</span></p>
      @endif
      @if($project->technologies && $project->technologies->count())
        <p class="mb-3 d-flex flex-wrap gap-1">
          @foreach($project->technologies as $tech)
            <a href="{{ route('projects.byTechnology', $tech) }}" class="badge bg-info text-dark text-decoration-none">{{ $tech->name }}</a>
          @endforeach
        </p>
      @endif

      @if($project->image_url)
        <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="mb-3 img-fluid" style="max-height:320px;object-fit:cover;">
      @endif

      <p class="mb-3">{{ $project->description }}</p>

      @if(!is_null($project->stargazers_count) || !is_null($project->forks_count) || !is_null($project->watchers_count) || !is_null($project->updated_at_github))
        <p class="mb-3 text-muted small d-flex gap-3 align-items-center">
          @if(!is_null($project->stargazers_count))
            <span title="Stars"><i class="bi bi-star-fill text-warning"></i> {{ $project->stargazers_count }}</span>
          @endif
          @if(!is_null($project->forks_count))
            <span title="Forks"><i class="bi bi-git"></i> {{ $project->forks_count }}</span>
          @endif
          @if(!is_null($project->watchers_count))
            <span title="Watchers"><i class="bi bi-eye"></i> {{ $project->watchers_count }}</span>
          @endif
          @if(!is_null($project->updated_at_github))
            <span class="ms-auto" title="Last updated">Aggiornato {{ $project->updated_at_github->diffForHumans() }}</span>
          @endif
        </p>
      @endif

      <div class="d-flex flex-wrap gap-2">
        @if($project->link)
          <a href="{{ $project->link }}" class="btn btn-primary" target="_blank" rel="noopener">Visita il progetto</a>
        @endif
        @if($project->github_url)
          <a href="{{ $project->github_url }}" class="btn btn-outline-dark" target="_blank" rel="noopener">
            <i class="bi bi-github me-1"></i> Codice su GitHub
          </a>
        @endif
        @if($project->demo_url)
          <a href="{{ $project->demo_url }}" class="btn btn-outline-secondary" target="_blank" rel="noopener">Demo</a>
        @endif
      </div>
    </div>
  </div>
@endsection
