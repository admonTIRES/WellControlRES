@php
    $pdfLinksFormuleIADC = [
        'en' => 'https://heyzine.com/flip-book/ad7fb63e8d.html',
        'es' => 'https://heyzine.com/flip-book/a95df69293.html',
        'pt_BR' => 'https://heyzine.com/flip-book/5867d11ce9.html',
        'ar' => 'https://heyzine.com/flip-book/ad7fb63e8d.html',
    ];
    $pdfLinksFormuleIWCF = [
        'en' => 'https://heyzine.com/flip-book/62311e760f.html',
        'es' => 'https://heyzine.com/flip-book/55f1a0f37b.html',
        'pt_BR' => 'https://heyzine.com/flip-book/1a4ca78d45.html',
        'ar' => 'https://heyzine.com/flip-book/a886157781.html',
    ];
    $pdfLinksConversion = [
        'en' => 'https://heyzine.com/flip-book/972f88a3f7.html',
        'es' => 'https://heyzine.com/flip-book/972f88a3f7.html',
        'pt_BR' => 'https://heyzine.com/flip-book/1a4ca78d45.html.html',
        'ar' => 'https://heyzine.com/flip-book/1a4ca78d45.html.html',
    ];

    $locale = app()->getLocale();

    $iframeSrcFormuleIADC = $pdfLinksFormuleIADC[$locale] ?? $pdfLinksFormuleIADC['en'];
    $iframeSrcFormuleIWCF = $pdfLinksFormuleIWCF[$locale] ?? $pdfLinksFormuleIWCF['en'];
    $iframeSrcConversion = $pdfLinksConversion[$locale] ?? $pdfLinksConversion['en'];

@endphp
@extends('Template/maestraUser')
@section('contenido') 
 
    <div class="main-container"> 
        <div class="sidebar-container">
            <div class="nav-list-container">
               <div class="section-title">{{ __('Content') }}</div>
                <div class="section-subtitle">{{ __('Mathematics for drilling') }}</div>
                <ul class="nav-list">
                    <li class="nav-item active" data-section="introduction">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">{{ __('Introduction') }}</span>
                            <span class="nav-item-subtitle">{{ __('Everything you need to know.') }}</span>
                        </div>
                    </li>

                    <li class="nav-item" data-section="partes">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">{{ __('Calculator parts') }}</span>
                            <span class="nav-item-subtitle">{{ __('Main keyboard.') }}</span>
                        </div>
                    </li>

                    <li class="nav-item" data-section="funciones">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">{{ __('Functions') }}</span>
                            <span class="nav-item-subtitle">{{ __('Essential functions.') }}</span>
                        </div>
                    </li>

                    <li class="nav-item" data-section="config">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">{{ __('Calculator settings') }}</span>
                            <span class="nav-item-subtitle">{{ __('Decimal adjustment.') }}</span>
                        </div>
                    </li>

                    <li class="nav-item" data-section="uso">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">{{ __('Usage') }}</span>
                            <span class="nav-item-subtitle">{{ __('Calculator use in the course.') }}</span>
                        </div>
                    </li>

                    <li class="nav-item" data-section="unidades">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">{{ __('Measurement units') }}</span>
                            <span class="nav-item-subtitle">{{ __('Learn the measurement units you will use in this course.') }}</span>
                        </div>
                    </li>

                    <li class="nav-item" data-section="fraccion">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">{{ __('Fraction to decimal') }}</span>
                            <span class="nav-item-subtitle">{{ __('Fraction to decimal conversion.') }}</span>
                        </div>
                    </li>

                    <li class="nav-item" data-section="jerarquia">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">{{ __('Operation Hierarchy') }}</span>
                            <span class="nav-item-subtitle">{{ __('Order to solve equations.') }}</span>
                        </div>
                    </li>

                    <li class="nav-item" data-section="despeje">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">{{ __('Clearing formulas') }}</span>
                            <span class="nav-item-subtitle">{{ __('Clear formulas.') }}</span>
                        </div>
                    </li>
                    
                    <li class="nav-item" data-section="formulas">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">{{ __('Formulas') }}</span>
                            <span class="nav-item-subtitle">{{ __('Formula book.') }}</span>
                        </div>
                    </li>
                    
                    <li class="nav-item" data-section="redondeo">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">{{ __('Rounding') }}</span>
                            <span class="nav-item-subtitle">{{ __('Rounding rules in the course.') }}</span>
                        </div>
                    </li>
                </ul>

                <div class="section-title">{{ __('Exercises') }}</div>
                <div class="section-subtitle">{{ __('Well operations') }}</div>

                <ul class="nav-list">
                    <li class="nav-item" data-section="fracciones">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">{{ __('Fractions to decimal') }}</span>
                            <span class="nav-item-subtitle">{{ __('Practice converting fractions to decimals.') }}</span>
                        </div>
                    </li>

                    <li class="nav-item" data-section="cuadrado">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">{{ __('Square numbers') }}</span>
                            <span class="nav-item-subtitle">{{ __('Practice squaring numbers.') }}</span>
                        </div>
                    </li>

                    <li class="nav-item" data-section="jerarquias">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">{{ __('Operation hierarchy') }}</span>
                            <span class="nav-item-subtitle">{{ __('Practice the operation hierarchy.') }}</span>
                        </div>
                    </li>

                    <li class="nav-item" data-section="despejes">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">{{ __('Clearing formulas') }}</span>
                            <span class="nav-item-subtitle">{{ __('Practice clearing formulas.') }}</span>
                        </div>
                    </li>

                    <li class="nav-item" data-section="redondeos">
                        <span class="star-icon"></span>
                        <div class="nav-item-content">
                            <span class="nav-item-title">{{ __('Rounding') }}</span>
                            <span class="nav-item-subtitle">{{ __('Practice how to round in the course') }}</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>


         <!-- Content Area -->
        <div class="content-container">

            <div id="introduction" class="content-section active scrollable-content">
                <div class="content-title-voice">
                    <h1 class="math-drilling-title">{{ __('Welcome to "Mathematics for Drilling"') }}</h1>
                    <button id="voiceButtonIntro" class="voice-button" onclick="toggleSpeakText('audioIntro')">
                        <span class="material-icons">volume_up</span> 
                        <span>{{ __('Listen') }}</span>
                    </button>
                    <audio id="audioIntro" src="{{ $audioPaths['audioIntroPath'] }}"></audio>
                </div>
                <div class="math-drilling-section">
                    <h2 class="math-drilling-subtitle">{{ __('What will you find in this module?') }}</h2>
                    <p class="math-drilling-text">{{ __('In this module, "Mathematics for Drilling", we have designed comprehensive and dynamic content to support you in your Well Control course. Here you will find a combination of multimedia resources, clear explanations, and practical exercises that will help you master essential mathematical concepts and calculator usage in this field.') }}</p>
                </div>

                <div class="math-drilling-section">
                    <h2 class="math-drilling-subtitle">{{ __('Available resources') }}</h2>
                    <ul class="math-drilling-list">
                        <li><strong>{{ __('Explanatory videos') }}</strong>: {{ __('Step-by-step tutorials to understand key concepts and solve problems.') }}</li>
                        <li><strong>{{ __('Audios') }}</strong>: {{ __('Brief and clear explanations to review at any time.') }}</li>
                        <li><strong>{{ __('Theoretical concepts') }}</strong>: {{ __('Detailed explanations of mathematical fundamentals applied to drilling.') }}</li>
                        <li><strong>{{ __('Guided examples') }}</strong>: {{ __('Solved problems with clear explanations so you can follow the process.') }}</li>
                        <li><strong>{{ __('Practical exercises') }}</strong>: {{ __('Activities designed for you to apply what you have learned.') }}</li>
                    </ul>
                </div>

                <div class="math-drilling-section">
                    <div class="math-drilling-exercise">
                        <h3 class="math-drilling-exercise-title">{{ __('Module features:') }}</h3>
                        <p class="math-drilling-exercise-text">{{ __('Interactive design:') }}</p>
                        <ul class="math-drilling-list">
                            <li>{{ __('You will discover special features by clicking on elements in this module') }}</li>
                            <li></li>
                        </ul>
                    </div>
                </div>

                <div class="math-drilling-section">
                    <h2 class="math-drilling-subtitle"></h2>
                    <div class="math-drilling-color-palette">
                        <div class="math-drilling-color-box primary">{{ __('Interaction') }}</div>
                        <div class="math-drilling-color-box secondary">{{ __('Theory') }}</div>
                        <div class="math-drilling-color-box dark">{{ __('Practice') }}</div>
                        <div class="math-drilling-color-box dark-gray">{{ __('Review') }}</div>
                    </div>
                </div>
            </div>

            <div id="config" class="content-section scrollable-content">
                <div class="content-title-voice">
                    <h1 class="math-drilling-title">{{ __('Scientific calculator configuration') }}</h1>
                    <button id="voiceButtonConfig" class="voice-button" onclick="toggleSpeakText('audioConfig')">
                        <span class="material-icons">volume_up</span> 
                        <span>{{ __('Listen') }}</span>
                    </button>
                    <audio id="audioConfig" src="{{ $audioPaths['audioConfigPath'] }}"></audio>
                </div>
                <div class="math-drilling-section">
                    <h2 class="math-drilling-subtitle">{{ __('Decimal adjustment for well control course') }}</h2>
                    <p class="math-drilling-text">
                        {{ __('To configure your Casio scientific calculator to display three decimal places in results, follow these steps:') }}
                    </p>
                </div>
                <div class="math-drilling-section">
                    <div class="math-drilling-exercise">
                        <ul class="math-drilling-list">
                            <li>{{ __('Turn on the calculator and press the MODE key several times until the configuration option appears.') }}</li>
                            <li>{{ __('When you see the Fix, Sci, and Norm options on the screen, select Fix to set a fixed number of decimal places.') }}</li>
                            <li>{{ __('After selecting Fix, enter the number 3 so the calculator shows three decimal places in results.') }}</li>
                            <li>{{ __('If you want to return to the standard display format, repeat the process and select Norm instead of Fix.') }}</li>
                        </ul>
                    </div>
                </div>
                <p class="math-drilling-text">
                    {{ __('For a detailed visual guide, check the following video:') }}
                </p>
                <!-- <div class="math-drilling-video">
                    <div style="position: relative; padding-bottom: 56.25%; height: 0;">
                        <iframe id="js_video_iframe" src="https://jumpshare.com/embed/KkcH9kNSZnBbTnctAHs5" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>
                    </div>
                </div> -->
                <div class="math-drilling-video">
                <iframe 
                    src="https://drive.google.com/file/d/1z51pKTGFzarlraTEUrW0bK-B9e3WCtS_/preview" 
                    width="100%" 
                    height="700px"
                    frameborder="0" 
                    allowfullscreen>
                    </iframe>
                    {{-- Los iframe de jumpshare son cuando la app crezca mucho y decidan pagar el servicio, por el momento se hace mediante drive, alojado en la cuenta de admonti@results-in-performance.com --}}
                {{-- <iframe src="https://jumpshare.com/embed/bTdvEi46L5OGGd6rLTQO" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="top: 0; left: 0; width: 100%; height: 700px;"></iframe> --}}

                </div>
                <!-- <div id="secure-video-container" class="video-container">
                    <div id="video-frame-container"></div>
                    
                    <div class="controls-overlay"></div>
                    
                    <div class="logo-blocker"></div>
                    <div class="right-click-blocker" id="right-click-blocker"></div>
                    <div class="watermark">Contenido exclusivo</div>
                    <div class="custom-controls">
                    </div>

                </div> -->
            </div>

            <div id="partes" class="content-section scrollable-content">
                <div class="content-title-voice">
                    <h1 class="math-drilling-title">{{ __('Scientific calculator parts') }}</h1>
                    <button id="voiceButtonParts" class="voice-button" onclick="toggleSpeakText('audioParts')">
                        <span class="material-icons">volume_up</span> 
                        <span>{{ __('Listen') }}</span>
                    </button>
                    <audio id="audioParts" src="{{$audioPaths['audioPartsPath'] }}"></audio>
                </div>
                <div class="calculator-layout">
                     <div class="math-drilling-section">
                        <div class="math-drilling-exercise">
                            <h3 class="math-drilling-exercise-title">{{ __('Calculator parts:') }}</h3>
                            <ul class="calculator-parts-list">
                                <li data-section="screen" class="calculator-part pantalla">
                                    <strong>{{ __('Screen') }}</strong>
                                    <span class="desc">{{ __('Where results and operations are displayed.') }}</span>
                                </li>
                                <li data-section="seccion1" class="calculator-part seccion-principal">
                                    <strong>{{ __('Main section') }}</strong>
                                    <span class="desc">{{ __('Shift, MODE and ON interruptor.') }}</span>
                                </li>
                                <li data-section="seccion2" class="calculator-part funciones-avanzadas">
                                    <strong>{{ __('Advanced functions') }}</strong>
                                    <span class="desc">{{ __('Square, square roots and trigonometric functions.') }}</span>
                                </li>
                                <li data-section="seccion3" class="calculator-part teclado-numerico">
                                    <strong>{{ __('Numeric keypad') }}</strong>
                                    <span class="desc">{{ __('Used to enter numbers.') }}</span>
                                </li>
                                <li data-section="seccion4" class="calculator-part interruptor-borrado">
                                    <strong>{{ __('Switch and delete') }}</strong>
                                    <span class="desc">{{ __('Used to clear the calculator or turn it off.') }}</span>
                                </li>
                                <li data-section="seccion5" class="calculator-part operaciones-basicas">
                                    <strong>{{ __('Basic math operations') }}</strong>
                                    <span class="desc">{{ __('Basic operators for addition, subtraction, multiplication, and division.') }}</span>
                                </li>
                                <li data-section="seccion6" class="calculator-part resultado-ans">
                                    <strong>{{ __('Result and ANS') }}</strong>
                                    <span class="desc">{{ __('Used to calculate the result and get the last answer (Ans).') }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="calculator-item">
                        @include('Calculator.itemCalculator', ['id' => 'calculator1'])
                    </div>
                </div>
            </div>

            
            <div id="funciones" class="content-section scrollable-content">
                <div class="content-title-voice">
                    <h1 class="math-drilling-title">{{ __('Scientific calculator functions') }}</h1>
                    <button id="voiceButtonFunctions" class="voice-button" onclick="toggleSpeakText('audioFunctions')">
                        <span class="material-icons">volume_up</span>
                        <span>{{ __('Listen') }}</span>
                    </button>
                    <audio id="audioFunctions" src="{{ $audioPaths['audioFunctionsPath'] }}"></audio>
                </div>
                <div class="calculator-layout">
                    <div class="math-drilling-section">
                        <div class="math-drilling-exercise">
                            <ul class="calculator-parts-list">
                                <li data-section="sum" class="calculator-part pantalla">
                                    <strong>{{ __('+ Addition') }}</strong>
                                    <span class="desc">{{ __('Performs addition calculations between different values, such as drilling depths, fluid volumes, and other relevant data.') }}</span>
                                </li>
                                <li data-section="rest" class="calculator-part seccion-principal">
                                    <strong>{{ __('- Subtraction') }}</strong>
                                    <span class="desc">{{ __('Essential for calculating differences between values, such as depth reductions, fluid volume decreases, or pressure comparisons during drilling stages.') }}</span>
                                </li>
                                <li data-section="multiplicate" class="calculator-part funciones-avanzadas">
                                    <strong>{{ __('x Multiplication') }}</strong>
                                    <span class="desc">{{ __('Used to perform operations like multiplying pressures, volumes, or any other critical data requiring proportional relationships.') }}</span>
                                </li>
                                <li data-section="division" class="calculator-part teclado-numerico">
                                    <strong>{{ __('÷ Division') }}</strong>
                                    <span class="desc">{{ __('Allows division of values such as flow rates, fluid volumes, and other elements needed for drilling operations.') }}</span>
                                </li>
                                <li data-section="elevate" class="calculator-part interruptor-borrado">
                                    <strong>{{ __('x² Square') }}</strong>
                                    <span class="desc">{{ __('Useful for calculations involving material resistance, drilling areas, or pressure using quadratic functions.') }}</span>
                                </li>
                                <li data-section="parentesis" class="calculator-part operaciones-basicas">
                                    <strong>{{ __('() Parentheses') }}</strong>
                                    <span class="desc">{{ __('Groups operations to prioritize complex calculations, like combining pressures, volumes, and depths in advanced well control equations.') }}</span>
                                </li>
                                <li data-section="result" class="calculator-part resultado-ans">
                                    <strong>{{ __('= Result') }}</strong>
                                    <span class="desc">{{ __('Displays the final result of calculations, providing accurate values for decision-making in drilling and well control operations.') }}</span>
                                </li>
                                <li data-section="percent" class="calculator-part porcentaje-ans">
                                    <strong>{{ __('% Percentage') }}</strong>
                                    <span class="desc">{{ __('Gets the percentage of the value to its left, useful for percentage-based operations in drilling and well control.') }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                   
                </div>
                <div class="calculator-item">
                        @include('Calculator.itemCalculator', ['id' => 'calculator2'])
                </div>
            </div>

            <div id="uso" class="content-section scrollable-content">
                <div class="content-title-voice">
                    <h1 class="math-drilling-title">{{ __('Use') }}</h1>
                    <button id="voiceButtonUse" class="voice-button" onclick="toggleSpeakText('audioUse')">
                        <span class="material-icons">volume_up</span> 
                        <span>{{ __('Listen') }}</span>
                    </button>
                    <audio id="audioUse" src="{{ $audioPaths['audioUsePath']  }}"></audio>
                </div>
                <div class="hero-grid">
                    <div class="card">
                        <img src="/assets/images/calculator/uses_image.jpg" alt="Hannah Laurent" class="profile-img">
                        <div class="overlay"></div>
                        <div class="text-content">
                            <h2 class="hero-title">{{ __('Hydrostatic pressure calculation') }}</h2>
                            <p class="hero-text">{{ __('Essential to ensure well stability. The calculator allows quick resolution of the pressure exerted by the drilling fluid, preventing overpressures or collapses in formations. The formula P=ρ⋅g⋅h is used, considering mud density, gravity and depth.') }}</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="/assets/images/calculator/uses_image2.jpg" alt="Hannah Laurent" class="profile-img">
                        <div class="overlay"></div>
                        <div class="text-content">
                        <h2 class="hero-title">{{ __('Unit conversion') }}</h2>
                            <p class="hero-text">{{ __('In the oil industry, it is common to work with mixed units (metric and imperial). The calculator streamlines conversion between psi and bar, meters and feet, or gallons and liters, ensuring accuracy in reports and operations.') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="hero-grid">
                    <div class="card">
                        <img src="/assets/images/calculator/uses_image3.jpg" alt="Hannah Laurent" class="profile-img">
                        <div class="overlay"></div>
                        <div class="text-content">
                        <h2 class="hero-title">{{ __('Mud volume calculation:') }}</h2>
                            <p class="hero-text">{{ __('Allows determining how much mud is needed to fill the well or perform displacements. With the cylinder volume formula (V=π⋅r 2⋅h), the space the fluid will occupy in the well is calculated, avoiding imbalances.') }}</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="/assets/images/calculator/uses_image4.jpeg" alt="Hannah Laurent" class="profile-img">
                        <div class="overlay"></div>
                        <div class="text-content">
                        <h2 class="hero-title">{{ __('Pressure gradient analysis') }}</h2>
                            <p class="hero-text">{{ __('Allows evaluating how pressure changes with depth, which is vital to prevent formation fractures or collapses. With the calculator, these gradients can be quickly resolved and operational decisions made.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="unidades" class="content-section scrollable-content">
                <div class="content-title-voice">
                    <h1 class="math-drilling-title">{{ __('Measurement units') }}</h1>
                    <button id="voiceButtonUnit" class="voice-button" onclick="toggleSpeakText('audioUnit')">
                        <span class="material-icons">volume_up</span> 
                        <span>{{ __('Listen') }}</span>
                    </button>
                    <audio id="audioUnit" src="{{ $audioPaths['audioUnitPath'] }}"></audio>
                </div>
                <div class="math-drilling-section">
                    <h2 class="math-drilling-subtitle">{{ __('Measurement units in well control') }}</h2>
                    <p class="math-drilling-text">
                        {{ __('In well control, it is essential to understand and convert between different units of measurement to ensure accuracy in calculations and operations. Below are the most common units and their application.') }}
                    </p>
                </div>
                <div class="math-drilling-section">
                    <h2 class="math-drilling-subtitle">{{ __('Unit conversion table') }}</h2>
                </div>
                <iframe allowfullscreen="allowfullscreen" scrolling="no" class="fp-iframe"
                        src="{{ $iframeSrcConversion }}"
                        style="border: 0px; width: 100%; height: 100%; min-height: 625px;">
                </iframe>
                <!-- <iframe allowfullscreen="allowfullscreen" scrolling="no" class="fp-iframe" src="https://heyzine.com/flip-book/972f88a3f7.html" style="border: 0px; width: 100%; height: 100%; min-height: 625px;"></iframe>    -->
                <div class="math-drilling-section">
                    <div class="math-drilling-exercise">
                        <h3 class="math-drilling-subtitle">{{ __('Length units') }}</h3>
                        <ul class="math-drilling-list">
                            <li><strong>{{ __('Feet (ft)') }}</strong>: {{ __('Used to measure drilling depths.') }}</li>
                            <li><strong>{{ __('Meters (m)') }}</strong>: {{ __('Commonly used in metric systems.') }}</li>
                            <li><strong>{{ __('Conversion') }}</strong>: {{ __('1 foot = 0.3048 meters.') }}</li>
                        </ul>
                        <p class="math-drilling-text">
                            
                        </p>
                        <img src="/assets/images/calculator/piesametros.jpg" alt="{{ __('Feet to meters conversion') }}" class="math-drilling-image">
                    </div>
                </div>

                <div class="math-drilling-section">
                    <div class="math-drilling-exercise">
                        <h3 class="math-drilling-subtitle">{{ __('Volume units') }}</h3>
                        <ul class="math-drilling-list">
                            <li><strong>{{ __('Barrels (bbl)') }}</strong>: {{ __('Used to measure fluid volumes.') }}</li>
                            <li><strong>{{ __('Gallons (gal)') }}</strong>: {{ __('Common in pumping operations.') }}</li>
                            <li><strong>{{ __('Conversion') }}</strong>: {{ __('1 barrel = 42 gallons.') }}</li>
                        </ul>

                    </div>
                </div>

                <div class="math-drilling-section">
                    <div class="math-drilling-exercise">
                        <h3 class="math-drilling-subtitle">{{ __('Pressure units') }}</h3>
                        <ul class="math-drilling-list">
                            <li><strong>{{ __('Pounds per square inch (psi)') }}</strong>: {{ __('Used to measure well pressure.') }}</li>
                            <li><strong>{{ __('Bars (bar)') }}</strong>: {{ __('Common in international systems.') }}</li>
                            <li><strong>{{ __('Conversion') }}</strong>: {{ __('1 bar = 14.5038 psi.') }}</li>
                        </ul>

                    </div>
                </div>

                <p class="math-drilling-text">
                    {{ __('For a more detailed explanation about measurement units in well control, watch the following video:') }}
                </p>


                 <div class="math-drilling-video">
                <iframe 
                    src="https://drive.google.com/file/d/1_pX_zIn3wWDViPsTRtj6ZF90KLSxZti4/preview" 
                    width="100%" 
                    height="700px"
                    frameborder="0" 
                    allowfullscreen>
                    </iframe>
                {{-- <iframe src="https://jumpshare.com/embed/uNRQiIePuyvhQjQijZAS" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="top: 0; left: 0; width: 100%; height: 700px;"></iframe> --}}

                </div>
            </div>

            <div id="fraccion" class="content-section scrollable-content">
                <div class="content-title-voice">
                    <h1 class="math-drilling-title">{{ __('Convert from fraction to decimal') }}</h1>
                    <button id="voiceButtonFraction" class="voice-button" onclick="toggleSpeakText('audioFraction')">
                        <span class="material-icons">volume_up</span> 
                        <span>{{ __('Listen') }}</span>
                    </button>
                    <audio id="audioFraction" src="{{ $audioPaths['audioFractionPath'] }}"></audio>
                </div>
                <div class="math-drilling-section">
                    <h2 class="math-drilling-subtitle">{{ __('What is a fraction and how to convert it to decimal?') }}</h2>
                    <p class="math-drilling-text">
                        {{ __('A fraction represents a part of a whole. In well control, it is common to work with fractions to measure diameters, depths and other parameters. Converting a fraction to decimal is essential to perform accurate calculations.') }}
                    </p>
                </div>

                <div class="math-drilling-section">
                    <div class="math-drilling-exercise">
                        <h3 class="math-drilling-subtitle">{{ __('Steps to convert a fraction to decimal') }}</h3>
                        <ul class="math-drilling-list">
                            <li>{{ __('Divide the numerator (top number) by the denominator (bottom number).') }}</li>
                            <li>{{ __('Example: To convert 3/4 to decimal, divide 3 by 4. The result is 0.75.') }}</li>
                            <li>{{ __('If the fraction is mixed (for example, 1 3/4), first convert the fractional part and then add it to the whole number.') }}</li>
                            <li>{{ __('Example: 1 3/4 becomes 1 + 0.75 = 1.75.') }}</li>
                        </ul>
                    </div>
                </div>

                <div class="math-drilling-section">
                    <h3 class="math-drilling-subtitle">{{ __('Practical examples') }}</h3>
                    <p class="math-drilling-text">
                        {{ __('Here are some common examples of fraction to decimal conversion:') }}
                    </p>
                    <ul class="math-drilling-list">
                        <li><code>1/2</code> = 0.5</li>
                        <li><code>3/8</code> = 0.375</li>
                        <li><code>5/16</code> = 0.3125</li>
                        <li><code>7/8</code> = 0.875</li>
                    </ul>
                </div>

                <div class="math-drilling-section">
                    <h3 class="math-drilling-subtitle">{{ __('Use in well control') }}</h3>
                    <p class="math-drilling-text">
                        {{ __('In well control, fractions are used to measure pipe diameters, bit sizes and other parameters. Converting these fractions to decimals facilitates pressure, volume and depth calculations.') }}
                    </p>
                </div>

                <p class="math-drilling-text">
                    {{ __('For a more detailed explanation, watch the following video:') }}
                </p>
                 <div class="math-drilling-video">
                <iframe 
                    src="https://drive.google.com/file/d/16pzyARzbNT6kTn7AKJqoAZPdbTNPRVf4/preview" 
                    width="100%" 
                    height="700px"
                    frameborder="0" 
                    allowfullscreen>
                    </iframe>
                {{-- <iframe src="https://jumpshare.com/embed/K1VSrjl4E7BgbmhnHnI9" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="top: 0; left: 0; width: 100%; height: 700px;"></iframe> --}}

                </div>
            </div>

            <div id="jerarquia" class="content-section scrollable-content">
                <div class="content-title-voice">
                    <h1 class="math-drilling-title">{{ __('Order of Operations') }}</h1>
                    <button id="voiceButtonHierarchy" class="voice-button" onclick="toggleSpeakText('audioHierarchy')">
                        <span class="material-icons">volume_up</span> 
                        <span>{{ __('Listen') }}</span>
                    </button>
                    <audio id="audioHierarchy" src="{{ $audioPaths['audioHierarchyPath'] }}"></audio>
                </div>
                <div class="math-drilling-section">
                    <h2 class="math-drilling-subtitle">{{ __('The order in which equations should be solved') }}</h2>
                    <p class="math-drilling-text">
                    {{ __('The order of operations establishes the sequence in which we must perform mathematical operations to obtain a correct result.') }}
                    </p>
                </div>

                <p class="math-drilling-text">
                    {{ __('For a more detailed explanation about measurement units in well control, watch the following video:') }}
                </p>
                 <div class="math-drilling-video">
                <iframe 
                    src="https://drive.google.com/file/d/15HG64dFbimzNOwaA0usD0DL6SLRLikqJ/preview" 
                    width="100%" 
                    height="700px"
                    frameborder="0" 
                    allowfullscreen>
                    </iframe>
                {{-- <iframe src="https://jumpshare.com/embed/R5Qw6JyAYze0Gzu4gpCO" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="top: 0; left: 0; width: 100%; height: 700px;"></iframe> --}}

                </div>
            </div>

            <div id="despeje" class="content-section scrollable-content">
                <div class="content-title-voice">
                    <h1 class="math-drilling-title">{{ __('Variable Isolation') }}</h1>
                    <button id="voiceButtonClearance" class="voice-button" onclick="toggleSpeakText('audioClearance')">
                        <span class="material-icons">volume_up</span> 
                        <span>{{ __('Listen') }}</span>
                    </button>
                    <audio id="audioClearance" src="{{ $audioPaths['audioClearancePath'] }}"></audio>
                </div>
                <div class="math-drilling-section">
                    <h2 class="math-drilling-subtitle">{{ __('What is variable isolation and why is it important?') }}</h2>
                    <p class="math-drilling-text">
                        {{ __('Isolating a variable in a formula is fundamental in well control, as it allows calculating unknown values from known data. This is especially useful in pressure, volume and depth calculations.') }}
                    </p>
                </div>

                <div class="math-drilling-section">
                    <div class="math-drilling-exercise">
                        <h3 class="math-drilling-subtitle">{{ __('Steps to isolate a variable') }}</h3>
                        <ul class="math-drilling-list">
                            <li>{{ __('Identify the variable you want to isolate.') }}</li>
                            <li>{{ __('Apply inverse operations (addition/subtraction, multiplication/division) to isolate the variable.') }}</li>
                            <li>{{ __('Simplify the equation until the variable remains alone on one side of the equality.') }}</li>
                            <li>{{ __('Verify your result by substituting the known values into the original equation.') }}</li>
                        </ul>
                    </div>
                </div>

                <div class="math-drilling-section">
                    <h3 class="math-drilling-subtitle">{{ __('Practical examples') }}</h3>
                    <p class="math-drilling-text">
                        {{ __('Here are some common examples of variable isolation in formulas used in well control:') }}
                    </p>
                    <ul class="math-drilling-list">
                        <li><strong>{{ __('Hydrostatic pressure') }}</strong>: {{ __('Isolate depth (h) in the formula P = ρ * g * h.') }}</li>

                         <div class="math-drilling-video">
                <iframe 
                    src="https://drive.google.com/file/d/10QiPiCGmhYKqil35ojhgrSLKxUJzPf3W/preview" 
                    width="100%" 
                    height="700px"
                    frameborder="0" 
                    allowfullscreen>
                    </iframe>
                {{-- <iframe src="https://jumpshare.com/embed/2HzPpi9PVCZAtQt6xeVz" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="top: 0; left: 0; width: 100%; height: 700px;"></iframe> --}}

                </div>
                        <li><strong>{{ __('Fluid volume') }}</strong>: {{ __('Isolate radius (r) in the formula V = π * r² * h.') }}</li>
                        <li><strong>{{ __('Pressure gradient') }}</strong>: {{ __('Isolate density (ρ) in the formula GP = ρ * g.') }}</li>
                    </ul>
                </div>

                <div class="math-drilling-section">
                    <h3 class="math-drilling-subtitle">{{ __('Use in well control') }}</h3>
                    <p class="math-drilling-text">
                        {{ __('In well control, variable isolation is used to calculate critical variables such as pressure, fluid volume and depth. These operations are essential to ensure safety and efficiency in drilling operations.') }}
                    </p>
                </div>

                <p class="math-drilling-text">
                    {{ __('For a more detailed explanation, watch the following video:') }}
                </p>
                 <div class="math-drilling-video">
                <iframe 
                    src="https://drive.google.com/file/d/1Owe9uXOW9UPTnU0ysnBEjMw84mJUJh5T/preview" 
                    width="100%" 
                    height="700px"
                    frameborder="0" 
                    allowfullscreen>
                    </iframe>
                {{-- <iframe src="https://jumpshare.com/embed/fjO2C8xBC4sBIuZW98OC" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="top: 0; left: 0; width: 100%; height: 700px;"></iframe> --}}

                </div>
            </div>

            <div id="redondeo" class="content-section scrollable-content">
                <div class="content-title-voice">
                    <h1 class="math-drilling-title">{{ __('Result rounding') }}</h1>
                    <button id="voiceButtonRounding" class="voice-button" onclick="toggleSpeakText('audioRounding')">
                        <span class="material-icons">volume_up</span> 
                        <span>{{ __('Listen') }}</span>
                    </button>
                    <audio id="audioRounding" src="{{ $audioPaths['audioRoundingPath'] }}"></audio>
                </div>
                <div class="math-drilling-section">
                    <p class="math-drilling-text">
                    {{ __('This section establishes how we should round results to obtain a correct result.') }}
                    </p>
                </div>

                @switch($enteAcreditador)
                    @case(1)
                    <!-- cuando es IADC -->
                    <div class="math-drilling-section">
                        <h2 class="math-drilling-subtitle">{{ __('Rounding rules book in the well control course - IADC') }}</h2>
                    </div>
                    <iframe allowfullscreen="allowfullscreen" scrolling="no" class="fp-iframe"
                            src="{{ $iframeSrcFormuleIADC }}"
                            style="border: 0px; width: 100%; height: 100%; min-height: 625px;">
                    </iframe>
                        @break

                    @case(2)
                    <!-- cuando es IWCF -->
                    <div class="math-drilling-section">
                        <h2 class="math-drilling-subtitle">{{ __('Rounding rules book in the well control course - IWCF') }}</h2>
                    </div>
                    <iframe allowfullscreen="allowfullscreen" scrolling="no" class="fp-iframe"
                            src="{{ $iframeSrcFormuleIWCF }}"
                            style="border: 0px; width: 100%; height: 100%; min-height: 625px;">
                    </iframe>
                        @break
                        
                    @default
                    <!-- cuando es AMBOS -->
                    <div class="math-drilling-section">
                        <h2 class="math-drilling-subtitle">{{ __('Rounding rules book in the well control course - IADC') }}</h2>
                    </div>
                    <iframe allowfullscreen="allowfullscreen" scrolling="no" class="fp-iframe"
                            src="{{ $iframeSrcFormuleIADC }}"
                            style="border: 0px; width: 100%; height: 100%; min-height: 625px;">
                    </iframe>
                    <div class="math-drilling-section">
                        <h2 class="math-drilling-subtitle">{{ __('Rounding rules book in the well control course - IWCF') }}</h2>
                    </div>
                    <iframe allowfullscreen="allowfullscreen" scrolling="no" class="fp-iframe"
                            src="{{ $iframeSrcFormuleIWCF }}"
                            style="border: 0px; width: 100%; height: 100%; min-height: 625px;">
                    </iframe>
                @endswitch
                
                <p class="math-drilling-text">
                    {{ __('For a more detailed explanation about measurement units in well control, watch the following video:') }}
                </p>
                 <div class="math-drilling-video">
                <iframe 
                    src="https://drive.google.com/file/d/142huz725I8d3QUbbZQ8GCfHjm_7ips9w/preview" 
                    width="100%" 
                    height="700px"
                    frameborder="0" 
                    allowfullscreen>
                    </iframe>
                {{-- <iframe src="https://jumpshare.com/embed/os27wDIgvEH4jp5AVyw7" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="top: 0; left: 0; width: 100%; height: 700px;"></iframe> --}}

                </div>
                
            </div>

            <div id="formulas" class="content-section scrollable-content">
                <div class="content-title-voice">
                    <h1 class="math-drilling-title">{{ __('Formulas') }}</h1>
                    <button id="voiceButtonFormula" class="voice-button" onclick="toggleSpeakText('audioFormula')">
                        <span class="material-icons">volume_up</span> 
                        <span>{{ __('Listen') }}</span>
                    </button>
                    <audio id="audioFormula" src="{{ $audioPaths['audioFormulaPath'] }}"></audio>
                </div>
                
                @switch($enteAcreditador)
                    @case(1)
                    <!-- cuando es IADC -->
                    <div class="math-drilling-section">
                        <h2 class="math-drilling-subtitle">{{ __('Formulas book for the IADC well control course') }}</h2>
                    </div>
                    <iframe allowfullscreen="allowfullscreen" scrolling="no" class="fp-iframe"
                            src="{{ $iframeSrcFormuleIADC }}"
                            style="border: 0px; width: 100%; height: 100%; min-height: 625px;">
                    </iframe>
                        @break

                    @case(2)
                    <!-- cuando es IWCF -->
                    <div class="math-drilling-section">
                        <h2 class="math-drilling-subtitle">{{ __('Formulas book for the IWCF well control course') }}</h2>
                    </div>
                    <iframe allowfullscreen="allowfullscreen" scrolling="no" class="fp-iframe"
                            src="{{ $iframeSrcFormuleIWCF }}"
                            style="border: 0px; width: 100%; height: 100%; min-height: 625px;">
                    </iframe>
                        @break
                        
                    @default
                    <!-- cuando es AMBOS -->
                    <div class="math-drilling-section">
                        <h2 class="math-drilling-subtitle">{{ __('Formulas book for the IADC well control course') }}</h2>
                    </div>
                    <iframe allowfullscreen="allowfullscreen" scrolling="no" class="fp-iframe"
                            src="{{ $iframeSrcFormuleIADC }}"
                            style="border: 0px; width: 100%; height: 100%; min-height: 625px;">
                    </iframe>
                    <div class="math-drilling-section">
                        <h2 class="math-drilling-subtitle">{{ __('Formulas book for the IWCF well control course') }}</h2>
                    </div>
                    <iframe allowfullscreen="allowfullscreen" scrolling="no" class="fp-iframe"
                            src="{{ $iframeSrcFormuleIWCF }}"
                            style="border: 0px; width: 100%; height: 100%; min-height: 625px;">
                    </iframe>
                @endswitch
            </div>

            <!-- exercices section -->
            <div id="fracciones" class="content-section scrollable-content">
                <div class="math-drilling-section">
                    <h2 class="math-drilling-subtitle">{{ __('Fraction to Decimal Conversion') }}</h2>
                        <p class="exercise-description">
                        {{ __('Convert the following fractions to decimal and write the result in the corresponding box:') }}
                        </p>
                </div>
                <div class="exercise-container" id="fraccionesContent">
                </div>
                 <div class="calculator-container">
                    @include('Calculator.itemCalculator', ['id' => 'calculator3'])
                    </div>
                <div class="button-container">
                    <button id="ejercicio1_btn" class="submit-button">
                    <span class="icon">
                            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgMjQgMjQiPjxnIGZpbGw9Im5vbmUiIHN0cm9rZT0iI2ZmZmZmZiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBzdHJva2Utd2lkdGg9IjIiPjxwYXRoIHN0cm9rZS1kYXNoYXJyYXk9IjY0IiBzdHJva2UtZGFzaG9mZnNldD0iNjQiIGQ9Ik0zIDEyYzAgLTQuOTcgNC4wMyAtOSA5IC05YzQuOTcgMCA5IDQuMDMgOSA5YzAgNC45NyAtNC4wMyA5IC05IDljLTQuOTcgMCAtOSAtNC4wMyAtOSAtOVoiPjxhbmltYXRlIGZpbGw9ImZyZWV6ZSIgYXR0cmlidXRlTmFtZT0ic3Ryb2tlLWRhc2hvZmZzZXQiIGR1cj0iMC42cyIgdmFsdWVzPSI2NDswIi8+PC9wYXRoPjxwYXRoIHN0cm9rZS1kYXNoYXJyYXk9IjE0IiBzdHJva2UtZGFzaG9mZnNldD0iMTQiIGQ9Ik04IDEybDMgM2w1IC01Ij48YW5pbWF0ZSBmaWxsPSJmcmVlemUiIGF0dHJpYnV0ZU5hbWU9InN0cm9rZS1kYXNob2Zmc2V0IiBiZWdpbj0iMC42cyIgZHVyPSIwLjJzIiB2YWx1ZXM9IjE0OzAiLz48L3BhdGg+PC9nPjwvc3ZnPg==" alt="Revisar">
                        </span> {{ __('Check') }}
                    </button>
                    <button id="reset_btn" class="submit-button">
                        <span class="icon">
                            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgNTEyIDUxMiI+PHBhdGggZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZmZmZmZmIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLXdpZHRoPSIzMiIgZD0ibTQwMCAxNDhsLTIxLjEyLTI0LjU3QTE5MS40MyAxOTEuNDMgMCAwIDAgMjQwIDY0QzEzNCA2NCA0OCAxNTAgNDggMjU2czg2IDE5MiAxOTIgMTkyYTE5Mi4wOSAxOTIuMDkgMCAwIDAgMTgxLjA3LTEyOCIvPjxwYXRoIGZpbGw9IiNmZmZmZmYiIGQ9Ik00NjQgOTcuNDJWMjA4YTE2IDE2IDAgMCAxLTE2IDE2SDMzNy40MmMtMTQuMjYgMC0yMS40LTE3LjIzLTExLjMyLTI3LjMxTDQzNi42OSA4Ni4xQzQ0Ni43NyA3NiA0NjQgODMuMTYgNDY0IDk3LjQyIi8+PC9zdmc+" alt="Reiniciar">
                        </span> {{ __('Reset') }}
                    </button>
                </div>
            </div>

            <div id="cuadrado" class="content-section scrollable-content">
                <h1 class="content-title">{{ __('Ejercicios de elevar al cuadrado') }}</h1>

                <div class="exercise-container" id="cuadrado-container">
                </div>

                <div class="calculator-container">
                    @include('Calculator.itemCalculator', ['id' => 'calculator4'])
                </div>

                <div class="button-container">
                    <button id="revisar-cuadrado-btn" class="submit-button">{{ __('Revisar') }}</button>
                    <button id="reset-cuadrado-btn" class="submit-button">{{ __('Reiniciar') }}</button>
                    <button id="new-cuadrado-btn" class="submit-button">{{ __('Nuevo Ejercicio') }}</button>
                </div>
            </div>

            <div id="jerarquias" class="content-section scrollable-content">
                <h1 class="content-title">Jerarquía de Operaciones</h1>
               
                <div class="exercise-container" id="jerarquias-container">
                </div>

                <div class="calculator-container">
                    @include('Calculator.itemCalculator', ['id' => 'calculator5'])
                </div>

                <div class="button-container">
                    <button id="revisar-jerarquias-btn" class="submit-button">{{ __('Revisar') }}</button>
                    <button id="reset-jerarquias-btn" class="submit-button">{{ __('Reiniciar') }}</button>
                    <button id="new-jerarquias-btn" class="submit-button">{{ __('Nuevo Ejercicio') }}</button>
                </div>
            </div>

            <div id="despejes" class="content-section scrollable-content">
                <h1 class="content-title">Ejercicios de despejes en el curso de control de pozos</h1>
              
                <div class="exercise-container" id="despejes-container">
                </div>

                <div class="calculator-container">
                    @include('Calculator.itemCalculator', ['id' => 'calculator6'])
                </div>

                <div class="button-container">
                    <button id="revisar-despejes-btn" class="submit-button">{{ __('Revisar') }}</button>
                    <button id="reset-despejes-btn" class="submit-button">{{ __('Reiniciar') }}</button>
                    <button id="new-despejes-btn" class="submit-button">{{ __('Nuevo Ejercicio') }}</button>
                </div>
            </div>

            <div id="redondeos" class="content-section scrollable-content">
                <h1 class="content-title">Ejercicios de redondeos</h1>
                <div class="exercise-container" id="redondeos-container" style=" max-width: 100%;">
                </div>

                <div class="button-container">
                    <button id="revisar-redondeos-btn" class="submit-button">{{ __('Revisar') }}</button>
                    <button id="reset-redondeos-btn" class="submit-button">{{ __('Reiniciar') }}</button>
                    <button id="new-redondeos-btn" class="submit-button">{{ __('Nuevo Ejercicio') }}</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const allFracciones = @json($fracciones);
        const allCuadrado = @json($elevacion);
        const allDespejes = @json($despejes);
        const allJerarquia = @json($jerarquia);
        const allRedondeos = @json($redondeos);
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flipbook.js/0.0.1/flipbook.min.js"></script>
@endsection  

    
@php
    $css_identifier = 'calculator';
@endphp