@extends('layouts.app')

@section('title','Nuovo progetto')

@section('content')
<h1>Nuovo progetto</h1>

<form method="POST" action="{{ route('admin.projects.store') }}">
    @csrf
    @include('admin.projects._form')
    <button type="submit">Salva</button>
</form>
@endsection
