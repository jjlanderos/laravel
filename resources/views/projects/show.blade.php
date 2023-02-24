@extends('layout')    {{-- extends va directamente a la carpeta de views es como un include --}}

@section('title','Portafolio | ' .$project->title)



@section('content')   {{-- section llama al identificador 'content' de yarn declarado en layout --}}
    <h1>{{ $project->title }}</h1>

    @auth
        <a href="{{ route('project.edit',$project) }}">Editar</a>
        <form method="POST" action="{{ route('project.destroy',$project) }}">
            @csrf @method('DELETE')
            <button>Eliminar</button>
        </form>
    @endauth


    <p>{{ $project->description }}</p>
    <p>{{ $project->created_at->diffForHumans() }}</p>
@endsection           {{-- es necesario finalizar los section --}}
