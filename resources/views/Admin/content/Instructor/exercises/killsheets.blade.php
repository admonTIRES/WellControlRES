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
                                        <span class="text-secondary">Killsheet </span>  Panel
                                        </h1>
                                    </div>
                                    <p class="mb-4">You can create exercises, questions and exam.</p>
                                </div>
                                <div class="col-lg-6 banner-img">
                                    <div class="img">
                                        <img src="../assets/images/principal/killsheets3.png" class="img-fluid w-55" alt="img8">
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
                            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#killsheetModal">
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
    <div class="modal fade" id="killsheetModal" tabindex="-1" aria-labelledby="killsheetModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="killsheetModalLabel">{{ __('Killsheet')  }} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="row">
                            <!-- Columna Izquierda -->
                            <div class="col-md-4">
                                <!-- Tipo de Ejercicio -->
                                <div class="mb-3">
                                    <label class="form-label">Tipo de Ejercicio</label>
                                    <select class="form-select" id="TIPO_MATH" name="TIPO_MATH" required>
                                        <option value="">Seleccionar...</option>
                                        <option value="1">Despejes</option>
                                        <option value="2">Jerarquía</option>
                                        <option value="3">Fracciones</option>
                                        <option value="4">Elevación</option>
                                        <option value="5">Redondeos</option>
                                    </select>
                                </div>
                                
                                <!-- Ente Acreditador -->
                                <div class="mb-3"> 
                                    <label class="form-label">Ente Acreditador</label>
                                    <select class="form-select" id="ENTE_MATH" name="ENTE_MATH" required>
                                        <option value="">Seleccionar...</option>
                                        @foreach ($entes as $ente)
                                            <option value="{{ $ente->ID_CATALOGO_ENTE }}">{{ $ente->NOMBRE_ENTE }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Niveles -->
                                <div class="mb-3">
                                    <label class="form-label">Niveles</label>
                                    <div id="NIVELES_MATH">
                                        @foreach ($niveles as $nivel)
                                            <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="nivel{{ $nivel->ID_CATALOGO_NIVELACREDITACION }}" name="NIVELES_MATH[]" value="{{ $nivel->ID_CATALOGO_NIVELACREDITACION }}">
                                                <label class="form-check-label" for="nivel{{ $nivel->ID_CATALOGO_NIVELACREDITACION }}">
                                                    {{ $nivel->NOMBRE_NIVEL }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- BOP -->
                                <div class="mb-3">
                                    <label class="form-label">BOP</label>
                                    <select class="form-select" id="BOP_MATH" name="BOP_MATH" required>
                                        <option value="">Seleccionar...</option>
                                        @foreach ($bops as $bop)
                                            <option value="{{ $bop->ID_CATALOGO_TIPOBOP }}">{{ $bop->ABREVIATURA }} - {{ $bop->DESCRIPCION_TIPOBOP }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <!-- Columna Derecha si es fracciones-->
                            <div class="col-md-4 ejercicio-fraccion d-none">
                                <!-- Pregunta Principal -->
                                <div class="mb-3">
                                    <label class="form-label">Fracción</label>
                                    <textarea class="form-control" id="FRACCION_MATH" name="FRACCION_MATH" rows="1"></textarea>
                                </div>

                                <!-- Respuesta -->
                                <div class="mb-3">
                                    <label class="form-label">Respuesta</label>
                                    <textarea class="form-control" id="DECIMAL_MATH" name="DECIMAL_MATH" rows="1"></textarea>
                                </div>

                            </div>

                            <!-- Para los otros tipos -->
                            <div class="col-md-4 ejercicio-general d-none">
                                <!-- Pregunta Principal -->
                                <div class="mb-3">
                                    <label class="form-label">Pregunta</label>
                                    <textarea class="form-control" id="PREGUNTA_MATH" name="PREGUNTA_MATH" rows="3"></textarea>
                                </div>

                                <!-- Fórmula -->
                                <div class="mb-3">
                                    <label class="form-label">Fórmula</label>
                                    <textarea class="form-control" id="FORMULA_MATH" name="FORMULA_MATH" rows="3"></textarea>
                                </div>

                                <!-- Opciones -->
                                <div class="mb-3">
                                    <label class="form-label">Rellenar las opciones y seleccionar la correcta</label>
                                    <div id="OPCIONES_MATH">
                                        <div class="opcion-item mb-2">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <input class="form-check-input mt-0" type="checkbox" name="correctas[]">
                                                </div>
                                                <input type="text" class="form-control opcion-texto" name="opciones[]" placeholder="Escriba la opción A">
                                            </div>
                                        </div>
                                        <div class="opcion-item mb-2">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <input class="form-check-input mt-0" type="checkbox"  name="correctas[]">
                                                </div>
                                                <input type="text" class="form-control opcion-texto" name="opciones[]" placeholder="Escriba la opción B">
                                            </div>
                                        </div>
                                        <div class="opcion-item mb-2">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <input class="form-check-input mt-0" type="checkbox"  name="correctas[]">
                                                </div>
                                                <input type="text" class="form-control opcion-texto" name="opciones[]" placeholder="Escriba la opción C">
                                            </div>
                                        </div>
                                        <div class="opcion-item mb-2">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <input class="form-check-input mt-0" type="checkbox"  name="correctas[]">
                                                </div>
                                                <input type="text" class="form-control opcion-texto" name="opciones[]" placeholder="Escriba la opción D">
                                            </div>
                                        </div>
                                    </div>                
                                </div>

                                <!-- Solución -->
                                <div class="mb-3">
                                    <label class="form-label">Explicación de la solución</label>
                                    <textarea class="form-control" id="EXPLICACION_MATH" name="EXPLICACION_MATH" rows="3"></textarea>
                                </div>

                                <!-- Imagen -->
                                <div class="mb-3">
                                    <label for="imagenEjercicio" class="form-label">Imagen con solución</label>
                                    <input class="form-control" type="file" id="SOLUCIONIMG_MATH" name="SOLUCIONIMG_MATH" accept="image/*">
                                </div>

                                
                            </div>

                            <div class="col-md-4">
                              
                                <div class="calculator-container d-none">
                                        @include('Calculator.itemCalculator', ['id' => 'calculatorMath'])
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


    <div class="modal fade" id="iwcf_v_modal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nueva hoja de matar IWCF para pozos verticales</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="questionForm" enctype="multipart/form-data">
                    {!! csrf_field() !!}   
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
                                    <select class="form-select selectize-multiple" id="ENTE_KILLSHEET" name="ENTE_KILLSHEET[]" multiple>
                                        @foreach ($entes as $ente)
                                            <option value="{{ $ente->ID_CATALOGO_ENTE }}">{{ $ente->NOMBRE_ENTE }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Niveles -->
                                <div class="col-md-2 text-start">
                                    <label> {{ __('Levels*') }}</label>
                                    <select class="form-select selectize-multiple" id="NIVELES_KILLSHEET" name="NIVELES_KILLSHEET[]" multiple>
                                        @foreach ($niveles as $nivel)
                                            <option value="{{ $nivel->ID_CATALOGO_NIVELACREDITACION }}">{{ $nivel->NOMBRE_NIVEL }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- BOP -->
                                <div class="col-md-2 text-start">
                                    <label> {{ __('BOP*') }}</label>
                                    <select class="form-select selectize-multiple" id="BOP_KILLSHEET" name="BOP_KILLSHEET[]" multiple>
                                        @foreach ($bops as $bop)
                                            <option value="{{ $bop->ID_CATALOGO_TIPOBOP }}">{{ $bop->ABREVIATURA }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-2 text-start">
                                    <label> {{ __('OPERATION TYPE*') }}</label>
                                    <select class="form-select selectize-multiple" id="OPERACION_KILLSHEET" name="OPERACION_KILLSHEET[]" multiple>
                                        @foreach ($operaciones as $operacion)
                                            <option value="{{ $operacion->ID_CATALOGO_OPERACION }}">{{ $operacion->NOMBRE_OPERACION }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2 text-center pastel-box">
                                    <div class="mb-3">
                                        <label>{{ __('Language of the question*') }}</label>
                                        <select class="form-select selectize-single" id="LANGUAGE_ID_QUESTION" name="LANGUAGE_ID_QUESTION" required>
                                            @foreach ($idiomas as $idioma)
                                                <option value="{{ $idioma->ID_CATALOGO_IDIOMAEXAMEN }}">{{ $idioma->NOMBRE_IDIOMA }}</option>
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
                            <div class="row g-3">
                                <!-- Sección 2.1: Datos del Pozo -->
                                <div class="col-md-4">
                                    <div class="card h-100">
                                        <div class="card-header bg-primary text-white text-center">
                                            <h6 class="mb-0">{{ __('Datos del pozo') }}</h6>
                                        </div>
                                        <div class="card-body p-2">
                                            <div id="well-data-container">
                                                <div class="item-row mb-2">
                                                    <div class="row g-1">
                                                        <div class="col-5">
                                                            <input type="text" class="form-control form-control-sm" placeholder="{{ __('Dato') }}" name="well_data_item[]">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="number" step="any" class="form-control form-control-sm" placeholder="{{ __('Valor') }}" name="well_data_value[]">
                                                        </div>
                                                        <div class="col-3">
                                                            <input type="text" class="form-control form-control-sm" placeholder="{{ __('Unidad') }}" name="well_data_unit[]">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-primary w-50" onclick="addItem('well-data-container', 'well_data')">
                                                <i class="fas fa-plus"></i> {{ __('Add Item') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Sección 2.2: Datos de Fluido -->
                                <div class="col-md-4">
                                    <div class="card h-100">
                                        <div class="card-header bg-primary text-white text-center">
                                            <h6 class="mb-0">{{ __('Capacidades internas') }}</h6>
                                        </div>
                                        <div class="card-body p-2">
                                            <div id="fluid-data-container">
                                                <div class="item-row mb-2">
                                                    <div class="row g-1">
                                                        <div class="col-5">
                                                            <input type="text" class="form-control form-control-sm" placeholder="{{ __('Dato') }}" name="fluid_data_item[]">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="number" step="any" class="form-control form-control-sm" placeholder="{{ __('Valor') }}" name="fluid_data_value[]">
                                                        </div>
                                                        <div class="col-3">
                                                            <input type="text" class="form-control form-control-sm" placeholder="{{ __('Unidad') }}" name="fluid_data_unit[]">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-primary w-50" onclick="addItem('fluid-data-container', 'fluid_data')">
                                                <i class="fas fa-plus"></i> {{ __('Add Item') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Sección 2.3: Datos de Presión -->
                                <div class="col-md-4">
                                    <div class="card h-100">
                                        <div class="card-header bg-primary text-dark text-center">
                                            <h6 class="mb-0">{{ __('Capacidades anulares') }}</h6>
                                        </div>
                                        <div class="card-body p-2">
                                            <div id="pressure-data-container">
                                                <div class="item-row mb-2">
                                                    <div class="row g-1">
                                                        <div class="col-5">
                                                            <input type="text" class="form-control form-control-sm" placeholder="{{ __('Dato') }}" name="pressure_data_item[]">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="number" step="any" class="form-control form-control-sm" placeholder="{{ __('Valor') }}" name="pressure_data_value[]">
                                                        </div>
                                                        <div class="col-3">
                                                            <input type="text" class="form-control form-control-sm" placeholder="{{ __('Unidad') }}" name="pressure_data_unit[]">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-primary w-50" onclick="addItem('pressure-data-container', 'pressure_data')">
                                                <i class="fas fa-plus"></i> {{ __('Add Item') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Sección 2.4: Datos de Operación -->
                                <div class="col-md-4">
                                    <div class="card h-100">
                                        <div class="card-header bg-primary text-white text-center">
                                            <h6 class="mb-0">{{ __('Datos de la bomba del lodo') }}</h6>
                                        </div>
                                        <div class="card-body p-2">
                                            <div id="operation-data-container">
                                                <div class="item-row mb-2">
                                                    <div class="row g-1">
                                                        <div class="col-5">
                                                            <input type="text" class="form-control form-control-sm" placeholder="{{ __('Dato') }}" name="operation_data_item[]">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="number" step="any" class="form-control form-control-sm" placeholder="{{ __('Valor') }}" name="operation_data_value[]">
                                                        </div>
                                                        <div class="col-3">
                                                            <input type="text" class="form-control form-control-sm" placeholder="{{ __('Unidad') }}" name="operation_data_unit[]">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-primary w-50" onclick="addItem('operation-data-container', 'operation_data')">
                                                <i class="fas fa-plus"></i> {{ __('Add Item') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Segunda fila de secciones -->
                                <!-- Sección 2.5: Datos de Geometría -->
                                <div class="col-md-4">
                                    <div class="card h-100">
                                        <div class="card-header bg-primary text-white text-center">
                                            <h6 class="mb-0">{{ __('Datos de la tasa reducida de circulación de la bomba') }}</h6>
                                        </div>
                                        <div class="card-body p-2">
                                            <div id="geometry-data-container">
                                                <div class="item-row mb-2">
                                                    <div class="row g-1">
                                                        <div class="col-5">
                                                            <input type="text" class="form-control form-control-sm" placeholder="{{ __('Dato') }}" name="geometry_data_item[]">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="number" step="any" class="form-control form-control-sm" placeholder="{{ __('Valor') }}" name="geometry_data_value[]">
                                                        </div>
                                                        <div class="col-3">
                                                            <input type="text" class="form-control form-control-sm" placeholder="{{ __('Unidad') }}" name="geometry_data_unit[]">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-primary w-50" onclick="addItem('geometry-data-container', 'geometry_data')">
                                                <i class="fas fa-plus"></i> {{ __('Add Item') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Sección 2.6: Datos de Temperatura -->
                                <div class="col-md-4">
                                    <div class="card h-100">
                                        <div class="card-header bg-primary text-white text-center">
                                            <h6 class="mb-0">{{ __('Otra información') }}</h6>
                                        </div>
                                        <div class="card-body p-2">
                                            <div id="temperature-data-container">
                                                <div class="item-row mb-2">
                                                    <div class="row g-1">
                                                        <div class="col-5">
                                                            <input type="text" class="form-control form-control-sm" placeholder="{{ __('Dato') }}" name="temperature_data_item[]">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="number" step="any" class="form-control form-control-sm" placeholder="{{ __('Valor') }}" name="temperature_data_value[]">
                                                        </div>
                                                        <div class="col-3">
                                                            <input type="text" class="form-control form-control-sm" placeholder="{{ __('Unidad') }}" name="temperature_data_unit[]">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-primary w-50" onclick="addItem('temperature-data-container', 'temperature_data')">
                                                <i class="fas fa-plus"></i> {{ __('Add Item') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Sección 2.7: Datos de Equipos -->
                                <div class="col-md-4">
                                    <div class="card h-100">
                                        <div class="card-header bg-primary text-white text-center">
                                            <h6 class="mb-0">{{ __('Datos de la prueba de formación') }}</h6>
                                        </div>
                                        <div class="card-body p-2">
                                            <div id="equipment-data-container">
                                                <div class="item-row mb-2">
                                                    <div class="row g-1">
                                                        <div class="col-5">
                                                            <input type="text" class="form-control form-control-sm" placeholder="{{ __('Dato') }}" name="equipment_data_item[]">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="number" step="any" class="form-control form-control-sm" placeholder="{{ __('Valor') }}" name="equipment_data_value[]">
                                                        </div>
                                                        <div class="col-3">
                                                            <input type="text" class="form-control form-control-sm" placeholder="{{ __('Unidad') }}" name="equipment_data_unit[]">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-primary w-50" onclick="addItem('equipment-data-container', 'equipment_data')">
                                                <i class="fas fa-plus"></i> {{ __('Add Item') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Sección 2.8: Datos Adicionales -->
                                <div class="col-md-4">
                                    <div class="card h-100">
                                        <div class="card-header bg-primary text-white text-center">
                                            <h6 class="mb-0">{{ __('Datos del influjo') }}</h6>
                                        </div>
                                        <div class="card-body p-2">
                                            <div id="additional-data-container">
                                                <div class="item-row mb-2">
                                                    <div class="row g-1">
                                                        <div class="col-5">
                                                            <input type="text" class="form-control form-control-sm" placeholder="{{ __('Dato') }}" name="additional_data_item[]">
                                                        </div>
                                                        <div class="col-4">
                                                            <input type="number" step="any" class="form-control form-control-sm" placeholder="{{ __('Valor') }}" name="additional_data_value[]">
                                                        </div>
                                                        <div class="col-3">
                                                            <input type="text" class="form-control form-control-sm" placeholder="{{ __('Unidad') }}" name="additional_data_unit[]">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-primary w-50" onclick="addItem('additional-data-container', 'additional_data')">
                                                <i class="fas fa-plus"></i> {{ __('Add Item') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
        alert('{{ __("Maximum 5 items per section") }}');
        return;
    }
    
    const newItem = document.createElement('div');
    newItem.className = 'item-row mb-2';
    newItem.innerHTML = `
        <div class="row g-1">
            <div class="col-5">
                <input type="text" class="form-control form-control-sm" placeholder="{{ __('Item') }}" name="${namePrefix}_item[]">
            </div>
            <div class="col-4">
                <input type="number" step="any" class="form-control form-control-sm" placeholder="{{ __('Value') }}" name="${namePrefix}_value[]">
            </div>
            <div class="col-2">
                <input type="text" class="form-control form-control-sm" placeholder="{{ __('Unit') }}" name="${namePrefix}_unit[]">
            </div>
            <div class="col-1">
                <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeItem(this)" title="{{ __('Remove') }}">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    `;
    
    container.appendChild(newItem);
}

function removeItem(button) {
    button.closest('.item-row').remove();
}
</script>

<style>
.selectize-control.multi .selectize-input {
    padding: 6px 8px;
    min-height: 45px;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
}

.selectize-control.multi .selectize-input > input {
    display: none !important;
    width: 0 !important;
    height: 0 !important;
    padding: 0 !important;
    margin: 0 !important;
    border: none !important;
}

/* Estilo para cada etiqueta seleccionada */
.selectize-control.multi .selectize-input > div {
    background-color: #FF585D; /* Azul Bootstrap */
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
.selectize-control.multi .selectize-input > div .remove {
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

.card {
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    transition: transform 0.2s;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}

.card-header {
    border-radius: 10px 10px 0 0 !important;
    font-weight: 600;
}

.form-control-sm {
    font-size: 0.875rem;
}

.item-row {
    position: relative;
}

.btn-sm {
    font-size: 0.8rem;
}

.g-1 {
    --bs-gutter-x: 0.25rem;
    --bs-gutter-y: 0.25rem;
}
</style>

<!-- Modal 2 -->
<div class="modal fade" id="iwcf_d_modal" tabindex="-1">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nueva hoja de matar IWCF para pozos desviados</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        
      </div>
    </div>
  </div>
</div>

<!-- Modal 3 -->
<div class="modal fade" id="iadc_v_modal" tabindex="-1">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nueva hoja de matar IADC para pozos verticales</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        
      </div>
    </div>
  </div>
</div>
<style>
    .opcion-item, .pregunta-adicional {
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