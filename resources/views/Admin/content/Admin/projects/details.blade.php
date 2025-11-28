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
            <style>

                .mini-dashboard {
                    max-width: 100%;
                }

                .dashboard-header {
                    text-align: center;
                    margin-bottom: 1.5rem;
                }

                .dashboard-header h5 {
                    font-size: 1.25rem;
                    font-weight: 700;
                    color: #1f2937;
                    margin-bottom: 0.25rem;
                }

                .dashboard-header p {
                    font-size: 0.875rem;
                    color: #6b7280;
                }

                .mini-grid {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                    gap: 1rem;
                    grid-auto-rows: auto;
                }

                .mini-card {
                    background: white;
                    border-radius: 12px;
                    padding: 1rem;
                    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
                    border: 1px solid #e5e7eb;
                    transition: all 0.2s ease;
                    position: relative;
                    overflow: hidden;
                }

                .mini-card::before {
                    content: '';
                    position: absolute;
                    top: 0;
                    left: 0;
                    right: 0;
                    height: 3px;
                    background: var(--accent-color, #4f46e5);
                    border-radius: 12px 12px 0 0;
                }

                .mini-card:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                }

                /* Tamaños específicos */
                .card-wide { grid-column: span 2; }
                .card-wide-3 { grid-column: span 4; }

                .card-large { grid-column: span 2; }

                /* Colores de acento */
                .card-primary { --accent-color: #A4D65E; }
                .card-success { --accent-color: #236192; }
                .card-warning { --accent-color: #007DBA; }
                .card-danger { --accent-color: #FF585D; }
                .card-info { --accent-color: #A4D65E; }
                .card-purple { --accent-color: #236192; }
                .card-pink { --accent-color: #FF585D; }
                .card-indigo { --accent-color: #007DBA; }

                .card-header {
                    display: flex;
                    align-items: center;
                    margin-bottom: 0.75rem;
                }

                .card-icon {
                    width: 32px;
                    height: 32px;
                    border-radius: 8px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin-right: 0.75rem;
                    font-size: 0.875rem;
                    color: white;
                    background: var(--accent-color, #4f46e5);
                    flex-shrink: 0;
                }

                .card-title {
                    font-size: 0.75rem;
                    font-weight: 500;
                    color: #6b7280;
                    text-transform: uppercase;
                    letter-spacing: 0.05em;
                    margin-bottom: 0.25rem;
                }

                .card-value {
                    font-size: 1.125rem;
                    font-weight: 700;
                    color: #1f2937;
                    line-height: 1.2;
                }

                .card-value.large {
                    
                    font-weight: 800;
                }

                .card-value.small {
                    font-size: 1rem;
                    font-weight: 600;
                }

                .card-subtitle {
                    font-size: 0.75rem;
                    color: #6b7280;
                    margin-top: 0.25rem;
                }

                .mini-list {
                    list-style: none;
                    padding: 0;
                    margin-top: 0.5rem;
                }

                .mini-list li {
                    padding: 0.25rem 0;
                    font-size: 0.75rem;
                    color: #4b5563;
                    display: flex;
                    align-items: center;
                }

                .mini-list li i {
                    margin-right: 0.375rem;
                    color: var(--accent-color, #4f46e5);
                    font-size: 0.625rem;
                }

                .mini-badge {
                    display: inline-block;
                    padding: 0.125rem 0.5rem;
                    border-radius: 12px;
                    font-size: 0.625rem;
                    font-weight: 500;
                    margin: 0.125rem 0.125rem 0.125rem 0;
                }

                .badge-primary { background-color: #dbeafe; color: #1d4ed8; }
                .badge-success { background-color: #d1fae5; color: #065f46; }
                .badge-warning { background-color: #fef3c7; color: #92400e; }
                .badge-info { background-color: #cffafe; color: #0c4a6e; }

                .company-mini {
                    background: #f8fafc;
                    border-radius: 6px;
                    padding: 0.5rem;
                    margin-bottom: 0.375rem;
                    font-size: 0.75rem;
                }

                .company-mini:last-child {
                    margin-bottom: 0;
                }

                .company-name {
                    font-weight: 600;
                    color: #1f2937;
                    margin-bottom: 0.125rem;
                }

                .company-details {
                    font-size: 0.625rem;
                    color: #6b7280;
                }

                .date-mini {
                    display: flex;
                    align-items: center;
                    padding: 0.25rem;
                    background: #f8fafc;
                    border-radius: 6px;
                    margin-bottom: 0.25rem;
                    font-size: 0.75rem;
                }

                .date-mini i {
                    margin-right: 0.375rem;
                    color: var(--accent-color, #4f46e5);
                    font-size: 0.625rem;
                }

                .stats-mini {
                    display: flex;
                    justify-content: space-around;
                    margin-top: 0.5rem;
                    padding-top: 0.5rem;
                    border-top: 1px solid #f3f4f6;
                }

                .stat-mini {
                    text-align: center;
                }

                .stat-number {
                    font-size: 1rem;
                    font-weight: 700;
                    color: var(--accent-color, #4f46e5);
                    line-height: 1;
                }

                .stat-label {
                    font-size: 0.625rem;
                    color: #6b7280;
                    margin-top: 0.125rem;
                }

                .contact-mini {
                    display: flex;
                    align-items: center;
                    gap: 0.5rem;
                    margin-top: 0.5rem;
                }

                .contact-icon-mini {
                    width: 24px;
                    height: 24px;
                    border-radius: 6px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    background: var(--accent-color, #4f46e5);
                    color: white;
                    font-size: 0.625rem;
                }

                .dual-column {
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    gap: 0.75rem;
                }

                @media (max-width: 768px) {
                    .mini-grid {
                        grid-template-columns: 1fr;
                    }
                    
                    .card-wide,
                    .card-large {
                        grid-column: span 1;
                    }

                    .dual-column {
                        grid-template-columns: 1fr;
                        gap: 0.5rem;
                    }
                }
            </style>
            <div class="col-sm-12">
                <div class="card">
                    <div class="mini-dashboard">
                        <div class="dashboard-header">
                            <h5><i class="fas fa-chart-pie"></i> {{ __('Course Overview') }}</h5>
                            <p>{{ __('Executive summary of the project') }}</p>
                        </div>

                        <div class="mini-grid">
                            <!-- Contact -->
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

                            <!-- Folio -->
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

                            <!-- Course Type -->
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

                            <!-- Location -->
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

                            <!-- Course Name -->
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

                            <!-- Center -->
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

                            <!-- Language -->
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

                            <!-- Levels & BOP -->
                            <div class="mini-card card-info card-wide-3">
                                <div class="card-header">
                                    <div class="card-icon">
                                        <i class="fas fa-layer-group"></i>
                                    </div>
                                    <div class="card-title">{{ __('Accrediting Entity, Levels & BOP Types') }}</div>
                                </div>

                                <div class="dual-column">
                                    <!-- ENTE ACREDITADOR -->
                                    <div>
                                        <h6 class="text-uppercase text-muted mb-1">{{ __('Accrediting Entity') }}</h6>
                                        <div class="mini-badge badge-info">{{ $nombreEnte }}</div>
                                    </div>

                                    <!-- NIVELES DE ACREDITACIÓN -->
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

                                    <!-- TIPOS DE BOP -->
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


                            <!-- Companies -->
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

                            <!-- Schedule -->
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

                            <!-- Exams -->
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

                            <!-- Instructor -->
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
                                    <th width="130px">Activo</th>
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
<style>
        :root {
            --color-primary: #A4D65E;
            --color-secondary: #FF585D;
            --color-success: #8BC34A;
            --color-danger: #e11d48;
            --color-warning: #f59e0b;
            --color-light: #f8fafc;
            --color-dark: #1e293b;
            --color-muted: #64748b;
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --border-radius: 12px;
            --border-radius-sm: 8px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .col-180 { width: 180px; min-width: 180px; max-width: 180px; }
        .col-250 { width: 250px; min-width: 250px; max-width: 250px; }

        .modal-fullscreen {
            max-width: 98%;
            margin: 1% auto;
            height: 96vh;
        }

        .modal-content {
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-xl);
            border: none;
            overflow: hidden;
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        }

        .modal-header {
            background: var(--color-secondary);
            color: white;
            border-bottom: none;
            padding: 1.5rem 2rem;
            position: relative;
            overflow: hidden;
        }

        .modal-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transform: scale(3);
        }

        .modal-title {
            font-weight: 700;
            font-size: 1.5rem;
            position: relative;
            z-index: 1;
            color: #ffffff;
        }

        .btn-close-white {
            position: relative;
            z-index: 1;
            opacity: 0.8;
            transition: var(--transition);
        }

        .btn-close-white:hover {
            opacity: 1;
            transform: scale(1.1);
        }

        .modal-body {
            padding: 0;
            background: var(--color-light);
        }

        .sticky-header {
            position: sticky;
            top: 0;
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            z-index: 20;
            padding: 1.5rem 2rem;
            margin-bottom: 0;
            border-bottom: 2px solid #e2e8f0;
            backdrop-filter: blur(10px);
        }

        .search-container {
            min-width: 350px;
        }

        .search-wrapper {
            position: relative;
            background: white;
            border-radius: var(--border-radius-sm);
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            border: 2px solid transparent;
        }

        .search-wrapper:focus-within {
            box-shadow: var(--shadow-md);
            border-color: var(--color-primary);
            transform: translateY(-2px);
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--color-muted);
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .search-wrapper:focus-within .search-icon {
            color: var(--color-primary);
        }

        .search-input {
            border: none;
            outline: none;
            padding: 12px 15px 12px 45px;
            width: 100%;
            border-radius: var(--border-radius-sm);
            font-size: 0.95rem;
            background: transparent;
            color: var(--color-dark);
        }

        .search-input::placeholder {
            color: var(--color-muted);
            font-weight: 400;
        }

        .stats-container {
            display: flex;
            gap: 1rem;
        }

        .status-card {
            background: var(--color-success);
            color: white;
            padding: 12px 20px;
            border-radius: var(--border-radius-sm);
            box-shadow: var(--shadow-sm);
            font-weight: 600;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            transition: var(--transition);
        }

        .status-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn-modern {
            border: none;
            padding: 12px 24px;
            border-radius: var(--border-radius-sm);
            font-weight: 600;
            font-size: 0.95rem;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            cursor: pointer;
            box-shadow: var(--shadow-sm);
        }

        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn-modern:active {
            transform: translateY(0);
            box-shadow: var(--shadow-sm);
        }

        .btn-success.btn-modern {
            background: var(--color-success);
            color: white;
        }

        .btn-primary.btn-modern {
            background: var(--color-primary);
            color: white;
        }

        .btn-secondary.btn-modern {
            background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
            color: white;
        }

        .btn-warning.btn-modern {
            background: var(--color-warning);
            color: white;
        }

        .btn-danger.btn-modern {
            background: var(--color-danger);
            color: white;
        }

        .btn-save {
            position: relative;
            overflow: hidden;
        }

        .btn-save::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-save:hover::before {
            width: 300px;
            height: 300px;
        }

        .table-container {
            overflow-x: auto;
            max-height: 65vh;
            margin: 0 2rem;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-md);
            background: white;
        }

        .table-modern {
            min-width: 1800px;
            font-size: 0.9rem;
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table-modern thead tr {
            background: var(--color-secondary);
        }

        .table-modern th {
            position: sticky;
            top: 0;
            z-index: 10;
            font-weight: 700;
            color: white;
            padding: 16px 12px;
            text-align: center;
            vertical-align: middle;
            border: none;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            /* white-space: nowrap; */

            white-space: normal;   /* Permite salto de línea */
            word-wrap: break-word; /* Soporta cortar palabras largas */
            overflow-wrap: break-word; /* Recomendado en navegadores modernos */
        }

        .table-modern th:first-child {
            border-top-left-radius: var(--border-radius);
        }

        .table-modern th:last-child {
            border-top-right-radius: var(--border-radius);
        }

        .table-modern tbody tr {
            background: white;
            transition: var(--transition);
        }

        .table-modern tbody tr:hover {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            transform: translateX(4px);
        }

        .table-modern tbody tr:nth-child(even) {
            background: #fafbfc;
        }

        .table-modern tbody tr:nth-child(even):hover {
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
        }

        .table-modern td {
            padding: 8px;
            vertical-align: top;
            border: none;
            border-bottom: 1px solid #e2e8f0;
        }

        .table-input {
            border: 2px solid #e2e8f0;
            border-radius: var(--border-radius-sm);
            width: 100%;
            min-height: 40px;
            padding: 8px 12px;
            font-size: 0.9rem;
            resize: vertical;
            transition: var(--transition);
            box-sizing: border-box;
            background: white;
            color: var(--color-dark);
        }

        .table-input:focus {
            outline: none;
            border-color: var(--color-primary);
            box-shadow: 0 0 0 3px rgba(164, 214, 94, 0.1);
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            transform: translateY(-1px);
        }

        .table-input.textarea {
            min-height: 65px;
            min-width: 200px;
            line-height: 1.4;
            font-family: inherit;
        }

        .table-input.email {
            min-height: 65px;
            min-width:300px;
            line-height: 1.4;
            font-family: inherit;
        }

        .membership-select {
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 12px center;
            background-repeat: no-repeat;
            background-size: 16px;
            padding-right: 40px;
        }

        .membership-select:focus {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23A4D65E' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
        }

        .status-switch-container {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 4px;
        }

        .status-switch {
            position: relative;
            display: inline-block;
            width: 48px;
            height: 24px;
            cursor: pointer;
        }

        .status-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .status-slider {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #e5e7eb 0%, #d1d5db 100%);
            border-radius: 24px;
            transition: var(--transition);
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .status-slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            top: 3px;
            background: white;
            border-radius: 50%;
            transition: var(--transition);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .status-switch input:checked + .status-slider {
            background: linear-gradient(135deg, var(--color-success) 0%, var(--color-primary) 100%);
        }

        .status-switch input:checked + .status-slider:before {
            transform: translateX(24px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .status-switch:hover .status-slider {
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 0 0 3px rgba(164, 214, 94, 0.1);
        }

        .status-label {
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: var(--transition);
            min-width: 55px;
        }

        .status-label.active {
            color: var(--color-success);
        }

        .status-label.inactive {
            color: var(--color-muted);
        }

        .table-row-actions {
            position: sticky;
            right: 0;
            background: white;
            z-index: 5;
            box-shadow: -4px 0 8px rgba(0, 0, 0, 0.08);
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: center;
            align-items: center;
        }

        .btn-action {
            padding: 8px 12px;
            font-size: 0.8rem;
            border: none;
            border-radius: var(--border-radius-sm);
            transition: var(--transition);
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            height: 36px;
        }

        .btn-danger.btn-action {
            background: var(--color-danger);
            color: white;
        }

        .btn-info.btn-action {
            background: var(--color-primary);
            color: white;
        }

        .btn-warning.btn-action {
            background: var(--color-warning);
            color: white;
        }

        .btn-action:hover {
            transform: scale(1.1) translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn-action:active {
            transform: scale(0.95);
        }

        .loading-container {
            padding: 60px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 4px solid #e2e8f0;
            border-top: 4px solid var(--color-primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        .loading-text {
            color: var(--color-muted);
            font-size: 1rem;
            font-weight: 500;
            margin: 0;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .empty-state {
            text-align: center;
            padding: 80px 40px;
            color: var(--color-muted);
        }

        .empty-state i {
            font-size: 4rem;
            color: var(--color-primary);
            margin-bottom: 20px;
            opacity: 0.5;
        }

        .empty-state h4 {
            color: var(--color-dark);
            margin-bottom: 10px;
            font-weight: 600;
        }

        .empty-state p {
            margin-bottom: 30px;
            font-size: 1rem;
        }

        .modal-footer {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border-top: 2px solid #e2e8f0;
            padding: 1.5rem 2rem;
        }

        .footer-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
        }

        /* Estilos para estados de aprobación */
        .pass-status {
            background-color: #d4edda !important;
            border-color: #c3e6cb !important;
            color: #155724 !important;
        }

        .unpass-status {
            background-color: #f8d7da !important;
            border-color: #f5c6cb !important;
            color: #721c24 !important;
        }

        .row-pass {
            background-color: #d4edda !important;
        }

        .row-pass td {
            border-color: #c3e6cb !important;
        }

        .row-unpass {
            background-color: #f8d7da !important;
        }

        .row-unpass td {
            border-color: #f5c6cb !important;
        }

        .disabled-field {
            background-color: #f5f5f5 !important;
            color: #999 !important;
            cursor: not-allowed !important;
        }

        .student-name {
            font-weight: 600;
            font-size: 14px;
        }

        .language-badge {
            padding: 4px 8px;
            background: #e3f2fd;
            color: #1976d2;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
        }

        .level-badge {
            padding: 3px 6px;
            background: #f3e5f5;
            color: #7b1fa2;
            border-radius: 8px;
            font-size: 11px;
            margin: 2px;
            display: inline-block;
        }

        .bop-badge {
            padding: 3px 6px;
            background: #e8f5e9;
            color: #2e7d32;
            border-radius: 8px;
            font-size: 11px;
            margin: 2px;
            display: inline-block;
        }

          .bop-expired {
            padding: 3px 6px;
            background: #ff9e72;
            color: #c60000;
            border-radius: 8px;
            font-size: 11px;
            margin: 2px;
            display: inline-block;
        }

        .levels-container, .bops-container {
            display: flex;
            flex-wrap: wrap;
            gap: 2px;
        }

        .email-text {
            font-size: 12px;
            color: #666;
            word-break: break-all;
        }

        .score-status-container {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 24px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: var(--color-success);
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }

        /* Animaciones mejoradas */
        .candidate-row.new-row {
            animation: slideInUp 0.5s ease-out;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .candidate-row.removing {
            animation: slideOutRight 0.3s ease-in forwards;
        }

        @keyframes slideOutRight {
            from {
                opacity: 1;
                transform: translateX(0);
            }
            to {
                opacity: 0;
                transform: translateX(100px);
            }
        }

        /* Responsividad mejorada */
        @media (max-width: 768px) {
            .modal-fullscreen {
                margin: 0;
                height: 100vh;
                max-width: 100%;
            }

            .modal-content {
                border-radius: 0;
            }

            .sticky-header {
                padding: 1rem;
            }

            .d-flex {
                flex-direction: column;
                gap: 1rem;
            }

            .search-container {
                min-width: auto;
                width: 100%;
            }

            .table-container {
                margin: 0 1rem;
            }

            .footer-actions {
                flex-direction: column;
            }

            .btn-modern {
                width: 100%;
                justify-content: center;
            }
        }

        /* Estados de hover mejorados */
        .table-modern tbody tr:hover .table-input {
            border-color: var(--color-primary);
            background: white;
        }

        .table-modern tbody tr:hover .btn-action {
            box-shadow: var(--shadow-sm);
        }

        /* Efectos de glassmorphism */
        .modal-header::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
        }

        .status-pending { background-color: #fff3cd; color: #856404; }
    .status-inprogress { background-color: #cce5ff; color: #004085; }
    .status-completed { background-color: #d4edda; color: #155724; }
    .status-failed { background-color: #f8d7da; color: #721c24; }

    .final-pass { background-color: #d4edda; color: #155724; }
    .final-failed { background-color: #f8d7da; color: #721c24; }

    .resit-pass { background-color: #d4edda; color: #155724; }
    .resit-failed { background-color: #f8d7da; color: #721c24; }

</style>
<script>
    const ID_PROJECT = @json($ID_PROJECT);
    const ID_COURSE = 0;

  

</script>

@endsection
@php
$css_identifier = 'detailsProject';
@endphp