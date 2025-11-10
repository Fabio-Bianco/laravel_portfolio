@extends('layouts.app')

@section('title', 'Profilo personale')

@section('content')
<div class="card mb-4">
  <div class="card-body">
    <h2 class="card-title mb-3">Profilo personale</h2>
    <p><strong>Nome:</strong> {{ Auth::user()->name }}</p>
    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
    <p><strong>Ruolo:</strong> {{ Auth::user()->is_admin ? 'b_bot Portfolio' : 'Utente' }}</p>

    <div class="d-flex flex-wrap gap-2 mt-3">
      <a href="{{ route('home') }}" class="btn btn-outline-secondary">Vai alla Home</a>
      @if(Auth::user()->is_admin)
        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-primary">Gestione progetti</a>
      @endif
      <form method="POST" action="{{ route('logout') }}" class="d-inline">
        @csrf
        <button class="btn btn-outline-danger" type="submit">Logout</button>
      </form>
    </div>
  </div>
</div>
@endsection

