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
                <!-- <div  class="math-drilling-video">
                <iframe 
                    src="https://drive.google.com/file/d/1du0CTCxMcc5MEyBBNpbGsLe2mEo0GiFw/preview" 
                    width="100%" 
                    height="700px"
                    frameborder="0" 
                    allowfullscreen>
                    </iframe>
                </div> -->
                <div class="responsive-video">
                    <iframe
                        src="https://drive.google.com/file/d/1_pX_zIn3wWDViPsTRtj6ZF90KLSxZti4/preview"
                        frameborder="0"
                        allowfullscreen>
                    </iframe>
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
                <!-- <div  class="math-drilling-video">
                <iframe 
                    src="https://drive.google.com/file/d/1h62gKVHFIsasA9Kwc0gOYlxBJR55NUOy/preview" 
                width="100%" 
                    height="700px"
                    frameborder="0" 
                    allowfullscreen>
                    </iframe>
                </div> -->
                <div class="responsive-video">
                    <iframe
                        src="https://drive.google.com/file/d/16pzyARzbNT6kTn7AKJqoAZPdbTNPRVf4/preview" 
                        frameborder="0"
                        allowfullscreen>
                    </iframe>
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
                <!-- <div  class="math-drilling-video">
                <iframe 
                    src="https://drive.google.com/file/d/1YsHtXHcAcgi2PF0jtSF70cEv_g39IDsz/preview" 
                width="100%" 
                    height="700px"
                    frameborder="0" 
                    allowfullscreen>
                    </iframe>
                </div> -->
                <div class="responsive-video">
                    <iframe
                       src="https://drive.google.com/file/d/15HG64dFbimzNOwaA0usD0DL6SLRLikqJ/preview" 
                        frameborder="0"
                        allowfullscreen>
                    </iframe>
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
                        <!-- <div  class="math-drilling-video">
                            <iframe 
                                src="https://drive.google.com/file/d/1G2OuIxnxAtjvkz_BllddiTnmsBxXNIrO/preview" 
                                width="1030px" 
                                height="600px"
                                frameborder="0" 
                                allowfullscreen>
                            </iframe>
                        </div> -->
                        <div class="responsive-video">
                            <iframe
                                src="https://drive.google.com/file/d/10QiPiCGmhYKqil35ojhgrSLKxUJzPf3W/preview" 
                                frameborder="0"
                                allowfullscreen>
                            </iframe>
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
                <!-- <div  class="math-drilling-video">
                    <iframe 
                        src="https://drive.google.com/file/d/1iikIoc9Gh5ISW7S4_plJ0bmxXvefV6On/preview" 
                        width="100%" 
                        height="700px"
                        frameborder="0" 
                        allowfullscreen>
                    </iframe>
                </div> -->
                <div class="responsive-video">
                    <iframe
                       src="https://drive.google.com/file/d/1Owe9uXOW9UPTnU0ysnBEjMw84mJUJh5T/preview" 
                        frameborder="0"
                        allowfullscreen>
                    </iframe>
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
                <!-- <div  class="math-drilling-video">
                    <iframe 
                        src="https://drive.google.com/file/d/1Kgtk2bvyf-bbiQ0dnmdHZxs0VrLTdwOi/preview" 
                        width="100%" 
                        height="700px"
                        frameborder="0" 
                        allowfullscreen>
                    </iframe>
                </div> -->
                <div class="responsive-video">
                    <iframe
                        src="https://drive.google.com/file/d/142huz725I8d3QUbbZQ8GCfHjm_7ips9w/preview" 
                        frameborder="0"
                        allowfullscreen>
                    </iframe>
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
                </div>
                <div class="exercise-container">
                    <div class="exercise-content">
                        <h2 class="exercise-title">{{ __('Exercise 1') }}</h2>
                        <p class="exercise-description">
                        {{ __('Convert the following fractions to decimal and write the result in the corresponding box:') }}
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
                            {{ __('The correct answer is ') }}<strong> 0.8758</strong> 
                            </p>
                            <button id="fraccion_1" class="answer-button" onclick="showExample(0,7,8)"> {{ __('View in calculator') }}</button>
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
                            {{ __('The correct answer is ') }} <strong> 8.5</strong> 
                            </p>
                            <button id="fraccion_2" class="answer-button" onclick="showExample(8,1,2)"> {{ __('View in calculator') }}</button>
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
                            {{ __('The correct answer is ') }} <strong> 9.25</strong> 
                            </p>
                            <button id="fraccion_3" class="answer-button" onclick="showExample(9,1,4)"> {{ __('View in calculator') }}</button>
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
                            {{ __('The correct answer is ') }} <strong> 0.375</strong> 
                            </p>
                            <button id="fraccion_4" class="answer-button" onclick="showExample(0,3,8)"> {{ __('View in calculator') }}</button>
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
                            {{ __('The correct answer is ') }} <strong> 3.75</strong> 
                            </p>
                            <button id="fraccion_5" class="answer-button" onclick="showExample(0,15,4)"> {{ __('View in calculator') }}</button>
                        </div>

                        <div class="button-container">
                            <button id="ejercicio1_btn" class="submit-button">
                            <span class="icon">
                                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgMjQgMjQiPjxnIGZpbGw9Im5vbmUiIHN0cm9rZT0iI2ZmZmZmZiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBzdHJva2Utd2lkdGg9IjIiPjxwYXRoIHN0cm9rZS1kYXNoYXJyYXk9IjY0IiBzdHJva2UtZGFzaG9mZnNldD0iNjQiIGQ9Ik0zIDEyYzAgLTQuOTcgNC4wMyAtOSA5IC05YzQuOTcgMCA5IDQuMDMgOSA5YzAgNC45NyAtNC4wMyA5IC05IDljLTQuOTcgMCAtOSAtNC4wMyAtOSAtOVoiPjxhbmltYXRlIGZpbGw9ImZyZWV6ZSIgYXR0cmlidXRlTmFtZT0ic3Ryb2tlLWRhc2hvZmZzZXQiIGR1cj0iMC42cyIgdmFsdWVzPSI2NDswIi8+PC9wYXRoPjxwYXRoIHN0cm9rZS1kYXNoYXJyYXk9IjE0IiBzdHJva2UtZGFzaG9mZnNldD0iMTQiIGQ9Ik04IDEybDMgM2w1IC01Ij48YW5pbWF0ZSBmaWxsPSJmcmVlemUiIGF0dHJpYnV0ZU5hbWU9InN0cm9rZS1kYXNob2Zmc2V0IiBiZWdpbj0iMC42cyIgZHVyPSIwLjJzIiB2YWx1ZXM9IjE0OzAiLz48L3BhdGg+PC9nPjwvc3ZnPg==" alt="Revisar">
                                </span> {{ __('Check') }}
                            </button>
                            <button id="reset_btn" class="reset-button">
                                <span class="icon">
                                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgNTEyIDUxMiI+PHBhdGggZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZmZmZmZmIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLXdpZHRoPSIzMiIgZD0ibTQwMCAxNDhsLTIxLjEyLTI0LjU3QTE5MS40MyAxOTEuNDMgMCAwIDAgMjQwIDY0QzEzNCA2NCA0OCAxNTAgNDggMjU2czg2IDE5MiAxOTIgMTkyYTE5Mi4wOSAxOTIuMDkgMCAwIDAgMTgxLjA3LTEyOCIvPjxwYXRoIGZpbGw9IiNmZmZmZmYiIGQ9Ik00NjQgOTcuNDJWMjA4YTE2IDE2IDAgMCAxLTE2IDE2SDMzNy40MmMtMTQuMjYgMC0yMS40LTE3LjIzLTExLjMyLTI3LjMxTDQzNi42OSA4Ni4xQzQ0Ni43NyA3NiA0NjQgODMuMTYgNDY0IDk3LjQyIi8+PC9zdmc+" alt="Reiniciar">
                                </span> {{ __('Reset') }}
                            </button>
                            <button id="new_btn" class="new-button">
                                <span class="icon">
                                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgNTEyIDUxMiI+PHBhdGggZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZmZmZmZmIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLXdpZHRoPSIzMiIgZD0ibTQwMCAxNDhsLTIxLjEyLTI0LjU3QTE5MS40MyAxOTEuNDMgMCAwIDAgMjQwIDY0QzEzNCA2NCA0OCAxNTAgNDggMjU2czg2IDE5MiAxOTIgMTkyYTE5Mi4wOSAxOTIuMDkgMCAwIDAgMTgxLjA3LTEyOCIvPjxwYXRoIGZpbGw9IiNmZmZmZmYiIGQ9Ik00NjQgOTcuNDJWMjA4YTE2IDE2IDAgMCAxLTE2IDE2SDMzNy40MmMtMTQuMjYgMC0yMS40LTE3LjIzLTExLjMyLTI3LjMxTDQzNi42OSA4Ni4xQzQ0Ni43NyA3NiA0NjQgODMuMTYgNDY0IDk3LjQyIi8+PC9zdmc+" alt="Reiniciar">
                                </span> {{ __('New Exercise') }}
                            </button>
                        </div>
                    </div>
                    <div class="calculator-container">
                    @include('Calculator.itemCalculator', ['id' => 'calculator3'])
                    </div>
                </div>
            </div>

            <div id="cuadrado" class="content-section scrollable-content">
                <h1 class="content-title">{{ __('Ejercicios de elevar al cuadrado') }}</h1>
                <div class="exercise-container">
                    <div class="exercise-content">
                        <!-- Pregunta 1 -->
                        <div class="question">
                            <h2 class="exercise-title">{{ __('Pregunta 1') }}</h2>
                            <p class="exercise-description">
                            {{ __('Encuentre el rendimiento en bbl/stk con una eficiencia del 100% de una bomba triplex. Pistón de 7" x 12" emboladas.') }}
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
                            <div class="math-answer-exercise cuadrado" id="answer-1">
                                <p class="math-drilling-text">
                                {{ __('The correct answer is ') }} <strong>0.0525 bbl/ft</strong>.
                                </p>
                                <button class="answer-button" onclick="showExampleElevate(1)">Ver en calculadora</button>
                                <button id="solution1_btn" class="solution-button" onclick="showSolution(1)">
                                    <span class="icon">
                                            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgMjQgMjQiPjxwYXRoIGZpbGw9Im5vbmUiIHN0cm9rZT0iI2ZmZmZmZiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBzdHJva2Utd2lkdGg9IjIiIGQ9Ik00IDIwaDRMMTguNSA5LjVhMi44MjggMi44MjggMCAxIDAtNC00TDQgMTZ6bTkuNS0xMy41bDQgNE0xNSAxOWwyIDJsNC00Ii8+PC9zdmc+" alt="Revisar">    
                                    </span> {{ __('Show solution ') }}
                                </button>
                            </div>
                            <div class="math-drilling-section">
                                <div id="solution1" class="math-drilling-solution">
                                    <img src="/assets/images/calculator/solutions/1.png" alt="Conversión de pies a metros" class="solution-image">
                                </div>
                            </div>
                        </div>

                                <!-- Pregunta 2 -->
                        <div class="question">
                            <h2 class="exercise-title">{{ __('Question 2') }}</h2>
                            <p class="exercise-description">
                            {{ __('Calculate hydrostatic pressure at 10,000 ft if the mud density is 12.5 ppg.') }}
                            </p>
                            <div class="text-grid">
                                <div>{{ __('Piston² x length x 0.000243') }} </div>
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
                            <div class="math-answer-exercise cuadrado" id="answer-2">
                                <p class="math-drilling-text">
                                {{ __('The correct answer is ') }} <strong>6,500 psi</strong>.
                                </p>
                                <button class="answer-button" onclick="showExampleElevate(2)"> {{ __('View in calculator') }}</button>
                                <button id="solution2_btn" class="solution-button" onclick="showSolution(2)">
                                    <span class="icon">
                                            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgMjQgMjQiPjxwYXRoIGZpbGw9Im5vbmUiIHN0cm9rZT0iI2ZmZmZmZiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBzdHJva2Utd2lkdGg9IjIiIGQ9Ik00IDIwaDRMMTguNSA5LjVhMi44MjggMi44MjggMCAxIDAtNC00TDQgMTZ6bTkuNS0xMy41bDQgNE0xNSAxOWwyIDJsNC00Ii8+PC9zdmc+" alt="Revisar">    
                                    </span>  {{ __('Show solution ') }}
                                </button>
                            </div>
                            <div class="math-drilling-section">
                                <div id="solution2" class="math-drilling-solution">
                                    <img src="/assets/images/calculator/solutions/2.png" alt="Conversión de pies a metros" class="solution-image">
                                </div>
                            </div>
                        </div>

                        <!-- Pregunta 3 -->
                        <div class="question">
                            <h2 class="exercise-title">{{ __('Question 3') }}</h2>
                            <p class="exercise-description">
                            {{ __('What is the pressure gradient for a mud with a density of 10 ppg?') }}
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
                            <div class="math-answer-exercise cuadrado" id="answer-3">
                                <p class="math-drilling-text">
                                {{ __('The correct answer is ') }} <strong>0.52 psi/ft</strong>.
                                </p>
                                <button class="answer-button" onclick="showExampleElevate(3)"> {{ __('View in calculator') }}</button>
                                <button id="solution3_btn" class="solution-button" onclick="showSolution(3)">
                                    <span class="icon">
                                            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgMjQgMjQiPjxwYXRoIGZpbGw9Im5vbmUiIHN0cm9rZT0iI2ZmZmZmZiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBzdHJva2Utd2lkdGg9IjIiIGQ9Ik00IDIwaDRMMTguNSA5LjVhMi44MjggMi44MjggMCAxIDAtNC00TDQgMTZ6bTkuNS0xMy41bDQgNE0xNSAxOWwyIDJsNC00Ii8+PC9zdmc+" alt="Revisar">    
                                    </span>  {{ __('Show solution ') }}
                                </button>
                            </div>
                            <div class="math-drilling-section">
                                <div id="solution3" class="math-drilling-solution">
                                    <img src="/assets/images/calculator/solutions/3.png" alt="Conversión de pies a metros" class="solution-image">
                                </div>
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
                            <button id="reset2_btn" class="reset-button">
                                <span class="icon">
                                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgNTEyIDUxMiI+PHBhdGggZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZmZmZmZmIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLXdpZHRoPSIzMiIgZD0ibTQwMCAxNDhsLTIxLjEyLTI0LjU3QTE5MS40MyAxOTEuNDMgMCAwIDAgMjQwIDY0QzEzNCA2NCA0OCAxNTAgNDggMjU2czg2IDE5MiAxOTIgMTkyYTE5Mi4wOSAxOTIuMDkgMCAwIDAgMTgxLjA3LTEyOCIvPjxwYXRoIGZpbGw9IiNmZmZmZmYiIGQ9Ik00NjQgOTcuNDJWMjA4YTE2IDE2IDAgMCAxLTE2IDE2SDMzNy40MmMtMTQuMjYgMC0yMS40LTE3LjIzLTExLjMyLTI3LjMxTDQzNi42OSA4Ni4xQzQ0Ni43NyA3NiA0NjQgODMuMTYgNDY0IDk3LjQyIi8+PC9zdmc+" alt="Reiniciar">
                                </span> Reiniciar
                            </button>
                            <button id="new2_btn" class="new-button">
                                <span class="icon">
                                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgNTEyIDUxMiI+PHBhdGggZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZmZmZmZmIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLXdpZHRoPSIzMiIgZD0ibTQwMCAxNDhsLTIxLjEyLTI0LjU3QTE5MS40MyAxOTEuNDMgMCAwIDAgMjQwIDY0QzEzNCA2NCA0OCAxNTAgNDggMjU2czg2IDE5MiAxOTIgMTkyYTE5Mi4wOSAxOTIuMDkgMCAwIDAgMTgxLjA3LTEyOCIvPjxwYXRoIGZpbGw9IiNmZmZmZmYiIGQ9Ik00NjQgOTcuNDJWMjA4YTE2IDE2IDAgMCAxLTE2IDE2SDMzNy40MmMtMTQuMjYgMC0yMS40LTE3LjIzLTExLjMyLTI3LjMxTDQzNi42OSA4Ni4xQzQ0Ni43NyA3NiA0NjQgODMuMTYgNDY0IDk3LjQyIi8+PC9zdmc+" alt="Reiniciar">
                                </span> Nuevo Ejercicio
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
                        La jerarquía de operaciones establece el orden en el que debemos realizar las operaciones matemáticas para obtener un resultado correcto. Es fundamental seguir el orden PEMDAS
                        </p>

                        <!-- Pregunta 1 -->
                        <div class="question">
                            <h2 class="exercise-title">Pregunta 1</h2>
                            <p class="exercise-description">
                                Calcule el volumen de lodo (bbl) con la siguiente fórmula:<br>
                                
                            </p>
                            <div class="text-grid">
                                <div><strong>(8.5² - 5²) × 10,000 × 0.000971</strong></div>
                            </div>
                            <div class="options">
                                <label>
                                    <input id="jerarquia_1" type="radio" name="q1" value="A"> A) Primero se resuelven las multiplicaciones
                                </label>
                                <label>
                                    <input id="jerarquia_1" type="radio" name="q1" value="B"> B) Primero se resuelve la resta dentro del paréntesis
                                </label>
                                <label>
                                    <input id="jerarquia_1" type="radio" name="q1" value="C"> C) Primero se resuelven los exponentes
                                </label>
                                <label>
                                    <input id="jerarquia_1" type="radio" name="q1" value="D"> D) Primero se resuelve la multiplicación más a la derecha
                                </label>
                            </div>
                            <span class="feedback" id="feedbackJerarquia-q1"></span>
                            <div class="math-answer-exercise jerarquia" id="answerJerarquia-1">
                                <p class="math-drilling-text">
                                    La respuesta correcta es <strong>C) Primero se resuelven los exponentes</strong>.<br>
                                    Orden correcto: 1) Exponentes (8.5² y 5²), 2) Resta dentro paréntesis, 3) Multiplicaciones de izquierda a derecha.
                                </p>
                                <button class="answer-button" onclick="showExampleJerarquia(1)">Ver en calculadora</button>
                                <button id="solution1Jerarquia_btn" class="solution-button" onclick="showSolution(4)">
                                    <span class="icon">
                                        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgMjQgMjQiPjxwYXRoIGZpbGw9Im5vbmUiIHN0cm9rZT0iI2ZmZmZmZiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBzdHJva2Utd2lkdGg9IjIiIGQ9Ik00IDIwaDRMMTguNSA5LjVhMi44MjggMi44MjggMCAxIDAtNC00TDQgMTZ6bTkuNS0xMy41bDQgNE0xNSAxOWwyIDJsNC00Ii8+PC9zdmc+" alt="Revisar">    
                                    </span> Ver solución
                                </button>
                            </div>
                            <div class="math-drilling-section">
                                <div id="solution4" class="math-drilling-solution">
                                    <img src="/assets/images/calculator/solutions/4.png" alt="Conversión de pies a metros" class="solution-image">
                                </div>
                            </div>
                        </div>

                        <!-- Pregunta 2 -->
                        <div class="question">
                            <h2 class="exercise-title">Pregunta 2</h2>
                            <p class="exercise-description">
                                ¿Cuál es el orden correcto para resolver?<br>
                               
                            </p>
                            <div class="text-grid">
                                <div> <strong>12.5 × (10,000 × 0.052) + (500 ÷ 2)</strong></div>
                            </div>
                            <div class="options">
                                <label>
                                    <input id="jerarquia_2" type="radio" name="q2" value="A"> A) Multiplicaciones → Paréntesis → Suma
                                </label>
                                <label>
                                    <input id="jerarquia_2" type="radio" name="q2" value="B"> B) Paréntesis → Multiplicación → División → Suma
                                </label>
                                <label>
                                    <input id="jerarquia_2" type="radio" name="q2" value="C"> C) Paréntesis → División → Multiplicación → Suma
                                </label>
                                <label>
                                    <input id="jerarquia_2" type="radio" name="q2" value="D"> D) División → Paréntesis → Multiplicación → Suma
                                </label>
                            </div>
                            <span class="feedback" id="feedbackJerarquia-q2"></span>
                            <div class="math-answer-exercise jerarquia" id="answerJerarquia-2">
                                <p class="math-drilling-text">
                                    La respuesta correcta es <strong>B) Paréntesis → Multiplicación → División → Suma</strong>.<br>
                                    Orden: 1) Ambos paréntesis (10,000×0.052 y 500÷2), 2) Multiplicación (12.5×resultado), 3) Suma final.
                                </p>
                                <button class="answer-button" onclick="showExampleJerarquia(2)">Ver en calculadora</button>
                                <button id="solution2Jerarquia_btn" class="solution-button" onclick="showSolution(5)">
                                    <span class="icon">
                                        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgMjQgMjQiPjxwYXRoIGZpbGw9Im5vbmUiIHN0cm9rZT0iI2ZmZmZmZiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBzdHJva2Utd2lkdGg9IjIiIGQ9Ik00IDIwaDRMMTguNSA5LjVhMi44MjggMi44MjggMCAxIDAtNC00TDQgMTZ6bTkuNS0xMy41bDQgNE0xNSAxOWwyIDJsNC00Ii8+PC9zdmc+" alt="Revisar">    
                                    </span> Ver solución
                                </button>
                            </div>
                            <div class="math-drilling-section">
                                <div id="solution5" class="math-drilling-solution">
                                    <img src="/assets/images/calculator/solutions/5.png" alt="Conversión de pies a metros" class="solution-image">
                                </div>
                            </div>
                        </div>

                        <!-- Pregunta 3 -->
                        <div class="question">
                            <h2 class="exercise-title">Pregunta 3</h2>
                            <p class="exercise-description">
                                Seleccione el orden correcto para:<br>
                            </p>
                            <div class="text-grid">
                                <div>                                <strong>√(9.8 × 0.052) + (3² ÷ 2)</strong>
                                </div>
                            </div>
                            <div class="options">
                                <label>
                                    <input id="jerarquia_3" type="radio" name="q3" value="A"> A) Exponente → Raíz → Multiplicación → División → Suma
                                </label>
                                <label>
                                    <input id="jerarquia_3" type="radio" name="q3" value="B"> B) Paréntesis → Exponente → Raíz → División → Suma
                                </label>
                                <label>
                                    <input id="jerarquia_3" type="radio" name="q3" value="C"> C) Multiplicación → Exponente → Raíz → División → Suma
                                </label>
                                <label>
                                    <input id="jerarquia_3" type="radio" name="q3" value="D"> D) Raíz → Exponente → Multiplicación → División → Suma
                                </label>
                            </div>
                            <span class="feedback" id="feedbackJerarquia-q3"></span>
                            <div class="math-answer-exercise jerarquia" id="answerJerarquia-3">
                                <p class="math-drilling-text">
                                    La respuesta correcta es <strong>B) Paréntesis → Exponente → Raíz → División → Suma</strong>.<br>
                                    Orden: 1) Paréntesis (9.8×0.052 y 3²), 2) Exponente (3²), 3) Raíz cuadrada, 4) División (÷2), 5) Suma final.
                                </p>
                                <button class="answer-button" onclick="showExampleJerarquia(3)">Ver en calculadora</button>
                                <button id="solution3Jerarquia_btn" class="solution-button" onclick="showSolution(6)">
                                    <span class="icon">
                                        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgMjQgMjQiPjxwYXRoIGZpbGw9Im5vbmUiIHN0cm9rZT0iI2ZmZmZmZiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBzdHJva2Utd2lkdGg9IjIiIGQ9Ik00IDIwaDRMMTguNSA5LjVhMi44MjggMi44MjggMCAxIDAtNC00TDQgMTZ6bTkuNS0xMy41bDQgNE0xNSAxOWwyIDJsNC00Ii8+PC9zdmc+" alt="Revisar">    
                                    </span> Ver solución
                                </button>
                            </div>
                            <div class="math-drilling-section">
                                <div id="solution6" class="math-drilling-solution">
                                    <img src="/assets/images/calculator/solutions/6.png" alt="Conversión de pies a metros" class="solution-image">
                                </div>
                            </div>
                        </div>
                        <div class="calculator-container">
                        @include('Calculator.itemCalculator', ['id' => 'calculator5'])
                        </div>
                        <!-- Botones de Revisar y Reiniciar -->
                        <div class="button-container">
                            <button id="revisar3_btn" class="submit-button">
                                <span class="icon">
                                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgMjQgMjQiPjxnIGZpbGw9Im5vbmUiIHN0cm9rZT0iI2ZmZmZmZiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBzdHJva2Utd2lkdGg9IjIiPjxwYXRoIHN0cm9rZS1kYXNoYXJyYXk9IjY0IiBzdHJva2UtZGFzaG9mZnNldD0iNjQiIGQ9Ik0zIDEyYzAgLTQuOTcgNC4wMyAtOSA5IC05YzQuOTcgMCA5IDQuMDMgOSA5YzAgNC45NyAtNC4wMyA5IC05IDljLTQuOTcgMCAtOSAtNC4wMyAtOSAtOVoiPjxhbmltYXRlIGZpbGw9ImZyZWV6ZSIgYXR0cmlidXRlTmFtZT0ic3Ryb2tlLWRhc2hvZmZzZXQiIGR1cj0iMC42cyIgdmFsdWVzPSI2NDswIi8+PC9wYXRoPjxwYXRoIHN0cm9rZS1kYXNoYXJyYXk9IjE0IiBzdHJva2UtZGFzaG9mZnNldD0iMTQiIGQ9Ik04IDEybDMgM2w1IC01Ij48YW5pbWF0ZSBmaWxsPSJmcmVlemUiIGF0dHJpYnV0ZU5hbWU9InN0cm9rZS1kYXNob2Zmc2V0IiBiZWdpbj0iMC42cyIgZHVyPSIwLjJzIiB2YWx1ZXM9IjE0OzAiLz48L3BhdGg+PC9nPjwvc3ZnPg==" alt="Revisar">
                                </span> Revisar
                            </button>
                            <button id="reset3_btn" class="reset-button">
                                <span class="icon">
                                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgNTEyIDUxMiI+PHBhdGggZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZmZmZmZmIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLXdpZHRoPSIzMiIgZD0ibTQwMCAxNDhsLTIxLjEyLTI0LjU3QTE5MS40MyAxOTEuNDMgMCAwIDAgMjQwIDY0QzEzNCA2NCA0OCAxNTAgNDggMjU2czg2IDE5MiAxOTIgMTkyYTE5Mi4wOSAxOTIuMDkgMCAwIDAgMTgxLjA3LTEyOCIvPjxwYXRoIGZpbGw9IiNmZmZmZmYiIGQ9Ik00NjQgOTcuNDJWMjA4YTE2IDE2IDAgMCAxLTE2IDE2SDMzNy40MmMtMTQuMjYgMC0yMS40LTE3LjIzLTExLjMyLTI3LjMxTDQzNi42OSA4Ni4xQzQ0Ni43NyA3NiA0NjQgODMuMTYgNDY0IDk3LjQyIi8+PC9zdmc+" alt="Reiniciar">
                                </span> Reiniciar
                            </button>
                            <button id="new3_btn" class="new-button">
                                <span class="icon">
                                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgNTEyIDUxMiI+PHBhdGggZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZmZmZmZmIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLXdpZHRoPSIzMiIgZD0ibTQwMCAxNDhsLTIxLjEyLTI0LjU3QTE5MS40MyAxOTEuNDMgMCAwIDAgMjQwIDY0QzEzNCA2NCA0OCAxNTAgNDggMjU2czg2IDE5MiAxOTIgMTkyYTE5Mi4wOSAxOTIuMDkgMCAwIDAgMTgxLjA3LTEyOCIvPjxwYXRoIGZpbGw9IiNmZmZmZmYiIGQ9Ik00NjQgOTcuNDJWMjA4YTE2IDE2IDAgMCAxLTE2IDE2SDMzNy40MmMtMTQuMjYgMC0yMS40LTE3LjIzLTExLjMyLTI3LjMxTDQzNi42OSA4Ni4xQzQ0Ni43NyA3NiA0NjQgODMuMTYgNDY0IDk3LjQyIi8+PC9zdmc+" alt="Reiniciar">
                                </span> Nuevo Ejercicio
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="despejes" class="content-section scrollable-content">
                <h1 class="content-title">Ejercicios de despejes en el curso de control de pozos</h1>
                <div class="exercise-container">
                    <div class="exercise-content">

                        <!-- Pregunta 1 -->
                        <div class="question">
                            <h2 class="exercise-title">Pregunta 1</h2>
                            <p class="exercise-description">
                                Despeja la variable "p" de la fórmula: <strong>p = MW × TVD × 0.052</strong>
                            </p>
                            <div class="text-grid">
                                <div>Dado: MW = 10.5 ppg, TVD = 8000 ft</div>
                            </div>
                            <div class="options">
                                <label><input id="despejes_1" type="radio" name="q1" value="A"> A) 4,368 psi</label>
                                <label><input id="despejes_1" type="radio" name="q1" value="B"> B) 3,250 psi</label>
                                <label><input id="despejes_1" type="radio" name="q1" value="C"> C) 5,000 psi</label>
                                <label><input id="despejes_1" type="radio" name="q1" value="D"> D) 2,800 psi</label>
                            </div>
                            <span class="feedback" id="feedbackDespejes-q1"></span>
                            <div class="math-answer-exercise despejes" id="answerDespejes-1">
                                <p class="math-drilling-text">
                                    La respuesta correcta es <strong>4,368 psi</strong>.
                                </p>
                                <button class="answer-button" onclick="showExampleDespejes(1)">Ver en calculadora</button>
                                <button id="solution1Despejes_btn" class="solution-button">Ver solución</button>
                            </div>
                            <div class="math-drilling-section">
                                <div id="solution6" class="math-drilling-solution">
                                    <img src="/assets/images/calculator/solutions/3.png" alt="Conversión de pies a metros" class="solution-image">
                                </div>
                            </div>
                            
                        </div>

                        <!-- Pregunta 2 -->
                        <div class="question">
                            <h2 class="exercise-title">Pregunta 2</h2>
                            <p class="exercise-description">
                                Despeja la variable "MW" de la fórmula: <strong>SIDPP = (MW - FMW) × TVD × 0.052</strong>
                            </p>
                            <div class="text-grid">
                                <div>SIDPP = 650 psi, TVD = 5000 ft, FMW = 9.0 ppg</div>
                            </div>
                            <div class="options">
                                <label><input id="despejes_2" type="radio" name="q2" value="A"> A) 11.5 ppg</label>
                                <label><input id="despejes_2" type="radio" name="q2" value="B"> B) 10.5 ppg</label>
                                <label><input id="despejes_2" type="radio" name="q2" value="C"> C) 9.5 ppg</label>
                                <label><input id="despejes_2" type="radio" name="q2" value="D"> D) 12.0 ppg</label>
                            </div>
                            <span class="feedback" id="feedbackDespejes-q2"></span>
                            <div class="math-answer-exercise despejes" id="answerDespejes-2">
                                <p class="math-drilling-text">
                                    La respuesta correcta es <strong>11.5 ppg</strong>.
                                </p>
                                <button class="answer-button" onclick="showExampleDespejes(2)">Ver en calculadora</button>
                                <button id="solution2Despejes_btn" class="solution-button">Ver solución</button>
                            </div>
                        </div>

                        <!-- Pregunta 3 -->
                        <div class="question">
                            <h2 class="exercise-title">Pregunta 3</h2>
                            <p class="exercise-description">
                                Despeja la variable "TVD" de la fórmula: <strong>p = MW × TVD × 0.052</strong>
                            </p>
                            <div class="text-grid">
                                <div>Dado: MW = 12.0 ppg, p = 3,120 psi</div>
                            </div>
                            <div class="options">
                                <label><input id="despejes_3" type="radio" name="q3" value="A"> A) 4,000 ft</label>
                                <label><input id="despejes_3" type="radio" name="q3" value="B"> B) 5,000 ft</label>
                                <label><input id="despejes_3" type="radio" name="q3" value="C"> C) 6,000 ft</label>
                                <label><input id="despejes_3" type="radio" name="q3" value="D"> D) 7,000 ft</label>
                            </div>
                            <span class="feedback" id="feedbackDespejes-q3"></span>
                            <div class="math-answer-exercise despejes" id="answerDespejes-3">
                                <p class="math-drilling-text">
                                    La respuesta correcta es <strong>5,000 ft</strong>.
                                </p>
                                <button class="answer-button" onclick="showExampleDespejes(3)">Ver en calculadora</button>
                                <button id="solution3Despejes_btn" class="solution-button">Ver solución</button>
                            </div>
                        </div>

                        <div class="calculator-container">
                            @include('Calculator.itemCalculator', ['id' => 'calculator6'])
                        </div>

                        <!-- Botones -->
                        <div class="button-container">
                            <button id="revisar4_btn" class="submit-button">
                                <span class="icon">
                                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgMjQgMjQiPjxnIGZpbGw9Im5vbmUiIHN0cm9rZT0iI2ZmZmZmZiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBzdHJva2Utd2lkdGg9IjIiPjxwYXRoIHN0cm9rZS1kYXNoYXJyYXk9IjY0IiBzdHJva2UtZGFzaG9mZnNldD0iNjQiIGQ9Ik0zIDEyYzAgLTQuOTcgNC4wMyAtOSA5IC05YzQuOTcgMCA5IDQuMDMgOSA5YzAgNC45NyAtNC4wMyA5IC05IDljLTQuOTcgMCAtOSAtNC4wMyAtOSAtOVoiPjxhbmltYXRlIGZpbGw9ImZyZWV6ZSIgYXR0cmlidXRlTmFtZT0ic3Ryb2tlLWRhc2hvZmZzZXQiIGR1cj0iMC42cyIgdmFsdWVzPSI2NDswIi8+PC9wYXRoPjxwYXRoIHN0cm9rZS1kYXNoYXJyYXk9IjE0IiBzdHJva2UtZGFzaG9mZnNldD0iMTQiIGQ9Ik04IDEybDMgM2w1IC01Ij48YW5pbWF0ZSBmaWxsPSJmcmVlemUiIGF0dHJpYnV0ZU5hbWU9InN0cm9rZS1kYXNob2Zmc2V0IiBiZWdpbj0iMC42cyIgZHVyPSIwLjJzIiB2YWx1ZXM9IjE0OzAiLz48L3BhdGg+PC9nPjwvc3ZnPg==" alt="Revisar">
                                </span> Revisar
                            </button>
                            <button id="reset4_btn" class="reset-button">
                                <span class="icon">
                                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgNTEyIDUxMiI+PHBhdGggZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZmZmZmZmIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLXdpZHRoPSIzMiIgZD0ibTQwMCAxNDhsLTIxLjEyLTI0LjU3QTE5MS40MyAxOTEuNDMgMCAwIDAgMjQwIDY0QzEzNCA2NCA0OCAxNTAgNDggMjU2czg2IDE5MiAxOTIgMTkyYTE5Mi4wOSAxOTIuMDkgMCAwIDAgMTgxLjA3LTEyOCIvPjxwYXRoIGZpbGw9IiNmZmZmZmYiIGQ9Ik00NjQgOTcuNDJWMjA4YTE2IDE2IDAgMCAxLTE2IDE2SDMzNy40MmMtMTQuMjYgMC0yMS40LTE3LjIzLTExLjMyLTI3LjMxTDQzNi42OSA4Ni4xQzQ0Ni43NyA3NiA0NjQgODMuMTYgNDY0IDk3LjQyIi8+PC9zdmc+" alt="Reiniciar">
                                </span> Reiniciar
                            </button>
                            <button id="new4_btn" class="new-button">
                                <span class="icon">
                                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgNTEyIDUxMiI+PHBhdGggZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZmZmZmZmIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLXdpZHRoPSIzMiIgZD0ibTQwMCAxNDhsLTIxLjEyLTI0LjU3QTE5MS40MyAxOTEuNDMgMCAwIDAgMjQwIDY0QzEzNCA2NCA0OCAxNTAgNDggMjU2czg2IDE5MiAxOTIgMTkyYTE5Mi4wOSAxOTIuMDkgMCAwIDAgMTgxLjA3LTEyOCIvPjxwYXRoIGZpbGw9IiNmZmZmZmYiIGQ9Ik00NjQgOTcuNDJWMjA4YTE2IDE2IDAgMCAxLTE2IDE2SDMzNy40MmMtMTQuMjYgMC0yMS40LTE3LjIzLTExLjMyLTI3LjMxTDQzNi42OSA4Ni4xQzQ0Ni43NyA3NiA0NjQgODMuMTYgNDY0IDk3LjQyIi8+PC9zdmc+" alt="Reiniciar">
                                </span> Nuevo Ejercicio
                            </button>
                        </div>

                    </div>
                </div>
            </div>

            <div id="redondeos" class="content-section scrollable-content">
                <h1 class="content-title">Ejercicios de redondeos</h1>
                <div class="exercise-container">
                    <div class="exercise-content">
                        <!-- Pregunta 1 -->
                        <div class="question">
                            <h2 class="exercise-title">Pregunta 1</h2>
                            <p class="exercise-description">
                                Calcule el volumen de lodo en el espacio anular (bbl) con los siguientes datos:<br>
                                Diámetro del hoyo: 8.5", Diámetro de tubería: 5", Profundidad: 10,000 ft
                            </p>
                            <div class="text-grid">
                                <div>(Diámetro hoyo² - Diámetro tubería²) x Profundidad x 0.000603</div>
                            </div>
                            <div class="options">
                                <label>
                                    <input id="redondeo_1" type="radio" name="q1" value="A"> A) 285.4 bbl
                                </label>
                                <label>
                                    <input id="redondeo_1" type="radio" name="q1" value="B"> B) 290 bbl
                                </label>
                                <label>
                                    <input id="redondeo_1" type="radio" name="q1" value="C"> C) 285 bbl
                                </label>
                                <label>
                                    <input id="redondeo_1" type="radio" name="q1" value="D"> D) 284.9 bbl
                                </label>
                            </div>
                            <span class="feedback" id="feedbackRedondeos-q1"></span>
                            <div class="math-answer-exercise redondeos" id="answerRedondeos-1">
                                <p class="math-drilling-text">
                                    La respuesta correcta es <strong>285 bbl</strong> (redondeo a 0 decimales según tabla IADC).
                                </p>
                                <button class="answer-button" onclick="showExampleRedondeo(1)">Ver en calculadora</button>
                                <button id="solution1Redondeos_btn" class="solution-button" onclick="showSolutionRedondeo(1)">
                                    <span class="icon">
                                        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgMjQgMjQiPjxwYXRoIGZpbGw9Im5vbmUiIHN0cm9rZT0iI2ZmZmZmZiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBzdHJva2Utd2lkdGg9IjIiIGQ9Ik00IDIwaDRMMTguNSA5LjVhMi44MjggMi44MjggMCAxIDAtNC00TDQgMTZ6bTkuNS0xMy41bDQgNE0xNSAxOWwyIDJsNC00Ii8+PC9zdmc+" alt="Revisar">    
                                    </span> Ver solución
                                </button>
                            </div>
                            <div class="math-drilling-section">
                                <div id="solution1_redondeos" class="math-drilling-solution">
                                    <img src="/assets/images/calculator/solutions/sol 1.png" alt="Conversión de pies a metros" class="solution-image">
                                </div>
                            </div>
                        </div>

                        <!-- Pregunta 2 -->
                        <div class="question">
                            <h2 class="exercise-title">Pregunta 2</h2>
                            <p class="exercise-description">
                                Calcule la presión hidrostática (psi) con densidad de lodo de 13.2 ppg a 7,500 ft de profundidad.
                            </p>
                            <div class="text-grid">
                                <div>Densidad (ppg) x Profundidad (ft) x 0.052</div>
                            </div>
                            <div class="options">
                                <label>
                                    <input id="redondeo_2" type="radio" name="q2" value="A"> A) 5,148 psi
                                </label>
                                <label>
                                    <input id="redondeo_2" type="radio" name="q2" value="B"> B) 5,150 psi
                                </label>
                                <label>
                                    <input id="redondeo_2" type="radio" name="q2" value="C"> C) 5,100 psi
                                </label>
                                <label>
                                    <input id="redondeo_2" type="radio" name="q2" value="D"> D) 5,147.6 psi
                                </label>
                            </div>
                            <span class="feedback" id="feedbackRedondeos-q2"></span>
                            <div class="math-answer-exercise redondeos" id="answerRedondeos-2">
                                <p class="math-drilling-text">
                                    La respuesta correcta es <strong>5,150 psi</strong> (redondeo a 10 psi según tabla IADC).
                                </p>
                                <button class="answer-button" onclick="showExampleRedondeo(2)">Ver en calculadora</button>
                                <button id="solution2Redondeos_btn" class="solution-button" onclick="showSolutionRedondeo(2)">
                                    <span class="icon">
                                        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgMjQgMjQiPjxwYXRoIGZpbGw9Im5vbmUiIHN0cm9rZT0iI2ZmZmZmZiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBzdHJva2Utd2lkdGg9IjIiIGQ9Ik00IDIwaDRMMTguNSA5LjVhMi44MjggMi44MjggMCAxIDAtNC00TDQgMTZ6bTkuNS0xMy41bDQgNE0xNSAxOWwyIDJsNC00Ii8+PC9zdmc+" alt="Revisar">    
                                    </span> Ver solución
                                </button>
                            </div>
                            <div class="math-drilling-section">
                                <div id="solution2_redondeos" class="math-drilling-solution">
                                    <img src="/assets/images/calculator/solutions/sol 1.png" alt="Conversión de pies a metros" class="solution-image">
                                </div>
                            </div>
                        </div>

                        <!-- Pregunta 3 -->
                        <div class="question">
                            <h2 class="exercise-title">Pregunta 3</h2>
                            <p class="exercise-description">
                                Calcule el gradiente de presión (psi/ft) para un lodo de 9.8 ppg.
                            </p>
                            <div class="text-grid">
                                <div>Densidad (ppg) x 0.052</div>
                            </div>
                            <div class="options">
                                <label>
                                    <input id="redondeo_3" type="radio" name="q3" value="A"> A) 0.510 psi/ft
                                </label>
                                <label>
                                    <input id="redondeo_3" type="radio" name="q3" value="B"> B) 0.51 psi/ft
                                </label>
                                <label>
                                    <input id="redondeo_3" type="radio" name="q3" value="C"> C) 0.5096 psi/ft
                                </label>
                                <label>
                                    <input id="redondeo_3" type="radio" name="q3" value="D"> D) 0.5 psi/ft
                                </label>
                            </div>
                            <span class="feedback" id="feedbackRedondeos-q3"></span>
                            <div class="math-answer-exercise redondeos" id="answerRedondeos-3">
                                <p class="math-drilling-text">
                                    La respuesta correcta es <strong>0.51 psi/ft</strong> (redondeo a 2 decimales según tabla IADC).
                                </p>
                                <button class="answer-button" onclick="showExampleRedondeo(3)">Ver en calculadora</button>
                                <button id="solution3Redondeos_btn" class="solution-button" onclick="showSolutionRedondeo(3)">
                                    <span class="icon">
                                        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgMjQgMjQiPjxwYXRoIGZpbGw9Im5vbmUiIHN0cm9rZT0iI2ZmZmZmZiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBzdHJva2Utd2lkdGg9IjIiIGQ9Ik00IDIwaDRMMTguNSA5LjVhMi44MjggMi44MjggMCAxIDAtNC00TDQgMTZ6bTkuNS0xMy41bDQgNE0xNSAxOWwyIDJsNC00Ii8+PC9zdmc+" alt="Revisar">    
                                    </span> Ver solución
                                </button>
                            </div>
                            <div class="math-drilling-section">
                                <div id="solution3_redondeos" class="math-drilling-solution">
                                    <img src="/assets/images/calculator/solutions/sol 1.png" alt="Conversión de pies a metros" class="solution-image">
                                </div>
                            </div>
                        </div>
                        <div class="calculator-container">
                        @include('Calculator.itemCalculator', ['id' => 'calculator7'])
                        </div>
                        <!-- Botones de Revisar y Reiniciar -->
                        <div class="button-container">
                            <button id="revisar5_btn" class="submit-button">
                                <span class="icon">
                                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgMjQgMjQiPjxnIGZpbGw9Im5vbmUiIHN0cm9rZT0iI2ZmZmZmZiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBzdHJva2Utd2lkdGg9IjIiPjxwYXRoIHN0cm9rZS1kYXNoYXJyYXk9IjY0IiBzdHJva2UtZGFzaG9mZnNldD0iNjQiIGQ9Ik0zIDEyYzAgLTQuOTcgNC4wMyAtOSA5IC05YzQuOTcgMCA5IDQuMDMgOSA5YzAgNC45NyAtNC4wMyA5IC05IDljLTQuOTcgMCAtOSAtNC4wMyAtOSAtOVoiPjxhbmltYXRlIGZpbGw9ImZyZWV6ZSIgYXR0cmlidXRlTmFtZT0ic3Ryb2tlLWRhc2hvZmZzZXQiIGR1cj0iMC42cyIgdmFsdWVzPSI2NDswIi8+PC9wYXRoPjxwYXRoIHN0cm9rZS1kYXNoYXJyYXk9IjE0IiBzdHJva2UtZGFzaG9mZnNldD0iMTQiIGQ9Ik04IDEybDMgM2w1IC01Ij48YW5pbWF0ZSBmaWxsPSJmcmVlemUiIGF0dHJpYnV0ZU5hbWU9InN0cm9rZS1kYXNob2Zmc2V0IiBiZWdpbj0iMC42cyIgZHVyPSIwLjJzIiB2YWx1ZXM9IjE0OzAiLz48L3BhdGg+PC9nPjwvc3ZnPg==" alt="Revisar">
                                </span> Revisar
                            </button>
                            <button id="reset5_btn" class="reset-button">
                                <span class="icon">
                                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgNTEyIDUxMiI+PHBhdGggZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZmZmZmZmIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLXdpZHRoPSIzMiIgZD0ibTQwMCAxNDhsLTIxLjEyLTI0LjU3QTE5MS40MyAxOTEuNDMgMCAwIDAgMjQwIDY0QzEzNCA2NCA0OCAxNTAgNDggMjU2czg2IDE5MiAxOTIgMTkyYTE5Mi4wOSAxOTIuMDkgMCAwIDAgMTgxLjA3LTEyOCIvPjxwYXRoIGZpbGw9IiNmZmZmZmYiIGQ9Ik00NjQgOTcuNDJWMjA4YTE2IDE2IDAgMCAxLTE2IDE2SDMzNy40MmMtMTQuMjYgMC0yMS40LTE3LjIzLTExLjMyLTI3LjMxTDQzNi42OSA4Ni4xQzQ0Ni43NyA3NiA0NjQgODMuMTYgNDY0IDk3LjQyIi8+PC9zdmc+" alt="Reiniciar">
                                </span> Reiniciar
                            </button>
                            <button id="new5_btn" class="new-button">
                                <span class="icon">
                                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgNTEyIDUxMiI+PHBhdGggZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZmZmZmZmIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLXdpZHRoPSIzMiIgZD0ibTQwMCAxNDhsLTIxLjEyLTI0LjU3QTE5MS40MyAxOTEuNDMgMCAwIDAgMjQwIDY0QzEzNCA2NCA0OCAxNTAgNDggMjU2czg2IDE5MiAxOTIgMTkyYTE5Mi4wOSAxOTIuMDkgMCAwIDAgMTgxLjA3LTEyOCIvPjxwYXRoIGZpbGw9IiNmZmZmZmYiIGQ9Ik00NjQgOTcuNDJWMjA4YTE2IDE2IDAgMCAxLTE2IDE2SDMzNy40MmMtMTQuMjYgMC0yMS40LTE3LjIzLTExLjMyLTI3LjMxTDQzNi42OSA4Ni4xQzQ0Ni43NyA3NiA0NjQgODMuMTYgNDY0IDk3LjQyIi8+PC9zdmc+" alt="Reiniciar">
                                </span> Nuevo Ejercicio
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
            const calculator6 = document.getElementById('calculator6'); 
            const calculator7 = document.getElementById('calculator7'); 


            if (calculator_3) {
            initializeCalculator(calculator_3);
            }

            if (calculator4) {
            initializeCalculator(calculator4);
            }
            if (calculator5) {
            initializeCalculator(calculator5);
            }
            if (calculator6) {
            initializeCalculator(calculator6);
            }
            if (calculator7) {
            initializeCalculator(calculator7);
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
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if (result.isConfirmed) {
                        } 
                    });
                });

                document.getElementById('revisar-btn').addEventListener('click', function () {
                    const correctAnswers = {
                        'q1': 'A', // Respuesta correcta para la pregunta 1
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

                    Swal.fire({
                        title: allCorrect ? '¡Excelente!' : 'Algunos errores',
                        text: allCorrect ? 'Has respondido correctamente a todas las preguntas.' : 'Hay respuestas incorrectas. Revisa los campos resaltados.',
                        icon: allCorrect ? 'success' : 'error',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if (result.isConfirmed) {
                        } 
                    });
                });

            // JERARQUIAS
                document.getElementById('revisar3_btn').addEventListener('click', function () {
                    const correctAnswers = {
                        'q1': 'C', // Respuesta correcta para la pregunta 1
                        'q2': 'B', // Respuesta correcta para la pregunta 2
                        'q3': 'B'  // Respuesta correcta para la pregunta 3
                    };

                    let allCorrect = true;
                    let explanationHtml = '';
                    let answersHtml = '';

                    // Verificar cada pregunta
                    for (let question in correctAnswers) {
                        const selectedOption = document.querySelector(`input[name="${question}"]:checked`);
                        const feedback = document.getElementById('feedbackJerarquia-q' + question.split('q')[1]);

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

                    const answerDivs = document.querySelectorAll('.jerarquia');
                    answerDivs.forEach(div => {
                        div.style.display = 'flex'; 
                    });

                    Swal.fire({
                        title: allCorrect ? '¡Excelente!' : 'Algunos errores',
                        text: allCorrect ? 'Has respondido correctamente a todas las preguntas.' : 'Hay respuestas incorrectas. Revisa los campos resaltados.',
                        icon: allCorrect ? 'success' : 'error',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if (result.isConfirmed) {
                        } 
                    });
                });

                // DESPEJES
                document.getElementById('revisar4_btn').addEventListener('click', function () {
                    const correctAnswers = {
                        'q1': 'A', // Respuesta correcta para la pregunta 1
                        'q2': 'A', // Respuesta correcta para la pregunta 2
                        'q3': 'B'  // Respuesta correcta para la pregunta 3
                    };

                    let allCorrect = true;
                    let explanationHtml = '';
                    let answersHtml = '';

                    // Verificar cada pregunta
                    for (let question in correctAnswers) {
                        const selectedOption = document.querySelector(`input[name="${question}"]:checked`);
                        const feedback = document.getElementById('feedbackDespejes-q' + question.split('q')[1]);

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

                    const answerDivs = document.querySelectorAll('.despejes');
                    answerDivs.forEach(div => {
                        div.style.display = 'flex'; 
                    });

                    Swal.fire({
                        title: allCorrect ? '¡Excelente!' : 'Algunos errores',
                        text: allCorrect ? 'Has respondido correctamente a todas las preguntas.' : 'Hay respuestas incorrectas. Revisa los campos resaltados.',
                        icon: allCorrect ? 'success' : 'error',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if (result.isConfirmed) {
                        } 
                    });
                });

                // REDONDEOS
                document.getElementById('revisar5_btn').addEventListener('click', function () {
                    const correctAnswers = {
                        'q1': 'C', // Respuesta correcta para la pregunta 1
                        'q2': 'B', // Respuesta correcta para la pregunta 2
                        'q3': 'B'  // Respuesta correcta para la pregunta 3
                    };

                    let allCorrect = true;
                    let explanationHtml = '';
                    let answersHtml = '';

                    // Verificar cada pregunta
                    for (let question in correctAnswers) {
                        const selectedOption = document.querySelector(`input[name="${question}"]:checked`);
                        const feedback = document.getElementById('feedbackRedondeos-q' + question.split('q')[1]);

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

                    const answerDivs = document.querySelectorAll('.redondeos');
                    answerDivs.forEach(div => {
                        div.style.display = 'flex'; 
                    });

                    Swal.fire({
                        title: allCorrect ? '¡Excelente!' : 'Algunos errores',
                        text: allCorrect ? 'Has respondido correctamente a todas las preguntas.' : 'Hay respuestas incorrectas. Revisa los campos resaltados.',
                        icon: allCorrect ? 'success' : 'error',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if (result.isConfirmed) {
                        } 
                    });
                });

            }

            

        });

        const calculator3 = document.getElementById('calculator3');
        function showExample(entero, numerador, denominador) {
            const calculator = calculator3;
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

            buttons['C'].click();

            function clickButton(character) {
                if (buttons[character]) {
                    buttons[character].click();
                } else {
                    console.error(`Botón no encontrado para el carácter: ${character}`);
                }
            }

            function enterNumber(number) {
                const digits = String(number).split('');
                digits.forEach(digit => clickButton(digit));
            }

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
                clickButton('(');
                enterNumber('8'); 
                clickButton('.');
                enterNumber('5'); 
                clickButton(')'); // Cerrar paréntesis
                clickButton('^'); // Cerrar paréntesis
                enterNumber('2'); 
                clickButton(')'); // Cerrar paréntesis
                clickButton('*'); // Ingresar el operador de suma
                enterNumber('1');
                enterNumber('0');
                enterNumber('0');
                enterNumber('0');
                enterNumber('0');
                clickButton('*'); // Ingresar el operador de suma
                enterNumber('0');
                clickButton('.');
                enterNumber('0');
                enterNumber('0');
                enterNumber('0');
                enterNumber('9');
                enterNumber('7');
                enterNumber('1');
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
        document.getElementById('reset2_btn').addEventListener('click', resetForm);
        document.getElementById('reset3_btn').addEventListener('click', resetForm);
        document.getElementById('reset4_btn').addEventListener('click', resetForm);
        document.getElementById('reset5_btn').addEventListener('click', resetForm);



        // jerarquia
        const calculator5 = document.getElementById('calculator5');
        function showExampleJerarquia(identificador) {
            const calculator = calculator5;
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
                clickButton('(');
                enterNumber('8'); 
                clickButton('.');
                enterNumber('5'); 
                clickButton(')'); // Cerrar paréntesis
                clickButton('^'); // Cerrar paréntesis
                enterNumber('2'); 
                clickButton(')'); // Cerrar paréntesis
                clickButton('*'); // Ingresar el operador de suma
                enterNumber('1');
                enterNumber('0');
                enterNumber('0');
                enterNumber('0');
                enterNumber('0');
                clickButton('*'); // Ingresar el operador de suma
                enterNumber('0');
                clickButton('.');
                enterNumber('0');
                enterNumber('0');
                enterNumber('0');
                enterNumber('9');
                enterNumber('7');
                enterNumber('1');
            
            }else if(identificador === 2){
                clickButton('(');
                enterNumber('7'); 
                clickButton('*'); 
                enterNumber('7');
                clickButton(')'); 
                clickButton('*'); 
                enterNumber('12'); 
                clickButton('*'); 
                enterNumber('0'); 
                clickButton('.');
                enterNumber('000243'); 
            }else if(identificador === 3){
                clickButton('(');
                enterNumber('7'); 
                clickButton('*'); 
                enterNumber('7');
                clickButton(')'); 
                clickButton('*'); 
                enterNumber('12'); 
                clickButton('*'); 
                enterNumber('0'); 
                clickButton('.');
                enterNumber('000243'); 
            }
        }

       
        function showSolutionJerarquia(id) {
            // Obtener el elemento que se debe mostrar
            const solutionElement = document.getElementById(`solution${id}_jerarquia`);

            // Verificar si el elemento existe
            if (solutionElement) {
                // Cambiar el estilo display a flex
                solutionElement.style.display = 'flex';
            } else {
                console.error(`No se encontró el elemento con ID solution${id}_jerarquia`);
            }
        }

        function resetFormJerarquia() {
            // Limpiar todos los campos de entrada
            const inputs = document.querySelectorAll('.result-input');
            inputs.forEach(input => {
                input.value = ''; // Vaciar el valor del input
                input.style.borderColor = '';
            });

            const answerDivs = document.querySelectorAll('.math-answer-exercise jerarquia');
                answerDivs.forEach(div => {
                    div.style.display = 'none'; 
                });

            // Ocultar todos los mensajes de retroalimentación
            const feedbacks = document.querySelectorAll('.feedback jerarquia');
            feedbacks.forEach(feedback => {
                feedback.textContent = ''; // Limpiar el contenido del span
                feedback.style.display = 'none'; // Ocultar el span
            });
        }

        // Asignar la función al botón de "Reset"
        document.getElementById('reset3_btn').addEventListener('click', resetFormJerarquia);

    //  despejes
        const calculator6 = document.getElementById('calculator6');
        function showExampleDespejes(identificador) {
            const calculator = calculator6;
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
                clickButton('(');
                enterNumber('8'); 
                clickButton('.');
                enterNumber('5'); 
                clickButton(')'); // Cerrar paréntesis
                clickButton('^'); // Cerrar paréntesis
                enterNumber('2'); 
                clickButton(')'); // Cerrar paréntesis
                clickButton('*'); // Ingresar el operador de suma
                enterNumber('1');
                enterNumber('0');
                enterNumber('0');
                enterNumber('0');
                enterNumber('0');
                clickButton('*'); // Ingresar el operador de suma
                enterNumber('0');
                clickButton('.');
                enterNumber('0');
                enterNumber('0');
                enterNumber('0');
                enterNumber('9');
                enterNumber('7');
                enterNumber('1');
        
            } 
        }

       
        function showSolutionDespejes(id) {
            // Obtener el elemento que se debe mostrar
            const solutionElement = document.getElementById(`solution${id}_despejes`);

            // Verificar si el elemento existe
            if (solutionElement) {
                // Cambiar el estilo display a flex
                solutionElement.style.display = 'flex';
            } else {
                console.error(`No se encontró el elemento con ID solution${id}_despejes`);
            }
        }

        function resetFormDespejes() {
            // Limpiar todos los campos de entrada
            const inputs = document.querySelectorAll('.result-input');
            inputs.forEach(input => {
                input.value = ''; // Vaciar el valor del input
                input.style.borderColor = '';
            });

            const answerDivs = document.querySelectorAll('.math-answer-exercise despejes');
                answerDivs.forEach(div => {
                    div.style.display = 'none'; 
                });

            // Ocultar todos los mensajes de retroalimentación
            const feedbacks = document.querySelectorAll('.feedback despejes');
            feedbacks.forEach(feedback => {
                feedback.textContent = ''; // Limpiar el contenido del span
                feedback.style.display = 'none'; // Ocultar el span
            });
        }

        // Asignar la función al botón de "Reset"
        document.getElementById('reset5_btn').addEventListener('click', resetFormDespejes);

     
     

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