@extends('admin.layouts.admin-sidebar') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-danger">
                <div class="card-header bg-danger text-white">{{ __('Admin Profile') }}</div>
                <div class="card-body">
                    <p class="mb-0 text-danger fw-bold">Qui i dati profilo admin…</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
