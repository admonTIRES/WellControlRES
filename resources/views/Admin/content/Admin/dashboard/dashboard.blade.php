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
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="row">
                
                        <div class="swiper-container  d-slider2">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="basic-radialbar-chart-1" class="custom-radial-chart" data-value="90" data-show-value="98,980" data-label="Unique Visitors" data-color="#A4D65E"></div>
                                            <hr class="mt-0">
                                            <p class="text-center mb-0">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" viewBox="0 0 14 15" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6663 7.50016C13.6663 11.1821 10.6816 14.1668 6.99967 14.1668C3.31778 14.1668 0.333008 11.1821 0.333008 7.50016C0.333008 3.81826 3.31778 0.833496 6.99967 0.833496C10.6816 0.833496 13.6663 3.81826 13.6663 7.50016ZM1.66634 7.50016C1.66634 10.4457 4.05416 12.8335 6.99967 12.8335C9.94519 12.8335 12.333 10.4457 12.333 7.50016C12.333 4.55464 9.94519 2.16683 6.99967 2.16683C4.05416 2.16683 1.66634 4.55464 1.66634 7.50016ZM6.33301 4.8335V8.16683C6.33301 8.53502 6.63148 8.8335 6.99967 8.8335C7.36786 8.8335 7.66634 8.53502 7.66634 8.16683V4.8335C7.66634 4.46531 7.36786 4.16683 6.99967 4.16683C6.63148 4.16683 6.33301 4.46531 6.33301 4.8335ZM7.66634 10.1668C7.66634 10.535 7.36786 10.8335 6.99967 10.8335C6.63148 10.8335 6.33301 10.535 6.33301 10.1668C6.33301 9.79864 6.63148 9.50016 6.99967 9.50016C7.36786 9.50016 7.66634 9.79864 7.66634 10.1668Z" fill="#AAA1AA" />
                                                    </svg>
                                                </span>
                                                <small>Visitas al sitio</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="basic-radialbar-chart-2" class="custom-radial-chart" data-value="80" data-show-value="78,546" data-label="Clicks" data-color="#007DBA"></div>
                                            <hr class="mt-0">
                                            <p class="text-center mb-0">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" viewBox="0 0 14 15" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6663 7.50016C13.6663 11.1821 10.6816 14.1668 6.99967 14.1668C3.31778 14.1668 0.333008 11.1821 0.333008 7.50016C0.333008 3.81826 3.31778 0.833496 6.99967 0.833496C10.6816 0.833496 13.6663 3.81826 13.6663 7.50016ZM1.66634 7.50016C1.66634 10.4457 4.05416 12.8335 6.99967 12.8335C9.94519 12.8335 12.333 10.4457 12.333 7.50016C12.333 4.55464 9.94519 2.16683 6.99967 2.16683C4.05416 2.16683 1.66634 4.55464 1.66634 7.50016ZM6.33301 4.8335V8.16683C6.33301 8.53502 6.63148 8.8335 6.99967 8.8335C7.36786 8.8335 7.66634 8.53502 7.66634 8.16683V4.8335C7.66634 4.46531 7.36786 4.16683 6.99967 4.16683C6.63148 4.16683 6.33301 4.46531 6.33301 4.8335ZM7.66634 10.1668C7.66634 10.535 7.36786 10.8335 6.99967 10.8335C6.63148 10.8335 6.33301 10.535 6.33301 10.1668C6.33301 9.79864 6.63148 9.50016 6.99967 9.50016C7.36786 9.50016 7.66634 9.79864 7.66634 10.1668Z" fill="#AAA1AA" />
                                                    </svg>
                                                </span>
                                                <small>Membresias</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="basic-radialbar-chart-3" class="custom-radial-chart" data-value="60" data-show-value="64,008" data-label="Subscribes" data-color="#FF585D"></div>
                                            <hr class="mt-0">
                                            <p class="text-center mb-0">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" viewBox="0 0 14 15" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6663 7.50016C13.6663 11.1821 10.6816 14.1668 6.99967 14.1668C3.31778 14.1668 0.333008 11.1821 0.333008 7.50016C0.333008 3.81826 3.31778 0.833496 6.99967 0.833496C10.6816 0.833496 13.6663 3.81826 13.6663 7.50016ZM1.66634 7.50016C1.66634 10.4457 4.05416 12.8335 6.99967 12.8335C9.94519 12.8335 12.333 10.4457 12.333 7.50016C12.333 4.55464 9.94519 2.16683 6.99967 2.16683C4.05416 2.16683 1.66634 4.55464 1.66634 7.50016ZM6.33301 4.8335V8.16683C6.33301 8.53502 6.63148 8.8335 6.99967 8.8335C7.36786 8.8335 7.66634 8.53502 7.66634 8.16683V4.8335C7.66634 4.46531 7.36786 4.16683 6.99967 4.16683C6.63148 4.16683 6.33301 4.46531 6.33301 4.8335ZM7.66634 10.1668C7.66634 10.535 7.36786 10.8335 6.99967 10.8335C6.63148 10.8335 6.33301 10.535 6.33301 10.1668C6.33301 9.79864 6.63148 9.50016 6.99967 9.50016C7.36786 9.50016 7.66634 9.79864 7.66634 10.1668Z" fill="#AAA1AA" />
                                                    </svg>
                                                </span>
                                                <small>Membresias activas</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="basic-radialbar-chart-4" class="custom-radial-chart" data-value="50" data-show-value="50,546" data-label="Sent" data-color="#A4D65E"></div>
                                            <hr class="mt-0">
                                            <p class="text-center mb-0">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" viewBox="0 0 14 15" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6663 7.50016C13.6663 11.1821 10.6816 14.1668 6.99967 14.1668C3.31778 14.1668 0.333008 11.1821 0.333008 7.50016C0.333008 3.81826 3.31778 0.833496 6.99967 0.833496C10.6816 0.833496 13.6663 3.81826 13.6663 7.50016ZM1.66634 7.50016C1.66634 10.4457 4.05416 12.8335 6.99967 12.8335C9.94519 12.8335 12.333 10.4457 12.333 7.50016C12.333 4.55464 9.94519 2.16683 6.99967 2.16683C4.05416 2.16683 1.66634 4.55464 1.66634 7.50016ZM6.33301 4.8335V8.16683C6.33301 8.53502 6.63148 8.8335 6.99967 8.8335C7.36786 8.8335 7.66634 8.53502 7.66634 8.16683V4.8335C7.66634 4.46531 7.36786 4.16683 6.99967 4.16683C6.63148 4.16683 6.33301 4.46531 6.33301 4.8335ZM7.66634 10.1668C7.66634 10.535 7.36786 10.8335 6.99967 10.8335C6.63148 10.8335 6.33301 10.535 6.33301 10.1668C6.33301 9.79864 6.63148 9.50016 6.99967 9.50016C7.36786 9.50016 7.66634 9.79864 7.66634 10.1668Z" fill="#AAA1AA" />
                                                    </svg>
                                                </span>
                                                <small>Membresias para Empresas</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="basic-radialbar-chart-5" class="custom-radial-chart" data-value="35" data-show-value="35,546" data-label="Visitors" data-color="#FF585D"></div>
                                            <hr class="mt-0">
                                            <p class="text-center mb-0">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" viewBox="0 0 14 15" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6663 7.50016C13.6663 11.1821 10.6816 14.1668 6.99967 14.1668C3.31778 14.1668 0.333008 11.1821 0.333008 7.50016C0.333008 3.81826 3.31778 0.833496 6.99967 0.833496C10.6816 0.833496 13.6663 3.81826 13.6663 7.50016ZM1.66634 7.50016C1.66634 10.4457 4.05416 12.8335 6.99967 12.8335C9.94519 12.8335 12.333 10.4457 12.333 7.50016C12.333 4.55464 9.94519 2.16683 6.99967 2.16683C4.05416 2.16683 1.66634 4.55464 1.66634 7.50016ZM6.33301 4.8335V8.16683C6.33301 8.53502 6.63148 8.8335 6.99967 8.8335C7.36786 8.8335 7.66634 8.53502 7.66634 8.16683V4.8335C7.66634 4.46531 7.36786 4.16683 6.99967 4.16683C6.63148 4.16683 6.33301 4.46531 6.33301 4.8335ZM7.66634 10.1668C7.66634 10.535 7.36786 10.8335 6.99967 10.8335C6.63148 10.8335 6.33301 10.535 6.33301 10.1668C6.33301 9.79864 6.63148 9.50016 6.99967 9.50016C7.36786 9.50016 7.66634 9.79864 7.66634 10.1668Z" fill="#AAA1AA" />
                                                    </svg>
                                                </span>
                                                <small>Membresias individuales</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between flex-wrap">
                                    <div class="header-title">
                                        <h4 class="card-title">Historial de membresias</h4>
                                    </div>
                                    <div class="d-flex align-items-center align-self-center">
                                        <div class="d-flex align-items-center text-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24" fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                            <div class="ms-2">
                                                <span>Total membresias para empresas</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center ms-3 text-secondary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24" fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                            <div class="ms-2">
                                                <span>Total membresias individuales</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="d-main" class="d-main"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="card overflow-hidden">
                                <div class="card-header d-flex justify-content-between flex-wrap">
                                    <div class="header-title">
                                        <h4 class="card-title mb-2">Progreso estudiantes</h4>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check" id="btncheck1">
                                        <label class="btn btn-outline-primary" for="btncheck1">Today</label>

                                        <input type="checkbox" class="btn-check" id="btncheck2">
                                        <label class="btn btn-outline-primary" for="btncheck2">This Week</label>

                                        <input type="checkbox" class="btn-check" id="btncheck3">
                                        <label class="btn btn-outline-primary" for="btncheck3">This Month</label>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive mt-4">
                                        <table id="basic-table" class="table table-striped mb-0 transactions-table" role="grid">
                                            <thead>
                                                <tr>
                                                    <th>USER</th>
                                                    <th>ID</th>
                                                    <th>VISITAS</th>
                                                    <th>PROGRESO</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img class="me-2" style="width: 24px; height: 24px; object-fit: cover; border-radius: 50%;" src="{{ asset('assets/images/avatar/man-1.png') }}" alt="profile">
                                                            <h6>USER 1</h6>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        927937
                                                    </td>
                                                    <td>45,332</td>
                                                    <td>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <h6>60%</h6>
                                                        </div>
                                                        <div class="progress w-100" style="height: 8px">
                                                            <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                        <img class="me-2" style="width: 24px; height: 24px; object-fit: cover; border-radius: 50%;" src="{{ asset('assets/images/avatar/man-1.png') }}" alt="profile">

                                                        <h6>USER 2</h6>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        465547
                                                    </td>
                                                    <td>13,830</td>
                                                    <td>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <h6>25%</h6>
                                                        </div>
                                                        <div class="progress w-100" style="height: 8px">
                                                            <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                        <img class="me-2" style="width: 24px; height: 24px; object-fit: cover; border-radius: 50%;" src="{{ asset('assets/images/avatar/man-1.png') }}" alt="profile">

                                                        <h6>USER 3</h6>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        46554
                                                    </td>
                                                    <td>95,98</td>
                                                    <td>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <h6>100%</h6>
                                                        </div>
                                                        <div class="progress bg-soft-secondary shadow-none w-100" style="height: 8px">
                                                            <div class="progress-bar bg-secondary" data-toggle="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                        <img class="me-2" style="width: 24px; height: 24px; object-fit: cover; border-radius: 50%;" src="{{ asset('assets/images/avatar/man-1.png') }}" alt="profile">

                                                        <h6>USER 4</h6>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        45646
                                                    </td>
                                                    <td>58,732</td>
                                                    <td>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <h6>100%</h6>
                                                        </div>
                                                        <div class="progress bg-soft-secondary shadow-none w-100" style="height: 8px">
                                                            <div class="progress-bar bg-secondary" data-toggle="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                        <img class="me-2" style="width: 24px; height: 24px; object-fit: cover; border-radius: 50%;" src="{{ asset('assets/images/avatar/man-1.png') }}" alt="profile">

                                                            <h6>USER 5</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        243534
                                                    </td>
                                                    <td>95,332</td>
                                                    <td>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <h6>75%</h6>
                                                        </div>
                                                        <div class="progress w-100" style="height: 8px">
                                                            <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between flex-wrap">
                                    <div class="header-title">
                                        <h4 class="card-title">Usuarios</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex  align-items-center justify-content-between" style="position: relative;">
                                        <div>
                                            <h6 class="mb-3">Activos</h6>
                                            <span>57 m</span> <br />
                                            <span class="text-success">21.77%</span>
                                        </div>
                                        <div id="d-activity-1" class="rounded-bar-chart"></div>
                                    </div>
                                    <hr>
                                    <div class="d-flex  align-items-center justify-content-between">
                                        <div>
                                            <h6 class="mb-3">Inactivos</h6>
                                            <span>36 k</span><br />
                                            <span class="text-danger">95.77%</span>
                                        </div>
                                        <div id="d-activity" class="rounded-bar-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-itmes-center   mb-4">
                                        <div class="d-flex align-itmes-center me-0 me-md-4">
                                            <div>
                                                <div class="p-2 rounded bg-soft-primary">
                                                    <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9303 7C16.9621 6.92913 16.977 6.85189 16.9739 6.77432H17C16.8882 4.10591 14.6849 2 12.0049 2C9.325 2 7.12172 4.10591 7.00989 6.77432C6.9967 6.84898 6.9967 6.92535 7.00989 7H6.93171C5.65022 7 4.28034 7.84597 3.88264 10.1201L3.1049 16.3147C2.46858 20.8629 4.81062 22 7.86853 22H16.1585C19.2075 22 21.4789 20.3535 20.9133 16.3147L20.1444 10.1201C19.676 7.90964 18.3503 7 17.0865 7H16.9303ZM15.4932 7C15.4654 6.92794 15.4506 6.85153 15.4497 6.77432C15.4497 4.85682 13.8899 3.30238 11.9657 3.30238C10.0416 3.30238 8.48184 4.85682 8.48184 6.77432C8.49502 6.84898 8.49502 6.92535 8.48184 7H15.4932ZM9.097 12.1486C8.60889 12.1486 8.21321 11.7413 8.21321 11.2389C8.21321 10.7366 8.60889 10.3293 9.097 10.3293C9.5851 10.3293 9.98079 10.7366 9.98079 11.2389C9.98079 11.7413 9.5851 12.1486 9.097 12.1486ZM14.002 11.2389C14.002 11.7413 14.3977 12.1486 14.8858 12.1486C15.3739 12.1486 15.7696 11.7413 15.7696 11.2389C15.7696 10.7366 15.3739 10.3293 14.8858 10.3293C14.3977 10.3293 14.002 10.7366 14.002 11.2389Z" fill="currentColor"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="ms-3">
                                                <h5>5</h5>
                                                <small class="mb-0">Paquetes</small>
                                            </div>
                                        </div>
                                        <div class="d-flex align-itmes-center">
                                            <div>
                                                <div class="p-2 rounded bg-soft-success">
                                                    <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.1213 11.2331H16.8891C17.3088 11.2331 17.6386 10.8861 17.6386 10.4677C17.6386 10.0391 17.3088 9.70236 16.8891 9.70236H14.1213C13.7016 9.70236 13.3719 10.0391 13.3719 10.4677C13.3719 10.8861 13.7016 11.2331 14.1213 11.2331ZM20.1766 5.92749C20.7861 5.92749 21.1858 6.1418 21.5855 6.61123C21.9852 7.08067 22.0551 7.7542 21.9652 8.36549L21.0159 15.06C20.8361 16.3469 19.7569 17.2949 18.4879 17.2949H7.58639C6.25742 17.2949 5.15828 16.255 5.04837 14.908L4.12908 3.7834L2.62026 3.51807C2.22057 3.44664 1.94079 3.04864 2.01073 2.64043C2.08068 2.22305 2.47038 1.94649 2.88006 2.00874L5.2632 2.3751C5.60293 2.43735 5.85274 2.72207 5.88272 3.06905L6.07257 5.35499C6.10254 5.68257 6.36234 5.92749 6.68209 5.92749H20.1766ZM7.42631 18.9079C6.58697 18.9079 5.9075 19.6018 5.9075 20.459C5.9075 21.3061 6.58697 22 7.42631 22C8.25567 22 8.93514 21.3061 8.93514 20.459C8.93514 19.6018 8.25567 18.9079 7.42631 18.9079ZM18.6676 18.9079C17.8282 18.9079 17.1487 19.6018 17.1487 20.459C17.1487 21.3061 17.8282 22 18.6676 22C19.4969 22 20.1764 21.3061 20.1764 20.459C20.1764 19.6018 19.4969 18.9079 18.6676 18.9079Z" fill="currentColor"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="ms-3">
                                                <h5>81K</h5>
                                                <small class="mb-0">Ventas</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="d-flex justify-content-between flex-wrap">
                                            <h2 class="mb-2">$405,012,300</h2>
                                        </div>
                                        <p>Ganancias</p>
                                    </div>
                                    <div class="d-grid grid-cols-2 gap">
                                        <a href="#" class="btn btn-primary d-flex justify-content-center align-items-center">
                                            <svg width="20" class="text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9303 7C16.9621 6.92913 16.977 6.85189 16.9739 6.77432H17C16.8882 4.10591 14.6849 2 12.0049 2C9.325 2 7.12172 4.10591 7.00989 6.77432C6.9967 6.84898 6.9967 6.92535 7.00989 7H6.93171C5.65022 7 4.28034 7.84597 3.88264 10.1201L3.1049 16.3147C2.46858 20.8629 4.81062 22 7.86853 22H16.1585C19.2075 22 21.4789 20.3535 20.9133 16.3147L20.1444 10.1201C19.676 7.90964 18.3503 7 17.0865 7H16.9303ZM15.4932 7C15.4654 6.92794 15.4506 6.85153 15.4497 6.77432C15.4497 4.85682 13.8899 3.30238 11.9657 3.30238C10.0416 3.30238 8.48184 4.85682 8.48184 6.77432C8.49502 6.84898 8.49502 6.92535 8.48184 7H15.4932ZM9.097 12.1486C8.60889 12.1486 8.21321 11.7413 8.21321 11.2389C8.21321 10.7366 8.60889 10.3293 9.097 10.3293C9.5851 10.3293 9.98079 10.7366 9.98079 11.2389C9.98079 11.7413 9.5851 12.1486 9.097 12.1486ZM14.002 11.2389C14.002 11.7413 14.3977 12.1486 14.8858 12.1486C15.3739 12.1486 15.7696 11.7413 15.7696 11.2389C15.7696 10.7366 15.3739 10.3293 14.8858 10.3293C14.3977 10.3293 14.002 10.7366 14.002 11.2389Z" fill="currentColor"></path>
                                            </svg>
                                            <span class="ms-2">Ver Paquetes</span>
                                        </a>
                                        <a href="#" class="btn btn-secondary d-flex justify-content-center align-items-center">
                                            <svg width="20" class="text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.1213 11.2331H16.8891C17.3088 11.2331 17.6386 10.8861 17.6386 10.4677C17.6386 10.0391 17.3088 9.70236 16.8891 9.70236H14.1213C13.7016 9.70236 13.3719 10.0391 13.3719 10.4677C13.3719 10.8861 13.7016 11.2331 14.1213 11.2331ZM20.1766 5.92749C20.7861 5.92749 21.1858 6.1418 21.5855 6.61123C21.9852 7.08067 22.0551 7.7542 21.9652 8.36549L21.0159 15.06C20.8361 16.3469 19.7569 17.2949 18.4879 17.2949H7.58639C6.25742 17.2949 5.15828 16.255 5.04837 14.908L4.12908 3.7834L2.62026 3.51807C2.22057 3.44664 1.94079 3.04864 2.01073 2.64043C2.08068 2.22305 2.47038 1.94649 2.88006 2.00874L5.2632 2.3751C5.60293 2.43735 5.85274 2.72207 5.88272 3.06905L6.07257 5.35499C6.10254 5.68257 6.36234 5.92749 6.68209 5.92749H20.1766ZM7.42631 18.9079C6.58697 18.9079 5.9075 19.6018 5.9075 20.459C5.9075 21.3061 6.58697 22 7.42631 22C8.25567 22 8.93514 21.3061 8.93514 20.459C8.93514 19.6018 8.25567 18.9079 7.42631 18.9079ZM18.6676 18.9079C17.8282 18.9079 17.1487 19.6018 17.1487 20.459C17.1487 21.3061 17.8282 22 18.6676 22C19.4969 22 20.1764 21.3061 20.1764 20.459C20.1764 19.6018 19.4969 18.9079 18.6676 18.9079Z" fill="currentColor"></path>
                                            </svg>
                                            <span class="ms-2 text-white">Ver Ordenes</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="header-title">
                                        <h4 class="card-title">Accesos (Hoy)</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                <ul class="list-inline">
                                        <li class="d-flex mb-4 align-items-center">
                                            <a href="#" class="text-secondary p-2 bg-soft-secondary avatar-40">
                                                <!-- Android Icon -->
                                                <svg width="21" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.45 9l1.44-2.5c.26-.46.1-1.04-.35-1.3-.46-.26-1.04-.1-1.3.35L15.53 9H8.47L6.76 5.55a.96.96 0 00-1.3-.35c-.46.26-.61.84-.35 1.3L6.55 9h-2.8a1 1 0 00-1 1v9a1 1 0 001 1h14.5a1 1 0 001-1v-9a1 1 0 00-1-1h-2.8z"/>
                                                </svg>
                                            </a>
                                            <div class="ms-3 flex-grow-1">
                                                <h6>Android</h6>
                                                <small class="mb-0">Google Chrome</small>
                                            </div>
                                            <p>268</p>
                                        </li>
                                        <li class="d-flex mb-4 align-items-center">
                                            <a href="#" class="text-primary p-2 bg-soft-primary avatar-40">
                                                <!-- Apple Icon -->
                                                <svg width="21" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16.5 2C15 2 13.9 3.1 13 4.4 12.2 5.6 12 7 12 7s1.5 0 2.5-1.5C15.7 4.6 16.5 4 17.5 4 19 4 20 5.4 20 7.5c0 2.4-1.8 5.2-4 7C14.5 15.5 13 14 12 12c0 0 1.5 0 2.5 1.5S17.5 17 17.5 17C15 17 14 15.5 14 13.5 14 12.4 14.6 11 16.5 10 18 9 20 9.4 20 7.5 20 4.6 18 2 16.5 2z"/>
                                                </svg>
                                            </a>
                                            <div class="ms-3 flex-grow-1">
                                                <h6>iPhone</h6>
                                                <small class="mb-0">Safari</small>
                                            </div>
                                            <p>4323</p>
                                        </li>
                                        <li class="d-flex mb-4 align-items-center">
                                            <a href="#" class="text-secondary p-2 bg-soft-secondary avatar-40">
                                                <!-- Windows Icon -->
                                                <svg width="21" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3 3v18l18-2.5V5.5L3 3zm2 2.06l12.5 1.75V11H5V5.06zm0 13.88V13h12.5v4.19L5 18.94z"/>
                                                </svg>
                                            </a>
                                            <div class="ms-3 flex-grow-1">
                                                <h6>Windows</h6>
                                                <small class="mb-0">Google Chrome</small>
                                            </div>
                                            <p>6565</p>
                                        </li>
                                        <li class="d-flex mb-4 align-items-center">
                                            <a href="#" class="text-primary p-2 bg-soft-primary avatar-40">
                                                <!-- Monitor Icon -->
                                                <svg width="21" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3 3h18v14H3V3zm0 16h8v2H7v2h10v-2h-4v-2h8v2a1 1 0 01-1 1H4a1 1 0 01-1-1v-2z"/>
                                                </svg>
                                            </a>
                                            <div class="ms-3 flex-grow-1">
                                                <h6>Mac OS</h6>
                                                <small class="mb-0">Safari</small>
                                            </div>
                                            <p>32423</p>
                                        </li>
                                        <li class="d-flex mb-4 align-items-center">
                                            <a href="#" class="text-secondary p-2 bg-soft-secondary avatar-40">
                                                <!-- Unknown Icon -->
                                                <svg width="21" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm0 18c-4.4 0-8-3.6-8-8s3.6-8 8-8 8 3.6 8 8-3.6 8-8 8zm0-4h-2v2h2v-2zm1.6-10.2c-.5-.3-1-.5-1.6-.5-1.5 0-2.6 1-2.6 2.5h2c0-.5.3-1 .6-1.2.4-.2.9-.2 1.3 0 .5.3.7.8.7 1.3 0 1-.6 1.5-1.1 2-.5.4-.9.7-.9 1.7h2c0-.8.4-1.3.8-1.7.6-.6 1.3-1.2 1.3-2.3-.1-1.1-.7-2-1.5-2.5z"/>
                                                </svg>
                                            </a>
                                            <div class="ms-3 flex-grow-1">
                                                <h6>Desconocido</h6>
                                                <small class="mb-0">Cualquiera</small>
                                            </div>
                                            <p>268</p>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="card bg-primary">
                                <div class="card-header bg-primary">
                                    <h4 class="text-white">Galleria</h4>
                                </div>
                                <div class="card-body p-0">
                                    <div class="swiper-container scale-item-slider d-slider1">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <img src="{{ asset('assets/images/principal/drilling2.png') }}" class="img-fluid w-75" alt="img8">
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <img src="{{ asset('assets/images/principal/drilling2.png') }}" class="img-fluid w-75" alt="img8">
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <img src="{{ asset('assets/images/principal/drilling2.png') }}" class="img-fluid w-75" alt="img8">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-button-next text-white">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.5857 3.53148C13.3269 3.20803 12.8549 3.15559 12.5315 3.41435C12.208 3.67311 12.1556 4.14507 12.4143 4.46852L13.5857 3.53148ZM18 10.25L18.5857 10.7185L18.9605 10.25L18.5857 9.78148L18 10.25ZM12.4143 16.0315C12.1556 16.3549 12.208 16.8269 12.5315 17.0857C12.8549 17.3444 13.3269 17.292 13.5857 16.9685L12.4143 16.0315ZM12.4143 4.46852L17.4143 10.7185L18.5857 9.78148L13.5857 3.53148L12.4143 4.46852ZM17.4143 9.78148L12.4143 16.0315L13.5857 16.9685L18.5857 10.7185L17.4143 9.78148Z" fill="currentColor" />
                                                <path d="M3 9.5C2.58579 9.5 2.25 9.83579 2.25 10.25C2.25 10.6642 2.58579 11 3 11V9.5ZM17.5 9.5H3V11H17.5V9.5Z" fill="currentColor" />
                                            </svg>
                                        </div>
                                        <div class="swiper-button-prev text-white">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.41435 3.53148C7.67311 3.20803 8.14507 3.15559 8.46852 3.41435C8.79197 3.67311 8.84441 4.14507 8.58565 4.46852L7.41435 3.53148ZM3 10.25L2.41435 10.7185L2.03953 10.25L2.41435 9.78148L3 10.25ZM8.58565 16.0315C8.84441 16.3549 8.79197 16.8269 8.46852 17.0857C8.14507 17.3444 7.67311 17.292 7.41435 16.9685L8.58565 16.0315ZM8.58565 4.46852L3.58565 10.7185L2.41435 9.78148L7.41435 3.53148L8.58565 4.46852ZM3.58565 9.78148L8.58565 16.0315L7.41435 16.9685L2.41435 10.7185L3.58565 9.78148Z" fill="currentColor" />
                                                <path d="M18 9.5C18.4142 9.5 18.75 9.83579 18.75 10.25C18.75 10.6642 18.4142 11 18 11V9.5ZM3.5 9.5H18V11H3.5V9.5Z" fill="currentColor" />
                                            </svg>
                                        </div>
                                    </div>
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
    </main>
    @endsection