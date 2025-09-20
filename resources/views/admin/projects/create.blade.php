{{-- Crea nuovo progetto Portfolio --}}
@extends('layouts.admin')

@section('title', 'Nuovo progetto')

@section('content')
<div class="card">
    <div class="card-body">
        <h3 class="card-title mb-3">Nuovo progetto</h3>
        <form method="POST" action="{{ route('admin.projects.store') }}">
            @csrf
            @include('admin.projects._form')
            <button type="submit" class="btn btn-success">Salva</button>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Annulla</a>
        </form>
    </div>
</div>
@endsection
