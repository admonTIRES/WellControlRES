@extends('Template/maestraUser')
@section('contenido') 
 
    <div class="main-container"> 
        <div class="sidebar-container">
            <div class="section-title">Contenido</div>
            <div class="section-subtitle">Matemáticas para perforación</div>

            <div class="nav-list-container">
                <ul class="nav-list">
                    <li class="nav-item active" data-section="introduction">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">Introducción</span>
                            <span class="nav-item-subtitle">Todo lo que necesitas saber.</span>
                        </div>
                    </li>

                    <li class="nav-item" data-section="config">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">Configuración de la calculadora</span>
                            <span class="nav-item-subtitle">Ajuste de decimales.</span>
                        </div>
                    </li>

                    <li class="nav-item " data-section="partes">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">Partes de la calculadora</span>
                            <span class="nav-item-subtitle">Teclado principal.</span>
                        </div>
                    </li>

                    <li class="nav-item" data-section="funciones">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">Funciones</span>
                            <span class="nav-item-subtitle">Funciones escenciales.</span>
                        </div>
                    </li>

                    <li class="nav-item" data-section="uso">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">Uso</span>
                            <span class="nav-item-subtitle">Uso de la calculadora en el curso.</span>
                        </div>
                    </li>

                    <li class="nav-item" data-section="unidades">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">Unidades de medida</span>
                            <span class="nav-item-subtitle">Conoce las unidades de medida que usaras en este curso.</span>
                        </div>
                    </li>

                    <li class="nav-item" data-section="fraccion">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">Fracción a decimal</span>
                            <span class="nav-item-subtitle">Conversión de fracción a decimal.</span>
                        </div>
                    </li>

                    <li class="nav-item" data-section="jerarquia">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">Jerarquia de Operaciones</span>
                            <span class="nav-item-subtitle">Orden para resolver ecuaciones.</span>
                        </div>
                    </li>

                    <li class="nav-item" data-section="despeje">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">Despejes</span>
                            <span class="nav-item-subtitle">Despejar formulas.</span>
                        </div>
                    </li>
                     <li class="nav-item" data-section="formulas">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">Fórmulas</span>
                            <span class="nav-item-subtitle">Libro de formulas.</span>
                        </div>
                    </li>
                </ul>

              

                <div class="section-title">Ejercicios</div>
                <div class="section-subtitle">Operaciones de pozo</div>

                <ul class="nav-list">
                    <li class="nav-item" data-section="fracciones">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">Fracciones a decimal</span>
                            <span class="nav-item-subtitle">Practica la conversión de fracciones a decimales.</span>
                        </div>
                    </li>

                    <li class="nav-item" data-section="cuadrado">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">Elevar al cuadrado</span>
                            <span class="nav-item-subtitle">Practica la elevación de números al cuadrado.</span>
                        </div>
                    </li>

                    <li class="nav-item" data-section="jerarquias">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">Jerarquía de operaciones</span>
                            <span class="nav-item-subtitle">Practica la jerarquia de operaciones.</span>
                        </div>
                    </li>

                    <li class="nav-item" data-section="despejes">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">Despejes</span>
                            <span class="nav-item-subtitle">Practica los despejes de fórmulas.</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

         <!-- Content Area -->
        <div class="content-container">

            <div id="introduction" class="content-section active scrollable-content">
                <div class="content-title-voice">
                    <h1 class="math-drilling-title">Bienvenido a "Matemáticas para Perforación"</h1>
                    <button id="voiceButtonIntro" class="voice-button" onclick="toggleSpeakText('audioIntro')">
                        <span class="material-icons">volume_up</span> 
                        <span>Escuchar</span>
                    </button>
                    <audio id="audioIntro" src="{{ $audioIntroPath }}"></audio>
                </div>
                <div class="math-drilling-section">
                    <h2 class="math-drilling-subtitle">¿Qué encontrarás en este módulo?</h2>
                    <p class="math-drilling-text">En este módulo, <strong>"Matemáticas para Perforación"</strong>, hemos diseñado un contenido completo y dinámico para apoyarte en tu curso de <strong>Control de Pozos</strong>. Aquí encontrarás una combinación de recursos multimedia, explicaciones claras y ejercicios prácticos que te ayudarán a dominar los conceptos matemáticos esenciales y el uso de la calculadora en este campo.</p>
                </div>

                <div class="math-drilling-section">
                    <h2 class="math-drilling-subtitle">Recursos disponibles</h2>
                    <ul class="math-drilling-list">
                        <li><strong>Videos explicativos</strong>: Tutoriales paso a paso para entender conceptos clave y resolver problemas.</li>
                        <li><strong>Audios</strong>: Explicaciones breves y claras para repasar en cualquier momento.</li>
                        <li><strong>Conceptos teóricos</strong>: Explicaciones detalladas de los fundamentos matemáticos aplicados a la perforación.</li>
                        <li><strong>Ejemplos guiados</strong>: Problemas resueltos con explicaciones claras para que sigas el proceso.</li>
                        <li><strong>Ejercicios prácticos</strong>: Actividades diseñadas para que apliques lo aprendido.</li>
                    </ul>
                </div>

                <div class="math-drilling-section">
                    <div class="math-drilling-exercise">
                        <h3 class="math-drilling-exercise-title">Funciones del módulo:</h3>
                        <p class="math-drilling-exercise-text">Diseño interactivo:</p>
                        <ul class="math-drilling-list">
                            <li>Podrás descubrir funciones especiales al hacer click sobre los elementos de este módulo</li>
                            <li></li>
                        </ul>
                    </div>
                </div>

                <div class="math-drilling-section">
                    <h2 class="math-drilling-subtitle"></h2>
                    <div class="math-drilling-color-palette">
                        <div class="math-drilling-color-box primary">Interacción</div>
                        <div class="math-drilling-color-box secondary">Teoría</div>
                        <div class="math-drilling-color-box dark">Práctica</div>
                        <div class="math-drilling-color-box dark-gray">Repaso</div>
                    </div>
                </div>
            </div>
            <style>
        .video-container {
            position: relative;
            width: 760px;
            height: 515px;
            background-color: #000;
            overflow: hidden;
        }
        
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        
        .controls-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 60px;
            background-color: transparent;
            z-index: 10;
            pointer-events: auto; /* Esto bloquea los clics en la barra superior */
        }
        
        .logo-blocker {
            position: absolute;
            top: 0;
            left: 0;
            width: 150px;
            height: 60px;
            z-index: 15;
            pointer-events: auto; /* Esto bloquea los clics en el logo */
            background-color: transparent;
        }
        
        /* Nuevo bloqueador de clic derecho que cubre todo el reproductor */
        .right-click-blocker {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 5; /* Por debajo de los otros controles pero encima del iframe */
            background-color: transparent;
            pointer-events: none; /* Permitimos que los clics pasen a través por defecto */
        }
        
        .custom-controls {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 50px;
            background-color: rgba(0, 0, 0, 0);
            z-index: 20;
            display: flex;
            align-items: center;
            padding: 0 15px;
            box-sizing: border-box;
        }
        
        .play-pause {
            width: 30px;
            height: 30px;
            background-color: transparent;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        
        .progress-bar {
            flex-grow: 1;
            height: 5px;
            background-color: #444;
            margin: 0 15px;
            position: relative;
            cursor: pointer;
        }
        
        .progress {
            height: 100%;
            background-color: #f00;
            width: 0%;
        }
        
        .volume-control {
            width: 30px;
            height: 30px;
            background-color: transparent;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .watermark {
            position: absolute;
            bottom: 50px;
            right: 20px;
            color: rgba(255, 255, 255, 0.42);
            font-family: Arial, sans-serif;
            font-size: 12px;
            z-index: 5;
            pointer-events: none;
        }
    </style>
            <div id="config" class="content-section scrollable-content">
                <div class="content-title-voice">
                    <h1 class="math-drilling-title">Configuración de calculadora científica</h1>
                    <button id="voiceButtonConfig" class="voice-button" onclick="toggleSpeakText('audioConfig')">
                        <span class="material-icons">volume_up</span> 
                        <span>Escuchar</span>
                    </button>
                    <audio id="audioConfig" src="{{ $audioConfigPath }}"></audio>
                </div>
                <div class="math-drilling-section">
                    <h2 class="math-drilling-subtitle">Ajuste de decimales para el curso de control de pozos</h2>
                    <p class="math-drilling-text">
                        Para configurar tu calculadora científica Casio y mostrar tres decimales en los resultados, sigue estos pasos:
                    </p>
                    
                    
                </div>
                <div class="math-drilling-section">
                    <div class="math-drilling-exercise">
                        <ul class="math-drilling-list">
                            <li>Enciende la calculadora y presiona la tecla <code>MODE</code> varias veces hasta que aparezca la opción de configuración.</li>
                            <li>Cuando veas las opciones <code>Fix</code>, <code>Sci</code> y <code>Norm</code> en la pantalla, selecciona <code>Fix</code> para establecer un número fijo de decimales.</li>
                            <li>Después de seleccionar <code>Fix</code>, ingresa el número <code>3</code> para que la calculadora muestre tres decimales en los resultados.</li>
                            <li>Si deseas volver al formato de visualización estándar, repite el proceso y selecciona <code>Norm</code> en lugar de <code>Fix</code>.</li>
                        </ul>
                    </div>
                </div>
                <p class="math-drilling-text">
                        Para una guía visual detallada, consulta el siguiente video:
                </p>
                <div id="video-container" class="math-drilling-video">
                <iframe 
                    src="https://drive.google.com/file/d/1o5N8sYIQjEPkJ8pYI7OtHA7B63/preview" 
                    width="760" 
                    height="515"
                    frameborder="0" 
                    allowfullscreen>
                    </iframe>
                </div>
                <div id="secure-video-container" class="video-container">
                    <!-- El iframe estará oculto y se cargará dinámicamente -->
                    <div id="video-frame-container"></div>
                    
                    <!-- Bloqueo específico para la parte superior -->
                    <div class="controls-overlay"></div>
                    
                    <!-- Bloqueo específico para el logo -->
                    <div class="logo-blocker"></div>
                    <div class="right-click-blocker" id="right-click-blocker"></div>
                    <!-- Marca de agua personalizada -->
                    <div class="watermark">Contenido exclusivo</div>
                    <div class="custom-controls">
                    </div>

                </div>
            </div>

            <div id="partes" class="content-section scrollable-content">
                <div class="calculator-layout">
                    @include('Calculator.itemCalculator', ['id' => 'calculator1'])
                    <div class="math-drilling-section">
                        <div class="math-drilling-exercise">
                            <h3 class="math-drilling-exercise-title">Partes de la calculadora:</h3>
                            <ul class="calculator-parts-list">
                                <li data-section="screen" class="calculator-part pantalla">
                                    <strong>Pantalla</strong>
                                    <span class="desc">Donde se muestran los resultados y las operaciones.</span>
                                </li>
                                <li data-section="seccion1" class="calculator-part seccion-principal">
                                    <strong>Sección principal</strong>
                                    <span class="desc">Suma, resta, multiplicación y división.</span>
                                </li>
                                <li data-section="seccion2" class="calculator-part funciones-avanzadas">
                                    <strong>Funciones avanzadas</strong>
                                    <span class="desc">Elevar al cuadrado, calcular raíces cuadradas y funciones trigonométricas.</span>
                                </li>
                                <li data-section="seccion3" class="calculator-part teclado-numerico">
                                    <strong>Teclado numérico</strong>
                                    <span class="desc">Para ingresar números.</span>
                                </li>
                                <li data-section="seccion4" class="calculator-part interruptor-borrado">
                                    <strong>Interruptor y borrado</strong>
                                    <span class="desc">Permite borrar el contenido de la calculadora o apagarla.</span>
                                </li>
                                <li data-section="seccion5" class="calculator-part operaciones-basicas">
                                    <strong>Operaciones matemáticas básicas</strong>
                                    <span class="desc">Operadores básicos para realizar sumas, restas, multiplicaciones y divisiones.</span>
                                </li>
                                <li data-section="seccion6" class="calculator-part resultado-ans">
                                    <strong>Resultado y ANS</strong>
                                    <span class="desc">Para calcular el resultado de una operación y obtener la última respuesta (Ans).</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="content-title-voice">
                        <button id="voiceButtonParts" class="voice-button" onclick="toggleSpeakText('audioParts')">
                            <span class="material-icons">volume_up</span> 
                            <span>Escuchar</span>
                        </button>
                        <audio id="audioParts" src="{{ $audioPartsPath }}"></audio>
                    </div>
                </div>
            </div>
            
            <div id="funciones" class="content-section scrollable-content">
                <div class="calculator-layout">
                    <!-- <div class="calculator-preview"></div> -->
                    @include('Calculator.itemCalculator', ['id' => 'calculator2'])
                    <div class="math-drilling-section">
                        <div class="math-drilling-exercise">
                            <h3 class="math-drilling-exercise-title">Funciones principales de la calculadora:</h3>
                            <p>
                            La calculadora científica cuenta con diversas funciones que te serán útiles<br> en este curso.  Estas funciones te ayudarán a realizar cálculos relacionados <br>con las operaciones de perforación, presión, temperatura y otros <br>aspectos críticos en la industria. <br><br>Las funciones principales incluyen:
                            </p>
                            <ul class="calculator-parts-list">
                                <li data-section="sum" class="calculator-part pantalla">
                                    <strong>+ Suma</strong>
                                    <span class="desc">Permite realizar cálculos de sumas entre diferentes valores,<br> como la adición de profundidades de perforación, volúmenes<br> de fluidos y otros datos relevantes.</span>
                                </li>
                                <li data-section="rest" class="calculator-part seccion-principal">
                                    <strong>- Resta</strong>
                                    <span class="desc">Herramienta esencial para calcular diferencias entre valores, <br>como la reducción de profundidades, la disminución de volúmenes <br>de fluidos o la comparación de presiones en diferentes etapas<br> de la perforación.</span>
                                </li>
                                <li data-section="multiplicate" class="calculator-part funciones-avanzadas">
                                    <strong>x Multiplicación</strong>
                                    <span class="desc">Función utilizada para calcular operaciones como la multiplicación <br>de presiones, volúmenes o cualquier otro dato crítico que requiera una <br>proporción entre variables.</span>
                                </li>
                                <li data-section="division" class="calculator-part teclado-numerico">
                                    <strong>÷ División</strong>
                                    <span class="desc">Permite dividir valores como caudales, volúmenes de fluidos <br>y otros elementos necesarios para las operaciones de perforación.</span>
                                </li>
                                <li data-section="elevate" class="calculator-part interruptor-borrado">
                                    <strong>x² Elevación al cuadrado</strong>
                                    <span class="desc">Una función útil para realizar cálculos relacionados con la <br>resistencia de materiales, áreas de perforación o cálculo de presión en <br>funciones cuadráticas.</span>
                                </li>
                                <li data-section="parentesis" class="calculator-part operaciones-basicas">
                                    <strong>() Paréntesis</strong>
                                    <span class="desc">Permite agrupar operaciones para priorizar cálculos complejos, <br>como la combinación de presiones, volúmenes y profundidades <br>en ecuaciones avanzadas de control de pozos.</span>
                                </li>
                                <li data-section="result" class="calculator-part resultado-ans">
                                    <strong>= Resultado</strong>
                                    <span class="desc">Muestra el resultado final de los cálculos realizados, proporcionando <br>un valor preciso para la toma de decisiones en operaciones <br>de perforación y control de pozos.</span>
                                </li>
                                <li data-section="percent" class="calculator-part porcentaje-ans">
                                    <strong>% Porcentaje</strong>
                                    <span class="desc">Obtiene el procentaje del valor escrito a su izquierda, <br>útil en obtención de porcentajes de operaciones de <br>de perforación y control de pozos.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="content-title-voice">
                        <button id="voiceButtonFunctions" class="voice-button" onclick="toggleSpeakText('audioFunctions')">
                            <span class="material-icons">volume_up</span> 
                            <span>Escuchar</span>
                        </button>
                        <audio id="audioFunctions" src="{{ $audioFunctionsPath }}"></audio>
                    </div>
                </div>
            </div>

            <div id="uso" class="content-section scrollable-content">
                <div class="content-title-voice">
                    <h1 class="math-drilling-title">Uso</h1>
                    <button id="voiceButtonUse" class="voice-button" onclick="toggleSpeakText('audioUse')">
                        <span class="material-icons">volume_up</span> 
                        <span>Escuchar</span>
                    </button>
                    <audio id="audioUse" src="{{ $audioUsePath }}"></audio>
                </div>
                <div class="hero-grid">
                    <div class="card">
                        <img src="/assets/images/calculator/uses_image.jpg" alt="Hannah Laurent" class="profile-img">
                        <div class="overlay"></div>
                        <div class="text-content">
                            <h2>Cálculo de presiones hidrostáticas</h2>
                            <p class="hero-text">Esencial para garantizar la estabilidad del pozo. La calculadora permite resolver rápidamente la presión ejercida por el fluido de perforación, evitando sobrepresiones o colapsos en las formaciones. Se usa la fórmulaP=ρ⋅g⋅h, donde se consideran la densidad del lodo, la gravedad y la profundidad.</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="/assets/images/calculator/uses_image2.jpg" alt="Hannah Laurent" class="profile-img">
                        <div class="overlay"></div>
                        <div class="text-content">
                        <h2 class="hero-title">Conversión de unidades</h2>
                            <p class="hero-text">En la industria petrolera, es común trabajar con unidades mixtas (métricas e imperiales). La calculadora agiliza la conversión entre psi y bar, metros y pies, o galones y litros, asegurando precisión en los informes y operaciones.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="hero-grid">
                    <div class="card">
                        <img src="/assets/images/calculator/uses_image3.jpg" alt="Hannah Laurent" class="profile-img">
                        <div class="overlay"></div>
                        <div class="text-content">
                        <h2 class="hero-title">Cálculo de volúmenes de lodo:</h2>
                            <p class="hero-text">Permite determinar cuánto lodo se necesita para llenar el pozo o realizar desplazamientos. Con la fórmula del volumen de un cilindro (V=π⋅r 2⋅h), se calcula el espacio que ocupará el fluido en el pozo, evitando desbalances.</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="/assets/images/calculator/uses_image4.jpeg" alt="Hannah Laurent" class="profile-img">
                        <div class="overlay"></div>
                        <div class="text-content">
                        <h2 class="hero-title">Análisis de gradientes de presión</h2>
                            <p class="hero-text">Permite evaluar cómo cambia la presión con la profundidad, lo que es vital para prevenir fracturas en la formación o derrumbes. Con la calculadora, se pueden resolver rápidamente estos gradientes y tomar decisiones operativas.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="unidades" class="content-section scrollable-content">
                <div class="content-title-voice">
                    <h1 class="math-drilling-title">Unidades de medida</h1>
                    <button id="voiceButtonUnit" class="voice-button" onclick="toggleSpeakText('audioUnit')">
                        <span class="material-icons">volume_up</span> 
                        <span>Escuchar</span>
                    </button>
                    <audio id="audioUnit" src="{{ $audioUnitPath }}"></audio>
                </div>
                <div class="math-drilling-section">
                    <h2 class="math-drilling-subtitle">Unidades de medida en el control de pozos</h2>
                    <p class="math-drilling-text">
                        En el control de pozos, es fundamental comprender y convertir entre diferentes unidades de medida para garantizar la precisión en los cálculos y operaciones. A continuación, se presentan las unidades más comunes y su aplicación.
                    </p>
                </div>

                
                <iframe allowfullscreen="" scrolling="no" class="fp-iframe" style="border: 1px solid lightgray; width: 1030px; height: 625px;" src="https://heyzine.com/flip-book/09a8bd58bd.html"></iframe>
                        
      
                <iframe allowfullscreen="" scrolling="no" class="fp-iframe" style="border: 1px solid lightgray; width: 1030px; height: 625px;" src="https://heyzine.com/flip-book/cfabd8084d.html"></iframe>
                        
                <a href="https://online.flippingbook.com/view/1004572368/" class="fbo-embed" data-fbo-id="5c936405ec" data-fbo-ratio="3:2" data-fbo-lightbox="yes" data-fbo-width="100%" data-fbo-height="auto" data-fbo-version="1" style="max-width: 100%">Your demo flipbook</a><script async defer src="https://online.flippingbook.com/EmbedScriptUrl.aspx?m=redir&hid=1004572368"></script>

                <div class="math-drilling-section">
                    <div class="math-drilling-exercise">
                        <h3 class="math-drilling-subtitle">Unidades de longitud</h3>
                        <ul class="math-drilling-list">
                            <li><strong>Pies (ft)</strong>: Utilizados para medir profundidades de perforación.</li>
                            <li><strong>Metros (m)</strong>: Comúnmente usados en sistemas métricos.</li>
                            <li><strong>Conversión</strong>: 1 pie = 0.3048 metros.</li>
                        </ul>
                        <p class="math-drilling-text">
                            
                        </p>
                        <img src="/assets/images/calculator/piesametros.jpg" alt="Conversión de pies a metros" class="math-drilling-image">
                    </div>
                </div>

                <div class="math-drilling-section">
                    <div class="math-drilling-exercise">
                        <h3 class="math-drilling-subtitle">Unidades de volumen</h3>
                        <ul class="math-drilling-list">
                            <li><strong>Barriles (bbl)</strong>: Usados para medir volúmenes de fluidos.</li>
                            <li><strong>Galones (gal)</strong>: Comunes en operaciones de bombeo.</li>
                            <li><strong>Conversión</strong>: 1 barril = 42 galones.</li>
                        </ul>

                    </div>
                </div>

                <div class="math-drilling-section">
                    <div class="math-drilling-exercise">
                        <h3 class="math-drilling-subtitle">Unidades de presión</h3>
                        <ul class="math-drilling-list">
                            <li><strong>Libras por pulgada cuadrada (psi)</strong>: Utilizadas para medir presión en el pozo.</li>
                            <li><strong>Bares (bar)</strong>: Comunes en sistemas internacionales.</li>
                            <li><strong>Conversión</strong>: 1 bar = 14.5038 psi.</li>
                        </ul>

                    </div>
                </div>

                <p class="math-drilling-text">
                    Para una explicación más detallada sobre las unidades de medida en el control de pozos, consulta el siguiente video:
                </p>
                <div class="math-drilling-video">
                        <iframe width="760" height="515" src="https://www.youtube.com/embed/V_N_mALVOgM?si=VyZazYyc32j5r8wH" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>

            <div id="fraccion" class="content-section scrollable-content">
                <div class="content-title-voice">
                    <h1 class="math-drilling-title">Convertir de fracción a decimal</h1>
                    <button id="voiceButtonFraction" class="voice-button" onclick="toggleSpeakText('audioFraction')">
                        <span class="material-icons">volume_up</span> 
                        <span>Escuchar</span>
                    </button>
                    <audio id="audioFraction" src="{{ $audioFractionPath }}"></audio>
                </div>
                <div class="math-drilling-section">
                    <h2 class="math-drilling-subtitle">¿Qué es una fracción y cómo convertirla a decimal?</h2>
                    <p class="math-drilling-text">
                        Una fracción representa una parte de un todo. En el control de pozos, es común trabajar con fracciones para medir diámetros, profundidades y otros parámetros. Convertir una fracción a decimal es esencial para realizar cálculos precisos.
                    </p>
                </div>

                <div class="math-drilling-section">
                    <div class="math-drilling-exercise">
                        <h3 class="math-drilling-subtitle">Pasos para convertir una fracción a decimal</h3>
                        <ul class="math-drilling-list">
                            <li>Divide el numerador (el número de arriba) entre el denominador (el número de abajo).</li>
                            <li>Ejemplo: Para convertir <code>3/4</code> a decimal, divide 3 entre 4. El resultado es <code>0.75</code>.</li>
                            <li>Si la fracción es mixta (por ejemplo, <code>1 3/4</code>), convierte primero la parte fraccionaria y luego súmala al número entero.</li>
                            <li>Ejemplo: <code>1 3/4</code> se convierte en <code>1 + 0.75 = 1.75</code>.</li>
                        </ul>
                    </div>
                </div>

                <div class="math-drilling-section">
                    <h3 class="math-drilling-subtitle">Ejemplos prácticos</h3>
                    <p class="math-drilling-text">
                        Aquí tienes algunos ejemplos comunes de conversión de fracciones a decimales:
                    </p>
                    <ul class="math-drilling-list">
                        <li><code>1/2</code> = 0.5</li>
                        <li><code>3/8</code> = 0.375</li>
                        <li><code>5/16</code> = 0.3125</li>
                        <li><code>7/8</code> = 0.875</li>
                    </ul>
                </div>

                <div class="math-drilling-section">
                    <h3 class="math-drilling-subtitle">Uso en el control de pozos</h3>
                    <p class="math-drilling-text">
                        En el control de pozos, las fracciones se utilizan para medir diámetros de tuberías, tamaños de brocas y otros parámetros. Convertir estas fracciones a decimales facilita los cálculos de presión, volumen y profundidad.
                    </p>
                </div>

                <p class="math-drilling-text">
                    Para una explicación más detallada, consulta el siguiente video:
                </p>
                <div class="math-drilling-video">
                        <iframe width="760" height="515" src="https://www.youtube.com/embed/pOm1azhMuYM?si=21a84f3bWjt4aJhT" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>

            <div id="jerarquia" class="content-section scrollable-content">
                <div class="content-title-voice">
                    <h1 class="math-drilling-title">Jerarquía de Operaciones</h1>
                    <button id="voiceButtonHierarchy" class="voice-button" onclick="toggleSpeakText('audioHierarchy')">
                        <span class="material-icons">volume_up</span> 
                        <span>Escuchar</span>
                    </button>
                    <audio id="audioHierarchy" src="{{ $audioHierarchyPath }}"></audio>
                </div>
                <div class="math-drilling-section">
                    <h2 class="math-drilling-subtitle">El orden en que se deben resolver las ecuaciones</h2>
                    <p class="math-drilling-text">
                    La jerarquía de operaciones establece el orden en el que debemos realizar las operaciones matemáticas para obtener un resultado correcto.
                    </p>
                </div>

                <div class="math-drilling-section">
                    <div class="math-drilling-exercise">
                        <h3 class="math-drilling-subtitle">PEMDAS</h3>
                        <img src="/assets/images/calculator/pemdas.webp" alt="Conversión de pies a metros" class="math-drilling-image">
                    </div>
                </div>

                <p class="math-drilling-text">
                    Para una explicación más detallada sobre las unidades de medida en el control de pozos, consulta el siguiente video:
                </p>
                <div class="math-drilling-video">
                <iframe width="760" height="515" src="https://www.youtube.com/embed/XV5PiV2-91U?si=QB9NeqFzGztOC0ix" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>

            <div id="despeje" class="content-section scrollable-content">
                <div class="content-title-voice">
                    <h1 class="math-drilling-title">Despejes</h1>
                    <button id="voiceButtonClearance" class="voice-button" onclick="toggleSpeakText('audioClearance')">
                        <span class="material-icons">volume_up</span> 
                        <span>Escuchar</span>
                    </button>
                    <audio id="audioClearance" src="{{ $audioClearancePath }}"></audio>
                </div>
                <div class="math-drilling-section">
                    <h2 class="math-drilling-subtitle">¿Qué es un despeje y por qué es importante?</h2>
                    <p class="math-drilling-text">
                        Despejar una variable en una fórmula es fundamental en el control de pozos, ya que permite calcular valores desconocidos a partir de datos conocidos. Esto es especialmente útil en cálculos de presión, volumen y profundidad.
                    </p>
                </div>

                <div class="math-drilling-section">
                    <div class="math-drilling-exercise">
                        <h3 class="math-drilling-subtitle">Pasos para despejar una variable</h3>
                        <ul class="math-drilling-list">
                            <li>Identifica la variable que deseas despejar.</li>
                            <li>Aplica operaciones inversas (suma/resta, multiplicación/división) para aislar la variable.</li>
                            <li>Simplifica la ecuación hasta que la variable quede sola en un lado de la igualdad.</li>
                            <li>Verifica tu resultado sustituyendo los valores conocidos en la ecuación original.</li>
                        </ul>
                    </div>
                </div>

                <div class="math-drilling-section">
                    <h3 class="math-drilling-subtitle">Ejemplos prácticos</h3>
                    <p class="math-drilling-text">
                        Aquí tienes algunos ejemplos comunes de despejes en fórmulas utilizadas en el control de pozos:
                    </p>
                    <ul class="math-drilling-list">
                        <li><strong>Presión hidrostática</strong>: Despejar la profundidad (<code>h</code>) en la fórmula <code>P = ρ * g * h</code>.</li>
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/khfgU8a0ZRY?si=sdDxSXCtWJ3VtJu6" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        <li><strong>Volumen de fluido</strong>: Despejar el radio (<code>r</code>) en la fórmula <code>V = π * r² * h</code>.</li>
                        <li><strong>Gradiente de presión</strong>: Despejar la densidad (<code>ρ</code>) en la fórmula <code>GP = ρ * g</code>.</li>
                    </ul>
                </div>

                <div class="math-drilling-section">
                    <h3 class="math-drilling-subtitle">Uso en el control de pozos</h3>
                    <p class="math-drilling-text">
                        En el control de pozos, los despejes se utilizan para calcular variables críticas como la presión, el volumen de fluidos y la profundidad. Estas operaciones son esenciales para garantizar la seguridad y eficiencia en las operaciones de perforación.
                    </p>
                </div>

                <p class="math-drilling-text">
                    Para una explicación más detallada, consulta el siguiente video:
                </p>
                <div class="math-drilling-video">
                <iframe width="760" height="515" src="https://www.youtube.com/embed/NTRMq6nI4OU?si=wdOa9wVdwBGzeU4A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>

            <div id="formulas" class="content-section scrollable-content">
                <div class="content-title-voice">
                    <h1 class="math-drilling-title">Fórmulas</h1>
                    <button id="voiceButtonFormula" class="voice-button" onclick="toggleSpeakText('audioFormula')">
                        <span class="material-icons">volume_up</span> 
                        <span>Escuchar</span>
                    </button>
                    <audio id="audioFormula" src="{{ $audioFormulaPath }}"></audio>
                </div>
                <div class="math-drilling-section">
                    <h2 class="math-drilling-subtitle">Libro de fórmulas para el curso de control de pozos IWCF</h2>
                </div>

                <iframe allowfullscreen="allowfullscreen" scrolling="no" class="fp-iframe" src="https://heyzine.com/flip-book/99431bfc85.html" style="border: 0px; width: 1030px; height: 625px;"></iframe>
                <div class="math-drilling-section">
                    <h2 class="math-drilling-subtitle">Libro de fórmulas para el curso de control de pozos IADC</h2>
                </div>
                    <iframe allowfullscreen="allowfullscreen" scrolling="no" class="fp-iframe" src="https://heyzine.com/flip-book/8bd0b3bf0e.html" style="border: 1px solid lightgray; width: 1030px; height: 625px;"></iframe>
                        <div class="math-drilling-section">
                    <h2 class="math-drilling-subtitle">Libro de fórmulas para el curso de control de pozos IADC - redondeo</h2>
                </div>
                        <iframe allowfullscreen="allowfullscreen" scrolling="no" class="fp-iframe" src="https://heyzine.com/flip-book/5a68b9cd5e.html" style="border: 1px solid lightgray; width: 1030px; height: 625px;"></iframe>
            </div>

            <!-- exercices section -->
            <div id="fracciones" class="content-section scrollable-content">
                <div class="math-drilling-section">
                    <h2 class="math-drilling-subtitle">Conversión de Fracción a Decimal</h2>
                </div>
                <div class="exercise-container">
                    <div class="exercise-content">
                        <h2 class="exercise-title">Ejercicio 1</h2>
                        <p class="exercise-description">
                            Convierta las siguiente fracciones a decimal y escriba el resultado en el cuadro correspondiente:
                        </p>
                        <div class="exercise-container">
                            <p class="exercise-description">
                               7 ÷ 8 =
                            </p>
                            <label class="result-label" for="result-1"></label>
                            <input type="number" class="result-input" id="result-1">
                            <span class="feedback" id="feedback-1"></span>
                        </div>
                        <div class="math-answer-exercise">
                            <p class="math-drilling-text">
                                La respuesta correcta es <strong> 0.8758</strong> 
                            </p>
                            <button id="fraccion_1" class="answer-button" onclick="showExample(0,7,8)">Ver en calculadora</button>
                        </div>

                        <div class="exercise-container">
                            <p class="exercise-description">
                            8 1/2" =
                            </p>
                            <input type="number" class="result-input" id="result-2">
                            <span class="feedback" id="feedback-2"></span>
                        </div>
                        <div class="math-answer-exercise">
                            <p class="math-drilling-text">
                                La respuesta correcta es <strong> 8.5</strong> 
                            </p>
                            <button id="fraccion_2" class="answer-button" onclick="showExample(8,1,2)">Ver en calculadora</button>
                        </div>

                        <div class="exercise-container">
                            <p class="exercise-description">
                                9 1/4" =
                            </p>
                            <input type="number" class="result-input" id="result-3">
                            <span class="feedback" id="feedback-3"></span>
                        </div>
                        <div class="math-answer-exercise">
                            <p class="math-drilling-text">
                                La respuesta correcta es <strong> 9.25</strong> 
                            </p>
                            <button id="fraccion_3" class="answer-button" onclick="showExample(9,1,4)">Ver en calculadora</button>
                        </div>

                        <div class="exercise-container">
                            <p class="exercise-description">
                                3 ÷ 8 =
                            </p>
                            <input type="number" class="result-input" id="result-4">
                            <span class="feedback" id="feedback-4"></span>
                        </div>
                        <div class="math-answer-exercise">
                            <p class="math-drilling-text">
                                La respuesta correcta es <strong> 0.375</strong> 
                            </p>
                            <button id="fraccion_4" class="answer-button" onclick="showExample(0,3,8)">Ver en calculadora</button>
                        </div>

                        <div class="exercise-container">
                            <p class="exercise-description">
                                15 ÷ 4 =
                            </p>
                            <input type="number" class="result-input" id="result-5">
                            <span class="feedback" id="feedback-5"></span>
                        </div>
                        <div class="math-answer-exercise">
                            <p class="math-drilling-text">
                                La respuesta correcta es <strong> 3.75</strong> 
                            </p>
                            <button id="fraccion_5" class="answer-button" onclick="showExample(0,15,4)">Ver en calculadora</button>
                        </div>

                        <div class="button-container">
                            <button id="ejercicio1_btn" class="submit-button">
                            <span class="icon">
                                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgMjQgMjQiPjxnIGZpbGw9Im5vbmUiIHN0cm9rZT0iI2ZmZmZmZiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBzdHJva2Utd2lkdGg9IjIiPjxwYXRoIHN0cm9rZS1kYXNoYXJyYXk9IjY0IiBzdHJva2UtZGFzaG9mZnNldD0iNjQiIGQ9Ik0zIDEyYzAgLTQuOTcgNC4wMyAtOSA5IC05YzQuOTcgMCA5IDQuMDMgOSA5YzAgNC45NyAtNC4wMyA5IC05IDljLTQuOTcgMCAtOSAtNC4wMyAtOSAtOVoiPjxhbmltYXRlIGZpbGw9ImZyZWV6ZSIgYXR0cmlidXRlTmFtZT0ic3Ryb2tlLWRhc2hvZmZzZXQiIGR1cj0iMC42cyIgdmFsdWVzPSI2NDswIi8+PC9wYXRoPjxwYXRoIHN0cm9rZS1kYXNoYXJyYXk9IjE0IiBzdHJva2UtZGFzaG9mZnNldD0iMTQiIGQ9Ik04IDEybDMgM2w1IC01Ij48YW5pbWF0ZSBmaWxsPSJmcmVlemUiIGF0dHJpYnV0ZU5hbWU9InN0cm9rZS1kYXNob2Zmc2V0IiBiZWdpbj0iMC42cyIgZHVyPSIwLjJzIiB2YWx1ZXM9IjE0OzAiLz48L3BhdGg+PC9nPjwvc3ZnPg==" alt="Revisar">
                                    
                                </span> Revisar
                            </button>
                            <button id="reset_btn" class="reset-button">
                                <span class="icon">
                                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgNTEyIDUxMiI+PHBhdGggZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZmZmZmZmIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLXdpZHRoPSIzMiIgZD0ibTQwMCAxNDhsLTIxLjEyLTI0LjU3QTE5MS40MyAxOTEuNDMgMCAwIDAgMjQwIDY0QzEzNCA2NCA0OCAxNTAgNDggMjU2czg2IDE5MiAxOTIgMTkyYTE5Mi4wOSAxOTIuMDkgMCAwIDAgMTgxLjA3LTEyOCIvPjxwYXRoIGZpbGw9IiNmZmZmZmYiIGQ9Ik00NjQgOTcuNDJWMjA4YTE2IDE2IDAgMCAxLTE2IDE2SDMzNy40MmMtMTQuMjYgMC0yMS40LTE3LjIzLTExLjMyLTI3LjMxTDQzNi42OSA4Ni4xQzQ0Ni43NyA3NiA0NjQgODMuMTYgNDY0IDk3LjQyIi8+PC9zdmc+" alt="Reiniciar">
                                </span> Reiniciar
                            </button>
                        </div>
                    </div>
                    <div class="calculator-container">
                    @include('Calculator.itemCalculator', ['id' => 'calculator3'])
                    </div>
                </div>
            </div>

            <div id="cuadrado" class="content-section scrollable-content">
                <h1 class="content-title">Ejercicios de elevaciones al cuadrado</h1>
                <div class="exercise-container">
                    <div class="exercise-content">
                        <!-- Pregunta 1 -->
                        <div class="question">
                            <h2 class="exercise-title">Pregunta 1</h2>
                            <p class="exercise-description">
                                Encuentre la salida bbl/emb al 100% de la bomba triplex. Pistón 7" x 12 long
                            </p>
                            <div class="text-grid">
                                <div>Pistón² x longitud x 0.000243 </div>
                            </div>
                            <div class="options">
                                <label>
                                    <input id="cuadrado_1" type="radio" name="q1" value="A"> A) 0.1428 bbl/ft
                                </label>
                                <label>
                                    <input id="cuadrado_1" type="radio" name="q1" value="B"> B) 0.0525 bbl/ft
                                </label>
                                <label>
                                    <input id="cuadrado_1" type="radio" name="q1" value="C"> C) 0.0612 bbl/ft
                                </label>
                                <label>
                                    <input id="cuadrado_1" type="radio" name="q1" value="D"> D) 0.0723 bbl/ft
                                </label>
                            </div>
                            <span class="feedback" id="feedback-q1"></span>
                            <div class="math-answer-exercise" id="answer-1">
                                <p class="math-drilling-text">
                                    La respuesta correcta es <strong>0.0525 bbl/ft</strong>.
                                </p>
                                <button class="answer-button" onclick="showExampleElevate(1)">Ver en calculadora</button>
                                <button id="solution1_btn" class="solution-button" onclick="showSolution(1)">
                                    <span class="icon">
                                            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgMjQgMjQiPjxwYXRoIGZpbGw9Im5vbmUiIHN0cm9rZT0iI2ZmZmZmZiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBzdHJva2Utd2lkdGg9IjIiIGQ9Ik00IDIwaDRMMTguNSA5LjVhMi44MjggMi44MjggMCAxIDAtNC00TDQgMTZ6bTkuNS0xMy41bDQgNE0xNSAxOWwyIDJsNC00Ii8+PC9zdmc+" alt="Revisar">    
                                    </span> Ver solución
                                </button>
                            </div>
                            <div class="math-drilling-section">
                                <div id="solution1" class="math-drilling-solution">
                                    <img src="/assets/images/calculator/solutions/sol 1.png" alt="Conversión de pies a metros" class="solution-image">
                                </div>
                            </div>
                        </div>

                                <!-- Pregunta 2 -->
                        <div class="question">
                            <h2 class="exercise-title">Pregunta 2</h2>
                            <p class="exercise-description">
                                Calcule la presión hidrostática a 10,000 pies si la densidad del lodo es 12.5 ppg.
                            </p>
                            <div class="text-grid">
                                <div>Pistón² x longitud x 0.000243 </div>
                            </div>
                            <div class="options">
                                <label>
                                    <input type="radio" name="q2" value="A"> A) 5,200 psi
                                </label>
                                <label>
                                    <input type="radio" name="q2" value="B"> B) 6,500 psi
                                </label>
                                <label>
                                    <input type="radio" name="q2" value="C"> C) 7,800 psi
                                </label>
                                <label>
                                    <input type="radio" name="q2" value="D"> D) 8,100 psi
                                </label>
                            </div>
                            <span class="feedback" id="feedback-q2"></span>
                            <div class="math-answer-exercise" id="answer-2">
                                <p class="math-drilling-text">
                                    La respuesta correcta es <strong>6,500 psi</strong>.
                                </p>
                                <button class="answer-button" onclick="showExampleElevate(2)">Ver en calculadora</button>
                                <button id="solution2_btn" class="solution-button">
                                    <span class="icon">
                                            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgMjQgMjQiPjxwYXRoIGZpbGw9Im5vbmUiIHN0cm9rZT0iI2ZmZmZmZiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBzdHJva2Utd2lkdGg9IjIiIGQ9Ik00IDIwaDRMMTguNSA5LjVhMi44MjggMi44MjggMCAxIDAtNC00TDQgMTZ6bTkuNS0xMy41bDQgNE0xNSAxOWwyIDJsNC00Ii8+PC9zdmc+" alt="Revisar">    
                                    </span> Ver solución
                                </button>
                            </div>
                        </div>

                        <!-- Pregunta 3 -->
                        <div class="question">
                            <h2 class="exercise-title">Pregunta 3</h2>
                            <p class="exercise-description">
                                ¿Cuál es el gradiente de presión para un lodo con densidad de 10 ppg?
                            </p>
                            <div class="text-grid">
                                <div>Pistón² x longitud x 0.000243 </div>
                            </div>
                            <div class="options">
                                <label>
                                    <input type="radio" name="q3" value="A"> A) 0.52 psi/ft
                                </label>
                                <label>
                                    <input type="radio" name="q3" value="B"> B) 0.65 psi/ft
                                </label>
                                <label>
                                    <input type="radio" name="q3" value="C"> C) 0.78 psi/ft
                                </label>
                                <label>
                                    <input type="radio" name="q3" value="D"> D) 0.81 psi/ft
                                </label>
                            </div>
                            <span class="feedback" id="feedback-q3"></span>
                            <div class="math-answer-exercise" id="answer-3">
                                <p class="math-drilling-text">
                                    La respuesta correcta es <strong>0.52 psi/ft</strong>.
                                </p>
                                <button class="answer-button" onclick="showExampleElevate(3)">Ver en calculadora</button>
                                <button id="solution3_btn" class="solution-button">
                                    <span class="icon">
                                            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgMjQgMjQiPjxwYXRoIGZpbGw9Im5vbmUiIHN0cm9rZT0iI2ZmZmZmZiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBzdHJva2Utd2lkdGg9IjIiIGQ9Ik00IDIwaDRMMTguNSA5LjVhMi44MjggMi44MjggMCAxIDAtNC00TDQgMTZ6bTkuNS0xMy41bDQgNE0xNSAxOWwyIDJsNC00Ii8+PC9zdmc+" alt="Revisar">    
                                    </span> Ver solución
                                </button>
                            </div>
                        </div>
                        <div class="calculator-container">
                        @include('Calculator.itemCalculator', ['id' => 'calculator4'])
                        </div>

                        <!-- Botones de Revisar y Reiniciar -->
                        <div class="button-container">
                            <button id="revisar-btn" class="submit-button">
                                <span class="icon">
                                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgMjQgMjQiPjxnIGZpbGw9Im5vbmUiIHN0cm9rZT0iI2ZmZmZmZiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBzdHJva2Utd2lkdGg9IjIiPjxwYXRoIHN0cm9rZS1kYXNoYXJyYXk9IjY0IiBzdHJva2UtZGFzaG9mZnNldD0iNjQiIGQ9Ik0zIDEyYzAgLTQuOTcgNC4wMyAtOSA5IC05YzQuOTcgMCA5IDQuMDMgOSA5YzAgNC45NyAtNC4wMyA5IC05IDljLTQuOTcgMCAtOSAtNC4wMyAtOSAtOVoiPjxhbmltYXRlIGZpbGw9ImZyZWV6ZSIgYXR0cmlidXRlTmFtZT0ic3Ryb2tlLWRhc2hvZmZzZXQiIGR1cj0iMC42cyIgdmFsdWVzPSI2NDswIi8+PC9wYXRoPjxwYXRoIHN0cm9rZS1kYXNoYXJyYXk9IjE0IiBzdHJva2UtZGFzaG9mZnNldD0iMTQiIGQ9Ik04IDEybDMgM2w1IC01Ij48YW5pbWF0ZSBmaWxsPSJmcmVlemUiIGF0dHJpYnV0ZU5hbWU9InN0cm9rZS1kYXNob2Zmc2V0IiBiZWdpbj0iMC42cyIgZHVyPSIwLjJzIiB2YWx1ZXM9IjE0OzAiLz48L3BhdGg+PC9nPjwvc3ZnPg==" alt="Revisar">
                                </span> Revisar
                            </button>
                            <button id="reset_btn" class="reset-button">
                                <span class="icon">
                                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgNTEyIDUxMiI+PHBhdGggZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZmZmZmZmIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLXdpZHRoPSIzMiIgZD0ibTQwMCAxNDhsLTIxLjEyLTI0LjU3QTE5MS40MyAxOTEuNDMgMCAwIDAgMjQwIDY0QzEzNCA2NCA0OCAxNTAgNDggMjU2czg2IDE5MiAxOTIgMTkyYTE5Mi4wOSAxOTIuMDkgMCAwIDAgMTgxLjA3LTEyOCIvPjxwYXRoIGZpbGw9IiNmZmZmZmYiIGQ9Ik00NjQgOTcuNDJWMjA4YTE2IDE2IDAgMCAxLTE2IDE2SDMzNy40MmMtMTQuMjYgMC0yMS40LTE3LjIzLTExLjMyLTI3LjMxTDQzNi42OSA4Ni4xQzQ0Ni43NyA3NiA0NjQgODMuMTYgNDY0IDk3LjQyIi8+PC9zdmc+" alt="Reiniciar">
                                </span> Reiniciar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="jerarquias" class="content-section scrollable-content">
                <h1 class="content-title">Jerarquía de Operaciones</h1>
                <div class="exercise-container">
                    <div class="exercise-content">
                        <h2 class="exercise-title">El orden en que se deben resolver las ecuaciones</h2>
                        <p class="exercise-description">
                        La jerarquía de operaciones establece el orden en el que debemos realizar las operaciones matemáticas para obtener un resultado correcto. Es fundamental seguir este orden:
                        </p>
                        <ul class="options-list">
                            <li><strong>1. Paréntesis: </strong></li>
                            <li><strong>2. Exponentes: </strong></li>
                            <li><strong>3. Multiplicación y División: </strong></li>
                            <li><strong>4. Suma y Resta</strong></li>
                             
                        </ul>
                        <p class="exercise-description">
                            Encuentra el siguiente volúmen anular:
                        </p>
                        <div class="text-grid">
                            <div>ID² - OD² ÷ 1029.4 </div>   
                        <div class="text-row">
                            <div>Tamaño del agujero:</div>
                            <div> 8.5 pulg.</div>
                        </div>
                        <div class="text-row">
                            <div>Tamaño de la tubería DP:</div>
                            <div> 5 pulg. OD</div>
                        </div>
                        <label class="result-label">Escribir resultado:</label>
                        <input type="text" class="result-input">
                        <button id="ejercicio3_btn" class="submit-button">Revisar</button>
                    </div>
                    <div class="calculator-container">
                    @include('Calculator.itemCalculator', ['id' => 'calculator5'])
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content rounded-lg">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <img id="modal-image" src="" alt="Descripción de la imagen" style="height: 80%; display: none;">
                <div id="exampleModalLText" class="modal-body">
                </div>
            </div>
        </div>
    </div> -->

    <script>
        document.oncontextmenu = function(){return false}
            document.addEventListener('DOMContentLoaded', function () {
                const navItems = document.querySelectorAll('.nav-item');

                navItems.forEach(item => {
                    item.addEventListener('click', function () {
                        // Remover la clase 'active' de todos los nav-items
                        navItems.forEach(navItem => navItem.classList.remove('active'));
                        this.classList.add('active');

                        // Obtener la sección activa actual y la nueva sección
                        const activeSection = document.querySelector('.content-section.active');
                        const sectionId = this.getAttribute('data-section');
                        const newSection = document.getElementById(sectionId);

                        if (activeSection !== newSection) {
                            // Agregar animación de salida a la sección activa
                            activeSection.classList.add('fade-out');
                            setTimeout(() => {
                                activeSection.classList.remove('active', 'fade-out');
                                activeSection.style.visibility = 'hidden';

                                // Mostrar la nueva sección con animación de entrada
                                newSection.style.visibility = 'visible';
                                newSection.classList.add('active', 'fade-in');
                                setTimeout(() => newSection.classList.remove('fade-in'), 500);
                            }, 500);
                        }
                    });
                });
            });
        
            loadSecureVideo('BbqXKcUUT44');
        
        // Bloquear clic derecho en todo el contenedor
        document.getElementById('secure-video-container').addEventListener('contextmenu', function(e) {
            e.preventDefault();
            return false;
        });
        
        // Bloquear también clic derecho específicamente en el iframe
        document.addEventListener('DOMNodeInserted', function(e) {
            if (e.target.id === 'youtube-frame') {
                e.target.addEventListener('contextmenu', function(event) {
                    event.preventDefault();
                    return false;
                });
            }
        });
        
        // Carga el video de manera segura
        function loadSecureVideo(videoId) {
            const container = document.getElementById('video-frame-container');
            
            // Crear el iframe con todos los parámetros de seguridad
            container.innerHTML = `
                <iframe 
                id="youtube-frame"
                width="100%" 
                height="100%" 
                src="https://www.youtube.com/embed/${videoId}?autoplay=0&rel=0&controls=0&modestbranding=1&disablekb=1&fs=0&showinfo=0&iv_load_policy=3&origin=${window.location.origin}" 
                frameborder="0" 
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
                </iframe>
            `;
            
            // Inicializar el reproductor de YouTube
            let player;
            
            // Cargar la API de YouTube
            const tag = document.createElement('script');
            tag.src = "https://www.youtube.com/iframe_api";
            const firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
            
            // Esta función será llamada cuando la API esté lista
            window.onYouTubeIframeAPIReady = function() {
                player = new YT.Player('youtube-frame', {
                    events: {
                        'onReady': onPlayerReady,
                        'onStateChange': onPlayerStateChange
                    }
                });
            };
            
            // Cuando el reproductor esté listo
            function onPlayerReady(event) {
                // Configurar controles personalizados
                setupCustomControls(player);
                
                // Configurar bloqueo de clic derecho en el iframe
                const iframe = document.getElementById('youtube-frame');
                if (iframe) {
                    // Intento adicional de bloqueo de clic derecho en el iframe
                    try {
                        const iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
                        iframeDocument.addEventListener('contextmenu', function(e) {
                            e.preventDefault();
                            return false;
                        });
                    } catch (e) {
                        // Si hay error de acceso por seguridad de dominio cruzado, ignoramos
                        console.log("No se puede acceder directamente al documento del iframe");
                    }
                }
            }
            
            // Cuando cambie el estado del reproductor
            function onPlayerStateChange(event) {
                // Actualizar estado de los controles personalizados
                updateCustomControls(event.data);
            }
        }
        
        // Configurar los controles personalizados
        function setupCustomControls(player) {
            const playPauseBtn = document.getElementById('play-pause-btn');
            const progressBar = document.getElementById('progress-bar');
            const progress = document.getElementById('progress');
            const volumeBtn = document.getElementById('volume-btn');
            
            // Botón de reproducción/pausa
            playPauseBtn.addEventListener('click', function() {
                const state = player.getPlayerState();
                if (state === 1) { // reproduciendo
                    player.pauseVideo();
                    playPauseBtn.textContent = '▶';
                } else {
                    player.playVideo();
                    playPauseBtn.textContent = '⏸';
                }
            });
            
            // Control de volumen
            volumeBtn.addEventListener('click', function() {
                if (player.isMuted()) {
                    player.unMute();
                    volumeBtn.textContent = '🔊';
                } else {
                    player.mute();
                    volumeBtn.textContent = '🔇';
                }
            });
            
            // Barra de progreso
            progressBar.addEventListener('click', function(e) {
                const percent = (e.offsetX / progressBar.offsetWidth);
                player.seekTo(player.getDuration() * percent);
            });
            
            // Actualizar la barra de progreso
            setInterval(function() {
                if (player && typeof player.getCurrentTime === 'function') {
                    const currentTime = player.getCurrentTime();
                    const duration = player.getDuration();
                    const percentage = (currentTime / duration) * 100;
                    progress.style.width = percentage + '%';
                }
            }, 1000);
            
            // Configuración adicional para el bloqueador de clic derecho
            const rightClickBlocker = document.getElementById('right-click-blocker');
            
            // Hacemos que este elemento solo capture eventos de clic derecho pero no normales
            rightClickBlocker.addEventListener('contextmenu', function(e) {
                e.preventDefault();
                return false;
            });
            
            // Permitir que los clics normales pasen a través
            rightClickBlocker.addEventListener('mousedown', function(e) {
                if (e.button === 2) { // 2 es clic derecho
                    e.preventDefault();
                    e.stopPropagation();
                    return false;
                }
                // Los demás tipos de clic pasan a través
            });
        }
        
        // Actualizar estado de los controles personalizados
        function updateCustomControls(playerState) {
            const playPauseBtn = document.getElementById('play-pause-btn');
            
            if (playerState === 1) { // reproduciendo
                playPauseBtn.textContent = '⏸';
            } else {
                playPauseBtn.textContent = '▶';
            }
        }
                // Obtener el modal y sus elementos
            const modal = document.getElementById("exampleModalCenter");
            const modalTitle = document.getElementById("exampleModalLongTitle");
            const modalText = document.getElementById("exampleModalLText");
            const modalImage = document.getElementById("modal-image");

            // Función para abrir el modal con un título y texto específicos
            function openModal(title, text, imageSrc) {
                modalTitle.textContent = title; // Asignar el título
                modalText.textContent = text;   // Asignar el texto
                if (imageSrc) {
                    modalImage.src = imageSrc;
                    modalImage.style.display = "block"; // Mostrar la imagen si hay una ruta
                } else {
                    modalImage.style.display = "none"; // Ocultar la imagen si no hay ruta
                }
                $(modal).modal('show');          // Usar Bootstrap para mostrar el modal
            }

            function openModal2(title, text) {
                modalTitle.textContent = title; // Asignar el título
                modalText.textContent = text;   // Asignar el texto
                $(modal).modal('show');          // Usar Bootstrap para mostrar el modal
            }

        document.addEventListener("DOMContentLoaded", function() {
            const calculator1 = document.getElementById('calculator1');
            if (calculator1) {
                // Asignar eventos a los botones de la calculadora
                calculator1.querySelectorAll(".btn").forEach((button) => {
                        button.addEventListener("click", () => {
                            const id = button.id; // Obtener el ID del botón clickeado
                            let title = "";
                            let text = "";
                            let imageSrc = ""; // Ruta de la imagen
                            
                            // Asignar título y texto según el ID
                            switch (id) {
                            
                                    // ==================== SECCIÓN 1: Sección principal ====================
                                case "shift":
                                case "alpha":
                                case "mode-clear":
                                case "on":
                                    title = "Sección principal";
                                    text = "Esta sección está conformada por las teclas SHIFT, ALFA, MODE y ON. En esta sección se puede encender y configurar la calculadora.";
                                    imageSrc = "/assets/images/principal/calculadora_seccion1.png";
                                    break;

                                // ==================== SECCIÓN 2: Funciones de teclas negras ====================
                                case "square":
                                case "square-root":
                                case "sin":
                                case "cos":
                                case "tan":
                                case "comma-xy":
                                case "close-parenthesis":
                                case "open-parenthesis":
                                case "engineering":
                                case "hyperbolic":
                                case "comma":
                                case "negative":
                                case "natural-log":
                                case "log":
                                case "power":
                                case "fraction":
                                case "cube-root":
                                case "polar":
                                case "combination":
                                case "inverse":
                                case "memory-add":
                                    title = "Funciones avanzadas";
                                    text = "Esta sección incluye funciones avanzadas como elevar al cuadrado, calcular raíces cuadradas y funciones trigonométricas (seno, coseno y tangente).";
                                    imageSrc = "/assets/images/principal/calculadora_seccion2.png";
                                    break;

                                // ==================== SECCIÓN 3: Operadores de matemáticas básicas ====================
                                case "add":
                                case "subtract":
                                case "multiply":
                                case "divide":
                                    title = "Operadores de matemáticas básicas";
                                    text = "En esta sección se encuentran los operadores básicos para realizar sumas, restas, multiplicaciones y divisiones.";
                                    imageSrc = "/assets/images/principal/calculadora_seccion4.png";
                                    break;

                                // ==================== SECCIÓN 4: Teclado numérico ====================
                                case "zero":
                                case "one":
                                case "two":
                                case "three":
                                case "four":
                                case "five":
                                case "six":
                                case "seven":
                                case "eight":
                                case "nine":
                                case "decimal":
                                    title = "Teclado numérico";
                                    text = "Esta sección permite ingresar números del 0 al 9 y el punto decimal.";
                                    imageSrc = "/assets/images/principal/calculadora_seccion3.png";
                                    break;

                                // ==================== SECCIÓN 5: Interruptor de apagado ====================
                                case "all-clear":
                                case "delete":
                                    title = "Interruptor y borrado";
                                    text = "Esta sección permite borrar el contenido de la calculadora o apagarla.";
                                    imageSrc = "/assets/images/principal/calculadora_seccion5.png";
                                    break;

                                // ==================== SECCIÓN 6: Signo igual y funciones adicionales ====================
                                case "equals":
                                case "answer":
                                case "exponent":
                                    title = "Resultado y funciones adicionales";
                                    text = "En esta sección puedes calcular el resultado de una operación y acceder a funciones adicionales como la última respuesta (Ans) o notación científica.";
                                    imageSrc = "/assets/images/principal/calculadora_seccion6.png";
                                    break;

                                default:
                                    title = "Botón no reconocido";
                                    text = "Este botón no tiene una función asignada.";
                                    imageSrc = "/assets/images/principal/bocapozo.png";
                            }
                            

                            // Abrir el modal con el título y texto correspondientes
                            openModal(title, text, imageSrc);
                        });
                });
                }
        
            const calculator2 = document.getElementById('calculator2');
            if (calculator2) {
                
                // Asignar eventos a los botones de la calculadora
                calculator2.querySelectorAll(".btn").forEach((button) => {
                        button.addEventListener("click", () => {
                            const id = button.id; // Obtener el ID del botón clickeado
                            let title = "";
                            let text = "";

                            // Asignar título y texto según el ID
                            switch (id) {
                                case "shift":
                                    title = "SHIFT";
                                    text = "Activa funciones secundarias de los botones.";
                                    break;
                                case "alpha":
                                    title = "ALPHA";
                                    text = "Activa el modo de entrada de letras.";
                                    break;
                                case "inverse":
                                    title = "Inverso (x⁻¹) / Factorial (x!)";
                                    text = "Calcula el inverso de un número o su factorial.";
                                    break;
                                case "combination":
                                    title = "Combinación (nCr) / Permutación (nPr)";
                                    text = "Calcula combinaciones o permutaciones.";
                                    break;
                                case "mode-clear":
                                    title = "MODE CLR";
                                    text = "Cambia el modo o limpia la pantalla.";
                                    break;
                                case "on":
                                    title = "ON";
                                    text = "Enciende la calculadora.";
                                    break;
                                case "polar":
                                    title = "Pol( / Rec(";
                                    text = "Convierte entre coordenadas polares y rectangulares.";
                                    break;
                                case "cube-root":
                                    title = "x³ / ∛";
                                    text = "Eleva un número al cubo o calcula su raíz cúbica.";
                                    break;
                                case "fraction":
                                    title = "Fracción (a b/c) / Conversión (d/c)";
                                    text = "Ingresa fracciones o convierte entre formatos.";
                                    break;
                                case "square-root":
                                    title = "Raíz cuadrada (√)";
                                    text = "Calcula la raíz cuadrada de un número.";
                                    break;
                                case "square":
                                    title = "x²";
                                    text = "Eleva un número al cuadrado.";
                                    break;
                                case "power":
                                    title = "Exponente (^)";
                                    text = "Eleva un número a una potencia.";
                                    break;
                                case "log":
                                    title = "Logaritmo (log) / 10ˣ";
                                    text = "Calcula el logaritmo base 10 o 10 elevado a x.";
                                    break;
                                case "natural-log":
                                    title = "Logaritmo natural (ln) / eˣ";
                                    text = "Calcula el logaritmo natural o e elevado a x.";
                                    break;
                                case "negative":
                                    title = "Negativo (-)";
                                    text = "Ingresa un número negativo.";
                                    break;
                                case "comma":
                                    title = "Coma (,...)";
                                    text = "Ingresa una coma decimal.";
                                    break;
                                case "hyperbolic":
                                    title = "Hiperbólico (hyp)";
                                    text = "Activa funciones hiperbólicas.";
                                    break;
                                case "sin":
                                    title = "Seno (sin) / Arco seno (sin⁻¹)";
                                    text = "Calcula el seno o el arco seno de un número.";
                                    break;
                                case "cos":
                                    title = "Coseno (cos) / Arco coseno (cos⁻¹)";
                                    text = "Calcula el coseno o el arco coseno de un número.";
                                    break;
                                case "tan":
                                    title = "Tangente (tan) / Arco tangente (tan⁻¹)";
                                    text = "Calcula la tangente o el arco tangente de un número.";
                                    break;
                                case "recall":
                                    title = "RCL / STO";
                                    text = "Recupera o almacena un valor en memoria.";
                                    break;
                                case "engineering":
                                    title = "ENG / ←";
                                    text = "Cambia a notación de ingeniería o retrocede.";
                                    break;
                                case "open-parenthesis":
                                    title = "Paréntesis abierto (()";
                                    text = "Abre un paréntesis para agrupar operaciones.";
                                    break;
                                case "close-parenthesis":
                                    title = "Paréntesis cerrado ())";
                                    text = "Cierra un paréntesis para agrupar operaciones.";
                                    break;
                                case "comma-xy":
                                    title = "Coma (,)";
                                    text = "Separa valores en coordenadas.";
                                    break;
                                case "memory-add":
                                    title = "M+";
                                    text = "Añade un valor a la memoria.";
                                    break;
                                case "seven":
                                    title = "7";
                                    text = "Ingresa el número 7.";
                                    break;
                                case "eight":
                                    title = "8";
                                    text = "Ingresa el número 8.";
                                    break;
                                case "nine":
                                    title = "9";
                                    text = "Ingresa el número 9.";
                                    break;
                                case "delete":
                                    title = "DEL / INS";
                                    text = "Borra o inserta un carácter.";
                                    break;
                                case "all-clear":
                                    title = "AC / OFF";
                                    text = "Borra todo o apaga la calculadora.";
                                    break;
                                case "four":
                                    title = "4";
                                    text = "Ingresa el número 4.";
                                    break;
                                case "five":
                                    title = "5";
                                    text = "Ingresa el número 5.";
                                    break;
                                case "six":
                                    title = "6";
                                    text = "Ingresa el número 6.";
                                    break;
                                case "multiply":
                                    title = "×";
                                    text = "Multiplica dos números.";
                                    break;
                                case "divide":
                                    title = "÷";
                                    text = "Divide dos números.";
                                    break;
                                case "one":
                                    title = "1";
                                    text = "Ingresa el número 1.";
                                    break;
                                case "two":
                                    title = "2";
                                    text = "Ingresa el número 2.";
                                    break;
                                case "three":
                                    title = "3";
                                    text = "Ingresa el número 3.";
                                    break;
                                case "add":
                                    title = "+";
                                    text = "Suma dos números.";
                                    break;
                                case "subtract":
                                    title = "−";
                                    text = "Resta dos números.";
                                    break;
                                case "zero":
                                    title = "0";
                                    text = "Ingresa el número 0.";
                                    break;
                                case "decimal":
                                    title = ".";
                                    text = "Ingresa un punto decimal.";
                                    break;
                                case "exponent":
                                    title = "EXP / π";
                                    text = "Ingresa notación científica o el valor de π.";
                                    break;
                                case "answer":
                                    title = "Ans / DRG▶";
                                    text = "Recupera la última respuesta o cambia el modo angular.";
                                    break;
                                case "equals":
                                    title = "= / %";
                                    text = "Calcula el resultado o convierte a porcentaje.";
                                    break;
                                default:
                                    title = "Botón no reconocido";
                                    text = "Este botón no tiene una función asignada.";
                            }
                            // Abrir el modal con el título y texto correspondientes
                            openModal2(title, text);
                        });
                    
                });
            }

            const calculator_3 = document.getElementById('calculator3'); 
            const calculator4 = document.getElementById('calculator4'); 
            const calculator5 = document.getElementById('calculator5'); 

            if (calculator_3) {
            initializeCalculator(calculator_3);
            }

            if (calculator4) {
            initializeCalculator(calculator4);
            }
            if (calculator5) {
            initializeCalculator(calculator5);
            }

            function initializeCalculator (calculator3) {
                // Variables para el estado de la calculadora
                let currentInput = '';
                let shouldResetScreen = false;
                
                // Función para actualizar la pantalla
                const updateScreen = (value) => {
                    const screen = calculator3.querySelector('#screen');
                    screen.textContent = value || '0';
                };

                // Función para limpiar la calculadora
                const clearCalculator = () => {
                    currentInput = '';
                    updateScreen('0');
                };

                // Función para evaluar la expresión matemática de manera segura
                const evaluateExpression = (expression) => {
                    try {
                        // Reemplazar los símbolos de la calculadora por los operadores de JavaScript
                        expression = expression
                            .replace(/×/g, '*')
                            .replace(/÷/g, '/')
                            .replace(/−/g, '-')
                            .replace(/\^/g, '**')
                            .replace(/²/g, '**2');
                        
                        // Evaluar la expresión
                        const result = Function('"use strict";return (' + expression + ')')();
                        
                        // Formatear el resultado
                        return Number.isInteger(result) ? result : parseFloat(result.toFixed(8));
                    } catch (error) {
                        return 'Error';
                    }
                };

                calculator3.querySelectorAll(".btn").forEach((button) => {
                    button.addEventListener("click", () => {
                        const value = button.textContent.split('\n')[0]; // Obtener solo el primer valor

                        // Manejar diferentes tipos de botones
                        switch(button.id) {
                            case 'all-clear':
                                clearCalculator();
                                break;
                                
                            case 'equals':
                                if (currentInput) {
                                    const result = evaluateExpression(currentInput);
                                    currentInput = result.toString();
                                    updateScreen(currentInput);
                                    shouldResetScreen = true;
                                }
                                break;
                                
                            case 'square':
                                if (currentInput) {
                                    const result = evaluateExpression(`(${currentInput})**2`);
                                    currentInput = result.toString();
                                    updateScreen(currentInput);
                                }
                                break;
                                
                            case 'open-parenthesis':
                                if (shouldResetScreen) {
                                    currentInput = '';
                                    shouldResetScreen = false;
                                }
                                currentInput += '(';
                                updateScreen(currentInput);
                                break;
                                
                            case 'close-parenthesis':
                                currentInput += ')';
                                updateScreen(currentInput);
                                break;
                                
                            case 'add':
                                currentInput += '+';
                                updateScreen(currentInput);
                                break;
                                
                            case 'subtract':
                                currentInput += '−';
                                updateScreen(currentInput);
                                break;
                                
                            case 'multiply':
                                currentInput += '×';
                                updateScreen(currentInput);
                                break;
                                
                            case 'divide':
                                currentInput += '÷';
                                updateScreen(currentInput);
                                break;
                                
                            case 'power':
                                currentInput += '^';
                                updateScreen(currentInput);
                                break;
                                
                            default:
                                // Manejar números y punto decimal
                                if (button.classList.contains('number')) {
                                    if (shouldResetScreen) {
                                        currentInput = '';
                                        shouldResetScreen = false;
                                    }
                                    // No permitir múltiples ceros al inicio
                                    if (value === '0' && currentInput === '0') return;
                                    // No permitir múltiples puntos decimales en un número
                                    if (value === '.' && currentInput.includes('.')) return;
                                    
                                    currentInput += value;
                                    updateScreen(currentInput);
                                }
                        }
                    });
                });

                // Manejar entrada por teclado
                document.addEventListener('keydown', (event) => {
                    const key = event.key;
                    
                    const isInputFocused = document.activeElement.tagName === 'INPUT';

                    // Si está enfocado un input, no prevenir el comportamiento por defecto
                    if (isInputFocused) {
                        return; // Permite escribir en el input
                    }
                    // Mapeo de teclas
                    const keyMapping = {
                        'Enter': 'equals',
                        'Escape': 'all-clear',
                        '+': 'add',
                        '-': 'subtract',
                        '*': 'multiply',
                        '/': 'divide',
                        '(': 'open-parenthesis',
                        ')': 'close-parenthesis',
                        '^': 'power',
                        '.': 'decimal',
                        '0': 'zero',
                        '1': 'one',
                        '2': 'two',
                        '3': 'three',
                        '4': 'four',
                        '5': 'five',
                        '6': 'six',
                        '7': 'seven',
                        '8': 'eight',
                        '9': 'nine'
                    };
                    
                    // Si la tecla es un número o un operador mapeado
                    if (/^[0-9.]$/.test(key) || key in keyMapping) {
                        event.preventDefault();
                        const buttonId = keyMapping[key] || key;
                        const button = calculator3.querySelector(`#${buttonId}`) || 
                                    calculator3.querySelector(`.btn.number:not([id]):contains('${key}')`);
                        if (button) button.click();
                    }
                });

                document.getElementById('ejercicio1_btn').addEventListener('click', function () {
                    // Definir las respuestas correctas
                    const correctAnswers = {
                        'result-1': 0.875, // 7 ÷ 8
                        'result-2': 8.5,   // 8 1/2
                        'result-3': 9.25,  // 9 1/4
                        'result-4': 0.375, // 3 ÷ 8
                        'result-5': 3.75   // 15 ÷ 4
                    };

                    let allCorrect = true;
                    let explanationHtml = '';
                    let answersHtml = '';

                    // Verificar cada input
                    for (let id in correctAnswers) {
                        const input = document.getElementById(id);
                        const feedback = document.getElementById('feedback-' + id.split('-')[1]);

                        // Comparar el valor ingresado con la respuesta correcta
                        if (parseFloat(input.value) === correctAnswers[id]) {
                            feedback.textContent = "Correcto!";
                            feedback.style.color = "green";
                            input.style.borderColor = "green";
                            answersHtml += `<p><strong>${input.value}</strong> es correcto.</p>`;
                        } else {
                            feedback.textContent = "Incorrecto!";
                            feedback.style.color = "red";
                            input.style.borderColor = "red";
                            allCorrect = false;
                            // explanationHtml += `<p><strong>${input.value}</strong> es incorrecto. La respuesta correcta es <strong>${correctAnswers[id]}</strong>.</p>`;
                        }
                    }
                    const answerDivs = document.querySelectorAll('.math-answer-exercise');
                    answerDivs.forEach(div => {
                        div.style.display = 'flex'; 
                    });

                    // Mostrar SweetAlert con los resultados
                    Swal.fire({
                        title: allCorrect ? '¡Excelente!' : 'Algunos errores',
                        text: allCorrect ? 'Has respondido correctamente a todas las preguntas.' : 'Hay respuestas incorrectas. Revisa los campos resaltados.',
                        icon: allCorrect ? 'success' : 'error',
                        // html: allCorrect ? answersHtml : explanationHtml,
                        // showCancelButton: true,
                        confirmButtonText: 'OK',
                        // cancelButtonText: 'Ver Explicación',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // showExample();
                        } 
                        // else {
                        //     // Mostrar modal de explicación
                        //     showExplanation();
                        // }
                    });
                });

                document.getElementById('revisar-btn').addEventListener('click', function () {
                    // Definir las respuestas correctas
                    const correctAnswers = {
                        'q1': 'B', // Respuesta correcta para la pregunta 1
                        'q2': 'B', // Respuesta correcta para la pregunta 2
                        'q3': 'A'  // Respuesta correcta para la pregunta 3
                    };

                    let allCorrect = true;
                    let explanationHtml = '';
                    let answersHtml = '';

                    // Verificar cada pregunta
                    for (let question in correctAnswers) {
                        const selectedOption = document.querySelector(`input[name="${question}"]:checked`);
                        const feedback = document.getElementById('feedback-q' + question.split('q')[1]);

                        if (selectedOption) {
                            // Comparar el valor seleccionado con la respuesta correcta
                            if (selectedOption.value === correctAnswers[question]) {
                                feedback.textContent = "Correcto!";
                                feedback.style.color = "green";
                                selectedOption.parentElement.style.color = "green";
                                answersHtml += `<p><strong>${selectedOption.value}</strong> es correcto.</p>`;
                            } else {
                                feedback.textContent = "Incorrecto!";
                                feedback.style.color = "red";
                                selectedOption.parentElement.style.color = "red";
                                allCorrect = false;
                            }
                        } else {
                            feedback.textContent = "No seleccionaste una opción.";
                            feedback.style.color = "red";
                            allCorrect = false;
                        }
                    }

                    const answerDivs = document.querySelectorAll('.math-answer-exercise');
                    answerDivs.forEach(div => {
                        div.style.display = 'flex'; 
                    });

                    // Mostrar SweetAlert con los resultados
                    Swal.fire({
                        title: allCorrect ? '¡Excelente!' : 'Algunos errores',
                        text: allCorrect ? 'Has respondido correctamente a todas las preguntas.' : 'Hay respuestas incorrectas. Revisa los campos resaltados.',
                        icon: allCorrect ? 'success' : 'error',
                        // html: allCorrect ? answersHtml : explanationHtml,
                        // showCancelButton: true,
                        confirmButtonText: 'OK',
                        // cancelButtonText: 'Ver Explicación',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // showExample();
                        } 
                        // else {
                        //     // Mostrar modal de explicación
                        //     showExplanation();
                        // }
                    });
                });

            }

            

        });

        const calculator3 = document.getElementById('calculator3');
        function showExample(entero, numerador, denominador) {
            const calculator = calculator3; // Asegúrate de que "calculator3" sea tu calculadora
            const buttons = {
                '0': calculator.querySelector('#zero'),
                '1': calculator.querySelector('#one'),
                '2': calculator.querySelector('#two'),
                '3': calculator.querySelector('#three'),
                '4': calculator.querySelector('#four'),
                '5': calculator.querySelector('#five'),
                '6': calculator.querySelector('#six'),
                '7': calculator.querySelector('#seven'),
                '8': calculator.querySelector('#eight'),
                '9': calculator.querySelector('#nine'),
                '+': calculator.querySelector('#add'),
                '÷': calculator.querySelector('#divide'),
                '(': calculator.querySelector('#open-parenthesis'),
                ')': calculator.querySelector('#close-parenthesis'),
                'C': calculator.querySelector('#all-clear')
            };

            // Limpiar la calculadora
            buttons['C'].click();

            // Función para hacer clic en un botón
            function clickButton(character) {
                if (buttons[character]) {
                    buttons[character].click();
                } else {
                    console.error(`Botón no encontrado para el carácter: ${character}`);
                }
            }

            // Función para ingresar un número de varios dígitos
            function enterNumber(number) {
                const digits = String(number).split('');
                digits.forEach(digit => clickButton(digit));
            }

            // Ingresar la fracción
            if (entero >= 1) {
                enterNumber(entero); // Ingresar el entero
                clickButton('+'); // Ingresar el operador de suma
                clickButton('('); // Abrir paréntesis
                enterNumber(numerador); // Ingresar el numerador
                clickButton('÷'); // Ingresar el operador de división
                enterNumber(denominador); // Ingresar el denominador
                clickButton(')'); // Cerrar paréntesis
            } else {
                enterNumber(numerador); // Ingresar el numerador
                clickButton('÷'); // Ingresar el operador de división
                enterNumber(denominador); // Ingresar el denominador
            }
        }

        const calculator4 = document.getElementById('calculator4');
        function showExampleElevate(identificador) {
            const calculator = calculator4;
            const buttons = {
                '0': calculator.querySelector('#zero'),
                '1': calculator.querySelector('#one'),
                '2': calculator.querySelector('#two'),
                '3': calculator.querySelector('#three'),
                '4': calculator.querySelector('#four'),
                '5': calculator.querySelector('#five'),
                '6': calculator.querySelector('#six'),
                '7': calculator.querySelector('#seven'),
                '8': calculator.querySelector('#eight'),
                '9': calculator.querySelector('#nine'),
                '+': calculator.querySelector('#add'),
                '÷': calculator.querySelector('#divide'),
                '*': calculator.querySelector('#multiply'),
                '.': calculator.querySelector('#decimal'),
                '(': calculator.querySelector('#open-parenthesis'),
                ')': calculator.querySelector('#close-parenthesis'),
                'C': calculator.querySelector('#all-clear')
            };

            // Limpiar la calculadora
            buttons['C'].click();

            // Función para hacer clic en un botón
            function clickButton(character) {
                if (buttons[character]) {
                    buttons[character].click();
                } else {
                    console.error(`Botón no encontrado para el carácter: ${character}`);
                }
            }

            // Función para ingresar un número de varios dígitos
            function enterNumber(number) {
                const digits = String(number).split('');
                digits.forEach(digit => clickButton(digit));
            }

            // Ingresar la fracción
            if (identificador === 1) {
                clickButton('(');
                enterNumber('7'); // Ingresar el entero
                clickButton('*'); // Ingresar el operador de suma
                enterNumber('7');
                clickButton(')'); // Cerrar paréntesis
                clickButton('*'); // Abrir paréntesis
                enterNumber('12'); // Ingresar el numerador
                clickButton('*'); // Ingresar el operador de división
                enterNumber('0'); // Ingresar el denominador
                clickButton('.');
                enterNumber('000243'); // Ingresar el denominador
            } 
        }

        function showSolution(id) {
            // Obtener el elemento que se debe mostrar
            const solutionElement = document.getElementById(`solution${id}`);

            // Verificar si el elemento existe
            if (solutionElement) {
                // Cambiar el estilo display a flex
                solutionElement.style.display = 'flex';
            } else {
                console.error(`No se encontró el elemento con ID solution${id}`);
            }
        }

        function resetForm() {
            // Limpiar todos los campos de entrada
            const inputs = document.querySelectorAll('.result-input');
            inputs.forEach(input => {
                input.value = ''; // Vaciar el valor del input
                input.style.borderColor = '';
            });

            const answerDivs = document.querySelectorAll('.math-answer-exercise');
                answerDivs.forEach(div => {
                    div.style.display = 'none'; 
                });

            // Ocultar todos los mensajes de retroalimentación
            const feedbacks = document.querySelectorAll('.feedback');
            feedbacks.forEach(feedback => {
                feedback.textContent = ''; // Limpiar el contenido del span
                feedback.style.display = 'none'; // Ocultar el span
            });
        }

        // Asignar la función al botón de "Reset"
        document.getElementById('reset_btn').addEventListener('click', resetForm);

     

        function toggleSpeakText(audioId) {
            const audioPlayer = document.getElementById(audioId);
            const button = document.querySelector(`button[onclick="toggleSpeakText('${audioId}')"]`);
            
            document.querySelectorAll('audio').forEach(audio => {
                if (audio.id !== audioId) {
                    audio.pause();
                    audio.currentTime = 0;
                    const otherButton = document.querySelector(`button[onclick="toggleSpeakText('${audio.id}')"]`);
                    if (otherButton) {
                        otherButton.querySelector('.material-icons').textContent = 'volume_up';
                        otherButton.querySelector('span:last-child').textContent = 'Escuchar';
                    }
                }
            });

            if (audioPlayer.paused) {
                audioPlayer.play();
                button.querySelector('.material-icons').textContent = 'volume_off';
                button.querySelector('span:last-child').textContent = 'Detener';
            } else {
                audioPlayer.pause();
                audioPlayer.currentTime = 0;
                button.querySelector('.material-icons').textContent = 'volume_up';
                button.querySelector('span:last-child').textContent = 'Escuchar';
            }
        }
        // function toggleSpeakText2() {
        //     const audioPlayer = document.getElementById('audioPlayer');

        //     if (audioPlayer.paused) {
        //         audioPlayer.play();
        //         document.querySelector('#voiceButton2 .material-icons').textContent = 'volume_off';
        //         document.querySelector('#voiceButton2 span:last-child').textContent = 'Detener';
        //     } else {
        //         audioPlayer.pause();
        //         audioPlayer.currentTime = 0; // Reinicia el audio al principio
        //         document.querySelector('#voiceButton2 .material-icons').textContent = 'volume_up';
        //         document.querySelector('#voiceButton2 span:last-child').textContent = 'Escuchar';
        //     }
        // }

        document.querySelectorAll("li").forEach((item) => {
            item.addEventListener("click", function () {
                iluminarSeccion(this);
            });

            item.addEventListener("mouseover", function () {
                iluminarSeccion(this);
            });

            item.addEventListener("mouseout", function () {
                quitarBorde();
            });
        });

        function iluminarSeccion(li) {
            let section = li.getAttribute("data-section");

            // Quitar el borde de todas las secciones antes de aplicar uno nuevo
            quitarBorde();

            if (section === "screen") {
                document.querySelectorAll(".screen").forEach(div => {
                    div.style.border = "4px solid #d2ff93"; // Resaltar sección
                });
            }
            if (section === "seccion1") {
                document.querySelectorAll(".seccion1").forEach(div => {
                    div.style.border = "4px solid #A4D65E"; // Resaltar sección
                });
            }
            if (section === "seccion2") {
                document.querySelectorAll(".seccion2").forEach(div => {
                    div.style.border = "4px solid #5fbae8"; // Resaltar sección
                });
            }
            if (section === "seccion3") {
                document.querySelectorAll(".seccion3").forEach(div => {
                    div.style.border = "4px solid #007DBA"; // Resaltar sección
                });
            }
            if (section === "seccion4") {
                document.querySelectorAll(".seccion4").forEach(div => {
                    div.style.border = "4px solid #236192"; // Resaltar sección
                });
            }
            if (section === "seccion5") {
                document.querySelectorAll(".seccion5").forEach(div => {
                    div.style.border = "4px solid #FF585D"; // Resaltar sección
                });
            }
            if (section === "seccion6") {
                document.querySelectorAll(".seccion6").forEach(div => {
                    div.style.border = "4px solid #ff9da0"; // Resaltar sección
                });
            }
            if (section === "sum") {
                document.querySelectorAll(".sum").forEach(div => {
                    div.style.border = "4px solid #d2ff93"; 
                    div.style.background = "#d2ff93";
                    div.style.color = "black";
                });
                showExampleFunctions('sum');
            }
            if (section === "rest") {
                document.querySelectorAll(".rest").forEach(div => {
                    div.style.border = "4px solid #A4D65E"; 
                    div.style.background = "#A4D65E";
                    div.style.color = "black";
                });
                showExampleFunctions('rest');
            }
            if (section === "multiplicate") {
                document.querySelectorAll(".multiplicate").forEach(div => {
                    div.style.border = "4px solid #5fbae8";
                    div.style.background = "#5fbae8";
                    div.style.color = "black";
                });
                showExampleFunctions('multiplicate');
            }
            if (section === "division") {
                document.querySelectorAll(".division").forEach(div => {
                    div.style.border = "4px solid #007DBA";
                    div.style.background = "#007DBA";
                    div.style.color = "black";
                });
                showExampleFunctions('division');
            }
            if (section === "elevate") {
                document.querySelectorAll(".elevate").forEach(div => {
                    div.style.border = "4px solid #236192";
                    div.style.background = "#236192";
                    div.style.color = "black";
                });
                showExampleFunctions('elevate');
            }
            if (section === "parentesis") {
                document.querySelectorAll(".parentesis").forEach(div => {
                    div.style.border = "4px solid #FF585D"; 
                    div.style.background = "#FF585D";
                    div.style.color = "black";
                });
                showExampleFunctions('parentesis');
            }
            if (section === "result") {
                document.querySelectorAll(".result").forEach(div => {
                    div.style.border = "4px solid #ff9da0";
                    div.style.background = "#ff9da0";
                    div.style.color = "black";
                });
                showExampleFunctions('result');
            }
            if (section === "percent") {
                document.querySelectorAll(".result").forEach(div => {
                    div.style.border = "4px solid #ff9da0";
                    div.style.background = "#ff9da0";
                    div.style.color = "black";
                });
                document.querySelectorAll(".shift").forEach(div => {
                    div.style.border = "4px solid #ff9da0";
                    div.style.background = "#ff9da0";
                    div.style.color = "black";
                });
                showExampleFunctions('percent');
            }
        }

        function showExampleFunctions(type) {
            const screen = calculator2.querySelector('#screen');
            //screen.textContent =  '';
            screen.innerHTML = '';
            switch (type) {
                case 'sum':
                    //screen.textContent =  '10 + 5 <br> 3';
                    // screen.appendChild(document.createTextNode('10 + 5'));
                    // screen.appendChild(document.createElement('br')); // Salto de línea
                    // screen.appendChild(document.createTextNode('3'));
                    const line1 = document.createElement('div');
                    line1.textContent = '10 + 5';
                    const line2 = document.createElement('div');
                    line2.textContent = '15';
                    line2.style.marginLeft = '200px';
                    screen.appendChild(line1);
                    screen.appendChild(line2);
                    break;
                case 'rest':
                    const restLine1 = document.createElement('div');
                    restLine1.textContent = '10 - 5';
                    const restLine2 = document.createElement('div');
                    restLine2.textContent = '5';
                    restLine2.style.marginLeft = '200px'; // Sangría
                    screen.appendChild(restLine1);
                    screen.appendChild(restLine2);
                    break;

                case 'multiplicate':
                    const multiLine1 = document.createElement('div');
                    multiLine1.textContent = '10 x 5';
                    const multiLine2 = document.createElement('div');
                    multiLine2.textContent = '50';
                    multiLine2.style.marginLeft = '200px'; // Sangría
                    screen.appendChild(multiLine1);
                    screen.appendChild(multiLine2);
                    break;

                case 'division':
                    const divLine1 = document.createElement('div');
                    divLine1.textContent = '10 ÷ 5';
                    const divLine2 = document.createElement('div');
                    divLine2.textContent = '2';
                    divLine2.style.marginLeft = '200px'; // Sangría
                    screen.appendChild(divLine1);
                    screen.appendChild(divLine2);
                    break;

                case 'elevate':
                    const elevateLine1 = document.createElement('div');
                    elevateLine1.textContent = '10²';
                    const elevateLine2 = document.createElement('div');
                    elevateLine2.textContent = '100';
                    elevateLine2.style.marginLeft = '200px'; // Sangría
                    screen.appendChild(elevateLine1);
                    screen.appendChild(elevateLine2);
                    break;

                case 'parentesis':
                    const parenLine1 = document.createElement('div');
                    parenLine1.textContent = '(10 ÷ 5) + 0.052';
                    const parenLine2 = document.createElement('div');
                    parenLine2.textContent = '2.052';
                    parenLine2.style.marginLeft = '200px'; // Sangría
                    screen.appendChild(parenLine1);
                    screen.appendChild(parenLine2);
                    break;  
                case 'result':
                    screen.textContent =  '';
                    break;
                case 'percent':
                    const percentLine1 = document.createElement('div');
                    percentLine1.textContent = '100 x 50%';
                    const percentLine2 = document.createElement('div');
                    percentLine2.textContent = '50';
                    percentLine2.style.marginLeft = '200px'; // Sangría
                    screen.appendChild(percentLine1);
                    screen.appendChild(percentLine2);
                    break;  
                default:
                    break;
            }
           
        }

        function quitarBorde() {
            document.querySelectorAll(".screen, .seccion1, .seccion2, .seccion3, .seccion4, .seccion5, .seccion6").forEach(div => {
                div.style.border = "none";
            });
            document.querySelectorAll(".parentesis, .elevate").forEach(div => {
                div.style.border = "none";
                div.style.background = "linear-gradient(145deg,rgb(42, 37, 37), rgb(0, 0, 0))";
                div.style.color = "white";
            });
            document.querySelectorAll(".sum, .rest, .multiplicate, .division, .result, .shift").forEach(div => {
                div.style.border = "none";
                div.style.background = " linear-gradient(145deg, rgba(200, 196, 196, 1), rgb(135, 135, 135))";
                div.style.color = "black";
            });
        }

    </script>
    <!-- Modal -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- visor pdf -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flipbook.js/0.0.1/flipbook.min.js"></script>
@endsection  

    
@php
    $css_identifier = 'calculator';
@endphp