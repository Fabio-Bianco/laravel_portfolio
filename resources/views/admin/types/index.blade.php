@extends('layouts.admin')

@section('title','Admin • Tipi')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 m-0">Tipi</h1>
    <a href="{{ route('admin.types.create') }}" class="btn btn-primary">Nuovo tipo</a>
  </div>

  <div class="card">
    <div class="table-responsive">
      <table class="table table-striped mb-0">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Slug</th>
            <th class="text-end">Azioni</th>
          </tr>
        </thead>
        <tbody>
          @forelse($types as $t)
            <tr>
              <td><a href="{{ route('admin.types.show', $t) }}">{{ $t->name }}</a></td>
              <td class="text-muted">{{ $t->slug }}</td>
              <td class="text-end">
                <a href="{{ route('admin.types.edit', $t) }}" class="btn btn-sm btn-outline-primary">Modifica</a>
                <form action="{{ route('admin.types.destroy', $t) }}" method="POST" class="d-inline" onsubmit="return confirm('Eliminare definitivamente?')">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-outline-danger" type="submit">Elimina</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="3" class="text-center text-muted">Nessun tipo.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  
@endsection
