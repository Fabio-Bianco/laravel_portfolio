{{-- Dettaglio progetto Portfolio --}}
@extends('layouts.admin')

@section('title', 'Dettaglio progetto')

@section('content')
<div class="card mb-4">
    <div class="card-body">
        <h3 class="card-title">{{ $project->title }}</h3>
        @if($project->image_url)
            <img src="{{ $project->image_url }}" alt="" class="img-fluid mb-3" style="max-width:400px;">
        @endif
        <p>{{ $project->description }}</p>
        @if($project->link)
            <p><a href="{{ $project->link }}" target="_blank">{{ $project->link }}</a></p>
        @endif
        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning">Modifica</a>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Torna alla lista</a>
    </div>
</div>
@endsection
