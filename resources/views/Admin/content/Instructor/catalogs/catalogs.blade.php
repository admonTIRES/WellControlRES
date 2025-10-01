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
                                          
                                                <table id="instructores-list-table" class="table " role="grid">
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

     {{-- <div class="modal fade" id="instructoresModal" tabindex="-1" aria-labelledby="instructoresModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="instructoresModalLabel">{{ __('Instructors') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="instructoresForm" method="post"  enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-section">
                                    <label class="form-label required-field">{{ __('First name') }}</label>
                                    <input type="text" class="form-control" name="FNAME_INSTRUCTOR" id="FNAME_INSTRUCTOR" required>
                                </div>
                                
                                <div class="form-section">
                                    <label class="form-label">{{ __('Middle name') }}</label>
                                    <input type="text" class="form-control" name="MDNAME_INSTRUCTOR" id="MDNAME_INSTRUCTOR">
                                </div>
                                
                                <div class="form-section">
                                    <label class="form-label required-field">{{ __('Family or last name') }}</label>
                                    <input type="text" class="form-control" name="LSNAME_INSTRUCTOR" id="LSNAME_INSTRUCTOR" required>
                                </div>
                                
                                <div class="form-section">
                                    <label class="form-label required-field">{{ __('Mail') }}</label>
                                    <input type="email" class="form-control" name="MAIL_INSTRUCTOR" id="MAIL_INSTRUCTOR" required>
                                </div>
                            </div>
                            
                            <!-- Columna 2 -->
                            <div class="col-md-6">
                                <div class="form-section">
                                    <label class="form-label">{{ __('Phone number') }}</label>
                                    <div class="phone-group">
                                        <input type="text" class="form-control" placeholder="{{ __('Lada') }}" name="LADA_INSTRUCTOR" id="LADA_INSTRUCTOR">
                                        <input type="tel" class="form-control" placeholder="{{ __('Phone') }}" name="TEL_INSTRUCTOR" id="TEL_INSTRUCTOR">
                                    </div>
                                </div>
                                
                                <div class="form-section">
                                     <label>{{ __('Accreditation type') }}</label>
                                    <select class="form-select" id="ACREDITACION_INSTRUCTOR" name="ACREDITACION_INSTRUCTOR" required>
                                        @foreach ($temas as $tema)
                                            <option value="{{ $tema->ID_CATALOGO_TEMAPREGUNTA }}">{{ $tema->NOMBRE_TEMA }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                   
                                </div>
                                
                                <div class="form-section">
                                    <label class="form-label">{{ __('Expiration') }}</label>
                                    <input type="date" class="form-control" name="EXPIRACION_INSTRUCTOR" id="EXPIRACION_INSTRUCTOR">
                                </div>
                                
                                <div class="form-section">
                                    <label class="form-label">{{ __('Document') }}</label>
                                    <input type="text" class="form-control" name="DOC_INSTRUCTOR" id="DOC_INSTRUCTOR">
                                </div>
                                
                                <div class="form-section" id="vigenciaInstructor">
                                    <!-- Espacio para contenido adicional -->
                                </div>
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
    </div> --}}

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
                                    <label class="form-label required-field">{{ __('First name') }}</label>
                                    <input type="text" class="form-control" name="FNAME_INSTRUCTOR" id="FNAME_INSTRUCTOR" required>
                                </div>
                                
                                <div class="form-section">
                                    <label class="form-label">{{ __('Middle name') }}</label>
                                    <input type="text" class="form-control" name="MDNAME_INSTRUCTOR" id="MDNAME_INSTRUCTOR">
                                </div>
                                
                                <div class="form-section">
                                    <label class="form-label required-field">{{ __('Family or last name') }}</label>
                                    <input type="text" class="form-control" name="LSNAME_INSTRUCTOR" id="LSNAME_INSTRUCTOR" required>
                                </div>
                                
                                <div class="form-section">
                                    <label class="form-label required-field">{{ __('Mail') }}</label>
                                    <input type="email" class="form-control" name="MAIL_INSTRUCTOR" id="MAIL_INSTRUCTOR" required>
                                </div>
                            </div>
                            
                            <!-- Columna 2 -->
                            <div class="col-md-6">
                                <div class="form-section">
                                    <label class="form-label">{{ __('Phone number') }}</label>
                                    <div class="phone-group">
                                        <input type="text" class="form-control" placeholder="{{ __('Lada') }}" name="LADA_INSTRUCTOR" id="LADA_INSTRUCTOR">
                                        <input type="tel" class="form-control" placeholder="{{ __('Phone') }}" name="TEL_INSTRUCTOR" id="TEL_INSTRUCTOR">
                                    </div>
                                </div>
                                
                                <div class="form-section">
                                    <label class="form-label required-field">{{ __('Accreditation type') }}</label>
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
                                
                                <div class="form-section">
                                     <label class="form-label">{{ __('Document') }}</label>
                                    <input type="file" class="form-control" id="DOC_INSTRUCTOR" name="DOC_INSTRUCTOR" accept=".pdf" style="width: auto; flex: 1;" >
                                    <button type="button" class="btn btn-light btn-sm ms-2" id="quitar-doc" style="display:none;"> {{ __('Quit') }}</button>
                                </div>
                                <div id="err-message" class="text-danger" style="display:none;">{{ __('Please, upload a pdf file') }} </div>
                                
                                <div class="form-section" id="vigenciaInstructor">
                                    <!-- Espacio para contenido adicional -->
                                </div>
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
        .required-field::after {
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
 
@endsection
@php
    $css_identifier = 'catalogs';
@endphp