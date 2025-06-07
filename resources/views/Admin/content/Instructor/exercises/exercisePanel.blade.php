@extends('Template/maestraAdmin')
@section('contenido')
<main class="main-content">
    <div class="position-relative">
        <!--Nav Start-->
        <nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
            <div class="container-fluid navbar-inner">
                <a href="../dashboard/index.html" class="navbar-brand">
                </a>
                <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                    <i class="icon">
                        <svg width="20px" height="20px" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                        </svg>
                    </i>
                </div>
                <h4 class="title text-primary">Instructor</h4>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <span class="navbar-toggler-bar bar1 mt-2"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto  navbar-list mb-2 mb-lg-0 align-items-center">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link" id="mail-drop" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4" d="M22 15.94C22 18.73 19.76 20.99 16.97 21H16.96H7.05C4.27 21 2 18.75 2 15.96V15.95C2 15.95 2.006 11.524 2.014 9.298C2.015 8.88 2.495 8.646 2.822 8.906C5.198 10.791 9.447 14.228 9.5 14.273C10.21 14.842 11.11 15.163 12.03 15.163C12.95 15.163 13.85 14.842 14.56 14.262C14.613 14.227 18.767 10.893 21.179 8.977C21.507 8.716 21.989 8.95 21.99 9.367C22 11.576 22 15.94 22 15.94Z" fill="currentColor"></path>
                                    <path d="M21.4759 5.67351C20.6099 4.04151 18.9059 2.99951 17.0299 2.99951H7.04988C5.17388 2.99951 3.46988 4.04151 2.60388 5.67351C2.40988 6.03851 2.50188 6.49351 2.82488 6.75151L10.2499 12.6905C10.7699 13.1105 11.3999 13.3195 12.0299 13.3195C12.0339 13.3195 12.0369 13.3195 12.0399 13.3195C12.0429 13.3195 12.0469 13.3195 12.0499 13.3195C12.6799 13.3195 13.3099 13.1105 13.8299 12.6905L21.2549 6.75151C21.5779 6.49351 21.6699 6.03851 21.4759 5.67351Z" fill="currentColor"></path>
                                </svg>
                                <span class="bg-primary count-mail"></span>
                            </a>
                            <div class="sub-drop dropdown-menu dropdown-menu-end p-0" aria-labelledby="mail-drop">
                                <div class="card shadow-none m-0">
                                    <div class="card-header d-flex justify-content-between bg-primary py-3">
                                        <div class="header-title">
                                            <h5 class="mb-0 text-white">Mensajes</h5>
                                        </div>
                                    </div>
                                    <div class="card-body p-0 ">
                                        <a href="#" class="iq-sub-card">
                                            <div class="d-flex  align-items-center">
                                                <div class="">
                                                    <img class="avatar-40 rounded-pill bg-soft-primary p-1" src="../assets/images/Colorlargo.png" alt="">
                                                </div>
                                                <div class=" w-100 ms-3">
                                                    <h6 class="mb-0 ">Bni Emma Watson</h6>
                                                    <small class="float-left font-size-12">13 Jun</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="iq-sub-card">
                                            <div class="d-flex align-items-center">
                                                <div class="">
                                                    <img class="avatar-40 rounded-pill bg-soft-primary p-1" src="../assets/images/Colorlargo.png" alt="">
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="mb-0 ">Lorem Ipsum Watson</h6>
                                                    <small class="float-left font-size-12">20 Apr</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="iq-sub-card">
                                            <div class="d-flex align-items-center">
                                                <div class="">
                                                    <img class="avatar-40 rounded-pill bg-soft-primary p-1" src="../assets/images/Colorlargo.png" alt="">
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="mb-0 ">Why do we use it?</h6>
                                                    <small class="float-left font-size-12">30 Jun</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="iq-sub-card">
                                            <div class="d-flex align-items-center">
                                                <div class="">
                                                    <img class="avatar-40 rounded-pill bg-soft-primary p-1" src="../assets/images/Colorlargo.png" alt="">
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="mb-0 ">Variations Passages</h6>
                                                    <small class="float-left font-size-12">12 Sep</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="iq-sub-card">
                                            <div class="d-flex align-items-center">
                                                <div class="">
                                                    <img class="avatar-40 rounded-pill bg-soft-primary p-1" src="../assets/images/Colorlargo.png" alt="">
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="mb-0 ">Lorem Ipsum generators</h6>
                                                    <small class="float-left font-size-12">5 Dec</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link" id="notification-drop" data-bs-toggle="dropdown">
                                <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.7695 11.6453C19.039 10.7923 18.7071 10.0531 18.7071 8.79716V8.37013C18.7071 6.73354 18.3304 5.67907 17.5115 4.62459C16.2493 2.98699 14.1244 2 12.0442 2H11.9558C9.91935 2 7.86106 2.94167 6.577 4.5128C5.71333 5.58842 5.29293 6.68822 5.29293 8.37013V8.79716C5.29293 10.0531 4.98284 10.7923 4.23049 11.6453C3.67691 12.2738 3.5 13.0815 3.5 13.9557C3.5 14.8309 3.78723 15.6598 4.36367 16.3336C5.11602 17.1413 6.17846 17.6569 7.26375 17.7466C8.83505 17.9258 10.4063 17.9933 12.0005 17.9933C13.5937 17.9933 15.165 17.8805 16.7372 17.7466C17.8215 17.6569 18.884 17.1413 19.6363 16.3336C20.2118 15.6598 20.5 14.8309 20.5 13.9557C20.5 13.0815 20.3231 12.2738 19.7695 11.6453Z" fill="currentColor"></path>
                                    <path opacity="0.4" d="M14.0088 19.2283C13.5088 19.1215 10.4627 19.1215 9.96275 19.2283C9.53539 19.327 9.07324 19.5566 9.07324 20.0602C9.09809 20.5406 9.37935 20.9646 9.76895 21.2335L9.76795 21.2345C10.2718 21.6273 10.8632 21.877 11.4824 21.9667C11.8123 22.012 12.1482 22.01 12.4901 21.9667C13.1083 21.877 13.6997 21.6273 14.2036 21.2345L14.2026 21.2335C14.5922 20.9646 14.8734 20.5406 14.8983 20.0602C14.8983 19.5566 14.4361 19.327 14.0088 19.2283Z" fill="currentColor"></path>
                                </svg>
                                <span class="bg-danger dots"></span>
                            </a>
                            <div class="sub-drop dropdown-menu dropdown-menu-end p-0" aria-labelledby="notification-drop">
                                <div class="card shadow-none m-0">
                                    <div class="card-header d-flex justify-content-between bg-primary py-3">
                                        <div class="header-title">
                                            <h5 class="mb-0 text-white">Notificaciones</h5>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <a href="#" class="iq-sub-card">
                                            <div class="d-flex align-items-center">
                                                <img class="avatar-40 rounded-pill bg-soft-primary p-1" src="../assets/images/Colorlargo.png" alt="">
                                                <div class="ms-3 w-100">
                                                    <h6 class="mb-0 ">Emma Watson Bni</h6>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="mb-0">95 MB</p>
                                                        <small class="float-right font-size-12">Just Now</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="iq-sub-card">
                                            <div class="d-flex align-items-center">
                                                <div class="">
                                                    <img class="avatar-40 rounded-pill bg-soft-primary p-1" src="../assets/images/Colorlargo.png" alt="">
                                                </div>
                                                <div class="ms-3 w-100">
                                                    <h6 class="mb-0 ">New customer is join</h6>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="mb-0">Cyst Bni</p>
                                                        <small class="float-right font-size-12">5 days ago</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="iq-sub-card">
                                            <div class="d-flex align-items-center">
                                                <img class="avatar-40 rounded-pill bg-soft-primary p-1" src="../assets/images/Colorlargo.png" alt="">
                                                <div class="ms-3 w-100">
                                                    <h6 class="mb-0 ">Two customer is left</h6>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="mb-0">Cyst Bni</p>
                                                        <small class="float-right font-size-12">2 days ago</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="iq-sub-card">
                                            <div class="d-flex align-items-center">
                                                <img class="avatar-40 rounded-pill bg-soft-primary p-1" src="../assets/images/Colorlargo.png" alt="">
                                                <div class="w-100 ms-3">
                                                    <h6 class="mb-0 ">New Mail from Fenny</h6>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="mb-0">Cyst Bni</p>
                                                        <small class="float-right font-size-12">3 days ago</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link py-0 d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../assets/images/Colorlargo.png" alt="User-Profile" class="img-fluid avatar avatar-50 avatar-rounded">
                                <div class="caption ms-3 d-none d-md-block ">
                                    <h6 class="mb-0 caption-title">AdminRES</h6>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="../dashboard/app/user-profile.html">Perfil</a></li>
                                <li><a class="dropdown-item" href="../dashboard/app/user-privacy-setting.html">Ajustes</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a id="logout" class="dropdown-item" href="#">Cerrar sesión</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--Nav End-->
    </div>
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
                                        <span class="text-secondary"> {{ __('Assessment ') }}</span>   {{ __('Panel') }}
                                        </h1>
                                    </div>
                                    <p class="mb-4"> {{ __('You can create exercises, questions and assessment.') }}</p>
                                </div>
                                <div class="col-lg-6 banner-img">
                                    <div class="img">
                                        <img src="../assets/images/principal/killsheets1.png" class="img-fluid w-55" alt="img8">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                        <div class="header-title d-flex justify-content-between align-items-center w-100 mb-4">
                            <h4 class="card-title mb-0">{{ __('Assessment list') }}</h4> 
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#examModal">
                            {{ __('New assessment') }}
                            </button>
                        </div>
                        </div>
                        <div class="card-body px-0">
                            <div class="table-responsive">
                                <table id="exam-list-table" class="table table-striped" role="grid" >
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                        <div class="header-title d-flex justify-content-between align-items-center w-100 mb-4">
                            <h4 class="card-title mb-0">{{ __('Question list') }}</h4> 
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#questionModal">
                            {{ __('New question') }}
                            </button>
                        </div>
                        </div>
                        <div class="card-body px-0">
                            <div class="table-responsive">
                                <table id="question-list-table" class="table table-striped" role="grid">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-body">
            <ul class="left-panel list-inline mb-0 p-0">
                <li class="list-inline-item"><a href="https://results-in-performance.com/images/2024/Aviso_privacidad.pdf">Politica de privacidad</a></li>
            </ul>
            <div class="right-panel">
                ©<script>
                    document.write(new Date().getFullYear())
                </script>
                <span class="text-gray">
                </span><a href="https://results-in-performance.com/">Results In Performance</a>.
            </div>
        </div>
    </footer>
    <!-- Modal Fullscreen -->
     <div class="modal fade" id="examModal" tabindex="-1" aria-labelledby="examModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="assessmentModalLabel">{{ __('Assessment')  }} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="row">

                            <div class="col-md-12 text-center pastel-box">
                                <h4 class="fw-bold mb-4">
                                    <span class="text-secondary"> {{ __('1. ') }}</span>   {{ __('Generalidades') }}
                                </h4>
                                <!-- Agrupación horizontal -->
                                <div class="d-flex justify-content-center flex-wrap gap-3 mb-3">
                                    <!-- Ente Acreditador -->
                                    <div class="col-md-3 text-start">
                                        <label>Ente Acreditador</label>
                                        <select class="form-select" id="ENTE1_MATH" name="ENTE_MATH" multiple >
                                        <option selected disabled></option>
                                        @foreach ($entes as $ente)
                                                <option value="{{ $ente->ID_CATALOGO_ENTE }}">{{ $ente->NOMBRE_ENTE }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                <!-- Niveles -->
                                     <div class="col-md-3 text-start">
                                        <label>Niveles</label>
                                        <select class="form-select" id="NIVEL1_MATH" name="NIVEL_MATH" multiple >
                                        <option selected disabled></option>
                                        @foreach ($niveles as $nivel)
                                                <option value="{{ $nivel->ID_CATALOGO_NIVELACREDITACION }}">{{ $nivel->NOMBRE_NIVEL }} - {{ $nivel->DESCRIPCION_NIVEL }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 text-start">
                                        <label>BOP</label>
                                        <select class="form-select" id="BOP1_MATH" name="BOP_MATH" multiple >
                                        <option selected disabled></option>
                                        @foreach ($bops as $bop)
                                        <option value="{{ $bop->ID_CATALOGO_TIPOBOP }}">{{ $bop->ABREVIATURA }} - {{ $bop->DESCRIPCION_TIPOBOP }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- Ente Acreditador -->
                               

                                                        <!-- Contenedor para Tiempo y Puntaje -->
                                
                            </div>
                            <!-- Columna Izquierda -->
                             <div class="col-md-4 text-center pastel-box">
                                <!-- Ente Acreditador -->
                                <h4 class="fw-bold mb-4">
                                    <span class="text-secondary"> {{ __('2. ') }}</span>   {{ __('Idioma') }}
                                </h4>
                                 <div class="mb-3 d-flex"> 
                                    <div class="col-12 me-1 text-center">
                                        <label>¿Cuál es el idioma de la pregunta?*</label>
                                        <select class="form-select" id="IDIOMAEXAM_QUESTION" name="IDIOMAEXAM_QUESTION">
                                        <option selected disabled></option>
                                        <option value="0">Seleccionar...</option>
                                        <option value="2">Spanish</option>
                                        <option value="3">English</option>
                                        <option value="4">Arabic</option>
                                        <option value="5">Portuguese</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-center pastel-box">
                                <!-- Ente Acreditador -->
                                <h4 class="fw-bold mb-4">
                                    <span class="text-secondary"> {{ __('3. ') }}</span>   {{ __('Tipo de exámen') }}
                                </h4>
                                 <div class="mb-3">
                                    <label class="form-label">¿Qué tipo de exámen es?*</label>
                                    <select class="form-select" id="TIPOEXAM_QUESTION" name="TIPOEXAM_QUESTION" multiple>
                                         <option value="1">Diagnóstica</option>
                                        <option value="2">Intermedia</option>
                                        <option value="3">Final</option>
                                        <option value="4">N/A</option>
                                    </select>
                                </div>
                            </div>
                             <div class="col-md-4 text-center pastel-box">
                                <!-- Ente Acreditador -->
                                 <h4 class="fw-bold mb-4">
                                    <span class="text-secondary"> {{ __('4. ') }}</span>   {{ __('Nombre del exámen') }}
                                </h4>
                                <div class="mb-3" id="nombreTexto">
                                    <label class="form-label">Ingresa el nombre de este exámen:*</label>
                                    <input type="text" class="form-control campo-requerido" name="TEXTO1_QUESTION" id="TEXTO1_QUESTION">
                                </div>
                            </div>
                            <!-- Columna Derecha si es fracciones-->
                            <div class="col-md-12 text-center ejercicio-fraccion pastel-box">
                                <!-- Pregunta Principal -->
                               
                                <h4 class="fw-bold mb-4">
                                    <span class="text-secondary"> {{ __('5. ') }}</span>   {{ __('Temas y subtemas') }}
                                </h4>
                                <div id="temas-container">
                                <!-- Tema 1: Presión hidrostática -->
                                <div class="tema-container" data-tema="1">
                                    <div class="tema-header" onclick="toggleTema(1)">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="checkbox-wrapper">
                                                <input type="checkbox" id="tema1-check" onchange="toggleAllSubtemas(1, this.checked)">
                                                <h5 class="tema-title">Presión hidrostática</h5>
                                            </div>
                                            <i class="fas fa-chevron-down expand-icon" id="icon-1"></i>
                                        </div>
                                    </div>
                                    
                                    <div class="subtemas-container" id="subtemas-1">
                                        <div class="subtema-item">
                                            <div class="checkbox-wrapper">
                                                <input type="checkbox" id="subtema1-1-check" onchange="updateCalculos()">
                                                <h6 class="subtema-title">Fundamentos de la presión hidrostática</h6>
                                            </div>
                                            <div class="control-row">
                                                <div class="time-input-group">
                                                    <label class="form-label small">Preguntas:</label>
                                                    <input type="number" class="form-control small" min="1" max="50" value="5" onchange="updateCalculos()">
                                                </div>
                                                <div class="time-input-group">
                                                    <label class="form-label small">Rango de tiempo (min):</label>
                                                    <input type="number" class="form-control small" placeholder="Min" min="1" max="300" value="3" onchange="updateCalculos()">
                                                    <span>-</span>
                                                    <input type="number" class="form-control small" placeholder="Max" min="1" max="300" value="6" onchange="updateCalculos()">
                                                </div>
                                                 <div class="time-input-group">
                                                    <label class="form-label small">Puntajes (pts):</label>
                                                    <input type="number" class="form-control small" placeholder="Min" min="1" max="100" value="1" onchange="updateCalculos()">
                                                    <span>-</span>
                                                    <input type="number" class="form-control small" placeholder="Max" min="1" max="100" value="10" onchange="updateCalculos()">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="subtema-item">
                                            <div class="checkbox-wrapper">
                                                <input type="checkbox" id="subtema1-2-check" onchange="updateCalculos()">
                                                <h6 class="subtema-title">Cálculos de presión en fluidos</h6>
                                            </div>
                                            <div class="control-row">
                                                <div>
                                                    <label class="form-label small">Preguntas:</label>
                                                    <input type="number" class="form-control small" min="1" max="50" value="8" onchange="updateCalculos()">
                                                </div>
                                                <div class="time-input-group">
                                                    <label class="form-label small">Rango de tiempo (min):</label>
                                                    <input type="number" class="form-control small" placeholder="Min" min="10" max="300" value="4" onchange="updateCalculos()">
                                                    <span>-</span>
                                                    <input type="number" class="form-control small" placeholder="Max" min="10" max="300" value="9" onchange="updateCalculos()">
                                                </div>
                                                 <div class="time-input-group">
                                                    <label class="form-label small">Puntajes (pts):</label>
                                                    <input type="number" class="form-control small" placeholder="Min" min="1" max="100" value="1" onchange="updateCalculos()">
                                                    <span>-</span>
                                                    <input type="number" class="form-control small" placeholder="Max" min="1" max="100" value="10" onchange="updateCalculos()">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="resumen-tema" id="resumen-tema-1">
                                        <div class="d-flex justify-content-between">
                                            <span>Subtotal Tema 1:</span>
                                            <span><span class="preguntas-count">0</span> preguntas | <span class="tiempo-total">0</span> min | <span class="puntaje-total">0</span> pts</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Tema 2: Densidad del lodo -->
                                <div class="tema-container" data-tema="2">
                                    <div class="tema-header" onclick="toggleTema(2)">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="checkbox-wrapper">
                                                <input type="checkbox" id="tema2-check" onchange="toggleAllSubtemas(2, this.checked)">
                                                <h5 class="tema-title">Densidad del lodo</h5>
                                            </div>
                                            <i class="fas fa-chevron-down expand-icon" id="icon-2"></i>
                                        </div>
                                    </div>
                                    
                                    <div class="subtemas-container" id="subtemas-2">
                                        <div class="subtema-item">
                                            <div class="checkbox-wrapper">
                                                <input type="checkbox" id="subtema2-1-check" onchange="updateCalculos()">
                                                <h6 class="subtema-title">Propiedades del lodo de perforación</h6>
                                            </div>
                                            <div class="control-row">
                                                <div>
                                                    <label class="form-label small">Preguntas:</label>
                                                    <input type="number" class="form-control small" min="1" max="50" value="6" onchange="updateCalculos()">
                                                </div>
                                                <div class="time-input-group">
                                                    <label class="form-label small">Rango de tiempo (min):</label>
                                                    <input type="number" class="form-control small" placeholder="Min" min="10" max="300" value="4" onchange="updateCalculos()">
                                                    <span>-</span>
                                                    <input type="number" class="form-control small" placeholder="Max" min="10" max="300" value="7" onchange="updateCalculos()">
                                                </div>
                                                 <div class="time-input-group">
                                                    <label class="form-label small">Puntajes (pts):</label>
                                                    <input type="number" class="form-control small" placeholder="Min" min="1" max="100" value="1" onchange="updateCalculos()">
                                                    <span>-</span>
                                                    <input type="number" class="form-control small" placeholder="Max" min="1" max="100" value="10" onchange="updateCalculos()">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="subtema-item">
                                            <div class="checkbox-wrapper">
                                                <input type="checkbox" id="subtema2-2-check" onchange="updateCalculos()">
                                                <h6 class="subtema-title">Control de densidad</h6>
                                            </div>
                                            <div class="control-row">
                                                <div>
                                                    <label class="form-label small">Preguntas:</label>
                                                    <input type="number" class="form-control small" min="1" max="50" value="4" onchange="updateCalculos()">
                                                </div>
                                                <div class="time-input-group">
                                                    <label class="form-label small">Rango de tiempo (min):</label>
                                                    <input type="number" class="form-control small" placeholder="Min" min="10" max="300" value="3" onchange="updateCalculos()">
                                                    <span>-</span>
                                                    <input type="number" class="form-control small" placeholder="Max" min="10" max="300" value="6" onchange="updateCalculos()">
                                                </div>
                                                 <div class="time-input-group">
                                                    <label class="form-label small">Puntajes (pts):</label>
                                                    <input type="number" class="form-control small" placeholder="Min" min="1" max="100" value="1" onchange="updateCalculos()">
                                                    <span>-</span>
                                                    <input type="number" class="form-control small" placeholder="Max" min="1" max="100" value="10" onchange="updateCalculos()">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="subtema-item">
                                            <div class="checkbox-wrapper">
                                                <input type="checkbox" id="subtema2-3-check" onchange="updateCalculos()">
                                                <h6 class="subtema-title">Volumen de la sarta de perforación</h6>
                                            </div>
                                            <div class="control-row">
                                                <div>
                                                    <label class="form-label small col-8">Preguntas:</label>
                                                    <input type="number" class="form-control small" min="1" max="50" value="7" onchange="updateCalculos()">
                                                </div>
                                                <div class="time-input-group">
                                                    <label class="form-label small">Rango de tiempo (min):</label>
                                                    <input type="number" class="form-control small" placeholder="Min" min="10" max="300" value="1" onchange="updateCalculos()">
                                                    <span>-</span>
                                                    <input type="number" class="form-control small" placeholder="Max" min="10" max="300" value="5" onchange="updateCalculos()">
                                                </div>
                                                 <div class="time-input-group">
                                                    <label class="form-label small">Puntajes (pts):</label>
                                                    <input type="number" class="form-control small" placeholder="Min" min="1" max="100" value="1" onchange="updateCalculos()">
                                                    <span>-</span>
                                                    <input type="number" class="form-control small" placeholder="Max" min="1" max="100" value="10" onchange="updateCalculos()">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="resumen-tema" id="resumen-tema-2">
                                        <div class="d-flex justify-content-between">
                                            <span>Subtotal Tema 2:</span>
                                             <span><span class="preguntas-count">0</span> preguntas | <span class="tiempo-total">0</span> min | <span class="puntaje-total">0</span> pts máximos</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="resumen-total" id="resumen-total">
                                <h4 >TOTAL GENERAL</h4>
                                <div class="d-flex justify-content-around mt-3">
                                    <div>
                                        <i class="fas fa-question-circle"></i>
                                        <strong id="total-preguntas">0</strong> Preguntas
                                    </div>
                                    <div class="d-flex">
                                        <i class="fas fa-clock"></i>
                                        <!-- <strong id="total-tiempo">0</strong> -->
                                        <input id="total-tiempo" type="number" class="form-control small input-sin-estilo" placeholder="Max" min="1" max="100" value="10"> Minutos
                                    </div>
                                    <div>
                                        <i class="fas fa-hourglass-half"></i>
                                        <strong id="total-puntaje">0</strong> Puntos
                                    </div>
                                </div>
                            </div>

                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Guardar Ejercicio</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="questionModal" tabindex="-1" aria-labelledby="questionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="questionModalLabel">{{ __('Questions')  }} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="row">

                            <div class="col-md-12 text-center pastel-box">
                                <h4 class="fw-bold mb-4">
                                    <span class="text-secondary"> {{ __('1. ') }}</span> {{ __('Generalidades') }}
                                </h4>

                                <!-- Agrupación horizontal -->
                                <div class="d-flex justify-content-center flex-wrap gap-3 mb-3">
                                    <!-- Ente Acreditador -->
                                    <div class="col-md-3 text-start">
                                        <label>Ente Acreditador*</label>
                                        <select class="form-select" id="ENTE_MATH" name="ENTE_MATH" multiple>
                                            <option selected disabled></option>
                                            @foreach ($entes as $ente)
                                                <option value="{{ $ente->ID_CATALOGO_ENTE }}">{{ $ente->NOMBRE_ENTE }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Niveles -->
                                    <div class="col-md-3 text-start">
                                        <label>Niveles*</label>
                                        <select class="form-select" id="NIVEL_MATH" name="NIVEL_MATH" multiple>
                                            <option selected disabled></option>
                                            @foreach ($niveles as $nivel)
                                                <option value="{{ $nivel->ID_CATALOGO_NIVELACREDITACION }}">{{ $nivel->NOMBRE_NIVEL }} - {{ $nivel->DESCRIPCION_NIVEL }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- BOP -->
                                    <div class="col-md-3 text-start">
                                        <label>BOP*</label>
                                        <select class="form-select" id="BOP_MATH" name="BOP_MATH" multiple>
                                            <option selected disabled></option>
                                            @foreach ($bops as $bop)
                                                <option value="{{ $bop->ID_CATALOGO_TIPOBOP }}">{{ $bop->ABREVIATURA }} - {{ $bop->DESCRIPCION_TIPOBOP }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Columna Izquierda -->
                             <div class="col-md-4 text-center pastel-box">
                                <!-- Ente Acreditador -->
                                <h4 class="fw-bold mb-4">
                                    <span class="text-secondary"> {{ __('2. ') }}</span>   {{ __('Idioma') }}
                                </h4>
                                 <div class="mb-3 d-flex"> 
                                    <div class="col-12 me-1 text-center">
                                        <label>¿Cuál es el idioma de la pregunta?*</label>
                                        <select class="form-select" id="IDIOMA_QUESTION" name="IDIOMA_QUESTION">
                                        <option selected disabled></option>
                                        <option value="0">Seleccionar...</option>
                                        <option value="2">Spanish</option>
                                        <option value="3">English</option>
                                        <option value="4">Arabic</option>
                                        <option value="5">Portuguese</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-center pastel-box">
                                <!-- Ente Acreditador -->
                                <h4 class="fw-bold mb-4">
                                    <span class="text-secondary"> {{ __('3. ') }}</span>   {{ __('Temas') }}
                                </h4>
                                 <div class="mb-3 d-flex"> 
                                    <div class="col-12 me-1 text-center">
                                        <label>¿Cuál es el o los tema(s) de la pregunta?*</label>
                                        <select class="form-select" id="TEMA_QUESTION" name="TEMA_QUESTION" multiple>
                                        <option selected disabled></option>
                                        @foreach ($temas as $tema)
                                            <option value="{{ $tema->ID_CATALOGO_TEMAPREGUNTA }}">{{ $tema->NOMBRE_TEMA }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-4 text-center pastel-box">
                                <!-- Ente Acreditador -->
                                 <h4 class="fw-bold mb-4">
                                    <span class="text-secondary"> {{ __('4. ') }}</span>   {{ __('Subtemas') }}
                                </h4>
                                <div class="mb-3"> 
                                    <label class="form-label">¿Cuál es el o los subtema(s) de la pregunta? (solo si aplica)</label>
                                    <select class="form-select" id="SUBTEMA_QUESTION" name="SUBTEMA_QUESTION" required>
                                        <option value="">Seleccionar...</option>
                                        @foreach ($temas as $tema)
                                            <option value="{{ $tema->ID_CATALOGO_TEMAPREGUNTA }}">{{ $tema->NOMBRE_TEMA }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- Columna Derecha si es fracciones-->
                            <div class="col-md-6 text-center ejercicio-fraccion pastel-box">
                                <!-- Pregunta Principal -->
                               
                                <h4 class="fw-bold mb-4">
                                    <span class="text-secondary"> {{ __('5. ') }}</span>   {{ __('Estructura de la pregunta') }}
                                </h4>
                                <div class="mb-3">
                                    <label class="form-label">¿Este campo es texto o imagen?*</label>
                                    <select class="form-select" id="TIPO1_QUESTION" name="TIPO1_QUESTION" required>
                                        <option value="">Seleccionar...</option>
                                        <option value="1">Texto</option>
                                        <option value="2">Imagen</option>
                                    </select>
                                </div>
                                
                                <!-- Campo de Texto -->
                                <div class="mb-3 d-none" id="campoTexto">
                                    <label class="form-label">Ingresa el texto:*</label>
                                    <!-- <input type="text" class="form-control campo-requerido" name="TEXTO1_QUESTION" id="TEXTO1_QUESTION"> -->
                                    <textarea class="form-control campo-requerido" name="TEXTO1_QUESTION" id="TEXTO1_QUESTION" rows="4"></textarea>
                                </div>

                                <!-- Campo de Imagen -->
                                <div class="mb-3 d-none" id="campoImagen">
                                    <label class="form-label">Carga la imagen:*</label>
                                    <input type="file" class="form-control dropify campo-requerido" name="IMAGEN1_QUESTION" id="IMAGEN1_QUESTION" data-allowed-file-extensions="jpg jpeg png gif"/>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="activarSeccionExtra">
                                    <label class="form-check-label" for="activarSeccionExtra">¿Desea añadir otra sección?</label>
                                </div>

                                <!-- Sección extra deshabilitada -->
                                <div id="seccionExtra" class="opacity-50 pointer-events-none">
                                    <div class="mb-3">
                                        <label class="form-label">¿Este campo es texto o imagen?</label>
                                        <select class="form-select" id="TIPO2_QUESTION" name="TIPO2_QUESTION" disabled>
                                            <option value="">Seleccionar...</option>
                                            <option value="1">Texto</option>
                                            <option value="2">Imagen</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 d-none" id="campoTexto2">
                                        <label class="form-label">Ingresa el texto:</label>
                                        <!-- <input type="text" class="form-control" name="TEXTO2_QUESTION" id="TEXTO2_QUESTION" disabled> -->
                                        <textarea class="form-control campo-requerido" name="TEXTO2_QUESTION" id="TEXTO2_QUESTION" rows="4"></textarea>
                                    </div>

                                    <div class="mb-3 d-none" id="campoImagen2">
                                        <label class="form-label">Carga la imagen:</label>
                                        <input type="file" class="form-control dropify" name="IMAGEN2_QUESTION" id="IMAGEN2_QUESTION" data-allowed-file-extensions="jpg jpeg png gif" >
                                    </div>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="activarSeccionExtra2">
                                    <label class="form-check-label" for="activarSeccionExtra2">¿Desea añadir una sección más?</label>
                                </div>

                                <div id="seccionExtra2" class="opacity-50 pointer-events-none">
                                    <div class="mb-3">
                                        <label class="form-label">¿Este campo es texto o imagen?</label>
                                        <select class="form-select" id="TIPO3_QUESTION" name="TIPO3_QUESTION" disabled>
                                            <option value="">Seleccionar...</option>
                                            <option value="1">Texto</option>
                                            <option value="2">Imagen</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 d-none" id="campoTexto3">
                                        <label class="form-label">Ingresa el texto:</label>
                                        <!-- <input type="text" class="form-control" name="TEXTO3_QUESTION" id="TEXTO3_QUESTION" disabled> -->
                                        <textarea class="form-control campo-requerido" name="TEXTO3_QUESTION" id="TEXTO3_QUESTION" rows="4"></textarea>
                                    </div>

                                    <div class="mb-3 d-none" id="campoImagen3">
                                        <label class="form-label">Carga la imagen:</label>
                                        <input type="file" class="form-control dropify" name="IMAGEN3_QUESTION" id="IMAGEN3_QUESTION" data-allowed-file-extensions="jpg jpeg png gif"/>
                                    </div>
                                </div>

                            </div>

                            <!-- Para los otros tipos -->
                            <div class="col-md-6 text-center pastel-box">
                                <h4 class="fw-bold mb-4">
                                    <span class="text-secondary"> {{ __('6. ') }}</span>   {{ __('Respuestas') }}
                                </h4>
                                <div class="mb-3">
                                    <label class="form-label">¿Qué tipo de respuesta es?*</label>
                                   <select class="form-select" id="TIPO_RESPUESTA_QUESTION" name="TIPO_RESPUESTA_QUESTION" required>
                                        <option value="0">Seleccionar...</option>
                                        <option value="1">Número (Hoja de matar)</option>
                                        <option value="2">Opciones de respuesta</option>
                                    </select>
                                </div>
                                <div class="time-input-group d-none" id="rangoRespuesta">
                                    <label class="form-label small">Rango de respuesta:</label>
                                    <input type="number" class="form-control small" placeholder="Min" value="4">
                                    <span>-</span>
                                    <input type="number" class="form-control small" placeholder="Max" value="9">
                                </div>

                                <!-- Segundo selector: número de opciones -->
                                <div class="mb-3 d-none" id="selectorOpciones">
                                    <label class="form-label">¿Cuántas opciones de respuestas desea?*</label>
                                    <select class="form-select" id="NOPTIONS_QUESTION" name="NOPTIONS_QUESTION" required>
                                        <option value="0">Seleccionar...</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>

                                <!-- Tercer selector: número de respuestas correctas -->
                                <div class="mb-3 d-none" id="selectorCorrectas">
                                    <label class="form-label">¿Cuántas respuestas correctas?*</label>
                                    <select class="form-select" id="CORRECTOPTIONS_QUESTION" name="CORRECTOPTIONS_QUESTION" required>
                                        <option value="0">Seleccionar...</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>

                                <!-- Contenedor para los checkboxes de respuestas -->
                                <div id="respuestas-container">
                                    <!-- Respuesta 1 -->
                                    <div class="checkbox-container" id="respuesta1">
                                        <div class="checkbox-wrapper">
                                            <input type="checkbox" id="respuesta1-check" name="respuesta_check[]" value="1">
                                            <input type="text" id="respuesta1-text" name="respuesta_text[]" placeholder="Escriba la respuesta 1" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <!-- Respuesta 2 -->
                                    <div class="checkbox-container" id="respuesta2">
                                        <div class="checkbox-wrapper">
                                            <input type="checkbox" id="respuesta2-check" name="respuesta_check[]" value="2">
                                            <input type="text" id="respuesta2-text" name="respuesta_text[]" placeholder="Escriba la respuesta 2" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <!-- Respuesta 3 -->
                                    <div class="checkbox-container" id="respuesta3">
                                        <div class="checkbox-wrapper">
                                            <input type="checkbox" id="respuesta3-check" name="respuesta_check[]" value="3">
                                            <input type="text" id="respuesta3-text" name="respuesta_text[]" placeholder="Escriba la respuesta 3" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <!-- Respuesta 4 -->
                                    <div class="checkbox-container" id="respuesta4">
                                        <div class="checkbox-wrapper">
                                            <input type="checkbox" id="respuesta4-check" name="respuesta_check[]" value="4">
                                            <input type="text" id="respuesta4-text" name="respuesta_text[]" placeholder="Escriba la respuesta 4" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <!-- Respuesta 5 -->
                                    <div class="checkbox-container" id="respuesta5">
                                        <div class="checkbox-wrapper">
                                            <input type="checkbox" id="respuesta5-check" name="respuesta_check[]" value="5">
                                            <input type="text" id="respuesta5-text" name="respuesta_text[]" placeholder="Escriba la respuesta 5" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                
                            
                            </div>

                           

                            <div class="col-md-4 text-center pastel-box">
                                <!-- Ente Acreditador -->
                                <h4 class="fw-bold mb-4">
                                    <span class="text-secondary"> {{ __('7. ') }}</span>   {{ __('Tiempo y puntaje') }}
                                </h4>
                                <div class="score-time-container">
                                    <!-- Campo de Tiempo -->
                                    <div class="time-input-container">
                                        <label class="form-label">Tiempo (minutos)*</label>
                                        <div class="input-icon">
                                            <i class="fas fa-clock"></i>
                                            <input type="number" id="tiempo_question" name="tiempo_question" min="1" step="1" class="form-control" placeholder="Ej: 5" required>
                                        </div>
                                    </div>
                                    
                                    <!-- Campo de Puntaje -->
                                    <div class="score-input-container">
                                        <label class="form-label">Puntaje*</label>
                                        <div class="input-icon">
                                            <i class="fas fa-star"></i>
                                            <input type="number" id="puntaje_question" name="puntaje_question" min="1" step="1" class="form-control" placeholder="Ej: 10" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 text-center pastel-box">
                                <!-- Ente Acreditador -->
                                <h4 class="fw-bold mb-4">
                                    <span class="text-secondary"> {{ __('8. ') }}</span>   {{ __('Tipo de evaluación') }}
                                </h4>
                                 <div class="mb-3">
                                    <label class="form-label">¿Para qué tipo de evaluación es?*</label>
                                    <select class="form-select" id="TIPOEVA_QUESTION" name="TIPOEVA_QUESTION" multiple>
                                        <option value="1">Diagnóstica</option>
                                        <option value="2">Intermedia</option>
                                        <option value="3">Final</option>
                                        <option value="4">N/A</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 text-center pastel-box">
                                <!-- Ente Acreditador -->
                                <h4 class="fw-bold mb-4">
                                    <span class="text-secondary"> {{ __('9. ') }}</span>   {{ __('Retroalimentación') }}
                                </h4>
                                 <div class="mb-3">
                                    <label class="form-label">¿Desea añadir retroalimentación para esta pregunta?*</label>
                                    <select class="form-select" id="RETROALIMENTACION_QUESTION" name="RETROALIMENTACION_QUESTION" required>
                                        <option value="">Seleccionar...</option>
                                        <option value="1">Si</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                                
                                <!-- Campo de Texto -->
                               <div class="mb-3 d-none" id="retroText">
                                    <label class="form-label">Escribe la retroalimentación:*</label>
                                    <textarea class="form-control campo-requerido" name="RETROTEXT_QUESTION" id="TEXTO1_QUESTION" rows="4"></textarea>
                                </div>


                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Guardar Ejercicio</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="eventModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-calendar-plus"></i> Plazo y Activación de Examen</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="eventForm">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label"><i class="fas fa-file-alt"></i> Título del Examen</label>
                                <input type="text" class="form-control" id="eventTitle" required placeholder="Ej: Examen de Matemáticas - Módulo 1">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><i class="fas fa-play"></i> Fecha y Hora de Inicio</label>
                                <input type="date" class="form-control mb-2" id="startDate" required>
                                <div class="time-inputs">
                                    <input type="number" class="form-control" id="startHour" min="0" max="23" placeholder="HH" required>
                                    <span>:</span>
                                    <input type="number" class="form-control" id="startMin" min="0" max="59" placeholder="MM" required>
                                    <span>:</span>
                                    <input type="number" class="form-control" id="startSec" min="0" max="59" placeholder="SS" value="0">
                                </div>
                                <select class="form-select mt-2 timezone-select" id="startTimezone">
                                    <option value="America/Mexico_City">UTC-6 (México Central)</option>
                                    <option value="America/Tijuana">UTC-8 (México Pacífico)</option>
                                    <option value="America/Cancun">UTC-5 (México Este)</option>
                                    <option value="America/New_York">UTC-5 (Este EUA)</option>
                                    <option value="America/Chicago">UTC-6 (Central EUA)</option>
                                    <option value="America/Denver">UTC-7 (Montaña EUA)</option>
                                    <option value="America/Los_Angeles">UTC-8 (Pacífico EUA)</option>
                                    <option value="Europe/Madrid">UTC+1 (España)</option>
                                    <option value="Europe/London">UTC+0 (Reino Unido)</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><i class="fas fa-stop"></i> Fecha y Hora de Fin</label>
                                <input type="date" class="form-control mb-2" id="endDate" required>
                                <div class="time-inputs">
                                    <input type="number" class="form-control" id="endHour" min="0" max="23" placeholder="HH" required>
                                    <span>:</span>
                                    <input type="number" class="form-control" id="endMin" min="0" max="59" placeholder="MM" required>
                                    <span>:</span>
                                    <input type="number" class="form-control" id="endSec" min="0" max="59" placeholder="SS" value="0">
                                </div>
                                <select class="form-select mt-2 timezone-select" id="endTimezone">
                                    <option value="America/Mexico_City">UTC-6 (México Central)</option>
                                    <option value="America/Tijuana">UTC-8 (México Pacífico)</option>
                                    <option value="America/Cancun">UTC-5 (México Este)</option>
                                    <option value="America/New_York">UTC-5 (Este EUA)</option>
                                    <option value="America/Chicago">UTC-6 (Central EUA)</option>
                                    <option value="America/Denver">UTC-7 (Montaña EUA)</option>
                                    <option value="America/Los_Angeles">UTC-8 (Pacífico EUA)</option>
                                    <option value="Europe/Madrid">UTC+1 (España)</option>
                                    <option value="Europe/London">UTC+0 (Reino Unido)</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-users"></i> Grupos Asignados</label>
                            <select id="gruposSelect" multiple placeholder="Selecciona los grupos...">
                                <option value="grupo1">Fontis - Grupo A</option>
                                <option value="grupo2">Fontis - Grupo B</option>
                                <option value="grupo3">Fontis - Grupo C</option>
                                <option value="grupo4">Fontis - Grupo D</option>
                                <option value="grupo5">Fontis - Grupo E</option>
                                <option value="grupo6">Perenco - Grupo F</option>
                                <option value="grupo7">Perenco - Grupo G</option>
                                <option value="grupo8">Perenco - Grupo H</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-create" id="saveEvent">Guardar Evento</button>
                </div>
            </div>
        </div>
    </div>
</main>
<style>
.opcion-item, .pregunta-adicional {
    position: relative;
}
</style>
@endsection
@php
    $css_identifier = 'exercises';
@endphp