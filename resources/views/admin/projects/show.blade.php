@extends('layouts.admin')

@section('title','Admin • Dettaglio Progetto')

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
      @if($project->category)
        <p class="mb-1"><span class="badge bg-secondary">{{ $project->category->name }}</span></p>
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

        <dt class="col-sm-3">Descrizione</dt>
        <dd class="col-sm-9">{!! nl2br(e($project->description)) ?: '<span class="text-muted">—</span>' !!}</dd>
      </dl>
    </div>
  </div>
@endsection
