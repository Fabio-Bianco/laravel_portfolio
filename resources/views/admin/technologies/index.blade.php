@extends('admin.layouts.admin-sidebar')

@section('page-title', 'Tecnologie')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 m-0">Tecnologie</h1>
    <a class="btn btn-primary" href="{{ route('admin.technologies.create') }}">Nuova tecnologia</a>
  </div>

  <div class="card">
    <div class="card-body">
      @if($technologies->count())
        <table class="table align-middle">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Slug</th>
              <th class="text-end">Azioni</th>
            </tr>
          </thead>
          <tbody>
            @foreach($technologies as $tech)
              <tr>
                <td>{{ $tech->name }}</td>
                <td class="text-muted">{{ $tech->slug }}</td>
                <td class="text-end">
                  <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.technologies.show', $tech) }}">Vedi</a>
                  <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.technologies.edit', $tech) }}">Modifica</a>
                  <form action="{{ route('admin.technologies.destroy', $tech) }}" method="POST" class="d-inline" onsubmit="return confirm('Eliminare questa tecnologia?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger" type="submit">Elimina</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{ $technologies->links() }}
      @else
        <p class="mb-0 text-muted">Nessuna tecnologia presente.</p>
      @endif
    </div>
  </div>
@endsection
