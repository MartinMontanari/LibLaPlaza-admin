@extends('layouts.app')

@section('content')
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
    </head>
    <body>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 text-center">
        <p>¡Bienvenido! <br> Si aún no es un usuario regístrese en la plataforma para comenzar.</p>
    </div>

    </body>
    </html>
@endsection
