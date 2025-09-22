@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifica indirizzo email</div>

                <div class="card-body">
                    @if (session('status') == 'verification-link-sent')
                        <div class="alert alert-success" role="alert">
                            Abbiamo inviato un nuovo link di verifica all'indirizzo email fornito.
                        </div>
                    @endif

                    <div class="mb-3">
                        Grazie per la registrazione! Prima di iniziare, verifica il tuo indirizzo email cliccando sul link che ti abbiamo inviato. Se non hai ricevuto l'email, puoi richiedere un nuovo invio.
                    </div>

                    <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                            Invia di nuovo l'email di verifica
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
