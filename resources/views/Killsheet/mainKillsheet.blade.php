@extends('Template/maestraUser')
@section('contenido') 

    <div class="main-container"> 
        <div class="container">
            <header>
                <h1> {{ __('Killsheet') }}</h1>
                <!-- <p class="subtitle">
                    {{ __('In this Kill Sheet module, you will find interactive tools to practice and learn how to complete kill sheets effectively. The content includes a guided video to support your learning process. This module is developed by Results in Performance in collaboration with Smith Mason & Co., a recognized partner for well control certification training.') }}
                </p> -->
            </header>
            
            <div class="feature-card">
                <div class="message">
                    <p>
                        {{ __('What is hard') }} <span class="highlight-hoy">{{ __('today,') }}</span>
                    </p>
                    <p>
                        {{ __('will be your') }} <span class="highlight-logro">{{ __('success') }}</span> {{ __('tomorrow.') }}
                    </p>
                </div>
                
                       
                <img src="/assets/images/principal/castorFeliz.png" alt="Beaver mascot" class="beaver" />
                <img src="/assets/images/principal/nube2.png" alt="Cloud" class="cloud cloud-1" />
                <img src="/assets/images/principal/nube1.png" alt="Cloud" class="cloud cloud-2" />
                <img src="/assets/images/principal/nube3.png" alt="Cloud" class="cloud cloud-3" />
                <img src="/assets/images/principal/nube4.png" alt="Cloud" class="cloud cloud-4" />
            </div>
        
        </div>
        <div class="white-section steps-section">
            
            <h2 class="steps-title">
                <img src="/assets/images/principal/logoSmithMasonCO.png" />
            </h2>
            <div class="container2">
                <div class="options">
                    <div class="option-card">
                        <!-- <p class="option-text">{{ __('Practice kill sheets based on IADC guidelines. Understand how to calculate pressures and volumes for well control.') }}</p> -->
                        <img class="option-image" src="/assets/images/iadc.png" alt="Check icon" />
                        <!-- <button class="select-btn">
                            <img src="/assets/images/principal/flecha.png" alt="Check icon" /> {{ __('Go') }}
                        </button> -->
                    </div>
                    
                    <div class="option-card" data-company="iwcf">
                        <!-- <h3 class="option-title">IWCF</h3> -->
                        <!-- <p class="option-text">{{ __('Practice IWCF-format kill sheets. Strengthen your well control skills with real-world scenarios and calculations.') }}</p> -->
                        <img class="option-image" src="/assets/images/iwcflogo.png" alt="Check icon" />
                        <!-- <button class="select-btn">
                            <img src="/assets/images/principal/flecha.png" alt="Check icon" /> {{ __('Go') }}
                        </button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Make beaver wave on hover
            const beaver = document.querySelector('.beaver');
            beaver.addEventListener('mouseover', function() {
                this.style.animation = 'wave 0.5s infinite alternate';
            });
            
            beaver.addEventListener('mouseout', function() {
                this.style.animation = 'wave 2s infinite alternate';
            });
            
            const selectButtons = document.querySelectorAll('.option-card');
            selectButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const card = this.closest('.option-card');
                    const companyName = card.dataset.company;
                    // const companyTitle = card.querySelector('.option-title').textContent;
                    const companyLogo = card.querySelector('.option-image').src;

                    if(companyName === "smith"){
                       
                    } else if(companyName === "iwcf"){
                        Swal.fire({
        html: `
            <div class="modal-content">
                <img src="${companyLogo}" alt="${companyName} Logo" class="modal-logo">
                <h3 class="modal-subtitle">Hoja de matar por IWCF</h3>
                <p class="modal-text">Hoja de matar para pozos verticales y desviados.</p>
                <div class="modal-buttons">
                    <button class="modal-btn modal-btn-secondary" id="iwcfVertical">
                        <img src="/assets/images/principal/flecha.png" alt="Icon"> Pozo Vertical
                    </button>
                    <button class="modal-btn modal-btn-primary" id="iwcfDesviado">
                        <img src="/assets/images/principal/flecha.png" alt="Icon"> Pozo Desviado
                    </button>
                </div>
            </div>
        `,
        showConfirmButton: false,
        showCloseButton: true,
        width: '600px',
        customClass: {
            container: 'custom-swal-container',
            popup: 'custom-swal-popup'
        },
        didOpen: () => {
            document.getElementById('iwcfVertical').addEventListener('click', function() {
                window.location.href = "{{ route('killsheet.iwcf') }}";
            });
            
            document.getElementById('iwcfDesviado').addEventListener('click', function() {
                window.location.href = "{{ route('killsheet.iwcfdesviado') }}";
            });
        }
    });
                    } else {
                        // Default for option C
                        Swal.fire({
        html: `
            <div class="modal-content">
                <img src="/assets/images/iadc.png" alt="${companyName} Logo" class="modal-logo">
                <h3 class="modal-subtitle">Hoja de matar por Smith Mason & Co</h3>
                <p class="modal-text">Hoja de matar para pozos verticales.</p>
                <div class="modal-buttons">
                    <button class="modal-btn modal-btn-primary" id="smithButton">
                        <img src="/assets/images/principal/flecha.png" alt="Check icon"> Pozo Vertical
                    </button>
                </div>
            </div>
        `,
        showConfirmButton: false,
        showCloseButton: true,
        width: '600px',
        customClass: {
            container: 'custom-swal-container',
            popup: 'custom-swal-popup'
        },
        didOpen: () => {
            document.getElementById('smithButton').addEventListener('click', function() {
                // Muestra mensaje de confirmación antes de redireccionar
                Swal.fire({
                    title: '¡Excelente elección!',
                    text: `Has decidido continuar con Smith Mason & Co. Pronto recibirás más información.`,
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonText: 'Continuar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirecciona a la ruta de Laravel para Smith Mason & Co (iadc)
                        window.location.href = "{{ route('killsheet.iadc') }}";
                    }
                });
            });
        }
    });
                    }
                });
            });
        });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection  

@php
    $css_identifier = 'killSheets';
@endphp