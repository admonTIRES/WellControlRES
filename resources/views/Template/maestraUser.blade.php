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
        
        <title>WellControl RES</title>
    </head>
    <body>
         <!-- DIV PRINCIPAL -->
        

        <div id="main-wrapper">
             <!-- HEADER -->
            <header>
            @include('Principal.navbar')
            </header>
            <!-- /HEADER -->
            <!-- NAVBAR -->
            <!-- /NAVBAR -->
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
    const navItems = document.querySelectorAll(".nav-item");
    const tooltip = document.getElementById("tooltip");

    navItems.forEach(item => {
        item.addEventListener("mouseenter", function(event) {
            const title = item.getAttribute("data-title");
            if (title) {
                tooltip.textContent = title;
                tooltip.style.display = "block";
                const rect = item.getBoundingClientRect();
                tooltip.style.top = `${rect.bottom + window.scrollY + 5}px`;
                tooltip.style.left = `${rect.left + rect.width / 2}px`;
            }
        });

        item.addEventListener("mouseleave", function() {
            tooltip.style.display = "none";
        });

        item.addEventListener("click", function(event) {
            event.preventDefault();
            window.location.href = item.href;
        });
    });
});
    </script>
</html>