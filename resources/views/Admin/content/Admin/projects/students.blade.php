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
                                <table class="table table-modern" id="course-list-table">
                                    <thead>
                                        <tr>
                                            <th  colspan="5" class="text-center">Estudiante</th>
                                            <th  colspan="1" class="text-center">Evaluación inicial</th>
                                            <th  colspan="2" class="text-center">Re-sits / re-test</th>
                                            <th  colspan="4" class="text-center" >Certificados</th>
                                        </tr>
                                        <tr>
                                            <th width="50px" class="text-center">#</th>
                                            <th class="col-180" width="140px">Estudiante</th>
                                            <th  class="col-180" width="180px">Nivel</th>
                                            <th  width="180px">BOP</th>
                                            <th  width="180px">Idioma</th>
                                            <th class="col-180" width="180px">Práctico</th>
                                            <th class="col-180" width="180px">Equipos</th>
                                            <th class="col-180" width="180px" id="pypTh">P&P</th>
                                            <th class="col-180" width="180px" id="complementoTh">Complemento</th>
                                            <th class="col-180" width="180px" id="d1Th">D1</th>
                                            <th class="col-180" width="180px" id="d2Th">D2</th>
                                            <th class="col-180" width="180px" id="d3Th">D3</th>
                                            <th class="col-180" width="180px">Estatus</th>
                                            <th  width="180px">Resit</th>
                                            <th  width="180px">No. Intentos permitidos</th>
                                            <th  width="180px">Periodo</th>
                                            <th  width="180px">Dias restantes</th>
                                            <th  width="180px">Fecha límite</th>
                                            <th class="col-180" width="180px">Resit módulo</th>
                                            <th  width="180px">Sí</th>
                                            <th class="col-180" width="180px">Fecha</th>
                                            <th class="col-180" width="180px">Puntaje</th>
                                            <th class="col-180" width="180px">Estatus</th>
                                            <th  width="180px">Sí</th>
                                            <th  width="180px">Requiere entrenamiento adicional</th>
                                            <th  width="180px">Folio de proyecto para entrenamiento</th>
                                            <th class="col-180" width="180px">Fecha</th>
                                            <th class="col-180" width="180px">Puntaje</th>
                                            <th class="col-180" width="180px">Estatus</th>
                                            <th class="col-180" width="180px">Estatus</th>
                                            <th  width="180px">Sí</th>
                                            <th class="col-180" width="180px">Expiración</th>
                                            <th class="col-180" width="180px">Vigencia</th>
                                            <th class="col-250" width="180px">Correo</th>
                                            <th width="100px" class="table-row-actions text-center">Documento</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Los datos se cargarán aquí dinámicamente -->
                                        <tr>
                                            <td colspan="11" class="text-center loading-state">
                                                <div class="loading-container">
                                                    <div class="loading-spinner"></div>
                                                    <p class="loading-text">Cargando candidatos...</p>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
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