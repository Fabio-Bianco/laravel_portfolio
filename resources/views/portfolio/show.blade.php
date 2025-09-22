@extends('layouts.projects')

@section('title', $project->title)

@section('content')
<div class="container">
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title">{{ $project->title }}</h2>
            @if($project->image_url)
                <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="img-fluid mb-3" style="max-width:400px;">
            @endif
            <p>{{ $project->description }}</p>
            @if($project->link)
                <p><a href="{{ $project->link }}" target="_blank" rel="noopener">{{ $project->link }}</a></p>
            @endif
            <a href="{{ route('portfolio') }}" class="btn btn-secondary">Torna al portfolio</a>
        </div>
    </div>
</div>
@endsection
