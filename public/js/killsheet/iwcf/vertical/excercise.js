

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

        },
    });
}


const SECCIONES_ORDEN = [
    { key: 'datos_pozo',          title: 'Datos del pozo' },
    { key: 'capacidades_internas',title: 'Capacidades internas' },
    { key: 'capacidades_anulares',title: 'Capacidades anulares' },
    { key: 'bomba_lodo',          title: 'Datos de la bomba de lodo' },
    { key: 'tasa_reducida_bomba', title: 'Datos de la tasa reducida de circulación de la bomba' },
    { key: 'otra_informacion',    title: 'Otra información' },
    { key: 'influjo',             title: 'Datos del influjo' }
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




let toastTimer = null;

$(document).on('blur', 'input', function () {

    const $input = $(this);

    const correcto = ($input.data('answer') || '').toString().trim();
    if (!correcto) return;

    const escrito = $input.val().toString().trim();
    if (!escrito) return;

    clearTimeout(toastTimer);

    toastTimer = setTimeout(() => {

        if (escrito === correcto) {
            alertToast('Respuesta correcta', 'success', 1500);
        } else {
            alertToast('Respuesta incorrecta', 'error', 2000);
            $input.val('');
            $input.focus();
        }

    }, 300);
});



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




$('#btn-finalizar-hoja').on('click', function () {

    if (cronometroFinalizado) return;

    const resultado = hojaCompleta();

    if (resultado.faltantes.includes('NO_INICIADA')) {
        alertToast(
            'Completa la hoja antes de finalizar',
            'error',
            2500
        );
        return;
    }

    if (!resultado.completa) {
        alertToast(
            `Faltan ${resultado.faltantes.length} respuestas por completar`,
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

    $('#btn-finalizar-hoja').addClass('d-none');
    $('#btn-nueva-hoja').removeClass('d-none');

    alertToast('Hoja finalizada correctamente', 'success', 1500);
});




$('#btn-nueva-hoja').on('click', function () {
    location.reload(); 
});
