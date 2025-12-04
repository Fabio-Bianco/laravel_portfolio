@extends('layouts.app')

@section('title', 'Profilo Utente')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Il mio Profilo</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Nome</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $user->name }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $user->email }}
                    </div>
                </div>
                <hr>
                @if($user->bio)
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Bio</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $user->bio }}
                    </div>
                </div>
                <hr>
                @endif
                @if($user->github_username)
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">GitHub</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <a href="https://github.com/{{ $user->github_username }}" target="_blank">
                            {{ $user->github_username }}
                        </a>
                    </div>
                </div>
                <hr>
                @endif
                @if($user->linkedin_username)
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">LinkedIn</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <a href="https://linkedin.com/in/{{ $user->linkedin_username }}" target="_blank">
                            {{ $user->linkedin_username }}
                        </a>
                    </div>
                </div>
                <hr>
                @endif
                <div class="row">
                    <div class="col-sm-12">
                        @if($user->is_admin)
                            <a class="btn btn-primary" href="{{ route('admin.profile.edit') }}">
                                Modifica Profilo (Admin)
                            </a>
                        @endif
                        
                        <!-- Password Update Form -->
                        <div class="mt-4">
                            <h5>Modifica Password</h5>
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                @method('put')
                                
                                <div class="mb-3">
                                    <label for="current_password" class="form-label">Password Attuale</label>
                                    <input type="password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" 
                                           id="current_password" name="current_password" required>
                                    @error('current_password', 'updatePassword')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="password" class="form-label">Nuova Password</label>
                                    <input type="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" 
                                           id="password" name="password" required>
                                    @error('password', 'updatePassword')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Conferma Nuova Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                </div>
                                
                                <button type="submit" class="btn btn-success">Aggiorna Password</button>
                            </form>
                        </div>
                        
                        <!-- Account Deletion Form -->
                        <div class="mt-4">
                            <h5 class="text-danger">Zona Pericolosa</h5>
                            <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Sei sicuro di voler eliminare il tuo account? Questa azione è irreversibile.')">
                                @csrf
                                @method('delete')
                                
                                <div class="mb-3">
                                    <label for="password_deletion" class="form-label">Conferma Password per Eliminazione</label>
                                    <input type="password" class="form-control @error('password', 'userDeletion') is-invalid @enderror" 
                                           id="password_deletion" name="password" required>
                                    @error('password', 'userDeletion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <button type="submit" class="btn btn-danger">Elimina Account</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection