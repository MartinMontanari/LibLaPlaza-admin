@extends('adminlte::auth.verify')

@section('title','Verificar cuenta')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Confirme su cuenta de email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Le hemos enviado un link de confirmación de cuenta a su casilla de email.') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, por favor confirme el link que le hemos enviado.') }}
                    {{ __('Si aún no ha recibido el correo ') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('haga click aquí para reenviarlo.') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
