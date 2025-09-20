@extends('layouts.app')

@section('title','Dettaglio progetto')

@section('content')
<h2>{{ $project->title }}</h2>

@if($project->image_url)
    <img src="{{ $project->image_url }}" alt="{{ $project->title }}" style="max-width:300px;">
@endif

<p>{{ $project->description }}</p>

@if($project->link)
    <p><a href="{{ $project->link }}" target="_blank">Visita il progetto</a></p>
@endif

<a href="{{ route('admin.projects.index') }}">Torna alla lista</a>
@endsection
