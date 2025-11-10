@extends('layouts.admin-sidebar')

@section('title','b_bot Portfolio • Dettaglio Progetto')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 m-0">{{ $project->title }}</h1>
    <div class="d-flex gap-2">
      <a class="btn btn-outline-secondary" href="{{ route('admin.projects.index') }}">Torna</a>
      <a class="btn btn-outline-primary" href="{{ route('admin.projects.edit', $project) }}">Modifica</a>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      @if($project->type)
        <p class="mb-2"><span class="badge bg-primary">Tipo: {{ $project->type->name }}</span></p>
      @endif
      
      @if($project->technologies && $project->technologies->count())
        <p class="mb-2 d-flex flex-wrap gap-1">
          @foreach($project->technologies as $tech)
            <span class="badge bg-info text-dark">{{ $tech->name }}</span>
          @endforeach
        </p>
      @endif

      @if($project->image_url)
        <img src="{{ $project->image_url }}" alt="" class="mb-3 img-fluid" style="max-height:260px;object-fit:cover;">
      @endif

      <dl class="row mb-0">
        <dt class="col-sm-3">Link</dt>
        <dd class="col-sm-9">
          @if($project->link)
            <a href="{{ $project->link }}" target="_blank" rel="noopener">{{ $project->link }}</a>
          @else
            <span class="text-muted">—</span>
          @endif
        </dd>

        <dt class="col-sm-3">GitHub</dt>
        <dd class="col-sm-9">
          @if($project->github_url)
            <a href="{{ $project->github_url }}" target="_blank" rel="noopener">{{ $project->github_url }}</a>
          @else
            <span class="text-muted">—</span>
          @endif
        </dd>

        <dt class="col-sm-3">Demo</dt>
        <dd class="col-sm-9">
          @if($project->demo_url)
            <a href="{{ $project->demo_url }}" target="_blank" rel="noopener">{{ $project->demo_url }}</a>
          @else
            <span class="text-muted">—</span>
          @endif
        </dd>

        <dt class="col-sm-3">Descrizione</dt>
        <dd class="col-sm-9">{!! nl2br(e($project->description)) ?: '<span class="text-muted">—</span>' !!}</dd>
      </dl>
    </div>
  </div>
@endsection
