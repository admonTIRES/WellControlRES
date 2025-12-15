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
ID_CATALOGO_CENTRO = 0
ID_CATALOGO_UBICACION = 0
ID_CATALOGO_CLIENTE = 0
ID_CATALOGO_PROGRAMA = 0



$(document).ready(function () {

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

    var $select4 = $('#ACCREDITATION_ENTITIES_PROGRAM').selectize({
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
    var selectizeInstance4 = $select4[0].selectize; 

    var $select5 = $('#LEVELS_PROGRAM').selectize({
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
    var selectizeInstance5 = $select5[0].selectize; 

    var $select6 = $('#BOPS_PROGRAM').selectize({
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
    var selectizeInstance6 = $select6[0].selectize; 

    var $select7 = $('#OPERATIONS_PROGRAM').selectize({
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
    var selectizeInstance7 = $select7[0].selectize; 


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
        ['ACREDITACION_INSTRUCTOR'].forEach(fieldId => {
            const $select = $('#' + fieldId);
            if ($select[0].selectize) {
                $select[0].selectize.clear();
            } else {
                $select.selectize({
                    plugins: ['remove_button'],
                    delimiter: ',',
                    persist: false,
                    create: false
                });
            }
        });
        $('#documentos-container').html('');
        $('#instructoresModal .modal-title').text('Nuevo instructor');
    });

    $('#nombresModal').on('hidden.bs.modal', function () {
        ID_CATALOGO_NPROYECTOS = 0;
        $('#nombresForm')[0].reset();
        $('#nombresModal .modal-title').text('Nuevo nombre de proyecto');
    });

    $('#ubicacionesModal').on('hidden.bs.modal', function () {
        ID_CATALOGO_UBICACION = 0;
        $('#ubicacionesForm')[0].reset();
        $('#ubicacionesModal .modal-title').text('Nueva ubicación');
    });

    $('#programasModal').on('hidden.bs.modal', function () {
        ID_CATALOGO_PROGRAMA = 0;
        $('#programasForm')[0].reset();
        $('#programasModal .modal-title').text('Nuevo programa');
        
        // Resetear campos de resit inmediato
        $('#MIN_PORCENTAJE_REPROB_RE').val(0).attr('readonly', true);
        $('#MAX_PORCENTAJE_REPROB_RE').val(0).attr('readonly', true);
        
        // Resetear validaciones
        $('#programasForm').find('.is-invalid').removeClass('is-invalid');
        $('#programasForm').find('.invalid-feedback').remove();
    });

    const selectResit = document.getElementById("OPCION_RESIT");
    const minRe = document.getElementById("MIN_PORCENTAJE_REPROB_RE");
    const maxRe = document.getElementById("MAX_PORCENTAJE_REPROB_RE");

    function actualizarResit() {
        if (selectResit.value === "2") { 
            // Aplica
            minRe.removeAttribute("readonly");
            maxRe.removeAttribute("readonly");
            minRe.value = "";
            maxRe.value = "";
        } else {
            // No aplica
            minRe.setAttribute("readonly", true);
            maxRe.setAttribute("readonly", true);
            minRe.value = 0;
            maxRe.value = 0;
        }
    }

    selectResit.addEventListener("change", actualizarResit);
    actualizarResit();

    actualizarCentrosCapacitacion();
    $('#centroModal').on('hidden.bs.modal', function () {
    ID_CATALOGO_CENTRO = 0;
    $('#centroForm')[0].reset();
    $('#centroModal .modal-title').text('Nuevo centro de capacitación');
    actualizarCentrosCapacitacion();
    actualizarUbicaciones();
    actualizarProgramas();    
    // LIMPIAR CONTENEDORES DINÁMICOS
    $('#contactosContainer').empty();
    $('#queIncluyeContainer').empty();
    
    // REMOVER INFORMACIÓN DEL PDF
    $('#documento-info').remove();
    
    // REMOVER CAMPOS HIDDEN DE JSON SI EXISTEN
    $('#contactosJSON').remove();
    $('#queIncluyeJSON').remove();
    
    // RESETEAR CONTADORES
    contactCounter = 0;
    queIncluyeCounter = 0;

    
    // RESETEAR EL SELECT DE ASOCIADO
    $('#asociadoContainer').hide();
    $('#ASOCIADO_CENTRO').val('').prop('required', false);
    
    // RESETEAR EL CONTADOR DE VIGENCIA
    $('#CONTADOR_CENTRO').text('Aquí se indicarán los días restantes vigentes')
                         .removeClass('vigencia-verde vigencia-amarillo vigencia-rojo')
                         .addClass('form-label');
});

   $('#clienteModal').on('hidden.bs.modal', function () {
    // Resetear ID
    ID_CATALOGO_CLIENTE = 0;
    
    // Resetear formulario básico
    $('#clienteForm')[0].reset();
    
    // Limpiar contenedores dinámicos
    $('#razonesSocialesContainer').empty();
    $('#contactosContainerCliente').empty();
    
    // Resetear contadores
    razonSocialCounter = 0;
    contactoClienteCounter = 0;
    
    // Agregar elementos vacíos por defecto
    addRazonSocial();
    addContactoCliente();
    
    // Resetear título del modal
    $('#clienteModal .modal-title').text('Nuevo cliente');
    
    // Limpiar validaciones
    $('#clienteForm').find('.is-invalid').removeClass('is-invalid');
    $('#clienteForm').find('.invalid-feedback').remove();
});
    // RESET MODALS - END

   

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

    var telInstructor = document.getElementById('TEL_INSTRUCTOR');
    if (telInstructor) {
        telInstructor.addEventListener('input', function(e) {
            var value = e.target.value.replace(/\D/g, '');
            if (value.length > 10) {
                value = value.substring(0, 10);
            }
            
            // Formato: XXX-XXX-XXXX
            if (value.length > 6) {
                value = value.substring(0, 3) + '-' + value.substring(3, 6) + '-' + value.substring(6);
            } else if (value.length > 3) {
                value = value.substring(0, 3) + '-' + value.substring(3);
            }
            
            e.target.value = value;
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
    scrollX: true,
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
    scrollX: true,
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
        { data: 'ACREDITACION_NOMBRE' },
        { data: 'NOMBRE_NIVEL' },
        { data: 'PROGRAMA_NOMBRE' },
        { data: 'BTN_EDITAR' },
        { data: 'BTN_ACTIVO' }
    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center' },
        { targets: 1, title: 'Acreditación', className: 'text-center' },
        { targets: 2, title: 'Nivel', className: 'text-center' },
        { targets: 3, title: 'Programa', className: 'text-center' },
        { targets: 4, title: 'Editar', className: 'text-center' },
        { targets: 5, title: 'Activo', className: 'text-center' }
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
    scrollX: true,
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
var programasDatatable = $("#programas-list-table").DataTable({
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
    scrollX: true,
    scrollY: '65vh',
    scrollCollapse: true,
    responsive: true,
    autoWidth: false,
    ajax: {
        dataType: 'json',
        data: {},
        method: 'GET',
        cache: false,
        url: '/programasDatatable',
        beforeSend: function () {
        },
        complete: function () {
            programasDatatable.columns.adjust().draw();
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
        { data: 'NOMBRE_PROGRAMA' },
        { data: 'APROBACION_INFO' },
        { data: 'RESIT_INFO' },
        { data: 'BTN_EDITAR' },
        { data: 'BTN_ACTIVO' }
    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center' },
        { targets: 1, title: 'Programa', className: 'text-center' },
        { targets: 2, title: 'Aprobación', className: 'text-center' },
        { targets: 3, title: 'Resit/Retest', className: 'text-center' },
        { targets: 4, title: 'Editar', className: 'text-center' },
        { targets: 5, title: 'Activo', className: 'text-center' }
    ]
});

// ===================== REDIBUJAR TABLAS =====================
$('a[data-bs-toggle="pill"]').on('shown.bs.tab', function (e) {
    const target = $(e.target).attr("data-bs-target");
    
    if (target === "#v-pills-programas") {
        programasDatatable.columns.adjust().draw();
    }
    // ... resto de casos existentes ...
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
        }, 200);
    });
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
    scrollX: true,
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
var centrosDatatable = $("#centros-list-table").DataTable({
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
    autoWidth: false,
    ajax: {
        dataType: 'json',
        data: {},
        method: 'GET',
        cache: false,
        url: '/centrosDatatable',
        beforeSend: function () {
            // mostrarCarga();
        },
        complete: function () {
            centrosDatatable.columns.adjust().draw();
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
        { data: 'NOMBRE_ENTE' }, // Nombre del ente en lugar del ID
        { data: 'TIPO_CENTRO_TEXTO' }, // Tipo en texto
        { data: 'NOMBRE_COMERCIAL_CENTRO' },
        { data: 'VIGENCIA_TEXTO' }, // Columna de vigencia
        { data: 'BTN_EDITAR' },
        { data: 'BTN_PDF' }
    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center' },
        { targets: 1, title: 'Acreditación', className: 'text-center' },
        { targets: 2, title: 'Tipo', className: 'text-center' },
        { targets: 3, title: 'Nombre', className: 'text-center' },
        { targets: 4, title: 'Vigencia', className: 'text-center' },
        { targets: 5, title: 'Editar', className: 'text-center' },
        { targets: 6, title: 'Documento', className: 'text-center' }
    ],
    createdRow: function (row, data, dataIndex) {
        // APLICAR COLOR A TODA LA FILA SEGÚN LA VIGENCIA
        $(row).addClass(data.COLOR_FILA);
        
        // AGREGAR TOOLTIP CON MÁS INFORMACIÓN
        $(row).attr('title', 'Porcentaje transcurrido: ' + data.PORCENTAJE + '% - Días restantes: ' + data.DIAS_RESTANTES);
        $(row).tooltip();
    }
});
var ubicacionesDatatable = $("#ubicaciones-list-table").DataTable({
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
    scrollX: true,
    scrollY: '65vh',
    scrollCollapse: true,
    responsive: true,
    autoWidth: false,
    ajax: {
        dataType: 'json',
        data: {},
        method: 'GET',
        cache: false,
        url: '/ubicacionesDatatable',
        beforeSend: function () {
        },
        complete: function () {
            ubicacionesDatatable.columns.adjust().draw();
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
        { data: 'LUGAR_UBICACION' },
        { data: 'CIUDAD_UBICACION' },
        { data: 'BTN_EDITAR' },
        { data: 'BTN_ACTIVO' }
    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center' },
        { targets: 1, title: 'Lugar', className: 'text-center' },
        { targets: 2, title: 'Ciudad', className: 'text-center' },
        { targets: 3, title: 'Editar', className: 'text-center' },
        { targets: 4, title: 'Activo', className: 'text-center' }
    ]

});
var clientesDatatable = $("#clientes-list-table").DataTable({
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
    scrollX: true,
    scrollY: '65vh',
    scrollCollapse: true,
    responsive: true,
    autoWidth: false,
    ajax: {
        dataType: 'json',
        data: {},
        method: 'GET',
        cache: false,
        url: '/clienteDatatable',
        beforeSend: function () {
            // mostrarCarga();
        },
        complete: function () {
            clientesDatatable.columns.adjust().draw();
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
        { data: 'NOMBRE_COMERCIAL_CLIENTE' },
        { data: 'BTN_ACTIVO' },
        { data: 'BTN_EDITAR' }
    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center' },
        { targets: 1, title: 'Nombre Comercial', className: 'text-center' },
        { targets: 2, title: 'Activo', className: 'text-center' },
        { targets: 3, title: 'Editar', className: 'text-center' }
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
    scrollX: true,
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
    scrollX: true,
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
    scrollX: true,
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
    scrollX: true,
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
    scrollX: true,
    scrollCollapse: true,
    responsive: true,
    ajax: {
        dataType: 'json',
        data: {},
        method: 'GET',
        cache: false,
        url: '/instructoresDatatable',
        beforeSend: function () {
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
    }else if (target === "#v-pills-centros") {
        centrosDatatable.columns.adjust().draw();
    }else if (target === "#v-pills-ubicaciones") {
        ubicacionesDatatable.columns.adjust().draw();
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

$("#centrobtnModal").click(function (e) {
    e.preventDefault();
    formularioValido = validarFormulario($('#centroForm'))
    if (formularioValido) {
        
        // Procesar contactos a JSON
        const contactosArray = [];
        $('.contact-person').each(function(index) {
            const contactoId = index + 1;
            contactosArray.push({
                NOMBRE: $(`#CONTACTO_NOMBRE_${contactoId}`).val(),
                CARGO: $(`#CONTACTO_CARGO_${contactoId}`).val(),
                EMAIL: $(`#CONTACTO_EMAIL_${contactoId}`).val(),
                CELULAR: $(`#CONTACTO_CELULAR_${contactoId}`).val(),
                FIJO: $(`#CONTACTO_FIJO_${contactoId}`).val()
            });
        });
        
        // Procesar "Qué incluye" a JSON
        const queIncluyeArray = [];
        $('.que-incluye-item').each(function(index) {
            const elementoId = index + 1;
            queIncluyeArray.push({
                DESCRIPCION: $(`#QUE_INCLUYE_${elementoId}`).val()
            });
        });
        
        // Crear campos hidden para enviar los JSON
        let contactosJSON = JSON.stringify(contactosArray);
        let queIncluyeJSON = JSON.stringify(queIncluyeArray);
        
        // Remover campos hidden existentes
        $('#contactosJSON').remove();
        $('#queIncluyeJSON').remove();
        
        // Agregar campos hidden al formulario
        $('#centroForm').append(`<input type="hidden" id="contactosJSON" name="contactosJSON" value='${contactosJSON}'>`);
        $('#centroForm').append(`<input type="hidden" id="queIncluyeJSON" name="queIncluyeJSON" value='${queIncluyeJSON}'>`);

        // Crear FormData para enviar archivos
        let formData = new FormData($('#centroForm')[0]);

        if (ID_CATALOGO_CENTRO == 0) {
            alertMensajeConfirm({
                title: "¿Desea guardar la información?",
                text: "El centro de capacitación se agregará al catálogo",
                icon: "question",
            }, async function () {
                await loaderbtn('centrobtnModal')
                // CORRECCIÓN: Enviar FormData en lugar del formulario directamente
                await ajaxAwaitFormData({ 
                    api: 11, 
                    ID_CATALOGO_CENTRO 
                }, 'centroSave', 'centroForm', 'centrobtnModal', { 
                    callbackAfter: true, 
                    callbackBefore: true 
                }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    ID_CATALOGO_CENTRO = data.centro.ID_CATALOGO_CENTRO
                    alertMensaje('success', 'Información guardada correctamente', 'Lista para usarse')
                    $('#centroModal').modal('hide')
                    document.getElementById('centroForm').reset()
                    // Recargar datatable si existe
                    if(typeof centrosDatatable !== 'undefined') {
                        centrosDatatable.ajax.reload()
                    }
                })
            }, 1)
        } else {
            alertMensajeConfirm({
                title: "¿Desea editar la información de este formulario?",
                text: "Al guardarla, se podrá usar",
                icon: "question",
            }, async function () {
                await loaderbtn('centrobtnModal')
                // CORRECCIÓN: Enviar FormData en lugar del formulario directamente
                await ajaxAwaitFormData({ 
                    api: 11, 
                    ID_CATALOGO_CENTRO 
                }, 'centroSave', 'centroForm', 'centrobtnModal', { 
                    callbackAfter: true, 
                    callbackBefore: true 
                }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    setTimeout(() => {
                        ID_CATALOGO_CENTRO = data.centro.ID_CATALOGO_CENTRO
                        alertMensaje('success', 'Información editada correctamente', 'Información guardada')
                        $('#centroModal').modal('hide')
                        document.getElementById('centroForm').reset()
                        // Recargar datatable si existe
                        if(typeof centrosDatatable !== 'undefined') {
                            centrosDatatable.ajax.reload()
                        }
                    }, 300)
                })
            }, 1)
        }
    } else {
        alertToast('Por favor, complete todos los campos del formulario.', 'error', 2000)
    }
})

$("#ubicacionesbtnModal").click(function (e) {
    e.preventDefault();
    formularioValido = validarFormulario($('#ubicacionesForm'))
    if (formularioValido) {
        if (ID_CATALOGO_UBICACION == 0) {
            alertMensajeConfirm({
                title: "¿Desea guardar la información?",
                text: "La ubicación se agregará al catálogo",
                icon: "question",
            }, async function () {
                await loaderbtn('ubicacionesbtnModal')
                await ajaxAwaitFormData({ api: 13, ID_CATALOGO_UBICACION: ID_CATALOGO_UBICACION }, 'ubicacionesSave', 'ubicacionesForm', 'ubicacionesbtnModal', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    ID_CATALOGO_UBICACION = data.ubicacion.ID_CATALOGO_UBICACION
                    alertMensaje('success', 'Información guardada correctamente', 'Esta información esta lista para usarse', null, null, 1500)
                    $('#ubicacionesModal').modal('hide')
                    document.getElementById('ubicacionesForm').reset();
                    ubicacionesDatatable.ajax.reload()
                })
            }, 1)

        } else {
            alertMensajeConfirm({
                title: "¿Desea editar la información de este formulario?",
                text: "Al guardarla, se podra usar",
                icon: "question",
            }, async function () {

                await loaderbtn('ubicacionesbtnModal')
                await ajaxAwaitFormData({ api: 13, ID_CATALOGO_UBICACION: ID_CATALOGO_UBICACION }, 'ubicacionesSave', 'ubicacionesForm', 'ubicacionesbtnModal', { callbackAfter: true, callbackBefore: true }, () => {

                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })

                    $('.swal2-popup').addClass('ld ld-breath')


                }, function (data) {

                    setTimeout(() => {


                        ID_CATALOGO_UBICACION = data.ubicacion.ID_CATALOGO_UBICACION
                        $('#ubicacionesModal').modal('hide')
                        alertMensaje('success', 'Información editada correctamente', 'Información guardada')
                        document.getElementById('ubicacionesForm').reset();
                        ubicacionesDatatable.ajax.reload()
                    }, 300);
                })
            }, 1)
        }

    } else {
        alertToast('Por favor, complete todos los campos del formulario.', 'error', 2000)

    }

});

$("#clientebtnModal").click(function (e) {
    e.preventDefault();
    formularioValido = validarFormulario($('#clienteForm'))
    if (formularioValido) {
        
        // Procesar razones sociales a JSON
        const razonesSocialesArray = [];
        $('.razon-social-item').each(function(index) {
            const razonId = index + 1;
            const razonSocial = $(`#RAZON_SOCIAL_${razonId}`).val().trim();
            if (razonSocial) {
                razonesSocialesArray.push({
                    RAZON_SOCIAL: razonSocial
                });
            }
        });
        
        // Procesar contactos a JSON
        const contactosArray = [];
        $('.contacto-cliente-item').each(function(index) {
            const contactoId = index + 1;
            contactosArray.push({
                NOMBRE: $(`#CONTACTO_NOMBRE_${contactoId}`).val().trim(),
                CARGO: $(`#CONTACTO_CARGO_${contactoId}`).val().trim(),
                EMAIL: $(`#CONTACTO_EMAIL_${contactoId}`).val().trim(),
                CELULAR: $(`#CONTACTO_CELULAR_${contactoId}`).val().trim(),
                FIJO: $(`#CONTACTO_FIJO_${contactoId}`).val().trim()
            });
        });
        
        // Crear campos hidden para enviar los JSON
        let razonesSocialesJSON = JSON.stringify(razonesSocialesArray);
        let contactosJSON = JSON.stringify(contactosArray);
        
        // Remover campos hidden existentes
        $('#razonesSocialesJSON').remove();
        $('#contactosClienteJSON').remove();
        $('#activoClienteField').remove();
        $('#idClienteField').remove(); // Remover campo ID si existe
        
        // Agregar campos hidden al formulario
        $('#clienteForm').append(`<input type="hidden" id="razonesSocialesJSON" name="razonesSocialesJSON" value='${razonesSocialesJSON}'>`);
        $('#clienteForm').append(`<input type="hidden" id="contactosClienteJSON" name="contactosClienteJSON" value='${contactosJSON}'>`);
        
        // AGREGAR ID_CATALOGO_CLIENTE AL FORMULARIO (IMPORTANTE)
        if (ID_CATALOGO_CLIENTE > 0) {
            $('#clienteForm').append(`<input type="hidden" id="idClienteField" name="ID_CATALOGO_CLIENTE" value="${ID_CATALOGO_CLIENTE}">`);
        }
        
        // Agregar ACTIVO_CLIENTE = 1 automáticamente al crear
        if (ID_CATALOGO_CLIENTE == 0) {
            $('#clienteForm').append(`<input type="hidden" id="activoClienteField" name="ACTIVO_CLIENTE" value="1">`);
        }

        if (ID_CATALOGO_CLIENTE == 0) {
            alertMensajeConfirm({
                title: "¿Desea guardar la información?",
                text: "El cliente se agregará al catálogo",
                icon: "question",
            }, async function () {
                await loaderbtn('clientebtnModal')
                await ajaxAwaitFormData({ 
                    api: 12, 
                    ID_CATALOGO_CLIENTE 
                }, 'clienteSave', 'clienteForm', 'clientebtnModal', { 
                    callbackAfter: true, 
                    callbackBefore: true 
                }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    ID_CATALOGO_CLIENTE = data.cliente.ID_CATALOGO_CLIENTE
                    alertMensaje('success', 'Información guardada correctamente', 'Lista para usarse')
                    $('#clienteModal').modal('hide')
                    document.getElementById('clienteForm').reset()
                    // Recargar datatable si existe
                    if(typeof clientesDatatable !== 'undefined') {
                        clientesDatatable.ajax.reload()
                    }
                })
            }, 1)
        } else {
            alertMensajeConfirm({
                title: "¿Desea editar la información de este formulario?",
                text: "Al guardarla, se podrá usar",
                icon: "question",
            }, async function () {
                await loaderbtn('clientebtnModal')
                await ajaxAwaitFormData({ 
                    api: 12, 
                    ID_CATALOGO_CLIENTE 
                }, 'clienteSave', 'clienteForm', 'clientebtnModal', { 
                    callbackAfter: true, 
                    callbackBefore: true 
                }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    setTimeout(() => {
                        ID_CATALOGO_CLIENTE = data.cliente.ID_CATALOGO_CLIENTE
                        alertMensaje('success', 'Información editada correctamente', 'Información guardada')
                        $('#clienteModal').modal('hide')
                        document.getElementById('clienteForm').reset()
                        // Recargar datatable si existe
                        if(typeof clientesDatatable !== 'undefined') {
                            clientesDatatable.ajax.reload()
                        }
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

$("#programasbtnModal").click(function (e) {
    e.preventDefault();
    formularioValido = validarFormulario($('#programasForm'))
    if (formularioValido) {
        if (ID_CATALOGO_PROGRAMA == 0) {
            alertMensajeConfirm({
                title: "¿Desea guardar la información?",
                text: "El programa se agregará al catálogo",
                icon: "question",
            }, async function () {
                await loaderbtn('programasbtnModal')
                await ajaxAwaitFormData({ api: 14, ID_CATALOGO_PROGRAMA: ID_CATALOGO_PROGRAMA }, 'programaSave', 'programasForm', 'programasbtnModal', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    ID_CATALOGO_PROGRAMA = data.programa.ID_CATALOGO_PROGRAMA
                    alertMensaje('success', 'Información guardada correctamente', 'Esta información está lista para usarse', null, null, 1500)
                    $('#programasModal').modal('hide')
                    document.getElementById('programasForm').reset();
                    programasDatatable.ajax.reload()
                })
            }, 1)

        } else {
            alertMensajeConfirm({
                title: "¿Desea editar la información de este formulario?",
                text: "Al guardarla, se podrá usar",
                icon: "question",
            }, async function () {
                await loaderbtn('programasbtnModal')
                await ajaxAwaitFormData({ api: 14, ID_CATALOGO_PROGRAMA: ID_CATALOGO_PROGRAMA }, 'programaSave', 'programasForm', 'programasbtnModal', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    setTimeout(() => {
                        ID_CATALOGO_PROGRAMA = data.programa.ID_CATALOGO_PROGRAMA
                        alertMensaje('success', 'Información editada correctamente', 'Información guardada')
                        $('#programasModal').modal('hide')
                        document.getElementById('programasForm').reset();
                        programasDatatable.ajax.reload()
                    }, 300);
                })
            }, 1)
        }

    } else {
        alertToast('Por favor, complete todos los campos del formulario.', 'error', 2000)
    }
});

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

$('#ubicaciones-list-table tbody').on('change', 'input.ACTIVAR', function () {
    var tr = $(this).closest('tr');
    var row = ubicacionesDatatable.row(tr);
    var estado = $(this).is(':checked') ? 1 : 0;

    var data = {
        api: 13,
        ACTIVAR: estado == 0 ? 1 : 0,
        ID_CATALOGO_UBICACION: row.data().ID_CATALOGO_UBICACION
    };

    eliminarDatoTabla(data, [ubicacionesDatatable], 'ubicacionesActive');
});

$('#programas-list-table tbody').on('change', 'input.ACTIVAR', function () {
    var tr = $(this).closest('tr');
    var row = programasDatatable.row(tr);
    var estado = $(this).is(':checked') ? 1 : 0;

    var data = {
        api: 14,
        ACTIVAR: estado == 0 ? 1 : 0,
        ID_CATALOGO_PROGRAMA: row.data().ID_CATALOGO_PROGRAMA
    };

    eliminarDatoTabla(data, [programasDatatable], 'programaActive');
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
    editarDatoTabla(row.data(), 'entesForm', 'entesModal', 1);

    $('#entesModal .modal-title').html(row.data().NOMBRE_ENTE);

});

$('#programas-list-table tbody').on('click', 'td>button.EDITAR', function () {
    var tr = $(this).closest('tr');
    var row = programasDatatable.row(tr);
    ID_CATALOGO_PROGRAMA = row.data().ID_CATALOGO_PROGRAMA;

    
    editarDatoTabla(row.data(), 'programasForm', 'programasModal', 1);

    if (row.data().OPCION_RESIT == 2) {
        $('#MIN_PORCENTAJE_REPROB_RE').val(row.data().MIN_PORCENTAJE_REPROB_RE);
        $('#MAX_PORCENTAJE_REPROB_RE').val(row.data().MAX_PORCENTAJE_REPROB_RE);
        actualizarResit(); // Esto habilitará los campos
    } else {
        actualizarResit(); // Esto deshabilitará los campos
    }
    
    // Cambiar título del modal
    $('#programasModal .modal-title').html('Editando: ' + row.data().NOMBRE_PROGRAMA);
    
    // Mostrar modal
    $('#programasModal').modal('show');
});

$('#ubicaciones-list-table tbody').on('click', 'td>button.EDITAR', function () {
    var tr = $(this).closest('tr');
    var row = ubicacionesDatatable.row(tr);
    ID_CATALOGO_UBICACION = row.data().ID_CATALOGO_UBICACION;
    editarDatoTabla(row.data(), 'ubicacionesForm', 'ubicacionesModal', 1);
    $('#ubicacionesModal .modal-title').html(row.data().NOMBRE_UBICACION);

});

$('#nivelacreditacion-list-table tbody').on('click', 'td>button.EDITAR', function () {
    var tr = $(this).closest('tr');
    var row = nivelesDatatable.row(tr);
    ID_CATALOGO_NIVELACREDITACION = row.data().ID_CATALOGO_NIVELACREDITACION;
    actualizarProgramas(row.data().DESCRIPCION_NIVEL);

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



$('#clientes-list-table tbody').on('click', 'td>button.EDITAR_CLIENTE', function () {
    console.log('ENTRA AQUI CLIENTE');
    var tr = $(this).closest('tr');
    var row = clientesDatatable.row(tr);
    var rowData = row.data();
    
    // DEBUG: Verificar los datos de la fila
    console.log('Datos de la fila:', rowData);
    
    // ESTABLECER EL ID CORRECTAMENTE
    ID_CATALOGO_CLIENTE = rowData.ID_CATALOGO_CLIENTE;
    console.log('ID_CATALOGO_CLIENTE establecido:', ID_CATALOGO_CLIENTE);
    
    cargarDatosCliente(rowData);
    
    // Cambiar el título del modal para mostrar que es edición
    $('#clienteModal .modal-title').html('Editando cliente: ' + rowData.ID_CATALOGO_CLIENTE);
    
    // Abrir el modal
    $('#clienteModal').modal('show');
});

// Función para cargar datos del cliente al editar - CORREGIDA
function cargarDatosCliente(clienteData) {
    console.log('Cargando datos del cliente:', clienteData);
    
    // ESTABLECER EL ID GLOBAL
    ID_CATALOGO_CLIENTE = clienteData.ID_CATALOGO_CLIENTE;
    console.log('ID_CATALOGO_CLIENTE en cargarDatos:', ID_CATALOGO_CLIENTE);
    
    // LLENAR CAMPO ÚNICO
    $('#NOMBRE_COMERCIAL_CLIENTE').val(clienteData.NOMBRE_COMERCIAL_CLIENTE);
    
    // LIMPIAR CONTENEDORES
    $('#razonesSocialesContainer').empty();
    $('#contactosContainerCliente').empty();
    
    // RESETEAR CONTADORES
    razonSocialCounter = 0;
    contactoClienteCounter = 0;
    
    // CARGAR RAZONES SOCIALES
    if (clienteData.RAZONES_SOCIALES) {
        try {
            const razones = typeof clienteData.RAZONES_SOCIALES === 'string' 
                ? JSON.parse(clienteData.RAZONES_SOCIALES) 
                : clienteData.RAZONES_SOCIALES;
            
            console.log('Razones sociales cargadas:', razones);
            
            if (razones && razones.length > 0) {
                razones.forEach(razon => {
                    addRazonSocial(razon);
                });
            } else {
                addRazonSocial();
            }
        } catch (e) {
            console.error('Error parsing razones sociales JSON:', e);
            addRazonSocial();
        }
    } else {
        addRazonSocial();
    }
    
    // CARGAR CONTACTOS
    if (clienteData.CONTACTO_CLIENTE) {
        try {
            const contactos = typeof clienteData.CONTACTO_CLIENTE === 'string' 
                ? JSON.parse(clienteData.CONTACTO_CLIENTE) 
                : clienteData.CONTACTO_CLIENTE;
            
            console.log('Contactos cargados:', contactos);
            
            if (contactos && contactos.length > 0) {
                contactos.forEach(contacto => {
                    addContactoCliente(contacto);
                });
            } else {
                addContactoCliente();
            }
        } catch (e) {
            console.error('Error parsing contactos JSON:', e);
            addContactoCliente();
        }
    } else {
        addContactoCliente();
    }
}

$('#centros-list-table tbody').on('click', 'td>button.EDITAR', function () {
    var tr = $(this).closest('tr');
    var row = centrosDatatable.row(tr);
    ID_CATALOGO_CENTRO = row.data().ID_CATALOGO_CENTRO;
    actualizarCentrosCapacitacion();
    actualizarUbicaciones(row.data().UBICACION_CENTRO);

    editarDatoTabla(row.data(), 'centroForm', 'centroModal', 1);
    $('#centroModal .modal-title').html(row.data().NOMBRE_COMERCIAL_CENTRO);

    // CARGAR "QUÉ INCLUYE"
    cargarQueIncluye(row.data().INCLUYE_CENTRO);
    
    // CARGAR CONTACTOS
    cargarContactos(row.data().CONTACTOS_CENTRO);
    
    // CARGAR INFORMACIÓN DEL PDF
    cargarInformacionPDF(row.data().DOC_CENTRO);
    
    // CALCULAR VIGENCIA
    calcularVigencia();

     const acreditacionInicial = $('#ACREDITACION_CENTRO').val();
    if (acreditacionInicial) {
        actualizarCentrosCapacitacion(acreditacionInicial);
    }   
});

// Función para cargar "Qué incluye"
function cargarQueIncluye(incluyeJSON) {
    // Limpiar contenedor
    $('#queIncluyeContainer').empty();
    queIncluyeCounter = 0;
    
    if (incluyeJSON) {
        try {
            const queIncluye = JSON.parse(incluyeJSON);
            queIncluye.forEach(elemento => {
                addQueIncluye();
                const currentElement = $(`#que-incluye-${queIncluyeCounter}`);
                currentElement.find(`[name="QUE_INCLUYE_${queIncluyeCounter}"]`).val(elemento.DESCRIPCION);
            });
        } catch (e) {
            console.error('Error parsing qué incluye JSON:', e);
            // Si hay error, agregar un elemento vacío
            addQueIncluye();
        }
    } else {
        // Si no hay datos, agregar un elemento vacío
        addQueIncluye();
    }
}

// Función para cargar contactos
function cargarContactos(contactosJSON) {
    // Limpiar contenedor
    $('#contactosContainer').empty();
    contactCounter = 0;
    
    if (contactosJSON) {
        try {
            const contactos = JSON.parse(contactosJSON);
            contactos.forEach(contacto => {
                addContacto();
                const currentContact = $(`#contacto-${contactCounter}`);
                currentContact.find(`[name="CONTACTO_NOMBRE_${contactCounter}"]`).val(contacto.NOMBRE || '');
                currentContact.find(`[name="CONTACTO_CARGO_${contactCounter}"]`).val(contacto.CARGO || '');
                currentContact.find(`[name="CONTACTO_EMAIL_${contactCounter}"]`).val(contacto.EMAIL || '');
                currentContact.find(`[name="CONTACTO_CELULAR_${contactCounter}"]`).val(contacto.CELULAR || '');
                currentContact.find(`[name="CONTACTO_FIJO_${contactCounter}"]`).val(contacto.FIJO || '');
            });
        } catch (e) {
            console.error('Error parsing contactos JSON:', e);
            // Si hay error, agregar un contacto vacío
            addContacto();
        }
    } else {
        // Si no hay datos, agregar un contacto vacío
        addContacto();
    }
}

// function actualizarCentrosCapacitacion() {
//     $('#ASOCIADO_CENTRO').html('<option value="" selected disabled>Cargando centros...</option>');
//     console.log('se ejecuto la funcion actualizarCentrosCapacitacion()');
//     $.ajax({
//         url: '/api/centros-capacitacion',
//         type: 'GET',
//         data: { tipo: 2 },
//         success: function(data) {
//             let options = `<option value="" selected disabled>Seleccione el centro de capacitación primario vigente (${data.fecha_consulta}) </option>`;
//             console.log(`${data.fecha_consulta}` );
            
//             data.centros.forEach(function(centro) {
//                 options += `<option value="${centro.ID_CATALOGO_CENTRO}">${centro.NOMBRE_COMERCIAL_CENTRO}</option>`;
//             });
            
//             $('#ASOCIADO_CENTRO').html(options);
//         },
//         error: function() {
            
//             $('#ASOCIADO_CENTRO').html('<option value="" selected disabled>Error al cargar centros</option>');
//         }
//     });
// }

function actualizarCentrosCapacitacion(acreditacionId = null) {
    const $select = $('#ASOCIADO_CENTRO');
    $select.html('<option value="" selected disabled>Cargando centros...</option>');
    
    // Si no se proporciona acreditacionId, intentar obtenerlo del select
    if (acreditacionId === null) {
        acreditacionId = $('#ACREDITACION_CENTRO').val() || 0;
    }
    
    $.ajax({
        url: '/centros-capacitacion',
        type: 'GET',
        data: { 
            tipo: 2,
            acreditacion: acreditacionId
        },
        success: function(response) {
            let options = '<option value="" selected disabled>Seleccione el centro de capacitación primario</option>';
            
            if (response.success && response.centros.length > 0) {
                response.centros.forEach(function(centro) {
                    options += `<option value="${centro.ID_CATALOGO_CENTRO}">${centro.NOMBRE_COMERCIAL_CENTRO}</option>`;
                });
            } else {
                options = '<option value="" selected disabled>No hay centros disponibles</option>';
            }
            
            $select.html(options);
        },
        error: function(xhr, status, error) {
            $select.html('<option value="" selected disabled>Error al cargar centros</option>');
        }
    });
}
function actualizarProgramas(idSeleccionada = null) {
    const $select = $('#DESCRIPCION_NIVEL');
    $select.html('<option value="" selected disabled>Cargando programas...</option>');
    
    $.ajax({
        url: '/programas',
        type: 'GET',
        data: { 
            programa: 0,
        },
        success: function(response) {
            let options = '<option value="" selected disabled>Seleccione un programa</option>';
            
            if (response.success && response.programas.length > 0) {
                response.programas.forEach(function(programa) {

                    const selected = (idSeleccionada == programa.ID_CATALOGO_PROGRAMA)
                                   ? 'selected'
                                   : '';

                    options += `
                        <option value="${programa.ID_CATALOGO_PROGRAMA}" ${selected}>
                            ${programa.NOMBRE_PROGRAMA}
                        </option>`;
                });
            } else {
                options = '<option value="" disabled>No hay programas disponibles</option>';
            }
            
            $select.html(options);
        },
        error: function(xhr, status, error) {
            $select.html('<option value="" selected disabled>Error al cargar programas</option>');
        }
    });
}

function actualizarUbicaciones(idSeleccionada = null) {
    const $select = $('#UBICACION_CENTRO');
    $select.html('<option value="" selected disabled>Cargando ubicaciones...</option>');
    
    $.ajax({
        url: '/ubicaciones',
        type: 'GET',
        data: { 
            ubicacion: 0
        },
        success: function(response) {
            let options = '<option value="" disabled>Seleccione una opción</option>';
            
            if (response.success && response.ubicaciones.length > 0) {
                response.ubicaciones.forEach(function(ubicacion) {

                    const selected = (idSeleccionada == ubicacion.ID_CATALOGO_UBICACION)
                                   ? 'selected'
                                   : '';

                    options += `
                        <option value="${ubicacion.ID_CATALOGO_UBICACION}" ${selected}>
                            ${ubicacion.LUGAR_UBICACION} - ${ubicacion.CIUDAD_UBICACION}
                        </option>`;
                });
            } else {
                options = '<option value="" disabled>No hay ubicaciones disponibles</option>';
            }
            
            $select.html(options);
        },
        error: function() {
            $select.html('<option value="" disabled>Error al cargar ubicaciones</option>');
        }
    });
}

// Evento cuando cambia la acreditación
$(document).ready(function() {
    // Cargar centros al inicio si ya hay una acreditación seleccionada
    const acreditacionInicial = $('#ACREDITACION_CENTRO').val();
    if (acreditacionInicial) {
        actualizarCentrosCapacitacion(acreditacionInicial);
    }
    
    // Escuchar cambios en el select de acreditación
    $('#ACREDITACION_CENTRO').on('change', function() {
        const acreditacionId = $(this).val() || 0;
        actualizarCentrosCapacitacion(acreditacionId);
    });
});

// Función para cargar información del PDF
function cargarInformacionPDF(docInfo) {
    const docInput = $('#DOCUMENTO_CENTRO');
    const docText = $('#documento-info');
    
    // Remover información anterior si existe
    if (docText.length) {
        docText.remove();
    }
    
    if (docInfo) {
        try {
            // Si es un JSON (para compatibilidad con versiones anteriores)
            if (docInfo.startsWith('[') || docInfo.startsWith('{')) {
                const docData = JSON.parse(docInfo);
                if (Array.isArray(docData) && docData.length > 0) {
                    // Mostrar información del primer documento
                    const primerDoc = docData[0];
                    docInput.after(`
                        <div id="documento-info" class="mt-2">
                            <small class="text-muted">
                                <i class="fas fa-file-pdf text-danger"></i>
                                Documento actual: ${primerDoc.nombre || primerDoc.archivo_original}
                                ${primerDoc.fecha_subida ? `(Subido: ${primerDoc.fecha_subida})` : ''}
                            </small>
                            <br>
                            <small class="text-info">
                                <i class="fas fa-info-circle"></i>
                                Al seleccionar un nuevo archivo, se reemplazará el existente.
                            </small>
                        </div>
                    `);
                }
            } else {
                // Si es solo una ruta (nueva implementación)
                const nombreArchivo = docInfo.split('/').pop().replace(/^\d+_/, '');
                docInput.after(`
                    <div id="documento-info" class="mt-2">
                        <small class="text-muted">
                            <i class="fas fa-file-pdf text-danger"></i>
                            Documento actual: ${nombreArchivo}
                        </small>
                        <br>
                        <small class="text-info">
                            <i class="fas fa-info-circle"></i>
                            Al seleccionar un nuevo archivo, se reemplazará el existente.
                        </small>
                    </div>
                `);
            }
        } catch (e) {
            console.error('Error parsing documento info:', e);
            // Si es solo texto (ruta del archivo)
            const nombreArchivo = docInfo.split('/').pop().replace(/^\d+_/, '');
            docInput.after(`
                <div id="documento-info" class="mt-2">
                    <small class="text-muted">
                        <i class="fas fa-file-pdf text-danger"></i>
                        Documento actual: ${nombreArchivo}
                    </small>
                </div>
            `);
        }
    } else {
        // Si no hay documento
        docInput.after(`
            <div id="documento-info" class="mt-2">
                <small class="text-warning">
                    <i class="fas fa-exclamation-triangle"></i>
                    No hay documento cargado actualmente.
                </small>
            </div>
        `);
    }
}

// Función para extraer nombre legible del archivo
function getNombreArchivoLegible(ruta) {
    if (!ruta) return 'Sin documento';
    
    try {
        // Si es JSON
        if (ruta.startsWith('[') || ruta.startsWith('{')) {
            const docData = JSON.parse(ruta);
            if (Array.isArray(docData) && docData.length > 0) {
                return docData[0].nombre || docData[0].archivo_original || 'Documento PDF';
            }
        }
        // Si es ruta directa
        const nombreCompleto = ruta.split('/').pop();
        // Remover el prefijo único (uniqid_)
        return nombreCompleto.replace(/^[a-f0-9]+_/, '');
    } catch (e) {
        // Si falla el parsing, devolver la ruta original
        return ruta.split('/').pop() || 'Documento PDF';
    }
}

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

$('#instructores-list-table tbody').on('click', 'td>button.EDITAR', function () {
    var tr = $(this).closest('tr');
    var row = instructoresDatatable.row(tr);
    ID_CATALOGO_INSTRUCTOR = row.data().ID_CATALOGO_INSTRUCTOR;

    editarDatoTabla(row.data(), 'instructoresForm', 'instructoresModal', 1);
    console.log(row.data().ACREDITACION_INSTRUCTOR);
    function initializeSelectizedFields(row, fieldIds) {
        fieldIds.forEach(function (fieldId) {
            var values = row.data()[fieldId];
            var $select = $('#' + fieldId);

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
            selectize.setValue(values);  
        });
    }

    initializeSelectizedFields(row, [
        'ACREDITACION_INSTRUCTOR'
    ]);

    $('#documentos-container').html(''); // Limpia primero el contenedor

    let documentos = row.data().DOC_INSTRUCTOR;

    if (documentos) {
        try {
            documentos = JSON.parse(documentos); // Convierte el JSON a array
            documentos.forEach((doc, index) => {
                $('#documentos-container').append(`
                    <div class="d-flex align-items-center mb-2 doc-row">
                        <input type="text" name="documents[${index}][name]" 
                            class="form-control me-2" 
                            value="${doc.nombre}" 
                            placeholder="Nombre del documento" required>
                        
                        <a href="/storage/${doc.ruta.replace('app/', '')}" 
                        target="_blank" 
                        class="btn btn-outline-secondary btn-sm me-2">
                        <i class="fas fa-file-pdf"></i>
                        </a>
                        
                        <input type="file" name="documents[${index}][file]" 
                            class="form-control" accept=".pdf">
                        
                        <button type="button" class="btn btn-danger btn-sm ms-2 remove-doc">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                `);
            });
        } catch (e) {
            console.error('Error al parsear documentos:', e);
        }
    }
    $('#instructoresModal .modal-title').html(row.data().FNAME_INSTRUCTOR);

});

// Mueve las variables globales al inicio
let pdfRutaActual = '';
let pdfIdCentroActual = '';



// Función para construir la URL del PDF (corregida)
function construirURLPDF(rutaArchivo, idCentro) {
    if (!rutaArchivo) return '';
    
    let rutaLimpia = rutaArchivo.trim();
    const baseUrl = window.location.origin;
    
    console.log('Construyendo URL para:', { rutaArchivo, rutaLimpia, idCentro });
    
    // Si la ruta ya es completa (contiene admin/catalogs/centros/)
    if (rutaLimpia.includes('admin/catalogs/centros/')) {
        // Extraer solo el nombre del archivo
        const nombreArchivo = rutaLimpia.split('/').pop();
        return `${baseUrl}/archivos/centros/${idCentro}/${nombreArchivo}`;
    }
    
    // Si es solo el nombre del archivo
    return `${baseUrl}/archivos/centros/${idCentro}/${rutaLimpia}`;
}

// Función para extraer la ruta real del archivo (simplificada)
function extraerRutaArchivo(ruta) {
    try {
        // Si es un JSON string
        if (typeof ruta === 'string' && (ruta.trim().startsWith('[') || ruta.trim().startsWith('{'))) {
            const docData = JSON.parse(ruta);
            if (Array.isArray(docData) && docData.length > 0) {
                return docData[0].ruta || '';
            }
        }
        // Si es solo texto (ruta directa)
        return ruta;
    } catch (e) {
        console.error('Error al extraer ruta:', e);
        return ruta;
    }
}

// Función para cargar el PDF (actualizada)
function cargarPDF(ruta, idCentro) {
    $('#pdfLoading').show();
    $('#pdfViewer').hide();
    $('#pdfError').hide();
    
    let rutaArchivo = extraerRutaArchivo(ruta);
    
    if (!rutaArchivo) {
        $('#pdfLoading').hide();
        $('#pdfError').show();
        $('#errorMessage').text('No se encontró la ruta del documento.');
        return;
    }
    
    // Extraer solo el nombre del archivo para la URL
    const nombreArchivo = rutaArchivo.split('/').pop();
    const urlCompleta = construirURLPDF(nombreArchivo, idCentro);
    
    console.log('URL final del PDF:', urlCompleta);
    
    const pdfFrame = document.getElementById('pdfFrame');
    
    setTimeout(() => {
        pdfFrame.src = urlCompleta;
        
        pdfFrame.onload = function() {
            $('#pdfLoading').hide();
            $('#pdfViewer').show();
        };
        
        pdfFrame.onerror = function() {
            $('#pdfLoading').hide();
            $('#pdfError').show();
            $('#errorMessage').html('No se pudo cargar el documento PDF.<br>URL: ' + urlCompleta);
        };
        
    }, 500);
}




// Evento para el botón Ver PDF (corregido)
$('#centros-list-table tbody').on('click', 'button.VER_PDF', function () {
    const idCentro = $(this).data('id');
    const rutaDocumento = $(this).data('ruta');
    
    pdfRutaActual = rutaDocumento;
    pdfIdCentroActual = idCentro;
    
    console.log('Abriendo PDF:', { idCentro, rutaDocumento });
    
    // Mostrar modal
    $('#pdfModal').modal('show');
    
    // Cargar el PDF
    cargarPDF(rutaDocumento, idCentro);
});

function descargarPDF() {
    console.log('descargando');
    if (!pdfRutaActual || !pdfIdCentroActual) return;
    
    const nombreArchivo = extraerRutaArchivo(pdfRutaActual);
    const urlDescarga = construirURLPDF(nombreArchivo, pdfIdCentroActual);
    
    // Forzar descarga cambiando la URL
    const urlDescargaForzada = urlDescarga + '?download=1';
    
    const link = document.createElement('a');
    link.href = urlDescargaForzada;
    link.download = 'documento_centro_' + pdfIdCentroActual + '.pdf';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

document.addEventListener('DOMContentLoaded', function() {
    let complementoCounter = 0;

    // Función para validar rangos de calificaciones
    function validarRangosComplemento(complementoId) {
        const minAprobar = document.querySelector(`[name="complementos[${complementoId}][min_aprobar]"]`);
        const maxAprobar = document.querySelector(`[name="complementos[${complementoId}][max_aprobar]"]`);
        const minRetest = document.querySelector(`[name="complementos[${complementoId}][min_retest]"]`);
        const maxRetest = document.querySelector(`[name="complementos[${complementoId}][max_retest]"]`);

        // Validar que máximo aprobar sea mayor que mínimo aprobar
        if (minAprobar.value && maxAprobar.value) {
            if (parseFloat(maxAprobar.value) <= parseFloat(minAprobar.value)) {
                maxAprobar.setCustomValidity('El máximo debe ser mayor que el mínimo');
                return false;
            } else {
                maxAprobar.setCustomValidity('');
            }
        }

        // Validar que el rango de retest no se solape con aprobar
        if (minAprobar.value && minRetest.value) {
            if (parseFloat(minRetest.value) >= parseFloat(minAprobar.value)) {
                minRetest.setCustomValidity(`Debe ser menor que ${minAprobar.value}% (mínimo para aprobar)`);
                minRetest.classList.add('is-invalid');
                return false;
            } else {
                minRetest.setCustomValidity('');
                minRetest.classList.remove('is-invalid');
            }
        }

        if (minAprobar.value && maxRetest.value) {
            if (parseFloat(maxRetest.value) >= parseFloat(minAprobar.value)) {
                maxRetest.setCustomValidity(`Debe ser menor que ${minAprobar.value}% (mínimo para aprobar)`);
                maxRetest.classList.add('is-invalid');
                return false;
            } else {
                maxRetest.setCustomValidity('');
                maxRetest.classList.remove('is-invalid');
            }
        }

        // Validar que máximo retest sea mayor que mínimo retest
        if (minRetest.value && maxRetest.value) {
            if (parseFloat(maxRetest.value) <= parseFloat(minRetest.value)) {
                maxRetest.setCustomValidity('El máximo debe ser mayor que el mínimo');
                return false;
            } else {
                maxRetest.setCustomValidity('');
            }
        }

        return true;
    }

    // Función para crear un nuevo complemento
    function crearComplemento() {
        complementoCounter++;
        const complementoId = complementoCounter;
        
        const complementoHTML = `
            <div class="card mb-3 complemento-item" id="complemento_${complementoId}" data-complemento-id="${complementoId}">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <span class="fw-bold">Complemento #${complementoId}</span>
                    <button type="button" class="btn btn-sm btn-danger" onclick="eliminarComplemento('complemento_${complementoId}')">
                        <i class="bi bi-trash"></i> Eliminar
                    </button>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label class="form-label">Nombre del complemento <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="complementos[${complementoId}][nombre]" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">¿Requiere entrenamiento adicional?</label>
                            <select class="form-select" name="complementos[${complementoId}][requiere_entrenamiento]">
                                <option value="0">No</option>
                                <option value="1">Sí</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label class="form-label">Calificación mínima para aprobar (%) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control complemento-min-aprobar" 
                                   name="complementos[${complementoId}][min_aprobar]" 
                                   min="0" max="100" 
                                   placeholder="Ej. 70"
                                   data-complemento-id="${complementoId}"
                                   required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Calificación máxima para aprobar (%) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control complemento-max-aprobar" 
                                   name="complementos[${complementoId}][max_aprobar]" 
                                   min="0" max="100" 
                                   placeholder="Ej. 100"
                                   data-complemento-id="${complementoId}"
                                   required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Calificación mínima para presentar re-test (%)</label>
                            <input type="number" class="form-control complemento-min-retest" 
                                   name="complementos[${complementoId}][min_retest]" 
                                   min="0" max="100" 
                                   placeholder="Ej. 0"
                                   data-complemento-id="${complementoId}">
                            <div class="invalid-feedback">Debe ser menor que la calificación mínima para aprobar</div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Calificación máxima para presentar re-test (%)</label>
                            <input type="number" class="form-control complemento-max-retest" 
                                   name="complementos[${complementoId}][max_retest]" 
                                   min="0" max="100" 
                                   placeholder="Ej. 69"
                                   data-complemento-id="${complementoId}">
                            <div class="invalid-feedback">Debe ser menor que la calificación mínima para aprobar</div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label class="form-label">Número de intentos permitidos</label>
                            <input type="number" class="form-control" 
                                   name="complementos[${complementoId}][num_intentos]" 
                                   min="1" max="10" 
                                   placeholder="Ej. 2"
                                   value="1">
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        document.getElementById('complementosContainer').insertAdjacentHTML('beforeend', complementoHTML);
        
        // Agregar event listeners para validación
        agregarValidacionComplemento(complementoId);
    }

    // Función para agregar validación a un complemento
    function agregarValidacionComplemento(complementoId) {
        const inputs = document.querySelectorAll(`[data-complemento-id="${complementoId}"]`);
        
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                validarRangosComplemento(complementoId);
            });
            
            input.addEventListener('blur', function() {
                validarRangosComplemento(complementoId);
            });
        });
    }

    // Event listener para agregar complemento
    document.getElementById('btnAgregarComplemento').addEventListener('click', function(e) {
        e.preventDefault();
        crearComplemento();
    });

    // Función global para eliminar complemento
    window.eliminarComplemento = function(complementoId) {
        if (confirm('¿Está seguro de eliminar este complemento?')) {
            document.getElementById(complementoId).remove();
        }
    };

    // Habilitar/deshabilitar campos de resit inmediato
    document.getElementById('OPCION_RESIT').addEventListener('change', function() {
        const minField = document.getElementById('MIN_PORCENTAJE_REPROB_RE');
        const maxField = document.getElementById('MAX_PORCENTAJE_REPROB_RE');
        
        if (this.value === '2') {
            minField.readOnly = false;
            maxField.readOnly = false;
            minField.value = '';
            maxField.value = '';
        } else {
            minField.readOnly = true;
            maxField.readOnly = true;
            minField.value = '0';
            maxField.value = '0';
        }
    });

    // Validación antes de enviar el formulario
    document.getElementById('programasbtnModal').addEventListener('click', function(e) {
        const complementos = document.querySelectorAll('.complemento-item');
        let todosValidos = true;
        
        complementos.forEach(complemento => {
            const complementoId = complemento.dataset.complementoId;
            if (!validarRangosComplemento(complementoId)) {
                todosValidos = false;
            }
        });
        
        if (!todosValidos) {
            e.preventDefault();
            alert('Por favor, corrija los errores en los complementos antes de guardar.');
            return false;
        }
        
        // Aquí continúa con el envío del formulario
        document.getElementById('programasForm').submit();
    });
});