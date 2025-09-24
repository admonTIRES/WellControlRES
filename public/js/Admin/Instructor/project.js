var proyectoDatatable = $("#project-list-table").DataTable({
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
    autoWidth: false,
    ajax: {
        dataType: 'json',
        data: {},
        method: 'GET',
        cache: false,
        url: '/proyectoDatatable',
        beforeSend: function () {
            // mostrarCarga();
        },
        complete: function () {
            proyectoDatatable.columns.adjust().draw();
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
        { data: 'FOLIO_PROJECT' },
        { data: 'COURSE_NAME_ES_PROJECT' },
        { data: 'COURSE_START_DATE_PROJECT' },
        { data: 'COURSE_END_DATE_PROJECT' },
        { data: 'GESTIONAR' }
    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center' },
        { targets: 1, title: 'FOLIO', className: 'text-center' },
        { targets: 2, title: 'NOMBRE', className: 'text-center' },
        { targets: 3, title: 'FECHA DE INICIO', className: 'text-center' },
        { targets: 4, title: 'FECHA DE FIN', className: 'text-center' },
        { targets: 5, title: 'ACCIONES', className: 'text-center' }

    ]

});