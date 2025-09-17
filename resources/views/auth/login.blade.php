@extends('layouts.guest')

@section('content')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card border-danger">
        <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
          <span>{{ __('Login') }}</span>
          <a href="{{ route('register') }}" class="btn btn-light btn-sm text-danger fw-bold">{{ __('Register') }}</a>
        </div>

        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
          @endif

          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
              <label for="email" class="form-label">{{ __('Email') }}</label>
              <input id="email" type="email" name="email"
                     class="form-control @error('email') is-invalid @enderror"
                     value="{{ old('email') }}" required autofocus autocomplete="email">
              @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">{{ __('Password') }}</label>
              <input id="password" type="password" name="password"
                     class="form-control @error('password') is-invalid @enderror"
                     required autocomplete="current-password">
              @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="remember" name="remember">
              <label class="form-check-label" for="remember">{{ __('Remember me') }}</label>
            </div>

            <div class="d-flex align-items-center gap-3">
              <button type="submit" class="btn btn-danger">{{ __('Log in') }}</button>
              @if (Route::has('password.request'))
                <a class="link-danger" href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
              @endif
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
