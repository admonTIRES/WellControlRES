ID_USER = 0



var usuariosDatatable = $("#usuarios-list-table").DataTable({
    language: { url: "https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json" },
    lengthChange: true,
    lengthMenu: [
        [10, 25, 50, -1],
        [10, 25, 50, 'Todos']
    ],
    info: false,
    paging: true,
    searching: true,
    filtering: true,
    scrollY: '65vh',
    scrollX: true,
    scrollCollapse: true,
    responsive: true,
    autoWidth: false,
    ajax: {
        dataType: 'json',
        data: {},
        method: 'GET',
        cache: false,
        url: '/usuariosDatatable',
        beforeSend: function () {
            // mostrarCarga();
        },
        complete: function () {
            usuariosDatatable.columns.adjust().draw();
            // ocultarCarga();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alertErrorAJAX(jqXHR, textStatus, errorThrown);
        },
        dataSrc: 'data'
    },
    order: [[0, 'asc']],
    columns: [
        {
            data: null,
            render: function (data, type, row, meta) {
                return meta.row + 1;
            }
        },
        { data: 'FNAME_USER' },
        { data: 'LSNAME_USER' },
        { data: 'ROLES_BADGET' },
        { data: 'BTN_EDITAR' },
        { data: 'BTN_ACTIVO' }
    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center' },
        { targets: 1, title: 'NOMBRE', className: 'text-center' },
        { targets: 2, title: 'APELLIDOS', className: 'text-center' },
        { targets: 3, title: 'ROLES', className: 'text-center' },
        { targets: 4, title: 'EDITAR', className: 'text-center' },
        { targets: 5, title: 'ACTIVO', className: 'text-center' }
    ]

});

$("#usuariosbtnModal").click(function (e) {
    e.preventDefault();
    formularioValido = validarFormulario($('#usuariosForm'))
    if (formularioValido) {
        
        const dataToSend = {
            api: 1,
            ID_USER: ID_USER
        };
        

        $('#usuariosForm').serializeArray().forEach(item => {
            dataToSend[item.name] = item.value;
        });

         const roles = {
            superusuario: $("#superusuario").is(":checked"),
            admin: $("#admin").is(":checked"),
            logistica: $("#logistica").is(":checked"),
            instructor: $("#roleInstructor").is(":checked")
        };

        // Añadir al objeto que se enviará
        dataToSend.ROLES_USER = JSON.stringify(roles);

        console.log("Datos a enviar:", dataToSend);
        if (ID_USER == 0) {
            alertMensajeConfirm({
                title: "¿Desea guardar la información?",
                text: "Se creará este proyecto",
                icon: "question",
            }, async function () {
                await loaderbtn('usuariosbtnModal')
                await ajaxAwaitFormData( dataToSend, 'usuarioSave', 'usuariosForm', 'usuariosbtnModal', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    ID_USER = data.usuario.ID_USER
                    alertMensaje('success', 'Información guardada correctamente', 'Esta información esta lista para usarse', null, null, 1500)
                    $('#usuariosModal').modal('hide')
                    document.getElementById('usuariosForm').reset();
                    usuariosDatatable.ajax.reload()
                })
            }, 1)

        } else {
            alertMensajeConfirm({
                title: "¿Desea editar la información de este formulario?",
                text: "Al guardarla, se podra usar",
                icon: "question",
            }, async function () {

                await loaderbtn('usuariosbtnModal')
                await ajaxAwaitFormData( dataToSend , 'usuarioSave', 'usuariosForm', 'usuariosbtnModal', { callbackAfter: true, callbackBefore: true }, () => {

                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })

                    $('.swal2-popup').addClass('ld ld-breath')


                }, function (data) {

                    setTimeout(() => {


                        ID_USER = data.usuario.ID_USER
                        alertMensaje('success', 'Información editada correctamente', 'Información guardada')
                        $('#usuariosModal').modal('hide')
                        document.getElementById('usuariosForm').reset();
                        usuariosDatatable.ajax.reload()
                    }, 300);
                })
            }, 1)
        }

    } else {
        alertToast('Por favor, complete todos los campos del formulario.', 'error', 2000)
    }
});

$('#usuarios-list-table tbody').on('click', 'td>button.EDITAR', function () {
    var tr = $(this).closest('tr');
    var row = usuariosDatatable.row(tr);
    ID_USER = row.data().ID_USER;
    editarDatoTabla(row.data(), 'usuariosForm', 'usuariosModal', 1);
    $('#usuariosModal .modal-title').html(row.data().FNAME_INSTRUCTOR);
});

$('#usuarios-list-table tbody').on('change', 'input.ACTIVAR', function () {
    var tr = $(this).closest('tr');
    var row = usuariosDatatable.row(tr);
    var estado = $(this).is(':checked') ? 1 : 0;
    var data = {
        api: 1,
        ACTIVAR: estado == 0 ? 1 : 0,
        ID_USER: row.data().ID_USER
    };

    eliminarDatoTabla(data, [usuariosDatatable], 'usuarioActive');
});


