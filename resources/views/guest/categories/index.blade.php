@extends('layouts.app')

@section('title','Categorie')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 m-0">Work</h1>
    <a class="btn btn-sm btn-outline-secondary" href="{{ route('home') }}">Torna al portfolio</a>
  </div>

  <div class="row g-3">
    @forelse($categories as $cat)
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card h-100">
          <div class="card-body d-flex flex-column">
            <h2 class="h5 m-0">
              <a class="text-decoration-none" href="{{ route('projects.byCategory', $cat) }}">
                {{ $cat->name }}
              </a>
            </h2>
            <p class="text-muted mb-3">{{ $cat->projects_count }} progetti</p>
            <div class="mt-auto">
              <a class="btn btn-sm btn-outline-primary" href="{{ route('projects.byCategory', $cat) }}">Vedi progetti</a>
            </div>
          </div>
        </div>
      </div>
    @empty
      <div class="col-12 text-muted">Nessuna categoria disponibile.</div>
    @endforelse
  </div>
@endsection
