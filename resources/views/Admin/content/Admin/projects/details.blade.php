@extends('Template/maestraAdmin')
@section('contenido')

<div class="conatiner-fluid content-inner mt-5 py-0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div>
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="Breadcrumb" class="breadcrumb-ui">
                    <ol>
                        <li>
                            <a href="{{ route('home') }}">
                                <i class="ri-home-line"></i>
                                <span>Inicio</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('projectsAdmin') }}">
                                <i class="ri-folder-2-line"></i>
                                <span>Proyectos</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" aria-current="page" class="current">
                                <i class="ri-slideshow-line"></i>
                                <span>Detalles</span>
                            </a>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12 mt-4">
                <div class="card banner">
                    <div class="card-body ">
                        <div class="row justify-content-center align-items-center banner-container">
                            <div class="col-lg-6 banner-item">
                                <div class="banner-text">
                                    <h1 class="fw-bold mb-4">
                                        <span class="text-secondary">{{ __('Project') }} - </span> {{ $COURSE_NAME_ES_PROJECT }}
                                    </h1>
                                </div>
                                <p class="mb-4">{{ __('Bienvenido, administrador. Este panel le permitirá gestionar este proyecto (estudiantes, fechas, datos generales, etc)') }}</p>
                            </div>
                            <div class="col-lg-6 banner-img">
                                <div class="img">
                                    <img src="/assets/images/plataformas/plataforma.png" class="img-fluid w-55"
                                        alt="img8">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 text-capitalize">{{ __('Dashboard') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="w-100 h-100">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="w-100 h-100">
                            <div class="header-title d-flex justify-content-between align-items-center w-100 mb-4">
                                <h5 class="card-title mb-0">{{ __('Generalidades del curso') }}</h4>
                            </div>
                            <div>
                                <table id="general-project-table" class="table" role="grid">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="w-100 h-100">
                            <h5 class="card-title mb-0">{{ __('Candidatos') }}</h4>
                            <div class="header-title d-flex justify-content-end align-items-center w-100 mb-4">
                                <button class="btn btn-warning" style="margin-right: 1rem" onclick="editarCandidatos()">
                                    Editar tabla
                                </button>
                                <button class="btn btn-success" onclick="window.location.href='/exportCandidateExcel/'+ID_PROJECT">
                                    📊 Exportar Excel de Candidatos
                                </button>
                            </div>
                            <div>
                                <table id="students-list-table" class="table" role="grid">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="w-100 h-100">
                            <h5 class="card-title mb-0">{{ __('Curso') }}</h4>
                            <div class="header-title d-flex justify-content-end align-items-center w-100 mb-4">
                                     <button class="btn btn-warning" style="margin-right: 1rem" onclick="editarCurso()">
                                    Editar tabla
                                </button>
                                <button class="btn btn-success" onclick="window.location.href='/exportProjectExcel/'+ID_PROJECT">
                                    📊 Exportar Excel del Curso
                                </button>
                            </div>
                             <div id="messages"></div>
                            <div class="table-container">
                                <table id="course-list-table" class="table" role="grid">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="editarCandidatosModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-users me-2"></i>Tabla de Candidatos</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="sticky-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex gap-2">
                            <button class="btn btn-primary btn-sm" onclick="addNewRow()">
                                <i class="fas fa-plus me-1"></i> Nuevo Candidato
                            </button>
                            <div class="input-group search-box">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                <input type="text" id="searchInput" class="form-control form-control-sm" placeholder="Buscar..." onkeyup="filterTable()">
                            </div>
                        </div>
                        <div>
                            <span class="badge bg-info status-badge" id="rowCount">0 candidatos</span>
                        </div>
                    </div>
                </div>

                <div class="table-container">
                    <table class="table table-bordered table-hover" id="edit-candidate-table">
                        <thead class="table-light">
                            <tr>
                                <th width="40px">#</th>
                                <th width="120px">Empresa</th>
                                <th width="80px">CR</th>
                                <th width="120px">Apellido</th>
                                <th width="120px">Nombre</th>
                                <th width="100px">Segundo Nombre</th>
                                <th width="100px">Fecha Nac.</th>
                                <th width="120px">ID</th>
                                <th width="150px">Email</th>
                                <th width="120px">Contraseña</th>
                                <th width="80px" class="table-row-actions">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Los datos se cargarán aquí dinámicamente -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" onclick="saveCandidateTable()">
                    <i class="fas fa-save me-1"></i> Guardar cambios
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i> Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
<style>
  .modal-fullscreen {
            max-width: 98%;
            margin: 1% auto;
            height: 96vh;
        }
        .modal-content {
            border-radius: 12px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
        }
        .modal-header {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            border-bottom: none;
            border-radius: 12px 12px 0 0;
        }
        .modal-title {
            font-weight: 600;
        }
        .table-container {
            overflow-x: auto;
            max-height: 65vh;
        }
        #edit-candidate-table {
            min-width: 1200px;
            font-size: 0.9rem;
        }
        #edit-candidate-table th {
            background-color: #f8f9fa;
            position: sticky;
            top: 0;
            z-index: 10;
            font-weight: 600;
            color: #495057;
            padding: 12px 8px;
            text-align: center;
            vertical-align: middle;
        }
        #edit-candidate-table td {
            padding: 4px;
            vertical-align: top;
        }
        .table-input {
            border: 1px solid #dee2e6;
            border-radius: 4px;
            width: 100%;
            min-height: 38px;
            padding: 6px 8px;
            font-size: 0.9rem;
            resize: vertical;
            transition: all 0.2s ease;
            box-sizing: border-box;
        }
        .table-input:focus {
            outline: none;
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
            background-color: #f8f9fa;
        }
        .table-input.textarea {
            min-height: 60px;
            line-height: 1.4;
        }
        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: center;
        }
        .btn-action {
            padding: 4px 8px;
            font-size: 0.8rem;
        }
        .spinner-container {
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .sticky-header {
            position: sticky;
            top: 0;
            background: white;
            z-index: 20;
            padding: 15px 0;
            margin-bottom: 10px;
            border-bottom: 1px solid #dee2e6;
        }
        .search-box {
            max-width: 300px;
        }
        .table-row-actions {
            position: sticky;
            right: 0;
            background: white;
            z-index: 5;
            box-shadow: -2px 0 5px rgba(0,0,0,0.1);
        }
        .status-badge {
            font-size: 0.75rem;
            padding: 4px 8px;
            border-radius: 12px;
        }
        @media (max-width: 768px) {
            .modal-fullscreen {
                margin: 0;
                height: 100vh;
                max-width: 100%;
            }
        }
</style>
<script>
    const ID_PROJECT = @json($ID_PROJECT);
</script>

<script>
function editarCandidatos() {
    $('#editarCandidatosModal').modal('show');
    loadTableData();
}

function loadTableData() {
    $.ajax({
        url: '/editarTablaCandidato/' + ID_PROJECT, 
        method: 'GET',
         dataType: 'json',
            beforeSend: function() {
                // Mostrar spinner de carga
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
            success: function(data) {
                const tbody = $('#edit-candidate-table tbody');
                tbody.empty();
                
                if (data && data.length > 0) {
                    data.forEach((row, index) => {
                        let tr = `<tr data-candidate-id="${row.ID_CANDIDATE || ''}" class="candidate-row">`;
                        
                        tr += `<td class="text-center">${index + 1}</td>`;
                        
                        // Empresa - Textarea
                        tr += `<td><textarea class="table-input textarea" name="company" 
                                  placeholder="Nombre de empresa">${row.COMPANY_PROJECT || ''}</textarea></td>`;
                        
                        // CR - Input normal
                        tr += `<td><input class="table-input" value="${row.CR_PROJECT || ''}" name="cr" 
                               placeholder="Código CR" /></td>`;
                        
                        // Apellido - Textarea
                        tr += `<td><textarea class="table-input textarea" name="lastname" 
                                  placeholder="Apellido">${row.LAST_NAME_PROJECT || ''}</textarea></td>`;
                        
                        // Nombre - Textarea
                        tr += `<td><textarea class="table-input textarea" name="firstname" 
                                  placeholder="Nombre">${row.FIRST_NAME_PROJECT || ''}</textarea></td>`;
                        
                        // Segundo Nombre - Textarea
                        tr += `<td><textarea class="table-input textarea" name="mdname" 
                                  placeholder="Segundo nombre">${row.MIDDLE_NAME_PROJECT || ''}</textarea></td>`;
                        
                        // Fecha Nacimiento - Input date
                        tr += `<td><input class="table-input" type="date" 
                               value="${formatDateForInput(row.DOB_PROJECT) || ''}" name="dob" /></td>`;
                        
                        // ID - Textarea
                        tr += `<td><textarea class="table-input textarea" name="id_number" 
                                  placeholder="Número de ID">${row.ID_NUMBER_PROJECT || ''}</textarea></td>`;
                        
                        // Email - Input email
                        tr += `<td><input class="table-input" type="email" 
                               value="${row.EMAIL_PROJECT || ''}" name="email" placeholder="correo@ejemplo.com" /></td>`;
                        
                        // Contraseña - Input password
                        tr += `<td><input class="table-input" type="password" 
                               value="${row.PASSWORD_PROJECT || ''}" name="password" placeholder="Contraseña" /></td>`;
                        
                        // Acciones
                        tr += `<td class="table-row-actions">
                                <div class="action-buttons">
                                    <button class="btn btn-sm btn-danger btn-action" onclick="deleteCandidate(this, ${row.ID_CANDIDATE})"
                                        ${!row.ID_CANDIDATE ? 'disabled' : ''}>
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <button class="btn btn-sm btn-info btn-action" onclick="togglePassword(this)">
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
            error: function(xhr, status, error) {
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
                <td class="text-center">${rowCount + 1}</td>
                <td><textarea class="table-input textarea" name="company" placeholder="Nombre de empresa"></textarea></td>
                <td><input class="table-input" name="cr" placeholder="Código CR" /></td>
                <td><textarea class="table-input textarea" name="lastname" placeholder="Apellido"></textarea></td>
                <td><textarea class="table-input textarea" name="firstname" placeholder="Nombre"></textarea></td>
                <td><textarea class="table-input textarea" name="mdname" placeholder="Segundo nombre"></textarea></td>
                <td><input class="table-input" type="date" name="dob" /></td>
                <td><textarea class="table-input textarea" name="id_number" placeholder="Número de ID"></textarea></td>
                <td><input class="table-input" type="email" name="email" placeholder="correo@ejemplo.com" /></td>
                <td><input class="table-input" type="password" name="password" placeholder="Contraseña" /></td>
                <td class="table-row-actions">
                    <div class="action-buttons">
                        <button class="btn btn-sm btn-danger btn-action" onclick="deleteCandidate(this, null)">
                            <i class="fas fa-trash"></i>
                        </button>
                        <button class="btn btn-sm btn-info btn-action" onclick="togglePassword(this)">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </td>
            </tr>
        `;
        
        tbody.append(newRow);
        updateRowCount(tbody.find('.candidate-row').length);
    }

    function deleteCandidate(button, candidateId) {
        if (candidateId && !confirm('¿Estás seguro de que quieres eliminar este candidato?')) {
            return;
        }
        
        const row = $(button).closest('tr');
        row.addClass('table-danger');
        
        setTimeout(() => {
            row.remove();
            updateRowCount($('#edit-candidate-table tbody .candidate-row').length);
            
            // Si no quedan filas, mostrar mensaje
            if ($('#edit-candidate-table tbody .candidate-row').length === 0) {
                $('#edit-candidate-table tbody').html(`
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
            }
        }, 300);
    }

    function togglePassword(button) {
        const input = $(button).closest('tr').find('input[name="password"]');
        const type = input.attr('type');
        const newType = type === 'password' ? 'text' : 'password';
        input.attr('type', newType);
        $(button).find('i').toggleClass('fa-eye fa-eye-slash');
    }

    function filterTable() {
        const searchText = $('#searchInput').val().toLowerCase();
        $('.candidate-row').each(function() {
            const rowText = $(this).text().toLowerCase();
            $(this).toggle(rowText.includes(searchText));
        });
    }

    function updateRowCount(count) {
        $('#rowCount').text(`${count} candidato${count !== 1 ? 's' : ''}`);
    }

function saveCandidateTable() {
    let tableData = [];
    $('#edit-candidate-table tbody tr').each(function() {
        let row = {};
        $(this).find('td').each(function(index) {
            const value = $(this).find('input').val();
            switch(index){
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
        url: '/saveCandidateTable', // Cambia por tu ruta de guardado en Laravel
        method: 'POST',
        data: { data: tableData, _token: '{{ csrf_token() }}' },
        success: function(response){
            alert('Cambios guardados correctamente');
            $('#editarCandidatosModal').modal('hide');
        }
    });
}
</script>

@endsection
@php
$css_identifier = 'detailsProject';
@endphp