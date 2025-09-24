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
                                            <span class="text-secondary"> {{ $FOLIO }} </span> {{ $NOMBRE_PROYECTO }}
                                            </h1>
                                        </div>
                                        <p class="mb-4">{{ __('You can manage this project (assign tests, deadlines, view progress, grades and more).') }}</p>
                                    </div>
                                    <div class="col-lg-6 banner-img">
                                        <div class="img">
                                            <img src="../assets/images/principal/plataforma.png" class="img-fluid " alt="img8">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                            <div class="card overflow-hidden">
                                <div class="card-header d-flex justify-content-between flex-wrap">
                                </div>
                                <div class="card-body p-3">
                                    <div class="">
                                        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="panel-tab" data-bs-toggle="tab" data-bs-target="#panel" type="button" role="tab">
                                                <i class="ri-dashboard-line"></i> Panel
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="asistencia-tab" data-bs-toggle="tab" data-bs-target="#asistencia" type="button" role="tab">
                                                <i class="ri-user-check-line"></i> Asistencia
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="emails-tab" data-bs-toggle="tab" data-bs-target="#emails" type="button" role="tab">
                                                <i class="ri-mail-line"></i> Emails
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="examenes-tab" data-bs-toggle="tab" data-bs-target="#examenes" type="button" role="tab">
                                                <i class="ri-file-list-3-line"></i> Exámenes
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="progreso-tab" data-bs-toggle="tab" data-bs-target="#progreso" type="button" role="tab">
                                                <i class="ri-bar-chart-line"></i> Progreso
                                                </button>
                                            </li>
                                        </ul>


                                        <div class="tab-content p-3 border-top-0" id="myTabContent">
                                            
                                            <!-- PANEL -->
                                            <div class="tab-pane fade show active" id="panel" role="tabpanel">
                                                <div class="col-md-12 col-lg-12">
                                                    <div class="card overflow-hidden">
                                                        <div class="card-header d-flex justify-content-between flex-wrap">
                                                            <div class="header-title">
                                                            <h4 class="card-title mb-2">Panel principal</h4>
                                                            <p>Bienvenido al panel de administración del curso.</p>
                                                            </div>
                                                        </div>
                                                        <div class="card-body p-0">
                                                            <div class="swiper-container  d-slider2">
                                                                <div class="swiper-wrapper">
                                                                    <div class="swiper-slide">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div id="basic-radialbar-chart-1" class="custom-radial-chart" data-value="0" data-show-value="0%" data-label="Progreso" data-color="#A4D65E"></div>
                                                                                <hr class="mt-0">
                                                                                <p class="text-center mb-0">
                                                                                    <span>
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" viewBox="0 0 14 15" fill="none">
                                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6663 7.50016C13.6663 11.1821 10.6816 14.1668 6.99967 14.1668C3.31778 14.1668 0.333008 11.1821 0.333008 7.50016C0.333008 3.81826 3.31778 0.833496 6.99967 0.833496C10.6816 0.833496 13.6663 3.81826 13.6663 7.50016ZM1.66634 7.50016C1.66634 10.4457 4.05416 12.8335 6.99967 12.8335C9.94519 12.8335 12.333 10.4457 12.333 7.50016C12.333 4.55464 9.94519 2.16683 6.99967 2.16683C4.05416 2.16683 1.66634 4.55464 1.66634 7.50016ZM6.33301 4.8335V8.16683C6.33301 8.53502 6.63148 8.8335 6.99967 8.8335C7.36786 8.8335 7.66634 8.53502 7.66634 8.16683V4.8335C7.66634 4.46531 7.36786 4.16683 6.99967 4.16683C6.63148 4.16683 6.33301 4.46531 6.33301 4.8335ZM7.66634 10.1668C7.66634 10.535 7.36786 10.8335 6.99967 10.8335C6.63148 10.8335 6.33301 10.535 6.33301 10.1668C6.33301 9.79864 6.63148 9.50016 6.99967 9.50016C7.36786 9.50016 7.66634 9.79864 7.66634 10.1668Z" fill="#AAA1AA" />
                                                                                        </svg>
                                                                                    </span>
                                                                                    <small>
                                                                                    </small>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div id="basic-radialbar-chart-2" class="custom-radial-chart" data-value="0" data-show-value="0%" data-label="Progreso" data-color="#007DBA"></div>
                                                                                <hr class="mt-0">
                                                                                <p class="text-center mb-0">
                                                                                    <span>
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" viewBox="0 0 14 15" fill="none">
                                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6663 7.50016C13.6663 11.1821 10.6816 14.1668 6.99967 14.1668C3.31778 14.1668 0.333008 11.1821 0.333008 7.50016C0.333008 3.81826 3.31778 0.833496 6.99967 0.833496C10.6816 0.833496 13.6663 3.81826 13.6663 7.50016ZM1.66634 7.50016C1.66634 10.4457 4.05416 12.8335 6.99967 12.8335C9.94519 12.8335 12.333 10.4457 12.333 7.50016C12.333 4.55464 9.94519 2.16683 6.99967 2.16683C4.05416 2.16683 1.66634 4.55464 1.66634 7.50016ZM6.33301 4.8335V8.16683C6.33301 8.53502 6.63148 8.8335 6.99967 8.8335C7.36786 8.8335 7.66634 8.53502 7.66634 8.16683V4.8335C7.66634 4.46531 7.36786 4.16683 6.99967 4.16683C6.63148 4.16683 6.33301 4.46531 6.33301 4.8335ZM7.66634 10.1668C7.66634 10.535 7.36786 10.8335 6.99967 10.8335C6.63148 10.8335 6.33301 10.535 6.33301 10.1668C6.33301 9.79864 6.63148 9.50016 6.99967 9.50016C7.36786 9.50016 7.66634 9.79864 7.66634 10.1668Z" fill="#AAA1AA" />
                                                                                        </svg>
                                                                                    </span>
                                                                                    <small>Francisco Ocana</small>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div id="basic-radialbar-chart-3" class="custom-radial-chart" data-value="0" data-show-value="0%" data-label="Progreso" data-color="#FF585D"></div>
                                                                                <hr class="mt-0">
                                                                                <p class="text-center mb-0">
                                                                                    <span>
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" viewBox="0 0 14 15" fill="none">
                                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6663 7.50016C13.6663 11.1821 10.6816 14.1668 6.99967 14.1668C3.31778 14.1668 0.333008 11.1821 0.333008 7.50016C0.333008 3.81826 3.31778 0.833496 6.99967 0.833496C10.6816 0.833496 13.6663 3.81826 13.6663 7.50016ZM1.66634 7.50016C1.66634 10.4457 4.05416 12.8335 6.99967 12.8335C9.94519 12.8335 12.333 10.4457 12.333 7.50016C12.333 4.55464 9.94519 2.16683 6.99967 2.16683C4.05416 2.16683 1.66634 4.55464 1.66634 7.50016ZM6.33301 4.8335V8.16683C6.33301 8.53502 6.63148 8.8335 6.99967 8.8335C7.36786 8.8335 7.66634 8.53502 7.66634 8.16683V4.8335C7.66634 4.46531 7.36786 4.16683 6.99967 4.16683C6.63148 4.16683 6.33301 4.46531 6.33301 4.8335ZM7.66634 10.1668C7.66634 10.535 7.36786 10.8335 6.99967 10.8335C6.63148 10.8335 6.33301 10.535 6.33301 10.1668C6.33301 9.79864 6.63148 9.50016 6.99967 9.50016C7.36786 9.50016 7.66634 9.79864 7.66634 10.1668Z" fill="#AAA1AA" />
                                                                                        </svg>
                                                                                    </span>
                                                                                    <small>Martin Doe</small>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div id="basic-radialbar-chart" class="custom-radial-chart" data-value="0" data-show-value="0%" data-label="Progreso" data-color="#A4D65E"></div>
                                                                                <hr class="mt-0">
                                                                                <p class="text-center mb-0">
                                                                                    <span>
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" viewBox="0 0 14 15" fill="none">
                                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6663 7.50016C13.6663 11.1821 10.6816 14.1668 6.99967 14.1668C3.31778 14.1668 0.333008 11.1821 0.333008 7.50016C0.333008 3.81826 3.31778 0.833496 6.99967 0.833496C10.6816 0.833496 13.6663 3.81826 13.6663 7.50016ZM1.66634 7.50016C1.66634 10.4457 4.05416 12.8335 6.99967 12.8335C9.94519 12.8335 12.333 10.4457 12.333 7.50016C12.333 4.55464 9.94519 2.16683 6.99967 2.16683C4.05416 2.16683 1.66634 4.55464 1.66634 7.50016ZM6.33301 4.8335V8.16683C6.33301 8.53502 6.63148 8.8335 6.99967 8.8335C7.36786 8.8335 7.66634 8.53502 7.66634 8.16683V4.8335C7.66634 4.46531 7.36786 4.16683 6.99967 4.16683C6.63148 4.16683 6.33301 4.46531 6.33301 4.8335ZM7.66634 10.1668C7.66634 10.535 7.36786 10.8335 6.99967 10.8335C6.63148 10.8335 6.33301 10.535 6.33301 10.1668C6.33301 9.79864 6.63148 9.50016 6.99967 9.50016C7.36786 9.50016 7.66634 9.79864 7.66634 10.1668Z" fill="#AAA1AA" />
                                                                                        </svg>
                                                                                    </span>
                                                                                    <small>Jonh Doe</small>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div id="basic-radialbar-chart-5" class="custom-radial-chart" data-value="0" data-show-value="0%" data-label="Progreso" data-color="#FF585D"></div>
                                                                                <hr class="mt-0">
                                                                                <p class="text-center mb-0">
                                                                                    <span>
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" viewBox="0 0 14 15" fill="none">
                                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6663 7.50016C13.6663 11.1821 10.6816 14.1668 6.99967 14.1668C3.31778 14.1668 0.333008 11.1821 0.333008 7.50016C0.333008 3.81826 3.31778 0.833496 6.99967 0.833496C10.6816 0.833496 13.6663 3.81826 13.6663 7.50016ZM1.66634 7.50016C1.66634 10.4457 4.05416 12.8335 6.99967 12.8335C9.94519 12.8335 12.333 10.4457 12.333 7.50016C12.333 4.55464 9.94519 2.16683 6.99967 2.16683C4.05416 2.16683 1.66634 4.55464 1.66634 7.50016ZM6.33301 4.8335V8.16683C6.33301 8.53502 6.63148 8.8335 6.99967 8.8335C7.36786 8.8335 7.66634 8.53502 7.66634 8.16683V4.8335C7.66634 4.46531 7.36786 4.16683 6.99967 4.16683C6.63148 4.16683 6.33301 4.46531 6.33301 4.8335ZM7.66634 10.1668C7.66634 10.535 7.36786 10.8335 6.99967 10.8335C6.63148 10.8335 6.33301 10.535 6.33301 10.1668C6.33301 9.79864 6.63148 9.50016 6.99967 9.50016C7.36786 9.50016 7.66634 9.79864 7.66634 10.1668Z" fill="#AAA1AA" />
                                                                                        </svg>
                                                                                    </span>
                                                                                    <small>Pedro Taxialaga</small>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body p-4">
                                                            <div class="row g-4">
                                                            <!-- Hojas de matar -->
                                                                <div class="col-md-6">
                                                                    <div class="card shadow-sm">
                                                                    <div class="card-header"><strong>Hojas de matar elaboradas</strong></div>
                                                                    <div class="card-body">
                                                                        <div id="hojasChart"></div>
                                                                    </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Exámenes presentados -->
                                                                <div class="col-md-6">
                                                                    <div class="card shadow-sm">
                                                                    <div class="card-header"><strong>Exámenes presentados</strong></div>
                                                                    <div class="card-body">
                                                                        <div id="examenesChart"></div>
                                                                    </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Inicios de sesión -->
                                                                <div class="col-md-6">
                                                                    <div class="card shadow-sm">
                                                                    <div class="card-header"><strong>Top estudiantes por inicio de sesión</strong></div>
                                                                    <div class="card-body">
                                                                        <div id="loginsChart"></div>
                                                                    </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Medallas -->
                                                                <div class="col-md-6">
                                                                    <div class="card shadow-sm">
                                                                        <div class="card-header"><strong>Medallas obtenidas</strong></div>
                                                                        <div class="card-body">
                                                                            <div id="medallasChart"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <script>
                                                 document.addEventListener('DOMContentLoaded', function() {
        // Datos pasados desde Laravel
        const datosGraficos = @json($datosGraficos);
        
        // Configuración común para todos los gráficos
        const commonConfig = {
            chart: {
                type: "bar",
                height: 300,
                toolbar: {
                    show: false
                }
            },
            dataLabels: {
                enabled: true
            },
            xaxis: {
                categories: datosGraficos.nombres
            }
        };
        
        // Gráfico de Hojas
        const hojasChart = new ApexCharts(document.querySelector("#hojasChart"), {
            ...commonConfig,
            series: [{ name: "Hojas", data: datosGraficos.hojas }],
            colors: ['#236192'],
            title: { text: "Hojas Completadas por Estudiante" }
        });
        hojasChart.render();
        
        // Gráfico de Exámenes
        const examenesChart = new ApexCharts(document.querySelector("#examenesChart"), {
            ...commonConfig,
            series: [{ name: "Exámenes", data: datosGraficos.examenes }],
            colors: ['#A4D65E'],
            title: { text: "Exámenes Presentados por Estudiante" }
        });
        examenesChart.render();
        
        // Gráfico de Inicios de Sesión
        const loginsChart = new ApexCharts(document.querySelector("#loginsChart"), {
            ...commonConfig,
            series: [{ name: "Inicios de sesión", data: datosGraficos.logins }],
            colors: ['#FF585D'],
            title: { text: "Inicios de Sesión por Estudiante" }
        });
        loginsChart.render();
        
        // Gráfico de Medallas
        const medallasChart = new ApexCharts(document.querySelector("#medallasChart"), {
            ...commonConfig,
            series: [{ name: "Medallas", data: datosGraficos.medallas }],
            colors: ['#007DBA'],
            title: { text: "Medallas Obtenidas por Estudiante" }
        });
        medallasChart.render();
    });
    
 
                                            </script>

                                            <!-- ASISTENCIA -->
                                            <div class="tab-pane fade" id="asistencia" role="tabpanel">
                                                 <div class="col-md-12 col-lg-12">
                                                    <div class="card overflow-hidden">
                                                        <div class="card-header d-flex justify-content-between flex-wrap">
                                                            <div class="header-title">
                                                            <h4 class="card-title mb-2">Asistencia</h4>
                                            <p>Marca la asistencia y deja un comentario si es necesario.</p>
                                                            </div>
                                                        </div>
                                                        <div class="card-body p-0">
                                           
                                            <table class="table table-bordered mt-3">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre completo</th>
                                                    <th>Asistió</th>
                                                    <th>Comentario</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <!-- Repite según tus datos -->
                                                <tr>
                                                    <td>1</td>
                                                    <td>Juan Pérez</td>
                                                    <td><input type="checkbox" class="form-check-input asistencia-check" data-id="1"></td>
                                                    <td><input type="text" class="form-control comentario-input" data-id="1"></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>María López</td>
                                                    <td><input type="checkbox" class="form-check-input asistencia-check" data-id="2"></td>
                                                    <td><input type="text" class="form-control comentario-input" data-id="2"></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Pedro Martínez</td>
                                                    <td><input type="checkbox" class="form-check-input asistencia-check" data-id="3"></td>
                                                    <td><input type="text" class="form-control comentario-input" data-id="3"></td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Lucía Fernández</td>
                                                    <td><input type="checkbox" class="form-check-input asistencia-check" data-id="4"></td>
                                                    <td><input type="text" class="form-control comentario-input" data-id="4"></td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Carlos Ramírez</td>
                                                    <td><input type="checkbox" class="form-check-input asistencia-check" data-id="5"></td>
                                                    <td><input type="text" class="form-control comentario-input" data-id="5"></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                             </div>
                                                </div>
                                            </div>
                                            <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                // Mostrar alerta
                                                function mostrarAlerta() {
                                                    Swal.fire({
                                                        toast: true,
                                                        position: 'top-center',
                                                        icon: 'success',
                                                        title: 'Datos guardados con éxito',
                                                        showConfirmButton: false,
                                                        timer: 1500,
                                                        timerProgressBar: true
                                                    });
                                                }

                                                // Detectar cambios en los checkboxes
                                                document.querySelectorAll('.asistencia-check').forEach(function (checkbox) {
                                                    checkbox.addEventListener('change', function () {
                                                        // Aquí podrías enviar AJAX si necesitas guardar
                                                        mostrarAlerta();
                                                    });
                                                });

                                                // Detectar cambios en inputs (al perder foco)
                                                document.querySelectorAll('.comentario-input').forEach(function (input) {
                                                    input.addEventListener('change', function () {
                                                        // Aquí también podrías enviar AJAX si deseas
                                                        mostrarAlerta();
                                                    });
                                                });
                                            });
                                            </script>


                                            <!-- EMAILS -->
                                          <div class="tab-pane fade" id="emails" role="tabpanel">
                                             <div class="col-md-12 col-lg-12">
                                                    <div class="card overflow-hidden">
                                                        <div class="card-header d-flex justify-content-between flex-wrap">
                                                            <div class="header-title">
                                                            <h4 class="card-title mb-2">Emails</h4>
                                                              <p>
                                                    Contacto de la empresa: 
                                                    <input class="form-control d-inline w-auto" value="soporte@empresa.com" readonly>
                                                    <button class="btn btn-sm btn-primary mx-2">Guardar todos los cambios</button>
                                                    <button class="btn btn-sm btn-success">Enviar correos a estudiantes</button>
                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="card-body p-0">
                                                
                                              

                                                <table class="table table-bordered mt-3">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Nombre completo</th>
                                                            <th>Email</th>
                                                            <th>Contraseña</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td><td>Juan Pérez</td>
                                                            <td><input class="form-control" value="juan@example.com"></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="password" class="form-control password-input" value="abc123">
                                                                    <button class="btn btn-outline-secondary toggle-password" type="button">👁️</button>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-sm btn-primary">Guardar</button>
                                                                <button class="btn btn-sm btn-success">Enviar correo</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td><td>María López</td>
                                                            <td><input class="form-control" value="maria@example.com"></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="password" class="form-control password-input" value="maria456">
                                                                    <button class="btn btn-outline-secondary toggle-password" type="button">👁️</button>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-sm btn-primary">Guardar</button>
                                                                <button class="btn btn-sm btn-success">Enviar correo</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td><td>Pedro Martínez</td>
                                                            <td><input class="form-control" value="pedro@example.com"></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="password" class="form-control password-input" value="pedro789">
                                                                    <button class="btn btn-outline-secondary toggle-password" type="button">👁️</button>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-sm btn-primary">Guardar</button>
                                                                <button class="btn btn-sm btn-success">Enviar correo</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td><td>Lucía Fernández</td>
                                                            <td><input class="form-control" value="lucia@example.com"></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="password" class="form-control password-input" value="lucia321">
                                                                    <button class="btn btn-outline-secondary toggle-password" type="button">👁️</button>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-sm btn-primary">Guardar</button>
                                                                <button class="btn btn-sm btn-success">Enviar correo</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td><td>Carlos Ramírez</td>
                                                            <td><input class="form-control" value="carlos@example.com"></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="password" class="form-control password-input" value="carlos654">
                                                                    <button class="btn btn-outline-secondary toggle-password" type="button">👁️</button>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-sm btn-primary">Guardar</button>
                                                                <button class="btn btn-sm btn-success">Enviar correo</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                             </div>
                                                </div>
                                            </div>

                                            <!-- Script para mostrar/ocultar contraseña -->
                                            <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                document.querySelectorAll('.toggle-password').forEach(function (btn) {
                                                    btn.addEventListener('click', function () {
                                                        const input = this.previousElementSibling;
                                                        input.type = input.type === 'password' ? 'text' : 'password';
                                                    });
                                                });
                                            });
                                            </script>

                                            <style>
                                                .exam-row-1 { background-color: #fff2cc !important; }
                                                .exam-row-2 { background-color: #e1f5fe !important; }
                                                .exam-row-3 { background-color: #f3e5f5 !important; }
                                                .exam-row-4 { background-color: #e8f5e8 !important; }
                                                .exam-row-5 { background-color: #fce4ec !important; }
                                                .exam-row-6 { background-color: #fff3e0 !important; }
                                                
                                                .exam-subrow {
                                                    border-left: 3px solid #007bff;
                                                    padding-left: 10px;
                                                }
                                                
                                                .modal-fullscreen-custom {
                                                    width: 100vw;
                                                    height: 100vh;
                                                    margin: 0;
                                                    max-width: none;
                                                }
                                                
                                                .modal-fullscreen-custom .modal-content {
                                                    height: 100vh;
                                                    border-radius: 0;
                                                }
                                                
                                                .exam-form-item {
                                                    border: 1px solid #dee2e6;
                                                    border-radius: 8px;
                                                    padding: 15px;
                                                    margin-bottom: 15px;
                                                    background-color: #f8f9fa;
                                                }
                                            </style>

                                            <!-- EXÁMENES -->
                                                <div class="tab-pane fade" id="examenes" role="tabpanel">
                                                     <div class="col-md-12 col-lg-12">
                                                        <div class="card overflow-hidden">
                                                            <div class="card-header d-flex justify-content-between flex-wrap">
                                                                <div class="header-title">
                                                                <h4 class="card-title mb-2">Exámenes</h4>
                                                                 <div class="row mb-2">
                                                        <div class="col-md-6">Fecha de inicio del curso: <strong>2025-06-10</strong></div>
                                                        <div class="col-md-6">Fecha de fin del curso: <strong>2025-06-14</strong></div>
                                                        <div class="col-md-6">Apertura membresía: <strong>2025-06-05 08:00</strong></div>
                                                        <div class="col-md-6">Fin membresía: <strong>2025-06-19 23:59</strong></div>
                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-body p-0">
                                                   

                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Acción</th>
                                                                <th>Día</th>
                                                                <th>Exámenes</th>
                                                                <th>Fecha y Hora Inicio</th>
                                                                <th>Fecha y Hora Vencimiento</th>
                                                                <th>Duración</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tableBody">
                                                            <!-- Las filas se generarán dinámicamente -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                                 </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="modalEdit" tabindex="-1">
                                                <div class="modal-dialog modal-fullscreen-custom">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Editar Exámenes - <span id="modalDate"></span></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <div id="examenes-container">
                                                                    <!-- Los exámenes se agregarán aquí dinámicamente -->
                                                                </div>
                                                                <button type="button" class="btn btn-success mb-3" onclick="agregarExamen()">
                                                                    + Agregar Examen
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="button" class="btn btn-primary" onclick="guardarCambios()">Guardar Cambios</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <style>
        .exam-time-card {
            transition: all 0.3s ease;
            border-left: 4px solid #007bff;
        }
        .exam-time-card.expired {
            border-left-color: #dc3545;
            background-color: #f8f9fa;
        }
        .exam-time-card.expiring-soon {
            border-left-color: #ffc107;
            background-color: #fff3cd;
        }
        .exam-time-card.active {
            border-left-color: #28a745;
            background-color: #d4edda;
        }
        .time-remaining {
            font-size: 1.1rem;
            font-weight: bold;
        }
        .time-remaining.expired {
            color: #dc3545;
        }
        .time-remaining.warning {
            color: #ffc107;
        }
        .time-remaining.active {
            color: #28a745;
        }
        .sticky-header {
            position: sticky;
            top: 0;
            background: white;
            z-index: 10;
        }
        .progress-mini {
            height: 6px;
        }
        .exam-column {
            min-width: 150px;
        }
        .status-badge {
            font-size: 0.75rem;
        }
        .score-display {
            font-weight: bold;
            font-size: 0.9rem;
        }
        .avatar-img {
            width: 24px;
            height: 24px;
            border-radius: 50%;
        }
        .progress-cell {
            min-width: 120px;
        }
        .student-row:hover {
            background-color: #f8f9fa;
        }
        .countdown-timer {
            font-family: 'Courier New', monospace;
            font-size: 0.9rem;
        }
    </style>
                                             <script>
                                                // Datos simulados de exámenes
                                                let examenesData = {};
                                                let currentEditingDate = '';
                                                let examCounter = 0;

                                                // Catálogo de exámenes disponibles
                                                const catalogoExamenes = [
                                                    'Examen Teórico Básico',
                                                    'Examen Práctico Nivel 1',
                                                    'Evaluación Intermedia',
                                                    'Examen Final Teórico',
                                                    'Examen Final Práctico',
                                                    'Quiz de Repaso',
                                                    'Evaluación Práctica Avanzada',
                                                    'Examen de Certificación'
                                                ];

                                                // Inicializar datos de ejemplo
                                                function inicializarDatos() {
                                                    // Datos de ejemplo para algunas fechas
                                                    examenesData['2025-06-10'] = [
                                                        {
                                                            nombre: 'Examen Teórico Básico',
                                                            inicio: '2025-06-10 09:00',
                                                            vencimiento: '2025-06-10 11:00'
                                                        },
                                                        {
                                                            nombre: 'Quiz de Repaso',
                                                            inicio: '2025-06-10 14:00',
                                                            vencimiento: '2025-06-10 15:30'
                                                        }
                                                    ];
                                                    
                                                    examenesData['2025-06-12'] = [
                                                        {
                                                            nombre: 'Examen Práctico Nivel 1',
                                                            inicio: '2025-06-12 10:00',
                                                            vencimiento: '2025-06-13 10:00'
                                                        }
                                                    ];
                                                }

                                                // Generar fechas desde 2025-06-05 hasta 2025-06-19
                                                function generarTabla() {
                                                    const tbody = document.getElementById('tableBody');
                                                    tbody.innerHTML = '';
                                                    
                                                    const inicio = new Date('2025-06-05');
                                                    const fin = new Date('2025-06-9');
                                                    
                                                    for (let fecha = new Date(inicio); fecha <= fin; fecha.setDate(fecha.getDate() + 1)) {
                                                        const fechaStr = fecha.toISOString().split('T')[0];
                                                        const examenes = examenesData[fechaStr] || [];
                                                        
                                                        // Fila principal
                                                        const row = document.createElement('tr');
                                                        
                                                        // Columna de acción
                                                        const actionCell = document.createElement('td');
                                                        if (examenes.length > 0) {
                                                            actionCell.setAttribute('rowspan', examenes.length + 1);
                                                        }
                                                        actionCell.innerHTML = `
                                                            <button class="btn btn-sm btn-warning" onclick="editarFecha('${fechaStr}')">
                                                                Editar
                                                            </button>
                                                        `;
                                                        row.appendChild(actionCell);
                                                        
                                                        // Columna de fecha
                                                        const dateCell = document.createElement('td');
                                                        if (examenes.length > 0) {
                                                            dateCell.setAttribute('rowspan', examenes.length + 1);
                                                        }
                                                        dateCell.textContent = fechaStr;
                                                        row.appendChild(dateCell);
                                                        
                                                        if (examenes.length === 0) {
                                                            // Si no hay exámenes, mostrar fila vacía
                                                            const emptyCell = document.createElement('td');
                                                            emptyCell.textContent = 'Sin exámenes';
                                                            emptyCell.setAttribute('colspan', '4');
                                                            row.appendChild(emptyCell);
                                                            tbody.appendChild(row);
                                                        } else {
                                                            // Fila de encabezado para exámenes
                                                            const headerExamCell = document.createElement('td');
                                                            headerExamCell.innerHTML = '<strong>Examen</strong>';
                                                            const headerInicioCell = document.createElement('td');
                                                            headerInicioCell.innerHTML = '<strong>Inicio</strong>';
                                                            const headerVencimientoCell = document.createElement('td');
                                                            headerVencimientoCell.innerHTML = '<strong>Vencimiento</strong>';
                                                            const headerDuracionCell = document.createElement('td');
                                                            headerDuracionCell.innerHTML = '<strong>Duración</strong>';
                                                            
                                                            row.appendChild(headerExamCell);
                                                            row.appendChild(headerInicioCell);
                                                            row.appendChild(headerVencimientoCell);
                                                            row.appendChild(headerDuracionCell);
                                                            tbody.appendChild(row);
                                                            
                                                            // Filas de exámenes
                                                            examenes.forEach((examen, index) => {
                                                                const examRow = document.createElement('tr');
                                                                examRow.className = `exam-row-${(index % 6) + 1} exam-subrow`;
                                                                
                                                                const examNameCell = document.createElement('td');
                                                                examNameCell.innerHTML = `<span class="badge bg-primary">${examen.nombre}</span>`;
                                                                
                                                                const inicioCell = document.createElement('td');
                                                                inicioCell.textContent = examen.inicio;
                                                                
                                                                const vencimientoCell = document.createElement('td');
                                                                vencimientoCell.textContent = examen.vencimiento;
                                                                
                                                                const duracionCell = document.createElement('td');
                                                                duracionCell.textContent = calcularDuracion(examen.inicio, examen.vencimiento);
                                                                
                                                                examRow.appendChild(examNameCell);
                                                                examRow.appendChild(inicioCell);
                                                                examRow.appendChild(vencimientoCell);
                                                                examRow.appendChild(duracionCell);
                                                                
                                                                tbody.appendChild(examRow);
                                                            });
                                                        }
                                                    }
                                                }

                                                // Calcular duración entre dos fechas
                                                function calcularDuracion(inicio, vencimiento) {
                                                    const fechaInicio = new Date(inicio);
                                                    const fechaVencimiento = new Date(vencimiento);
                                                    const diferencia = fechaVencimiento - fechaInicio;
                                                    
                                                    const minutos = Math.floor(diferencia / (1000 * 60));
                                                    const horas = Math.floor(minutos / 60);
                                                    const dias = Math.floor(horas / 24);
                                                    
                                                    if (minutos < 60) {
                                                        return `${minutos} min`;
                                                    } else if (horas < 24) {
                                                        return `${horas} h`;
                                                    } else {
                                                        return `${dias} días`;
                                                    }
                                                }

                                                // Abrir modal para editar fecha
                                                function editarFecha(fecha) {
                                                    currentEditingDate = fecha;
                                                    document.getElementById('modalDate').textContent = fecha;
                                                    
                                                    const container = document.getElementById('examenes-container');
                                                    container.innerHTML = '';
                                                    
                                                    const examenes = examenesData[fecha] || [];
                                                    examenes.forEach((examen, index) => {
                                                        agregarExamenAlModal(examen, index);
                                                    });
                                                    
                                                    const modal = new bootstrap.Modal(document.getElementById('modalEdit'));
                                                    modal.show();
                                                }

                                                // Agregar nuevo examen al modal
                                                function agregarExamen() {
                                                    agregarExamenAlModal(null, examCounter++);
                                                }

                                                // Agregar examen al modal (nuevo o existente)
                                                function agregarExamenAlModal(examen = null, index) {
                                                    const container = document.getElementById('examenes-container');
                                                    
                                                    const examDiv = document.createElement('div');
                                                    examDiv.className = 'exam-form-item';
                                                    examDiv.setAttribute('data-index', index);
                                                    
                                                    examDiv.innerHTML = `
                                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                                            <h6>Examen ${index + 1}</h6>
                                                            <button type="button" class="btn btn-sm btn-danger" onclick="eliminarExamen(${index})">
                                                                Eliminar
                                                            </button>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 mb-3">
                                                                <label class="form-label">Nombre del Examen</label>
                                                                <select class="form-select" id="nombre_${index}">
                                                                    <option value="">Seleccionar examen...</option>
                                                                    ${catalogoExamenes.map(cat => 
                                                                        `<option value="${cat}" ${examen && examen.nombre === cat ? 'selected' : ''}>${cat}</option>`
                                                                    ).join('')}
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label">Fecha y Hora de Inicio</label>
                                                                <input type="datetime-local" class="form-control" id="inicio_${index}" 
                                                                    value="${examen ? examen.inicio : ''}">
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label">Fecha y Hora de Vencimiento</label>
                                                                <input type="datetime-local" class="form-control" id="vencimiento_${index}"
                                                                    value="${examen ? examen.vencimiento : ''}">
                                                            </div>
                                                        </div>
                                                    `;
                                                    
                                                    container.appendChild(examDiv);
                                                }

                                                // Eliminar examen del modal
                                                function eliminarExamen(index) {
                                                    const examDiv = document.querySelector(`[data-index="${index}"]`);
                                                    if (examDiv) {
                                                        examDiv.remove();
                                                    }
                                                }

                                                // Guardar cambios del modal
                                                function guardarCambios() {
                                                    const container = document.getElementById('examenes-container');
                                                    const examItems = container.querySelectorAll('.exam-form-item');
                                                    
                                                    const nuevosExamenes = [];
                                                    
                                                    examItems.forEach(item => {
                                                        const index = item.getAttribute('data-index');
                                                        const nombre = document.getElementById(`nombre_${index}`).value;
                                                        const inicio = document.getElementById(`inicio_${index}`).value;
                                                        const vencimiento = document.getElementById(`vencimiento_${index}`).value;
                                                        
                                                        if (nombre && inicio && vencimiento) {
                                                            nuevosExamenes.push({
                                                                nombre: nombre,
                                                                inicio: inicio,
                                                                vencimiento: vencimiento
                                                            });
                                                        }
                                                    });
                                                    
                                                    examenesData[currentEditingDate] = nuevosExamenes;
                                                    
                                                    // Cerrar modal
                                                    const modal = bootstrap.Modal.getInstance(document.getElementById('modalEdit'));
                                                    modal.hide();
                                                    
                                                    // Regenerar tabla
                                                    generarTabla();
                                                }

                                                // Inicializar cuando se carga la página
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    inicializarDatos();
                                                    generarTabla();
                                                });
                                            </script>
    
                                            <!-- PROGRESO -->
                                            <div class="tab-pane fade" id="progreso" role="tabpanel">
                                                <div class="col-md-12 col-lg-12">
                                                    <div class="card overflow-hidden">
                                                        <div class="card-header d-flex justify-content-between flex-wrap">
                                                            <div class="header-title">
                                                            </div>
                                                            <div class="d-flex gap-2">
                                                                <button class="btn btn-sm btn-primary" onclick="actualizarProgreso()">
                                                                    Actualizar
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="card-body p-0">
                                                            <div class="card mb-4 mt-4">
                                                                <div class="card-header">
                                                                    <h5 class="card-title mb-0">Resumen de Exámenes - Estado y Tiempo Restante</h5>
                                                                    <small class="text-muted">Actualizado en tiempo real cada minuto</small>
                                                                </div>
                                                                <div class="card-body p-0">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-hover mb-0">
                                                                            <thead class="table-light">
                                                                                <tr>
                                                                                    <th>Examen</th>
                                                                                    <th>Fecha de Inicio</th>
                                                                                    <th>Fecha de Vencimiento</th>
                                                                                    <th>Estado</th>
                                                                                    <th>Tiempo Restante</th>
                                                                                    <th>Progreso General</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="examenes-resumen-tabla">
                                                                                <!-- Se llenará dinámicamente -->
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                             <div class="card mb-4 mt-4">
                                                                 <div class="card-header">
                                                                    <h5 class="card-title mb-0">Progreso de Exámenes por Estudiante</h5>
                                                                    <small class="text-muted">Seguimiento detallado del progreso en cada examen del curso</small>
                                                                </div>
                                                            <div class="table-responsive mt-4">
                                                                <table id="progreso-table" class="table table-striped mb-0" role="grid">
                                                                    <thead class="sticky-header">
                                                                        <tr>
                                                                            <th>ESTUDIANTE</th>
                                                                            <th>ID</th>
                                                                            <th>VISITAS</th>
                                                                            <th class="text-center">PROGRESO GENERAL</th>
                                                                            <th class="exam-column">Examen Teórico Básico</th>
                                                                            <th class="exam-column">Quiz de Repaso</th>
                                                                            <th class="exam-column">Examen Práctico Nivel 1</th>
                                                                            <th class="exam-column">Evaluación Intermedia</th>
                                                                            <th class="exam-column">Examen Final Teórico</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="progresotabla">
                                                                        <!-- Los datos se cargarán dinámicamente -->
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                               <script>
        const estudiantesProgreso = [
           {
                id: 927937,
                nombre: 'Juan Perez',
                avatar: 'man-1.png',
                visitas: '45,332',
                progresoGeneral: 60
            },
            {
                id: 465547,
                nombre: 'Francisco Ocana',
                avatar: 'man-1.png',
                visitas: '13,830',
                progresoGeneral: 25
            },
            {
                id: 46554,
                nombre: 'Martin Doe',
                avatar: 'man-1.png',
                visitas: '95,98',
                progresoGeneral: 100
            },
            {
                id: 45646,
                nombre: 'Jonh Doe',
                avatar: 'man-1.png',
                visitas: '58,732',
                progresoGeneral: 100
            },
            {
                id: 243534,
                nombre: 'Pedro Taxialaga',
                avatar: 'man-1.png',
                visitas: '95,332',
                progresoGeneral: 75
            }
        ];

        // Datos de exámenes con fechas y horarios
        const examenesConFechas = [
            {
                nombre: 'Examen Teórico Básico',
                inicio: '2025-06-10 09:00',
                vencimiento: '2025-06-10 11:00'
            },
            {
                nombre: 'Quiz de Repaso',
                inicio: '2025-06-10 14:00',
                vencimiento: '2025-06-10 15:30'
            },
            {
                nombre: 'Examen Práctico Nivel 1',
                inicio: '2025-06-03 10:00',
                vencimiento: '2025-06-03 12:50'
            },
            {
                nombre: 'Evaluación Intermedia',
                inicio: '2025-06-02 09:00',
                vencimiento: '2025-06-02 12:00'
            },
            {
                nombre: 'Examen Final Teórico',
                inicio: '2025-06-16 10:00',
                vencimiento: '2025-06-16 13:00'
            }
        ];

        // Función para calcular tiempo restante
        function calcularTiempoRestante(fechaVencimiento) {
            const ahora = new Date();
            const vencimiento = new Date(fechaVencimiento);
            const diferencia = vencimiento - ahora;

            if (diferencia <= 0) {
                return { texto: 'VENCIDO', clase: 'expired', tipo: 'vencido' };
            }

            const dias = Math.floor(diferencia / (1000 * 60 * 60 * 24));
            const horas = Math.floor((diferencia % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutos = Math.floor((diferencia % (1000 * 60 * 60)) / (1000 * 60));

            let texto = '';
            let clase = '';
            let tipo = '';

            if (dias > 0) {
                texto = `${dias}d ${horas}h ${minutos}m`;
                clase = dias <= 1 ? 'warning' : 'active';
                tipo = dias <= 1 ? 'pronto' : 'activo';
            } else if (horas > 0) {
                texto = `${horas}h ${minutos}m`;
                clase = horas <= 2 ? 'warning' : 'active';
                tipo = horas <= 2 ? 'pronto' : 'activo';
            } else {
                texto = `${minutos}m`;
                clase = 'warning';
                tipo = 'pronto';
            }

            return { texto, clase, tipo };
        }

        // Función para obtener estado del examen
        function obtenerEstadoExamen(fechaInicio, fechaVencimiento) {
            const ahora = new Date();
            const inicio = new Date(fechaInicio);
            const vencimiento = new Date(fechaVencimiento);

            if (ahora < inicio) {
                return { texto: 'Programado', clase: 'secondary', icono: '📅' };
            } else if (ahora >= inicio && ahora <= vencimiento) {
                return { texto: 'Activo', clase: 'success', icono: '✅' };
            } else {
                return { texto: 'Vencido', clase: 'danger', icono: '❌' };
            }
        }

        // Función para calcular progreso general de cada examen
        function calcularProgresoGeneralExamen(nombreExamen) {
            let totalEstudiantes = estudiantesProgreso.length;
            let completados = 0;
            let enProgreso = 0;

            // Simulación basada en el nombre del examen
            const progresoData = generarProgresoExamenesEstudiantes();
            
            estudiantesProgreso.forEach(estudiante => {
                const statusExamen = progresoData[estudiante.id][nombreExamen];
                if (statusExamen.status === 'completado') {
                    completados++;
                } else if (statusExamen.status === 'en-progreso') {
                    enProgreso++;
                }
            });

            const porcentajeCompletado = Math.round((completados / totalEstudiantes) * 100);
            const porcentajeEnProgreso = Math.round((enProgreso / totalEstudiantes) * 100);

            return {
                completados,
                enProgreso,
                pendientes: totalEstudiantes - completados - enProgreso,
                porcentajeCompletado,
                porcentajeEnProgreso
            };
        }

        // Construir tabla de resumen de exámenes
        function construirTablaResumenExamenes() {
            const tbody = document.getElementById('examenes-resumen-tabla');
            tbody.innerHTML = '';

            examenesConFechas.forEach(examen => {
                const tiempoRestante = calcularTiempoRestante(examen.vencimiento);
                const estado = obtenerEstadoExamen(examen.inicio, examen.vencimiento);
                const progreso = calcularProgresoGeneralExamen(examen.nombre);

                const row = document.createElement('tr');
                row.className = `exam-time-card ${tiempoRestante.tipo === 'vencido' ? 'expired' : tiempoRestante.tipo === 'pronto' ? 'expiring-soon' : 'active'}`;

                row.innerHTML = `
                    <td>
                        <div class="d-flex align-items-center">
                            <span class="me-2">${estado.icono}</span>
                            <strong>${examen.nombre}</strong>
                        </div>
                    </td>
                    <td>
                        <small class="text-muted">${new Date(examen.inicio).toLocaleString('es-ES')}</small>
                    </td>
                    <td>
                        <small class="text-muted">${new Date(examen.vencimiento).toLocaleString('es-ES')}</small>
                    </td>
                    <td>
                        <span class="badge bg-${estado.clase}">${estado.texto}</span>
                    </td>
                    <td>
                        <span class="time-remaining countdown-timer ${tiempoRestante.clase}">${tiempoRestante.texto}</span>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="progress me-2" style="width: 100px; height: 8px;">
                                <div class="progress-bar bg-success" style="width: ${progreso.porcentajeCompletado}%"></div>
                                <div class="progress-bar bg-warning" style="width: ${progreso.porcentajeEnProgreso}%"></div>
                            </div>
                            <small class="text-muted">${progreso.completados}/${estudiantesProgreso.length}</small>
                        </div>
                    </td>
                `;

                tbody.appendChild(row);
            });
        }

        // Exámenes del curso de progreso
        const examenesProgreso = [
            'Examen Teórico Básico',
            'Quiz de Repaso',
            'Examen Práctico Nivel 1',
            'Evaluación Intermedia',
            'Examen Final Teórico'
        ];

        // Generar progreso aleatorio pero consistente para cada estudiante
        function generarProgresoExamenesEstudiantes() {
            const progresoDataExamenes = {};
            
            estudiantesProgreso.forEach(estudiante => {
                progresoDataExamenes[estudiante.id] = {};
                
                examenesProgreso.forEach((examen, index) => {
                    // Generar datos basados en el progreso general del estudiante
                    const baseProgress = estudiante.progresoGeneral;
                    let status, score, progress;
                    
                    if (baseProgress >= 75) {
                        // Estudiantes avanzados
                        if (index < 3) {
                            status = 'completado';
                            score = Math.floor(Math.random() * 20) + 80; // 80-100
                            progress = 100;
                        } else if (index < 4) {
                            status = Math.random() > 0.3 ? 'completado' : 'en-progreso';
                            score = status === 'completado' ? Math.floor(Math.random() * 25) + 75 : null;
                            progress = status === 'completado' ? 100 : Math.floor(Math.random() * 40) + 50;
                        } else {
                            status = 'pendiente';
                            score = null;
                            progress = 0;
                        }
                    } else if (baseProgress >= 50) {
                        // Estudiantes intermedios
                        if (index < 2) {
                            status = 'completado';
                            score = Math.floor(Math.random() * 25) + 65; // 65-90
                            progress = 100;
                        } else if (index < 3) {
                            status = Math.random() > 0.5 ? 'en-progreso' : 'completado';
                            score = status === 'completado' ? Math.floor(Math.random() * 20) + 70 : null;
                            progress = status === 'completado' ? 100 : Math.floor(Math.random() * 50) + 30;
                        } else {
                            status = 'pendiente';
                            score = null;
                            progress = 0;
                        }
                    } else {
                        // Estudiantes principiantes
                        if (index < 1) {
                            status = Math.random() > 0.3 ? 'completado' : 'en-progreso';
                            score = status === 'completado' ? Math.floor(Math.random() * 20) + 60 : null;
                            progress = status === 'completado' ? 100 : Math.floor(Math.random() * 60) + 20;
                        } else if (index < 2) {
                            status = Math.random() > 0.6 ? 'en-progreso' : 'pendiente';
                            score = null;
                            progress = status === 'en-progreso' ? Math.floor(Math.random() * 40) + 10 : 0;
                        } else {
                            status = 'pendiente';
                            score = null;
                            progress = 0;
                        }
                    }
                    
                    progresoDataExamenes[estudiante.id][examen] = {
                        status: status,
                        score: score,
                        progress: progress
                    };
                });
            });
            
            return progresoDataExamenes;
        }

        // Obtener clase de color según el status del examen
        function obtenerColorStatus(status) {
            switch(status) {
                case 'completado': return 'success';
                case 'en-progreso': return 'warning';
                case 'pendiente': return 'secondary';
                default: return 'secondary';
            }
        }

        // Obtener texto del status del examen
        function obtenerTextoStatus(status) {
            switch(status) {
                case 'completado': return 'Completado';
                case 'en-progreso': return 'En Progreso';
                case 'pendiente': return 'Pendiente';
                default: return 'Sin Iniciar';
            }
        }

        // Obtener color de la barra de progreso del examen
        function obtenerColorProgreso(progress) {
            if (progress >= 80) return 'success';
            if (progress >= 60) return 'info';
            if (progress >= 40) return 'warning';
            return 'danger';
        }

        // Generar tabla de progreso de exámenes
        function construirTablaProgreso() {
            const tbody = document.getElementById('progresotabla');
            tbody.innerHTML = '';
            
            const progresoDataExamenes = generarProgresoExamenesEstudiantes();
            
            estudiantesProgreso.forEach(estudiante => {
                const row = document.createElement('tr');
                row.className = 'student-row';
                
                // Columna de estudiante
                const studentCell = document.createElement('td');
                studentCell.innerHTML = `
                    <div class="d-flex align-items-center">
                        <img class="me-2 avatar-img" src="https://via.placeholder.com/24x24/007bff/ffffff?text=${estudiante.nombre.charAt(estudiante.nombre.length - 1)}" alt="profile">
                        <h6 class="mb-0">${estudiante.nombre}</h6>
                    </div>
                `;
                
                // Columna de ID
                const idCell = document.createElement('td');
                idCell.textContent = estudiante.id;
                
                // Columna de visitas
                const visitasCell = document.createElement('td');
                visitasCell.textContent = estudiante.visitas;
                
                // Columna de progreso general
                const progresoCell = document.createElement('td');
                progresoCell.className = 'progress-cell';
                const progressColor = estudiante.progresoGeneral === 100 ? 'secondary' : 'primary';
                progresoCell.innerHTML = `
                    <div class="d-flex align-items-center mb-2">
                        <h6 class="mb-0">${estudiante.progresoGeneral}%</h6>
                    </div>
                    <div class="progress w-100" style="height: 8px">
                        <div class="progress-bar bg-${progressColor}" role="progressbar" 
                             style="width: ${estudiante.progresoGeneral}%" 
                             aria-valuenow="${estudiante.progresoGeneral}" 
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                `;
                
                row.appendChild(studentCell);
                row.appendChild(idCell);
                row.appendChild(visitasCell);
                row.appendChild(progresoCell);
                
                // Columnas de exámenes
                examenesProgreso.forEach(examen => {
                    const examCell = document.createElement('td');
                    examCell.className = 'exam-column';
                    
                    const examData = progresoDataExamenes[estudiante.id][examen];
                    const statusColor = obtenerColorStatus(examData.status);
                    const progressColor = obtenerColorProgreso(examData.progress);
                    
                    examCell.innerHTML = `
                        <div class="text-center">
                            <span class="badge bg-${statusColor} status-badge mb-2">
                                ${obtenerTextoStatus(examData.status)}
                            </span>
                            ${examData.score ? `<div class="score-display text-${statusColor} mb-1">${examData.score}/100</div>` : ''}
                            <div class="progress progress-mini">
                                <div class="progress-bar bg-${progressColor}" role="progressbar" 
                                     style="width: ${examData.progress}%" 
                                     aria-valuenow="${examData.progress}" 
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small class="text-muted">${examData.progress}%</small>
                        </div>
                    `;
                    
                    row.appendChild(examCell);
                });
                
                tbody.appendChild(row);
            });
        }

        // Función para exportar progreso de exámenes
        function exportarProgreso() {
            alert('Funcionalidad de exportación de progreso en desarrollo');
        }

        // Función para actualizar progreso de exámenes
        function actualizarProgreso() {
            construirTablaProgreso();
            construirTablaResumenExamenes();
            
            // Mostrar toast de confirmación
            const toast = document.createElement('div');
            toast.className = 'toast position-fixed top-0 end-0 m-3';
            toast.style.zIndex = '9999';
            toast.innerHTML = `
                <div class="toast-header">
                    <strong class="me-auto">Progreso Actualizado</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                </div>
                <div class="toast-body">
                    Los datos de progreso de exámenes han sido actualizados correctamente.
                </div>
            `;
            
            document.body.appendChild(toast);
            const bsToast = new bootstrap.Toast(toast);
            bsToast.show();
            
            toast.addEventListener('hidden.bs.toast', () => {
                document.body.removeChild(toast);
            });
        }

        // Actualizar contador cada minuto
        function iniciarContadorTiempo() {
            setInterval(() => {
                construirTablaResumenExamenes();
            }, 60000); // Actualizar cada minuto
        }

        // Inicializar cuando se carga la página
        document.addEventListener('DOMContentLoaded', function() {
            construirTablaProgreso();
            construirTablaResumenExamenes();
            iniciarContadorTiempo();
        });
    </script>
                                        </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       

       
<script>
  document.querySelectorAll('.asistencia-check').forEach(input => {
    input.addEventListener('change', e => {
      const id = e.target.dataset.id;
      const comentario = document.querySelector(`.comentario-input[data-id="${id}"]`);
      comentario.disabled = e.target.checked;
    });
  });
</script>
@endsection