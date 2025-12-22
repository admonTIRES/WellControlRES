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
        <div class="row mb-4">
            <style>
                .flatpickr-input-custom, .form-select-custom {
                    background-color: #fff !important;
                    border: 1px solid #ced4da;
                    border-radius: 8px; 
                    padding: 0.375rem 0.75rem;
                    height: 38px; 
                    width: 100%;
                    cursor: pointer;
                    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
                }
                
                .flatpickr-input-custom:focus, .form-select-custom:focus {
                    border-color: #86b7fe;
                    outline: 0;
                    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
                }
            </style>

            <div class="col-md-3">
                <label for="periodType" class="form-label">Tipo de Período:</label>
                <select id="periodType" class="form-select form-select-custom" onchange="toggleDateFilters()">
                    <option value="year">Año</option>
                    <option value="month" selected>Mes</option>
                    <option value="day">Curso</option>
                </select>
            </div>

            <div class="col-md-4" id="yearRangeFilter" style="display:none;">
                <label class="form-label">Rango de Años:</label>
                <div class="row">
                    <div class="col-6">
                        <select id="startYear" class="form-select form-select-custom">
                            </select>
                    </div>
                    <div class="col-6">
                        <select id="endYear" class="form-select form-select-custom">
                            </select>
                    </div>
                </div>
            </div>

            <div class="col-md-4" id="monthRangeFilter" style="display:none;">
                <label class="form-label">Rango de Meses:</label>
                <div class="row">
                    <div class="col-6">
                        <input type="text" id="startMonth" class="form-control flatpickr-input-custom" placeholder="Mes Inicio">
                    </div>
                    <div class="col-6">
                        <input type="text" id="endMonth" class="form-control flatpickr-input-custom" placeholder="Mes Fin">
                    </div>
                </div>
            </div>

            <div class="col-md-4" id="dayRangeFilter" style="display:none;">
                <label class="form-label">Rango de Fechas:</label>
                <div class="row">
                    <div class="col-6">
                        <input type="text" id="startDate" class="form-control flatpickr-input-custom" placeholder="Fecha Inicio">
                    </div>
                    <div class="col-6">
                        <input type="text" id="endDate" class="form-control flatpickr-input-custom" placeholder="Fecha Fin">
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <label for="chartType" class="form-label">Tipo de Gráfica:</label>
                <select id="chartType" class="form-select">
                    <option value="column">Columnas Agrupadas</option>
                    <option value="line">Líneas</option>
                </select>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="button" class="btn btn-primary w-100" onclick="actualizarDatos()">
                    <i class="fas fa-chart-bar"></i> Generar
                </button>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="p-2 rounded bg-soft-warning">
                            <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V5H19V19ZM7 12H9V17H7V12ZM7 7H9V9H7V7Z" fill="currentColor"/>
                            </svg>
                        </div>
                        <div class="ms-3">
                            <h4 class="mb-1" id="totalProyectos">0</h4>
                            <small class="mb-0">Total Proyectos</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="p-2 rounded bg-soft-primary">
                            <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 5.5V7H9V5.5L3 7V9L9 10.5V12L3 13.5V15.5L9 14V16L3 17.5V19.5L9 18V22H15V18L21 19.5V17.5L15 16V14L21 15.5V13.5L15 12V10.5L21 9Z" fill="currentColor"/>
                            </svg>
                        </div>
                        <div class="ms-3">
                            <h4 class="mb-1" id="totalEstudiantes">0</h4>
                            <small class="mb-0">Total Estudiantes</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="p-2 rounded bg-soft-primary">
                            <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 5.5V7H9V5.5L3 7V9L9 10.5V12L3 13.5V15.5L9 14V16L3 17.5V19.5L9 18V22H15V18L21 19.5V17.5L15 16V14L21 15.5V13.5L15 12V10.5L21 9Z" fill="currentColor"/>
                            </svg>
                        </div>
                        <div class="ms-3">
                            <h4 class="mb-1" id="totalDesercion">0</h4>
                            <small class="mb-0">Total deserción</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="p-2 rounded bg-soft-success">
                            <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM9.29 16.29L5.7 12.7C5.31 12.31 5.31 11.68 5.7 11.29C6.09 10.9 6.72 10.9 7.11 11.29L10 14.17L16.88 7.29C17.27 6.9 17.9 6.9 18.29 7.29C18.68 7.68 18.68 8.31 18.29 8.7L10.7 16.29C10.32 16.68 9.68 16.68 9.29 16.29Z" fill="currentColor"/>
                            </svg>
                        </div>
                        <div class="ms-3">
                            <h4 class="mb-1" id="estudiantesAprobados">0</h4>
                            <small class="mb-0">Estudiantes Aprobados</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Proyectos por Acreditación</h5>
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
            </div>
        </div>
    <div class="col-12">
        <div class="card-header">
            <h5 class="card-title">Proyectos por cada ente acreditador</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div id="chartdiv" style="width: 100%; height: 600px;"></div>
                </div>
            </div>
        </div>
    </div>
      <p class="mb-4">{{ __('Estudiantes') }}</p>
    <div class="row">

         <div class="col-md-12">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Estatus de estudiantes al final del curso</h5>
                        </div>
                        <div class="card-body">
                            <div id="chartEstadoCurso" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Estatus de estudiantes aprobados</h5>
                        </div>
                        <div class="card-body">
                            <div id="chartEstudiantesResit" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Estatus de estudiantes reprobados</h5>
                        </div>
                        <div class="card-body">
                            <div id="chartTiposResit" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
        

        <div class="card mt-4">
            <div class="card-header text-white">
                <h5 class="mb-0"><i class="fas fa-chart-bar"></i>Estudiantes por cada ente acreditador</h5>
            </div>
            <div class="card-body">
               <div class="row mb-4">
                    <div class="col-12">
                        <div class="alert alert-success text-center" id="totalsContainerStacked" style="margin-bottom: 0;">
                            <h4 class="mb-0"><strong>Total General de Candidatos:</strong> <span id="totalGeneralStacked">-</span></h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div id="chartdivStacked" style="width: 100%; height: 600px;"></div>
                    </div>
                </div>
            </div>
        </div>
<div id="chartdivEstudiantesAprob"></div>
    </div>
</div>






<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

@endsection
@section('scripts')
 <script src="{{ asset('js/Admin/Dashboard/dashboard.js') }}?v=1.48"></script>

<!-- AMCharts -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/pie.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
@endsection