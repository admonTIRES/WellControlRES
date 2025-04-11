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
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                            <div class="header-title d-flex justify-content-between align-items-center w-100 mb-4">
                                <h4 class="card-title mb-0">Exercise List</h4> 
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ejerciciosModal">
                                    Add Exercise
                                </button>
                            </div>
                            </div>
                            <div class="card-body px-0">
                                <div class="table-responsive">
                                <table id="user-list-table" class="table table-striped" role="grid" data-toggle="data-table">
    <thead>
        <tr class="ligth">
            <th>Name</th>
            <th>Tema</th>
            <th>Certificación</th>
            <th style="min-width: 100px">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Ejercicio 1</td>
            <td>Presión Hidrostática</td>
            <td>IADC</td>
            <td>
                <div class="flex align-items-center list-user-action">
                    <a class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#ejerciciosModal">
                        <span class="btn-inner">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </a>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="statusSwitch1" checked>
                        <label class="form-check-label" for="statusSwitch1">Activo</label>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>Ejercicio 2</td>
            <td>Control de Pozos</td>
            <td>IWCF</td>
            <td>
                <div class="flex align-items-center list-user-action">
                    <a class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#ejerciciosModal">
                        <span class="btn-inner">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </a>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="statusSwitch2" checked>
                        <label class="form-check-label" for="statusSwitch2">Activo</label>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>Ejercicio 3</td>
            <td>Densidad de Fluidos</td>
            <td>IADC</td>
            <td>
                <div class="flex align-items-center list-user-action">
                    <a class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#ejerciciosModal">
                        <span class="btn-inner">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </a>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="statusSwitch3" checked>
                        <label class="form-check-label" for="statusSwitch3">Activo</label>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>Ejercicio 4</td>
            <td>Presión de Formación</td>
            <td>IWCF</td>
            <td>
                <div class="flex align-items-center list-user-action">
                    <a class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#ejerciciosModal">
                        <span class="btn-inner">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </a>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="statusSwitch4" checked>
                        <label class="form-check-label" for="statusSwitch4">Activo</label>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>Ejercicio 5</td>
            <td>Gradiente de Fractura</td>
            <td>IADC</td>
            <td>
                <div class="flex align-items-center list-user-action">
                    <a class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#ejerciciosModal">
                        <span class="btn-inner">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </a>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="statusSwitch5" checked>
                        <label class="form-check-label" for="statusSwitch5">Activo</label>
                    </div>
                </div>
            </td>
        </tr>
    </tbody>
</table>

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
                                    <label class="form-check-label" for="nivel1">Nivel 1 - Operador de Perforación</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="nivel2">
                                    <label class="form-check-label" for="nivel2">Nivel 2 - Supervisor de Perforación</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="nivel3">
                                    <label class="form-check-label" for="nivel3">Nivel 3 - Ingeniero de Perforación</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="nivel4">
                                    <label class="form-check-label" for="nivel4">Nivel 4 - Ingeniero Senior</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="nivel5">
                                    <label class="form-check-label" for="nivel5">Nivel 5 - Especialista</label>
                                </div>
                            </div>
                            
                            <!-- BOP -->
                            <div class="mb-3">
                                <label class="form-label">BOP</label>
                                <input type="text" class="form-control" id="bop" placeholder="Ej: BOP">
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

<script>
// Función para agregar preguntas adicionales
function agregarPreguntaAdicional() {
    const container = document.getElementById('preguntasAdicionalesContainer');
    const newIndex = container.children.length + 1;
    
    const div = document.createElement('div');
    div.className = 'pregunta-texto-adicional mb-2';
    div.innerHTML = `
        <div class="input-group">
            <textarea class="form-control" placeholder="Pregunta/texto adicional ${newIndex}"></textarea>
            <button class="btn btn-outline-danger" type="button" onclick="this.parentElement.parentElement.remove()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg>
            </button>
        </div>
    `;
    
    container.appendChild(div);
}

// Función para agregar opciones de respuesta
function agregarOpcion() {
    const container = document.getElementById('opcionesContainer');
    const opciones = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
    const newIndex = container.children.length;
    
    if(newIndex < opciones.length) {
        const div = document.createElement('div');
        div.className = 'opcion-item mb-2';
        div.innerHTML = `
            <div class="input-group">
                <div class="input-group-text">
                    <input class="form-check-input mt-0" type="checkbox" name="correcta">
                </div>
                <input type="text" class="form-control" placeholder="Opción ${opciones[newIndex]}">
                <button class="btn btn-outline-danger" type="button" onclick="this.parentElement.parentElement.remove()">
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        `;
        
        container.appendChild(div);
    } else {
        alert('Máximo de opciones alcanzado');
    }
}
</script>

<style>
.opcion-item, .pregunta-adicional {
    position: relative;
}
</style>
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