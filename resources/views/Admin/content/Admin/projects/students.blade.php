@extends('Template/maestraAdmin')
@section('contenido')

<div class="conatiner-fluid content-inner mt-5 py-0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div>
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card banner">
                    <div class="card-body ">
                        <div class="row justify-content-center align-items-center banner-container">
                            <div class="col-lg-6 banner-item">
                                <div class="banner-text">
                                    <h1 class="fw-bold mb-4">
                                        <span class="text-secondary">{{ __('Students list') }} </span> 
                                    </h1>
                                </div>
                                <p class="mb-4">{{ __('Bienvenido, administrador. Este panel le permitirá consultar información de todos los estudiantes registrados en WCLE)') }}</p>
                            </div>
                            <div class="col-lg-6 banner-img">
                                <div class="img">
                                    <img src="/assets/images/plataformas/plataforma.png" class="img-fluid w-55"
                                        alt="img8">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="w-100 h-100">
                            <h5 class="card-title mb-0">{{ __('Candidatos') }}</h4>
                            <div>
                                <table id="course-list-table" class="table" role="grid">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@php
$css_identifier = 'detailsProject';
@endphp