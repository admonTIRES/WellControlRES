//VARIABLES
ID_CATALOGO_ENTE = 0
ID_CATALOGO_NIVELACREDITACION = 0
ID_CATALOGO_TIPOBOP = 0
ID_CATALOGO_TEMAPREGUNTA= 0
ID_CATALOGO_IDIOMAEXAMEN = 0
ID_CATALOGO_MEMBRESIA = 0




// RESET MODALS
$(document).ready(function() {
    // Modal de Entes Acreditadores
    $('#entesModal').on('hidden.bs.modal', function() {
        ID_CATALOGO_ENTE = 0;
        $('#entesForm')[0].reset();
        $('#entesModal .modal-title').text('Nuevo ente acreditador');
    });

    // Modal de Niveles de Acreditación
    $('#nivelModal').on('hidden.bs.modal', function() {
        ID_CATALOGO_NIVELACREDITACION = 0;
        $('#nivelForm')[0].reset();
        $('#nivelModal .modal-title').text('Nuevo nivel de acreditacion');
    });

    // Modal de Tipos de BOP
    $('#tipobopModal').on('hidden.bs.modal', function() {
        ID_CATALOGO_TIPOBOP = 0;
        $('#tipobopForm')[0].reset();
        $('#tipobopModal .modal-title').text('Nuevo tipo de BOP');
    });

    // Modal de Temas
    $('#temaModal').on('hidden.bs.modal', function() {
        ID_CATALOGO_TEMAPREGUNTA = 0;
        $('#temasForm')[0].reset();
        $('#temaModal .modal-title').text('Nuevo tema');
    });

    // Modal de Idiomas para Examen
    $('#idiomaModal').on('hidden.bs.modal', function() {
        ID_CATALOGO_IDIOMAEXAMEN = 0;
        $('#idiomaForm')[0].reset();
        $('#idiomaModal .modal-title').text('Nuevo idioma para examen');
    });

    // Modal de Membresías
    $('#membresiasModal').on('hidden.bs.modal', function() {
        ID_CATALOGO_MEMBRESIA = 0;
        $('#membresiasForm')[0].reset();
        $('#membresiasModal .modal-title').text('Nueva membresia');
    });
});

// Guardar catalogos
$("#entesbtnModal").click(function (e) {
    e.preventDefault();

    formularioValido = validarFormulario($('#entesForm'))

    if (formularioValido) {

    if (ID_CATALOGO_ENTE == 0) {
        
        alertMensajeConfirm({
            title: "¿Desea guardar la información?",
            text: "Al guardarla, se podra usar",
            icon: "question",
        },async function () { 

            await loaderbtn('entesbtnModal')
            await ajaxAwaitFormData({ api: 1, ID_CATALOGO_ENTE: ID_CATALOGO_ENTE }, 'asesorSave', 'entesForm', 'entesbtnModal', { callbackAfter: true, callbackBefore: true }, () => {
        
               

                Swal.fire({
                    icon: 'info',
                    title: 'Espere un momento',
                    text: 'Estamos guardando la información',
                    showConfirmButton: false
                })

                $('.swal2-popup').addClass('ld ld-breath')
        
                
            }, function (data) {
                    

                    ID_CATALOGO_ASESOR = data.asesor.ID_CATALOGO_ASESOR
                    alertMensaje('success','Información guardada correctamente', 'Esta información esta lista para usarse',null,null, 1500)
                     $('#miModal_ASESORES').modal('hide')
                    document.getElementById('formularioASESOR').reset();
                    Tablaasesores.ajax.reload()
            })
            
            
            
        }, 1)
        
    } else {
            alertMensajeConfirm({
            title: "¿Desea editar la información de este formulario?",
            text: "Al guardarla, se podra usar",
            icon: "question",
        },async function () { 

            await loaderbtn('guardarFormASESOR')
            await ajaxAwaitFormData({ api: 1, ID_CATALOGO_ASESOR: ID_CATALOGO_ASESOR }, 'asesorSave', 'formularioASESOR', 'guardarFormASESOR', { callbackAfter: true, callbackBefore: true }, () => {
        
                Swal.fire({
                    icon: 'info',
                    title: 'Espere un momento',
                    text: 'Estamos guardando la información',
                    showConfirmButton: false
                })

                $('.swal2-popup').addClass('ld ld-breath')
        
                
            }, function (data) {
                    
                setTimeout(() => {

                    
                    ID_CATALOGO_ASESOR = data.asesor.ID_CATALOGO_ASESOR
                    alertMensaje('success', 'Información editada correctamente', 'Información guardada')
                     $('#miModal_ASESORES').modal('hide')
                    document.getElementById('formularioASESOR').reset();
                    Tablaasesores.ajax.reload()


                }, 300);  
            })
        }, 1)
    }

} else {
    alertToast('Por favor, complete todos los campos del formulario.', 'error', 2000)

}
    
});
