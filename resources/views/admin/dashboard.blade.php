@extends('layouts.admin') 

@section('title','Dashboard Admin')

@section('content')
<h1>Dashboard Admin</h1>

<p>Gestisci i tuoi progetti:</p>

<ul>
    <li><a href="{{ route('admin.projects.create') }}">Aggiungi progetto</a></li>
    <li><a href="{{ route('admin.projects.index') }}">Lista progetti</a></li>
</ul>
@endsection
