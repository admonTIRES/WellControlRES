ID_EXAM = 0
ID_QUESTION = 0

function manejarCambioTipo(selectorTipo, campoTexto, campoImagen) {
    $(selectorTipo).on('change', function () {
        const tipo = $(this).val();
        $(campoTexto).toggleClass('d-none', tipo !== '1');
        $(campoImagen).toggleClass('d-none', tipo !== '2');
    });
}

function manejarSeccionExtra(selectorCheckbox, seccion, campos) {
    $(selectorCheckbox).on('change', function () {
        const activo = $(this).is(':checked');
        $(seccion).toggleClass('opacity-50 pointer-events-none', !activo);
        campos.forEach(selector => {
            $(selector).prop('disabled', !activo);
        });
    });
}

$(document).ready(function () {
    $('#ANSWER_TYPE_QUESTION').on('change', function () {
        const tipo = $(this).val();
        if (tipo === '1') {
            $('#rangoRespuesta').removeClass('d-none');
            $('#selectorOpciones').addClass('d-none');
            $('#selectorCorrectas').addClass('d-none');
            $('#respuestas-container').hide();
        } else if (tipo === '2') {
            $('#rangoRespuesta').addClass('d-none');
            $('#selectorOpciones').removeClass('d-none');
            $('#selectorCorrectas').removeClass('d-none');
            $('#respuestas-container').show();
        } else {
            $('#rangoRespuesta').addClass('d-none');
            $('#selectorOpciones').addClass('d-none');
            $('#selectorCorrectas').addClass('d-none');
            $('#respuestas-container').hide();
        }
    });

    var $select = $('#ACCREDITATION_ENTITIES_QUESTION').selectize({
        plugins: ['remove_button'],
        delimiter: ',',
        persist: false,
        maxItems: null,
        create: false,
        onInitialize: function () {
            this.$control_input.prop('readonly', true);
        }
    });
    var selectizeInstance = $select[0].selectize;
    var $select2 = $('#LEVELS_QUESTION').selectize({
        plugins: ['remove_button'],
        delimiter: ',',
        persist: false,
        maxItems: null,
        create: false,
        onInitialize: function () {
            this.$control_input.prop('readonly', true);
        }
    });
    var selectizeInstance2 = $select2[0].selectize;
    var $select3 = $('#BOPS_QUESTION').selectize({
        plugins: ['remove_button'],
        delimiter: ',',
        persist: false,
        maxItems: null,
        create: false,
        onInitialize: function () {
            this.$control_input.prop('readonly', true);
        }
    });
    var selectizeInstance3 = $select3[0].selectize;
    var $select4 = $('#TOPICS_QUESTION').selectize({
        plugins: ['remove_button'],
        delimiter: ',',
        persist: false,
        maxItems: null,
        create: false,
        onInitialize: function () {
            this.$control_input.prop('readonly', true);
        }
    });
    var selectizeInstance4 = $select4[0].selectize;
    var $select5 = $('#SUBTOPICS_QUESTION').selectize({
        plugins: ['remove_button'],
        delimiter: ',',
        persist: false,
        maxItems: null,
        create: false,
        onInitialize: function () {
            this.$control_input.prop('readonly', true);
        }
    });
    var selectizeInstance5 = $select5[0].selectize;
    var $select6 = $('#ACCREDITATION_ENTITIES_EXAM').selectize({
        plugins: ['remove_button'],
        delimiter: ',',
        persist: false,
        maxItems: null,
        create: false,
        onInitialize: function () {
            this.$control_input.prop('readonly', true);
        }
    });

    var selectizeInstance6 = $select6[0].selectize;
    selectizeInstance6.on('change', function (value) {
        console.log("El valor seleccionado ha cambiado:", value);

        if (!value || (Array.isArray(value) && value.length === 0)) {
            console.warn("Valor vacío, no se hace petición");
            return;
        }

        if (Array.isArray(value)) {
            const selectedEnteIds = value;
            console.log("IDs seleccionados:", selectedEnteIds);

            $.ajax({
                url: '/temas', 
                type: 'GET',
                data: { entes: JSON.stringify(selectedEnteIds) },
                dataType: 'json', 
                success: function (data) {
                    console.log('Respuesta del servidor:', data);

                    const temasContainer = document.getElementById('temas-container');
                    temasContainer.innerHTML = '';

                    data.forEach(tema => {
                        const temaContainer = document.createElement('div');
                        temaContainer.classList.add('tema-container');
                        temaContainer.dataset.tema = tema.ID_CATALOGO_TEMAPREGUNTA;

                        const temaHeader = document.createElement('div');
                        temaHeader.classList.add('tema-header');
                        temaHeader.innerHTML = `
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="checkbox-wrapper">
                                <input type="checkbox" id="tema${tema.ID_CATALOGO_TEMAPREGUNTA}-check" onchange="toggleAllSubtemas(${tema.ID_CATALOGO_TEMAPREGUNTA}, this.checked)">
                                <h5 class="tema-title">${tema.NOMBRE_TEMA}</h5>
                            </div>
                            <i class="fas fa-chevron-down expand-icon" id="icon-${tema.ID_CATALOGO_TEMAPREGUNTA}"></i>
                        </div>
                    `;

                        temaContainer.appendChild(temaHeader);

                        const subtemasContainer = document.createElement('div');
                        subtemasContainer.classList.add('subtemas-container');
                        subtemasContainer.id = `subtemas-${tema.ID_CATALOGO_TEMAPREGUNTA}`;

                        tema.subtemas.forEach(subtema => {
                            const subtemaItem = document.createElement('div');
                            subtemaItem.classList.add('subtema-item');
                            subtemaItem.innerHTML = `
                            <div class="checkbox-wrapper">
                                <input type="checkbox" id="subtema${subtema.ID_CATALOGO_SUBTEMA}-check" onchange="updateCalculos()">
                                <h6 class="subtema-title">${subtema.NOMBRE_SUBTEMA}</h6>
                            </div>
                            <div class="control-row">
                                <div class="time-input-group">
                                    <label class="form-label small">Preguntas:</label>
                                    <input type="number" class="form-control small" min="1" max="50" value="5" onchange="updateCalculos()">
                                </div>
                                <div class="time-input-group">
                                    <label class="form-label small">Rango de tiempo (min):</label>
                                    <input type="number" class="form-control small" placeholder="Min" min="1" max="300" value="3" onchange="updateCalculos()">
                                    <span>-</span>
                                    <input type="number" class="form-control small" placeholder="Max" min="1" max="300" value="6" onchange="updateCalculos()">
                                </div>
                                <div class="time-input-group">
                                    <label class="form-label small">Puntajes (pts):</label>
                                    <input type="number" class="form-control small" placeholder="Min" min="1" max="100" value="1" onchange="updateCalculos()">
                                    <span>-</span>
                                    <input type="number" class="form-control small" placeholder="Max" min="1" max="100" value="10" onchange="updateCalculos()">
                                </div>
                            </div>
                        `;

                            subtemasContainer.appendChild(subtemaItem);
                        });

                        temaContainer.appendChild(subtemasContainer);
                        temasContainer.appendChild(temaContainer);
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error al cargar los temas:', error);
                    alert('Hubo un problema al cargar los temas');
                }
            });
        } else {
            console.warn('El valor recibido no es un array:', value);
        }
    });

    var $select7 = $('#LEVELS_EXAM').selectize({
        plugins: ['remove_button'],
        delimiter: ',',
        persist: false,
        maxItems: null,
        create: false,
        onInitialize: function () {
            this.$control_input.prop('readonly', true);
        }
    });
    var selectizeInstance7 = $select7[0].selectize;
    var $select8 = $('#BOPS_EXAM').selectize({
        plugins: ['remove_button'],
        delimiter: ',',
        persist: false,
        maxItems: null,
        create: false,
        onInitialize: function () {
            this.$control_input.prop('readonly', true);
        }
    });
    var selectizeInstance8 = $select8[0].selectize;
    var $select9 = $('#EVALUATION_TYPES_QUESTION').selectize({
        plugins: ['remove_button'],
        delimiter: ',',
        persist: false,
        maxItems: null,
        create: false,
        onInitialize: function () {
            this.$control_input.prop('readonly', true);
        }
    });
    var selectizeInstance9 = $select9[0].selectize;
    var $select10 = $('#EVALUATION_TYPES_EXAM').selectize({
        plugins: ['remove_button'],
        delimiter: ',',
        persist: false,
        maxItems: null,
        create: false,
        onInitialize: function () {
            this.$control_input.prop('readonly', true);
        }
    });
    var selectizeInstance10 = $select10[0].selectize;

    $('.dropify').dropify();
    // RESET MODALS
    $('#examModal').on('hidden.bs.modal', function () {
        ID_EXAM = 0;
        $('#examForm')[0].reset();
        $('#examModal .modal-title').text('New exam');
    });

    $('#questionModal').on('hidden.bs.modal', function () {
        ID_QUESTION = 0;
        $('#questionForm')[0].reset();
        selectizeInstance.clear();
        selectizeInstance2.clear();
        selectizeInstance3.clear();
        selectizeInstance4.clear();
        selectizeInstance5.clear();
        selectizeInstance9.clear();
        $('#respuestas-container').hide();

        $(campoTexto).toggleClass('d-none', tipo !== '1');
        $(campoImagen).toggleClass('d-none', tipo !== '2');
        $('#IMAGEN1_QUESTION').val('');
        $('#IMAGEN1_QUESTION').dropify().data('dropify').resetPreview();
        $('#IMAGEN1_QUESTION').dropify().data('dropify').clearElement();
        $('#IMAGEN1_QUESTION').attr('required', true);

        $('#IMAGEN2_QUESTION').val('');
        $('#IMAGEN2_QUESTION').dropify().data('dropify').resetPreview();
        $('#IMAGEN2_QUESTION').dropify().data('dropify').clearElement();
        $('#IMAGEN2_QUESTION').attr('required', true);

        $('#IMAGEN3_QUESTION').val('');
        $('#IMAGEN3_QUESTION').dropify().data('dropify').resetPreview();
        $('#IMAGEN3_QUESTION').dropify().data('dropify').clearElement();
        $('#IMAGEN3_QUESTION').attr('required', true);
        $('#questionModal .modal-title').html("Nueva pregunta");


        $('#questionModal .modal-title').text('New question');
    });
    // RESET MODALS - END

    manejarCambioTipo('#TIPO1_QUESTION', '#campoTexto', '#campoImagen');
    manejarCambioTipo('#TIPO2_QUESTION', '#campoTexto2', '#campoImagen2');
    manejarCambioTipo('#TIPO3_QUESTION', '#campoTexto3', '#campoImagen3');

    $('#HAS_FEEDBACK_QUESTION').on('change', function () {
        $('#feedbackTextContainer').toggleClass('d-none', $(this).val() !== '1');
    });

    manejarSeccionExtra('#activarSeccionExtra', '#seccionExtra', ['#TIPO2_QUESTION', '#TEXTO2_QUESTION']);
    manejarSeccionExtra('#activarSeccionExtra2', '#seccionExtra2', ['#TIPO3_QUESTION', '#TEXTO3_QUESTION']);


    let numOpciones = 0;
    let numRespuestasCorrectas = 0;
    let respuestasSeleccionadas = 0;
    $('.checkbox-container').hide();
    $('#ANSWER_OPTIONS_QUESTION').on('change', function () {
        numOpciones = parseInt($(this).val()) || 0;
        actualizarOpciones();
        actualizarMaximoRespuestasCorrectas();
    });

    $('#CORRECT_ANSWERS_QUESTION').on('change', function () {
        numRespuestasCorrectas = parseInt($(this).val()) || 0;

        if (numRespuestasCorrectas > numOpciones) {
            Toast.fire({
                icon: 'error',
                title: 'El número de respuestas correctas no puede ser mayor que el número de opciones',
                timer: 3000,
                // width: 'auto'
            });
            $(this).val('');
            numRespuestasCorrectas = 0;
        }

        resetearCheckboxes();
    });

    function actualizarMaximoRespuestasCorrectas() {
        const selectRespuestasCorrectas = $('#CORRECT_ANSWERS_QUESTION');

        const valorActual = selectRespuestasCorrectas.val();

        selectRespuestasCorrectas.find('option:not(:first-child)').remove();

        for (let i = 1; i < numOpciones; i++) {
            selectRespuestasCorrectas.append(`<option value="${i}">${i}</option>`);
        }

        if (valorActual && parseInt(valorActual) <= numOpciones) {
            selectRespuestasCorrectas.val(valorActual);
        } else {
            selectRespuestasCorrectas.val('');
        }
    }

    function actualizarOpciones() {
        $('.checkbox-container').hide();

        for (let i = 1; i <= numOpciones; i++) {
            $(`#respuesta${i}`).show();
        }

        resetearCheckboxes();
    }

    function resetearCheckboxes() {
        $('input[type="checkbox"]').prop('checked', false);
        $('.checkbox-wrapper').removeClass('correct incorrect');
        respuestasSeleccionadas = 0;
    }

    $('#respuestas-container input[type="checkbox"]').on('change', function () {
        const checkeados = $('#respuestas-container input[type="checkbox"]:checked').length;

        if (checkeados > numRespuestasCorrectas) {
            $(this).prop('checked', false);
            Toast.fire({
                icon: 'error',
                title: 'No puede seleccionar más respuestas correctas de las indicadas',
                timer: 3000,
                // width: 'auto'
            });
            return;
        }

        actualizarEstilosCheckboxes();
    });

    function actualizarEstilosCheckboxes() {
        for (let i = 1; i <= numOpciones; i++) {
            const checkbox = $(`#respuesta${i}-check`);
            const contenedor = checkbox.closest('.checkbox-wrapper');

            if (checkbox.is(':checked')) {
                contenedor.addClass('correct').removeClass('incorrect');
            } else {
                contenedor.addClass('incorrect').removeClass('correct');
            }
        }
    }

    function toggleTema(temaId) {
        const subtemas = document.getElementById(`subtemas-${temaId}`);
        const icon = document.getElementById(`icon-${temaId}`);
        const header = document.querySelector(`[data-tema="${temaId}"] .tema-header`);

        if (subtemas.style.display === 'none' || subtemas.style.display === '') {
            subtemas.style.display = 'block';
            icon.classList.add('rotated');
            header.classList.add('active');
        } else {
            subtemas.style.display = 'none';
            icon.classList.remove('rotated');
            header.classList.remove('active');
        }
    }


    function toggleAllSubtemas(temaId, isChecked) {
        const subtemasContainer = document.getElementById('subtemas-' + temaId);
        const subtemas = subtemasContainer.querySelectorAll('.subtema-item input[type="checkbox"]');

        subtemas.forEach(subtema => {
            subtema.checked = isChecked;
        });

        if (isChecked) {
            subtemasContainer.style.display = 'block'; 
        } else {
            subtemasContainer.style.display = 'none';
        }
    }

    function updateCalculos() {
        [1, 2].forEach(temaId => {
            updateTemaCalculos(temaId);
        });
        updateTotalGeneral();
    }

    function updateTemaCalculos(temaId) {
        let totalPreguntas = 0;
        let totalTiempo = 0;
        let totalPuntaje = 0;

        const subtemas = document.querySelectorAll(`#subtemas-${temaId} .subtema-item`);

        // subtemas.forEach(subtema => {
        //     const checkbox = subtema.querySelector('input[type="checkbox"]');
        //     if (checkbox.checked) {
        //         const preguntasInput = subtema.querySelector('input[type="number"]');
        //         const tiempoMaxInput = subtema.querySelectorAll('input[type="number"]')[2];

        //         const preguntas = parseInt(preguntasInput.value) || 0;
        //         const tiempoMax = parseInt(tiempoMaxInput.value) || 0;

        //         totalPreguntas += preguntas;
        //         totalTiempo += (preguntas * tiempoMax);
        //     }
        // });

        subtemas.forEach(subtema => {
            const checkbox = subtema.querySelector('input[type="checkbox"]');
            if (checkbox.checked) {
                const inputs = subtema.querySelectorAll('input[type="number"]');

                const preguntas = parseInt(inputs[0].value) || 0;
                const tiempoMin = parseInt(inputs[1].value) || 0;
                const tiempoMax = parseInt(inputs[2].value) || 0;
                const puntajeMin = parseInt(inputs[3].value) || 0;
                const puntajeMax = parseInt(inputs[4].value) || 0;

                totalPreguntas += preguntas;
                totalTiempo += (preguntas * tiempoMax);
                totalPuntaje += (preguntas * puntajeMax);
            }
        });

        const resumen = document.getElementById(`resumen-tema-${temaId}`);
        resumen.querySelector('.preguntas-count').textContent = totalPreguntas;
        resumen.querySelector('.tiempo-total').textContent = totalTiempo;
        const puntajeElement = resumen.querySelector('.puntaje-total');
        if (puntajeElement) {
            puntajeElement.textContent = totalPuntaje;
        }
    }

    // function updateTotalGeneral() {
    //     let totalPreguntas = 0;
    //     let totalTiempo = 0;

    //     [1, 2].forEach(temaId => {
    //         const preguntas = parseInt(document.querySelector(`#resumen-tema-${temaId} .preguntas-count`).textContent) || 0;
    //         const tiempo = parseInt(document.querySelector(`#resumen-tema-${temaId} .tiempo-total`).textContent) || 0;

    //         totalPreguntas += preguntas;
    //         totalTiempo += tiempo;
    //     });

    //     document.getElementById('total-preguntas').textContent = totalPreguntas;
    //     document.getElementById('total-tiempo').textContent = totalTiempo;
    //     document.getElementById('total-minutos').textContent = Math.round(totalTiempo / 60);
    // }


    function updateTotalGeneral() {
        let totalPreguntas = 0;
        let totalTiempo = 0;
        let totalPuntaje = 0;

        [1, 2].forEach(temaId => {
            const preguntas = parseInt(document.querySelector(`#resumen-tema-${temaId} .preguntas-count`).textContent) || 0;
            const tiempo = parseInt(document.querySelector(`#resumen-tema-${temaId} .tiempo-total`).textContent) || 0;

            const puntajeElement = document.querySelector(`#resumen-tema-${temaId} .puntaje-total`);
            const puntaje = puntajeElement ? parseInt(puntajeElement.textContent) || 0 : 0;

            totalPreguntas += preguntas;
            totalTiempo += tiempo;
            totalPuntaje += puntaje;
        });

        document.getElementById('total-preguntas').textContent = totalPreguntas;
        // document.getElementById('total-tiempo').textContent = totalTiempo;
        document.getElementById('total-tiempo').value = totalTiempo;


        const puntajeTotalElement = document.getElementById('total-puntaje');
        if (puntajeTotalElement) {
            puntajeTotalElement.textContent = totalPuntaje;
        }
    }


    window.toggleTema = toggleTema;
    window.toggleAllSubtemas = toggleAllSubtemas;
    window.updateCalculos = updateCalculos;

    document.addEventListener('DOMContentLoaded', function () {


        updateCalculos();
    });


});

// DATATABLES
var questionDatatable = $("#question-list-table").DataTable({
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
        url: '/questionDatatable',
        beforeSend: function () {
            // mostrarCarga();
        },
        complete: function () {
            questionDatatable.columns.adjust().draw();
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
        { data: 'FOLIO_PREGUNTA' },
        { data: 'TIPO_EVALUACION_NOMBRES' },
        { data: 'CERTIFICACIONES_NOMBRES' },
        { data: 'NIVELES_NOMBRES' },
        { data: 'IDIOMA_NOMBRE' },
        { data: 'BTN_EDITAR' },
        { data: 'BTN_ACTIVO' }
    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center' },
        { targets: 1, title: 'Folio', className: 'text-center' },
        { targets: 2, title: 'Tipos de evaluación', className: 'text-center' },
        { targets: 3, title: 'Entes acreditadores', className: 'text-center' },
        { targets: 4, title: 'Niveles de acreditación', className: 'text-center' },
        { targets: 5, title: 'Idiomas', className: 'text-center' },
        { targets: 6, title: 'Editar', className: 'text-center' },
        { targets: 7, title: 'Activo', className: 'text-center' }
    ]

});
var examDatatable = $("#exam-list-table").DataTable({
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
        url: '/examDatatable',
        beforeSend: function () {
            // mostrarCarga();
        },
        complete: function () {
            examDatatable.columns.adjust().draw();
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
        { data: 'NAME_EXAM' },
        { data: 'TIPO_EVALUACION_NOMBRES' },
        { data: 'CERTIFICACIONES_NOMBRES' },        
        { data: 'NIVELES_NOMBRES' },
        { data: 'IDIOMA_NOMBRE' },
        { data: 'BTN_EDITAR' },
        { data: 'BTN_ACTIVO' }
    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center' },
        { targets: 1, title: 'Nombre', className: 'text-center' },
        { targets: 2, title: 'Tipo de evaluación', className: 'text-center' },
        { targets: 3, title: 'Entes acreditadores', className: 'text-center' },
        { targets: 4, title: 'Niveles de acreditación', className: 'text-center' },
        { targets: 5, title: 'Idiomas', className: 'text-center' },
        { targets: 6, title: 'Editar', className: 'text-center' },
        { targets: 7, title: 'Activo', className: 'text-center' }
    ]

});
// DATATABLES-END

//GUARDAR
$("#saveQuestionBtn").click(function (e) {
    e.preventDefault();
    formularioValido = validarFormulario($('#questionForm'))
    if (formularioValido) {
        if (ID_QUESTION == 0) {
            alertMensajeConfirm({
                title: "¿Desea guardar esta pregunta?",
                text: "La pregunta se guardará en el cátalogo de preguntas",
                icon: "question",
            }, async function () {
                await loaderbtn('saveQuestionBtn')
                await ajaxAwaitFormData({ api: 1, ID_QUESTION }, 'questionSave', 'questionForm', 'saveQuestionBtn', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    ID_QUESTION = data.question.ID_QUESTION
                    alertMensaje('success', 'Información guardada correctamente', 'Lista para usarse')
                    $('#questionModal').modal('hide')
                    document.getElementById('questionForm').reset()
                    questionDatatable.ajax.reload()
                })
            }, 1)
        } else {
            alertMensajeConfirm({
                title: "¿Desea editar la información de este formulario?",
                text: "Al guardarla, se podrá usar",
                icon: "question",
            }, async function () {
                await loaderbtn('saveQuestionBtn')
                await ajaxAwaitFormData({ api: 1, ID_QUESTION }, 'questionSave', 'questionForm', 'saveQuestionBtn', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    setTimeout(() => {
                        ID_QUESTION = data.question.ID_QUESTION
                        alertMensaje('success', 'Información editada correctamente', 'Información guardada')
                        $('#questionModal').modal('hide')
                        document.getElementById('questionForm').reset()
                        questionDatatable.ajax.reload()
                    }, 300)
                })
            }, 1)
        }
    } else {
        alertToast('Por favor, complete todos los campos del formulario.', 'error', 2000)
    }
})

$("#saveExamBtn").click(function (e) {
    e.preventDefault();
    formularioValido = validarFormulario($('#examForm'))
    if (formularioValido) {
        const temasSeleccionados = generarJsonTemasYSubtemas();
        console.log("JSON generado:", JSON.stringify(temasSeleccionados, null, 2));

        const inputHidden = document.createElement('input');
        inputHidden.type = 'hidden';
        inputHidden.name = 'TEMAS_EXAM';
        inputHidden.value = JSON.stringify(temasSeleccionados);
        document.getElementById('examForm').appendChild(inputHidden);
        if (ID_EXAM == 0) {
            alertMensajeConfirm({
                title: "¿Desea guardar este exámen?",
                text: "El exámen se guardará en el cátalogo de exámenes",
                icon: "question",
            }, async function () {
                await loaderbtn('saveExamBtn')
                await ajaxAwaitFormData({ api: 2, ID_EXAM }, 'examSave', 'examForm', 'saveExamBtn', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    ID_EXAM = data.exam.ID_EXAM
                    alertMensaje('success', 'Información guardada correctamente', 'Lista para usarse')
                    $('#examModal').modal('hide')
                    document.getElementById('examForm').reset()
                    examDatatable.ajax.reload()
                })
            }, 1)
        } else {
            alertMensajeConfirm({
                title: "¿Desea editar la información de este formulario?",
                text: "Al guardarla, se podrá usar",
                icon: "question",
            }, async function () {
                await loaderbtn('saveExamBtn')
                await ajaxAwaitFormData({ api: 2, ID_EXAM }, 'examSave', 'examForm', 'saveExamBtn', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    setTimeout(() => {
                        ID_EXAM = data.exam.ID_EXAM
                        alertMensaje('success', 'Información editada correctamente', 'Información guardada')
                        $('#examModal').modal('hide')
                        document.getElementById('examForm').reset()
                        examDatatable.ajax.reload()
                    }, 300)
                })
            }, 1)
        }
    } else {
        alertToast('Por favor, complete todos los campos del formulario.', 'error', 2000)
    }
})

function generarJsonTemasYSubtemas() {
    const temas = [];

    document.querySelectorAll('.tema-container').forEach(temaDiv => {
        const temaId = parseInt(temaDiv.dataset.tema);
        const temaNombre = temaDiv.querySelector('.tema-title').textContent.trim();
        const subtemasActivos = [];

        temaDiv.querySelectorAll('.subtema-item').forEach(subDiv => {
            const check = subDiv.querySelector('input[type="checkbox"]');
            if (check && check.checked) {
                const idSubtema = parseInt(check.id.replace('subtema', '').replace('-check', ''));
                const nombreSubtema = subDiv.querySelector('.subtema-title').textContent.trim();

                const inputs = subDiv.querySelectorAll('input[type="number"]');
                const numPreguntas = parseInt(inputs[0].value || 0);
                const tiempoMin = parseInt(inputs[1].value || 0);
                const tiempoMax = parseInt(inputs[2].value || 0);
                const puntajeMin = parseInt(inputs[3].value || 0);
                const puntajeMax = parseInt(inputs[4].value || 0);

                subtemasActivos.push({
                    id_subtema: idSubtema,
                    nombre_subtema: nombreSubtema,
                    num_preguntas: numPreguntas,
                    tiempo_min: tiempoMin,
                    tiempo_max: tiempoMax,
                    puntaje_min: puntajeMin,
                    puntaje_max: puntajeMax
                });
            }
        });

        if (subtemasActivos.length > 0) {
            temas.push({
                id_tema: temaId,
                nombre_tema: temaNombre,
                subtemas: subtemasActivos
            });
        }
    });

    return temas;
}


//ACTIVAR
$('#question-list-table tbody').on('change', 'input.ACTIVAR', function () {
    var tr = $(this).closest('tr');
    var row = questionDatatable.row(tr);
    var estado = $(this).is(':checked') ? 1 : 0;

    var data = {
        api: 1,
        ACTIVAR: estado == 0 ? 1 : 0,
        ID_QUESTION: row.data().ID_QUESTION
    };

    eliminarDatoTabla(data, [questionDatatable], 'questionActive');
});
$('#exam-list-table tbody').on('change', 'input.ACTIVAR', function () {
    var tr = $(this).closest('tr');
    var row = examDatatable.row(tr);
    var estado = $(this).is(':checked') ? 1 : 0;

    var data = {
        api: 2,
        ACTIVAR: estado == 0 ? 1 : 0,
        ID_EXAM: row.data().ID_EXAM
    };

    eliminarDatoTabla(data, [examDatatable], 'examActive');
});
//EDITAR
$('#question-list-table tbody').on('click', 'td>button.EDITAR', function () {
    var tr = $(this).closest('tr');
    var row = questionDatatable.row(tr);
    var rowData = row.data();
    ID_QUESTION = row.data().ID_QUESTION;

    editarDatoTabla(row.data(), 'questionForm', 'questionModal', 1);
    $('#TEXTO1_QUESTION').val(rowData.TEXTO1_QUESTION || '');
    $('#TEXTO2_QUESTION').val(rowData.TEXTO2_QUESTION || '');
    $('#TEXTO3_QUESTION').val(rowData.TEXTO3_QUESTION || '');
    $('#TEXTO1_QUESTION').removeClass('campo-requerido');
    $('#TEXTO2_QUESTION').removeClass('campo-requerido');
    $('#TEXTO3_QUESTION').removeClass('campo-requerido');

    $('#IMAGEN1_QUESTION').val('');
    $('#IMAGEN1_QUESTION').dropify().data('dropify').resetPreview();
    $('#IMAGEN1_QUESTION').dropify().data('dropify').clearElement();

    $('#IMAGEN2_QUESTION').val('');
    $('#IMAGEN2_QUESTION').dropify().data('dropify').resetPreview();
    $('#IMAGEN2_QUESTION').dropify().data('dropify').clearElement();

    $('#IMAGEN3_QUESTION').val('');
    $('#IMAGEN3_QUESTION').dropify().data('dropify').resetPreview();
    $('#IMAGEN3_QUESTION').dropify().data('dropify').clearElement();
    if (rowData.SECCION_EXTRA1) {
        $('#activarSeccionExtra').prop('checked', true);
        $('#seccionExtra').removeClass('opacity-50 pointer-events-none');
        $('#TIPO2_QUESTION').prop('disabled', false);
        $('#TIPO2_QUESTION').val(rowData.TIPO2_QUESTION || '').trigger('change');
    }

    if (rowData.SECCION_EXTRA2) {
        $('#activarSeccionExtra2').prop('checked', true);
        $('#seccionExtra2').removeClass('opacity-50 pointer-events-none');
        $('#TIPO3_QUESTION').prop('disabled', false);
        $('#TIPO3_QUESTION').val(rowData.TIPO3_QUESTION || '').trigger('change');
    }

    $('#TIPO1_QUESTION').val(rowData.TIPO1_QUESTION || '').trigger('change');
    $('#TIPO2_QUESTION').val(rowData.TIPO2_QUESTION || '').trigger('change');
    $('#TIPO3_QUESTION').val(rowData.TIPO3_QUESTION || '').trigger('change');


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
        'ACCREDITATION_ENTITIES_QUESTION',
        'LEVELS_QUESTION',
        'BOPS_QUESTION',
        'TOPICS_QUESTION',
        'SUBTOPICS_QUESTION',
        'EVALUATION_TYPES_QUESTION'
    ]);

    function manejarImagen(inputId, rutaImagen) {
        var $input = $('#' + inputId);

        if (rutaImagen) {
            var rutaLimpia = rutaImagen.replace(/\\/g, '/');
            var archivo = row.data().IMAGEN1_QUESTION;
            var extension = archivo.substring(archivo.lastIndexOf("."));

            console.log('Ruta:', rutaLimpia);

            var imagenUrl = '/showImage/' + rutaLimpia;

            $input.dropify().data('dropify').destroy();

            $input.dropify().data('dropify').settings.defaultFile = imagenUrl;
            $input.dropify().data('dropify').init();

            $input.attr('required', false);
            $input.removeClass('campo-requerido');

        } else {
            $input.val('');
            $input.dropify().data('dropify').resetPreview();
            $input.dropify().data('dropify').clearElement();
            $input.attr('required', false);
            $input.removeClass('campo-requerido');
        }
    }

    setTimeout(function () {
        if (rowData.TIPO1_QUESTION == '2') {
            manejarImagen('IMAGEN1_QUESTION', rowData.IMAGEN1_QUESTION);
        }

        if (rowData.TIPO2_QUESTION == '2') {
            manejarImagen('IMAGEN2_QUESTION', rowData.IMAGEN2_QUESTION);
        }

        if (rowData.TIPO3_QUESTION == '2') {
            manejarImagen('IMAGEN3_QUESTION', rowData.IMAGEN3_QUESTION);
        }
    }, 200);

    actualizarVisibilidadTipos();
    actualizarRespuestas();
    llenarCheckboxes(row);

    $('#questionModal .modal-title').html("Editar pregunta con folio: " + row.data().FOLIO_PREGUNTA);
});

$('#exam-list-table tbody').on('click', 'td>button.EDITAR', function () {
    var tr = $(this).closest('tr');
    var row = examDatatable.row(tr);
    var rowData = row.data();
    ID_EXAM = row.data().ID_EXAM;

    editarDatoTabla(row.data(), 'examForm', 'examModal', 1);
    // $('#TEXTO1_QUESTION').val(rowData.TEXTO1_QUESTION || '');
    // $('#TEXTO2_QUESTION').val(rowData.TEXTO2_QUESTION || '');
    // $('#TEXTO3_QUESTION').val(rowData.TEXTO3_QUESTION || '');
    // $('#TEXTO1_QUESTION').removeClass('campo-requerido');
    // $('#TEXTO2_QUESTION').removeClass('campo-requerido');
    // $('#TEXTO3_QUESTION').removeClass('campo-requerido');

    // $('#IMAGEN1_QUESTION').val('');
    // $('#IMAGEN1_QUESTION').dropify().data('dropify').resetPreview();
    // $('#IMAGEN1_QUESTION').dropify().data('dropify').clearElement();

    // $('#IMAGEN2_QUESTION').val('');
    // $('#IMAGEN2_QUESTION').dropify().data('dropify').resetPreview();
    // $('#IMAGEN2_QUESTION').dropify().data('dropify').clearElement();

    // $('#IMAGEN3_QUESTION').val('');
    // $('#IMAGEN3_QUESTION').dropify().data('dropify').resetPreview();
    // $('#IMAGEN3_QUESTION').dropify().data('dropify').clearElement();
    // if (rowData.SECCION_EXTRA1) {
    //     $('#activarSeccionExtra').prop('checked', true);
    //     $('#seccionExtra').removeClass('opacity-50 pointer-events-none');
    //     $('#TIPO2_QUESTION').prop('disabled', false);
    //     $('#TIPO2_QUESTION').val(rowData.TIPO2_QUESTION || '').trigger('change');
    // }

    // if (rowData.SECCION_EXTRA2) {
    //     $('#activarSeccionExtra2').prop('checked', true);
    //     $('#seccionExtra2').removeClass('opacity-50 pointer-events-none');
    //     $('#TIPO3_QUESTION').prop('disabled', false);
    //     $('#TIPO3_QUESTION').val(rowData.TIPO3_QUESTION || '').trigger('change');
    // }

    // $('#TIPO1_QUESTION').val(rowData.TIPO1_QUESTION || '').trigger('change');
    // $('#TIPO2_QUESTION').val(rowData.TIPO2_QUESTION || '').trigger('change');
    // $('#TIPO3_QUESTION').val(rowData.TIPO3_QUESTION || '').trigger('change');


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
        'ACCREDITATION_ENTITIES_EXAM',
        'LEVELS_EXAM',
        'BOPS_EXAM',
        'EVALUATION_TYPES_EXAM'
    ]);

    $('#questionModal .modal-title').html("Editar pregunta con folio: " + row.data().FOLIO_PREGUNTA);
});

function actualizarVisibilidadTipos() {
    $('#TIPO1_QUESTION').trigger('change');
    $('#TIPO2_QUESTION').trigger('change');
    $('#TIPO3_QUESTION').trigger('change');
    $('#HAS_FEEDBACK_QUESTION').trigger('change');

    const extra1Activo = $('#activarSeccionExtra').is(':checked');
    $('#seccionExtra').toggleClass('opacity-50 pointer-events-none', !extra1Activo);
    $('#TIPO2_QUESTION, #TEXTO2_QUESTION').prop('disabled', !extra1Activo);

    const extra2Activo = $('#activarSeccionExtra2').is(':checked');
    $('#seccionExtra2').toggleClass('opacity-50 pointer-events-none', !extra2Activo);
    $('#TIPO3_QUESTION, #TEXTO3_QUESTION').prop('disabled', !extra2Activo);
}

function actualizarRespuestas() {
    $('#ANSWER_TYPE_QUESTION').trigger('change');
    $('#ANSWER_OPTIONS_QUESTION').trigger('change');
    $('#CORRECT_ANSWERS_QUESTION').trigger('change');
}

function llenarCheckboxes(row) {

    $('input[type="checkbox"]').prop('checked', false);
    $('.checkbox-wrapper').removeClass('correct incorrect');
    respuestasSeleccionadas = 0;

    row.data().ANSWERS_QUESTION.forEach(function (answer, index) {
        var i = index + 1;

        var $checkbox = $('#respuesta' + i + '-check');
        var $textInput = $('#respuesta' + i + '-text');

        if ($textInput.length) {
            $textInput.val(answer.texto || '');
        }

        if ($checkbox.length && answer.correcta) {
            $checkbox.prop('checked', true);
            $checkbox.closest('.checkbox-wrapper').addClass('correct');
            respuestasSeleccionadas++;
        } else {
            $checkbox.closest('.checkbox-wrapper').addClass('incorrect');
        }



    });
}




