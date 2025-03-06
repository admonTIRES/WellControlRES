@php
use Illuminate\Support\Str;
@endphp

 <!-- ESTE ES EL TEMPLATE PARA LA VISTA DE ADMINISTRADOR -->
<!DOCTYPE html>
<html lang="es" style="background: #F9F9F9!important;">

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
    </head>
    <body>
         <!-- DIV PRINCIPAL -->
        <div id="main-wrapper">

             <!-- HEADER -->
            <header>
            </header>
            <!-- /HEADER -->
            <!-- NAVBAR -->
            <aside class="left-sidebar">
            </aside>
            <!-- /NAVBAR -->
            <!-- CONTENIDO Y FOOTER -->
            <div class="page-wrapper" style="background: #F9F9F9!important;">
                <div class="container-fluid" style="min-width: 100% !important;">
                    <div id="contenido_pag">
                        @yield('contenido')
                    </div>
                </div>
                <footer class="footer"> www.results-in-performance.com </footer>
            </div>
            <!-- /CONTENIDO Y FOOTER -->
        </div>

        <!-- SCRIPTS -->
        <!-- /SCRIPTS -->
    </body>
</html>