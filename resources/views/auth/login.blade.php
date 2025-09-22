@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
      <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
          <span class="fw-semibold">{{ __('Login') }}</span>

          @if (Route::has('register'))
            <a href="{{ route('register') }}" class="btn btn-light btn-sm text-dark fw-semibold">
              {{ __('Register') }}
            </a>
          @endif
        </div>

        <div class="card-body p-4">
          @if (session('status'))
            <div class="alert alert-success mb-4">{{ session('status') }}</div>
          @endif

          <form method="POST" action="{{ route('login') }}" novalidate>
            @csrf

            <div class="mb-3">
              <label for="email" class="visually-hidden">Email</label>
              <input
                id="email"
                type="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}"
                required
                autocomplete="email"
                placeholder="email"
                aria-label="Email"
                autofocus
              >
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="password" class="visually-hidden">Password</label>
              <input
                id="password"
                type="password"
                name="password"
                class="form-control @error('password') is-invalid @enderror"
                required
                autocomplete="current-password"
                placeholder="password"
                aria-label="Password"
              >
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Ricordami</label>
              </div>

              @if (Route::has('password.request'))
                <a class="link-secondary small" href="{{ route('password.request') }}">
                  Password dimenticata?
                </a>
              @endif
            </div>

            <button type="submit" class="btn btn-primary w-100">
              {{ __('Log in') }}
            </button>
          </form>
        </div>

        <div class="card-footer bg-light-subtle text-center">
          <span class="text-muted small">
            <strong>Tip:</strong> usa le credenziali admin seedate se stai lavorando in locale.
          </span>
        </div>
      </div>

      <div class="text-center mt-3">
        <a href="{{ route('home') }}" class="link-secondary small">← Torna al portfolio</a>
      </div>
    </div>
  </div>
</div>
@endsection
