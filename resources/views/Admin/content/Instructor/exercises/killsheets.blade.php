@extends('Template/maestraAdmin')
@section('contenido')

<style>
    .killsheet-option {
        cursor: pointer;
        border: 2px solid transparent;
        padding: 12px;
        border-radius: 10px;
        transition: all 0.2s ease;
        text-align: center;
        width: 140px;
    }

    .killsheet-option:hover {
        border-color: #dc3545;
        background: #f8f9fa;
    }

    .killsheet-btn-icon {
        width: 80px;
        height: auto;
        margin-bottom: 8px;
    }

    .killsheet-label {
        font-size: 14px;
        font-weight: 600;
    }

    .killsheet-option,
    .killsheet-btn {
        cursor: pointer;
        border: 2px solid transparent;
        padding: 10px 14px;
        border-radius: 10px;
        transition: all .2s ease;
    }

    .killsheet-option.selected,
    .killsheet-btn.selected {
        border-color: #0d6efd;
        background-color: #eef4ff;
        box-shadow: 0 0 0 2px rgba(13, 110, 253, .25);
    }

    .killsheet-btn-icon {
        width: 80px;
    }

    .killsheet-btn {
        font-weight: 600;
    }

    .btn-add-question {
        width: 100%;
        margin-top: 10px;
        border: 2px dashed #0077b6;
        background: transparent;
        color: #0077b6;
        border-radius: 30px;
        padding: 8px;
        font-weight: 500;
    }
</style>

<style>
    .selectize-control.multi .selectize-input {
        padding: 6px 8px;
        min-height: 45px;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
    }

    .selectize-control.multi .selectize-input>input {
        display: none !important;
        width: 0 !important;
        height: 0 !important;
        padding: 0 !important;
        margin: 0 !important;
        border: none !important;
    }

    .selectize-control.multi .selectize-input>div {
        background-color: #FF585D;
        /* Azul Bootstrap */
        color: #fff;
        border-radius: 4px;
        padding: 4px 10px;
        margin: 3px 4px 3px 0;
        font-size: 0.875rem;
        font-weight: 500;
        display: flex;
        align-items: center;
    }

    .selectize-control.multi .selectize-input>div .remove {
        color: #fff;
        margin-left: 6px;
        font-weight: bold;
        cursor: pointer;
    }

    .selectize-input.focus {
        border-color: #ffffff00;
        box-shadow: 0 0 0 0.2rem rgba(13, 109, 253, 0);
    }
</style>

<style>
    .exercise-card {
        background: #fff;
        border-radius: 12px;
        padding: 16px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .exercise-header {
        background: #0077b6;
        color: #fff;
        padding: 10px 14px;
        border-radius: 10px;
        font-weight: 600;
        margin-bottom: 14px;
        text-align: center;
    }

    .btn-add-item {
        width: 100%;
        margin-top: 10px;
        border: 2px solid #0077b6;
        background: transparent;
        color: #0077b6;
        border-radius: 30px;
        padding: 6px;
        font-weight: 500;
    }
</style>
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
                                        <span class="text-secondary">{{ __('Killsheet ') }} </span> {{ __('Panel') }}
                                    </h1>
                                </div>
                                <p class="mb-4">{{ __('You can create exercises, questions and exam.') }}</p>
                            </div>
                            <div class="col-lg-6 banner-img">
                                <div class="img">
                                    <img src="../assets/images/principal/killsheets3.png" class="img-fluid w-55"
                                        alt="img8">
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
                            <h4 class="card-title mb-0">{{ __('Killsheets list') }}</h4>
                            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#killsheetModal">
                                {{ __('New killsheet') }}
                            </button> --}}
                            <button type="button" class="btn btn-primary" id="btnOpenPreKillsheet">
                                {{ __('New killsheet') }}
                            </button>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table id="killsheetsDatatable" class="table table-striped" role="grid">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalPreKillsheet" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <div id="stepCertificacion" class="text-center">
                    <h6>Selecciona la certificación</h6>
                    <div class="d-flex justify-content-center gap-4">
                        <div class="killsheet-option" data-ente="1">
                            <img src="/assets/images/iwcflogo.png" class="killsheet-btn-icon">
                            <div>IWCF</div>
                        </div>
                        <div class="killsheet-option" data-ente="2">
                            <img src="/assets/images/iadc.png" class="killsheet-btn-icon">
                            <div>IADC</div>
                        </div>
                    </div>
                </div>

                <div id="stepPozo" class="text-center mt-4 d-none">
                    <h6>Tipo de Pozo</h6>
                    <div class="d-flex justify-content-center gap-3">
                        <div class="killsheet-btn text-danger" data-pozo="1">Pozo Vertical</div>
                        <div class="killsheet-btn text-danger" data-pozo="2">Pozo Desviado</div>
                    </div>
                </div>

                <div id="stepBop" class="text-center mt-4 d-none">
                    <h6>Tipo de BOP</h6>
                    <div class="d-flex justify-content-center gap-3">
                        <div class="killsheet-btn text-success" data-bop="surface">Surface</div>
                        <div class="killsheet-btn text-success" data-bop="subsea">Subsea</div>
                    </div>
                </div>

                <div id="stepIdioma" class="text-center mt-4 d-none">
                    <h6>Idioma</h6>
                    <div class="d-flex flex-column align-items-center gap-3 mt-3">
                        <div class="killsheet-btn idioma-option" data-idioma="1">
                            Inglés
                        </div>
                        <div class="killsheet-btn idioma-option" data-idioma="2">
                            Español
                        </div>
                        <div class="killsheet-btn idioma-option" data-idioma="3">
                            Árabe
                        </div>
                        <div class="killsheet-btn idioma-option" data-idioma="4">
                            Portugués
                        </div>
                    </div>
                </div>

                <input type="hidden" name="TIPO_ENTE" id="TIPO_ENTE">
                <input type="hidden" name="TIPO_POZO" id="TIPO_POZO">
                <input type="hidden" name="TIPO_BOP" id="TIPO_BOP">
                <input type="hidden" name="TIPO_IDIOMA" id="TIPO_IDIOMA">
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="killsheet_modal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">

            <!-- HEADER -->
            <div class="modal-header">
                <h5 class="modal-title" id="modal-killsheet-title">
                    Hoja de matar
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- BODY -->
            <div class="modal-body">
                <form id="killsheet_fomr" enctype="multipart/form-data" class="wizard-step">
                    {!! csrf_field() !!}


                    <input type="hidden" name="TIPO_ENTE_KILL" id="TIPO_ENTE_KILL">
                    <input type="hidden" name="TIPO_POZO_KILL" id="TIPO_POZO_KILL">
                    <input type="hidden" name="TIPO_BOP_KILL" id="TIPO_BOP_KILL">
                    <input type="hidden" name="TIPO_IDIOMA_KILL" id="TIPO_IDIOMA_KILL">



                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="pastel-box mb-5">
                                <h4 class="fw-bold mb-4 text-center">
                                    <span class="text-secondary">1.</span> Generalidades
                                </h4>
                                <div class="mb-4">
                                    <label>Niveles*</label>
                                    <select class="form-select selectize-multiple"
                                        id="NIVELES_KILLSHEET"
                                        name="NIVELES_KILLSHEET[]"
                                        multiple>
                                        @foreach ($niveles as $nivel)
                                        <option value="{{ $nivel->ID_CATALOGO_NIVELACREDITACION }}">
                                            {{ $nivel->NOMBRE_NIVEL }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <h4 class="fw-bold mt-5 mb-3 text-center">
                                    <span class="text-secondary">2.</span> Datos del ejercicio
                                </h4>
                            </div>

                        </div>
                    </div>

                    <div class="row g-4" id="exercise-containers">

                        <div class="col-md-6">
                            <div class="exercise-card" data-section="datos_pozo">
                                <div class="exercise-header">Datos del pozo</div>
                                <div class="exercise-items"></div>
                                <button type="button" class="btn-add-item">+ Agregar elemento</button>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="exercise-card" data-section="capacidades_internas">
                                <div class="exercise-header">Capacidades internas</div>
                                <div class="exercise-items"></div>
                                <button type="button" class="btn-add-item">+ Agregar elemento</button>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="exercise-card" data-section="capacidades_anulares">
                                <div class="exercise-header">Capacidades anulares</div>
                                <div class="exercise-items"></div>
                                <button type="button" class="btn-add-item">+ Agregar elemento</button>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="exercise-card" data-section="bomba_lodo">
                                <div class="exercise-header">Datos de la bomba de lodo</div>
                                <div class="exercise-items"></div>
                                <button type="button" class="btn-add-item">+ Agregar elemento</button>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="exercise-card" data-section="tasa_reducida_bomba">
                                <div class="exercise-header">
                                    Datos de la tasa reducida de circulación de la bomba
                                </div>
                                <div class="exercise-items"></div>
                                <button type="button" class="btn-add-item">+ Agregar elemento</button>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="exercise-card" data-section="otra_informacion">
                                <div class="exercise-header">Otra información</div>
                                <div class="exercise-items"></div>
                                <button type="button" class="btn-add-item">+ Agregar elemento</button>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="exercise-card" data-section="prueba_formacion">
                                <div class="exercise-header">Datos de la prueba de formación</div>
                                <div class="exercise-items"></div>
                                <button type="button" class="btn-add-item">+ Agregar elemento</button>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="exercise-card" data-section="influjo">
                                <div class="exercise-header">Datos del influjo</div>
                                <div class="exercise-items"></div>
                                <button type="button" class="btn-add-item">+ Agregar elemento</button>
                            </div>
                        </div>

                    </div>


                    <div class="row mt-4">
                        <div class="col-12 text-center">
                            <button type="button"
                                class="btn btn-primary btn-lg"
                                id="btn-continuar-sec-2">
                                Continuar
                            </button>
                        </div>
                    </div>


                    <div id="killsheet-views-container" class="d-none mt-5">
                        <div class="killsheet-view d-none"
                            data-ente="1"
                            data-pozo="1"
                            data-bop="1"
                            data-idioma="2">

                            @include(
                            'Admin.content.Instructor.exercises.killsheetsComponents.IWCF.vertical.Surface.spanish',
                            ['id' => 'iwcf-v-sur-es']
                            )

                        </div>
                    </div>


                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div id="questions-container">
                                <div class="exercise-header">
                                    Preguntas
                                </div>
                                <button type="button"
                                    class="btn-add-question">
                                    + Agregar pregunta
                                </button>
                                <div id="questions-items"></div>


                            </div>

                        </div>
                    </div>




                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success" id="guardakillsheet" style="display: block;">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




@endsection