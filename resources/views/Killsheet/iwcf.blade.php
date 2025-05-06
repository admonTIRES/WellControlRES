@extends('Template/maestraUser')
@section('contenido') 
<style>
   .sp-path-container {
        position: relative;
        max-width: 100%;
        min-height: 200vw;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 10vw 0;
        animation: sp-fade-in 1.5s ease-out forwards;
    }

    @keyframes sp-fade-in {
        from {
                opacity: 0;
        }
        to {
                opacity: 1;
        }
    }


    .sp-step {
        position: relative;
        margin: 3vw 0;
        width: 100%;
        z-index: 1;
    }

    /* Step alignment classes */
    .sp-step-left {
        display: flex;
        justify-content: flex-start;
        margin-left: 10vw;
        animation: sp-slide-in-left 0.8s ease-out forwards;
        opacity: 0;
    }

    .sp-step-center {
        display: flex;
        justify-content: center;
        animation: sp-slide-in-center 0.8s ease-out forwards;
        opacity: 0;
    }

    .sp-step-right {
        display: flex;
        justify-content: flex-end;
        margin-right: 10vw;
        animation: sp-slide-in-right 0.8s ease-out forwards;
        opacity: 0;
    }

    @keyframes sp-slide-in-left {
        0% {
            opacity: 0;
            transform: translateX(-30px);
        }
        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes sp-slide-in-center {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes sp-slide-in-right {
        0% {
            opacity: 0;
            transform: translateX(30px);
        }
        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Staggered animation delays */
    .sp-delay-1 { animation-delay: 0.2s; }
    .sp-delay-2 { animation-delay: 0.4s; }
    .sp-delay-3 { animation-delay: 0.6s; }
    .sp-delay-4 { animation-delay: 0.8s; }
    .sp-delay-5 { animation-delay: 1.0s; }
    .sp-delay-6 { animation-delay: 1.2s; }
    .sp-delay-7 { animation-delay: 1.4s; }
    .sp-delay-8 { animation-delay: 1.6s; }
    .sp-delay-9 { animation-delay: 1.8s; }
    .sp-delay-10 { animation-delay: 2.0s; }
    .sp-delay-11 { animation-delay: 2.2s; }
    .sp-delay-12 { animation-delay: 2.4s; }

    .sp-button {
        width: 10vw;
        height: 10vw;
        background: linear-gradient(to bottom, #c2e6ff, #66c2ff);
        border-radius: 50%;
        box-shadow: 0 0.5vw 1vw rgba(0, 100, 200, 0.2);
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        cursor: pointer;
        transition: transform 0.3s, box-shadow 0.3s;
        z-index: 2;
    }

    .sp-button:hover {
        transform: translateY(-0.5vw);
        box-shadow: 0 1vw 1.5vw rgba(0, 100, 200, 0.3);
    }

    .sp-button-play::after {
        content: '';
        width: 0;
        height: 0;
        border-top: 1.5vw solid transparent;
        border-bottom: 1.5vw solid transparent;
        border-left: 2.5vw solid #1a88ff;
        margin-left: 0.5vw;
    }

    .sp-button-menu::after {
        content: '';
        width: 3vw;
        height: 0.6vw;
        background-color: #1a88ff;
        box-shadow: 0 1vw 0 #1a88ff, 0 2vw 0 #1a88ff;
        position: absolute;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .sp-button-check::after {
        content: '';
        width: 1.5vw;
        height: 3vw;
        border-right: 0.8vw solid #1a88ff;
        border-bottom: 0.8vw solid #1a88ff;
        position: absolute;
        top: 45%;
        left: 50%;
        transform: translate(-50%, -50%) rotate(45deg);
    }

    .sp-behavor-container {
        position: absolute;
        width: 12vw;
        height: 12vw;
    }

    .sp-behavor {
        width: 100%;
        height: 100%;
        animation: sp-float 3s ease-in-out infinite alternate;
    }

    @keyframes sp-float {
        0% {
            transform: translateY(0) rotate(-5deg);
        }
        50% {
            transform: translateY(-1vw) rotate(0deg);
        }
        100% {
            transform: translateY(-0.5vw) rotate(5deg);
        }
    }

    .sp-behavor-image {
        width: 100%;
        height: 100%;
        position: relative;
    }
    .sp-behavor-image img{
        min-height:25vw;
        margin-left:7vw;
    }

    .sp-grass-base {
        position: absolute;
        bottom: -5vw;
        left: 0;
        width: 100%;
        height: 3vw;
        z-index: -1;
    }
    
    .sp-section-title {
        text-align: center;
        width: 100%;
        animation: sp-title-fade-in 1s ease-out forwards;
        opacity: 0;
    }
    
    @keyframes sp-title-fade-in {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .sp-section-title h2 {
        font-size: 2.5vw;
        color:rgb(255, 255, 255);
        margin-bottom: 1vw;
    }
    
    .sp-section-title h3 {
        font-size: 1.5vw;
        color:rgb(255, 255, 255);
    }

    .sp-delay-title-1 { animation-delay: 0.3s; }
    .sp-delay-title-2 { animation-delay: 0.9s; }
    .sp-delay-title-3 { animation-delay: 1.5s; }
    .sp-delay-title-4 { animation-delay: 2.1s; }

    /* Add diagonal connector lines between steps */
    .sp-connector {
        /* position: absolute; */
        background: linear-gradient(to bottom, #a8d8ff, #66c2ff);
        /* transform-origin: top center;
        z-index: 0; */
        pointer-events: none;
    }

    /* Prevent any global styles from affecting our Three.js canvas */
    .sp-three-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        pointer-events: none;
    }

  
</style>
<div class="main-container"> 
    <div class="sp-path-container">
        <!-- Three.js background container -->
        <div id="sp-three-container" class="sp-three-container"></div>
        
        <!-- Section 1 -->
        <div class="sp-section-title sp-delay-title-1">
            <h2>{{ __('Introduction') }}</h2>
            <h3>Start your learn experience here</h3>
        </div>
        
        <!-- Steps 1-3 -->
        <div class="sp-step sp-step-center sp-delay-1">
            <div class="sp-button sp-button-menu"></div>
        </div>
        
        <div class="sp-step sp-step-right sp-delay-2">
        <a href="{{ route('killsheet.iwcf.video') }}" target="_blank">
            <div class="sp-button sp-button-play"></div>
        </a>

            <div class="sp-behavor-container" style="left: 5vw; top: -5vw;">
                <div class="sp-behavor">
                    <div class="sp-behavor-image">
                        <img src="/assets/images/principal/castorSaludando.png" alt="Character 2" >
                    </div>
                    <div class="sp-grass-base"><img  src="/assets/images/principal/pasto.png"></div>
                </div>
            </div>
        </div>
        
        <div class="sp-step sp-step-center sp-delay-3">
            <div class="sp-button"></div>
        </div>
        
        <!-- Section 2 -->
        <div class="sp-section-title sp-delay-title-2">
            <h2>Practice</h2>
            <h3>Level 1</h3>
            <div class="sp-behavor-container" style="right: 12vw; top: -5vw;">
                <div class="sp-behavor">
                    <div class="sp-behavor-image">
                        <img src="/assets/images/principal/castorSaludandoDeLado.png" alt="Character 2" >
                    </div>
                    <div class="sp-grass-base"><img  src="/assets/images/principal/pasto.png"></div>
                </div>
            </div>
        </div>
        
        <!-- Steps 4-6 -->
        <div class="sp-step sp-step-left sp-delay-4">
            <div class="sp-button sp-button-play"></div>
        </div>
        
        <div class="sp-step sp-step-center sp-delay-5">
        <a href="{{ route('killsheet.iwcfdesviado') }}" target="_blank">
            <div class="sp-button sp-button-menu"></div>
        </a>  
        </div>
        
        <div class="sp-step sp-step-right sp-delay-6">
            <div class="sp-button"></div>
            <div class="sp-behavor-container" style="left: 8vw; top: -5vw;">
                <div class="sp-behavor">
                    <div class="sp-behavor-image">
                        <img src="/assets/images/principal/castorSaludando.png" alt="Character 2" >
                    </div>
                    <div class="sp-grass-base"><img  src="/assets/images/principal/pasto.png"></div>
                </div>
            </div>
        </div>
        
        <!-- Section 3 -->
        <div class="sp-section-title sp-delay-title-3">
            <h2>Practice</h2>
            <h3>Level 2</h3>
        </div>
        
        <!-- Steps 7-9 -->
        <div class="sp-step sp-step-center sp-delay-7">
            <div class="sp-button"></div>
        </div>
        
        <div class="sp-step sp-step-left sp-delay-8">
            <div class="sp-button sp-button-check"></div>
           
        </div>
        
        <div class="sp-step sp-step-center sp-delay-9">
            <div class="sp-button"></div>
        </div>
        
        <!-- Section 4 -->
        <div class="sp-section-title sp-delay-title-4">
            <h2>Practice</h2>
            <h3>Level hard (time)</h3>
            <div class="sp-behavor-container" style="left: 8vw; top: -5vw;">
                <div class="sp-behavor">
                    <div class="sp-behavor-image">
                        <img src="/assets/images/principal/castorSaludando.png" alt="Character 2" >
                    </div>
                    <div class="sp-grass-base"><img  src="/assets/images/principal/pasto.png"></div>
                </div>
            </div>
        </div>
        
        <!-- Steps 10-12 -->
        <div class="sp-step sp-step-right sp-delay-10">
            <div class="sp-button"></div>
        </div>
        
        <div class="sp-step sp-step-center sp-delay-11">
            <div class="sp-button sp-button-play"></div>
        </div>
        
        <div class="sp-step sp-step-center sp-delay-12">
            <div class="sp-button"></div>
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
                    height: '2px',
                    backgroundColor: '#89CFF0',
                    transform: `rotate(${angle}deg)`,
                    transformOrigin: '0 0',
                    opacity: '0',
                    animation: `sp-fade-in 0.8s forwards ${0.2 + index * 0.2}s`,
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
    $css_identifier = 'killSheets';
@endphp


   
