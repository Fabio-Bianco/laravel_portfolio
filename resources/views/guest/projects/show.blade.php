@extends('layouts.app')

@section('title', $project->title)

@section('content')
  <a class="btn btn-outline-secondary mb-3" href="{{ route('home') }}">← Torna al portfolio</a>

  <div class="card">
    <div class="card-body">
      <h1 class="h3 mb-3">{{ $project->title }}</h1>

      @if($project->image_url)
        <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="mb-3 img-fluid" style="max-height:320px;object-fit:cover;">
      @endif

      <p class="mb-3">{{ $project->description }}</p>

      @if($project->link)
        <a href="{{ $project->link }}" class="btn btn-primary" target="_blank" rel="noopener">Visita il progetto</a>
      @endif
    </div>
  </div>
@endsection
