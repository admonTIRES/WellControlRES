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
                        <div class="card-header">
                            <h5 class="mb-0 text-capitalize">{{ __('Catalogs') }}</h5>
                        </div>
                        <div class="card-body">                                                                                                                                                                                  
                            <div class="d-md-flex align-items-start">
                                <div class="nav flex-column nav-pills me-4" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <p class="mt-3 mb-2">{{ __('Accreditation') }}</p>
                                    <button class="nav-link text-start rounded mb-1 pe-5 active"
                                        id="v-pills-acreditadores-tab"
                                        data-topic="entes-acreditadores"
                                        data-bs-toggle="pill"
                                        data-bs-target="#v-pills-acreditadores"
                                        type="button"
                                        role="tab"
                                        aria-controls="v-pills-acreditadores"
                                        aria-selected="true">{{ __('Accrediting entities') }}</button>
                                    <button class="nav-link text-start rounded mb-1 pe-5"
                                        id="v-pills-nivel-tab"
                                        data-topic="nivel-acreditacion"
                                        data-bs-toggle="pill"
                                        data-bs-target="#v-pills-nivel"
                                        type="button"
                                        role="tab"
                                        aria-controls="v-pills-nivel"
                                        aria-selected="false">{{ __('Accreditation levels') }}</button>
                                    <button class="nav-link text-start rounded mb-1 pe-5"
                                        id="v-pills-bop-tab"
                                        data-topic="tipo-bop"
                                        data-bs-toggle="pill"
                                        data-bs-target="#v-pills-bop"
                                        type="button"
                                        role="tab"
                                        aria-controls="v-pills-bop"
                                        aria-selected="false">{{ __('Types of BOP') }}</button>
                                    <hr class="hr-horizontal mt-4 mb-2">
                                    <p class="mt-3 mb-2">{{ __('Questions') }}</p>
                                    <button class="nav-link text-start rounded mb-1 pe-5"
                                        id="v-pills-tema-tab"
                                        data-topic="tema-preguntas"
                                        data-bs-toggle="pill"
                                        data-bs-target="#v-pills-tema"
                                        type="button"
                                        role="tab"
                                        aria-controls="v-pills-tema"
                                        aria-selected="false">{{ __('Topics') }}</button>
                                    <button class="nav-link text-start rounded mb-1 pe-5"
                                        id="v-pills-subtema-tab"
                                        data-topic="subtema-preguntas"
                                        data-bs-toggle="pill"
                                        data-bs-target="#v-pills-subtema"
                                        type="button"
                                        role="tab"
                                        aria-controls="v-pills-subtema"
                                        aria-selected="false">{{ __('Subtopics') }}</button>
                                    <hr class="hr-horizontal mt-4 mb-2">
                                    <p class="mt-3 mb-2">{{ __('Exams') }}</p>
                                    <button class="nav-link text-start rounded mb-1 pe-5"
                                        id="v-pills-lang-tab"
                                        data-topic="lang-examen"
                                        data-bs-toggle="pill"
                                        data-bs-target="#v-pills-lang"
                                        type="button"
                                        role="tab"
                                        aria-controls="v-pills-lang"
                                        aria-selected="false"> {{ __('Languages') }}</button>
                                    <hr class="hr-horizontal mt-4 mb-2">
                                    <p class=" mt-3 mb-2"> {{ __('Memberships') }}</p>
                                    <button class="nav-link text-start rounded mb-1 pe-5"
                                        id="v-pills-membresias-tab"
                                        data-topic="membresias"
                                        data-bs-toggle="pill"
                                        data-bs-target="#v-pills-membresias"
                                        type="button"
                                        role="tab"
                                        aria-controls="v-pills-membresias"
                                        aria-selected="false">{{ __('Memberships') }}</button>
                                         <hr class="hr-horizontal mt-4 mb-2">
                                    <p class=" mt-3 mb-2"> {{ __('Operation type') }}</p>
                                    <button class="nav-link text-start rounded mb-1 pe-5"
                                        id="v-pills-operacion-tab"
                                        data-topic="operacion"
                                        data-bs-toggle="pill"
                                        data-bs-target="#v-pills-operacion"
                                        type="button"
                                        role="tab"
                                        aria-controls="v-pills-operacion"
                                        aria-selected="false">{{ __('Operation type') }}</button>
                                </div>
                                <div class="tab-content pt-md-0 flex-grow-1" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-acreditadores" role="tabpanel" aria-labelledby="v-pills-acreditadores-tab">
                                        <div class="w-100 h-100">
                                            <div class="header-title d-flex justify-content-between align-items-center w-100 mb-4">
                                                <h4 class="card-title mb-0"> {{ __('Catalog of accrediting entities') }}</h4> 
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#entesModal">
                                                    {{ __('New accrediting entity') }}
                                                </button>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="entes-list-table" class="table table-striped table-wrap" role="grid" >
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-nivel" role="tabpanel" aria-labelledby="v-pills-nivel-tab">
                                        <div class="w-100 h-100">
                                        <div class="header-title d-flex justify-content-between align-items-center w-100 mb-4">
                                                <h4 class="card-title mb-0">{{ __('Catalogue of accreditation levels') }}</h4> 
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nivelModal">
                                                     {{ __('New level of accreditation') }}
                                                </button>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="nivelacreditacion-list-table" class="table table-striped" style="width:100%">
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-bop" role="tabpanel" aria-labelledby="v-pills-bop-tab">
                                        <div class="w-100 h-100">
                                        <div class="header-title d-flex justify-content-between align-items-center w-100 mb-4">
                                                <h4 class="card-title mb-0"> {{ __('BOP Catalog') }}</h4> 
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tipobopModal">
                                                     {{ __('New BOP') }}
                                                </button>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="tiposbop-list-table" class="table table-striped" role="grid" >
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-tema" role="tabpanel" aria-labelledby="v-pills-tema-tab">
                                        <div class="w-100 h-100">
                                        <div class="header-title d-flex justify-content-between align-items-center w-100 mb-4">
                                                <h4 class="card-title mb-0"> {{ __('Catalog of topics for questions') }}</h4> 
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#temaModal">
                                                     {{ __('New topic') }}
                                                </button>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="temas-list-table" class="table table-striped" role="grid" >
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-subtema" role="tabpanel" aria-labelledby="v-pills-subtema-tab">
                                        <div class="w-100 h-100">
                                        <div class="header-title d-flex justify-content-between align-items-center w-100 mb-4">
                                                <h4 class="card-title mb-0"> {{ __('Catalog of subtopics for questions') }}</h4> 
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#subtemaModal">
                                                     {{ __('New subtopic') }}
                                                </button>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="subtemas-list-table" class="table table-striped" role="grid" >
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-lang" role="tabpanel" aria-labelledby="v-pills-lang-tab">
                                        <div class="w-100 h-100">
                                        <div class="header-title d-flex justify-content-between align-items-center w-100 mb-4">
                                                <h4 class="card-title mb-0"> {{ __('Language catalog for exams') }}</h4> 
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#idiomaModal">
                                                     {{ __('New language for exams') }}
                                                </button>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="idiomas-list-table" class="table table-striped" role="grid">
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-membresias" role="tabpanel" aria-labelledby="v-pills-membresias-tab">
                                        <div class="w-100 h-100">
                                        <div class="header-title d-flex justify-content-between align-items-center w-100 mb-4">
                                                <h4 class="card-title mb-0"> {{ __('Membership Catalog') }}</h4> 
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#membresiasModal">
                                                    {{ __('New type of membership') }}
                                                </button>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="membresias-list-table" class="table table-striped" role="grid">
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-operacion" role="tabpanel" aria-labelledby="v-pills-operacion-tab">
                                        <div class="w-100 h-100">
                                        <div class="header-title d-flex justify-content-between align-items-center w-100 mb-4">
                                                <h4 class="card-title mb-0"> {{ __('Operation type catalog') }}</h4> 
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#operacionModal">
                                                     {{ __('New type of operation') }}
                                                </button>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="operacion-list-table" class="table table-striped" role="grid">
                                                </table>
                                            </div>
                                        </div>
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

    <!-- Modales -->
    <div class="modal fade" id="entesModal" tabindex="-1" aria-labelledby="entesModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="entesModalLabel">{{ __('Accrediting Entity') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="entesForm" method="post"  enctype="multipart/form-data">
                    {!! csrf_field() !!}
                        <div class="row">
                                <div class="mb-3">
                                    <label class="form-label"> {{ __('Accrediting Entity') }}</label>
                                    <input type="text" class="form-control" name="NOMBRE_ENTE" id="NOMBRE_ENTE" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Description') }}</label>
                                    <input type="text" class="form-control"  name="DESCRIPCION_ENTE" id="DESCRIPCION_ENTE" required>
                                </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <button id="entesbtnModal" type="button" class="btn btn-primary">{{ __('Save') }}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="nivelModal" tabindex="-1" aria-labelledby="nivelModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nivelModalLabel">{{ __('Accreditation Level') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="nivelForm" method="post"  enctype="multipart/form-data">
                    {!! csrf_field() !!}
                        <div class="row">
                                <div class="mb-3">
                                    <label class="form-label"> {{ __('Accreditation Level') }}</label>
                                    <input type="text" class="form-control" name="NOMBRE_NIVEL" id="NOMBRE_NIVEL" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Description') }}</label>
                                    <input type="text" class="form-control" name="DESCRIPCION_NIVEL" id="DESCRIPCION_NIVEL" required>
                                </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <button id="nivelbtnModal" type="button" class="btn btn-primary">{{ __('Save') }}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tipobopModal" tabindex="-1" aria-labelledby="tipobopModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tipobopModalLabel">{{ __('BOP Type') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="tipobopForm" method="post"  enctype="multipart/form-data">
                    {!! csrf_field() !!}
                        <div class="row">
                                <div class="mb-3">
                                    <label class="form-label"> {{ __('Abbreviation') }}</label>
                                    <input type="text" class="form-control" name="ABREVIATURA" id="ABREVIATURA" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Description') }}</label>
                                    <input type="text" class="form-control" name="DESCRIPCION_TIPOBOP" id="DESCRIPCION_TIPOBOP" required>
                                </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <button id="tipobopbtnModal" type="button" class="btn btn-primary">{{ __('Save') }}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="temaModal" tabindex="-1" aria-labelledby="temaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="temaModalLabel">{{ __('Question Topic') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="temasForm" method="post"  enctype="multipart/form-data">
                    {!! csrf_field() !!}
                        <div class="row">
                                <div class="mb-3">
                                    <label class="form-label"> {{ __('Topic') }}</label>
                                    <input type="text" class="form-control" name="NOMBRE_TEMA" id="NOMBRE_TEMA" required>
                                </div>
                                 <div class="mb-3">
                                        <label>{{ __('Certification') }}</label>
                                        <select class="form-select selectize-multiple" id="CERTIFICACION_TEMA" name="CERTIFICACION_TEMA[]" multiple>
                                            @foreach ($entes as $ente)
                                                <option value="{{ $ente->ID_CATALOGO_ENTE }}">{{ $ente->NOMBRE_ENTE }}</option>
                                            @endforeach
                                        </select>
                                </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <button id="temabtnModal" type="button" class="btn btn-primary">{{ __('Save') }}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="subtemaModal" tabindex="-1" aria-labelledby="subtemaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="subtemaModalLabel">{{ __('Question Subtopic') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="subtemasForm" method="post"  enctype="multipart/form-data">
                    {!! csrf_field() !!}
                        <div class="row">
                                 <div class="mb-3">
                                    <label>{{ __('Topic') }}</label>
                                    <select class="form-select" id="TEMAPREGUNTA_ID" name="TEMAPREGUNTA_ID" required>
                                        @foreach ($temas as $tema)
                                            <option value="{{ $tema->ID_CATALOGO_TEMAPREGUNTA }}">{{ $tema->NOMBRE_TEMA }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"> {{ __('Subtopic') }}</label>
                                    <input type="text" class="form-control" name="NOMBRE_SUBTEMA" id="NOMBRE_SUBTEMA" required>
                                </div>
                                <div class="mb-3">
                                        <label>{{ __('Certification') }}</label>
                                        <select class="form-select selectize-multiple" id="CERTIFICACION_SUBTEMA" name="CERTIFICACION_SUBTEMA[]" multiple>
                                            @foreach ($entes as $ente)
                                                <option value="{{ $ente->ID_CATALOGO_ENTE }}">{{ $ente->NOMBRE_ENTE }}</option>
                                            @endforeach
                                        </select>
                                </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <button id="subtemabtnModal" type="button" class="btn btn-primary">{{ __('Save') }}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="idiomaModal" tabindex="-1" aria-labelledby="idiomaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="idiomaModalLabel">{{ __('Exam Language') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="idiomaForm" method="post"  enctype="multipart/form-data">
                    {!! csrf_field() !!}
                        <div class="row">
                                <div class="mb-3">
                                    <label class="form-label"> {{ __('Language') }}</label>
                                    <input type="text" class="form-control" name="NOMBRE_IDIOMA" id="NOMBRE_IDIOMA" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Description') }}</label>
                                    <input type="text" class="form-control" name="DESCRIPCION_IDIOMAS" id="DESCRIPCION_IDIOMAS" required>
                                </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <button id="idiomabtnModal" type="button" class="btn btn-primary">{{ __('Save') }}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="membresiasModal" tabindex="-1" aria-labelledby="membresiasModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="membresiasModalLabel">{{ __('Memberships') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="membresiasForm" method="post"  enctype="multipart/form-data">
                    {!! csrf_field() !!}
                        <div class="row">
                                <div class="mb-3">
                                    <label class="form-label"> {{ __('Name') }}</label>
                                    <input type="text" class="form-control" name="NOMBRE_MEMBRESIA" id="NOMBRE_MEMBRESIA" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Description') }}</label>
                                    <input type="text" class="form-control" name="DESCRIPCION_MEMBRESIA" id="DESCRIPCION_MEMBRESIA" required>
                                </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <button id="membresiasbtnModal" type="button" class="btn btn-primary">{{ __('Save') }}</button>
                </div>
            </div>
        </div>
    </div>
     <div class="modal fade" id="operacionModal" tabindex="-1" aria-labelledby="operacionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="operacionModalLabel">{{ __('Operation Type') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="operacionForm" method="post"  enctype="multipart/form-data">
                    {!! csrf_field() !!}
                        <div class="row">
                                <div class="mb-3">
                                    <label class="form-label"> {{ __('Operation Type') }}</label>
                                    <input type="text" class="form-control" name="NOMBRE_OPERACION" id="NOMBRE_OPERACION" required>
                                </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <button id="operacionbtnModal" type="button" class="btn btn-primary">{{ __('Save') }}</button>
                </div>
            </div>
        </div>
    </div>
 
</main>
@endsection
@php
    $css_identifier = 'catalogs';
@endphp