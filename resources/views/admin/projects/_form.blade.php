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
  <label for="category_id" class="form-label">Categoria</label>
  <select id="category_id" name="category_id" class="form-select @error('category_id') is-invalid @enderror">
    <option value="">Nessuna</option>
    @isset($categories)
      @foreach($categories as $id => $name)
        <option value="{{ $id }}" @selected(old('category_id', $project->category_id) == $id)>{{ $name }}</option>
      @endforeach
    @endisset
  </select>
  @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
  @if(!isset($categories) || $categories->isEmpty())
    <div class="form-text">Nessuna categoria disponibile. Crea una categoria prima di associarla a un progetto.</div>
  @endif
  @if($project->category)
    <div class="form-text">Categoria attuale: <strong>{{ $project->category?->name }}</strong></div>
  @endif
</div>

<div class="d-flex gap-2">
  <button class="btn btn-primary" type="submit">Salva</button>
  <a class="btn btn-outline-secondary" href="{{ route('admin.projects.index') }}">Annulla</a>
</div>
