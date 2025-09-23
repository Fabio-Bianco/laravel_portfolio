@extends('layouts.app')

@section('title', $project->title)

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="h4 mb-3">{{ $project->title }}</h1>
            @if($project->image_url)
                <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="img-fluid mb-3" style="max-width:800px;">
            @endif
            @if($project->description)
                <p>{{ $project->description }}</p>
            @endif
                        @if($project->link)
                                <p>
                                    <a href="{{ $project->link }}" target="_blank" rel="noopener" class="btn btn-outline-primary btn-sm js-open-project">Visita il progetto</a>
                                </p>
                                <script>
                                    (function(){
                                        const link = document.currentScript.previousElementSibling?.querySelector('.js-open-project');
                                        if (!link) return;
                                        link.addEventListener('click', function(){
                                            // Prova a chiudere la pagina di dettaglio tornando indietro
                                            try { history.back(); } catch(_) {}
                                            // Poi naviga alla home corretta in base all'autenticazione lato server
                                            window.location.href = '{{ auth()->check() ? route('admin.projects.index') : route('home') }}';
                                        });
                                    })();
                                </script>
                        @endif
            <a href="{{ route('home') }}" class="btn btn-secondary btn-sm">Torna ai progetti</a>
        </div>
    </div>
</div>
@endsection
        </div>
    </div>
</div>
@endsection
