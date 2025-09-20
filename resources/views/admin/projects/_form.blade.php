<div>
    <label for="title">Titolo</label>
    <input type="text" name="title" value="{{ old('title',$project->title ?? '') }}">
</div>

<div>
    <label for="description">Descrizione</label>
    <textarea name="description">{{ old('description',$project->description ?? '') }}</textarea>
</div>

<div>
    <label for="image_url">URL Immagine</label>
    <input type="text" name="image_url" value="{{ old('image_url',$project->image_url ?? '') }}">
</div>

<div>
    <label for="link">Link</label>
    <input type="text" name="link" value="{{ old('link',$project->link ?? '') }}">
</div>
