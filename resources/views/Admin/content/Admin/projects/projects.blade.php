@extends('Template/maestraAdmin')
@section('contenido')

<div class="conatiner-fluid content-inner mt-5 py-0">
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card banner">
                    <div class="card-body ">
                        <div class="row justify-content-center align-items-center banner-container">
                            <div class="col-lg-6 banner-item">
                                <div class="banner-text">
                                    <h1 class="fw-bold mb-4">
                                        <span class="text-secondary">{{ __('Projects') }} </span> {{ __('management') }}
                                    </h1>
                                </div>
                                <p class="mb-4">{{ __('You can create project (general data, students, passwords, date)') }}</p>
                            </div>
                            <div class="col-lg-6 banner-img">
                                <div class="img">
                                    <img src="../assets/images/plataformas/plataforma.png" class="img-fluid w-55"
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
                        <h5 class="mb-0 text-capitalize">{{ __('Projects dashboard') }}</h5>
                    </div>
                    <div class="card-body">
                       <div class="swiper-container  d-slider2">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="card">
                                <div class="card-body">
                                    <div id="visitasChart" class="custom-radial-chart"  data-value="{{ $comenzarChart }}"  data-show-value="{{ $comenzarChart }}"  data-label="Por comenzar" data-color="#A4D65E"></div>
                                     <hr class="mt-0">
                                    <p class="text-center mb-0">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" viewBox="0 0 14 15" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6663 7.50016C13.6663 11.1821 10.6816 14.1668 6.99967 14.1668C3.31778 14.1668 0.333008 11.1821 0.333008 7.50016C0.333008 3.81826 3.31778 0.833496 6.99967 0.833496C10.6816 0.833496 13.6663 3.81826 13.6663 7.50016ZM1.66634 7.50016C1.66634 10.4457 4.05416 12.8335 6.99967 12.8335C9.94519 12.8335 12.333 10.4457 12.333 7.50016C12.333 4.55464 9.94519 2.16683 6.99967 2.16683C4.05416 2.16683 1.66634 4.55464 1.66634 7.50016ZM6.33301 4.8335V8.16683C6.33301 8.53502 6.63148 8.8335 6.99967 8.8335C7.36786 8.8335 7.66634 8.53502 7.66634 8.16683V4.8335C7.66634 4.46531 7.36786 4.16683 6.99967 4.16683C6.63148 4.16683 6.33301 4.46531 6.33301 4.8335ZM7.66634 10.1668C7.66634 10.535 7.36786 10.8335 6.99967 10.8335C6.63148 10.8335 6.33301 10.535 6.33301 10.1668C6.33301 9.79864 6.63148 9.50016 6.99967 9.50016C7.36786 9.50016 7.66634 9.79864 7.66634 10.1668Z" fill="#AAA1AA" />
                                            </svg>
                                        </span>
                                        <small> {{ __('Projects to start') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card">
                                <div class="card-body">
                                    <div id="basic-radialbar-chart-2" class="custom-radial-chart" data-value="{{ $cursoChart }}"  data-show-value="{{ $cursoChart }}" data-label="En curso" data-color="#007DBA"></div>
                                    <hr class="mt-0">
                                    <p class="text-center mb-0">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" viewBox="0 0 14 15" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6663 7.50016C13.6663 11.1821 10.6816 14.1668 6.99967 14.1668C3.31778 14.1668 0.333008 11.1821 0.333008 7.50016C0.333008 3.81826 3.31778 0.833496 6.99967 0.833496C10.6816 0.833496 13.6663 3.81826 13.6663 7.50016ZM1.66634 7.50016C1.66634 10.4457 4.05416 12.8335 6.99967 12.8335C9.94519 12.8335 12.333 10.4457 12.333 7.50016C12.333 4.55464 9.94519 2.16683 6.99967 2.16683C4.05416 2.16683 1.66634 4.55464 1.66634 7.50016ZM6.33301 4.8335V8.16683C6.33301 8.53502 6.63148 8.8335 6.99967 8.8335C7.36786 8.8335 7.66634 8.53502 7.66634 8.16683V4.8335C7.66634 4.46531 7.36786 4.16683 6.99967 4.16683C6.63148 4.16683 6.33301 4.46531 6.33301 4.8335ZM7.66634 10.1668C7.66634 10.535 7.36786 10.8335 6.99967 10.8335C6.63148 10.8335 6.33301 10.535 6.33301 10.1668C6.33301 9.79864 6.63148 9.50016 6.99967 9.50016C7.36786 9.50016 7.66634 9.79864 7.66634 10.1668Z" fill="#AAA1AA" />
                                            </svg>
                                        </span>
                                        <small> {{ __('Projects in progress') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card">
                                <div class="card-body">
                                    <div id="basic-radialbar-chart-3" class="custom-radial-chart" data-value="{{ $finalizadosChart }}"  data-show-value="{{ $finalizadosChart }}" data-label="Finalizados" data-color="#FF585D"></div>
                                    <hr class="mt-0">
                                    <p class="text-center mb-0">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" viewBox="0 0 14 15" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6663 7.50016C13.6663 11.1821 10.6816 14.1668 6.99967 14.1668C3.31778 14.1668 0.333008 11.1821 0.333008 7.50016C0.333008 3.81826 3.31778 0.833496 6.99967 0.833496C10.6816 0.833496 13.6663 3.81826 13.6663 7.50016ZM1.66634 7.50016C1.66634 10.4457 4.05416 12.8335 6.99967 12.8335C9.94519 12.8335 12.333 10.4457 12.333 7.50016C12.333 4.55464 9.94519 2.16683 6.99967 2.16683C4.05416 2.16683 1.66634 4.55464 1.66634 7.50016ZM6.33301 4.8335V8.16683C6.33301 8.53502 6.63148 8.8335 6.99967 8.8335C7.36786 8.8335 7.66634 8.53502 7.66634 8.16683V4.8335C7.66634 4.46531 7.36786 4.16683 6.99967 4.16683C6.63148 4.16683 6.33301 4.46531 6.33301 4.8335ZM7.66634 10.1668C7.66634 10.535 7.36786 10.8335 6.99967 10.8335C6.63148 10.8335 6.33301 10.535 6.33301 10.1668C6.33301 9.79864 6.63148 9.50016 6.99967 9.50016C7.36786 9.50016 7.66634 9.79864 7.66634 10.1668Z" fill="#AAA1AA" />
                                            </svg>
                                        </span>
                                        <small>  {{ __('Completed projects') }}</small>
                                    </p>
                                </div>
                            </div>
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
                            <div class="header-title d-flex justify-content-between align-items-center w-100 mb-4">
                                <h4 class="card-title mb-0">{{ __('Projects list') }}</h4>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#proyectoModal" onclick="limpiarModal()">
                                    {{ __('New Project') }}
                                </button>
                            </div>
                            <div class="table-container">
                                <table id="proyecto-list-table" class="table" role="grid">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .wizard-step {
        display: none;
    }

    .wizard-step.active {
        display: block;
    }

    .wizard-nav {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        justify-content: space-between;
        margin-bottom: 2rem;
    }

    .wizard-nav li {
        flex: 1;
        text-align: center;
        position: relative;
        padding: 1rem;
        border-radius: 8px;
        margin: 0 0.25rem;
        background: #f8f9fa;
        color: #6c757d;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .wizard-nav li.active {
        background: #FF585D;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(13, 110, 253, 0.3);
    }

    .wizard-nav li.completed {
        background: #198754;
        color: white;
    }

    .wizard-nav li i {
        display: block;
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }

    .wizard-nav li span {
        font-weight: 500;
        font-size: 0.9rem;
    }

    .form-card {
        background: #f8f9fa;
        padding: 2rem;
        border-radius: 12px;
        margin-bottom: 2rem;
        border: 1px solid #e9ecef;
    }

    .steps {
        color: #6c757d;
        font-size: 1rem;
        font-weight: 500;
    }

    .action-button {
        padding: 0.75rem 2rem;
        font-weight: 500;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .action-button:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .form-control:focus {
        border-color: #A4D65E;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    }

    .success-icon {
        width: 120px;
        height: 120px;
        background: linear-gradient(135deg, #A4D65E, #20c997);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
        animation: successPulse 2s ease-in-out infinite;
    }

    .success-icon i {
        font-size: 3rem;
        color: white;
    }

    @keyframes successPulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }
    }

    .error-message {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.25rem;
        display: none;
    }

    .form-control.is-invalid {
        border-color: #dc3545;
    }

    .progress-bar-custom {
        height: 4px;
        background: #e9ecef;
        border-radius: 2px;
        overflow: hidden;
        margin-bottom: 2rem;
    }

    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #007DBA, #FF585D);
        border-radius: 2px;
        transition: width 0.5s ease;
    }

    .student-row {
        background: #fff;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .student-row:hover {
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transform: translateY(-1px);
    }

    .password-cell {
        font-family: 'Courier New', monospace;
        background: #f8f9fa;
        padding: 0.5rem;
        border-radius: 4px;
        position: relative;
    }

    .copy-btn {
        font-size: 0.75rem;
        padding: 0.25rem 0.5rem;
    }

    .table th {
        background: #495057 !important;
        color: white;
        font-weight: 600;
        border: none;
    }

    .table td {
        vertical-align: middle;
        border-color: #e9ecef;
    }
</style>
<div class="modal fade" id="proyectoModal" tabindex="-1" aria-labelledby="proyectoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="proyectoModalLabel">Proyecto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title"></h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="progress-bar-custom">
                                    <div class="progress-fill" id="progressBar" style="width: 16.66%"></div>
                                </div>

                                <ul class="wizard-nav" id="wizardNav">
                                    <li class="active" data-step="1">
                                        <i class="ri-profile-line"></i>
                                        <span>{{ __('General') }}</span>
                                    </li>
                                    <li data-step="2">
                                        <i class="ri-calendar-check-fill"></i>
                                        <span>{{ __('Dates') }}</span>
                                    </li>
                                    <li data-step="3">
                                        <i class="ri-presentation-fill"></i>
                                        <span>{{ __('Instructor') }}</span>
                                    </li>
                                    <li data-step="4">
                                        <i class="ri-group-fill"></i>
                                        <span>{{ __('Students') }}</span>
                                    </li>

                                    <li data-step="5">
                                        <i class="ri-check-fill"></i>
                                        <span>{{ __('Finish') }}</span>
                                    </li>
                                </ul>

                                <form id="proyectoForm">
                                    {!! csrf_field() !!}   
                                    <div class="wizard-step active" data-step="1">
                                        <div class="form-card">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h3 class="mb-4"> {{ __('General course details:') }}</h3>
                                                </div>
                                                <div class="col-5">
                                                    <h2 class="steps">{{ __('Step 1 of 6') }}</h2>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group mb-3 mt-3">
                                                        <label class="form-label"> {{ __('Contact name:')}}</label>
                                                        <input type="text" class="form-control" name="CONTACT_NAME_PROJEC" id="CONTACT_NAME_PROJEC"
                                                            placeholder="Nombre del contacto" />
                                                        <div class="error-message"> {{ __('This field is required.')}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3  mt-3">
                                                        <label class="form-label"> {{ __('Contact number:')}}</label>
                                                        <input type="text" class="form-control" name="CONTACT_PHONE_PROJECT" id="CONTACT_PHONE_PROJECT"
                                                            placeholder="Número de teléfono de contacto" />
                                                        <div class="error-message">{{ __('This field is required.')}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label"> {{ __('What type of course is it?*')
                                                        }}</label>
                                                    <select class="form-select" id="COURSE_TYPE_PROJECT" name="COURSE_TYPE_PROJECT">
                                                        <option value="0"> {{ __('Select...')}}</option>
                                                        <option value="1"> {{ __('Open')}}</option>
                                                        <option value="2"> {{ __('Closed')}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group mb-3">
                                                        <label class="form-label"> {{ __('Course name: *') }}</label>
                                                        <input type="text" class="form-control" name="COURSE_NAME_ES_PROJECT" id="COURSE_NAME_ES_PROJECT"
                                                            placeholder="Nombre en español" />
                                                        <div class="error-message"> {{ __('Name is required')}}</div>
                                                    </div>
                                                </div>
                                                @php
                                                $yearSuffix = date('y'); // obtiene los dos últimos dígitos del año
                                                @endphp
                                                <div class="col-md-2">
                                                    <div class="form-group mb-3">
                                                        <label class="form-label"> {{ __('Folio: *')}}</label>
                                                        <input type="text" class="form-control" name="FOLIO_PROJECT" id="FOLIO_PROJECT"
                                                            placeholder="STE-TR{{ $yearSuffix }}-000" />
                                                        <div class="error-message">{{ __('The folio is required.')}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group mb-3">
                                                        <label class="form-label"> {{ __('Location: *')}}</label>
                                                        <input type="text" class="form-control" name="LOCATION_PROJECT" id="LOCATION_PROJECT"
                                                            placeholder="Lugar" />
                                                        <div class="error-message"> {{ __('The location is required.')}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group mb-3">
                                                        <label class="form-label"> {{ __('City: *')}}</label>
                                                        <input type="text" class="form-control" name="CITY_PROJECT" id="CITY_PROJECT"
                                                            placeholder="Ciudad" />
                                                        <div class="error-message"> {{ __('The city is required')}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group mb-3">
                                                        <label class="form-label"> {{ __('Centre number: *')}}</label>
                                                        <input type="text" class="form-control" name="CENTER_NUMBER_PROJECT" id="CENTER_NUMBER_PROJECT"
                                                            placeholder="Número de centro" />
                                                        <div class="error-message"> {{ __('This field is required.')}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label class="form-label"> {{ __('Registered certification centre name:')}}</label>
                                                        <input type="text" class="form-control" name="CERTIFICATION_CENTER_PROJECT" id="CERTIFICATION_CENTER_PROJECT"
                                                            placeholder="Nombre del centro certificador" />
                                                        <div class="error-message"> {{ __('This field is required.')}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="col-12 me-1 ">
                                                        <label> {{ __('Language: *')}}</label>
                                                        <select class="form-select" id="LANGUAGE_PROJECT" name="LANGUAGE_PROJECT">
                                                            <option selected disabled>{{ __('Select...')}}</option>
                                                            @foreach ($idiomas as $idioma)
                                                            <option value="{{ $idioma->ID_CATALOGO_IDIOMAEXAMEN }}">{{
                                                                $idioma->NOMBRE_IDIOMA }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-2 text-start">
                                                    <label> {{ __('Accrediting entity: *')}}</label>
                                                    <select class="form-select" id="ACCREDITING_ENTITY_PROJECT" name="ACCREDITING_ENTITY_PROJECT">
                                                        <option selected disabled>{{ __('Select...')}}</option>
                                                        @foreach ($entes as $ente)
                                                        <option value="{{ $ente->ID_CATALOGO_ENTE }}">{{
                                                            $ente->NOMBRE_ENTE }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-2 text-start">
                                                    <label> {{ __('Operation type: *')}}</label>
                                                    <select class="form-select" id="OPERATION_TYPE_PROJECT" name="OPERATION_TYPE_PROJECT">
                                                        <option selected disabled>{{ __('Select...')}}</option>
                                                        @foreach ($operaciones as $operacion)
                                                        <option value="{{ $operacion->ID_CATALOGO_OPERACION }}">{{
                                                            $operacion->NOMBRE_OPERACION }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <!-- Niveles -->
                                                <div class="col-md-3 text-start">
                                                    <label> {{ __('Accreditation level: *')}}</label>
                                                    <select class="form-select" id="ACCREDITATION_LEVELS_PROJECT" name="ACCREDITATION_LEVELS_PROJECT[]"
                                                        multiple>
                                                        @foreach ($niveles as $nivel)
                                                        <option value="{{ $nivel->ID_CATALOGO_NIVELACREDITACION }}">{{
                                                            $nivel->NOMBRE_NIVEL }} - {{ $nivel->DESCRIPCION_NIVEL }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-3 text-start">
                                                    <label> {{ __('BOP: *')}}</label>
                                                    <select class="form-select" id="BOP_TYPES_PROJECT" name="BOP_TYPES_PROJECT[]"
                                                        multiple>
                                                        @foreach ($bops as $bop)
                                                        <option value="{{ $bop->ID_CATALOGO_TIPOBOP }}">{{
                                                            $bop->ABREVIATURA }} - {{ $bop->DESCRIPCION_TIPOBOP }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group mb-3 mt-3">
                                                        <label class="form-label"> {{ __('Name(s) of company(ies) *')}}</label>
                                                        <input id="COMPANIES" name="COMPANIES" class="form-control" />
                                                        <div class="error-message"> {{ __('This field is required.')}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="button" class="btn btn-primary action-button next-step"> {{
                                                __('Next')}}</button>
                                        </div>
                                    </div>
                                    <div class="wizard-step" data-step="2">
                                        <div class="form-card">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h3 class="mb-4"> {{ __('Dates and activation:') }}</h3>
                                                </div>
                                                <div class="col-5">
                                                    <h2 class="steps"> {{ __('Step 2 of 6') }}</h2>
                                                </div>
                                            </div>
                                            <style>
                                                .flatpickr-container {
                                                    position: relative;
                                                }

                                                .flatpickr-container .input-button {
                                                    position: absolute;
                                                    top: 50%;
                                                    transform: translateY(-50%);
                                                    cursor: pointer;
                                                    padding: 0 8px;
                                                    color: #555;
                                                }

                                                .flatpickr-container .input-button[data-toggle] {
                                                    right: 32px;
                                                }

                                                .flatpickr-container .input-button[data-clear] {
                                                    right: 8px;
                                                }

                                                .flatpickr-container input.form-control {
                                                    padding-right: 64px;
                                                    /* espacio para íconos */
                                                }

                                                .input-button:hover {
                                                    color: #000;
                                                }
                                            </style>
                                            <div class="row g-3">
                                                <!-- Fecha de inicio del curso -->
                                                <div class="col-md-6">
                                                    <label class="form-label" for="start_date">{{ __('Course start date: *') }}</label>
                                                    <div class="flatpickr-container">
                                                        <input type="text" id="start_date" name="COURSE_START_DATE_PROJECT" class="form-control"
                                                            placeholder="Selecciona una fecha">
                                                        <a class="input-button" title="Abrir calendario"
                                                            data-toggle="start_date"><i
                                                                class="fa-solid fa-calendar-days"></i></a>
                                                        <a class="input-button" title="Limpiar fecha"
                                                            data-clear="start_date"><i
                                                                class="fa-solid fa-xmark"></i></a>
                                                    </div>
                                                </div>

                                                <!-- Fecha de fin del curso -->
                                                <div class="col-md-6">
                                                    <label class="form-label" for="end_date">{{ __('Course end date: *') }}</label>
                                                    <div class="flatpickr-container">
                                                        <input type="text" id="end_date" name="COURSE_END_DATE_PROJECT" class="form-control"
                                                            placeholder="Selecciona una fecha">
                                                        <a class="input-button" title="Abrir calendario"
                                                            data-toggle="end_date"><i
                                                                class="fa-solid fa-calendar-days"></i></a>
                                                        <a class="input-button" title="Limpiar fecha"
                                                            data-clear="end_date"><i class="fa-solid fa-xmark"></i></a>
                                                    </div>
                                                </div>

                                                <!-- Fecha y hora de inicio de membresía -->
                                                <div class="col-md-6">
                                                    <label class="form-label" for="membership_start">{{ __('Membership start date and time: *') }}</label>
                                                    <div class="flatpickr-container">
                                                        <input type="text" id="membership_start" name="MEMBERSHIP_START_PROJECT" class="form-control"
                                                            placeholder="{{ __('Select date and time') }}">
                                                        <a class="input-button" title="Abrir calendario"
                                                            data-toggle="membership_start"><i
                                                                class="fa-solid fa-calendar-days"></i></a>
                                                        <a class="input-button" title="Limpiar fecha"
                                                            data-clear="membership_start"><i
                                                                class="fa-solid fa-xmark"></i></a>
                                                    </div>
                                                </div>

                                                <!-- Fecha y hora de término de membresía -->
                                                <div class="col-md-6">
                                                    <label class="form-label" for="membership_end">{{ __('Membership end date and time: *') }}</label>
                                                    <div class="flatpickr-container">
                                                        <input type="text" id="membership_end" name="MEMBERSHIP_END_PROJECT" class="form-control"
                                                            placeholder="{{ __('Select date and time') }}">
                                                        <a class="input-button" title="Abrir calendario"
                                                            data-toggle="membership_end"><i
                                                                class="fa-solid fa-calendar-days"></i></a>
                                                        <a class="input-button" title="Limpiar fecha"
                                                            data-clear="membership_end"><i
                                                                class="fa-solid fa-xmark"></i></a>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label" for="start_date">{{ __('Course exam date: *') }}</label>
                                                    <div class="flatpickr-container">
                                                        <input type="text" id="start_date3" name="EXAM_DATE_PROJECT" class="form-control"
                                                            placeholder="Selecciona una fecha">
                                                        <a class="input-button" title="Abrir calendario"
                                                            data-toggle="start_date"><i
                                                                class="fa-solid fa-calendar-days"></i></a>
                                                        <a class="input-button" title="Limpiar fecha"
                                                            data-clear="start_date"><i
                                                                class="fa-solid fa-xmark"></i></a>
                                                    </div>
                                                </div>

                                                <!-- Fecha de fin del curso -->
                                                <div class="col-md-6">
                                                    <label class="form-label" for="end_date">{{ __('Course exam time: *') }}</label>
                                                    <div class="flatpickr-container">
                                                        <input type="time" id="start_time" name="EXAM_TIME_PROJECT"  class="form-control"
                                                            >
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label" for="start_date">{{ __('Course practical exam date: *') }}</label>
                                                    <div class="flatpickr-container">
                                                        <input type="text" id="start_date2" name="PRACTICAL_EXAM_DATE_PROJECT" class="form-control"
                                                            placeholder="Selecciona una fecha">
                                                        <a class="input-button" title="Abrir calendario"
                                                            data-toggle="start_date"><i
                                                                class="fa-solid fa-calendar-days"></i></a>
                                                        <a class="input-button" title="Limpiar fecha"
                                                            data-clear="start_date"><i
                                                                class="fa-solid fa-xmark"></i></a>
                                                    </div>
                                                </div>

                                                <!-- Fecha de fin del curso -->
                                                <div class="col-md-6">
                                                    <label class="form-label" for="end_date">{{ __('Course practical exam time: *') }}</label>
                                                    <div class="flatpickr-container">
                                                        <input type="time" id="start_time2" name="PRACTICAL_EXAM_TIME_PROJECT" class="form-control"
                                                            >
                                                    </div>
                                                </div>

                                            </div>
                                            <script>

                                                const configs = {
                                                    start_date: {
                                                        dateFormat: "Y-m-d",
                                                        defaultDate: "today",
                                                        minDate: "today",
                                                        allowInput: true,
                                                        clickOpens: true
                                                    },
                                                    end_date: {
                                                        dateFormat: "Y-m-d",
                                                        defaultDate: "today",
                                                        minDate: "today",
                                                        allowInput: true,
                                                        clickOpens: true
                                                    },
                                                    membership_start: {
                                                        enableTime: true,
                                                        dateFormat: "Y-m-d H:i",
                                                        defaultDate: new Date(),
                                                        minDate: new Date(),
                                                        allowInput: true,
                                                        clickOpens: true
                                                    },
                                                    membership_end: {
                                                        enableTime: true,
                                                        dateFormat: "Y-m-d H:i",
                                                        defaultDate: new Date(),
                                                        minDate: new Date(),
                                                        allowInput: true,
                                                        clickOpens: true
                                                    }
                                                };

                                                const pickers = {};

                                                for (const id in configs) {
                                                    pickers[id] = flatpickr(`#${id}`, configs[id]);
                                                }

                                                document.querySelectorAll('[data-toggle]').forEach(btn => {
                                                    btn.addEventListener('click', (e) => {
                                                        e.preventDefault();
                                                        const id = btn.getAttribute('data-toggle');
                                                        if (pickers[id]) pickers[id].open();
                                                    });
                                                });

                                                document.querySelectorAll('[data-clear]').forEach(btn => {
                                                    btn.addEventListener('click', (e) => {
                                                        e.preventDefault();
                                                        const id = btn.getAttribute('data-clear');
                                                        if (pickers[id]) pickers[id].clear();
                                                    });
                                                    const id = btn.getAttribute('data-clear');
                                                    if (pickers[id]) pickers[id].clear();
                                                });


                                            </script>

                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <button type="button"
                                                class="btn btn-success action-button prev-step">{{ __('Previous') }}</button>
                                            <button type="button"
                                                class="btn btn-primary action-button next-step">{{ __('Next') }}</button>
                                        </div>
                                    </div>
                                    <div class="wizard-step" data-step="3">
                                        <div class="form-card">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h3 class="mb-4">{{ __('Instructor')}}</h3>
                                                </div>
                                                <div class="col-5">
                                                    <h2 class="steps"> {{ __('Step 3 of 6')}}</h2>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">{{ __('Course instructor: *') }}</label>
                                                    <select class="form-select" name="INSTRUCTOR_ID_PROJECT">
                                                        <option value="">Seleccionar...</option>
                                                        <option value="1">Ing. Pedro Frias</option>
                                                        <option value="2">Ing. Rafael Suarez</option>
                                                    </select>
                                                    <div class="error-message">{{ __('Select an instructor') }} </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="form-label"> {{ __('Instructor contact email: *') }}</label>
                                                        <input type="email" class="form-control" name="INSTRUCTOR_EMAIL_PROJECT"
                                                            placeholder="Correo electrónico" />
                                                        <div class="error-message"> {{ __('Email is required') }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <button type="button"
                                                    class="btn btn-success action-button prev-step"> {{ __('Previous') }}</button>
                                                <button type="button"
                                                    class="btn btn-primary action-button next-step"> {{ __('Next') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wizard-step" data-step="4">
                                        <div class="form-card">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h3 class="mb-4">{{ __('Instructor')}}</h3>
                                                </div>
                                                <div class="col-5">
                                                    <h2 class="steps"> {{ __('Step 4 of 6')}}</h2>
                                                </div>
                                            </div>
                                            
                                            <!-- Contenedor dinámico para las empresas -->
                                            <div id="empresasContainer"></div>
                                            
                                            <div class="d-flex justify-content-between">
                                                <button type="button" class="btn btn-success action-button prev-step"> {{ __('Previous') }}</button>
                                                <button type="button" class="btn btn-primary action-button next-step"> {{ __('Next') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wizard-step" data-step="5">
                                        <div class="form-card text-center">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h3 class="mb-4"> {{ __('Completed!') }}</h3>
                                                </div>
                                                <div class="col-5">
                                                    <h2 class="steps"> {{ __('Step 6 of 6') }}</h2>
                                                </div>
                                            </div>

                                            <div class="success-icon">
                                                <i class="ri-check-line"></i>
                                            </div>

                                            <h2 class="text-success mb-4"><strong> {{ __('You can now save this project') }}</strong></h2>
                                            <h5 class="text-muted"> {{ __('All data has been captured correctly, you can now save this project') }}</h5>
                                            <p class="mt-3">
                                            </p>

                                            <div class="mt-4">
                                                <button type="button" class="btn btn-primary action-button" id="proyectobtnModal"> {{ __('Save') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
$css_identifier = 'projectsAdmin';
@endphp