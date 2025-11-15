@extends('admin.layouts.admin-sidebar')

@section('page-title', 'Import GitHub')

@section('content')
  <div class="admin-projects-page">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h1 class="h3 m-0">I miei Progetti</h1>
      <div class="d-flex gap-2">
        <form action="{{ route('admin.import.github') }}" method="POST" class="d-flex gap-2 align-items-center">
          @csrf
          <input type="text" name="username" value="Fabio-Bianco" class="form-control form-control-sm" placeholder="GitHub username" style="width: 170px;">
          <select name="visibility" class="form-select form-select-sm" style="width: 130px;">
            <option value="public" selected>public</option>
            <option value="private">private</option>
            <option value="all">all</option>
          </select>
          <div class="form-check form-check-sm">
            <input class="form-check-input" type="checkbox" value="1" id="includeForks" name="include_forks">
            <label class="form-check-label small" for="includeForks">Forks</label>
          </div>
          <input type="text" name="topics" class="form-control form-control-sm" placeholder="topics csv" style="width: 160px;">
          <button class="btn btn-sm btn-outline-secondary" type="submit" title="Import">
            <i class="bi bi-cloud-download"></i>
            <span class="d-none d-sm-inline">Import</span>
          </button>
        </form>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary d-flex align-items-center gap-1">
          <i class="bi bi-plus-lg"></i>
          <span class="d-none d-sm-inline">Nuovo progetto</span>
        </a>
      </div>
    </div>
    @if(session('import_output'))
      <details class="mb-3">
        <summary class="small text-muted">Mostra output import</summary>
        <pre class="small bg-body-tertiary border rounded p-2 mt-2">{{ trim(session('import_output')) }}</pre>
      </details>
    @endif
<div class="container py-4">
  <div class="row g-3">
    @forelse ($projects as $p)
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card h-100 shadow-sm">
          @if($p->image_url)
            <img src="{{ $p->image_url }}" 
                 alt="{{ $p->title }}" 
                 class="card-img-top" 
                 style="height:180px; object-fit:cover;">
          @else
            <img src="https://via.placeholder.com/400x200?text=No+Image"
                 class="card-img-top" 
                 alt="placeholder">
          @endif

          <div class="card-body">
            <div class="d-flex">
              <!-- Colonna contenuti -->
              <div class="flex-grow-1 d-flex flex-column">
                <h5 class="card-title d-flex align-items-center gap-2">
                  <a href="{{ route('admin.projects.show', $p) }}" class="text-decoration-none">
                    {{ $p->title }}
                  </a>
                  @if($p->is_featured)
                    <i class="bi bi-star-fill text-warning" title="In evidenza"></i>
                  @endif
                  @if(!$p->is_published)
                    <span class="badge bg-secondary">Draft</span>
                  @else
                    <i class="bi bi-eye-fill text-success" title="Pubblicato"></i>
                  @endif
                </h5>

                @if($p->description)
                  <p class="card-text text-muted small mb-3">
                    {{ \Illuminate\Support\Str::limit($p->description, 100) }}
                  </p>
                @endif

                @if($p->type)
                  <div class="mb-2"><span class="badge bg-primary">{{ $p->type->name }}</span></div>
                @endif
                @if($p->technologies && $p->technologies->count())
                  <div class="d-flex gap-1 flex-wrap mb-2">
                    @foreach($p->technologies as $tech)
                      <span class="badge bg-info text-dark">{{ $tech->name }}</span>
                    @endforeach
                  </div>
                @endif

                <!-- Azioni mobile (icone) -->
                <div class="mt-auto d-flex gap-2 align-items-center flex-wrap w-100 justify-content-end d-md-none">
                  <a href="{{ route('admin.projects.show', $p) }}" 
                     class="btn btn-sm btn-outline-primary btn-action" title="Vedi" aria-label="Vedi">
                    <i class="bi bi-eye" aria-hidden="true"></i>
                    <span class="visually-hidden">Vedi</span>
                  </a>
                  <a href="{{ route('admin.projects.edit', $p) }}" 
                     class="btn btn-sm btn-outline-primary btn-action" title="Modifica" aria-label="Modifica">
                    <i class="bi bi-pencil" aria-hidden="true"></i>
                    <span class="visually-hidden">Modifica</span>
                  </a>
                  @if($p->link)
                    <a href="{{ $p->link }}" target="_blank" rel="noopener"
                       class="btn btn-sm btn-outline-secondary btn-action" title="Visita" aria-label="Visita">
                      <i class="bi bi-box-arrow-up-right" aria-hidden="true"></i>
                      <span class="visually-hidden">Visita</span>
                    </a>
                  @endif
                  <form action="{{ route('admin.projects.destroy', $p) }}" 
                        method="POST"
                        class="js-project-delete"
                        data-project-title="{{ $p->title }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger btn-action" type="submit" title="Elimina" aria-label="Elimina">
                      <i class="bi bi-trash" aria-hidden="true"></i>
                      <span class="visually-hidden">Elimina</span>
                    </button>
                  </form>
                </div>
              </div>

              <!-- Sidebar azioni desktop (testo) -->
          <div class="d-none d-md-flex flex-column ms-3 ps-3 border-start card-actions-sidebar gap-2 align-items-stretch">
                <a href="{{ route('admin.projects.show', $p) }}" 
             class="btn btn-sm btn-outline-primary text-nowrap btn-action" title="Vedi">VEDI</a>
                <a href="{{ route('admin.projects.edit', $p) }}" 
             class="btn btn-sm btn-outline-primary text-nowrap btn-action" title="Modifica">MODIFICA</a>
                @if($p->link)
                  <a href="{{ $p->link }}" target="_blank" rel="noopener"
              class="btn btn-sm btn-outline-secondary text-nowrap btn-action" title="Visita">VISITA</a>
                @endif
                <form action="{{ route('admin.projects.destroy', $p) }}" 
                      method="POST"
                      class="js-project-delete"
                      data-project-title="{{ $p->title }}">
                  @csrf
                  @method('DELETE')
            <button class="btn btn-sm btn-outline-danger text-nowrap btn-action" type="submit" title="Elimina">ELIMINA</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    @empty
      <div class="col-12 text-center text-muted py-4">
        Nessun progetto presente.
      </div>
    @endforelse
  </div>

  @if($projects->hasPages())
    <div class="mt-4">
      {{ $projects->links() }}
    </div>
  @endif
</div>

  </div>
@endsection

@push('scripts')
@endpush
