@extends('layout')    {{-- extends va directamente a la carpeta de views --}}

@section('title','Portfolio')

@section('content')   {{-- section llama al identificador 'content' de yarn declarado en layout --}}
    <h1>portfolio</h1>

    @auth
        <a href="{{ route('project.create') }}">Crear proyecto</a>
    @endauth


    <ul>
        {{--
        @isset($portafolio)
            @foreach($portafolio as $proyecto)
                <li>{{ $proyecto['title'] }}</li>
            @endforeach
        @else
            <li>No hay proyectos para mostrar</li>
        @endisset
        --}}

        {{--
            Tambien otras directivas
            @for
            @endfor

            @while
            @endwhile

            @switch

        --}}

        @forelse($projects as $project)
            <li><a href="{{ route('project.show',$project/* $project dentro de route obtiene por default el id del registro hace internamente lo sig: $project->getRouteKey()*/) }}">{{ $project->title }}</a></li>

            {{--
                {{ $project->description }} {{ $project->created_at->format('Y-m-d') }} {{ $project->created_at->diffForHumans() }} <small>{{ $loop->last ? 'Es el ultimo' : '' }}</small></li> <?php //var_dump($loop);?>
            --}}


        @empty
            <li>No hay proyectos para mostrar</li>
        @endforelse

        {{ $projects->links() }}    {{-- links es para mostrar la paginación --}}
    </ul>

@endsection           {{-- es necesario finalizar los section --}}
