@extends('layouts.app')

@section('title','Portfolio')

@section('content')
  <div class="portfolio-page">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h1 class="h3 m-0">
        @if(isset($isFeatured) && $isFeatured)
          <i class="bi bi-star-fill text-warning"></i> Progetti in Evidenza
        @elseif(isset($currentTechnology))
          Tecnologia: {{ $currentTechnology->name }}
        @elseif(isset($currentType))
          Tipo: {{ $currentType->name }}
        @else
          I miei progetti
        @endif
      </h1>
      <div class="d-flex gap-2">
        @if(!isset($isFeatured) || !$isFeatured)
          <a class="btn btn-sm btn-warning" href="{{ route('projects.featured') }}">
            <i class="bi bi-star-fill"></i> Featured
          </a>
        @endif
        @if(isset($currentTechnology) || isset($currentType) || (isset($isFeatured) && $isFeatured))
          <a class="btn btn-sm btn-outline-secondary" href="{{ route('home') }}">Tutti i progetti</a>
        @endif
      </div>
    </div>

    @if(isset($allTechnologies) || isset($allTypes))
      <div class="mb-3">
        <div class="row g-2">
          @isset($allTechnologies)
            <div class="col-12">
              <div class="d-flex align-items-center gap-2 flex-wrap">
                      <strong class="text-muted">Tecnologie:</strong>
                      <a href="{{ route('home', array_filter(['type' => isset($currentType)?$currentType->slug:null])) }}" class="badge-filter {{ !isset($currentTechnology) ? 'is-active' : '' }}">Tutte
                        @isset($technologyCounts)
                          <span class="badge-count badge rounded-pill">{{ $technologyCounts->sum() }}</span>
                        @endisset
                      </a>
                @foreach($allTechnologies as $tech)
                      <a href="{{ route('home', array_filter(['technology' => $tech->slug, 'type' => isset($currentType)?$currentType->slug:null])) }}"
                         class="badge-filter {{ (isset($currentTechnology) && $currentTechnology->id === $tech->id) ? 'is-active' : '' }}">
                        {{ $tech->name }}
                        @isset($technologyCounts)
                          <span class="badge-count badge rounded-pill">{{ $technologyCounts[$tech->id] ?? 0 }}</span>
                        @endisset
                      </a>
                @endforeach
              </div>
            </div>
          @endisset
          @isset($allTypes)
            <div class="col-12">
              <div class="d-flex align-items-center gap-2 flex-wrap">
                <strong class="text-muted">Tipi:</strong>
                      <a href="{{ route('home', array_filter(['technology' => isset($currentTechnology)?$currentTechnology->slug:null])) }}" class="badge-filter {{ !isset($currentType) ? 'is-active' : '' }}">
                        Tutti
                        @isset($typeCounts)
                          <span class="badge-count badge rounded-pill">{{ $typeCounts->sum() }}</span>
                        @endisset
                      </a>
                @foreach($allTypes as $t)
                      <a href="{{ route('home', array_filter(['type' => $t->slug, 'technology' => isset($currentTechnology)?$currentTechnology->slug:null])) }}"
                         class="badge-filter {{ (isset($currentType) && $currentType->id === $t->id) ? 'is-active' : '' }}">
                        {{ $t->name }}
                        @isset($typeCounts)
                          <span class="badge-count badge rounded-pill">{{ $typeCounts[$t->id] ?? 0 }}</span>
                        @endisset
                      </a>
                @endforeach
              </div>
            </div>
          @endisset
        </div>
      </div>
    @endif

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
                    <a href="{{ route('projects.byTechnology', $tech) }}" class="badge badge-tech text-decoration-none" data-bs-toggle="tooltip" title="Tecnologia: {{ $tech->name }}">{{ $tech->name }}</a>
                  @endforeach
                </div>
              @endif
              @if($p->type)
                <div class="mb-2">
                  @php($typeName = strtolower($p->type->name))
                  <a href="{{ route('projects.byType', $p->type) }}" class="badge badge-type badge-type-{{ $typeName === 'automazioni' ? 'automazioni' : ($typeName === 'backend' ? 'backend' : 'frontend') }} text-decoration-none">
                    @if($typeName === 'backend')
                      <i class="bi bi-cpu me-1" aria-hidden="true"></i>
                    @elseif($typeName === 'automazioni')
                      <i class="bi bi-gear me-1" aria-hidden="true"></i>
                    @else
                      <i class="bi bi-code-slash me-1" aria-hidden="true"></i>
                    @endif
                    {{ $p->type->name }}
                  </a>
                </div>
              @endif
              <h2 class="h5 card-title">{{ $p->title }}</h2>
              <p class="card-text text-muted mb-2">
                <span class="desc-short line-clamp-2">{{ $p->description }}</span>
                <span id="desc-{{ $p->id }}" class="desc-full d-none">{{ $p->description }}</span>
              </p>
              @if(!is_null($p->stargazers_count) || !is_null($p->forks_count) || !is_null($p->watchers_count) || !is_null($p->updated_at_github))
                <div class="mb-2 card-meta">
                  @if(!is_null($p->stargazers_count))
                    <span title="Stars"><i class="bi bi-star-fill text-warning"></i> {{ $p->stargazers_count }}</span>
                  @endif
                  @if(!is_null($p->forks_count))
                    <span title="Forks"><i class="bi bi-git"></i> {{ $p->forks_count }}</span>
                  @endif
                  @if(!is_null($p->watchers_count))
                    <span title="Watchers"><i class="bi bi-eye"></i> {{ $p->watchers_count }}</span>
                  @endif
                  @if(!is_null($p->updated_at_github))
                    <span class="ms-auto" title="Last updated">Aggiornato {{ $p->updated_at_github->diffForHumans() }}</span>
                  @endif
                </div>
              @endif
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
