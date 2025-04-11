document.getElementById('calculadoraDiv').addEventListener('click', function() {
    window.location.href = '/Calculator';
});

document.getElementById('hojasDiv').addEventListener('click', function() {
    window.location.href = '/Killsheet';
});



// function logoutbtn(event) {
//     // Prevenir cualquier comportamiento por defecto del botón
//     event.preventDefault();
//     event.stopPropagation();
    
//     Swal.fire({
//         title: '¿Estás seguro?',
//         text: "Se cerrará tu sesión y se te redirigirá al login.",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Sí, cerrar sesión',
//         cancelButtonText: 'Cancelar'
//     }).then((result) => {
//         if (result.isConfirmed) {
//             // Solo enviar el formulario si el usuario confirmó
//             document.getElementById('logout-form').submit();
//         }
//     });
    
//     // Importante: retornar false para evitar que el evento continúe propagándose
//     return false;
// }

// // Agregar este evento cuando el documento esté listo
// document.addEventListener('DOMContentLoaded', function() {
//     // Seleccionar el botón de logout y agregar el evento click
//     const logoutButton = document.querySelector('.logout-btn');
//     if (logoutButton) {
//         // Eliminar cualquier evento click existente
//         logoutButton.removeEventListener('click', logoutbtn);
//         // Agregar el nuevo evento click
//         logoutButton.addEventListener('click', logoutbtn);
        
//         // Asegurarse de que el botón no tenga atributos href o onclick
//         logoutButton.removeAttribute('href');
//         logoutButton.removeAttribute('onclick');
//     }
// });





