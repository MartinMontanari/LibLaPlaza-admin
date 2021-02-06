@extends('adminlte::page')

@section('title', 'Nueva venta')


@section('content_header')
    <h1>Nueva venta</h1>
@stop

@section('content')
    <div class="container" id="app">
        <app></app>
    </div>
@stop
{{--@section('js')--}}
{{--    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>--}}
{{--    <script type="text/javascript" src="{{asset('/assets/spa/js/svgxuse.min.js')}}"></script>--}}
{{--    <script type="text/javascript" src="{{asset('/assets/spa/js/coreui-utils.js')}}"></script>--}}
{{--    <script type="text/javascript" src="{{asset('/assets/spa/js/main.js')}}"></script>--}}
{{--@stop--}}

@section('js')
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
@stop
