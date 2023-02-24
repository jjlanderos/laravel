@extends('layout')

@section('title','Home')
@section('content')
  <h1>@lang('Home')</h1>
  {{--ESTO SOLO SE EJECUTARÁ SI ESTÁ AUTENTICADO PARA QUE NO GENERE ERROR--}}
  @auth
    {{ auth()->user()->name }}
  @endauth
@endsection
