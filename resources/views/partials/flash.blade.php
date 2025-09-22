@if (session('success'))
  <div class="alert alert-success alert-dismissible fade show mb-3 auto-dismiss" role="alert" data-timeout="30000">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
@if (session('error'))
  <div class="alert alert-danger alert-dismissible fade show mb-3 auto-dismiss" role="alert" data-timeout="30000">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
@if ($errors->any())
  <div class="alert alert-danger alert-dismissible fade show mb-3 auto-dismiss" role="alert" data-timeout="30000">
    <div class="fw-bold mb-1">Correggi i seguenti errori:</div>
    <ul class="mb-0">
      @foreach ($errors->all() as $e)
        <li>{{ $e }}</li>
      @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
