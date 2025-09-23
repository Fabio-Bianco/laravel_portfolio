@extends('layouts.app')

@section('title', 'Profilo')

@section('content')
<div class="container py-4">
  <h1 class="h3 mb-4">Il mio profilo</h1>
  @include('partials.bio-offcanvas')
  <p class="text-muted">Clicca l’icona in basso per aprire l’offcanvas e modificare rapidamente i tuoi dati.</p>
  <div class="card">
    <div class="card-body">
      <div class="mb-2"><strong>Nome:</strong> {{ $user->name }}</div>
      <div class="mb-2"><strong>Email:</strong> {{ $user->email }}</div>
      <div class="mb-0"><strong>Bio:</strong> {{ $user->bio }}</div>
    </div>
  </div>
</div>
@endsection
