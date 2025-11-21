@extends('Template/maestraAdmin')
@section('contenido') 
<div class="conatiner-fluid content-inner mt-5 py-0">
       <div class="row">
        <div class="col-md-12">
            <div class="card banner">
                <div class="card-body ">
                    <div class="row justify-content-center align-items-center banner-container">
                        <div class="col-lg-6 banner-item">
                            <div class="banner-text">
                                <h1 class="fw-bold mb-4">
                                 {{ __('Welcome') }}, 
                                    @if(session('ROLES_USER')['superusuario'] ?? false)
                                        <span class="text-secondary">{{ __('Superadministrador') }} !</span>
                                    @elseif(session('ROLES_USER')['admin'] ?? false)
                                        <span class="text-secondary">{{ __('Administrador') }} !</span>
                                    @elseif(session('ROLES_USER')['logistica'] ?? false)
                                        <span class="text-secondary">{{ __('Logística') }} !</span>
                                    @endif
                                </h1>
                            </div> 
                        <p class="mb-4">{{ __('This is your administrator panel. Here is a summary of some relevant data collected by the Results WCLE platform.') }}</p>
                            <!-- <button type="button" class="btn btn-primary">Get Started</button> -->
                        </div>
                        <div class="col-lg-6 banner-img">
                            <div class="img">
                                <img src="../assets/images/principal/personas.png" class="img-fluid w-55" alt="img8">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="p-2 rounded bg-soft-warning">
                            <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V5H19V19ZM7 12H9V17H7V12ZM7 7H9V9H7V7Z" fill="currentColor"/>
                            </svg>
                        </div>
                        <div class="ms-3">
                            <h4 class="mb-1">{{ $totalProyectos ?? 0 }}</h4>
                            <small class="mb-0">Total Proyectos</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="p-2 rounded bg-soft-primary">
                            <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 5.5V7H9V5.5L3 7V9L9 10.5V12L3 13.5V15.5L9 14V16L3 17.5V19.5L9 18V22H15V18L21 19.5V17.5L15 16V14L21 15.5V13.5L15 12V10.5L21 9Z" fill="currentColor"/>
                            </svg>
                        </div>
                        <div class="ms-3">
                            <h4 class="mb-1">{{ $totalEstudiantes ?? 0 }}</h4>
                            <small class="mb-0">Total Estudiantes</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="p-2 rounded bg-soft-success">
                            <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM9.29 16.29L5.7 12.7C5.31 12.31 5.31 11.68 5.7 11.29C6.09 10.9 6.72 10.9 7.11 11.29L10 14.17L16.88 7.29C17.27 6.9 17.9 6.9 18.29 7.29C18.68 7.68 18.68 8.31 18.29 8.7L10.7 16.29C10.32 16.68 9.68 16.68 9.29 16.29Z" fill="currentColor"/>
                            </svg>
                        </div>
                        <div class="ms-3">
                            <h4 class="mb-1">{{ $estudiantesAprobados ?? 0 }}</h4>
                            <small class="mb-0">Estudiantes Aprobados</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
         <div class="col-md-12">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Proyectos por Ente Acreditador</h5>
                        </div>
                        <div class="card-body">
                            <div id="chartAcreditacion" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Proyectos por Año</h5>
                        </div>
                        <div class="card-body">
                            <div id="chartProyectosAnio" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Proyectos por Empresa</h5>
                        </div>
                        <div class="card-body">
                            <div id="chartProyectosEmpresa" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
                

                {{-- <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Cursos por Año</h5>
                        </div>
                        <div class="card-body">
                            <div id="chartCursosAnio" style="height: 300px;"></div>
                        </div>
                    </div>
                </div> --}}

               
                {{-- <div class="swiper-container  d-slider2">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="card">
                                <div class="card-body">
                                    <div id="visitasChart" class="custom-radial-chart"  data-value="{{ $visitas }}"  data-show-value="{{ $visitas }}"  data-label="Visitas" data-color="#A4D65E"></div>
                                    <hr class="mt-0">
                                    <p class="text-center mb-0">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" viewBox="0 0 14 15" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6663 7.50016C13.6663 11.1821 10.6816 14.1668 6.99967 14.1668C3.31778 14.1668 0.333008 11.1821 0.333008 7.50016C0.333008 3.81826 3.31778 0.833496 6.99967 0.833496C10.6816 0.833496 13.6663 3.81826 13.6663 7.50016ZM1.66634 7.50016C1.66634 10.4457 4.05416 12.8335 6.99967 12.8335C9.94519 12.8335 12.333 10.4457 12.333 7.50016C12.333 4.55464 9.94519 2.16683 6.99967 2.16683C4.05416 2.16683 1.66634 4.55464 1.66634 7.50016ZM6.33301 4.8335V8.16683C6.33301 8.53502 6.63148 8.8335 6.99967 8.8335C7.36786 8.8335 7.66634 8.53502 7.66634 8.16683V4.8335C7.66634 4.46531 7.36786 4.16683 6.99967 4.16683C6.63148 4.16683 6.33301 4.46531 6.33301 4.8335ZM7.66634 10.1668C7.66634 10.535 7.36786 10.8335 6.99967 10.8335C6.63148 10.8335 6.33301 10.535 6.33301 10.1668C6.33301 9.79864 6.63148 9.50016 6.99967 9.50016C7.36786 9.50016 7.66634 9.79864 7.66634 10.1668Z" fill="#AAA1AA" />
                                            </svg>
                                        </span>
                                        <small>Visitas al sitio</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card">
                                <div class="card-body">
                                    <div id="basic-radialbar-chart-2" class="custom-radial-chart" data-value="{{ $visitas }}"  data-show-value="{{ $visitas }}" data-label="Membresias" data-color="#007DBA"></div>
                                    <hr class="mt-0">
                                    <p class="text-center mb-0">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" viewBox="0 0 14 15" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6663 7.50016C13.6663 11.1821 10.6816 14.1668 6.99967 14.1668C3.31778 14.1668 0.333008 11.1821 0.333008 7.50016C0.333008 3.81826 3.31778 0.833496 6.99967 0.833496C10.6816 0.833496 13.6663 3.81826 13.6663 7.50016ZM1.66634 7.50016C1.66634 10.4457 4.05416 12.8335 6.99967 12.8335C9.94519 12.8335 12.333 10.4457 12.333 7.50016C12.333 4.55464 9.94519 2.16683 6.99967 2.16683C4.05416 2.16683 1.66634 4.55464 1.66634 7.50016ZM6.33301 4.8335V8.16683C6.33301 8.53502 6.63148 8.8335 6.99967 8.8335C7.36786 8.8335 7.66634 8.53502 7.66634 8.16683V4.8335C7.66634 4.46531 7.36786 4.16683 6.99967 4.16683C6.63148 4.16683 6.33301 4.46531 6.33301 4.8335ZM7.66634 10.1668C7.66634 10.535 7.36786 10.8335 6.99967 10.8335C6.63148 10.8335 6.33301 10.535 6.33301 10.1668C6.33301 9.79864 6.63148 9.50016 6.99967 9.50016C7.36786 9.50016 7.66634 9.79864 7.66634 10.1668Z" fill="#AAA1AA" />
                                            </svg>
                                        </span>
                                        <small>Membresias activas</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card">
                                <div class="card-body">
                                    <div id="basic-radialbar-chart-3" class="custom-radial-chart" data-value="{{ $visitas }}"  data-show-value="{{ $visitas }}" data-label="Membresias" data-color="#FF585D"></div>
                                    <hr class="mt-0">
                                    <p class="text-center mb-0">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" viewBox="0 0 14 15" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6663 7.50016C13.6663 11.1821 10.6816 14.1668 6.99967 14.1668C3.31778 14.1668 0.333008 11.1821 0.333008 7.50016C0.333008 3.81826 3.31778 0.833496 6.99967 0.833496C10.6816 0.833496 13.6663 3.81826 13.6663 7.50016ZM1.66634 7.50016C1.66634 10.4457 4.05416 12.8335 6.99967 12.8335C9.94519 12.8335 12.333 10.4457 12.333 7.50016C12.333 4.55464 9.94519 2.16683 6.99967 2.16683C4.05416 2.16683 1.66634 4.55464 1.66634 7.50016ZM6.33301 4.8335V8.16683C6.33301 8.53502 6.63148 8.8335 6.99967 8.8335C7.36786 8.8335 7.66634 8.53502 7.66634 8.16683V4.8335C7.66634 4.46531 7.36786 4.16683 6.99967 4.16683C6.63148 4.16683 6.33301 4.46531 6.33301 4.8335ZM7.66634 10.1668C7.66634 10.535 7.36786 10.8335 6.99967 10.8335C6.63148 10.8335 6.33301 10.535 6.33301 10.1668C6.33301 9.79864 6.63148 9.50016 6.99967 9.50016C7.36786 9.50016 7.66634 9.79864 7.66634 10.1668Z" fill="#AAA1AA" />
                                            </svg>
                                        </span>
                                        <small>Membresias con proyecto</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card">
                                <div class="card-body">
                                    <div id="basic-radialbar-chart-4" class="custom-radial-chart" data-value="{{ $visitas }}"  data-show-value="{{ $visitas }}" data-label="Membresias" data-color="#A4D65E"></div>
                                    <hr class="mt-0">
                                    <p class="text-center mb-0">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" viewBox="0 0 14 15" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6663 7.50016C13.6663 11.1821 10.6816 14.1668 6.99967 14.1668C3.31778 14.1668 0.333008 11.1821 0.333008 7.50016C0.333008 3.81826 3.31778 0.833496 6.99967 0.833496C10.6816 0.833496 13.6663 3.81826 13.6663 7.50016ZM1.66634 7.50016C1.66634 10.4457 4.05416 12.8335 6.99967 12.8335C9.94519 12.8335 12.333 10.4457 12.333 7.50016C12.333 4.55464 9.94519 2.16683 6.99967 2.16683C4.05416 2.16683 1.66634 4.55464 1.66634 7.50016ZM6.33301 4.8335V8.16683C6.33301 8.53502 6.63148 8.8335 6.99967 8.8335C7.36786 8.8335 7.66634 8.53502 7.66634 8.16683V4.8335C7.66634 4.46531 7.36786 4.16683 6.99967 4.16683C6.63148 4.16683 6.33301 4.46531 6.33301 4.8335ZM7.66634 10.1668C7.66634 10.535 7.36786 10.8335 6.99967 10.8335C6.63148 10.8335 6.33301 10.535 6.33301 10.1668C6.33301 9.79864 6.63148 9.50016 6.99967 9.50016C7.36786 9.50016 7.66634 9.79864 7.66634 10.1668Z" fill="#AAA1AA" />
                                            </svg>
                                        </span>
                                        <small>Membresias individuales</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card">
                                <div class="card-body">
                                    <div id="basic-radialbar-chart-5" class="custom-radial-chart" data-value="{{ $visitas }}"  data-show-value="{{ $visitas }}" data-label="Membresias" data-color="#FF585D"></div>
                                    <hr class="mt-0">
                                    <p class="text-center mb-0">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" viewBox="0 0 14 15" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6663 7.50016C13.6663 11.1821 10.6816 14.1668 6.99967 14.1668C3.31778 14.1668 0.333008 11.1821 0.333008 7.50016C0.333008 3.81826 3.31778 0.833496 6.99967 0.833496C10.6816 0.833496 13.6663 3.81826 13.6663 7.50016ZM1.66634 7.50016C1.66634 10.4457 4.05416 12.8335 6.99967 12.8335C9.94519 12.8335 12.333 10.4457 12.333 7.50016C12.333 4.55464 9.94519 2.16683 6.99967 2.16683C4.05416 2.16683 1.66634 4.55464 1.66634 7.50016ZM6.33301 4.8335V8.16683C6.33301 8.53502 6.63148 8.8335 6.99967 8.8335C7.36786 8.8335 7.66634 8.53502 7.66634 8.16683V4.8335C7.66634 4.46531 7.36786 4.16683 6.99967 4.16683C6.63148 4.16683 6.33301 4.46531 6.33301 4.8335ZM7.66634 10.1668C7.66634 10.535 7.36786 10.8335 6.99967 10.8335C6.63148 10.8335 6.33301 10.535 6.33301 10.1668C6.33301 9.79864 6.63148 9.50016 6.99967 9.50016C7.36786 9.50016 7.66634 9.79864 7.66634 10.1668Z" fill="#AAA1AA" />
                                            </svg>
                                        </span>
                                        <small>Membresias individuales</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Estudiantes a Segundo Resit</h5>
                            </div>
                            <div class="card-body">
                                <div id="chartSegundoResit" style="height: 300px;"></div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                

                
            </div>
        </div>
         <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Estudiantes por Acreditación</h3>
                        </div>
                        <div class="card-body">
                            <!-- Filtros -->
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="periodType" class="form-label">Tipo de Período:</label>
                                    <select id="periodType" class="form-select">
                                        <option value="year">Año</option>
                                        <option value="month" selected>Mes</option>
                                        <option value="day">Día</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="yearSelect" class="form-label">Año:</label>
                                    <select id="yearSelect" class="form-select">
                                    </select>
                                </div>
                                <div class="col-md-3" id="dateRange" style="display:none;">
                                    <label for="startDate" class="form-label">Fecha Inicio:</label>
                                    <input type="date" id="startDate" class="form-control">
                                    <label for="endDate" class="form-label">Fecha Fin:</label>
                                    <input type="date" id="endDate" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label for="chartType" class="form-label">Tipo de Gráfica:</label>
                                    <select id="chartType" class="form-select">
                                        <option value="column">Columnas Agrupadas</option>
                                        <option value="line">Líneas</option>
                                    </select>
                                </div>
                                <div class="col-md-2 d-flex align-items-end">
                                    <button type="button" class="btn btn-primary w-100" onclick="loadChartData()">
                                        <i class="fas fa-chart-bar"></i> Generar
                                    </button>
                                </div>
                            </div>

                            <!-- Totales -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <div class="alert alert-info" id="totalsContainer">
                                        <strong>Totales:</strong> Seleccione filtros y haga clic en Generar
                                    </div>
                                </div>
                            </div>

                            <!-- Gráfica -->
                            <div class="row">
                                <div class="col-12">
                                    <div id="chartdiv" style="width: 100%; height: 500px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
       
        <div class="col-md-12 col-lg-4">
            <div class="row">
                {{-- <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between flex-wrap">
                            <div class="header-title">
                                <h4 class="card-title">Usuarios</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex  align-items-center justify-content-between" style="position: relative;">
                                <div>
                                    <h6 class="mb-3">Activos</h6>
                                    <span>57 m</span> <br />
                                    <span class="text-success">21.77%</span>
                                </div>
                                <div id="d-activity-1" class="rounded-bar-chart"></div>
                            </div>
                            <hr>
                            <div class="d-flex  align-items-center justify-content-between">
                                <div>
                                    <h6 class="mb-3">Inactivos</h6>
                                    <span>36 k</span><br />
                                    <span class="text-danger">95.77%</span>
                                </div>
                                <div id="d-activity" class="rounded-bar-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-itmes-center   mb-4">
                                <div class="d-flex align-itmes-center me-0 me-md-4">
                                    <div>
                                        <div class="p-2 rounded bg-soft-primary">
                                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9303 7C16.9621 6.92913 16.977 6.85189 16.9739 6.77432H17C16.8882 4.10591 14.6849 2 12.0049 2C9.325 2 7.12172 4.10591 7.00989 6.77432C6.9967 6.84898 6.9967 6.92535 7.00989 7H6.93171C5.65022 7 4.28034 7.84597 3.88264 10.1201L3.1049 16.3147C2.46858 20.8629 4.81062 22 7.86853 22H16.1585C19.2075 22 21.4789 20.3535 20.9133 16.3147L20.1444 10.1201C19.676 7.90964 18.3503 7 17.0865 7H16.9303ZM15.4932 7C15.4654 6.92794 15.4506 6.85153 15.4497 6.77432C15.4497 4.85682 13.8899 3.30238 11.9657 3.30238C10.0416 3.30238 8.48184 4.85682 8.48184 6.77432C8.49502 6.84898 8.49502 6.92535 8.48184 7H15.4932ZM9.097 12.1486C8.60889 12.1486 8.21321 11.7413 8.21321 11.2389C8.21321 10.7366 8.60889 10.3293 9.097 10.3293C9.5851 10.3293 9.98079 10.7366 9.98079 11.2389C9.98079 11.7413 9.5851 12.1486 9.097 12.1486ZM14.002 11.2389C14.002 11.7413 14.3977 12.1486 14.8858 12.1486C15.3739 12.1486 15.7696 11.7413 15.7696 11.2389C15.7696 10.7366 15.3739 10.3293 14.8858 10.3293C14.3977 10.3293 14.002 10.7366 14.002 11.2389Z" fill="currentColor"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <h5>5</h5>
                                        <small class="mb-0">Paquetes</small>
                                    </div>
                                </div>
                                <div class="d-flex align-itmes-center">
                                    <div>
                                        <div class="p-2 rounded bg-soft-success">
                                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.1213 11.2331H16.8891C17.3088 11.2331 17.6386 10.8861 17.6386 10.4677C17.6386 10.0391 17.3088 9.70236 16.8891 9.70236H14.1213C13.7016 9.70236 13.3719 10.0391 13.3719 10.4677C13.3719 10.8861 13.7016 11.2331 14.1213 11.2331ZM20.1766 5.92749C20.7861 5.92749 21.1858 6.1418 21.5855 6.61123C21.9852 7.08067 22.0551 7.7542 21.9652 8.36549L21.0159 15.06C20.8361 16.3469 19.7569 17.2949 18.4879 17.2949H7.58639C6.25742 17.2949 5.15828 16.255 5.04837 14.908L4.12908 3.7834L2.62026 3.51807C2.22057 3.44664 1.94079 3.04864 2.01073 2.64043C2.08068 2.22305 2.47038 1.94649 2.88006 2.00874L5.2632 2.3751C5.60293 2.43735 5.85274 2.72207 5.88272 3.06905L6.07257 5.35499C6.10254 5.68257 6.36234 5.92749 6.68209 5.92749H20.1766ZM7.42631 18.9079C6.58697 18.9079 5.9075 19.6018 5.9075 20.459C5.9075 21.3061 6.58697 22 7.42631 22C8.25567 22 8.93514 21.3061 8.93514 20.459C8.93514 19.6018 8.25567 18.9079 7.42631 18.9079ZM18.6676 18.9079C17.8282 18.9079 17.1487 19.6018 17.1487 20.459C17.1487 21.3061 17.8282 22 18.6676 22C19.4969 22 20.1764 21.3061 20.1764 20.459C20.1764 19.6018 19.4969 18.9079 18.6676 18.9079Z" fill="currentColor"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <h5>81K</h5>
                                        <small class="mb-0">Ventas</small>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="d-flex justify-content-between flex-wrap">
                                    <h2 class="mb-2">$405,012,300</h2>
                                </div>
                                <p>Ganancias</p>
                            </div>
                            <div class="d-grid grid-cols-2 gap">
                                <a href="#" class="btn btn-primary d-flex justify-content-center align-items-center">
                                    <svg width="20" class="text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9303 7C16.9621 6.92913 16.977 6.85189 16.9739 6.77432H17C16.8882 4.10591 14.6849 2 12.0049 2C9.325 2 7.12172 4.10591 7.00989 6.77432C6.9967 6.84898 6.9967 6.92535 7.00989 7H6.93171C5.65022 7 4.28034 7.84597 3.88264 10.1201L3.1049 16.3147C2.46858 20.8629 4.81062 22 7.86853 22H16.1585C19.2075 22 21.4789 20.3535 20.9133 16.3147L20.1444 10.1201C19.676 7.90964 18.3503 7 17.0865 7H16.9303ZM15.4932 7C15.4654 6.92794 15.4506 6.85153 15.4497 6.77432C15.4497 4.85682 13.8899 3.30238 11.9657 3.30238C10.0416 3.30238 8.48184 4.85682 8.48184 6.77432C8.49502 6.84898 8.49502 6.92535 8.48184 7H15.4932ZM9.097 12.1486C8.60889 12.1486 8.21321 11.7413 8.21321 11.2389C8.21321 10.7366 8.60889 10.3293 9.097 10.3293C9.5851 10.3293 9.98079 10.7366 9.98079 11.2389C9.98079 11.7413 9.5851 12.1486 9.097 12.1486ZM14.002 11.2389C14.002 11.7413 14.3977 12.1486 14.8858 12.1486C15.3739 12.1486 15.7696 11.7413 15.7696 11.2389C15.7696 10.7366 15.3739 10.3293 14.8858 10.3293C14.3977 10.3293 14.002 10.7366 14.002 11.2389Z" fill="currentColor"></path>
                                    </svg>
                                    <span class="ms-2">Ver Paquetes</span>
                                </a>
                                <a href="#" class="btn btn-secondary d-flex justify-content-center align-items-center">
                                    <svg width="20" class="text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.1213 11.2331H16.8891C17.3088 11.2331 17.6386 10.8861 17.6386 10.4677C17.6386 10.0391 17.3088 9.70236 16.8891 9.70236H14.1213C13.7016 9.70236 13.3719 10.0391 13.3719 10.4677C13.3719 10.8861 13.7016 11.2331 14.1213 11.2331ZM20.1766 5.92749C20.7861 5.92749 21.1858 6.1418 21.5855 6.61123C21.9852 7.08067 22.0551 7.7542 21.9652 8.36549L21.0159 15.06C20.8361 16.3469 19.7569 17.2949 18.4879 17.2949H7.58639C6.25742 17.2949 5.15828 16.255 5.04837 14.908L4.12908 3.7834L2.62026 3.51807C2.22057 3.44664 1.94079 3.04864 2.01073 2.64043C2.08068 2.22305 2.47038 1.94649 2.88006 2.00874L5.2632 2.3751C5.60293 2.43735 5.85274 2.72207 5.88272 3.06905L6.07257 5.35499C6.10254 5.68257 6.36234 5.92749 6.68209 5.92749H20.1766ZM7.42631 18.9079C6.58697 18.9079 5.9075 19.6018 5.9075 20.459C5.9075 21.3061 6.58697 22 7.42631 22C8.25567 22 8.93514 21.3061 8.93514 20.459C8.93514 19.6018 8.25567 18.9079 7.42631 18.9079ZM18.6676 18.9079C17.8282 18.9079 17.1487 19.6018 17.1487 20.459C17.1487 21.3061 17.8282 22 18.6676 22C19.4969 22 20.1764 21.3061 20.1764 20.459C20.1764 19.6018 19.4969 18.9079 18.6676 18.9079Z" fill="currentColor"></path>
                                    </svg>
                                    <span class="ms-2 text-white">Ver Ordenes</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-12 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Estudiantes a Resit</h5>

                        </div>
                        <div class="card-body">
                            <div id="chartResit" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Cursos por Año</h5>
                        </div>
                        <div class="card-body">
                            <div id="chartCursosAnio" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>

               
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="header-title">
                                <h4 class="card-title">Accesos (Hoy)</h4>
                            </div>
                        </div>
                        <div class="card-body">
                        <ul class="list-inline">
                                <li class="d-flex mb-4 align-items-center">
                                    <a href="#" class="text-secondary p-2 bg-soft-secondary avatar-40">
                                        <!-- Android Icon -->
                                        <svg width="21" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.45 9l1.44-2.5c.26-.46.1-1.04-.35-1.3-.46-.26-1.04-.1-1.3.35L15.53 9H8.47L6.76 5.55a.96.96 0 00-1.3-.35c-.46.26-.61.84-.35 1.3L6.55 9h-2.8a1 1 0 00-1 1v9a1 1 0 001 1h14.5a1 1 0 001-1v-9a1 1 0 00-1-1h-2.8z"/>
                                        </svg>
                                    </a>
                                    <div class="ms-3 flex-grow-1">
                                        <h6>Android</h6>
                                        <small class="mb-0">Google Chrome</small>
                                    </div>
                                    <p>268</p>
                                </li>
                                <li class="d-flex mb-4 align-items-center">
                                    <a href="#" class="text-primary p-2 bg-soft-primary avatar-40">
                                        <!-- Apple Icon -->
                                        <svg width="21" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.5 2C15 2 13.9 3.1 13 4.4 12.2 5.6 12 7 12 7s1.5 0 2.5-1.5C15.7 4.6 16.5 4 17.5 4 19 4 20 5.4 20 7.5c0 2.4-1.8 5.2-4 7C14.5 15.5 13 14 12 12c0 0 1.5 0 2.5 1.5S17.5 17 17.5 17C15 17 14 15.5 14 13.5 14 12.4 14.6 11 16.5 10 18 9 20 9.4 20 7.5 20 4.6 18 2 16.5 2z"/>
                                        </svg>
                                    </a>
                                    <div class="ms-3 flex-grow-1">
                                        <h6>iPhone</h6>
                                        <small class="mb-0">Safari</small>
                                    </div>
                                    <p>4323</p>
                                </li>
                                <li class="d-flex mb-4 align-items-center">
                                    <a href="#" class="text-secondary p-2 bg-soft-secondary avatar-40">
                                        <!-- Windows Icon -->
                                        <svg width="21" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3 3v18l18-2.5V5.5L3 3zm2 2.06l12.5 1.75V11H5V5.06zm0 13.88V13h12.5v4.19L5 18.94z"/>
                                        </svg>
                                    </a>
                                    <div class="ms-3 flex-grow-1">
                                        <h6>Windows</h6>
                                        <small class="mb-0">Google Chrome</small>
                                    </div>
                                    <p>6565</p>
                                </li>
                                <li class="d-flex mb-4 align-items-center">
                                    <a href="#" class="text-primary p-2 bg-soft-primary avatar-40">
                                        <!-- Monitor Icon -->
                                        <svg width="21" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3 3h18v14H3V3zm0 16h8v2H7v2h10v-2h-4v-2h8v2a1 1 0 01-1 1H4a1 1 0 01-1-1v-2z"/>
                                        </svg>
                                    </a>
                                    <div class="ms-3 flex-grow-1">
                                        <h6>Mac OS</h6>
                                        <small class="mb-0">Safari</small>
                                    </div>
                                    <p>32423</p>
                                </li>
                                <li class="d-flex mb-4 align-items-center">
                                    <a href="#" class="text-secondary p-2 bg-soft-secondary avatar-40">
                                        <!-- Unknown Icon -->
                                        <svg width="21" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm0 18c-4.4 0-8-3.6-8-8s3.6-8 8-8 8 3.6 8 8-3.6 8-8 8zm0-4h-2v2h2v-2zm1.6-10.2c-.5-.3-1-.5-1.6-.5-1.5 0-2.6 1-2.6 2.5h2c0-.5.3-1 .6-1.2.4-.2.9-.2 1.3 0 .5.3.7.8.7 1.3 0 1-.6 1.5-1.1 2-.5.4-.9.7-.9 1.7h2c0-.8.4-1.3.8-1.7.6-.6 1.3-1.2 1.3-2.3-.1-1.1-.7-2-1.5-2.5z"/>
                                        </svg>
                                    </a>
                                    <div class="ms-3 flex-grow-1">
                                        <h6>Desconocido</h6>
                                        <small class="mb-0">Cualquiera</small>
                                    </div>
                                    <p>268</p>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>

                {{-- <div class="col-md-12 col-lg-12">
                    <div class="card overflow-hidden">
                        <div class="card-header d-flex justify-content-between flex-wrap">
                            <div class="header-title">
                                <h4 class="card-title mb-2">Progreso estudiantes</h4>
                            </div>
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheck1">
                                <label class="btn btn-outline-primary" for="btncheck1">Today</label>

                                <input type="checkbox" class="btn-check" id="btncheck2">
                                <label class="btn btn-outline-primary" for="btncheck2">This Week</label>

                                <input type="checkbox" class="btn-check" id="btncheck3">
                                <label class="btn btn-outline-primary" for="btncheck3">This Month</label>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive mt-4">
                                <table id="basic-table" class="table table-striped mb-0 transactions-table" role="grid">
                                    <thead>
                                        <tr>
                                            <th>USER</th>
                                            <th>ID</th>
                                            <th>VISITAS</th>
                                            <th>PROGRESO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img class="me-2" style="width: 24px; height: 24px; object-fit: cover; border-radius: 50%;" src="{{ asset('assets/images/avatar/man-1.png') }}" alt="profile">
                                                    <h6>USER 1</h6>

                                                </div>
                                            </td>
                                            <td>
                                                927937
                                            </td>
                                            <td>45,332</td>
                                            <td>
                                                <div class="d-flex align-items-center mb-2">
                                                    <h6>60%</h6>
                                                </div>
                                                <div class="progress w-100" style="height: 8px">
                                                    <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                <img class="me-2" style="width: 24px; height: 24px; object-fit: cover; border-radius: 50%;" src="{{ asset('assets/images/avatar/man-1.png') }}" alt="profile">

                                                <h6>USER 2</h6>

                                                </div>
                                            </td>
                                            <td>
                                                465547
                                            </td>
                                            <td>13,830</td>
                                            <td>
                                                <div class="d-flex align-items-center mb-2">
                                                    <h6>25%</h6>
                                                </div>
                                                <div class="progress w-100" style="height: 8px">
                                                    <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                <img class="me-2" style="width: 24px; height: 24px; object-fit: cover; border-radius: 50%;" src="{{ asset('assets/images/avatar/man-1.png') }}" alt="profile">

                                                <h6>USER 3</h6>

                                                </div>
                                            </td>
                                            <td>
                                                46554
                                            </td>
                                            <td>95,98</td>
                                            <td>
                                                <div class="d-flex align-items-center mb-2">
                                                    <h6>100%</h6>
                                                </div>
                                                <div class="progress bg-soft-secondary shadow-none w-100" style="height: 8px">
                                                    <div class="progress-bar bg-secondary" data-toggle="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                <img class="me-2" style="width: 24px; height: 24px; object-fit: cover; border-radius: 50%;" src="{{ asset('assets/images/avatar/man-1.png') }}" alt="profile">

                                                <h6>USER 4</h6>

                                                </div>
                                            </td>
                                            <td>
                                                45646
                                            </td>
                                            <td>58,732</td>
                                            <td>
                                                <div class="d-flex align-items-center mb-2">
                                                    <h6>100%</h6>
                                                </div>
                                                <div class="progress bg-soft-secondary shadow-none w-100" style="height: 8px">
                                                    <div class="progress-bar bg-secondary" data-toggle="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                <img class="me-2" style="width: 24px; height: 24px; object-fit: cover; border-radius: 50%;" src="{{ asset('assets/images/avatar/man-1.png') }}" alt="profile">

                                                    <h6>USER 5</h6>
                                                </div>
                                            </td>
                                            <td>
                                                243534
                                            </td>
                                            <td>95,332</td>
                                            <td>
                                                <div class="d-flex align-items-center mb-2">
                                                    <h6>75%</h6>
                                                </div>
                                                <div class="progress w-100" style="height: 8px">
                                                    <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

@endsection
@section('scripts')
<!-- AMCharts -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/pie.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
@endsection