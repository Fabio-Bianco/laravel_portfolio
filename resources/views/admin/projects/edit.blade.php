@extends('layouts.app')

@section('title','Modifica progetto')

@section('content')
<h1>Modifica progetto</h1>

<form method="POST" action="{{ route('admin.projects.update',$project) }}">
    @csrf
    @method('PUT')
    @include('admin.projects._form')
    <button type="submit">Aggiorna</button>
</form>
@endsection
