<div id="profileDrawerButton" class="profile-drawer-fab" aria-controls="profileDrawerRoot" aria-label="Apri dati personali" title="Dati personali">
    <!-- Icona utente -->
    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
        <path d="M12 12c2.76 0 5-2.69 5-6s-2.24-6-5-6-5 2.69-5 6 2.24 6 5 6Zm0 2c-4.42 0-8 3.13-8 7v1h16v-1c0-3.87-3.58-7-8-7Z"/>
    </svg>
</div>

<div id="profileDrawerRoot" class="profile-drawer-root" aria-hidden="true" style="display:none;">
    <div id="profileDrawerBackdrop" class="profile-drawer-backdrop" tabindex="-1"></div>

    <aside id="profileDrawerPanel" class="profile-drawer-panel" role="dialog" aria-modal="true" aria-labelledby="profileDrawerTitle" style="transform: translateX(-100%);">
        <header class="profile-drawer-header">
            <h2 id="profileDrawerTitle">Dati personali</h2>
        </header>

        @auth
            @if (session('status'))
                <div class="profile-drawer-alert success">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}" class="profile-drawer-form">
                @csrf
                @method('PATCH')

                <label class="profile-field">
                    <span>Nome</span>
                    <input name="name" type="text" value="{{ old('name', auth()->user()->name) }}" required>
                    @error('name')<small class="error">{{ $message }}</small>@enderror
                </label>

                <label class="profile-field">
                    <span>Email</span>
                    <input name="email" type="email" value="{{ old('email', auth()->user()->email) }}" required>
                    @error('email')<small class="error">{{ $message }}</small>@enderror
                </label>

                <label class="profile-field">
                    <span>Bio</span>
                    <textarea name="bio" rows="4" maxlength="1000">{{ old('bio', auth()->user()->bio) }}</textarea>
                    @error('bio')<small class="error">{{ $message }}</small>@enderror
                </label>

                <div class="profile-actions">
                    <button type="submit" class="primary">Salva</button>
                </div>
            </form>
        @endauth

        @guest
            <div class="profile-drawer-content">
                <div class="profile-field">
                    <span class="label">Fabio</span>
                    <div class="value">Bianco</div>
                </div>
                <div class="profile-field">
                    <span class="label">Email</span>
                    <div class="value">biancobfabio@gmail.com</div>
                </div>
                <div class="profile-field">
                    <span class="label">Bio</span>
                    <div class="value">Benvenuto! Questa è un'anteprima del profilo. Effettua il login per modificare i tuoi dati.</div>
                </div>
            </div>
        @endguest
    </aside>
</div>

<script>
(function() {
    const root = document.getElementById('profileDrawerRoot');
    const btn = document.getElementById('profileDrawerButton');
    const backdrop = document.getElementById('profileDrawerBackdrop');
    const panel = document.getElementById('profileDrawerPanel');

    if (!root || !btn) return;

    function open() {
        root.style.display = 'block';
        root.classList.add('open');
        root.setAttribute('aria-hidden', 'false');
        document.body.classList.add('drawer-left-open');
        if (panel) panel.style.transform = 'translateX(0)';
    }
    function close() {
        root.classList.remove('open');
        root.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('drawer-left-open');
        if (panel) panel.style.transform = 'translateX(-100%)';
        // usa un piccolo timeout per permettere la transizione prima di nascondere
        setTimeout(() => { if (!root.classList.contains('open')) root.style.display = 'none'; }, 260);
    }
    function toggle() {
        if (root.classList.contains('open')) {
            close();
        } else {
            open();
        }
    }
    btn.addEventListener('click', toggle);
    // Disabilitata la chiusura via backdrop per richiesta specifica
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape') close(); });
})();
</script>
