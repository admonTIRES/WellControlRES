ID_EXAM_EXERCISE = 0
ID_QUESTION_EXERCISE = 0

$(document).ready(function() {
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
        $('#NOPTIONS_QUESTION').on('change', function() {
            numOpciones = parseInt($(this).val()) || 0;
            actualizarOpciones();
            actualizarMaximoRespuestasCorrectas();
        });
        
        // Cuando cambia el número de respuestas correctas
        $('#CORRECTOPTIONS_QUESTION').on('change', function() {
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
            const selectRespuestasCorrectas = $('#CORRECTOPTIONS_QUESTION');
            
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
   
    

});