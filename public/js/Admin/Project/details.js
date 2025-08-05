
var projectStudentDatatable = $("#students-list-table").DataTable({
    language: { url: "https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json" },
    lengthChange: true,
    lengthMenu: [
        [10, 25, 50, -1],
        [10, 25, 50, 'Todos']
    ],
    info: false,
    paging: true,
    searching: true,
    filtering: true,
    scrollY: '65vh',
    scrollCollapse: true,
    responsive: true,
    ajax: {
        dataType: 'json',
        data: {ID_PROJECT: ID_PROJECT},
        method: 'GET',
        cache: false,
        url: '/projectStudentDatatable',
        beforeSend: function () {
            // mostrarCarga();
        },
        complete: function () {
            projectStudentDatatable.columns.adjust().draw();
            // ocultarCarga();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alertErrorAJAX(jqXHR, textStatus, errorThrown);
        },
        dataSrc: 'data'
    },
    order: [[0, 'asc']],
    columns: [
        {
            data: null,
            render: function (data, type, row, meta) {
                return meta.row + 1;
            }
        },
        { data: 'NOMBRE_COMPLETO' },
        { data: 'EMPRESA' },
        { data: 'EMAIL' },
        { data: 'ID_NUMBER' },
        { data: 'POSICION' },
        { data: 'BTN_EDITAR' }
    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center' },
        { targets: 1, title: 'NOMBRE', className: 'text-center' },
        { targets: 2, title: 'EMPRESA', className: 'text-center' },
        { targets: 3, title: 'EMAIL', className: 'text-center' },
        { targets: 4, title: 'ID', className: 'text-center' },
        { targets: 5, title: 'POSICIÓN', className: 'text-center' },
        { targets: 6, title: 'ACCIONES', className: 'text-center' }
    ]

});

function enviarCredencialesCorreo(data) {
    if (!data.email) {
        alert('El estudiante no tiene un correo registrado.');
        return;
    }

    Swal.fire({
        title: '¿Deseas enviar las credenciales?',
        text: `Se enviarán a ${data.nombre} (${data.email})`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Sí, enviar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/sendStudentCredentials',
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    nombre: data.nombre,
                    email: data.email,
                    password: data.password,
                    fechaInicio: data.fechaInicio,
                    fechaFin: data.fechaFin
                },
                success: function (response) {
                    Swal.fire('Enviado', response.msj, 'success');
                },
                error: function (xhr) {
                    Swal.fire('Error', xhr.responseJSON?.msj || 'No se pudo enviar el correo.', 'error');
                }
            });
        }
    });
}
