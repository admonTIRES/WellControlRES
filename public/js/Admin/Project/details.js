let programRules = {};
let projectProgramId = null;

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
        } else if(finalStatus === 'Unpass'){
            $(row).addClass('row-unpass');
        }
    }
});

function formatDateForDisplay(dateString) {
    if (!dateString) return 'N/A';
    const date = new Date(dateString);
    return date.toLocaleDateString('es-ES');
}
function editStudentCourse(candidateId) {
    console.log('Editar curso del candidato:', candidateId);
    // loadEditCourseModal(candidateId);
}
function viewStudentDetails(candidateId) {
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
// function editarCandidatos() {
//     $('#editarCandidatosModal').modal('show');
//     loadTableData();
// }
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

                    tr += `<td>
                        <div class="score-status-container" style="position: relative;">
                            <div class="status-switch-container">
                                <label class="status-switch">
                                    <!-- Checkbox VISUAL sin name -->
                                    <input type="checkbox" 
                                        ${(row.ASISTENCIA == 1) ? 'checked' : ''} 
                                        class="candidate-asistencia-visual"
                                        data-index="${index}">
                                    <span class="status-slider"></span>
                                </label>
                                <!-- Hidden input que SIEMPRE se envía -->
                                <input type="hidden" 
                                    name="courses[${index}][ASISTENCIA]" 
                                    id="asistencia_hidden_${index}"
                                    value="${row.ASISTENCIA == 1 ? 1 : 0}">
                            </div>
                            <textarea class="table-input textarea ${row.ASISTENCIA == 1 ? 'd-none' : ''}" 
                                    name="courses[${index}][MOTIVO]" id="asistencia_text_${index}"
                                    placeholder="Ingrese el motivo por el cual este estudiante no asistio o se retiro del curso" 
                                    style="padding-right: 25px;">${row.MOTIVO || ''}</textarea>
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
// function loadTableCursoModal() {
//     $.ajax({
//         url: '/editarTablaCurso/' + ID_PROJECT,
//         method: 'GET',
//         dataType: 'json',
//         beforeSend: function () {
//              if ($.fn.DataTable.isDataTable('#edit-course-table')) {
//                 $('#edit-course-table').DataTable().destroy();
//             }
//             $('#edit-course-table tbody').html(`
//                 <tr>
//                     <td colspan="20" class="text-start">
//                         <div class="spinner-container">
//                             <div class="spinner-border text-primary" role="status">
//                                 <span class="visually-hidden">Cargando...</span>
//                             </div>
//                             <p class="mt-2">Cargando datos del curso...</p>
//                         </div>
//                     </td>
//                 </tr>
//             `);
//         },
//         success: function (response) {
//             const thead = $('#edit-course-table thead');
//             thead.empty();
//             const proyecto = response.proyecto;
//             let headerRow1 = ``;
//             let headerRow2 = ``;
//             if (proyecto.ACCREDITING_ENTITY_PROJECT) {
//                 if (proyecto.ACCREDITING_ENTITY_PROJECT === '1') {//iadc
//                     headerRow1 = `
//                     <tr>
//                         <th colspan="5" class="text-center">Generalidades</th>
//                         <th colspan="1" class="text-center">Examen práctico</th>
//                         <th colspan="1" class="text-center">Examen teórico</th>
//                         <th colspan="3" class="text-center" id="encabezadoComplementos">Complementos</th>
//                         <th colspan="1" class="text-center">RESUMEN</th>
//                         <th colspan="6" class="text-center">RE-SIT</th>
//                         <th colspan="4" class="text-center">RE-SIT INMEDIATO</th>
//                         <th colspan="6" class="text-center">RE-SIT PROGRAMADO</th>
//                         <th colspan="1" class="text-center">FINAL</th>
//                         <th colspan="5" class="text-center">Certificación</th>
//                     </tr>
//                 `;

//                     headerRow2 = `
//                     <tr>
//                         <th width="50px" class="text-center">#</th>
//                         <th class="col-180" width="140px">Estudiante</th>
//                         <th class="col-180" width="180px">Nivel</th>
//                         <th width="180px">BOP</th>
//                         <th width="180px">Idioma</th>

//                         <th class="col-180" width="180px">Práctico</th>
//                         <th class="col-180" width="180px">Equipos</th>

//                         <th class="col-180" width="180px" id="complementoTh">Complemento</th>
//                         <th class="col-180" width="180px" id="d1Th">WorkOver (WO)</th>
//                         <th class="col-180" width="180px" id="d2Th">SubSea (SS)</th>

//                         <th class="col-180" width="180px">Estatus</th>

//                         <th width="180px">Resit</th>
//                         <th width="180px">No. Intentos permitidos</th>
//                         <th width="180px">Periodo</th>
//                         <th width="180px">Dias restantes</th>
//                         <th width="180px">Fecha límite</th>

//                         <th class="col-180" width="180px">Resit módulo</th>
//                         <th width="180px">Sí</th>
//                         <th class="col-180" width="180px">Fecha</th>
//                         <th class="col-180" width="180px">Puntaje</th>
//                         <th class="col-180" width="180px">Estatus</th>

//                         <th width="180px">Sí</th>
//                         <th width="180px">Requiere entrenamiento adicional</th>
//                         <th width="180px">Folio de proyecto para entrenamiento</th>
//                         <th class="col-180" width="180px">Fecha</th>
//                         <th class="col-180" width="180px">Puntaje</th>
//                         <th class="col-180" width="180px">Estatus</th>

//                         <th class="col-180" width="180px">Estatus</th>
//                         <th width="180px">Sí</th>
//                         <th class="col-180" width="180px">Expiración</th>
//                         <th class="col-180" width="180px">Vigencia</th>
//                         <th class="col-250" width="180px">Correo</th>
//                         <th width="100px" class="table-row-actions text-center">Documento</th>
//                     </tr>
//                 `;
//                 } else if (proyecto.ACCREDITING_ENTITY_PROJECT === '2') {//iwcf
//                     headerRow1 = `
//                         <tr>
//                             <th colspan="5" class="text-center">Generalidades</th>
//                             <th colspan="1" class="text-center">Examen práctico</th>
//                             <th colspan="2" class="text-center">Examen teórico</th>
//                             <th colspan="4" class="text-center" id="encabezadoComplementos">Complementos</th>
//                             <th colspan="1" class="text-center">RESUMEN</th>
//                             <th colspan="6" class="text-center">RE-SIT</th>
//                             <th colspan="4" class="text-center">RE-SIT INMEDIATO</th>
//                             <th colspan="6" class="text-center">RE-SIT PROGRAMADO</th>
//                             <th colspan="1" class="text-center">FINAL</th>
//                             <th colspan="5" class="text-center">Certificación</th>
//                         </tr>
//                     `;

//                     headerRow2 = `
//                     <tr>
//                         <th width="50px" class="text-center">#</th>
//                         <th class="col-180" width="140px">Estudiante</th>
//                         <th class="col-180" width="180px">Nivel</th>
//                         <th width="180px">BOP</th>
//                         <th width="180px">Idioma</th>

//                         <th class="col-180" width="180px">Práctico</th>
//                         <th class="col-180" width="180px">Equipos</th>
//                         <th class="col-180" width="180px" id="pypTh">P&P</th>

//                         <th class="col-180" width="180px" id="complementoTh">Complemento</th>
//                         <th class="col-180" width="180px" id="d1Th">D1</th>
//                         <th class="col-180" width="180px" id="d2Th">D2</th>
//                         <th class="col-180" width="180px" id="d3Th">D3</th>

//                         <th class="col-180" width="180px">Estatus</th>

//                         <th width="180px">Resit</th>
//                         <th width="180px">No. Intentos permitidos</th>
//                         <th width="180px">Periodo</th>
//                         <th width="180px">Dias restantes</th>
//                         <th width="180px">Fecha límite</th>

//                         <th class="col-180" width="180px">Resit módulo</th>
//                         <th width="180px">Sí</th>
//                         <th class="col-180" width="180px">Fecha</th>
//                         <th class="col-180" width="180px">Puntaje</th>
//                         <th class="col-180" width="180px">Estatus</th>

//                         <th width="180px">Sí</th>
//                         <th width="180px">Requiere entrenamiento adicional</th>
//                         <th width="180px">Folio de proyecto para entrenamiento</th>
//                         <th class="col-180" width="180px">Fecha</th>
//                         <th class="col-180" width="180px">Puntaje</th>
//                         <th class="col-180" width="180px">Estatus</th>

//                         <th class="col-180" width="180px">Estatus</th>
//                         <th width="180px">Sí</th>
//                         <th class="col-180" width="180px">Expiración</th>
//                         <th class="col-180" width="180px">Vigencia</th>
//                         <th class="col-250" width="180px">Correo</th>
//                         <th width="100px" class="table-row-actions text-center">Documento</th>
//                     </tr>
//                 `;
//                 }
//             }



//             thead.append(headerRow1 + headerRow2);

//             const tbody = $('#edit-course-table tbody');
//             tbody.empty();

//             if (response.success && response.estudiantes && response.estudiantes.length > 0) {
//                 response.estudiantes.forEach((estudiante, index) => {
//                     const candidato = estudiante.candidato;
//                     const asistenciaStatus = candidato.ASISTENCIA || '';
//                     const curso = estudiante.datos_curso;
//                     const resitValue = curso.RESIT === '1' || curso.RESIT === 1 || curso.RESIT === 'Yes' ? 'Yes' : 'No';
//                     const resitInmediatoValue = curso.RESIT_INMEDIATO === '1' || curso.RESIT_INMEDIATO === 1 || curso.RESIT_INMEDIATO === 'Yes' ? 'Yes' : 'No';
//                     const resitProgramadoValue = curso.RESIT_PROGRAMADO === '1' || curso.RESIT_PROGRAMADO === 1 || curso.RESIT_PROGRAMADO === 'Yes' ? 'Yes' : 'No';
//                     const certifiedValue = curso.CERTIFIED === '1' || curso.CERTIFIED === 1 || curso.CERTIFIED === 'Yes' ? 'Yes' : 'No';
//                     const resitInmediatoPassValue = curso.RESIT_INMEDIATO_STATUS === 'Pass' || curso.RESIT_INMEDIATO_STATUS === 1 || curso.RESIT_INMEDIATO_STATUS === 'Yes' ? 'Pass' : (curso.RESIT_INMEDIATO_STATUS === 0 || curso.RESIT_INMEDIATO_STATUS === '0' || curso.RESIT_INMEDIATO_STATUS === 'No' ? 'Pass' : 'Unpass');
//                     const resitProgramadoPassValue = curso.RESIT_PROGRAMADO_STATUS === 'Pass' || curso.RESIT_PROGRAMADO_STATUS === 1 || curso.RESIT_PROGRAMADO_STATUS === 'Yes' ? 'Pass' : (curso.RESIT_PROGRAMADO_STATUS === 0 || curso.RESIT_PROGRAMADO_STATUS === '0' || curso.RESIT_PROGRAMADO_STATUS === 'Pass' ? 'Unpass' : '');
//                     const adicionalValue = curso.RESIT_ENTRENAMIENTO === '1' || curso.RESIT_ENTRENAMIENTO === 1 ? '1' : (curso.RESIT_ENTRENAMIENTO === 0 || curso.RESIT_ENTRENAMIENTO === '0' ? 0 : null);
//                     const resitDisabled = resitValue !== 'Yes' ? 'disabled' : '';
//                     const resitInmediatoDisabled = resitInmediatoValue !== 'Yes' ? 'disabled' : '';
//                     const resitProgramadoDisabled = resitProgramadoValue !== 'Yes' ? 'disabled' : '';
//                     const certifiedDisabled = certifiedValue !== 'Yes' ? 'disabled' : '';
//                     const practicalStatus = curso.PRACTICAL_PASS || '';
//                     const equipamentStatus = curso.EQUIPAMENT_PASS || '';
//                     const pypStatus = curso.PYP_PASS || '';
//                     const finalStatus = curso.FINAL_STATUS || '';
//                     const practicalClass = practicalStatus === 'Unpass' ? 'unpass-status' : (practicalStatus === 'Pass' ? 'pass-status' : '');
//                     const equipamentClass = equipamentStatus === 'Unpass' ? 'unpass-status' : (equipamentStatus === 'Pass' ? 'pass-status' : '');
//                     const pypClass = pypStatus === 'Unpass' ? 'unpass-status' : (pypStatus === 'Pass' ? 'pass-status' : '');
//                     const allUnpass = practicalStatus === 'Unpass' && equipamentStatus === 'Unpass' && pypStatus === 'Unpass';
//                     const allPass = practicalStatus === 'Pass' && equipamentStatus === 'Pass' && pypStatus === 'Pass';
//                     const key = candidato.ID_CANDIDATE;
//                     let rowClass = '';
//                     if (allUnpass) {
//                         rowClass = 'row-unpass';
//                     } else if (allPass || finalStatus === 'Pass') {
//                         rowClass = 'row-pass';
//                     } else if(finalStatus === 'Unpass'){
//                        rowClass = 'row-unpass';
//                     }

//                     let tr = `<tr data-candidate-id="${candidato.ID_CANDIDATE || ''}" data-curso-id="${estudiante.curso_id || ''}" class="course-row ${rowClass}">  `;

//                     // Número
//                     tr += `<td class="text-center">${index + 1}</td>`;

//                     // Estudiante (Solo nombre, sin email aquí)
//                     tr += `<td>
//                             <span class="student-name">${candidato.LAST_NAME_PROJECT || ''} ${candidato.FIRST_NAME_PROJECT || ''} ${candidato.MIDDLE_NAME_PROJECT || ''}</span>
//                         </td>`;

//                     // Level (Niveles de acreditación) - SPAN
//                     tr += `<td>
//                     <div class="levels-container">`;

//                     const niveles = proyecto.ACCREDITATION_LEVELS_PROJECT || [];
//                     const candidatoLevel = candidato.LEVEL || 0;

//                     if (niveles.length === 0) {
//                         tr += `<span class="text-muted">N/A</span>`;
//                     } else {

//                         // SI SOLO HAY UN NIVEL
//                         if (niveles.length === 1) {
//                             const unico = niveles[0];
//                             tr += `
//                                 <select class="form-select form-select-sm level-select">
//                                     <option value="${unico.id}" selected>
//                                         ${unico.nombre || unico.descripcion}
//                                     </option>
//                                 </select>`;
//                         } else {
//                             // VARIOS NIVELES
//                             tr += `<select class="form-select form-select-sm level-select">`;

//                             // Si candidato no tiene nivel seleccionado
//                             if (candidatoLevel <= 0) {
//                                 tr += `<option value="">Seleccione un nivel</option>`;
//                             }

//                             niveles.forEach(nivel => {
//                                 const nivelId = nivel.id;
//                                 const selected = (nivelId == candidatoLevel) ? "selected" : "";

//                                 tr += `
//                                     <option value="${nivelId}" ${selected}>
//                                         ${nivel.nombre || nivel.descripcion}
//                                     </option>`;
//                             });

//                             tr += `</select>`;
//                         }
//                     }

//                     tr += `</div>
//                     </td>`;


//                     // BOP (Tipos BOP) - SPAN
//                     tr += `<td>
//                             <div class="bops-container">`;
//                     if (proyecto.BOP_TYPES_PROJECT && proyecto.BOP_TYPES_PROJECT.length > 0) {
//                         proyecto.BOP_TYPES_PROJECT.forEach(bop => {
//                             tr += `<span class="bop-badge">${bop.abreviatura}</span>`;
//                         });
//                     } else {
//                         tr += `<span class="text-muted">N/A</span>`;
//                     }
//                     tr += `</div></td>`;

//                     // Language - SPAN
//                     let idiomaTexto = 'N/A';
//                     if (proyecto.LANGUAGE_PROJECT && Array.isArray(proyecto.LANGUAGE_PROJECT) && proyecto.LANGUAGE_PROJECT.length > 0) {
//                         const idioma = proyecto.LANGUAGE_PROJECT[0];
//                         idiomaTexto = idioma.DESCRIPCION_IDIOMAS || idioma.NOMBRE_IDIOMA || 'N/A';
//                     }
//                     tr += `<td>
//                             <span class="language-badge">${idiomaTexto}</span>
//                         </td>`;

//                     // Practical (Porcentaje/Status)
//                     tr += `<td>
//                             <div class="score-status-container" style="position: relative;">
//                                 <input class="table-input practical-score ${practicalClass}" type="number" step="1" min="0" max="100"
//                                     value="${curso.PRACTICAL || ''}" name="courses[${key}][PRACTICAL]" placeholder="0" style="padding-right: 25px;" />
//                                 <span style="position: absolute; right: 5px; top: 25%; transform: translateY(-50%); color: #555;">%</span>
//                                 <select class="table-input practical-status ${practicalClass}" name="courses[${key}][PRACTICAL_PASS]">
//                                     <option value="">Status</option>
//                                     <option value="Pass" ${(practicalStatus === 'Pass') ? 'selected' : ''}>Pass</option>
//                                     <option value="Unpass" ${(practicalStatus === 'Unpass') ? 'selected' : ''}>Failed</option>
//                                 </select>
//                             </div>
//                         </td>`;

//                     // Equipament (Porcentaje/Status)
//                     tr += `<td>
//                             <div class="score-status-container" style="position: relative;">
//                                 <input class="table-input equipament-score ${equipamentClass}" type="number" step="1" min="0" max="100"
//                                     value="${curso.EQUIPAMENT || ''}" name="courses[${key}][EQUIPAMENT]" placeholder="0" style="padding-right: 25px;" />
//                                 <span style="position: absolute; right: 5px; top: 25%; transform: translateY(-50%); color: #555;">%</span>
//                                 <select class="table-input equipament-status ${equipamentClass}" name="courses[${key}][EQUIPAMENT_PASS]">
//                                     <option value="">Status</option>
//                                     <option value="Pass" ${(equipamentStatus === 'Pass') ? 'selected' : ''}>Pass</option>
//                                     <option value="Unpass" ${(equipamentStatus === 'Unpass') ? 'selected' : ''}>Failed</option>
//                                 </select>
//                             </div>
//                         </td>`;

//                     // P&P (Porcentaje/Status)


//                     if (proyecto.ACCREDITING_ENTITY_PROJECT) {
//                         if (proyecto.ACCREDITING_ENTITY_PROJECT === '1') {//iadc (segun cada acreditacion cambia los complementos que pueden llevar)(los numeros son los id del catalgo)
//                             tr += `<td>
//                                 <input type="hidden" name="courses[${key}][CO]" value="0">
//                                 <label class="switch">
//                                     <input type="checkbox" class="co-switch" name="courses[${key}][CO]">
//                                     <span class="slider"></span>
//                                 </label>
//                             </td>`; 
//                             tr += `<td>
//                                 <div class="score-status-container" style="position: relative;">
//                                     <input class="table-input" type="number" step="1" min="0" max="100"
//                                         value="${curso.WORKOVER || ''}" name="courses[${key}][WORKOVER]" placeholder="0" style="padding-right: 25px;" />
//                                     <span style="position: absolute; right: 5px; top: 25%; transform: translateY(-50%); color: #555;">%</span>
//                                     <select class="table-input" name="courses[${key}][WORKOVER]">
//                                         <option value="">Seleccionar</option>
//                                         <option value="Pass">Pass</option>
//                                         <option value="Unpass">Failed</option>
//                                     </select>
//                                 </div>
//                             </td>`;
//                             tr += `<td>
//                                 <div class="score-status-container" style="position: relative;">
//                                     <input class="table-input" type="number" step="1" min="0" max="100"
//                                         value="${curso.SUBSEA || ''}" name="courses[${key}][SUBSEA]" placeholder="0" style="padding-right: 25px;" />
//                                     <span style="position: absolute; right: 5px; top: 25%; transform: translateY(-50%); color: #555;">%</span>
//                                     <select class="table-input" name="courses[${key}][SUBSEA]">
//                                         <option value="">Seleccionar</option>
//                                         <option value="Pass">Pass</option>
//                                         <option value="Unpass">Failed</option>
//                                     </select>
//                                 </div>
//                             </td>`;
//                         } else if (proyecto.ACCREDITING_ENTITY_PROJECT === '2') {//iwcf
//                             tr += `<td>
//                                 <div class="score-status-container" style="position: relative;">
//                                     <input class="table-input pyp-score ${pypClass}" type="number" step="1" min="0" max="100"
//                                         value="${curso.PYP || ''}" name="courses[${key}][PYP]" placeholder="0" style="padding-right: 25px;" />
//                                     <span style="position: absolute; right: 5px; top: 25%; transform: translateY(-50%); color: #555;">%</span>
//                                     <select class="table-input pyp-status ${pypClass}" name="courses[${key}][PYP_PASS]">
//                                         <option value="">Status</option>
//                                         <option value="Pass" ${(pypStatus === 'Pass') ? 'selected' : ''}>Pass</option>
//                                         <option value="Unpass" ${(pypStatus === 'Unpass') ? 'selected' : ''}>Failed</option>
//                                     </select>
//                                 </div>
//                             </td>`;
//                             tr += `<td>
//                                 <input type="hidden" name="courses[${key}][CO]" value="0">
//                                 <label class="switch">
//                                     <input type="checkbox" class="co-switch" name="courses[${key}][CO]">
//                                     <span class="slider"></span>
//                                 </label>
//                             </td>`;
//                             tr += `<td>
//                                 <div class="score-status-container" style="position: relative;">
//                                     <input class="table-input" type="number" step="1" min="0" max="100"
//                                          name="courses[${key}][D1]" placeholder="0" style="padding-right: 25px;" />
//                                     <span style="position: absolute; right: 5px; top: 25%; transform: translateY(-50%); color: #555;">%</span>
//                                     <select class="table-input" name="courses[${key}][D1_STATUS]">
//                                         <option value="">Seleccionar</option>
//                                         <option value="Pass">Pass</option>
//                                         <option value="Unpass">Failed</option>
//                                     </select>
//                                 </div>
//                             </td>`;
//                             tr += `<td>
//                                 <div class="score-status-container" style="position: relative;">
//                                     <input class="table-input pyp-score ${pypClass}" type="number" step="1" min="0" max="100"
//                                         value="${curso.PYP || ''}" name="courses[${key}][PYP]" placeholder="0" style="padding-right: 25px;" />
//                                     <span style="position: absolute; right: 5px; top: 25%; transform: translateY(-50%); color: #555;">%</span>
//                                     <select class="table-input pyp-status ${pypClass}" name="courses[${key}][PYP_PASS]">
//                                         <option value="">Status</option>
//                                         <option value="Pass" ${(pypStatus === 'Pass') ? 'selected' : ''}>Pass</option>
//                                         <option value="Unpass" ${(pypStatus === 'Unpass') ? 'selected' : ''}>Failed</option>
//                                     </select>
//                                 </div>
//                             </td>`;
//                         }
//                     } else {
//                         tr += `<td>
//                             NA
//                         </td>`;
//                         tr += `<td>
//                             NA
//                         </td>`;
//                         tr += `<td>
//                            NA
//                         </td>`;
//                         tr += `<td>
//                            NA
//                         </td>`;
//                     }

//                     // Status general
//                     tr += `<td>
//                             <select class="table-input status-select" name="courses[${key}][STATUS]">
//                                 <option value="">Seleccionar...</option>
//                                 <option value="Pending" ${(curso.STATUS === 'Pending') ? 'selected' : ''}>Pending</option>
//                                 <option value="In Progress" ${(curso.STATUS === 'In Progress') ? 'selected' : ''}>In Progress</option>
//                                 <option value="Completed" ${(curso.STATUS === 'Completed') ? 'selected' : ''}>Completed</option>
//                                 <option value="Failed" ${(curso.STATUS === 'Failed') ? 'selected' : ''}>Failed</option>
//                             </select>
//                         </td>`;

//                     // Resit (Switch Yes/No)
//                     tr += `<td>
//                             <input type="hidden" name="courses[${key}][RESIT]" value="0">
//                             <label class="switch">
//                                 <input type="checkbox" class="resit-switch" name="courses[${key}][RESIT]" 
//                                         ${resitValue === 'Yes' ? 'checked' : ''}>
//                                 <span class="slider"></span>
//                             </label>
//                         </td>`;
//                     tr += `<td>
                                
//                             <select class="table-input ${resitDisabled ? 'disabled-field' : ''} resit-intentos" name="courses[${key}][INTENTOS]" ${resitDisabled}>
//                                 <option value="">Seleccionar...</option>
//                                 <option value="1" ${(curso.INTENTOS === 1) ? 'selected' : ''}>1</option>
//                                 <option value="2" ${(curso.INTENTOS === 2) ? 'selected' : ''}>2</option>
//                             </select>
//                         </td>`;

//                     tr += `<td>
//                             <div class="bops-container resit-periodos" style="justify-content: center;">
//                                 <span class="bop-badge">${proyecto.DAYS_REST || 'N/A'}</span>
//                             </div></td>`;

//                     tr += `<td>
//                             <div class="bops-container resit-restantes" style="justify-content: center;">
//                                 <span class="bop-badge"> ${proyecto.DAYS_REMAINING || 'N/A'}</span>
//                             </div></td>`;

//                     tr += `<td>
//                             <div class="bops-container resit-limite" style="justify-content: center;">
//                                 <span class="bop-badge"> ${proyecto.COURSE_END_DATE_90 || 'N/A'} </span>
//                             </div></td>`;

//                     tr += `<td>
//                             <select class="table-input module-select ${resitDisabled ? 'disabled-field' : ''}" name="courses[${key}][RESIT_MODULE]" ${resitDisabled}>
//                                 <option value="">Seleccionar...</option>
//                                 <option value="Equipament" ${(curso.RESIT_MODULE === 'Equipament') ? 'selected' : ''}>Equipament</option>
//                                 <option value="P&P" ${(curso.RESIT_MODULE === 'P&P') ? 'selected' : ''}>P&P</option>
//                             </select>
//                         </td>`;

//                     tr += `<td>
//                                 <input type="hidden" name="courses[${key}][RESIT_INMEDIATO]" value="0">
//                             <label class="switch">
//                                 <input type="checkbox" class="resit-switch-inmediato ${resitDisabled ? 'disabled-field' : ''}" name="courses[${key}][RESIT_INMEDIATO]" ${resitDisabled}" 
//                                         ${resitInmediatoValue === 'Yes' ? 'checked' : ''}>
//                                 <span class="slider"></span>
//                             </label>
//                         </td>`;

//                     // Date (Solo habilitado si Resit es Yes)
//                     tr += `<td>
//                             <input class="table-input resit-inmediato-date ${resitInmediatoDisabled ? 'disabled-field' : ''}" type="date" 
//                                     value="${formatDateForInput(curso.RESIT_INMEDIATO_DATE) || ''}" name="courses[${key}][RESIT_INMEDIATO_DATE]" ${resitInmediatoDisabled} />
//                         </td>`;

//                     // Score (Solo habilitado si Resit es Yes)
//                     tr += `<td>
//                             <div class="score-status-container" style="position: relative;">
//                                 <input class="table-input resit-inmediato-score ${resitInmediatoDisabled ? 'disabled-field' : ''}" type="number" step="1" min="0" max="100"
//                                     value="${curso.RESIT_INMEDIATO_SCORE || ''}" name="courses[${key}][RESIT_INMEDIATO_SCORE]" placeholder="0" style="padding-right: 25px;" ${resitInmediatoDisabled} />
//                                 <span style="position: absolute; right: 5px; top: 50%; transform: translateY(-50%); color: #555;">%</span>
//                             </div>
//                         </td>`;

//                     // Resit Pass (Solo habilitado si Resit es Yes)
//                     tr += `<td>
//                             <select class="table-input resit-inmediato-status ${resitInmediatoDisabled ? 'disabled-field' : ''}" name="courses[${key}][RESIT_INMEDIATO_STATUS]" ${resitInmediatoDisabled}>
//                                 <option value="">Seleccionar...</option>
//                                 <option value="Pass" ${(resitInmediatoPassValue === 'Pass') ? 'selected' : ''}>Pass</option>
//                                 <option value="Unpass" ${(resitInmediatoPassValue === 'Unpass') ? 'selected' : ''}>Failed</option>
//                             </select>
//                         </td>`;

//                     // resit programado
//                     tr += `<td>
//                                 <input type="hidden" name="courses[${key}][RESIT_PROGRAMADO]" value="0">
//                             <label class="switch">
//                                 <input type="checkbox" class="resit-switch-programado ${resitDisabled ? 'disabled-field' : ''}" name="courses[${key}][RESIT_PROGRAMADO]" ${resitDisabled} " 
//                                         ${resitProgramadoValue === 'Yes' ? 'checked' : ''}>
//                                 <span class="slider"></span>
//                             </label>
//                         </td>`;
//                     // requiere entrenamiento adicional
//                     tr += `<td>
//                             <select class="table-input ${resitProgramadoDisabled ? 'disabled-field' : ''} entrenamiento-adi" name="courses[${key}][RESIT_ENTRENAMIENTO]" ${resitProgramadoDisabled}>
//                                 <option value="">Seleccionar...</option>
//                                 <option value="1" ${(resitInmediatoPassValue === 1) ? 'selected' : ''}>Sí</option>
//                                 <option value="0" ${(resitInmediatoPassValue === 0) ? 'selected' : ''}>No</option>
//                             </select>
//                         </td>`;
//                     // folio de proyecto donde recibira entrenamiento adicional
//                     tr += `<td>
//                             <select class="table-input  ${resitProgramadoDisabled ? 'disabled-field' : ''} folio-proyecto" name="courses[${key}][RESIT_FOLIO_PROYECTO]" ${resitProgramadoDisabled}>
//                                 <option value="">Seleccionar...</option>
//                                 <option value="1">N/A</option>
//                             </select>
//                         </td>`;
//                     // fecha resity programado
//                     tr += `<td>
//                         <input class="table-input resit-programado-fecha ${resitProgramadoDisabled ? 'disabled-field' : ''}" type="date" 
//                                     value="${formatDateForInput(curso.RESIT_DATE) || ''}" name="courses[${key}][RESIT_PROGRAMADO_DATE]" ${resitProgramadoDisabled} />
//                         </td>`;

//                     // Score (Solo habilitado si Resit es Yes)
//                     tr += `<td>
//                             <div class="score-status-container" style="position: relative;">
//                                 <input class="table-input resit-programado-score ${resitProgramadoDisabled ? 'disabled-field' : ''}" type="number" step="1" min="0" max="100"
//                                     value="${curso.RESIT_SCORE || ''}" name="courses[${key}][RESIT_PROGRAMADO_SCORE]" placeholder="0" style="padding-right: 25px;" ${resitProgramadoDisabled} />
//                                 <span style="position: absolute; right: 5px; top: 50%; transform: translateY(-50%); color: #555;">%</span>
//                             </div>
//                         </td>`;

//                     // Resit Pass (Solo habilitado si Resit es Yes)
//                     tr += `<td>
//                             <select class="table-input resit-programado-status ${resitProgramadoDisabled ? 'disabled-field' : ''}" name="courses[${key}][RESIT_PROGRAMADO_STATUS]" ${resitProgramadoDisabled}>
//                                 <option value="">Seleccionar...</option>
//                                 <option value="Pass" ${(resitProgramadoPassValue === 'Yes') ? 'selected' : ''}>Pass</option>
//                                 <option value="Unpass" ${(resitProgramadoPassValue === 'No') ? 'selected' : ''}>Failed</option>
//                             </select>
//                         </td>`;


//                     // Final Status
//                     tr += `<td>
//                             <select class="table-input final-status-select" name="courses[${key}][FINAL_STATUS]">
//                                 <option value="">Seleccionar...</option>
//                                 <option value="Pass" ${(finalStatus === 'Pass') ? 'selected' : ''}>Pass</option>
//                                 <option value="Unpass" ${(finalStatus === 'Unpass') ? 'selected' : ''}>Failed</option>
//                             </select>
//                         </td>`;

//                     // Certified (Switch Yes/No) 
//                     tr += `<td>
//                             <input type="hidden" name="courses[${key}][HAVE_CERTIFIED]" value="0">
//                             <label class="switch">
//                                 <input type="checkbox" class="certified-switch" name="courses[${key}][HAVE_CERTIFIED]" 
//                                         ${certifiedValue === 'Yes' ? 'checked' : ''}>
//                                 <span class="slider"></span>
//                             </label>
//                         </td>`;

//                     // Expiration (Solo habilitado si Certified es Yes)
//                     tr += `<td>
//                             <input class="table-input expiration-date ${certifiedDisabled ? 'disabled-field' : ''}" type="date" 
//                                     value="${formatDateForInput(curso.EXPIRATION) || ''}" name="courses[${key}][EXPIRATION]" ${certifiedDisabled} />
//                         </td>`;
//                          tr += `<td>
//                             <div class="bops-container resit-restantes" style="justify-content: center;">
//                                 <span class="bop-badge"> ${proyecto.DAYS_REMAINING || 'N/A'}</span>
//                             </div></td>`;

//                     // Mail (Solo email)
//                     tr += `<td>
//                             <span class="email-text">${candidato.EMAIL_PROJECT || 'N/A'}</span>
//                         </td>`;

//                     // Acciones
//                     tr += `<td class="table-row-actions text-center">
//                             <div class="action-buttons">
//                                 <button class="btn btn-sm btn-info btn-action" onclick="viewStudentDetails(${candidato.ID_CANDIDATE})" title="Cargar certficado">
//                                     <i class="fas fa-eye"></i>
//                                 </button>
//                             </div>
//                         </td>`;

//                     tr += `<input type="hidden" 
//                             name="courses[${candidato.ID_CANDIDATE}][ID_CANDIDATE]" 
//                             value="${candidato.ID_CANDIDATE}"> <input type="hidden" 
//                             name="courses[${candidato.ID_CANDIDATE}][ID_PROJECT]" 
//                             value="${ID_PROJECT}"> </tr>`;
//                     tbody.append(tr);
//                 });

//                 initializeDataTable();
//                 addSwitchListeners();
//                 addValidationListeners();

//                 if (typeof updateRowCount === 'function') {
//                     updateRowCount(response.estudiantes.length);
//                 }

//             } else {
//                 tbody.html(`
//                         <tr>
//                             <td colspan="20" class="text-center text-muted py-5">
//                                 <i class="fas fa-graduation-cap fa-3x mb-3"></i>
//                                 <p>No hay estudiantes registrados en este curso</p>
//                                 <small class="d-block"></small>
//                             </td>
//                         </tr>
//                     `);

//                 if (typeof updateRowCount === 'function') {
//                     updateRowCount(0);
//                 }
//             }
//         },
//         error: function (xhr, status, error) {
//             const tbody = $('#edit-course-table tbody');
//             tbody.html(`
//                     <tr>
//                         <td colspan="20" class="text-center text-danger py-5">
//                             <i class="fas fa-exclamation-triangle fa-2x mb-3"></i>
//                             <p>Error al cargar los datos del curso</p>
//                             <small class="d-block">${error}</small>
//                             <button class="btn btn-warning btn-sm mt-2" onclick="loadTableCursoModal()">
//                                 <i class="fas fa-redo me-1"></i> Reintentar
//                             </button>
//                         </td>
//                     </tr>
//                 `);

//             if (typeof updateRowCount === 'function') {
//                 updateRowCount(0);
//             }
//         }
//     });
// }

function initializeDataTable() {
    if ($.fn.DataTable.isDataTable('#edit-course-table')) {
        $('#edit-course-table').DataTable().destroy();
    }
    
    $('#edit-course-table').DataTable({
        fixedHeader: true,
        scrollY: '50vh',
        scrollX: true,
        scrollCollapse: false,
        paging: false,
        searching: false,
        ordering: true,
        info: false,
        autoWidth: false,
        language: {
            search: "Buscar:",
            searchPlaceholder: "Filtrar estudiantes...",
            zeroRecords: "No se encontraron resultados",
            emptyTable: "No hay datos disponibles",
            info: "Mostrando _TOTAL_ estudiantes",
            infoEmpty: "Sin estudiantes",
            infoFiltered: "(filtrado de _MAX_ total)"
        },
        columnDefs: [
            { orderable: false, targets: [0, -1] }, 
            { className: "text-center", targets: [0, 3, 4] }
        ],
        drawCallback: function() {
            addSwitchListeners();
            addValidationListeners();
        }
    });
}

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
    $('.practical-status, .equipament-status, .pyp-status').on('change', function () {
        const row = $(this).closest('tr');
        validateRowStatus(row);
    });

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

    row.removeClass('row-pass row-unpass row-pending row-inprogress');
    statusSelect.removeClass('status-pending status-inprogress status-completed status-failed');
    finalStatusSelect.removeClass('final-pass final-failed');
    row.find('.resit-inmediato-status').removeClass('resit-pass resit-failed');
    row.find('.resit-programado-status').removeClass('resit-pass resit-failed');
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

    if (tbody.children().length === 1 && tbody.find('.text-muted').length) {
        tbody.empty();
    }
    const rowCount = tbody.children().length;
    const newRow = `
        <tr data-candidate-id="" class="candidate-row new-row">
            <td class="text-center fw-bold">${rowCount + 1}</td>
            <td><textarea class="table-input textarea" name="courses[${rowCount}][COMPANY_PROJECT]" placeholder="Nombre de empresa"></textarea></td>
            <td><textarea class="table-input textarea" name="courses[${rowCount}][CR_PROJECT]" placeholder="CR"></textarea></td>
            <td><textarea class="table-input textarea" name="courses[${rowCount}][LAST_NAME_PROJECT]" placeholder="Apellido"></textarea></td>
            <td><textarea class="table-input textarea" name="courses[${rowCount}][FIRST_NAME_PROJECT]" placeholder="Nombre"></textarea></td>
            <td><textarea class="table-input textarea" name="courses[${rowCount}][MIDDLE_NAME_PROJECT]" placeholder="Segundo nombre"></textarea></td>
            <td><input class="table-input" type="date" name="courses[${rowCount}][DOB_PROJECT]" /></td>
            <td><textarea class="table-input textarea" name="courses[${rowCount}][ID_NUMBER_PROJECT]" placeholder="Número de ID"></textarea></td>
            <td>
                <select class="table-input membership-select" name="courses[${rowCount}][MEMBERSHIP_PROJECT]">
                    <option value="">Seleccionar...</option>
                    <option value="N/A">N/A</option>
                    <option value="Basic">Basic</option>
                    <option value="Premium">Premium</option>
                    <option value="Pro">Pro</option>
                    <option value="Enterprise">Enterprise</option>
                </select>
            </td>
            <td><input class="table-input" type="email" name="courses[${rowCount}][EMAIL_PROJECT]" placeholder="correo@ejemplo.com" /></td>
            <td><input class="table-input" type="password" name="courses[${rowCount}][PASSWORD_PROJECT]" placeholder="Contraseña" /></td>
            <td>
                <div class="status-switch-container">
                    <label class="status-switch">
                        <input type="checkbox" name="courses[${rowCount}][ACTIVO]" class="candidate-active" checked>
                        <span class="status-slider"></span>
                    </label>
                </div>
            </td>
            <td class="table-row-actions">
                <div class="action-buttons">
                    <button type="button" class="btn btn-sm btn-danger btn-action" onclick="deleteCandidate(this, null)" title="Eliminar candidato">
                        <i class="fas fa-trash"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-info btn-action" onclick="togglePassword(event,this)" title="Mostrar/ocultar contraseña">
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
            loadTableDataWithAttendance();
            projectStudentDatatable.ajax.reload();
            projectCourseDatatable.ajax.reload();
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
$(document).on('change', '.candidate-asistencia-visual', function () {
    const index = $(this).data('index');
    const isChecked = $(this).is(':checked') ? 1 : 0;
    $(`#asistencia_hidden_${index}`).val(isChecked);
    if (isChecked) {
        $(`#asistencia_text_${index}`).addClass('d-none');
    } else {
        $(`#asistencia_text_${index}`).removeClass('d-none');
    }
    console.log(`Index ${index}: ASISTENCIA = ${isChecked}`);
});

$("#cursobtnModal").click(async function (e) {
    e.preventDefault();
    $('#coursesForm').find('.resit-switch').each(function () {
        $(this).val($(this).is(':checked') ? 1 : 0);
    });

    $('#coursesForm').find('.resit-switch-inmediato').each(function () {
        $(this).val($(this).is(':checked') ? 1 : 0);
    });


    $('#coursesForm').find('.resit-switch-programado').each(function () {
        $(this).val($(this).is(':checked') ? 1 : 0);
    });

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
        $('.candidate-asistencia').each(function () {
            const name = $(this).attr('name');
            const match = name.match(/courses\[(\d+)\]\[ASISTENCIA\]/);

            if (match) {
                const candidateId = match[1];
                const isChecked = $(this).is(':checked') ? 1 : 0;

                const motivoInput = $(`textarea[name="courses[${candidateId}][MOTIVO]"]`);
                const motivo = motivoInput.val() || '';

                if (!dataToSend.courses[candidateId]) {
                    dataToSend.courses[candidateId] = {};
                }

                dataToSend.courses[candidateId]['ASISTENCIA'] = isChecked;
                dataToSend.courses[candidateId]['MOTIVO'] = motivo;

                console.log(`Candidato ${candidateId}: Asistencia=${isChecked}, Motivo=${motivo}`);
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

// $("#candidatebtnModal").click(async function (e) {
//     e.preventDefault();
//     $('.candidate-asistencia-visual').each(function () {
//         const index = $(this).data('index');
//         const isChecked = $(this).is(':checked') ? 1 : 0;
//         $(`#asistencia_hidden_${index}`).val(isChecked);
//     });
//     $('#candidateForm').find('.candidate-active').each(function () {
//         $(this).val($(this).is(':checked') ? 1 : 0);
//     });
//     let formularioValido = validarFormulario($('#candidateForm'));

//     if (!formularioValido) {
//         alertToast('Por favor, complete todos los campos del formulario.', 'error', 2000);
//         return;
//     }

//     alertMensajeConfirm({
//         title: "¿Desea guardar la información?",
//         text: "Se actualizarán los datos de esta tabla",
//         icon: "question",
//     }, async function () {

//         await loaderbtn('candidatebtnModal');

//         const formDataArray = $('#candidateForm').serializeArray();
//         const dataToSend = { api: 3, ID_PROJECT: ID_PROJECT };

//         formDataArray.forEach(item => {
//             const match = item.name.match(/^courses\[(\d+)\]\[(\w+)\]$/);
//             if (match) {
//                 const candidateId = match[1];
//                 const key = match[2];
//                 dataToSend[`courses[${candidateId}][${key}]`] = item.value;
//             } else {
//                 dataToSend[item.name] = item.value;
//             }
//         });

//         console.log('Datos a enviar:', dataToSend);

//         await ajaxAwaitFormData(
//             dataToSend,
//             'candidateSave',
//             'candidateForm',
//             'candidatebtnModal',
//             { callbackAfter: true, callbackBefore: true },
//             () => {
//                 Swal.fire({
//                     icon: 'info',
//                     title: 'Espere un momento',
//                     text: 'Estamos guardando la información',
//                     showConfirmButton: false,
//                 });
//                 $('.swal2-popup').addClass('ld ld-breath');
//             },
//             (data) => {
//                 Swal.close();
//                 alertMensaje('success', 'Información guardada correctamente', 'Esta información está lista para usarse', null, null, 1500);
//                 document.getElementById('candidateForm').reset();
//                 loadTableData();
//                 projectStudentDatatable.ajax.reload();
//                 projectCourseDatatable.ajax.reload();


//             }
//         );
//     });
// });

// ============================================
// FUNCIÓN PARA GENERAR LISTA DE DÍAS DEL CURSO
// ============================================
function generateCourseDays(startDate, endDate) {
    const days = [];
    const start = new Date(startDate);
    const end = new Date(endDate);
    
    // Generar array con todos los días del curso
    for (let date = new Date(start); date <= end; date.setDate(date.getDate() + 1)) {
        days.push({
            date: new Date(date),
            formatted: formatDateForDisplay(new Date(date)),
            dayNumber: days.length + 1
        });
    }
    
    return days;
}

// ============================================
// MODIFICACIÓN DE loadTableData para incluir asistencias
// ============================================
function loadTableDataWithAttendance() {
    $.ajax({
        url: '/editarTablaCandidato/' + ID_PROJECT,
        method: 'GET',
        dataType: 'json',
        beforeSend: function () {
            $('#edit-candidate-table tbody').html(`
                <tr>
                    <td colspan="20" class="text-center">
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
            // Obtener fechas del proyecto
            $.ajax({
                url: '/getProjectDates/' + ID_PROJECT,
                method: 'GET',
                success: function(projectData) {
                    const courseDays = generateCourseDays(
                        projectData.COURSE_START_DATE_PROJECT, 
                        projectData.COURSE_END_DATE_PROJECT
                    );
                    
                    renderTableWithAttendance(data, courseDays);
                }
            });
        },
        error: function (xhr, status, error) {
            console.error('Error al cargar datos:', error);
        }
    });
}

// ============================================
// RENDERIZAR TABLA CON ASISTENCIAS
// ============================================
function renderTableWithAttendance(candidatos, courseDays) {
    const tbody = $('#edit-candidate-table tbody');
    const thead = $('#edit-candidate-table thead');
    tbody.empty();
    
    // Actualizar encabezados dinámicamente
    let headerRow = `
        <tr>
            <th width="50px" class="text-center">#</th>
            <th width="140px">Empresa</th>
            <th width="80px">CR</th>
            <th width="130px">Apellido</th>
            <th width="130px">Nombre</th>
            <th width="120px">Segundo Nombre</th>
            <th width="120px">Fecha Nac.</th>
            <th width="130px">ID</th>
            <th width="130px">Membresía</th>
            <th width="160px">Email</th>
            <th width="130px">Contraseña</th>
            <th width="130px">Membresía activa</th>
    `;
    
    // Agregar columnas para cada día del curso
    courseDays.forEach((day, index) => {
        headerRow += `<th width="100px" class="text-center attendance-header">
            Día ${day.dayNumber}<br>
            <small>${day.formatted}</small>
        </th>`;
    });
    
    headerRow += `
            <th width="130px">Motivo Inasistencia</th>
            <th width="100px" class="table-row-actions text-center">Acciones</th>
        </tr>
    `;
    
    thead.html(headerRow);

    if (candidatos && candidatos.length > 0) {
        candidatos.forEach((row, index) => {
            // Parsear asistencias existentes
            let asistencias = {};
            try {
                asistencias = row.ASISTENCIAS ? JSON.parse(row.ASISTENCIAS) : {};
            } catch (e) {
                asistencias = {};
            }
            
            let tr = `<tr data-candidate-id="${row.ID_CANDIDATE || ''}" class="candidate-row">`;
            
            tr += `<td class="text-center">${index + 1}</td>`;
            tr += `<td><textarea class="table-input textarea" placeholder="Nombre de empresa" name="courses[${index}][COMPANY_PROJECT]">${row.COMPANY_PROJECT || ''}</textarea></td>`;
            tr += `<td><textarea class="table-input textarea" name="courses[${index}][CR_PROJECT]" placeholder="CR">${row.CR_PROJECT || ''}</textarea></td>`;
            tr += `<td><textarea class="table-input textarea" name="courses[${index}][LAST_NAME_PROJECT]" placeholder="Apellido">${row.LAST_NAME_PROJECT || ''}</textarea></td>`;
            tr += `<td><textarea class="table-input textarea" name="courses[${index}][FIRST_NAME_PROJECT]" placeholder="Nombre">${row.FIRST_NAME_PROJECT || ''}</textarea></td>`;
            tr += `<td><textarea class="table-input textarea" name="courses[${index}][MIDDLE_NAME_PROJECT]" placeholder="Segundo nombre">${row.MIDDLE_NAME_PROJECT || ''}</textarea></td>`;
            tr += `<td><input class="table-input" type="date" value="${formatDateForInput(row.DOB_PROJECT) || ''}" name="courses[${index}][DOB_PROJECT]" /></td>`;
            tr += `<td><textarea class="table-input textarea" name="courses[${index}][ID_NUMBER_PROJECT]" placeholder="Número de ID">${row.ID_NUMBER_PROJECT || ''}</textarea></td>`;
            tr += `<td>
                <select class="table-input membership-select" name="courses[${index}][MEMBERSHIP_PROJECT]">
                    <option value="">Seleccionar...</option>
                    <option value="N/A" ${(row.MEMBERSHIP_PROJECT === 'N/A') ? 'selected' : ''}>N/A</option>
                    <option value="Premium" ${(row.MEMBERSHIP_PROJECT === 'Premium') ? 'selected' : ''}>Premium</option>
                    <option value="Pro" ${(row.MEMBERSHIP_PROJECT === 'Pro') ? 'selected' : ''}>Pro</option>
                    <option value="Enterprise" ${(row.MEMBERSHIP_PROJECT === 'Enterprise') ? 'selected' : ''}>Enterprise</option>
                </select>
            </td>`;
            tr += `<td><input class="table-input email" type="email" value="${row.EMAIL_PROJECT || ''}" name="courses[${index}][EMAIL_PROJECT]" placeholder="correo@ejemplo.com" /></td>`;
            tr += `<td><input class="table-input password" type="password" value="${row.PASSWORD_PROJECT || ''}" name="courses[${index}][PASSWORD_PROJECT]" placeholder="Contraseña" /></td>`;
            tr += `<td>
                <div class="status-switch-container">
                    <label class="status-switch">
                        <input type="checkbox" name="courses[${index}][ACTIVO]" ${(row.ACTIVO == 1) ? 'checked' : ''} class="candidate-active">
                        <span class="status-slider"></span>
                    </label>
                </div>
            </td>`;
            
            // Agregar switches de asistencia para cada día
            courseDays.forEach((day, dayIndex) => {
                const dayKey = day.date.toISOString().split('T')[0]; // YYYY-MM-DD
                const isPresent = asistencias[dayKey] === true || asistencias[dayKey] === 1;
                
                tr += `<td>
                    <div class="status-switch-container">
                        <label class="status-switch">
                            <input type="checkbox" 
                                name="courses[${index}][ATTENDANCE][${dayKey}]" 
                                ${isPresent ? 'checked' : ''} 
                                class="attendance-switch"
                                data-candidate-index="${index}"
                                data-day="${dayKey}">
                            <span class="status-slider"></span>
                        </label>
                    </div>
                </td>`;
            });
            
            // Campo de motivo de inasistencia
            const totalDays = courseDays.length;
            const presentDays = Object.values(asistencias).filter(v => v === true || v === 1).length;
            const showMotivo = presentDays < totalDays;
            
            tr += `<td>
                <textarea class="table-input textarea motivo-field ${showMotivo ? '' : 'd-none'}" 
                    name="courses[${index}][MOTIVO]" 
                    id="motivo_${index}"
                    placeholder="Motivo de inasistencia">${row.MOTIVO || ''}</textarea>
            </td>`;
            
            // Acciones
            tr += `<td class="table-row-actions">
                <div class="action-buttons">
                    <button type="button" class="btn btn-sm btn-danger btn-action" onclick="deleteCandidate(this, ${row.ID_CANDIDATE})"
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
        
        updateRowCount(candidatos.length);
        attachAttendanceListeners();
        
    } else {
        tbody.html(`
            <tr>
                <td colspan="20" class="text-center text-muted py-5">
                    <i class="fas fa-users fa-3x mb-3"></i>
                    <p>No hay candidatos registrados</p>
                </td>
            </tr>
        `);
        updateRowCount(0);
    }
}

// ============================================
// LISTENERS PARA SWITCHES DE ASISTENCIA
// ============================================
function attachAttendanceListeners() {
    $('.attendance-switch').on('change', function() {
        const candidateIndex = $(this).data('candidate-index');
        const row = $(this).closest('tr');
        
        // Contar cuántos días está presente
        const totalSwitches = row.find('.attendance-switch').length;
        const checkedSwitches = row.find('.attendance-switch:checked').length;
        
        // Mostrar/ocultar campo de motivo
        const motivoField = row.find(`#motivo_${candidateIndex}`);
        
        if (checkedSwitches < totalSwitches) {
            // Hay inasistencias, mostrar campo de motivo
            motivoField.removeClass('d-none');
        } else {
            // Asistió todos los días, ocultar motivo
            motivoField.addClass('d-none');
            motivoField.val(''); // Limpiar el motivo
        }
        
        // Actualizar indicador visual de la fila
        updateRowAttendanceStatus(row, checkedSwitches, totalSwitches);
    });
}

// ============================================
// ACTUALIZAR ESTADO VISUAL DE ASISTENCIA
// ============================================
function updateRowAttendanceStatus(row, present, total) {
    row.removeClass('attendance-complete attendance-partial attendance-absent');
    
    if (present === total) {
        row.addClass('attendance-complete');
    } else if (present > 0) {
        row.addClass('attendance-partial');
    } else {
        row.addClass('attendance-absent');
    }
}

// ============================================
// GUARDAR DATOS CON ASISTENCIAS
// ============================================
$("#candidatebtnModal").click(async function (e) {
    e.preventDefault();
    
    // Preparar datos de asistencia
    $('.candidate-row').each(function(index) {
        const row = $(this);
        const attendanceData = {};
        
        row.find('.attendance-switch').each(function() {
            const day = $(this).data('day');
            attendanceData[day] = $(this).is(':checked') ? 1 : 0;
        });
        
        // Agregar campo oculto con JSON de asistencias
        if (row.find('input[name="courses[' + index + '][ASISTENCIAS]"]').length === 0) {
            row.append(`<input type="hidden" name="courses[${index}][ASISTENCIAS]" value='${JSON.stringify(attendanceData)}'>`);
        } else {
            row.find('input[name="courses[' + index + '][ASISTENCIAS]"]').val(JSON.stringify(attendanceData));
        }
    });
    
    // Continuar con el guardado normal
    let formularioValido = validarFormulario($('#candidateForm'));

    if (!formularioValido) {
        alertToast('Por favor, complete todos los campos del formulario.', 'error', 2000);
        return;
    }

    alertMensajeConfirm({
        title: "¿Desea guardar la información?",
        text: "Se actualizarán los datos de asistencia",
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
                    text: 'Guardando asistencias...',
                    showConfirmButton: false,
                });
            },
            (data) => {
                Swal.close();
                alertMensaje('success', 'Asistencias guardadas', 'Los datos se guardaron correctamente', null, null, 1500);
                loadTableDataWithAttendance();
            }
        );
    });
});

// ============================================
// CSS ADICIONAL PARA ESTILOS DE ASISTENCIA
// ============================================
const attendanceStyles = `
<style>
.attendance-header {
    background-color: #f8f9fa;
    font-size: 0.85rem;
}

.attendance-complete {
    background-color: rgba(198, 239, 206, 0.2) !important;
}

.attendance-partial {
    background-color: rgba(255, 235, 156, 0.2) !important;
}

.attendance-absent {
    background-color: rgba(255, 199, 206, 0.2) !important;
}

.motivo-field {
    min-height: 60px;
    resize: vertical;
}

.status-switch-container {
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
`;

// Inyectar estilos
if ($('#attendance-styles').length === 0) {
    $('head').append(`<div id="attendance-styles">${attendanceStyles}</div>`);
}

// ============================================
// INICIALIZAR AL ABRIR MODAL
// ============================================
function editarCandidatos() {
    $('#editarCandidatosModal').modal('show');
    loadTableDataWithAttendance();
}




// ============================================
// CARGAR REGLAS DEL PROGRAMA
// ============================================
async function loadProgramRules(programId) {
    try {
        const response = await $.ajax({
            url: '/getProgramRules/' + programId,
            method: 'GET',
            dataType: 'json'
        });
        
        if (response.success) {
            programRules = response.programa;
            projectProgramId = programId;
            return programRules;
        }
    } catch (error) {
        console.error('Error al cargar reglas del programa:', error);
        return null;
    }
}

// ============================================
// FUNCIÓN MEJORADA PARA CARGAR TABLA DE CURSO
// ============================================
function loadTableCursoModal() {
    $.ajax({
        url: '/editarTablaCurso/' + ID_PROJECT,
        method: 'GET',
        dataType: 'json',
        beforeSend: function () {
            if ($.fn.DataTable.isDataTable('#edit-course-table')) {
                $('#edit-course-table').DataTable().destroy();
            }
            $('#edit-course-table tbody').html(`
                <tr>
                    <td colspan="40" class="text-start">
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
        success: async function (response) {
            if (!response.success || !response.estudiantes || response.estudiantes.length === 0) {
                renderEmptyTable();
                return;
            }

            const proyecto = response.proyecto;
            const niveles = proyecto.ACCREDITATION_LEVELS_PROJECT || [];
            
            // Obtener el ID del programa del primer nivel
            if (niveles.length > 0) {
                const primerNivelId = niveles[0].id;
                const nivelData = await $.ajax({
                    url: '/getNivelData/' + primerNivelId,
                    method: 'GET',
                    dataType: 'json'
                });
                
                if (nivelData.success && nivelData.nivel.DESCRIPCION_NIVEL) {
                    await loadProgramRules(nivelData.nivel.DESCRIPCION_NIVEL);
                }
            }

            renderDynamicTable(response, programRules);
        },
        error: function (xhr, status, error) {
            renderErrorTable(error);
        }
    });
}

// ============================================
// RENDERIZAR TABLA DINÁMICA
// ============================================
function renderDynamicTable(response, rules) {
    const thead = $('#edit-course-table thead');
    const tbody = $('#edit-course-table tbody');
    const proyecto = response.proyecto;
    console.log(proyecto);
    thead.empty();
    tbody.empty();

    // Construir encabezados dinámicamente
    let headerRow1 = `<tr>`;
    let headerRow2 = `<tr>`;
    
    // Columnas básicas
    headerRow1 += `<th colspan="5" class="text-center">Generalidades</th>`;
    headerRow2 += `
        <th width="50px" class="text-center">#</th>
        <th class="col-180" width="180px">Estudiante</th>
        <th class="col-180" width="180px">Nivel</th>
        <th width="180px">BOP</th>
        <th width="180px">Idioma</th>
    `;

    // Examen Práctico
    headerRow1 += `<th colspan="1" class="text-center">Examen Práctico</th>`;
    headerRow2 += `<th class="col-180" width="180px">Práctico</th>`;

    // Exámenes Teóricos (dinámico según acreditación)
    const numExamenesT = proyecto.ACCREDITING_ENTITY_PROJECT === '1' ? 1 : 2; // IADC: 1, IWCF: 2
    headerRow1 += `<th colspan="${numExamenesT}" class="text-center">Examen Teórico</th>`;
    
    if (proyecto.ACCREDITING_ENTITY_PROJECT === '1') {
        headerRow2 += `<th class="col-180" width="180px">Equipos</th>`;
    } else {
        headerRow2 += `
            <th class="col-180" width="180px">Equipos</th>
            <th class="col-180" width="180px">P&P</th>
        `;
    }

    // Complementos
    const numComplementos = proyecto.ACCREDITING_ENTITY_PROJECT === '1' ? 3 : 4;
    headerRow1 += `<th colspan="${numComplementos}" class="text-center">Complementos</th>`;
    
    if (proyecto.ACCREDITING_ENTITY_PROJECT === '1') {
        headerRow2 += `
            <th class="col-180" width="180px">Complemento</th>
            <th class="col-180" width="180px">WorkOver (WO)</th>
            <th class="col-180" width="180px">SubSea (SS)</th>
        `;
    } else {
        headerRow2 += `
            <th class="col-180" width="180px">Complemento</th>
            <th class="col-180" width="180px">D1</th>
            <th class="col-180" width="180px">D2</th>
            <th class="col-180" width="180px">D3</th>
        `;
    }

    // Resumen
    headerRow1 += `<th colspan="1" class="text-center">Resumen</th>`;
    headerRow2 += `<th class="col-180" width="180px">Estatus</th>`;

    // Información de Resit
    headerRow1 += `<th colspan="6" class="text-center">Información RE-SIT</th>`;
    headerRow2 += `
        <th width="180px">Resit</th>
        <th width="180px">Módulo Resit</th>
        <th width="180px">Intentos Permitidos</th>
        <th width="180px">Periodo (días)</th>
        <th width="180px">Días Restantes</th>
        <th width="180px">Fecha Límite</th>
    `;

    // Resit Inmediato (solo si el programa lo permite)
    if (rules && rules.OPCION_RESIT === 1) {
        headerRow1 += `<th colspan="4" class="text-center">RE-SIT INMEDIATO</th>`;
        headerRow2 += `
            <th width="180px">Sí</th>
            <th class="col-180" width="180px">Fecha</th>
            <th class="col-180" width="180px">Puntaje</th>
            <th class="col-180" width="180px">Estatus</th>
        `;
    }

    // Resits Programados (dinámico según intentos permitidos)
    const numIntentosPermitidos = rules ? (rules.OPCION_RESIT_PERMITIDAS || 1) : 1;
    
    for (let i = 1; i <= numIntentosPermitidos; i++) {
        headerRow1 += `<th colspan="6" class="text-center">RE-SIT PROGRAMADO ${i}</th>`;
        headerRow2 += `
            <th width="180px">Activar</th>
            <th width="180px">Entrenamiento</th>
            <th width="180px">Folio Proyecto</th>
            <th class="col-180" width="180px">Fecha</th>
            <th class="col-180" width="180px">Puntaje</th>
            <th class="col-180" width="180px">Estatus</th>
        `;
    }

    // Final y Certificación
    headerRow1 += `<th colspan="6" class="text-center">Final y Certificación</th>`;
    headerRow2 += `
        <th class="col-180" width="180px">Estatus Final</th>
        <th width="180px">Certificado</th>
        <th class="col-180" width="180px">Expiración</th>
        <th class="col-180" width="180px">Vigencia</th>
        <th class="col-250" width="180px">Correo</th>
        <th width="150px" class="table-row-actions text-center">Cargar PDF</th>
    `;

    headerRow1 += `</tr>`;
    headerRow2 += `</tr>`;
    
    thead.append(headerRow1 + headerRow2);

    // Renderizar filas de estudiantes
    renderStudentRows(response.estudiantes, proyecto, rules, numIntentosPermitidos);
    
    initializeDataTable();
    addSwitchListeners();
    addValidationListeners();
    attachCertificateUploadListeners();
}

// ============================================
// RENDERIZAR FILAS DE ESTUDIANTES
// ============================================
function renderStudentRows(estudiantes, proyecto, rules, numIntentosPermitidos) {
    const tbody = $('#edit-course-table tbody');
    
    estudiantes.forEach((estudiante, index) => {
        const candidato = estudiante.candidato;
        const curso = estudiante.datos_curso;
        const key = candidato.ID_CANDIDATE;
        
        // Calcular fechas límite de resit
        const examDate = new Date(proyecto.EXAM_DATE_PROJECT || Date.now());
        const periodoResit = rules ? rules.PERIODO_RESIT : 90;
        const fechaLimite = new Date(examDate);
        fechaLimite.setDate(fechaLimite.getDate() + periodoResit);
        
        const diasRestantes = Math.max(0, Math.ceil((fechaLimite - new Date()) / (1000 * 60 * 60 * 24)));
        
        // Determinar si puede tener resit
        const tieneAlMenosUnAprobado = 
            curso.PRACTICAL_PASS === 'Pass' || 
            curso.EQUIPAMENT_PASS === 'Pass' || 
            curso.PYP_PASS === 'Pass';
        
        const puedeResit = tieneAlMenosUnAprobado && diasRestantes > 0;
        
        let tr = `<tr data-candidate-id="${candidato.ID_CANDIDATE}" data-curso-id="${estudiante.curso_id}" class="course-row">`;
        
        // Columnas básicas
        tr += `<td class="text-center">${index + 1}</td>`;
        tr += `<td><span class="student-name">${candidato.LAST_NAME_PROJECT || ''} ${candidato.FIRST_NAME_PROJECT || ''}</span></td>`;
        
        // Nivel
        tr += renderNivelColumn(candidato, proyecto);
        
        // BOP e Idioma
        tr += renderBOPColumn(proyecto);
        tr += renderIdiomaColumn(proyecto);
        
        // Exámenes (Práctico, Teórico)
        tr += renderExamColumns(curso, key, proyecto, rules);
        
        // Complementos
        tr += renderComplementsColumns(curso, key, proyecto);
        
        // Estatus General
        tr += renderStatusColumn(curso, key);
        
        // Información Resit
        tr += renderResitInfo(curso, key, puedeResit, rules, periodoResit, diasRestantes, fechaLimite);
        
        // Resit Inmediato (si aplica)
        if (rules && rules.OPCION_RESIT === 1) {
            tr += renderResitInmediato(curso, key, puedeResit);
        }
        
        // Resits Programados
        for (let i = 1; i <= numIntentosPermitidos; i++) {
            tr += renderResitProgramado(curso, key, i, puedeResit);
        }
        
        // Final y Certificación
        tr += renderFinalAndCertification(curso, candidato, key, estudiante.curso_id);
        
        tr += `<input type="hidden" name="courses[${key}][ID_CANDIDATE]" value="${candidato.ID_CANDIDATE}">`;
        tr += `<input type="hidden" name="courses[${key}][ID_PROJECT]" value="${ID_PROJECT}">`;
        tr += `</tr>`;
        
        tbody.append(tr);
    });
}

// ============================================
// FUNCIONES DE RENDERIZADO POR SECCIÓN
// ============================================
function renderNivelColumn(candidato, proyecto) {
    const niveles = proyecto.ACCREDITATION_LEVELS_PROJECT || [];
    let html = `<td><div class="levels-container">`;
    
    if (niveles.length === 0) {
        html += `<span class="text-muted">N/A</span>`;
    } else if (niveles.length === 1) {
        const unico = niveles[0];
        html += `<select class="form-select form-select-sm level-select">
            <option value="${unico.id}" selected>${unico.nombre}</option>
        </select>`;
    } else {
        html += `<select class="form-select form-select-sm level-select">`;
        if (!candidato.LEVEL) html += `<option value="">Seleccione nivel</option>`;
        niveles.forEach(nivel => {
            const selected = (nivel.id == candidato.LEVEL) ? "selected" : "";
            html += `<option value="${nivel.id}" ${selected}>${nivel.nombre}</option>`;
        });
        html += `</select>`;
    }
    
    html += `</div></td>`;
    return html;
}

function renderBOPColumn(proyecto) {
    let html = `<td><div class="bops-container">`;
    if (proyecto.BOP_TYPES_PROJECT && proyecto.BOP_TYPES_PROJECT.length > 0) {
        proyecto.BOP_TYPES_PROJECT.forEach(bop => {
            html += `<span class="bop-badge">${bop.abreviatura}</span>`;
        });
    } else {
        html += `<span class="text-muted">N/A</span>`;
    }
    html += `</div></td>`;
    return html;
}

function renderIdiomaColumn(proyecto) {
    let idiomaTexto = 'N/A';
    if (proyecto.LANGUAGE_PROJECT && Array.isArray(proyecto.LANGUAGE_PROJECT) && proyecto.LANGUAGE_PROJECT.length > 0) {
        const idioma = proyecto.LANGUAGE_PROJECT[0];
        idiomaTexto = idioma.DESCRIPCION_IDIOMAS || idioma.NOMBRE_IDIOMA || 'N/A';
    }
    return `<td><span class="language-badge">${idiomaTexto}</span></td>`;
}

function renderExamColumns(curso, key, proyecto, rules) {
    let html = '';
    
    // Práctico
    html += renderExamField(curso.PRACTICAL, curso.PRACTICAL_PASS, 'practical', key, rules);
    
    // Equipos
    html += renderExamField(curso.EQUIPAMENT, curso.EQUIPAMENT_PASS, 'equipament', key, rules);
    
    // P&P (solo IWCF)
    if (proyecto.ACCREDITING_ENTITY_PROJECT === '2') {
        html += renderExamField(curso.PYP, curso.PYP_PASS, 'pyp', key, rules);
    }
    
    return html;
}

function renderExamField(score, status, fieldName, key, rules) {
    const statusClass = status === 'Unpass' ? 'unpass-status' : (status === 'Pass' ? 'pass-status' : '');
    
    // Validar automáticamente según reglas del programa
    let autoStatus = '';
    if (rules && score) {
        if (score >= rules.MIN_PORCENTAJE_APROB) {
            autoStatus = 'Pass';
        } else if (score <= rules.MAX_PORCENTAJE_REPROB && score >= rules.MIN_PORCENTAJE_REPROB_RE) {
            autoStatus = 'Unpass'; // Con opción a resit
        } else {
            autoStatus = 'Unpass'; // Sin opción a resit
        }
    }
    
    return `<td>
        <div class="score-status-container" style="position: relative;">
            <input class="table-input ${fieldName}-score ${statusClass}" 
                type="number" step="1" min="0" max="100"
                value="${score || ''}" 
                name="courses[${key}][${fieldName.toUpperCase()}]" 
                placeholder="0" 
                style="padding-right: 25px;"
                data-field="${fieldName}"
                data-key="${key}" />
            <span style="position: absolute; right: 5px; top: 25%; transform: translateY(-50%); color: #555;">%</span>
            <select class="table-input ${fieldName}-status ${statusClass}" 
                name="courses[${key}][${fieldName.toUpperCase()}_PASS]"
                data-auto-status="${autoStatus}">
                <option value="">Status</option>
                <option value="Pass" ${(status === 'Pass' || autoStatus === 'Pass') ? 'selected' : ''}>Pass</option>
                <option value="Unpass" ${(status === 'Unpass' || autoStatus === 'Unpass') ? 'selected' : ''}>Failed</option>
            </select>
        </div>
    </td>`;
}

function renderComplementsColumns(curso, key, proyecto) {
    let html = '';
    
    // Switch CO (Complemento)
    html += `<td>
        <input type="hidden" name="courses[${key}][CO]" value="0">
        <label class="switch">
            <input type="checkbox" class="co-switch" name="courses[${key}][CO]" ${curso.CO == 1 ? 'checked' : ''}>
            <span class="slider"></span>
        </label>
    </td>`;
    
    // Complementos específicos según acreditación
    if (proyecto.ACCREDITING_ENTITY_PROJECT === '1') { // IADC
        html += renderComplementField(curso.WORKOVER, curso.WO_STATUS, 'WORKOVER', 'WO_STATUS', key);
        html += renderComplementField(curso.SUBSEA, curso.SUBSEA_STATUS, 'SUBSEA', 'SUBSEA_STATUS', key);
    } else { // IWCF
        html += renderComplementField(curso.D1, curso.D1_STATUS, 'D1', 'D1_STATUS', key);
        html += renderComplementField(curso.D2, curso.D2_STATUS, 'D2', 'D2_STATUS', key);
        html += renderComplementField(curso.D3, curso.D3_STATUS, 'D3', 'D3_STATUS', key);
    }
    
    return html;
}

function renderComplementField(score, status, scoreField, statusField, key) {
    return `<td>
        <div class="score-status-container" style="position: relative;">
            <input class="table-input complement-score" type="number" step="1" min="0" max="100"
                value="${score || ''}" name="courses[${key}][${scoreField}]" placeholder="0" style="padding-right: 25px;" />
            <span style="position: absolute; right: 5px; top: 25%; transform: translateY(-50%); color: #555;">%</span>
            <select class="table-input complement-status" name="courses[${key}][${statusField}]">
                <option value="">Seleccionar</option>
                <option value="Pass" ${status === 'Pass' ? 'selected' : ''}>Pass</option>
                <option value="Unpass" ${status === 'Unpass' ? 'selected' : ''}>Failed</option>
            </select>
        </div>
    </td>`;
}

function renderStatusColumn(curso, key) {
    return `<td>
        <select class="table-input status-select" name="courses[${key}][STATUS]">
            <option value="">Seleccionar...</option>
            <option value="Pending" ${curso.STATUS === 'Pending' ? 'selected' : ''}>Pending</option>
            <option value="In Progress" ${curso.STATUS === 'In Progress' ? 'selected' : ''}>In Progress</option>
            <option value="Completed" ${curso.STATUS === 'Completed' ? 'selected' : ''}>Completed</option>
            <option value="Failed" ${curso.STATUS === 'Failed' ? 'selected' : ''}>Failed</option>
        </select>
    </td>`;
}

function renderResitInfo(curso, key, puedeResit, rules, periodoResit, diasRestantes, fechaLimite) {
    const resitDisabled = !puedeResit ? 'disabled' : '';
    const resitValue = curso.RESIT === '1' || curso.RESIT === 1 ? 'Yes' : 'No';
    const intentosPermitidos = rules ? rules.OPCION_RESIT_PERMITIDAS : 1;
    
    return `
        <td>
            <input type="hidden" name="courses[${key}][RESIT]" value="0">
            <label class="switch">
                <input type="checkbox" class="resit-switch" name="courses[${key}][RESIT]" 
                    ${resitValue === 'Yes' ? 'checked' : ''} ${resitDisabled}>
                <span class="slider"></span>
            </label>
            ${!puedeResit ? '<small class="text-danger d-block">Debe aprobar al menos 1 examen</small>' : ''}
        </td>
        <td>
            <select class="table-input module-select ${resitDisabled}" name="courses[${key}][RESIT_MODULE]" ${resitDisabled}>
                <option value="">Seleccionar...</option>
                <option value="Equipament" ${curso.RESIT_MODULE === 'Equipament' ? 'selected' : ''}>Equipament</option>
                <option value="P&P" ${curso.RESIT_MODULE === 'P&P' ? 'selected' : ''}>P&P</option>
                <option value="WORKOVER" ${curso.RESIT_MODULE === 'WORKOVER' ? 'selected' : ''}>WorkOver</option>
                <option value="SUBSEA" ${curso.RESIT_MODULE === 'SUBSEA' ? 'selected' : ''}>SubSea</option>
                <option value="D1" ${curso.RESIT_MODULE === 'D1' ? 'selected' : ''}>D1</option>
                <option value="D2" ${curso.RESIT_MODULE === 'D2' ? 'selected' : ''}>D2</option>
                <option value="D3" ${curso.RESIT_MODULE === 'D3' ? 'selected' : ''}>D3</option>
            </select>
        </td>
        <td>
            <div class="bops-container" style="justify-content: center;">
                <span class="bop-badge">${intentosPermitidos}</span>
            </div>
        </td>
        <td>
            <div class="bops-container" style="justify-content: center;">
                <span class="bop-badge">${periodoResit} días</span>
            </div>
        </td>
        <td>
            <div class="bops-container ${diasRestantes < 7 ? 'text-danger' : ''}" style="justify-content: center;">
                <span class="bop-badge">${diasRestantes} días</span>
            </div>
        </td>
        <td>
            <div class="bops-container" style="justify-content: center;">
                <span class="bop-badge">${formatDateForDisplay(fechaLimite)}</span>
            </div>
        </td>
    `;
}

function renderResitInmediato(curso, key, puedeResit) {
    const resitInmediatoDisabled = !puedeResit ? 'disabled' : '';
    const resitInmediatoValue = curso.RESIT_INMEDIATO === '1' || curso.RESIT_INMEDIATO === 1 ? 'Yes' : 'No';
    
    return `
        <td>
            <input type="hidden" name="courses[${key}][RESIT_INMEDIATO]" value="0">
            <label class="switch">
                <input type="checkbox" class="resit-switch-inmediato ${resitInmediatoDisabled}" 
                    name="courses[${key}][RESIT_INMEDIATO]" 
                    ${resitInmediatoValue === 'Yes' ? 'checked' : ''} ${resitInmediatoDisabled}>
                <span class="slider"></span>
            </label>
        </td>
        <td>
            <input class="table-input resit-inmediato-date ${resitInmediatoDisabled}" type="date" 
                value="${formatDateForInput(curso.RESIT_INMEDIATO_DATE) || ''}" 
                name="courses[${key}][RESIT_INMEDIATO_DATE]" ${resitInmediatoDisabled} />
        </td>
        <td>
            <div class="score-status-container" style="position: relative;">
                <input class="table-input resit-inmediato-score ${resitInmediatoDisabled}" type="number" step="1" min="0" max="100"
                    value="${curso.RESIT_INMEDIATO_SCORE || ''}" 
                    name="courses[${key}][RESIT_INMEDIATO_SCORE]" 
                    placeholder="0" style="padding-right: 25px;" ${resitInmediatoDisabled} />
                <span style="position: absolute; right: 5px; top: 50%; transform: translateY(-50%); color: #555;">%</span>
            </div>
        </td>
        <td>
            <select class="table-input resit-inmediato-status ${resitInmediatoDisabled}" 
                name="courses[${key}][RESIT_INMEDIATO_STATUS]" ${resitInmediatoDisabled}>
                <option value="">Seleccionar...</option>
                <option value="Pass" ${curso.RESIT_INMEDIATO_STATUS === 'Pass' ? 'selected' : ''}>Pass</option>
                <option value="Unpass" ${curso.RESIT_INMEDIATO_STATUS === 'Unpass' ? 'selected' : ''}>Failed</option>
            </select>
        </td>
    `;
}

function renderResitProgramado(curso, key, numero, puedeResit) {
    const resitDisabled = !puedeResit ? 'disabled' : '';
    const resitData = curso[`RESIT_${numero}`] || {};
    const resitValue = resitData === '1' || resitData === 1 ? 'Yes' : 'No';
    
    return `
        <td>
            <input type="hidden" name="courses[${key}][RESIT_${numero}]" value="0">
            <label class="switch">
                <input type="checkbox" class="resit-switch-programado-${numero} ${resitDisabled}" 
                    name="courses[${key}][RESIT_${numero}]" 
                    ${resitValue === 'Yes' ? 'checked' : ''} ${resitDisabled}>
                <span class="slider"></span>
            </label>
        </td>
        <td>
            <select class="table-input entrenamiento-adi-${numero} ${resitDisabled}" 
                name="courses[${key}][RESIT_${numero}_ENTRENAMIENTO]" ${resitDisabled}>
                <option value="">Seleccionar...</option>
                <option value="1" ${curso[`RESIT_${numero}_ENTRENAMIENTO`] === 1 ? 'selected' : ''}>Sí</option>
                <option value="0" ${curso[`RESIT_${numero}_ENTRENAMIENTO`] === 0 ? 'selected' : ''}>No</option>
            </select>
        </td>
        <td>
            <input class="table-input folio-proyecto-${numero} ${resitDisabled}" type="text"
                value="${curso[`RESIT_${numero}_FOLIO_PROYECTO`] || ''}"
                name="courses[${key}][RESIT_${numero}_FOLIO_PROYECTO]" 
                placeholder="Folio" ${resitDisabled} />
        </td>
        <td>
            <input class="table-input resit-programado-fecha-${numero} ${resitDisabled}" type="date" 
                value="${formatDateForInput(curso[`RESIT_${numero}_DATE`]) || ''}" 
                name="courses[${key}][RESIT_${numero}_DATE]" ${resitDisabled} />
        </td>
        <td>
            <div class="score-status-container" style="position: relative;">
                <input class="table-input resit-programado-score-${numero} ${resitDisabled}" 
                    type="number" step="1" min="0" max="100"
                    value="${curso[`RESIT_${numero}_SCORE`] || ''}" 
                    name="courses[${key}][RESIT_${numero}_SCORE]" 
                    placeholder="0" style="padding-right: 25px;" ${resitDisabled} />
                <span style="position: absolute; right: 5px; top: 50%; transform: translateY(-50%); color: #555;">%</span>
            </div>
        </td>
        <td>
            <select class="table-input resit-programado-status-${numero} ${resitDisabled}" 
                name="courses[${key}][RESIT_${numero}_STATUS]" ${resitDisabled}>
                <option value="">Seleccionar...</option>
                <option value="Pass" ${curso[`RESIT_${numero}_STATUS`] === 'Pass' ? 'selected' : ''}>Pass</option>
                <option value="Unpass" ${curso[`RESIT_${numero}_STATUS`] === 'Unpass' ? 'selected' : ''}>Failed</option>
            </select>
        </td>
    `;
}

function renderFinalAndCertification(curso, candidato, key, cursoId) {
    const certifiedValue = curso.HAVE_CERTIFIED === '1' || curso.HAVE_CERTIFIED === 1 ? 'Yes' : 'No';
    const certifiedDisabled = certifiedValue !== 'Yes' ? 'disabled' : '';
    
    // Calcular vigencia del certificado
    let vigenciaTexto = 'N/A';
    if (curso.EXPIRATION) {
        const expDate = new Date(curso.EXPIRATION);
        const today = new Date();
        const diffDays = Math.ceil((expDate - today) / (1000 * 60 * 60 * 24));
        
        if (diffDays > 0) {
            vigenciaTexto = `${diffDays} días`;
        } else {
            vigenciaTexto = '<span class="text-danger">Expirado</span>';
        }
    }
    
    return `
        <td>
            <select class="table-input final-status-select" name="courses[${key}][FINAL_STATUS]">
                <option value="">Seleccionar...</option>
                <option value="Pass" ${curso.FINAL_STATUS === 'Pass' ? 'selected' : ''}>Pass</option>
                <option value="Unpass" ${curso.FINAL_STATUS === 'Unpass' ? 'selected' : ''}>Failed</option>
            </select>
        </td>
        <td>
            <input type="hidden" name="courses[${key}][HAVE_CERTIFIED]" value="0">
            <label class="switch">
                <input type="checkbox" class="certified-switch" name="courses[${key}][HAVE_CERTIFIED]" 
                    ${certifiedValue === 'Yes' ? 'checked' : ''}>
                <span class="slider"></span>
            </label>
        </td>
        <td>
            <input class="table-input expiration-date ${certifiedDisabled}" type="date" 
                value="${formatDateForInput(curso.EXPIRATION) || ''}" 
                name="courses[${key}][EXPIRATION]" ${certifiedDisabled} />
        </td>
        <td>
            <div class="bops-container" style="justify-content: center;">
                <span class="bop-badge">${vigenciaTexto}</span>
            </div>
        </td>
        <td>
            <span class="email-text">${candidato.EMAIL_PROJECT || 'N/A'}</span>
        </td>
        <td class="table-row-actions text-center">
            <div class="d-flex gap-2 justify-content-center">
                <input type="file" class="d-none certificate-upload" 
                    data-curso-id="${cursoId}" 
                    accept=".pdf" />
                <button type="button" class="btn btn-sm btn-primary btn-upload-cert" 
                    data-curso-id="${cursoId}" title="Cargar certificado PDF">
                    <i class="fas fa-upload"></i>
                </button>
                ${curso.CERTIFIED ? `
                    <a href="/storage/${curso.CERTIFIED}" target="_blank" 
                        class="btn btn-sm btn-info" title="Ver certificado">
                        <i class="fas fa-file-pdf"></i>
                    </a>
                ` : ''}
            </div>
        </td>
    `;
}

// ============================================
// LISTENERS PARA CARGA DE CERTIFICADOS
// ============================================
function attachCertificateUploadListeners() {
    $('.btn-upload-cert').off('click').on('click', function() {
        const cursoId = $(this).data('curso-id');
        const fileInput = $(this).closest('td').find('.certificate-upload');
        fileInput.trigger('click');
    });
    
    $('.certificate-upload').off('change').on('change', async function() {
        const file = this.files[0];
        const cursoId = $(this).data('curso-id');
        
        if (!file) return;
        
        if (file.type !== 'application/pdf') {
            alertToast('Solo se permiten archivos PDF', 'error', 2000);
            return;
        }
        
        if (file.size > 10 * 1024 * 1024) {
            alertToast('El archivo no debe superar 10MB', 'error', 2000);
            return;
        }
        
        const formData = new FormData();
        formData.append('certificate', file);
        formData.append('ID_COURSE', cursoId);
        formData.append('_token', $('input[name="_token"]').val());
        
        try {
            Swal.fire({
                title: 'Subiendo certificado...',
                text: 'Por favor espere',
                allowOutsideClick: false,
                didOpen: () => Swal.showLoading()
            });
            
            const response = await $.ajax({
                url: '/uploadCertificate',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            });
            
            Swal.close();
            
            if (response.success) {
                alertMensaje('success', '¡Éxito!', 'Certificado cargado correctamente');
                loadTableCursoModal(); // Recargar tabla
            } else {
                alertMensaje('error', 'Error', response.message);
            }
        } catch (error) {
            Swal.close();
            alertMensaje('error', 'Error', 'No se pudo cargar el certificado');
            console.error('Error:', error);
        }
    });
}

// ============================================
// VALIDACIÓN AUTOMÁTICA BASADA EN REGLAS
// ============================================
function validateScoreAgainstRules(score, fieldName, key) {
    if (!programRules || !score) return;
    
    const scoreInput = $(`.${fieldName}-score[data-key="${key}"]`);
    const statusSelect = $(`.${fieldName}-status[data-key="${key}"]`);
    
    let autoStatus = '';
    let statusClass = '';
    
    if (score >= programRules.MIN_PORCENTAJE_APROB) {
        autoStatus = 'Pass';
        statusClass = 'pass-status';
    } else if (score >= programRules.MIN_PORCENTAJE_REPROB_RE && score <= programRules.MAX_PORCENTAJE_REPROB_RE) {
        autoStatus = 'Unpass';
        statusClass = 'unpass-status';
        // Habilitar resit inmediato si el programa lo permite
        if (programRules.OPCION_RESIT === 1) {
            const row = scoreInput.closest('tr');
            row.find('.resit-switch-inmediato').prop('disabled', false).closest('.switch').removeClass('disabled-field');
        }
    } else {
        autoStatus = 'Unpass';
        statusClass = 'unpass-status';
    }
    
    statusSelect.val(autoStatus);
    scoreInput.removeClass('pass-status unpass-status').addClass(statusClass);
    statusSelect.removeClass('pass-status unpass-status').addClass(statusClass);
}

// ============================================
// LISTENERS MEJORADOS
// ============================================
function addValidationListeners() {
    // Validar en tiempo real al cambiar calificaciones
    $('.practical-score, .equipament-score, .pyp-score').on('input', function() {
        const score = parseFloat($(this).val());
        const fieldName = $(this).data('field');
        const key = $(this).data('key');
        
        if (score && !isNaN(score)) {
            validateScoreAgainstRules(score, fieldName, key);
        }
    });
    
    // Validar al cambiar status manualmente
    $('.practical-status, .equipament-status, .pyp-status').on('change', function() {
        const row = $(this).closest('tr');
        validateRowStatus(row);
    });
}

// ============================================
// FUNCIONES AUXILIARES
// ============================================
function renderEmptyTable() {
    const tbody = $('#edit-course-table tbody');
    tbody.html(`
        <tr>
            <td colspan="40" class="text-center text-muted py-5">
                <i class="fas fa-graduation-cap fa-3x mb-3"></i>
                <p>No hay estudiantes registrados en este curso</p>
            </td>
        </tr>`);
}

function renderErrorTable(error) {
    const tbody = $('#edit-course-table tbody');
    tbody.html(`
        <tr>
            <td colspan="40" class="text-center text-danger py-5">
                <i class="fas fa-exclamation-triangle fa-2x mb-3"></i>
                <p>Error al cargar los datos del curso</p>
                <small class="d-block">${error}</small>
                <button class="btn btn-warning btn-sm mt-2" onclick="loadTableCursoModal()">
                    <i class="fas fa-redo me-1"></i> Reintentar
                </button>
            </td>
        </tr>
    `);
}
