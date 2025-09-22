@if (session('success'))
  <div class="alert alert-success mb-3">{{ session('success') }}</div>
@endif
@if (session('error'))
  <div class="alert alert-danger mb-3">{{ session('error') }}</div>
@endif
@if ($errors->any())
  <div class="alert alert-danger mb-3">
    <div class="fw-bold mb-1">Correggi i seguenti errori:</div>
    <ul class="mb-0">
      @foreach ($errors->all() as $e)
        <li>{{ $e }}</li>
      @endforeach
    </ul>
  </div>
@endif
