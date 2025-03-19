@extends('Template/maestraUser')
@section('contenido') 
    <style>
        
        .container {
            max-width: 900px;
            margin-right: auto;
            margin-bottom: 0;
            margin-left: auto;
            padding: 20px;
            text-align: center;
        }

        
        header {
            color: white;
        }
        
        .subtitle {
            font-size: 16px;
            max-width: 700px;
            margin: 0 auto 40px;
            color: white;
        }
        
        /* Feature card with beaver */
        .feature-card {
            background: rgba(255, 253, 253, 0.16);
            padding: 3rem;
            border-radius: 20px;
            backdrop-filter: blur(15px);
            position: relative;
            z-index: 2;
            flex-shrink: 0;
            margin: 20px auto;
            width: 700px;
            height: 330px;
            overflow: visible;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .message {
            position: absolute;
            left: 40px;
            top: 50px;
            width: 250px;
            text-align: left;
            font-size: 24px;
            line-height: 1.3;
            color:rgb(255, 255, 255);
            
        }
        
        .highlight-hoy {
            color: #e33936;
            font-style: italic;
        }
        
        .highlight-logro {
            color: #e33936;
            font-style: italic;
        }
        
        /* Beaver animation */
        .beaver {
            position: absolute;
            right: 60px;
            bottom: 0;
            width: 220px;
            animation: wave 2s infinite alternate;
            z-index: 5;
        }
        
        @keyframes wave {
            0% { transform: rotate(-3deg); }
            100% { transform: rotate(3deg); }
        }
        
        /* Cloud animations */
        .cloud {
            position: absolute;
            z-index: 1;
        }
        
        .cloud-1 {
            width:300px;
            left: -50px;
            bottom: -40px;
            animation: float-1 8s infinite alternate ease-in-out;
        }
        
        .cloud-2 {
            width: 290px;
            left: 140px;
            bottom: -60px;
            animation: float-2 8s infinite alternate ease-in-out;
        }
        
        .cloud-3 {
            width: 280px;
            right: -80px;
            bottom: -40px;
            animation: float-3 8s infinite alternate ease-in-out;
        }
        
        .cloud-4 {
            width: 280px;
            right: 60px;
            bottom: -60px;
            z-index: 6;
            animation: float-4 8s infinite alternate ease-in-out;
        }
        
        @keyframes float-1 {
            0% { transform: translateY(0); }
            100% { transform: translateY(-15px); }
        }
        
        @keyframes float-2 {
            0% { transform: translateY(-10px); }
            100% { transform: translateY(10px); }
        }
        
        @keyframes float-3 {
            0% { transform: translateY(0px); }
            100% { transform: translateY(15px); }
        }
        
        @keyframes float-4 {
            0% { transform: translateY(5px); }
            100% { transform: translateY(-15px); }
        }
        
        /* Steps section */
        .steps-section {
            margin-top: 100px;
        }
        
        .steps-title {
            font-size: 20px;
            color:rgb(230, 74, 74);;
            margin-bottom: 30px;
        }
        
        .options {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .option-card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            width: 50%;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 400px; /* Ajusta la altura según tus necesidades */
        }

        .option-card:hover {
            transform: translateY(-5px);
        }

        .option-title {
            color: #4aa0e6;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .option-text {
            font-size: 14px;
            color: #777;
           
        }

        .select-btn {
            background-color: #236192;
            color:rgb(255, 255, 255);
            border: none;
            padding: 8px 15px;
            border-radius: 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            width: fit-content;
            margin-top: auto; /* Empuja el botón hacia abajo */
        }

        .option-image {
            width: 200px;
            height: auto;
            display: block;
            margin-top: auto;
        }      
        .select-btn img {
            width: 15px;
            margin-right: 5px;
        }

        
        /* Custom SweetAlert styles */
        .swal2-popup {
            border-radius: 15px;
            padding: 2rem;
        }
        
        .swal2-title {
            color: #4aa0e6;
        }
        
        .swal2-html-container {
            text-align: left;
            margin: 0;
            padding: 0;
        }
        
        .modal-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }
        
        .modal-logo {
            width: 150px;
            height: auto;
            margin-bottom: 20px;
            object-fit: contain;
        }
        
        .modal-subtitle {
            color: #e33936;
            font-size: 18px;
            margin-bottom: 15px;
            text-align: center;
            width: 100%;
        }
        
        .modal-text {
            color: #555;
            margin-bottom: 20px;
            text-align: center;
            width: 100%;
        }
        
        .modal-image {
            width: 100%;
            max-height: 180px;
            object-fit: contain;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        
        .modal-buttons {
            display: flex;
            justify-content: space-around;
            width: 100%;
            gap: 15px;
            margin-top: 20px;
        }
        
        /* New custom button styles */
        .modal-btn {
            padding: 12px 24px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
            transition: all 0.3s ease;
            flex: 1;
            max-width: 200px;
        }
        
        .modal-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 8px rgba(0,0,0,0.15);
        }
        
        .modal-btn:active {
            transform: translateY(1px);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .modal-btn-primary {
            color: white;

            background-color: #236192;
          
            border: none;
            
        }
        
        .modal-btn-secondary {
            background-color:rgb(146, 35, 52);
            color: white;
          
          border: none;
        }
        
        .modal-btn img {
            width: 18px;
            height: 18px;
            margin-right: 8px;
        }
    </style>

    <div class="container">
        <header>
            <h1>Hoja de matar</h1>
            <p class="subtitle">Amper helps modern marketing teams simplify email creation workflow, boost interactive experience of your subscribers and increase ROI from email campaigns.</p>
        </header>
        
        <div class="feature-card">
            <div class="message">
                <p>Lo que <span class="highlight-hoy">hoy</span> parece difícil, mañana será tu mayor <span class="highlight-logro">logro</span></p>
            </div>
            
            <img src="/assets/images/Principal/castorFeliz.png" alt="Beaver mascot" class="beaver" />
            
            <img src="/assets/images/Principal/nube2.png" alt="Cloud" class="cloud cloud-1" />
            <img src="/assets/images/Principal/nube1.png" alt="Cloud" class="cloud cloud-2" />
            <img src="/assets/images/Principal/nube3.png" alt="Cloud" class="cloud cloud-3" />
            <img src="/assets/images/Principal/nube4.png" alt="Cloud" class="cloud cloud-4" />
        </div>
        
        <div class="steps-section">
            <h2 class="steps-title">

            </h2>
            
            <div class="options">
                <div class="option-card">
                    <h3 class="option-title" data-company="smith">IADC</h3>
                    <p class="option-text">Lorem ipsum dolor sit amet consectetur adipiscing elit nunc facilisis in commodo sed pellentesque hendrerit natum accumsan facilisis erat vel placerat commodo.</p>
                    <img class="option-image" src="/assets/images/iadc.png" alt="Check icon" />
                    <button class="select-btn">
                        <img src="/assets/images/Principal/flecha.png" alt="Check icon" /> Seleccionar
                    </button>
                </div>
                
                <div class="option-card" data-company="iwcf">
                    <h3 class="option-title">IWCF</h3>
                    <p class="option-text">Lorem ipsum dolor sit amet consectetur adipiscing elit nunc facilisis in commodo sed pellentesque hendrerit natum accumsan facilisis erat vel placerat commodo.</p>
                    <img class="option-image" src="/assets/images/iwcflogo.png" alt="Check icon" />
                    <button class="select-btn">
                        <img src="/assets/images/Principal/flecha.png" alt="Check icon" /> Seleccionar
                    </button>
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
            
            const selectButtons = document.querySelectorAll('.select-btn');
            selectButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const card = this.closest('.option-card');
                    const companyName = card.dataset.company;
                    const companyTitle = card.querySelector('.option-title').textContent;
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
                        <img src="/assets/images/Principal/flecha.png" alt="Icon"> Pozo Vertical
                    </button>
                    <button class="modal-btn modal-btn-primary" id="iwcfDesviado">
                        <img src="/assets/images/Principal/flecha.png" alt="Icon"> Pozo Desviado
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
                // Muestra mensaje de confirmación antes de redireccionar
                Swal.fire({
                    title: 'Pozo Vertical',
                    text: `Has seleccionado el pozo vertical de IWCF.`,
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Continuar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirecciona a la ruta de Laravel para pozo vertical IWCF
                        window.location.href = "{{ route('killsheet.iwcf') }}";
                    }
                });
            });
            
            document.getElementById('iwcfDesviado').addEventListener('click', function() {
                // Muestra mensaje de confirmación antes de redireccionar
                Swal.fire({
                    title: 'Pozo Desviado',
                    text: `Has seleccionado el pozo desviado de IWCF.`,
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonText: 'Continuar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirecciona a la ruta de Laravel para pozo desviado IWCF
                        window.location.href = "{{ route('killsheet.iwcfdesviado') }}";
                    }
                });
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
                        <img src="/assets/images/Principal/flecha.png" alt="Check icon"> Pozo Vertical
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