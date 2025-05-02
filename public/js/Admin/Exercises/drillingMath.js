ID_MATH_EXERCISE = 0

$(document).ready(function () {
    // RESET MODALS
    $('#mathModal').on('hidden.bs.modal', function () {
        ID_MATH_EXERCISE = 0;
        $('#mathForm')[0].reset();
        $('#mathModal .modal-title').text('New Drilling Math exercise');
    });
    // RESET MODALS - END
});

// DATATABLES
var mathDatatable = $("#math-list-table").DataTable({
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
    scrollCollapse: true,
    responsive: true,
    ajax: {
        dataType: 'json',
        data: {},
        method: 'GET',
        cache: false,
        url: '/mathDatatable',
        beforeSend: function () {
            // mostrarCarga();
        },
        complete: function () {
            mathDatatable.columns.adjust().draw();
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
        { data: 'TIPO_MATH' },
        { data: 'TEMA_MATH' },
        { data: 'BTN_EDITAR' },
        { data: 'BTN_ACTIVO' }
    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center' },
        { targets: 1, title: 'Tipo', className: 'text-center' },
        { targets: 2, title: 'Tema', className: 'text-center' },
        { targets: 3, title: 'Editar', className: 'text-center' },
        { targets: 4, title: 'Activo', className: 'text-center' }
    ]

});

// Guardar catalogos
$("#mathbtnModal").click(function (e) {
    e.preventDefault();
    formularioValido = validarFormulario($('#mathForm'))
    if (formularioValido) {
        if (ID_MATH_EXERCISE == 0) {
            alertMensajeConfirm({
                title: "¿Desea guardar la información?",
                text: "El ente se agregará al catálogo",
                icon: "question",
            }, async function () {
                await loaderbtn('entesbtnModal')
                await ajaxAwaitFormData({ api: 1, ID_CATALOGO_ENTE: ID_CATALOGO_ENTE }, 'enteSave', 'entesForm', 'entesbtnModal', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    ID_CATALOGO_ENTE = data.ente.ID_CATALOGO_ENTE
                    alertMensaje('success', 'Información guardada correctamente', 'Esta información esta lista para usarse', null, null, 1500)
                    $('#entesModal').modal('hide')
                    document.getElementById('entesForm').reset();
                    entesDatatable.ajax.reload()
                })
            }, 1)

        } else {
            alertMensajeConfirm({
                title: "¿Desea editar la información de este formulario?",
                text: "Al guardarla, se podra usar",
                icon: "question",
            }, async function () {

                await loaderbtn('entesbtnModal')
                await ajaxAwaitFormData({ api: 1, ID_CATALOGO_ENTE: ID_CATALOGO_ENTE }, 'enteSave', 'entesForm', 'entesbtnModal', { callbackAfter: true, callbackBefore: true }, () => {

                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })

                    $('.swal2-popup').addClass('ld ld-breath')


                }, function (data) {

                    setTimeout(() => {


                        ID_CATALOGO_ENTE = data.ente.ID_CATALOGO_ENTE
                        alertMensaje('success', 'Información editada correctamente', 'Información guardada')
                        $('#entesModal').modal('hide')
                        document.getElementById('entesForm').reset();
                        entesDatatable.ajax.reload()
                    }, 300);
                })
            }, 1)
        }

    } else {
        alertToast('Por favor, complete todos los campos del formulario.', 'error', 2000)

    }

});