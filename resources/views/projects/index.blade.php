@extends('layouts.projects')

@section('title', 'Tutti i progetti')

@section('content')
    <p>Benvenuto nella pagina dei progetti.</p>

    <table>
        <thead>
            <tr>
                <th>Titolo</th>
                <th>Descrizione</th>
                <th>Immagine</th>
                <th>Link</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <td>{{ $project->title }}</td>
                <td>{{ $project->description }}</td>
                <td><img src="{{ $project->image }}" alt="{{ $project->title }}"></td>
                <td><a href="{{ $project->link }}">Link</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection