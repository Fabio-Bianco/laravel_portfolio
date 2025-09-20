{{-- Modifica progetto Portfolio --}}
@extends('layouts.admin')

@section('title', 'Modifica progetto')

@section('content')
<div class="card">
    <div class="card-body">
        <h3 class="card-title mb-3">Modifica progetto</h3>
        <form method="POST" action="{{ route('admin.projects.update', $project) }}">
            @csrf
            @method('PUT')
            @include('admin.projects._form')
            <button type="submit" class="btn btn-success">Aggiorna</button>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Annulla</a>
        </form>
    </div>
</div>
@endsection
