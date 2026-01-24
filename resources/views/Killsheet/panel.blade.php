@extends('Template/maestraUser')
@section('contenido')

<div class="main-container">
    <div class="center-container">
        <div class="sp-path-container">
            <div class="sp-title titlePrincipal sp-delay-title-1">
                <p>{{ __('Welcome to panel of learn and practice of killsheet') }}</p>
                <nav aria-label="Breadcrumb" class="breadcrumb-ui">
                    <ol>
                        <li>
                            <a href="{{ route('killsheet') }}">
                                <i class="ri-folder-2-line"></i>
                                <span>Inicio</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" aria-current="page" class="current">
                                <i class="ri-slideshow-line"></i>
                                <span>Panel</span>
                            </a>
                        </li>
                    </ol>
                </nav>

            </div>
            <div class="sp-step-right sp-delay-2 principalCard">
                <div class="sp-section-title principalTitle sp-delay-title-2">
                    @switch($TIPO)
                    @case('iadcVertical')
                    <h3>{{ __('IADC VERTICAL WELL') }}</h3>
                    @break
                    @case('iwcfVertical')
                    <h3>{{ __('IWCF VERTICAL WELL') }}</h3>
                    @break
                    @case('iwcfDeviated')
                    <h3>{{ __('IWCF DEVIATED WELL') }}</h3>
                    @break

                    @default

                    @endswitch

                    <p>{{ __('Welcome to panel of learn and practice of killsheet') }}</p>
                </div>
                <div class="sp-item-container plataforma">
                    <div class="sp-item">
                        <div class="sp-item-image plataformaKillsheet">
                            <img src="/assets/images/killsheets/plataformaTerrestre.png">
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="two-container">

                <div class="content-card fade-in-right">
                    <div class="content-title">Contenido</div>
                    <div class="content-text-number">
                        <div class="content-number">5</div>
                        <div class="content-text"> hojas <br>de matar</div>
                    </div>
                    <div class="content-plus">
                        +
                    </div>
                    <div class="content-description">
                        nuevas asignaciones durante <br>tu curso de <strong>Control de Pozos</strong>
                    </div>
                    <img src="/assets/images/principal/castorFeliz.png" alt="Trabajador" class="content-workers-image">
                </div>
                <div class="slide fade-in-left">
                    <div class="slide-inner">
                        <input class="slide-open" type="radio" id="slide-1"
                            name="slide" aria-hidden="true" hidden="" checked="checked">
                        <div class="slide-item">
                            <div class="slide-texts">
                                <div class="slide-title">Interactivas</div>
                                <div class="slide-text">Resuelve hojas de matar dinámicas que refuerzan tus habilidades mediante retroalimentación inmediata paso a paso.</div>
                            </div>
                            <img src="/assets/images/principal/ingenieros.png">
                        </div>
                        <input class="slide-open" type="radio" id="slide-2"
                            name="slide" aria-hidden="true" hidden="">
                        <div class="slide-item">
                            <div class="slide-texts">
                                <div class="slide-title">Contratiempo</div>
                                <div class="slide-text">Pon a prueba tu capacidad de análisis resolviendo hojas de matar bajo presión con tiempos limitados y situaciones imprevistas.</div>
                            </div>
                            <img src="/assets/images/principal/ingenieros4.png">
                        </div>
                        <input class="slide-open" type="radio" id="slide-3"
                            name="slide" aria-hidden="true" hidden="">
                        <div class="slide-item">
                            <div class="slide-texts">
                                <div class="slide-title">Tiempo Récord</div>
                                <div class="slide-text">Entrena para reducir tus tiempos de respuesta y mejora tu velocidad de resolución con hojas de matar optimizadas.</div>
                            </div>
                            <img src="/assets/images/principal/ingenieros6.png">
                        </div>
                        <label for="slide-3" class="slide-control prev control-1">‹</label>
                        <label for="slide-2" class="slide-control next control-1">›</label>
                        <label for="slide-1" class="slide-control prev control-2">‹</label>
                        <label for="slide-3" class="slide-control next control-2">›</label>
                        <label for="slide-2" class="slide-control prev control-3">‹</label>
                        <label for="slide-1" class="slide-control next control-3">›</label>
                        <ol class="slide-indicador">
                            <li>
                                <label for="slide-1" class="slide-circulo">•</label>
                            </li>
                            <li>
                                <label for="slide-2" class="slide-circulo">•</label>
                            </li>
                            <li>
                                <label for="slide-3" class="slide-circulo">•</label>
                            </li>
                        </ol>
                    </div>
                </div>

            </div>


        </div>
        <div class="sp-path-container">
            <div class="sp-title sp-delay-title-1">
                <h2>{{ __('CONTENT') }}</h2>
                <p>{{ __('Learn and practice kill sheet') }}</p>
            </div>



            <!-- <div class="sp-step sp-step-right sp-delay-2">
                 <div class="sp-section-title sp-delay-title-2">
                    <h3>{{ __('Information') }}</h3>
                    <p>{{ __('Know the Killsheet') }}</p>
                </div>
                <a href="" target="_blank" class="alert-development">
                    <div class="sp-item-container">
                        <div class="sp-item">
                            <div class="sp-item-image" style="right: -5vw;">
                                <img src="/assets/images/killsheets/information.png">
                            </div>
                            <div class="sp-item-base"><img src="/assets/images/principal/pasto.png"></div>
                        </div>
                    </div>
                </a>
            </div>  -->




            <div class="sp-step sp-step-right sp-delay-2">
                <div class="sp-section-title sp-delay-title-2">
                    <h3>{{ __('Video') }}</h3>
                    <p>{{ __('Interactive KillSheet') }}</p>
                </div>
                <a href="{{ route('killsheet.video', ['TIPO' => $TIPO]) }}" target="_blank">
                    <div class="sp-item-container">
                        <div class="sp-item">
                            <div class="sp-item-image" style="right: -4vw;">
                                <img src="/assets/images/killsheets/video.png">
                            </div>
                            <div class="sp-item-base"><img src="/assets/images/principal/pasto.png"></div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="sp-step sp-step-right sp-delay-2">
                <div class="sp-section-title sp-delay-title-2">
                    <h3>{{ __('My first killsheet') }}</h3>
                    <p>{{ __('Practice and learn') }}</p>
                </div>
            

                <a href="/Killsheet/panel/iwcfVertical/surface/firstsheet" target="_blank">
                    <div class="sp-item-container">
                        <div class="sp-item">
                            <div class="sp-item-image" style="right: -5vw;">
                                <img src="/assets/images/killsheets/lapizmodel.png">
                            </div>
                            <div class="sp-item-base"><img src="/assets/images/principal/pasto.png"></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="sp-step sp-step-right sp-delay-2">
                <div class="sp-section-title sp-delay-title-2">
                    <h3>{{ __('Exercise practice') }}</h3>
                    <p>{{ __('Practice an exercise and ') }} {{ __('check your results') }}</p>
                </div>
                <a href="/Killsheet/panel/iwcfVertical/surface/exercise" target="_blank">
                    <div class="sp-item-container">
                        <div class="sp-item">
                            <div class="sp-item-image" style="right: -4vw;">
                                <img src="/assets/images/evaluation/elements/handstar.png">
                            </div>
                            <div class="sp-item-base"><img src="/assets/images/principal/pasto.png"></div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- <div class="sp-step sp-step-right sp-delay-2">
                 <div class="sp-section-title sp-delay-title-2">
                        <h3>{{ __('Exercise simulator') }}</h3>
                        <p>{{ __('Killsheet with stopwatch') }}</p>
                    </div>
                {{-- <a href="{{ route('killsheet.exerciseSimulator',  ['TIPO' => $TIPO]) }}" target="_blank" class="alert-development"> --}}
                <a href="{{ route('killsheet.exerciseSimulator',  ['TIPO' => $TIPO]) }}" target="_blank">
                    <div class="sp-item-container">
                        <div class="sp-item">
                            <div class="sp-item-image" style="right: -4vw;">
                                 <img src="/assets/images/evaluation/elements/calendar4.png">
                            </div>
                            <div class="sp-item-base"><img  src="/assets/images/principal/pasto.png"></div>
                        </div>
                    </div>
                </a>
            </div> -->
            <!-- <div class="sp-step sp-step-right sp-delay-2">
                 <div class="sp-section-title sp-delay-title-2">
                        <h3>{{ __('Exercise fast') }}</h3>
                        <p>{{ __('Practice in record time') }}</p>
                    </div>
                {{-- <a href="{{ route('killsheet.quickExercise',  ['TIPO' => $TIPO]) }}" target="_blank" class="alert-development"> --}}
                <a href="{{ route('killsheet.quickExercise',  ['TIPO' => $TIPO]) }}" target="_blank" >
                    <div class="sp-item-container">
                        <div class="sp-item">
                            <div class="sp-item-image" style="right: -2vw; top:1vw;">
                                 <img src="/assets/images/evaluation/elements/racha2.png">
                            </div>
                            <div class="sp-item-image" style="right: -5.7vw; top:-4vw;">
                                <img src="/assets/images/evaluation/elements/calendar4.png">
                            </div>
                            <div class="sp-item-base"><img  src="/assets/images/principal/pasto.png"></div>
                        </div>
                    </div>
                </a>
            </div> -->


        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.alert-development').forEach(function(el) {
                    el.addEventListener('click', function(e) {
                        e.preventDefault(); // <-- Previene que se abra el enlace
                        Swal.fire({
                            title: '<strong>🚧 Módulo en Construcción</strong>',
                            html: `
                                <p>Este apartado aún se encuentra en desarrollo.</p>
                                <p>Próximamente estará disponible para que puedas acceder y usar todas sus funcionalidades.</p>
                                <p>Gracias por tu paciencia.</p>
                            `,
                            icon: 'info',
                            customClass: {
                                popup: 'swal2-modal-construction',
                                title: 'swal2-title-construction',
                                content: 'swal2-content-construction',
                                confirmButton: 'swal2-confirm-construction'
                            }
                        });
                    });
                });
            });
        </script>
        <style>
            .swal2-modal-construction {
                text-align: center;
                font-family: Arial, sans-serif;
                display: flex !important;
                flex-direction: column;
                align-items: center;
                /* centra horizontalmente todo */
                text-align: center;
            }

            .swal2-title-construction {
                font-size: 1.8rem;
            }

            .swal2-content-construction p {
                margin: 0.5rem 0;
                font-size: 1rem;
                text-align: center;
                text-justify: center;
            }

            .swal2-confirm-construction {
                background-color: #236192 !important;
                /* azul cielo */
                color: white !important;
                font-weight: bold;
                border-radius: 5px;
            }
        </style>

        <!-- <div class="sp-path-container">
        </div> -->



    </div>
</div>
<script>
    let current = 1;
    const total = 3;

    setInterval(() => {
        document.getElementById('slide-' + current).checked = false;
        current = current % total + 1;
        document.getElementById('slide-' + current).checked = true;
    }, 4000);
</script>
<!-- Import Three.js library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const steps = document.querySelectorAll('.sp-step');
        const container = document.querySelector('.sp-path-container');
        container.style.position = 'relative'; // importante

        steps.forEach((step, index) => {
            if (index === steps.length - 1) return;

            const currentBtn = step.querySelector('.sp-button');
            const nextBtn = steps[index + 1].querySelector('.sp-button');

            const currentRect = currentBtn.getBoundingClientRect();
            const nextRect = nextBtn.getBoundingClientRect();
            const containerRect = container.getBoundingClientRect();

            const startX = currentRect.left + currentRect.width / 2 - containerRect.left;
            const startY = currentRect.top + currentRect.height / 2 - containerRect.top;
            const endX = nextRect.left + nextRect.width / 2 - containerRect.left;
            const endY = nextRect.top + nextRect.height / 2 - containerRect.top;

            const dx = endX - startX;
            const dy = endY - startY;
            const length = Math.hypot(dx, dy);
            const angle = Math.atan2(dy, dx) * (180 / Math.PI);

            const connector = document.createElement('div');
            connector.className = 'sp-connector';

            Object.assign(connector.style, {
                position: 'absolute',
                top: `${startY}px`,
                left: `${startX}px`,
                width: `${length}px`,
                height: '25px',
                backgroundColor: '#89CFF0',
                transform: `rotate(${angle}deg)`,
                transformOrigin: '0 0',
                opacity: '0',
                animation: `sp-fade-in 0.8s forwards ${0.2 + index * 0.8}s`,
                zIndex: 0,
            });

            container.appendChild(connector);
        });
        initThree();
    });

    function initThree() {
        // Get container dimensions
        const container = document.getElementById('sp-three-container');
        const width = window.innerWidth;
        const height = window.innerHeight * 3; // Make it taller than viewport

        // Create Three.js scene
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, width / height, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({
            alpha: true
        });

        renderer.setSize(width, height);
        renderer.setClearColor(0x000000, 0); // Transparent background
        container.appendChild(renderer.domElement);

        // Add some particles floating in the background
        const particleGeometry = new THREE.BufferGeometry();
        const particleCount = 100;

        const positions = new Float32Array(particleCount * 3);
        const colors = new Float32Array(particleCount * 3);

        for (let i = 0; i < particleCount * 3; i += 3) {
            // Position
            positions[i] = (Math.random() - 0.5) * width * 0.05;
            positions[i + 1] = Math.random() * height * 0.5 - height * 0.25;
            positions[i + 2] = Math.random() * 10 - 50;

            // Color (light blue)
            colors[i] = 0.7 + Math.random() * 0.3;
            colors[i + 1] = 0.8 + Math.random() * 0.2;
            colors[i + 2] = 0.9 + Math.random() * 0.1;
        }

        particleGeometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
        particleGeometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));

        const particleMaterial = new THREE.PointsMaterial({
            size: 7,
            transparent: true,
            opacity: 0.8,
            vertexColors: true
        });

        const particles = new THREE.Points(particleGeometry, particleMaterial);
        scene.add(particles);

        // Position camera
        camera.position.z = 100;

        // Animation loop
        function animate() {
            requestAnimationFrame(animate);

            // Animate particles
            const positions = particles.geometry.attributes.position.array;

            for (let i = 0; i < particleCount * 3; i += 3) {
                // Small movement
                positions[i] += Math.sin(Date.now() * 0.001 + i) * 0.05;
                positions[i + 1] += Math.cos(Date.now() * 0.002 + i) * 0.05;
            }

            particles.geometry.attributes.position.needsUpdate = true;

            // Render scene
            renderer.render(scene, camera);
        }

        animate();

        // Handle window resize
        window.addEventListener('resize', () => {
            const width = window.innerWidth;
            const height = window.innerHeight * 3;

            camera.aspect = width / height;
            camera.updateProjectionMatrix();

            renderer.setSize(width, height);
        });
    }
</script>

@endsection

@php
$css_identifier = 'killSheetsPanel';
@endphp