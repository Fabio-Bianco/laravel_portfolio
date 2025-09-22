{{-- Form parziale riutilizzato da create/edit --}}
<div class="mb-3">
    <label for="title" class="form-label">Titolo *</label>
    <input type="text" name="title" id="title"
           class="form-control @error('title') is-invalid @enderror"
           value="{{ old('title', $project->title ?? '') }}" required>
    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Descrizione</label>
    <textarea name="description" id="description" rows="4"
              class="form-control @error('description') is-invalid @enderror">{{ old('description', $project->description ?? '') }}</textarea>
    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="image_url" class="form-label">Immagine (URL)</label>
    <input type="text" name="image_url" id="image_url"
           class="form-control @error('image_url') is-invalid @enderror"
           value="{{ old('image_url', $project->image_url ?? '') }}">
    @error('image_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="link" class="form-label">Link (URL)</label>
    <input type="text" name="link" id="link"
           class="form-control @error('link') is-invalid @enderror"
           value="{{ old('link', $project->link ?? '') }}">
    @error('link') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
