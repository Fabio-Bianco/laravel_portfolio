@extends('layouts.admin-sidebar')

@section('page-title', 'Modifica Progetti')

@section('content')
<div class="container-fluid">
  
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h2 class="h4 mb-1">✏️ Modifica Progetti</h2>
      <p class="text-muted mb-0">Modifica rapidamente titolo, immagine e link dei progetti pubblicati</p>
    </div>
    <span class="badge bg-info">{{ $projects->total() }} progetti</span>
  </div>

  @if(session('project_updated'))
    <div class="alert alert-success alert-dismissible fade show">
      ✓ Progetto <strong>{{ session('project_updated') }}</strong> aggiornato con successo!
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  <div class="row g-3">
    @forelse($projects as $p)
      <div class="col-12 col-md-6 col-xl-4">
        <div class="card h-100 shadow-sm position-relative">
          
          {{-- Badge stato --}}
          <div class="position-absolute top-0 end-0 m-2" style="z-index: 10;">
            @if($p->is_featured)
              <span class="badge bg-warning text-dark me-1">⭐ Featured</span>
            @endif
            @if($p->is_published)
              <span class="badge bg-success">👁️ Pubblicato</span>
            @else
              <span class="badge bg-secondary">🔒 Draft</span>
            @endif
          </div>
          
          {{-- Immagine --}}
          @if($p->image_url)
            <div class="card-img-top ratio ratio-16x9 overflow-hidden bg-light position-relative">
              <img src="{{ $p->image_url }}" class="w-100 h-100 object-fit-cover" alt="{{ $p->title }}" id="img-preview-{{ $p->id }}">
              <div class="position-absolute bottom-0 start-0 end-0 p-2 bg-dark bg-opacity-75">
                <button type="button" class="btn btn-sm btn-light w-100" data-bs-toggle="modal" data-bs-target="#editImageModal{{ $p->id }}">
                  🖼️ Cambia Immagine
                </button>
              </div>
            </div>
          @else
            <div class="card-img-top ratio ratio-16x9 bg-secondary d-flex align-items-center justify-content-center">
              <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#editImageModal{{ $p->id }}">
                🖼️ Aggiungi Immagine
              </button>
            </div>
          @endif
          
          <div class="card-body">
            
            {{-- Tecnologie --}}
            @if($p->technologies && $p->technologies->count())
              <div class="d-flex gap-1 flex-wrap mb-2">
                @foreach($p->technologies as $tech)
                  <span class="badge bg-info text-dark">{{ $tech->name }}</span>
                @endforeach
              </div>
            @endif
            
            {{-- Tipo --}}
            @if($p->type)
              <div class="mb-2">
                <span class="badge bg-primary">{{ $p->type->name }}</span>
              </div>
            @endif
            
            {{-- Titolo editabile --}}
            <div class="mb-3">
              <button type="button" class="btn btn-link p-0 text-start w-100 text-decoration-none" data-bs-toggle="modal" data-bs-target="#editTitleModal{{ $p->id }}">
                <h3 class="h5 card-title mb-0 text-dark">
                  {{ $p->title }}
                  <small class="text-muted ms-1">✏️</small>
                </h3>
              </button>
            </div>
            
            {{-- Descrizione --}}
            @if($p->description)
              <p class="card-text text-muted small mb-2 line-clamp-3">{{ $p->description }}</p>
            @endif
            
            {{-- Meta info --}}
            @if(!is_null($p->stargazers_count) || !is_null($p->forks_count))
              <div class="mb-3 small text-muted">
                @if(!is_null($p->stargazers_count))
                  <span class="me-2">⭐ {{ $p->stargazers_count }}</span>
                @endif
                @if(!is_null($p->forks_count))
                  <span>🔀 {{ $p->forks_count }}</span>
                @endif
              </div>
            @endif
            
            {{-- Azioni --}}
            <div class="d-flex gap-2 flex-wrap">
              <button type="button" class="btn btn-sm btn-primary flex-fill" data-bs-toggle="modal" data-bs-target="#editLinkModal{{ $p->id }}">
                🔗 {{ $p->link ? 'Modifica Link' : 'Aggiungi Link' }}
              </button>
              <a href="{{ route('projects.show', $p->slug) }}" class="btn btn-sm btn-outline-secondary" target="_blank">
                👁️ Vedi
              </a>
            </div>
            
            @if($p->link)
              <div class="mt-2">
                <small class="text-muted d-block text-truncate">
                  🔗 <a href="{{ $p->link }}" target="_blank" class="text-decoration-none">{{ $p->link }}</a>
                </small>
              </div>
            @endif
            
          </div>
          
        </div>
      </div>
      
      {{-- Modal Modifica Titolo --}}
      <div class="modal fade" id="editTitleModal{{ $p->id }}" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="POST" action="{{ route('admin.projects.quick-update', $p) }}">
              @csrf
              @method('PATCH')
              <input type="hidden" name="field" value="title">
              <div class="modal-header">
                <h5 class="modal-title">✏️ Modifica Titolo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label class="form-label">Titolo progetto</label>
                  <input type="text" name="title" class="form-control" value="{{ $p->title }}" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <button type="submit" class="btn btn-primary">Salva</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      
      {{-- Modal Modifica Immagine --}}
      <div class="modal fade" id="editImageModal{{ $p->id }}" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="POST" action="{{ route('admin.projects.quick-update', $p) }}">
              @csrf
              @method('PATCH')
              <input type="hidden" name="field" value="image_url">
              <div class="modal-header">
                <h5 class="modal-title">🖼️ Modifica Immagine</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label class="form-label">URL Immagine</label>
                  <input type="url" name="image_url" class="form-control" value="{{ $p->image_url }}" placeholder="https://...">
                  <div class="form-text">Inserisci l'URL completo dell'immagine</div>
                </div>
                @if($p->image_url)
                  <div class="mb-3">
                    <label class="form-label">Anteprima attuale:</label>
                    <div class="ratio ratio-16x9 border rounded overflow-hidden">
                      <img src="{{ $p->image_url }}" class="w-100 h-100 object-fit-cover" alt="Preview">
                    </div>
                  </div>
                @endif
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <button type="submit" class="btn btn-primary">Salva</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      
      {{-- Modal Modifica Link --}}
      <div class="modal fade" id="editLinkModal{{ $p->id }}" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="POST" action="{{ route('admin.projects.quick-update', $p) }}">
              @csrf
              @method('PATCH')
              <input type="hidden" name="field" value="link">
              <div class="modal-header">
                <h5 class="modal-title">🔗 Modifica Link</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label class="form-label">Link progetto</label>
                  <input type="url" name="link" class="form-control" value="{{ $p->link }}" placeholder="https://...">
                  <div class="form-text">Link esterno al progetto (es. GitHub repo, demo, sito)</div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <button type="submit" class="btn btn-primary">Salva</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      
    @empty
      <div class="col-12">
        <div class="alert alert-info">
          <strong>ℹ️ Nessun progetto trovato.</strong>
          <p class="mb-0 mt-2">Inizia importando progetti da GitHub o creandone di nuovi.</p>
        </div>
      </div>
    @endforelse
  </div>

  {{-- Paginazione --}}
  @if($projects->hasPages())
    <div class="mt-4">
      {{ $projects->links() }}
    </div>
  @endif
  
</div>

@push('head')
<style>
  .line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
  
  .object-fit-cover {
    object-fit: cover;
  }
</style>
@endpush

@endsection
