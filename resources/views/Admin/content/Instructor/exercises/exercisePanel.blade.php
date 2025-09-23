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
                                        <span class="text-secondary"> {{ __('Assessment ') }}</span>   {{ __('Panel') }}
                                        </h1>
                                    </div>
                                    <p class="mb-4"> {{ __('You can create exercises, questions and assessment.') }}</p>
                                </div>
                                <div class="col-lg-6 banner-img">
                                    <div class="img">
                                        <img src="../assets/images/principal/killsheets1.png" class="img-fluid w-55" alt="img8">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="w-100 h-100">
                                <div class="header-title d-flex justify-content-between align-items-center w-100 mb-4">
                                    <h4 class="card-title mb-0">{{ __('Assessment list') }}</h4> 
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#examModal">
                                    {{ __('New assessment') }}
                                    </button>
                                </div>
                                <div>
                                    <table id="exam-list-table" class="table" role="grid" >
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="w-100 h-100">
                                <div class="header-title d-flex justify-content-between align-items-center w-100 mb-4">
                                    <h4 class="card-title mb-0">{{ __('Question list') }}</h4> 
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#questionModal">
                                    {{ __('New question') }}
                                    </button>
                                </div>
                                <div>
                                    <table id="question-list-table" class="table" role="grid">
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Fullscreen -->
     <div class="modal fade" id="examModal" tabindex="-1" aria-labelledby="examModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="assessmentModalLabel">{{ __('Assessment')  }} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="row">
                            <div class="col-md-12 text-center pastel-box">
                                <h4 class="fw-bold mb-4">
                                    <span class="text-secondary"> {{ __('1. ') }}</span>   {{ __('Generalities') }}
                                </h4>
                                <!-- Agrupación horizontal -->
                                <div class="d-flex justify-content-center flex-wrap gap-3 mb-3">
                                    <!-- Ente Acreditador -->
                                    <div class="col-md-3 text-start">
                                        <label> {{ __('Accrediting Entity') }}</label>
                                        <select class="form-select" id="ENTE1_MATH" name="ENTE_MATH" multiple >
                                        <option selected disabled></option>
                                        @foreach ($entes as $ente)
                                                <option value="{{ $ente->ID_CATALOGO_ENTE }}">{{ $ente->NOMBRE_ENTE }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                <!-- Niveles -->
                                     <div class="col-md-3 text-start">
                                        <label> {{ __('Levels') }}</label>
                                        <select class="form-select" id="NIVEL1_MATH" name="NIVEL_MATH" multiple >
                                        <option selected disabled></option>
                                        @foreach ($niveles as $nivel)
                                                <option value="{{ $nivel->ID_CATALOGO_NIVELACREDITACION }}">{{ $nivel->NOMBRE_NIVEL }} - {{ $nivel->DESCRIPCION_NIVEL }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 text-start">
                                        <label> {{ __('BOP') }}</label>
                                        <select class="form-select" id="BOP1_MATH" name="BOP_MATH" multiple >
                                        <option selected disabled></option>
                                        @foreach ($bops as $bop)
                                        <option value="{{ $bop->ID_CATALOGO_TIPOBOP }}">{{ $bop->ABREVIATURA }} - {{ $bop->DESCRIPCION_TIPOBOP }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- Ente Acreditador -->
                               

                                                        <!-- Contenedor para Tiempo y Puntaje -->
                                
                            </div>
                            <!-- Columna Izquierda -->
                             <div class="col-md-4 text-center pastel-box">
                                <!-- Ente Acreditador -->
                                <h4 class="fw-bold mb-4">
                                    <span class="text-secondary"> {{ __('2. ') }}</span>   {{ __('Language') }}
                                </h4>
                                 <div class="mb-3 d-flex"> 
                                    <div class="col-12 me-1 text-center">
                                        <label> {{ __('What is the language of the question?*') }}</label>
                                        <select class="form-select" id="IDIOMAEXAM_QUESTION" name="IDIOMAEXAM_QUESTION">
                                        <option selected disabled></option>
                                        <option value="0">Seleccionar...</option>
                                        <option value="2">Spanish</option>
                                        <option value="3">English</option>
                                        <option value="4">Arabic</option>
                                        <option value="5">Portuguese</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-center pastel-box">
                                <!-- Ente Acreditador -->
                                <h4 class="fw-bold mb-4">
                                    <span class="text-secondary"> {{ __('3. ') }}</span>   {{ __('Tipo de exámen') }}
                                </h4>
                                 <div class="mb-3">
                                    <label class="form-label"> {{ __('What type of exam is it?*') }}</label>
                                    <select class="form-select" id="TIPOEXAM_QUESTION" name="TIPOEXAM_QUESTION" multiple>
                                         <option value="1"> {{ __('Diagnostic') }}</option>
                                        <option value="2"> {{ __('Intermediate') }}</option>
                                        <option value="3"> {{ __('Final') }}</option>
                                        <option value="4">N/A</option>
                                    </select>
                                </div>
                            </div>
                             <div class="col-md-4 text-center pastel-box">
                                <!-- Ente Acreditador -->
                                 <h4 class="fw-bold mb-4">
                                    <span class="text-secondary"> {{ __('4. ') }}</span>   {{ __('Name of the assesment') }}
                                </h4>
                                <div class="mb-3" id="nombreTexto">
                                    <label class="form-label"> {{ __('Enter the name of this assesment:*') }}</label>
                                    <input type="text" class="form-control campo-requerido" name="TEXTO1_QUESTION" id="TEXTO1_QUESTION">
                                </div>
                            </div>
                            <!-- Columna Derecha si es fracciones-->
                            <div class="col-md-12 text-center pastel-box">
                                <!-- Pregunta Principal -->
                               
                                <h4 class="fw-bold mb-4">
                                    <span class="text-secondary"> {{ __('5. ') }}</span>   {{ __('Topics and subtopics') }}
                                </h4>
                                <div id="temas-container">
                                    <!-- Tema 1: Presión hidrostática -->
                                    <div class="tema-container" data-tema="1">
                                        <div class="tema-header" onclick="toggleTema(1)">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="checkbox-wrapper">
                                                    <input type="checkbox" id="tema1-check" onchange="toggleAllSubtemas(1, this.checked)">
                                                    <h5 class="tema-title">Presión hidrostática</h5>
                                                </div>
                                                <i class="fas fa-chevron-down expand-icon" id="icon-1"></i>
                                            </div>
                                        </div>
                                        
                                        <div class="subtemas-container" id="subtemas-1">
                                            <div class="subtema-item">
                                                <div class="checkbox-wrapper">
                                                    <input type="checkbox" id="subtema1-1-check" onchange="updateCalculos()">
                                                    <h6 class="subtema-title">Fundamentos de la presión hidrostática</h6>
                                                </div>
                                                <div class="control-row">
                                                    <div class="time-input-group">
                                                        <label class="form-label small">Preguntas:</label>
                                                        <input type="number" class="form-control small" min="1" max="50" value="5" onchange="updateCalculos()">
                                                    </div>
                                                    <div class="time-input-group">
                                                        <label class="form-label small">Rango de tiempo (min):</label>
                                                        <input type="number" class="form-control small" placeholder="Min" min="1" max="300" value="3" onchange="updateCalculos()">
                                                        <span>-</span>
                                                        <input type="number" class="form-control small" placeholder="Max" min="1" max="300" value="6" onchange="updateCalculos()">
                                                    </div>
                                                    <div class="time-input-group">
                                                        <label class="form-label small">Puntajes (pts):</label>
                                                        <input type="number" class="form-control small" placeholder="Min" min="1" max="100" value="1" onchange="updateCalculos()">
                                                        <span>-</span>
                                                        <input type="number" class="form-control small" placeholder="Max" min="1" max="100" value="10" onchange="updateCalculos()">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="subtema-item">
                                                <div class="checkbox-wrapper">
                                                    <input type="checkbox" id="subtema1-2-check" onchange="updateCalculos()">
                                                    <h6 class="subtema-title">Cálculos de presión en fluidos</h6>
                                                </div>
                                                <div class="control-row">
                                                    <div>
                                                        <label class="form-label small">Preguntas:</label>
                                                        <input type="number" class="form-control small" min="1" max="50" value="8" onchange="updateCalculos()">
                                                    </div>
                                                    <div class="time-input-group">
                                                        <label class="form-label small">Rango de tiempo (min):</label>
                                                        <input type="number" class="form-control small" placeholder="Min" min="10" max="300" value="4" onchange="updateCalculos()">
                                                        <span>-</span>
                                                        <input type="number" class="form-control small" placeholder="Max" min="10" max="300" value="9" onchange="updateCalculos()">
                                                    </div>
                                                    <div class="time-input-group">
                                                        <label class="form-label small">Puntajes (pts):</label>
                                                        <input type="number" class="form-control small" placeholder="Min" min="1" max="100" value="1" onchange="updateCalculos()">
                                                        <span>-</span>
                                                        <input type="number" class="form-control small" placeholder="Max" min="1" max="100" value="10" onchange="updateCalculos()">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="resumen-tema" id="resumen-tema-1">
                                            <div class="d-flex justify-content-between">
                                                <span>Subtotal Tema 1:</span>
                                                <span><span class="preguntas-count">0</span> preguntas | <span class="tiempo-total">0</span> min | <span class="puntaje-total">0</span> pts</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Tema 2: Densidad del lodo -->
                                    <div class="tema-container" data-tema="2">
                                        <div class="tema-header" onclick="toggleTema(2)">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="checkbox-wrapper">
                                                    <input type="checkbox" id="tema2-check" onchange="toggleAllSubtemas(2, this.checked)">
                                                    <h5 class="tema-title">Densidad del lodo</h5>
                                                </div>
                                                <i class="fas fa-chevron-down expand-icon" id="icon-2"></i>
                                            </div>
                                        </div>
                                        
                                        <div class="subtemas-container" id="subtemas-2">
                                            <div class="subtema-item">
                                                <div class="checkbox-wrapper">
                                                    <input type="checkbox" id="subtema2-1-check" onchange="updateCalculos()">
                                                    <h6 class="subtema-title">Propiedades del lodo de perforación</h6>
                                                </div>
                                                <div class="control-row">
                                                    <div>
                                                        <label class="form-label small">Preguntas:</label>
                                                        <input type="number" class="form-control small" min="1" max="50" value="6" onchange="updateCalculos()">
                                                    </div>
                                                    <div class="time-input-group">
                                                        <label class="form-label small">Rango de tiempo (min):</label>
                                                        <input type="number" class="form-control small" placeholder="Min" min="10" max="300" value="4" onchange="updateCalculos()">
                                                        <span>-</span>
                                                        <input type="number" class="form-control small" placeholder="Max" min="10" max="300" value="7" onchange="updateCalculos()">
                                                    </div>
                                                    <div class="time-input-group">
                                                        <label class="form-label small">Puntajes (pts):</label>
                                                        <input type="number" class="form-control small" placeholder="Min" min="1" max="100" value="1" onchange="updateCalculos()">
                                                        <span>-</span>
                                                        <input type="number" class="form-control small" placeholder="Max" min="1" max="100" value="10" onchange="updateCalculos()">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="subtema-item">
                                                <div class="checkbox-wrapper">
                                                    <input type="checkbox" id="subtema2-2-check" onchange="updateCalculos()">
                                                    <h6 class="subtema-title">Control de densidad</h6>
                                                </div>
                                                <div class="control-row">
                                                    <div>
                                                        <label class="form-label small">Preguntas:</label>
                                                        <input type="number" class="form-control small" min="1" max="50" value="4" onchange="updateCalculos()">
                                                    </div>
                                                    <div class="time-input-group">
                                                        <label class="form-label small">Rango de tiempo (min):</label>
                                                        <input type="number" class="form-control small" placeholder="Min" min="10" max="300" value="3" onchange="updateCalculos()">
                                                        <span>-</span>
                                                        <input type="number" class="form-control small" placeholder="Max" min="10" max="300" value="6" onchange="updateCalculos()">
                                                    </div>
                                                    <div class="time-input-group">
                                                        <label class="form-label small">Puntajes (pts):</label>
                                                        <input type="number" class="form-control small" placeholder="Min" min="1" max="100" value="1" onchange="updateCalculos()">
                                                        <span>-</span>
                                                        <input type="number" class="form-control small" placeholder="Max" min="1" max="100" value="10" onchange="updateCalculos()">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="subtema-item">
                                                <div class="checkbox-wrapper">
                                                    <input type="checkbox" id="subtema2-3-check" onchange="updateCalculos()">
                                                    <h6 class="subtema-title">Volumen de la sarta de perforación</h6>
                                                </div>
                                                <div class="control-row">
                                                    <div>
                                                        <label class="form-label small col-8">Preguntas:</label>
                                                        <input type="number" class="form-control small" min="1" max="50" value="7" onchange="updateCalculos()">
                                                    </div>
                                                    <div class="time-input-group">
                                                        <label class="form-label small">Rango de tiempo (min):</label>
                                                        <input type="number" class="form-control small" placeholder="Min" min="10" max="300" value="1" onchange="updateCalculos()">
                                                        <span>-</span>
                                                        <input type="number" class="form-control small" placeholder="Max" min="10" max="300" value="5" onchange="updateCalculos()">
                                                    </div>
                                                    <div class="time-input-group">
                                                        <label class="form-label small">Puntajes (pts):</label>
                                                        <input type="number" class="form-control small" placeholder="Min" min="1" max="100" value="1" onchange="updateCalculos()">
                                                        <span>-</span>
                                                        <input type="number" class="form-control small" placeholder="Max" min="1" max="100" value="10" onchange="updateCalculos()">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="resumen-tema" id="resumen-tema-2">
                                            <div class="d-flex justify-content-between">
                                                <span>Subtotal Tema 2:</span>
                                                <span><span class="preguntas-count">0</span> preguntas | <span class="tiempo-total">0</span> min | <span class="puntaje-total">0</span> pts máximos</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="resumen-total" id="resumen-total">
                                    <h4 >TOTAL GENERAL</h4>
                                    <div class="d-flex justify-content-around mt-3">
                                        <div>
                                            <i class="fas fa-question-circle"></i>
                                            <strong id="total-preguntas">0</strong> Preguntas
                                        </div>
                                        <div class="d-flex">
                                            <i class="fas fa-clock"></i>
                                            <!-- <strong id="total-tiempo">0</strong> -->
                                            <input id="total-tiempo" type="number" class="form-control small input-sin-estilo" placeholder="Max" min="1" max="100" value="10"> Minutos
                                        </div>
                                        <div>
                                            <i class="fas fa-hourglass-half"></i>
                                            <strong id="total-puntaje">0</strong> Puntos
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
    "Cancel": "Cancelar",
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> {{ __('Cancel') }}</button>
                    <button type="button" class="btn btn-primary">{{ __('Save') }}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="questionModal" tabindex="-1" aria-labelledby="questionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="questionModalLabel">{{ __('Questions') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="questionForm" enctype="multipart/form-data">
                     {!! csrf_field() !!}   
                        <div class="row">
                            <!-- Sección 1: Generalidades -->
                            <div class="col-md-12 text-center pastel-box">
                                <h4 class="fw-bold mb-4">
                                    <span class="text-secondary">{{ __('1. ') }}</span> {{ __('Generalities') }}
                                </h4>
                                <div class="d-flex justify-content-center flex-wrap gap-3 mb-3">
                                    <!-- Ente Acreditador -->
                                    <div class="col-md-3 text-start">
                                        <label> {{ __('Accrediting Entity*') }}</label>
                                        <select class="form-select selectize-multiple" id="ACCREDITATION_ENTITIES_QUESTION" name="ACCREDITATION_ENTITIES_QUESTION[]" multiple>
                                            @foreach ($entes as $ente)
                                                <option value="{{ $ente->ID_CATALOGO_ENTE }}">{{ $ente->NOMBRE_ENTE }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Niveles -->
                                    <div class="col-md-3 text-start">
                                        <label> {{ __('Levels*') }}</label>
                                        <select class="form-select selectize-multiple" id="LEVELS_QUESTION" name="LEVELS_QUESTION[]" multiple>
                                            @foreach ($niveles as $nivel)
                                                <option value="{{ $nivel->ID_CATALOGO_NIVELACREDITACION }}">{{ $nivel->NOMBRE_NIVEL }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- BOP -->
                                    <div class="col-md-3 text-start">
                                        <label> {{ __('BOP*') }}</label>
                                        <select class="form-select selectize-multiple" id="BOPS_QUESTION" name="BOPS_QUESTION[]" multiple>
                                            @foreach ($bops as $bop)
                                                <option value="{{ $bop->ID_CATALOGO_TIPOBOP }}">{{ $bop->ABREVIATURA }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Sección 2: Idioma -->
                            <div class="col-md-4 text-center pastel-box">
                                <h4 class="fw-bold mb-4">
                                    <span class="text-secondary">{{ __('2. ') }}</span> {{ __('Language') }}
                                </h4>
                                <div class="mb-3">
                                    <label>{{ __('Language of the question*') }}</label>
                                    <select class="form-select selectize-single" id="LANGUAGE_ID_QUESTION" name="LANGUAGE_ID_QUESTION" required>
                                        @foreach ($idiomas as $idioma)
                                            <option value="{{ $idioma->ID_CATALOGO_IDIOMAEXAMEN }}">{{ $idioma->NOMBRE_IDIOMA }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Sección 3: Temas -->
                            <div class="col-md-4 text-center pastel-box">
                                <h4 class="fw-bold mb-4">
                                    <span class="text-secondary">{{ __('3. ') }}</span> {{ __('Topics') }}
                                </h4>
                                <div class="mb-3">
                                    <label> {{ __('Question topic(s)*') }}</label>
                                    <select class="form-select selectize-multiple" id="TOPICS_QUESTION" name="TOPICS_QUESTION[]" multiple required>
                                        @foreach ($temas as $tema)
                                            <option value="{{ $tema->ID_CATALOGO_TEMAPREGUNTA }}">{{ $tema->NOMBRE_TEMA }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Sección 4: Subtemas -->
                            <div class="col-md-4 text-center pastel-box">
                                <h4 class="fw-bold mb-4">
                                    <span class="text-secondary">{{ __('4. ') }}</span> {{ __('Subtopics') }}
                                </h4>
                                <div class="mb-3">
                                    <label> {{ __('Subtopic(s) of the question') }}</label>
                                    <select class="form-select selectize-multiple" id="SUBTOPICS_QUESTION" name="SUBTOPICS_QUESTION[]" multiple>
                                        @foreach ($subtemas as $subtema)
                                            <option value="{{ $subtema->ID_CATALOGO_SUBTEMA }}">{{ $subtema->NOMBRE_SUBTEMA }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Sección 5: Estructura de la pregunta -->
                            <div class="col-md-6 text-center pastel-box">
                                <h4 class="fw-bold mb-4">
                                    <span class="text-secondary"> {{ __('5. ') }}</span>   {{ __('Question structure') }}
                                </h4>
                                <div class="mb-3">
                                    <label class="form-label"> {{ __('Is this field text or image?*') }}</label>
                                    <select class="form-select" id="TIPO1_QUESTION" name="TIPO1_QUESTION" required>
                                        <option value="">{{ __('Select...') }}</option>
                                        <option value="1"> {{ __('Text') }}</option>
                                        <option value="2"> {{ __('Image') }}</option>
                                    </select>
                                </div>
                                
                               
                                <div class="mb-3 d-none" id="campoTexto">
                                    <label class="form-label"> {{ __('Enter text:*') }}</label>
                                    <textarea class="form-control campo-requerido" name="TEXTO1_QUESTION" id="TEXTO1_QUESTION" rows="4"></textarea>
                                </div>

                                <div class="mb-3 d-none" id="campoImagen">
                                    <label class="form-label"> {{ __('Upload image:*') }}</label>
                                    <input type="file" class="form-control dropify campo-requerido" name="IMAGEN1_QUESTION" id="IMAGEN1_QUESTION" data-allowed-file-extensions="jpg jpeg png gif"/>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="activarSeccionExtra" name="SECCION_EXTRA1" >
                                    <label class="form-check-label" for="activarSeccionExtra"> {{ __('Would you like to add another section?') }}</label>
                                </div>

                                <div id="seccionExtra" class="opacity-50 pointer-events-none">
                                    <div class="mb-3">
                                        <label class="form-label"> {{ __('Is this field text or image?') }}</label>
                                        <select class="form-select" id="TIPO2_QUESTION" name="TIPO2_QUESTION" disabled>
                                            <option value=""> {{ __('Select...') }}</option>
                                            <option value="1"> {{ __('Text') }}</option>
                                            <option value="2"> {{ __('Image') }}</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 d-none" id="campoTexto2">
                                        <label class="form-label"> {{ __('Enter text:') }}</label>
                                        <textarea class="form-control campo-requerido" name="TEXTO2_QUESTION" id="TEXTO2_QUESTION" rows="4"></textarea>
                                    </div>

                                    <div class="mb-3 d-none" id="campoImagen2">
                                        <label class="form-label">{{ __('Upload image:') }}</label>
                                        <input type="file" class="form-control dropify" name="IMAGEN2_QUESTION" id="IMAGEN2_QUESTION" data-allowed-file-extensions="jpg jpeg png gif" >
                                    </div>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="activarSeccionExtra2" name="SECCION_EXTRA2">
                                    <label class="form-check-label" for="activarSeccionExtra2"> {{ __('Would you like to add another section?') }}</label>
                                </div>

                                <div id="seccionExtra2" class="opacity-50 pointer-events-none">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Is this field text or image?') }}</label>
                                        <select class="form-select" id="TIPO3_QUESTION" name="TIPO3_QUESTION" disabled>
                                            <option value="">{{ __('Select...') }}</option>
                                            <option value="1">{{ __('Text') }}</option>
                                            <option value="2">{{ __('Image') }}</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 d-none" id="campoTexto3">
                                        <label class="form-label">{{ __('Enter text:') }}</label>
                                        <textarea class="form-control campo-requerido" name="TEXTO3_QUESTION" id="TEXTO3_QUESTION" rows="4"></textarea>
                                    </div>

                                    <div class="mb-3 d-none" id="campoImagen3">
                                        <label class="form-label">{{ __('Upload image:') }}</label>
                                        <input type="file" class="form-control dropify" name="IMAGEN3_QUESTION" id="IMAGEN3_QUESTION" data-allowed-file-extensions="jpg jpeg png gif"/>
                                    </div>
                                </div>

                            </div>
                            <!-- Sección 6: Respuestas -->
                             <div class="col-md-6 text-center pastel-box">
                                <h4 class="fw-bold mb-4">
                                    <span class="text-secondary"> {{ __('6. ') }}</span>   {{ __('Answers') }}
                                </h4>
                                <div class="mb-3">
                                    <label class="form-label"> {{ __('What kind of response is it?*') }}</label>
                                   <select class="form-select" id="ANSWER_TYPE_QUESTION" name="ANSWER_TYPE_QUESTION" required>
                                        <option value="0"> {{ __('Select...') }}</option>
                                        <option value="1"> {{ __('Number (Killsheet)') }}</option>
                                        <option value="2"> {{ __('Response options') }}</option>
                                    </select>
                                </div>
                                <div class="time-input-group d-none" id="rangoRespuesta">
                                    <label class="form-label small"> {{ __('Response range:') }}</label>
                                    <input type="number" id="MIN_RANGE_QUESTION" name="MIN_RANGE_QUESTION" class="form-control small" placeholder="Min" value="4">
                                    <span>-</span>
                                    <input type="number" id="MAX_RANGE_QUESTION" name="MAX_RANGE_QUESTION" class="form-control small" placeholder="Max" value="9">
                                </div>

                                <div class="mb-3 d-none" id="selectorOpciones">
                                    <label class="form-label"> {{ __('How many answer choices do you want?*') }}</label>
                                    <select class="form-select" id="ANSWER_OPTIONS_QUESTION" name="ANSWER_OPTIONS_QUESTION">
                                        <option value="0">{{ __('Select...') }}</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>
                                </div>

                                <div class="mb-3 d-none" id="selectorCorrectas">
                                    <label class="form-label">{{ __('How many correct answers?*') }}</label>
                                    <select class="form-select" id="CORRECT_ANSWERS_QUESTION" name="CORRECT_ANSWERS_QUESTION">
                                        <option value="0">{{ __('Select...') }}</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="4">5</option>
                                        <option value="4">6</option>
                                        <option value="4">7</option>
                                    </select>
                                </div>

                                <div id="respuestas-container">
                                    <div class="checkbox-container" id="respuesta1">
                                        <div class="checkbox-wrapper">
                                            <input type="checkbox" id="respuesta1-check" name="respuesta_check[]" value="1">
                                            <input type="text" id="respuesta1-text" name="respuesta_text[]" placeholder="Escriba la respuesta 1" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="checkbox-container" id="respuesta2">
                                        <div class="checkbox-wrapper">
                                            <input type="checkbox" id="respuesta2-check" name="respuesta_check[]" value="2">
                                            <input type="text" id="respuesta2-text" name="respuesta_text[]" placeholder="Escriba la respuesta 2" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="checkbox-container" id="respuesta3">
                                        <div class="checkbox-wrapper">
                                            <input type="checkbox" id="respuesta3-check" name="respuesta_check[]" value="3">
                                            <input type="text" id="respuesta3-text" name="respuesta_text[]" placeholder="Escriba la respuesta 3" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="checkbox-container" id="respuesta4">
                                        <div class="checkbox-wrapper">
                                            <input type="checkbox" id="respuesta4-check" name="respuesta_check[]" value="4">
                                            <input type="text" id="respuesta4-text" name="respuesta_text[]" placeholder="Escriba la respuesta 4" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="checkbox-container" id="respuesta5">
                                        <div class="checkbox-wrapper">
                                            <input type="checkbox" id="respuesta5-check" name="respuesta_check[]" value="5">
                                            <input type="text" id="respuesta5-text" name="respuesta_text[]" placeholder="Escriba la respuesta 5" class="form-control">
                                        </div>
                                    </div>

                                     <div class="checkbox-container" id="respuesta6">
                                        <div class="checkbox-wrapper">
                                            <input type="checkbox" id="respuesta6-check" name="respuesta_check[]" value="6">
                                            <input type="text" id="respuesta6-text" name="respuesta_text[]" placeholder="Escriba la respuesta 6" class="form-control">
                                        </div>
                                    </div>

                                     <div class="checkbox-container" id="respuesta7">
                                        <div class="checkbox-wrapper">
                                            <input type="checkbox" id="respuesta7-check" name="respuesta_check[]" value="7">
                                            <input type="text" id="respuesta7-text" name="respuesta_text[]" placeholder="Escriba la respuesta 7" class="form-control">
                                        </div>
                                    </div>

                                     <div class="checkbox-container" id="respuesta8">
                                        <div class="checkbox-wrapper">
                                            <input type="checkbox" id="respuesta8-check" name="respuesta_check[]" value="8">
                                            <input type="text" id="respuesta8-text" name="respuesta_text[]" placeholder="Escriba la respuesta 8" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                
                            
                            </div>

                            <!-- Sección 7: Tiempo y puntaje -->
                             <div class="col-md-4 text-center pastel-box">
                                <h4 class="fw-bold mb-4">
                                    <span class="text-secondary"> {{ __('7. ') }}</span>   {{ __('Time and score') }}
                                </h4>
                                <div class="score-time-container">
                                    <div class="time-input-container">
                                        <label class="form-label">{{ __('Time (minutes)*') }}</label>
                                        <div class="input-icon">
                                            <i class="fas fa-clock"></i>
                                            <input type="number" id="TIME_MINUTES_QUESTION" name="TIME_MINUTES_QUESTION" min="1" step="1" class="form-control" placeholder="Ej: 5" required>
                                        </div>
                                    </div>
                                    
                                    <div class="score-input-container">
                                        <label class="form-label"> {{ __('Score*') }}</label>
                                        <div class="input-icon">
                                            <i class="fas fa-star"></i>
                                            <input type="number" id="SCORE_QUESTION" name="SCORE_QUESTION" min="1" step="1" class="form-control" placeholder="Ej: 10" required>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Sección 8: Tipo de evaluación -->
                            <div class="col-md-4 text-center pastel-box">
                                <h4 class="fw-bold mb-4">
                                    <span class="text-secondary">{{ __('8. ') }}</span> {{ __('Evaluation type') }}
                                </h4>
                                <div class="mb-3">
                                    <label> {{ __('Type(s) of evaluation*') }}</label>
                                    <select class="form-select selectize-multiple" id="EVALUATION_TYPES_QUESTION" name="EVALUATION_TYPES_QUESTION[]" multiple required>
                                        <option value="1"> {{ __('Diagnostic') }}</option>
                                        <option value="2"> {{ __('Intermediate') }}</option>
                                        <option value="3"> {{ __('Final') }}</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Sección 9: Retroalimentación -->
                            <div class="col-md-4 text-center pastel-box">
                                <h4 class="fw-bold mb-4">
                                    <span class="text-secondary">{{ __('9. ') }}</span> {{ __('Feedback') }}
                                </h4>
                                <div class="mb-3">
                                    <label> {{ __('Include feedback*') }}</label>
                                    <select class="form-select selectize-single" id="HAS_FEEDBACK_QUESTION" name="HAS_FEEDBACK_QUESTION" required>
                                        <option value="0">No</option>
                                        <option value="1"> {{ __('Yes') }}</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3 d-none" id="feedbackTextContainer">
                                    <label>{{ __('Feedback text') }}</label>
                                    <textarea class="form-control" id="FEEDBACK_TEXT_QUESTION" name="FEEDBACK_TEXT_QUESTION" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> {{ __('Cancel') }}</button>
                    <button id="saveQuestionBtn" type="button" class="btn btn-primary"> {{ __('Save') }}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="eventModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-calendar-plus"></i>{{ __('Exam Deadline and Activation') }}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="eventForm">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label"><i class="fas fa-file-alt"></i>  {{ __('Assesment title') }}</label>
                                <input type="text" class="form-control" id="eventTitle" required placeholder="Ej: Examen de Matemáticas - Módulo 1">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><i class="fas fa-play"></i>  {{ __('Start Date and Time') }}</label>
                                <input type="date" class="form-control mb-2" id="startDate" required>
                                <div class="time-inputs">
                                    <input type="number" class="form-control" id="startHour" min="0" max="23" placeholder="HH" required>
                                    <span>:</span>
                                    <input type="number" class="form-control" id="startMin" min="0" max="59" placeholder="MM" required>
                                    <span>:</span>
                                    <input type="number" class="form-control" id="startSec" min="0" max="59" placeholder="SS" value="0">
                                </div>
                                <select class="form-select mt-2 timezone-select" id="startTimezone">
                                    <option value="America/Mexico_City">UTC-6 (México Central)</option>
                                    <option value="America/Tijuana">UTC-8 (México Pacífico)</option>
                                    <option value="America/Cancun">UTC-5 (México Este)</option>
                                    <option value="America/New_York">UTC-5 (Este EUA)</option>
                                    <option value="America/Chicago">UTC-6 (Central EUA)</option>
                                    <option value="America/Denver">UTC-7 (Montaña EUA)</option>
                                    <option value="America/Los_Angeles">UTC-8 (Pacífico EUA)</option>
                                    <option value="Europe/Madrid">UTC+1 (España)</option>
                                    <option value="Europe/London">UTC+0 (Reino Unido)</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><i class="fas fa-stop"></i>  {{ __('End Date and Time') }}</label>
                                <input type="date" class="form-control mb-2" id="endDate" required>
                                <div class="time-inputs">
                                    <input type="number" class="form-control" id="endHour" min="0" max="23" placeholder="HH" required>
                                    <span>:</span>
                                    <input type="number" class="form-control" id="endMin" min="0" max="59" placeholder="MM" required>
                                    <span>:</span>
                                    <input type="number" class="form-control" id="endSec" min="0" max="59" placeholder="SS" value="0">
                                </div>
                                <select class="form-select mt-2 timezone-select" id="endTimezone">
                                    <option value="America/Mexico_City">UTC-6 (México Central)</option>
                                    <option value="America/Tijuana">UTC-8 (México Pacífico)</option>
                                    <option value="America/Cancun">UTC-5 (México Este)</option>
                                    <option value="America/New_York">UTC-5 (Este EUA)</option>
                                    <option value="America/Chicago">UTC-6 (Central EUA)</option>
                                    <option value="America/Denver">UTC-7 (Montaña EUA)</option>
                                    <option value="America/Los_Angeles">UTC-8 (Pacífico EUA)</option>
                                    <option value="Europe/Madrid">UTC+1 (España)</option>
                                    <option value="Europe/London">UTC+0 (Reino Unido)</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-users"></i> {{ __('Assigned Groups') }}</label>
                            <select id="gruposSelect" multiple placeholder="Selecciona los grupos...">
                                <option value="grupo1">Fontis - Grupo A</option>
                                <option value="grupo2">Fontis - Grupo B</option>
                                <option value="grupo3">Fontis - Grupo C</option>
                                <option value="grupo4">Fontis - Grupo D</option>
                                <option value="grupo5">Fontis - Grupo E</option>
                                <option value="grupo6">Perenco - Grupo F</option>
                                <option value="grupo7">Perenco - Grupo G</option>
                                <option value="grupo8">Perenco - Grupo H</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-create" id="saveEvent">Guardar Evento {{ __('') }}</button>
                </div>
            </div>
        </div>
    </div>
    <style>
.opcion-item, .pregunta-adicional {
    position: relative;
}
</style>
@endsection
@php
    $css_identifier = 'exercises';
@endphp