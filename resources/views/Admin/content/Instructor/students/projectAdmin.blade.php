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
                    <h4 class="title text-primary">Dashboard</h4>
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
                                                                                <div id="basic-radialbar-chart-1" class="custom-radial-chart" data-value="90" data-show-value="90%" data-label="Progreso" data-color="#A4D65E"></div>
                                                                                <hr class="mt-0">
                                                                                <p class="text-center mb-0">
                                                                                    <span>
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" viewBox="0 0 14 15" fill="none">
                                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6663 7.50016C13.6663 11.1821 10.6816 14.1668 6.99967 14.1668C3.31778 14.1668 0.333008 11.1821 0.333008 7.50016C0.333008 3.81826 3.31778 0.833496 6.99967 0.833496C10.6816 0.833496 13.6663 3.81826 13.6663 7.50016ZM1.66634 7.50016C1.66634 10.4457 4.05416 12.8335 6.99967 12.8335C9.94519 12.8335 12.333 10.4457 12.333 7.50016C12.333 4.55464 9.94519 2.16683 6.99967 2.16683C4.05416 2.16683 1.66634 4.55464 1.66634 7.50016ZM6.33301 4.8335V8.16683C6.33301 8.53502 6.63148 8.8335 6.99967 8.8335C7.36786 8.8335 7.66634 8.53502 7.66634 8.16683V4.8335C7.66634 4.46531 7.36786 4.16683 6.99967 4.16683C6.63148 4.16683 6.33301 4.46531 6.33301 4.8335ZM7.66634 10.1668C7.66634 10.535 7.36786 10.8335 6.99967 10.8335C6.63148 10.8335 6.33301 10.535 6.33301 10.1668C6.33301 9.79864 6.63148 9.50016 6.99967 9.50016C7.36786 9.50016 7.66634 9.79864 7.66634 10.1668Z" fill="#AAA1AA" />
                                                                                        </svg>
                                                                                    </span>
                                                                                    <small>Juan Perez</small>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div id="basic-radialbar-chart-2" class="custom-radial-chart" data-value="80" data-show-value="80%" data-label="Progreso" data-color="#007DBA"></div>
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
                                                                                <div id="basic-radialbar-chart-3" class="custom-radial-chart" data-value="60" data-show-value="60%" data-label="Progreso" data-color="#FF585D"></div>
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
                                                                                <div id="basic-radialbar-chart" class="custom-radial-chart" data-value="50" data-show-value="50%" data-label="Progreso" data-color="#A4D65E"></div>
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
                                                                                <div id="basic-radialbar-chart-5" class="custom-radial-chart" data-value="35" data-show-value="35%" data-label="Progreso" data-color="#FF585D"></div>
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
                                                const estudiantes = ["Juan Perez", "Francisco Ocana", "Martin Doe", "Jonh Doe", "Pedro Taxialaga"];

                                                // Hojas de matar
                                                const hojasData = [12, 9, 15, 8, 11];
                                                const hojasChart = new ApexCharts(document.querySelector("#hojasChart"), {
                                                    chart: { type: "bar", height: 300 },
                                                    series: [{ name: "Hojas", data: hojasData }],
                                                    xaxis: { categories: estudiantes },
                                                    colors: ['#236192'],
                                                    title: { text: "Cantidad por estudiante" }
                                                });
                                                hojasChart.render();

                                                // Exámenes presentados
                                                const examenData = [5, 7, 6, 4, 8];
                                                const examenesChart = new ApexCharts(document.querySelector("#examenesChart"), {
                                                    chart: { type: "bar", height: 300 },
                                                    series: [{ name: "Exámenes", data: examenData }],
                                                    xaxis: { categories: estudiantes },
                                                    colors: ['#A4D65E'],
                                                    title: { text: "Total de exámenes" }
                                                });
                                                examenesChart.render();

                                                // Inicios de sesión
                                                const loginsData = [40, 55, 30, 60, 25];
                                                const loginsChart = new ApexCharts(document.querySelector("#loginsChart"), {
                                                    chart: { type: "bar", height: 300 },
                                                    series: [{ name: "Inicios de sesión", data: loginsData }],
                                                    xaxis: { categories: estudiantes },
                                                    colors: ['#FF585D'],
                                                    title: { text: "Veces que ingresaron" }
                                                });
                                                loginsChart.render();

                                                // Medallas obtenidas
                                                const medallasData = [3, 5, 2, 6, 4];
                                                const medallasChart = new ApexCharts(document.querySelector("#medallasChart"), {
                                                    chart: { type: "bar", height: 300 },
                                                    series: [{ name: "Medallas", data: medallasData }],
                                                    xaxis: { categories: estudiantes },
                                                    colors: ['#007DBA'],
                                                    title: { text: "Número de medallas" }
                                                });
                                                medallasChart.render();
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
</main>
@endsection