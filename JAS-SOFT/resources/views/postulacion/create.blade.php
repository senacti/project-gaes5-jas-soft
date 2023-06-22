@extends('layouts.app')

@section('template_title')
    {{ __('postulacion.create') }} Postulacion
@endsection
<form action="" class="flex-box needs-validation formpostu">
    <h2>Nueva postulacion</h2>
    <div class="row">
        <div class="form-floating mt-3 mb-3 col-4">
            <input type="text" class="form-control" id="cargo" placeholder="Cargo" required>
            <label for="cargo">Cargo</label>
        </div>
        <div class="form-floating mt-3 mb-3 col-4">
            <input type="text" class="form-control" id="Cantidad" placeholder="Cantidad de puestos" required name="Cantidad" maxlength="#" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
            <label for="Cantidad">Cantidad de puesto</label>
        </div>
        <div class="form-floating mt-3 mb-3 col-4">
            <input type="text" class="form-control" id="Puesto" placeholder="puesto" required>
            <label for="Puesto">puesto</label>
        </div>                
        <div class="form-floating mt-3 mb-3 col-8">
            <textarea type="textarea" class="form-control" id="descargo" placeholder="desciprcion del cargo" required> </textarea>
            <label for="descargo">Descicion del cargo</label>    
        </div>
        <div class="form-floating mt-3 mb-3 col-4">
            <input type="date" class="form-control" id="fechaoferta" placeholder="fechaoferta" required>
            <label for="fechaoferta">Fecha publicacion de oferta</label>
        </div>
        <div class="form-floating mt-3 mb-3 col-4">
            <input type="date" class="form-control" id="fechaoferta" placeholder="fechaoferta" required>
            <label for="fechaoferta">Fecha cierre de oferta</label>
        </div>
        <div class="form-floating mt-3 mb-3 col-2">
            <input type="number" class="form-control" id="experiencia" placeholder="experiencia" required name="Cantidad" maxlength="#" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
            <label for="Experiencia">Experiencia años</label>
        </div>
        <div class="form-floating mt-3 mb-3 col-3">
            <select class="form-select" id="sel1" name="Estudios">
              <option>Tecnico</option>
              <option>Tecnologo</option>      
              <option>Profesional</option>  
              <option>Bachiller</option>                           
            </select>
            <label for="sel1" class="form-label">Estudios</label>
        </div> 
        <div class="form-floating mt-3 mb-3 col-3">
            <select class="form-select" id="sel1" name="tipocontrato">
              <option>Termino definido</option>
              <option>Termino definido</option>      
              <option>Contrato por prestación de servicios</option>  
              <option>Contrato de aprendizaje</option>                           
            </select>
            <label for="sel1" class="form-label">Estudios</label>
        </div> 
        <button type="submit" class="btn btn-primary">
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Postulacion</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('postulacions.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('postulacion.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
