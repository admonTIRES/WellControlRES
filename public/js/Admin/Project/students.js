
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
    responsive: false,
    ajax: {
        dataType: 'json',
        method: 'GET',
        cache: false,
        url: '/tablaEstudiantesGeneral', // Cambiado para usar la misma fuente de datos
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
        dataSrc: 'estudiantes'
    },
    order: [[0, 'asc']],
    columns: [
        {
            data: null,
            render: function (data, type, row, meta) {
                return meta.row + 1;
            }
        },
        {
            data: 'candidato',
            render: function (data) {
                return `${data.LAST_NAME_PROJECT || ''} ${data.FIRST_NAME_PROJECT || ''} ${data.MIDDLE_NAME_PROJECT || ''}`;
            }
        },
        {
            data: 'proyecto',
            render: function (data) {
                return data.FOLIO_PROJECT || '<span class="text-muted">N/A</span>';
            }
        },
        {
            data: 'proyecto',
            render: function (data) {
                return data.CENTRO_CAPACITACION || '<span class="text-muted">N/A</span>';
            }
        },
        {
            data: 'proyecto',
            render: function (data) {
                return data.TIPO_OPERACION || '<span class="text-muted">N/A</span>';
            }
        },
        {
            data: 'proyecto',
            render: function (data) {
                return data.ENTE_ACREDITADOR || '<span class="text-muted">N/A</span>';
            }
        },
        {
            data: 'proyecto',
            render: function (data) {
                // Mostrar nombres de niveles de acreditación
                if (data.NIVELES_ACREDITACION && data.NIVELES_ACREDITACION.length > 0) {
                    const nombres = data.NIVELES_ACREDITACION.map(nivel => nivel.nombre);
                    return nombres.join(', ');
                }
                return '<span class="text-muted">N/A</span>';
            }
        },
        {
            data: 'proyecto',
            render: function (data) {
                // Mostrar abreviaturas de tipos BOP
                if (data.TIPOS_BOP && data.TIPOS_BOP.length > 0) {
                    const abreviaturas = data.TIPOS_BOP.map(bop => bop.abreviatura);
                    return abreviaturas.join(', ');
                }
                return '<span class="text-muted">N/A</span>';
            }
        },
        {
            data: 'datos_curso',
            render: function (data) {
                const score = data.PRACTICAL || '';
                const status = data.PRACTICAL_PASS || '';
                const statusText = status === 'Unpass' ? 'No Aprobado' : (status === 'Pass' ? 'Aprobado' : '');
                const statusClass = status === 'Unpass' ? 'unpass-status' : (status === 'Pass' ? 'pass-status' : '');
                return `
            <div class="score-status-display">
                <span class="score-text ${statusClass}">${score}%</span>
                ${status ? `<span class="status-badge ${statusClass}">${statusText}</span>` : ''}
            </div>
        `;
            }
        },
        {
            data: 'datos_curso',
            render: function (data) {
                const score = data.EQUIPAMENT || '';
                const status = data.EQUIPAMENT_PASS || '';
                const statusText = status === 'Unpass' ? 'No Aprobado' : (status === 'Pass' ? 'Aprobado' : '');
                const statusClass = status === 'Unpass' ? 'unpass-status' : (status === 'Pass' ? 'pass-status' : '');
                return `
            <div class="score-status-display">
                <span class="score-text ${statusClass}">${score}%</span>
                ${status ? `<span class="status-badge ${statusClass}">${statusText}</span>` : ''}
            </div>
        `;
            }
        },
        {
            data: 'datos_curso',
            render: function (data) {
                const score = data.PYP || '';
                const status = data.PYP_PASS || '';
                const statusText = status === 'Unpass' ? 'No Aprobado' : (status === 'Pass' ? 'Aprobado' : '');
                const statusClass = status === 'Unpass' ? 'unpass-status' : (status === 'Pass' ? 'pass-status' : '');
                return `
            <div class="score-status-display">
                <span class="score-text ${statusClass}">${score}%</span>
                ${status ? `<span class="status-badge ${statusClass}">${statusText}</span>` : ''}
            </div>
        `;
            }
        },
        {
            data: 'datos_curso',
            render: function (data) {
                const status = data.STATUS || '';
                let badgeClass = '';
                let statusText = status;

                switch (status) {
                    case 'Pending':
                        badgeClass = 'badge-warning';
                        statusText = 'Pendiente';
                        break;
                    case 'In Progress':
                        badgeClass = 'badge-info';
                        statusText = 'En Progreso';
                        break;
                    case 'Completed':
                        badgeClass = 'badge-success';
                        statusText = 'Completado';
                        break;
                    case 'Failed':
                        badgeClass = 'badge-danger';
                        statusText = 'Fallido';
                        break;
                    default:
                        badgeClass = 'badge-secondary';
                        statusText = status || 'N/A';
                }
                return status ? `<span class="badge ${badgeClass}">${statusText}</span>` : '<span class="text-muted">N/A</span>';
            }
        },
        {
            data: 'datos_curso',
            render: function (data) {
                const resitValue = data.RESIT === '1' || data.RESIT === 1 || data.RESIT === 'Yes' ? 'Sí' : 'No';
                const badgeClass = resitValue === 'Sí' ? 'badge-warning' : 'badge-secondary';
                return `<span class="badge ${badgeClass}">${resitValue}</span>`;
            }
        },
        {
            data: 'datos_curso',
            render: function (data) {
                const intentos = data.INTENTOS || '';
                return intentos ? `<span class="badge badge-info">${intentos}</span>` : '<span class="text-muted">N/A</span>';
            }
        },
        {
            data: 'datos_curso',
            render: function (data) {
                const resitModule = data.RESIT_MODULE || '';
                let moduleText = resitModule;
                switch (resitModule) {
                    case 'Equipament': moduleText = 'Equipos'; break;
                    case 'P&P': moduleText = 'P&P'; break;
                }
                return resitModule ? `<span class="badge badge-primary">${moduleText}</span>` : '<span class="text-muted">N/A</span>';
            }
        },
        {
            data: 'datos_curso',
            render: function (data) {
                const resitInmediato = data.RESIT_INMEDIATO === '1' || data.RESIT_INMEDIATO === 1 || data.RESIT_INMEDIATO === 'Yes' ? 'Sí' : 'No';
                const badgeClass = resitInmediato === 'Sí' ? 'badge-warning' : 'badge-secondary';
                return `<span class="badge ${badgeClass}">${resitInmediato}</span>`;
            }
        },
        {
            data: 'datos_curso',
            render: function (data) {
                const date = data.RESIT_INMEDIATO_DATE || '';
                return date ? formatDateForDisplay(date) : '<span class="text-muted">N/A</span>';
            }
        },
        {
            data: 'datos_curso',
            render: function (data) {
                const score = data.RESIT_INMEDIATO_SCORE || '';
                const status = data.RESIT_INMEDIATO_STATUS || '';
                const statusText = status === 'Unpass' ? 'No Aprobado' : (status === 'Pass' ? 'Aprobado' : '');
                const statusClass = status === 'Unpass' ? 'unpass-status' : (status === 'Pass' ? 'pass-status' : '');
                return `
            <div class="score-status-display">
                <span class="score-text ${statusClass}">${score}%</span>
                ${status ? `<span class="status-badge ${statusClass}">${statusText}</span>` : ''}
            </div>
        `;
            }
        },
        {
            data: 'datos_curso',
            render: function (data) {
                const resitProgramado = data.RESIT_PROGRAMADO === '1' || data.RESIT_PROGRAMADO === 1 || data.RESIT_PROGRAMADO === 'Yes' ? 'Sí' : 'No';
                const badgeClass = resitProgramado === 'Sí' ? 'badge-warning' : 'badge-secondary';
                return `<span class="badge ${badgeClass}">${resitProgramado}</span>`;
            }
        },
        {
            data: 'datos_curso',
            render: function (data) {
                const entrenamiento = data.RESIT_ENTRENAMIENTO;
                let texto = 'N/A';
                let badgeClass = 'badge-secondary';

                if (entrenamiento === '1' || entrenamiento === 1) {
                    texto = 'Sí';
                    badgeClass = 'badge-info';
                } else if (entrenamiento === '0' || entrenamiento === 0) {
                    texto = 'No';
                    badgeClass = 'badge-secondary';
                }

                return `<span class="badge ${badgeClass}">${texto}</span>`;
            }
        },
        {
            data: 'datos_curso',
            render: function (data) {
                const date = data.RESIT_PROGRAMADO_DATE || '';
                return date ? formatDateForDisplay(date) : '<span class="text-muted">N/A</span>';
            }
        },
        {
            data: 'datos_curso',
            render: function (data) {
                const score = data.RESIT_PROGRAMADO_SCORE || '';
                const status = data.RESIT_PROGRAMADO_STATUS || '';
                const statusText = status === 'Unpass' ? 'No Aprobado' : (status === 'Pass' ? 'Aprobado' : '');
                const statusClass = status === 'Unpass' ? 'unpass-status' : (status === 'Pass' ? 'pass-status' : '');
                return `
            <div class="score-status-display">
                <span class="score-text ${statusClass}">${score}%</span>
                ${status ? `<span class="status-badge ${statusClass}">${statusText}</span>` : ''}
            </div>
        `;
            }
        },
        {
            data: 'datos_curso',
            render: function (data) {
                const finalStatus = data.FINAL_STATUS || '';
                const statusText = finalStatus === 'Unpass' ? 'No Aprobado' : (finalStatus === 'Pass' ? 'Aprobado' : '');
                const badgeClass = finalStatus === 'Pass' ? 'badge-success' : (finalStatus === 'Unpass' ? 'badge-danger' : 'badge-secondary');
                return finalStatus ? `<span class="badge ${badgeClass}">${statusText}</span>` : '<span class="text-muted">N/A</span>';
            }
        },
        {
            data: 'datos_curso',
            render: function (data) {
                const certified = data.HAVE_CERTIFIED === '1' || data.HAVE_CERTIFIED === 1 || data.HAVE_CERTIFIED === 'Yes' ? 'Sí' : 'No';
                const badgeClass = certified === 'Sí' ? 'badge-success' : 'badge-secondary';
                return `<span class="badge ${badgeClass}">${certified}</span>`;
            }
        },
        {
            data: 'datos_curso',
            render: function (data) {
                const expiration = data.EXPIRATION || '';
                return expiration ? formatDateForDisplay(expiration) : '<span class="text-muted">N/A</span>';
            }
        },
        {
            data: 'candidato',
            render: function (data) {
                return data.EMAIL_PROJECT || '<span class="text-muted">N/A</span>';
            }
        }
    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center' },
        { targets: 1, title: 'ESTUDIANTE', className: 'text-left' },
        { targets: 2, title: 'FOLIO PROYECTO', className: 'text-left' },
        { targets: 3, title: 'EMPRESA', className: 'text-left' },
        { targets: 4, title: 'RAZON SOCIAL', className: 'text-left' },
        { targets: 5, title: 'ACREDITACIÓN', className: 'text-left' },
        { targets: 6, title: 'NIVEL', className: 'text-left' },
        { targets: 7, title: 'BOP', className: 'text-left' },
        { targets: 8, title: 'PRÁCTICO', className: 'text-center' },
        { targets: 9, title: 'EQUIPOS', className: 'text-center' },
        { targets: 10, title: 'P&P', className: 'text-center' },
        { targets: 11, title: 'ESTADO', className: 'text-center' },
        { targets: 12, title: 'RESIT', className: 'text-center' },
        { targets: 13, title: 'INTENTOS', className: 'text-center' },
        { targets: 14, title: 'MÓDULO RESIT', className: 'text-center' },
        { targets: 15, title: 'RESIT INMEDIATO', className: 'text-center' },
        { targets: 16, title: 'FECHA RESIT', className: 'text-center' },
        { targets: 17, title: 'SCORE RESIT', className: 'text-center' },
        { targets: 18, title: 'RESIT PROGRAMADO', className: 'text-center' },
        { targets: 19, title: 'ENTRENAMIENTO', className: 'text-center' },
        { targets: 20, title: 'FECHA PROGRAMADA', className: 'text-center' },
        { targets: 21, title: 'SCORE PROGRAMADO', className: 'text-center' },
        { targets: 22, title: 'ESTADO FINAL', className: 'text-center' },
        { targets: 23, title: 'CERTIFICADO', className: 'text-center' },
        { targets: 24, title: 'VENCIMIENTO', className: 'text-center' },
        { targets: 25, title: 'CORREO', className: 'text-center' }
    ],
    createdRow: function (row, data, dataIndex) {
        const curso = data.datos_curso;
        const practicalStatus = curso.PRACTICAL_PASS || '';
        const equipamentStatus = curso.EQUIPAMENT_PASS || '';
        const pypStatus = curso.PYP_PASS || '';
        const finalStatus = curso.FINAL_STATUS || '';

        const allUnpass = practicalStatus === 'Unpass' && equipamentStatus === 'Unpass' && pypStatus === 'Unpass';
        const allPass = practicalStatus === 'Pass' && equipamentStatus === 'Pass' && pypStatus === 'Pass';

        if (allUnpass) {
            $(row).addClass('row-unpass');
        } else if (allPass || finalStatus === 'Pass') {
            $(row).addClass('row-pass');
        }
    }
});

function formatDateForDisplay(dateString) {
    if (!dateString) return 'N/A';
    const date = new Date(dateString);
    return date.toLocaleDateString('es-ES');
}