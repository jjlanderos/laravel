@extends('layout')    {{-- extends va directamente a la carpeta de views --}}

@section('title','Contact')

@section('content')   {{-- section llama al identificador 'content' de yarn declarado en layout --}}
    <h1>{{ __('Contact') }}</h1>
    {{--
        @if($errors->any())
            <pre>{{ print_r($errors) }}</pre>
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif
    --}}

        <form method="POST" action="{{ route('messages.store') }}">
            @csrf
            <input type="text" name="name" placeholder="Nombre..." value="{{ old('name') }}"><br>{!! $errors->first('name','<small>:message</small><br>') !!}
            <input type="text" name="email" placeholder="Email..." value="{{ old('email') }}"><br>{!! $errors->first('email','<small>:message</small><br>') !!}
            <input type="text" name="subject" placeholder="Asunto..." value="{{ old('email') }}"><br>{!! $errors->first('subject','<small>:message</small><br>') !!}
            <textarea name="content" placeholder="Mensaje">{{ old('content') }}</textarea><br>{!! $errors->first('content','<small>:message</small><br>') !!}
            <button>@lang('Send')</button>
        </form>

@endsection           {{-- es necesario finalizar los section --}}
