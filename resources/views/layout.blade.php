<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','pagina')</title>

    <style>
        .active a{
            color: #ff0000
        }
    </style>
</head>
<body>
    @include('partials.nav')
    @include('partials/session-status')
    @yield('content') {{-- yiel se utiliza como identificador de contenido, donde aparecerá la información 'content' es el nombre del identificador  --}}
</body>
</html>
