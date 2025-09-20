@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista Progetti</h1>

    {{-- Bottone per aggiungere un nuovo progetto --}}
    <a href="{{ route('admin.projects.create') }}" class="btn btn-success mb-3">
        + Aggiungi Progetto
    </a>

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titolo</th>
                <th>Link</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->title }}</td>
                    <td>
                        @if($project->link)
                            <a href="{{ $project->link }}" target="_blank">Visita</a>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        {{-- Bottone Modifica --}}
                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary btn-sm">
                            Modifica
                        </a>

                        {{-- Bottone Elimina --}}
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Sei sicuro di voler eliminare questo progetto?')">
                                Elimina
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Paginazione --}}
    {{ $projects->links() }}
</div>
@endsection
