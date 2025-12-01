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
                                        <span class="text-secondary">{{ __('Project') }} - </span> {{ $proyect->FOLIO_PROJECT }}
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
                    <div class="mini-dashboard">
                        <div class="dashboard-header">
                            <h5><i class="fas fa-chart-pie"></i> {{ __('Course Overview') }}</h5>
                            <p>{{ __('Executive summary of the project') }}</p>
                        </div>

                        <div class="mini-grid">
                            <div class="mini-card card-primary">
                                <div class="card-header">
                                    <div class="card-icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div>
                                        <div class="card-title">{{ __('Contact') }}</div>
                                        <div class="card-value">{{ $proyect->CONTACT_NAME_PROJEC ?? '' }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="mini-card card-success">
                                <div class="card-header">
                                    <div class="card-icon">
                                        <i class="fas fa-hashtag"></i>
                                    </div>
                                    <div>
                                        <div class="card-title">{{ __('Folio') }}</div>
                                        <div class="card-value large">{{ $proyect->FOLIO_PROJECT ?? '' }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="mini-card card-info">
                                <div class="card-header">
                                    <div class="card-icon">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                    <div>
                                        <div class="card-title">{{ __('Course Type') }}</div>
                                        <div class="card-value">
                                            @if($proyect->COURSE_TYPE_PROJECT == 1)
                                                {{ __('Open') }}
                                            @elseif($proyect->COURSE_TYPE_PROJECT == 2)
                                                {{ __('Closed') }}
                                            @else
                                                {{ __('N/A') }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mini-card card-purple">
                                <div class="card-header">
                                    <div class="card-icon">
                                        <i class="fas fa-map-marker"></i>
                                    </div>
                                    <div>
                                        <div class="card-title">{{ __('Location') }}</div>
                                        <div class="card-value">{{ $proyect->LOCATION_PROJECT ?? '' }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="mini-card card-danger card-wide">
                                <div class="card-header">
                                    <div class="card-icon">
                                        <i class="fas fa-book"></i>
                                    </div>
                                    <div class="card-title">{{ __('Course Name') }}</div>
                                </div>
                                
                                    <div>
                                        <div style="font-size: 0.625rem; color: #6b7280; margin-bottom: 0.25rem;">
                                            <i class="fas fa-flag"></i> ES
                                        </div>
                                        <div class="card-value small">{{ $NOMBRE_PROYECTO ?? '' }}</div>
                                    </div>
                               
                            </div>

                            <div class="mini-card card-indigo">
                                <div class="card-header">
                                    <div class="card-icon">
                                        <i class="fas fa-certificate"></i>
                                    </div>
                                    <div>
                                        <div class="card-title">{{ __('Center') }}</div>
                                        <div class="card-value">{{ $proyect->CENTER_NUMBER_PROJECT ?? '' }}</div>
                                    </div>
                                </div>
                                <div class="card-subtitle">{{ $proyect->CERTIFICATION_CENTER_PROJECT ?? '' }}</div>
                            </div>

                            <div class="mini-card card-pink">
                                <div class="card-header">
                                    <div class="card-icon">
                                        <i class="fas fa-language"></i>
                                    </div>
                                    <div>
                                        <div class="card-title">{{ __('Language') }}</div>
                                        <div class="card-value">{{ $idiomaProject->NOMBRE_IDIOMA ?? '' }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="mini-card card-info card-wide-3">
                                <div class="card-header">
                                    <div class="card-icon">
                                        <i class="fas fa-layer-group"></i>
                                    </div>
                                    <div class="card-title">{{ __('Accrediting Entity, Levels & BOP Types') }}</div>
                                </div>

                                <div class="dual-column">
                                    <div>
                                        <h6 class="text-uppercase text-muted mb-1">{{ __('Accrediting Entity') }}</h6>
                                        <div class="mini-badge badge-info">{{ $nombreEnte }}</div>
                                    </div>
                                    <div>
                                        <h6 class="text-uppercase text-muted mb-1">{{ __('Accreditation Levels') }}</h6>
                                        @if($nivelesAcreditacion->isNotEmpty())
                                            <ul class="mini-list">
                                                @foreach($nivelesAcreditacion as $nivel)
                                                    <li><i class="fas fa-check"></i> {{ $nivel }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <h6 class="mb-0 text-muted">{{ __('N/A') }}</h6>
                                        @endif
                                    </div>
                                    <div>
                                        <h6 class="text-uppercase text-muted mb-1">{{ __('BOP Types') }}</h6>
                                        @if($tiposBop->isNotEmpty())
                                            <ul class="mb-0">
                                                @foreach($tiposBop as $bop)
                                                    <li><div class="mini-badge badge-warning">{{ $bop }}</div></li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <h6 class="mb-0 text-muted">{{ __('N/A') }}</h6>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="mini-card card-danger card-large">
                                <div class="card-header">
                                    <div class="card-icon">
                                        <i class="fas fa-building"></i>
                                    </div>
                                    <div class="card-title">{{ __('Participating Companies') }}</div>
                                </div>
                                {{-- @if(!empty($proyect->COURSE_NAME_ES_PROJECT))
                                    @foreach($proyect->COURSE_NAME_ES_PROJECT as $empresa)
                                        <div class="company-mini">
                                            <div class="company-name">{{ $empresa['NAME_PROJECT'] ?? __('No name') }}</div>
                                            <div class="company-details">{{ $empresa['EMAIL_PROJECT'] ?? '' }} • {{ __('Students:') }} {{ $empresa['STUDENT_COUNT_PROJECT'] ?? 0 }}</div>
                                        </div>
                                    @endforeach
                                @else
                                    <h6 class="mb-0 text-muted">{{ __('N/A') }}</h6>
                                @endif --}}
                            </div>

                            <div class="mini-card card-success card-wide">
                                <div class="card-header">
                                    <div class="card-icon">
                                        <i class="fas fa-calendar"></i>
                                    </div>
                                    <div class="card-title">{{ __('Schedule') }}</div>
                                </div>
                                <div class="dual-column">
                                    <div>
                                        <div class="date-mini">
                                            <i class="fas fa-play"></i>
                                            <div>
                                                <div style="font-weight: 600;">{{ $proyect->COURSE_START_DATE_PROJECT ?? '' }}</div>
                                                <div style="font-size: 0.625rem; color: #6b7280;">{{ __('Course start') }}</div>
                                            </div>
                                        </div>
                                        <div class="date-mini">
                                            <i class="fas fa-stop"></i>
                                            <div>
                                                <div style="font-weight: 600;">{{ $proyect->COURSE_END_DATE_PROJECT ?? '' }}</div>
                                                <div style="font-size: 0.625rem; color: #6b7280;">{{ __('Course end') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="date-mini">
                                            <i class="fas fa-user-graduate"></i>
                                            <div>
                                                <div style="font-weight: 600;">{{ $proyect->MEMBERSHIP_START_PROJECT ?? '' }}</div>
                                                <div style="font-size: 0.625rem; color: #6b7280;">{{ __('Membership start') }}</div>
                                            </div>
                                        </div>
                                        <div class="date-mini">
                                            <i class="fas fa-user-times"></i>
                                            <div>
                                                <div style="font-weight: 600;">{{ $proyect->MEMBERSHIP_END_PROJECT ?? '' }}</div>
                                                <div style="font-size: 0.625rem; color: #6b7280;">{{ __('Membership end') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mini-card card-success card-wide">
                                <div class="card-header">
                                    <div class="card-icon">
                                        <i class="fas fa-clipboard-check"></i>
                                    </div>
                                    <div class="card-title">{{ __('Exams') }}</div>
                                </div>

                                <div class="dual-column">
                                    <div>
                                        <div style="font-size: 0.625rem; color: #6b7280; margin-bottom: 0.25rem;">
                                            <i class="fas fa-book"></i> {{ __('Theoretical') }}
                                        </div>
                                        <div class="card-value small">{{ $proyect->EXAM_DATE_PROJECT ?? '' }}</div>
                                        <div class="card-subtitle">{{ $proyect->EXAM_TIME_PROJECT ?? '' }}</div>
                                    </div>
                                    <div>
                                        <div style="font-size: 0.625rem; color: #6b7280; margin-bottom: 0.25rem;">
                                            <i class="fas fa-tools"></i> {{ __('Practical') }}
                                        </div>
                                        <div class="card-value small">{{ $proyect->PRACTICAL_EXAM_DATE_PROJECT ?? '' }}</div>
                                        <div class="card-subtitle">{{ $proyect->PRACTICAL_EXAM_TIME_PROJECT ?? '' }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="mini-card card-warning card-large">
                                <div class="card-header">
                                    <div class="card-icon">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                    </div>
                                    <div class="card-title">{{ __('Assigned Instructor') }}</div>
                                </div>
                                <div class="contact-mini">
                                    <div class="contact-icon-mini">
                                        <i class="fas fa-id-badge"></i>
                                    </div>
                                    <div style="font-size: 0.75rem; font-weight: 600;">{{ $NOMBRE_INSTRUCTOR ?? 'sdf' }}</div>
                                </div>
                                <div class="contact-mini">
                                    <div class="contact-icon-mini">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div style="font-size: 0.75rem;">{{ $proyect->INSTRUCTOR_EMAIL_PROJECT ?? '' }}</div>
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
                            <div class="header-title d-flex justify-content-end align-items-center w-100 mb-4">
                                <button class="btn btn-warning" style="margin-right: 1rem" onclick="editarCandidatos()">
                                    Editar tabla
                                </button>
                                <button class="btn btn-success" onclick="window.location.href='/exportCandidateExcel/'+ID_PROJECT">
                                    📊 Exportar Excel de Candidatos
                                </button>
                            </div>
                            <div>
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
                            <h5 class="card-title mb-0">{{ __('Curso') }}</h4>
                            <div class="header-title d-flex justify-content-end align-items-center w-100 mb-4">
                                     <button class="btn btn-warning" style="margin-right: 1rem" onclick="editarCurso()">
                                    Editar tabla
                                </button>
                                <button class="btn btn-success" onclick="window.location.href='/exportProjectExcel/'+ID_PROJECT">
                                    📊 Exportar Excel del Curso
                                </button>
                            </div>
                             <div id="messages"></div>
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

<div class="modal fade" id="editarCandidatosModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-users me-2"></i>Tabla de Candidatos</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="sticky-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex gap-3">
                            <button class="btn btn-success btn-modern" onclick="addNewRow()">
                                <i class="fas fa-plus me-2"></i>Nuevo Candidato
                            </button>
                            <div class="search-container">
                                <div class="search-wrapper">
                                    <i class="fas fa-search search-icon"></i>
                                    <input type="text" id="searchInput" class="search-input" placeholder="Buscar candidatos..." onkeyup="filterTable()">
                                </div>
                            </div>
                        </div>
                        <div class="stats-container">
                            <div class="status-card">
                                <i class="fas fa-users me-2"></i>
                                <span id="rowCount">0 candidatos</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-container">
                    <form id="candidateForm">
                         {!! csrf_field() !!}  
                        <table class="table table-modern" id="edit-candidate-table">
                            <thead>
                                <tr>
                                    <th width="50px" class="text-center">#</th>
                                    <th width="140px">Empresa</th>
                                    <th width="80px">CR</th>
                                    <th width="130px">Apellido</th>
                                    <th width="130px">Nombre</th>
                                    <th width="120px">Segundo Nombre</th>
                                    <th width="120px">Fecha Nac.</th>
                                    <th width="130px">ID</th>
                                    <th width="130px">Membresia</th>
                                    <th width="160px">Email</th>
                                    <th width="130px">Contraseña</th>
                                    <th width="130px">Membresia activa</th>
                                    <th width="130px">Asistencia al curso</th>
                                    <th width="100px" class="table-row-actions text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
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
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <div class="footer-actions">
                    <button class="btn btn-primary btn-modern btn-save" id="candidatebtnModal">
                        <i class="fas fa-save me-2"></i>Guardar Cambios
                    </button>
                    <button type="button" class="btn btn-secondary btn-modern" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="notasModal" tabindex="-1" aria-labelledby="notasModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="notasModalLabel">Lista de Notas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Botón para crear nueva nota -->
                <div class="mb-3">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearNotaModal">
                        Crear Nueva Nota
                    </button>
                </div>

                <!-- Tabla de notas -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Contenido</th>
                                <th>Fecha de Creación</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                <tr>
                                    <td colspan="3" class="text-center">No hay notas disponibles</td>
                                </tr>
                           
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="crearNotaModal" tabindex="-1" aria-labelledby="crearNotaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearNotaModalLabel">Crear Nueva Nota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           
              
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="contenido" class="form-label">Contenido de la Nota</label>
                        <textarea class="form-control" id="contenido" name="contenido" rows="5" placeholder="Escribe tu nota aquí..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Nota</button>
                </div>
           
        </div>
    </div>
</div>

<div class="modal fade" id="editarCursoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-users me-2"></i>Tabla de Candidatos</h5>
                 
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <div style="padding: 1vw;">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#notasModal" style="margin-bottom: 1vw;">
                    Ver Notas
                </button>
                    <form id="coursesForm">
                         {!! csrf_field() !!}  
                        <table class="table table-modern" id="edit-course-table">
                            <thead>
                                <tr>
                                    <th width="50px" class="text-center">#</th>
                                    <th class="col-180" width="140px">Estudiante</th>
                                    <th  width="180px">Nivel</th>
                                    <th  width="180px">BOP</th>
                                    <th  width="180px">Idioma</th>
                                    <th class="col-180" width="180px">Práctico</th>
                                    <th class="col-180" width="180px">Equipos</th>
                                    <th class="col-180" width="180px">P&P</th>
                                    <th class="col-180" width="180px">Estado</th>
                                    <th  width="180px">Resit</th>
                                    <th  width="180px">No. Intentos permitidos</th>
                                    <th  width="180px">Periodo</th>
                                    <th  width="180px">Dias restantes</th>
                                    <th  width="180px">Fecha límite</th>
                                    <th class="col-180" width="180px">Resit módulo</th>
                                    <th  width="180px">Resit inmediato</th>
                                    <th class="col-180" width="180px">Resit inmediato fecha</th>
                                    <th class="col-180" width="180px">Resit inmediato puntaje</th>
                                    <th class="col-180" width="180px">Resit inmediato estado</th>
                                    <th  width="180px">Resit programado</th>
                                    <th  width="180px">Requiere entrenamiento adicional</th>
                                    <th  width="180px">Folio de proyecto para entrenamiento</th>
                                    <th class="col-180" width="180px">Resit programado fecha</th>
                                    <th class="col-180" width="180px">Resit programado puntaje</th>
                                    <th class="col-180" width="180px">Resit programado estado</th>
                                    <th class="col-180" width="180px">Final Status</th>
                                    <th  width="180px">Certificado</th>
                                    <th class="col-180" width="180px">Expiración</th>
                                    <th class="col-250" width="180px">Correo</th>
                                    <th width="100px" class="table-row-actions text-center">Acciones</th>
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
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <div class="footer-actions">
                    <button class="btn btn-primary btn-modern btn-save" id="cursobtnModal">
                        <i class="fas fa-save me-2"></i>Guardar Cambios
                    </button>
                    <button type="button" class="btn btn-secondary btn-modern" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if($errors->has('contenido'))
            var crearNotaModal = new bootstrap.Modal(document.getElementById('crearNotaModal'));
            crearNotaModal.show();
        @endif

        @if(session('success'))
            alert('{{ session('success') }}');
        @endif
    });
</script>

<script>
    const ID_PROJECT = @json($ID_PROJECT);
    const ID_COURSE = 0;
</script>

@endsection
@php
$css_identifier = 'detailsProject';
@endphp