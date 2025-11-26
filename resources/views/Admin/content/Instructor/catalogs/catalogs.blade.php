@extends('Template/maestraAdmin')
@section('contenido')
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
                                     <p class="mt-3 mb-2">{{ __('Generalities') }}</p>
                                    <button class="nav-link text-start rounded mb-1 pe-5 active"
                                        id="v-pills-nombres-tab"
                                        data-topic="nombres"
                                        data-bs-toggle="pill"
                                        data-bs-target="#v-pills-nombres"
                                        type="button"
                                        role="tab"
                                        aria-controls="v-pills-nombres"
                                        aria-selected="false">{{ __('Project names') }}</button>
                                    <button class="nav-link text-start rounded mb-1 pe-5"
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
                                    <button class="nav-link text-start rounded mb-1 pe-5"
                                        id="v-pills-operacion-tab"
                                        data-topic="operacion"
                                        data-bs-toggle="pill"
                                        data-bs-target="#v-pills-operacion"
                                        type="button"
                                        role="tab"
                                        aria-controls="v-pills-operacion"
                                        aria-selected="false">{{ __('Operation type') }}</button>
                                    <hr class="hr-horizontal mt-4 mb-2">
                                    <p class="mt-3 mb-2">{{ __('Training center data') }}</p>
                                    <button class="nav-link text-start rounded mb-1 pe-5"
                                        id="v-pills-centro-tab"
                                        data-topic="centro-capacitacion"
                                        data-bs-toggle="pill"
                                        data-bs-target="#v-pills-centro"
                                        type="button"
                                        role="tab"
                                        aria-controls="v-pills-centro"
                                        aria-selected="false">{{ __('Centros de capacitación') }}</button>
                                    <hr class="hr-horizontal mt-4 mb-2">
                                    <p class="mt-3 mb-2">{{ __('Customers') }}</p>
                                    <button class="nav-link text-start rounded mb-1 pe-5"
                                        id="v-pills-clientes-tab"
                                        data-topic="clientes-topic"
                                        data-bs-toggle="pill"
                                        data-bs-target="#v-pills-clientes"
                                        type="button"
                                        role="tab"
                                        aria-controls="v-pills-clientes"
                                        aria-selected="false"> {{ __('Customers') }}</button>
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
                                    <p class="mt-3 mb-2">{{ __('Instructors') }}</p>
                                    <button class="nav-link text-start rounded mb-1 pe-5"
                                        id="v-pills-instructores-tab"
                                        data-topic="instructores"
                                        data-bs-toggle="pill"
                                        data-bs-target="#v-pills-instructores"
                                        type="button"
                                        role="tab"
                                        aria-controls="v-pills-instructores"
                                        aria-selected="false">{{ __('Instructors') }}</button>
                                </div>
                                <div class="tab-content pt-md-0 flex-grow-1" id="v-pills-tabContent">
                                      <div class="tab-pane fade show active" id="v-pills-nombres" role="tabpanel" aria-labelledby="v-pills-nombres-tab">
                                        <div class="w-100 h-100">
                                            <div class="header-title d-flex justify-content-between align-items-center w-100 mb-4">
                                                <h4 class="card-title mb-0"> {{ __('Catalog of project names') }}</h4> 
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nombresModal">
                                                    {{ __('New project name') }}
                                                </button>
                                            </div>
                                            <div class="table-container">
                                                <table id="nombres-list-table" class="table  " role="grid" >
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="v-pills-acreditadores" role="tabpanel" aria-labelledby="v-pills-acreditadores-tab">
                                        <div class="w-100 h-100">
                                            <div class="header-title d-flex justify-content-between align-items-center w-100 mb-4">
                                                <h4 class="card-title mb-0"> {{ __('Catalog of accrediting entities') }}</h4> 
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#entesModal">
                                                    {{ __('New accrediting entity') }}
                                                </button>
                                            </div>
                                            <div class="table-container">
                                                <table id="entes-list-table" class="table  " role="grid" >
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
                                            <div class="table-container">
                                                <table id="nivelacreditacion-list-table" class="table " style="width:100%">
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
                                            <div class="table-container">
                                                <table id="tiposbop-list-table" class="table " role="grid" >
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-centro" role="tabpanel" aria-labelledby="v-pills-centro-tab">
                                        <div class="w-100 h-100">
                                            <div class="header-title d-flex justify-content-between align-items-center w-100 mb-4">
                                                <h4 class="card-title mb-0"> {{ __('Catalog of training centers') }}</h4> 
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#centroModal">
                                                     {{ __('Nuevo centro de capacitación') }}
                                                </button>
                                            </div>
                                            <div>
                                                <table id="centros-list-table" class="table " role="grid" >
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-clientes" role="tabpanel" aria-labelledby="v-pills-clientes-tab">
                                        <div class="w-100 h-100">
                                        <div class="header-title d-flex justify-content-between align-items-center w-100 mb-4">
                                                <h4 class="card-title mb-0"> {{ __('Clientes') }}</h4> 
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#clienteModal">
                                                     {{ __('Nuevo cliente') }}
                                                </button>
                                            </div>
                                            <div >
                                                <table id="clientes-list-table" class="table " role="grid" >
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
                                            <div class="table-container">
                                                <table id="temas-list-table" class="table " role="grid" >
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
                                            <div class="table-container">
                                                <table id="temas-list-table" class="table " role="grid" >
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
                                            <div class="table-container">
                                                <table id="subtemas-list-table" class="table " role="grid" >
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
                                            <div class="table-container">
                                                <table id="idiomas-list-table" class="table " role="grid">
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
                                            <div class="table-container">
                                                <table id="membresias-list-table" class="table " role="grid">
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
                                            <div class="table-container">
                                                <table id="operacion-list-table" class="table " role="grid">
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-instructores" role="tabpanel" aria-labelledby="v-pills-instructores-tab">
                                        <div class="w-100 h-100" style="max-width: 90%;">
                                            <div class="header-title d-flex justify-content-between align-items-center w-100 mb-4">
                                                <h4 class="card-title mb-0"> {{ __('Instructors catalog') }}</h4> 
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#instructoresModal">
                                                     {{ __('New instructor') }}
                                                </button>
                                            </div>
                                          <div >
                                                <table id="instructores-list-table" class="table " role="grid" >
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


<style>
    .form-section {
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
    }
    .section-title {
        color: #495057;
        margin-bottom: 1rem;
        font-weight: 600;
    }
    .contact-person, .que-incluye-item {
        border: 1px solid #e9ecef;
        border-radius: 0.375rem;
        padding: 1rem;
        margin-bottom: 1rem;
        background-color: #f8f9fa;
    }
    .contact-header, .que-incluye-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 1px solid #dee2e6;
    }
    .remove-contact, .remove-que-incluye {
        color: #dc3545;
        cursor: pointer;
        font-size: 1.2rem;
    }
    .remove-contact:hover, .remove-que-incluye:hover {
        color: #bd2130;
    }
    .vigencia-verde {
        color: #198754;
        font-weight: bold;
    }
    .vigencia-amarillo {
        color: #ffc107;
        font-weight: bold;
    }
    .vigencia-rojo {
        color: #dc3545;
        font-weight: bold;
    }
    .btn-outline-primary {
        border-color: #0d6efd;
        color: #0d6efd;
    }
    .btn-outline-primary:hover {
        background-color: #0d6efd;
        color: white;
    }
</style>
<!-- Modal para visualizar PDF -->
<div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pdfModalLabel">Visualizar Documento PDF</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center" id="pdfLoading">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Cargando PDF...</span>
                    </div>
                    <p class="mt-2">Cargando documento...</p>
                </div>
                <div id="pdfViewer" style="display: none;">
                    <iframe id="pdfFrame" src="" width="100%" height="600px" style="border: none;"></iframe>
                </div>
                <div id="pdfError" class="text-center" style="display: none;">
                    <i class="fas fa-exclamation-triangle text-warning fa-3x mb-3"></i>
                    <h5>Error al cargar el documento</h5>
                    <p id="errorMessage" class="text-muted"></p>
                    <button type="button" class="btn btn-primary mt-2 btn-descargar-error">
                        <i class="fas fa-download me-2"></i>Descargar PDF
                    </button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="descargarPdfBtn">
                    <i class="fas fa-download me-2"></i>Descargar
                </button>
            </div>
        </div>
    </div>
</div>
<style>
    #pdfFrame {
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .btn-icon {
        width: 35px;
        height: 35px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    
    #pdfLoading, #pdfError {
        padding: 50px 0;
    }

    /* ESTILOS PARA LAS FILAS SEGÚN VIGENCIA */
.fila-verde {
    background-color: #d4edda !important; /* Verde claro */
    border-left: 4px solid #28a745;
}

.fila-amarillo {
    background-color: #fff3cd !important; /* Amarillo claro */
    border-left: 4px solid #ffc107;
}

.fila-rojo {
    background-color: #f8d7da !important; /* Rojo claro */
    border-left: 4px solid #dc3545;
}

.fila-vencido {
     background-color: #f8d7da !important; /* Rojo claro */
    border-left: 4px solid #dc3545;
    font-weight: bold;
}

.fila-vence-hoy {
    background-color: #f8d7da !important; /* Rojo claro */
    border-left: 4px solid #dc3545;
    font-weight: bold;
}

/* MEJORAR VISUALIZACIÓN DE LAS CELDAS */
#centros-list-table td {
    vertical-align: middle;
    padding: 8px 12px;
}

/* ESTILOS PARA LOS BOTONES */
.btn-icon {
    width: 35px;
    height: 35px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

/* HOVER EFFECTS PARA LAS FILAS */
#centros-list-table tbody tr:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    transition: all 0.2s ease;
}
</style>
<div class="modal fade" id="centroModal" tabindex="-1" aria-labelledby="centroModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="centroModalLabel">Datos del Centro de Capacitación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="centroForm" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    
                    <div class="form-section">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="ACREDITACION_CENTRO" class="form-label">Tipo de Acreditación</label>
                                <select class="form-select" id="ACREDITACION_CENTRO" name="ACREDITACION_CENTRO">
                                    <option value="" selected disabled>Seleccione una opción</option>
                                    @foreach ($entes as $ente)
                                            <option value="{{ $ente->ID_CATALOGO_ENTE }}">{{ $ente->NOMBRE_ENTE }}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="TIPO_CENTRO" class="form-label">Tipo</label>
                                <select class="form-select" id="TIPO_CENTRO" name="TIPO_CENTRO">
                                    <option value="" selected disabled>Seleccione una opción</option>
                                    <option value="1">Asociado</option>
                                    <option value="2">Primario</option>
                                </select>
                            </div>
                        </div>
                        <div id="asociadoContainer" class="row mb-3" style="display: none;">
                            <div class="col-12">
                                <label for="ASOCIADO_CENTRO" class="form-label">Asociado a</label>
                                <select class="form-select" id="ASOCIADO_CENTRO" name="ASOCIADO_CENTRO">
                                    <option value="" selected disabled>Seleccione el centro de capacitación primario</option>
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="RAZON_SOCIAL_CENTRO" class="form-label">Razón Social</label>
                                <input type="text" class="form-control" id="RAZON_SOCIAL_CENTRO" name="RAZON_SOCIAL_CENTRO">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="NOMBRE_COMERCIAL_CENTRO" class="form-label">Nombre Comercial</label>
                                <input type="text" class="form-control" id="NOMBRE_COMERCIAL_CENTRO" name="NOMBRE_COMERCIAL_CENTRO">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="NUMERO_CENTRO" class="form-label">Número de Acreditación</label>
                                <input type="text" class="form-control" id="NUMERO_CENTRO" name="NUMERO_CENTRO">
                            </div>
                        </div>
                        
                        <!-- Sección Qué incluye con el mismo diseño que Contacto -->
                        <div class="form-section">
                            <h6 class="section-title">¿Qué incluye?</h6>
                            <div id="queIncluyeContainer">
                                <!-- Los elementos "Qué incluye" se agregarán aquí dinámicamente -->
                            </div>
                            <button type="button" class="btn btn-outline-primary mt-2" id="addQueIncluye">
                                <i class="fas fa-plus me-2"></i>Agregar elemento
                            </button>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <h6 class="section-title">Vigencia</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="VIGENCIA_DESDE_CENTRO" class="form-label">Desde</label>
                                <input type="date" class="form-control" id="VIGENCIA_DESDE_CENTRO" name="VIGENCIA_DESDE_CENTRO">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="VIGENCIA_HASTA_CENTRO" class="form-label">Hasta</label>
                                <input type="date" class="form-control" id="VIGENCIA_HASTA_CENTRO" name="VIGENCIA_HASTA_CENTRO">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <p id="CONTADOR_CENTRO" class="form-label">Aquí se indicarán los días restantes vigentes</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <h6 class="section-title">Contacto</h6>
                        <div id="contactosContainer">
                        </div>
                        <button type="button" class="btn btn-outline-primary mt-2" id="addContacto">
                            <i class="fas fa-plus me-2"></i>Agregar contacto
                        </button>
                    </div>
                    
                    <!-- Documentos Adjuntos -->
                    <div class="form-section">
                        <div class="mb-3">
                            <label for="DOCUMENTO_CENTRO" class="form-label">Documentos Adjuntos</label>
                            <input type="file" class="form-control" id="DOCUMENTO_CENTRO" name="DOCUMENTO_CENTRO" accept=".pdf">
                            <div class="form-text">Solo se permiten archivos PDF</div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button id="centrobtnModal" type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    let contactCounter = 0;
    let queIncluyeCounter = 0;
    
    document.addEventListener('DOMContentLoaded', function() {
        // Agregar primer contacto y elemento "Qué incluye" al cargar
        
        document.getElementById('VIGENCIA_DESDE_CENTRO').addEventListener('change', calcularVigencia);
        document.getElementById('VIGENCIA_HASTA_CENTRO').addEventListener('change', calcularVigencia);
    });
    
    document.getElementById('TIPO_CENTRO').addEventListener('change', function() {
        const asociadoContainer = document.getElementById('asociadoContainer');
        if (this.value === '1') {
            asociadoContainer.style.display = 'block';
            document.getElementById('ASOCIADO_CENTRO').required = true;
        } else {
            asociadoContainer.style.display = 'none';
            document.getElementById('ASOCIADO_CENTRO').required = false;
        }
    });
    
    document.getElementById('addContacto').addEventListener('click', addContacto);
    
    function addContacto() {
        contactCounter++;
        const newContact = document.createElement('div');
        newContact.className = 'contact-person';
        newContact.id = `contacto-${contactCounter}`;
        
        newContact.innerHTML = `
            <div class="contact-header">
                <h6 class="mb-0">Contacto ${contactCounter}</h6>
                <span class="remove-contact" onclick="removeContact(${contactCounter})"><i class="fas fa-times"></i></span>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="CONTACTO_NOMBRE_${contactCounter}" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="CONTACTO_NOMBRE_${contactCounter}" name="CONTACTO_NOMBRE_${contactCounter}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="CONTACTO_CARGO_${contactCounter}" class="form-label">Cargo</label>
                    <input type="text" class="form-control" id="CONTACTO_CARGO_${contactCounter}" name="CONTACTO_CARGO_${contactCounter}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="CONTACTO_EMAIL_${contactCounter}" class="form-label">Email</label>
                    <input type="email" class="form-control" id="CONTACTO_EMAIL_${contactCounter}" name="CONTACTO_EMAIL_${contactCounter}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="CONTACTO_CELULAR_${contactCounter}" class="form-label">Teléfono Celular</label>
                    <input type="tel" class="form-control" id="CONTACTO_CELULAR_${contactCounter}" name="CONTACTO_CELULAR_${contactCounter}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="CONTACTO_FIJO_${contactCounter}" class="form-label">Teléfono Fijo</label>
                    <input type="tel" class="form-control" id="CONTACTO_FIJO_${contactCounter}" name="CONTACTO_FIJO_${contactCounter}">
                </div>
            </div>
        `;
        
        document.getElementById('contactosContainer').appendChild(newContact);
    }
    
    function removeContact(id) {
        if (contactCounter > 1) {
            const contactToRemove = document.getElementById(`contacto-${id}`);
            contactToRemove.remove();
            contactCounter--;
            
            const contacts = document.querySelectorAll('.contact-person');
            contacts.forEach((contact, index) => {
                const newId = index + 1;
                contact.id = `contacto-${newId}`;
                
                const header = contact.querySelector('.contact-header h6');
                header.textContent = `Contacto ${newId}`;
                
                const removeBtn = contact.querySelector('.remove-contact');
                removeBtn.setAttribute('onclick', `removeContact(${newId})`);
                
                // Actualizar IDs y nombres de los inputs
                const inputs = contact.querySelectorAll('input');
                inputs.forEach(input => {
                    const oldName = input.name;
                    const newName = oldName.replace(/\d+$/, newId);
                    input.name = newName;
                    input.id = newName;
                });
                
                // Actualizar labels
                const labels = contact.querySelectorAll('label');
                labels.forEach(label => {
                    const oldFor = label.getAttribute('for');
                    if (oldFor) {
                        const newFor = oldFor.replace(/\d+$/, newId);
                        label.setAttribute('for', newFor);
                    }
                });
            });
        }
    }
    
    // Agregar elemento "Qué incluye" con el mismo diseño que Contacto
    document.getElementById('addQueIncluye').addEventListener('click', addQueIncluye);
    
    function addQueIncluye() {
        queIncluyeCounter++;
        const newItem = document.createElement('div');
        newItem.className = 'que-incluye-item';
        newItem.id = `que-incluye-${queIncluyeCounter}`;
        
        newItem.innerHTML = `
            <div class="que-incluye-header">
                <h6 class="mb-0">Elemento ${queIncluyeCounter}</h6>
                <span class="remove-que-incluye" onclick="removeQueIncluye(${queIncluyeCounter})"><i class="fas fa-times"></i></span>
            </div>
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="QUE_INCLUYE_${queIncluyeCounter}" class="form-label">Descripción</label>
                    <textarea class="form-control" id="QUE_INCLUYE_${queIncluyeCounter}" name="QUE_INCLUYE_${queIncluyeCounter}" rows="3" placeholder="Describa lo que incluye..." ></textarea>
                </div>
            </div>
        `;
        
        document.getElementById('queIncluyeContainer').appendChild(newItem);
    }
    
    // Función para eliminar elemento "Qué incluye"
    function removeQueIncluye(id) {
        if (queIncluyeCounter > 1) {
            const itemToRemove = document.getElementById(`que-incluye-${id}`);
            itemToRemove.remove();
            queIncluyeCounter--;
            
            // Renumerar los elementos restantes
            const items = document.querySelectorAll('.que-incluye-item');
            items.forEach((item, index) => {
                const newId = index + 1;
                item.id = `que-incluye-${newId}`;
                
                // Actualizar los textos y IDs de los elementos internos
                const header = item.querySelector('.que-incluye-header h6');
                header.textContent = `Elemento ${newId}`;
                
                const removeBtn = item.querySelector('.remove-que-incluye');
                removeBtn.setAttribute('onclick', `removeQueIncluye(${newId})`);
                
                // Actualizar IDs y nombres de los textareas
                const textarea = item.querySelector('textarea');
                const oldName = textarea.name;
                const newName = oldName.replace(/\d+$/, newId);
                textarea.name = newName;
                textarea.id = newName;
                
                // Actualizar labels
                const label = item.querySelector('label');
                const oldFor = label.getAttribute('for');
                if (oldFor) {
                    const newFor = oldFor.replace(/\d+$/, newId);
                    label.setAttribute('for', newFor);
                }
            });
        }
    }
    
    // Función para calcular la vigencia
    function calcularVigencia() {
        const desde = document.getElementById('VIGENCIA_DESDE_CENTRO').value;
        const hasta = document.getElementById('VIGENCIA_HASTA_CENTRO').value;
        const contador = document.getElementById('CONTADOR_CENTRO');
        
        if (!desde || !hasta) {
            contador.textContent = "Aquí se indicarán los días restantes vigentes";
            contador.className = "form-label";
            return;
        }
        
        const fechaDesde = new Date(desde);
        const fechaHasta = new Date(hasta);
        const hoy = new Date();
        
        // Si la fecha de vencimiento ya pasó
        if (hoy > fechaHasta) {
            contador.textContent = "VENCIDO";
            contador.className = "form-label vigencia-rojo";
            return;
        }
        
        // Calcular días totales y días transcurridos
        const diasTotales = Math.ceil((fechaHasta - fechaDesde) / (1000 * 60 * 60 * 24));
        const diasTranscurridos = Math.ceil((hoy - fechaDesde) / (1000 * 60 * 60 * 24));
        const diasRestantes = Math.ceil((fechaHasta - hoy) / (1000 * 60 * 60 * 24));
        
        // Calcular porcentaje transcurrido
        const porcentajeTranscurrido = (diasTranscurridos / diasTotales) * 100;
        
        // Determinar color según el porcentaje
        let claseColor = "";
        if (porcentajeTranscurrido <= 40) {
            claseColor = "vigencia-verde";
        } else if (porcentajeTranscurrido <= 70) {
            claseColor = "vigencia-amarillo";
        } else {
            claseColor = "vigencia-rojo";
        }
        
        contador.textContent = `${diasRestantes} días restantes (${porcentajeTranscurrido.toFixed(1)}% transcurrido)`;
        contador.className = `form-label ${claseColor}`;
    }
    
</script>


<div class="modal fade" id="clienteModal" tabindex="-1" aria-labelledby="clienteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="clienteModalLabel">Datos del cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="clienteForm" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    
                    <!-- Nombre Comercial Único -->
                    <div class="form-section">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="NOMBRE_COMERCIAL_CLIENTE" class="form-label">Nombre Comercial</label>
                                <input type="text" class="form-control" id="NOMBRE_COMERCIAL_CLIENTE" 
                                    name="NOMBRE_COMERCIAL_CLIENTE" placeholder="Nombre comercial o marca del cliente">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Sección de Razones Sociales Múltiples -->
                    <div class="form-section">
                        <h6 class="section-title">Razones Sociales</h6>
                        <div id="razonesSocialesContainer">
                            <!-- Las razones sociales se agregarán aquí dinámicamente -->
                        </div>
                        <button type="button" class="btn btn-outline-primary mt-2" id="addRazonSocial">
                            <i class="fas fa-plus me-2"></i>Agregar razón social
                        </button>
                    </div>
                    
                    <!-- Sección de Contactos -->
                    <div class="form-section">
                        <h6 class="section-title">Contactos</h6>
                        <div id="contactosContainerCliente">
                            <!-- Los contactos se agregarán aquí dinámicamente -->
                        </div>
                        <button type="button" class="btn btn-outline-primary mt-2" id="addContactoCliente">
                            <i class="fas fa-plus me-2"></i>Agregar contacto
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button id="clientebtnModal" type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<style>
    .form-section {
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid #e9ecef;
    }
    .section-title {
        color: #495057;
        margin-bottom: 1rem;
        font-weight: 600;
    }
    .razon-social-item, .contacto-cliente-item {
        border: 1px solid #e9ecef;
        border-radius: 0.375rem;
        padding: 1rem;
        margin-bottom: 1rem;
        background-color: #f8f9fa;
    }
    .razon-social-header, .contacto-cliente-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 1px solid #dee2e6;
    }
    .remove-razon-social, .remove-contacto-cliente {
        color: #dc3545;
        cursor: pointer;
        font-size: 1.2rem;
    }
    .remove-razon-social:hover, .remove-contacto-cliente:hover {
        color: #bd2130;
    }
    .btn-outline-primary {
        border-color: #0d6efd;
        color: #0d6efd;
    }
    .btn-outline-primary:hover {
        background-color: #0d6efd;
        color: white;
    }
</style>

<script>
    // Contadores globales
    let razonSocialCounter = 0;
    let contactoClienteCounter = 0;
    
    // Inicializar al cargar el documento
    document.addEventListener('DOMContentLoaded', function() {
        
        // Event listeners para botones de agregar
        document.getElementById('addRazonSocial').addEventListener('click', addRazonSocial);
        document.getElementById('addContactoCliente').addEventListener('click', addContactoCliente);
    });
    
    
    
    // Función para eliminar razón social
    function removeRazonSocial(id) {
        if (razonSocialCounter > 1) {
            const razonToRemove = document.getElementById(`razon-social-${id}`);
            razonToRemove.remove();
            razonSocialCounter--;
            
            // Renumerar las razones sociales restantes
            const razones = document.querySelectorAll('.razon-social-item');
            razones.forEach((razon, index) => {
                const newId = index + 1;
                razon.id = `razon-social-${newId}`;
                
                // Actualizar header
                const header = razon.querySelector('.razon-social-header h6');
                header.textContent = `Razón Social ${newId}`;
                
                // Actualizar botón de eliminar
                const removeBtn = razon.querySelector('.remove-razon-social');
                removeBtn.setAttribute('onclick', `removeRazonSocial(${newId})`);
                
                // Actualizar IDs y nombres de los inputs
                const inputs = razon.querySelectorAll('input');
                inputs.forEach(input => {
                    const oldName = input.name;
                    const newName = oldName.replace(/\d+$/, newId);
                    input.name = newName;
                    input.id = newName;
                });
                
                // Actualizar labels
                const labels = razon.querySelectorAll('label');
                labels.forEach(label => {
                    const oldFor = label.getAttribute('for');
                    if (oldFor) {
                        const newFor = oldFor.replace(/\d+$/, newId);
                        label.setAttribute('for', newFor);
                    }
                });
            });
        }
    }
    
    
// Función para agregar razón social - ACTUALIZADA para llenar datos
function addRazonSocial(razonSocialData = null) {
    razonSocialCounter++;
    const newRazonSocial = document.createElement('div');
    newRazonSocial.className = 'razon-social-item';
    newRazonSocial.id = `razon-social-${razonSocialCounter}`;
    
    // Valor por defecto si hay datos
    const razonValue = razonSocialData ? (razonSocialData.RAZON_SOCIAL || '') : '';
    
    newRazonSocial.innerHTML = `
        <div class="razon-social-header">
            <h6 class="mb-0">Razón Social ${razonSocialCounter}</h6>
            <span class="remove-razon-social" onclick="removeRazonSocial(${razonSocialCounter})">
                <i class="fas fa-times"></i>
            </span>
        </div>
        <div class="row">
            <div class="col-12 mb-3">
                <label for="RAZON_SOCIAL_${razonSocialCounter}" class="form-label">Razón Social</label>
                <input type="text" class="form-control" id="RAZON_SOCIAL_${razonSocialCounter}" 
                    name="RAZON_SOCIAL_${razonSocialCounter}" 
                    placeholder="Nombre legal de la empresa" 
                    value="${razonValue}" required>
            </div>
        </div>
    `;
    
    document.getElementById('razonesSocialesContainer').appendChild(newRazonSocial);
}

// Función para agregar contacto - ACTUALIZADA para llenar datos
function addContactoCliente(contactoData = null) {
    contactoClienteCounter++;
    const newContacto = document.createElement('div');
    newContacto.className = 'contacto-cliente-item';
    newContacto.id = `contacto-cliente-${contactoClienteCounter}`;
    
    // Valores por defecto si hay datos
    const nombreValue = contactoData ? (contactoData.NOMBRE || '') : '';
    const cargoValue = contactoData ? (contactoData.CARGO || '') : '';
    const emailValue = contactoData ? (contactoData.EMAIL || '') : '';
    const celularValue = contactoData ? (contactoData.CELULAR || '') : '';
    const fijoValue = contactoData ? (contactoData.FIJO || '') : '';
    
    newContacto.innerHTML = `
        <div class="contacto-cliente-header">
            <h6 class="mb-0">Contacto ${contactoClienteCounter}</h6>
            <span class="remove-contacto-cliente" onclick="removeContactoCliente(${contactoClienteCounter})">
                <i class="fas fa-times"></i>
            </span>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="CONTACTO_NOMBRE_${contactoClienteCounter}" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="CONTACTO_NOMBRE_${contactoClienteCounter}" 
                    name="CONTACTO_NOMBRE_${contactoClienteCounter}" 
                    value="${nombreValue}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="CONTACTO_CARGO_${contactoClienteCounter}" class="form-label">Cargo</label>
                <input type="text" class="form-control" id="CONTACTO_CARGO_${contactoClienteCounter}" 
                    name="CONTACTO_CARGO_${contactoClienteCounter}" 
                    value="${cargoValue}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="CONTACTO_EMAIL_${contactoClienteCounter}" class="form-label">Email</label>
                <input type="email" class="form-control" id="CONTACTO_EMAIL_${contactoClienteCounter}" 
                    name="CONTACTO_EMAIL_${contactoClienteCounter}" 
                    value="${emailValue}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="CONTACTO_CELULAR_${contactoClienteCounter}" class="form-label">Teléfono Celular</label>
                <input type="tel" class="form-control" id="CONTACTO_CELULAR_${contactoClienteCounter}" 
                    name="CONTACTO_CELULAR_${contactoClienteCounter}" 
                    value="${celularValue}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="CONTACTO_FIJO_${contactoClienteCounter}" class="form-label">Teléfono Fijo</label>
                <input type="tel" class="form-control" id="CONTACTO_FIJO_${contactoClienteCounter}" 
                    name="CONTACTO_FIJO_${contactoClienteCounter}" 
                    value="${fijoValue}">
            </div>
        </div>
    `;
    
    document.getElementById('contactosContainerCliente').appendChild(newContacto);
}
    // Función para eliminar contacto
    function removeContactoCliente(id) {
        if (contactoClienteCounter > 1) {
            const contactoToRemove = document.getElementById(`contacto-cliente-${id}`);
            contactoToRemove.remove();
            contactoClienteCounter--;
            
            // Renumerar los contactos restantes
            const contactos = document.querySelectorAll('.contacto-cliente-item');
            contactos.forEach((contacto, index) => {
                const newId = index + 1;
                contacto.id = `contacto-cliente-${newId}`;
                
                // Actualizar header
                const header = contacto.querySelector('.contacto-cliente-header h6');
                header.textContent = `Contacto ${newId}`;
                
                // Actualizar botón de eliminar
                const removeBtn = contacto.querySelector('.remove-contacto-cliente');
                removeBtn.setAttribute('onclick', `removeContactoCliente(${newId})`);
                
                // Actualizar IDs y nombres de los inputs
                const inputs = contacto.querySelectorAll('input');
                inputs.forEach(input => {
                    const oldName = input.name;
                    const newName = oldName.replace(/\d+$/, newId);
                    input.name = newName;
                    input.id = newName;
                });
                
                // Actualizar labels
                const labels = contacto.querySelectorAll('label');
                labels.forEach(label => {
                    const oldFor = label.getAttribute('for');
                    if (oldFor) {
                        const newFor = oldFor.replace(/\d+$/, newId);
                        label.setAttribute('for', newFor);
                    }
                });
            });
        }
    }
    
    // Limpiar modal cuando se cierre
    $('#clienteModal').on('hidden.bs.modal', function () {
        // Limpiar contenedores
        $('#razonesSocialesContainer').empty();
        $('#contactosContainerCliente').empty();
        
        // Resetear campos únicos
        $('#NOMBRE_COMERCIAL_CLIENTE').val('');
        
        // Resetear contadores
        razonSocialCounter = 0;
        contactoClienteCounter = 0;
        
        // Agregar elementos vacíos
        addRazonSocial();
        addContactoCliente();
    });
</script>

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

    <div class="modal fade" id="instructoresModal" tabindex="-1" aria-labelledby="instructoresModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width: 70%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="instructoresModalLabel">{{ __('Instructors') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="instructoresForm" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="row">
                            <!-- Columna 1 -->
                            <div class="col-md-6">
                                <div class="form-section">
                                    <label class="form-label ">{{ __('First name') }}</label>
                                    <input type="text" class="form-control" name="FNAME_INSTRUCTOR" id="FNAME_INSTRUCTOR" required>
                                </div>
                                
                                <div class="form-section">
                                    <label class="form-label">{{ __('Middle name') }}</label>
                                    <input type="text" class="form-control" name="MDNAME_INSTRUCTOR" id="MDNAME_INSTRUCTOR">
                                </div>
                                
                                <div class="form-section">
                                    <label class="form-label ">{{ __('Family or last name') }}</label>
                                    <input type="text" class="form-control" name="LSNAME_INSTRUCTOR" id="LSNAME_INSTRUCTOR" required>
                                </div>
                                
                                <div class="form-section">
                                    <label class="form-label ">{{ __('Mail') }}</label>
                                    <input type="email" class="form-control" name="MAIL_INSTRUCTOR" id="MAIL_INSTRUCTOR" required>
                                </div>
                            </div>
                            
                            <!-- Columna 2 -->
                            <div class="col-md-6">
                                <div class="form-section">
                                    <label class="form-label">{{ __('Phone number') }}</label>
                                    <div class="d-flex gap-2">
                                        <input type="text" class="form-control w-25" placeholder="{{ __('Lada') }}" name="LADA_INSTRUCTOR" id="LADA_INSTRUCTOR">
                                        <input type="tel" class="form-control flex-fill" placeholder="{{ __('Phone') }}" name="TEL_INSTRUCTOR" id="TEL_INSTRUCTOR">
                                    </div>
                                </div>
                                
                                <div class="form-section"> 
                                    <label class="form-label ">{{ __('Accreditation type') }}</label>
                                    <select class="form-select selectize-multiple" id="ACREDITACION_INSTRUCTOR" name="ACREDITACION_INSTRUCTOR[]" multiple> 
                                        @foreach ($entes as $ente) 
                                            <option value="{{ $ente->ID_CATALOGO_ENTE }}">{{ $ente->NOMBRE_ENTE }}</option> 
                                        @endforeach 
                                    </select> 
                                </div>
                                <div class="form-section">
                                    <label class="form-label">{{ __('Expiration') }}</label>
                                    <input type="date" class="form-control" name="EXPIRACION_INSTRUCTOR" id="EXPIRACION_INSTRUCTOR">
                                </div>
                                

                                

                                {{-- <div class="form-section">
                                     <label class="form-label">{{ __('Document') }}</label>
                                    <input type="file" class="form-control" id="DOC_INSTRUCTOR" name="DOC_INSTRUCTOR" accept=".pdf" style="width: auto; flex: 1;" >
                                    <button type="button" class="btn btn-light btn-sm ms-2" id="quitar-doc" style="display:none;"> {{ __('Quit') }}</button>
                                </div>
                                <div id="err-message" class="text-danger" style="display:none;">{{ __('Please, upload a pdf file') }} </div>
                                
                                <div class="form-section" id="vigenciaInstructor">
                                    <!-- Espacio para contenido adicional -->
                                </div> --}}
                            </div>
                            <div class="col-md-12">
                                <div class="form-section">
                                    <label class="form-label">{{ __('Documents') }}</label>

                                    <div id="documentos-container"></div>

                                    <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add-doc">
                                        <i class="fas fa-plus"></i> {{ __('Add document') }}
                                    </button>
                                </div>

                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        let docIndex = 0;

                                        // Contenedor donde se agregan los documentos
                                        const container = document.getElementById('documentos-container');
                                        const addBtn = document.getElementById('add-doc');

                                        addBtn.addEventListener('click', () => {
                                            const docRow = document.createElement('div');
                                            docRow.classList.add('d-flex', 'align-items-center', 'mb-2', 'doc-row');
                                            docRow.innerHTML = `
                                                <input type="text" name="documents[${docIndex}][name]" class="form-control me-2" placeholder="{{ __('Document name') }}" required>
                                                <input type="file" name="documents[${docIndex}][file]" class="form-control" accept=".pdf" required>
                                                <button type="button" class="btn btn-danger btn-sm ms-2 remove-doc">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            `;
                                            container.appendChild(docRow);
                                            docIndex++;
                                        });

                                        // Eliminar documento
                                        container.addEventListener('click', (e) => {
                                            if (e.target.closest('.remove-doc')) {
                                                e.target.closest('.doc-row').remove();
                                            }
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <button id="instructoresbtnModal" type="button" class="btn btn-primary">{{ __('Save') }}</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .::after {
            content: " *";
            color: #dc3545;
        }

        .lada-select {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            border-right: none;
        }

        .phone-group .form-control:last-child {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-section {
            margin-bottom: 1rem;
        }

        .selectize-multiple {
            min-height: 38px;
        }

        /* Estilos para mensajes de error */
        .is-invalid {
            border-color: #dc3545;
        }

        .invalid-feedback {
            display: block;
            width: 100%;
            margin-top: 0.25rem;
            font-size: 0.875em;
            color: #dc3545;
        }
    </style>
    <div class="modal fade" id="nombresModal" tabindex="-1" aria-labelledby="nombresModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nombresModalLabel">{{ __('Project name') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="nombresForm" method="post"  enctype="multipart/form-data">
                    {!! csrf_field() !!}
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label"> {{ __('Project name') }}</label>
                                <input type="text" class="form-control" name="NOMBRE_PROYECTO" id="NOMBRE_PROYECTO" required>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <button id="nombresbtnModal" type="button" class="btn btn-primary">{{ __('Save') }}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="accesoModal" tabindex="-1" aria-labelledby="accesoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="accesoModalLabel">{{ __('Login information') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="nombresForm" method="post"  enctype="multipart/form-data">
                    {!! csrf_field() !!}
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label"> {{ __('Project name') }}</label>
                                <input type="text" class="form-control" name="NOMBRE_PROYECTO" id="NOMBRE_PROYECTO" required>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <button id="nombresbtnModal" type="button" class="btn btn-primary">{{ __('Save') }}</button>
                </div>
            </div>
        </div>
    </div>
 
@endsection
@php
    $css_identifier = 'catalogs';
@endphp