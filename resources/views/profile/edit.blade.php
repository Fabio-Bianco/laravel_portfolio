@extends('admin.layouts.admin') 

@section('title', 'Profilo personale')

@section('content')
<div class="card mb-4">
    <div class="card-body">
        <h2 class="card-title mb-3">Profilo personale</h2>
        <p><strong>Nome:</strong> {{ Auth::user()->name }}</p>
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        <div class="d-flex gap-2 mt-4">
            <a class="btn btn-outline-secondary" href="{{ route('dashboard') }}">Dashboard</a>
            @if(Auth::user()->is_admin)
                <a class="btn btn-outline-primary" href="{{ route('admin.projects.index') }}">Tutti i progetti</a>
            @endif
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-danger" type="submit">Logout</button>
            </form>
        </div>
    </div>
</div>
@endsection
