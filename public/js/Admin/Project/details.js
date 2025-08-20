
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
    scrollX: true,
    scrollCollapse: true,
    responsive: true,
    ajax: {
        dataType: 'json',
        data: { ID_PROJECT: ID_PROJECT },
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
        { data: 'EMPRESA' },
        { data: 'CR' },
        { data: 'LASTNAME' },
        { data: 'FIRSTNAME' },
        { data: 'MIDDLENAME' },
        { data: 'DOB' },
        { data: 'EMAIL' },
        { data: 'ID_NUMBER' },
        { data: 'CARGO' },
        { data: 'BTN_EDITAR' }
    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center' },
        { targets: 1, title: 'EMPRESA', className: 'text-center' },
        { targets: 2, title: 'CR', className: 'text-center' },
        { targets: 3, title: 'LASTNAME', className: 'text-center' },
        { targets: 4, title: 'FIRSTNAME', className: 'text-center' },
        { targets: 5, title: 'MIDDLENAME', className: 'text-center' },
        { targets: 6, title: 'DOB', className: 'text-center' },
        { targets: 7, title: 'EMAIL', className: 'text-center' },
        { targets: 8, title: 'ID_NUMBER', className: 'text-center' },
        { targets: 9, title: 'cargo', className: 'text-center' },
        { targets: 10, title: 'ACCIONES', className: 'text-center' }
    ]

});
var projectCourseDatatable = $("#course-list-table").DataTable({
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
    scrollX: true,
    scrollCollapse: true,
    responsive: true,
    ajax: {
        dataType: 'json',
        data: { ID_PROJECT: ID_PROJECT },
        method: 'GET',
        cache: false,
        url: '/projectCourseDatatable',
        beforeSend: function () {
            // mostrarCarga();
        },
        complete: function () {
            projectCourseDatatable.columns.adjust().draw();
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
        { data: 'NIVEL' },
        { data: 'BOP' },
        { data: 'UNITS' },
        { data: 'LANG' },
        { data: 'PRACTICAL' },
        { data: 'EQUIPAMENT' },
        { data: 'P&P' },
        { data: 'STATUS' },
        { data: 'RESIT' },
        { data: 'EQ' },
        { data: 'FECHA' },
        { data: 'SCORE' },
        { data: 'FINALTEST' },
        { data: 'VENCIMIENTO' },
        { data: 'CORREO' },
        { data: 'BTN_ENVIAR' },
        { data: 'BTN_EDITAR' }

    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center' },
        { targets: 1, title: 'NOMBRE', className: 'text-center' },
        { targets: 2, title: 'NIVEL', className: 'text-center' },
        { targets: 3, title: 'BOP', className: 'text-center' },
        { targets: 4, title: 'UNITS', className: 'text-center' },
        { targets: 5, title: 'LANG', className: 'text-center' },
        { targets: 6, title: 'PRACTICAL', className: 'text-center' },
        { targets: 7, title: 'EQUIPAMENT', className: 'text-center' },
        { targets: 8, title: 'P&P', className: 'text-center' },
        { targets: 9, title: 'STATUS', className: 'text-center' },
        { targets: 10, title: 'RESIT', className: 'text-center' },
        { targets: 11, title: 'EQ', className: 'text-center' },
        { targets: 12, title: 'FECHA', className: 'text-center' },
        { targets: 13, title: 'SCORE', className: 'text-center' },
        { targets: 14, title: 'FINALTEST', className: 'text-center' },
        { targets: 15, title: 'VENCIMIENTO', className: 'text-center' },
        { targets: 16, title: 'CORREO', className: 'text-center' },
        { targets: 17, title: 'ENVIAR', className: 'text-center' },
        { targets: 18, title: 'EDITAR', className: 'text-center' }

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
