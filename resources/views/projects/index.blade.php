@extends('layouts.app')

@section('title','Tutti i progetti')

@section('content')
<h1>Tutti i progetti</h1>

<ul>
@foreach($projects as $project)
    <li>
        <a href="{{ route('projects.show',$project) }}">
            {{ $project->title }}
        </a>
        @if(auth()->user()->is_admin)
            | <a href="{{ route('admin.projects.edit',$project) }}">Modifica</a>
            <form method="POST" action="{{ route('admin.projects.destroy',$project) }}" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Elimina</button>
            </form>
        @endif
    </li>
@endforeach
</ul>

{{ $projects->links() }}
@endsection
