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
        { data: 'ROLES_USER' },
        { data: 'BTN_EDITAR' },
        { data: 'ACTIVO_USER' }
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
