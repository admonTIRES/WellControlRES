<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" style="background: #F9F9F9!important;">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="/assets/images/favicon.ico" />
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
       
        <!-- Estilos comunes para todos los dispositivos -->
        <link rel="stylesheet"href="{{ asset('css/login/weblogin.css') }}">

        <!-- Estilos específicos para pantallas grandes (escritorio) -->
        <link rel="stylesheet" href="{{ asset('css/login/weblogin.css') }}" media="(min-width: 1024px)">

        <!-- Estilos específicos para pantallas móviles -->
        <link rel="stylesheet" href="{{ asset('css/login/weblogin.css') }}" media="(max-width: 1023px)">

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <title>WellControl RES</title>
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
                <div class="container-fluid" style="min-width: 100% !important;">
                    <div id="contenido_pag">
                        <div class="main-container">
                                <div class="login-container">
                                    <div class="login-title">
                                        <span class="asterisk">*</span>
                                        <div class="text-container">
                                            <span class="text">{{ __('Welcome to') }}</span>
                                            <div class="title-row">
                                                <span class="text">{{ __('coaching') }}</span>
                                                <div class="download-button">
                                                    <i class="fa-solid fa-arrow-down"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="language-selector">
                                        <select id="language-selector" data-route="{{ route('switch.lang', '') }}">
                                            <option value="es" {{ app()->getLocale() === 'es' ? 'selected' : '' }}>🇪🇸 Español</option>
                                            <option value="en" {{ app()->getLocale() === 'en' ? 'selected' : '' }}>🇺🇸 English</option>
                                            <option value="ar" {{ app()->getLocale() === 'ar' ? 'selected' : '' }}>ar عربي</option>
                                            <option value="pt_BR" {{ app()->getLocale() === 'pt_BR' ? 'selected' : '' }}>pt Português</option>

                                        </select>
                                    </div>
                                    
                                    <form id="loginForm" method="POST" action="{{ route('login') }}">
                                    @csrf
                                        <div class="form-group">
                                            <input type="text" name="username" placeholder="{{ __('Username') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" placeholder="{{ __('Password') }}" required>
                                        </div>
                                        @if(session('message'))
                                            <div class="alert alert-danger">
                                                {{ __('Your session has expired. Please log in to continue where you left off.') }}
                                            </div>
                                        @endif

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                {{ $errors->first('message') }}
                                            </div>
                                        @endif
                                        <button id="signin_btn" class="sign-in-btn">{{ __('Sign in') }}</button>
                                        <div class="terms">
                                            <a href="https://results-in-performance.com/images/2024/Aviso_privacidad.pdf" target="_blank" rel="noopener noreferrer">{{ __('Terms of Use') }}</a> {{ __('and') }} <a href="https://results-in-performance.com/images/2024/Aviso_privacidad.pdf" target="_blank" rel="noopener noreferrer">{{ __('Privacy Policy') }}</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="image-container">
                                    <img src="/assets/images/login/drilling tower.png" alt="Safety Helmet">
                                </div>
                            </div>
                        </div>
                    </div>
                <footer class="footer"> </footer>
            <!-- /CONTENIDO Y FOOTER -->
        </div>

        <!-- SCRIPTS -->
        <!-- /SCRIPTS -->
    </body>
    <script>
    $(document).ready(function() {

        $('#signin_btn').click(function()
        {
            var valida = this.form.checkValidity();
            if (valida)
            {
                $('#signin_btn').html('<i class="fa fa-spinner fa-spin"></i> {{ __("Signing in...") }}');
            }
        });
        // $('#loginForm').on('submit', function(e) {
        //     e.preventDefault();

        //     var $form = $(this);
        //     var $button = $('#signin_btn');
        //     var $buttonText = $button.text();

        //     // Mostrar spinner y deshabilitar el botón
        //     $button.html('<i class="fa fa-spinner fa-spin"></i> {{ __("Signing in...") }}').prop('disabled', true);

        //     // $.ajax({
        //     //     url: $form.attr('action'),
        //     //     method: $form.attr('method'),
        //     //     data: $form.serialize(),
        //     //     success: function(response) {
        //     //         if (response.success) {
        //     //             Swal.fire({
        //     //                 icon: 'success',
        //     //                 title: '{{ __("Success") }}',
        //     //                 text: response.message,
        //     //                 confirmButtonText: 'OK'
        //     //             }).then((result) => {
        //     //                 if (result.isConfirmed) {
                                
        //     //                 }
        //     //             });
        //     //         } else {
        //     //             Swal.fire({
        //     //                 icon: 'error',
        //     //                 title: '{{ __("Error") }}',
        //     //                 text: response.message,
        //     //                 confirmButtonText: 'OK'
        //     //             });
        //     //         }
        //     //     },
        //     //     error: function(xhr) {
        //     //         var errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : '{{ __("An error occurred. Please try again.") }}';
        //     //         Swal.fire({
        //     //             icon: 'error',
        //     //             title: '{{ __("Error") }}',
        //     //             text: errorMessage,
        //     //             confirmButtonText: 'OK'
        //     //         });
        //     //     },
        //     //     complete: function() {
        //     //         // Restaurar el texto del botón y habilitarlo
        //     //         $button.html($buttonText).prop('disabled', false);
        //     //     }
        //     // });
        // });
    });
</script>
    <script src="/js/Login/Login.js?v=1.0"></script>
</html>