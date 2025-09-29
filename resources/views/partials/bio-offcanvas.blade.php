@php
  $user = auth()->user();
@endphp

<button
  class="btn btn-primary position-fixed bio-fab"
  id="openBioOffcanvasBtn"
  type="button"
  data-bs-toggle="offcanvas"
  data-bs-target="#bioOffcanvas"
  aria-controls="bioOffcanvas"
  aria-expanded="false"
  title="Dati personali"
>
  <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
    <path d="M12 12c2.76 0 5-2.69 5-6s-2.24-6-5-6-5 2.69-5 6 2.24 6 5 6Zm0 2c-4.42 0-8 3.13-8 7v1h16v-1c0-3.87-3.58-7-8-7Z"/>
  </svg>
</button>

<div class="offcanvas offcanvas-start" tabindex="-1" id="bioOffcanvas" aria-labelledby="bioOffcanvasLabel"
  data-bs-backdrop="false" data-bs-keyboard="true" data-bs-scroll="true">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="bioOffcanvasLabel">Dati personali</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Chiudi"></button>
  </div>

  <div class="offcanvas-body">
    @auth
      <form method="POST" action="{{ route('bio.update') }}" class="vstack gap-3">
        @csrf
        @method('PATCH')

        <div>
          <label class="form-label">Nome</label>
          <input name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required>
          @error('name')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div>
          <label class="form-label">Email</label>
          <input name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required>
          @error('email')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div>
          <label class="form-label">Bio</label>
          <textarea name="bio" class="form-control" rows="4" maxlength="1000">{{ old('bio', $user->bio) }}</textarea>
          @error('bio')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Salva</button>
        </div>
      </form>
    @endauth

    @guest
      <div class="vstack gap-2">
        <div>
          <div class="text-muted small">Nome</div>
          <div class="fw-semibold">Fabio Bianco</div>
        </div>
        <div>
          <div class="text-muted small">Email</div>
          <div class="fw-semibold">biancobfabio@gmail.com</div>
        </div>
        <div>
          <div class="text-muted small">Bio</div>
          <div>Benvenuto! Questa è un'anteprima del profilo. Effettua il login per modificare i tuoi dati.</div>
        </div>
      </div>
    @endguest
  </div>
</div>
