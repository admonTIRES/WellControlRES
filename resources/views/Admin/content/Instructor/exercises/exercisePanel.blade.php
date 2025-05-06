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
                                        <span class="text-secondary"> {{ __('Exam ') }}</span>   {{ __('Panel') }}
                                        </h1>
                                    </div>
                                    <p class="mb-4"> {{ __('You can create exercises, questions and exam.') }}</p>
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
                            <h4 class="card-title mb-0">{{ __('Exam list') }}</h4> 
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ejerciciosModal">
                            {{ __('New exam') }}
                            </button>
                        </div>
                        </div>
                        <div class="card-body px-0">
                            <div class="table-responsive">
                                <table id="question-list-table" class="table table-striped" role="grid" >
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                        <div class="header-title d-flex justify-content-between align-items-center w-100 mb-4">
                            <h4 class="card-title mb-0">{{ __('Question list') }}</h4> 
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ejerciciosModal">
                            {{ __('New question') }}
                            </button>
                        </div>
                        </div>
                        <div class="card-body px-0">
                            <div class="table-responsive">
                                <table id="exam-list-table" class="table table-striped" role="grid">
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
    <div class="modal fade" id="ejerciciosModal" tabindex="-1" aria-labelledby="ejerciciosModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ejerciciosModalLabel">Editar Ejercicio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="row">
                            <!-- Columna Izquierda -->
                            <div class="col-md-6">
                                <!-- Tipo de Ejercicio -->
                                <div class="mb-3">
                                    <label class="form-label">Tipo de Ejercicio</label>
                                    <select class="form-select" id="tipoEjercicio">
                                        <option value="">Seleccionar...</option>
                                        <option value="calculadora-despejes">Calculadora - Despejes</option>
                                        <option value="calculadora-jerarquia">Calculadora - Jerarquía</option>
                                        <option value="calculadora-fracciones">Calculadora - Fracciones</option>
                                        <option value="calculadora-elevacion">Calculadora - Elevación</option>
                                        <option value="calculadora-redondeos">Calculadora - Redondeos</option>
                                        <option value="evaluacion">Evaluación</option>
                                    </select>
                                </div>
                                
                                <!-- Ente Acreditador -->
                                <div class="mb-3">
                                    <label class="form-label">Ente Acreditador</label>
                                    <select class="form-select" id="enteAcreditador">
                                        <option value="">Seleccionar...</option>
                                        <option value="IADC">IADC</option>
                                        <option value="IWCF">IWCF</option>
                                    </select>
                                </div>
                                
                                <!-- Niveles de Certificación (Checkboxes) -->
                                <div class="mb-3">
                                    <label class="form-label">Niveles</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="nivel1">
                                        <label class="form-check-label" for="nivel1">Nivel 1 - Conciencia en control d3 pozos</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="nivel2">
                                        <label class="form-check-label" for="nivel2">Nivel 2 - Introductorio</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="nivel3">
                                        <label class="form-check-label" for="nivel3">Nivel 3 - Perforador</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="nivel4">
                                        <label class="form-check-label" for="nivel4">Nivel 4 - Supervisor</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="nivel5">
                                        <label class="form-check-label" for="nivel5">Nivel 5 - Ingeniero</label>
                                    </div>
                                </div>
                                
                                <!-- BOP -->
                                <div class="mb-3">
                                    <label class="form-label">BOP</label>
                                    <select class="form-select" id="tipoBOP">
                                        <option value="">Seleccionar...</option>
                                        <option value="SO">Surface Only (SO)</option>
                                        <option value="SS">Surface and Subsea (SS)</option>
                                    </select>
                                </div>
                                
                                <!-- Tema con búsqueda -->
                                <div class="mb-3">
                                    <label class="form-label">Tema</label>
                                    <input type="text" class="form-control" id="tema" list="temasList" placeholder="Buscar tema...">
                                    <datalist id="temasList">
                                        <option value="Presión Hidrostática">
                                        <option value="Control de Pozos">
                                        <option value="Densidad de Fluidos">
                                        <option value="Presión de Formación">
                                        <option value="Gradiente de Fractura">
                                        <option value="Equipos de Superficie">
                                        <option value="Prevención de Reventones">
                                    </datalist>
                                </div>
                                
                                <!-- Tiempo en minutos -->
                                <div class="mb-3">
                                    <label class="form-label">Tiempo (minutos)</label>
                                    <input type="number" class="form-control" id="tiempo" min="1" value="5">
                                </div>
                                
                                <!-- Puntaje -->
                                <div class="mb-3">
                                    <label class="form-label">Puntaje (pts)</label>
                                    <input type="number" class="form-control" id="puntaje" min="1" value="10">
                                </div>
                            </div>
                            
                            <!-- Columna Derecha -->
                            <div class="col-md-6">
                                <!-- Pregunta Principal -->
                                <div class="mb-3">
                                    <label class="form-label">Pregunta</label>
                                    <textarea class="form-control" id="pregunta" rows="3"></textarea>
                                </div>
                                
                                <!-- Pregunta Adicional (Dinámica) -->
                                <div class="mb-3">
                                    <label class="form-label">Pregunta/Texto Adicional</label>
                                    <div id="preguntasAdicionalesContainer">
                                        <!-- Las preguntas adicionales se agregarán aquí -->
                                    </div>
                                    <button type="button" class="btn btn-sm btn-primary mt-2" onclick="agregarPreguntaAdicional()">
                                        + Agregar Pregunta Adicional
                                    </button>
                                </div>
                                
                                <!-- Opciones de Respuesta (Dinámico) -->
                                <div class="mb-3">
                                    <label class="form-label">Opciones de Respuesta (seleccione la(s) respuesta(s) correcta(s))</label>
                                    <div id="opcionesContainer">
                                        <div class="opcion-item mb-2">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <input class="form-check-input mt-0" type="checkbox" name="correcta">
                                                </div>
                                                <input type="text" class="form-control" placeholder="Opción A">
                                            </div>
                                        </div>
                                        <div class="opcion-item mb-2">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <input class="form-check-input mt-0" type="checkbox" name="correcta">
                                                </div>
                                                <input type="text" class="form-control" placeholder="Opción B">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-primary mt-2" onclick="agregarOpcion()">
                                        + Agregar Opción
                                    </button>
                                </div>
                                
                                <!-- Justificación -->
                                <div class="mb-3">
                                    <label class="form-label">Justificación del Ejercicio</label>
                                    <textarea class="form-control" id="justificacion" rows="3"></textarea>
                                </div>
                                
                                <!-- Imagen -->
                                <div class="mb-3">
                                    <label for="imagenEjercicio" class="form-label">Imagen del Ejercicio</label>
                                    <input class="form-control" type="file" id="imagenEjercicio" accept="image/*">
                                </div>
                                <div class="calculator-container">
                                @include('Calculator.itemCalculator', ['id' => 'calculatorAdmin'])
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
</main>
<style>
.opcion-item, .pregunta-adicional {
    position: relative;
}
</style>
@endsection