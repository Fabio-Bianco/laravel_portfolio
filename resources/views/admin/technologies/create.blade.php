@extends('layouts.admin-sidebar')

@section('title','Nuova tecnologia')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 m-0">Nuova tecnologia</h1>
    <a class="btn btn-outline-secondary" href="{{ route('admin.technologies.index') }}">Torna</a>
  </div>

  <div class="card">
    <div class="card-body">
      <form action="{{ route('admin.technologies.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label class="form-label" for="name">Nome *</label>
          <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
          @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
          <label class="form-label" for="slug">Slug</label>
          <input id="slug" name="slug" type="text" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}">
          @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
          <div class="form-text">Lascia vuoto per generarlo automaticamente dal nome.</div>
        </div>
        <div class="d-flex gap-2">
          <button class="btn btn-primary" type="submit">Salva</button>
          <a class="btn btn-outline-secondary" href="{{ route('admin.technologies.index') }}">Annulla</a>
        </div>
      </form>
    </div>
  </div>
@endsection
