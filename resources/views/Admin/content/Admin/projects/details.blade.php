@extends('Template/maestraAdmin')
@section('contenido')

<div class="conatiner-fluid content-inner mt-5 py-0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div>
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="Breadcrumb" class="breadcrumb-ui">
                    <ol>
                        <li>
                            <a href="{{ route('home') }}">
                                <i class="ri-home-line"></i>
                                <span>Inicio</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('projectsAdmin') }}">
                                <i class="ri-folder-2-line"></i>
                                <span>Proyectos</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" aria-current="page" class="current">
                                <i class="ri-slideshow-line"></i>
                                <span>Detalles</span>
                            </a>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12 mt-4">
                <div class="card banner">
                    <div class="card-body ">
                        <div class="row justify-content-center align-items-center banner-container">
                            <div class="col-lg-6 banner-item">
                                <div class="banner-text">
                                    <h1 class="fw-bold mb-4">
                                        <span class="text-secondary">{{ __('Project') }} - </span> {{ $COURSE_NAME_ES_PROJECT }}
                                    </h1>
                                </div>
                                <p class="mb-4">{{ __('Bienvenido, administrador. Este panel le permitirá gestionar este proyecto (estudiantes, fechas, datos generales, etc)') }}</p>
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
                    <div class="card-header">
                        <h5 class="mb-0 text-capitalize">{{ __('Dashboard') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="w-100 h-100">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="w-100 h-100">
                            <div class="header-title d-flex justify-content-between align-items-center w-100 mb-4">
                                <h5 class="card-title mb-0">{{ __('Membresias de estudiantes') }}</h4>
                            </div>
                            <div class="table-container">
                                <table id="-list-table" class="table" role="grid">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="w-100 h-100">
                            <div class="header-title d-flex justify-content-between align-items-center w-100 mb-4">
                                <h5 class="card-title mb-0">{{ __('') }}</h4>
                            </div>
                            <div class="table-container">
                                <table id="students-list-table" class="table" role="grid">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="w-100 h-100">
                            <div class="header-title d-flex justify-content-between align-items-center w-100 mb-4">
                                <h5 class="card-title mb-0">{{ __('Curso') }}</h4>
                            </div>
                            <div class="table-container">
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
<script>
    const ID_PROJECT = @json($ID_PROJECT);
</script>

@endsection
@php
$css_identifier = 'detailsProject';
@endphp