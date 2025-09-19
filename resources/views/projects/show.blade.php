@extends('layouts.projects')

@section('title', $project->title)

@section('content')
<div class="project-show">
    <h2>{{ $project->title }}</h2>
    <img class="project-img-large" src="{{ $project->image }}" alt="photo">
    <section>
        <p>{{ $project->description }}</p>
        <a class="project-link" href="{{ route('projects.edit', $project->id) }}">modifica</a>
    </section>
</div>
@endsection