@extends('Template/maestraUser')
@section('contenido')

<div class="main-container">
    <div class="container">
        <header>
            <h1> {{ __('Killsheet') }}</h1>
         
        </header>

        <div class="feature-card">
            <div class="message">
                <p>
                    {{ __('What is hard') }} <span class="highlight-hoy">{{ __('today,') }}</span>
                </p>
                <p>
                    {{ __('will be your') }} <span class="highlight-logro">{{ __('success') }}</span> {{ __('tomorrow.')
                    }}
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
        @if(session('simulating') || session('ACCREDITING_ENTITY_PROJECT') === 'Entidad de Prueba')
        {{-- Mostrar ambos ítems en modo simulación --}}
        <div class="options">
            <div class="option-card">
                <img class="option-image" src="/assets/images/iadc.png" alt="IADC logo" />
            </div>
            <div class="option-card" data-company="iwcf">
                <img class="option-image" src="/assets/images/iwcflogo.png" alt="IWCF logo" />
            </div>
        </div>
        @else
        @if((int) session('ACCREDITING_ENTITY_PROJECT') === 1)
        <div class="options">
            <div class="option-card">
                <img class="option-image" src="/assets/images/iadc.png" alt="Check icon" />
               
            </div>
        </div>
        @endif
        @if((int) session('ACCREDITING_ENTITY_PROJECT') === 2)
        <div class="container2">
            <div class="options">
                <div class="option-card" data-company="iwcf">
                    <img class="option-image" src="/assets/images/iwcflogo.png" alt="Check icon" />
                  
                </div>
            </div>
        </div>
        @endif
        @endif

    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {

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
                const companyLogo = card.querySelector('.option-image').src;

                // =========================
                // IWCF
                // =========================
                if (companyName === "iwcf") {

                    Swal.fire({
                        html: `
                        <div class="modal-content">
                            <img src="${companyLogo}" alt="IWCF Logo" class="modal-logo">
                            <h3 class="modal-subtitle">Hoja de matar por IWCF</h3>
                            <p class="modal-text">Hoja de matar para pozos verticales y desviados.</p>
                            <div class="modal-buttons">
                                <button class="modal-btn modal-btn-secondary" id="iwcfVertical">
                                    <img src="/assets/images/principal/flecha.png"> Pozo Vertical
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
                            document
                                .getElementById('iwcfVertical')
                                .addEventListener('click', function() {
                                    window.location.href = '/Killsheet/panel/iwcfVertical';
                                });
                        }
                    });

                    // =========================
                    // IADC
                    // =========================
                } else {

                    Swal.fire({
                        html: `
                        <div class="modal-content">
                            <img src="/assets/images/iadc.png" alt="IADC Logo" class="modal-logo">
                            <h3 class="modal-subtitle">Hoja de matar por Smith Mason & Co</h3>
                            <p class="modal-text">Hoja de matar para pozos verticales.</p>
                            <div class="modal-buttons">
                                <button class="modal-btn modal-btn-primary" id="iadcVertical">
                                    <img src="/assets/images/principal/flecha.png"> Pozo Vertical
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
                            document
                                .getElementById('iadcVertical')
                                .addEventListener('click', function() {
                                    window.location.href = '/Killsheet/panel/iadcVertical';
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