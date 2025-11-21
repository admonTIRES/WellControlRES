document.getElementById("logout").addEventListener('click', function(event) {
    event.preventDefault(); 
    event.stopPropagation();

    Swal.fire({
        title: '¿Estás seguro?',
        text: "Quieres cerrar sesión",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, cerrar sesión',
        cancelButtonText: 'Cancelar',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('logout-form').submit();
        }
    });
});



function loaderbtn(btn) {
    return new Promise(function (resolve, reject) { 
        $('#' + btn).html('Guardando...').prop('disabled', true).removeClass('btn-success').addClass('btn-light');  
        if ($('#' + btn).length > 0) {
            resolve(1)                    
        } else {
            loaderbtn(btn)  
        }
    })
}

if (window.innerWidth <= 768) {
    position = 'top';
  } else {
    position = 'top';
  }
  
const Toast = Swal.mixin({
    toast: true,
    position: position,
    showConfirmButton: false,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

function alertToast(msj = 'No ha seleccionado ningún registro', icon = 'error', timer = 7000) {
    Toast.fire({
      icon: icon,
      title: msj,
      timer: timer,
      // width: 'auto'
    });
  }

function alertMensajeConfirm(options, callback = function () { }, set = 0, callbackDenied = function () { }, callbackCanceled = function () {

}) {

  //Options si existe
  switch (set) {
    case 1:
      if (!options.hasOwnProperty('title'))
        options['title'] = "¿Desea realizar esta acción?"

      if (!options.hasOwnProperty('text'))
        options['text'] = "Probablemente no podrá revertirlo"

      if (!options.hasOwnProperty('icon'))
        options['icon'] = 'warning'

      if (!options.hasOwnProperty('showCancelButton'))
        options['showCancelButton'] = true

      if (!options.hasOwnProperty('confirmButtonColor'))
        options['confirmButtonColor'] = '#3085d6'

      if (!options.hasOwnProperty('cancelButtonColor'))
        options['cancelButtonColor'] = '#d33'

      if (!options.hasOwnProperty('confirmButtonText'))
        options['confirmButtonText'] = 'Aceptar'

      if (!options.hasOwnProperty('cancelButtonText'))
        options['cancelButtonText'] = 'Cancelar'

      if (!options.hasOwnProperty('allowOutsideClick'))
        options['allowOutsideClick'] = false
      // if (options.hasOwnProperty('timer'))
      //   options['timer'] = 4000
      // if (options.hasOwnProperty('timerProgressBar'))
      //   options['timerProgressBar'] = true
      //
      break;
    default:
      if (!options) {
        options = {
          title: "¿Desea realizar esta acción?",
          text: "Probablemente no podrá revertirlo",
          icon: "info",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Aceptar",
          cancelButtonText: "Cancelar",
          // allowOutsideClick: false
          // timer: 4000,
          // timerProgressBar: true,
          //   showDenyButton: true,
          // denyButtonText: `Don't save`,
          // denyButtonColor: "#d33";
        }
      }
      break;
  }


  Swal.fire(options).then((result) => {
    if (result.isConfirmed || result.dismiss === "timer") {
      callback()
    } else if (result.isDenied) {
      callbackDenied();
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      callbackCanceled();
    }
  })
}

function validarFormulario(form) {
    var formulario = form;
  
    formulario.find('input[required]:not([disabled]), textarea[required]:not([disabled]), select[required]:not([disabled])').addClass('validar').removeClass('error');
  
    var campos =  formulario.find('.validar');
    var formularioValido = true;
  
    campos.each(function () {
        var tipoCampo = $(this).attr('type');
        var valorCampo = $(this).val();
  
        if (tipoCampo === 'radio' || tipoCampo === 'checkbox') {
            var nombreGrupo = $(this).attr('name');
            if ($('input[name="' + nombreGrupo + '"]:checked').length === 0) {
                $('input[name="' + nombreGrupo + '"]').addClass('error');
                formularioValido = false;
            } else {
                $('input[name="' + nombreGrupo + '"]').removeClass('error');
            }
        } 
        else if (valorCampo === '' || valorCampo === null) {
            $(this).addClass('error');
            formularioValido = false;
        } else {
            $(this).removeClass('error');
        }
    });
  
    return formularioValido;
}

function eliminarDatoTabla(data, arregloTable, url) {
  var accion = data.ACTIVAR == 1 ? 'desactivar' : 'activar'; 
  var accion1 = data.ACTIVAR == 1 ? 'desactivado' : 'activado'; 

  
  alertMensajeConfirm({
      title: "Confirme para " + accion + " este registro",
      text: "Esta acción cambiará el estado del registro",
      icon: "warning",
  }, function () { 
      $.ajax({
          type: "GET",
          dataType: "json",
          url: url, 
          data: data,
          cache: false,
          success:function(dato) {
              for (var i = 0; i < arregloTable.length; i++) {
                  arregloTable[i].ajax.reload();
              }

              setTimeout(() => {
                  Swal.fire({
                      icon: 'success',
                      title: 'Registro ' + accion1,
                      text: 'La acción fue realizada exitosamente',
                      timer: 2000,
                      timerProgressBar: true
                  });
              }, 1000);
          },
          error: function(dato) {
              return false;
          }
      });
  }, 1);
}

function ifnull(data, siNull = '', values =
  [
    'option1',
    {
      'option2': [
        'suboption1',
        {
          'suboption2': ['valor']
        }
      ],
      'option3': 'suboption1'
    },
    'option4',
  ], callback = (bool) => { return bool }) {

  values = ((typeof values === 'object' && !Array.isArray(values)) || (typeof values === 'string'))
    ? [values]
    : values;

  if (!data || typeof data !== 'object') {
    if (data === undefined || data === null || data === 'NaN' || data === '' || data === NaN) {
      switch (siNull) {
        case 'number': return callback(0)
        case 'boolean': return callback(data ? true : false)
        default: return callback(siNull)
      }
    } else {

      let data_modificado = escapeHtmlEntities(`${data}`);

      switch (siNull) {
        case 'number':
          // No hará modificaciones
          break;
        case 'boolean': return callback(ifnull(data, false) ? true : false)
        default:
          //Agregará las modificaciones nuevas
          data = data_modificado
          break;
      }

      return callback(data)
    }
  }
  for (const key of values) {
    if (typeof key === 'string' && key in data) {
      return callback(data[key] || siNull)
    } else if (typeof key === 'object') {
      for (const nestedKey in key) {
        const result = ifnull(data[nestedKey], siNull, key[nestedKey]);
        if (result) return callback(ifnull(result, siNull))
      }
    }
  }

  return callback(siNull)
}


function escapeHtmlEntities(input) {
  if (!input || typeof input !== 'string') {
    return input;
  }

  const replacements = {
    '"': '&quot;',
    '<': '&lt;',
    '>': '&gt;',
    "'": '&apos;',
  };

  const regex = new RegExp(Object.keys(replacements).join('|'), 'g');

  const result = input.replace(regex, match => replacements[match]);

  if (result.includes('&') && !/[a-zA-Z0-9#]/.test(result.charAt(result.indexOf('&') + 1))) {
    return result.replace('&', '&amp;');
  }

  return result;
}

function mensajeAjax(data, modulo = null) {
  if (modulo != null) {
    text = ' No pudimos cargar'
  }

  try {
    switch (data['code']) {
      case 1:
        return 1;
        break;
      case 2:
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: '¡Ha ocurrido un error!',
          footer: 'Respuesta: ' + data['response']['msj']
        });
        break;
      case "repetido":
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: '¡Usted ya está registrado!',
          footer: 'Utilice su CURP para registrarse en una nueva prueba'
        });
        break;
      case "login":
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Respuesta: ' + data['response']['msj']
        });
        break;
      case "Token": case "Usernovalid":
        alertMensajeConfirm({
          title: "¡Sesión no valida!",
          text: "El token de su sesión ha caducado, vuelva iniciar sesión",
          footer: "Redireccionando pantalla...",
          icon: "info",
          confirmButtonColor: "#d33",
          confirmButtonText: "Aceptar",
          cancelButtonText: false,
          allowOutsideClick: false,
          timer: 4000,
          timerProgressBar: true,
        }, function () {
          destroySession();
          window.location.replace(http + servidor + "/" + appname + "/vista/login/");
        });
        break;
      case "turnero":
        alertMensajeConfirm({
          title: "Oops",
          text: `${data['response']['msj']}`,
          footer: "Tal vez deberías intentarlo nuevamente",
          icon: "warning",
        });
        break;
        case 0:
          if (data.msj === 'Ya te has postulado a esta vacante') {
            Swal.fire({
              icon: 'warning',
              title: 'Ya estás postulado a esta vacante',
              text: 'Nos pondremos en contacto contigo pronto.',
              confirmButtonText: 'Entendido'
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: data.msj || 'Hubo un problema!',
              footer: 'Por favor, reporta este problema...'
            });
          }
          break;
      
      
      default:
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Hubo un problema!',
          footer: 'No sabemos qué pasó, reporta este problema...'
        });
    }
  } catch (error) {
    alertMensaje('warning', 'Error:', 'No se pudo resolver un conflicto interno con la validación, si el problema persiste reporte al encargado de área de esto.', '[Error: api no valida, "response: {code: XXXX}", no existe]');
    return 0;
  }
  return 0;
}

function alertMensaje(icon = 'success', title = '¡Completado!', text = 'Datos completados', footer = null, html = null, timer = null) {
  Swal.fire({
    icon: icon,
    title: title,
    text: text,
    html: html,
    footer: footer,
    timer: timer
    // width: 'auto',
  })
}

function alertMensaje1(icon = 'success', title = '¡Completado!', text = 'Datos completados', footer = null, html = null, timer = null) {
  Swal.fire({
    icon: icon,
    title: title,
    text: text,
    html: html,
    footer: footer,
    timer: timer,
    showConfirmButton: false,  
    timerProgressBar: true,    
    
  });
}
function alertaDesarrollo(e) {
    e.preventDefault(); 
    Swal.fire({
        title: '🚧 Estamos trabajando en ello',
        html: `<p style="font-size:16px; margin-top:10px;">
                Esta funcionalidad se encuentra en desarrollo.<br>
                Muy pronto estará disponible. 🙌
               </p>`,
        icon: 'info',
        confirmButtonText: 'Entendido',
        confirmButtonColor: '#3085d6',
        allowOutsideClick: false,
        allowEscapeKey: false
    });
}

function configAjaxAwait(config) {
 
    const defaults = {
        alertBefore: false, 
        response: true, 
        callbackBefore: false, 
        callbackAfter: false, 
        returnData: true, 
        WithoutResponseData: false, 
        resetForm: false, 
        ajaxComplete: () => { }, 
        ajaxError: () => { }, 
    }

    Object.entries(defaults).forEach(([key, value]) => {
        config[key] = config[key] ?? value;
    });
    return config;
}

function alertErrorAJAX(jqXHR, exception, data) {
  var msg = '';
  switch (jqXHR.status) {
    case 0:
      if (exception != 'abort') {
        alertToast('Sin conexión a internet', 'warning'); return 0
      };
    case 404:
            alertToast('Recurso no encontrado', 'error'); return 0;
    case 422:
        var response = jqXHR.responseJSON;
        if (response && response.message) {
            alertToast(response.message, 'error');
        } else {
            alertToast('Error de validación', 'error');
        }
        return 0;
    case 500: alertToast('Internal Server Error', 'info'); return 0;
  }
  switch (exception) {
    case 'parsererror': alertMensaje('info', 'Error del servidor', 'Algo ha pasado, estamos trabajando para resolverlo', 'Mensaje de error: ' + data); return 0
    case 'timeout': 
    case 'abort': return 0
  }
}

//Ajax Async FormData
async function ajaxAwaitFormData(dataJson = { api: 0, }, apiURL, form = 'OnlyForm' , btn = 'OnlyBtn',
    config = {
        alertBefore: false
    },

    callbackBefore = () => {
        alertMsj({
            title: 'Espera un momento...',
            text: 'Estamos cargando tu solicitud, esto puede demorar un rato',
            icon: 'info',
            showCancelButton: false
        })
    },

    callbackSuccess = () => {
        console.log('callback ajaxAwait por defecto')
    }
) {

    return new Promise(function (resolve, reject) {

        config = configAjaxAwait(config)

        let formID = document.getElementById(form);
        let formData = new FormData(formID);



        for (const key in dataJson) {
            if (Object.hasOwnProperty.call(dataJson, key)) {
                const element = dataJson[key];
                if (!ifnull(formData.get(`${key}`), false)) {
                    formData.set(`${key}`, element);
                }
            }
        }

        $.ajax({
            url: apiURL,
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            type: 'POST',
            beforeSend: function () {
                config.callbackBefore ? callbackBefore() : 1;
                // $('#' + btn).html('Guardando... <img src="/assets/images/loaderbtn.gif" alt="" style="max-width: 100%; max-height: 40px;">').prop('disabled', true).removeClass('btn-success').addClass('btn-light');  

                //   mostrarCarga()
            },
            success: function (data) {
                $('#' + btn).html('Guardar').prop('disabled', false).removeClass('btn-light').addClass('btn-success');
                //  $('#'+btn).html('Guardando... <img src="/assets/images/loaderbtn.gif" alt="" style="max-width: 100%; max-height: 40px;">').prop('disabled', true).removeClass('btn-success').addClass('btn-light');  
                // ocultarCarga()
                config.resetForm ? formID.reset() : false;
                if (config.response) {
                    if (mensajeAjax(data)) {
                        config.callbackAfter ? callbackSuccess(config.WithoutResponseData ? data.response.data : data) : 1;
                        config.returnData ? resolve(config.WithoutResponseData ? data.response.data : data) : resolve(1)
                    }
                } else {
                    config.callbackAfter ? callbackSuccess(config.WithoutResponseData ? data.response.data : data) : 1;
                    config.returnData ? resolve(config.WithoutResponseData ? data.response.data : data) : resolve(1)
                }

            },
            error: function (jqXHR, exception, data) {
                 $('#' + btn).html('Guardar').prop('disabled', false).removeClass('btn-light').addClass('btn-success');
                alertErrorAJAX(jqXHR, exception, data)
            },
        })
    });
}

function editarDatoTabla( data, form = 'OnlyForm', modalID = 'ModalID', formComplete = 0) {
  
$('#'+ form).each(function(){
    this.reset();
});

if (formComplete == 0) {
for (var key in data) {
  if (data.hasOwnProperty(key)) {
    if (!key.startsWith("btn") && key !== "created_at" && key !== "updated_at") {
          
      var input = $('#' + form).find(`input[name='${key}']`);
      if (input.length) {
        input.val(data[key]);
      } else {
        $('#' + form).find(`textarea[name='${key}']`).val(data[key]);
      }
    }
  }
}

$('#' + modalID).modal('show');

} else {
  
for (var key in data) {
if (data.hasOwnProperty(key)) {


  if (!key.startsWith("BTN") && key !== "created_at" && key !== "updated_at") {
        
    var input = $('#' + form).find(`input[name='${key}'][type='text'], input[name='${key}'][type='number'], input[name='${key}'][type='tel']`);
    var email = $('#' + form).find(`input[name='${key}'][type='email']`);
    var date = $('#' + form).find(`input[name='${key}'][type='date']`);
    var time = $('#' + form).find(`input[name='${key}'][type='time']`);
    var textarea = $('#' + form).find(`textarea[name='${key}']`).val(data[key]);
    var select = $('#' + form).find(`select[name='${key}']`).val(data[key]);
    var hidden = $('#' + form).find(`input[name='${key}'][type='hidden']`);

    
    if (input.length) {
      input.val(data[key]);
      
    } else if (textarea.length) {
      textarea.val(data[key]);
      
    }
    else if (email.length) {
      email.val(data[key]);
      
    } else if (select.length) {

      select.val(data[key])

    }  else if (date.length) {

      date.val(data[key])

    }else if (time.length) {

      time.val(data[key])

    }else if (hidden.length) {

      hidden.val(data[key])

    } else {

      $('#' + form).find(`input[name='${key}'][value='${data[key]}'][type='radio']`).prop('checked', true)
              
      $('#' + form).find(`input[name='${key}'][value='${data[key]}'][type='checkbox']`).prop('checked', true)
    }
    
  }
}
}


//Abrimos el modal
$('#' + modalID).modal('show');
  
}




}
document.addEventListener('DOMContentLoaded', function() {
    showLoading();

    fetch('/api/dashboard/data')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                renderCharts(data.data);
            } else {
                throw new Error(data.message);
            }
        })
        .catch(error => {
            console.error('Error cargando datos:', error);
            showError('Error al cargar los datos: ' + error.message);
        });

    function showLoading() {
        const chartContainers = [
            'chartAcreditacion', 'chartProyectosAnio', 'chartProyectosEmpresa', 
            'chartTipoCurso', 'chartTendenciaMensual'
        ];
        
        chartContainers.forEach(containerId => {
            const container = document.getElementById(containerId);
            if (container) {
                container.innerHTML = `
                    <div class="loading-spinner">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Cargando...</span>
                        </div>
                        <span class="ms-2">Cargando datos...</span>
                    </div>
                `;
            }
        });
    }

    function showError(message) {
        const chartContainers = [
            'chartAcreditacion', 'chartProyectosAnio', 'chartProyectosEmpresa', 
            'chartTipoCurso', 'chartTendenciaMensual'
        ];
        
        chartContainers.forEach(containerId => {
            const container = document.getElementById(containerId);
            if (container) {
                container.innerHTML = `
                    <div class="alert alert-danger text-center">
                        ${message}
                    </div>
                `;
            }
        });
    }

    function renderCharts(datos) {
        if (datos.acreditacion.labels.length > 0) {
            var chartAcreditacion = new ApexCharts(document.querySelector("#chartAcreditacion"), {
                series: datos.acreditacion.series,
                chart: {
                    type: 'pie',
                    height: 300
                },
                labels: datos.acreditacion.labels,
                colors: ['#007DBA', '#FF585D', '#A4D65E', '#764ba2', '#FF9F40', '#36A2EB'],
                legend: {
                    position: 'bottom'
                },
                tooltip: {
                    y: {
                        formatter: function(value) {
                            return value + ' proyectos';
                        }
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            });
            chartAcreditacion.render();
        } else {
            document.getElementById('chartAcreditacion').innerHTML = '<div class="alert alert-warning text-center">No hay datos de acreditación</div>';
        }

        if (datos.proyectosAnio.labels.length > 0) {
            var chartProyectosAnio = new ApexCharts(document.querySelector("#chartProyectosAnio"), {
                series: [{
                    name: 'Proyectos',
                    data: datos.proyectosAnio.series
                }],
                chart: {
                    type: 'bar',
                    height: 300,
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        borderRadius: 4,
                        horizontal: false,
                        columnWidth: '60%',
                    }
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories: datos.proyectosAnio.labels,
                    title: {
                        text: 'Año'
                    }
                },
                yaxis: {
                    title: {
                        text: 'Número de Proyectos'
                    }
                },
                colors: ['#007DBA'],
                tooltip: {
                    y: {
                        formatter: function(value) {
                            return value + ' proyectos';
                        }
                    }
                }
            });
            chartProyectosAnio.render();
        } else {
            document.getElementById('chartProyectosAnio').innerHTML = '<div class="alert alert-warning text-center">No hay datos por año</div>';
        }

        if (datos.proyectosEmpresa.labels.length > 0) {
            var chartProyectosEmpresa = new ApexCharts(document.querySelector("#chartProyectosEmpresa"), {
                series: [{
                    name: 'Proyectos',
                    data: datos.proyectosEmpresa.series
                }],
                chart: {
                    type: 'bar',
                    height: 300,
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        borderRadius: 4,
                        horizontal: true,
                    }
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories: datos.proyectosEmpresa.labels,
                },
                colors: ['#A4D65E'],
                tooltip: {
                    y: {
                        formatter: function(value) {
                            return value + ' proyectos';
                        }
                    }
                }
            });
            chartProyectosEmpresa.render();
        } else {
            document.getElementById('chartProyectosEmpresa').innerHTML = '<div class="alert alert-warning text-center">No hay datos por empresa</div>';
        }

       
    }

    setInterval(() => {
        fetch('/api/dashboard/data')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            })
            .catch(error => {
                console.error('Error actualizando datos:', error);
            });
    }, 120000); // 2 minutos
});


let chart = null;
let currentChartType = 'column';
let currentColorPalette = 'results';

const colorPalettes = {
    default: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'],
    
    vibrant: ['#FF6B6B', '#4ECDC4', '#45B7D1', '#96CEB4', '#FFEAA7', '#DDA0DD', '#98D8C8', '#F7DC6F'],
    
    pastel: ['#FFB3BA', '#BAFFC9', '#BAE1FF', '#FFFFBA', '#FFDFBA', '#E0BBE4', '#FEC8D8', '#D9F0FF'],
    
    results: ['#FF585D', '#A4D65E', '#007DBA', '#236192', '#2C2A29', '#BC6C25', '#D4A373', '#FAEDCD'],
    
    cool: ['#6A4C93', '#1982C4', '#8AC926', '#FF595E', '#6A0572', '#118AB2', '#06D6A0', '#FFD166'],
    
    earth: ['#8B4513', '#CD853F', '#D2691E', '#A0522D', '#DEB887', '#BC8F8F', '#F4A460', '#D2B48C'],
    
    ocean: ['#1E3A8A', '#3B82F6', '#60A5FA', '#93C5FD', '#1E40AF', '#2563EB', '#3B82F6', '#60A5FA'],
    
    forest: ['#14532D', '#15803D', '#16A34A', '#22C55E', '#4ADE80', '#86EFAC', '#BBF7D0', '#22C55E'],
    
    sunset: ['#F59E0B', '#F97316', '#EF4444', '#8B5CF6', '#EC4899', '#F59E0B', '#F97316', '#EF4444'],
    
    rainbow: ['#FF0000', '#FF7F00', '#FFFF00', '#00FF00', '#0000FF', '#4B0082', '#8B00FF', '#FF1493']
};

document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM cargado, inicializando gráfica...');
    initializeEventListeners();
    loadAvailableYears();
    
     const periodType = document.getElementById('periodType');
    if (periodType) {
        periodType.dispatchEvent(new Event('change'));
    }
    setTimeout(() => {
        loadChartData();
    }, 500);
});

function initializeEventListeners() {
    const periodType = document.getElementById('periodType');
    const chartType = document.getElementById('chartType');
    const yearSelectGroup = document.getElementById('yearSelectGroup'); 
    
    if (periodType) {
        periodType.addEventListener('change', function() {
            const periodTypeValue = this.value;
            const dateRange = document.getElementById('dateRange');
            const yearSelectGroup = document.getElementById('yearSelectGroup');
            
            if (periodTypeValue === 'day') {
                dateRange.style.display = 'block';
                yearSelectGroup.style.display = 'block';
            } else if (periodTypeValue === 'month') {
                dateRange.style.display = 'none';
                yearSelectGroup.style.display = 'block';
            } else if (periodTypeValue === 'year') {
                dateRange.style.display = 'none';
                yearSelectGroup.style.display = 'none'; 
            }
        });
    }
    
    if (chartType) {
        chartType.addEventListener('change', function() {
            currentChartType = this.value;
            loadChartData();
        });
    }
}

async function loadChartData() {
    console.log('Cargando datos del gráfico...');
    
    const periodType = document.getElementById('periodType').value;
    const yearSelect = document.getElementById('yearSelect');
    const year = yearSelect ? yearSelect.value : null;
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;
    const chartType = currentChartType;

    const params = new URLSearchParams({
        period_type: periodType,
        chart_type: chartType
    });

    if (periodType !== 'year' && year) {
        params.append('year', year);
    }

    if (startDate && endDate) {
        params.append('start_date', startDate);
        params.append('end_date', endDate);
    }

    const chartDiv = document.getElementById('chartdiv');
    chartDiv.innerHTML = `
        <div class="text-center" style="padding: 50px;">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Cargando...</span>
            </div>
            <p class="mt-2">Cargando datos...</p>
        </div>
    `;

    try {
        const response = await fetch(`/api/chart/candidates?${params}`);
        const data = await response.json();

        if (data.success) {
            console.log('Datos recibidos:', data);
            
            chartDiv.innerHTML = '';
            
            updateChart(data.data, chartType);
            updateTotals(data.totals);
        } else {
            throw new Error(data.message);
        }
    } catch (error) {
        console.error('Error cargando datos del gráfico:', error);
        
        chartDiv.innerHTML = `
            <div class="alert alert-danger text-center">
                <h5>Error al cargar los datos</h5>
                <p>${error.message}</p>
                <button class="btn btn-primary btn-sm" onclick="loadChartData()">Reintentar</button>
            </div>
        `;
        
        updateTotals({});
    }
}

async function loadAvailableYears() {
    try {
        const response = await fetch('/api/chart/years');
        const data = await response.json();
        
        if (data.success) {
            const yearSelect = document.getElementById('yearSelect');
            if (yearSelect) {
                yearSelect.innerHTML = '';
                
                data.years.forEach(year => {
                    const option = document.createElement('option');
                    option.value = year;
                    option.textContent = year;
                    yearSelect.appendChild(option);
                });
                
                yearSelect.value = new Date().getFullYear();
            }
        }
    } catch (error) {
        console.error('Error cargando años:', error);
    }
}


function updateChart(chartData, chartType) {
    console.log('Actualizando gráfica tipo:', chartType);
    
    if (chart) {
        chart.dispose();
        chart = null;
    }

    if (typeof am5 === 'undefined') {
        console.error('AMCharts no está cargado');
        alert('Error: La librería de gráficas no se cargó correctamente');
        return;
    }

    try {
        if (chartType === 'pie') {
            createPieChart(chartData);
        } else {
            createXYChart(chartData, chartType);
        }
    } catch (error) {
        console.error('Error creando gráfica:', error);
        alert('Error al crear la gráfica: ' + error.message);
    }
}

function getColors(count) {
    const palette = colorPalettes[currentColorPalette] || colorPalettes.default;
    
    if (count <= palette.length) {
        return palette.slice(0, count);
    }
    
    const additionalColors = [];
    for (let i = palette.length; i < count; i++) {
        const hue = (i * 137.5) % 360;
        additionalColors.push(`hsl(${hue}, 70%, 65%)`);
    }
    
    return [...palette, ...additionalColors];
}

function createXYChart(chartData, chartType) {
    console.log('Creando gráfica XY:', chartType);
    
    chart = am5.Root.new("chartdiv");
    
    chart.setThemes([
        am5themes_Animated.new(chart)
    ]);

    const xyChart = chart.container.children.push(
        am5xy.XYChart.new(chart, {
            panX: true,
            panY: false,
            wheelX: "panX",
            wheelY: "zoomX"
        })
    );

    const xAxis = xyChart.xAxes.push(
        am5xy.CategoryAxis.new(chart, {
            categoryField: "category",
            renderer: am5xy.AxisRendererX.new(chart, {
                minGridDistance: 30
            })
        })
    );

    const yAxis = xyChart.yAxes.push(
        am5xy.ValueAxis.new(chart, {
            renderer: am5xy.AxisRendererY.new(chart, {})
        })
    );

    xAxis.data.setAll(chartData.data);

    
    const colors = getColors(chartData.categories.length);

    if (chartData.categories && chartData.data) {
        chartData.categories.forEach((category, index) => {
            let series;
            
            if (chartType === 'line') {
                series = xyChart.series.push(
                    am5xy.LineSeries.new(chart, {
                        name: category,
                        xAxis: xAxis,
                        yAxis: yAxis,
                        valueYField: category,
                        categoryXField: "category",
                        tooltip: am5.Tooltip.new(chart, {
                            labelText: "{name}: {valueY}"
                        })
                    })
                );

                series.strokes.template.setAll({
                    strokeWidth: 3,
                    stroke: am5.color(colors[index])
                });
                
                series.bullets.push(function() {
                    return am5.Bullet.new(chart, {
                        sprite: am5.Circle.new(chart, {
                            radius: 5,
                            fill: am5.color(colors[index])
                        })
                    });
                });
                
            } else {
                series = xyChart.series.push(
                    am5xy.ColumnSeries.new(chart, {
                        name: category,
                        xAxis: xAxis,
                        yAxis: yAxis,
                        valueYField: category,
                        categoryXField: "category",
                        tooltip: am5.Tooltip.new(chart, {
                            labelText: "{name}: {valueY}"
                        })
                    })
                );
                series.columns.template.setAll({
                    fill: am5.color(colors[index]),
                    stroke: am5.color(colors[index])
                });
            }
            
            series.data.setAll(chartData.data);
        });
    }

    const legend = xyChart.children.push(
        am5.Legend.new(chart, {
            centerX: am5.p50,
            x: am5.p50
        })
    );
    legend.data.setAll(xyChart.series.values);

    xyChart.set("cursor", am5xy.XYCursor.new(chart, {}));

    xyChart.appear(1000, 100);
}

function createPieChart(chartData) {
    console.log('Creando gráfica circular');
    
    chart = am5.Root.new("chartdiv");
    
    chart.setThemes([
        am5themes_Animated.new(chart)
    ]);

    const pieChart = chart.container.children.push(
        am5.PieChart.new(chart, {})
    );

    const pieSeries = pieChart.series.push(
        am5.PieSeries.new(chart, {
            name: "Candidatos",
            valueField: "value",
            categoryField: "category"
        })
    );

    pieSeries.slices.template.set("tooltipText", "{category}: {value}");

    pieSeries.data.setAll(chartData);

    const legend = pieChart.children.push(
        am5.Legend.new(chart, {
            centerX: am5.p50,
            x: am5.p50
        })
    );
    legend.data.setAll(pieSeries.dataItems);

    pieChart.appear(1000, 100);
}

function updateTotals(totals) {
    const container = document.getElementById('totalsContainer');
    if (!container) return;
    
    let html = '<strong>Totales por Ente Acreditador:</strong><br>';
    
    if (totals) {
        Object.keys(totals).forEach(key => {
            if (key !== 'general') {
                html += `<span class="badge bg-primary me-2 mb-1">${key}: ${totals[key]}</span>`;
            }
        });
        
        html += `<br><strong class="mt-2">Total General: ${totals.general || 0}</strong>`;
    }
    
    container.innerHTML = html;
}