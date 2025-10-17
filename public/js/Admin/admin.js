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

// Notifiación  movil
if (window.innerWidth <= 768) {
    position = 'top';
  } else {
    position = 'top';
    // position = 'top-start';
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
  
    // Busca todos los elementos input, textarea y select dentro del formulario y agrega la clase "validar"
    formulario.find('input[required]:not([disabled]), textarea[required]:not([disabled]), select[required]:not([disabled])').addClass('validar').removeClass('error');
  
    // Busca todos los elementos con la clase "validar"
    var campos =  formulario.find('.validar');
    var formularioValido = true;
  
    campos.each(function () {
        var tipoCampo = $(this).attr('type');
        var valorCampo = $(this).val();
  
        // Verifica si el campo es un radio o checkbox y si hay uno seleccionado
        if (tipoCampo === 'radio' || tipoCampo === 'checkbox') {
            var nombreGrupo = $(this).attr('name');
            if ($('input[name="' + nombreGrupo + '"]:checked').length === 0) {
                $('input[name="' + nombreGrupo + '"]').addClass('error');
                formularioValido = false;
            } else {
                $('input[name="' + nombreGrupo + '"]').removeClass('error');
            }
        } 
        // Valida otros tipos de campos (text, email, etc.)
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

  // Comprobar si el dato es nulo o no es un objeto
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
  // Iterar a través de las claves en values
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

  // Si el resultado aún contiene un & no reemplazado y no es seguido por caracteres, reemplazarlo con &amp;
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
          // Caso específico para la postulación a una vacante
          if (data.msj === 'Ya te has postulado a esta vacante') {
            Swal.fire({
              icon: 'warning',
              title: 'Ya estás postulado a esta vacante',
              text: 'Nos pondremos en contacto contigo pronto.',
              confirmButtonText: 'Entendido'
            });
          } else {
            // Manejo general de otros posibles errores con code 0
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
    showConfirmButton: false,  // No muestra el botón "OK"
    timerProgressBar: true,    // Muestra una barra de progreso
    
  });
}
function alertaDesarrollo(e) {
    e.preventDefault(); // evita que el enlace haga scroll o navegue
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
    //valores por defecto de la funcion ajaxAwait y ajaxAwaitFormData
    const defaults = {
        alertBefore: false, //Alerta por defecto, "Estamos cargando la solucitud" <- Solo si la api consume tiempo
        response: true, //Si la api tiene la estructura correcta (response.code)
        callbackBefore: false, //Activa la function antes de enviar datos, before
        callbackAfter: false, //Activa una funcion para tratar datos enviados desde ajax, osea success
        returnData: true, // regresa los datos o confirmado (1)
        WithoutResponseData: false, //Manda los datos directos
        resetForm: false, //Reinicia el formulario en ajaxAwaitFormData,
        ajaxComplete: () => { }, //Mete una funcion para cuando se complete
        ajaxError: () => { }, //Mete una funcion para cuando de error
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
async function ajaxAwaitFormData(dataJson = { api: 0, }, apiURL, form = 'OnlyForm'  /* <-- Formulario sin # */, btn = 'OnlyBtn',
    config = {
        alertBefore: false
    },
    //Callback antes de enviar datos
    callbackBefore = () => {
        alertMsj({
            title: 'Espera un momento...',
            text: 'Estamos cargando tu solicitud, esto puede demorar un rato',
            icon: 'info',
            showCancelButton: false
        })
    },
    //Callback, antes de devolver la data
    callbackSuccess = () => {
        console.log('callback ajaxAwait por defecto')
    }
) {

    return new Promise(function (resolve, reject) {

        //Configura la funcion misma
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
            // complete: ajaxComplete(),
            error: function (jqXHR, exception, data) {
                // ajaxError()
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