@extends('Template/maestraUser')
@section('contenido') 

<div class="main-container"> 
    <div class="center-container">
         
        <div class="sp-path-container">
             <div class="sp-title sp-delay-title-1">
                <h2>{{ __('VERTICAL WELL') }}</h2>
                <p>{{ __('Learn and practice kill sheet') }}</p>
            </div>
           
            
            <div class="sp-step sp-step-right sp-delay-2">
                 <div class="sp-section-title sp-delay-title-2">
                        <h3>{{ __('Information') }}</h3>
                        <p>{{ __('Know the Killsheet') }}</p>
                    </div>
                    <a href="{{ route('killsheet.iwcf.video') }}" target="_blank">
                    <div class="sp-item-container">
                        <div class="sp-item">
                            <div class="sp-item-image" style="right: -5vw;">
                                <img src="/assets/images/killsheets/information.png">
                            </div>
                            <div class="sp-item-base"><img  src="/assets/images/principal/pasto.png"></div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="sp-step sp-step-right sp-delay-2">
                 <div class="sp-section-title sp-delay-title-2">
                        <h3>{{ __('Video') }}</h3>
                        <p>{{ __('Interactive KillSheet') }}</p>
                    </div>
                <a href="{{ route('killsheet.iwcf.video') }}" target="_blank">
                    <div class="sp-item-container">
                        <div class="sp-item">
                            <div class="sp-item-image" style="right: -4vw;">
                                 <img src="/assets/images/killsheets/video.png">
                            </div>
                            <div class="sp-item-base"><img  src="/assets/images/principal/pasto.png"></div>
                        </div>
                    </div>
                </a>
            </div>

              <div class="sp-step sp-step-right sp-delay-2">
                 <div class="sp-section-title sp-delay-title-2">
                        <h3>{{ __('My first killsheet') }}</h3>
                        <p>{{ __('Practice and learn') }}</p>
                    </div>
                <a href="{{ route('killsheet.iwcf.video') }}" target="_blank">
                    <div class="sp-item-container">
                        <div class="sp-item">
                            <div class="sp-item-image" style="right: -5vw;">
                                 <img src="/assets/images/killsheets/lapizmodel.png">
                            </div>
                            <div class="sp-item-base"><img  src="/assets/images/principal/pasto.png"></div>
                        </div>
                    </div>
                </a>
            </div>
              <div class="sp-step sp-step-right sp-delay-2">
                 <div class="sp-section-title sp-delay-title-2">
                        <h3>{{ __('Exercise practice') }}</h3>
                        <p>{{ __('Practice an exercise and ') }} <br> {{ __('check your results') }}</p>
                    </div>
                <a href="{{ route('killsheet.iwcf.video') }}" target="_blank">
                    <div class="sp-item-container">
                        <div class="sp-item">
                            <div class="sp-item-image" style="right: -4vw;">
                                 <img src="/assets/images/evaluation/elements/handstar.png">
                            </div>
                            <div class="sp-item-base"><img  src="/assets/images/principal/pasto.png"></div>
                        </div>
                    </div>
                </a>
            </div>
              <div class="sp-step sp-step-right sp-delay-2">
                 <div class="sp-section-title sp-delay-title-2">
                        <h3>{{ __('Exercise simulator') }}</h3>
                        <p>{{ __('Killsheet with stopwatch') }}</p>
                    </div>
                <a href="{{ route('killsheet.iwcf.video') }}" target="_blank">
                    <div class="sp-item-container">
                        <div class="sp-item">
                            <div class="sp-item-image" style="right: -4vw;">
                                 <img src="/assets/images/evaluation/elements/calendar4.png">
                            </div>
                            <div class="sp-item-base"><img  src="/assets/images/principal/pasto.png"></div>
                        </div>
                    </div>
                </a>
            </div>
              <div class="sp-step sp-step-right sp-delay-2">
                 <div class="sp-section-title sp-delay-title-2">
                        <h3>{{ __('Exercise fast') }}</h3>
                        <p>{{ __('Practice in record time') }}</p>
                    </div>
                <a href="{{ route('killsheet.iwcf.video') }}" target="_blank">
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
            </div>
            
            
        </div>
        <div class="sp-path-container">
           
            
        </div>
         <div class="sp-path-container">
            

            <!-- <div class="sp-step sp-step-center sp-delay-2">
               
                <div class="sp-behavor-container" style="left: 6vw; top: -5vw;">
                    <div class="sp-behavor">
                        <div class="sp-behavor-image">
                            <img src="/assets/images/principal/castorSaludando.png" alt="Character 2" >
                        </div>
                        <div class="sp-grass-base"><img  src="/assets/images/principal/pasto.png"></div>
                    </div>
                </div>
            </div>
             -->
           
            
        </div>
        
       
        
    </div>
</div>
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
            const renderer = new THREE.WebGLRenderer({ alpha: true });
            
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


   
