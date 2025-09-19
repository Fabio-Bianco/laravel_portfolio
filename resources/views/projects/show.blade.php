@extends('layouts.projects')

@section('title', $project->title)

@section('content')

<h2> {{ $project->title }}</h2>

<p> {{ $project->description }}</p>

<a href="{{ route('projects.edit', $project->id) }}">visualizza</a>

<img src="{{ $project->image }}" alt="">

@endsection