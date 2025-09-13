ID_EXAM_EXERCISE = 0
ID_QUESTION = 0

    // Función para alternar campos según el tipo (texto o imagen)
function manejarCambioTipo(selectorTipo, campoTexto, campoImagen) {
    $(selectorTipo).on('change', function () {
        const tipo = $(this).val();
        $(campoTexto).toggleClass('d-none', tipo !== '1');
        $(campoImagen).toggleClass('d-none', tipo !== '2');
    });
}

// Función para activar o desactivar secciones extra
function manejarSeccionExtra(selectorCheckbox, seccion, campos) {
    $(selectorCheckbox).on('change', function () {
        const activo = $(this).is(':checked');
        $(seccion).toggleClass('opacity-50 pointer-events-none', !activo);
        campos.forEach(selector => {
            $(selector).prop('disabled', !activo);
        });
    });
}
$(document).ready(function() {
    $('#ANSWER_TYPE_QUESTION').on('change', function () {
        const tipo = $(this).val();

        if (tipo === '1') {
            // Mostrar rango, ocultar opciones y respuestas
            $('#rangoRespuesta').removeClass('d-none');
            $('#selectorOpciones').addClass('d-none');
            $('#selectorCorrectas').addClass('d-none');
            $('#respuestas-container').hide();
        } else if (tipo === '2') {
            // Ocultar rango, mostrar opciones y respuestas
            $('#rangoRespuesta').addClass('d-none');
            $('#selectorOpciones').removeClass('d-none');
            $('#selectorCorrectas').removeClass('d-none');
            $('#respuestas-container').show();
        } else {
            // Si selecciona "Seleccionar..." (valor 0), ocultar todo
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
            // Desactiva la escritura del input interno
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
            // Desactiva la escritura del input interno
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
            // Desactiva la escritura del input interno
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
            // Desactiva la escritura del input interno
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
            // Desactiva la escritura del input interno
            this.$control_input.prop('readonly', true);
        }
    });
    var selectizeInstance5 = $select5[0].selectize;
    var $select6 = $('#ENTE1_MATH').selectize({
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
    var $select7 = $('#NIVEL1_MATH').selectize({
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
    var $select8 = $('#BOP1_MATH').selectize({
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
    var selectizeInstance8 = $select8[0].selectize;
    var $select9 = $('#EVALUATION_TYPES_QUESTION').selectize({
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
    var selectizeInstance9 = $select9[0].selectize;
    var $select10 = $('#TIPOEXAM_QUESTION').selectize({
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
    var selectizeInstance10 = $select10[0].selectize;

    $('.dropify').dropify();
    // RESET MODALS
    $('#examModal').on('hidden.bs.modal', function() {
        ID_EXAM_EXERCISE = 0;
        $('#examForm')[0].reset();
        $('#examModal .modal-title').text('New exam');
    });

    $('#questionModal').on('hidden.bs.modal', function() {
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

  

    // Mostrar campos según selección
    // $('#TIPO1_QUESTION').on('change', function () {
    //     const tipo = $(this).val();
    //     $('#campoTexto').toggleClass('d-none', tipo !== '1');
    //     $('#campoImagen').toggleClass('d-none', tipo !== '2');
    // });

    // $('#TIPO2_QUESTION').on('change', function () {
    //     const tipo = $(this).val();
    //     $('#campoTexto2').toggleClass('d-none', tipo !== '1');
    //     $('#campoImagen2').toggleClass('d-none', tipo !== '2');
    // });

    // $('#TIPO3_QUESTION').on('change', function () {
    //     const tipo = $(this).val();
    //     $('#campoTexto3').toggleClass('d-none', tipo !== '1');
    //     $('#campoImagen3').toggleClass('d-none', tipo !== '2');
    // });

    // $('#HAS_FEEDBACK_QUESTION').on('change', function () {
    //     const tipo = $(this).val();
    //     $('#feedbackTextContainer').toggleClass('d-none', tipo !== '1');
    // });

    // $('#activarSeccionExtra').on('change', function () {
    //     const activo = $(this).is(':checked');

    //     $('#seccionExtra')
    //         .toggleClass('opacity-50 pointer-events-none', !activo);

    //     $('#TIPO2_QUESTION, #TEXTO2_QUESTION').prop('disabled', !activo);
        
    // });

    // $('#activarSeccionExtra2').on('change', function () {
    //     const activo = $(this).is(':checked');

    //     $('#seccionExtra2')
    //         .toggleClass('opacity-50 pointer-events-none', !activo);

    //     $('#TIPO3_QUESTION, #TEXTO3_QUESTION').prop('disabled', !activo);
        
    // });



// Aplicar funciones para cada sección
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
    $('#ANSWER_OPTIONS_QUESTION').on('change', function() {
        numOpciones = parseInt($(this).val()) || 0;
        actualizarOpciones();
        actualizarMaximoRespuestasCorrectas();
    });
    
    $('#CORRECT_ANSWERS_QUESTION').on('change', function() {
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
        
        // Reiniciar los checkboxes
        resetearCheckboxes();
    }
    
    // Función para reiniciar los checkboxes
    function resetearCheckboxes() {
        $('input[type="checkbox"]').prop('checked', false);
        $('.checkbox-wrapper').removeClass('correct incorrect');
        respuestasSeleccionadas = 0;
    }
    
    // Manejar el clic en los checkboxes
    $('#respuestas-container input[type="checkbox"]').on('change', function() {
        // Contar cuántos checkboxes están seleccionados
        const checkeados = $('#respuestas-container input[type="checkbox"]:checked').length;

        // Si se están seleccionando más de los permitidos, deseleccionar este
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
        
        // Actualizar los estilos según estén checkeados o no
        actualizarEstilosCheckboxes();
    });
    
    // Función para actualizar los estilos de los checkboxes
    function actualizarEstilosCheckboxes() {
        // Recorrer los checkboxes visibles
        for (let i = 1; i <= numOpciones; i++) {
            const checkbox = $(`#respuesta${i}-check`);
            const contenedor = checkbox.closest('.checkbox-wrapper');
            
            // Aplicar la clase según esté checkeado o no
            if (checkbox.is(':checked')) {
                contenedor.addClass('correct').removeClass('incorrect');
            } else {
                contenedor.addClass('incorrect').removeClass('correct');
            }
        }
    }
   
        // SOLUCIÓN 1: Hacer las funciones globales explícitamente
// En tu archivo JS separado (ej: tema-selector.js)

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

function toggleAllSubtemas(temaId, checked) {
    const subtemas = document.querySelectorAll(`#subtemas-${temaId} input[type="checkbox"]`);
    subtemas.forEach(checkbox => {
        checkbox.checked = checked;
    });
    updateCalculos();
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
            
            // Obtener valores de los inputs
            const preguntas = parseInt(inputs[0].value) || 0;        // Preguntas
            const tiempoMin = parseInt(inputs[1].value) || 0;        // Tiempo mínimo
            const tiempoMax = parseInt(inputs[2].value) || 0;        // Tiempo máximo
            const puntajeMin = parseInt(inputs[3].value) || 0;       // Puntaje mínimo
            const puntajeMax = parseInt(inputs[4].value) || 0;       // Puntaje máximo
            
            // Calcular totales
            totalPreguntas += preguntas;
            totalTiempo += (preguntas * tiempoMax); // Usar tiempo máximo para el cálculo
            totalPuntaje += (preguntas * puntajeMax); // Usar puntaje máximo para el cálculo
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
    
    // Sumar todos los temas
    [1, 2].forEach(temaId => {
        const preguntas = parseInt(document.querySelector(`#resumen-tema-${temaId} .preguntas-count`).textContent) || 0;
        const tiempo = parseInt(document.querySelector(`#resumen-tema-${temaId} .tiempo-total`).textContent) || 0;
        
        // Obtener puntaje si existe el elemento
        const puntajeElement = document.querySelector(`#resumen-tema-${temaId} .puntaje-total`);
        const puntaje = puntajeElement ? parseInt(puntajeElement.textContent) || 0 : 0;
        
        totalPreguntas += preguntas;
        totalTiempo += tiempo;
        totalPuntaje += puntaje;
    });
    
    // Actualizar totales generales
    document.getElementById('total-preguntas').textContent = totalPreguntas;
    // document.getElementById('total-tiempo').textContent = totalTiempo;
    document.getElementById('total-tiempo').value = totalTiempo;

    
    // Agregar puntaje total si tienes el elemento
    const puntajeTotalElement = document.getElementById('total-puntaje');
    if (puntajeTotalElement) {
        puntajeTotalElement.textContent = totalPuntaje;
    }
}


    // Hacer las funciones explícitamente globales
    window.toggleTema = toggleTema;
    window.toggleAllSubtemas = toggleAllSubtemas;
    window.updateCalculos = updateCalculos;

    // Inicializar cuando el DOM esté listo
    document.addEventListener('DOMContentLoaded', function() {
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
// DATATABLES-END

let calendar;
let selectizeInstance;
let events = [];
let currentEventId = null;

document.addEventListener('DOMContentLoaded', function() {
    // Inicializar Selectize
    const $select = $('#gruposSelect').selectize({
        plugins: ['remove_button'],
        delimiter: ',',
        persist: false,
        maxItems: null,
        create: false,
        onInitialize: function () {
            this.$control_input.prop('readonly', true);
        }
    });
    selectizeInstance = $select[0].selectize;
    
    // Inicializar calendario
    const calendarEl = document.getElementById('calendar');
    calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        buttonText: {
            today: 'Hoy',
            month: 'Mes',
            week: 'Semana',
            day: 'Día'
        },
        height: 'auto',
        events: events,
        eventClick: function(info) {
            editEvent(info.event.id);
        },
        dateClick: function(info) {
            // Establecer fecha seleccionada en el modal
            document.getElementById('startDate').value = info.dateStr;
            document.getElementById('endDate').value = info.dateStr;
            $('#eventModal').modal('show');
        }
    });
    
    calendar.render();
    
    // Event listeners
    document.getElementById('saveEvent').addEventListener('click', saveEvent);
    
    // Establecer valores por defecto
    setDefaultDateTime();
    updateEventsList();
});

function setDefaultDateTime() {
    const now = new Date();
    const today = now.toISOString().split('T')[0];
    
    document.getElementById('startDate').value = today;
    document.getElementById('endDate').value = today;
    document.getElementById('startHour').value = now.getHours();
    document.getElementById('startMin').value = now.getMinutes();
    document.getElementById('endHour').value = now.getHours() + 2;
    document.getElementById('endMin').value = now.getMinutes();
}

function saveEvent() {
    const title = document.getElementById('eventTitle').value;
    const startDate = document.getElementById('startDate').value;
    const startHour = document.getElementById('startHour').value;
    const startMin = document.getElementById('startMin').value;
    const startSec = document.getElementById('startSec').value || 0;
    const startTimezone = document.getElementById('startTimezone').value;
    
    const endDate = document.getElementById('endDate').value;
    const endHour = document.getElementById('endHour').value;
    const endMin = document.getElementById('endMin').value;
    const endSec = document.getElementById('endSec').value || 0;
    const endTimezone = document.getElementById('endTimezone').value;
    
    const selectedGroups = selectizeInstance.getValue();
    
    if (!title || !startDate || !endDate || startHour === '' || startMin === '' || endHour === '' || endMin === '') {
        alert('Por favor completa todos los campos obligatorios');
        return;
    }
    
    if (selectedGroups.length === 0) {
        alert('Por favor selecciona al menos un grupo');
        return;
    }
    
    // Crear fechas con zona horaria
    const startDateTime = new Date(`${startDate}T${String(startHour).padStart(2,'0')}:${String(startMin).padStart(2,'0')}:${String(startSec).padStart(2,'0')}`);
    const endDateTime = new Date(`${endDate}T${String(endHour).padStart(2,'0')}:${String(endMin).padStart(2,'0')}:${String(endSec).padStart(2,'0')}`);
    
    if (endDateTime <= startDateTime) {
        alert('La fecha de fin debe ser posterior a la fecha de inicio');
        return;
    }
    
    const eventData = {
        id: currentEventId || 'event_' + Date.now(),
        title: title,
        start: startDateTime,
        end: endDateTime,
        startTimezone: startTimezone,
        endTimezone: endTimezone,
        grupos: selectedGroups,
        backgroundColor: getRandomColor(),
        borderColor: getRandomColor()
    };
    
    if (currentEventId) {
        // Editar evento existente
        const eventIndex = events.findIndex(e => e.id === currentEventId);
        if (eventIndex !== -1) {
            events[eventIndex] = eventData;
        }
        calendar.getEventById(currentEventId).remove();
    } else {
        // Nuevo evento
        events.push(eventData);
    }
    
    calendar.addEvent(eventData);
    updateEventsList();
    
    // Limpiar formulario
    clearForm();
    $('#eventModal').modal('hide');
    currentEventId = null;
}

function editEvent(eventId) {
    const event = events.find(e => e.id === eventId);
    if (!event) return;
    
    currentEventId = eventId;
    
    // Llenar formulario con datos del evento
    document.getElementById('eventTitle').value = event.title;
    
    const startDate = new Date(event.start);
    const endDate = new Date(event.end);
    
    document.getElementById('startDate').value = startDate.toISOString().split('T')[0];
    document.getElementById('startHour').value = startDate.getHours();
    document.getElementById('startMin').value = startDate.getMinutes();
    document.getElementById('startSec').value = startDate.getSeconds();
    document.getElementById('startTimezone').value = event.startTimezone || 'America/Mexico_City';
    
    document.getElementById('endDate').value = endDate.toISOString().split('T')[0];
    document.getElementById('endHour').value = endDate.getHours();
    document.getElementById('endMin').value = endDate.getMinutes();
    document.getElementById('endSec').value = endDate.getSeconds();
    document.getElementById('endTimezone').value = event.endTimezone || 'America/Mexico_City';
    
    selectizeInstance.setValue(event.grupos);
    
    $('#eventModal').modal('show');
}

function deleteEvent(eventId) {
    if (confirm('¿Estás seguro de que quieres eliminar este evento?')) {
        events = events.filter(e => e.id !== eventId);
        calendar.getEventById(eventId).remove();
        updateEventsList();
    }
}

function clearForm() {
    document.getElementById('eventForm').reset();
    selectizeInstance.clear();
    setDefaultDateTime();
}

function updateEventsList() {
    const eventsListEl = document.getElementById('eventsList');
    
    if (events.length === 0) {
        eventsListEl.innerHTML = '<p class="text-muted"><i class="fas fa-info-circle"></i> No hay eventos programados</p>';
        return;
    }
    
    eventsListEl.innerHTML = events.map(event => {
        const startDate = new Date(event.start);
        const endDate = new Date(event.end);
        const gruposText = event.grupos.map(g => {
            const option = document.querySelector(`#gruposSelect option[value="${g}"]`);
            return option ? option.textContent : g;
        });
        
        return `
            <div class="event-item">
                <div class="event-title">
                    ${event.title}
                    <span class="delete-event" onclick="deleteEvent('${event.id}')" title="Eliminar evento">
                        <i class="fas fa-trash"></i>
                    </span>
                </div>
                <div class="event-details">
                    <i class="fas fa-clock"></i> 
                    <strong>Inicio:</strong> ${startDate.toLocaleString()} (${event.startTimezone || 'Local'})
                    <br>
                    <strong>Fin:</strong> ${endDate.toLocaleString()} (${event.endTimezone || 'Local'})
                </div>
                <div class="event-groups">
                    <i class="fas fa-users"></i> <strong>Grupos:</strong><br>
                    ${gruposText.map(grupo => `<span class="group-badge">${grupo}</span>`).join('')}
                </div>
            </div>
        `;
    }).join('');
}

function getRandomColor() {
    const colors = ['#FF6B6B', '#4ECDC4', '#45B7D1', '#96CEB4', '#FFEAA7', '#DDA0DD', '#98D8C8', '#F7DC6F'];
    return colors[Math.floor(Math.random() * colors.length)];
}

// Limpiar formulario al cerrar modal
$('#eventModal').on('hidden.bs.modal', function () {
    if (!currentEventId) {
        clearForm();
    }
    currentEventId = null;
});


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
    // Activar secciones extra si aplica
    if(rowData.SECCION_EXTRA1) {
        $('#activarSeccionExtra').prop('checked', true);
        $('#seccionExtra').removeClass('opacity-50 pointer-events-none');
        $('#TIPO2_QUESTION').prop('disabled', false);
        $('#TIPO2_QUESTION').val(rowData.TIPO2_QUESTION || '').trigger('change');
    }

    if(rowData.SECCION_EXTRA2) {
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
            // Limpiar la ruta y crear URL de storage
            var rutaLimpia = rutaImagen.replace(/\\/g, '/'); 
            var archivo = row.data().IMAGEN1_QUESTION;
            var extension = archivo.substring(archivo.lastIndexOf("."));
            
            console.log('Ruta:', rutaLimpia);

            var imagenUrl = '/showImage/'+ rutaLimpia;
            
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
    setTimeout(function() {
        // Manejar las imágenes según el tipo usando el controlador
        if(rowData.TIPO1_QUESTION == '2') {
            manejarImagen('IMAGEN1_QUESTION', rowData.IMAGEN1_QUESTION);
        }
        
        if(rowData.TIPO2_QUESTION == '2') {
            manejarImagen('IMAGEN2_QUESTION', rowData.IMAGEN2_QUESTION);
        }
        
        if(rowData.TIPO3_QUESTION == '2') {
            manejarImagen('IMAGEN3_QUESTION', rowData.IMAGEN3_QUESTION);
        }
    }, 200);


    actualizarVisibilidadTipos();
    
    actualizarRespuestas();
    llenarCheckboxes(row);


    $('#questionModal .modal-title').html("Editar pregunta con folio: " + row.data().FOLIO_PREGUNTA);

});

function actualizarVisibilidadTipos() {
    $('#TIPO1_QUESTION').trigger('change');
    $('#TIPO2_QUESTION').trigger('change');
    $('#TIPO3_QUESTION').trigger('change');
    $('#HAS_FEEDBACK_QUESTION').trigger('change');

    // Verificamos los checkboxes que controlan secciones extra
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

    row.data().ANSWERS_QUESTION.forEach(function(answer, index) {
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
        }else{
            $checkbox.closest('.checkbox-wrapper').addClass('incorrect');
        }



    });
}




