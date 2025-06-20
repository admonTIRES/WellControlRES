@php
use Illuminate\Support\Str;
@endphp

<!-- ESTE ES EL TEMPLATE PARA LA VISTA DE USUARIO -->
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" style="background: #F9F9F9!important;">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="-1" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jura:wght@300;400;500;600;700" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Niconne&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel='stylesheet'>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Jura:wght@300;400;500;600;700" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- libreria del l=visor de libro -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flipbook.js/0.0.1/flipbook.min.css">
    <!-- Estilos específicos para pantallas grandes (escritorio) -->
    <link rel="stylesheet" href="{{ asset('css/web.css') }}?v=1.2" media="(min-width: 1024px)">

    <!-- Estilos específicos para pantallas móviles -->
    <link rel="stylesheet" href="{{ asset('css/mobile.css') }}?v=1.4" media="(max-width: 1023px)">

    <!-- CSS dinámico según el contenido -->
    @if (isset($css_identifier))
    @switch($css_identifier)
    @case('principal')
    <link rel="stylesheet" href="{{ asset('css/principal/webprincipal.css') }}?v=1.2" media="(min-width: 1024px)">
    <!-- Estilos específicos para pantallas móviles -->
    <link rel="stylesheet" href="{{ asset('css/principal/mobprincipal.css') }}?v=1.6" media="(max-width: 1023px)">
    @break
    @case('calculator')
    <link rel="stylesheet" href="{{ asset('css/calculatorModule/webcalculatorModule.css') }}?v=1.1"
        media="(min-width: 1024px)">
    <link rel="stylesheet" href="{{ asset('css/calculatorModule/mobcalculatorModule.css') }}?v=1.1"
        media="(max-width: 1023px)">
    @break
    @case('killSheets')
    <link rel="stylesheet" href="{{ asset('css/killsheetsModule/webkillsheet.css') }}" media="(min-width: 1024px)">
    @break
    @endswitch
    @endif
    <title>WellControlLearningExperience </title>
</head>

<body>
    <!-- DIV PRINCIPAL -->
    <div id="main-wrapper">
        <!-- HEADER -->
        <header>
            @include('Principal.navbar')
        </header>
        <!-- /HEADER -->
        <!-- CONTENIDO Y FOOTER -->
        <div class="page-wrapper">
            <div class="container-fluid">
                <div id="contenido_pag">
                    @yield('contenido')
                </div>
            </div>
            <footer class="footer"> </footer>
        </div>
        <!-- /CONTENIDO Y FOOTER -->
    </div>

    <!-- SCRIPTS -->
    <!-- /SCRIPTS -->
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/index.js') }}?v=1.1"></script>
@if(request()->is('Calculator'))
<script src="{{ asset('js/Calculator.js') }}"></script>
@endif
<script src="{{ asset('js/Principal/Principal.js') }}?v=1.5"></script>

</html>