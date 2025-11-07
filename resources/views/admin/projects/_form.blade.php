@csrf
<div class="mb-3">
  <label for="title" class="form-label">Titolo *</label>
  <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror"
         value="{{ old('title', $project->title) }}" required maxlength="255">
  @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
  <label for="technologies" class="form-label">Tecnologie</label>
  <select id="technologies" name="technologies[]" multiple size="6"
          class="form-select @error('technologies') is-invalid @enderror @error('technologies.*') is-invalid @enderror">
    @isset($technologies)
      @php $techSelected = collect(old('technologies', $project->technologies->pluck('id')->all() ?? []))->map(fn($v)=>(int)$v)->all(); @endphp
      @foreach($technologies as $tech)
        <option value="{{ $tech->id }}" @selected(in_array($tech->id, $techSelected, true))>{{ $tech->name }}</option>
      @endforeach
    @endisset
  </select>
  @error('technologies') <div class="invalid-feedback">{{ $message }}</div> @enderror
  @error('technologies.*') <div class="invalid-feedback">{{ $message }}</div> @enderror
  @if(!isset($technologies) || $technologies->isEmpty())
    <div class="form-text">Nessuna tecnologia disponibile. Crea una tecnologia prima di associarla a un progetto.</div>
  @else
    <div class="form-text">Tieni premuto Ctrl (Windows) o Cmd (Mac) per selezione multipla.</div>
  @endif
</div>

<div class="mb-3">
  <label for="description" class="form-label">Descrizione</label>
  <textarea id="description" name="description" rows="5"
            class="form-control @error('description') is-invalid @enderror">{{ old('description', $project->description) }}</textarea>
  @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
  <label for="image_url" class="form-label">URL immagine</label>
  <input type="url" id="image_url" name="image_url"
         class="form-control @error('image_url') is-invalid @enderror"
         value="{{ old('image_url', $project->image_url) }}">
  @error('image_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
  <label for="link" class="form-label">Link esterno</label>
  <input type="url" id="link" name="link"
         class="form-control @error('link') is-invalid @enderror"
         value="{{ old('link', $project->link) }}">
  @error('link') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
  <label for="github_url" class="form-label">Repository GitHub</label>
  <input type="url" id="github_url" name="github_url"
         class="form-control @error('github_url') is-invalid @enderror"
         value="{{ old('github_url', $project->github_url) }}" placeholder="https://github.com/utente/repo">
  @error('github_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
  <label for="demo_url" class="form-label">Demo pubblica</label>
  <input type="url" id="demo_url" name="demo_url"
         class="form-control @error('demo_url') is-invalid @enderror"
         value="{{ old('demo_url', $project->demo_url) }}" placeholder="https://example.com/demo">
  @error('demo_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
  <label for="type_id" class="form-label">Tipo</label>
  <select id="type_id" name="type_id" class="form-select @error('type_id') is-invalid @enderror">
    <option value="">-- Nessun tipo --</option>
    @isset($types)
      @foreach($types as $t)
        <option value="{{ $t->id }}" @selected((int)old('type_id', $project->type_id) === $t->id)>{{ $t->name }}</option>
      @endforeach
    @endisset
  </select>
  @error('type_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="row">
  <div class="col-md-6">
    <div class="mb-3">
      <div class="form-check form-switch">
        <input type="hidden" name="is_published" value="0">
        <input class="form-check-input" type="checkbox" role="switch" id="is_published" name="is_published" value="1" @checked(old('is_published', $project->is_published ?? false))>
        <label class="form-check-label" for="is_published">
          <strong>Pubblicato</strong>
          <small class="d-block text-muted">Visibile al pubblico nel portfolio</small>
        </label>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="mb-3">
      <div class="form-check form-switch">
        <input type="hidden" name="is_featured" value="0">
        <input class="form-check-input" type="checkbox" role="switch" id="is_featured" name="is_featured" value="1" @checked(old('is_featured', $project->is_featured ?? false))>
        <label class="form-check-label" for="is_featured">
          <strong>In evidenza</strong>
          <small class="d-block text-muted">Mostra nella sezione featured</small>
        </label>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="mb-3">
      <label for="display_order" class="form-label">Ordine visualizzazione</label>
      <input type="number" id="display_order" name="display_order" min="0" class="form-control @error('display_order') is-invalid @enderror" value="{{ old('display_order', $project->display_order ?? 0) }}">
      <small class="form-text text-muted">0 = automatico (più recente). Usa 1, 2, 3... per ordinamento manuale</small>
      @error('display_order') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
  </div>
  <div class="col-md-6">
    <div class="mb-3">
      <label for="featured_order" class="form-label">Ordine featured</label>
      <input type="number" id="featured_order" name="featured_order" min="0" class="form-control @error('featured_order') is-invalid @enderror" value="{{ old('featured_order', $project->featured_order ?? 0) }}">
      <small class="form-text text-muted">Ordine tra i progetti in evidenza (0 = automatico)</small>
      @error('featured_order') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
  </div>
</div>

 

<div class="d-flex gap-2">
  <button class="btn btn-primary" type="submit">Salva</button>
  <a class="btn btn-outline-secondary" href="{{ route('admin.projects.index') }}">Annulla</a>
</div>
