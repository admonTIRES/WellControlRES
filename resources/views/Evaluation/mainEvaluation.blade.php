@extends('Template/maestraUser')
@section('contenido') 
<div class="main">
    <div class="dashboard-container">
        <!-- Stats Header -->
        <div class="stats-header">
            <div class="stat-card fade-in-left">
                <div class="stat-top-levels">
                 <div class="stat-blank">1</div>
                        <img src="/assets/images/evaluation/elements/star3.png" alt="level">
                        <img src="/assets/images/evaluation/elements/star3.png" alt="level">
                        <img src="/assets/images/evaluation/elements/star3.png" alt="level">
                        <img src="/assets/images/evaluation/elements/star3gray.png" alt="level">
                        <img src="/assets/images/evaluation/elements/star3gray.png" alt="level">
                 <div class="stat-blank">1</div>
                </div>
                <div class="stat-category">NIVEL</div>
            </div>
            
            <div class="stat-card fade-in-up">
                <div class="stat-top">
                    <div class="stat-blank">1</div>
                    <div class="stat-content">
                        <div class="stat-label">Experto en pozo</div>
                    </div>
                    <div class="insignia-icon"> 
                        <img src="/assets/images/evaluation/elements/expertC.png" alt="racha">
                    </div>
                </div>
                <div class="stat-category">INSIGNIA</div>
            </div>
            <div class="stat-card fade-in-up">
                <div class="stat-top">
                    <div class="stat-number">3</div>
                    <div class="stat-content">
                        <div class="stat-label">Completadas</div>
                    </div>
                    <div class="progress-icon"> 
                        <img src="/assets/images/evaluation/elements/medalla3.png" alt="racha">
                    </div>
                </div>
                 <div class="stat-category">PROGRESO</div>
            </div>

            <div class="stat-card fade-in-right">
                <div class="stat-top">
                    <div class="stat-number">6</div>
                    <div class="stat-content">
                        <div class="stat-label">Pendientes</div>
                    </div>
                    <div class="activities-icon"> 
                        <img src="/assets/images/evaluation/elements/calendar6.png" alt="racha">
                    </div>
                </div>
                <div class="stat-category">ACTIVIDADES</div>
            </div>

        </div>

    </div>
    <div class="main-content">
        <div class="main-left">
            <div class="main-title-card fade-in-left">
                <img src="/assets/images/evaluation/inge.png" alt="Ingeniero" class="engineer-image">
                <div class="title-content">
                    <div class="main-title">Evaluaciones</div>
                    <h2 class="subtitle">de Control de Pozos</h2>
                </div>
            </div>
            
            <div class="bottom-section">
                <div class="slide fade-in-left">
                    <div class="slide-inner">
                        <input class="slide-open" type="radio" id="slide-1" 
                            name="slide" aria-hidden="true" hidden="" checked="checked">
                        <div class="slide-item">
                            <div class="slide-texts"> 
                                <div class="slide-title">Progreso evolutivo</div> 
                                <div class="slide-text">Desarrolla habilidades clave a través de exámenes prácticos diseñados por expertos.</div>
                            </div>
                            <img src="/assets/images/evaluation/petroleros6.jpg">
                        </div>
                        <input class="slide-open" type="radio" id="slide-2" 
                            name="slide" aria-hidden="true" hidden="">
                        <div class="slide-item">
                            <div class="slide-texts"> 
                                <div class="slide-title">Simulación real de examen</div> 
                                <div class="slide-text">Practica con exámenes que replican el formato y condiciones del examen final ante IWCF o IADC.</div>
                            </div>
                            <img src="/assets/images/evaluation/petroleros2.jpg">
                        </div>
                        <input class="slide-open" type="radio" id="slide-3" 
                            name="slide" aria-hidden="true" hidden="">
                        <div class="slide-item">
                            <div class="slide-texts"> 
                                <div class="slide-title">Interfaz adaptable y amigable</div> 
                                <div class="slide-text">Accede desde cualquier dispositivo y mantén tu progreso en cada sesión, estés donde estés.</div>
                            </div>
                            <img src="/assets/images/evaluation/petroleros5.jpg">
                        </div>
                        <label for="slide-3" class="slide-control prev control-1">‹</label>
                        <label for="slide-2" class="slide-control next control-1">›</label>
                        <label for="slide-1" class="slide-control prev control-2">‹</label>
                        <label for="slide-3" class="slide-control next control-2">›</label>
                        <label for="slide-2" class="slide-control prev control-3">‹</label>
                        <label for="slide-1" class="slide-control next control-3">›</label>
                        <ol class="slide-indicador">
                            <li>
                                <label for="slide-1" class="slide-circulo">•</label>
                            </li>
                            <li>
                                <label for="slide-2" class="slide-circulo">•</label>
                            </li>
                            <li>
                                <label for="slide-3" class="slide-circulo">•</label>
                            </li>
                        </ol>
                    </div>
                </div>

            
                <div class="content-card fade-in-right">
                    <div class="content-title">Contenido</div>
                    <div class="content-text-number">
                        <div class="content-number">5</div>
                        <div class="content-text"> evaluaciones  <br>de práctica</div>
                    </div>
                    <div class="content-plus">
                        +
                    </div>
                    <div class="content-description">
                        nuevas asignaciones durante <br>tu curso de <strong>Control de Pozos</strong>
                    </div>
                    <img src="/assets/images/evaluation/inge2.png" alt="Trabajador" class="content-workers-image">
                </div>
            </div>
        </div>
        
        <div class="welcome-card fade-in-right">
            <div class="welcome-title">Bienvenido, Ingeniero.</div>
            <div class="welcome-subtitle">Soy RIPER!</div>
            <div class="welcome-subtitle">seré tu ayudante en este curso de Control de Pozos</div>
            
            <div class="mascot-container">
                <div class="mascot-character">
                    <img src="/assets/images/principal/castorSaludando.png" alt="Ingeniero" >
                </div>
                <div class="mascot-base">
                    <img src="/assets/images/principal/pasto.png" alt="Ingeniero" >
                </div>
            </div>
        </div>
    </div>
    
</div>

<script src="/js/Evaluation/Evaluation.js?v=1.0"></script>
@endsection

@php
    $css_identifier = 'evaluation';
@endphp
