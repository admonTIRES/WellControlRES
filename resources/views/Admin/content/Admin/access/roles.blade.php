@extends('Template/maestraAdmin')
@section('contenido')
   
<div class="conatiner-fluid content-inner mt-5 py-0">
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card banner">
                    <div class="card-body ">
                        <div class="row justify-content-center align-items-center banner-container">
                            <div class="col-lg-6 banner-item">
                                <div class="banner-text">
                                    <h1 class="fw-bold mb-4">
                                        <span class="text-secondary">{{ __('User access') }}
                                    </h1>
                                </div>
                                <p class="mb-4">{{ __('You can create new users, assign roles and permissions, manage passwords, and activate or deactivate accounts') }}.</p>
                            </div>
                            <div class="col-lg-6 banner-img">
                                <div class="img">
                                    <img src="../assets/images/plataformas/plataforma.png" class="img-fluid w-55" alt="img8">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="w-100 h-100">
                            <div class="header-title d-flex justify-content-between align-items-center w-100 mb-4">
                                <h4 class="card-title mb-0">{{ __('Users list') }}</h4>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#usuariosModal">
                                    {{ __('New user') }}
                                </button>
                            </div>
                            <div class="table-container">
                                <table id="usuarios-list-table" class="table" role="grid">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .wizard-step {
        display: none;
    }

    .wizard-step.active {
        display: block;
    }

    .wizard-nav {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        justify-content: space-between;
        margin-bottom: 2rem;
    }

    .wizard-nav li {
        flex: 1;
        text-align: center;
        position: relative;
        padding: 1rem;
        border-radius: 8px;
        margin: 0 0.25rem;
        background: #f8f9fa;
        color: #6c757d;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .wizard-nav li.active {
        background: #FF585D;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(13, 110, 253, 0.3);
    }

    .wizard-nav li.completed {
        background: #198754;
        color: white;
    }

    .wizard-nav li i {
        display: block;
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }

    .wizard-nav li span {
        font-weight: 500;
        font-size: 0.9rem;
    }

    .form-card {
        background: #f8f9fa;
        padding: 2rem;
        border-radius: 12px;
        margin-bottom: 2rem;
        border: 1px solid #e9ecef;
    }

    .steps {
        color: #6c757d;
        font-size: 1rem;
        font-weight: 500;
    }

    .action-button {
        padding: 0.75rem 2rem;
        font-weight: 500;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .action-button:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .form-control:focus {
        border-color: #A4D65E;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    }

    .success-icon {
        width: 120px;
        height: 120px;
        background: linear-gradient(135deg, #A4D65E, #20c997);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
        animation: successPulse 2s ease-in-out infinite;
    }

    .success-icon i {
        font-size: 3rem;
        color: white;
    }

    @keyframes successPulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }
    }

    .error-message {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.25rem;
        display: none;
    }

    .form-control.is-invalid {
        border-color: #dc3545;
    }

    .progress-bar-custom {
        height: 4px;
        background: #e9ecef;
        border-radius: 2px;
        overflow: hidden;
        margin-bottom: 2rem;
    }

    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #007DBA, #FF585D);
        border-radius: 2px;
        transition: width 0.5s ease;
    }

    .student-row {
        background: #fff;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .student-row:hover {
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transform: translateY(-1px);
    }

    .password-cell {
        font-family: 'Courier New', monospace;
        background: #f8f9fa;
        padding: 0.5rem;
        border-radius: 4px;
        position: relative;
    }

    .copy-btn {
        font-size: 0.75rem;
        padding: 0.25rem 0.5rem;
    }

    .table th {
        background: #495057 !important;
        color: white;
        font-weight: 600;
        border: none;
    }

    .table td {
        vertical-align: middle;
        border-color: #e9ecef;
    }
</style>
<div class="modal fade" id="usuariosModal" tabindex="-1" aria-labelledby="usuariosModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userTitle">{{ __('New user') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
             <div class="modal-body">
                <form id="usuariosForm" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="row">
                        <!-- Columna 1 -->
                        <div class="col-md-8">
                            <div class="row">
                                <!-- Tipo de usuario -->
                                <div class="form-check form-switch col-md-12 mb-2 d-flex justify-content-center align-items-center">
                                    <input class="form-check-input me-2" type="checkbox" id="instructorSwitch">
                                    <label class="form-check-label" for="instructorSwitch">{{ __('Instructor?') }}</label>
                                </div>

                                <!-- Select instructor -->
                                <div class="form-section col-md-12 mb-3" id="instructorSelectDiv">
                                    <label for="instructorSelect" class="form-label fw-bold">
                                        {{ __('Instructor') }} <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select" id="instructorSelect" name="INSTRUCTOR_ID">
                                        <option value="0">{{ __('Select an instructor') }}</option>
                                        @foreach ($instructores as $instructor) 
                                        <option value="{{ $instructor->ID_CATALOGO_INSTRUCTOR }}">
                                            {{ $instructor->FNAME_INSTRUCTOR }}
                                            @if($instructor->MDNAME_INSTRUCTOR) {{ $instructor->MDNAME_INSTRUCTOR }} @endif
                                            {{ $instructor->LSNAME_INSTRUCTOR }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Nombre -->
                                <div class="form-section col-md-6 mb-3">
                                    <label for="FNAME_USER" class="form-label fw-bold">
                                        {{ __('First name') }} <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control text-capitalize" name="FNAME_USER" id="FNAME_USER">
                                </div>

                                <!-- Segundo nombre -->
                                <div class="form-section col-md-6 mb-3">
                                    <label for="MDNAME_USER" class="form-label fw-bold">
                                        {{ __('Middle name') }}
                                    </label>
                                    <input type="text" class="form-control text-capitalize" name="MDNAME_USER" id="MDNAME_USER">
                                </div>

                                <!-- Apellido -->
                                <div class="form-section col-md-12 mb-3">
                                    <label for="LSNAME_USER" class="form-label  fw-bold">
                                        {{ __('Family or last name') }} <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control text-capitalize" name="LSNAME_USER" id="LSNAME_USER" >
                                </div>

                                <hr class="my-3">

                                <!-- Correo -->
                                <div class="form-section col-md-6 mb-3">
                                    <label for="email" class="form-label fw-bold">
                                        {{ __('Email') }} <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" class="form-control" name="email" id="email" >
                                </div>

                                <!-- Usuario -->
                                <div class="form-section col-md-6 mb-3">
                                    <label for="username" class="form-label  fw-bold">
                                        {{ __('Username') }} <span class="text-danger">*</span>
                                    </label>
                                   <input 
                                        type="text" 
                                        class="form-control" 
                                        name="username" 
                                        id="username" 
                                
                                        oninput="this.value = this.value.replace(/[^a-zA-Z]/g, '')"
                                        maxlength="50"
                                    >
                                </div>

                                <!-- Contraseña -->
                                <div class="form-section col-md-6 mb-3 position-relative">
                                    <label for="password" class="form-label  fw-bold">
                                        {{ __('Password') }} <span class="text-danger">*</span>
                                    </label>
                                    <input type="password" class="form-control pe-5" name="password_v" id="password">
                                    <i class="bi bi-eye toggle-password position-absolute bottom-0 end-0 translate-middle-y me-3" style="cursor: pointer;" toggle="#password"></i>
                                </div>

                                <!-- Confirmar contraseña -->
                                <div class="form-section col-md-6 mb-3 position-relative">
                                    <label for="confirmPassword" class="form-label fw-bold">
                                        {{ __('Confirm password') }} <span class="text-danger">*</span>
                                    </label>
                                    <input type="password" class="form-control pe-5" name="CONFIRM_PASSWORD" id="confirmPassword" >
                                    <i class="bi bi-eye toggle-password position-absolute bottom-0 end-0 translate-middle-y me-3" style="cursor: pointer;" toggle="#confirmPassword"></i>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <button type="button" class="btn btn-secondary w-100" id="btnGeneratePassword">{{ __('Generate Password') }}</button>
                                </div>
                            </div>
                        </div>

                        <!-- Columna 2 -->
                       <div class="col-md-4">
                            <div class="form-section">
                                <label class="form-label fw-bold mb-3">{{ __('User role') }} <span class="text-danger">*</span></label>

                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input role-switch" type="checkbox" id="superusuario">
                                    <label class="form-check-label" for="superusuario">{{ __('Superusuario') }}</label>
                                </div>

                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input role-switch" type="checkbox" id="admin">
                                    <label class="form-check-label" for="admin">{{ __('Administrador') }}</label>
                                </div>

                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input role-switch" type="checkbox" id="logistica">
                                    <label class="form-check-label" for="logistica">{{ __('Logística') }}</label>
                                </div>

                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input role-switch" type="checkbox" id="roleInstructor">
                                    <label class="form-check-label" for="roleInstructor">{{ __('Instructor') }}</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="usuariosbtnModal" type="button" class="btn btn-primary">{{ __('Save') }}</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){

const rolesPrincipales = ["superusuario", "admin", "logistica", "roleInstructor"];

    // Control exclusivo para roles principales
    $(".role-switch").on("change", function () {
        const idActual = $(this).attr("id");

        if ($(this).is(":checked")) {
            // Desactiva los demás
            rolesPrincipales.forEach(id => {
                if (id !== idActual) {
                    $("#" + id).prop("checked", false);
                }
            });
        }
    });

    const $instructorSelect = $('#instructorSelect');
    const $instructorSwitch = $('#instructorSwitch');
    const $instructorRoleSwitch = $('#roleInstructor');

    // Inicial: ocultar select
    $('#instructorSelectDiv').hide();

    // Limpiar campos
    function clearInstructorFields() {
        $('#FNAME_USER, #MDNAME_USER, #LSNAME_USER').val('').prop('readonly', false);
        $('#email').val('').prop('readonly', false);
        $instructorSwitch.prop('checked', false);
    }

    // Cambia switch Instructor
    $instructorSwitch.change(function(){
        if(this.checked){
            $('#instructorSelectDiv').show();
        } else {
            $('#instructorSelectDiv').hide();
            clearInstructorFields();
        }
    });

    // Cambia selección de instructor
    $instructorSelect.change(function(){
        const selectedId = $(this).val();
        if(selectedId != '0'){
            const instructor = @json($instructores).find(i => i.ID_CATALOGO_INSTRUCTOR == selectedId);
            if(instructor){
                $('#FNAME_USER').val(instructor.FNAME_INSTRUCTOR).prop('readonly', true);
                $('#MDNAME_USER').val(instructor.MDNAME_INSTRUCTOR).prop('readonly', true);
                $('#LSNAME_USER').val(instructor.LSNAME_INSTRUCTOR).prop('readonly', true);
                $('#email').val(instructor.MAIL_INSTRUCTOR || '').prop('readonly', true);
                $instructorSwitch.prop('checked', true);
                $instructorRoleSwitch.prop('checked', true);
                $('#instructorSelectDiv').show();

                Swal.fire({
                    icon: 'info',
                    title: '{{ __("Instructor selected") }}',
                    text: '{{ __("Fields are auto-filled. To modify, use the Instructor catalog.") }}',
                    confirmButtonText: 'OK'
                });
            }
        } else {
            clearInstructorFields();
        }
    });

    // Generar contraseña aleatoria
    $('#btnGeneratePassword').click(function(){
        const password = Math.random().toString(36).slice(-10);
        $('#password, #confirmPassword').val(password);
    });

    // Toggle ojito para mostrar/ocultar contraseña
    $('.toggle-password').click(function(){
        const input = $($(this).attr('toggle'));
        const icon = $(this);
        if(input.attr('type') === 'password'){
            input.attr('type', 'text');
            icon.removeClass('bi-eye').addClass('bi-eye-slash');
        } else {
            input.attr('type', 'password');
            icon.removeClass('bi-eye-slash').addClass('bi-eye');
        }
    });

});
</script>

@endsection
@php
$css_identifier = 'access';
@endphp