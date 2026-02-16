

let position = 'top';

if (window.innerWidth > 768) {
    position = 'top';
}

if (typeof Swal !== 'undefined') {

    const Toast = Swal.mixin({
        toast: true,
        position: position,
        showConfirmButton: false,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer);
            toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
    });

    window.alertToast = function (
        msj = 'No ha seleccionado ningún registro',
        icon = 'error',
        timer = 3000
    ) {
        Toast.fire({
            icon: icon,
            title: msj,
            timer: timer
        });
    };

} else {

    window.alertToast = function (msj = 'No ha seleccionado ningún registro') {
        console.warn('SweetAlert2 no está cargado:', msj);
    };

}




$(document).ready(function () {
    cargarKillsheetsEstudiante();

});


function cargarKillsheetsEstudiante() {

    $.ajax({
        url: '/obtenerKillsheetsexercise',
        type: 'GET',
        success: function (resp) {

            if (!resp.success) {
                alertToast(resp.message, 'error', 3000);
                return;
            }
         

            mostrarHojaMatar(
                resp.data.DATOS_EJERCICIO_JSON,
                resp.data.INDICACIONES_KILL
            );

            cargarRespuestasTecnicas(resp.data.ANSWERS);
            renderizarPreguntas(resp.data.PREGUNTAS_JSON);

        },
    });
}


const SECCIONES_ORDEN = [
    { key: 'datos_pozo',            title: 'Datos del pozo' },
    { key: 'capacidades_internas',  title: 'Capacidades internas' },
    { key: 'capacidades_anulares',  title: 'Capacidades anulares' },
    { key: 'bomba_lodo',            title: 'Datos de la bomba de lodo' },
    { key: 'tasa_reducida_bomba',   title: 'Datos de la tasa reducida de circulación de la bomba' },
    { key: 'otra_informacion',      title: 'Otra información' },
    { key: 'prueba_formacion',      title: 'Datos de la prueba de formación' },
    { key: 'influjo',               title: 'Datos del influjo' }
];

function mostrarHojaMatar(datosJSON, indicaciones = '') {

    if (!datosJSON) return;

    const data = typeof datosJSON === 'string'
        ? JSON.parse(datosJSON)
        : datosJSON;

    let html = '';

        html += `
            <h3 style="text-align:center; margin-bottom:1rem;">
                Hoja de matar
            </h3>
        `;


    if (indicaciones) {
        html += `
            <div class="alert alert-warning text-start mb-3">
               <h4 class="text-center mb-3"> ${indicaciones}</h4>
            </div>
        `;
    }

  
    let hayContenido = false;

    SECCIONES_ORDEN.forEach(sec => {

        const items = data[sec.key] || [];
        if (!items.length) return;

        hayContenido = true;

        html += `
            <div class="hoja-section">
                <h5>${sec.title}</h5>
        `;

        items.forEach(item => {

            if (!item.dato && !item.valor && !item.unidad) return;

            html += `
                <div class="hoja-line">
                    <div class="hoja-dato">${item.dato ?? ''}</div>
            `;

            if (item.valor) {
                html += `<div class="hoja-unidad">${item.valor}</div>`;
            }

            if (item.unidad) {
                html += `<div class="hoja-unidad">${item.unidad}</div>`;
            }

            html += `</div>`;
        });

        html += `</div>`;
    });

    if (!hayContenido) {
        html += `
            <div class="text-center text-muted mt-4">
                No hay datos cargados aún
            </div>
        `;
    }

    $('#hoja-content').html(html);
    abrirHoja();
    iniciarCronometro();

}




function abrirHoja() {
    $('#hoja-matar-card').removeClass('d-none');
    $('.hoja-fab-wrapper').addClass('d-none');
}

function cerrarHoja() {
    $('#hoja-matar-card').addClass('d-none');
    $('.hoja-fab-wrapper').removeClass('d-none');
}

$('#btn-hoja-fab').on('click', abrirHoja);
$('#cerrar-hoja').on('click', cerrarHoja);


function bloquearScroll() {
    $('body').css('overflow', 'hidden');
}

function liberarScroll() {
    $('body').css('overflow', '');
}

let isDragging = false;
let offsetX = 0;
let offsetY = 0;

$('#hoja-drag').on('mousedown', function (e) {
    e.preventDefault();    
    e.stopPropagation();   

    isDragging = true;
    bloquearScroll();

    const card = $('#hoja-matar-card')[0];
    const rect = card.getBoundingClientRect();

    offsetX = e.clientX - rect.left;
    offsetY = e.clientY - rect.top;
});

$(document).on('mousemove', function (e) {
    if (!isDragging) return;

    e.preventDefault(); 

    const card = $('#hoja-matar-card');

    let left = e.clientX - offsetX;
    let top  = e.clientY - offsetY;

    const minLeft = 10;
    const minTop  = 10;
    const maxLeft = window.innerWidth  - card.outerWidth()  - 10;
    const maxTop  = window.innerHeight - card.outerHeight() - 10;

    left = Math.max(minLeft, Math.min(left, maxLeft));
    top  = Math.max(minTop,  Math.min(top,  maxTop));

    card.css({
        left: left + 'px',
        top: top + 'px',
        transform: 'none'
    });
});

$(document).on('mouseup', function () {
    if (!isDragging) return;

    isDragging = false;
    liberarScroll();
});





///// LLENAR HOJA DE MATAR

let INPUTS_EVALUABLES = [];
let hojaIniciada = false;




function cargarRespuestasTecnicas(answers) {

    INPUTS_EVALUABLES = [];
    hojaIniciada = false;

    if (!answers) return;

    Object.keys(answers).forEach(inputId => {

        const $input = $('#' + inputId);

        if ($input.length) {
            $input
                .data('answer', String(answers[inputId]).trim())
                .val('');

            INPUTS_EVALUABLES.push(inputId);
        }
    });

}

$(document).on('input', 'input', function () {

    if ($(this).data('answer') !== undefined) {
        hojaIniciada = true;
    }

    $(this).removeClass('input-error');
});



function hojaCompleta() {

    let faltantes = [];
    let evaluados = [];

    if (!hojaIniciada) {
        return {
            completa: false,
            faltantes: ['NO_INICIADA']
        };
    }

    INPUTS_EVALUABLES.forEach(id => {

        const $input = $('#' + id);

        if (!$input.length || !$input.is(':visible')) return;

        const correcto = ($input.data('answer') || '').toString().trim();
        const escrito  = ($input.val() || '').toString().trim();

        evaluados.push(id);

        if (correcto !== '' && escrito === '') {
            faltantes.push(id);
            $input.addClass('input-error');
        }
    });

   

    return {
        completa: faltantes.length === 0,
        faltantes
    };
}







let segundos = 0;
let cronometroInterval = null;
let cronometroFinalizado = false;

function iniciarCronometro() {

    cronometroInterval = setInterval(() => {
        segundos++;

        const h = String(Math.floor(segundos / 3600)).padStart(2, '0');
        const m = String(Math.floor((segundos % 3600) / 60)).padStart(2, '0');
        const s = String(segundos % 60).padStart(2, '0');

        $('#cronometro-hoja').text(`${h}:${m}:${s}`);

    }, 1000);
}

$(document).ready(function () {
    iniciarCronometro();
});





function evaluarResultadosFinales() {

    let correctas = 0;
    let incorrectas = 0;
    let vacias = 0;

    INPUTS_EVALUABLES.forEach(id => {

        const $input = $('#' + id);
        if (!$input.length || !$input.is(':visible')) return;

        const correcto = ($input.data('answer') || '').toString().trim();
        const escrito  = ($input.val() || '').toString().trim();

        if (escrito === '') {
            vacias++;
            $input.addClass('input-error');
            return;
        }

        if (escrito === correcto) {
            correctas++;
            $input.removeClass('input-error');
        } else {
            incorrectas++;
            $input.addClass('input-error');
        }
    });

    return {
        correctas,
        incorrectas,
        vacias,
        total: correctas + incorrectas + vacias
    };
}





function renderizarPreguntas(preguntasJson) {

    if (!preguntasJson) return;

    let preguntas = [];

    if (typeof preguntasJson === 'string') {
        try {
            preguntas = JSON.parse(preguntasJson);
        } catch (e) {
            console.error('❌ Error parseando PREGUNTAS_JSON', e);
            return;
        }
    } else {
        preguntas = preguntasJson;
    }

    if (!Array.isArray(preguntas) || preguntas.length === 0) return;

    const $lista = $('#lista-preguntas');
    $lista.empty();

    preguntas.forEach((item, index) => {

        const id = `pregunta_${index}`;

        $lista.append(`
            <div class="pregunta-item">
                <p class="pregunta-texto">
                    ${index + 1}. ${item.pregunta}
                </p>

                <div class="respuesta-linea">
                    <input 
                        type="text"
                        id="${id}"
                        class="input-pregunta"
                        data-respuesta="${item.respuesta}"
                    />
                    <span class="unidad">${item.unidad}</span>
                </div>
            </div>
        `);
    });

    $('#bloque-preguntas').removeClass('d-none');
}



function evaluarPreguntas() {

    let correctas = 0;
    let incorrectas = 0;
    let vacias = 0;

    $('.input-pregunta').each(function () {

        const $input = $(this);
        const esperado = ($input.data('respuesta') || '').toString().trim();
        const escrito  = ($input.val() || '').toString().trim();

        $input.removeClass(
            'pregunta-correcta pregunta-incorrecta pregunta-vacia'
        );

        if (!escrito) {
            vacias++;
            $input.addClass('pregunta-vacia');
            return;
        }

        if (escrito === esperado) {
            correctas++;
            $input.addClass('pregunta-correcta');
        } else {
            incorrectas++;
            $input.addClass('pregunta-incorrecta');
        }
    });

    return {
        correctas,
        incorrectas,
        vacias
    };
}



$('#btn-finalizar-hoja').on('click', function () {

    if (cronometroFinalizado) return;

    const resultadoHoja = hojaCompleta();

    if (!resultadoHoja.completa) {
        alertToast(
            `Faltan ${resultadoHoja.faltantes.length} datos en la hoja`,
            'error',
            2500
        );
        return;
    }


    const resumenHoja = evaluarResultadosFinales();
    const resumenPreguntas = evaluarPreguntas();

    if (resumenPreguntas.vacias > 0) {
        alertToast(
            `Faltan ${resumenPreguntas.vacias} preguntas por responder`,
            'error',
            2500
        );
        return;
    }

    cronometroFinalizado = true;
    clearInterval(cronometroInterval);
    cronometroInterval = null;

    const tiempo = $('#cronometro-hoja').text();


    $('#tiempo-final').text(tiempo);
    $('#resultado-tiempo').removeClass('d-none');

    $('#res-correctas').text(resumenHoja.correctas);
    $('#res-incorrectas').text(resumenHoja.incorrectas);
    $('#resultado-hoja').removeClass('d-none');

    $('#preg-correctas').text(resumenPreguntas.correctas);
    $('#preg-incorrectas').text(resumenPreguntas.incorrectas);
    $('#preg-vacias').text(resumenPreguntas.vacias);
    $('#resultado-preguntas').removeClass('d-none');

    $('#btn-finalizar-hoja').addClass('d-none');
    $('#btn-nueva-hoja').removeClass('d-none');

    alertToast('Hoja finalizada correctamente', 'success', 1500);

});









$('#btn-nueva-hoja').on('click', function () {
    location.reload(); 
});
