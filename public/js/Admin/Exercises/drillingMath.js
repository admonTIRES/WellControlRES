ID_MATH_EXERCISE = 0

$(document).ready(function () {
    $('#SOLUCIONIMG_MATH').dropify();
    // RESET MODALS
    $('#mathModal').on('hidden.bs.modal', function () {

            ID_MATH_EXERCISE = 0;
            $('#mathForm')[0].reset();

            inicializarOpcionesPorDefecto();

            var $inputImg = $('#SOLUCIONIMG_MATH');
            if ($inputImg.data('dropify')) {
                $inputImg.dropify().data('dropify').resetPreview();
                $inputImg.dropify().data('dropify').clearElement();
                $inputImg.attr('required', false).removeClass('campo-requerido');
            }

            $('.ejercicio-fraccion, .ejercicio-general, .calculator-container')
                .addClass('d-none');

            window.displayInput = "";
            window.evalInput = "";
            window.pressedKeys = [];

            const screen = document.getElementById('screen');
            if (screen) {
                screen.textContent = "Enter";
            }

            const fieldJson = document.getElementById('CALCULADORA_MATH');
            if (fieldJson) {
                fieldJson.value = "";
            }

            $('#mathModal .modal-title').text('Nuevo ejercicio de matemáticas');
        });




        // ================= CALCULADORA =================

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

            window.displayInput = "";
            window.evalInput = "";
            window.pressedKeys = [];

            const FRACTION_SYMBOL = '⁄'; 

            const operators = {
                "×": "*",
                "÷": "/",
                "−": "-",
                "+": "+",
                "^": "^",
                "log": "log(",
                "ln": "log(",
                "sin": "sin(",
                "cos": "cos(",
                "tan": "tan(",
                "√": "sqrt(",
                "^2": "^2",
                "^3": "^3",
                "^(-1)": "^(-1)",
                "EXP": "e"
            };

            const displayOverrides = {
                "^2": "²",
                "^3": "³",
                "^(-1)": "⁻¹"
            };

            const constants = {
                "π": "pi"
            };


            function updateScreen(value) {
                screen.textContent = value || "0";
            }

            function formatResult(value) {
                if (!Number.isFinite(value)) return value;

                const str = value.toString();
                if (!str.includes('.')) return value;

                const [entero, decimales] = str.split('.');
                if (decimales.length > 4) {
                    return Number(`${entero}.${decimales.slice(0, 4)}`);
                }
                return value;
            }

            function updateJson() {
                const jsonValue = {
                    sequence: pressedKeys,
                    display: displayInput,
                    evaluated: evalInput
                };
                fieldJson.value = JSON.stringify(jsonValue);
                console.log("JSON calculadora:", jsonValue);
            }


            buttons.forEach(btn => {
                btn.addEventListener("click", (e) => {
                    e.preventDefault();

                    const value = btn.getAttribute("data-value") || btn.textContent.trim();
                    const cleanedValue = value.replace(/\s+/g, "").trim();

                    if (btn.id === "all-clear") {
                        displayInput = "";
                        evalInput = "";
                        pressedKeys = [];
                        updateScreen(displayInput);
                    }

                    else if (btn.id === "delete") {
                        displayInput = displayInput.slice(0, -1);
                        evalInput = evalInput.slice(0, -1);
                        pressedKeys.push("DEL");
                        updateScreen(displayInput);
                    }

                    else if (btn.id === "equals") {
                        try {
                            let result = math.evaluate(evalInput);
                            result = formatResult(result);

                            displayInput = result.toString();
                            evalInput = displayInput;

                            pressedKeys.push("=");
                            updateScreen(displayInput);
                        } catch (err) {
                            updateScreen("Error");
                            console.error("Invalid expression:", err);
                        }
                    }

                    else if (cleanedValue === "ab/c") {

                        displayInput += FRACTION_SYMBOL;

                        evalInput += "/";

                        pressedKeys.push("ab/c");
                        updateScreen(displayInput);
                    }

                    else {
                        if (displayOverrides[cleanedValue]) {
                            displayInput += displayOverrides[cleanedValue];
                        } else {
                            displayInput += cleanedValue;
                        }

                        if (operators[cleanedValue]) {
                            evalInput += operators[cleanedValue];
                        } else if (constants[cleanedValue]) {
                            evalInput += constants[cleanedValue];
                        } else {
                            evalInput += cleanedValue;
                        }

                        pressedKeys.push(value);
                        updateScreen(displayInput);
                    }

                    updateJson();
                });
            });



        // ================= FIN CALCULADORA =================

            
            
    
    
    
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
      scrollX: true,
    autoWidth: false,
    responsive: false,
    paging: true,
    searching: true,
    filtering: true,
    lengthChange: true,
    info: true,   
    scrollY: false,
    scrollCollapse: false,
    fixedHeader: false,    
    lengthMenu: [[10, 25, 50, -1], [10, 25, 50, 'Todos']],

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
        {
            data: null,
            render: function (data, type, row) {

                const tipo = row.TIPO_MATH;

                // Tipos: 1,2,4,5 → PREGUNTA_MATH
                if ([1, 2, 4, 5].includes(parseInt(tipo))) {
                    return row.PREGUNTA_MATH ?? '';
                }

                // Tipo: 3 → FRACCION_MATH
                if (parseInt(tipo) === 3) {
                    return row.FRACCION_MATH ?? '';
                }

                return '';
            }
        },
        { data: 'BTN_EDITAR' },
        { data: 'BTN_ACTIVO' }
    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center' },
        { targets: 1, title: 'Tipo', className: 'text-center' },
        { targets: 2, title: 'Idioma', className: 'text-center' },
        { targets: 3, title: 'Ejercicio', className: 'text-center' },
        { targets: 4, title: 'Editar', className: 'text-center' },
        { targets: 5, title: 'Activo', className: 'text-center' }
    ],
    infoCallback: function (settings, start, end, max, total, pre) {
        return `Total de ${total} registros`;
    },

    rowCallback: function (row, data) {

    const tipo = parseInt(data.TIPO_MATH);

    // Tipos válidos
    const tiposConCalculadora = [1, 2, 3, 4];

    // Validar si NO tiene calculadora
    const sinCalculadora =
        !data.CALCULADORA_MATH ||
        !data.CALCULADORA_MATH.sequence ||
        !Array.isArray(data.CALCULADORA_MATH.sequence) ||
        data.CALCULADORA_MATH.sequence.length === 0;

    if (tiposConCalculadora.includes(tipo) && sinCalculadora) {
        $(row).css('background-color', '#f8d7da');
    }
}

    
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

// $('#math-list-table tbody').on('click', 'td>button.EDITAR', function () {
//     var tr = $(this).closest('tr');
//     var row = mathDatatable.row(tr);
//     var data = row.data();
//     ID_MATH_EXERCISE = row.data().ID_MATH_EXERCISE;
//     editarDatoTabla(row.data(), 'mathForm', 'mathModal', 1);

    
//     $('#SOLUCIONIMG_MATH').val('');
//     $('#SOLUCIONIMG_MATH').dropify().data('dropify').resetPreview();
//     $('#SOLUCIONIMG_MATH').dropify().data('dropify').clearElement();
//     const screen = document.getElementById("screen");
//     screen.textContent = "0";

    
//     var $opcionesContainer = $('#OPCIONES_MATH');
//     $opcionesContainer.empty();

//     if (data.OPCIONES_MATH && Array.isArray(data.OPCIONES_MATH)) {
//         data.OPCIONES_MATH.forEach(function (opcion, index) {
//             var numero = index + 1;
//             var texto = opcion.texto || '';
//             var correcta = opcion.correcta ? 'checked' : '';
//             var placeholder = `Escriba la opción ${String.fromCharCode(64 + numero)}`;

//             var opcionHtml = `
//             <div class="opcion-item mb-2">
//                 <div class="input-group">
//                     <div class="input-group-text">
//                         <input class="form-check-input mt-0" type="checkbox"
//                                name="respuesta_check[]" value="${numero}" ${correcta}>
//                     </div>
//                     <input type="text" class="form-control opcion-texto"
//                            name="respuesta_text[]" value="${texto}" placeholder="${placeholder}">
//                 </div>
//             </div>
//         `;
//             $opcionesContainer.append(opcionHtml);
//         });
//     }

//     var tipo = row.data().TIPO_MATH;
//     $('.ejercicio-fraccion').addClass('d-none');
//     $('.ejercicio-general').addClass('d-none');
//     $('.calculator-container').addClass('d-none');
//     if (tipo != null) {
//         if (tipo === 3) {
//             $('.ejercicio-fraccion').removeClass('d-none');
//             $('.calculator-container').removeClass('d-none');
//         } else {
//             $('.ejercicio-general').removeClass('d-none');
//             $('.calculator-container').removeClass('d-none');
//         }
//     }

//     function manejarImagen(inputId, rutaImagen) {
//         var $input = $('#' + inputId);

//         if (rutaImagen) {
//             var rutaLimpia = rutaImagen.replace(/\\/g, '/');
//             var archivo = row.data().SOLUCIONIMG_MATH;
//             var extension = archivo.substring(archivo.lastIndexOf("."));

//             console.log('Ruta:', rutaLimpia);

//             var imagenUrl = '/showImage/' + rutaLimpia;

//             $input.dropify().data('dropify').destroy();
//             $input.dropify().data('dropify').settings.defaultFile = imagenUrl;
//             $input.dropify().data('dropify').init();

//             $input.attr('required', false);
//             $input.removeClass('campo-requerido');


//         } else {
//             $input.val('');
//             $input.dropify().data('dropify').resetPreview();
//             $input.dropify().data('dropify').clearElement();
//             $input.attr('required', false);
//             $input.removeClass('campo-requerido');
//         }
//     }

//     // Esperar a que los campos estén visibles antes de inicializar Dropify
//     setTimeout(function () {
//         manejarImagen('SOLUCIONIMG_MATH', data.SOLUCIONIMG_MATH);
//     }, 200);
//     $('#mathModal .modal-title').html(`Editar ejercicio ${row.data().ID_MATH_EXERCISE}`);
// });


$('#math-list-table tbody').on('click', 'td>button.EDITAR', function () {

    var tr = $(this).closest('tr');
    var row = mathDatatable.row(tr);
    var data = row.data();
    ID_MATH_EXERCISE = data.ID_MATH_EXERCISE;

    editarDatoTabla(data, 'mathForm', 'mathModal', 1);

    // ===================== TU CÓDIGO ORIGINAL =====================

    $('#SOLUCIONIMG_MATH').val('');
    $('#SOLUCIONIMG_MATH').dropify().data('dropify').resetPreview();
    $('#SOLUCIONIMG_MATH').dropify().data('dropify').clearElement();

    const screen = document.getElementById("screen");
    screen.textContent = "0";

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

    var tipo = data.TIPO_MATH;
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


    var calculadoraData = data.CALCULADORA_MATH || null;

    if (typeof calculadoraData === 'string') {
        try {
            calculadoraData = JSON.parse(calculadoraData);
        } catch (e) {
            calculadoraData = null;
        }
    }

    if (calculadoraData && calculadoraData.final !== undefined) {
        calculadoraData = {
            sequence: calculadoraData.sequence || [],
            display: calculadoraData.final,
            evaluated: calculadoraData.final
        };
    }

    if (calculadoraData && calculadoraData.display !== undefined) {
        calculadoraData = {
            sequence: calculadoraData.sequence || [],
            display: calculadoraData.display,
            evaluated: calculadoraData.evaluated ?? calculadoraData.display
        };
    }


    if (calculadoraData) {

        window.displayInput = calculadoraData.display || "";
        window.evalInput = calculadoraData.evaluated || "";
        window.pressedKeys = Array.isArray(calculadoraData.sequence)
            ? calculadoraData.sequence
            : [];

        const screenCalc = document.getElementById("screen");
        if (screenCalc) {
            screenCalc.textContent = window.displayInput || "Enter";
        }

        $('#CALCULADORA_MATH').val(JSON.stringify(calculadoraData));
    }


    function manejarImagen(inputId, rutaImagen) {
        var $input = $('#' + inputId);

        if (rutaImagen) {
            var rutaLimpia = rutaImagen.replace(/\\/g, '/');
            var imagenUrl = '/showImage/' + rutaLimpia;

            $input.dropify().data('dropify').destroy();
            $input.dropify().data('dropify').settings.defaultFile = imagenUrl;
            $input.dropify().data('dropify').init();

            $input.attr('required', false).removeClass('campo-requerido');
        } else {
            $input.val('');
            $input.dropify().data('dropify').resetPreview();
            $input.dropify().data('dropify').clearElement();
            $input.attr('required', false).removeClass('campo-requerido');
        }
    }

    setTimeout(function () {
        manejarImagen('SOLUCIONIMG_MATH', data.SOLUCIONIMG_MATH);
    }, 200);

    $('#mathModal .modal-title')
        .html(`Editar ejercicio ${data.ID_MATH_EXERCISE}`);

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
