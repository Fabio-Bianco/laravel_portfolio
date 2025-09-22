@extends('layouts.app')

@section('title','Modifica progetto')

@section('content')
<div class="container">
    <h1 class="mb-3">Modifica Progetto</h1>
    <form method="POST" action="{{ route('admin.projects.update', $project) }}">
        @csrf
        @method('PUT')
        @include('admin.projects._form', ['project' => $project])
        <button type="submit" class="btn btn-primary">Aggiorna</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Annulla</a>
    </form>
</div>
@endsection
