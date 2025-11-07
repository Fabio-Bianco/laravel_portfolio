@extends('layouts.admin-sidebar')

@section('title','Dettaglio tecnologia')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 m-0">{{ $technology->name }}</h1>
    <div class="d-flex gap-2">
      <a class="btn btn-outline-secondary" href="{{ route('admin.technologies.index') }}">Torna</a>
      <a class="btn btn-outline-primary" href="{{ route('admin.technologies.edit', $technology) }}">Modifica</a>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <dl class="row mb-0">
        <dt class="col-sm-3">Slug</dt>
        <dd class="col-sm-9">{{ $technology->slug ?: '—' }}</dd>
      </dl>
    </div>
  </div>
@endsection
