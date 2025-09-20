{{-- Elenco progetti Portfolio --}}
@extends('layouts.admin')

@section('title','Projects')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0">Projects</h2>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-success">Nuovo progetto</a>
</div>
<table class="table table-bordered table-striped align-middle">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titolo</th>
            <th>Immagine</th>
            <th>Link</th>
            <th>Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projects as $project)
        <tr>
            <td>{{ $project->id }}</td>
            <td>{{ $project->title }}</td>
            <td>
                @if($project->image_url)
                    <img src="{{ $project->image_url }}" alt="" style="max-width:80px;">
                @endif
            </td>
            <td>
                @if($project->link)
                    <a href="{{ $project->link }}" target="_blank">{{ $project->link }}</a>
                @endif
            </td>
            <td>
                <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-info btn-sm">Show</a>
                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Eliminare il progetto?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $projects->links() }}
@endsection
