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
            <div class="col-sm-12 mt-4">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="dashboard-header-modern mb-4">
                            <div>
                                <h4 class="fw-bold mb-1">
                                    <i class="fas fa-chart-line text-primary"></i> {{ __('Course Overview') }}
                                </h4>
                                <p class="text-muted mb-0">{{ __('Resumen ejecutivo del proyecto') }}</p>
                            </div>
                        </div>
                        <div class="modern-grid">
                             <div class="modern-card gradient-success">
                                <div class="card-icon-wrapper">
                                    <i class="fas fa-hashtag" style="color:white"></i>
                                </div>
                                <div class="card-content">
                                    <span class="card-label">{{ __('Folio de proyecto') }}</span>
                                    <h5 class="card-value">{{ $proyect->FOLIO_PROJECT ?? __('N/A') }}</h5>
                                </div>
                            </div>
                             <div class="modern-card gradient-danger">
                                <div class="card-icon-wrapper">
                                    <i class="fas fa-book-open" style="color:white"></i>
                                </div>
                                <div class="card-content">
                                    <span class="card-label">{{ __('Course Name') }}</span>
                                    <h5 class="card-value">{{ $NOMBRE_PROYECTO ?? __('N/A') }}</h5>
                                </div>
                            </div>
                             <div class="modern-card gradient-teal">
                                <div class="card-icon-wrapper">
                                    <i class="fas fa-award" style="color:white"></i>
                                </div>
                                <div class="card-content">
                                    <span class="card-label">{{ __('Accrediting Entity') }}</span>
                                    <h5 class="card-value">{{ $nombreEnte }}</h5>
                                </div>
                            </div>
                            <div class="modern-card gradient-blue">
                                <div class="card-icon-wrapper">
                                    <i class="fas fa-layer-group" style="color:white"></i>
                                </div>
                                <div class="card-content">
                                    <span class="card-label">{{ __('Accreditation Levels') }}</span>
                                    @if($nivelesAcreditacion->isNotEmpty())
                                        <div class="badges-container">
                                            @foreach($nivelesAcreditacion as $nivel)
                                                <span class="badge badge-modern badge-primary">
                                                    <i class="fas fa-check-circle"></i> {{ $nivel }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @else
                                        <h5 class="card-value text-muted">{{ __('N/A') }}</h5>
                                    @endif
                                </div>
                            </div>
                            <div class="modern-card gradient-orange">
                                <div class="card-icon-wrapper">
                                    <i class="fas fa-clipboard-list" style="color:white"></i>
                                </div>
                                <div class="card-content">
                                    <span class="card-label">{{ __('BOP Types') }}</span>
                                    @if($tiposBop->isNotEmpty())
                                        <div class="badges-container">
                                            @foreach($tiposBop as $bop)
                                                <span class="badge badge-modern badge-warning">
                                                    {{ $bop }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @else
                                        <h5 class="card-value text-muted">{{ __('N/A') }}</h5>
                                    @endif
                                </div>
                            </div>
                            <div class="modern-card gradient-warning">
                                <div class="card-icon-wrapper">
                                    <i class="fas fa-cogs" style="color:white"></i>
                                </div>
                                <div class="card-content">
                                    <span class="card-label">{{ __('Operation Type') }}</span>
                                    <h5 class="card-value">{{ $tipoOperacion->NOMBRE_OPERACION ?? __('N/A') }}</h5>
                                </div>
                            </div>
                             <div class="modern-card gradient-info">
                                <div class="card-icon-wrapper">
                                    <i class="fas fa-graduation-cap" style="color:white"></i>
                                </div>
                                <div class="card-content">
                                    <span class="card-label">{{ __('Course Type') }}</span>
                                    <h5 class="card-value">
                                        @if($proyect->COURSE_TYPE_PROJECT == 1)
                                            <span class="badge badge-soft-success">{{ __('Open') }}</span>
                                        @elseif($proyect->COURSE_TYPE_PROJECT == 2)
                                            <span class="badge badge-soft-warning">{{ __('Closed') }}</span>
                                        @else
                                            {{ __('N/A') }}
                                        @endif
                                    </h5>
                                </div>
                            </div>
                            
                            <div class="modern-card gradient-primary card-wide">
                                <div class="card-icon-wrapper">
                                    <i class="fas fa-calendar-alt" style="color:white"></i>
                                </div>
                                <div class="card-content">
                                    <span class="card-label">{{ __('Fechas del curso') }}</span>
                                    <div class="dates-grid-2col">
                                        <div class="date-item">
                                            <i class="fas fa-play-circle text-success" style="color:white"></i>
                                            <div>
                                                <div class="date-value">{{ $proyect->COURSE_START_DATE_PROJECT ? \Carbon\Carbon::parse($proyect->COURSE_START_DATE_PROJECT)->format('d/m/Y') : __('N/A') }}</div>
                                                <span class="date-label">{{ __('Inicio del curso') }}</span>
                                            </div>
                                        </div>
                                        <div class="date-item">
                                            <i class="fas fa-stop-circle text-danger" style="color:white"></i>
                                            <div>
                                                <div class="date-value">{{ $proyect->COURSE_END_DATE_PROJECT ? \Carbon\Carbon::parse($proyect->COURSE_END_DATE_PROJECT)->format('d/m/Y') : __('N/A') }}</div>
                                                <span class="date-label">{{ __('Final del curso') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modern-card gradient-purple">
                                <div class="card-icon-wrapper">
                                    <i class="fas fa-map-marker-alt" style="color:white"></i>
                                </div>
                                <div class="card-content">
                                    <span class="card-label">{{ __('Location') }}</span>
                                    <h5 class="card-value">{{ $proyect->CITY_PROJECT ?? __('N/A') }}</h5>
                                    @if($proyect->LOCATION_PROJECT)
                                        <span class="card-meta">{{ $proyect->LOCATION_PROJECT }}</span>
                                    @endif
                                </div>
                            </div>
                            <!-- Folio Card -->
                           
                             <div class="modern-card gradient-info card-wide-2">
                                <div class="card-icon-wrapper">
                                    <i class="fas fa-clipboard-check" style="color:white"></i>
                                </div>
                                <div class="card-content">
                                    <span class="card-label">{{ __('Fechas de exámenes') }}</span>
                                    <div class="exam-dates-grid">
                                        <div class="exam-item">
                                            <div class="exam-icon">
                                                <i class="fas fa-tools" style="color:white"></i>
                                            </div>
                                            <div>
                                                <span class="exam-type">{{ __('Examen práctico') }}</span>
                                                <div class="date-value">{{ $proyect->PRACTICAL_EXAM_DATE_PROJECT ? \Carbon\Carbon::parse($proyect->PRACTICAL_EXAM_DATE_PROJECT)->format('d/m/Y') : __('N/A') }}</div>
                                                @if($proyect->PRACTICAL_EXAM_TIME_PROJECT)
                                                    <span class="exam-time"><i class="fas fa-clock"></i> {{ $proyect->PRACTICAL_EXAM_TIME_PROJECT }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="exam-item">
                                            <div class="exam-icon">
                                                <i class="fas fa-book" style="color:white"></i>
                                            </div>
                                            <div>
                                                <span class="exam-type">{{ __('Examen teórico') }}</span>
                                                <div class="date-value">{{ $proyect->EXAM_DATE_PROJECT ? \Carbon\Carbon::parse($proyect->EXAM_DATE_PROJECT)->format('d/m/Y') : __('N/A') }}</div>
                                                @if($proyect->EXAM_TIME_PROJECT)
                                                    <span class="exam-time"><i class="fas fa-clock"></i> {{ $proyect->EXAM_TIME_PROJECT }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <!-- Course Type Card -->
                            <div class="modern-card gradient-pink">
                                <div class="card-icon-wrapper">
                                    <i class="fas fa-language" style="color:white"></i>
                                </div>
                                <div class="card-content">
                                    <span class="card-label">{{ __('Exam Language') }}</span>
                                    <h5 class="card-value">{{ $idiomaProject->NOMBRE_IDIOMA ?? __('N/A') }}</h5>
                                </div>
                            </div>

                             <div class="modern-card gradient-warning card-wide">
                                <div class="card-icon-wrapper">
                                    <i class="fas fa-chalkboard-teacher" style="color:white"></i>
                                </div>
                                <div class="card-content">
                                    <span class="card-label">{{ __('Asesores') }}</span>
                                    <h5 class="card-value">{{ $NOMBRE_INSTRUCTOR }}</h5>
                                    @if($proyect->INSTRUCTOR_EMAIL_PROJECT)
                                        <span class="card-meta">
                                            <i class="fas fa-envelope"></i> {{ $proyect->INSTRUCTOR_EMAIL_PROJECT }}
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <!-- Location Card -->
                           

                             <div class="modern-card gradient-teal card-wide">
                                <div class="card-icon-wrapper">
                                    <i class="fas fa-id-card" style="color:white"></i>
                                </div>
                                <div class="card-content">
                                    <span class="card-label">{{ __('Periodo de membresía') }}</span>
                                    <div class="dates-grid-2col">
                                        <div class="date-item">
                                            <i class="fas fa-user-check text-info"></i>
                                            <div>
                                                <div class="date-value">{{ $proyect->MEMBERSHIP_START_PROJECT ? \Carbon\Carbon::parse($proyect->MEMBERSHIP_START_PROJECT)->format('d/m/Y') : __('N/A') }}</div>
                                                <span class="date-label">{{ __('Inicio membresía') }}</span>
                                            </div>
                                        </div>
                                        <div class="date-item">
                                            <i class="fas fa-user-times text-warning"></i>
                                            <div>
                                                <div class="date-value">{{ $proyect->MEMBERSHIP_END_PROJECT ? \Carbon\Carbon::parse($proyect->MEMBERSHIP_END_PROJECT)->format('d/m/Y') : __('N/A') }}</div>
                                                <span class="date-label">{{ __('Fin membresía') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Course Name Card - Wide -->
                           

                            <!-- Language Card -->
                           

                            <!-- Certification Center Card - Wide -->
                            <div class="modern-card gradient-indigo">
                                <div class="card-icon-wrapper">
                                    <i class="fas fa-certificate" style="color:white"></i>
                                </div>
                                <div class="card-content">
                                    <span class="card-label">{{ __('Centro certificador') }}</span>
                                    <h5 class="card-value">{{ $centroCertificacion->NOMBRE_COMERCIAL_CENTRO ?? __('N/A') }}</h5>
                                    @if($proyect->CENTER_NUMBER_PROJECT)
                                        <span class="card-meta">
                                            <i class="fas fa-id-card"></i> Center #{{ $proyect->CENTER_NUMBER_PROJECT }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="modern-card gradient-primary">
                                <div class="card-icon-wrapper">
                                    <i class="fas fa-user-circle" style="color:white"></i>
                                </div>
                                <div class="card-content">
                                    <span class="card-label">{{ __('Contacto') }}</span>
                                    <h5 class="card-value">{{ $proyect->CONTACT_NAME_PROJEC ?? __('N/A') }}</h5>
                                    @if($proyect->CONTACT_PHONE_PROJECT)
                                        <span class="card-meta">
                                            <i class="fas fa-phone"></i> {{ $proyect->CONTACT_PHONE_PROJECT }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Operation Type Card -->
                            

                            <!-- Accrediting Entity Card -->
                           
                            <!-- Accreditation Levels Card -->
                            

                            <!-- BOP Types Card -->
                            

                            <!-- Students Statistics Card - Wide 2 -->
                            <div class="modern-card gradient-success card-wide-2">
                                <div class="card-icon-wrapper">
                                    <i class="fas fa-users" style="color:white"></i>
                                </div>
                                <div class="card-content">
                                    <span class="card-label">{{ __('Resumen de estudiantes') }}</span>
                                    <div class="stats-row">
                                        <div class="stat-item">
                                            <div class="stat-number">{{ $totalEstudiantes }}</div>
                                            <span class="stat-label">{{ __('Total') }}</span>
                                        </div>
                                        <div class="stat-item success">
                                            <div class="stat-number">{{ $estudiantesAprobados }}</div>
                                            <span class="stat-label">{{ __('Aprobados') }}</span>
                                        </div>
                                        <div class="stat-item danger">
                                            <div class="stat-number">{{ $estudiantesReprobados }}</div>
                                            <span class="stat-label">{{ __('Fallados') }}</span>
                                        </div>
                                        <div class="stat-item warning">
                                            <div class="stat-number">{{ $estudiantesPendientes }}</div>
                                            <span class="stat-label">{{ __('Deserción') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Course Dates Card - Wide -->
                           

                            <!-- Membership Dates Card - Wide -->
                           
                            <!-- Exam Dates Card - Wide 2 -->

                        </div>
                    </div>
                </div>
            </div>

<style>
/* Banner Moderno */
.banner-modern {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border-radius: 16px;
    overflow: hidden;
}

.banner-modern .card-body {
    padding: 2.5rem;
}

.banner-content {
    color: white;
}

.project-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255,255,255,0.2);
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-size: 0.875rem;
    font-weight: 600;
    margin-bottom: 1rem;
}

.project-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: white;
    margin-bottom: 0.75rem;
    text-shadow: 0 2px 10px rgba(0,0,0,0.2);
}

.project-subtitle {
    font-size: 1rem;
    color: rgba(255,255,255,0.9);
    margin-bottom: 0;
    line-height: 1.6;
}

.banner-illustration img {
    max-width: 100%;
    height: auto;
}

/* Dashboard Header */
.dashboard-header-modern h4 {
    font-size: 1.5rem;
    color: #1e293b;
}

.dashboard-header-modern p {
    font-size: 0.9375rem;
}

/* Modern Grid */
.modern-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 1.25rem;
}

/* Modern Card Base */
.modern-card {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    display: flex;
    gap: 1rem;
    align-items: flex-start;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.modern-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.modern-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);
}

.modern-card:hover::before {
    opacity: 1;
}

.card-wide {
    grid-column: span 2;
}

.card-wide-2 {
    grid-column: span 2;
}

@media (max-width: 768px) {
    .card-wide, .card-wide-2 {
        grid-column: span 1;
    }
}

/* Card Icon */
.card-icon-wrapper {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    background: var(--gradient);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.card-icon-wrapper i {
    font-size: 1.25rem;
    color: white;
}

/* Card Content */
.card-content {
    flex: 1;
    min-width: 0;
}

.card-label {
    display: block;
    font-size: 0.8125rem;
    font-weight: 600;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 0.5rem;
}

.card-value {
    font-size: 1.125rem;
    font-weight: 700;
    color: #1e293b;
    margin: 0;
    line-height: 1.3;
}

.card-meta {
    display: block;
    font-size: 0.875rem;
    color: #64748b;
    margin-top: 0.5rem;
}

.card-meta i {
    margin-right: 0.25rem;
    opacity: 0.7;
}

/* Badges Container */
.badges-container {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-top: 0.75rem;
}

.badge-modern {
    font-size: 0.8125rem;
    font-weight: 600;
    padding: 0.5rem 0.875rem;
    border-radius: 6px;
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
}

.badge-modern.badge-primary {
    background: #dbeafe;
    color: #1e40af;
}

.badge-modern.badge-warning {
    background: #fef3c7;
    color: #92400e;
}

.badge-soft-success {
    background: #d1fae5;
    color: #065f46;
    padding: 0.375rem 0.75rem;
    border-radius: 6px;
    font-size: 0.875rem;
    font-weight: 600;
}

.badge-soft-warning {
    background: #fef3c7;
    color: #92400e;
    padding: 0.375rem 0.75rem;
    border-radius: 6px;
    font-size: 0.875rem;
    font-weight: 600;
}

/* Stats Row */
.stats-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));
    gap: 1rem;
    margin-top: 1rem;
}

.stat-item {
    text-align: center;
    padding: 0.75rem;
    background: #f8fafc;
    border-radius: 8px;
}

.stat-number {
    font-size: 1.75rem;
    font-weight: 700;
    color: #1e293b;
    line-height: 1;
    margin-bottom: 0.25rem;
}

.stat-item.success .stat-number {
    color: #059669;
}

.stat-item.danger .stat-number {
    color: #dc2626;
}

.stat-item.warning .stat-number {
    color: #d97706;
}

.stat-label {
    font-size: 0.75rem;
    color: #64748b;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

/* Dates Grid 2 Columns */
.dates-grid-2col {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
    margin-top: 1rem;
}

@media (max-width: 576px) {
    .dates-grid-2col {
        grid-template-columns: 1fr;
    }
}

.date-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.75rem;
    background: #f8fafc;
    border-radius: 8px;
}

.date-item i {
    font-size: 1.5rem;
}

.date-value {
    font-size: 1rem;
    font-weight: 700;
    color: #1e293b;
    line-height: 1.2;
}

.date-label {
    font-size: 0.75rem;
    color: #64748b;
    font-weight: 500;
}

/* Exam Dates */
.exam-dates-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
    margin-top: 1rem;
}

.exam-item {
    display: flex;
    gap: 1rem;
    padding: 1rem;
    background: #f8fafc;
    border-radius: 8px;
}

.exam-icon {
    width: 40px;
    height: 40px;
    border-radius: 8px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.exam-icon i {
    color: white;
    font-size: 1.125rem;
}

.exam-type {
    display: block;
    font-size: 0.75rem;
    color: #64748b;
    font-weight: 600;
    text-transform: uppercase;
    margin-bottom: 0.25rem;
}

.exam-time {
    display: block;
    font-size: 0.8125rem;
    color: #64748b;
    margin-top: 0.25rem;
}

/* Gradient Variations */
.gradient-primary { --gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
.gradient-success { --gradient: linear-gradient(135deg, #10b981 0%, #059669 100%); }
.gradient-info { --gradient: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%); }
.gradient-warning { --gradient: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); }
.gradient-danger { --gradient: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); }
.gradient-purple { --gradient: linear-gradient(135deg, #a855f7 0%, #9333ea 100%); }
.gradient-pink { --gradient: linear-gradient(135deg, #ec4899 0%, #db2777 100%); }
.gradient-indigo { --gradient: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); }
.gradient-teal { --gradient: linear-gradient(135deg, #14b8a6 0%, #0d9488 100%); }
.gradient-blue { --gradient: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); }
.gradient-orange { --gradient: linear-gradient(135deg, #fb923c 0%, #f97316 100%); }

/* Responsive */
@media (max-width: 992px) {
    .project-title {
        font-size: 2rem;
    }
    
    .modern-grid {
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    }
}

@media (max-width: 576px) {
    .banner-modern .card-body {
        padding: 1.5rem;
    }
    
    .project-title {
        font-size: 1.5rem;
    }
    
    .modern-grid {
        grid-template-columns: 1fr;
    }
    
    .dates-grid-2col,
    .exam-dates-grid {
        grid-template-columns: 1fr;
    }
}
</style>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="w-100 h-100">
                            <h4>Tabla de candidatos</h4>
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
                            <h4>Tabla de calificaciones del curso</h4>
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
                            <button class="btn btn-warning" onclick="addNewRow()">
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
                         <button class="btn btn-warning btn-save" id="candidatebtnModal">
                        <i class="fas fa-save me-2"></i>Guardar Cambios
                    </button>
                    <button type="button" class="btn btn-secondary btn-modern" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>Cerrar
                    </button>
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
                <h5 class="modal-title"><i class="fas fa-users me-2"></i>Tabla de calificaciones del curso</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div style="padding: 1vw;">
                    <form id="coursesForm">
                        {!! csrf_field() !!}  
                        <table class="table table-modern" id="edit-course-table">
                            <thead>
                                <tr>
                                    <th  colspan="5" class="text-center">Generalidades</th>
                                    <th  colspan="1" class="text-center">Examen prático</th>
                                    <th  colspan="2" class="text-center">Examen teórico</th>
                                    <th  colspan="4" class="text-center" id="encabezadoComplementos">Complementos</th>
                                    <th  colspan="1" class="text-center" >RESUMEN</th>
                                    <th  colspan="6" class="text-center" >RE-SIT</th>
                                    <th  colspan="4" class="text-center" > RE-SIT INMEDIATO</th>
                                    <th  colspan="6" class="text-center" > RE-SIT PROGRAMADO</th>
                                    <th  colspan="1" class="text-center" > FINAL</th>
                                    <th  colspan="5" class="text-center" > Certificación</th>
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
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <div class="footer-actions">
                     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#notasModal" style="margin-bottom: 1vw;">
                    Ver Notas
                    </button>
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