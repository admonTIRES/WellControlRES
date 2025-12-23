// Variables globales necesarias
let programRulesGeneral = {};
let projectProgramIdGeneral = null;
let projectAccreditingEntityGeneral = null;
let projectExamDateGeneral = null;

var projectCourseDatatable = $("#course-list-table").DataTable({
    language: { url: "https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json" },
    lengthChange: true,
    lengthMenu: [
        [8, 25, 50, -1],
        [8, 25, 50, 'Todos']
    ],
    info: true,
    paging: true,
    searching: true,
    filtering: true,
    scrollY: false,
    scrollX: true,
    scrollCollapse: false,
    responsive: false,
    autoWidth: false,
    fixedHeader: false,
    ajax: {
        dataType: 'json', 
        method: 'GET',
        cache: false,
        url: '/tablaEstudiantesGeneral',
        beforeSend: function () {
            // mostrarCarga();
        },
        complete: function () {
            projectCourseDatatable.columns.adjust().draw();
            
            // Forzar alineación después de cargar
            setTimeout(function() {
                projectCourseDatatable.columns.adjust();
            }, 100);
            // ocultarCarga();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alertErrorAJAX(jqXHR, textStatus, errorThrown);
        },
        dataSrc: 'estudiantes'
    },
    order: [[1, 'asc']],
    columns: [
        // INFORMACIÓN DEL ESTUDIANTE
        {
            data: null,
            render: function (data, type, row, meta) {
                return `<span class="fw-bold text-primary">${meta.row + 1}</span>`;
            },
            width: "40px"
        },
        {
            data: 'candidato',
            render: function (data) {
                const fullName = `${data.LAST_NAME_PROJECT || ''} ${data.FIRST_NAME_PROJECT || ''} ${data.MIDDLE_NAME_PROJECT || ''}`;
                return `<div class="student-name-cell">
                    <span class="fw-semibold">${fullName.trim() || 'N/A'}</span>
                    <small class="text-muted d-block">${data.EMAIL_PROJECT || ''}</small>
                </div>`;
            },
            width: "200px"
        },
        
        // INFORMACIÓN DEL PROYECTO
        {
            data: 'proyecto',
            render: function (data) {
                return `<div class="project-info-cell">
                    <span class="fw-semibold d-block">${data.FOLIO_PROJECT || 'N/A'}</span>
                </div>`;
            },
            width: "180px"
        },
         {
            data: 'candidato',
            render: function (data) {
                return `<div class="project-info-cell">
                    <span class="fw-semibold d-block">${data.COMPANY_PROJECT || 'N/A'}</span>
                    <small class="text-muted">${data.COMPANY_NAME_PROJECT || 'N/A'}</small>
                </div>`;
            },
            width: "180px"
        },
        {
            data: 'proyecto',
            render: function (data) {
                return data.TIPO_OPERACION || '<span class="text-muted">N/A</span>';
            },
            width: "150px"
        },
        {
            data: 'proyecto',
            render: function (data) {
                const ente = data.ENTE_ACREDITADOR || 'N/A';
                const badgeClass = ente === 'IADC' ? 'bg-primary' : (ente === 'IWCF' ? 'bg-info' : 'bg-secondary');
                return `<span class="badge ${badgeClass}">${ente}</span>`;
            },
            width: "120px"
        },
        {
            data: 'proyecto',
            render: function (data) {
                if (data.NIVELES_ACREDITACION && data.NIVELES_ACREDITACION.length > 0) {
                    const nombres = data.NIVELES_ACREDITACION.map(nivel => nivel.nombre);
                    return `<div class="levels-container">${nombres.map(n => `<span class="badge bg-primary">${n}</span>`).join(' ')}</div>`;
                }
                return '<span class="text-muted">N/A</span>';
            },
            width: "150px"
        },
        {
            data: 'proyecto',
            render: function (data) {
                if (data.TIPOS_BOP && data.TIPOS_BOP.length > 0) {
                    const abreviaturas = data.TIPOS_BOP.map(bop => bop.abreviatura);
                    return `<div class="bops-container">${abreviaturas.map(a => `<span class="bop-badge">${a}</span>`).join(' ')}</div>`;
                }
                return '<span class="text-muted">N/A</span>';
            },
            width: "150px"
        },
        
        // CALIFICACIONES PRINCIPALES
        {
            data: 'datos_curso',
            render: function (data) {
                return renderScoreStatusDisplay(data.PRACTICAL, data.PRACTICAL_PASS);
            },
            width: "120px"
        },
        {
            data: 'datos_curso',
            render: function (data) {
                return renderScoreStatusDisplay(data.EQUIPAMENT, data.EQUIPAMENT_PASS);
            },
            width: "120px"
        },
        {
            data: 'datos_curso',
            render: function (data, type, row) {
                // P&P solo para IWCF
                if (row.proyecto.ENTE_ACREDITADOR === 'IWCF') {
                    return renderScoreStatusDisplay(data.PYP, data.PYP_PASS);
                }
                return '<span class="text-muted">N/A</span>';
            },
            width: "120px"
        },
        
        // ESTADO Y RESIT
        {
            data: 'datos_curso',
            render: function (data) {
                return renderStatusBadge(data.STATUS);
            },
            width: "130px"
        },
        {
            data: 'datos_curso',
            render: function (data, type, row) {
                const resitValue = data.RESIT === '1' || data.RESIT === 1 || data.RESIT === 'Yes';
                const badgeClass = resitValue ? 'badge-warning' : 'badge-secondary';
                const resitText = resitValue ? 'Sí' : 'No';
                
                // Mostrar módulo si aplica
                let moduleInfo = '';
                if (resitValue && data.RESIT_MODULE) {
                    let moduleText = data.RESIT_MODULE;
                    switch (data.RESIT_MODULE) {
                        case 'Equipament': moduleText = 'Equipos'; break;
                        case 'P&P': moduleText = 'P&P'; break;
                        case 'WORKOVER': moduleText = 'WorkOver'; break;
                        case 'SUBSEA': moduleText = 'SubSea'; break;
                    }
                    moduleInfo = `<small class="d-block text-primary mt-1">${moduleText}</small>`;
                }
                
                return `<div class="text-center">
                    <span class="badge ${badgeClass}">${resitText}</span>
                    ${moduleInfo}
                </div>`;
            },
            width: "130px"
        },
        {
            data: 'datos_curso',
            render: function (data) {
                const intentos = data.INTENTOS || 0;
                return intentos > 0 ? `<span class="badge badge-info">${intentos}</span>` : '<span class="text-muted">0</span>';
            },
            width: "100px"
        },
        
        // RESIT INMEDIATO
        {
            data: 'datos_curso',
            render: function (data) {
                const hasInmediato = data.RESIT_INMEDIATO === '1' || data.RESIT_INMEDIATO === 1 || data.RESIT_INMEDIATO === 'Yes';
                
                if (!hasInmediato) {
                    return '<span class="text-muted">N/A</span>';
                }
                
                const date = data.RESIT_INMEDIATO_DATE ? formatDateForDisplay(data.RESIT_INMEDIATO_DATE) : 'Sin fecha';
                const score = data.RESIT_INMEDIATO_SCORE || 'N/A';
                const status = data.RESIT_INMEDIATO_STATUS || '';
                
                return `<div class="resit-info-cell">
                    <small class="text-muted d-block">${date}</small>
                    ${renderScoreStatusDisplay(score, status)}
                </div>`;
            },
            width: "150px"
        },
        
        // RESIT PROGRAMADO 1
        {
            data: 'datos_curso',
            render: function (data) {
                return renderResitProgramado(data, 1);
            },
            width: "150px"
        },
        
        // RESIT PROGRAMADO 2
        {
            data: 'datos_curso',
            render: function (data) {
                return renderResitProgramado(data, 2);
            },
            width: "150px"
        },
        
        // RESIT PROGRAMADO 3
        {
            data: 'datos_curso',
            render: function (data) {
                return renderResitProgramado(data, 3);
            },
            width: "150px"
        },
        
        // REFRESH
        {
            data: 'datos_curso',
            render: function (data) {
                const hasRefresh = data.REFRESH === '1' || data.REFRESH === 1;
                
                if (!hasRefresh) {
                    return '<span class="text-muted">N/A</span>';
                }
                
                const date = data.REFRESH_DATE ? formatDateForDisplay(data.REFRESH_DATE) : 'Sin fecha';
                const hasEvidence = data.REFRESH_EVIDENCE && data.REFRESH_EVIDENCE !== '';
                
                return `<div class="refresh-info-cell">
                    <span class="badge badge-info mb-1">Re-fresh</span>
                    <small class="text-muted d-block">${date}</small>
                    ${hasEvidence ? '<i class="fas fa-file-pdf text-success mt-1"></i>' : ''}
                </div>`;
            },
            width: "150px"
        },
        
        // CERTIFICACIÓN
        {
            data: 'datos_curso',
            render: function (data) {
                const finalStatus = data.FINAL_STATUS || '';
                const statusText = finalStatus === 'Unpass' || finalStatus === 'FAIL' ? 'Reprobado' : 
                                  (finalStatus === 'Pass' || finalStatus === 'PASS' ? 'Aprobado' : 'Pendiente');
                const badgeClass = (finalStatus === 'Pass' || finalStatus === 'PASS') ? 'badge-success' : 
                                  ((finalStatus === 'Unpass' || finalStatus === 'FAIL') ? 'badge-danger' : 'badge-warning');
                
                return `<span class="badge ${badgeClass}">${statusText}</span>`;
            },
            width: "130px"
        },
        {
            data: 'datos_curso',
            render: function (data) {
                const certNumber = data.CERTIFICATE_NUMBER || 
                                  (data.CERTIFIED && typeof data.CERTIFIED === 'string' && !data.CERTIFIED.includes('.pdf') ? data.CERTIFIED : '');
                
                return certNumber ? `<span class="cert-number">${certNumber}</span>` : '<span class="text-muted">N/A</span>';
            },
            width: "150px"
        },
        {
            data: 'datos_curso',
            render: function (data) {
                return renderExpirationDate(data.EXPIRATION);
            },
            width: "180px"
        },
        {
            data: 'datos_curso',
            render: function (data, type, row) {
                const hasPDF = data.CERTIFIED && data.CERTIFIED !== '';
                const candidateId = row.candidato.ID_CANDIDATE;
                const projectId = row.proyecto.ID_PROJECT || 0;
                
                if (!hasPDF) {
                    return `<button type="button" class="btn btn-sm btn-secondary" disabled title="Sin certificado">
                        <i class="fas fa-eye-slash"></i>
                    </button>`;
                }
                
                return `<button type="button" class="btn btn-sm btn-info btn-ver-certificado" 
                    data-ruta="${data.CERTIFIED}"
                    data-candidate-id="${candidateId}"
                    data-project-id="${projectId}"
                    title="Ver Certificado">
                    <i class="fas fa-file-pdf"></i> Ver PDF
                </button>`;
            },
            width: "120px"
        },
        
        // ASISTENCIA
        {
            data: 'candidato',
            render: function (data) {
                const asistio = data.ASISTENCIA !== '0' && data.ASISTENCIA !== 0;
                const badgeClass = asistio ? 'badge-success' : 'badge-danger';
                const text = asistio ? 'Asistió' : 'No asistió';
                
                let motivo = '';
                if (!asistio && data.MOTIVO) {
                    motivo = `<small class="text-danger d-block mt-1">${data.MOTIVO}</small>`;
                }
                
                return `<div class="attendance-cell">
                    <span class="badge ${badgeClass}">${text}</span>
                    ${motivo}
                </div>`;
            },
            width: "150px"
        }
    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center align-middle', width: '40px' },
        { targets: 1, title: 'ESTUDIANTE', className: 'text-left align-middle', width: '200px' },
        { targets: 2, title: 'PROYECTO', className: 'text-left align-middle', width: '180px' },
        { targets: 3, title: 'RAZON SOCIAL / EMPRESA', className: 'text-left align-middle', width: '180px' },
        { targets: 4, title: 'TIPO OPERACIÓN', className: 'text-center align-middle', width: '150px' },
        { targets: 5, title: 'ENTE', className: 'text-center align-middle', width: '120px' },
        { targets: 6, title: 'NIVEL', className: 'text-center align-middle', width: '150px' },
        { targets: 7, title: 'BOP', className: 'text-center align-middle', width: '150px' },
        { targets: 8, title: 'PRÁCTICO', className: 'text-center align-middle', name: 'practical', width: '120px' },
        { targets: 9, title: 'EQUIPOS', className: 'text-center align-middle', name: 'equipament', width: '120px' },
        { targets: 10, title: 'P&P', className: 'text-center align-middle', name: 'pyp', width: '120px' },
        { targets: 11, title: 'ESTADO CURSO', className: 'text-center align-middle', width: '130px' },
        { targets: 12, title: 'RESIT INFO', className: 'text-center align-middle', width: '130px' },
        { targets: 13, title: 'INTENTOS', className: 'text-center align-middle', width: '100px' },
        { targets: 14, title: 'RESIT INMEDIATO', className: 'text-center align-middle', width: '150px' },
        { targets: 15, title: 'RESIT #1', className: 'text-center align-middle', width: '150px' },
        { targets: 16, title: 'RESIT #2', className: 'text-center align-middle', width: '150px' },
        { targets: 17, title: 'RESIT #3', className: 'text-center align-middle', width: '150px' },
        { targets: 18, title: 'RE-FRESH', className: 'text-center align-middle', width: '150px' },
        { targets: 19, title: 'ESTADO FINAL', className: 'text-center align-middle', width: '130px' },
        { targets: 20, title: 'N° CERTIFICADO', className: 'text-center align-middle', width: '150px' },
        { targets: 21, title: 'EXPIRACIÓN / VIGENCIA', className: 'text-center align-middle', width: '180px' },
        { targets: 22, title: 'CERTIFICADO PDF', className: 'text-center align-middle', width: '120px' },
        { targets: 23, title: 'ASISTENCIA', className: 'text-center align-middle', width: '150px' }
    ],
    createdRow: function (row, data, dataIndex) {
        const curso = data.datos_curso;
        const candidato = data.candidato;
        const practicalStatus = curso.PRACTICAL_PASS || '';
        const asistenciaStatus = candidato.ASISTENCIA || '';
        const equipamentStatus = curso.EQUIPAMENT_PASS || '';
        const pypStatus = curso.PYP_PASS || '';
        const finalStatus = curso.FINAL_STATUS || '';

        const allUnpass = practicalStatus === 'Unpass' && equipamentStatus === 'Unpass' && pypStatus === 'Unpass';
        const allPass = practicalStatus === 'Pass' && equipamentStatus === 'Pass' && pypStatus === 'Pass';

        // Aplicar clases de fila
        if (allUnpass) {
            $(row).addClass('row-unpass');
        } else if (allPass || finalStatus === 'Pass') {
            $(row).addClass('row-pass');
        } else if(finalStatus === 'Unpass'){
            $(row).addClass('row-unpass');
        }

        if(asistenciaStatus === '0'){
             $(row).addClass('row-desert');
        }
    },
    initComplete: function(settings, json) {
        // Ajustar columnas después de que la tabla esté completamente inicializada
        this.api().columns.adjust();
    },
    drawCallback: function(settings) {
        // Ajustar columnas después de cada redibujado
        this.api().columns.adjust();
    }
});

// Función auxiliar para renderizar score y status
function renderScoreStatusDisplay(score, status) {
    const statusText = status === 'Unpass' ? 'No Aprobado' : (status === 'Pass' ? 'Aprobado' : '');
    const statusClass = status === 'Unpass' ? 'unpass-status' : (status === 'Pass' ? 'pass-status' : '');
    
    return `
        <div class="score-status-display">
            <span class="score-text ${statusClass}">${score || '0'}%</span>
            ${status ? `<span class="status-badge ${statusClass}">${statusText}</span>` : ''}
        </div>
    `;
}

// Función auxiliar para renderizar el status del curso
function renderStatusBadge(status) {
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
            statusText = 'Reprobado';
            break;
        default:
            badgeClass = 'badge-secondary';
            statusText = status || 'N/A';
    }
    return status ? `<span class="badge ${badgeClass}">${statusText}</span>` : '<span class="text-muted">N/A</span>';
}

// Función auxiliar para renderizar la fecha de expiración con vigencia
function renderExpirationDate(expiration) {
    if (!expiration) {
        return '<span class="text-muted">N/A</span>';
    }

    const expDate = new Date(expiration);
    const today = new Date();
    const diffTime = expDate - today;
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    let vigenciaHTML = '';
    let vigenciaClass = '';
    
    if (diffDays < 0) {
        vigenciaHTML = `<small class="text-danger d-block">Vencido hace ${Math.abs(diffDays)} días</small>`;
        vigenciaClass = 'expired';
    } else if (diffDays <= 30) {
        vigenciaHTML = `<small class="text-warning d-block">Vence en ${diffDays} días</small>`;
        vigenciaClass = 'expiring-soon';
    } else {
        vigenciaHTML = `<small class="text-success d-block">${diffDays} días restantes</small>`;
        vigenciaClass = 'valid';
    }

    return `
        <div class="expiration-container ${vigenciaClass}">
            <span class="d-block">${formatDateForDisplay(expiration)}</span>
            ${vigenciaHTML}
        </div>
    `;
}

// Función para renderizar resits programados (unificada para 1, 2, 3)
function renderResitProgramado(data, numero) {
    const hasResit = data[`RESIT_${numero}`] === '1' || data[`RESIT_${numero}`] === 1;
    
    if (!hasResit) {
        return '<span class="text-muted">N/A</span>';
    }
    
    const date = data[`RESIT_${numero}_DATE`] ? formatDateForDisplay(data[`RESIT_${numero}_DATE`]) : 'Sin fecha';
    const score = data[`RESIT_${numero}_SCORE`] || 'N/A';
    const status = data[`RESIT_${numero}_STATUS`] || '';
    const training = data[`RESIT_${numero}_ENTRENAMIENTO`];
    
    let trainingBadge = '';
    if (training === '1' || training === 1) {
        trainingBadge = '<span class="badge badge-info badge-sm">Con entrenamiento</span>';
    } else if (training === '0' || training === 0) {
        trainingBadge = '<span class="badge badge-secondary badge-sm">Sin entrenamiento</span>';
    }
    
    return `<div class="resit-programado-cell">
        <small class="text-muted d-block mb-1">${date}</small>
        ${renderScoreStatusDisplay(score, status)}
        ${trainingBadge}
    </div>`;
}

// Event listener para ver certificados
$(document).on('click', '.btn-ver-certificado', function(e) {
    e.preventDefault();
    
    const rutaSucia = $(this).data('ruta');
    const candidateId = $(this).data('candidate-id');
    const projectId = $(this).data('project-id');
    
    if (!rutaSucia) {
        if (typeof alertToast === 'function') {
            alertToast('No hay documento adjunto.', 'error');
        } else {
            alert('No hay documento adjunto.');
        }
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
    const urlFinal = `${baseUrl}/archivos/proyectos/${projectId}/candidatos/${candidateId}/${nombreArchivo}`;
    
    console.log('Abriendo certificado:', urlFinal);
    window.open(urlFinal, '_blank');
});

function formatDateForDisplay(dateString) {
    if (!dateString) return 'N/A';
    const date = new Date(dateString);
    return date.toLocaleDateString('es-ES');
}

// Estilos CSS adicionales para mejorar la visualización
const additionalStyles = `
<style>
/* Estilos para la tabla mejorada */


.score-status-display {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 4px;
    padding: 4px;
}

.score-text {
    font-weight: 600;
    font-size: 1rem;
}

.status-badge {
    font-size: 0.7rem;
    padding: 2px 8px;
    border-radius: 12px;
    font-weight: 500;
    white-space: nowrap;
}

.badge-sm {
    font-size: 0.65rem;
    padding: 2px 6px;
}

.pass-status {
    color: #28a745 !important;
}

.unpass-status {
    color: #dc3545 !important;
}

.status-badge.pass-status {
    background-color: #d4edda;
    color: #155724 !important;
    border: 1px solid #c3e6cb;
}

.status-badge.unpass-status {
    background-color: #f8d7da;
    color: #721c24 !important;
    border: 1px solid #f5c6cb;
}

/* Estilos de filas */
.row-pass {
    background-color: rgba(198, 239, 206, 0.2) !important;
}

.row-pass:hover {
    background-color: rgba(198, 239, 206, 0.35) !important;
}

.row-unpass {
    background-color: rgba(255, 199, 206, 0.2) !important;
}

.row-unpass:hover {
    background-color: rgba(255, 199, 206, 0.35) !important;
}

.row-desert {
    background-color: rgba(255, 235, 156, 0.25) !important;
}

.row-desert:hover {
    background-color: rgba(255, 235, 156, 0.4) !important;
}

.row-pending {
    background-color: rgba(173, 216, 230, 0.15) !important;
}

.row-pending:hover {
    background-color: rgba(173, 216, 230, 0.25) !important;
}

/* Niveles y BOPs */
.levels-container, .bops-container {
    display: flex;
    flex-wrap: wrap;
    gap: 4px;
    justify-content: center;
}

/* Celdas especiales */
.resit-info-cell,
.resit-programado-cell,
.refresh-info-cell {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 4px;
    padding: 4px;
}

.cert-number {
    font-family: 'Courier New', monospace;
    font-weight: 600;
    color: #0056b3;
    background-color: #e7f3ff;
    padding: 4px 8px;
    border-radius: 4px;
    border: 1px solid #b3d9ff;
}

/* Expiración */
.expiration-container {
    text-align: center;
    padding: 6px;
    border-radius: 6px;
}

.expiration-container.expired {
    background-color: rgba(220, 53, 69, 0.15);
    border: 1px solid rgba(220, 53, 69, 0.3);
}

.expiration-container.expiring-soon {
    background-color: rgba(255, 193, 7, 0.15);
    border: 1px solid rgba(255, 193, 7, 0.3);
}

.expiration-container.valid {
    background-color: rgba(40, 167, 69, 0.15);
    border: 1px solid rgba(40, 167, 69, 0.3);
}

/* Badges mejorados */
.badge {
    padding: 4px 10px;
    font-size: 0.75rem;
    font-weight: 500;
    border-radius: 12px;
}

.badge-warning {
    background-color: #ffc107;
    color: #000;
}

.badge-info {
    background-color: #17a2b8;
    color: #fff;
}

.badge-success {
    background-color: #28a745;
    color: #fff;
}

.badge-danger {
    background-color: #dc3545;
    color: #fff;
}

.badge-secondary {
    background-color: #6c757d;
    color: #fff;
}

.badge-primary {
    background-color: #007bff;
    color: #fff;
}

.bg-primary {
    background-color: #007bff !important;
}

.bg-info {
    background-color: #17a2b8 !important;
}


.btn-ver-certificado {
    transition: all 0.2s ease;
}

.btn-ver-certificado:hover {
    transform: scale(1.05);
    box-shadow: 0 2px 6px rgba(0,0,0,0.2);
}
</style>
`;

// Agregar estilos al documento si no existen
if ($('#general-table-styles').length === 0) {
    $('head').append(`<div id="general-table-styles">${additionalStyles}</div>`);
}