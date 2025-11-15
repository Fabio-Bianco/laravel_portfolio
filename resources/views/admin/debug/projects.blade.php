@extends('admin.layouts.admin-sidebar')

@section('page-title', 'Tutti i Progetti')

@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h2 class="h4 mb-1">🗂️ Tutti i Progetti</h2>
      <p class="text-muted mb-0">Gestisci in batch i progetti: pubblica, nascondi o elimina</p>
    </div>
  </div>

  <div class="card mb-3">
    <div class="card-body">
      <div class="row g-2">
        <div class="col-auto">
          <button type="button" class="btn btn-sm btn-outline-primary" id="selectAll">✓ Seleziona Tutti</button>
          <button type="button" class="btn btn-sm btn-outline-secondary" id="deselectAll">✗ Deseleziona</button>
        </div>
        <div class="col-auto ms-auto">
          <button type="button" class="btn btn-sm btn-success" id="bulkPublish">👁️ Pubblica</button>
          <button type="button" class="btn btn-sm btn-warning" id="bulkUnpublish">🔒 Nascondi</button>
          <button type="button" class="btn btn-sm btn-danger" id="bulkDelete">🗑️ Elimina</button>
        </div>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th style="width: 40px;">
              <input type="checkbox" class="form-check-input" id="checkAll">
            </th>
            <th style="width: 60px;">#</th>
            <th>Titolo</th>
            <th>Tipo</th>
            <th>Tecnologie</th>
            <th>Stato</th>
            <th>GitHub Stars</th>
            <th>Data</th>
          </tr>
        </thead>
        <tbody>
          @forelse($projects as $p)
          <tr>
            <td>
              <input type="checkbox" class="form-check-input project-checkbox" value="{{ $p->id }}">
            </td>
            <td class="text-muted small">{{ $p->id }}</td>
            <td>
              <div class="d-flex align-items-center gap-2">
                <strong>{{ $p->title }}</strong>
                @if($p->is_featured)
                  <i class="bi bi-star-fill text-warning" title="Featured"></i>
                @endif
              </div>
              @if($p->description)
                <small class="text-muted d-block">{{ Str::limit($p->description, 80) }}</small>
              @endif
            </td>
            <td>
              @if($p->type)
                <span class="badge bg-primary">{{ $p->type->name }}</span>
              @else
                <span class="text-muted">—</span>
              @endif
            </td>
            <td>
              @if($p->technologies && $p->technologies->count())
                <div class="d-flex gap-1 flex-wrap">
                  @foreach($p->technologies->take(3) as $tech)
                    <span class="badge bg-info text-dark">{{ $tech->name }}</span>
                  @endforeach
                  @if($p->technologies->count() > 3)
                    <span class="badge bg-secondary">+{{ $p->technologies->count() - 3 }}</span>
                  @endif
                </div>
              @else
                <span class="text-muted">—</span>
              @endif
            </td>
            <td>
              @if($p->is_published)
                <span class="badge bg-success">Pubblicato</span>
              @else
                <span class="badge bg-secondary">Draft</span>
              @endif
            </td>
            <td class="text-center">
              @if($p->stargazers_count)
                <span class="badge bg-warning text-dark">
                  ⭐ {{ $p->stargazers_count }}
                </span>
              @else
                <span class="text-muted">—</span>
              @endif
            </td>
            <td class="text-muted small">
              {{ $p->created_at->format('d/m/Y') }}
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="8" class="text-center text-muted py-4">
              Nessun progetto trovato.
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <div class="mt-3 text-muted small">
    <strong>Totale progetti:</strong> {{ $projects->count() }}
    <span class="ms-3"><strong>Pubblicati:</strong> {{ $projects->where('is_published', true)->count() }}</span>
    <span class="ms-3"><strong>Draft:</strong> {{ $projects->where('is_published', false)->count() }}</span>
    <span class="ms-3"><strong>Featured:</strong> {{ $projects->where('is_featured', true)->count() }}</span>
  </div>

</div>

<form id="bulkPublishForm" method="POST" action="{{ route('admin.projects.bulk-publish') }}" style="display:none;">
  @csrf
  <div id="publishInputs"></div>
</form>

<form id="bulkUnpublishForm" method="POST" action="{{ route('admin.projects.bulk-unpublish') }}" style="display:none;">
  @csrf
  <div id="unpublishInputs"></div>
</form>

<form id="bulkDeleteForm" method="POST" action="{{ route('admin.projects.bulk-delete') }}" style="display:none;">
  @csrf
  @method('DELETE')
  <div id="deleteInputs"></div>
</form>

@push('head')
  @vite(['resources/js/admin-projects-bulk.js'])
@endpush

@endsection
