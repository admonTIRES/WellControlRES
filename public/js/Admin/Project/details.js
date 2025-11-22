
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
        { data: 'ID_NUMBER' },
        { data: 'CARGO' },
        { data: 'EMAIL' },
        { data: 'PASSWORD' },
        { data: 'BTN_EDITAR' }
    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center' },
        { targets: 1, title: 'EMPRESA', className: 'text-center' },
        { targets: 2, title: 'CR', className: 'text-center' },
        { targets: 3, title: 'APELLIDOS', className: 'text-center' },
        { targets: 4, title: 'NOMBRE', className: 'text-center' },
        { targets: 5, title: 'SEGUNDO NOMBRE', className: 'text-center' },
        { targets: 6, title: 'FECHA DE NACIMIENTO', className: 'text-center' },
        { targets: 7, title: 'NUMERO', className: 'text-center' },
        { targets: 8, title: 'CARGO', className: 'text-center' },
        { targets: 9, title: 'CORREO', className: 'text-center' },
        { targets: 10, title: 'CONTRASEÑA', className: 'text-center' },
        { targets: 11, title: 'ACCIONES', className: 'text-center' }
    ]

});
// var projectCourseDatatable = $("#course-list-table").DataTable({
//     language: { url: "https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json" },
//     lengthChange: true,
//     lengthMenu: [
//         [10, 25, 50, -1],
//         [10, 25, 50, 'Todos']
//     ],
//     info: false,
//     paging: true,
//     searching: true,
//     filtering: true,
//     scrollY: '65vh',
//     scrollX: true,
//     scrollCollapse: true,
//     responsive: true,
//     ajax: {
//         dataType: 'json',
//         data: { ID_PROJECT: ID_PROJECT },
//         method: 'GET',
//         cache: false,
//         url: '/projectCourseDatatable',
//         beforeSend: function () {
//             // mostrarCarga();
//         },
//         complete: function () {
//             projectCourseDatatable.columns.adjust().draw();
//             // ocultarCarga();
//         },
//         error: function (jqXHR, textStatus, errorThrown) {
//             alertErrorAJAX(jqXHR, textStatus, errorThrown);
//         },
//         dataSrc: 'data'
//     },
//     order: [[0, 'asc']],
//     columns: [
//         {
//             data: null,
//             render: function (data, type, row, meta) {
//                 return meta.row + 1;
//             }
//         },
//         { data: 'NOMBRE_COMPLETO' },
//         { data: 'NIVEL' },
//         { data: 'BOP' },
//         { data: 'UNITS' },
//         { data: 'LANG' },
//         { data: 'PRACTICAL' },
//         { data: 'EQUIPAMENT' },
//         { data: 'P&P' },
//         { data: 'STATUS' },
//         { data: 'RESIT' },
//         { data: 'EQ' },
//         { data: 'FECHA' },
//         { data: 'SCORE' },
//         { data: 'FINALTEST' },
//         { data: 'VENCIMIENTO' },
//         { data: 'CORREO' },
//         { data: 'BTN_ENVIAR' },
//         { data: 'BTN_EDITAR' }

//     ],
//     columnDefs: [
//         { targets: 0, title: '#', className: 'text-center' },
//         { targets: 1, title: 'NOMBRE', className: 'text-center' },
//         { targets: 2, title: 'NIVEL', className: 'text-center' },
//         { targets: 3, title: 'BOP', className: 'text-center' },
//         { targets: 4, title: 'UNIDADES', className: 'text-center' },
//         { targets: 5, title: 'IDIOMA', className: 'text-center' },
//         { targets: 6, title: 'PRACTICO', className: 'text-center' },
//         { targets: 7, title: 'EQUIPOS', className: 'text-center' },
//         { targets: 8, title: 'P&P', className: 'text-center' },
//         { targets: 9, title: 'ESTADO', className: 'text-center' },
//         { targets: 10, title: 'RESIT', className: 'text-center' },
//         { targets: 11, title: 'MODULO', className: 'text-center' },
//         { targets: 12, title: 'FECHA', className: 'text-center' },
//         { targets: 13, title: 'ESTADO', className: 'text-center' },
//         { targets: 14, title: 'FINAL', className: 'text-center' },
//         { targets: 15, title: 'VENCIMIENTO', className: 'text-center' },
//         { targets: 16, title: 'CORREO', className: 'text-center' },
//         { targets: 17, title: 'ENVIAR', className: 'text-center' },
//         { targets: 18, title: 'EDITAR', className: 'text-center' }

//     ]

// });

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
        url: '/editarTablaCurso/' + ID_PROJECT, // Cambiado para usar la misma fuente de datos
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
        { targets: 2, title: 'PRÁCTICO', className: 'text-center' },
        { targets: 3, title: 'EQUIPOS', className: 'text-center' },
        { targets: 4, title: 'P&P', className: 'text-center' },
        { targets: 5, title: 'ESTADO', className: 'text-center' },
        { targets: 6, title: 'RESIT', className: 'text-center' },
        { targets: 7, title: 'INTENTOS', className: 'text-center' },
        { targets: 8, title: 'MÓDULO RESIT', className: 'text-center' },
        { targets: 9, title: 'RESIT INMEDIATO', className: 'text-center' },
        { targets: 10, title: 'FECHA RESIT', className: 'text-center' },
        { targets: 11, title: 'SCORE RESIT', className: 'text-center' },
        { targets: 12, title: 'RESIT PROGRAMADO', className: 'text-center' },
        { targets: 13, title: 'ENTRENAMIENTO', className: 'text-center' },
        { targets: 14, title: 'FECHA PROGRAMADA', className: 'text-center' },
        { targets: 15, title: 'SCORE PROGRAMADO', className: 'text-center' },
        { targets: 16, title: 'ESTADO FINAL', className: 'text-center' },
        { targets: 17, title: 'CERTIFICADO', className: 'text-center' },
        { targets: 18, title: 'VENCIMIENTO', className: 'text-center' },
        { targets: 19, title: 'CORREO', className: 'text-center' }
    ],
    createdRow: function (row, data, dataIndex) {
        // Aplicar clases de estilo según el estado (similar al modal)
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

// Función auxiliar para formatear fechas (debes implementarla)
function formatDateForDisplay(dateString) {
    if (!dateString) return 'N/A';
    const date = new Date(dateString);
    return date.toLocaleDateString('es-ES');
}

// Función para editar curso del estudiante
function editStudentCourse(candidateId) {
    // Aquí puedes abrir el modal de edición o redirigir a la página de edición
    console.log('Editar curso del candidato:', candidateId);
    // loadEditCourseModal(candidateId);
}

// Función para ver detalles del estudiante
function viewStudentDetails(candidateId) {
    // Implementar lógica para ver detalles
    console.log('Ver detalles del candidato:', candidateId);
}





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
function editarCandidatos() {
    $('#editarCandidatosModal').modal('show');
    loadTableData();
}
function editarCurso() {
    $('#editarCursoModal').modal('show');
    loadTableCursoModal();
}
function loadTableData() {
    $.ajax({
        url: '/editarTablaCandidato/' + ID_PROJECT,
        method: 'GET',
        dataType: 'json',
        beforeSend: function () {
            $('#edit-candidate-table tbody').html(`
                        <tr>
                            <td colspan="11" class="text-center">
                                <div class="spinner-container">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Cargando...</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    `);
        },
        success: function (data) {
            const tbody = $('#edit-candidate-table tbody');
            tbody.empty();

            if (data && data.length > 0) {
                data.forEach((row, index) => {
                    let tr = `<tr data-candidate-id="${row.ID_CANDIDATE || ''}" class="candidate-row">`;

                    tr += `<td class="text-center">${index + 1}</td>`;

                    // Empresa - Textarea
                    tr += `<td><textarea class="table-input textarea" 
                                    placeholder="Nombre de empresa" name="courses[${index}][COMPANY_PROJECT]">${row.COMPANY_PROJECT || ''}</textarea></td>`;

                    // CR - Input normal
                    tr += `<td><textarea class="table-input textarea" name="courses[${index}][CR_PROJECT]" 
                                    placeholder="CR">${row.CR_PROJECT || ''}</textarea></td>`;

                    // Apellido - Textarea
                    tr += `<td><textarea class="table-input textarea" name="courses[${index}][LAST_NAME_PROJECT]" 
                                    placeholder="Apellido">${row.LAST_NAME_PROJECT || ''}</textarea></td>`;

                    // Nombre - Textarea
                    tr += `<td><textarea class="table-input textarea" name="courses[${index}][FIRST_NAME_PROJECT]" 
                                    placeholder="Nombre">${row.FIRST_NAME_PROJECT || ''}</textarea></td>`;

                    // Segundo Nombre - Textarea
                    tr += `<td><textarea class="table-input textarea" name="courses[${index}][MIDDLE_NAME_PROJECT]" 
                                    placeholder="Segundo nombre">${row.MIDDLE_NAME_PROJECT || ''}</textarea></td>`;

                    // Fecha Nacimiento - Input date
                    tr += `<td><input class="table-input" type="date" 
                                value="${formatDateForInput(row.DOB_PROJECT) || ''}" name="courses[${index}][DOB_PROJECT]" /></td>`;

                    // ID - Textarea
                    tr += `<td><textarea class="table-input textarea" name="courses[${index}][ID_NUMBER_PROJECT]" 
                                    placeholder="Número de ID">${row.ID_NUMBER_PROJECT || ''}</textarea></td>`;

                    tr += `<td>
                                <select class="table-input membership-select" name="courses[${index}][MEMBERSHIP_PROJECT]">
                                    <option value="">Seleccionar...</option>
                                    <option value="N/A" ${(row.MEMBERSHIP_PROJECT === 'N/A') ? 'selected' : ''}>N/A</option>
                                    <option value="Premium" ${(row.MEMBERSHIP_PROJECT === 'Premium') ? 'selected' : ''}>Premium</option>
                                    <option value="Pro" ${(row.MEMBERSHIP_PROJECT === 'Pro') ? 'selected' : ''}>Pro</option>
                                    <option value="Enterprise" ${(row.MEMBERSHIP_PROJECT === 'Enterprise') ? 'selected' : ''}>Enterprise</option>
                                </select>
                            </td>`;

                    // Email - Input email
                    tr += `<td><input class="table-input email" type="email" 
                                value="${row.EMAIL_PROJECT || ''}" name="courses[${index}][EMAIL_PROJECT]" placeholder="correo@ejemplo.com" /></td>`;

                    // Contraseña - Input password
                    tr += `<td><input class="table-input password" type="password" 
                                value="${row.PASSWORD_PROJECT || ''}" name="courses[${index}][PASSWORD_PROJECT]" placeholder="Contraseña" /></td>`;

                    // Estado - Switch
                    tr += `<td>
                                <div class="status-switch-container">
                                    <label class="status-switch">
                                        <input type="checkbox" name="courses[${index}][ACTIVO]" ${(row.ACTIVO == 1) ? 'checked' : ''} class="candidate-active">
                                        <span class="status-slider"></span>
                                    </label>
                                </div>
                            </td>`;

                    // Acciones
                    tr += `<td class="table-row-actions">
                                    <div class="action-buttons">
                                        <button  type="button" class="btn btn-sm btn-danger btn-action" onclick="deleteCandidate(this, ${row.ID_CANDIDATE})"
                                            ${!row.ID_CANDIDATE ? 'disabled' : ''}>
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <button class="btn btn-sm btn-info btn-action" onclick="togglePassword(event,this)">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </td>`;

                    tr += '</tr>';
                    tbody.append(tr);
                });
                updateRowCount(data.length);
            } else {
                tbody.html(`
                            <tr>
                                <td colspan="11" class="text-center text-muted py-5">
                                    <i class="fas fa-users fa-3x mb-3"></i>
                                    <p>No hay candidatos registrados</p>
                                    <button class="btn btn-primary btn-sm" onclick="addNewRow()">
                                        <i class="fas fa-plus me-1"></i> Agregar primer candidato
                                    </button>
                                </td>
                            </tr>
                        `);
                updateRowCount(0);
            }
        },
        error: function (xhr, status, error) {
            const tbody = $('#edit-candidate-table tbody');
            tbody.html(`
                        <tr>
                            <td colspan="11" class="text-center text-danger py-5">
                                <i class="fas fa-exclamation-triangle fa-2x mb-3"></i>
                                <p>Error al cargar los datos: ${error}</p>
                                <button class="btn btn-warning btn-sm" onclick="loadTableData()">
                                    <i class="fas fa-redo me-1"></i> Reintentar
                                </button>
                            </td>
                        </tr>
                    `);
            updateRowCount(0);
        }
    });
}
function loadTableCursoModal() {
    $.ajax({
        url: '/editarTablaCurso/' + ID_PROJECT,
        method: 'GET',
        dataType: 'json',
        beforeSend: function () {
            $('#edit-course-table tbody').html(`
                <tr>
                    <td colspan="20" class="text-start">
                        <div class="spinner-container">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Cargando...</span>
                            </div>
                            <p class="mt-2">Cargando datos del curso...</p>
                        </div>
                    </td>
                </tr>
            `);
        },
        success: function (response) {
            const tbody = $('#edit-course-table tbody');
            tbody.empty();

            if (response.success && response.estudiantes && response.estudiantes.length > 0) {
                response.estudiantes.forEach((estudiante, index) => {
                    const candidato = estudiante.candidato;
                    const curso = estudiante.datos_curso;
                    const proyecto = response.proyecto;
                    const resitValue = curso.RESIT === '1' || curso.RESIT === 1 || curso.RESIT === 'Yes' ? 'Yes' : 'No';
                    const resitInmediatoValue = curso.RESIT_INMEDIATO === '1' || curso.RESIT_INMEDIATO === 1 || curso.RESIT_INMEDIATO === 'Yes' ? 'Yes' : 'No';
                    const resitProgramadoValue = curso.RESIT_PROGRAMADO === '1' || curso.RESIT_PROGRAMADO === 1 || curso.RESIT_PROGRAMADO === 'Yes' ? 'Yes' : 'No';
                    const certifiedValue = curso.CERTIFIED === '1' || curso.CERTIFIED === 1 || curso.CERTIFIED === 'Yes' ? 'Yes' : 'No';
                    const resitInmediatoPassValue = curso.RESIT_INMEDIATO_STATUS === 'Pass' || curso.RESIT_INMEDIATO_STATUS === 1 || curso.RESIT_INMEDIATO_STATUS === 'Yes' ? 'Pass' : (curso.RESIT_INMEDIATO_STATUS === 0 || curso.RESIT_INMEDIATO_STATUS === '0' || curso.RESIT_INMEDIATO_STATUS === 'No' ? 'Pass' : 'Unpass');
                    const resitProgramadoPassValue = curso.RESIT_PROGRAMADO_STATUS === 'Pass' || curso.RESIT_PROGRAMADO_STATUS === 1 || curso.RESIT_PROGRAMADO_STATUS === 'Yes' ? 'Pass' : (curso.RESIT_PROGRAMADO_STATUS === 0 || curso.RESIT_PROGRAMADO_STATUS === '0' || curso.RESIT_PROGRAMADO_STATUS === 'Pass' ? 'Unpass' : '');
                    const adicionalValue = curso.RESIT_ENTRENAMIENTO === '1' || curso.RESIT_ENTRENAMIENTO === 1 ? '1' : (curso.RESIT_ENTRENAMIENTO === 0 || curso.RESIT_ENTRENAMIENTO === '0' ? 0 : null);
                    const resitDisabled = resitValue !== 'Yes' ? 'disabled' : '';
                    const resitInmediatoDisabled = resitInmediatoValue !== 'Yes' ? 'disabled' : '';
                    const resitProgramadoDisabled = resitProgramadoValue !== 'Yes' ? 'disabled' : '';
                    const certifiedDisabled = certifiedValue !== 'Yes' ? 'disabled' : '';
                    const practicalStatus = curso.PRACTICAL_PASS || '';
                    const equipamentStatus = curso.EQUIPAMENT_PASS || '';
                    const pypStatus = curso.PYP_PASS || '';
                    const finalStatus = curso.FINAL_STATUS || '';
                    const practicalClass = practicalStatus === 'Unpass' ? 'unpass-status' : (practicalStatus === 'Pass' ? 'pass-status' : '');
                    const equipamentClass = equipamentStatus === 'Unpass' ? 'unpass-status' : (equipamentStatus === 'Pass' ? 'pass-status' : '');
                    const pypClass = pypStatus === 'Unpass' ? 'unpass-status' : (pypStatus === 'Pass' ? 'pass-status' : '');
                    const allUnpass = practicalStatus === 'Unpass' && equipamentStatus === 'Unpass' && pypStatus === 'Unpass';
                    const allPass = practicalStatus === 'Pass' && equipamentStatus === 'Pass' && pypStatus === 'Pass';
                    const key = candidato.ID_CANDIDATE;
                    let rowClass = '';
                    if (allUnpass) {
                        rowClass = 'row-unpass';
                    } else if (allPass || finalStatus === 'Pass') {
                        rowClass = 'row-pass';
                    }

                    let tr = `<tr data-candidate-id="${candidato.ID_CANDIDATE || ''}" data-curso-id="${estudiante.curso_id || ''}" class="course-row ${rowClass}">  `;

                    // Número
                    tr += `<td class="text-center">${index + 1}</td>`;

                    // Estudiante (Solo nombre, sin email aquí)
                    tr += `<td>
                            <span class="student-name">${candidato.LAST_NAME_PROJECT || ''} ${candidato.FIRST_NAME_PROJECT || ''} ${candidato.MIDDLE_NAME_PROJECT || ''}</span>
                        </td>`;

                    // Level (Niveles de acreditación) - SPAN
                    tr += `<td>
                            <div class="levels-container">`;
                    if (proyecto.ACCREDITATION_LEVELS_PROJECT && proyecto.ACCREDITATION_LEVELS_PROJECT.length > 0) {
                        proyecto.ACCREDITATION_LEVELS_PROJECT.forEach(nivel => {
                            tr += `<span class="level-badge">${nivel.nombre || nivel.descripcion}</span>`;
                        });
                    } else {
                        tr += `<span class="text-muted">N/A</span>`;
                    }
                    tr += `</div></td>`;

                    // BOP (Tipos BOP) - SPAN
                    tr += `<td>
                            <div class="bops-container">`;
                    if (proyecto.BOP_TYPES_PROJECT && proyecto.BOP_TYPES_PROJECT.length > 0) {
                        proyecto.BOP_TYPES_PROJECT.forEach(bop => {
                            tr += `<span class="bop-badge">${bop.abreviatura}</span>`;
                        });
                    } else {
                        tr += `<span class="text-muted">N/A</span>`;
                    }
                    tr += `</div></td>`;

                    // Language - SPAN
                    let idiomaTexto = 'N/A';
                    if (proyecto.LANGUAGE_PROJECT && Array.isArray(proyecto.LANGUAGE_PROJECT) && proyecto.LANGUAGE_PROJECT.length > 0) {
                        const idioma = proyecto.LANGUAGE_PROJECT[0];
                        idiomaTexto = idioma.DESCRIPCION_IDIOMAS || idioma.NOMBRE_IDIOMA || 'N/A';
                    }
                    tr += `<td>
                            <span class="language-badge">${idiomaTexto}</span>
                        </td>`;

                    // Practical (Porcentaje/Status)
                    tr += `<td>
                            <div class="score-status-container" style="position: relative;">
                                <input class="table-input practical-score ${practicalClass}" type="number" step="1" min="0" max="100"
                                    value="${curso.PRACTICAL || ''}" name="courses[${key}][PRACTICAL]" placeholder="0" style="padding-right: 25px;" />
                                <span style="position: absolute; right: 5px; top: 25%; transform: translateY(-50%); color: #555;">%</span>
                                <select class="table-input practical-status ${practicalClass}" name="courses[${key}][PRACTICAL_PASS]">
                                    <option value="">Status</option>
                                    <option value="Pass" ${(practicalStatus === 'Pass') ? 'selected' : ''}>Pass</option>
                                    <option value="Unpass" ${(practicalStatus === 'Unpass') ? 'selected' : ''}>Unpass</option>
                                </select>
                            </div>
                        </td>`;

                    // Equipament (Porcentaje/Status)
                    tr += `<td>
                            <div class="score-status-container" style="position: relative;">
                                <input class="table-input equipament-score ${equipamentClass}" type="number" step="1" min="0" max="100"
                                    value="${curso.EQUIPAMENT || ''}" name="courses[${key}][EQUIPAMENT]" placeholder="0" style="padding-right: 25px;" />
                                <span style="position: absolute; right: 5px; top: 25%; transform: translateY(-50%); color: #555;">%</span>
                                <select class="table-input equipament-status ${equipamentClass}" name="courses[${key}][EQUIPAMENT_PASS]">
                                    <option value="">Status</option>
                                    <option value="Pass" ${(equipamentStatus === 'Pass') ? 'selected' : ''}>Pass</option>
                                    <option value="Unpass" ${(equipamentStatus === 'Unpass') ? 'selected' : ''}>Unpass</option>
                                </select>
                            </div>
                        </td>`;

                    // P&P (Porcentaje/Status)
                    tr += `<td>
                            <div class="score-status-container" style="position: relative;">
                                <input class="table-input pyp-score ${pypClass}" type="number" step="1" min="0" max="100"
                                    value="${curso.PYP || ''}" name="courses[${key}][PYP]" placeholder="0" style="padding-right: 25px;" />
                                <span style="position: absolute; right: 5px; top: 25%; transform: translateY(-50%); color: #555;">%</span>
                                <select class="table-input pyp-status ${pypClass}" name="courses[${key}][PYP_PASS]">
                                    <option value="">Status</option>
                                    <option value="Pass" ${(pypStatus === 'Pass') ? 'selected' : ''}>Pass</option>
                                    <option value="Unpass" ${(pypStatus === 'Unpass') ? 'selected' : ''}>Unpass</option>
                                </select>
                            </div>
                        </td>`;


                    // Status general
                    tr += `<td>
                            <select class="table-input status-select" name="courses[${key}][STATUS]">
                                <option value="">Seleccionar...</option>
                                <option value="Pending" ${(curso.STATUS === 'Pending') ? 'selected' : ''}>Pending</option>
                                <option value="In Progress" ${(curso.STATUS === 'In Progress') ? 'selected' : ''}>In Progress</option>
                                <option value="Completed" ${(curso.STATUS === 'Completed') ? 'selected' : ''}>Completed</option>
                                <option value="Failed" ${(curso.STATUS === 'Failed') ? 'selected' : ''}>Failed</option>
                            </select>
                        </td>`;

                    // Resit (Switch Yes/No)
                    tr += `<td>
                            <input type="hidden" name="courses[${key}][RESIT]" value="0">
                            <label class="switch">
                                <input type="checkbox" class="resit-switch" name="courses[${key}][RESIT]" 
                                        ${resitValue === 'Yes' ? 'checked' : ''}>
                                <span class="slider"></span>
                            </label>
                        </td>`;
                    tr += `<td>
                                
                            <select class="table-input ${resitDisabled ? 'disabled-field' : ''} resit-intentos" name="courses[${key}][INTENTOS]" ${resitDisabled}>
                                <option value="">Seleccionar...</option>
                                <option value="1" ${(curso.INTENTOS === 1) ? 'selected' : ''}>1</option>
                                <option value="2" ${(curso.INTENTOS === 2) ? 'selected' : ''}>2</option>
                            </select>
                        </td>`;

                    tr += `<td>
                            <div class="bops-container resit-periodos" style="justify-content: center;">
                                <span class="bop-badge">${proyecto.DAYS_REST || 'N/A'}</span>
                            </div></td>`;

                    tr += `<td>
                            <div class="bops-container resit-restantes" style="justify-content: center;">
                                <span class="bop-badge"> ${proyecto.DAYS_REMAINING || 'N/A'}</span>
                            </div></td>`;

                    tr += `<td>
                            <div class="bops-container resit-limite" style="justify-content: center;">
                                <span class="bop-badge"> ${proyecto.COURSE_END_DATE_90 || 'N/A'} </span>
                            </div></td>`;

                    tr += `<td>
                            <select class="table-input module-select ${resitDisabled ? 'disabled-field' : ''}" name="courses[${key}][RESIT_MODULE]" ${resitDisabled}>
                                <option value="">Seleccionar...</option>
                                <option value="Equipament" ${(curso.RESIT_MODULE === 'Equipament') ? 'selected' : ''}>Equipament</option>
                                <option value="P&P" ${(curso.RESIT_MODULE === 'P&P') ? 'selected' : ''}>P&P</option>
                            </select>
                        </td>`;

                    tr += `<td>
                                <input type="hidden" name="courses[${key}][RESIT_INMEDIATO]" value="0">
                            <label class="switch">
                                <input type="checkbox" class="resit-switch-inmediato ${resitDisabled ? 'disabled-field' : ''}" name="courses[${key}][RESIT_INMEDIATO]" ${resitDisabled}" 
                                        ${resitInmediatoValue === 'Yes' ? 'checked' : ''}>
                                <span class="slider"></span>
                            </label>
                        </td>`;

                    // Date (Solo habilitado si Resit es Yes)
                    tr += `<td>
                            <input class="table-input resit-inmediato-date ${resitInmediatoDisabled ? 'disabled-field' : ''}" type="date" 
                                    value="${formatDateForInput(curso.RESIT_INMEDIATO_DATE) || ''}" name="courses[${key}][RESIT_INMEDIATO_DATE]" ${resitInmediatoDisabled} />
                        </td>`;

                    // Score (Solo habilitado si Resit es Yes)
                    tr += `<td>
                            <div class="score-status-container" style="position: relative;">
                                <input class="table-input resit-inmediato-score ${resitInmediatoDisabled ? 'disabled-field' : ''}" type="number" step="1" min="0" max="100"
                                    value="${curso.RESIT_INMEDIATO_SCORE || ''}" name="courses[${key}][RESIT_INMEDIATO_SCORE]" placeholder="0" style="padding-right: 25px;" ${resitInmediatoDisabled} />
                                <span style="position: absolute; right: 5px; top: 50%; transform: translateY(-50%); color: #555;">%</span>
                            </div>
                        </td>`;

                    // Resit Pass (Solo habilitado si Resit es Yes)
                    tr += `<td>
                            <select class="table-input resit-inmediato-status ${resitInmediatoDisabled ? 'disabled-field' : ''}" name="courses[${key}][RESIT_INMEDIATO_STATUS]" ${resitInmediatoDisabled}>
                                <option value="">Seleccionar...</option>
                                <option value="Pass" ${(resitInmediatoPassValue === 'Pass') ? 'selected' : ''}>Pass</option>
                                <option value="Unpass" ${(resitInmediatoPassValue === 'Unpass') ? 'selected' : ''}>Unpass</option>
                            </select>
                        </td>`;

                    // resit programado
                    tr += `<td>
                                <input type="hidden" name="courses[${key}][RESIT_PROGRAMADO]" value="0">
                            <label class="switch">
                                <input type="checkbox" class="resit-switch-programado ${resitDisabled ? 'disabled-field' : ''}" name="courses[${key}][RESIT_PROGRAMADO]" ${resitDisabled} " 
                                        ${resitProgramadoValue === 'Yes' ? 'checked' : ''}>
                                <span class="slider"></span>
                            </label>
                        </td>`;
                    // requiere entrenamiento adicional
                    tr += `<td>
                            <select class="table-input ${resitProgramadoDisabled ? 'disabled-field' : ''} entrenamiento-adi" name="courses[${key}][RESIT_ENTRENAMIENTO]" ${resitProgramadoDisabled}>
                                <option value="">Seleccionar...</option>
                                <option value="1" ${(resitInmediatoPassValue === 1) ? 'selected' : ''}>Sí</option>
                                <option value="0" ${(resitInmediatoPassValue === 0) ? 'selected' : ''}>No</option>
                            </select>
                        </td>`;
                    // folio de proyecto donde recibira entrenamiento adicional
                    tr += `<td>
                            <select class="table-input  ${resitProgramadoDisabled ? 'disabled-field' : ''} folio-proyecto" name="courses[${key}][RESIT_FOLIO_PROYECTO]" ${resitProgramadoDisabled}>
                                <option value="">Seleccionar...</option>
                                <option value="1" ${(resitInmediatoPassValue === 'Pass') ? 'selected' : ''}>Pass</option>
                                <option value="0" ${(resitInmediatoPassValue === 'Unpass') ? 'selected' : ''}>Unpass</option>
                                <option value="1" >Si</option>
                                <option value="1">No</option>
                            </select>
                        </td>`;
                    // fecha resity programado
                    tr += `<td>
                        <input class="table-input resit-programado-fecha ${resitProgramadoDisabled ? 'disabled-field' : ''}" type="date" 
                                    value="${formatDateForInput(curso.RESIT_DATE) || ''}" name="courses[${key}][RESIT_PROGRAMADO_DATE]" ${resitProgramadoDisabled} />
                        </td>`;

                    // Score (Solo habilitado si Resit es Yes)
                    tr += `<td>
                            <div class="score-status-container" style="position: relative;">
                                <input class="table-input resit-programado-score ${resitProgramadoDisabled ? 'disabled-field' : ''}" type="number" step="1" min="0" max="100"
                                    value="${curso.RESIT_SCORE || ''}" name="courses[${key}][RESIT_PROGRAMADO_SCORE]" placeholder="0" style="padding-right: 25px;" ${resitProgramadoDisabled} />
                                <span style="position: absolute; right: 5px; top: 50%; transform: translateY(-50%); color: #555;">%</span>
                            </div>
                        </td>`;

                    // Resit Pass (Solo habilitado si Resit es Yes)
                    tr += `<td>
                            <select class="table-input resit-programado-status ${resitProgramadoDisabled ? 'disabled-field' : ''}" name="courses[${key}][RESIT_PROGRAMADO_STATUS]" ${resitProgramadoDisabled}>
                                <option value="">Seleccionar...</option>
                                <option value="Pass" ${(resitProgramadoPassValue === 'Yes') ? 'selected' : ''}>Pass</option>
                                <option value="Unpass" ${(resitProgramadoPassValue === 'No') ? 'selected' : ''}>Unpass</option>
                            </select>
                        </td>`;


                    // Final Status
                    tr += `<td>
                            <select class="table-input final-status-select" name="courses[${key}][FINAL_STATUS]">
                                <option value="">Seleccionar...</option>
                                <option value="Pass" ${(finalStatus === 'Pass') ? 'selected' : ''}>Pass</option>
                                <option value="Unpass" ${(finalStatus === 'Unpass') ? 'selected' : ''}>Unpass</option>
                            </select>
                        </td>`;

                    // Certified (Switch Yes/No) 
                    tr += `<td>
                            <input type="hidden" name="courses[${key}][HAVE_CERTIFIED]" value="0">
                            <label class="switch">
                                <input type="checkbox" class="certified-switch" name="courses[${key}][HAVE_CERTIFIED]" 
                                        ${certifiedValue === 'Yes' ? 'checked' : ''}>
                                <span class="slider"></span>
                            </label>
                        </td>`;

                    // Expiration (Solo habilitado si Certified es Yes)
                    tr += `<td>
                            <input class="table-input expiration-date ${certifiedDisabled ? 'disabled-field' : ''}" type="date" 
                                    value="${formatDateForInput(curso.EXPIRATION) || ''}" name="courses[${key}][EXPIRATION]" ${certifiedDisabled} />
                        </td>`;

                    // Mail (Solo email)
                    tr += `<td>
                            <span class="email-text">${candidato.EMAIL_PROJECT || 'N/A'}</span>
                        </td>`;

                    // Acciones
                    tr += `<td class="table-row-actions text-center">
                            <div class="action-buttons">
                                <button class="btn btn-sm btn-info btn-action" onclick="viewStudentDetails(${candidato.ID_CANDIDATE})" title="Cargar certficado">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </td>`;

                    tr += `<input type="hidden" 
                            name="courses[${candidato.ID_CANDIDATE}][ID_CANDIDATE]" 
                            value="${candidato.ID_CANDIDATE}"> <input type="hidden" 
                            name="courses[${candidato.ID_CANDIDATE}][ID_PROJECT]" 
                            value="${ID_PROJECT}"> </tr>`;
                    tbody.append(tr);
                });

                addSwitchListeners();
                addValidationListeners();

                if (typeof updateRowCount === 'function') {
                    updateRowCount(response.estudiantes.length);
                }

            } else {
                tbody.html(`
                        <tr>
                            <td colspan="20" class="text-center text-muted py-5">
                                <i class="fas fa-graduation-cap fa-3x mb-3"></i>
                                <p>No hay estudiantes registrados en este curso</p>
                                <small class="d-block">Los estudiantes deben estar activos en la tabla de candidatos</small>
                            </td>
                        </tr>
                    `);

                if (typeof updateRowCount === 'function') {
                    updateRowCount(0);
                }
            }
        },
        error: function (xhr, status, error) {
            const tbody = $('#edit-course-table tbody');
            tbody.html(`
                    <tr>
                        <td colspan="20" class="text-center text-danger py-5">
                            <i class="fas fa-exclamation-triangle fa-2x mb-3"></i>
                            <p>Error al cargar los datos del curso</p>
                            <small class="d-block">${error}</small>
                            <button class="btn btn-warning btn-sm mt-2" onclick="loadTableCursoModal()">
                                <i class="fas fa-redo me-1"></i> Reintentar
                            </button>
                        </td>
                    </tr>
                `);

            if (typeof updateRowCount === 'function') {
                updateRowCount(0);
            }
        }
    });
}

const style = document.createElement('style');
style.textContent = `
        .student-name {
            font-weight: 600;
            font-size: 14px;
        }
        .language-badge {
            padding: 4px 8px;
            background: #e3f2fd;
            color: #1976d2;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
        }
        .level-badge {
            padding: 3px 6px;
            background: #f3e5f5;
            color: #7b1fa2;
            border-radius: 8px;
            font-size: 11px;
            margin: 2px;
            display: inline-block;
        }
        .bop-badge {
            padding: 3px 6px;
            background: #e8f5e9;
            color: #2e7d32;
            border-radius: 8px;
            font-size: 11px;
            margin: 2px;
            display: inline-block;
        }
        .levels-container, .bops-container {
            display: flex;
            flex-wrap: wrap;
            gap: 2px;
        }
        .mail-badge {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
        }
        .mail-badge.active {
            background: #e8f5e9;
            color: #2e7d32;
        }
        .mail-badge.inactive {
            background: #ffebee;
            color: #c62828;
        }
        .table-input {
            width: 100%;
            padding: 4px 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 12px;
        }
        .table-input:focus {
            outline: none;
            border-color: #2196f3;
            box-shadow: 0 0 0 2px rgba(33, 150, 243, 0.2);
        }
        .action-buttons {
            display: flex;
            gap: 4px;
            justify-content: center;
        }
        .btn-action {
            padding: 2px 6px;
            font-size: 12px;
        }
    `;
document.head.appendChild(style);
const switchStyles = `
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 24px;
        }
        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        input:checked + .slider {
            background-color: #A4D65E;
        }
        input:checked + .slider:before {
            transform: translateX(26px);
        }
        .score-status-container {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }
        .disabled {
            background-color: #f5f5f5;
            color: #999;
            cursor: not-allowed;
        }
        .email-text {
            font-size: 12px;
            color: #666;
            word-break: break-all;
        }
    `;
document.head.appendChild(document.createElement('style')).textContent = switchStyles;
const colorStyles = `
        /* Estilos para campos con estado */
        .pass-status {
            background-color: #d4edda !important;
            border-color: #c3e6cb !important;
            color: #155724 !important;
        }
        
        .unpass-status {
            background-color: #f8d7da !important;
            border-color: #f5c6cb !important;
            color: #721c24 !important;
        }
        
        /* Estilos para filas completas */
        .row-pass {
            background-color: #d4edda !important;
        }
        
        .row-pass td {
            border-color: #c3e6cb !important;
        }
        
        .row-unpass {
            background-color: #f8d7da !important;
        }
        
        .row-unpass td {
            border-color: #f5c6cb !important;
        }
        
        /* Campos deshabilitados en gris */
        .disabled-field {
            background-color: #f5f5f5 !important;
            color: #999 !important;
            cursor: not-allowed !important;
        }
        
        /* Campos normales */
        .table-input {
            width: 100%;
            padding: 4px 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 12px;
            background-color: white;
            transition: all 0.3s ease;
        }
        
        .table-input:focus {
            outline: none;
            border-color: #2196f3;
            box-shadow: 0 0 0 2px rgba(33, 150, 243, 0.2);
        }
        
        /* Mejora visual para los contenedores de score/status */
        .score-status-container {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }
        
        .score-status-container input,
        .score-status-container select {
            margin-bottom: 2px;
        }
        
        /* Estilos para switches */
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }
        
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 24px;
        }
        
        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        
        input:checked + .slider {
            background-color: #A4D65E;
        }
        
        input:checked + .slider:before {
            transform: translateX(26px);
        }
    `;

document.head.appendChild(document.createElement('style')).textContent = colorStyles;

function addSwitchListeners() {
    $('.resit-switch').on('change', function () {
        const isChecked = $(this).is(':checked');
        const row = $(this).closest('tr');

        row.find('.module-select, .resit-intentos, .resit-periodos, .resit-restantes, .resit-limite')
            .prop('disabled', !isChecked)
            .toggleClass('disabled-field', !isChecked);

        // Si se desactiva el resit, limpiar campos relacionados
        if (!isChecked) {
            row.find('.module-select').val('');
            row.find('.resit-intentos').val('');
            row.find('.resit-periodos').val('');
            row.find('.resit-restantes').val('');
            row.find('.resit-limite').val('');
        }

        // Validar el estado de la fila
        validateRowStatus(row);
    });

    $('.resit-switch-inmediato').on('change', function () {
        const isChecked = $(this).is(':checked');
        const row = $(this).closest('tr');

        row.find('.resit-inmediato-date, .resit-inmediato-score, .resit-inmediato-status')
            .prop('disabled', !isChecked)
            .toggleClass('disabled-field', !isChecked);

        if (!isChecked) {
            row.find('.resit-inmediato-date').val('');
            row.find('.resit-inmediato-score').val('');
            row.find('.resit-inmediato-status').val('');
        }

        validateRowStatus(row);
    });

    $('.resit-switch-programado').on('change', function () {
        const isChecked = $(this).is(':checked');
        const row = $(this).closest('tr');

        row.find('.entrenamiento-adi, .folio-proyecto, .resit-programado-fecha, .resit-programado-score, .resit-programado-status')
            .prop('disabled', !isChecked)
            .toggleClass('disabled-field', !isChecked);

        if (!isChecked) {
            row.find('.entrenamiento-adi').val('');
            row.find('.folio-proyecto').val('');
            row.find('.resit-programado-fecha').val('');
            row.find('.resit-programado-score').val('');
            row.find('.resit-programado-status').val('');
        }

        validateRowStatus(row);
    });

    $('.certified-switch').on('change', function () {
        const isChecked = $(this).is(':checked');
        const row = $(this).closest('tr');

        row.find('.expiration-date')
            .prop('disabled', !isChecked)
            .toggleClass('disabled-field', !isChecked);

        if (!isChecked) {
            row.find('.expiration-date').val('');
        }
    });
}
function addValidationListeners() {
    // Listeners para cambios en los status de Practical, Equipament y P&P
    $('.practical-status, .equipament-status, .pyp-status').on('change', function () {
        const row = $(this).closest('tr');
        validateRowStatus(row);
    });

    // Listener para cambios en el resultado del Resit
    $('.resit-status, .resit-inmediato-status, .resit-programado-status').on('change', function () {
        const row = $(this).closest('tr');
        validateRowStatus(row);
    });
}
function validateRowStatus(row) {
    const practicalStatus = row.find('.practical-status').val();
    const equipamentStatus = row.find('.equipament-status').val();
    const pypStatus = row.find('.pyp-status').val();
    const resitStatus = row.find('.resit-status').val();
    const resitInmediatoStatus = row.find('.resit-inmediato-status').val();
    const resitProgramadoStatus = row.find('.resit-programado-status').val();

    const resitSwitch = row.find('.resit-switch');
    const resitInmediatoSwitch = row.find('.resit-switch-inmediato');
    const resitProgramadoSwitch = row.find('.resit-switch-programado');

    const statusSelect = row.find('.status-select');
    const moduleResit = row.find('.module-select');

    const finalStatusSelect = row.find('.final-status-select');
    const certifiedSwitch = row.find('.certified-switch');
    const expirationDate = row.find('.expiration-date');

    // Reset clases
    row.removeClass('row-pass row-unpass row-pending row-inprogress');
    statusSelect.removeClass('status-pending status-inprogress status-completed status-failed');
    finalStatusSelect.removeClass('final-pass final-failed');
    row.find('.resit-inmediato-status').removeClass('resit-pass resit-failed');
    row.find('.resit-programado-status').removeClass('resit-pass resit-failed');


    // Aplicar colores a campos individuales
    row.find('.practical-status, .practical-score')
        .removeClass('pass-status unpass-status')
        .addClass(practicalStatus === 'Pass' ? 'pass-status' : (practicalStatus === 'Unpass' ? 'unpass-status' : ''));

    row.find('.equipament-status, .equipament-score')
        .removeClass('pass-status unpass-status')
        .addClass(equipamentStatus === 'Pass' ? 'pass-status' : (equipamentStatus === 'Unpass' ? 'unpass-status' : ''));

    row.find('.pyp-status, .pyp-score')
        .removeClass('pass-status unpass-status')
        .addClass(pypStatus === 'Pass' ? 'pass-status' : (pypStatus === 'Unpass' ? 'unpass-status' : ''));

    if (resitInmediatoStatus === 'Pass') {
        console.log("resit inmediato es pass");
        row.find('.resit-inmediato-status').addClass('resit-pass').removeClass('resit-failed');
        finalStatusSelect.val('Pass').addClass('final-pass').removeClass('final-failed');
        row.addClass('row-pass');
        certifiedSwitch.prop('checked', true);
        expirationDate.prop('disabled', false).removeClass('disabled-field');
        statusSelect.val('Completed').addClass('status-completed');
    }
    if (resitInmediatoStatus === 'Unpass') {
        console.log("resit inmediato es unpass");
        row.find('.resit-inmediato-status').addClass('resit-failed').removeClass('resit-pass');
        certifiedSwitch.prop('checked', false);
        expirationDate.prop('disabled', true).addClass('disabled-field');
    }
    if (resitProgramadoStatus === 'Pass') {
        console.log("resit programado es pass");
        row.find('.resit-programado-status').addClass('resit-pass').removeClass('resit-failed');
        finalStatusSelect.val('Pass').addClass('final-pass').removeClass('final-failed');
        row.addClass('row-pass');
        certifiedSwitch.prop('checked', true);
        expirationDate.prop('disabled', false).removeClass('disabled-field');
        statusSelect.val('Completed').addClass('status-completed');
    }
    if (resitProgramadoStatus === 'Unpass') {
        console.log("resit programado es unpass");
        row.find('.resit-programado-status').addClass('resit-failed').removeClass('resit-pass');
        finalStatusSelect.val('Unpass').addClass('final-failed').removeClass('final-pass');
        row.addClass('row-unpass');
        certifiedSwitch.prop('checked', false);
        expirationDate.prop('disabled', true).addClass('disabled-field');
    }
    console.log("else de none");
    const allEmpty = !practicalStatus && !equipamentStatus && !pypStatus;
    const allPass = practicalStatus === 'Pass' && equipamentStatus === 'Pass' && pypStatus === 'Pass';
    const anyUnpass = practicalStatus === 'Unpass' || equipamentStatus === 'Unpass' || pypStatus === 'Unpass';

    if (allEmpty) {
        statusSelect.val('Pending').addClass('status-pending');
        finalStatusSelect.val('').removeClass('final-pass final-failed');
        certifiedSwitch.prop('checked', false);
        expirationDate.prop('disabled', true).addClass('disabled-field');
        row.addClass('row-pending');
    } else if (allPass) {
        statusSelect.val('Completed').addClass('status-completed');
        finalStatusSelect.val('Pass').addClass('final-pass');
        resitSwitch.prop('checked', false);
        certifiedSwitch.prop('checked', true);
        expirationDate.prop('disabled', false).removeClass('disabled-field');
        row.addClass('row-pass');
    } else if (anyUnpass) {
        let unpassModules = [];
        if (practicalStatus === 'Unpass') unpassModules.push('Practical');
        if (equipamentStatus === 'Unpass') unpassModules.push('Equipament');
        if (pypStatus === 'Unpass') unpassModules.push('P&P');

        if (unpassModules.length === 1) {
            resitSwitch.prop('checked', true);
            row.find('.module-select, .resit-intentos, .resit-switch-programado, .resit-switch-inmediato')
                .prop('disabled', false)
                .removeClass('disabled-field');

            statusSelect.val('Failed').addClass('status-failed');

            moduleResit.val(unpassModules[0]);
        } else {
            statusSelect.val('Failed').addClass('status-failed');
            finalStatusSelect.val('Unpass')
                .addClass('final-failed')
                .removeClass('final-pass');

            resitSwitch.prop('checked', false);
            certifiedSwitch.prop('checked', false);

            moduleResit.val('');
            moduleResit.prop('disabled', true).addClass('disabled-field');

            expirationDate.prop('disabled', true).addClass('disabled-field');
            row.addClass('row-unpass');
        }

    } else {
        statusSelect.val('In Progress').addClass('status-inprogress');
        finalStatusSelect.val('').removeClass('final-pass final-failed');
        certifiedSwitch.prop('checked', false);
        expirationDate.prop('disabled', true).addClass('disabled-field');
        row.addClass('row-inprogress');
    }

}
function formatDateForInput(dateString) {
    if (!dateString) return '';
    const date = new Date(dateString);
    if (isNaN(date.getTime())) {
        if (dateString.includes('/')) {
            const parts = dateString.split('/');
            if (parts.length === 3) {
                return `${parts[2]}-${parts[1].padStart(2, '0')}-${parts[0].padStart(2, '0')}`;
            }
        }
        return '';
    }
    return date.toISOString().split('T')[0];
}
function addNewRow() {
    const tbody = $('#edit-candidate-table tbody');

    // Si está vacío, limpiar el mensaje de no datos
    if (tbody.children().length === 1 && tbody.find('.text-muted').length) {
        tbody.empty();
    }

    const rowCount = tbody.children().length;
    const newRow = `
            <tr data-candidate-id="" class="candidate-row new-row">
                <td class="text-center fw-bold">${rowCount + 1}</td>
                <td><textarea class="table-input textarea" name="company" placeholder="Nombre de empresa"></textarea></td>
                <td><textarea class="table-input textarea" name="cr" placeholder="CR"></textarea></td>
                <td><textarea class="table-input textarea" name="lastname" placeholder="Apellido"></textarea></td>
                <td><textarea class="table-input textarea" name="firstname" placeholder="Nombre"></textarea></td>
                <td><textarea class="table-input textarea" name="mdname" placeholder="Segundo nombre"></textarea></td>
                <td><input class="table-input" type="date" name="dob" /></td>
                <td><textarea class="table-input textarea" name="id_number" placeholder="Número de ID"></textarea></td>
                <td>
                    <select class="table-input membership-select" name="membership">
                        <option value="">Seleccionar...</option>
                        <option value="Basic">Basic</option>
                        <option value="Premium">Premium</option>
                        <option value="Pro">Pro</option>
                        <option value="Enterprise">Enterprise</option>
                    </select>
                </td>
                <td><input class="table-input" type="email" name="email" placeholder="correo@ejemplo.com" /></td>
                <td><input class="table-input" type="password" name="password" placeholder="Contraseña" /></td>
                <td>
                    <div class="status-switch-container">
                        <label class="status-switch">
                            <input type="checkbox" name="status" checked>
                            <span class="status-slider"></span>
                        </label>
                        <span class="status-label active">Activo</span>
                    </div>
                </td>
                <td class="table-row-actions">
                    <div class="action-buttons">
                        <button class="btn btn-danger btn-action" onclick="deleteCandidate(this, null)" title="Eliminar candidato">
                            <i class="fas fa-trash"></i>
                        </button>
                        <button class="btn btn-info btn-action" onclick="togglePassword(event,this)" title="Mostrar/ocultar contraseña">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </td>
            </tr>
        `;

    tbody.append(newRow);
    updateRowCount(tbody.find('.candidate-row').length);
}
async function deleteCandidate(button, candidateId) {
    if (!candidateId) {
        alertToast('No se encontró el ID del candidato', 'error', 2000);
        return;
    }

    const confirmDelete = await Swal.fire({
        title: '¿Estás seguro?',
        text: 'Este candidato será eliminado permanentemente.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    });

    if (!confirmDelete.isConfirmed) return;

    Swal.fire({
        title: 'Eliminando...',
        text: 'Por favor, espera un momento',
        allowOutsideClick: false,
        didOpen: () => Swal.showLoading()
    });

    try {
        const response = await $.ajax({
            url: 'candidateSave',
            method: 'POST',
            data: {
                api: 4,
                ID_CANDIDATE: candidateId,
                _token: $('input[name="_token"]').val()
            },
            dataType: 'json'
        });

        Swal.close();

        if (response.code === 1) {
            const row = $(button).closest('tr');
            row.fadeOut(300, () => row.remove());
            alertMensaje('success', 'Eliminado', 'El candidato fue eliminado correctamente');
            loadTableData();
            projectStudentDatatable.ajax.reload();
            console.log('ya recargo segun');

        } else {
            alertMensaje('error', 'Error', response.message || 'No se pudo eliminar el candidato');
        }

    } catch (error) {
        Swal.close();
        alertMensaje('error', 'Error', 'Ocurrió un problema al eliminar el candidato.');
        console.error('Error al eliminar candidato:', error);
    }
}

function togglePassword(event, button) {
    event.preventDefault();
    const input = $(button).closest('tr').find('input.password').length ? $(button).closest('tr').find('input.password') : $(button).closest('tr').find('input[name="password"]');

    if (input.length === 0) {
        console.warn('No se encontró un campo de contraseña en esta fila.');
        return;
    }

    const type = input.attr('type');
    const newType = type === 'password' ? 'text' : 'password';
    input.attr('type', newType);
    $(button).find('i').toggleClass('fa-eye fa-eye-slash');
}
function filterTable() {
    const searchText = $('#searchInput').val().toLowerCase();
    $('.candidate-row').each(function () {
        const rowText = $(this).text().toLowerCase();
        $(this).toggle(rowText.includes(searchText));
    });
}
function updateRowCount(count) {
    $('#rowCount').text(`${count} candidato${count !== 1 ? 's' : ''}`);
}
function saveCandidateTable() {
    let tableData = [];
    $('#edit-candidate-table tbody tr').each(function () {
        let row = {};
        $(this).find('td').each(function (index) {
            const value = $(this).find('input').val();
            switch (index) {
                case 0: row.id = value; break;
                case 1: row.empresa = value; break;
                case 2: row.cr = value; break;
                case 3: row.lastname = value; break;
                case 4: row.firstname = value; break;
                case 5: row.mdname = value; break;
                case 6: row.dob = value; break;
                case 7: row.id = value; break;
                case 8: row.email = value; break;
                case 9: row.password = value; break;
            }
        });
        tableData.push(row);
    });

    $.ajax({
        url: '/saveCandidateTable',
        method: 'POST',
        data: { data: tableData, _token: '{{ csrf_token() }}' },
        success: function (response) {
            alert('Cambios guardados correctamente');
            $('#editarCandidatosModal').modal('hide');
        }
    });
}

$("#cursobtnModal").click(async function (e) {
    e.preventDefault();
    // Convertir todos los checkboxes a 1 o 0
    $('#coursesForm').find('.resit-switch').each(function () {
        $(this).val($(this).is(':checked') ? 1 : 0);
    });

    // Convertir todos los checkboxes a 1 o 0
    $('#coursesForm').find('.resit-switch-inmediato').each(function () {
        $(this).val($(this).is(':checked') ? 1 : 0);
    });


    // Convertir todos los checkboxes a 1 o 0
    $('#coursesForm').find('.resit-switch-programado').each(function () {
        $(this).val($(this).is(':checked') ? 1 : 0);
    });

    // Convertir todos los checkboxes a 1 o 0
    $('#coursesForm').find('.certified-switch').each(function () {
        $(this).val($(this).is(':checked') ? 1 : 0);
    });

    let formularioValido = validarFormulario($('#coursesForm'));

    if (!formularioValido) {
        alertToast('Por favor, complete todos los campos del formulario.', 'error', 2000);
        return;
    }

    alertMensajeConfirm({
        title: "¿Desea guardar la información?",
        text: "Se creará este proyecto",
        icon: "question",
    }, async function () {

        await loaderbtn('cursobtnModal');

        // --- Preparar dataToSend ---
        const formDataArray = $('#coursesForm').serializeArray();
        const dataToSend = { api: 2, ID_PROJECT: ID_PROJECT };

        formDataArray.forEach(item => {
            const match = item.name.match(/^courses\[(\d+)\]\[(\w+)\]$/);
            if (match) {
                const candidateId = match[1];
                const key = match[2];
                dataToSend[`courses[${candidateId}][${key}]`] = item.value;
            } else {
                dataToSend[item.name] = item.value;
            }
        });

        console.log('Datos a enviar:', dataToSend);

        await ajaxAwaitFormData(
            dataToSend,
            'cursoSave',
            'coursesForm',
            'cursobtnModal',
            { callbackAfter: true, callbackBefore: true },
            () => {
                Swal.fire({
                    icon: 'info',
                    title: 'Espere un momento',
                    text: 'Estamos guardando la información',
                    showConfirmButton: false,
                });
                $('.swal2-popup').addClass('ld ld-breath');
            },
            (data) => {

                Swal.close(); // cerrar loader de SweetAlert
                alertMensaje('success', 'Información guardada correctamente', 'Esta información está lista para usarse', null, null, 1500);
                document.getElementById('coursesForm').reset();
                loadTableCursoModal();
                projectCourseDatatable.ajax.reload()
            }
        );
    });
});

$("#candidatebtnModal").click(async function (e) {
    e.preventDefault();
    $('#candidateForm').find('.candidate-active').each(function () {
        $(this).val($(this).is(':checked') ? 1 : 0);
    });

    let formularioValido = validarFormulario($('#candidateForm'));

    if (!formularioValido) {
        alertToast('Por favor, complete todos los campos del formulario.', 'error', 2000);
        return;
    }

    alertMensajeConfirm({
        title: "¿Desea guardar la información?",
        text: "Se actualizarán los datos de esta tabla",
        icon: "question",
    }, async function () {

        await loaderbtn('candidatebtnModal');

        const formDataArray = $('#candidateForm').serializeArray();
        const dataToSend = { api: 3, ID_PROJECT: ID_PROJECT };

        formDataArray.forEach(item => {
            const match = item.name.match(/^courses\[(\d+)\]\[(\w+)\]$/);
            if (match) {
                const candidateId = match[1];
                const key = match[2];
                dataToSend[`courses[${candidateId}][${key}]`] = item.value;
            } else {
                dataToSend[item.name] = item.value;
            }
        });

        console.log('Datos a enviar:', dataToSend);

        await ajaxAwaitFormData(
            dataToSend,
            'candidateSave',
            'candidateForm',
            'candidatebtnModal',
            { callbackAfter: true, callbackBefore: true },
            () => {
                Swal.fire({
                    icon: 'info',
                    title: 'Espere un momento',
                    text: 'Estamos guardando la información',
                    showConfirmButton: false,
                });
                $('.swal2-popup').addClass('ld ld-breath');
            },
            (data) => {
                Swal.close();
                alertMensaje('success', 'Información guardada correctamente', 'Esta información está lista para usarse', null, null, 1500);
                document.getElementById('candidateForm').reset();
                loadTableData();
                projectStudentDatatable.ajax.reload()

            }
        );
    });
});
