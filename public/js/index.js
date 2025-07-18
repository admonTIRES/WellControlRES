

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

document.getElementById("ajust").addEventListener('click', function (event) {
    event.preventDefault();
    event.stopPropagation();
});

/*---------------------------------------------------------------------
              LoaderInit
-----------------------------------------------------------------------*/

