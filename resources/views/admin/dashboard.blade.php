@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-danger">
                <div class="card-header bg-danger text-white">{{ __('Admin Dashboard') }}</div>
                <div class="card-body">
                    {{ __("Benvenuto nell'area amministratore!") }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
