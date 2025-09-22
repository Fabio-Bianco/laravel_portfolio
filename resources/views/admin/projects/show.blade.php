@extends('layouts.app')

@section('title','Dettaglio progetto')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="card-title">{{ $project->title }}</h3>

            @if($project->image_url)
                <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="img-fluid mb-3" style="max-width:600px;">
            @endif

            @if($project->description)
                <p>{{ $project->description }}</p>
            @endif

            @if($project->link)
                <p><a href="{{ $project->link }}" target="_blank" rel="noopener">Visita il progetto</a></p>
            @endif

            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary btn-sm">Modifica</a>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary btn-sm">Torna</a>
        </div>
    </div>
</div>
@endsection
