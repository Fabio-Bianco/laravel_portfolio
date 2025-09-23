@csrf
<div class="mb-3">
  <label for="title" class="form-label">Titolo *</label>
  <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror"
         value="{{ old('title', $project->title) }}" required maxlength="255">
  @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
  <label for="categories" class="form-label">Categorie</label>
  <select id="categories" name="categories[]" multiple size="6"
          class="form-select @error('categories') is-invalid @enderror @error('categories.*') is-invalid @enderror">
    @isset($categories)
      @php $selected = collect(old('categories', $project->categories->pluck('id')->all() ?? []))->map(fn($v)=>(int)$v)->all(); @endphp
      @foreach($categories as $cat)
        <option value="{{ $cat->id }}" @selected(in_array($cat->id, $selected, true))>{{ $cat->name }}</option>
      @endforeach
    @endisset
  </select>
  @error('categories') <div class="invalid-feedback">{{ $message }}</div> @enderror
  @error('categories.*') <div class="invalid-feedback">{{ $message }}</div> @enderror
  @if(!isset($categories) || $categories->isEmpty())
    <div class="form-text">Nessuna categoria disponibile. Crea una categoria prima di associarla a un progetto.</div>
  @else
    <div class="form-text">Tieni premuto Ctrl (Windows) o Cmd (Mac) per selezione multipla.</div>
  @endif
</div>

<div class="d-flex gap-2">
  <button class="btn btn-primary" type="submit">Salva</button>
  <a class="btn btn-outline-secondary" href="{{ route('admin.projects.index') }}">Annulla</a>
</div>
