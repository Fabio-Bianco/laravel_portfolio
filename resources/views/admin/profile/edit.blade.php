@extends('layouts.admin-sidebar')

@section('page-title', 'Il Mio Profilo')

@section('content')
<div class="container-fluid">
  
  <div class="row">
    <div class="col-lg-8">
      
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="mb-0">Informazioni Personali</h5>
        </div>
        <div class="card-body">
          
          <form method="POST" action="{{ route('admin.profile.update') }}">
            @csrf
            @method('PATCH')
            
            <div class="mb-3">
              <label class="form-label">Nome Completo</label>
              <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" required>
            </div>
            
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}" required>
            </div>
            
            <div class="mb-3">
              <label class="form-label">Bio / Descrizione</label>
              <textarea name="bio" class="form-control" rows="4" placeholder="Parlaci di te...">{{ auth()->user()->bio ?? '' }}</textarea>
              <div class="form-text">Questa bio verrà mostrata nella sidebar guest</div>
            </div>
            
            <hr class="my-4">
            
            <h6 class="mb-3">Contatti Social</h6>
            
            <div class="mb-3">
              <label class="form-label">GitHub Username</label>
              <div class="input-group">
                <span class="input-group-text">github.com/</span>
                <input type="text" name="github_username" class="form-control" value="{{ auth()->user()->github_username ?? '' }}" placeholder="username">
              </div>
            </div>
            
            <div class="mb-3">
              <label class="form-label">LinkedIn</label>
              <div class="input-group">
                <span class="input-group-text">linkedin.com/in/</span>
                <input type="text" name="linkedin_username" class="form-control" value="{{ auth()->user()->linkedin_username ?? '' }}" placeholder="username">
              </div>
            </div>
            
            <div class="mb-3">
              <label class="form-label">Email Contatto Pubblico</label>
              <input type="email" name="contact_email" class="form-control" value="{{ auth()->user()->contact_email ?? auth()->user()->email }}" placeholder="email@example.com">
              <div class="form-text">Email visibile nel widget contatti</div>
            </div>
            
            <div class="d-flex gap-2">
              <button type="submit" class="btn btn-primary">
                💾 Salva Modifiche
              </button>
              <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                Annulla
              </a>
            </div>
            
          </form>
          
        </div>
      </div>
      
    </div>
    
    <div class="col-lg-4">
      
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="mb-0">Anteprima Bio</h5>
        </div>
        <div class="card-body">
          <div class="text-center mb-3">
            <div style="width: 80px; height: 80px; border-radius: 50%; background: linear-gradient(135deg, #3b82f6, #8b5cf6); color: white; display: flex; align-items: center; justify-content: center; font-size: 1.75rem; font-weight: 700; margin: 0 auto;">
              {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
            </div>
          </div>
          <h6 class="text-center">{{ auth()->user()->name }}</h6>
          <p class="text-muted text-center small">Full Stack Developer</p>
          <hr>
          <p class="small">{{ auth()->user()->bio ?? 'Nessuna bio impostata...' }}</p>
        </div>
      </div>
      
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">Sicurezza</h5>
        </div>
        <div class="card-body">
          <a href="#" class="btn btn-outline-danger btn-sm w-100">
            🔒 Cambia Password
          </a>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
@endsection
