@extends('layouts.app')

@section('title', 'Registrazione')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <span class="fw-semibold">Registrazione</span>
                    <a href="{{ route('login') }}" class="btn btn-light btn-sm text-dark fw-semibold">Accedi</a>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('register') }}" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="visually-hidden">Nome</label>
                            <input
                                id="name"
                                type="text"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}"
                                required
                                autocomplete="name"
                                placeholder="nome"
                                aria-label="Nome"
                                autofocus
                            >
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

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
                                autocomplete="new-password"
                                placeholder="password"
                                aria-label="Password"
                            >
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="visually-hidden">Conferma password</label>
                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                required
                                autocomplete="new-password"
                                placeholder="password"
                                aria-label="Conferma password"
                            >
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Registrati
                        </button>
                    </form>
                </div>

                <div class="card-footer bg-light-subtle text-center">
                    <span class="text-muted small">
                        Hai già un account? <a href="{{ route('login') }}" class="link-secondary">Accedi</a>
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
