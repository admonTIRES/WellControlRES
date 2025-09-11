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
                                        <span class="text-secondary">Killsheet </span> Panel
                                    </h1>
                                </div>
                                <p class="mb-4">You can create exercises, questions and exam.</p>
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
                            <button type="button" class="btn btn-primary" id="openKillsheet">
                                {{ __('New killsheet') }}
                            </button>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table id="killsheets-list-table" class="table table-striped" role="grid">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Fullscreen -->
<style>
    .exercise-card {
        border: 1px solid #e0e0e0;
        border-radius: 12px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin-bottom: 20px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .exercise-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .exercise-card-header {
        padding: 10px;
        text-align: center;
        font-weight: bold;
    }

    .exercise-card-header h6 {
        margin: 0;
        font-size: 1rem;
        color: #fff;
    }

    /* Colores de encabezado */
    .header-blue {
        background-color: #236192;
    }

    .header-red {
        background-color: #007DBA;
    }

    .header-green {
        background-color: #007DBA;
    }

    /* Cuerpo */
    .exercise-card-body {
        padding: 15px;
        background: #fff;
    }

    /* Botón agregar */
    .btn-add {
        border: 2px solid #236192;
        color: #236192;
        font-weight: bold;
        background: #fff;
        border-radius: 20px;
        padding: 5px 12px;
        margin-top: 10px;
        transition: all 0.2s ease;
    }

    .btn-add:hover {
        background: #236192;
        color: #fff;
    }

    /* Botón eliminar */
    .btn-delete {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        border: none;
        background: #FF585D;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
        cursor: pointer;
        transition: background 0.2s ease;
    }

    .btn-delete:hover {
        background: #d83d44;
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

    /* Estilo para cada etiqueta seleccionada */
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

    /* Estilo para la "x" de eliminar */
    .selectize-control.multi .selectize-input>div .remove {
        color: #fff;
        margin-left: 6px;
        font-weight: bold;
        cursor: pointer;
    }

    /* Efecto al enfocar */
    .selectize-input.focus {
        border-color: #ffffff00;
        box-shadow: 0 0 0 0.2rem rgba(13, 109, 253, 0);
    }

    .pastel-box {
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        border: 1px solid #e9ecef;
    }

</style>
<div class="modal fade" id="killsheet_modal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-killsheet-title">Nueva hoja de matar IWCF para pozos verticales</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="killsheet-data-1" enctype="multipart/form-data" class="wizard-step">
                    {!! csrf_field() !!}
                    <input type="hidden" id="ID_KILLSHEET" name="ID_KILLSHEET">
                    <div class="row">
                        <!-- Sección 1: Generalidades -->
                        <div class="col-md-12 text-center pastel-box mb-4">
                            <h4 class="fw-bold mb-4">
                                <span class="text-secondary">{{ __('1. ') }}</span> {{ __('Generalities') }}
                            </h4>
                            <div class="d-flex justify-content-center flex-wrap gap-3 mb-3">
                                <!-- Ente Acreditador -->
                                <div class="col-md-2 text-start">
                                    <label> {{ __('Accrediting Entity*') }}</label>
                                    <select class="form-select selectize-multiple" id="ENTE_KILLSHEET"
                                        name="ENTE_KILLSHEET[]" multiple>
                                        @foreach ($entes as $ente)
                                        <option value="{{ $ente->ID_CATALOGO_ENTE }}">{{ $ente->NOMBRE_ENTE }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Niveles -->
                                <div class="col-md-2 text-start">
                                    <label> {{ __('Levels*') }}</label>
                                    <select class="form-select selectize-multiple" id="NIVELES_KILLSHEET"
                                        name="NIVELES_KILLSHEET[]" multiple>
                                        @foreach ($niveles as $nivel)
                                        <option value="{{ $nivel->ID_CATALOGO_NIVELACREDITACION }}">{{
                                            $nivel->NOMBRE_NIVEL }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- BOP -->
                                <div class="col-md-2 text-start">
                                    <label> {{ __('BOP*') }}</label>
                                    <select class="form-select selectize-multiple" id="BOP_KILLSHEET"
                                        name="BOP_KILLSHEET[]" multiple>
                                        @foreach ($bops as $bop)
                                        <option value="{{ $bop->ID_CATALOGO_TIPOBOP }}">{{ $bop->ABREVIATURA }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-2 text-start">
                                    <label> {{ __('OPERATION TYPE*') }}</label>
                                    <select class="form-select selectize-multiple" id="OPERACION_KILLSHEET"
                                        name="OPERACION_KILLSHEET[]" multiple>
                                        @foreach ($operaciones as $operacion)
                                        <option value="{{ $operacion->ID_CATALOGO_OPERACION }}">{{
                                            $operacion->NOMBRE_OPERACION }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2 text-center pastel-box">
                                    <div class="mb-3">
                                        <label>{{ __('Language of the question*') }}</label>
                                        <select class="form-select selectize-single" id="LANGUAGE_ID_QUESTION"
                                            name="LANGUAGE_ID_QUESTION" required>
                                            @foreach ($idiomas as $idioma)
                                            <option value="{{ $idioma->ID_CATALOGO_IDIOMAEXAMEN }}">{{
                                                $idioma->NOMBRE_IDIOMA }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sección 2: Datos del Ejercicio -->
                        <div class="col-md-12 text-center pastel-box mb-4">
                            <h4 class="fw-bold mb-4">
                                <span class="text-secondary">{{ __('2. ') }}</span> {{ __('Exercise Data') }}
                            </h4>

                            <!-- Grid de 8 secciones en 2 filas de 4 columnas -->
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="exercise-card">
                                        <div class="exercise-card-header header-red">
                                            <h6>{{ __('Datos del pozo') }}</h6>
                                        </div>
                                        <div class="exercise-card-body">
                                            <div id="well-data-container">
                                                <div class="item-row mb-2">
                                                    <div class="row g-1">
                                                        <div class="col-7">
                                                            <input type="text" class="form-control form-control-sm"
                                                                placeholder="{{ __('Data') }}" name="well_data_item[]">
                                                        </div>
                                                        <div class="col-2">
                                                            <input type="text" class="form-control form-control-sm"
                                                                placeholder="{{ __('Value') }}"
                                                                name="well_data_value[]">
                                                        </div>
                                                        <div class="col-3 d-flex">
                                                            <input type="text" class="form-control form-control-sm"
                                                                placeholder="{{ __('Unit of measurement') }}"
                                                                name="well_data_unit[]">
                                                            <button type="button" class="btn-delete ms-1"
                                                                onclick="removeItem(this)">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn-add w-100"
                                                onclick="addItem('well-data-container', 'well_data')">
                                                <i class="fas fa-plus"></i> {{ __('Add Item') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Sección 2.1: Datos del Pozo -->
                                <div class="col-md-6">
                                    <div class="exercise-card">
                                        <div class="exercise-card-header header-green">
                                            <h6>{{ __('Capacidades internas') }}</h6>
                                        </div>
                                        <div class="exercise-card-body">
                                            <div id="capabilities-data-container">
                                                <div class="item-row mb-2">
                                                    <div class="row g-1">
                                                        <div class="col-7">
                                                            <input type="text" class="form-control form-control-sm"
                                                                placeholder="{{ __('Data') }}" name="well_data_item[]">
                                                        </div>
                                                        <div class="col-2">
                                                            <input type="text" class="form-control form-control-sm"
                                                                placeholder="{{ __('Value') }}"
                                                                name="well_data_value[]">
                                                        </div>
                                                        <div class="col-3 d-flex">
                                                            <input type="text" class="form-control form-control-sm"
                                                                placeholder="{{ __('Unit of measurement') }}"
                                                                name="capabilities_data_unit[]">
                                                            <button type="button" class="btn-delete ms-1"
                                                                onclick="removeItem(this)">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn-add w-100"
                                                onclick="addItem('capabilities-data-container', 'capabilities_data')">
                                                <i class="fas fa-plus"></i> {{ __('Add Item') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="exercise-card">
                                        <div class="exercise-card-header header-red">
                                            <h6>{{ __('Capacidades anulares') }}</h6>
                                        </div>
                                        <div class="exercise-card-body">
                                            <div id="anular-data-container">
                                                <div class="item-row mb-2">
                                                    <div class="row g-1">
                                                        <div class="col-7">
                                                            <input type="text" class="form-control form-control-sm"
                                                                placeholder="{{ __('Data') }}" name="well_data_item[]">
                                                        </div>
                                                        <div class="col-2">
                                                            <input type="text" class="form-control form-control-sm"
                                                                placeholder="{{ __('Value') }}"
                                                                name="well_data_value[]">
                                                        </div>
                                                        <div class="col-3 d-flex">
                                                            <input type="text" class="form-control form-control-sm"
                                                                placeholder="{{ __('Unit of measurement') }}"
                                                                name="anular_data_unit[]">
                                                            <button type="button" class="btn-delete ms-1"
                                                                onclick="removeItem(this)">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn-add w-100"
                                                onclick="addItem('anular-data-container', 'anular_data')">
                                                <i class="fas fa-plus"></i> {{ __('Add Item') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Sección 2.1: Datos del Pozo -->
                                <div class="col-md-6">
                                    <div class="exercise-card">
                                        <div class="exercise-card-header header-green">
                                            <h6>{{ __('Datos de la bomba de lodo') }}</h6>
                                        </div>
                                        <div class="exercise-card-body">
                                            <div id="lodo-data-container">
                                                <div class="item-row mb-2">
                                                    <div class="row g-1">
                                                        <div class="col-7">
                                                            <input type="text" class="form-control form-control-sm"
                                                                placeholder="{{ __('Data') }}" name="well_data_item[]">
                                                        </div>
                                                        <div class="col-2">
                                                            <input type="text" class="form-control form-control-sm"
                                                                placeholder="{{ __('Value') }}"
                                                                name="well_data_value[]">
                                                        </div>
                                                        <div class="col-3 d-flex">
                                                            <input type="text" class="form-control form-control-sm"
                                                                placeholder="{{ __('Unit of measurement') }}"
                                                                name="lodo_data_unit[]">
                                                            <button type="button" class="btn-delete ms-1"
                                                                onclick="removeItem(this)">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn-add w-100"
                                                onclick="addItem('lodo-data-container', 'lodo_data')">
                                                <i class="fas fa-plus"></i> {{ __('Add Item') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="exercise-card">
                                        <div class="exercise-card-header header-red">
                                            <h6>{{ __('Datos de la tasa reducida de circulación de la bomba') }}</h6>
                                        </div>
                                        <div class="exercise-card-body">
                                            <div id="bomb-data-container">
                                                <div class="item-row mb-2">
                                                    <div class="row g-1">
                                                        <div class="col-7">
                                                            <input type="text" class="form-control form-control-sm"
                                                                placeholder="{{ __('Data') }}" name="well_data_item[]">
                                                        </div>
                                                        <div class="col-2">
                                                            <input type="text" class="form-control form-control-sm"
                                                                placeholder="{{ __('Value') }}"
                                                                name="well_data_value[]">
                                                        </div>
                                                        <div class="col-3 d-flex">
                                                            <input type="text" class="form-control form-control-sm"
                                                                placeholder="{{ __('Unit of measurement') }}"
                                                                name="bomb_data_unit[]">
                                                            <button type="button" class="btn-delete ms-1"
                                                                onclick="removeItem(this)">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn-add w-100"
                                                onclick="addItem('bomb-data-container', 'bomb_data')">
                                                <i class="fas fa-plus"></i> {{ __('Add Item') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Sección 2.1: Datos del Pozo -->
                                <div class="col-md-6">
                                    <div class="exercise-card">
                                        <div class="exercise-card-header header-green">
                                            <h6>{{ __('Otra información') }}</h6>
                                        </div>
                                        <div class="exercise-card-body">
                                            <div id="info-data-container">
                                                <div class="item-row mb-2">
                                                    <div class="row g-1">
                                                        <div class="col-7">
                                                            <input type="text" class="form-control form-control-sm"
                                                                placeholder="{{ __('Data') }}" name="well_data_item[]">
                                                        </div>
                                                        <div class="col-2">
                                                            <input type="text" class="form-control form-control-sm"
                                                                placeholder="{{ __('Value') }}"
                                                                name="well_data_value[]">
                                                        </div>
                                                        <div class="col-3 d-flex">
                                                            <input type="text" class="form-control form-control-sm"
                                                                placeholder="{{ __('Unit of measurement') }}"
                                                                name="info_data_unit[]">
                                                            <button type="button" class="btn-delete ms-1"
                                                                onclick="removeItem(this)">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn-add w-100"
                                                onclick="addItem('info-data-container', 'info_data')">
                                                <i class="fas fa-plus"></i> {{ __('Add Item') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="exercise-card">
                                        <div class="exercise-card-header header-red">
                                            <h6>{{ __('Datos de la prueba de formación') }}</h6>
                                        </div>
                                        <div class="exercise-card-body">
                                            <div id="formation-data-container">
                                                <div class="item-row mb-2">
                                                    <div class="row g-1">
                                                        <div class="col-7">
                                                            <input type="text" class="form-control form-control-sm"
                                                                placeholder="{{ __('Data') }}" name="well_data_item[]">
                                                        </div>
                                                        <div class="col-2">
                                                            <input type="text" class="form-control form-control-sm"
                                                                placeholder="{{ __('Value') }}"
                                                                name="well_data_value[]">
                                                        </div>
                                                        <div class="col-3 d-flex">
                                                            <input type="text" class="form-control form-control-sm"
                                                                placeholder="{{ __('Unit of measurement') }}"
                                                                name="formation_data_unit[]">
                                                            <button type="button" class="btn-delete ms-1"
                                                                onclick="removeItem(this)">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn-add w-100"
                                                onclick="addItem('formation-data-container', 'formation_data')">
                                                <i class="fas fa-plus"></i> {{ __('Add Item') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Sección 2.1: Datos del Pozo -->
                                <div class="col-md-6">
                                    <div class="exercise-card">
                                        <div class="exercise-card-header header-green">
                                            <h6>{{ __('Datos del influjo') }}</h6>
                                        </div>
                                        <div class="exercise-card-body">
                                            <div id="influence-data-container">
                                                <div class="item-row mb-2">
                                                    <div class="row g-1">
                                                        <div class="col-7">
                                                            <input type="text" class="form-control form-control-sm"
                                                                placeholder="{{ __('Data') }}" name="well_data_item[]">
                                                        </div>
                                                        <div class="col-2">
                                                            <input type="text" class="form-control form-control-sm"
                                                                placeholder="{{ __('Value') }}"
                                                                name="well_data_value[]">
                                                        </div>
                                                        <div class="col-3 d-flex">
                                                            <input type="text" class="form-control form-control-sm"
                                                                placeholder="{{ __('Unit of measurement') }}"
                                                                name="influence_data_unit[]">
                                                            <button type="button" class="btn-delete ms-1"
                                                                onclick="removeItem(this)">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn-add w-100"
                                                onclick="addItem('influence-data-container', 'influence_data')">
                                                <i class="fas fa-plus"></i> {{ __('Add Item') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary next-step" data-step="1"
                        id="iwcf-v-data-btn">Continuar</button>
                </form>
                <style>
                    body {
                        font-family: 'Poppins', sans-serif;
                        margin: 0;
                        padding: 0;
                    }

                    .container-iwcf-v {
                        width: 800px;
                        margin: 0 auto;
                        border: 2px solid #333;
                    }

                    .header-iwcf-v {
                        display: flex;
                        justify-content: space-between;
                        border-bottom: 2px solid #333;
                        padding: 10px;
                    }

                    .header-left {
                        width: 70%;
                    }

                    .header-right {
                        width: 30%;
                        border-left: 2px solid #333;
                        padding-left: 10px;
                    }

                    .title-iwcf-v {
                        font-weight: bold;
                        text-align: center;
                        margin-bottom: 5px;
                    }

                    .subtitle {
                        text-align: center;
                        margin-bottom: 10px;
                    }

                    .page-number {
                        text-align: right;
                        font-size: 12px;
                    }

                    .form-section {
                        display: flex;
                        border-bottom: 1px solid #333;
                    }

                    .form-box {
                        border: 1px solid #333;
                        margin: 5px;
                        padding: 10px;
                        flex: 1;
                    }

                    .section-title-iwcf-v {
                        font-weight: bold;
                        margin-bottom: 10px;
                    }

                    .form-row {
                        display: flex;
                        margin-bottom: 5px;
                        align-items: center;
                    }

                    .form-label {
                        flex: 3;
                    }

                    .form-input {
                        flex: 1;
                    }

                    .form-unit {
                        flex: 1;
                        padding-left: 5px;
                    }

                    input {
                        width: 90%;
                        padding: 2px;
                    }

                    .formula {
                        display: flex;
                        align-items: center;
                        margin: 5px 0;
                    }

                    .formula-eq {
                        margin: 0 5px;
                    }

                    .equal {
                        margin: 0 5px;
                    }

                    .pumps {
                        display: flex;
                        justify-content: space-between;
                        margin-top: 10px;
                    }

                    .pump-box {
                        flex: 1;
                        text-align: center;
                        border-bottom: 1px solid #333;
                        padding: 5px;
                    }

                    .table-iwcf-v {
                        width: 100%;
                        border-collapse: collapse;
                        margin-top: 10px;
                    }

                    .table-iwcf-v th,
                    .table-iwcf-v td {
                        border: 1px solid #333;
                        padding: 5px;
                        text-align: center;
                    }

                    .diagram {
                        text-align: center;
                        margin: 10px;
                    }

                    .volumes-grid {
                        display: grid;
                        grid-template-columns: 3fr 1fr 1fr 1fr 1fr 1fr;
                        gap: 2px;
                        margin-top: 10px;
                    }

                    .volumes-grid>div {
                        border: 1px solid #333;
                        padding: 5px;
                        text-align: center;
                    }

                    .volumes-row {
                        display: flex;
                    }

                    .volumes-label {
                        flex: 3;
                        border: 1px solid #333;
                        padding: 5px;
                    }

                    .volumes-calc {
                        flex: 1;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        border: 1px solid #333;
                    }

                    .kill-mud-box {
                        border: 1px solid #333;
                        margin: 5px;
                        padding: 10px;
                    }

                    .graph-container {
                        display: flex;
                        margin-top: 10px;
                    }

                    .graph-labels {
                        flex: 1;
                        border: 1px solid #333;
                    }

                    .graph {
                        flex: 4;
                        border: 1px solid #333;
                    }
                </style>
                <form id="killsheet-1" enctype="multipart/form-data" class="wizard-step d-none">
                    <!-- tus campos killsheet_IADC_v -->
                    <div class="container-iwcf-v">
                        <div class="page-number">Página 1 de 2</div>
                        <div class="header-iwcf-v">
                            <div class="header-left">
                                <div class="title-iwcf-v">International Well Control Forum</div>
                                <div class="subtitle">(Unidades de Campo API)</div>
                                <div class="subtitle">Hoja de control de pozo (Hoja para matar) - BOP de superficie pozo
                                    vertical</div>
                            </div>
                            <div class="header-right">
                                <div class="form-row">
                                    <div class="form-label">FECHA:</div>
                                    <div class="form-input"><input type="text"></div>
                                </div>
                                <div class="form-row">
                                    <div class="form-label">NOMBRE:</div>
                                    <div class="form-input"><input type="text"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <div class="form-box">
                                <div class="section-title-iwcf-v">Datos de resistencia de la formación:</div>
                                <div class="form-row">
                                    <div class="form-label">Presión de fuga (leak-off) en la superficie obtenida con la
                                        prueba de resistencia de la formación</div>
                                    <div class="form-input">(A) <input type="text"></div>
                                    <div class="form-unit">psi</div>
                                </div>
                                <div class="form-row">
                                    <div class="form-label">Densidad del lodo durante la prueba</div>
                                    <div class="form-input">(B) <input type="text"></div>
                                    <div class="form-unit">ppg</div>
                                </div>
                                <div class="form-row">
                                    <div class="form-label">Máxima densidad del lodo permitida = (A) ÷ </div>
                                    <div class="form-input">(C) <input type="text"></div>
                                    <div class="form-unit">ppg</div>
                                </div>
                                <div class="form-row">
                                    <div class="form-label">(B) + ____ = </div>
                                    <div class="form-input"><input type="text"></div>
                                </div>
                                <div class="form-row">
                                    <div class="form-label">Profundidad vertical de la zapata x 0.052</div>
                                </div>

                                <div class="section-title-iwcf-v">MAASP inicial (Presión anular máxima permitida en la
                                    superficie)</div>
                                <div class="form-row">
                                    <div class="form-label">(C) - Densidad del lodo actual) x Profundidad vertical de
                                        zapata x 0.052</div>
                                </div>
                                <div class="form-row">
                                    <div class="form-label"> = </div>
                                    <div class="form-input"><input type="text"></div>
                                    <div class="form-unit">psi</div>
                                </div>

                                <div class="pumps">
                                    <div class="pump-box">Desplazamiento de la bomba No.1</div>
                                    <div class="pump-box">Desplazamiento de la bomba No. 2</div>
                                </div>
                                <div class="form-row">
                                    <div class="form-label" style="text-align: center; font-size: 12px;">bbls /
                                        emboladas (Estroques)</div>
                                </div>

                                <div class="section-title-iwcf-v">(PL) Caída de presión dinámica (psi)</div>
                                <table class="table-iwcf-v">
                                    <tr>
                                        <th>Datos de la tasa reducida (Emboladas)</th>
                                        <th>BOMBA NO. 1</th>
                                        <th>BOMBA NO. 2</th>
                                    </tr>
                                    <tr>
                                        <td>SPM</td>
                                        <td><input type="text"></td>
                                        <td><input type="text"></td>
                                    </tr>
                                    <tr>
                                        <td>SPM</td>
                                        <td><input type="text"></td>
                                        <td><input type="text"></td>
                                    </tr>
                                </table>
                            </div>

                            <div class="form-box">
                                <div class="section-title-iwcf-v">Datos actuales del pozo:</div>
                                <div class="diagram">
                                    <img src="/assets/images/killsheets/pozoiwcf.png" alt="Diagrama de pozo">
                                </div>
                                <div class="section-title-iwcf-v">Lado de perforación actual:</div>
                                <div class="form-row">
                                    <div class="form-label">Densidad</div>
                                    <div class="form-input"><input type="text"></div>
                                    <div class="form-unit">ppg</div>
                                </div>

                                <div class="section-title-iwcf-v">Datos de la zapata del revestidor (revestimiento):</div>
                                <div class="form-row">
                                    <div class="form-label">Tamaño</div>
                                    <div class="form-input"><input type="text"></div>
                                    <div class="form-unit">pulg.</div>
                                </div>
                                <div class="form-row">
                                    <div class="form-label">Profundidad medida</div>
                                    <div class="form-input"><input type="text"></div>
                                    <div class="form-unit">pies</div>
                                </div>
                                <div class="form-row">
                                    <div class="form-label">Profundidad vertical verdadera</div>
                                    <div class="form-input"><input type="text"></div>
                                    <div class="form-unit">pies</div>
                                </div>

                                <div class="section-title-iwcf-v">Datos del hoyo:</div>
                                <div class="form-row">
                                    <div class="form-label">Tamaño</div>
                                    <div class="form-input"><input type="text"></div>
                                    <div class="form-unit">pulg.</div>
                                </div>
                                <div class="form-row">
                                    <div class="form-label">Profundidad medida</div>
                                    <div class="form-input"><input type="text"></div>
                                    <div class="form-unit">pies</div>
                                </div>
                                <div class="form-row">
                                    <div class="form-label">Profundidad vertical verdadera</div>
                                    <div class="form-input"><input type="text"></div>
                                    <div class="form-unit">pies</div>
                                </div>
                            </div>
                        </div>

                        <div class="volumes-grid">
                            <div>Datos pre -registrados del volumen</div>
                            <div>LONGITUD Pies</div>
                            <div>CAPACIDAD bbls / pie</div>
                            <div>VOLUMEN Barriles</div>
                            <div>EMBOLADAS (ESTROQUES) DE LA BOMBA Emboladas (Estroques)</div>
                            <div>TIEMPO Minutos</div>

                            <div>Tubería de perforación</div>
                            <div><input type="text"></div>
                            <div>x</div>
                            <div>=</div>
                            <div><input type="text"></div>
                            <div><input type="text"></div>

                            <div>Tubería de perforación extra pesada</div>
                            <div><input type="text"></div>
                            <div>x</div>
                            <div>=</div>
                            <div><input type="text"></div>
                            <div><input type="text"></div>

                            <div>Collares (Portamechas) de perforación</div>
                            <div><input type="text"></div>
                            <div>x</div>
                            <div>=</div>
                            <div><input type="text"></div>
                            <div><input type="text"></div>

                            <div>Volumen de la sarta de perforación</div>
                            <div></div>
                            <div></div>
                            <div>(D) <input type="text"></div>
                            <div>(E) <input type="text"></div>
                            <div><input type="text"></div>

                            <div>Collares de perforación en el hoyo (Hueco) abierto</div>
                            <div><input type="text"></div>
                            <div>x</div>
                            <div>=</div>
                            <div><input type="text"></div>
                            <div><input type="text"></div>

                            <div>Tubería de perforación / tubería extra pesada en el hoyo (Hueco) abierto</div>
                            <div><input type="text"></div>
                            <div>x</div>
                            <div>=</div>
                            <div><input type="text"></div>
                            <div><input type="text"></div>

                            <div>Volumen del hoyo (hueco) abierto</div>
                            <div></div>
                            <div></div>
                            <div>(F) <input type="text"></div>
                            <div><input type="text"></div>
                            <div><input type="text"></div>

                            <div>Tubería de perforación en el revestidor (Revestimiento)</div>
                            <div><input type="text"></div>
                            <div>x</div>
                            <div>=(G) <input type="text"></div>
                            <div><input type="text"></div>
                            <div><input type="text"></div>

                            <div>Volumen total del anular</div>
                            <div></div>
                            <div></div>
                            <div>(F + G) = (H) <input type="text"></div>
                            <div><input type="text"></div>
                            <div><input type="text"></div>

                            <div>Volumen total del sistema de pozo</div>
                            <div></div>
                            <div></div>
                            <div>(D + H) = (I) <input type="text"></div>
                            <div><input type="text"></div>
                            <div><input type="text"></div>

                            <div>Volumen activo en la superficie</div>
                            <div></div>
                            <div></div>
                            <div>(J) <input type="text"></div>
                            <div><input type="text"></div>
                            <div><input type="text"></div>

                            <div>Fluido total en el sistema activo</div>
                            <div></div>
                            <div></div>
                            <div>(I + J) <input type="text"></div>
                            <div><input type="text"></div>
                            <div><input type="text"></div>
                        </div>

                        <div class="footer" style="text-align: right; font-size: 10px; margin-top: 10px;">
                            Dr No SV 04 / 01 (Field Units)<br>
                            27-01-2006
                        </div>
                    </div>

                    <!-- Page 2 -->
                    <div class="container" style="margin-top: 20px;">
                        <div class="page-number">Página 2 de 2</div>
                        <div class="header-iwcf-v">
                            <div class="header-left">
                                <div class="title-iwcf-v">International Well Control Forum</div>
                                <div class="subtitle">(Unidades de Campo API)</div>
                                <div class="subtitle">Hoja de control de pozo (Hoja para matar) - BOP de superficie pozo
                                    vertical</div>
                            </div>
                            <div class="header-right">
                                <div class="form-row">
                                    <div class="form-label">FECHA:</div>
                                    <div class="form-input"><input type="text"></div>
                                </div>
                                <div class="form-row">
                                    <div class="form-label">NOMBRE:</div>
                                    <div class="form-input"><input type="text"></div>
                                </div>
                            </div>
                        </div>

                        <div class="kill-mud-box">
                            <div class="section-title-iwcf-v">Datos de la arremetida (del amago):</div>
                            <div class="form-row">
                                <div class="form-label">SIDP (Presión de cierre en la tubería de perforación)</div>
                                <div class="form-input"><input type="text"></div>
                                <div class="form-unit">psi</div>
                                <div class="form-label">SICP (Presión de cierre en revestimiento)</div>
                                <div class="form-input"><input type="text"></div>
                                <div class="form-unit">psi</div>
                                <div class="form-label">Aumento del volumen en los tanques (Ganancia en superficie)
                                </div>
                                <div class="form-input"><input type="text"></div>
                                <div class="form-unit">bbls</div>
                            </div>

                            <div class="form-row">
                                <div class="form-label">Densidad del lodo para matar</div>
                                <div class="form-label">Densidad del lodo actual +</div>
                                <div class="form-label">SIDPP</div>
                                <div class="form-label">Profundidad vertical verdadera x 0.052</div>
                            </div>
                            <div class="form-row">
                                <div class="form-label">KMD</div>
                                <div class="form-label">..................... +</div>
                                <div class="form-input"><input type="text"></div>
                                <div class="form-label">x 0.052</div>
                                <div class="form-label">=</div>
                                <div class="form-input"><input type="text"></div>
                                <div class="form-unit">ppg</div>
                            </div>

                            <div class="form-row">
                                <div class="form-label">Presión inicial de circulación</div>
                                <div class="form-label">Caída de presión dinámica + SIDPP</div>
                            </div>
                            <div class="form-row">
                                <div class="form-label">ICP</div>
                                <div class="form-input"><input type="text"></div>
                                <div class="form-label">+</div>
                                <div class="form-input"><input type="text"></div>
                                <div class="form-label">=</div>
                                <div class="form-input"><input type="text"></div>
                                <div class="form-unit">psi</div>
                            </div>

                            <div class="form-row">
                                <div class="form-label">Presión final de circulación</div>
                                <div class="form-label">KMD</div>
                                <div class="form-label">Densidad del lodo actual</div>
                                <div class="form-label">x Caída de presión dinámica</div>
                            </div>
                            <div class="form-row">
                                <div class="form-label">FCP</div>
                                <div class="form-input"><input type="text"></div>
                                <div class="form-label">x</div>
                                <div class="form-input"><input type="text"></div>
                                <div class="form-label">=</div>
                                <div class="form-input"><input type="text"></div>
                                <div class="form-unit">psi</div>
                            </div>

                            <div style="display: flex; margin-top: 20px;">
                                <div style="flex: 1; border: 1px solid #333; padding: 10px;">
                                    <div class="form-row">
                                        <div class="form-label">(K) = ICP - FCP = ................. - .................
                                            =</div>
                                        <div class="form-input"><input type="text"></div>
                                        <div class="form-unit">psi</div>
                                    </div>
                                </div>
                                <div style="flex: 1; border: 1px solid #333; padding: 10px;">
                                    <div class="form-row">
                                        <div class="form-label">(K) x 100</div>
                                        <div class="form-label">=</div>
                                        <div class="form-input"><input type="text"></div>
                                        <div class="form-label">x 100</div>
                                        <div class="form-label">=</div>
                                        <div class="form-input"><input type="text"></div>
                                        <div class="form-unit">psi / 100 emb. (Estroques)</div>
                                    </div>
                                </div>
                            </div>

                            <div class="graph-container">
                                <div class="graph-labels" style="display: flex; flex-direction: column;">
                                    <div style="border-bottom: 1px solid #333; padding: 5px; display: flex;">
                                        <div style="flex: 1;">EMBOLADAS (ESTROQUES)</div>
                                        <div style="flex: 1;">PRESIÓN (psi)</div>
                                    </div>
                                    <div style="flex-grow: 1; display: flex;">
                                        <div style="flex: 1; position: relative;">
                                            <div
                                                style="position: absolute; bottom: 5px; transform: rotate(-90deg); transform-origin: left; white-space: nowrap; font-size: 10px;">
                                                PRESIÓN ESTÁTICA Y DINÁMICA EN LA TUBERÍA DE PERFORACIÓN (psi)
                                            </div>
                                        </div>
                                        <div style="flex: 1;"></div>
                                    </div>
                                </div>
                                <div class="graph" style="display: grid; grid-template-columns: repeat(22, 1fr);">
                                    <!-- Grid for the graph - 22x22 cells -->
                                    <!-- Fill with 22*22=484 empty cells for the graph grid -->
                                    <script>
                                        document.write(Array(484).fill('<div style="border: 1px solid #eee; height: 10px;"></div>').join(''));
                                    </script>
                                </div>
                            </div>
                            <div style="text-align: center; margin-top: 5px;">Emboladas (Estroques) ⟶</div>
                        </div>

                        <div class="footer" style="text-align: right; font-size: 10px; margin-top: 10px;">
                            Dr No SV 04 / 02 (Field Units) 27-01-2006
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="iwcf-v-sol-btn">Continuar</button>
                </form>
                <form id="killsheet-2" enctype="multipart/form-data" class="wizard-step d-none">
                    <!-- Page 1 -->
    <div class="container">
        <div class="header">
            <div class="header-left">
                <div class="title">International Well Control Forum</div>
                <div class="subtitle">HOJA DE MATAR PARA EL CONTROL DE POZO DESVIADO</div>
                <div class="subtitle">BOP DE SUPERFICIE (UNIDADES API)</div>
            </div>
            <div class="header-right">
                <div class="form-row">
                    <div class="form-label" style="padding-left: 10px;">FECHA:</div>
                    <div class="form-input"><input type="text"></div>
                </div>
                <div class="form-row">
                    <div class="form-label" style="padding-left: 10px;">NOMBRE:</div>
                    <div class="form-input"><input type="text"></div>
                </div>
            </div>
        </div>

        <div class="main-content">
            <div class="left-section">
                <div class="section-title-iwcf-d">Datos de resistencia de la formación:</div>
                <div class="form-row">
                    <div class="form-label">Presión de fuga (leak-off) en la superficie obtenida con la prueba de resistencia de la formación</div>
                    <div class="form-input">(A) <input type="text"></div>
                    <div class="form-unit">psi</div>
                </div>
                <div class="form-row">
                    <div class="form-label">Densidad del lodo durante la prueba</div>
                    <div class="form-input">(B) <input type="text"></div>
                    <div class="form-unit">ppg</div>
                </div>
                <div class="form-row">
                    <div class="form-label">Máxima densidad del lodo permitida = (A) ÷ </div>
                    <div class="form-input">(C) <input type="text"></div>
                    <div class="form-unit">ppg</div>
                </div>
                <div class="form-row">
                    <div class="form-label">TVD de la zapata de la TR x 0.052</div>
                </div>
                <div class="form-row">
                    <div class="form-label">MAASP inicial (Presión anular máxima permitida en la superficie)</div>
                </div>
                <div class="form-row">
                    <div class="form-label">(KD) - Densidad del lodo actual</div>
                    <div class="form-label">x</div>
                    <div class="form-label">TVD de la zapata</div>
                    <div class="form-label">x 0.052 =</div>
                    <div class="form-input"><input type="text"></div>
                    <div class="form-unit">psi</div>
                </div>

                <div class="capacity-container">
                    <div class="capacity-box">
                        <div>Capacidad de la bomba No.1</div>
                        <div>bbls/stroke</div>
                    </div>
                    <div class="capacity-box">
                        <div>Capacidad de la bomba No. 2</div>
                        <div>bbls/stroke</div>
                    </div>
                </div>

                <div class="box">
                    <div class="section-title-iwcf-d" style="text-align: center;">(PL) Caída de presión dinámica</div>
                    <table class="table">
                        <tr>
                            <th>Tasa reducida de la bomba</th>
                            <th>Bomba No. 1</th>
                            <th>Bomba No. 2</th>
                        </tr>
                        <tr>
                            <td>SPM</td>
                            <td><input type="text"></td>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <td>SPM</td>
                            <td><input type="text"></td>
                            <td><input type="text"></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="right-section">
                <div class="box">
                    <div class="section-title-iwcf-d">Densidad del lodo</div>
                    <div class="form-row">
                        <div class="form-label">Densidad:</div>
                        <div class="form-input"><input type="text"></div>
                        <div class="form-unit">ppg</div>
                    </div>
                    <div class="form-row">
                        <div class="form-label">Gradiente:</div>
                        <div class="form-input"><input type="text"></div>
                        <div class="form-unit">psi/pies</div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
                    </div>
                </div>

                <div class="box">
                    <div class="section-title-iwcf-d">Datos de la desviación</div>
                    <div class="form-row">
                        <div class="form-label">Profundidad medida del KOP</div>
                        <div class="form-input"><input type="text"></div>
                        <div class="form-unit">pies</div>
                    </div>
                    <div class="form-row">
                        <div class="form-label">TVD del KOP</div>
                        <div class="form-input"><input type="text"></div>
                        <div class="form-unit">pies</div>
                    </div>
                    <div class="form-row">
                        <div class="form-label">Profundidad medida del EOB</div>
                        <div class="form-input"><input type="text"></div>
                        <div class="form-unit">pies</div>
                    </div>
                    <div class="form-row">
                        <div class="form-label">TVD del EOB</div>
                        <div class="form-input"><input type="text"></div>
                        <div class="form-unit">pies</div>
                    </div>
                </div>

                <div class="box">
                    <div class="section-title-iwcf-d">Datos de la TR de la zapata</div>
                    <div class="form-row">
                        <div class="form-label">Tamaño</div>
                        <div class="form-input"><input type="text"></div>
                        <div class="form-unit">pulg</div>
                    </div>
                    <div class="form-row">
                        <div class="form-label">Profundidad medida</div>
                        <div class="form-input"><input type="text"></div>
                        <div class="form-unit">pies</div>
                    </div>
                    <div class="form-row">
                        <div class="form-label">TVD</div>
                        <div class="form-input"><input type="text"></div>
                        <div class="form-unit">pies</div>
                    </div>
                </div>

                <div class="box">
                    <div class="section-title-iwcf-d">Datos del agujero</div>
                    <div class="form-row">
                        <div class="form-label">Tamaño</div>
                        <div class="form-input"><input type="text"></div>
                        <div class="form-unit">pulg</div>
                    </div>
                    <div class="form-row">
                        <div class="form-label">Profundidad medida</div>
                        <div class="form-input"><input type="text"></div>
                        <div class="form-unit">pies</div>
                    </div>
                    <div class="form-row">
                        <div class="form-label">TVD</div>
                        <div class="form-input"><input type="text"></div>
                        <div class="form-unit">pies</div>
                    </div>
                </div>

                <div class="right-diagram">
                    <img src="/api/placeholder/180/300" alt="Diagrama de pozo desviado">
                </div>
            </div>
        </div>

        <div style="margin-top: 10px;">
            <table class="table">
                <tr style="background-color: #f0f0f0;">
                    <th>Datos pre-registrados de los volúmenes</th>
                    <th>LONGITUD (pies)</th>
                    <th>CAPACIDAD (bbls/pie)</th>
                    <th>VOLUMEN (bbls)</th>
                    <th>Estroques de la bomba (Strokes)</th>
                    <th>Tiempo (min)</th>
                </tr>
                <tr>
                    <td>TP - De superficie a KOP</td>
                    <td><input type="text"></td>
                    <td>x</td>
                    <td>=</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <td>TP - De KOP a EOB</td>
                    <td><input type="text"></td>
                    <td>x</td>
                    <td>=</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <td>TP - De EOB a BHA</td>
                    <td><input type="text"></td>
                    <td>x</td>
                    <td>=</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <td>TP Estresada - (HWDP)</td>
                    <td><input type="text"></td>
                    <td>x</td>
                    <td>=</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <td>Drill Collar (Lastrabarrenas)</td>
                    <td><input type="text"></td>
                    <td>x</td>
                    <td>=</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
                <tr style="background-color: #f0f0f0;">
                    <td>Volumen de la sarta de perforación</td>
                    <td colspan="2"></td>
                    <td>(D) <input type="text" style="width: 70%;"></td>
                    <td><input type="text"></td>
                    <td>min</td>
                </tr>
                <tr>
                    <td>Lastrabarrenas x agujero abierto</td>
                    <td><input type="text"></td>
                    <td>x</td>
                    <td>=</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <td>TP/ HWDP x agujero abierto</td>
                    <td><input type="text"></td>
                    <td>x</td>
                    <td>=</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
                <tr style="background-color: #f0f0f0;">
                    <td>Volumen del agujero abierto</td>
                    <td colspan="2"></td>
                    <td>(F) <input type="text" style="width: 70%;"></td>
                    <td><input type="text"></td>
                    <td>min</td>
                </tr>
                <tr>
                    <td>TP x Tubería de Revestimiento</td>
                    <td><input type="text"></td>
                    <td>x</td>
                    <td>=(G) <input type="text" style="width: 50%;"></td>
                    <td><input type="text"></td>
                    <td>min</td>
                </tr>
                <tr style="background-color: #f0f0f0;">
                    <td>Volumen total del anular</td>
                    <td colspan="2"></td>
                    <td>(F+G) = (H) <input type="text" style="width: 50%;"></td>
                    <td><input type="text"></td>
                    <td>min</td>
                </tr>
                <tr style="background-color: #f0f0f0;">
                    <td>Volumen total del sistema</td>
                    <td colspan="2"></td>
                    <td>(D+H) = (I) <input type="text" style="width: 50%;"></td>
                    <td><input type="text"></td>
                    <td>min</td>
                </tr>
                <tr style="background-color: #f0f0f0;">
                    <td>Volumen activo en la superficie</td>
                    <td colspan="2"></td>
                    <td>(J) <input type="text" style="width: 70%;"></td>
                    <td><input type="text"></td>
                    <td>min</td>
                </tr>
                <tr style="background-color: #f0f0f0;">
                    <td>Sistema de fluido activo total</td>
                    <td colspan="2"></td>
                    <td>(I+J) <input type="text" style="width: 70%;"></td>
                    <td><input type="text"></td>
                    <td>min</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Page 2 -->
    <div class="kill-sheet">
        <!-- Header Section -->
        <div class="header">
            <div class="header-left">
                <div class="title">International Well Control Forum</div>
                <div class="subtitle">HOJA DE MATAR PARA EL CONTROL DE POZO DESVIADO</div>
                <div class="subtitle">EOP DE SUPERFICIE (UNIDADES API)</div>
            </div>
            <div class="header-right">
                <div class="fecha-label">FECHA:</div>
                <div class="nombre-label">NOMBRE:</div>
            </div>
        </div>
        
        <!-- Datos del influje -->
        <div class="form-row">
            <div class="form-label">Datos del influjo</div>
            <div class="form-content">
                <div class="input-group">
                    <span>PCTP</span>
                    <div class="input-field"></div>
                    <span>psi</span>
                    <span class="operator">-</span>
                    <span>PCTP</span>
                    <div class="input-field"></div>
                    <span>psi</span>
                    <span class="operator">=</span>
                    <span>Ganancia en</span>
                    <div class="input-field"></div>
                    <span class="unit">bbls</span>
                </div>
            </div>
        </div>
        
        <!-- Densidad del lodo para matar el pozo -->
        <div class="form-row">
            <div class="form-label">Densidad del lodo para matar el pozo (MMW)</div>
            <div class="form-content">
                <div class="small-title">Densidad del lodo actual</div>
                <div class="form-equation">
                    <div class="input-field"></div>
                    <span class="operator">+</span>
                    <span>PCTP</span>
                    <div class="input-field"></div>
                    <span>÷</span>
                    <span>0.052</span>
                    <span class="operator">=</span>
                    <div class="input-field"></div>
                    <span class="unit">ppg</span>
                </div>
            </div>
        </div>
        
        <!-- Presión inicial de circulación -->
        <div class="form-row">
            <div class="form-label">Presión inicial de circulación (PIC)</div>
            <div class="form-content">
                <div class="small-title">Caída de presión dinámica</div>
                <div class="form-equation">
                    <div class="input-field"></div>
                    <span class="operator">+</span>
                    <span>PCTP</span>
                    <div class="input-field"></div>
                    <span class="operator">=</span>
                    <div class="input-field"></div>
                    <span class="unit">psi</span>
                </div>
            </div>
        </div>
        
        <!-- Presión final de circulación -->
        <div class="form-row">
            <div class="form-label">Presión final de circulación (PFC)</div>
            <div class="form-content">
                <div class="small-title">Densidad del lodo para matar el pozo (MMW)</div>
                <div class="form-equation">
                    <div class="input-field"></div>
                    <span class="operator">×</span>
                    <div class="small-title">Caída de presión dinámica</div>
                    <div class="input-field"></div>
                    <span class="operator">=</span>
                    <div class="input-field"></div>
                    <span class="unit">psi</span>
                </div>
            </div>
        </div>
        
        <!-- Caída de presión dinámica en el KOP -->
        <div class="form-row">
            <div class="form-label">Caída de presión dinámica en el KOP (Q)</div>
            <div class="form-content">
                <div class="advanced-equation">
                    <span>PL</span>
                    <span class="operator">×</span>
                    <span class="bracket">[</span>
                    <span>(PFC - PL)</span>
                    <span class="operator">×</span>
                    <span>Profundidad medida del KOP</span>
                    <div class="input-field"></div>
                    <span class="bracket">]</span>
                    <span class="operator">=</span>
                    <div class="input-field"></div>
                    <span class="operator">×</span>
                    <span class="bracket">[</span>
                    <span>(</span>
                    <div class="input-field"></div>
                    <span class="operator">-</span>
                    <div class="input-field"></div>
                    <span>)</span>
                    <span class="operator">×</span>
                    <div class="input-field"></div>
                    <span class="bracket">]</span>
                    <span class="operator">=</span>
                    <div class="input-field"></div>
                    <span class="unit">psi</span>
                </div>
                
                <div class="advanced-equation">
                    <span>PCTP</span>
                    <span class="operator">-</span>
                    <span class="bracket">[</span>
                    <span>((MMW - Dens. Lodo actual) × 0.052 × KOP TVD)</span>
                    <span class="bracket">]</span>
                    <span class="operator">=</span>
                    <div class="input-field"></div>
                    <span class="operator">-</span>
                    <span class="bracket">[</span>
                    <span>(</span>
                    <div class="input-field"></div>
                    <span class="operator">-</span>
                    <div class="input-field"></div>
                    <span>) × 0.052 ×</span>
                    <div class="input-field"></div>
                    <span class="bracket">]</span>
                    <span class="operator">=</span>
                    <div class="input-field"></div>
                    <span class="unit">psi</span>
                </div>
            </div>
        </div>
        
        <!-- Presión de circulación en el KOP -->
        <div class="parameter-row">
            <div class="form-label">Presión de circulación en el KOP (KOP CP)</div>
            <div class="form-content">
                <div class="form-equation">
                    <span>(Q)</span>
                    <div class="input-field"></div>
                    <span class="operator">+</span>
                    <span>(P)</span>
                    <div class="input-field"></div>
                    <span class="operator">=</span>
                    <div class="input-field"></div>
                    <span class="unit">psi</span>
                </div>
            </div>
        </div>
        
        <!-- Caída de presión dinámica en el EOB -->
        <div class="form-row">
            <div class="form-label">Caída de presión dinámica en el EOB (R)</div>
            <div class="form-content">
                <div class="advanced-equation">
                    <span>PL</span>
                    <span class="operator">×</span>
                    <span class="bracket">[</span>
                    <span>(PFC - PL)</span>
                    <span class="operator">×</span>
                    <span>Profundidad medida del EOB</span>
                    <div class="input-field"></div>
                    <span class="bracket">]</span>
                    <span class="operator">=</span>
                    <div class="input-field"></div>
                    <span class="operator">×</span>
                    <span class="bracket">[</span>
                    <span>(</span>
                    <div class="input-field"></div>
                    <span class="operator">-</span>
                    <div class="input-field"></div>
                    <span>)</span>
                    <span class="operator">×</span>
                    <div class="input-field"></div>
                    <span class="bracket">]</span>
                    <span class="operator">=</span>
                    <div class="input-field"></div>
                    <span class="unit">psi</span>
                </div>
                
                <div class="advanced-equation">
                    <span>PCTP</span>
                    <span class="operator">-</span>
                    <span class="bracket">[</span>
                    <span>((MMW - Dens. Lodo actual) × 0.052 × EOB TVD)</span>
                    <span class="bracket">]</span>
                    <span class="operator">=</span>
                    <div class="input-field"></div>
                    <span class="operator">-</span>
                    <span class="bracket">[</span>
                    <span>(</span>
                    <div class="input-field"></div>
                    <span class="operator">-</span>
                    <div class="input-field"></div>
                    <span>) × 0.052 ×</span>
                    <div class="input-field"></div>
                    <span class="bracket">]</span>
                    <span class="operator">=</span>
                    <div class="input-field"></div>
                    <span class="unit">psi</span>
                </div>
            </div>
        </div>
        
        <!-- Presión de circulación en el EOB -->
        <div class="parameter-row">
            <div class="form-label">Presión de circulación en el EOB (EOB CP)</div>
            <div class="form-content">
                <div class="form-equation">
                    <span>(R)</span>
                    <div class="input-field"></div>
                    <span class="operator">+</span>
                    <span>(S)</span>
                    <div class="input-field"></div>
                    <span class="operator">=</span>
                    <div class="input-field"></div>
                    <span class="unit">psi</span>
                </div>
            </div>
        </div>
        
        <!-- Final calculations -->
        <div class="form-row">
            <div class="form-content" style="width: 100%; border-right: none;">
                <div class="calculation-row">
                    <div class="calculation-group">
                        <span>(T) = PIC - KOP CP</span>
                        <span class="operator">=</span>
                        <div class="input-field"></div>
                        <span class="operator">-</span>
                        <div class="input-field"></div>
                        <span class="operator">=</span>
                        <div class="input-field"></div>
                        <span class="unit">psi</span>
                    </div>
                    <div class="calculation-group">
                        <span>(T) × 100 / (L)</span>
                        <span class="operator">=</span>
                        <div class="input-field"></div>
                        <span class="operator">×</span>
                        <span>100</span>
                        <span class="operator">=</span>
                        <div class="input-field"></div>
                        <span class="unit">psi por 100 emboladas</span>
                    </div>
                </div>
                
                <div class="calculation-row">
                    <div class="calculation-group">
                        <span>(U) = KOP CP - EOB CP</span>
                        <span class="operator">=</span>
                        <div class="input-field"></div>
                        <span class="operator">-</span>
                        <div class="input-field"></div>
                        <span class="operator">=</span>
                        <div class="input-field"></div>
                        <span class="unit">psi</span>
                    </div>
                    <div class="calculation-group">
                        <span>(U) × 100 / (M)</span>
                        <span class="operator">=</span>
                        <div class="input-field"></div>
                        <span class="operator">×</span>
                        <span>100</span>
                        <span class="operator">=</span>
                        <div class="input-field"></div>
                        <span class="unit">psi por 100 emboladas</span>
                    </div>
                </div>
                
                <div class="calculation-row">
                    <div class="calculation-group">
                        <span>(W) = EOB CP - PFC</span>
                        <span class="operator">=</span>
                        <div class="input-field"></div>
                        <span class="operator">-</span>
                        <div class="input-field"></div>
                        <span class="operator">=</span>
                        <div class="input-field"></div>
                        <span class="unit">psi</span>
                    </div>
                    <div class="calculation-group">
                        <span>(W) × 100 / (N+Z+P+S)</span>
                        <span class="operator">=</span>
                        <div class="input-field"></div>
                        <span class="operator">×</span>
                        <span>100</span>
                        <span class="operator">=</span>
                        <div class="input-field"></div>
                        <span class="unit">psi por 100 emboladas</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="iwcf-v-sol-btn">Continuar</button>
                </form>
                <form id="killsheet-3" enctype="multipart/form-data" class="wizard-step d-none">
                     <style>
                     
                        
                        .container-iadc-v {
                            display: flex;
                            max-width: 1200px;
                            border: 2px solid #000;
                            margin: 0 auto 20px auto;
                        }
                        
                        .well-diagram-iadc-v {
                            width: 230px;
                            min-height: 850px;
                            background-color: #f0f0f0;
                            border-right: 2px solid #000;
                            position: relative;
                        }
                        
                        .calculation-form {
                            flex: 1;
                            padding: 10px;
                        }
                        
                        .header {
                            display: flex;
                            justify-content: space-between;
                            border-bottom: 1px solid #000;
                            padding-bottom: 10px;
                            margin-bottom: 10px;
                        }
                        
                        .section {
                            margin-bottom: 20px;
                        }
                        
                        .section-title-iadc-v {
                            text-align: center;
                            color: blue;
                            border: 1px solid blue;
                            border-radius: 20px;
                            padding: 5px;
                            width: 80%;
                            margin: 15px auto;
                        }
                        
                        .calc-row {
                            display: flex;
                            align-items: center;
                            margin-bottom: 10px;
                        }
                        
                        .label {
                            width: 150px;
                            font-size: 12px;
                            text-align: center;
                            border: 1px solid #000;
                            padding: 5px;
                        }
                        
                        .formula {
                            flex: 1;
                            display: flex;
                            align-items: center;
                        }
                        
                        input {
                            width: 80px;
                            text-align: center;
                            margin: 0 5px;
                        }
                        
                        .total-box {
                            border: 1px solid #000;
                            padding: 10px;
                            margin: 10px auto;
                            width: 80%;
                            text-align: center;
                        }
                        
                        .right-column {
                            padding: 10px;
                            border-left: 1px solid #000;
                        }
                        
                        .blue-text {
                            color: blue;
                        }
                        
                        /* Styles for kill sheet */
                        .kill-sheet-iadc-v {
                            display: flex;
                            max-width: 1200px;
                            border: 2px solid #000;
                            margin: 20px auto;
                        }
                        
                        .left-column, .right-column {
                            flex: 1;
                            padding: 10px;
                        }
                        
                        .info-table {
                            width: 100%;
                            border-collapse: collapse;
                            margin-bottom: 15px;
                        }
                        
                        .info-table td, .info-table th {
                            border: 1px solid #888;
                            padding: 5px;
                            text-align: left;
                        }
                        
                        .info-table th {
                            background-color: #f0f0f0;
                        }
                        
                        .formula-row {
                            margin: 15px 0;
                            padding-bottom: 10px;
                            border-bottom: 1px solid #ddd;
                        }
                        
                        .title {
                            color: blue;
                            font-weight: bold;
                            margin-bottom: 10px;
                        }
                        
                        .formula-content {
                            display: flex;
                            align-items: center;
                            flex-wrap: wrap;
                            gap: 5px;
                        }
                        
                        .grid-table {
                            width: 100%;
                            border-collapse: collapse;
                            margin: 15px 0;
                        }
                        
                        .grid-table td, .grid-table th {
                            border: 1px solid #888;
                            padding: 5px;
                            text-align: center;
                        }
                        
                        .instruction {
                            font-size: 0.85em;
                            margin: 10px 0;
                        }
                        
                        .small-input {
                            width: 40px;
                        }
                        
                        .medium-input {
                            width: 60px;
                        }
                        
                        .large-input {
                            width: 120px;
                        }
                        
                        .underline {
                            text-decoration: underline;
                        }

                        .pozo-data-card {
                        border-radius: 8px;
                        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                        margin: 20px;
                        background-color: #ffffff;
                        /* min-width: 500px; */
                        }
                        
                        .card-header {
                        background-color: #f8f9fa;
                        padding: 15px;
                        border-bottom: 1px solid #eaeaea;
                        border-radius: 8px 8px 0 0;
                        }
                        
                        .card-title {
                        margin: 0;
                        font-size: 18px;
                        color: #333;
                        }
                        
                        .card-body {
                        padding: 20px;
                        }
                        
                        .card-footer {
                        padding: 15px;
                        background-color: #f8f9fa;
                        border-top: 1px solid #eaeaea;
                        border-radius: 0 0 8px 8px;
                        display: flex;
                        justify-content: flex-end;
                        gap: 10px;
                        }
                        
                        /* Estilos para los inputs */
                        .form-group {
                        margin-bottom: 15px;
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                        }
                        
                        .form-group label {
                        flex-basis: 40%;
                        font-weight: 500;
                        color: #555;
                        }
                        
                        input {
                        width: 60%;
                        text-align: center;
                        margin: 0 5px;
                        border: none;
                        min-width: 40px;
                        border-bottom: 1px solid #ccc;
                        padding: 5px 0;
                        outline: none;
                        background-color: transparent;
                        transition: border-color 0.3s;
                        }
                        
                        .underline-input:focus {
                        border-bottom: 2px solid #007bff;
                        }
                        
                        /* Estilos para botones */
                        .btn {
                        padding: 8px 15px;
                        border: none;
                        border-radius: 4px;
                        cursor: pointer;
                        font-weight: 500;
                        }
                        
                        .btn-primary {
                        background-color: #007bff;
                        color: white;
                        }
                        
                        .btn-secondary {
                        background-color: #6c757d;
                        color: white;
                        }
                        
                        .btn:hover {
                        opacity: 0.9;
                        }

                        .container-centered {
                        display: flex;
                        justify-content: center;
                        min-height: 50vh;
                        padding: 20px;
                        }
                    </style>
                <div class="container-iadc-v">
                    <!-- Left section: Well diagram (would be an image) -->
                    <div class="well-diagram-iadc-v">
                    <img src="/assets/images/killsheets/pozoiadc.png" alt="Well Diagram" style="width: 100%; height: 100%;">
                    </div>      
                    
                    <!-- Middle section: Calculations -->
                    <div class="calculation-form">
                    <div class="header">
                        <div></div>
                        <div class="section-title-iadc-v">Volumen de la sarta de perforación</div>
                        <div></div>
                    </div>
                    
                    <!-- Drilling String Volume Section -->
                    <div class="section">
                        <div class="calc-row">
                        <div class="label">Tubería de perforación (DP)</div>
                        <div class="formula">
                            <span>Capacidad</span>
                            <input type="text"> BBL/PIE x
                            <span>Longitud</span>
                            <input type="text"> PIES = 
                            <input type="text"> BBL
                        </div>
                        </div>
                        
                        <div class="calc-row">
                        <div class="label">Tubería pesada (HWDP)</div>
                        <div class="formula">
                            <span>Capacidad</span>
                            <input type="text">      BBL/PIE x
                            <span>Longitud</span>
                            <input type="text">      PIES = 
                            <input type="text">      BBL
                        </div>
                        </div>
                        
                        <div class="calc-row">
                        <div class="label">Collares de perforación (DC)</div>
                        <div class="formula">
                            <span>Capacidad</span>
                            <input type="text"> BBL/PIE x
                            <span>Longitud</span>
                            <input type="text"> PIES = 
                            <input type="text"> BBL
                        </div>
                        </div>
                    </div>
                    
                    <div class="total-box">
                        <div class="blue-text">Volumen total de la sarta de perforación = <input type="text"> BBL</div>
                    </div>
                    
                    <!-- Annular Space Volume Section -->
                    <div class="section-title-iadc-v">Volumen del espacio anular</div>
                    
                    <div class="section">
                        <div class="calc-row">
                        <div class="label">Tubería de perforación en agujero revestido</div>
                        <div class="formula">
                            <span>Capacidad Anular</span>
                            <input type="text"> BBL/PIE x
                            <span>Longitud</span>
                            <input type="text"> PIES = 
                            <input type="text"> BBL
                        </div>
                        </div>
                        
                        <div class="calc-row">
                        <div class="label">Tubería de perforación en agujero abierto</div>
                        <div class="formula">
                            <span>Capacidad Anular</span>
                            <input type="text"> BBL/PIE x
                            <span>Longitud</span>
                            <input type="text"> PIES = 
                            <input type="text"> BBL
                        </div>
                        </div>
                        
                        <div class="calc-row">
                        <div class="label">HWDP en agujero abierto</div>
                        <div class="formula">
                            <span>Capacidad Anular</span>
                            <input type="text"> BBL/PIE x
                            <span>Longitud</span>
                            <input type="text"> PIES = 
                            <input type="text"> BBL
                        </div>
                        </div>
                        
                        <div class="calc-row">
                        <div class="label">Collares de perforación en agujero abierto (DC)</div>
                        <div class="formula">
                            <span>Capacidad Anular</span>
                            <input type="text"> BBL/PIE x
                            <span>Longitud</span>
                            <input type="text"> PIES = 
                            <input type="text"> BBL
                        </div>
                        </div>
                    </div>
                    
                    <div class="total-box">
                        <div class="blue-text">Volumen total de agujero abierto = <input type="text"> BBL</div>
                    </div>
                    
                    <div class="total-box">
                        <div class="blue-text">Volumen total del espacio anular = <input type="text"> BBL</div>
                    </div>
                    </div>
                    
                    <!-- Right section: Pump output and circulation -->
                    <div class="right-column">
                        <div class="header">
                            <div></div>
                            <div>
                            <img src="/assets/images/killsheets/logosmithmason.png" alt="Smith Mason & Co Logo" style="float:right">
                            <span>Hoja de matar - Superficie</span>
                            </div>
                        </div>
                        
                        <div style="text-align: center; margin: 20px 0;">
                            <span>Salida de la bomba = </span>
                            <input type="text"> BBL/EMB
                        </div>
                        
                        <div class="section-title-iadc-v">Emboladas de circulación</div>
                        
                        <div class="section">
                            <div class="blue-text">Emboladas hasta la barrena (STB)</div>
                            <div style="margin: 10px 0;">
                            <input type="text" style="width: 40px"> Volumen sarta perf. BBL + 
                            <input type="text" style="width: 40px"> Salida de la bomba BBL/EMB = 
                            <input type="text" style="width: 40px"> EMB
                            </div>
                            
                            <div class="blue-text">Emboladas desde la barren hasta la zapata del revestimiento</div>
                            <div style="margin: 10px 0;">
                            <input type="text" style="width: 40px"> Vol. agujero abierto BBL + 
                            <input type="text" style="width: 40px"> Salida de la bomba BBL/EMB = 
                            <input type="text" style="width: 40px"> EMB
                            </div>
                            
                            <div class="blue-text">Emboladas de fondo a superficie</div>
                            <div style="margin: 10px 0;">
                            <input type="text" style="width: 40px"> Vol. espacio anular BBL + 
                            <input type="text" style="width: 40px"> Salida de la bomba BBL/EMB = 
                            <input type="text" style="width: 40px"> EMB
                            </div>
                            
                            <div class="blue-text">Circulación total del pozo</div>
                            <div style="margin: 10px 0;">
                            <input type="text" style="width: 40px"> Emb. hasta la barrena + 
                            <input type="text" style="width: 40px"> Emb. fondo a superficie = 
                            <input type="text" style="width: 40px"> EMB
                            </div>
                            
                            <div class="blue-text">Emboladas línea de superficie (Método de Esperar y Pesar)</div>
                            <div style="margin: 10px 0;">
                            <input type="text" style="width: 40px"> Vol. línea de superf. BBL + 
                            <input type="text" style="width: 40px"> Salida de la bomba BBL/EMB = 
                            <input type="text" style="width: 40px"> EMB
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Second form: Kill Sheet -->
                <div class="kill-sheet-iadc-v">
                    <!-- Left column -->
                    <div class="left-column">
                        <div class="header">
                            <div style="color: blue;">Información del influjo</div>
                            <div style="display: flex; align-items: center;">
                            <h2>Hoja de matar - Superficie</h2>
                            <div>www.smithmasonco.com</div>
                            </div>
                        </div>

                        <!-- Influx Info Table -->
                        <table class="info-table">
                            <tr>
                            <td>Presión de cierre en la tubería de perforación (SIDPP)</td>
                            <td><input type="text"> PSI</td>
                            </tr>
                            <tr>
                            <td>Presión de cierre en el revestimiento (SICP)</td>
                            <td><input type="text"> PSI</td>
                            </tr>
                            <tr>
                            <td>Ganancia en tanques</td>
                            <td><input type="text"> BBL</td>
                            </tr>
                            <tr>
                            <td>Densidad del lodo original (OMW)</td>
                            <td><input type="text"> PPG</td>
                            </tr>
                            <tr>
                            <td>Presión reducida de la bomba (SCRP)</td>
                            <td><input type="text"> PSI</td>
                            </tr>
                        </table>

                        <!-- KMW Calculation -->
                        <div class="formula-row">
                            <div class="title">Densidad del lodo para matar (KMW) (Redondear el primer decimal hacia arriba)</div>
                            <div class="formula-content">
                            (SIDPP <input type="text" class="small-input"> PSI ÷ 0.052÷TVD del pozo <input type="text" class="small-input"> PIES)+Dens. del lodo actual <input type="text" class="small-input"> PPG=KMW <input type="text" class="small-input"> PPG
                            </div>
                        </div>

                        <!-- MAMW Calculation -->
                        <div class="formula-row">
                            <div class="title">Máxima densidad del lodo permitida (MAMW) (Redondear el primer decimal hacia abajo)</div>
                            <div class="formula-content">
                            Presión "Leak-off" en superficie <input type="text" class="small-input"> PSI÷0.052÷TVD zapata <input type="text" class="small-input"> PIES)+Dens. lodo durante la prueba <input type="text" class="small-input"> PPG
                            </div>
                            <div class="formula-content" style="margin-top: 5px; margin-left: 30px;">
                            =MAMW <input type="text" class="small-input"> PPG
                            </div>
                            <div class="formula-content" style="margin-top: 10px;">
                            O
                            </div>
                            <div class="formula-content" style="margin-top: 10px;">
                            Gradiente de fractura <input type="text" class="small-input"> PSI/FT÷0.052=MAMW <input type="text" class="small-input"> PPG
                            </div>
                        </div>

                        <!-- MAASP Calculation 1 -->
                        <div class="formula-row">
                            <div class="title">Presión anular máxima permitida en la superficie (MAASP) <span class="underline">ANTES</span> del influjo</div>
                            <div class="formula-content">
                            (MAMW <input type="text" class="small-input"> PPG - Dens. lodo actual <input type="text" class="small-input"> PPG )× 0.052 × TVD zapata <input type="text" class="small-input"> PIES = MAASP <input type="text" class="small-input"> PSI
                            </div>
                        </div>

                        <!-- MAASP Calculation 2 -->
                        <div class="formula-row">
                            <div class="title">MAASP <span class="underline">DESPUÉS</span> de que el pozo está muerto</div>
                            <div class="formula-content">
                            (MAMW <input type="text" class="small-input"> PPG – Dens. lodo para matar(KMW) <input type="text" class="small-input"> PPG )× 0.052 × TVD zapata <input type="text" class="small-input"> PIES = MAASP <input type="text" class="small-input"> PSI
                            </div>
                        </div>

                        <!-- Circulation Pressures -->
                        <div class="formula-row">
                            <div class="title" style="text-align: center;">Presiones de circulación</div>
                            
                            <!-- ICP Calculation -->
                            <div style="margin: 15px 0;">
                            <div class="title">Presión inicial de circulación (ICP)</div>
                            <div class="formula-content">
                                SIDPP <input type="text" class="small-input"> PSI + Presión reducida de la bomba (SCRP) <input type="text" class="small-input"> PSI = ICP <input type="text" class="small-input"> PSI
                            </div>
                            </div>
                            
                            <!-- FCP Calculation -->
                            <div style="margin: 15px 0;">
                            <div class="title">Presión final de circulación (FCP)</div>
                            <div class="formula-content">
                                Presión reducida bomba (SCRP) <input type="text" class="small-input"> PSI × (
                                <div style="display: inline-block; text-align: center;">
                                <div style="border-top: 1px solid black; border-bottom: 1px solid black; padding: 2px 5px;">
                                    Dens. lodo para matar (KMW) <input type="text" class="small-input"> PPG
                                    <hr style="margin: 2px 0;">
                                    Dens. lodo original (OMW) <input type="text" class="small-input"> PPG
                                </div>
                                </div>
                                ) = FCP <input type="text" class="small-input"> PSI
                            </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right column -->
                    <div class="right-column">
                    <div class="header">
                        <div style="flex: 1;"></div>
                        <div>
                        <img src="/assets/images/killsheets/logosmithmason.png" alt="Smith Mason & Co Logo" style="float: right;">
                        </div>
                    </div>

                    <div style="display: flex; margin-top: 10px;">
                        <div style="flex: 1; text-align: center; color: blue;">
                        Información calculada
                        </div>
                        <div style="flex: 1; text-align: center; color: blue;">
                        Programa de presión de la tubería de perforación
                        </div>
                    </div>

                    <!-- Basic Info Table -->
                    <div style="display: flex; margin-top: 10px;">
                        <div style="flex: 1;">
                        <table class="info-table">
                            <tr>
                            <td>Densidad del lodo para matar (KWM)</td>
                            <td><input type="text"></td>
                            </tr>
                            <tr>
                            <td>Presión inicial de circulación (ICP)</td>
                            <td><input type="text"></td>
                            </tr>
                            <tr>
                            <td>Presión final de circulación (FCP)</td>
                            <td><input type="text"></td>
                            </tr>
                        </table>
                        <table class="info-table">
                            <tr>
                            <td>Emboladas de superficie hasta la barrena (STB)</td>
                            <td><input type="text"></td>
                            </tr>
                            <tr>
                            <td>Emboladas desde la barrena hasta la zapata del revestimiento</td>
                            <td><input type="text"></td>
                            </tr>
                            <tr>
                            <td>Emboladas fondo a superficie</td>
                            <td><input type="text"></td>
                            </tr>
                            <tr>
                            <td>Emboladas totales de circulación</td>
                            <td><input type="text"></td>
                            </tr>
                        </table>
                        </div>
                        <div style="flex: 1;">
                        <table class="grid-table">
                            <tr>
                            <th>Emboladas o volumen</th>
                            <th>Presión de la tubería de perforación calculada</th>
                            <th>Presión de la tubería de perforación actual</th>
                            </tr>
                            <tr>
                            <td>0</td>
                            <td>ICP</td>
                            <td></td>
                            </tr>
                            <tr>
                            <td><input type="text"></td>
                            <td><input type="text"></td>
                            <td><input type="text"></td>
                            </tr>
                            <tr>
                            <td><input type="text"></td>
                            <td><input type="text"></td>
                            <td><input type="text"></td>
                            </tr>
                            <tr>
                            <td><input type="text"></td>
                            <td><input type="text"></td>
                            <td><input type="text"></td>
                            </tr>
                            <tr>
                            <td><input type="text"></td>
                            <td><input type="text"></td>
                            <td><input type="text"></td>
                            </tr>
                            <tr>
                            <td><input type="text"></td>
                            <td><input type="text"></td>
                            <td><input type="text"></td>
                            </tr>
                        </table>
                        </div>
                    </div>

                    <!-- Program Preparation -->
                    <div class="formula-row">
                        <div class="title" style="text-align: center;">Preparación del programa de presión de la tubería de perforación</div>
                        
                        <div class="instruction">
                        <strong>Emboladas de la bomba</strong><br>
                        Anotar las emboladas desde superficie hasta la última celda (antes de llegar a STB), en la columna de emboladas o volumen del programa de presión de la tubería de perforación. Luego realice lo siguiente:
                        </div>
                        <div class="formula-content">
                        Emb. superf. a barrena ÷10 = Incremento prom. de emboladas (emb) <input type="text" class="medium-input">
                        </div>
                        
                        <div class="instruction">
                        Anotar el incremento promedio de emboladas (emb) en la celda por debajo de cero (0) en la columna de emboladas o volumen. Realice lo siguiente:
                        </div>
                        <div class="formula-content">
                        0 <input type="text" class="small-input"> + Incremento promedio de emboladas (emb) <input type="text" class="small-input">
                        </div>
                        
                        <div class="instruction">
                        Repita este proceso hasta completar la columna.
                        </div>
                    </div>

                    <!-- Drill Pipe Pressure -->
                    <div class="formula-row">
                        <div class="title">Presión de la tubería de perforación</div>
                        
                        <div class="instruction">
                        Anotar la presión inicial de circulación (ICP) y la presión final de circulación (FCP) calculada en los espacios indicados de presión de la tubería de perforación. Realice lo siguiente:
                        </div>
                        
                        <table class="grid-table" style="width: 50%;">
                        <tr>
                            <td></td>
                            <td>STB</td>
                            <td>FCP</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="text"></td>
                            <td><input type="text"></td>
                        </tr>
                        </table>
                        
                        <div class="formula-content" style="margin-top: 15px;">
                        Reducción de la presión por cada etapa = <div style="display: inline-block; text-align: center; border: 1px solid #000; padding: 0 5px;">
                            (ICP − FCP)
                            <hr style="margin: 2px 0;">
                            10
                        </div> = <input type="text" class="small-input">
                        </div>
                        
                        <div class="instruction">
                        Nota: si el programa de presión se basa en incrementos de 100 emboladas (emb), realice lo siguiente para calcular la reducción de presión:
                        </div>
                        
                        <div class="formula-content">
                        Reducción de la presión por cada 100 emb.= <div style="display: inline-block; text-align: center; border: 1px solid #000; padding: 0 5px;">
                            (ICP − FCP)×100
                            <hr style="margin: 2px 0;">
                            Emboladas de superficie a barrena
                        </div> = <input type="text" class="small-input">
                        </div>
                        
                        <div class="instruction">
                        Restar la reducción de presión promedio de la presión inicial de circulación (ICP) hasta llenar la celda por debajo de la (ICP). Repita este proceso hasta completar la columna.
                        </div>
                        
                        <div class="formula-content">
                        ICP<sub>PSI</sub> − Reducción promedio de presión en PSI <input type="text" class="small-input">
                        </div>
                    </div>
                    
                    <!-- Name and Date -->
                    <div style="display: flex; margin-top: 20px;">
                        <div style="flex: 1;">
                        <div>Nombre: <input type="text" class="large-input"></div>
                        <div style="margin-top: 10px;">Fecha: <input type="text" class="large-input"></div>
                        </div>
                        <div style="flex: 1; text-align: right;">
                        <div>Hoja de matar #: <input type="text" class="medium-input"></div>
                        </div>
                    </div>
                    </div>
                </div>

                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="iwcf-v-sol-btn">Continuar</button>
                </form>

                <!-- Paso 3 -->
                <form id="killsheet-data-3" enctype="multipart/form-data" class="wizard-step d-none">
                    <div id="questions-container">
                        <!-- preguntas dinámicas -->
                    </div>
                    <button type="button" class="btn btn-success" id="addQuestion">Agregar Pregunta</button>
                    <br><br>
                    <button type="button" class="btn btn-secondary prev-step" data-step="3">Atrás</button>
                    <button type="button" class="btn btn-primary" id="iwcf-v-question-btn">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script> 


function addItem(containerId, namePrefix) {
    const container = document.getElementById(containerId);
    const currentItems = container.querySelectorAll('.item-row').length;

    if (currentItems >= 5) {
        // Mensaje de límite con estilo Bootstrap
        const toast = document.createElement('div');
        toast.className = 'position-fixed top-0 start-50 translate-middle-x mt-3 alert alert-warning alert-dismissible fade show';
        toast.style.zIndex = '9999';
        toast.innerHTML = `
            <strong><i class="fas fa-exclamation-triangle me-2"></i>Límite alcanzado</strong>
            Máximo 5 elementos por sección.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        document.body.appendChild(toast);

        // Desaparece después de 3s
        setTimeout(() => {
            if (toast.parentNode) {
                toast.parentNode.removeChild(toast);
            }
        }, 3000);
        return;
    }

    // Nuevo item con botón de eliminar personalizado
    const newItem = document.createElement('div');
    newItem.className = 'item-row mb-2';
    newItem.innerHTML = `
        <div class="row g-1 align-items-center">
            <div class="col-7">
                <input type="text" class="form-control form-control-sm" placeholder="{{ __('Data') }}" name="${namePrefix}_item[]">
            </div>
            <div class="col-2">
                <input type="text"  class="form-control form-control-sm" placeholder="{{ __('Value') }}" name="${namePrefix}_value[]">
            </div>
            <div class="col-3 d-flex">
                <input type="text" class="form-control form-control-sm" placeholder="{{ __('Unit of measurement') }}" name="${namePrefix}_unit[]">
                <button type="button" class="btn-delete ms-1" onclick="removeItem(this)" title="{{ __('Eliminar') }}">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
        </div>
    `;

    container.appendChild(newItem);

    // Animación de entrada
    newItem.style.opacity = '0';
    newItem.style.transform = 'translateY(-8px)';

    setTimeout(() => {
        newItem.style.transition = 'all 0.3s ease';
        newItem.style.opacity = '1';
        newItem.style.transform = 'translateY(0)';
    }, 10);
}

$("#addQuestion").click(function () {
        let index = $("#questions-container .question-row").length;
        let html = `
          <div class="row mb-2 question-row">
            <div class="col-8">
              <input type="text" name="questions[${index}][QUESTION]" placeholder="Pregunta" class="form-control">
            </div>
            <div class="col-2">
              <input type="number" step="any" name="questions[${index}][ANSWER_MIN]" placeholder="Valor min de respuesta" class="form-control">
            </div>
            <div class="col-2">
              <input type="number" step="any" name="questions[${index}][ANSWER_MAX]" placeholder="Valor max de respuesta" class="form-control">
            </div>
          </div>
        `;
        $("#questions-container").append(html);
    });</script>
<!-- Modal 3 -->
<style>
    .opcion-item,
    .pregunta-adicional {
        position: relative;
    }

    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    /* Contenedor principal del SweetAlert */
    .killsheet-swal-container {
        font-family: 'Poppins', sans-serif !important;
    }

    /* Popup base del modal */
    .killsheet-swal-popup {
        border-radius: 20px !important;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15) !important;
        padding: 0 !important;
        overflow: hidden !important;
    }

    /* .killsheet-first-modal {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%) !important;
        color: white !important;
    } */

    .killsheet-second-modal {
        background: linear-gradient(135deg, #236192 0%, #236192 100%) !important;
        color: white !important;
    }

    /* Contenido principal del modal */
    .killsheet-modal-content {
        padding: 40px 30px;
        text-align: center;
    }

    /* Header del modal */
    .killsheet-header {
        margin-bottom: 30px;
    }

    /* Título principal */
    .killsheet-title {
        font-family: 'Poppins', sans-serif !important;
        font-size: 28px !important;
        font-weight: 600 !important;
        color: #1e293b !important;
        margin: 0 0 15px 0 !important;
        line-height: 1.3 !important;
    }

    /* Título en modal azul */
    .killsheet-title-white {
        color: white !important;
    }

    /* Descripción del modal */
    .killsheet-description {
        font-family: 'Poppins', sans-serif !important;
        font-size: 16px !important;
        font-weight: 400 !important;
        color: #64748b !important;
        margin: 0 !important;
        line-height: 1.5 !important;
    }

    /* Descripción en modal azul */
    .killsheet-description-white {
        color: rgba(255, 255, 255, 0.9) !important;
    }

    /* Contenedor de opciones */
    .killsheet-options {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    /* Botón base */
    .killsheet-btn {
        background: white !important;
        border: 2px solid #e2e8f0 !important;
        border-radius: 15px !important;
        padding: 20px 25px !important;
        cursor: pointer !important;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
        font-family: 'Poppins', sans-serif !important;
        width: 100% !important;
        display: block !important;
    }

    /* Efecto hover del botón */
    .killsheet-btn:hover {
        transform: translateY(-2px) !important;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15) !important;
        border-color: #ff585d !important;
    }

    /* Botón blanco (primer modal) */
    .killsheet-btn-white {
        background: white !important;
        color: #1e293b !important;
    }

    /* Botón azul translúcido (segundo modal) */
    .killsheet-btn-blue {
        background: rgba(255, 255, 255, 0.15) !important;
        border-color: rgba(255, 255, 255, 0.3) !important;
        color: white !important;
        backdrop-filter: blur(10px) !important;
    }

    /* Hover del botón azul */
    .killsheet-btn-blue:hover {
        background: rgba(255, 255, 255, 0.25) !important;
        border-color: rgba(255, 255, 255, 0.5) !important;
    }

    /* Contenido interno del botón (imagen + texto) */
    .killsheet-btn-content {
        display: flex !important;
        align-items: center !important;
        justify-content: flex-start !important;
        gap: 15px !important;
    }

    /* Icono del botón */
    .killsheet-btn-icon {
        width: 32px !important;
        height: 32px !important;
        object-fit: contain !important;
        flex-shrink: 0 !important;
    }

    /* Texto del botón */
    .killsheet-btn-text {
        font-size: 16px !important;
        font-weight: 500 !important;
        text-align: left !important;
    }

    /* Botón de cerrar del SweetAlert */
    .swal2-close {
        color: #64748b !important;
        font-size: 28px !important;
        font-weight: 300 !important;
        transition: color 0.3s ease !important;
    }

    /* Hover del botón cerrar */
    .swal2-close:hover {
        color: #1e293b !important;
    }

    /* Botón cerrar en modal azul */
    .killsheet-second-modal .swal2-close {
        color: rgba(255, 255, 255, 0.8) !important;
    }

    /* Hover del botón cerrar en modal azul */
    .killsheet-second-modal .swal2-close:hover {
        color: white !important;
    }
</style>

@endsection