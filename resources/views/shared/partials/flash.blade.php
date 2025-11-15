@php
  $status = session('status');
  $error = session('error');
@endphp

@if($status || $error)
  <div class="position-fixed top-0 end-0 p-3" style="z-index: 1080;">
    <div class="toast align-items-center text-bg-{{ $error ? 'danger' : 'success' }} border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">
          {{ $status ?? $error }}
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  </div>
@endif
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
