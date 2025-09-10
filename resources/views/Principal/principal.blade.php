@extends('Template/maestraUser')
@section('contenido') 
<div class="main">
    <section class="main-content">
        <div class="header-text animate-fade-in">
            <h1>{{ __('The site that connects you with') }}</h1>
            <h2>{{ __('professional excellence') }}</h2>
        </div>

         <div class="content-wrapper">
            <div class="content-box tarjeta1 animate-slide-left">
                <div class="number">01</div>
                    <h3>{{ __('Intuitivo') }}</h3>
                    <p>{{ __('Whether you\'re looking to strengthen your experience or start a new career, we offer the necessary tools to move forward.') }}</p>
            </div>
            <div class="team-image">
                <img src="/assets/images/principal/ingenieros7.png" alt="{{ __('Professional team') }}">
            </div>
            <div class="content-box animate-slide-right">
                <div class="number">02</div>
                <h3>{{ __('Practice') }}</h3>
                <p>{{ __('Whether you\'re looking to strengthen your experience or start a new career, we offer the necessary tools to move forward.') }}</p>
            </div>
    </section>

    <section class="learning-container">
        <div class="cont-card">
            <div class="container-left">
                <div class="left-card animate-on-scroll stagger-1">
                    <h2>{{ __('Learning') }}</h2>
                    <p>{{ __('Master the fundamentals of drilling engineering through our comprehensive learning platform. From basic mathematical calculations to advanced well planning techniques, we provide interactive tools and real-world scenarios that prepare you for field operations.') }}</p>
                    <!-- <button class="arrow-button">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7" />
                        </svg>
                    </button> -->
                </div>

                <div class="bottom-cards">
                    <div class="bottom-card empty animate-on-scroll stagger-2"></div>

                    <div class="bottom-card controller animate-on-scroll stagger-3">
                        <img src="/assets/images/principal/bocapozo.png" alt="{{ __('Game controller') }}" class="card-image-game">
                    </div>

                    <div class="bottom-card oil animate-on-scroll stagger-4">
                        <img src="/assets/images/principal/drill_perforator.jpg" alt="{{ __('Oil pumps') }}">
                    </div>
                </div>
            </div>

            <div class="container-right">
                <div class="top-section">
                    <div class="main-card">
                        <h2>{{ __('Take your understanding to the next') }} <span class="nivel">{{ __('Level') }}</span></h2>
                    </div>

                    <div class="right-cards">
                        <div class="small-card"></div>
                        <div class="circle-card">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M7 17l9.2-9.2M17 17V8H8" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Calculator card -->
                <div class="calculator-card">
                    <img src="/assets/images/principal/casio_calculadora.png" alt="{{ __('Casio Calculator') }}">
                </div>
            </div>
        </div>
    </section>

    <section class="cards-container">
        <div id="calculadoraDiv" class="card">
            <h2 class="card-title">{{ __('Drilling ') }}<br>{{ __('Mathematics') }}</h2>
            <img src="/assets/images/principal/calculadoraBlanca2.png" alt="{{ __('Documents') }}" class="card-image">
            <a href="#" class="card-link">
                {{ __('Learn more') }}   
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14M12 5l7 7-7 7" />
                </svg>
            </a>
        </div>

        <div id="hojasDiv" class="card">
            <h2 class="card-title">{{ __('Kill Sheet') }}</h2>
            <img src="/assets/images/principal/pozo 1.png" alt="{{ __('Resources') }}" class="card-image">
            <a href="#" class="card-link">
                {{ __('Learn more') }}
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14M12 5l7 7-7 7" />
                </svg>
            </a>
        </div>

        <div id="simuladoresDiv" class="card">
            <h2 class="card-title">{{ __('Simulators') }}</h2>
            <img src="/assets/images/principal/casco.png" alt="{{ __('Reports') }}" class="card-image">
            <a href="#" class="card-link">
                {{ __('Learn more') }}
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14M12 5l7 7-7 7" />
                </svg>
            </a>
        </div>

        <div id="evaluacionesDiv" class="card">
            <h2 class="card-title">{{ __('Evaluation') }}</h2>
            <img src="/assets/images/principal/laptop.png" alt="{{ __('Statistics') }}" class="card-image">
            <a href="#" class="card-link">
                {{ __('Learn more') }}
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14M12 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </section>
</div>

<script src="/js/Principal/Principal.js?v=1.1"></script>
@endsection

@php
    $css_identifier = 'principal';
@endphp
