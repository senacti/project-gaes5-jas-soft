@extends('layouts.app')

@section('template_title')
    {{ $postulacion->name ?? "{{ __('Show') Postulacion" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Postulacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('postulacions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idpostulacion:</strong>
                            {{ $postulacion->IdPostulacion }}
                        </div>
                        <div class="form-group">
                            <strong>Fechapostulacion:</strong>
                            {{ $postulacion->FechaPostulacion }}
                        </div>
                        <div class="form-group">
                            <strong>Descripoferta:</strong>
                            {{ $postulacion->DescripOferta }}
                        </div>
                        <div class="form-group">
                            <strong>Perfilpostulacion:</strong>
                            {{ $postulacion->PerfilPostulacion }}
                        </div>
                        <div class="form-group">
                            <strong>Iddetallesoferta:</strong>
                            {{ $postulacion->IdDetallesOferta }}
                        </div>
                        <div class="form-group">
                            <strong>Idempleado:</strong>
                            {{ $postulacion->IdEmpleado }}
                        </div>
                        <div class="form-group">
                            <strong>Idestadopostulaciones:</strong>
                            {{ $postulacion->IdEstadoPostulaciones }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
