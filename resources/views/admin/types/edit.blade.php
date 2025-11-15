@extends('admin.layouts.admin-sidebar')

@section('title','Modifica Tipo')

@section('content')
  <h1 class="h3 mb-3">Modifica: {{ data_get($type,'name','') }}</h1>
  <div class="card">
    <div class="card-body">
      <form action="{{ route('admin.types.update', $type) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="name" class="form-label">Nome *</label>
          <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', data_get($type,'name','')) }}" required>
          @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug (opzionale)</label>
          <input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', data_get($type,'slug','')) }}">
          @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
          <div class="form-text">Se lasci vuoto, verrà generato automaticamente dal nome.</div>
        </div>
        <div class="d-flex gap-2">
          <button class="btn btn-primary" type="submit">Salva</button>
          <a class="btn btn-outline-secondary" href="{{ route('admin.types.index') }}">Annulla</a>
        </div>
      </form>
    </div>
  </div>
@endsection
