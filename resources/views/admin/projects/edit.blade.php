@extends('layouts.admin-sidebar')

@section('title','Modifica Progetto')

@section('content')
  <h1 class="h3 mb-3">Modifica: {{ $project->title }}</h1>
  <div class="card">
    <div class="card-body">
      <form action="{{ route('admin.projects.update', $project) }}" method="POST">
        @method('PUT')
        @include('admin.projects._form', ['project' => $project, 'method' => 'PUT'])
      </form>
    </div>
  </div>
@endsection
