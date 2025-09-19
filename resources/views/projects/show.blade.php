@extends('layouts.projects')

@section('title', $project->title)

@section('content')

<h2> {{ $project->title }}</h2>

<img src="{{ $project->image }}" alt="photo">

<section>

    <p> {{ $project->description }}</p>

    <a href="{{ route('projects.edit', $project->id) }}">visualizza</a>
</section>







@endsection