ID_INFORMACION_KILLSHEET = 0

////////   SELECCIONAR TIPOS 
$('#btnOpenPreKillsheet').on('click', function () {
    resetPreKillsheet();

    $('#TIPO_ENTE').val('');
    $('#TIPO_POZO').val('');
    $('#TIPO_BOP').val('');
    $('#TIPO_IDIOMA').val('');

    $('#modalPreKillsheet').modal('show');
});

$('#modalPreKillsheet').on('hidden.bs.modal', function () {
    resetPreKillsheet();
});

function resetPreKillsheet() {

    $('.killsheet-option').removeClass('selected');
    $('.killsheet-btn').removeClass('selected');
    $('.idioma-option').removeClass('selected');
    $('#stepPozo').addClass('d-none');
    $('#stepBop').addClass('d-none');
    $('#stepIdioma').addClass('d-none');
}

$('.killsheet-option').on('click', function () {

    $('.killsheet-option').removeClass('selected');
    $(this).addClass('selected');

    const ente = $(this).data('ente');
    $('#TIPO_ENTE').val(ente);

    if (ente === 1) {
        $('#stepPozo').removeClass('d-none');
    } else {
        $('#modalPreKillsheet').modal('hide');
        openKillsheet();
    }
});



$('#stepPozo .killsheet-btn').on('click', function () {

    $('#stepPozo .killsheet-btn').removeClass('selected');
    $(this).addClass('selected');
    const pozo = $(this).data('pozo');
    $('#TIPO_POZO').val(pozo);
    $('#stepBop').removeClass('d-none');
});


$('#stepBop .killsheet-btn').on('click', function () {

    $('#stepBop .killsheet-btn').removeClass('selected');
    $(this).addClass('selected');
    const bop = $(this).data('bop');
    const pozo = $('#TIPO_POZO').val();
    let valorBop = null;
    if (pozo == 1 && bop === 'surface') valorBop = 1;
    if (pozo == 1 && bop === 'subsea') valorBop = 2;
    if (pozo == 2 && bop === 'surface') valorBop = 3;
    if (pozo == 2 && bop === 'subsea') valorBop = 4;
    $('#TIPO_BOP').val(valorBop);
    $('#stepIdioma').removeClass('d-none');
});

$('.idioma-option').on('click', function () {

    $('#stepIdioma .idioma-option').removeClass('selected');
    $(this).addClass('selected');
    const idioma = $(this).data('idioma');
    $('#TIPO_IDIOMA').val(idioma);
    $('#modalPreKillsheet').modal('hide');
    openKillsheet(); 
});


function openKillsheet() {

    $('#TIPO_ENTE_KILL').val($('#TIPO_ENTE').val());
    $('#TIPO_POZO_KILL').val($('#TIPO_POZO').val());
    $('#TIPO_BOP_KILL').val($('#TIPO_BOP').val());
    $('#TIPO_IDIOMA_KILL').val($('#TIPO_IDIOMA').val());

    $('#killsheet_modal').modal('show');

    $('#btn-continuar-sec-2').removeClass('d-none');
    $('#killsheet-views-container').addClass('d-none');
    $('.killsheet-view').addClass('d-none');

    initSelectizeNiveles();

}


$(document).on('click', '#btn-continuar-sec-2', function () {

    const ente   = $('#TIPO_ENTE').val();
    const pozo   = $('#TIPO_POZO').val();
    const bop    = $('#TIPO_BOP').val();
    const idioma = $('#TIPO_IDIOMA').val();

    $('.killsheet-view').addClass('d-none');

    const selector =
        '.killsheet-view' +
        '[data-ente="' + ente + '"]' +
        '[data-pozo="' + pozo + '"]' +
        '[data-bop="' + bop + '"]' +
        '[data-idioma="' + idioma + '"]';

    const vista = $(selector);

    if (vista.length === 0) {
        alert('No existe una hoja para esta combinación');
        return;
    }

    $('#killsheet-views-container').removeClass('d-none');
    vista.removeClass('d-none');

    $('#btn-continuar-sec-2').addClass('d-none');
});


///// CERRAR MODAL 
$('#killsheet_modal').on('hidden.bs.modal', function () {

    $('#btn-continuar-sec-2').removeClass('d-none');

    $('#killsheet-views-container').addClass('d-none');
    $('.killsheet-view').addClass('d-none');

    $('#TIPO_ENTE_KILL').val('');
    $('#TIPO_POZO_KILL').val('');
    $('#TIPO_BOP_KILL').val('');
    $('#TIPO_IDIOMA_KILL').val('');

    const selectize = $('#NIVELES_KILLSHEET')[0]?.selectize;

    if (selectize) {
        selectize.clear();
    }

    $('.exercise-items').empty();
    $('#questions-items').empty();

})

//// INICIALIZAR SELECT TIZE
function initSelectizeNiveles() {

    const $select = $('#NIVELES_KILLSHEET');

    if ($select[0].selectize) {
        return;
    }

    $select.selectize({
        plugins: ['remove_button'],
        delimiter: ',',
        persist: false,
        maxItems: null,
        create: false,
        onInitialize: function () {
            this.$control_input.prop('readonly', true);
        }
    });
}


//// GENERAR CONTENEDORES DINAMICOS 


function createExerciseRow() {
    return `
        <div class="row g-2 align-items-center mb-2 exercise-row">
            <div class="col-md-4">
                <input type="text" class="form-control exercise-dato" placeholder="Dato">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control exercise-valor" placeholder="Valor">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control exercise-unidad" placeholder="Unidad">
            </div>
            <div class="col-md-2 text-end">
                <button type="button" class="btn btn-danger btn-sm btn-remove-item">
                    <svg class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z"></path></svg>
                </button>
            </div>
        </div>
    `;
}

//// AGREGAR  DATOS EN  LOS CONTENEDORES DE LAS CARD
$(document).on('click', '.btn-add-item', function () {

    const card = $(this).closest('.exercise-card');
    card.find('.exercise-items').append(createExerciseRow());
});


$(document).on('click', '.btn-remove-item', function () {
    $(this).closest('.exercise-row').remove();
});

///// HACER PREGUNTAS DINAMICAS 


function createQuestionRow() {
    return `
        <div class="card mb-3 question-row">
            <div class="card-body">

                <div class="row g-2 align-items-center">

                    <div class="col-md-5">
                        <input type="text"
                            class="form-control question-text"
                            placeholder="Pregunta">
                    </div>
                    <div class="col-md-2">
                        <input type="text"
                            class="form-control question-unit"
                            placeholder="Unidad de medida">
                    </div>
                    <div class="col-md-3">
                        <input type="text"
                            class="form-control question-answer"
                            placeholder="Respuesta">
                    </div>
                    <div class="col-md-2 text-end">
                        <button type="button"
                            class="btn btn-danger btn-sm btn-remove-question">
                              <svg class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z"></path></svg>
                        </button>
                    </div>

                </div>

            </div>
        </div>
    `;
}


$(document).on('click', '.btn-add-question', function () {
    $('#questions-items').append(createQuestionRow());
});


$(document).on('click', '.btn-remove-question', function () {
    $(this).closest('.question-row').remove();
});

//// GUARDAR HOJA DE MATAR COMPLETA



    function buildDatosEjercicioJSON() {

        const data = {};

        $('.exercise-card').each(function () {

            const section = $(this).data('section');
            data[section] = [];

            $(this).find('.exercise-row').each(function () {

                const dato   = $(this).find('.exercise-dato').val();
                const valor  = $(this).find('.exercise-valor').val();
                const unidad = $(this).find('.exercise-unidad').val();

                if (dato || valor || unidad) {
                    data[section].push({
                        dato,
                        valor,
                        unidad
                    });
                }
            });
        });

        return data;
    }

function buildPreguntasJSON() {

    const preguntas = [];

    $('.question-row').each(function () {

        preguntas.push({
            pregunta:  $(this).find('.question-text').val(),
            unidad:    $(this).find('.question-unit').val(),
            respuesta: $(this).find('.question-answer').val()
        });
    });

    return preguntas;
}


$("#guardakillsheet").click(function (e) {
    e.preventDefault();

    const datosEjercicio = buildDatosEjercicioJSON();
    const preguntas = buildPreguntasJSON();

    console.log('DATOS_EJERCICIO_JSON:', datosEjercicio);
    console.log('PREGUNTAS_JSON:', preguntas);

    alertMensajeConfirm({
        title: "¿Desea guardar la hoja de matar?",
        text: "La información se guardará y podrá editarse después",
        icon: "question",
    }, async function () {

        await loaderbtn('guardakillsheet');

        await ajaxAwaitFormData(
            {
                api: 1,
                ID_INFORMACION_KILLSHEET: ID_INFORMACION_KILLSHEET,
                DATOS_EJERCICIO_JSON: JSON.stringify(datosEjercicio),
                PREGUNTAS_JSON: JSON.stringify(preguntas),
            },
            'KillsheetSave',
            'killsheet_fomr',
            'guardakillsheet',
            { callbackAfter: true, callbackBefore: true },

            () => {
                Swal.fire({
                    icon: 'info',
                    title: 'Espere un momento',
                    text: 'Estamos guardando la hoja de matar',
                    showConfirmButton: false
                });
                $('.swal2-popup').addClass('ld ld-breath');
            },

            function (data) {
                alertMensaje(
                    'success',
                    'Killsheet guardado correctamente',
                    'La información fue almacenada con éxito',
                    null,
                    null,
                    1500
                );

                console.log('ID INFO KILLSHEET:', data.id);
            }
        );

    }, 1);
});


///// TABLA 


var killsheetsDatatable = $("#killsheetsDatatable").DataTable({
    language: { url: "https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json" },
    lengthChange: true,
    lengthMenu: [
        [10, 25, 50, -1],
        [10, 25, 50, 'All']
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
        url: '/killsheetsDatatable',
        beforeSend: function () {
            // mostrarCarga();
        },
        complete: function () {
            killsheetsDatatable.columns.adjust().draw();
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
            render: function(data, type, row, meta) {
                return meta.row + 1; 
            }
        },
        { data: 'TIPO_ENTE_TEXT' },
        { data: 'TIPO_POZO_TEXT' },
        { data: 'TIPO_BOP_TEXT' },
        { data: 'TIPO_IDIOMA_TEXT' },
        { data: 'BTN_EDITAR' }
    ],
    columnDefs: [ 
        { targets: 0, title: '#', className: 'all  text-center' },
        { targets: 1, title: 'Certificación', className: 'all text-center' },
        { targets: 2, title: 'Tipo de Pozo', className: 'all text-center' },
        { targets: 3, title: 'Tipo de BOP', className: 'all text-center' },
        { targets: 4, title: 'Idioma', className: 'all text-center' },
        { targets: 5, title: 'Editar', className: 'all text-center' }
    ]
});



$('#killsheetsDatatable tbody').on('click', 'td>button.EDITAR', function () {

    var tr = $(this).closest('tr');
    var row = killsheetsDatatable.row(tr);
    var data = row.data();

    ID_INFORMACION_KILLSHEET = data.ID_INFORMACION_KILLSHEET;

    editarDatoTabla(data, 'killsheet_fomr', 'killsheet_modal');

  mostrarVistaKillsheet(data);
    
        obtenerDatosKillsheet(ID_INFORMACION_KILLSHEET);

    initSelectizeNiveles();
    cargarNivelesEdit(data);
    cargarDatosEjercicioEdit(data);
    cargarPreguntasEdit(data);
});


function mostrarVistaKillsheet(data) {

    $('#killsheet-views-container').removeClass('d-none');
    $('.killsheet-view').addClass('d-none');
    $('#btn-continuar-sec-2').addClass('d-none');

    const vista = $(`.killsheet-view[
        data-ente="${data.TIPO_ENTE_KILL}"
        ][data-pozo="${data.TIPO_POZO_KILL}"
        ][data-bop="${data.TIPO_BOP_KILL}"
        ][data-idioma="${data.TIPO_IDIOMA_KILL}"]`);

    if (vista.length === 0) {
        alertToast('No existe vista para esta combinación', 'error', 3000);
        return;
    }

    vista.removeClass('d-none');
}

function cargarInputsKillsheet(data) {

    Object.keys(data).forEach(key => {

        const $input = $(`[name="${key}"]`);

        if ($input.length) {

            if ($input.is(':checkbox')) {
                $input.prop('checked', data[key] == 1);
            }
            else if ($input.is(':radio')) {
                $(`input[name="${key}"][value="${data[key]}"]`)
                    .prop('checked', true);
            }
            else {
                $input.val(data[key]);
            }
        }
    });
}

function obtenerDatosKillsheet(infoId) {

    $.ajax({
        url: '/obtenerKillsheet',
        type: 'GET',
        data: {
            INFOKILLSHEET_ID: infoId
        },
        success: function (resp) {

            if (!resp.success) {
                alertToast(resp.message, 'error', 3000);
                return;
            }

            cargarInputsKillsheet(resp.data);
        },
        error: function () {
            alertToast('Error al cargar la hoja', 'error', 3000);
        }
    });
}



function cargarNivelesEdit(data) {

    const selectize = $('#NIVELES_KILLSHEET')[0]?.selectize;

    if (!selectize) return;

    selectize.clear();

    if (Array.isArray(data.NIVELES_KILLSHEET)) {
        selectize.setValue(data.NIVELES_KILLSHEET);
    }
}

function cargarDatosEjercicioEdit(data) {

    $('.exercise-items').empty();

    if (!data.DATOS_EJERCICIO_JSON) return;

    const datos = typeof data.DATOS_EJERCICIO_JSON === 'string'
        ? JSON.parse(data.DATOS_EJERCICIO_JSON)
        : data.DATOS_EJERCICIO_JSON;

    Object.keys(datos).forEach(section => {

        const container =
            $(`.exercise-card[data-section="${section}"] .exercise-items`);

        if (!container.length) return;

        datos[section].forEach(item => {

            const $row = $(createExerciseRow());

            $row.find('.exercise-dato').val(item.dato || '');
            $row.find('.exercise-valor').val(item.valor || '');
            $row.find('.exercise-unidad').val(item.unidad || '');

            container.append($row);
        });
    });
}

function cargarPreguntasEdit(data) {

    $('#questions-items').empty();

    if (!data.PREGUNTAS_JSON) return;

    const preguntas = typeof data.PREGUNTAS_JSON === 'string'
        ? JSON.parse(data.PREGUNTAS_JSON)
        : data.PREGUNTAS_JSON;

    preguntas.forEach(item => {

        const $row = $(createQuestionRow());

        $row.find('.question-text').val(item.pregunta || '');
        $row.find('.question-unit').val(item.unidad || '');
        $row.find('.question-answer').val(item.respuesta || '');

        $('#questions-items').append($row);
    });
}

