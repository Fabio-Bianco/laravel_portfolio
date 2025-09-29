@extends('layouts.admin')

@section('title','Modifica tecnologia')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 m-0">Modifica tecnologia</h1>
    <a class="btn btn-outline-secondary" href="{{ route('admin.technologies.index') }}">Torna</a>
  </div>

  <div class="card">
    <div class="card-body">
      <form action="{{ route('admin.technologies.update', $technology) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label class="form-label" for="name">Nome *</label>
          <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $technology->name) }}" required>
          @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
          <label class="form-label" for="slug">Slug</label>
          <input id="slug" name="slug" type="text" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $technology->slug) }}">
          @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
          <div class="form-text">Lascia vuoto per rigenerarlo automaticamente dal nome.</div>
        </div>
        <div class="d-flex gap-2">
          <button class="btn btn-primary" type="submit">Salva</button>
          <a class="btn btn-outline-secondary" href="{{ route('admin.technologies.index') }}">Annulla</a>
        </div>
      </form>
    </div>
  </div>
@endsection
