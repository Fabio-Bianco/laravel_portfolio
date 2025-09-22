@extends('layouts.app')

@section('title','Nuovo progetto')

@section('content')
<div class="container">
    <h1 class="mb-3">Nuovo Progetto</h1>
    <form method="POST" action="{{ route('admin.projects.store') }}">
        @csrf
        @include('admin.projects._form')
        <button type="submit" class="btn btn-success">Salva</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Annulla</a>
    </form>
</div>
@endsection
