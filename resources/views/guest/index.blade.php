@extends('layouts.app')

@section('title','Portfolio')

@section('content')
  <h1 class="h3 mb-3">Portfolio</h1>

  <div class="row g-3">
    @forelse($projects as $p)
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="card h-100 shadow-sm">
          @if($p->image_url)
            <img src="{{ $p->image_url }}" class="card-img-top" alt="{{ $p->title }}">
          @endif
          <div class="card-body d-flex flex-column">
            <h2 class="h5 card-title">{{ $p->title }}</h2>
            <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($p->description, 120) }}</p>
            <div class="mt-auto d-flex gap-2">
              <a class="btn btn-sm btn-outline-primary" href="{{ route('projects.show', $p) }}">Dettagli</a>
              @if($p->link)
                <a class="btn btn-sm btn-outline-secondary" href="{{ $p->link }}" target="_blank" rel="noopener">Visita</a>
              @endif
            </div>
          </div>
        </div>
      </div>
    @empty
      <div class="col-12 text-muted">Nessun progetto disponibile.</div>
    @endforelse
  </div>

  @if($projects->hasPages())
    <div class="mt-3">{{ $projects->links() }}</div>
  @endif
@endsection
