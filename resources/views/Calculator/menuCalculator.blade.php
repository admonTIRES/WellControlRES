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
                            <span class="nav-item-subtitle">Todo lo que necesitas saber</span>
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

                    <li class="nav-item" data-section="despeje">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">Despejes</span>
                            <span class="nav-item-subtitle">Despejar formulas.</span>
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
                            <span class="nav-item-subtitle">lorem.</span>
                        </div>
                    </li>

                    <li class="nav-item" data-section="cuadrado">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">Elevar al cuadrado</span>
                            <span class="nav-item-subtitle">lorem.</span>
                        </div>
                    </li>

                    <li class="nav-item" data-section="jerarquia">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">Jerarquía de operaciones</span>
                            <span class="nav-item-subtitle">lorem.</span>
                        </div>
                    </li>

                    <li class="nav-item" data-section="jerarquia">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">Jerarquía de operaciones</span>
                            <span class="nav-item-subtitle">lorem.</span>
                        </div>
                    </li>

                    <li class="nav-item" data-section="jerarquia">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">Jerarquía de operaciones</span>
                            <span class="nav-item-subtitle">lorem.</span>
                        </div>
                    </li>

                    <li class="nav-item" data-section="jerarquia">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">Jerarquía de operaciones</span>
                            <span class="nav-item-subtitle">lorem.</span>
                        </div>
                    </li>

                    <li class="nav-item" data-section="jerarquia">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">Jerarquía de operaciones</span>
                            <span class="nav-item-subtitle">lorem.</span>
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
                    <button id="voiceButton2" class="voice-button" onclick="toggleSpeakText2()">
                        <span class="material-icons">volume_up</span> 
                        <span>Escuchar</span>
                    </button>
                    <audio id="audioPlayer" src="/assets/audio/calculator/introduction/calculator_intro_01.mp3"></audio>
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

            <div id="config" class="content-section scrollable-content">
                <div class="content-title-voice">
                    <h1 class="math-drilling-title">Configuración de calculadora científica</h1>
                    <button id="voiceButton" class="voice-button" onclick="toggleSpeakText()">
                        <span class="material-icons">volume_up</span> 
                        <span>Escuchar</span>
                    </button>
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
                <p class="math-drilling-video">
                    <iframe width="760" height="515" src="https://www.youtube.com/embed/U3GWeguCfaU" frameborder="0" allowfullscreen></iframe>
                </p>
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
                </div>
            </div>

            <div id="uso" class="content-section scrollable-content">
                <div class="content-title-voice">
                    <h1 class="math-drilling-title">Uso</h1>
                </div> 
                <!-- <div class="content-wrapper">
                    <div class="content-box">
                        <h3>{{ __('John Doe') }}</h3>
                        <p>{{ __('Whether you\'re looking to strengthen your experience or start a new career, we offer the necessary tools to move forward.') }}</p>
                    </div>

                    <div class="team-image">
                        <img src="/assets/images/calculator/uses_image.jpg" alt="{{ __('Professional team') }}">
                    </div>

                    <div class="content-box">
                        <h3>{{ __('Practice') }}</h3>
                        <p>{{ __('Whether you\'re looking to strengthen your experience or start a new career, we offer the necessary tools to move forward.') }}</p>
                    </div>
                </div>            -->
                <div class="hero-grid">
                    <div class="hero-column">
                        <div class="hero-content">
                            <h2 class="hero-title">Cálculo de presiones hidrostáticas</h2>
                            <p class="hero-text">Esencial para garantizar la estabilidad del pozo. La calculadora permite resolver rápidamente la presión ejercida por el fluido de perforación, evitando sobrepresiones o colapsos en las formaciones. Se usa la fórmulaP=ρ⋅g⋅h, donde se consideran la densidad del lodo, la gravedad y la profundidad.</p>
                        </div>
                    </div>
                    <div class="hero-column">
                        <div class="hero-content">
                            <h2 class="hero-title">Conversión de unidades</h2>
                            <p class="hero-text">En la industria petrolera, es común trabajar con unidades mixtas (métricas e imperiales). La calculadora agiliza la conversión entre psi y bar, metros y pies, o galones y litros, asegurando precisión en los informes y operaciones.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="hero-grid">
                    <div class="hero-column">
                        <div class="hero-content">
                            <h2 class="hero-title">Cálculo de volúmenes de lodo:</h2>
                            <p class="hero-text">Permite determinar cuánto lodo se necesita para llenar el pozo o realizar desplazamientos. Con la fórmula del volumen de un cilindro (V=π⋅r 2⋅h), se calcula el espacio que ocupará el fluido en el pozo, evitando desbalances.</p>
                        </div>
                    </div>
                    <div class="hero-column">
                        <div class="hero-content">
                            <h2 class="hero-title">Análisis de gradientes de presión</h2>
                            <p class="hero-text">Permite evaluar cómo cambia la presión con la profundidad, lo que es vital para prevenir fracturas en la formación o derrumbes. Con la calculadora, se pueden resolver rápidamente estos gradientes y tomar decisiones operativas.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="unidades" class="content-section scrollable-content">
                <h1 class="math-drilling-title">Unidades de medida</h1>
                <button id="voiceButton" class="voice-button" onclick="toggleSpeakText()">
                    <span class="material-icons">volume_up</span> 
                    <span>Escuchar</span>
                </button>
                <div class="math-drilling-section">
                    <h2 class="math-drilling-subtitle">Unidades de medida en el control de pozos</h2>
                    <p class="math-drilling-text">
                        En el control de pozos, es fundamental comprender y convertir entre diferentes unidades de medida para garantizar la precisión en los cálculos y operaciones. A continuación, se presentan las unidades más comunes y su aplicación.
                    </p>
                </div>

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
                <h1 class="math-drilling-title">Convertir de fracción a decimal</h1>
                <button id="voiceButton" class="voice-button" onclick="toggleSpeakText()">
                    <span class="material-icons">volume_up</span> 
                    <span>Escuchar</span>
                </button>

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

            <div id="despeje" class="content-section scrollable-content">
                <h1 class="math-drilling-title">Despejes</h1>
                <button id="voiceButton" class="voice-button" onclick="toggleSpeakText()">
                    <span class="material-icons">volume_up</span> 
                    <span>Escuchar</span>
                </button>

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
            <!-- Fracciones Section -->
            <div id="fracciones" class="content-section scrollable-content">
                <h1 class="content-title">Fracciones a decimal</h1>
                <div class="exercise-container">
                    <div class="exercise-content">
                        <p class="exercise-description">
                            <strong>Para convertir de una fracción a un decimal, divida el numerador entre el denominador</strong>
                        </p>
                        <h2 class="exercise-title">Ejercicio 1</h2>
                        <p class="exercise-description">
                            Convertir a decimal:
                        </p>
                        <div class="exercise-container">
                            <p class="exercise-description">
                               7 ÷ 8 =
                            </p>
                            <label class="result-label" for="result-1">Escribir resultado:</label>
                            <input type="number" class="result-input" id="result-1">
                            <span class="feedback" id="feedback-1"></span>
                        </div>

                        <div class="exercise-container">
                            <p class="exercise-description">
                            8 1/2" =
                            </p>
                            <label class="result-label" for="result-2">Escribir resultado:</label>
                            <input type="number" class="result-input" id="result-2">
                            <span class="feedback" id="feedback-2"></span>
                        </div>

                        <div class="exercise-container">
                            <p class="exercise-description">
                                9 1/4" =
                            </p>
                            <label class="result-label" for="result-3">Escribir resultado:</label>
                            <input type="number" class="result-input" id="result-3">
                            <span class="feedback" id="feedback-3"></span>
                        </div>

                        <div class="exercise-container">
                            <p class="exercise-description">
                                3 ÷ 8 =
                            </p>
                            <label class="result-label" for="result-4">Escribir resultado:</label>
                            <input type="number" class="result-input" id="result-4">
                            <span class="feedback" id="feedback-4"></span>
                        </div>

                        <div class="exercise-container">
                            <p class="exercise-description">
                                15 ÷ 4 =
                            </p>
                            <label class="result-label" for="result-5">Escribir resultado:</label>
                            <input type="number" class="result-input" id="result-5">
                            <span class="feedback" id="feedback-5"></span>
                        </div>

                        <button id="ejercicio1_btn" class="submit-button">Revisar</button>
                    </div>
                    @include('Calculator.itemCalculator', ['id' => 'calculator3'])
                </div>
            </div>

            <!-- Cuadrado Section -->
            <div id="cuadrado" class="content-section scrollable-content">
                <h1 class="content-title">Elevar al cuadrado</h1>
                <div class="exercise-container">
                    <div class="exercise-content">
                        <p class="exercise-description">
                        <strong>Para elevar un número al cuadrado, presione la tecla del número seguido por la tecla x²</strong>
                        </p>
                        <h2 class="exercise-title">Ejercicio 2</h2>
                        <p class="exercise-description">
                            Encuentra el siguiente volúmen anular:
                        </p>
                        <div class="text-grid">
                            <div>ID² - OD² ÷ 1029.4 </div>
                        </div>
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
                        <button id="ejercicio2_btn" class="submit-button">Revisar</button>
                    </div>
                    @include('Calculator.itemCalculator', ['id' => 'calculator4'])
                </div>
            </div>

            <div id="jerarquia" class="content-section scrollable-content">
                <h1 class="content-title">Jerarquía de operaciones</h1>
                <div class="exercise-container">
                    <div class="exercise-content">
                        <h2 class="exercise-title">Ejercicio 3</h2>
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
                    @include('Calculator.itemCalculator', ['id' => 'calculator5'])
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

            const calculator3 = document.getElementById('calculator3');
            if (calculator3) {
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
                            explanationHtml += `<p><strong>${input.value}</strong> es incorrecto. La respuesta correcta es <strong>${correctAnswers[id]}</strong>.</p>`;
                        }
                    }

                    // Mostrar SweetAlert con los resultados
                    Swal.fire({
                        title: allCorrect ? '¡Excelente!' : 'Algunos errores',
                        text: allCorrect ? 'Has respondido correctamente a todas las preguntas.' : 'Hay respuestas incorrectas. Revisa los campos resaltados.',
                        icon: allCorrect ? 'success' : 'error',
                        html: allCorrect ? answersHtml : explanationHtml,
                        showCancelButton: true,
                        confirmButtonText: 'Continuar',
                        cancelButtonText: 'Ver Explicación',
                    }).then((result) => {
                        if (result.isConfirmed) {
                        
                        } else {
                            // Mostrar modal de explicación
                            showExplanation();
                        }
                    });
                });


                // Función para mostrar modal con explicación
                function showExplanation() {
                    Swal.fire({
                        title: 'Explicación de la Conversión',
                        html: `
                            <p><strong>Recuerda que debes dividir la fracción y sumarle el entero que lo acompaña </strong></p>
                            <p><strong>7 ÷ 8</strong> = 0.875</p>
                            <p><strong>8 + 1 ÷ 2</strong> = 8.5</p>
                            <p><strong>9 + 1 ÷ 4</strong> = 9.25</p>
                            <p><strong>3 ÷ 8</strong> = 0.375</p>
                            <p><strong>15 ÷ 4</strong> = 3.75</p>
                        `,
                        showCancelButton: true,
                        confirmButtonText: 'Ver ejemplo en calculadora',
                        cancelButtonText: 'Cerrar',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            showExample();
                        } else {
                            
                        }
                    });
                }

                // Función para mostrar modal con explicación
                function showExample() {
                    const button6 = calculator3.querySelector(`#all-clear`)
                    button6.click();

                    const button1 = calculator3.querySelector(`#eight`)
                    button1.click();

                    const button2 = calculator3.querySelector(`#add`)
                    button2.click();

                    const button3 = calculator3.querySelector(`#one`)
                    button3.click();

                    const button4 = calculator3.querySelector(`#divide`)
                    button4.click();

                    const button5 = calculator3.querySelector(`#two`)
                    button5.click();
                }
            }

        });

        let isSpeaking = false; // Estado del botón (activo/inactivo)

        function toggleSpeakText() {
            const button = document.getElementById("voiceButton");
            const texto = `Bienvenido a Matemáticas para Perforación. En este módulo, Matemáticas para Perforación, hemos diseñado un contenido completo y dinámico para apoyarte en tu curso de Control de Pozos. Aquí encontrarás una combinación de recursos multimedia, explicaciones claras y ejercicios prácticos que te ayudarán a dominar los conceptos matemáticos y el uso de la calculadora en este campo.
            algunos de los Recursos disponibles son
            Videos explicativos con Tutoriales paso a paso para entender conceptos clave y resolver problemas.
            Audios con Explicaciones breves y claras para repasar en cualquier momento.
            Conceptos teóricos con Explicaciones detalladas de los fundamentos matemáticos aplicados a la perforación.
            Ejemplos de Problemas resueltos con explicaciones claras para que sigas el proceso.
            Ejercicios prácticos diseñados para que apliques lo aprendido.`;

            if (isSpeaking) {
                // Detener la reproducción
                responsiveVoice.cancel();
                button.classList.remove("active"); // Desactivar el estilo "activo"
                button.innerHTML = '<span class="material-icons">volume_up</span> <span>Escuchar</span>'; // Cambiar el ícono y el texto
            } else {
                // Reproducir el texto
                responsiveVoice.speak(
                    texto,
                    "Spanish Latin American Male", // Voz en español latinoamericano masculino
                    {
                        rate: 1.1, // Velocidad
                        pitch: 1.0, // Tono
                        volume: 1.0, // Volumen
                        onend: function () {
                            // Cuando termine la reproducción, desactivar el botón
                            button.classList.remove("active");
                            button.innerHTML = '<span class="material-icons">volume_up</span> <span>Escuchar</span>';
                            isSpeaking = false;
                        }
                    }
                );
                button.classList.add("active"); // Activar el estilo "activo"
                button.innerHTML = '<span class="material-icons">volume_off</span> <span>Detener</span>'; // Cambiar el ícono y el texto
            }

            isSpeaking = !isSpeaking; // Cambiar el estado del botón
        }

        function toggleSpeakText2() {
            const audioPlayer = document.getElementById('audioPlayer');

            if (audioPlayer.paused) {
                audioPlayer.play();
                document.querySelector('#voiceButton2 .material-icons').textContent = 'volume_off';
                document.querySelector('#voiceButton2 span:last-child').textContent = 'Detener';
            } else {
                audioPlayer.pause();
                audioPlayer.currentTime = 0; // Reinicia el audio al principio
                document.querySelector('#voiceButton2 .material-icons').textContent = 'volume_up';
                document.querySelector('#voiceButton2 span:last-child').textContent = 'Escuchar';
            }
        }

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
     <!-- texzt to voice -->
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=El1RpEuf"></script>
@endsection  

    
@php
    $css_identifier = 'calculator';
@endphp