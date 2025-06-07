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
                                        <span class="text-secondary">{{ __('Projects ') }}</span> {{ __(' list ') }}
                                        </h1>
                                    </div>
                                    <p class="mb-4">{{ __('You can create project (general data, students, passwords, date)') }}</p>
                                </div>
                                <div class="col-lg-6 banner-img">
                                    <div class="img">
                                        <img src="../assets/images/principal/drilling4.png" class="img-fluid w-55" alt="img8">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                     <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 text-capitalize">Proyectos</h5>
                        </div>
                        <div class="card-body">                                                                                                                                                                                  
                            <div class="w-100 h-100">
                                <div class="header-title d-flex justify-content-between align-items-center w-100 mb-4">
                                    <h4 class="card-title mb-0">Lista de proyectos</h4> 
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#proyectoModal">
                                        Nuevo proyecto
                                    </button>
                                </div>
                                <div class="table-responsive">
                                    <table id="nivelacreditacion-list-table" class="table table-striped table-wrap" role="grid">
                                        <thead>
                                            <tr class="ligth">
                                                <th>Folio</th>
                                                <th>Nombre del proyecto</th>
                                                <th style="min-width: 100px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>RES-001</td>
                                                <td>Nivel 3 IADC PERENCO</td>
                                                <td>
                                                    <div class="flex align-items-center list-user-action">
                                                        <a class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#nivelModal">
                                                            <span class="btn-inner">
                                                                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                </svg>
                                                            </span>
                                                        </a>
                                                        <!-- <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" id="statusSwitch1" checked>
                                                            <label class="form-check-label" for="statusSwitch1">Activo</label>
                                                        </div> -->
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>RES-002</td>
                                                <td>Nivel 2 IWCF Fontis</td>
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
                                                        <!-- <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" id="statusSwitch2" checked>
                                                            <label class="form-check-label" for="statusSwitch2">Activo</label>
                                                        </div> -->
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
        </div>
    </div>
      <style>
        .wizard-step {
            display: none;
        }
        
        .wizard-step.active {
            display: block;
        }
        
        .wizard-nav {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: space-between;
            margin-bottom: 2rem;
        }
        
        .wizard-nav li {
            flex: 1;
            text-align: center;
            position: relative;
            padding: 1rem;
            border-radius: 8px;
            margin: 0 0.25rem;
            background: #f8f9fa;
            color: #6c757d;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .wizard-nav li.active {
            background: #FF585D;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(13, 110, 253, 0.3);
        }
        
        .wizard-nav li.completed {
            background: #198754;
            color: white;
        }
        
        .wizard-nav li i {
            display: block;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        
        .wizard-nav li span {
            font-weight: 500;
            font-size: 0.9rem;
        }
        
        .form-card {
            background: #f8f9fa;
            padding: 2rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            border: 1px solid #e9ecef;
        }
        
        .steps {
            color: #6c757d;
            font-size: 1rem;
            font-weight: 500;
        }
        
        .action-button {
            padding: 0.75rem 2rem;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .action-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }
        
        .form-control:focus {
            border-color: #A4D65E;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }
        
        .success-icon {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #A4D65E, #20c997);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            animation: successPulse 2s ease-in-out infinite;
        }
        
        .success-icon i {
            font-size: 3rem;
            color: white;
        }
        
        @keyframes successPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: none;
        }
        
        .form-control.is-invalid {
            border-color: #dc3545;
        }
        
        .progress-bar-custom {
            height: 4px;
            background: #e9ecef;
            border-radius: 2px;
            overflow: hidden;
            margin-bottom: 2rem;
        }
        
        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #007DBA, #FF585D);
            border-radius: 2px;
            transition: width 0.5s ease;
        }
        .student-row {
            background: #fff;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .student-row:hover {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transform: translateY(-1px);
        }
        
        .password-cell {
            font-family: 'Courier New', monospace;
            background: #f8f9fa;
            padding: 0.5rem;
            border-radius: 4px;
            position: relative;
        }
        
        .copy-btn {
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
        }
        
        .table th {
            background: #495057 !important;
            color: white;
            font-weight: 600;
            border: none;
        }
        
        .table td {
            vertical-align: middle;
            border-color: #e9ecef;
        }
    </style>
    <div class="modal fade" id="proyectoModal" tabindex="-1" aria-labelledby="proyectoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="proyectoModalLabel">Proyecto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title"></h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- Progress Bar -->
                                    <div class="progress-bar-custom">
                                        <div class="progress-fill" id="progressBar" style="width: 25%"></div>
                                    </div>

                                    <!-- Wizard Navigation -->
                                    <ul class="wizard-nav" id="wizardNav">
                                        <li class="active" data-step="1">
                                            <i class="ri-profile-line"></i>
                                            <span>General</span>
                                        </li>
                                        <li data-step="2">
                                            <i class="ri-calendar-check-fill"></i>
                                            <span>Fechas</span>
                                        </li>
                                        <li data-step="3">
                                            <i class="ri-group-fill"></i>
                                            <span>Estudiantes</span>
                                        </li>
                                        
                                        <li data-step="4">
                                            <i class="ri-check-fill"></i>
                                            <span>Finalizar</span>
                                        </li>
                                    </ul>

                                    <form id="wizardForm">
                                        <!-- Step 1: Account Information -->
                                        <div class="wizard-step active" data-step="1">
                                            <div class="form-card">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h3 class="mb-4">Datos generales del curso:</h3>
                                                    </div>
                                                    <div class="col-5">
                                                        <h2 class="steps">Paso 1 de 4</h2>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="form-label">¿Qué tipo de curso es?*</label>
                                                        <select class="form-select" id="" name="">
                                                             <option value="0">Seleccionar...</option>
                                                            <option value="1">Abierto</option>
                                                            <option value="2">Cerrado</option>
                                                        </select>
                                                    </div>
                                                     <div class="col-md-4">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Nombre del curso: *</label>
                                                            <input type="text" class="form-control" name="fname" placeholder="Nombre"  />
                                                            <div class="error-message">El nombre es requerido</div>
                                                        </div>
                                                    </div>
                                                    @php
                                                        $yearSuffix = date('y'); // obtiene los dos últimos dígitos del año
                                                    @endphp
                                                    <div class="col-md-4">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Folio: *</label>
                                                            <input type="text" class="form-control" name="lname" placeholder="STE-TR{{ $yearSuffix }}-000" />
                                                            <div class="error-message">El folio es requerido</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Lugar: *</label>
                                                            <input type="text" class="form-control" name="fname" placeholder="Lugar"  />
                                                            <div class="error-message">El lugar es requerido</div>
                                                        </div>
                                                    </div>
                                                       <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Ciudad: *</label>
                                                            <input type="text" class="form-control" name="fname" placeholder="Ciudad"  />
                                                            <div class="error-message">La ciudad es requerida</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Nombre(s) de la(s) empresa(s) *</label>
                                                            <input id="empresas" name="empresas" class="form-control" placeholder="Escribe y presiona ENTER" />
                                                            <div class="error-message">Este campo es requerido</div>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        // document.addEventListener('DOMContentLoaded', function () {
                                                        //     const input = document.querySelector('#empresas');
                                                        //     new Tagify(input, {
                                                        //         duplicates: false,
                                                        //         maxTags: 20,
                                                        //         placeholder: "Escribe y presiona ENTER"
                                                        //     });
                                                        // });
                                                    </script>

                                                    
                                                     <!-- <div class="col-md-4">
                                                        <label class="form-label">Instructor: *</label>
                                                        <select class="form-select" id="" name="">
                                                             <option value="0">Seleccionar...</option>
                                                            <option value="1">Ing. Pedro Frias</option>
                                                            <option value="2">Ing. Rafael Suarez</option>
                                                        </select>
                                                    </div> -->
                                                 
                                                    <div class="col-md-3"> 
                                                        <div class="col-12 me-1 ">
                                                            <label>Idioma: *</label>
                                                            <select class="form-select" id="" name="" >
                                                            <option selected disabled></option>
                                                            <option value="0">Seleccionar...</option>
                                                            <option value="2">Español</option>
                                                            <option value="3">Inglés</option>
                                                            <option value="4">Árabe</option>
                                                            <option value="5">Portugues</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-md-3 text-start">
                                                        <label>Ente acreditador: *</label>
                                                        <select class="form-select" id="ENTE1_MATH" name="ENTE_MATH">
                                                        <option selected disabled></option>
                                                        @foreach ($entes as $ente)
                                                                <option value="{{ $ente->ID_CATALOGO_ENTE }}">{{ $ente->NOMBRE_ENTE }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                <!-- Niveles -->
                                                    <div class="col-md-3 text-start">
                                                        <label>Nivel de acreditación: *</label>
                                                        <select class="form-select" id="NIVEL1_MATH" name="NIVEL_MATH" >
                                                        <option selected disabled></option>
                                                        @foreach ($niveles as $nivel)
                                                                <option value="{{ $nivel->ID_CATALOGO_NIVELACREDITACION }}">{{ $nivel->NOMBRE_NIVEL }} - {{ $nivel->DESCRIPCION_NIVEL }}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                   
                                                    <div class="col-md-3 text-start">
                                                        <label>BOP: *</label>
                                                        <select class="form-select" id="BOP_PROJECT" name="BOP_PROJECT" multiple>
                                                        <option selected disabled></option>
                                                        @foreach ($bops as $bop)
                                                        <option value="{{ $bop->ID_CATALOGO_TIPOBOP }}">{{ $bop->ABREVIATURA }} - {{ $bop->DESCRIPCION_TIPOBOP }}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>

                                                   
                                                    
                                                    <!-- <div class="col-md-3">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Teléfono: *</label>
                                                            <input type="tel" class="form-control" name="phno" placeholder="Número de teléfono" required />
                                                            <div class="error-message">El teléfono es requerido</div>
                                                        </div>
                                                    </div> -->
                                                    <!-- <div class="col-md-3">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Teléfono Alternativo:</label>
                                                            <input type="tel" class="form-control" name="phno_2" placeholder="Teléfono alternativo" />
                                                        </div>
                                                    </div> -->
                                                    <!-- <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Email: *</label>
                                                            <input type="email" class="form-control" name="email" placeholder="Correo electrónico" required />
                                                            <div class="error-message">Por favor, ingresa un email válido</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Usuario: *</label>
                                                            <input type="text" class="form-control" name="uname" placeholder="Nombre de usuario" required />
                                                            <div class="error-message">El nombre de usuario es requerido</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Contraseña: *</label>
                                                            <input type="password" class="form-control" name="pwd" placeholder="Contraseña" required />
                                                            <div class="error-message">La contraseña debe tener al menos 6 caracteres</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Confirmar Contraseña: *</label>
                                                            <input type="password" class="form-control" name="cpwd" placeholder="Confirmar contraseña" required />
                                                            <div class="error-message">Las contraseñas no coinciden</div>
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <button type="button" class="btn btn-primary action-button next-step">Siguiente</button>
                                            </div>
                                        </div>

                                        
                                        <!-- Step 2: Personal Information -->
                                        <div class="wizard-step" data-step="3">
                                            <div class="form-card">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h3 class="mb-4">Estudiantes:</h3>
                                                    </div>
                                                    <div class="col-5">
                                                        <h2 class="steps">Paso 2 de 4</h2>
                                                    </div>
                                                </div>
                                                 <div class="row mb-3">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Instructor del curso: *</label>
                                                        <select class="form-select" name="instructor" >
                                                            <option value="">Seleccionar...</option>
                                                            <option value="1">Ing. Pedro Frias</option>
                                                            <option value="2">Ing. Rafael Suarez</option>
                                                        </select>
                                                        <div class="error-message">Selecciona un instructor</div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Correo de contacto de la empresa: *</label>
                                                            <input type="email" class="form-control" name="email" placeholder="Correo electrónico"  />
                                                            <div class="error-message">El correo es requerido</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">Cantidad de estudiantes: *</label>
                                                        <input type="number" class="form-control" name="studentCount" 
                                                               placeholder="Número de estudiantes" min="1" max="50" required />
                                                        <div class="error-message">Ingresa una cantidad válida (1-50)</div>
                                                    </div>
                                                    <div class="col-md-3 d-flex align-items-center">
                                                        <button type="button" class="btn btn-info action-button" id="generateStudents">
                                                            <i class="ri-user-add-line me-2"></i>Generar Estudiantes
                                                        </button>
                                                    </div>
                                                </div>
                                                <div id="studentsContainer" style="display: none;">
                                                    <hr class="mb-4">
                                                    <h5 class="mb-3">Lista de Estudiantes</h5>
                                                     <div class="table-responsive" style="overflow-x: auto; max-width: 100%;">
                                                        <table class="table table-striped table-hover" style="min-width: 800px;">
                                                            <thead class="table-dark">
                                                                <tr>
                                                                    <th>#/CR</th>
                                                                    <th>Empresa</th>
                                                                    <th>Nombre Completo</th>
                                                                    <th>Cargo</th>
                                                                    <th>Correo Electrónico</th>
                                                                    <th>Contraseña Generada</th>
                                                                    <th>Acciones</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="studentsTableBody">
                                                                <!-- Students will be generated here -->
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- <div class="table-responsive">
                                                        <table class="table table-striped table-hover">
                                                            <thead class="table-dark">
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>CR</th>
                                                                    <th>Nombre Completo</th>
                                                                    <th>Cargo</th>
                                                                    <th>Correo Electrónico</th>
                                                                    <th>Contraseña Generada</th>
                                                                    <th>Acciones</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="studentsTableBody">
                                                            </tbody>
                                                        </table>
                                                    </div> -->
                                                    <div class="mt-3">
                                                        <button type="button" class="btn btn-success btn-sm" id="exportPasswords">
                                                            <i class="ri-download-line me-2"></i>Exportar Contraseñas
                                                        </button>
                                                        <button type="button" class="btn btn-warning btn-sm ms-2" id="regenerateAllPasswords">
                                                            <i class="ri-refresh-line me-2"></i>Regenerar Todas las Contraseñas
                                                        </button>
                                                        <button type="button" class="btn btn-info btn-sm ms-2" id="sendMails">
                                                            <i class="ri-mail-send-fill me-2"></i>Enviar correos con accesos
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <button type="button" class="btn btn-success action-button prev-step">Anterior</button>
                                                <button type="button" class="btn btn-success action-button next-step">Finalizar</button>
                                            </div>
                                        </div>

                                        <!-- Step 3: Image Upload -->
                                        <div class="wizard-step" data-step="2">
                                            <div class="form-card">
                                                <div class="row">
                                                    <div class="col-7">
                                                         <h3 class="mb-4">Fechas y activación:</h3>
                                                    </div>
                                                    <div class="col-5">
                                                        <h2 class="steps">Paso 3 de 4</h2>
                                                    </div>
                                                </div>
                                                 <style>
                                                    .flatpickr-container {
                                                    position: relative;
                                                    }

                                                    .flatpickr-container .input-button {
                                                    position: absolute;
                                                    top: 50%;
                                                    transform: translateY(-50%);
                                                    cursor: pointer;
                                                    padding: 0 8px;
                                                    color: #555;
                                                    }

                                                    .flatpickr-container .input-button[data-toggle] {
                                                    right: 32px;
                                                    }

                                                    .flatpickr-container .input-button[data-clear] {
                                                    right: 8px;
                                                    }

                                                    .flatpickr-container input.form-control {
                                                    padding-right: 64px; /* espacio para íconos */
                                                    }

                                                    .input-button:hover {
                                                    color: #000;
                                                    }
                                                </style>
                                                <div class="row g-3">
                                                        <!-- Fecha de inicio del curso -->
                                                        <div class="col-md-6">
                                                            <label class="form-label" for="start_date">Fecha de inicio del curso: *</label>
                                                            <div class="flatpickr-container">
                                                            <input type="text" id="start_date" class="form-control" placeholder="Selecciona una fecha">
                                                            <a class="input-button" title="Abrir calendario" data-toggle="start_date"><i class="fa-solid fa-calendar-days"></i></a>
                                                            <a class="input-button" title="Limpiar fecha" data-clear="start_date"><i class="fa-solid fa-xmark"></i></a>
                                                            </div>
                                                        </div>

                                                        <!-- Fecha de fin del curso -->
                                                        <div class="col-md-6">
                                                            <label class="form-label" for="end_date">Fecha de fin del curso: *</label>
                                                            <div class="flatpickr-container">
                                                            <input type="text" id="end_date" class="form-control" placeholder="Selecciona una fecha">
                                                            <a class="input-button" title="Abrir calendario" data-toggle="end_date"><i class="fa-solid fa-calendar-days"></i></a>
                                                            <a class="input-button" title="Limpiar fecha" data-clear="end_date"><i class="fa-solid fa-xmark"></i></a>
                                                            </div>
                                                        </div>

                                                        <!-- Fecha y hora de inicio de membresía -->
                                                        <div class="col-md-6">
                                                            <label class="form-label" for="membership_start">Fecha y hora de inicio de membresía: *</label>
                                                            <div class="flatpickr-container">
                                                            <input type="text" id="membership_start" class="form-control" placeholder="Selecciona fecha y hora">
                                                            <a class="input-button" title="Abrir calendario" data-toggle="membership_start"><i class="fa-solid fa-calendar-days"></i></a>
                                                            <a class="input-button" title="Limpiar fecha" data-clear="membership_start"><i class="fa-solid fa-xmark"></i></a>
                                                            </div>
                                                        </div>

                                                        <!-- Fecha y hora de término de membresía -->
                                                        <div class="col-md-6">
                                                            <label class="form-label" for="membership_end">Fecha y hora de término de membresía: *</label>
                                                            <div class="flatpickr-container">
                                                            <input type="text" id="membership_end" class="form-control" placeholder="Selecciona fecha y hora">
                                                            <a class="input-button" title="Abrir calendario" data-toggle="membership_end"><i class="fa-solid fa-calendar-days"></i></a>
                                                            <a class="input-button" title="Limpiar fecha" data-clear="membership_end"><i class="fa-solid fa-xmark"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <script>
                                                    
                                                const configs = {
                                                    start_date: {
                                                    dateFormat: "Y-m-d",
                                                    defaultDate: "today",
                                                    minDate: "today", 
                                                    allowInput: true,
                                                    clickOpens: true
                                                    },
                                                    end_date: {
                                                    dateFormat: "Y-m-d",
                                                    defaultDate: "today",
                                                    minDate: "today", 
                                                    allowInput: true,
                                                    clickOpens: true
                                                    },
                                                    membership_start: {
                                                    enableTime: true,
                                                    dateFormat: "Y-m-d H:i",
                                                    defaultDate: new Date(),
                                                    minDate: new Date(),
                                                    allowInput: true,
                                                    clickOpens: true
                                                    },
                                                    membership_end: {
                                                    enableTime: true,
                                                    dateFormat: "Y-m-d H:i",
                                                    defaultDate: new Date(),
                                                    minDate: new Date(),
                                                    allowInput: true,
                                                    clickOpens: true
                                                    }
                                                };

                                                const pickers = {};

                                                for (const id in configs) {
                                                    pickers[id] = flatpickr(`#${id}`, configs[id]);
                                                }

                                                document.querySelectorAll('[data-toggle]').forEach(btn => {
                                                    btn.addEventListener('click', (e) => {
                                                    e.preventDefault();
                                                    const id = btn.getAttribute('data-toggle');
                                                    if (pickers[id]) pickers[id].open();
                                                    });
                                                });

                                                document.querySelectorAll('[data-clear]').forEach(btn => {
                                                    btn.addEventListener('click', (e) => {
                                                        e.preventDefault();
                                                        const id = btn.getAttribute('data-clear');
                                                        if (pickers[id]) pickers[id].clear();
                                                    });
                                                    const id = btn.getAttribute('data-clear');
                                                    if (pickers[id]) pickers[id].clear();
                                                });


                                                </script>

                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <button type="button" class="btn btn-success action-button prev-step">Anterior</button>
                                                <button type="button" class="btn btn-primary action-button next-step">Siguiente</button>
                                            </div>
                                        </div>

                                        <!-- Step 4: Success -->
                                        <div class="wizard-step" data-step="4">
                                            <div class="form-card text-center">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h3 class="mb-4">¡Completado!</h3>
                                                    </div>
                                                    <div class="col-5">
                                                        <h2 class="steps">Paso 4 de 4</h2>
                                                    </div>
                                                </div>
                                                
                                                <div class="success-icon">
                                                    <i class="ri-check-line"></i>
                                                </div>
                                                
                                                <h2 class="text-success mb-4"><strong>¡ÉXITO!</strong></h2>
                                                <h5 class="text-muted">Se ha registrado este proyecto exitosamente</h5>
                                                <p class="mt-3">Las cuentas han sido creadas y están listas para su uso.</p>
                                                
                                                <div class="mt-4">
                                                    <button type="button" class="btn btn-primary action-button" data-bs-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <script>
       
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
@php
    $css_identifier = 'projects';
@endphp