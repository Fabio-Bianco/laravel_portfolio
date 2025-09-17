@extends('layouts.app')

@section('content')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card border-danger">
        <div class="card-header bg-danger text-white">
          {{ __('Admin Profile') }}
        </div>

        <div class="card-body">
          <p class="mb-3 text-danger fw-bold">
            {{ __("Qui i dati del profilo admin…") }}
          </p>

          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <strong>{{ __('Nome:') }}</strong> Admin
            </li>
            <li class="list-group-item">
              <strong>{{ __('Email:') }}</strong> admin@example.com
            </li>
            <li class="list-group-item">
              <strong>{{ __('Ruolo:') }}</strong> Super Admin
            </li>
          </ul>

          <div class="mt-4 d-flex gap-3">
            <a href="{{ route('dashboard') }}" class="btn btn-danger">
              {{ __('Torna alla Dashboard') }}
            </a>
            <a href="{{ route('logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
               class="btn btn-outline-danger">
              {{ __('Logout') }}
            </a>
          </div>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
