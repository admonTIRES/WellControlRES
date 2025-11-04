ID_MATH_EXERCISE = 0

$(document).ready(function () {
    $('#SOLUCIONIMG_MATH').dropify();
    var $select = $('#ENTE_MATH').selectize({
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
    var $select2 = $('#NIVELES_MATH').selectize({
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
    var $select3 = $('#BOP_MATH').selectize({
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
    var $select4 = $('#OPERATION_MATH').selectize({
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
    // RESET MODALS
    $('#mathModal').on('hidden.bs.modal', function () {
        ID_MATH_EXERCISE = 0;
        $('#mathForm')[0].reset();

        ['ENTE_MATH', 'NIVELES_MATH', 'BOP_MATH', 'OPERATION_MATH'].forEach(function (id) {
            var $select = $('#' + id);
            if ($select[0].selectize) {
                $select[0].selectize.clear();
            }
        });


        inicializarOpcionesPorDefecto();

        var $inputImg = $('#SOLUCIONIMG_MATH');
        if ($inputImg.data('dropify')) {
            $inputImg.dropify().data('dropify').resetPreview();
            $inputImg.dropify().data('dropify').clearElement();
            $inputImg.attr('required', false).removeClass('campo-requerido');
        }
        $('.ejercicio-fraccion, .ejercicio-general, .calculator-container').addClass('d-none');


        $('#mathModal .modal-title').text('Nuevo ejercicio de matemáticas');
    });
    // RESET MODALS - END
    //   CALCULADORA
   const screen = document.getElementById("screen");
    const buttons = document.querySelectorAll(".calculator .btn");
    
    let fieldJson = document.getElementById("CALCULADORA_MATH");
    if (!fieldJson) {
        fieldJson = document.createElement("input");
        fieldJson.type = "hidden";
        fieldJson.name = "CALCULADORA_MATH";
        fieldJson.id = "CALCULADORA_MATH";
        document.querySelector(".calculator-container").appendChild(fieldJson);
    }

    let currentInput = "";  
    let pressedKeys = [];    

    const operators = {
        "×": "*",
        "÷": "/",
        "−": "-",
        "+": "+",
        "^": "**"
    };

    function updateScreen(value) {
        screen.textContent = value || "0";
    }

    function updateJson() {
         const jsonValue = {
            sequence: pressedKeys,
            final: currentInput
        };
        fieldJson.value = JSON.stringify(jsonValue);
        console.log("JSON calculadora:", jsonValue);
    }

    buttons.forEach(btn => {
        btn.addEventListener("click", (e) => {
            e.preventDefault(); 
            const value = btn.textContent.trim();

            if (btn.id === "all-clear") {
                currentInput = "";
                // pressedKeys.push("C");
                pressedKeys = [];
                updateScreen(currentInput);
            } 
            else if (btn.id === "delete") {
                if (currentInput.length > 0) {
                    currentInput = currentInput.slice(0, -1);
                    pressedKeys.push("DEL");
                    updateScreen(currentInput);
                }
            } 
            else if (btn.id === "equals") {
                try {
                    const safeExp = currentInput.replace(/[×÷−]/g, m => operators[m]);
                    const result = Function('"use strict";return (' + safeExp + ')')();
                    currentInput = result.toString();
                    pressedKeys.push("=");
                    updateScreen(currentInput);
                } catch (err) {
                    updateScreen("Error");
                    console.error("Invalid expression:", err);
                }
            } 
            else {
                if (operators[value]) {
                    currentInput += operators[value];
                } else {
                    currentInput += value;
                }
                pressedKeys.push(value);
                updateScreen(currentInput);
            }
            updateJson();
        });
    });
    // CALCULADORA END
    $('#TIPO_MATH').on('change', function () {
        var valor = $(this).val();

        // Ocultar ambos bloques y eliminar required de todos los campos
        $('.ejercicio-fraccion').addClass('d-none');
        $('.ejercicio-general').addClass('d-none');
        $('.calculator-container').addClass('d-none');

        // Limpiar required
        $('#preguntaFraccion, #respuestaFraccion, #preguntaGeneral, #formula, #justificacionGeneral').prop('required', false);
        $('#imagenEjercicio').prop('required', false);

        if (valor === '3') {
            // Mostrar sección Fracción
            $('.ejercicio-fraccion').removeClass('d-none');
            $('.calculator-container').removeClass('d-none');
            // Activar required solo para campos de fracción
            $('#preguntaFraccion, #respuestaFraccion').prop('required', true);
        } else if (valor === '1' || valor === '2' || valor === '4' || valor === '5') {
            // Mostrar sección general
            $('.ejercicio-general').removeClass('d-none');
            $('.calculator-container').removeClass('d-none');
            // Activar required solo para campos generales
            $('#preguntaGeneral, #formula, #justificacionGeneral').prop('required', true);
            $('#imagenEjercicio').prop('required', true); // Si la imagen es obligatoria
        }
    });
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
        { data: 'TIPO' },
        { data: 'IDIOMA_NOMBRE' },
        { data: 'BTN_EDITAR' },
        { data: 'BTN_ACTIVO' }
    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center' },
        { targets: 1, title: 'Tipo', className: 'text-center' },
        { targets: 2, title: 'Idioma', className: 'text-center' },
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
                text: "El ejercicio se agregará al catálogo",
                icon: "question",
            }, async function () {
                await loaderbtn('mathbtnModal')
                await ajaxAwaitFormData({ api: 1, ID_MATH_EXERCISE: ID_MATH_EXERCISE }, 'mathSave', 'mathForm', 'mathbtnModal', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    ID_MATH_EXERCISE = data.math.ID_MATH_EXERCISE
                    alertMensaje('success', 'Información guardada correctamente', 'Esta información esta lista para usarse', null, null, 1500)
                    $('#mathModal').modal('hide')
                    document.getElementById('mathForm').reset();
                    mathDatatable.ajax.reload()
                })
            }, 1)

        } else {
            alertMensajeConfirm({
                title: "¿Desea editar la información de este formulario?",
                text: "Al guardarla, se podra usar",
                icon: "question",
            }, async function () {
                await loaderbtn('mathbtnModal')
                await ajaxAwaitFormData({ api: 1, ID_MATH_EXERCISE: ID_MATH_EXERCISE }, 'mathSave', 'mathForm', 'mathbtnModal', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    setTimeout(() => {
                        ID_MATH_EXERCISE = data.math.ID_MATH_EXERCISE
                        alertMensaje('success', 'Información editada correctamente', 'Información guardada')
                        $('#mathModal').modal('hide')
                        document.getElementById('mathForm').reset();
                        mathDatatable.ajax.reload()
                    }, 300);
                })
            }, 1)
        }

    } else {
        alertToast('Por favor, complete todos los campos del formulario.', 'error', 2000)

    }

});

$('#math-list-table tbody').on('click', 'td>button.EDITAR', function () {
    var tr = $(this).closest('tr');
    var row = mathDatatable.row(tr);
    var data = row.data();
    ID_MATH_EXERCISE = row.data().ID_MATH_EXERCISE;
    editarDatoTabla(row.data(), 'mathForm', 'mathModal', 1);
    $('#SOLUCIONIMG_MATH').val('');
    $('#SOLUCIONIMG_MATH').dropify().data('dropify').resetPreview();
    $('#SOLUCIONIMG_MATH').dropify().data('dropify').clearElement();

    // Inicializar campos selectize
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
        'ENTE_MATH',
        'NIVELES_MATH',
        'BOP_MATH',
        'OPERATION_MATH'
    ]);

    var $opcionesContainer = $('#OPCIONES_MATH');
    $opcionesContainer.empty();

    if (data.OPCIONES_MATH && Array.isArray(data.OPCIONES_MATH)) {
        data.OPCIONES_MATH.forEach(function (opcion, index) {
            var numero = index + 1;
            var texto = opcion.texto || '';
            var correcta = opcion.correcta ? 'checked' : '';
            var placeholder = `Escriba la opción ${String.fromCharCode(64 + numero)}`;

            var opcionHtml = `
            <div class="opcion-item mb-2">
                <div class="input-group">
                    <div class="input-group-text">
                        <input class="form-check-input mt-0" type="checkbox" 
                               name="respuesta_check[]" value="${numero}" ${correcta}>
                    </div>
                    <input type="text" class="form-control opcion-texto" 
                           name="respuesta_text[]" value="${texto}" placeholder="${placeholder}">
                </div>
            </div>
        `;
            $opcionesContainer.append(opcionHtml);
        });
    }

    var tipo = row.data().TIPO_MATH;
    $('.ejercicio-fraccion').addClass('d-none');
    $('.ejercicio-general').addClass('d-none');
    $('.calculator-container').addClass('d-none');
    if (tipo != null) {
        if (tipo === 3) {
            $('.ejercicio-fraccion').removeClass('d-none');
            $('.calculator-container').removeClass('d-none');
        } else {
            $('.ejercicio-general').removeClass('d-none');
            $('.calculator-container').removeClass('d-none');
        }
    }

    function manejarImagen(inputId, rutaImagen) {
        var $input = $('#' + inputId);

        if (rutaImagen) {
            // Limpiar la ruta y crear URL de storage
            var rutaLimpia = rutaImagen.replace(/\\/g, '/');
            var archivo = row.data().SOLUCIONIMG_MATH;
            var extension = archivo.substring(archivo.lastIndexOf("."));

            console.log('Ruta:', rutaLimpia);

            var imagenUrl = '/showImage/' + rutaLimpia;

            // Destruir dropify existente
            $input.dropify().data('dropify').destroy();

            // Configurar nueva imagen por defecto
            $input.dropify().data('dropify').settings.defaultFile = imagenUrl;
            $input.dropify().data('dropify').init();

            // No requerir el campo
            $input.attr('required', false);
            $input.removeClass('campo-requerido');

        } else {
            // Resetear campo si no hay imagen
            $input.val('');
            $input.dropify().data('dropify').resetPreview();
            $input.dropify().data('dropify').clearElement();
            $input.attr('required', false);
            $input.removeClass('campo-requerido');
        }
    }

    // Esperar a que los campos estén visibles antes de inicializar Dropify
    setTimeout(function () {
        manejarImagen('SOLUCIONIMG_MATH', data.SOLUCIONIMG_MATH);
    }, 200);
    $('#mathModal .modal-title').html(`Editar ejercicio ${row.data().ID_MATH_EXERCISE}`);
});

$('#math-list-table tbody').on('change', 'input.ACTIVAR', function () {
    var tr = $(this).closest('tr');
    var row = mathDatatable.row(tr);
    var estado = $(this).is(':checked') ? 1 : 0;

    var data = {
        api: 1,
        ACTIVAR: estado == 0 ? 1 : 0,
        ID_MATH_EXERCISE: row.data().ID_MATH_EXERCISE
    };

    eliminarDatoTabla(data, [mathDatatable], 'mathActive');
});

function inicializarOpcionesPorDefecto() {
    var $opcionesContainer = $('#OPCIONES_MATH');
    $opcionesContainer.html(`
        <div class="opcion-item mb-2">
            <div class="input-group">
                <div class="input-group-text">
                    <input class="form-check-input mt-0" type="checkbox" name="respuesta_check[]" value="1">
                </div>
                <input type="text" class="form-control opcion-texto" name="respuesta_text[]" placeholder="Opción A">
            </div>
        </div>
        <div class="opcion-item mb-2">
            <div class="input-group">
                <div class="input-group-text">
                    <input class="form-check-input mt-0" type="checkbox" name="respuesta_check[]" value="2">
                </div>
                <input type="text" class="form-control opcion-texto" name="respuesta_text[]" placeholder="Opción B">
            </div>
        </div>
        <div class="opcion-item mb-2">
            <div class="input-group">
                <div class="input-group-text">
                    <input class="form-check-input mt-0" type="checkbox" name="respuesta_check[]" value="3">
                </div>
                <input type="text" class="form-control opcion-texto" name="respuesta_text[]" placeholder="Opción C">
            </div>
        </div>
        <div class="opcion-item mb-2">
            <div class="input-group">
                <div class="input-group-text">
                    <input class="form-check-input mt-0" type="checkbox" name="respuesta_check[]" value="4">
                </div>
                <input type="text" class="form-control opcion-texto" name="respuesta_text[]" placeholder="Opción D">
            </div>
        </div>
    `);
}
