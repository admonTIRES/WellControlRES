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
                                        <span class="text-secondary">{{ __('Project') }} - </span> {{ $proyect->COURSE_NAME_ES_PROJECT }}
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
                .card-primary { --accent-color: #4f46e5; }
                .card-success { --accent-color: #10b981; }
                .card-warning { --accent-color: #f59e0b; }
                .card-danger { --accent-color: #ef4444; }
                .card-info { --accent-color: #06b6d4; }
                .card-purple { --accent-color: #8b5cf6; }
                .card-pink { --accent-color: #ec4899; }
                .card-indigo { --accent-color: #6366f1; }

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
                    <h5><i class="fas fa-chart-pie"></i> Generalidades del Curso</h5>
                    <p>Resumen ejecutivo del proyecto</p>
                </div>

                <div class="mini-grid">
                    <!-- Contacto -->
                    <div class="mini-card card-primary">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <div class="card-title">Contacto</div>
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
                                <div class="card-title">Folio</div>
                                <div class="card-value large">{{ $proyect->FOLIO_PROJECT ?? '' }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Tipo de Curso -->
                    <div class="mini-card card-info">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div>
                                <div class="card-title">Tipo de curso</div>
                                <div class="card-value">{{ $proyect->COURSE_TYPE_PROJECT ?? '' }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Ubicación -->
                    <div class="mini-card card-purple">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-map-marker"></i>
                            </div>
                            <div>
                                <div class="card-title">Ubicación</div>
                                <div class="card-value">{{ $proyect->LOCATION_PROJECT ?? '' }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Nombres del Curso -->
                    <div class="mini-card card-danger card-wide">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-book"></i>
                            </div>
                            <div class="card-title">Nombres del Curso</div>
                        </div>
                        <div class="dual-column">
                            <div>
                                <div style="font-size: 0.625rem; color: #6b7280; margin-bottom: 0.25rem;">
                                    <i class="fas fa-flag"></i> ES
                                </div>
                                <div class="card-value small">{{ $proyect->COURSE_NAME_ES_PROJECT ?? '' }}</div>
                            </div>
                            <div>
                                <div style="font-size: 0.625rem; color: #6b7280; margin-bottom: 0.25rem;">
                                    <i class="fas fa-flag"></i> EN
                                </div>
                                <div class="card-value small">{{ $proyect->COURSE_NAME_EN_PROJECT ?? '' }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Centro y Entidad -->
                    <div class="mini-card card-indigo">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-certificate"></i>
                            </div>
                            <div>
                                <div class="card-title">Centro</div>
                                <div class="card-value">{{ $proyect->CENTER_NUMBER_PROJECT ?? '' }}</div>
                            </div>
                        </div>
                        <div class="card-subtitle">{{ $proyect->CERTIFICATION_CENTER_PROJECT ?? '' }}</div>
                    </div>

                    <!-- Idioma y Operación -->
                    <div class="mini-card card-pink">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-language"></i>
                            </div>
                            <div>
                                <div class="card-title">Idioma</div>
                                <div class="card-value">{{ $proyect->LANGUAGE_PROJECT ?? '' }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Niveles y BOP -->
                    <div class="mini-card card-warning card-wide-3">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-layer-group"></i>
                            </div>
                            <div class="card-title">Niveles & BOP</div>
                        </div>
                        <div class="dual-column">
                            <div>
                                @if(!empty($proyect->ACCREDITATION_LEVELS_PROJECT))
                                    <ul class="mini-list">
                                        @foreach($proyect->ACCREDITATION_LEVELS_PROJECT as $nivel)
                                            <li><i class="fas fa-check"></i>{{ $nivel }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <h6 class="mb-0 text-muted">N/A</h6>
                                @endif
                            </div>
                            <div>

                                 @if(!empty($proyect->BOP_TYPES_PROJECT))
                                            <ul class="mb-0">
                                                @foreach($proyect->BOP_TYPES_PROJECT as $bop)
                                                    <li> <div class="mini-badge badge-warning">{{ $bop }}</div></li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <h6 class="mb-0 text-muted">N/A</h6>
                                        @endif


                                        <div class="mini-badge badge-info">{{ $proyect->ACCREDITING_ENTITY_PROJECT ?? '' }}</div>

                                        
                                {{-- <div class="mini-badge badge-primary">BOP-001</div>
                                <div class="mini-badge badge-info">BOP-002</div>
                                <div class="mini-badge badge-warning">BOP-003</div> --}}
                            </div>
                        </div>
                    </div>

                    <!-- Empresas -->
                    <div class="mini-card card-danger card-large">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="card-title">Empresas Participantes</div>
                        </div>

                         @if(!empty($proyect->COMPANIES_PROJECT))
                            @foreach($proyect->COMPANIES_PROJECT as $empresa)

                                <div class="company-mini">
                                <div class="company-name">{{ $empresa['NAME_PROJECT'] ?? 'Sin nombre' }}</div>
                                <div class="company-details">{{ $empresa['EMAIL_PROJECT'] ?? '' }} • Alumnos: {{ $empresa['STUDENT_COUNT_PROJECT'] ?? 0 }}</div>
                            </div>
                            @endforeach
                        @else
                            <h6 class="mb-0 text-muted">N/A</h6>
                        @endif
                    </div>

                    <!-- Fechas -->
                    <div class="mini-card card-success card-wide">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-calendar"></i>
                            </div>
                            <div class="card-title">Cronograma</div>
                        </div>                        
                        <div class="dual-column">
                            <div>
                                <div class="date-mini">
                                    <i class="fas fa-play"></i>
                                    <div>
                                        <div style="font-weight: 600;">{{ $proyect->COURSE_START_DATE_PROJECT ?? '' }}</div>
                                        <div style="font-size: 0.625rem; color: #6b7280;">Inicio curso</div>
                                    </div>
                                </div>
                                <div class="date-mini">
                                    <i class="fas fa-stop"></i>
                                    <div>
                                        <div style="font-weight: 600;">{{ $proyect->COURSE_END_DATE_PROJECT ?? '' }}</div>
                                        <div style="font-size: 0.625rem; color: #6b7280;">Fin curso</div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="date-mini">
                                    <i class="fas fa-user-graduate"></i>
                                    <div>
                                        <div style="font-weight: 600;">{{ $proyect->MEMBERSHIP_START_PROJECT ?? '' }}</div>
                                        <div style="font-size: 0.625rem; color: #6b7280;">Membresía inicio</div>
                                    </div>
                                </div>
                                <div class="date-mini">
                                    <i class="fas fa-user-times"></i>
                                    <div>
                                        <div style="font-weight: 600;">{{ $proyect->MEMBERSHIP_END_PROJECT ?? '' }}</div>
                                        <div style="font-size: 0.625rem; color: #6b7280;">Membresía fin</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Exámenes -->
                    <div class="mini-card card-warning card-wide">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-clipboard-check"></i>
                            </div>
                            <div class="card-title">Exámenes</div>
                        </div>

                        <div class="dual-column">
                            <div>
                                <div style="font-size: 0.625rem; color: #6b7280; margin-bottom: 0.25rem;">
                                    <i class="fas fa-book"></i> Teórico
                                </div>
                                <div class="card-value small">{{ $proyect->EXAM_DATE_PROJECT ?? '' }}</div>
                                <div class="card-subtitle">{{ $proyect->EXAM_TIME_PROJECT ?? '' }}</div>
                            </div>
                            <div>
                                <div style="font-size: 0.625rem; color: #6b7280; margin-bottom: 0.25rem;">
                                    <i class="fas fa-tools"></i> Práctico
                                </div>
                                <div class="card-value small">{{ $proyect->PRACTICAL_EXAM_DATE_PROJECT ?? '' }}</div>
                                <div class="card-subtitle">{{ $proyect->PRACTICAL_EXAM_TIME_PROJECT ?? '' }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Instructor -->
                    <div class="mini-card card-indigo card-large">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                            <div class="card-title">Instructor Asignado</div>
                        </div>
                        <div class="contact-mini">
                            <div class="contact-icon-mini">
                                <i class="fas fa-id-badge"></i>
                            </div>
                            <div style="font-size: 0.75rem; font-weight: 600;">{{ $proyect->INSTRUCTOR_ID_PROJECT ?? '' }}</div>
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
                            <div >
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
                </div>
            </div>
            <div class="modal-footer">
                <div class="footer-actions">
                    <button class="btn btn-primary btn-modern btn-save" onclick="saveCandidateTable()">
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

<div class="modal fade" id="editarCursoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-users me-2"></i>Tabla de Candidatos</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- <div class="sticky-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex gap-3">
                            <div class="search-container">
                                <div class="search-wrapper">
                                    <i class="fas fa-search search-icon"></i>
                                    <input type="text" id="searchInput" class="search-input" placeholder="Buscar candidatos..." onkeyup="filterTable()">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div style="padding: 1vw;">
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


function editarCandidatos() {
    $('#editarCandidatosModal').modal('show');
    loadTableData();
}

function editarCurso() {
    $('#editarCursoModal').modal('show');
    loadTableCursoModal();
}

function loadTableData() {
    $.ajax({
        url: '/editarTablaCandidato/' + ID_PROJECT, 
        method: 'GET',
         dataType: 'json',
            beforeSend: function() {
                // Mostrar spinner de carga
                $('#edit-candidate-table tbody').html(`
                    <tr>
                        <td colspan="11" class="text-center">
                            <div class="spinner-container">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Cargando...</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                `);
            },
            success: function(data) {
                const tbody = $('#edit-candidate-table tbody');
                tbody.empty();
                
                if (data && data.length > 0) {
                    data.forEach((row, index) => {
                        let tr = `<tr data-candidate-id="${row.ID_CANDIDATE || ''}" class="candidate-row">`;
                        
                        tr += `<td class="text-center">${index + 1}</td>`;
                        
                        // Empresa - Textarea
                        tr += `<td><textarea class="table-input textarea" name="company" 
                                  placeholder="Nombre de empresa">${row.COMPANY_PROJECT || ''}</textarea></td>`;
                        
                        // CR - Input normal
                        tr += `<td><textarea class="table-input textarea" name="cr" 
                                  placeholder="CR">${row.CR_PROJECT || ''}</textarea></td>`;
                        
                        // Apellido - Textarea
                        tr += `<td><textarea class="table-input textarea" name="lastname" 
                                  placeholder="Apellido">${row.LAST_NAME_PROJECT || ''}</textarea></td>`;
                        
                        // Nombre - Textarea
                        tr += `<td><textarea class="table-input textarea" name="firstname" 
                                  placeholder="Nombre">${row.FIRST_NAME_PROJECT || ''}</textarea></td>`;
                        
                        // Segundo Nombre - Textarea
                        tr += `<td><textarea class="table-input textarea" name="mdname" 
                                  placeholder="Segundo nombre">${row.MIDDLE_NAME_PROJECT || ''}</textarea></td>`;
                        
                        // Fecha Nacimiento - Input date
                        tr += `<td><input class="table-input" type="date" 
                               value="${formatDateForInput(row.DOB_PROJECT) || ''}" name="dob" /></td>`;
                        
                        // ID - Textarea
                        tr += `<td><textarea class="table-input textarea" name="id_number" 
                                  placeholder="Número de ID">${row.ID_NUMBER_PROJECT || ''}</textarea></td>`;
                        
                        tr += `<td>
                            <select class="table-input membership-select" name="membership">
                                <option value="">Seleccionar...</option>
                                <option value="N/A" ${(row.MEMBERSHIP_PROJECT === 'N/A') ? 'selected' : ''}>N/A</option>
                                <option value="Premium" ${(row.MEMBERSHIP_PROJECT === 'Premium') ? 'selected' : ''}>Premium</option>
                                <option value="Pro" ${(row.MEMBERSHIP_PROJECT === 'Pro') ? 'selected' : ''}>Pro</option>
                                <option value="Enterprise" ${(row.MEMBERSHIP_PROJECT === 'Enterprise') ? 'selected' : ''}>Enterprise</option>
                            </select>
                           </td>`;

                        // Email - Input email
                        tr += `<td><input class="table-input email" type="email" 
                               value="${row.EMAIL_PROJECT || ''}" name="email" placeholder="correo@ejemplo.com" /></td>`;
                        
                        // Contraseña - Input password
                        tr += `<td><input class="table-input" type="password" 
                               value="${row.PASSWORD_PROJECT || ''}" name="password" placeholder="Contraseña" /></td>`;
                        
                        // Estado - Switch
                        tr += `<td>
                            <div class="status-switch-container">
                                <label class="status-switch">
                                    <input type="checkbox" name="status" ${(row.ACTIVO == 1) ? 'checked' : ''}>
                                    <span class="status-slider"></span>
                                </label>
                            </div>
                           </td>`;

                        // Acciones
                        tr += `<td class="table-row-actions">
                                <div class="action-buttons">
                                    <button class="btn btn-sm btn-danger btn-action" onclick="deleteCandidate(this, ${row.ID_CANDIDATE})"
                                        ${!row.ID_CANDIDATE ? 'disabled' : ''}>
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <button class="btn btn-sm btn-info btn-action" onclick="togglePassword(this)">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                               </td>`;
                        
                        tr += '</tr>';
                        tbody.append(tr);
                    });
                    updateRowCount(data.length);
                } else {
                     tbody.html(`
                        <tr>
                            <td colspan="11" class="text-center text-muted py-5">
                                <i class="fas fa-users fa-3x mb-3"></i>
                                <p>No hay candidatos registrados</p>
                                <button class="btn btn-primary btn-sm" onclick="addNewRow()">
                                    <i class="fas fa-plus me-1"></i> Agregar primer candidato
                                </button>
                            </td>
                        </tr>
                    `);
                    updateRowCount(0);
                }
            },
            error: function(xhr, status, error) {
                const tbody = $('#edit-candidate-table tbody');
                tbody.html(`
                    <tr>
                        <td colspan="11" class="text-center text-danger py-5">
                            <i class="fas fa-exclamation-triangle fa-2x mb-3"></i>
                            <p>Error al cargar los datos: ${error}</p>
                            <button class="btn btn-warning btn-sm" onclick="loadTableData()">
                                <i class="fas fa-redo me-1"></i> Reintentar
                            </button>
                        </td>
                    </tr>
                `);
                updateRowCount(0);
            }
    });
}

function loadTableCursoModal() {
    $.ajax({
    url: '/editarTablaCurso/' + ID_PROJECT, 
    method: 'GET',
    dataType: 'json',
    beforeSend: function() {
        // Mostrar spinner de carga
        $('#edit-course-table tbody').html(`
            <tr>
                <td colspan="20" class="text-start">
                    <div class="spinner-container">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Cargando...</span>
                        </div>
                        <p class="mt-2">Cargando datos del curso...</p>
                    </div>
                </td>
            </tr>
        `);
    },
    success: function(response) {
        const tbody = $('#edit-course-table tbody');
        tbody.empty();

            if (response.success && response.estudiantes && response.estudiantes.length > 0) {
                response.estudiantes.forEach((estudiante, index) => {
                    const candidato = estudiante.candidato;
                    const curso = estudiante.datos_curso;
                    const proyecto = response.proyecto;
                    
                    // Convertir valores booleanos a Yes/No
                    const resitValue = curso.RESIT === true || curso.RESIT === 'true' || curso.RESIT === 'Yes' ? 'Yes' : 'No';
                    const resitInmediatoValue = curso.RESIT_INMEDIATO === true || curso.RESIT_INMEDIATO === 'true' || curso.RESIT_INMEDIATO === 'Yes' ? 'Yes' : 'No';
                    const resitProgramadoValue = curso.RESIT_PROGRAMADO === true || curso.RESIT_PROGRAMADO === 'true' || curso.RESIT_PROGRAMADO === 'Yes' ? 'Yes' : 'No';

                    const certifiedValue = curso.CERTIFIED === true || curso.CERTIFIED === 'true' || curso.CERTIFIED === 'Yes' ? 'Yes' : 'No';
                    const resitPassValue = curso.RESIT_PASS === true || curso.RESIT_PASS === 'true' || curso.RESIT_PASS === 'Yes' ? 'Pass' : 
                    (curso.RESIT_PASS === false || curso.RESIT_PASS === 'false' || curso.RESIT_PASS === 'No' ? 'Unpass' : '');

                    
                    // Determinar si los campos de resit deben estar habilitados
                    const resitDisabled = resitValue !== 'Yes' ? 'disabled' : '';
                    const resitInmediatoDisabled = resitInmediatoValue !== 'Yes' ? 'disabled' : '';
                    const resitProgramadoDisabled = resitProgramadoValue !== 'Yes' ? 'disabled' : '';

                    const certifiedDisabled = certifiedValue !== 'Yes' ? 'disabled' : '';
                    
                    // Verificar estados para colorear
                    const practicalStatus = curso.PRACTICAL_STATUS || '';
                    const equipamentStatus = curso.EQUIPAMENT_STATUS || '';
                    const pypStatus = curso.PYP_STATUS || '';
                    const finalStatus = curso.FINAL_STATUS || '';
                    
                    // Determinar clases de color
                    const practicalClass = practicalStatus === 'Unpass' ? 'unpass-status' : (practicalStatus === 'Pass' ? 'pass-status' : '');
                    const equipamentClass = equipamentStatus === 'Unpass' ? 'unpass-status' : (equipamentStatus === 'Pass' ? 'pass-status' : '');
                    const pypClass = pypStatus === 'Unpass' ? 'unpass-status' : (pypStatus === 'Pass' ? 'pass-status' : '');
                    
                    // Verificar si todos los primeros 3 tienen Unpass
                    const allUnpass = practicalStatus === 'Unpass' && equipamentStatus === 'Unpass' && pypStatus === 'Unpass';
                    const allPass = practicalStatus === 'Pass' && equipamentStatus === 'Pass' && pypStatus === 'Pass';
                    
                    // Clase para la fila completa
                    const key = candidato.ID_CANDIDATE;

                    let rowClass = '';
                    if (allUnpass) {
                        rowClass = 'row-unpass';
                    } else if (allPass || finalStatus === 'Pass') {
                        rowClass = 'row-pass';
                    }
                    
                    let tr = `<tr data-candidate-id="${candidato.ID_CANDIDATE || ''}" data-curso-id="${estudiante.curso_id || ''}" class="course-row ${rowClass}">  `;
                    
                    // Número
                    tr += `<td class="text-center">${index + 1}</td>`;
                    
                    // Estudiante (Solo nombre, sin email aquí)
                    tr += `<td>
                        <span class="student-name">${candidato.LAST_NAME_PROJECT || ''} ${candidato.FIRST_NAME_PROJECT || ''} ${candidato.MIDDLE_NAME_PROJECT || ''}</span>
                    </td>`;
                    
                    // Level (Niveles de acreditación) - SPAN
                    tr += `<td>
                        <div class="levels-container">`;
                    if (proyecto.ACCREDITATION_LEVELS_PROJECT && proyecto.ACCREDITATION_LEVELS_PROJECT.length > 0) {
                        proyecto.ACCREDITATION_LEVELS_PROJECT.forEach(nivel => {
                            tr += `<span class="level-badge">${nivel.nombre || nivel.descripcion}</span>`;
                        });
                    } else {
                        tr += `<span class="text-muted">N/A</span>`;
                    }
                    tr += `</div></td>`;
                    
                    // BOP (Tipos BOP) - SPAN
                    tr += `<td>
                        <div class="bops-container">`;
                    if (proyecto.BOP_TYPES_PROJECT && proyecto.BOP_TYPES_PROJECT.length > 0) {
                        proyecto.BOP_TYPES_PROJECT.forEach(bop => {
                            tr += `<span class="bop-badge">${bop.abreviatura}</span>`;
                        });
                    } else {
                        tr += `<span class="text-muted">N/A</span>`;
                    }
                    tr += `</div></td>`;
                    
                    // Language - SPAN
                    let idiomaTexto = 'N/A';
                    if (proyecto.LANGUAGE_PROJECT && Array.isArray(proyecto.LANGUAGE_PROJECT) && proyecto.LANGUAGE_PROJECT.length > 0) {
                        const idioma = proyecto.LANGUAGE_PROJECT[0];
                        idiomaTexto = idioma.DESCRIPCION_IDIOMAS || idioma.NOMBRE_IDIOMA || 'N/A';
                    }
                    tr += `<td>
                        <span class="language-badge">${idiomaTexto}</span>
                    </td>`;
                    
                    // Practical (Porcentaje/Status)
                    // Practical (Porcentaje/Status)
                    tr += `<td>
                        <div class="score-status-container" style="position: relative;">
                            <input class="table-input practical-score ${practicalClass}" type="number" step="1" min="0" max="100"
                                value="${curso.PRACTICAL || ''}" name="courses[${key}][PRACTICAL]" placeholder="0" style="padding-right: 25px;" />
                            <span style="position: absolute; right: 5px; top: 25%; transform: translateY(-50%); color: #555;">%</span>
                            <select class="table-input practical-status ${practicalClass}" name="courses[${key}][PRACTICAL_PASS]">
                                <option value="">Status</option>
                                <option value="Pass" ${(practicalStatus === 'Pass') ? 'selected' : ''}>Pass</option>
                                <option value="Unpass" ${(practicalStatus === 'Unpass') ? 'selected' : ''}>Unpass</option>
                            </select>
                        </div>
                    </td>`;

                    // Equipament (Porcentaje/Status)
                    tr += `<td>
                        <div class="score-status-container" style="position: relative;">
                            <input class="table-input equipament-score ${equipamentClass}" type="number" step="1" min="0" max="100"
                                value="${curso.EQUIPAMENT || ''}" name="courses[${key}][EQUIPAMENT]" placeholder="0" style="padding-right: 25px;" />
                            <span style="position: absolute; right: 5px; top: 25%; transform: translateY(-50%); color: #555;">%</span>
                            <select class="table-input equipament-status ${equipamentClass}" name="courses[${key}][EQUIPAMENT_PASS]">
                                <option value="">Status</option>
                                <option value="Pass" ${(equipamentStatus === 'Pass') ? 'selected' : ''}>Pass</option>
                                <option value="Unpass" ${(equipamentStatus === 'Unpass') ? 'selected' : ''}>Unpass</option>
                            </select>
                        </div>
                    </td>`;

                    // P&P (Porcentaje/Status)
                    tr += `<td>
                        <div class="score-status-container" style="position: relative;">
                            <input class="table-input pyp-score ${pypClass}" type="number" step="1" min="0" max="100"
                                value="${curso.PYP || ''}" name="courses[${key}][PYP]" placeholder="0" style="padding-right: 25px;" />
                            <span style="position: absolute; right: 5px; top: 25%; transform: translateY(-50%); color: #555;">%</span>
                            <select class="table-input pyp-status ${pypClass}" name="courses[${key}][PYP_PASS]">
                                <option value="">Status</option>
                                <option value="Pass" ${(pypStatus === 'Pass') ? 'selected' : ''}>Pass</option>
                                <option value="Unpass" ${(pypStatus === 'Unpass') ? 'selected' : ''}>Unpass</option>
                            </select>
                        </div>
                    </td>`;

                    
                    // Status general
                    tr += `<td>
                        <select class="table-input status-select" name="courses[${key}][STATUS]">
                            <option value="">Seleccionar...</option>
                            <option value="Pending" ${(curso.STATUS === 'Pending') ? 'selected' : ''}>Pending</option>
                            <option value="In Progress" ${(curso.STATUS === 'In Progress') ? 'selected' : ''}>In Progress</option>
                            <option value="Completed" ${(curso.STATUS === 'Completed') ? 'selected' : ''}>Completed</option>
                            <option value="Failed" ${(curso.STATUS === 'Failed') ? 'selected' : ''}>Failed</option>
                        </select>
                    </td>`;
                    
                    // Resit (Switch Yes/No)
                    tr += `<td>
                        <label class="switch">
                            <input type="checkbox" class="resit-switch" name="courses[${key}][RESIT]" 
                                    ${resitValue === 'Yes' ? 'checked' : ''}>
                            <span class="slider"></span>
                        </label>
                    </td>`;
                        tr += `<td>
                        <select class="table-input ${resitDisabled ? 'disabled-field' : ''} resit-intentos" name="courses[${key}][INTENTOS]" ${resitDisabled}>
                            <option value="">Seleccionar...</option>
                            <option value="1">1</option>
                            <option value="1">2</option>
                        </select>
                    </td>`;

                    tr += `<td>
                        <div class="bops-container resit-periodos" style="justify-content: center;">
                            <span class="bop-badge">${proyecto.DAYS_REST || 'N/A'}</span>
                        </div></td>`;

                        tr += `<td>
                        <div class="bops-container resit-restantes" style="justify-content: center;">
                            <span class="bop-badge"> ${proyecto.DAYS_REMAINING || 'N/A'}</span>
                        </div></td>`;

                    tr += `<td>
                        <div class="bops-container resit-limite" style="justify-content: center;">
                            <span class="bop-badge"> ${proyecto.COURSE_END_DATE_90 || 'N/A'} </span>
                        </div></td>`;
            
                    tr += `<td>
                        <select class="table-input module-select ${resitDisabled ? 'disabled-field' : ''}" name="courses[${key}][RESIT_MODULE]" ${resitDisabled}>
                            <option value="">Seleccionar...</option>
                            <option value="Equipament" ${(curso.MODULE_RESIT === 'Equipament') ? 'selected' : ''}>Equipament</option>
                            <option value="P&P" ${(curso.MODULE_RESIT === 'P&P') ? 'selected' : ''}>P&P</option>
                        </select>
                    </td>`;

                        tr += `<td>
                        <label class="switch">
                            <input type="checkbox" class="resit-switch-inmediato ${resitDisabled ? 'disabled-field' : ''}" name="courses[${key}][RESIT_INMEDIATO]" ${resitDisabled}" 
                                    ${resitInmediatoValue === 'Yes' ? 'checked' : ''}>
                            <span class="slider"></span>
                        </label>
                    </td>`;
                                                
                    // Date (Solo habilitado si Resit es Yes)
                    tr += `<td>
                        <input class="table-input resit-inmediato-date ${resitInmediatoDisabled ? 'disabled-field' : ''}" type="date" 
                                value="${formatDateForInput(curso.RESIT_DATE) || ''}" name="courses[${key}][RESIT_INMEDIATO_DATE]" ${resitInmediatoDisabled} />
                    </td>`;
                    
                    // Score (Solo habilitado si Resit es Yes)
                    tr += `<td>
                        <div class="score-status-container" style="position: relative;">
                            <input class="table-input resit-inmediato-score ${resitInmediatoDisabled ? 'disabled-field' : ''}" type="number" step="1" min="0" max="100"
                                value="${curso.RESIT_SCORE || ''}" name="courses[${key}][RESIT_INMEDIATO_SCORE]" placeholder="0" style="padding-right: 25px;" ${resitInmediatoDisabled} />
                            <span style="position: absolute; right: 5px; top: 50%; transform: translateY(-50%); color: #555;">%</span>
                        </div>
                    </td>`;
                                            
                    // Resit Pass (Solo habilitado si Resit es Yes)
                    tr += `<td>
                        <select class="table-input resit-inmediato-status ${resitInmediatoDisabled ? 'disabled-field' : ''}" name="courses[${key}][RESIT_INMEDIATO_STATUS]" ${resitInmediatoDisabled}>
                            <option value="">Seleccionar...</option>
                            <option value="Pass" ${(resitPassValue === 'Yes') ? 'selected' : ''}>Pass</option>
                            <option value="Unpass" ${(resitPassValue === 'No') ? 'selected' : ''}>Unpass</option>
                        </select>
                    </td>`;

                        // resit programado
                        tr += `<td>
                        <label class="switch">
                            <input type="checkbox" class="resit-switch-programado ${resitDisabled ? 'disabled-field' : ''}" name="resit-courses[${key}][RESIT_PROGRAMADO]" ${resitDisabled}" 
                                    ${resitProgramadoValue === 'Yes' ? 'checked' : ''}>
                            <span class="slider"></span>
                        </label>
                    </td>`;
                    // requiere entrenamiento adicional
                        tr += `<td>
                        <select class="table-input ${resitProgramadoDisabled ? 'disabled-field' : ''} entrenamiento-adi" name="courses[${key}][RESIT_ENTRENAMIENTO]" ${resitProgramadoDisabled}>
                            <option value="">Seleccionar...</option>
                            <option value="1" >Si</option>
                            <option value="1">No</option>
                        </select>
                    </td>`;
                    // folio de proyecto donde recibira entrenamiento adicional
                        tr += `<td>
                        <select class="table-input  ${resitProgramadoDisabled ? 'disabled-field' : ''} folio-proyecto" name="courses[${key}][RESIT_FOLIO_PROYECTO]" ${resitProgramadoDisabled}>
                            <option value="">Seleccionar...</option>
                            <option value="1" >Si</option>
                            <option value="1">No</option>
                        </select>
                    </td>`;
                    // fecha resity programado
                        tr += `<td>
                    <input class="table-input resit-programado-fecha ${resitProgramadoDisabled ? 'disabled-field' : ''}" type="date" 
                                value="${formatDateForInput(curso.RESIT_DATE) || ''}" name="courses[${key}][RESIT_PROGRAMADO_DATE]" ${resitProgramadoDisabled} />
                    </td>`;
                    
                    // Score (Solo habilitado si Resit es Yes)
                    tr += `<td>
                        <div class="score-status-container" style="position: relative;">
                            <input class="table-input resit-programado-score ${resitProgramadoDisabled ? 'disabled-field' : ''}" type="number" step="1" min="0" max="100"
                                value="${curso.RESIT_SCORE || ''}" name="courses[${key}][RESIT_PROGRAMADO_SCORE]" placeholder="0" style="padding-right: 25px;" ${resitProgramadoDisabled} />
                            <span style="position: absolute; right: 5px; top: 50%; transform: translateY(-50%); color: #555;">%</span>
                        </div>
                    </td>`;
                                            
                    // Resit Pass (Solo habilitado si Resit es Yes)
                    tr += `<td>
                        <select class="table-input resit-programado-status ${resitProgramadoDisabled ? 'disabled-field' : ''}" name="courses[${key}][RESIT_PROGRAMADO_STATUS]" ${resitProgramadoDisabled}>
                            <option value="">Seleccionar...</option>
                            <option value="Pass" ${(resitPassValue === 'Yes') ? 'selected' : ''}>Pass</option>
                            <option value="Unpass" ${(resitPassValue === 'No') ? 'selected' : ''}>Unpass</option>
                        </select>
                    </td>`;
                    
                    
                    // Final Status
                    tr += `<td>
                        <select class="table-input final-status-select" name="courses[${key}][FINAL_STATUS]">
                            <option value="">Seleccionar...</option>
                            <option value="Pass" ${(finalStatus === 'Pass') ? 'selected' : ''}>Pass</option>
                            <option value="Unpass" ${(finalStatus === 'Unpass') ? 'selected' : ''}>Unpass</option>
                        </select>
                    </td>`;
                    
                    // Certified (Switch Yes/No) 
                    tr += `<td>
                        <label class="switch">
                            <input type="checkbox" class="certified-switch" name="courses[${key}][HAVE_CERTIFIED]" 
                                    ${certifiedValue === 'Yes' ? 'checked' : ''}>
                            <span class="slider"></span>
                        </label>
                    </td>`;
                    
                    // Expiration (Solo habilitado si Certified es Yes)
                    tr += `<td>
                        <input class="table-input expiration-date ${certifiedDisabled ? 'disabled-field' : ''}" type="date" 
                                value="${formatDateForInput(curso.EXPIRATION) || ''}" name="courses[${key}][EXPIRATION]" ${certifiedDisabled} />
                    </td>`;
                    
                    // Mail (Solo email)
                    tr += `<td>
                        <span class="email-text">${candidato.EMAIL_PROJECT || 'N/A'}</span>
                    </td>`;
                    
                    // Acciones
                    tr += `<td class="table-row-actions text-center">
                        <div class="action-buttons">
                            <button class="btn btn-sm btn-info btn-action" onclick="viewStudentDetails(${candidato.ID_CANDIDATE})" title="Cargar certficado">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </td>`;
                    
                    tr += `<input type="hidden" 
                        name="courses[${candidato.ID_CANDIDATE}][ID_CANDIDATE]" 
                        value="${candidato.ID_CANDIDATE}"> <input type="hidden" 
                        name="courses[${candidato.ID_CANDIDATE}][ID_PROJECT]" 
                        value="${ID_PROJECT}"> </tr>`;
                    tbody.append(tr);
                });
                
                // Agregar event listeners para los switches y cambios
                addSwitchListeners();
                addValidationListeners();
                
                // Actualizar contador de estudiantes
                if (typeof updateRowCount === 'function') {
                    updateRowCount(response.estudiantes.length);
                }
                
            } else {
                tbody.html(`
                    <tr>
                        <td colspan="20" class="text-center text-muted py-5">
                            <i class="fas fa-graduation-cap fa-3x mb-3"></i>
                            <p>No hay estudiantes registrados en este curso</p>
                            <small class="d-block">Los estudiantes deben estar activos en la tabla de candidatos</small>
                        </td>
                    </tr>
                `);
                
                if (typeof updateRowCount === 'function') {
                    updateRowCount(0);
                }
            }
        },
        error: function(xhr, status, error) {
            const tbody = $('#edit-course-table tbody');
            tbody.html(`
                <tr>
                    <td colspan="20" class="text-center text-danger py-5">
                        <i class="fas fa-exclamation-triangle fa-2x mb-3"></i>
                        <p>Error al cargar los datos del curso</p>
                        <small class="d-block">${error}</small>
                        <button class="btn btn-warning btn-sm mt-2" onclick="loadTableCursoModal()">
                            <i class="fas fa-redo me-1"></i> Reintentar
                        </button>
                    </td>
                </tr>
            `);
            
            if (typeof updateRowCount === 'function') {
                updateRowCount(0);
            }
        }
    });
}


const style = document.createElement('style');
style.textContent = `
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
    .levels-container, .bops-container {
        display: flex;
        flex-wrap: wrap;
        gap: 2px;
    }
    .mail-badge {
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 500;
    }
    .mail-badge.active {
        background: #e8f5e9;
        color: #2e7d32;
    }
    .mail-badge.inactive {
        background: #ffebee;
        color: #c62828;
    }
    .table-input {
        width: 100%;
        padding: 4px 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 12px;
    }
    .table-input:focus {
        outline: none;
        border-color: #2196f3;
        box-shadow: 0 0 0 2px rgba(33, 150, 243, 0.2);
    }
    .action-buttons {
        display: flex;
        gap: 4px;
        justify-content: center;
    }
    .btn-action {
        padding: 2px 6px;
        font-size: 12px;
    }
`;
document.head.appendChild(style);

const switchStyles = `
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
        background-color: #A4D65E;
    }
    input:checked + .slider:before {
        transform: translateX(26px);
    }
    .score-status-container {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }
    .disabled {
        background-color: #f5f5f5;
        color: #999;
        cursor: not-allowed;
    }
    .email-text {
        font-size: 12px;
        color: #666;
        word-break: break-all;
    }
`;
document.head.appendChild(document.createElement('style')).textContent = switchStyles;


const colorStyles = `
    /* Estilos para campos con estado */
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
    
    /* Estilos para filas completas */
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
    
    /* Campos deshabilitados en gris */
    .disabled-field {
        background-color: #f5f5f5 !important;
        color: #999 !important;
        cursor: not-allowed !important;
    }
    
    /* Campos normales */
    .table-input {
        width: 100%;
        padding: 4px 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 12px;
        background-color: white;
        transition: all 0.3s ease;
    }
    
    .table-input:focus {
        outline: none;
        border-color: #2196f3;
        box-shadow: 0 0 0 2px rgba(33, 150, 243, 0.2);
    }
    
    /* Mejora visual para los contenedores de score/status */
    .score-status-container {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }
    
    .score-status-container input,
    .score-status-container select {
        margin-bottom: 2px;
    }
    
    /* Estilos para switches */
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
        background-color: #A4D65E;
    }
    
    input:checked + .slider:before {
        transform: translateX(26px);
    }
`;

document.head.appendChild(document.createElement('style')).textContent = colorStyles;

   // Función para agregar listeners a los switches
        function addSwitchListeners() {
            // Listener para el switch de Resit
            $('.resit-switch').on('change', function() {
                const isChecked = $(this).is(':checked');
                const row = $(this).closest('tr');
                
                row.find('.module-select, .resit-intentos, .resit-periodos, .resit-restantes, .resit-limite')
                   .prop('disabled', !isChecked)
                   .toggleClass('disabled-field', !isChecked);
                
                // Si se desactiva el resit, limpiar campos relacionados
                if (!isChecked) {
                    row.find('.module-select').val('');
                    row.find('.resit-intentos').val('');
                    row.find('.resit-periodos').val('');
                    row.find('.resit-restantes').val('');
                    row.find('.resit-limite').val('');
                }
                
                // Validar el estado de la fila
                validateRowStatus(row);
            });

            $('.resit-switch-inmediato').on('change', function() {
                const isChecked = $(this).is(':checked');
                const row = $(this).closest('tr');
                
                row.find('.resit-inmediato-date, .resit-inmediato-score, .resit-inmediato-status')
                   .prop('disabled', !isChecked)
                   .toggleClass('disabled-field', !isChecked);
                
                // Si se desactiva el resit, limpiar campos relacionados
                if (!isChecked) {
                    row.find('.resit-inmediato-date').val('');
                    row.find('.resit-inmediato-score').val('');
                    row.find('.resit-inmediato-status').val('');
                }
                
                // Validar el estado de la fila
                validateRowStatus(row);
            });

            $('.resit-switch-programado').on('change', function() {
                const isChecked = $(this).is(':checked');
                const row = $(this).closest('tr');
                
                row.find('.entrenamiento-adi, .folio-proyecto, .resit-programado-fecha, .resit-programado-score, .resit-programado-status')
                   .prop('disabled', !isChecked)
                   .toggleClass('disabled-field', !isChecked);
                
                // Si se desactiva el resit, limpiar campos relacionados
                if (!isChecked) {
                    row.find('.entrenamiento-adi').val('');
                    row.find('.folio-proyecto').val('');
                    row.find('.resit-programado-fecha').val('');
                    row.find('.resit-programado-score').val('');
                    row.find('.resit-programado-status').val('');
                }
                
                // Validar el estado de la fila
                validateRowStatus(row);
            });
            
            // Listener para el switch de Certified
            $('.certified-switch').on('change', function() {
                const isChecked = $(this).is(':checked');
                const row = $(this).closest('tr');
                
                row.find('.expiration-date')
                   .prop('disabled', !isChecked)
                   .toggleClass('disabled-field', !isChecked);
                
                // Si se desactiva certified, limpiar campo de expiración
                if (!isChecked) {
                    row.find('.expiration-date').val('');
                }
            });
        }

        // Función para agregar listeners de validación
        function addValidationListeners() {
            // Listeners para cambios en los status de Practical, Equipament y P&P
            $('.practical-status, .equipament-status, .pyp-status').on('change', function() {
                const row = $(this).closest('tr');
                validateRowStatus(row);
            });
            
            // Listener para cambios en el resultado del Resit
            $('.resit-status, .resit-inmediato-status, .resit-programado-status').on('change', function() {
                const row = $(this).closest('tr');
                validateRowStatus(row);
            });
        }
function validateRowStatus(row) {
    const practicalStatus = row.find('.practical-status').val();
    const equipamentStatus = row.find('.equipament-status').val();
    const pypStatus = row.find('.pyp-status').val();
    const resitStatus = row.find('.resit-status').val();
    const resitInmediatoStatus = row.find('.resit-inmediato-status').val();
    const resitProgramadoStatus = row.find('.resit-programado-status').val();

    const resitSwitch = row.find('.resit-switch');
    const resitInmediatoSwitch = row.find('.resit-switch-inmediato');
    const resitProgramadoSwitch = row.find('.resit-switch-programado');

    const statusSelect = row.find('.status-select');
    const moduleResit = row.find('.module-select');

    const finalStatusSelect = row.find('.final-status-select');
    const certifiedSwitch = row.find('.certified-switch');
    const expirationDate = row.find('.expiration-date');

    // Reset clases
    row.removeClass('row-pass row-unpass row-pending row-inprogress');
    statusSelect.removeClass('status-pending status-inprogress status-completed status-failed');
    finalStatusSelect.removeClass('final-pass final-failed');
    row.find('.resit-inmediato-status').removeClass('resit-pass resit-failed');
    row.find('.resit-programado-status').removeClass('resit-pass resit-failed');


    // Aplicar colores a campos individuales
    row.find('.practical-status, .practical-score')
        .removeClass('pass-status unpass-status')
        .addClass(practicalStatus === 'Pass' ? 'pass-status' : (practicalStatus === 'Unpass' ? 'unpass-status' : ''));

    row.find('.equipament-status, .equipament-score')
        .removeClass('pass-status unpass-status')
        .addClass(equipamentStatus === 'Pass' ? 'pass-status' : (equipamentStatus === 'Unpass' ? 'unpass-status' : ''));

    row.find('.pyp-status, .pyp-score')
        .removeClass('pass-status unpass-status')
        .addClass(pypStatus === 'Pass' ? 'pass-status' : (pypStatus === 'Unpass' ? 'unpass-status' : ''));

    // Validar resit-status
    if (resitInmediatoStatus === 'Pass') {
        // Todo verde
        console.log("resit inmediato es pass");
        row.find('.resit-inmediato-status').addClass('resit-pass').removeClass('resit-failed');
        finalStatusSelect.val('Pass').addClass('final-pass').removeClass('final-failed');
        row.addClass('row-pass');
        certifiedSwitch.prop('checked', true);
        expirationDate.prop('disabled', false).removeClass('disabled-field');
        statusSelect.val('Completed').addClass('status-completed');
    } 
     if (resitInmediatoStatus === 'Unpass') {
        // Todo rojo
        console.log("resit inmediato es unpass");
        row.find('.resit-inmediato-status').addClass('resit-failed').removeClass('resit-pass');
        // finalStatusSelect.val('Unpass').addClass('final-failed').removeClass('final-pass');
        // row.addClass('row-unpass');
        certifiedSwitch.prop('checked', false);
        expirationDate.prop('disabled', true).addClass('disabled-field');
        // statusSelect.val('Failed').addClass('status-failed');
    }
    if (resitProgramadoStatus === 'Pass') {
        // Todo verde
        console.log("resit programado es pass");
        row.find('.resit-programado-status').addClass('resit-pass').removeClass('resit-failed');
        finalStatusSelect.val('Pass').addClass('final-pass').removeClass('final-failed');
        row.addClass('row-pass');
        certifiedSwitch.prop('checked', true);
        expirationDate.prop('disabled', false).removeClass('disabled-field');
        statusSelect.val('Completed').addClass('status-completed');
    } 
     if (resitProgramadoStatus === 'Unpass') {
        // Todo rojo
        console.log("resit programado es unpass");
        row.find('.resit-programado-status').addClass('resit-failed').removeClass('resit-pass');
        finalStatusSelect.val('Unpass').addClass('final-failed').removeClass('final-pass');
        row.addClass('row-unpass');
        certifiedSwitch.prop('checked', false);
        expirationDate.prop('disabled', true).addClass('disabled-field');
    }
        console.log("else de none");
        // Si resit-status está vacío o no válido, calcular según otras reglas
        const allEmpty = !practicalStatus && !equipamentStatus && !pypStatus;
        const allPass = practicalStatus === 'Pass' && equipamentStatus === 'Pass' && pypStatus === 'Pass';
        const anyUnpass = practicalStatus === 'Unpass' || equipamentStatus === 'Unpass' || pypStatus === 'Unpass';

        if (allEmpty) {
            statusSelect.val('Pending').addClass('status-pending');
            finalStatusSelect.val('').removeClass('final-pass final-failed');
            certifiedSwitch.prop('checked', false);
            expirationDate.prop('disabled', true).addClass('disabled-field');
            row.addClass('row-pending');
        } else if (allPass) {
            statusSelect.val('Completed').addClass('status-completed');
            finalStatusSelect.val('Pass').addClass('final-pass');
            resitSwitch.prop('checked', false);
            certifiedSwitch.prop('checked', true);
            expirationDate.prop('disabled', false).removeClass('disabled-field');
            row.addClass('row-pass');
        } else if (anyUnpass) {
            // Revisar qué módulos tienen Unpass
            let unpassModules = [];
            if (practicalStatus === 'Unpass') unpassModules.push('Practical');
            if (equipamentStatus === 'Unpass') unpassModules.push('Equipament');
            if (pypStatus === 'Unpass') unpassModules.push('P&P');

            if (unpassModules.length === 1) {
                // Solo 1 módulo reprobado → activar resit automático
                resitSwitch.prop('checked', true);
                row.find('.module-select, .resit-intentos')
                    .prop('disabled', false)
                    .removeClass('disabled-field');

                statusSelect.val('Failed').addClass('status-failed');

                // Asignar automáticamente el módulo reprobado
                moduleResit.val(unpassModules[0]);
            } else {
                // Más de 1 módulo reprobado → lógica de reprobado final
                statusSelect.val('Failed').addClass('status-failed');
                finalStatusSelect.val('Unpass')
                    .addClass('final-failed')
                    .removeClass('final-pass');

                resitSwitch.prop('checked', false);
                certifiedSwitch.prop('checked', false);

                moduleResit.val('');
                moduleResit.prop('disabled', true).addClass('disabled-field');

                expirationDate.prop('disabled', true).addClass('disabled-field');
                row.addClass('row-unpass');
            }

        } else {
            statusSelect.val('In Progress').addClass('status-inprogress');
            finalStatusSelect.val('').removeClass('final-pass final-failed');
            certifiedSwitch.prop('checked', false);
            expirationDate.prop('disabled', true).addClass('disabled-field');
            row.addClass('row-inprogress');
        }
    
}





    

function formatDateForInput(dateString) {
    if (!dateString) return '';
    const date = new Date(dateString);
    if (isNaN(date.getTime())) {
        if (dateString.includes('/')) {
            const parts = dateString.split('/');
            if (parts.length === 3) {
                return `${parts[2]}-${parts[1].padStart(2, '0')}-${parts[0].padStart(2, '0')}`;
            }
        }
        return '';
    }
    return date.toISOString().split('T')[0];
}


    function addNewRow() {
    const tbody = $('#edit-candidate-table tbody');
    
    // Si está vacío, limpiar el mensaje de no datos
    if (tbody.children().length === 1 && tbody.find('.text-muted').length) {
        tbody.empty();
    }
    
    const rowCount = tbody.children().length;
    const newRow = `
        <tr data-candidate-id="" class="candidate-row new-row">
            <td class="text-center fw-bold">${rowCount + 1}</td>
            <td><textarea class="table-input textarea" name="company" placeholder="Nombre de empresa"></textarea></td>
            <td><textarea class="table-input textarea" name="cr" placeholder="CR"></textarea></td>
            <td><textarea class="table-input textarea" name="lastname" placeholder="Apellido"></textarea></td>
            <td><textarea class="table-input textarea" name="firstname" placeholder="Nombre"></textarea></td>
            <td><textarea class="table-input textarea" name="mdname" placeholder="Segundo nombre"></textarea></td>
            <td><input class="table-input" type="date" name="dob" /></td>
            <td><textarea class="table-input textarea" name="id_number" placeholder="Número de ID"></textarea></td>
            <td>
                <select class="table-input membership-select" name="membership">
                    <option value="">Seleccionar...</option>
                    <option value="Basic">Basic</option>
                    <option value="Premium">Premium</option>
                    <option value="Pro">Pro</option>
                    <option value="Enterprise">Enterprise</option>
                </select>
            </td>
            <td><input class="table-input" type="email" name="email" placeholder="correo@ejemplo.com" /></td>
            <td><input class="table-input" type="password" name="password" placeholder="Contraseña" /></td>
            <td>
                <div class="status-switch-container">
                    <label class="status-switch">
                        <input type="checkbox" name="status" checked>
                        <span class="status-slider"></span>
                    </label>
                    <span class="status-label active">Activo</span>
                </div>
            </td>
            <td class="table-row-actions">
                <div class="action-buttons">
                    <button class="btn btn-danger btn-action" onclick="deleteCandidate(this, null)" title="Eliminar candidato">
                        <i class="fas fa-trash"></i>
                    </button>
                    <button class="btn btn-info btn-action" onclick="togglePassword(this)" title="Mostrar/ocultar contraseña">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </td>
        </tr>
    `;
    
    tbody.append(newRow);
    updateRowCount(tbody.find('.candidate-row').length);
}

    function deleteCandidate(button, candidateId) {
        if (candidateId && !confirm('¿Estás seguro de que quieres eliminar este candidato?')) {
            return;
        }
        
        const row = $(button).closest('tr');
        row.addClass('table-danger');
        
        setTimeout(() => {
            row.remove();
            updateRowCount($('#edit-candidate-table tbody .candidate-row').length);
            
            // Si no quedan filas, mostrar mensaje
            if ($('#edit-candidate-table tbody .candidate-row').length === 0) {
                $('#edit-candidate-table tbody').html(`
                    <tr>
                        <td colspan="11" class="text-center text-muted py-5">
                            <i class="fas fa-users fa-3x mb-3"></i>
                            <p>No hay candidatos registrados</p>
                            <button class="btn btn-primary btn-sm" onclick="addNewRow()">
                                <i class="fas fa-plus me-1"></i> Agregar primer candidato
                            </button>
                        </td>
                    </tr>
                `);
            }
        }, 300);
    }

    function togglePassword(button) {
        const input = $(button).closest('tr').find('input[name="password"]');
        const type = input.attr('type');
        const newType = type === 'password' ? 'text' : 'password';
        input.attr('type', newType);
        $(button).find('i').toggleClass('fa-eye fa-eye-slash');
    }

    function filterTable() {
        const searchText = $('#searchInput').val().toLowerCase();
        $('.candidate-row').each(function() {
            const rowText = $(this).text().toLowerCase();
            $(this).toggle(rowText.includes(searchText));
        });
    }

    function updateRowCount(count) {
        $('#rowCount').text(`${count} candidato${count !== 1 ? 's' : ''}`);
    }

function saveCandidateTable() {
    let tableData = [];
    $('#edit-candidate-table tbody tr').each(function() {
        let row = {};
        $(this).find('td').each(function(index) {
            const value = $(this).find('input').val();
            switch(index){
                case 0: row.id = value; break;
                case 1: row.empresa = value; break;
                case 2: row.cr = value; break;
                case 3: row.lastname = value; break;
                case 4: row.firstname = value; break;
                case 5: row.mdname = value; break;
                case 6: row.dob = value; break;
                case 7: row.id = value; break;
                case 8: row.email = value; break;
                case 9: row.password = value; break;
            }
        });
        tableData.push(row);
    });

    $.ajax({
        url: '/saveCandidateTable', // Cambia por tu ruta de guardado en Laravel
        method: 'POST',
        data: { data: tableData, _token: '{{ csrf_token() }}' },
        success: function(response){
            alert('Cambios guardados correctamente');
            $('#editarCandidatosModal').modal('hide');
        }
    });
}



$("#cursobtnModal").click(function (e) {
    e.preventDefault();
    formularioValido = validarFormulario($('#coursesForm'));
   
    if (formularioValido) {
        const formData = new FormData(document.getElementById('coursesForm'));
        formData.append('api', 2);
        formData.append('ID_PROJECT', ID_PROJECT);

          const dataToSend = {
            api: 2,
            ID_PROJECT: ID_PROJECT,
            formData: formData
        };

        console.log('Datos a enviar:', [...formData.entries()]);
            alertMensajeConfirm({
                title: "¿Desea guardar la información?",
                text: "Se creará este proyecto",
                icon: "question",
            }, async function () {
                await loaderbtn('cursobtnModal')
                await ajaxAwaitFormData( { api: 1, ID_PROJECT: ID_PROJECT }, 'cursoSave', 'coursesForm', 'cursobtnModal', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    alertMensaje('success', 'Información guardada correctamente', 'Esta información esta lista para usarse', null, null, 1500)
                    document.getElementById('coursesForm').reset();
                    loadTableCursoModal();
                })
            }, 1)

    } else {
        alertToast('Por favor, complete todos los campos del formulario.', 'error', 2000)
    }
});




</script>

@endsection
@php
$css_identifier = 'detailsProject';
@endphp