@extends('layouts.app')

@section('title','Portfolio')

@section('content')
  <div class="portfolio-page">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h1 class="h3 m-0">
        @isset($currentTechnology)
          Tecnologia: {{ $currentTechnology->name }}
        @else
          I miei progetti
        @endisset
      </h1>
      @isset($currentTechnology)
        <a class="btn btn-sm btn-outline-secondary" href="{{ route('home') }}">Tutte le tecnologie</a>
      @endisset
    </div>

    @isset($allTechnologies)
      <div class="mb-3">
        <ul class="nav nav-pills flex-wrap gap-2">
          <li class="nav-item">
            <a href="{{ route('home') }}"
               class="nav-link {{ !isset($currentTechnology) ? 'active' : '' }}">Tutte</a>
          </li>
          @foreach($allTechnologies as $tech)
            <li class="nav-item">
              <a href="{{ route('projects.byTechnology', $tech) }}"
                 class="nav-link {{ (isset($currentTechnology) && $currentTechnology->id === $tech->id) ? 'active' : '' }}">
                {{ $tech->name }}
              </a>
            </li>
          @endforeach
        </ul>
      </div>
    @endisset

    <div class="row g-3">
      @forelse($projects as $p)
        <div class="col-12 col-md-6 col-lg-4">
          <div class="card h-100 shadow-sm">
            @if($p->image_url)
              <div class="card-img-top ratio ratio-16x9 overflow-hidden">
                <img src="{{ $p->image_url }}" class="w-100 h-100 object-fit-cover" alt="{{ $p->title }}">
              </div>
            @endif
            <div class="card-body d-flex flex-column">
              @if($p->technologies && $p->technologies->count())
                <div class="d-flex gap-1 flex-wrap mb-2">
                  @foreach($p->technologies as $tech)
                    <a href="{{ route('projects.byTechnology', $tech) }}" class="badge bg-info text-dark text-decoration-none">{{ $tech->name }}</a>
                  @endforeach
                </div>
              @endif
              <h2 class="h5 card-title">{{ $p->title }}</h2>
              <p class="card-text text-muted mb-2">
                <span class="desc-short line-clamp-2">{{ $p->description }}</span>
                <span id="desc-{{ $p->id }}" class="desc-full d-none">{{ $p->description }}</span>
              </p>
              <div class="mt-auto d-flex gap-2 justify-content-end">
                <a class="btn btn-sm btn-outline-primary" href="{{ route('projects.show', $p->slug) }}">Vedi</a>
                @if($p->link)
                  <a class="btn btn-sm btn-outline-secondary" href="{{ $p->link }}" target="_blank" rel="noopener">Esplora</a>
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
  </div>
@endsection
