document.getElementById("logout").addEventListener('click', function (event) {
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

document.getElementById("menu").addEventListener('click', function (event) {
    event.preventDefault();
    event.stopPropagation();
});

document.getElementById("profile").addEventListener('click', function (event) {
    event.preventDefault();
    event.stopPropagation();
});

document.getElementById("config").addEventListener('click', function (event) {
    event.preventDefault();
    event.stopPropagation();
});

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