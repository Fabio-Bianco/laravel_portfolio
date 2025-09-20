@extends('layouts.projects')

@section('title','Tutti i progetti')

@section('content')
  <div class="card shadow-sm mb-4">
    <div class="card-body">
      <h2 class="card-title mb-2">Tutti i progetti</h2>
      <p class="lead mb-0">Benvenuto nella pagina dei progetti.</p>
    </div>
  </div>

  <div class="table-responsive mb-4">
    <table class="projects-table table table-striped align-middle">
      <thead>
        <tr>
          <th>Titolo</th>
          <th>Descrizione</th>
          <th>Immagine</th>
          <th>Link</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($projects as $project)
          <tr>
            <td>{{ $project->title }}</td>
            <td>{{ $project->description }}</td>
            <td>
<img class="project-img"
     src="{{ $project->image ?: 'https://picsum.photos/80' }}"
     alt="{{ $project->title }}">

            </td>
            <td>
              <a class="btn btn-primary btn-sm"
                 href="{{ route('admin.projects.show', $project) }}">Visualizza</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="d-flex justify-content-center">
    <a class="btn btn-secondary" href="{{ route('admin.dashboard') }}">Vai alla Dashboard</a>
  </div>
@endsection
