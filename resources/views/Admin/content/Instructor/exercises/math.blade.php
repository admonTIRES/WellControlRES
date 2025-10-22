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
                                        <span class="text-secondary">{{ __('Drilling Math ') }}</span> {{ __(' Panel ') }}
                                        </h1>
                                    </div>
                                    <p class="mb-4">{{ __('You can create exercises, questions and exam.') }}</p>
                                </div>
                                <div class="col-lg-6 banner-img">
                                    <div class="img">
                                        <img src="../assets/images/principal/math2.png" class="img-fluid w-55" alt="img8">
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
                            <h4 class="card-title mb-0">{{ __('Drilling Math list') }}</h4> 
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mathModal">
                             {{ __('New') }}
                            </button>
                        </div>
                        </div>
                        <div class="card-body px-0">
                            <div class="table-responsive">
                                <table id="math-list-table" class="table table-striped" role="grid" >
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Fullscreen -->
    <div class="modal fade" id="mathModal" tabindex="-1" aria-labelledby="mathModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mathModalLabel">Math Drilling Exercise</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="mathForm">
                        {!! csrf_field() !!}
                        <div class="row">
                            <!-- Columna Izquierda -->
                            <div class="col-md-4">
                                <!-- Tipo de Ejercicio -->
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Exercise type') }}</label>
                                    <select class="form-select" id="TIPO_MATH" name="TIPO_MATH">
                                        <option value="">Seleccionar...</option>
                                        <option value="1">Despejes</option>
                                        <option value="2">Jerarquía</option>
                                        <option value="3">Fracciones</option>
                                        <option value="4">Elevación</option>
                                        <option value="5">Redondeos</option>
                                    </select>
                                </div>
                                 <div class="mb-3">
                                    <label class="form-label">{{ __('Language') }}</label>
                                    <select class="form-select" id="LANGUAGE_MATH" name="LANGUAGE_MATH">
                                        <option value="">Seleccionar...</option>
                                         @foreach ($idiomas as $idioma)
                                                <option value="{{ $idioma->ID_CATALOGO_IDIOMAEXAMEN }}">{{ $idioma->NOMBRE_IDIOMA }}</option>
                                            @endforeach
                                    </select>
                                </div>
                                
                                <!-- Ente Acreditador -->
                                <div class="mb-3 d-flex"> 
                                    <div class="col-12 me-1 text-center">
                                        <label>{{ __('Accrediting Entity') }}</label>
                                        <select class="form-select" id="ENTE_MATH" name="ENTE_MATH" multiple >
                                        <option selected disabled></option>
                                        @foreach ($entes as $ente)
                                                <option value="{{ $ente->ID_CATALOGO_ENTE }}">{{ $ente->NOMBRE_ENTE }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Niveles -->
                                <div class="mb-3">
                                    <div class="col-12 me-1 text-center">
                                        <label>{{ __('Levels') }}</label>
                                        <select class="form-select" id="NIVELES_MATH" name="NIVELES_MATH" multiple >
                                        <option selected disabled></option>
                                        @foreach ($niveles as $nivel)
                                                <option value="{{ $nivel->ID_CATALOGO_NIVELACREDITACION }}">{{ $nivel->NOMBRE_NIVEL }} - {{ $nivel->DESCRIPCION_NIVEL }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="col-12 me-1 text-center">
                                        <label>BOP</label>
                                        <select class="form-select" id="BOP_MATH" name="BOP_MATH" multiple >
                                        <option selected disabled></option>
                                        @foreach ($bops as $bop)
                                        <option value="{{ $bop->ID_CATALOGO_TIPOBOP }}">{{ $bop->ABREVIATURA }} - {{ $bop->DESCRIPCION_TIPOBOP }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="col-12 me-1 text-center">
                                        <label>{{ __('Operation type') }}</label>
                                        <select class="form-select" id="OPERATION_MATH" name="OPERATION_MATH" multiple >
                                        <option selected disabled></option>
                                        @foreach ($operaciones as $operacion)
                                        <option value="{{ $operacion->ID_CATALOGO_OPERACION }}">{{ $operacion->NOMBRE_OPERACION }}</option>
                                        @endforeach
                                        </select>
                                    </div>
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
                    <button type="button" class="btn btn-primary" id="mathbtnModal" name="mathbtnModal">Guardar Ejercicio</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@php
    $css_identifier = 'math';
@endphp