ID_KILLSHEET_EXERCISE = 0

$(document).ready(function () {
    // RESET MODALS
    $('#killsheetModal').on('hidden.bs.modal', function () {
        ID_KILLSHEET_EXERCISE = 0;
        $('#killsheetForm')[0].reset();
        $('#killsheetModal .modal-title').text('New kilsheet');
    });
    // RESET MODALS - END

    var $select = $('#ENTE_KILLSHEET').selectize({
        plugins: ['remove_button'],
        delimiter: ',',
        persist: false,
        maxItems: null,
        create: false,
        onInitialize: function () {
            // Desactiva la escritura del input interno
            this.$control_input.prop('readonly', true);
        }
    });
    var selectizeInstance = $select[0].selectize;
    var $select2 = $('#NIVELES_KILLSHEET').selectize({
        plugins: ['remove_button'],
        delimiter: ',',
        persist: false,
        maxItems: null,
        create: false,
        onInitialize: function () {
            // Desactiva la escritura del input interno
            this.$control_input.prop('readonly', true);
        }
    });
    var selectizeInstance2 = $select2[0].selectize;
    var $select3 = $('#BOP_KILLSHEET').selectize({
        plugins: ['remove_button'],
        delimiter: ',',
        persist: false,
        maxItems: null,
        create: false,
        onInitialize: function () {
            // Desactiva la escritura del input interno
            this.$control_input.prop('readonly', true);
        }
    });
    var selectizeInstance3 = $select3[0].selectize;
    var $select4 = $('#OPERACION_KILLSHEET').selectize({
        plugins: ['remove_button'],
        delimiter: ',',
        persist: false,
        maxItems: null,
        create: false,
        onInitialize: function () {
            // Desactiva la escritura del input interno
            this.$control_input.prop('readonly', true);
        }
    });
});

var killsheetsDatatable = $("#killsheets-list-table").DataTable({
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
        data: {},
        method: 'GET',
        cache: false,
        url: '/killsheetsDatatable',
        beforeSend: function () {
            // mostrarCarga();
        },
        complete: function () {
            killsheetsDatatable.columns.adjust().draw();
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
        { data: 'CERTIFICACIONES_NOMBRES' },
        { data: 'NIVELES_NOMBRES' },
        { data: 'BOPS_NOMBRES' },
        { data: 'BTN_EDITAR' },
        { data: 'BTN_ACTIVO' }
    ],
    columnDefs: [
        { targets: 0, title: '#', className: 'text-center' },
        { targets: 1, title: 'CERTIFICACION', className: 'text-center' },
        { targets: 2, title: 'NIVEL', className: 'text-center' },
        { targets: 3, title: 'BOP', className: 'text-center' },
        { targets: 4, title: 'Editar', className: 'text-center' },
        { targets: 5, title: 'Activo', className: 'text-center' }
    ]

});

document.getElementById("openKillsheet").addEventListener("click", function (e) {
    e.preventDefault();

    // Primer SweetAlert - Botones blancos
    Swal.fire({
        html: `
            <div class="killsheet-modal-content">
                <div class="killsheet-header">
                    <h3 class="killsheet-title">Nueva Hoja de Matar</h3>
                    <p class="killsheet-description">Seleccione la certificación para su nueva hoja:</p>
                </div>
                <div class="killsheet-options">
                    <button class="killsheet-btn killsheet-btn-white" id="IWCF">
                        <div class="killsheet-btn-content">
                            <img src="/assets/images/iwcflogo.png" alt="IWCF Logo" class="killsheet-btn-icon">
                            <span class="killsheet-btn-text">IWCF</span>
                        </div>
                    </button>
                    <button class="killsheet-btn killsheet-btn-white" id="IADC">
                        <div class="killsheet-btn-content">
                            <img src="/assets/images/iadc.png" alt="IADC Logo" class="killsheet-btn-icon">
                            <span class="killsheet-btn-text">IADC</span>
                        </div>
                    </button>
                </div>
            </div>
        `,
        showConfirmButton: false,
        showCloseButton: true,
        width: '500px',
        allowOutsideClick: true,
        allowEscapeKey: true,
        customClass: {
            container: 'killsheet-swal-container',
            popup: 'killsheet-swal-popup killsheet-first-modal'
        },
        didOpen: () => {

            document.getElementById('IWCF').addEventListener('click', function () {
                Swal.fire({
                    html: `
                        <div class="killsheet-modal-content">
                            <div class="killsheet-header">
                            
                                <h3 class="killsheet-title killsheet-title-white">Hoja de Matar IWCF</h3>
                                <p class="killsheet-description killsheet-description-white">Seleccione el tipo de pozo para continuar:</p>
                            </div>
                            <div class="killsheet-options">
                                <button class="killsheet-btn killsheet-btn-blue" id="iwcf_v">
                                    <div class="killsheet-btn-content">
                                        <img src="/assets/images/principal/flecha.png" alt="Vertical" class="killsheet-btn-icon">
                                        <span class="killsheet-btn-text">Pozo Vertical</span>
                                    </div>
                                </button>
                                <button class="killsheet-btn killsheet-btn-blue" id="iwcf_d">
                                    <div class="killsheet-btn-content">
                                        <img src="/assets/images/principal/flecha.png" alt="Desviado" class="killsheet-btn-icon">
                                        <span class="killsheet-btn-text">Pozo Desviado</span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    `,
                    showConfirmButton: false,
                    showCloseButton: true,
                    width: '500px',
                    allowOutsideClick: true,
                    allowEscapeKey: true,
                    customClass: {
                        container: 'killsheet-swal-container',
                        popup: 'killsheet-swal-popup killsheet-second-modal'
                    },
                    didOpen: () => {
                        document.getElementById('iwcf_v').addEventListener('click', function () {
                            Swal.close();
                            var modal = new bootstrap.Modal(document.getElementById('iwcf_v_modal'));
                            modal.show();
                        });

                        document.getElementById('iwcf_d').addEventListener('click', function () {
                            Swal.close();
                            var modal = new bootstrap.Modal(document.getElementById('iwcf_d_modal'));
                            modal.show();
                        });
                    }
                });
            });

            document.getElementById('IADC').addEventListener('click', function () {
                Swal.fire({
                    html: `
                        <div class="killsheet-modal-content">
                            <div class="killsheet-header">
                                <h3 class="killsheet-title killsheet-title-white">Hoja de Matar IADC</h3>
                                <p class="killsheet-description killsheet-description-white">Seleccione el tipo de pozo para continuar:</p>
                            </div>
                            <div class="killsheet-options">
                                <button class="killsheet-btn killsheet-btn-blue" id="iadc_v">
                                    <div class="killsheet-btn-content">
                                        <img src="/assets/images/principal/flecha.png" alt="Vertical" class="killsheet-btn-icon">
                                        <span class="killsheet-btn-text">Pozo Vertical</span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    `,
                    showConfirmButton: false,
                    showCloseButton: true,
                    width: '500px',
                    allowOutsideClick: true,
                    allowEscapeKey: true,
                    customClass: {
                        container: 'killsheet-swal-container',
                        popup: 'killsheet-swal-popup killsheet-second-modal'
                    },
                    didOpen: () => {
                        document.getElementById('iadc_v').addEventListener('click', function () {
                            Swal.close();
                            var modal = new bootstrap.Modal(document.getElementById('iadc_v_modal'));
                            modal.show();
                        });
                    }
                });
            });
        }
    });
});