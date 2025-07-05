ID_EXAM_EXERCISE = 0
ID_QUESTION = 0

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
    // RESET MODALS
    $('#examModal').on('hidden.bs.modal', function() {
        ID_EXAM_EXERCISE = 0;
        $('#examForm')[0].reset();
        $('#examModal .modal-title').text('New exam');
    });

    $('#questionModal').on('hidden.bs.modal', function() {
        ID_QUESTION_EXERCISE = 0;
        $('#questionForm')[0].reset();
        $('#questionModal .modal-title').text('New question');
    });
    // RESET MODALS - END

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

    // Mostrar campos según selección
    $('#TIPO1_QUESTION').on('change', function () {
        const tipo = $(this).val();
        $('#campoTexto').toggleClass('d-none', tipo !== '1');
        $('#campoImagen').toggleClass('d-none', tipo !== '2');
    });

    $('#TIPO2_QUESTION').on('change', function () {
        const tipo = $(this).val();
        $('#campoTexto2').toggleClass('d-none', tipo !== '1');
        $('#campoImagen2').toggleClass('d-none', tipo !== '2');
    });

    $('#TIPO3_QUESTION').on('change', function () {
        const tipo = $(this).val();
        $('#campoTexto3').toggleClass('d-none', tipo !== '1');
        $('#campoImagen3').toggleClass('d-none', tipo !== '2');
    });

        $('#HAS_FEEDBACK_QUESTION').on('change', function () {
        const tipo = $(this).val();
        $('#retroText').toggleClass('d-none', tipo !== '1');
    });

    // Activar segunda sección
    $('#activarSeccionExtra').on('change', function () {
        const activo = $(this).is(':checked');

        $('#seccionExtra')
            .toggleClass('opacity-50 pointer-events-none', !activo);

        $('#TIPO2_QUESTION, #TEXTO2_QUESTION').prop('disabled', !activo);
        
    });

    // Activar tercera sección
    $('#activarSeccionExtra2').on('change', function () {
        const activo = $(this).is(':checked');

        $('#seccionExtra2')
            .toggleClass('opacity-50 pointer-events-none', !activo);

        $('#TIPO3_QUESTION, #TEXTO3_QUESTION').prop('disabled', !activo);
        
    });

    let numOpciones = 0;
    let numRespuestasCorrectas = 0;
    let respuestasSeleccionadas = 0;
    $('.checkbox-container').hide();
    // Cuando cambia el número de opciones
    $('#ANSWER_OPTIONS_QUESTION').on('change', function() {
        numOpciones = parseInt($(this).val()) || 0;
        actualizarOpciones();
        actualizarMaximoRespuestasCorrectas();
    });
    
    // Cuando cambia el número de respuestas correctas
    $('#CORRECT_ANSWERS_QUESTION').on('change', function() {
        numRespuestasCorrectas = parseInt($(this).val()) || 0;
        
        // Verificar que el número de respuestas correctas no exceda el número de opciones
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
        
        // Reiniciar los checkboxes si cambia el número de respuestas correctas
        resetearCheckboxes();
    });
    
    // Función para actualizar el máximo de respuestas correctas en el select
    function actualizarMaximoRespuestasCorrectas() {
        // Obtener el select de respuestas correctas
        const selectRespuestasCorrectas = $('#CORRECT_ANSWERS_QUESTION');
        
        // Guardar el valor actual
        const valorActual = selectRespuestasCorrectas.val();
        
        // Limpiar el select excepto la primera opción
        selectRespuestasCorrectas.find('option:not(:first-child)').remove();
        
        // Añadir opciones según el número de opciones seleccionado
        for (let i = 1; i < numOpciones; i++) {
            selectRespuestasCorrectas.append(`<option value="${i}">${i}</option>`);
        }
        
        // Restaurar el valor si es posible
        if (valorActual && parseInt(valorActual) <= numOpciones) {
            selectRespuestasCorrectas.val(valorActual);
        } else {
            selectRespuestasCorrectas.val('');
        }
    }
    
    // Función para mostrar/ocultar opciones según la selección
    function actualizarOpciones() {
        // Ocultar todas las opciones primero
        $('.checkbox-container').hide();
        
        // Mostrar solo las opciones necesarias
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
    scrollCollapse: true,
    responsive: true,
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
        { data: 'TOPICS_QUESTION' },
        { data: 'SUBTOPICS_QUESTION' },
        { data: 'EVALUATION_TYPES_QUESTION' },
        { data: 'ACCREDITATION_ENTITIES_QUESTION' },
        { data: 'LANGUAGE_ID_QUESTION' },
        { data: 'BTN_EDITAR' },
        { data: 'BTN_ACTIVO' }
    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center' },
        { targets: 1, title: 'Tema', className: 'text-center' },
        { targets: 2, title: 'Subtema', className: 'text-center' },
        { targets: 3, title: 'Tipo de evaluacion', className: 'text-center' },
        { targets: 4, title: 'Ente acreditador', className: 'text-center' },
        { targets: 5, title: 'Idioma', className: 'text-center' },
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


//ajax
$(document).ready(function() {
    // Manejar el evento de clic en el botón de guardar
    $('#saveQuestionBtn').click(async function(e) {
        e.preventDefault();
        
        // Validar el formulario antes de enviar
        if (!validarFormulario($('#questionForm'))) {
            alertToast('Por favor complete todos los campos obligatorios', 'error');
            return;
        }
        
        // Validación adicional para selects múltiples obligatorios
        if (!validateMultiSelects()) {
            return;
        }
        
        // Validación de estructura de pregunta
        if (!validateQuestionStructure()) {
            return;
        }
        
        // Validación de respuestas según tipo
        if (!validateAnswers()) {
            return;
        }

        try {
            // Configuración para la llamada AJAX
            const config = {
                alertBefore: true,
                response: true,
                callbackBefore: showLoadingIndicator,
                callbackAfter: handleSuccessResponse,
                returnData: true,
                resetForm: true
            };
            
            // Preparar datos para enviar
            const formData = prepareFormData();
            
            // Llamar a la función global AJAX
            await ajaxAwaitFormData(
                formData,
                '/api/questions', // Ajusta esta URL según tu ruta
                'questionForm',
                'saveQuestionBtn',
                config
            );
        } catch (error) {
            console.error('Error en la solicitud AJAX:', error);
            handleAjaxError(error);
        }
    });
    
    // Función para validar selects múltiples
    function validateMultiSelects() {
        const requiredMultiSelects = [
            'ACCREDITATION_ENTITIES_QUESTION', 
            'LEVELS_QUESTION', 
            'BOPS_QUESTION', 
            'TOPICS_QUESTION'
        ];
        
        let isValid = true;
        
        requiredMultiSelects.forEach(selectId => {
            const select = $(`#${selectId}`);
            if (select.val() === null || select.val().length === 0) {
                select.addClass('is-invalid');
                isValid = false;
            } else {
                select.removeClass('is-invalid');
            }
        });
        
        if (!isValid) {
            alertToast('Seleccione al menos una opción en los campos obligatorios', 'error');
        }
        
        return isValid;
    }
    
    // Función para validar estructura de pregunta
    function validateQuestionStructure() {
        const tipo1 = $('#TIPO1_QUESTION').val();
        let isValid = true;
        
        if (!tipo1) {
            $('#TIPO1_QUESTION').addClass('is-invalid');
            isValid = false;
        } else {
            $('#TIPO1_QUESTION').removeClass('is-invalid');
            
            if (tipo1 === '1' && !$('#TEXTO1_QUESTION').val()) {
                $('#TEXTO1_QUESTION').addClass('is-invalid');
                isValid = false;
            } else if (tipo1 === '2' && !$('#IMAGEN1_QUESTION').val()) {
                $('#IMAGEN1_QUESTION').addClass('is-invalid');
                isValid = false;
            }
        }
        
        return isValid;
    }
    
    // Función para validar respuestas
    function validateAnswers() {
        const answerType = $('#ANSWER_TYPE_QUESTION').val();
        let isValid = true;
        
        if (!answerType) {
            $('#ANSWER_TYPE_QUESTION').addClass('is-invalid');
            return false;
        }
        
        if (answerType === '1') { // Respuesta numérica
            if (!$('#MIN_RANGE_QUESTION').val() || !$('#MAX_RANGE_QUESTION').val()) {
                $('#MIN_RANGE_QUESTION, #MAX_RANGE_QUESTION').addClass('is-invalid');
                isValid = false;
            }
        } else if (answerType === '2') { // Opciones múltiples
            const numOptions = $('#ANSWER_OPTIONS_QUESTION').val();
            const numCorrect = $('#CORRECT_ANSWERS_QUESTION').val();
            
            if (!numOptions) {
                $('#ANSWER_OPTIONS_QUESTION').addClass('is-invalid');
                isValid = false;
            }
            
            if (!numCorrect) {
                $('#CORRECT_ANSWERS_QUESTION').addClass('is-invalid');
                isValid = false;
            }
            
            // Validar que todas las respuestas requeridas tengan texto
            if (numOptions) {
                for (let i = 1; i <= numOptions; i++) {
                    if (!$(`#respuesta${i}-text`).val()) {
                        $(`#respuesta${i}-text`).addClass('is-invalid');
                        isValid = false;
                    }
                }
            }
        }
        
        return isValid;
    }
    
    // Función para preparar los datos del formulario
    function prepareFormData() {
        // Obtener valores de los selects múltiples
        const multiSelectValues = {
            ACCREDITATION_ENTITIES_QUESTION: $('#ACCREDITATION_ENTITIES_QUESTION').val(),
            LEVELS_QUESTION: $('#LEVELS_QUESTION').val(),
            BOPS_QUESTION: $('#BOPS_QUESTION').val(),
            TOPICS_QUESTION: $('#TOPICS_QUESTION').val(),
            SUBTOPICS_QUESTION: $('#SUBTOPICS_QUESTION').val(),
            EVALUATION_TYPES_QUESTION: $('#EVALUATION_TYPES_QUESTION').val()
        };
        
        // Preparar estructura de la pregunta
        const questionStructure = {
            sections: []
        };
        
        // Sección principal (obligatoria)
        const section1 = {
            type: $('#TIPO1_QUESTION').val(),
            content: $('#TIPO1_QUESTION').val() === '1' 
                ? $('#TEXTO1_QUESTION').val() 
                : $('#IMAGEN1_QUESTION').prop('files')[0]?.name
        };
        questionStructure.sections.push(section1);
        
        // Secciones adicionales (opcionales)
        if ($('#activarSeccionExtra').is(':checked')) {
            const section2 = {
                type: $('#TIPO2_QUESTION').val(),
                content: $('#TIPO2_QUESTION').val() === '1' 
                    ? $('#TEXTO2_QUESTION').val() 
                    : $('#IMAGEN2_QUESTION').prop('files')[0]?.name
            };
            questionStructure.sections.push(section2);
        }
        
        if ($('#activarSeccionExtra2').is(':checked')) {
            const section3 = {
                type: $('#TIPO3_QUESTION').val(),
                content: $('#TIPO3_QUESTION').val() === '1' 
                    ? $('#TEXTO3_QUESTION').val() 
                    : $('#IMAGEN3_QUESTION').prop('files')[0]?.name
            };
            questionStructure.sections.push(section3);
        }
        
        // Preparar respuestas según el tipo
        let answers = null;
        const answerType = $('#ANSWER_TYPE_QUESTION').val();
        
        if (answerType === '2') { // Opciones múltiples
            answers = [];
            const numOptions = $('#ANSWER_OPTIONS_QUESTION').val();
            
            for (let i = 1; i <= numOptions; i++) {
                answers.push({
                    text: $(`#respuesta${i}-text`).val(),
                    isCorrect: $(`#respuesta${i}-check`).is(':checked')
                });
            }
        }
        
        // Retornar objeto con todos los datos
        return {
            ...multiSelectValues,
            LANGUAGE_QUESTION: $('#LANGUAGE_QUESTION').val(),
            QUESTION_STRUCTURE_QUESTION: JSON.stringify(questionStructure),
            ANSWER_TYPE_QUESTION: answerType,
            ANSWER_OPTIONS_QUESTION: $('#ANSWER_OPTIONS_QUESTION').val(),
            CORRECT_ANSWERS_QUESTION: $('#CORRECT_ANSWERS_QUESTION').val(),
            ANSWERS_QUESTION: answers ? JSON.stringify(answers) : null,
            MIN_RANGE_QUESTION: $('#MIN_RANGE_QUESTION').val(),
            MAX_RANGE_QUESTION: $('#MAX_RANGE_QUESTION').val(),
            TIME_MINUTES_QUESTION: $('#TIME_MINUTES_QUESTION').val(),
            SCORE_QUESTION: $('#SCORE_QUESTION').val(),
            HAS_FEEDBACK_QUESTION: $('#HAS_FEEDBACK_QUESTION').val() === '1' ? 1 : 0,
            FEEDBACK_TEXT_QUESTION: $('#FEEDBACK_TEXT_QUESTION').val()
        };
    }
    
    // Función para mostrar indicador de carga
    function showLoadingIndicator() {
        $('#saveQuestionBtn').prop('disabled', true).html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Guardando...'
        );
    }
    
    // Función para manejar respuesta exitosa
    function handleSuccessResponse(data) {
        alertMensaje1(
            'success', 
            'Pregunta guardada', 
            'La pregunta se ha guardado correctamente', 
            null, null, 2000
        );
        
        // Cerrar el modal después de 2 segundos
        setTimeout(() => {
            $('#questionModal').modal('hide');
            $('#saveQuestionBtn').prop('disabled', false).text('Guardar Pregunta');
        }, 2000);
    }
    
    // Función para manejar errores AJAX
    function handleAjaxError(error) {
        $('#saveQuestionBtn').prop('disabled', false).text('Guardar Pregunta');
        
        if (error.responseJSON && error.responseJSON.message) {
            alertToast(`Error: ${error.responseJSON.message}`, 'error');
        } else {
            alertToast('Error al guardar la pregunta. Intente nuevamente.', 'error');
        }
    }
    
    // Manejar cambios en el tipo de respuesta
    $('#ANSWER_TYPE_QUESTION').change(function() {
        const type = $(this).val();
        
        $('#rangoRespuesta').addClass('d-none');
        $('#selectorOpciones').addClass('d-none');
        $('#selectorCorrectas').addClass('d-none');
        $('#respuestas-container').addClass('d-none');
        
        if (type === '1') {
            $('#rangoRespuesta').removeClass('d-none');
        } else if (type === '2') {
            $('#selectorOpciones').removeClass('d-none');
        }
    });
    
    // Manejar cambios en el número de opciones de respuesta
    $('#ANSWER_OPTIONS_QUESTION').change(function() {
        const numOptions = $(this).val();
        
        if (numOptions > 0) {
            $('#selectorCorrectas').removeClass('d-none');
            $('#respuestas-container').removeClass('d-none');
            
            $('.checkbox-container').addClass('d-none');
            for (let i = 1; i <= numOptions; i++) {
                $(`#respuesta${i}`).removeClass('d-none');
            }
        }
    });
    
    // Manejar cambios en el tipo de pregunta (texto/imagen)
    $('#TIPO1_QUESTION').change(function() {
        const tipo = $(this).val();
        $('#campoTexto').addClass('d-none');
        $('#campoImagen').addClass('d-none');
        
        if (tipo === '1') {
            $('#campoTexto').removeClass('d-none');
        } else if (tipo === '2') {
            $('#campoImagen').removeClass('d-none');
        }
    });
    
    // Manejar la activación de secciones extra
    $('#activarSeccionExtra').change(function() {
        if ($(this).is(':checked')) {
            $('#seccionExtra').removeClass('opacity-50 pointer-events-none');
            $('#TIPO2_QUESTION').prop('disabled', false);
        } else {
            $('#seccionExtra').addClass('opacity-50 pointer-events-none');
            $('#TIPO2_QUESTION').prop('disabled', true);
            $('#campoTexto2').addClass('d-none');
            $('#campoImagen2').addClass('d-none');
        }
    });
    
    $('#activarSeccionExtra2').change(function() {
        if ($(this).is(':checked')) {
            $('#seccionExtra2').removeClass('opacity-50 pointer-events-none');
            $('#TIPO3_QUESTION').prop('disabled', false);
        } else {
            $('#seccionExtra2').addClass('opacity-50 pointer-events-none');
            $('#TIPO3_QUESTION').prop('disabled', true);
            $('#campoTexto3').addClass('d-none');
            $('#campoImagen3').addClass('d-none');
        }
    });
    
    // Manejar retroalimentación
    $('#HAS_FEEDBACK_QUESTION').change(function() {
        if ($(this).val() === '1') {
            $('#feedbackTextContainer').removeClass('d-none');
        } else {
            $('#feedbackTextContainer').addClass('d-none');
        }
    });
});