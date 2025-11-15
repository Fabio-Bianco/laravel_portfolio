@extends('admin.layouts.admin-sidebar')

@section('title','Dettaglio Tipo')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3 m-0">{{ data_get($type,'name','') }}</h1>
    <div class="d-flex gap-2">
      <a class="btn btn-outline-secondary" href="{{ route('admin.types.index') }}">Torna</a>
      <a class="btn btn-outline-primary" href="{{ route('admin.types.edit', $type) }}">Modifica</a>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
  <p class="mb-2"><strong>Slug:</strong> <span class="text-muted">{{ data_get($type,'slug') ?: '—' }}</span></p>
  <p class="mb-0"><strong>Progetti:</strong> —</p>
    </div>
  </div>
@endsection
