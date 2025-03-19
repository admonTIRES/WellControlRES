
<nav class="navbar">
    <div class="logo-container">
        <div class="logo">
        <a href="{{ route('home') }}" style="display: contents;"> <!-- display: contents hace que el enlace no afecte el diseño -->
            <img src="/assets/images/l" alt="Results in Performance">
            LOGOS
        </a>
        </div>
    </div>
    <div class="nav-icons">
        <a href="{{ route('home') }}" class="nav-item" data-title="Inicio">
            <img src="/assets/images/principal/home.png" alt="home" class="nav-icon">
        </a>
        <a href="/calculadora" class="nav-item" data-title="Matemáticas para perforación">
            <img src="/assets/images/principal/iconCalculadora.png" alt="Calculadora" class="nav-icon">
        </a>
        <a href="/examenes" class="nav-item" data-title="Hojas de matar">
            <img src="/assets/images/principal/iconExamen.png" alt="Lista" class="nav-icon">
        </a>
        <a href="/simulador" class="nav-item" data-title="Simuladores">
            <img src="/assets/images/principal/iconSimulador.png" alt="Edificio" class="nav-icon">
        </a>
        <a href="/calificaciones" class="nav-item" data-title="Exámenes">
            <img src="/assets/images/principal/iconCalificacion.png" alt="Tareas" class="nav-icon">
        </a>
        <a href="/modelo3D" class="nav-item" data-title="Modelos 3D">
            <img src="/assets/images/principal/iconModelo3D.png" alt="Átomo" class="nav-icon">
        </a>
        <a href="/logout" class="nav-item" data-title="Menú">
            <img src="/assets/images/principal/menu_icon.png" alt="Salir" class="nav-logout-icon">
        </a>
    </div>
</nav>
<div id="tooltip" class="tooltip-bubble"></div>
