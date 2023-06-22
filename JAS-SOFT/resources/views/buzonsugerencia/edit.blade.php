@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Buzonsugerencia
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Buzonsugerencia</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('buzonsugerencias.update', $buzonsugerencia->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('buzonsugerencia.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
