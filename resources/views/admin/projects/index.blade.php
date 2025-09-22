@extends('layouts.admin')

@section('title','Admin • Projects')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 m-0">Projects</h1>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">+ Nuovo progetto</a>
  </div>

  <div class="card">
    <div class="table-responsive">
      <table class="table table-striped align-middle mb-0">
        <thead>
          <tr>
            <th>#</th>
            <th>Titolo</th>
            <th>Immagine</th>
            <th>Link</th>
            <th class="text-end">Azioni</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($projects as $p)
            <tr>
              <td>{{ $p->id }}</td>
              <td>
                <a href="{{ route('admin.projects.show', $p) }}">{{ $p->title }}</a>
                @if($p->description)
                  <div class="text-muted small" style="max-width:420px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
                    {{ \Illuminate\Support\Str::limit($p->description, 120) }}
                  </div>
                @endif
              </td>
              <td>
                @if($p->image_url)
                  <img src="{{ $p->image_url }}" alt="" style="height:42px;max-width:84px;object-fit:cover;">
                @else
                  <span class="text-muted">—</span>
                @endif
              </td>
              <td>
                @if($p->link)
                  <a href="{{ $p->link }}" target="_blank" rel="noopener">Visita</a>
                @else
                  <span class="text-muted">—</span>
                @endif
              </td>
              <td class="text-end">
                <a href="{{ route('admin.projects.edit', $p) }}" class="btn btn-sm btn-outline-primary">Modifica</a>
                <form action="{{ route('admin.projects.destroy', $p) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Eliminare definitivamente questo progetto?');">
                  @csrf @method('DELETE')
                  <button class="btn btn-sm btn-outline-danger" type="submit">Elimina</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="5" class="text-center text-muted py-4">Nessun progetto presente.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>

    @if($projects->hasPages())
      <div class="card-footer">{{ $projects->links() }}</div>
    @endif
  </div>
@endsection
