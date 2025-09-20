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
                <h5 class="modal-title" id="modal-killsheet-title">Nueva hoja de matar</h5>
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
                                {{-- <div class="col-md-2 text-start">
                                    <label> {{ __('BOP*') }}</label>
                                    <select class="form-select selectize-multiple" id="BOP_KILLSHEET"
                                        name="BOP_KILLSHEET[]" multiple>
                                        @foreach ($bops as $bop)
                                        <option value="{{ $bop->ID_CATALOGO_TIPOBOP }}">{{ $bop->ABREVIATURA }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}

                                <div class="col-md-2 text-start">
                                    <label> {{ __('Operation type*') }}</label>
                                    <select class="form-select selectize-multiple" id="OPERACION_KILLSHEET"
                                        name="OPERACION_KILLSHEET[]" multiple>
                                        @foreach ($operaciones as $operacion)
                                        <option value="{{ $operacion->ID_CATALOGO_OPERACION }}">{{
                                            $operacion->NOMBRE_OPERACION }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Sección 2: Datos del Ejercicio -->
                        <div class="col-md-12 text-center pastel-box mb-4">
                            <h4 class="fw-bold mb-4">
                                <span class="text-secondary">{{ __('2. ') }}</span> {{ __('Exercise data') }}
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
                {{-- <form id="killsheet-1" enctype="multipart/form-data" class="wizard-step d-none">
                   
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
                </form> --}}
                
                {{-- IWCF – Vertical – Surface – Español --}}
                <form id="form-iwcf-v-sur-es" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IWCF.vertical.Surface.spanish', ['id' => 'iwcf-v-sur-es'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iwcf-v-sur-es">Continuar</button>
                </form>

                {{-- IWCF – Vertical – Surface – Inglés --}}
                <form id="form-iwcf-v-sur-en" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IWCF.vertical.Surface.english', ['id' => 'iwcf-v-sur-en'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iwcf-v-sur-en">Continuar</button>
                </form>

                {{-- IWCF – Vertical – Surface – Portugués --}}
                <form id="form-iwcf-v-sur-pt" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IWCF.vertical.Surface.portuguese', ['id' => 'iwcf-v-sur-pt'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iwcf-v-sur-pt">Continuar</button>
                </form>
                
                {{-- IWCF – Vertical – Surface – Árabe --}}
                <form id="form-iwcf-v-sur-ar" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IWCF.vertical.Surface.arabic', ['id' => 'iwcf-v-sur-ar'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iwcf-v-sur-ar">Continuar</button>
                </form>
                
                {{-- IWCF – Vertical – Subsea – Español --}}
                <form id="form-iwcf-v-sub-es" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IWCF.vertical.Subsea.spanish', ['id' => 'iwcf-v-sub-es'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iwcf-v-sub-es">Continuar</button>
                </form>
                
                {{-- IWCF – Vertical – Subsea – Inglés --}}
                <form id="form-iwcf-v-sub-en" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IWCF.vertical.Subsea.english', ['id' => 'iwcf-v-sub-en'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iwcf-v-sub-en">Continuar</button>
                </form>
                
                {{-- IWCF – Vertical – Subsea – Portugués --}}
                <form id="form-iwcf-v-sub-pt" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IWCF.vertical.Subsea.portuguese', ['id' => 'iwcf-v-sur-pt'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iwcf-v-sub-pt">Continuar</button>
                </form>
                
                {{-- IWCF – Vertical – Subsea – Árabe --}}
                <form id="form-iwcf-v-sur-ar" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IWCF.vertical.Subsea.arabic', ['id' => 'iwcf-v-sur-ar'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iwcf-v-sur-ar">Continuar</button>
                </form>
                
                {{-- IWCF – Desviado – Surface – Español --}}
                <form id="form-iwcf-d-sur-es" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IWCF.vertical.Surface.spanish', ['id' => 'iwcf-d-sur-es'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iwcf-d-sur-es">Continuar</button>
                </form>
                
                {{-- IWCF – Desviado – Surface – Inglés --}}
                <form id="form-iwcf-d-sur-es" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IWCF.deviated.Surface.spanish', ['id' => 'iwcf-d-sur-es'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iwcf-d-sur-es">Continuar</button>
                </form>
                
                {{-- IWCF – Desviado – Surface – Portugués --}}
                <form id="form-iadc-v-sur-es" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IADC.vertical.Surface.spanish', ['id' => 'iwcf-d-sur-es'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iadc-v-sur-es">Continuar</button>
                </form>
                
                {{-- IWCF – Desviado – Surface – Árabe --}}
                <form id="form-iadc-v-sur-es" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IADC.vertical.Surface.spanish', ['id' => 'iadc-d-sur-es'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iadc-v-sur-es">Continuar</button>
                </form>
                
                {{-- IWCF – Desviado – Subsea – Español --}}
                <form id="form-iadc-v-sur-es" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IADC.vertical.Surface.spanish', ['id' => 'iadc-d-sur-es'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iadc-v-sur-es">Continuar</button>
                </form>
                
                {{-- IWCF – Desviado – Subsea – Inglés --}}
                <form id="form-iadc-v-sur-es" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IADC.vertical.Surface.spanish', ['id' => 'iadc-d-sur-es'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iadc-v-sur-es">Continuar</button>
                </form>
                
                {{-- IWCF – Desviado – Subsea – Portugués --}}
                <form id="form-iadc-v-sur-es" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IADC.vertical.Surface.spanish', ['id' => 'iadc-d-sur-es'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iadc-v-sur-es">Continuar</button>
                </form>
                
                {{-- IWCF – Desviado – Subsea – Árabe --}}
                <form id="form-iadc-v-sur-es" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IADC.vertical.Surface.spanish', ['id' => 'iadc-d-sur-es'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iadc-v-sur-es">Continuar</button>
                </form>
                
                {{-- IADC – Vertical – Surface – Español --}}
                <form id="killsheet-18" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IADC.vertical.Surface.spanish', ['id' => 'iadc-d-sur-es'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iadc-v-sur-es">Continuar</button>
                </form>
                
                {{-- IADC – Vertical – Surface – Inglés --}}
                <form id="form-iadc-v-sur-es" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IADC.vertical.Surface.spanish', ['id' => 'iadc-v-sur-es'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iadc-v-sur-es">Continuar</button>
                </form>
                
                {{-- IADC – Vertical – Surface – Portugués --}}
                <form id="form-iadc-v-sur-es" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IADC.vertical.Surface.spanish', ['id' => 'iadc-v-sur-es'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iadc-v-sur-es">Continuar</button>
                </form>
                
                {{-- IADC – Vertical – Surface – Árabe --}}
                <form id="form-iadc-v-sur-es" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IADC.vertical.Surface.spanish', ['id' => 'iadc-v-sur-es'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iadc-v-sur-es">Continuar</button>
                </form>
                
                {{-- IADC – Vertical – Subsea – Español --}}
                <form id="form-iadc-v-sur-es" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IADC.vertical.Surface.spanish', ['id' => 'iadc-v-sur-es'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iadc-v-sur-es">Continuar</button>
                </form>
                
                {{-- IADC – Vertical – Subsea – Inglés --}}
                <form id="form-iadc-v-sur-es" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IADC.vertical.Surface.spanish', ['id' => 'iadc-v-sur-es'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iadc-v-sur-es">Continuar</button>
                </form>
                
                {{-- IADC – Vertical – Subsea – Portugués --}}
                <form id="form-iadc-v-sur-es" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IADC.vertical.Surface.spanish', ['id' => 'iadc-v-sur-es'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iadc-v-sur-es">Continuar</button>
                </form>
                
                {{-- IADC – Vertical – Subsea – Árabe --}}
                <form id="form-iadc-v-sur-es" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IADC.vertical.Surface.spanish', ['id' => 'iadc-v-sur-es'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iadc-v-sur-es">Continuar</button>
                </form>
                
                {{-- IADC – Desviado – Surface – Español --}}
                <form id="form-iadc-v-sur-es" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IADC.vertical.Surface.spanish', ['id' => 'iadc-v-sur-es'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iadc-v-sur-es">Continuar</button>
                </form>
                
                {{-- IADC – Desviado – Surface – Inglés --}}
                <form id="form-iadc-v-sur-es" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IADC.vertical.Surface.spanish', ['id' => 'iadc-v-sur-es'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iadc-v-sur-es">Continuar</button>
                </form>
                
                {{-- IADC – Desviado – Surface – Portugués --}}
                <form id="form-iadc-v-sur-es" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IADC.vertical.Surface.spanish', ['id' => 'iadc-v-sur-es'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iadc-v-sur-es">Continuar</button>
                </form>
                
                {{-- IADC – Desviado – Surface – Árabe --}}
                <form id="form-iadc-v-sur-es" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IADC.vertical.Surface.spanish', ['id' => 'iadc-v-sur-es'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iadc-v-sur-es">Continuar</button>
                </form>
                
                {{-- IADC – Desviado – Subsea – Español --}}
                <form id="form-iadc-v-sur-es" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IADC.vertical.Surface.spanish', ['id' => 'iadc-v-sur-es'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iadc-v-sur-es">Continuar</button>
                </form>
                
                {{-- IADC – Desviado – Subsea – Inglés --}}
                <form id="form-iadc-v-sur-es" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IADC.vertical.Surface.spanish', ['id' => 'iadc-v-sur-es'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iadc-v-sur-es">Continuar</button>
                </form>
                
                {{-- IADC – Desviado – Subsea – Portugués --}}
                <form id="form-iadc-v-sur-es" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IADC.vertical.Surface.spanish', ['id' => 'iadc-v-sur-es'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iadc-v-sur-es">Continuar</button>
                </form>
                
                {{-- IADC – Desviado – Subsea – Árabe --}}
                <form id="form-iadc-v-sur-es" enctype="multipart/form-data" class="wizard-step d-none">
                    @include('Admin.content.Instructor.exercises.killsheetsComponents.IADC.vertical.Surface.spanish', ['id' => 'iadc-v-sur-es'])
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Atrás</button>
                    <button type="button" class="btn btn-primary next-step" data-step="2"
                        id="btn-iadc-v-sur-es">Continuar</button>
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

    /* .blurred { pone en blur el div
        filter: blur(6px);  
        transition: filter 0.3s ease;
    } */

    .swal2-backdrop-show {
  backdrop-filter: blur(6px);
  -webkit-backdrop-filter: blur(6px);
}

</style>

@endsection