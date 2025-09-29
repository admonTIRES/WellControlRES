//VARIABLES
ID_CATALOGO_ENTE = 0
ID_CATALOGO_NIVELACREDITACION = 0
ID_CATALOGO_TIPOBOP = 0
ID_CATALOGO_TEMAPREGUNTA = 0
ID_CATALOGO_SUBTEMA = 0
ID_CATALOGO_IDIOMAEXAMEN = 0
ID_CATALOGO_MEMBRESIA = 0
ID_CATALOGO_OPERACION = 0
ID_CATALOGO_INSTRUCTOR = 0
ID_CATALOGO_NPROYECTOS = 0


$(document).ready(function () {
    // RESET MODALS
    $('#entesModal').on('hidden.bs.modal', function () {
        ID_CATALOGO_ENTE = 0;
        $('#entesForm')[0].reset();
        $('#entesModal .modal-title').text('Nuevo ente acreditador');
    });

    $('#nivelModal').on('hidden.bs.modal', function () {
        ID_CATALOGO_NIVELACREDITACION = 0;
        $('#nivelForm')[0].reset();
        $('#nivelModal .modal-title').text('Nuevo nivel de acreditacion');
    });

    $('#tipobopModal').on('hidden.bs.modal', function () {
        ID_CATALOGO_TIPOBOP = 0;
        $('#tipobopForm')[0].reset();
        $('#tipobopModal .modal-title').text('Nuevo tipo de BOP');
    });

    $('#temaModal').on('hidden.bs.modal', function () {
        ID_CATALOGO_TEMAPREGUNTA = 0;
        $('#temasForm')[0].reset();
        $('#temaModal .modal-title').text('Nuevo tema');
    });

    $('#subtemaModal').on('hidden.bs.modal', function () {
        ID_CATALOGO_SUBTEMA = 0;
        $('#subtemasForm')[0].reset();
        $('#subtemaModal .modal-title').text('Nuevo subtema');
    });

    $('#idiomaModal').on('hidden.bs.modal', function () {
        ID_CATALOGO_IDIOMAEXAMEN = 0;
        $('#idiomaForm')[0].reset();
        $('#idiomaModal .modal-title').text('Nuevo idioma para examen');
    });

    $('#membresiasModal').on('hidden.bs.modal', function () {
        ID_CATALOGO_MEMBRESIA = 0;
        $('#membresiasForm')[0].reset();
        $('#membresiasModal .modal-title').text('Nueva membresia');
    });

    $('#operacionModal').on('hidden.bs.modal', function () {
        ID_CATALOGO_OPERACION = 0;
        $('#operacionForm')[0].reset();
        $('#operacionModal .modal-title').text('Nuevo tipo de operacion');
    });

    $('#instructoresModal').on('hidden.bs.modal', function () {
        ID_CATALOGO_INSTRUCTOR = 0;
        $('#instructoresForm')[0].reset();
        $('#instructoresModal .modal-title').text('Nuevo instructor');
    });

    $('#nombresModal').on('hidden.bs.modal', function () {
        ID_CATALOGO_NPROYECTOS = 0;
        $('#nombresForm')[0].reset();
        $('#nombresModal .modal-title').text('Nuevo nombre de proyecto');
    });
    // RESET MODALS - END

    //SELECTIZED
    var $select = $('#CERTIFICACION_TEMA').selectize({
        plugins: ['remove_button'],
        delimiter: ',',
        persist: false,
        maxItems: null,
        create: false,
        onInitialize: function () {
            // Desactiva la escritura del input interno
            this.$control_input.prop('readonly', true);
        }
    });
    var selectizeInstance = $select[0].selectize;

    var $select2 = $('#CERTIFICACION_SUBTEMA').selectize({
        plugins: ['remove_button'],
        delimiter: ',',
        persist: false,
        maxItems: null,
        create: false,
        onInitialize: function () {
            // Desactiva la escritura del input interno
            this.$control_input.prop('readonly', true);
        }
    });
    var selectizeInstance2 = $select2[0].selectize;

    var $select3 = $('#ACREDITACION_INSTRUCTOR').selectize({
        plugins: ['remove_button'],
        delimiter: ',',
        persist: false,
        maxItems: null,
        create: false,
        onInitialize: function () {
            // Desactiva la escritura del input interno
            this.$control_input.prop('readonly', true);
        }
    });
    var selectizeInstance3 = $select3[0].selectize; 

    var documentInstructor = document.getElementById('DOC_INSTRUCTOR');
    if (documentInstructor) {
        documentInstructor.addEventListener('change', function() {
            var archivo = this.files[0];
            var errorElement = document.getElementById('err-message');
            var quitarDoc = document.getElementById('quitar-doc');
            if (archivo && archivo.type === 'application/pdf') {
                if (errorElement) errorElement.style.display = 'none';
                if (quitarDoc) quitarDoc.style.display = 'block';
            } else {
                if (errorElement) errorElement.style.display = 'block';
                this.value = '';
                if (quitarDoc) quitarDoc.style.display = 'none';
            }
        });
    }

    var quitarDoc = document.getElementById('quitar-doc');
    if (quitarDoc) {
        quitarDoc.addEventListener('click', function() {
            var documentInstructor = document.getElementById('DOC_INSTRUCTOR');
            var errorElement = document.getElementById('err-message');
            if (documentInstructor) documentInstructor.value = '';
            if (errorElement) errorElement.style.display = 'none';
            this.style.display = 'none';
        });
    }
});


// DATATABLES
var entesDatatable = $("#entes-list-table").DataTable({
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
        url: '/entesDatatable',
        beforeSend: function () {
            // mostrarCarga();
        },
        complete: function () {
            entesDatatable.columns.adjust().draw();
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
        { data: 'NOMBRE_ENTE' },
        { data: 'DESCRIPCION_ENTE' },
        { data: 'BTN_EDITAR' },
        { data: 'BTN_ACTIVO' }
    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center' },
        { targets: 1, title: 'Ente', className: 'text-center' },
        { targets: 2, title: 'Descripción', className: 'text-center' },
        { targets: 3, title: 'Editar', className: 'text-center' },
        { targets: 4, title: 'Activo', className: 'text-center' }
    ]

});
var nivelesDatatable = $("#nivelacreditacion-list-table").DataTable({
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
        url: '/nivelesDatatable',
        beforeSend: function () {
            // mostrarCarga();
        },
        complete: function () {
            nivelesDatatable.columns.adjust().draw();
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
        { data: 'NOMBRE_NIVEL' },
        { data: 'DESCRIPCION_NIVEL' },
        { data: 'BTN_EDITAR' },
        { data: 'BTN_ACTIVO' }
    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center' },
        { targets: 1, title: 'Nivel', className: 'text-center' },
        { targets: 2, title: 'Descripción', className: 'text-center' },
        { targets: 3, title: 'Editar', className: 'text-center' },
        { targets: 4, title: 'Activo', className: 'text-center' }
    ]

});
var tiposbopDatatable = $("#tiposbop-list-table").DataTable({
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
        url: '/tiposbopDatatable',
        beforeSend: function () {
            // mostrarCarga();
        },
        complete: function () {
            tiposbopDatatable.columns.adjust().draw();
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
        { data: 'ABREVIATURA' },
        { data: 'DESCRIPCION_TIPOBOP' },
        { data: 'BTN_EDITAR' },
        { data: 'BTN_ACTIVO' }
    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center' },
        { targets: 1, title: 'Abreviatura', className: 'text-center' },
        { targets: 2, title: 'Descripción', className: 'text-center' },
        { targets: 3, title: 'Editar', className: 'text-center' },
        { targets: 4, title: 'Activo', className: 'text-center' }
    ]

});
var temasDatatable = $("#temas-list-table").DataTable({
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
        url: '/temasDatatable',
        beforeSend: function () {
            // mostrarCarga();
        },
        complete: function () {
            temasDatatable.columns.adjust().draw();
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
        { data: 'NOMBRE_TEMA' },
        { data: 'CERTIFICACIONES_NOMBRES' },
        { data: 'BTN_EDITAR' },
        { data: 'BTN_ACTIVO' }
    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center' },
        { targets: 1, title: 'Tema', className: 'text-center' },
        { targets: 2, title: 'Certificación', className: 'text-center' },
        { targets: 3, title: 'Editar', className: 'text-center' },
        { targets: 4, title: 'Activo', className: 'text-center' }
    ]

});
var subtemasDatatable = $("#subtemas-list-table").DataTable({
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
        url: '/subtemasDatatable',
        beforeSend: function () {
            // mostrarCarga();
        },
        complete: function () {
            subtemasDatatable.columns.adjust().draw();
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
        { data: 'NOMBRE_SUBTEMA' },
        { data: 'CERTIFICACIONES_NOMBRES' },
        { data: 'BTN_EDITAR' },
        { data: 'BTN_ACTIVO' }
    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center' },
        { targets: 1, title: 'Subtema', className: 'text-center' },
        { targets: 2, title: 'Certificación', className: 'text-center' },
        { targets: 3, title: 'Editar', className: 'text-center' },
        { targets: 4, title: 'Activo', className: 'text-center' }
    ]

});
var idiomasDatatable = $("#idiomas-list-table").DataTable({
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
        url: '/idiomasDatatable',
        beforeSend: function () {
            // mostrarCarga();
        },
        complete: function () {
            idiomasDatatable.columns.adjust().draw();
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
        { data: 'NOMBRE_IDIOMA' },
        { data: 'DESCRIPCION_IDIOMAS' },
        { data: 'BTN_EDITAR' },
        { data: 'BTN_ACTIVO' }
    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center' },
        { targets: 1, title: 'Idioma', className: 'text-center' },
        { targets: 2, title: 'Descripción', className: 'text-center' },
        { targets: 3, title: 'Editar', className: 'text-center' },
        { targets: 4, title: 'Activo', className: 'text-center' }
    ]

});
var membresiasDatatable = $("#membresias-list-table").DataTable({
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
        url: '/membresiasDatatable',
        beforeSend: function () {
            // mostrarCarga();
        },
        complete: function () {
            membresiasDatatable.columns.adjust().draw();
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
        { data: 'NOMBRE_MEMBRESIA' },
        { data: 'DESCRIPCION_MEMBRESIA' },
        { data: 'BTN_EDITAR' },
        { data: 'BTN_ACTIVO' }
    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center' },
        { targets: 1, title: 'Nombre', className: 'text-center' },
        { targets: 2, title: 'Descripción', className: 'text-center' },
        { targets: 3, title: 'Editar', className: 'text-center' },
        { targets: 4, title: 'Activo', className: 'text-center' }
    ]
});
var operacionDatatable = $("#operacion-list-table").DataTable({
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
        url: '/operacionDatatable',
        beforeSend: function () {
            // mostrarCarga();
        },
        complete: function () {
            operacionDatatable.columns.adjust().draw();
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
        { data: 'NOMBRE_OPERACION' },
        { data: 'BTN_EDITAR' },
        { data: 'BTN_ACTIVO' }
    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center' },
        { targets: 1, title: 'Tipo de operacion', className: 'text-center' },
        { targets: 2, title: 'Editar', className: 'text-center' },
        { targets: 3, title: 'Activo', className: 'text-center' }
    ]
});
var instructoresDatatable = $("#instructores-list-table").DataTable({
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
        url: '/instructoresDatatable',
        beforeSend: function () {
            // mostrarCarga();
        },
        complete: function () {
            instructoresDatatable.columns.adjust().draw();
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
        { data: 'NOMBRE_INSTRUCTOR' },
        { data: 'CERTIFICACIONES_INSTRUCTOR' },
        { data: 'VIGENCIA' },
        { data: 'BTN_ACCESO' },
        { data: 'BTN_EDITAR' },
        { data: 'BTN_ACTIVO' }
    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center' },
        { targets: 1, title: 'Instructor', className: 'text-center' },
        { targets: 2, title: 'Tipo de acreditación', className: 'text-center' },
        { targets: 3, title: 'Vigencia', className: 'text-center' },
        { targets: 4, title: 'Acceso', className: 'text-center' },
        { targets: 5, title: 'Editar', className: 'text-center' },
        { targets: 6, title: 'Activo', className: 'text-center' }
    ]
});
var nombresDatatable = $("#nombres-list-table").DataTable({
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
        url: '/nombresDatatable',
        beforeSend: function () {
            // mostrarCarga();
        },
        complete: function () {
            nombresDatatable.columns.adjust().draw();
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
        { data: 'NOMBRE_PROYECTO' },
        { data: 'BTN_EDITAR' },
        { data: 'BTN_ACTIVO' }
    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center' },
        { targets: 1, title: 'Nombre de proyecto', className: 'text-center' },
        { targets: 2, title: 'Editar', className: 'text-center' },
        { targets: 3, title: 'Activo', className: 'text-center' }
    ]
});

//REDIBUJAR LAS TABLAS
$('a[data-bs-toggle="pill"]').on('shown.bs.tab', function (e) {
    const target = $(e.target).attr("data-bs-target");

    if (target === "#v-pills-nivel") {
        nivelesDatatable.columns.adjust().draw();
    } else if (target === "#v-pills-bop") {
        bopDatatable.columns.adjust().draw();
    } else if (target === "#v-pills-temas") {
        temasDatatable.columns.adjust().draw();
    } else if (target === "#v-pills-subtemas") {
        subtemasDatatable.columns.adjust().draw();
    } else if (target === "#v-pills-idiomas") {
        idiomasDatatable.columns.adjust().draw();
    } else if (target === "#v-pills-membresias") {
        membresiasDatatable.columns.adjust().draw();
    } else if (target === "#v-pills-operacion") {
        operacionDatatable.columns.adjust().draw();
    }else if (target === "#v-pills-instructores") {
        instructoresDatatable.columns.adjust().draw();
    }else if (target === "#v-pills-nombres") {
        nombresDatatable.columns.adjust().draw();
    }
});
document.querySelectorAll('#v-pills-tab .nav-link').forEach(pill => {
    pill.addEventListener('shown.bs.tab', function () {
        setTimeout(() => {
            $('table.dataTable').each(function () {
                const table = $(this).DataTable();
                if ($.fn.dataTable.isDataTable(this)) {
                    table.columns.adjust().draw(false);
                    if (table.fixedHeader) {
                        table.fixedHeader.adjust();
                    }
                }
            });
        }, 200); // Aumenta el delay para asegurar que el contenido se muestra por completo
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

$("#nivelbtnModal").click(function (e) {
    e.preventDefault();
    formularioValido = validarFormulario($('#nivelForm'))
    if (formularioValido) {
        if (ID_CATALOGO_NIVELACREDITACION == 0) {
            alertMensajeConfirm({
                title: "¿Desea guardar la información?",
                text: "El nivel se agregará al catálogo",
                icon: "question",
            }, async function () {
                await loaderbtn('nivelbtnModal')
                await ajaxAwaitFormData({ api: 2, ID_CATALOGO_NIVELACREDITACION }, 'nivelSave', 'nivelForm', 'nivelbtnModal', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    ID_CATALOGO_NIVELACREDITACION = data.nivel.ID_CATALOGO_NIVELACREDITACION
                    alertMensaje('success', 'Información guardada correctamente', 'Esta información está lista para usarse')
                    $('#nivelModal').modal('hide')
                    document.getElementById('nivelForm').reset()
                    nivelesDatatable.ajax.reload()
                })
            }, 1)
        } else {
            alertMensajeConfirm({
                title: "¿Desea editar la información de este formulario?",
                text: "Al guardarla, se podrá usar",
                icon: "question",
            }, async function () {
                await loaderbtn('nivelbtnModal')
                await ajaxAwaitFormData({ api: 2, ID_CATALOGO_NIVELACREDITACION }, 'nivelSave', 'nivelForm', 'nivelbtnModal', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    setTimeout(() => {
                        ID_CATALOGO_NIVELACREDITACION = data.nivel.ID_CATALOGO_NIVELACREDITACION
                        alertMensaje('success', 'Información editada correctamente', 'Información guardada')
                        $('#nivelModal').modal('hide')
                        document.getElementById('nivelForm').reset()
                        nivelesDatatable.ajax.reload()
                    }, 300)
                })
            }, 1)
        }
    } else {
        alertToast('Por favor, complete todos los campos del formulario.', 'error', 2000)
    }
})

$("#tipobopbtnModal").click(function (e) {
    e.preventDefault();
    formularioValido = validarFormulario($('#tipobopForm'))
    if (formularioValido) {
        if (ID_CATALOGO_TIPOBOP == 0) {
            alertMensajeConfirm({
                title: "¿Desea guardar la información?",
                text: "El tipo de BOP se agregará al catálogo",
                icon: "question",
            }, async function () {
                await loaderbtn('tipobopbtnModal')
                await ajaxAwaitFormData({ api: 3, ID_CATALOGO_TIPOBOP }, 'tipobopSave', 'tipobopForm', 'tipobopbtnModal', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    ID_CATALOGO_TIPOBOP = data.tipobop.ID_CATALOGO_TIPOBOP
                    alertMensaje('success', 'Información guardada correctamente', 'Lista para usarse')
                    $('#tipobopModal').modal('hide')
                    document.getElementById('tipobopForm').reset()
                    tiposbopDatatable.ajax.reload()
                })
            }, 1)
        } else {
            alertMensajeConfirm({
                title: "¿Desea editar la información de este formulario?",
                text: "Al guardarla, se podrá usar",
                icon: "question",
            }, async function () {
                await loaderbtn('tipobopbtnModal')
                await ajaxAwaitFormData({ api: 3, ID_CATALOGO_TIPOBOP }, 'tipobopSave', 'tipobopForm', 'tipobopbtnModal', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    setTimeout(() => {
                        ID_CATALOGO_TIPOBOP = data.tipobop.ID_CATALOGO_TIPOBOP
                        alertMensaje('success', 'Información editada correctamente', 'Información guardada')
                        $('#tipobopModal').modal('hide')
                        document.getElementById('tipobopForm').reset()
                        tiposbopDatatable.ajax.reload()
                    }, 300)
                })
            }, 1)
        }
    } else {
        alertToast('Por favor, complete todos los campos del formulario.', 'error', 2000)
    }
})

$("#temabtnModal").click(function (e) {
    e.preventDefault();
    formularioValido = validarFormulario($('#temasForm'))
    if (formularioValido) {
        if (ID_CATALOGO_TEMAPREGUNTA == 0) {
            alertMensajeConfirm({
                title: "¿Desea guardar la información?",
                text: "El tema de pregunta se agregará al catálogo",
                icon: "question",
            }, async function () {
                await loaderbtn('temabtnModal')
                await ajaxAwaitFormData({ api: 4, ID_CATALOGO_TEMAPREGUNTA }, 'temaSave', 'temasForm', 'temabtnModal', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    ID_CATALOGO_TEMAPREGUNTA = data.tema.ID_CATALOGO_TEMAPREGUNTA
                    alertMensaje('success', 'Información guardada correctamente', 'Lista para usarse')
                    $('#temaModal').modal('hide')
                    document.getElementById('temasForm').reset()
                    temasDatatable.ajax.reload()
                })
            }, 1)
        } else {
            alertMensajeConfirm({
                title: "¿Desea editar la información de este formulario?",
                text: "Al guardarla, se podrá usar",
                icon: "question",
            }, async function () {
                await loaderbtn('temabtnModal')
                await ajaxAwaitFormData({ api: 4, ID_CATALOGO_TEMAPREGUNTA }, 'temaSave', 'temasForm', 'temabtnModal', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    setTimeout(() => {
                        ID_CATALOGO_TEMAPREGUNTA = data.tema.ID_CATALOGO_TEMAPREGUNTA
                        alertMensaje('success', 'Información editada correctamente', 'Información guardada')
                        $('#temaModal').modal('hide')
                        document.getElementById('temasForm').reset()
                        temasDatatable.ajax.reload()
                    }, 300)
                })
            }, 1)
        }
    } else {
        alertToast('Por favor, complete todos los campos del formulario.', 'error', 2000)
    }
})

$("#subtemabtnModal").click(function (e) {
    e.preventDefault();
    formularioValido = validarFormulario($('#subtemasForm'))
    if (formularioValido) {
        if (ID_CATALOGO_SUBTEMA == 0) {
            alertMensajeConfirm({
                title: "¿Desea guardar la información?",
                text: "El tema de pregunta se agregará al catálogo",
                icon: "question",
            }, async function () {
                await loaderbtn('subtemabtnModal')
                await ajaxAwaitFormData({ api: 7, ID_CATALOGO_SUBTEMA }, 'subtemaSave', 'subtemasForm', 'subtemabtnModal', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    ID_CATALOGO_SUBTEMA = data.subtema.ID_CATALOGO_SUBTEMA
                    alertMensaje('success', 'Información guardada correctamente', 'Lista para usarse')
                    $('#subtemaModal').modal('hide')
                    document.getElementById('subtemasForm').reset()
                    subtemasDatatable.ajax.reload()
                })
            }, 1)
        } else {
            alertMensajeConfirm({
                title: "¿Desea editar la información de este formulario?",
                text: "Al guardarla, se podrá usar",
                icon: "question",
            }, async function () {
                await loaderbtn('subtemabtnModal')
                await ajaxAwaitFormData({ api: 7, ID_CATALOGO_SUBTEMA }, 'subtemaSave', 'subtemasForm', 'subtemabtnModal', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    setTimeout(() => {
                        ID_CATALOGO_SUBTEMA = data.subtema.ID_CATALOGO_SUBTEMA
                        alertMensaje('success', 'Información editada correctamente', 'Información guardada')
                        $('#subtemaModal').modal('hide')
                        document.getElementById('subtemasForm').reset()
                        subtemasDatatable.ajax.reload()
                    }, 300)
                })
            }, 1)
        }
    } else {
        alertToast('Por favor, complete todos los campos del formulario.', 'error', 2000)
    }
})

$("#idiomabtnModal").click(function (e) {
    e.preventDefault();
    formularioValido = validarFormulario($('#idiomaForm'))
    if (formularioValido) {
        if (ID_CATALOGO_IDIOMAEXAMEN == 0) {
            alertMensajeConfirm({
                title: "¿Desea guardar la información?",
                text: "El idioma del examen se agregará al catálogo",
                icon: "question",
            }, async function () {
                await loaderbtn('idiomabtnModal')
                await ajaxAwaitFormData({ api: 5, ID_CATALOGO_IDIOMAEXAMEN }, 'idiomaSave', 'idiomaForm', 'idiomabtnModal', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    ID_CATALOGO_IDIOMAEXAMEN = data.idioma.ID_CATALOGO_IDIOMAEXAMEN
                    alertMensaje('success', 'Información guardada correctamente', 'Lista para usarse')
                    $('#idiomasModal').modal('hide')
                    document.getElementById('idiomaForm').reset()
                    idiomasDatatable.ajax.reload()
                })
            }, 1)
        } else {
            alertMensajeConfirm({
                title: "¿Desea editar la información de este formulario?",
                text: "Al guardarla, se podrá usar",
                icon: "question",
            }, async function () {
                await loaderbtn('idiomabtnModal')
                await ajaxAwaitFormData({ api: 5, ID_CATALOGO_IDIOMAEXAMEN }, 'idiomaSave', 'idiomaForm', 'idiomabtnModal', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    setTimeout(() => {
                        ID_CATALOGO_IDIOMAEXAMEN = data.idioma.ID_CATALOGO_IDIOMAEXAMEN
                        alertMensaje('success', 'Información editada correctamente', 'Información guardada')
                        $('#idiomasModal').modal('hide')
                        document.getElementById('idiomaForm').reset()
                        idiomasDatatable.ajax.reload()
                    }, 300)
                })
            }, 1)
        }
    } else {
        alertToast('Por favor, complete todos los campos del formulario.', 'error', 2000)
    }
})

$("#membresiasbtnModal").click(function (e) {
    e.preventDefault();
    formularioValido = validarFormulario($('#membresiasForm'))
    if (formularioValido) {
        if (ID_CATALOGO_MEMBRESIA == 0) {
            alertMensajeConfirm({
                title: "¿Desea guardar la información?",
                text: "La membresía se agregará al catálogo",
                icon: "question",
            }, async function () {
                await loaderbtn('membresiasbtnModal')
                await ajaxAwaitFormData({ api: 6, ID_CATALOGO_MEMBRESIA }, 'membresiaSave', 'membresiasForm', 'membresiasbtnModal', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    ID_CATALOGO_MEMBRESIA = data.membresia.ID_CATALOGO_MEMBRESIA
                    alertMensaje('success', 'Información guardada correctamente', 'Lista para usarse')
                    $('#membresiasModal').modal('hide')
                    document.getElementById('membresiasForm').reset()
                    membresiasDatatable.ajax.reload()
                })
            }, 1)
        } else {
            alertMensajeConfirm({
                title: "¿Desea editar la información de este formulario?",
                text: "Al guardarla, se podrá usar",
                icon: "question",
            }, async function () {
                await loaderbtn('membresiasbtnModal')
                await ajaxAwaitFormData({ api: 6, ID_CATALOGO_MEMBRESIA }, 'membresiaSave', 'membresiasForm', 'membresiasbtnModal', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    setTimeout(() => {
                        ID_CATALOGO_MEMBRESIA = data.membresia.ID_CATALOGO_MEMBRESIA
                        alertMensaje('success', 'Información editada correctamente', 'Información guardada')
                        $('#membresiasModal').modal('hide')
                        document.getElementById('membresiasForm').reset()
                        membresiasDatatable.ajax.reload()
                    }, 300)
                })
            }, 1)
        }
    } else {
        alertToast('Por favor, complete todos los campos del formulario.', 'error', 2000)
    }
})

$("#operacionbtnModal").click(function (e) {
    e.preventDefault();
    formularioValido = validarFormulario($('#operacionForm'))
    if (formularioValido) {
        if (ID_CATALOGO_OPERACION == 0) {
            alertMensajeConfirm({
                title: "¿Desea guardar la información?",
                text: "La membresía se agregará al catálogo",
                icon: "question",
            }, async function () {
                await loaderbtn('operacionbtnModal')
                await ajaxAwaitFormData({ api: 8, ID_CATALOGO_OPERACION }, 'operacionSave', 'operacionForm', 'operacionbtnModal', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    ID_CATALOGO_OPERACION = data.operacion.ID_CATALOGO_OPERACION
                    alertMensaje('success', 'Información guardada correctamente', 'Lista para usarse')
                    $('#operacionModal').modal('hide')
                    document.getElementById('operacionForm').reset()
                    operacionDatatable.ajax.reload()
                })
            }, 1)
        } else {
            alertMensajeConfirm({
                title: "¿Desea editar la información de este formulario?",
                text: "Al guardarla, se podrá usar",
                icon: "question",
            }, async function () {
                await loaderbtn('operacionbtnModal')
                await ajaxAwaitFormData({ api: 8, ID_CATALOGO_OPERACION }, 'operacionSave', 'operacionForm', 'operacionbtnModal', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    setTimeout(() => {
                        ID_CATALOGO_OPERACION = data.operacion.ID_CATALOGO_OPERACION
                        alertMensaje('success', 'Información editada correctamente', 'Información guardada')
                        $('#operacionModal').modal('hide')
                        document.getElementById('operacionForm').reset()
                        operacionDatatable.ajax.reload()
                    }, 300)
                })
            }, 1)
        }
    } else {
        alertToast('Por favor, complete todos los campos del formulario.', 'error', 2000)
    }
})

$("#instructoresbtnModal").click(function (e) {
    e.preventDefault();
    formularioValido = validarFormulario($('#instructoresForm'))
    if (formularioValido) {
        if (ID_CATALOGO_INSTRUCTOR == 0) {
            alertMensajeConfirm({
                title: "¿Desea guardar la información?",
                text: "El instructor se agregará al catálogo",
                icon: "question",
            }, async function () {
                await loaderbtn('instructoresbtnModal')
                await ajaxAwaitFormData({ api: 9, ID_CATALOGO_INSTRUCTOR }, 'instructorSave', 'instructoresForm', 'instructoresbtnModal', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    ID_CATALOGO_INSTRUCTOR = data.instructor.ID_CATALOGO_INSTRUCTOR
                    alertMensaje('success', 'Información guardada correctamente', 'Lista para usarse')
                    $('#instructoresModal').modal('hide')
                    document.getElementById('instructoresForm').reset()
                    instructoresDatatable.ajax.reload()
                })
            }, 1)
        } else {
            alertMensajeConfirm({
                title: "¿Desea editar la información de este formulario?",
                text: "Al guardarla, se podrá usar",
                icon: "question",
            }, async function () {
                await loaderbtn('instructoresbtnModal')
                await ajaxAwaitFormData({ api: 9, ID_CATALOGO_INSTRUCTOR }, 'instructorSave', 'instructoresForm', 'instructoresbtnModal', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    setTimeout(() => {
                        ID_CATALOGO_INSTRUCTOR = data.instructor.ID_CATALOGO_INSTRUCTOR
                        alertMensaje('success', 'Información editada correctamente', 'Información guardada')
                        $('#instructoresModal').modal('hide')
                        document.getElementById('instructoresForm').reset()
                        instructoresDatatable.ajax.reload()
                    }, 300)
                })
            }, 1)
        }
    } else {
        alertToast('Por favor, complete todos los campos del formulario.', 'error', 2000)
    }
})

$("#nombresbtnModal").click(function (e) {
    e.preventDefault();
    formularioValido = validarFormulario($('#nombresForm'))
    if (formularioValido) {
        if (ID_CATALOGO_NPROYECTOS == 0) {
            alertMensajeConfirm({
                title: "¿Desea guardar la información?",
                text: "El nombre se agregará al catálogo",
                icon: "question",
            }, async function () {
                await loaderbtn('nombresbtnModal')
                await ajaxAwaitFormData({ api: 10, ID_CATALOGO_NPROYECTOS }, 'nombresProyectosSave', 'nombresForm', 'nombresbtnModal', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    ID_CATALOGO_NPROYECTOS = data.nombres.ID_CATALOGO_NPROYECTOS
                    alertMensaje('success', 'Información guardada correctamente', 'Lista para usarse')
                    $('#nombresModal').modal('hide')
                    document.getElementById('nombresForm').reset()
                    nombresDatatable.ajax.reload()
                })
            }, 1)
        } else {
            alertMensajeConfirm({
                title: "¿Desea editar la información de este formulario?",
                text: "Al guardarla, se podrá usar",
                icon: "question",
            }, async function () {
                await loaderbtn('nombresbtnModal')
                await ajaxAwaitFormData({ api: 10, ID_CATALOGO_NPROYECTOS }, 'nombresProyectosSave', 'nombresForm', 'nombresbtnModal', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    setTimeout(() => {
                        ID_CATALOGO_NPROYECTOS = data.nombres.ID_CATALOGO_NPROYECTOS
                        alertMensaje('success', 'Información editada correctamente', 'Información guardada')
                        $('#nombresModal').modal('hide')
                        document.getElementById('nombresForm').reset()
                        nombresDatatable.ajax.reload()
                    }, 300)
                })
            }, 1)
        }
    } else {
        alertToast('Por favor, complete todos los campos del formulario.', 'error', 2000)
    }
})



// activar - desactivar 
$('#entes-list-table tbody').on('change', 'input.ACTIVAR', function () {
    var tr = $(this).closest('tr');
    var row = entesDatatable.row(tr);
    var estado = $(this).is(':checked') ? 1 : 0;

    var data = {
        api: 1,
        ACTIVAR: estado == 0 ? 1 : 0,
        ID_CATALOGO_ENTE: row.data().ID_CATALOGO_ENTE
    };

    eliminarDatoTabla(data, [entesDatatable], 'enteActive');
});

$('#nivelacreditacion-list-table tbody').on('change', 'input.ACTIVAR', function () {
    var tr = $(this).closest('tr');
    var row = nivelesDatatable.row(tr);
    var estado = $(this).is(':checked') ? 1 : 0;

    var data = {
        api: 2,
        ACTIVAR: estado == 0 ? 1 : 0,
        ID_CATALOGO_NIVELACREDITACION: row.data().ID_CATALOGO_NIVELACREDITACION
    };

    eliminarDatoTabla(data, [nivelesDatatable], 'nivelActive');
});

$('#tiposbop-list-table tbody').on('change', 'input.ACTIVAR', function () {
    var tr = $(this).closest('tr');
    var row = tiposbopDatatable.row(tr);
    var estado = $(this).is(':checked') ? 1 : 0;

    var data = {
        api: 3,
        ACTIVAR: estado == 0 ? 1 : 0,
        ID_CATALOGO_TIPOBOP: row.data().ID_CATALOGO_TIPOBOP
    };

    eliminarDatoTabla(data, [tiposbopDatatable], 'tipobopActive');
});

$('#temas-list-table tbody').on('change', 'input.ACTIVAR', function () {
    var tr = $(this).closest('tr');
    var row = temasDatatable.row(tr);
    var estado = $(this).is(':checked') ? 1 : 0;

    var data = {
        api: 4,
        ACTIVAR: estado == 0 ? 1 : 0,
        ID_CATALOGO_TEMAPREGUNTA: row.data().ID_CATALOGO_TEMAPREGUNTA
    };

    eliminarDatoTabla(data, [temasDatatable], 'temaActive');
});

$('#subtemas-list-table tbody').on('change', 'input.ACTIVAR', function () {
    var tr = $(this).closest('tr');
    var row = subtemasDatatable.row(tr);
    var estado = $(this).is(':checked') ? 1 : 0;

    var data = {
        api: 7,
        ACTIVAR: estado == 0 ? 1 : 0,
        ID_CATALOGO_SUBTEMA: row.data().ID_CATALOGO_SUBTEMA
    };

    eliminarDatoTabla(data, [subtemasDatatable], 'subtemaActive');
});

$('#idiomas-list-table tbody').on('change', 'input.ACTIVAR', function () {
    var tr = $(this).closest('tr');
    var row = idiomasDatatable.row(tr);
    var estado = $(this).is(':checked') ? 1 : 0;

    var data = {
        api: 5,
        ACTIVAR: estado == 0 ? 1 : 0,
        ID_CATALOGO_IDIOMAEXAMEN: row.data().ID_CATALOGO_IDIOMAEXAMEN
    };

    eliminarDatoTabla(data, [idiomasDatatable], 'idiomaActive');
});

$('#membresias-list-table tbody').on('change', 'input.ACTIVAR', function () {
    var tr = $(this).closest('tr');
    var row = membresiasDatatable.row(tr);
    var estado = $(this).is(':checked') ? 1 : 0;

    var data = {
        api: 6,
        ACTIVAR: estado == 0 ? 1 : 0,
        ID_CATALOGO_MEMBRESIA: row.data().ID_CATALOGO_MEMBRESIA
    };

    eliminarDatoTabla(data, [membresiasDatatable], 'membresiaActive');
});

$('#operacion-list-table tbody').on('change', 'input.ACTIVAR', function () {
    var tr = $(this).closest('tr');
    var row = operacionDatatable.row(tr);
    var estado = $(this).is(':checked') ? 1 : 0;

    var data = {
        api: 8,
        ACTIVAR: estado == 0 ? 1 : 0,
        ID_CATALOGO_OPERACION: row.data().ID_CATALOGO_OPERACION
    };

    eliminarDatoTabla(data, [operacionDatatable], 'operacionActive');
});

$('#nombres-list-table tbody').on('change', 'input.ACTIVAR', function () {
    var tr = $(this).closest('tr');
    var row = nombresDatatable.row(tr);
    var estado = $(this).is(':checked') ? 1 : 0;

    var data = {
        api: 10,
        ACTIVAR: estado == 0 ? 1 : 0,
        ID_CATALOGO_NPROYECTOS: row.data().ID_CATALOGO_NPROYECTOS
    };

    eliminarDatoTabla(data, [nombresDatatable], 'nombresProyectosActive');
});

$('#instructores-list-table tbody').on('change', 'input.ACTIVAR', function () {
    var tr = $(this).closest('tr');
    var row = instructoresDatatable.row(tr);
    var estado = $(this).is(':checked') ? 1 : 0;

    var data = {
        api: 9,
        ACTIVAR: estado == 0 ? 1 : 0,
        ID_CATALOGO_INSTRUCTOR: row.data().ID_CATALOGO_INSTRUCTOR
    };

    eliminarDatoTabla(data, [instructoresDatatable], 'instructorActive');
});


// editar
$('#entes-list-table tbody').on('click', 'td>button.EDITAR', function () {
    var tr = $(this).closest('tr');
    var row = entesDatatable.row(tr);
    ID_CATALOGO_ENTE = row.data().ID_CATALOGO_ENTE;
    console.log("entro aqui");
    editarDatoTabla(row.data(), 'entesForm', 'entesModal', 1);

    $('#entesModal .modal-title').html(row.data().NOMBRE_ENTE);

});

$('#nivelacreditacion-list-table tbody').on('click', 'td>button.EDITAR', function () {
    var tr = $(this).closest('tr');
    var row = nivelesDatatable.row(tr);
    ID_CATALOGO_NIVELACREDITACION = row.data().ID_CATALOGO_NIVELACREDITACION;
    editarDatoTabla(row.data(), 'nivelForm', 'nivelModal', 1);
    $('#nivelModal .modal-title').html(row.data().NOMBRE_NIVEL);
});

$('#tiposbop-list-table tbody').on('click', 'td>button.EDITAR', function () {
    var tr = $(this).closest('tr');
    var row = tiposbopDatatable.row(tr);
    ID_CATALOGO_TIPOBOP = row.data().ID_CATALOGO_TIPOBOP;

    editarDatoTabla(row.data(), 'tipobopForm', 'tipobopModal', 1);

    $('#tipobopModal .modal-title').html(row.data().ABREVIATURA);

});

$('#temas-list-table tbody').on('click', 'td>button.EDITAR', function () {
    var tr = $(this).closest('tr');
    var row = temasDatatable.row(tr);
    ID_CATALOGO_TEMAPREGUNTA = row.data().ID_CATALOGO_TEMAPREGUNTA;

    editarDatoTabla(row.data(), 'temasForm', 'temaModal', 1);
    var certificaciones = row.data().CERTIFICACION_TEMA; //ARRAY CON LOS IDS
    var $select = $('#CERTIFICACION_TEMA');
    if (!$select[0].selectize) {
        $select.selectize({
            plugins: ['remove_button'],
            delimiter: ',',
            persist: false,
            create: false
        });
    }
    var selectize = $select[0].selectize;
    selectize.clear();

    if (certificaciones && certificaciones.length > 0) {
        var idsCertificaciones = Array.isArray(certificaciones) ? certificaciones : [certificaciones];

        selectize.setValue(idsCertificaciones);
    }
    $('#temaModal .modal-title').html(row.data().NOMBRE_TEMA);

});

$('#subtemas-list-table tbody').on('click', 'td>button.EDITAR', function () {
    var tr = $(this).closest('tr');
    var row = subtemasDatatable.row(tr);
    ID_CATALOGO_SUBTEMA = row.data().ID_CATALOGO_SUBTEMA;

    editarDatoTabla(row.data(), 'subtemasForm', 'subtemaModal', 1);
    var certificaciones = row.data().CERTIFICACION_SUBTEMA; //ARRAY CON LOS IDS
    var $select = $('#CERTIFICACION_SUBTEMA');
    if (!$select[0].selectize) {
        $select.selectize({
            plugins: ['remove_button'],
            delimiter: ',',
            persist: false,
            create: false
        });
    }
    var selectize = $select[0].selectize;
    selectize.clear();

    if (certificaciones && certificaciones.length > 0) {
        var idsCertificaciones = Array.isArray(certificaciones) ? certificaciones : [certificaciones];

        selectize.setValue(idsCertificaciones);
    }
    $('#subtemaModal .modal-title').html(row.data().NOMBRE_SUBTEMA);

});

$('#idiomas-list-table tbody').on('click', 'td>button.EDITAR', function () {
    var tr = $(this).closest('tr');
    var row = idiomasDatatable.row(tr);
    ID_CATALOGO_IDIOMAEXAMEN = row.data().ID_CATALOGO_IDIOMAEXAMEN;

    editarDatoTabla(row.data(), 'idiomaForm', 'idiomaModal', 1);

    $('#idiomaModal .modal-title').html(row.data().NOMBRE_IDIOMA);

});

$('#membresias-list-table tbody').on('click', 'td>button.EDITAR', function () {
    var tr = $(this).closest('tr');
    var row = membresiasDatatable.row(tr);
    ID_CATALOGO_MEMBRESIA = row.data().ID_CATALOGO_MEMBRESIA;

    editarDatoTabla(row.data(), 'membresiasForm', 'membresiasModal', 1);

    $('#membresiasModal .modal-title').html(row.data().NOMBRE_MEMBRESIA);

});

$('#operacion-list-table tbody').on('click', 'td>button.EDITAR', function () {
    var tr = $(this).closest('tr');
    var row = operacionDatatable.row(tr);
    ID_CATALOGO_OPERACION = row.data().ID_CATALOGO_OPERACION;

    editarDatoTabla(row.data(), 'operacionForm', 'operacionModal', 1);

    $('#operacionModal .modal-title').html(row.data().NOMBRE_OPERACION);

});

$('#nombres-list-table tbody').on('click', 'td>button.EDITAR', function () {
    var tr = $(this).closest('tr');
    var row = nombresDatatable.row(tr);
    ID_CATALOGO_NPROYECTOS = row.data().ID_CATALOGO_NPROYECTOS;

    editarDatoTabla(row.data(), 'nombresForm', 'nombresModal', 1);

    $('#nombresModal .modal-title').html(row.data().NOMBRE_PROYECTO);

});

$('#operacion-list-table tbody').on('click', 'td>button.EDITAR', function () {
    var tr = $(this).closest('tr');
    var row = instructoresDatatable.row(tr);
    ID_CATALOGO_INSTRUCTOR = row.data().ID_CATALOGO_INSTRUCTOR;

    editarDatoTabla(row.data(), 'instructoresForm', 'instructoresModal', 1);

    $('#instructoresModal .modal-title').html(row.data().FNAME_INSTRUCTOR);

});

