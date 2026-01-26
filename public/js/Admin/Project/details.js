let programRules = {};
let projectProgramId = null;
let projectAccreditingEntity = null;
let projectExamDate = null;
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
        } else if (finalStatus === 'Unpass') {
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
        drawCallback: function () {
            addSwitchListeners();
            addValidationListeners();
        }
    });
}

function addSwitchListeners() {
    $('.resit-switch').on('change', function () {
        const isChecked = $(this).is(':checked');
        const row = $(this).closest('tr');


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

       

        if (!isChecked) {
            row.find('.expiration-date').val('');
        }
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

$(document).on('change', '.certificate-upload, .refresh-upload', function() {
    const input = $(this);
    const file = this.files[0];
    const btn = input.next('.btn-upload-cert, .btn-upload-refresh'); 

    if (file) {
        btn.removeClass('btn-outline-primary btn-info btn-secondary btn-warning')
           .addClass('btn-success');
        
        btn.html('<i class="fas fa-check-circle"></i>');
        
        btn.attr('title', 'Archivo listo para subir: ' + file.name);
        
        alertToast('Archivo seleccionado: ' + file.name, 'success', 2000);
    } else {
      
        btn.removeClass('btn-success').addClass('btn-outline-primary');
        btn.html('<i class="fas fa-upload"></i>');
        btn.attr('title', 'Cargar nuevo PDF');
    }
});

$("#cursobtnModal").click(async function (e) {
    e.preventDefault();

   

    alertMensajeConfirm({
        title: "¿Desea guardar la información?",
        text: "Se actualizará la información del curso, calificaciones y documentos.",
        icon: "question",
    }, async function () {

        await loaderbtn('cursobtnModal');

        let dataToSend = { 
            api: 2, 
            ID_PROJECT: ID_PROJECT,
            _token: $('input[name="_token"]').val()
        };

        $('#edit-course-table tbody tr').each(function() {
            const row = $(this);
            
            row.find('input, select, textarea').each(function() {
                const input = $(this);
                const name = input.attr('name');
                const type = input.attr('type');

                if (!name) return; // Saltar si no tiene name

                if (type === 'checkbox') {
                    dataToSend[name] = input.is(':checked') ? 1 : 0;
                } 
                else if (type === 'file') {
                    if (this.files && this.files[0]) {
                        dataToSend[name] = this.files[0];
                    }
                } 
                else {
                    let val = input.val();
                    if (val === null || val === undefined) val = '';
                    dataToSend[name] = val;
                }
            });
        });

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
                    text: 'Estamos guardando la información...',
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
                $('.swal2-popup').addClass('ld ld-breath');
            },
            (data) => {
                Swal.close();
                alertMensaje('success', 'Guardado', 'Información guardada correctamente', null, null, 1500);
                
                $('.certificate-upload, .refresh-upload').val('');
                
                document.getElementById('coursesForm').reset();
                loadTableCursoModal();
                if(typeof projectCourseDatatable !== 'undefined') projectCourseDatatable.ajax.reload();
            }
        );
    });
});
function verDocumento(rutaRelativa) {
    if (!rutaRelativa || rutaRelativa.trim() === '') {
        alertToast('No hay documento cargado.', 'info', 2000);
        return;
    }
    
    const url = `/storage/${rutaRelativa}`;
    window.open(url, '_blank');
}

function alertToast(msg, icon = 'info', timer = 3000) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: timer,
        timerProgressBar: true
    });
    Toast.fire({
        icon: icon,
        title: msg
    });
}

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
                success: function (projectData) {
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


function renderTableWithAttendance(candidatos, courseDays) {
    const tbody = $('#edit-candidate-table tbody');
    const thead = $('#edit-candidate-table thead');
    tbody.empty();

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

            const totalDays = courseDays.length;
            const presentDays = Object.values(asistencias).filter(v => v === true || v === 1).length;
            const showMotivo = presentDays < totalDays;

            tr += `<td>
                <textarea class="table-input textarea motivo-field ${showMotivo ? '' : 'd-none'}" 
                    name="courses[${index}][MOTIVO]" 
                    id="motivo_${index}"
                    placeholder="Motivo de inasistencia">${row.MOTIVO || ''}</textarea>
            </td>`;

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

function attachAttendanceListeners() {
    $('.attendance-switch').on('change', function () {
        const candidateIndex = $(this).data('candidate-index');
        const row = $(this).closest('tr');

        const totalSwitches = row.find('.attendance-switch').length;
        const checkedSwitches = row.find('.attendance-switch:checked').length;

        const motivoField = row.find(`#motivo_${candidateIndex}`);

        if (checkedSwitches < totalSwitches) {
            motivoField.removeClass('d-none');
        } else {
            motivoField.addClass('d-none');
            motivoField.val(''); // Limpiar el motivo
        }

        updateRowAttendanceStatus(row, checkedSwitches, totalSwitches);
    });
}

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

$("#candidatebtnModal").click(async function (e) {
    e.preventDefault();

    $('.candidate-row').each(function (index) {
        const row = $(this);
        const attendanceData = {};

        row.find('.attendance-switch').each(function () {
            const day = $(this).data('day');
            attendanceData[day] = $(this).is(':checked') ? 1 : 0;
        });

        if (row.find('input[name="courses[' + index + '][ASISTENCIAS]"]').length === 0) {
            row.append(`<input type="hidden" name="courses[${index}][ASISTENCIAS]" value='${JSON.stringify(attendanceData)}'>`);
        } else {
            row.find('input[name="courses[' + index + '][ASISTENCIAS]"]').val(JSON.stringify(attendanceData));
        }
    });

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

if ($('#attendance-styles').length === 0) {
    $('head').append(`<div id="attendance-styles">${attendanceStyles}</div>`);
}

function editarCandidatos() {
    $('#editarCandidatosModal').modal('show');
    loadTableDataWithAttendance();
}




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
            programRules = proyecto.PROGRAMA;
            projectProgramId = proyecto.PROGRAM_PROJECT;
            projectExamDate = proyecto.EXAM_DATE_PROJECT; // Falta esta línea
            projectAccreditingEntity = proyecto.ACCREDITING_ENTITY_PROJECT;

            renderDynamicTable(response, programRules);
        },
        error: function (xhr, status, error) {
            renderErrorTable(error);
        }
    });
}

// function renderNivelColumn(candidato, proyecto, key) {
//     const niveles = proyecto.ACCREDITATION_LEVELS_PROJECT || [];
//     const nivelGuardado = candidato.LEVEL || null;
//     let html = `<td><div class="levels-container">`;

//     if (niveles.length === 0) {
//         html += `<span class="text-muted">N/A</span>`;
//     } else if(nivelGuardado){
//         html += `<select class="form-select form-select-sm level-select" name="courses[${key}][LEVEL]">`;
//         if (!candidato.LEVEL) html += `<option value="">Seleccione nivel</option>`;
//         niveles.forEach(nivel => {
//             const selected = (nivel.id == candidato.LEVEL) ? "selected" : "";
//             html += `<option value="${nivel.id}" ${selected}>${nivel.nombre}</option>`;
//         });
//         html += `</select>`;

//     }else if (niveles.length === 1) {
//         const unico = niveles[0];
//         html += `<select class="form-select form-select-sm level-select" name="courses[${key}][LEVEL]">
//             <option value="${unico.id}" selected>${unico.nombre}</option>
//         </select>`;
//     } else {
//         html += `<select class="form-select form-select-sm level-select" name="courses[${key}][LEVEL]">`;
//         if (!candidato.LEVEL) html += `<option value="">Seleccione nivel</option>`;
//         niveles.forEach(nivel => {
//             const selected = (nivel.id == candidato.LEVEL) ? "selected" : "";
//             html += `<option value="${nivel.id}" ${selected}>${nivel.nombre}</option>`;
//         });
//         html += `</select>`;
//     }

//     html += `</div></td>`;
//     return html;
// }


function renderNivelColumn(candidato, proyecto, key) {

    const niveles = proyecto.ACCREDITATION_LEVELS_PROJECT || [];
    const nivelGuardado = candidato?.LEVEL ?? null;

    let html = `<td><div class="levels-container">`;

    // 🔹 No hay niveles configurados en el proyecto
    if (niveles.length === 0) {

        if (nivelGuardado) {
            html += `
                <select class="form-select form-select-sm level-select"
                        name="courses[${key}][LEVEL]" disabled>
                    <option value="${nivelGuardado}" selected>
                        Nivel asignado
                    </option>
                </select>
            `;
        } else {
            html += `<span class="text-muted">N/A</span>`;
        }

    } 
    // 🔹 Sí hay niveles → select editable
    else {

        html += `
            <select class="form-select form-select-sm level-select"
                    name="courses[${key}][LEVEL]">
                <option value="">Seleccione nivel</option>
        `;

        niveles.forEach(nivel => {
            const selected =
                String(nivel.id) === String(nivelGuardado)
                    ? 'selected'
                    : '';

            html += `
                <option value="${nivel.id}" ${selected}>
                    ${nivel.nombre}
                </option>
            `;
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

    html += renderExamField(curso.PRACTICAL, curso.PRACTICAL_PASS, 'practical', key, rules);

    html += renderExamField(curso.EQUIPAMENT, curso.EQUIPAMENT_PASS, 'equipament', key, rules);

    if (proyecto.ACCREDITING_ENTITY_PROJECT === '2') {
        html += renderExamField(curso.PYP, curso.PYP_PASS, 'pyp', key, rules);
    }

    return html;
}

function renderExamField(score, status, fieldName, key, rules) {
    const statusClass = status === 'Unpass' ? 'unpass-status' : (status === 'Pass' ? 'pass-status' : '');

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

    html += `<td>
        <input type="hidden" name="courses[${key}][CO]" value="0">
        <label class="switch">
            <input type="checkbox" class="co-switch" name="courses[${key}][CO]" ${curso.CO == 1 ? 'checked' : ''}>
            <span class="slider"></span>
        </label>
    </td>`;

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

function renderStatusColumn(curso, key, mensajeEstado) {
    return `<td>
        <select class="table-input status-select" name="courses[${key}][STATUS]">
            <option value="">Seleccionar...</option>
            <option value="Pending" ${curso.STATUS === 'Pending' ? 'selected' : ''}>Pending</option>
            <option value="In Progress" ${curso.STATUS === 'In Progress' ? 'selected' : ''}>In Progress</option>
            <option value="Completed" ${curso.STATUS === 'Completed' ? 'selected' : ''}>Completed</option>
            <option value="Failed" ${curso.STATUS === 'Failed' ? 'selected' : ''}>Failed</option>
        </select>`
         + mensajeEstado+
    `</td>`;
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

function triggerInitialValidation() {
    $('.score-input').each(function() {
        if ($(this).val() !== '') {
            $(this).trigger('input');
        }
    });

    $('.individual-comp-switch').each(function() {
        $(this).trigger('change');
    });

    $('.resit-switch-programado').each(function() {
        $(this).trigger('change');
    });
    
    $('.main-complement-switch').each(function() {
        const isChecked = $(this).is(':checked');
        const row = $(this).closest('tr');
        if(!isChecked) {
             row.find('.individual-comp-switch').prop('disabled', true);
             row.find('.complement-score, .complement-status').prop('readonly', true).css('background', '#e9ecef');
        } else {
             row.find('.individual-comp-switch').prop('disabled', false);
        }
    });
}

function renderFinalAndCertification(curso, candidato, key, cursoId) {
    let vigenciaTexto = 'Sin fecha';
    let vigenciaClass = 'text-muted';

    if (curso.EXPIRATION) {
        const expDate = new Date(curso.EXPIRATION);
        const today = new Date();
        const diffTime = expDate - today;
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

        if (diffDays < 0) {
            vigenciaTexto = `Vencido hace ${Math.abs(diffDays)} días`;
            vigenciaClass = 'text-danger fw-bold';
        } else {
            vigenciaTexto = `${diffDays} días restantes`;
            vigenciaClass = 'text-success';
        }
    }

    return `
        <td>
            <select class="form-control form-control-sm final-status-select" name="courses[${key}][FINAL_STATUS]">
                <option value="PASS" ${curso.FINAL_STATUS === 'PASS' ? 'selected' : ''}>PASS</option>
                <option value="FAIL" ${curso.FINAL_STATUS === 'FAIL' ? 'selected' : ''}>FAIL</option>
            </select>
        </td>
        <td>
            <input type="text" class="form-control form-control-sm" 
                name="courses[${key}][CERTIFICATE_NUMBER]" 
                placeholder="No. Certificado" 
                value="${curso.CERTIFIED && typeof curso.CERTIFIED === 'string' && !curso.CERTIFIED.includes('.pdf') ? curso.CERTIFIED : (curso.CERTIFICATE_NUMBER || '')}">
        </td>
        <td>
            <input type="date" class="form-control form-control-sm expiration-date" 
                name="courses[${key}][EXPIRATION]" 
                value="${formatDateForInput(curso.EXPIRATION) || ''}">
        </td>
        <td class="text-center align-middle">
            <span class="${vigenciaClass}" style="font-size: 0.85rem;">${vigenciaTexto}</span>
        </td>
        <td>
            <div class="d-flex gap-2 align-items-center justify-content-center">
                <input type="file" class="d-none certificate-upload" 
                    id="file-${key}" 
                    name="courses[${key}][CERTIFICATE_PDF]" 
                    accept=".pdf">

                ${curso.CERTIFIED ? `
                    <button type="button" class="btn btn-sm btn-info btn-ver-pdf-candidato" 
                        data-ruta="${curso.CERTIFIED}" 
                        title="Ver Certificado Actual">
                        <i class="fas fa-eye"></i>
                    </button>
                ` : `
                    <button type="button" class="btn btn-sm btn-secondary" disabled 
                        title="No hay certificado cargado">
                        <i class="fas fa-eye-slash"></i>
                    </button>
                `}

                <button type="button" class="btn btn-sm btn-outline-primary btn-upload-cert" 
                   
                    title="Cargar o Reemplazar PDF">
                    <i class="fas fa-upload"></i>
                </button>
            </div>
        </td>
    `;
}

function attachCertificateUploadListeners() {
    $('.btn-upload-cert').off('click').on('click', function () {
        const fileInput = $(this).closest('td').find('.certificate-upload');
        fileInput.trigger('click');
    });

    $('.certificate-upload, .refresh-upload').off('change').on('change', function () {
        const file = this.files[0];
        const btn = $(this).next('button'); 

        if (file) {
            if (file.type !== 'application/pdf') {
                alertToast('Solo se permiten archivos PDF', 'error', 2000);
                $(this).val(''); 
                return;
            }
            if (file.size > 10 * 1024 * 1024) { // 10MB
                alertToast('El archivo no debe superar 10MB', 'error', 2000);
                $(this).val(''); 
                return;
            }

            btn.removeClass('btn-outline-primary btn-secondary').addClass('btn-success');
            btn.html('<i class="fas fa-check-circle"></i>');
            btn.attr('title', 'Archivo listo para guardar: ' + file.name);
            alertToast('Archivo seleccionado. Presione "Guardar" para subirlo.', 'success', 2000);
        } else {
            btn.removeClass('btn-success').addClass('btn-outline-primary');
            btn.html('<i class="fas fa-upload"></i>');
            btn.attr('title', 'Cargar PDF');
        }
    });
}

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

function getResitTerm(capitalizeAll = false) {
    const term = projectAccreditingEntity === '1' ? 'Re-test' : 'Re-sit';
    return capitalizeAll ? term.toUpperCase() : term;
}

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

function calculateResitDates() {
    if (!projectExamDate || !programRules) return null;

    const examDate = new Date(projectExamDate);
    const periodoResit = programRules.PERIODO_RESIT || 90;

    const fechaLimite = new Date(examDate);
    fechaLimite.setDate(fechaLimite.getDate() + periodoResit);

    const today = new Date();
    const diasRestantes = Math.max(0, Math.ceil((fechaLimite - today) / (1000 * 60 * 60 * 24)));

    const fechaResitInmediato = new Date(examDate);

    return {
        fechaLimite,
        diasRestantes,
        periodoResit,
        fechaResitInmediato,
        formattedFechaLimite: formatDateForDisplay(fechaLimite),
        formattedFechaResitInmediato: formatDateForDisplay(fechaResitInmediato)
    };
}

function renderResitInfoEnhanced(curso, key, options, resitDates) {
    const resitTerm = getResitTerm();
    const intentosPermitidos = programRules ? programRules.OPCION_RESIT_PERMITIDAS : 1;

    let resitChecked = false;
    let warningMessage = '';

    if (options.needsResit) {
        resitChecked = true;
    } else if (options.failedCompletely) {
        warningMessage = `<small class="text-danger d-block">No aplica - Puntajes muy bajos</small>`;
    } else if (options.canPass) {
        warningMessage = `<small class="text-success d-block">Aprobado - No requiere ${resitTerm}</small>`;
    } else {
        warningMessage = `<small class="text-muted d-block">Complete calificaciones</small>`;
    }

    return `
        <td>
            <input type="hidden" name="courses[${key}][RESIT]" value="${resitChecked ? 1 : 0}">
            <label class="switch">
                <input type="checkbox" class="resit-switch" name="courses[${key}][RESIT]" 
                    ${resitChecked ? 'checked' : ''}> 
                <span class="slider"></span>
            </label>
            ${warningMessage}
        </td>
        <td>
            <select class="table-input module-select" 
                name="courses[${key}][RESIT_MODULE]">
                <option value="">Seleccionar...</option>
                ${options.resitModules.map(module =>
        `<option value="${module}" ${curso.RESIT_MODULE === module ? 'selected' : ''}>${module}</option>`
    ).join('')}
            </select>
            ${options.resitModules.length === 0 ? '<small class="text-muted d-block">N/A</small>' : ''}
        </td>
        <td>
            <div class="bops-container" style="justify-content: center;">
                <span class="bop-badge">${intentosPermitidos}</span>
            </div>
        </td>
        <td>
            <div class="bops-container" style="justify-content: center;">
                <span class="bop-badge">${resitDates.periodoResit} días</span>
            </div>
        </td>
        <td>
            <div class="bops-container ${resitDates.diasRestantes < 7 ? 'text-danger' : ''}" style="justify-content: center;">
                <span class="bop-badge">${resitDates.diasRestantes} días</span>
            </div>
        </td>
        <td>
            <div class="bops-container" style="justify-content: center;">
                <span class="bop-badge">${resitDates.formattedFechaLimite}</span>
            </div>
        </td>
    `;
}

function renderEmailColumn(candidato, curso, key) {
    const emailsSent = curso.EMAILS_SENT || 0;
    const maxEmails = 3;

    return `
        <td>
            <div class="email-info-container">
                <span class="email-text">${candidato.EMAIL_PROJECT || 'N/A'}</span>
                <div class="email-status mt-2">
                    <small class="text-muted">Envíos: <strong>${emailsSent}/${maxEmails}</strong></small>
                    <div class="email-checks d-flex gap-1 mt-1">
                        ${[1, 2, 3].map(num => `
                            <i class="fas fa-${emailsSent >= num ? 'check-circle text-success' : 'circle text-muted'}"></i>
                        `).join('')}
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-primary mt-2 send-email-btn" 
                        data-candidate-id="${candidato.ID_CANDIDATE}"
                        ${emailsSent >= maxEmails ? 'disabled' : ''}>
                        <i class="fas fa-envelope"></i> 
                        ${emailsSent >= maxEmails ? 'Límite alcanzado' : 'Enviar correo'}
                    </button>
                </div>
            </div>
            <input type="hidden" name="courses[${key}][EMAILS_SENT]" value="${emailsSent}">
        </td>
    `;
}

function addValidationListeners() {
    $('.practical-score, .equipament-score, .pyp-score').on('input change', function () {
        const row = $(this).closest('tr');
        revalidateRow(row);
    });

    $('.practical-status, .equipament-status, .pyp-status').on('change', function () {
        const row = $(this).closest('tr');
        revalidateRow(row);
    });
}

function revalidateRow(row) {
    const practical = parseFloat(row.find('.practical-score').val()) || 0;
    const equipament = parseFloat(row.find('.equipament-score').val()) || 0;
    const pyp = projectAccreditingEntity === '2' ? (parseFloat(row.find('.pyp-score').val()) || 0) : null;

    const options = determineStudentOptions(practical, equipament, pyp);
    const resitDates = calculateResitDates();

    updateRowResitOptions(row, options, resitDates);

    row.removeClass('row-pass row-unpass row-pending');
    if (options.canPass) {
        row.addClass('row-pass');
    } else if (options.failedCompletely) {
        row.addClass('row-unpass');
    } else {
        row.addClass('row-pending');
    }
}

function updateRowResitOptions(row, options, resitDates) {
    const resitSwitch = row.find('.resit-switch');
    resitSwitch.prop('checked', options.needsResit);
    resitSwitch.prop('disabled', !options.needsResit);

    const resitInmediatoSwitch = row.find('.resit-switch-inmediato');
    if (resitInmediatoSwitch.length) {
        resitInmediatoSwitch.prop('disabled', !options.needsImmediateResit);
        if (options.needsImmediateResit) {
            row.find('.resit-inmediato-date').val(formatDateForInput(resitDates.fechaResitInmediato));
        }
    }

    $('.resit-switch-programado-1, .resit-switch-programado-2, .resit-switch-programado-3').each(function () {
        const switchEl = row.find(this);
        if (switchEl.length) {
            switchEl.prop('disabled', !options.needsScheduledResit);
        }
    });

    const moduleSelect = row.find('.module-select');
    moduleSelect.empty().append('<option value="">Seleccionar...</option>');
    options.resitModules.forEach(module => {
        moduleSelect.append(`<option value="${module}">${module}</option>`);
    });
    moduleSelect.prop('disabled', options.resitModules.length === 0);
}

function renderResitProgramadoEnhanced(curso, key, numero, options, resitDates) {
    const resitEnabled = curso[`RESIT_${numero}`] == 1; 
    const isDisabled = !resitEnabled; 
    // const canProgramado = options.needsScheduledResit;


    let html = `
        <td class="text-center">
            <input type="hidden" name="courses[${key}][RESIT_${numero}]" value="0">
            <label class="switch">
                <input type="checkbox" class="resit-switch-programado" 
                    name="courses[${key}][RESIT_${numero}]" value="1"
                    data-resit-num="${numero}"
                    ${resitEnabled ? 'checked' : ''}>
                <span class="slider"></span>
            </label>
        </td>
        <td>
            <input class="table-input resit-programado-fecha-${numero} ${isDisabled ? 'disabled-field' : ''}" 
                type="date" 
                value="${formatDateForInput(curso[`RESIT_${numero}_DATE`]) || ''}" 
                name="courses[${key}][RESIT_${numero}_DATE]" ${isDisabled ? 'disabled' : ''} />
        </td>
    `;

    html += renderScoreStatusCell(
        key, 
        `RESIT_${numero}_SCORE`, 
        curso[`RESIT_${numero}_SCORE`], 
        curso[`RESIT_${numero}_STATUS`], 
        false, 
        !isDisabled, 
        `RESIT_${numero}_STATUS`
    );

    return html;
}

function renderDynamicTable(response, rules) {
    const thead = $('#edit-course-table thead');
    const tbody = $('#edit-course-table tbody');
    const proyecto = response.proyecto;

    thead.empty();
    tbody.empty();

    let headerRow1 = `<tr>`;
    let headerRow2 = `<tr>`;
    let resitNombre = '';

    //variables q ocupo siosi
    let ente = null;
    let llevaComplementos = null;
    let aplicaResitInmediato = false;
    let aplicaRefresh = false;

    headerRow1 += `<th colspan="5" class="text-center">Estudiante</th>`;
    headerRow2 += `
        <th width="50px" class="text-center">#</th>
        <th class="col-180" width="180px">Nombre completo</th>
        <th class="col-180" width="180px">Nivel</th>
        <th width="180px">BOP</th>
        <th width="180px">Idioma</th>
    `;

    const numExamenesT = proyecto.ACCREDITING_ENTITY_PROJECT === '1' ? 1 : 2;
    headerRow2 += `<th class="col-180" width="180px" style="background-color: #236192 !important;">Práctico</th>`;

    if (proyecto.ACCREDITING_ENTITY_PROJECT === '1') {
        ente = 1;
        headerRow2 += `<th class="col-180" width="180px" style="background-color: #236192 !important;">Equipos</th>`;
        resitNombre = 'RE-TEST';
    } else {
        ente = 2;
        resitNombre = 'RE-SIT';
        headerRow2 += `
            <th class="col-180" width="180px" style="background-color: #236192 !important;">Equipos</th>
            <th class="col-180" width="180px" style="background-color: #236192 !important;">P&P</th>
        `;
    }
    if (proyecto.COMPLEMENTOS) {
        try {
            const complementos = typeof proyecto.COMPLEMENTOS === 'string'
                ? JSON.parse(proyecto.COMPLEMENTOS)
                : proyecto.COMPLEMENTOS;

                console.log(complementos);
                console.log(proyecto.PROGRAM_PROJECT);

            if (Array.isArray(complementos) && complementos.length > 0) {
                llevaComplementos = complementos;
                const colspanTotal = complementos.length + 1;
                headerRow1 += `<th colspan="${colspanTotal + numExamenesT + 2}" class="text-center" style="background-color: #236192 !important;">Evaluacion inicial</th>`;
                headerRow2 += `<th class="col-180" width="180px" style="background-color: #236192 !important;">¿Incluye complementos?</th>`;
                complementos.forEach((comp, index) => {
                    headerRow2 += `<th class="col-180" style="background-color: #236192 !important;"> Complemento: ${comp.nombre || (index + 1)}</th>`;
                });
            }
        } catch (e) {
            console.error('Error al parsear complementos:', e);
        }
    }

    headerRow2 += `<th class="col-180" width="180px" style="background-color: #236192 !important;">Estatus</th>`;
    headerRow2 += `<th class="col-180" width="180px" style="background-color: #007DBA !important;">¿Tiene opción?</th>`;
    headerRow2 += `<th class="col-180" width="180px" style="background-color: #007DBA !important;">No. Opciones disponibles</th>`;
    headerRow2 += `<th class="col-180" width="180px" style="background-color: #007DBA !important;">Periodo (días)</th>`;
    headerRow2 += `<th class="col-180" width="180px" style="background-color: #007DBA !important;">Fecha límite</th>`;
    headerRow2 += `<th class="col-180" width="180px" style="background-color: #007DBA !important;">Días restantes</th>`;
    headerRow2 += `<th class="col-180" width="180px" style="background-color: #007DBA !important;">Módulo</th>`;
    let incrementoResit = 0;
    if (proyecto.RESIT_INMEDIATO) {
        aplicaResitInmediato = true;
        incrementoResit = 3;
        headerRow2 += `<th class="col-180" width="180px" style="background-color: #007DBA !important;">Resit inmediato</th>`;
        headerRow2 += `<th class="col-180" width="180px" style="background-color: #007DBA !important;">Fecha</th>`;
        headerRow2 += `<th class="col-180" width="180px" style="background-color: #007DBA !important;">Puntaje</th>`;
    }

    if (proyecto.REFRESH === 2) {
        aplicaRefresh = true;
        incrementoResit += 3;
        headerRow2 += `<th class="col-180" width="180px" style="background-color: #007DBA !important;">Re-fresh</th>`;
        headerRow2 += `<th class="col-180" width="180px" style="background-color: #007DBA !important;">Fecha Re-fresh</th>`;
        headerRow2 += `<th class="col-180" width="180px" style="background-color: #007DBA !important;">Evidencia Re-fresh</th>`;
    }

    let celdasGeneradas = 0;
    let numIntentosPermitidos = 0;
    if (proyecto.RESIT_PERMITIDAS) {
        const numResits = parseInt(proyecto.RESIT_PERMITIDAS) || 0;
        const resitsPermitidos = parseInt(proyecto.RESIT_PERMITIDAS) || numResits;
        const totalResits = Math.min(numResits, resitsPermitidos);

        if (totalResits > 0) {
        numIntentosPermitidos=totalResits;

            for (let i = 1; i <= totalResits; i++) {
                headerRow2 += `
                <th width="180px" style="background-color: #007DBA !important;">¿Presenta ${resitNombre} #${i}?</th>
                <th class="col-180" width="180px" style="background-color: #007DBA !important;">${resitNombre} #${i} (Fecha)</th>
                <th class="col-180" width="180px" style="background-color: #007DBA !important;">${resitNombre} #${i} (Puntaje)</th>
            `;
                celdasGeneradas += 3;
            }

        }
    }

    headerRow1 += `<th colspan="${incrementoResit + 6 + celdasGeneradas}" class="text-center" style="background-color: #007DBA !important;">${resitNombre}</th>`;

    headerRow1 += `<th colspan="8" class="text-center">Certificación</th>`;
    headerRow2 += `
        <th class="col-180" width="180px">Estatus Final</th>
        <th width="180px">Certificado</th>
        <th class="col-180" width="180px">Expiración</th>
        <th class="col-180" width="180px">Vigencia</th>
        <th width="150px" class="table-row-actions text-center">Cargar PDF</th>
    `;

    headerRow2 += `<th colspan="1" class="text-center">Notificación por correo</th>`;
    headerRow2 += `<th class="col-250" width="180px">Fechas de envío de correos</th>`;
    headerRow2 += `<th class="col-250" width="180px">Correos enviados</th>`;
    headerRow1 += `</tr>`;
    headerRow2 += `</tr>`;

    thead.append(headerRow1 + headerRow2);

    renderStudentRows(response.estudiantes, proyecto,ente,llevaComplementos,aplicaResitInmediato, aplicaRefresh, numIntentosPermitidos);

    initializeCourseDataTable();
    addSwitchListeners();
    addValidationListeners();
    attachCertificateUploadListeners();
}

function initializeCourseDataTable() {
    if ($.fn.DataTable.isDataTable('#edit-course-table')) {
        $('#edit-course-table').DataTable().destroy();
    }

    $('#edit-course-table').DataTable({
        scrollY: '50vh',
        scrollX: true,
        scrollCollapse: true,
        paging: true,
        pageLength: 4,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, 'Todos']],
        searching: true,
        ordering: true,
        info: false,
        autoWidth: false,
        responsive: true,
        language: {
            search: "Buscar estudiante:",
            searchPlaceholder: "Nombre, email...",
            lengthMenu: "Mostrar _MENU_ estudiantes",
            info: "Mostrando _START_ a _END_ de _TOTAL_ estudiantes",
            infoEmpty: "No hay estudiantes",
            infoFiltered: "(filtrado de _MAX_ total)",
            zeroRecords: "No se encontraron resultados",
            emptyTable: "No hay datos disponibles",
            paginate: {
                first: "Primero",
                last: "Último",
                next: "Siguiente",
                previous: "Anterior"
            }
        },
        columnDefs: [
            {
                orderable: false,
                targets: [-1] 
            },
            {
                className: "text-center",
                targets: [0, 3, 4] 
            },
            {
                targets: '_all',
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('align-middle');
                }
            }
        ],
        order: [[1, 'asc']], 
        drawCallback: function (settings) {
            addSwitchListeners();
            addValidationListeners();
            attachCertificateUploadListeners();

            const api = this.api();
            const info = api.page.info();
            console.log(`Mostrando ${info.recordsDisplay} estudiantes de ${info.recordsTotal}`);
        },
        initComplete: function (settings, json) {
            console.log('DataTable inicializado correctamente');
            updateRowCount($('#edit-course-table tbody tr').length);
        }
    });
}

function renderResitInmediatoEnhanced(curso, key, options, resitDates) {
    const isChecked = curso.RESIT_INMEDIATO == 1;
    const isDisabled = !isChecked; 
    const defaultDate = formatDateForInput(resitDates.fechaResitInmediato);

    let html = `
        <td class="text-center">
            <input type="hidden" name="courses[${key}][RESIT_INMEDIATO]" value="0">
            <label class="switch">
                <input type="checkbox" class="resit-switch-inmediato" 
                    name="courses[${key}][RESIT_INMEDIATO]" value="1" 
                    ${isChecked ? 'checked' : ''}>
                <span class="slider"></span>
            </label>
        </td>
        <td>
            <input class="table-input resit-inmediato-date ${isDisabled ? 'disabled-field' : ''}" type="date" 
                value="${curso.RESIT_INMEDIATO_DATE || defaultDate}" 
                name="courses[${key}][RESIT_INMEDIATO_DATE]" 
                ${isDisabled ? 'disabled' : ''} />
        </td>
    `;
    
    html += renderScoreStatusCell(
        key, 
        'RESIT_INMEDIATO_SCORE', 
        curso.RESIT_INMEDIATO_SCORE, 
        curso.RESIT_INMEDIATO_STATUS, 
        false, 
        !isDisabled, 
        'RESIT_INMEDIATO_STATUS'
    );

    return html;
}

function wrapText(text, wordsPerLine = 3) {
    const words = text.split(' ');
    let lines = [];
    for (let i = 0; i < words.length; i += wordsPerLine) {
        lines.push(words.slice(i, i + wordsPerLine).join(' '));
    }
    return lines.join('<br>');
}

function determineStudentOptions(practical, equipament, pyp = null) {
    const options = {
        canPass: false,
        needsResit: false,
        needsImmediateResit: false,
        needsScheduledResit: false,
        needsTraining: false,
        failedCompletely: false,
        requiresRefresh: false, 
        passedModules: [],
        failedModules: [],
        resitModules: [],
        message: ''
    };

    if (!programRules) return options;

    const modules = [
        { name: 'Practical', score: parseFloat(practical) || 0 },
        { name: 'Equipament', score: parseFloat(equipament) || 0 }
    ];

    if (pyp !== null && projectAccreditingEntity === '2') {
        modules.push({ name: 'P&P', score: parseFloat(pyp) || 0 });
    }

    const totalModules = modules.length;

    modules.forEach(m => {
        if (m.score >= programRules.MIN_PORCENTAJE_APROB) {
            options.passedModules.push(m.name);
        } else {
            options.failedModules.push(m.name);
            if (m.score >= programRules.MIN_PORCENTAJE_REPROB) {
                options.resitModules.push(m.name);
            }
        }
    });

    const passedCount = options.passedModules.length;
    const failedCount = options.failedModules.length;

    if (passedCount === totalModules) {
        options.canPass = true;
        options.message = wrapText('Aprobó todos los módulos');
    }
    else if (failedCount === 1 && options.resitModules.length === 1) {
        options.needsResit = true;
        const targetModule = options.resitModules[0];
        const targetScore = modules.find(m => m.name === targetModule).score;

        if (programRules.OPCION_RESIT == 2 && targetScore >= programRules.MIN_PORCENTAJE_REPROB_RE) {
            options.needsImmediateResit = true;
           msg = `Apto para RE-SIT Inmediato: ${targetModule}`;
        } 
        else {
            options.needsScheduledResit = true;
            options.needsTraining = true;
            msg = `Apto para RE-SIT Programado: ${targetModule}`;
        }

        if (programRules.OPCION_REFRESH == 2) {
            options.requiresRefresh = true;
            msg += ` Requiere RE-FRESH`;
        }
        options.message = wrapText(msg, 3);
    } 
    else {
        let failText = ``;
        options.failedCompletely = true;
        if (failedCount > 1) {
            failText = `Reprobado: ${failedCount} módulos fallidos`;
        } else {
            failText = `Reprobado: Puntaje inferior al mínimo (${programRules.MIN_PORCENTAJE_REPROB}%)`;
        }

        options.message = wrapText(failText, 3);
    }

    return options;
}
function renderStudentRows(estudiantes, proyecto, ente, llevaComplementos, aplicaResitInmediato, aplicaRefresh, numIntentosPermitidos, rules) {
    const tbody = $('#edit-course-table tbody');
    const resitDates = calculateResitDates();
    const safeRules = rules || programRules;

    estudiantes.forEach((estudiante, index) => {
        const candidato = estudiante.candidato;
        const curso = estudiante.datos_curso;
        const key = candidato.ID_CANDIDATE;

        const options = determineStudentOptions(curso.PRACTICAL, curso.EQUIPAMENT, (ente === 2 ? curso.PYP : null));

        let tr = `<tr data-candidate-id="${key}" data-curso-id="${estudiante.curso_id}" 
            class="course-row ${options.canPass ? 'row-pass' : (options.failedCompletely ? 'row-unpass' : 'row-pending')}">`;

        tr += `<td class="text-center">${index + 1}</td>`;
        tr += `<td><strong>${candidato.LAST_NAME_PROJECT || ''} ${candidato.FIRST_NAME_PROJECT || ''}</strong></td>`;
        tr += renderNivelColumn(candidato, proyecto, key);
        tr += renderBOPColumn(proyecto);
        tr += renderIdiomaColumn(proyecto);

        tr += renderScoreStatusCell(key, 'PRACTICAL', curso.PRACTICAL, curso.PRACTICAL_PASS, false); // False = Sin switch
        tr += renderScoreStatusCell(key, 'EQUIPAMENT', curso.EQUIPAMENT, curso.EQUIPAMENT_PASS, false);
        if (ente === 2) {
            tr += renderScoreStatusCell(key, 'PYP', curso.PYP, curso.PYP_PASS, false);
        }

        if (llevaComplementos) {
            tr += `
                <td class="text-center">
                    <label class="switch">
                        <input type="checkbox" class="main-complement-switch" name="courses[${key}][CO]" value="1" 
                            ${curso.CO == 1 ? 'checked' : ''}>
                        <span class="slider"></span>
                    </label>
                </td>`;

            llevaComplementos.forEach((comp, i) => {
                let dbFieldScore = '';
                let dbFieldStatus = '';
                let dbFieldEnabled = ''; 

                if (ente === '1' || ente === 1) { // IADC
                    if (i === 0) { dbFieldScore = 'WORKOVER'; dbFieldStatus = 'WO_STATUS'; }
                    if (i === 1) { dbFieldScore = 'SUBSEA'; dbFieldStatus = 'SUBSEA_STATUS'; }
                } else { // IWCF
                    if (i === 0) { dbFieldScore = 'D1'; dbFieldStatus = 'D1_STATUS'; }
                    if (i === 1) { dbFieldScore = 'D2'; dbFieldStatus = 'D2_STATUS'; }
                    if (i === 2) { dbFieldScore = 'D3'; dbFieldStatus = 'D3_STATUS'; }
                }

                if (dbFieldScore) {
                    const scoreVal = curso[dbFieldScore];
                    const statusVal = curso[dbFieldStatus];
                    const isEnabled = (scoreVal !== null && scoreVal !== '') || (statusVal !== null && statusVal !== '');
                    
                    tr += renderScoreStatusCell(key, dbFieldScore, scoreVal, statusVal, true, isEnabled, dbFieldStatus); 
                } else {
                    tr += `<td>N/A</td>`;
                }
            });
        }

        let mensajeEstado= `<span class="badge ${options.canPass ? 'bg-success' : 'bg-warning'}">${options.message}</span>`;
        tr += renderStatusColumn(curso, key, mensajeEstado); // Columna estatus editable

        tr += `<td class="text-center">${options.needsResit ? 'SÍ' : 'NO'}</td>`;
        tr += `<td class="text-center">${numIntentosPermitidos}</td>`;
        tr += `<td class="text-center">${safeRules.PERIODO_RESIT || 0} días</td>`;
        tr += `<td>${resitDates.formattedFechaLimite || 'N/A'}</td>`;
        tr += `<td><span class="badge bg-info">${resitDates.diasRestantes || 0}</span></td>`;
        
        tr += `<td>
            <select class="form-control form-control-sm module-select" name="courses[${key}][RESIT_MODULE]">
                <option value="">Seleccionar...</option>
                ${options.resitModules.map(m => `<option value="${m}" ${curso.RESIT_MODULE === m ? 'selected' : ''}>${m}</option>`).join('')}
            </select>
        </td>`;

        if (aplicaResitInmediato) {
            tr += renderResitInmediatoEnhanced(curso, key, options, resitDates);
        }

        if (aplicaRefresh) {
            tr += renderRefreshColumn(curso, key);
        }

        for (let i = 1; i <= numIntentosPermitidos; i++) {
            tr += renderResitProgramadoEnhanced(curso, key, i, options, resitDates);
        }

        tr += renderFinalAndCertification(curso, candidato, key, estudiante.curso_id);

        tr += `
            <td class="text-center">
                <div class="d-flex justify-content-center">
                    <label class="switch switch-sm" title="Habilitar notificaciones">
                        <input type="checkbox" name="courses[${key}][ENABLE_NOTIFICATIONS]" value="1" 
                        ${curso.ENABLE_NOTIFICATIONS == 1 ? 'checked' : ''}>
                        <span class="slider"></span>
                    </label>
                </div>
                <small class="text-muted">Notificaciones</small>
            </td>
        `;

        tr += renderEmailDatesColumn(curso.EXPIRATION);
        
        tr += renderEmailSentColumn(curso.EMAILS_SENT);

        tr += `<input type="hidden" name="courses[${key}][ID_CANDIDATE]" value="${key}">`;
        tr += `</tr>`;

        tbody.append(tr);
    });
    
    triggerInitialValidation();
}


$(document).on('click', '.btn-ver-pdf-candidato', function (e) {
    e.preventDefault();

    const rutaSucia = $(this).data('ruta'); 
    const idCandidato = $(this).closest('tr').data('candidate-id');
    
    const idProyecto = (typeof ID_PROJECT !== 'undefined') ? ID_PROJECT : 0;

    if (!rutaSucia) {
        if(typeof alertToast === 'function') alertToast('No hay documento adjunto.', 'error');
        else alert('No hay documento adjunto.');
        return;
    }

   
    let nombreArchivo = '';
    
    try {
        let rutaString = rutaSucia;
        if (rutaSucia.trim().startsWith('[') || rutaSucia.trim().startsWith('{')) {
             const docData = JSON.parse(rutaSucia);
             if (Array.isArray(docData) && docData.length > 0) {
                 rutaString = docData[0].ruta;
             }
        }
        nombreArchivo = rutaString.split('/').pop();
    } catch (error) {
        console.error('Error al procesar ruta:', error);
        nombreArchivo = rutaSucia.split('/').pop();
    }

    const baseUrl = window.location.origin;
    const urlFinal = `${baseUrl}/archivos/proyectos/${idProyecto}/candidatos/${idCandidato}/${nombreArchivo}`;

    console.log('Abriendo en nueva pestaña:', urlFinal);

    window.open(urlFinal, '_blank');
});



function renderRefreshColumn(curso, key) {
    const refreshValue = curso.REFRESH === '1' || curso.REFRESH === 1;
    const hasEvidence = curso.REFRESH_EVIDENCE && curso.REFRESH_EVIDENCE !== '';

    return `
        <td class="text-center">
            <label class="switch">
                <input type="checkbox" name="courses[${key}][REFRESH]" value="1" ${refreshValue ? 'checked' : ''}>
                <span class="slider"></span>
            </label>
        </td>
        <td>
            <input type="date" class="form-control form-control-sm"
                name="courses[${key}][REFRESH_DATE]"
                value="${formatDateForInput(curso.REFRESH_DATE) || ''}">
        </td>
        <td class="text-center">
            <div class="d-flex gap-2 align-items-center justify-content-center">
                <input type="file" class="d-none refresh-upload" id="refresh-file-${key}" 
                    name="courses[${key}][REFRESH_EVIDENCE]" accept=".pdf">
                
                <button type="button" class="btn btn-sm btn-outline-primary" 
                    onclick="$('#refresh-file-${key}').click()" title="Subir Evidencia PDF">
                    <i class="fas fa-upload"></i>
                </button>

               ${hasEvidence ? `
                    <button type="button" class="btn btn-sm btn-info btn-ver-pdf-candidato" 
                        data-ruta="${curso.REFRESH_EVIDENCE}" 
                        title="Ver Evidencia">
                        <i class="fas fa-eye"></i>
                    </button>
                ` : `
                    <button type="button" class="btn btn-sm btn-secondary" 
                        onclick="alertToast('No hay evidencia cargada', 'warning')">
                        <i class="fas fa-eye-slash"></i>
                    </button>
                `}
            </div>
        </td>
    `;
}

function renderEmailDatesColumn(expirationDate) {
    if (!expirationDate) {
        return `<td><small class="text-muted">Pendiente fecha exp.</small></td>`;
    }

    const exp = new Date(expirationDate);

    const d90 = new Date(exp);
    d90.setDate(d90.getDate() - 89);

    const d60 = new Date(exp);
    d60.setDate(d60.getDate() - 59);

    const d30 = new Date(exp);
    d30.setDate(d30.getDate() - 29);

    return `
        <td>
            <div style="font-size: 0.75rem; line-height: 1.2;">
                <div class="text-muted">90 días antes:
                    <span class="text-dark">${d90.toLocaleDateString('es-ES')}</span>
                </div>
                <div class="text-muted">60 días antes:
                    <span class="text-dark">${d60.toLocaleDateString('es-ES')}</span>
                </div>
                <div class="text-muted">30 días antes:
                    <span class="text-dark">${d30.toLocaleDateString('es-ES')}</span>
                </div>
            </div>
        </td>
    `;
}


function renderEmailSentColumn(emailsSent) {
    const sent = parseInt(emailsSent) || 0;
    const max = 3;
    
    // Generar iconos de checks
    let checks = '';
    for (let i = 1; i <= max; i++) {
        const color = sent >= i ? 'text-success' : 'text-muted';
        const icon = sent >= i ? 'fa-check-circle' : 'fa-circle';
        checks += `<i class="fas ${icon} ${color} mx-1"></i>`;
    }

    return `
        <td class="text-center align-middle">
            <div class="mb-1"><strong>${sent}/${max}</strong></div>
            <div class="d-flex justify-content-center" style="font-size: 0.8rem;">
                ${checks}
            </div>
        </td>
    `;
}


function verDocumento(rutaRelativa) {
    if (!rutaRelativa || rutaRelativa.trim() === '') {
        alertaSinArchivo();
        return;
    }
    
    const url = `/storage/${rutaRelativa}`;
    window.open(url, '_blank');
}

function alertaSinArchivo() {
    if(typeof alertToast === 'function') {
        alertToast('No hay documento cargado para visualizar.', 'info', 2000);
    } else {
        Swal.fire({
            icon: 'info',
            title: 'Sin archivo',
            text: 'No se ha cargado ningún documento todavía.',
            timer: 2000,
            showConfirmButton: false
        });
    }
}
function renderScoreStatusCell(key, fieldName, score, status, includeSwitch = false, isEnabled = false, customStatusField = null) {
    const statusClass = status === 'Pass' ? 'pass-status' : (status === 'Unpass' ? 'unpass-status' : '');
    const statusFieldName = customStatusField || `${fieldName}_PASS`; 
    
    const isLocked = includeSwitch && !isEnabled;
    const readonlyAttr = isLocked ? 'readonly' : '';
    const pointerEvents = isLocked ? 'style="pointer-events: none; background: #e9ecef; opacity: 0.7;"' : '';
    const inputStyle = isLocked ? 'style="background: #e9ecef;"' : '';

    let html = `<td class="text-center"><div class="score-cell-container d-inline-flex flex-column align-items-center p-1">`;

    if (includeSwitch) {
        html += `
            <div class="d-flex justify-content-between align-items-center mb-1 pb-1 border-bottom d-none">
                <small class="fw-bold" style="font-size: 0.7rem;">HABILITAR</small>
                <label class="switch switch-sm">
                    <input type="checkbox" class="individual-comp-switch" 
                        name="courses[${key}][${fieldName}_ENABLED]" value="1">
                    <span class="slider small"></span>
                </label>
            </div>`;
    }

    html += `
        <div class="input-group input-group-sm mb-1" >
            <input type="number" class="form-control score-input ${fieldName.toLowerCase()}-score ${statusClass}" 
                name="courses[${key}][${fieldName}]" 
                value="${score || ''}" min="0" max="100" 
                data-key="${key}">
            <span class="input-group-text">%</span>
        </div>
        
        <select class="form-control form-control-sm status-select ${fieldName.toLowerCase()}-status ${statusClass}" 
            name="courses[${key}][${statusFieldName}]">
            <option value="">Status...</option>
            <option value="Pass" ${status === 'Pass' ? 'selected' : ''}>Pass</option>
            <option value="Unpass" ${status === 'Unpass' ? 'selected' : ''}>Failed</option>
        </select>
    </div></td>`;

    return html;
}

function descargarRoster(idProyecto) {
    Swal.fire({
        title: 'Generando Excel',
        text: 'Tu descarga comenzará en breve...',
        timer: 2000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });
    
    window.location.href = '/exportProjectExcel/' + idProyecto;
}

// function descargarRosterPdf(id) {
//     Swal.fire({
//         title: 'Generando PDF',
//         text: 'Por favor espere...',
//         allowOutsideClick: false,
//         didOpen: () => { Swal.showLoading(); }
//     });
//     window.location.href = '/exportProjectPdf/' + id;
// }

async function descargarRosterPdf(id) {
    Swal.fire({
        title: 'Generando PDF',
        text: 'Por favor espere...',
        allowOutsideClick: false,
        didOpen: () => { Swal.showLoading(); }
    });

    try {
        const response = await fetch('/exportProjectPdf/' + id);
        
        if (!response.ok) {
            throw new Error('Error al generar el PDF');
        }

        const blob = await response.blob();
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.style.display = 'none';
        a.href = url;
        a.download = `ROSTER_${id}.pdf`;
        document.body.appendChild(a);
        a.click();
        window.URL.revokeObjectURL(url);
        document.body.removeChild(a);

        // Cerrar el loading y mostrar éxito
        Swal.fire({
            icon: 'success',
            title: '¡PDF Descargado!',
            text: 'El archivo se ha descargado correctamente',
            timer: 2000,
            showConfirmButton: false
        });

    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No se pudo generar el PDF. Intente nuevamente.'
        });
        console.error('Error:', error);
    }
}