@extends('layout')    {{-- extends va directamente a la carpeta de views --}}

@section('title','Crear proyecto')

@section('content')   {{-- section llama al identificador 'content' de yarn declarado en layout --}}
    <h1>Editar proyecto</h1>

    @include('partials.validation-errors')


    <form name="" method="POST" action="{{ route('project.update',$project) }}">
        @method('PATCH')
        @include('projects._form',['btnText'=>'Actualizar'])
    </form>


@endsection           {{-- es necesario finalizar los section --}}
