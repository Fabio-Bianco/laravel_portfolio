@extends('layouts.app')

@section('title','Progetti')

@section('content')
<div class="container">
    <h1 class="mb-3">Progetti</h1>

    <div class="row g-4">
        @forelse ($projects as $project)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    @if($project->image_url)
                        <img src="{{ $project->image_url }}" class="card-img-top" alt="{{ $project->title }}">
                    @else
                        <img src="https://via.placeholder.com/600x400?text=No+Image" class="card-img-top" alt="placeholder">
                    @endif

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $project->title }}</h5>
                        <p class="card-text text-truncate">{{ $project->description }}</p>
                        <a href="{{ route('projects.show', $project) }}" class="btn btn-sm btn-outline-primary mt-auto">Dettagli</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center text-muted">Nessun progetto</div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $projects->links() }}
    </div>
</div>
@endsection
