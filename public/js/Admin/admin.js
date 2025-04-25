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
        $('#' + btn).html('Guardando... <img src="/assets/images/loaderbtn.gif" alt="" style="max-width: 100%; max-height: 40px;">').prop('disabled', true).removeClass('btn-success').addClass('btn-light');  
        if ($('#' + btn +' img').length > 0) {
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

function alertToast(msj = 'No ha seleccionado ningún registro', icon = 'error', timer = 3000) {
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
                alertErrorAJAX(jqXHR, exception, data)
            },
        })
    });
}