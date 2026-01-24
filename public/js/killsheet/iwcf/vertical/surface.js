$(document).ready(function () {
    cargarKillsheetsEstudiante();

});


function cargarKillsheetsEstudiante() {

    $.ajax({
        url: '/obtenerKillsheetsfirst',
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


function cargarRespuestasTecnicas(answers) {

    if (!answers) return;

    Object.keys(answers).forEach(inputId => {

        const $input = $('#' + inputId);

        if ($input.length) {
            $input
                .data('answer', String(answers[inputId]).trim())
                .val(''); 
        }
    });
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



//// CRONOMETRO
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

// Arranca al cargar la vista
$(document).ready(function () {
    iniciarCronometro();
});


$('#btn-finalizar-hoja').on('click', function () {

    if (cronometroFinalizado) return; // 🔒 evita doble click

    cronometroFinalizado = true;

    clearInterval(cronometroInterval);
    cronometroInterval = null;

    const tiempo = $('#cronometro-hoja').text();

    // Mostrar resultado
    $('#tiempo-final').text(tiempo);
    $('#resultado-tiempo').removeClass('d-none');

    // Ocultar finalizar
    $('#btn-finalizar-hoja').addClass('d-none');

    // Mostrar nueva hoja
    $('#btn-nueva-hoja').removeClass('d-none');

    console.log('⏱ Tiempo total HH:MM:SS:', tiempo);

    alertToast('Tiempo registrado correctamente', 'success', 1500);
});


$('#btn-nueva-hoja').on('click', function () {
    location.reload(); 
});
