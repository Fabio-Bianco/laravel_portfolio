@extends('layouts.admin')

@section('title','Nuovo Progetto')

@section('content')
  <h1 class="h3 mb-3">Nuovo progetto</h1>
  <div class="card">
    <div class="card-body">
      <form action="{{ route('admin.projects.store') }}" method="POST">
        @include('admin.projects._form', ['project' => $project, 'method' => 'POST'])
      </form>
    </div>
  </div>
@endsection
