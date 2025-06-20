
<nav class="navbar">
    <div class="logo-container">
        <div class="logo">
        <a href="{{ route('home') }}" style="display: contents;">
            <div class="logo-img"></div>
            <!-- <img src="/assets/images/Color@4x.png" alt="Results in Performance"> -->
        </a>
        </div>
    </div>
    
    <div class="nav-icons">
        <a href="{{ route('home') }}" class="nav-item" data-title="Inicio">
            <img src="/assets/images/principal/home.png" alt="home" class="nav-icon">
        </a>
        <a href="{{ route('calculator') }}" class="nav-item" data-title="Matemáticas para perforación">
            <img src="/assets/images/principal/iconCalculadora.png" alt="Calculadora" class="nav-icon">
        </a>
        <a href="{{ route('killsheet') }}" class="nav-item" data-title="Hojas de matar">
            <img src="/assets/images/principal/iconExamen.png" alt="Lista" class="nav-icon">
        </a>
        <a href="{{ route('home') }}/simulador" class="nav-item" data-title="Simuladores">
            <img src="/assets/images/principal/iconSimulador.png" alt="Edificio" class="nav-icon">
        </a>
        <a href="{{ route('home') }}" class="nav-item" data-title="Exámenes">
            <img src="/assets/images/principal/iconCalificacion.png" alt="Tareas" class="nav-icon">
        </a>
        <a href="{{ route('home') }}" class="nav-item" data-title="Modelos 3D">
            <img src="/assets/images/principal/iconModelo3D.png" alt="Átomo" class="nav-icon">
        </a>
        <!-- <a href="/logout" class="nav-item" data-title="Menú">
            <img src="/assets/images/principal/menu_icon.png" alt="Salir" class="nav-logout-icon">
        </a> -->
        <!-- Menú desplegable -->
        <div class="nav-item dropdown-menu-container no-tooltip">
            <a href="#"  id="menu" class="nav-item no-tooltip" data-title="Menú">
                <img src="/assets/images/principal/menu2.png" alt="Menú" class="nav-logout-icon">
            </a>
            <div class="dropdown-menu">
                <a href="#" id="profile">Perfil</a>
                <a href="#" id="ajust">Ajustes</a>
                <a href="#" id="logout" class="menu-item">Cerrar Sesión</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <!-- <button type="button" class="logout-btn">Cerrar Sesión</button> -->
            </div>
        </div>
    </div>
</nav>
<div id="tooltip" class="tooltip-bubble"></div>
