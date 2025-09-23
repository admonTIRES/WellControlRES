// IWCF – Vertical – Surface – Español
// IWCF – Vertical – Surface – Inglés
// IWCF – Vertical – Surface – Portugués
// IWCF – Vertical – Surface – Árabe
// IWCF – Vertical – Subsea – Español
// IWCF – Vertical – Subsea – Inglés
// IWCF – Vertical – Subsea – Portugués
// IWCF – Vertical – Subsea – Árabe
// IWCF – Desviado – Surface – Español
// IWCF – Desviado – Surface – Inglés
// IWCF – Desviado – Surface – Portugués
// IWCF – Desviado – Surface – Árabe
// IWCF – Desviado – Subsea – Español
// IWCF – Desviado – Subsea – Inglés
// IWCF – Desviado – Subsea – Portugués
// IWCF – Desviado – Subsea – Árabe
// IADC – Vertical – Surface – Español
// IADC – Vertical – Surface – Inglés
// IADC – Vertical – Surface – Portugués
// IADC – Vertical – Surface – Árabe
// IADC – Vertical – Subsea – Español
// IADC – Vertical – Subsea – Inglés
// IADC – Vertical – Subsea – Portugués
// IADC – Vertical – Subsea – Árabe
// IADC – Desviado – Surface – Español
// IADC – Desviado – Surface – Inglés
// IADC – Desviado – Surface – Portugués
// IADC – Desviado – Surface – Árabe
// IADC – Desviado – Subsea – Español
// IADC – Desviado – Subsea – Inglés
// IADC – Desviado – Subsea – Portugués
// IADC – Desviado – Subsea – Árabe
//hola, el numero de linea que ocupa cada uno de los tipoHoja son sus id

ID_KILLSHEET = 0

let tipoHoja = 0;//tipo de hoja de matra segun certificacion, tipopozo, bop e idioma
let currentStep = 1;
let totalSteps = 3;

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
    // var $select3 = $('#BOP_KILLSHEET').selectize({
    //     plugins: ['remove_button'],
    //     delimiter: ',',
    //     persist: false,
    //     maxItems: null,
    //     create: false,
    //     onInitialize: function () {
    //         // Desactiva la escritura del input interno
    //         this.$control_input.prop('readonly', true);
    //     }
    // });
    // var selectizeInstance3 = $select3[0].selectize;
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
                            Swal.fire({
                                html: `
                                    <div class="killsheet-modal-content">
                                        <div class="killsheet-header">
                                            <h3 class="killsheet-title killsheet-title-white">Hoja de Matar IWCF para pozos verticales</h3>
                                            <p class="killsheet-description killsheet-description-white">Seleccione el tipo de BOP para continuar:</p>
                                        </div>
                                        <div class="killsheet-options">
                                            <button class="killsheet-btn killsheet-btn-blue" id="iwcf_v_surface">
                                                <div class="killsheet-btn-content">
                                                    <img src="/assets/images/principal/flecha.png" alt="Surface" class="killsheet-btn-icon">
                                                    <span class="killsheet-btn-text">Surface</span>
                                                </div>
                                            </button>
                                            <button class="killsheet-btn killsheet-btn-blue" id="iwcf_v_subsea">
                                                <div class="killsheet-btn-content">
                                                    <img src="/assets/images/principal/flecha.png" alt="Subsea" class="killsheet-btn-icon">
                                                    <span class="killsheet-btn-text">Subsea</span>
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
                                    document.getElementById('iwcf_v_surface').addEventListener('click', function () {
                                        Swal.fire({
                                            html: `
                                                <div class="killsheet-modal-content">
                                                    <div class="killsheet-header">
                                                        <h3 class="killsheet-title killsheet-title-white">Hoja de Matar IWCF para pozos verticales - Surface</h3>
                                                        <p class="killsheet-description killsheet-description-white">Seleccione el idioma para continuar:</p>
                                                    </div>
                                                    <div class="killsheet-options">
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iwcf_v_surface_en">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="English" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Inglés</span>
                                                            </div>
                                                        </button>
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iwcf_v_surface_es">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="Spanish" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Español</span>
                                                            </div>
                                                        </button>
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iwcf_v_surface_ar">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="Arabic" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Árabe</span>
                                                            </div>
                                                        </button>
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iwcf_v_surface_pt">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="Portuguese" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Portugués</span>
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
                                                document.getElementById('iwcf_v_surface_en').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 1;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IWCF para pozos verticales - surface';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });

                                                document.getElementById('iwcf_v_surface_es').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 1;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IWCF para pozos verticales - surface';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });

                                                 document.getElementById('iwcf_v_surface_ar').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 3;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IWCF para pozos verticales - surface';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });

                                                 document.getElementById('iwcf_v_surface_pt').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 4;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IWCF para pozos verticales - surface';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });
                                            }
                                        });

                                        // Swal.close();
                                        // var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                        // tipoHoja = 1;
                                        // currentStep = 1;
                                        // var titleModal = 'Nueva hoja de matar IWCF para pozos verticales';
                                        // var modalTitle = document.getElementById('modal-killsheet-title');
                                        // modalTitle.textContent = titleModal;
                                        // mostrarFormulario(currentStep);
                                        // modal.show();
                                    });

                                    document.getElementById('iwcf_v_subsea').addEventListener('click', function () {
                                         Swal.fire({
                                            html: `
                                                <div class="killsheet-modal-content">
                                                    <div class="killsheet-header">
                                                        <h3 class="killsheet-title killsheet-title-white">Hoja de Matar IWCF para pozos verticales - Subsea</h3>
                                                        <p class="killsheet-description killsheet-description-white">Seleccione el idioma para continuar:</p>
                                                    </div>
                                                    <div class="killsheet-options">
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iwcf_v_subsea_en">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="English" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Inglés</span>
                                                            </div>
                                                        </button>
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iwcf_v_subsea_es">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="Spanish" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Español</span>
                                                            </div>
                                                        </button>
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iwcf_v_subsea_ar">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="Arabic" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Árabe</span>
                                                            </div>
                                                        </button>
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iwcf_v_subsea_pt">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="Portuguese" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Portugués</span>
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
                                                document.getElementById('iwcf_v_subsea_en').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 5;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IWCF para pozos verticales - subsea';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });

                                                document.getElementById('iwcf_v_subsea_es').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 6;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IWCF para pozos verticales - subsea';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });

                                                 document.getElementById('iwcf_v_subsea_ar').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 7;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IWCF para pozos verticales - subsea';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });

                                                 document.getElementById('iwcf_v_subsea_pt').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 8;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IWCF para pozos verticales - subsea';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });
                                            }
                                        });

                                    });
                                }
                            });
                          
                        });

                        document.getElementById('iwcf_d').addEventListener('click', function () {
                            Swal.fire({
                                html: `
                                    <div class="killsheet-modal-content">
                                        <div class="killsheet-header">
                                            <h3 class="killsheet-title killsheet-title-white">Hoja de Matar IWCF para pozos desviados</h3>
                                            <p class="killsheet-description killsheet-description-white">Seleccione el tipo de BOP para continuar:</p>
                                        </div>
                                        <div class="killsheet-options">
                                            <button class="killsheet-btn killsheet-btn-blue" id="iwcf_d_surface">
                                                <div class="killsheet-btn-content">
                                                    <img src="/assets/images/principal/flecha.png" alt="Surface" class="killsheet-btn-icon">
                                                    <span class="killsheet-btn-text">Surface</span>
                                                </div>
                                            </button>
                                            <button class="killsheet-btn killsheet-btn-blue" id="iwcf_d_subsea">
                                                <div class="killsheet-btn-content">
                                                    <img src="/assets/images/principal/flecha.png" alt="Subsea" class="killsheet-btn-icon">
                                                    <span class="killsheet-btn-text">Subsea</span>
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
                                    document.getElementById('iwcf_d_surface').addEventListener('click', function () {
                                        Swal.fire({
                                            html: `
                                                <div class="killsheet-modal-content">
                                                    <div class="killsheet-header">
                                                        <h3 class="killsheet-title killsheet-title-white">Hoja de Matar IWCF para pozos desviados - Surface</h3>
                                                        <p class="killsheet-description killsheet-description-white">Seleccione el idioma para continuar:</p>
                                                    </div>
                                                    <div class="killsheet-options">
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iwcf_d_surface_en">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="English" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Inglés</span>
                                                            </div>
                                                        </button>
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iwcf_d_surface_es">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="Spanish" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Español</span>
                                                            </div>
                                                        </button>
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iwcf_d_surface_ar">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="Arabic" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Árabe</span>
                                                            </div>
                                                        </button>
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iwcf_d_surface_pt">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="Portuguese" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Portugués</span>
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
                                                document.getElementById('iwcf_d_surface_en').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 9;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IWCF para pozos desviados - surface';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });

                                                document.getElementById('iwcf_d_surface_es').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 10;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IWCF para pozos desviados - surface';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });

                                                 document.getElementById('iwcf_d_surface_ar').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 11;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IWCF para pozos desviados - surface';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });

                                                 document.getElementById('iwcf_d_surface_pt').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 12;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IWCF para pozos desviados - surface';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });
                                            }
                                        });

                                    });

                                    document.getElementById('iwcf_d_subsea').addEventListener('click', function () {
                                         Swal.fire({
                                            html: `
                                                <div class="killsheet-modal-content">
                                                    <div class="killsheet-header">
                                                        <h3 class="killsheet-title killsheet-title-white">Hoja de Matar IWCF para pozos desviados - Subsea</h3>
                                                        <p class="killsheet-description killsheet-description-white">Seleccione el idioma para continuar:</p>
                                                    </div>
                                                    <div class="killsheet-options">
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iwcf_d_subsea_en">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="English" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Inglés</span>
                                                            </div>
                                                        </button>
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iwcf_d_subsea_es">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="Spanish" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Español</span>
                                                            </div>
                                                        </button>
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iwcf_d_subsea_ar">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="Arabic" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Árabe</span>
                                                            </div>
                                                        </button>
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iwcf_d_subsea_pt">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="Portuguese" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Portugués</span>
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
                                                document.getElementById('iwcf_d_subsea_en').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 13;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IWCF para pozos desviados - subsea';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });

                                                document.getElementById('iwcf_d_subsea_es').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 14;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IWCF para pozos desviados - subsea';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });

                                                 document.getElementById('iwcf_d_subsea_ar').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 15;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IWCF para pozos desviados - subsea';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });

                                                 document.getElementById('iwcf_d_subsea_pt').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 16;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IWCF para pozos desviados - subsea';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });
                                            }
                                        });

                                    });
                                }
                            });
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
                                <button class="killsheet-btn killsheet-btn-blue" id="iadc_d">
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
                        document.getElementById('iadc_v').addEventListener('click', function () {
                            Swal.fire({
                                html: `
                                    <div class="killsheet-modal-content">
                                        <div class="killsheet-header">
                                            <h3 class="killsheet-title killsheet-title-white">Hoja de Matar IADC para pozos verticales</h3>
                                            <p class="killsheet-description killsheet-description-white">Seleccione el tipo de BOP para continuar:</p>
                                        </div>
                                        <div class="killsheet-options">
                                            <button class="killsheet-btn killsheet-btn-blue" id="iadc_v_surface">
                                                <div class="killsheet-btn-content">
                                                    <img src="/assets/images/principal/flecha.png" alt="Surface" class="killsheet-btn-icon">
                                                    <span class="killsheet-btn-text">Surface</span>
                                                </div>
                                            </button>
                                            <button class="killsheet-btn killsheet-btn-blue" id="iadc_v_subsea">
                                                <div class="killsheet-btn-content">
                                                    <img src="/assets/images/principal/flecha.png" alt="Subsea" class="killsheet-btn-icon">
                                                    <span class="killsheet-btn-text">Subsea</span>
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
                                    document.getElementById('iadc_v_surface').addEventListener('click', function () {
                                        Swal.fire({
                                            html: `
                                                <div class="killsheet-modal-content">
                                                    <div class="killsheet-header">
                                                        <h3 class="killsheet-title killsheet-title-white">Hoja de Matar IADC para pozos verticales - Surface</h3>
                                                        <p class="killsheet-description killsheet-description-white">Seleccione el idioma para continuar:</p>
                                                    </div>
                                                    <div class="killsheet-options">
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iadc_v_surface_en">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="English" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Inglés</span>
                                                            </div>
                                                        </button>
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iadc_v_surface_es">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="Spanish" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Español</span>
                                                            </div>
                                                        </button>
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iadc_v_surface_ar">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="Arabic" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Árabe</span>
                                                            </div>
                                                        </button>
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iadc_v_surface_pt">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="Portuguese" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Portugués</span>
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
                                                document.getElementById('iadc_v_surface_en').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 17;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IADC para pozos verticales - surface';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });

                                                document.getElementById('iadc_v_surface_es').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 18;
                                                    currentStep = 2;
                                                    var titleModal = 'Nueva hoja de matar IADC para pozos verticales - surface';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });

                                                 document.getElementById('iadc_v_surface_ar').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 19;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IADC para pozos verticales - surface';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });

                                                 document.getElementById('iadc_v_surface_pt').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 20;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IADC para pozos verticales - surface';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });
                                            }
                                        });

                                        // Swal.close();
                                        // var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                        // tipoHoja = 1;
                                        // currentStep = 1;
                                        // var titleModal = 'Nueva hoja de matar IWCF para pozos verticales';
                                        // var modalTitle = document.getElementById('modal-killsheet-title');
                                        // modalTitle.textContent = titleModal;
                                        // mostrarFormulario(currentStep);
                                        // modal.show();
                                    });

                                    document.getElementById('iadc_v_subsea').addEventListener('click', function () {
                                         Swal.fire({
                                            html: `
                                                <div class="killsheet-modal-content">
                                                    <div class="killsheet-header">
                                                        <h3 class="killsheet-title killsheet-title-white">Hoja de Matar IADC para pozos verticales - Subsea</h3>
                                                        <p class="killsheet-description killsheet-description-white">Seleccione el idioma para continuar:</p>
                                                    </div>
                                                    <div class="killsheet-options">
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iadc_v_subsea_en">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="English" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Inglés</span>
                                                            </div>
                                                        </button>
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iadc_v_subsea_es">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="Spanish" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Español</span>
                                                            </div>
                                                        </button>
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iadc_v_subsea_ar">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="Arabic" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Árabe</span>
                                                            </div>
                                                        </button>
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iadc_v_subsea_pt">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="Portuguese" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Portugués</span>
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
                                                document.getElementById('iadc_v_subsea_en').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 21;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IADC para pozos verticales - subsea';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });

                                                document.getElementById('iadc_v_subsea_es').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 22;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IADC para pozos verticales - subsea';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });

                                                 document.getElementById('iadc_v_subsea_ar').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 23;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IADC para pozos verticales - subsea';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });

                                                 document.getElementById('iadc_v_subsea_pt').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 24;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IADC para pozos verticales - subsea';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });
                                            }
                                        });

                                    });
                                }
                            });
                          
                        });

                        document.getElementById('iadc_d').addEventListener('click', function () {
                            Swal.fire({
                                html: `
                                    <div class="killsheet-modal-content">
                                        <div class="killsheet-header">
                                            <h3 class="killsheet-title killsheet-title-white">Hoja de Matar IADC para pozos desviados</h3>
                                            <p class="killsheet-description killsheet-description-white">Seleccione el tipo de BOP para continuar:</p>
                                        </div>
                                        <div class="killsheet-options">
                                            <button class="killsheet-btn killsheet-btn-blue" id="iadc_d_surface">
                                                <div class="killsheet-btn-content">
                                                    <img src="/assets/images/principal/flecha.png" alt="Surface" class="killsheet-btn-icon">
                                                    <span class="killsheet-btn-text">Surface</span>
                                                </div>
                                            </button>
                                            <button class="killsheet-btn killsheet-btn-blue" id="iadc_d_subsea">
                                                <div class="killsheet-btn-content">
                                                    <img src="/assets/images/principal/flecha.png" alt="Subsea" class="killsheet-btn-icon">
                                                    <span class="killsheet-btn-text">Subsea</span>
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
                                    document.getElementById('iadc_d_surface').addEventListener('click', function () {
                                        Swal.fire({
                                            html: `
                                                <div class="killsheet-modal-content">
                                                    <div class="killsheet-header">
                                                        <h3 class="killsheet-title killsheet-title-white">Hoja de Matar IADC para pozos desviados - Surface</h3>
                                                        <p class="killsheet-description killsheet-description-white">Seleccione el idioma para continuar:</p>
                                                    </div>
                                                    <div class="killsheet-options">
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iadc_d_surface_en">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="English" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Inglés</span>
                                                            </div>
                                                        </button>
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iadc_d_surface_es">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="Spanish" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Español</span>
                                                            </div>
                                                        </button>
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iadc_d_surface_ar">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="Arabic" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Árabe</span>
                                                            </div>
                                                        </button>
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iadc_d_surface_pt">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="Portuguese" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Portugués</span>
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
                                                document.getElementById('iadc_d_surface_en').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 25;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IADC para pozos desviados - surface';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });

                                                document.getElementById('iadc_d_surface_es').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 26;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IADC para pozos desviados - surface';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });

                                                 document.getElementById('iadc_d_surface_ar').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 27;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IADC para pozos desviados - surface';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });

                                                 document.getElementById('iadc_d_surface_pt').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 28;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IADC para pozos desviados - surface';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });
                                            }
                                        });

                                    });

                                    document.getElementById('iadc_d_subsea').addEventListener('click', function () {
                                         Swal.fire({
                                            html: `
                                                <div class="killsheet-modal-content">
                                                    <div class="killsheet-header">
                                                        <h3 class="killsheet-title killsheet-title-white">Hoja de Matar IADC para pozos desviados - Subsea</h3>
                                                        <p class="killsheet-description killsheet-description-white">Seleccione el idioma para continuar:</p>
                                                    </div>
                                                    <div class="killsheet-options">
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iadc_d_subsea_en">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="English" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Inglés</span>
                                                            </div>
                                                        </button>
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iadc_d_subsea_es">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="Spanish" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Español</span>
                                                            </div>
                                                        </button>
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iadc_d_subsea_ar">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="Arabic" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Árabe</span>
                                                            </div>
                                                        </button>
                                                        <button class="killsheet-btn killsheet-btn-blue" id="iadc_d_subsea_pt">
                                                            <div class="killsheet-btn-content">
                                                                <img src="/assets/images/principal/flecha.png" alt="Portuguese" class="killsheet-btn-icon">
                                                                <span class="killsheet-btn-text">Portugués</span>
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
                                                document.getElementById('iadc_d_subsea_en').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 29;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IADC para pozos desviados - subsea';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });

                                                document.getElementById('iadc_d_subsea_es').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 30;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IADC para pozos desviados - subsea';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });

                                                 document.getElementById('iadc_d_subsea_ar').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 31;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IADC para pozos desviados - subsea';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });

                                                 document.getElementById('iadc_d_subsea_pt').addEventListener('click', function () {
                                                    Swal.close();
                                                    var modal = new bootstrap.Modal(document.getElementById('killsheet_modal'));
                                                    tipoHoja = 32;
                                                    currentStep = 1;
                                                    var titleModal = 'Nueva hoja de matar IADC para pozos desviados - subsea';
                                                    var modalTitle = document.getElementById('modal-killsheet-title');
                                                    modalTitle.textContent = titleModal;
                                                    mostrarFormulario(currentStep);
                                                    modal.show();
                                                });
                                            }
                                        });

                                    });
                                }
                            });
                        });
                    }
                });
            });
            
        }
    });
});

//IWCF V


function removeItem(button) {
    const item = button.closest('.item-row');
    if (item) {
        // Animación de salida
        item.style.transition = 'all 0.3s ease';
        item.style.opacity = '0';
        item.style.transform = 'translateX(30px)';

        setTimeout(() => {
            item.remove();
        }, 300);
    }
}



function mostrarFormulario(step) {
    $(".wizard-step").addClass("d-none"); // Oculta todos los formularios

    if (step === 2) {
        console.log("entro a step " + step + "con valor de tipo de hoja en " + tipoHoja );
        // Mostrar solo el formulario 2 del tipo seleccionado
        $(`#killsheet-${tipoHoja}`).removeClass("d-none");
    } else {
        $(`#killsheet-data-${step}`).removeClass("d-none");
    }
    $("#btnAnterior").prop("disabled", step === 1);
    if (step === totalSteps) {
        $("#btnSiguiente").addClass("d-none");
        $("#btnGuardar").removeClass("d-none");
    } else {
        $("#btnSiguiente").removeClass("d-none");
        $("#btnGuardar").addClass("d-none");
    }
}

$(document).ready(function () {


    $(".next-step").click(function () {
        let step = $(this).data("step");

        // if (step === 1) {
        let currentForm = currentStep === 2 ? $(`#killsheet-${tipoHoja}`) : $(`#killsheet-${currentStep}`);
        if (validarFormulario(currentForm)) {
            currentStep++;
            mostrarFormulario(currentStep);
        } else {
            alertToast("Complete todos los campos obligatorios.", "error", 2000);
        }
        // currentStep = 2;
        // showStep(currentStep);

        // }

        // if (step === 2) {


        // currentStep = 3;
        // showStep(currentStep);

        // }
    });

    // Botón atrás
    $(".prev-step").click(function () {
        // currentStep = $(this).data("step") - 1;
        // showStep(currentStep);

        if (currentStep > 1) {
            currentStep--;
            mostrarFormulario(currentStep);
        }
    });

    // Botón siguiente
    $("#btnSiguiente").click(function () {
        let currentForm = currentStep === 2 ? $(`#killsheet-${tipoHoja}`) : $(`#killsheet-${currentStep}`);
        if (validarFormulario(currentForm)) {
            currentStep++;
            mostrarFormulario(currentStep);
        } else {
            alertToast("Complete todos los campos obligatorios.", "error", 2000);
        }
    });

    // Botón anterior
    $("#btnAnterior").click(function () {
        if (currentStep > 1) {
            currentStep--;
            mostrarFormulario(currentStep);
        }
    });




});

// Paso 1 -> killsheet
$("#saveStep1Btn").click(function (e) {
    e.preventDefault();
    let formularioValido = validarFormulario($('#formStep1'))
    if (formularioValido) {
        let ID_KILLSHEET = $("#ID_KILLSHEET").val() || 0;

        if (ID_KILLSHEET == 0) {
            // Insertar
            alertMensajeConfirm({
                title: "¿Desea guardar esta Hoja de Matar?",
                text: "Se guardará la información inicial del pozo",
                icon: "question",
            }, async function () {
                await loaderbtn('saveStep1Btn')
                await ajaxAwaitFormData({ api: 1, ID_KILLSHEET }, 'killsheetSave', 'formStep1', 'saveStep1Btn', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    ID_KILLSHEET = data.killsheet.ID_KILLSHEET
                    $("#ID_KILLSHEET").val(ID_KILLSHEET) // guardar en hidden
                    alertMensaje('success', 'Información guardada correctamente', 'Paso 1 completado')
                    showStep(2) // avanzar al paso 2
                })
            }, 1)
        } else {
            // Update
            alertMensajeConfirm({
                title: "¿Desea editar la información de este paso?",
                text: "Se actualizarán los datos de la Hoja de Matar",
                icon: "question",
            }, async function () {
                await loaderbtn('saveStep1Btn')
                await ajaxAwaitFormData({ api: 1, ID_KILLSHEET }, 'killsheetSave', 'formStep1', 'saveStep1Btn', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos actualizando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    setTimeout(() => {
                        ID_KILLSHEET = data.killsheet.ID_KILLSHEET
                        $("#ID_KILLSHEET").val(ID_KILLSHEET)
                        alertMensaje('success', 'Información editada correctamente', 'Paso 1 actualizado')
                        showStep(2)
                    }, 300)
                })
            }, 1)
        }
    } else {
        alertToast('Por favor, complete todos los campos obligatorios.', 'error', 2000)
    }
})


// Paso 2 -> killsheet_IADC_v
$("#saveStep2Btn").click(function (e) {
    e.preventDefault();
    let formularioValido = validarFormulario($('#formStep2'))
    let ID_KILLSHEET = $("#ID_KILLSHEET").val()

    if (formularioValido) {
        alertMensajeConfirm({
            title: "¿Desea guardar los datos técnicos?",
            text: "Se registrarán las capacidades e información IADC",
            icon: "question",
        }, async function () {
            await loaderbtn('saveStep2Btn')
            await ajaxAwaitFormData({ api: 1, ID_KILLSHEET }, 'killsheetIadcSave', 'formStep2', 'saveStep2Btn', { callbackAfter: true, callbackBefore: true }, () => {
                Swal.fire({
                    icon: 'info',
                    title: 'Espere un momento',
                    text: 'Estamos guardando la información',
                    showConfirmButton: false
                })
                $('.swal2-popup').addClass('ld ld-breath')
            }, function () {
                alertMensaje('success', 'Información guardada correctamente', 'Paso 2 completado')
                showStep(3)
            })
        }, 1)
    } else {
        alertToast('Por favor, complete todos los campos obligatorios.', 'error', 2000)
    }
})


// Paso 3 -> killsheet_questions
$("#saveStep3Btn").click(function (e) {
    e.preventDefault();
    let formularioValido = validarFormulario($('#formStep3'))
    let ID_KILLSHEET = $("#ID_KILLSHEET").val()

    if (formularioValido) {
        alertMensajeConfirm({
            title: "¿Desea guardar las preguntas?",
            text: "Se registrarán todas las preguntas y respuestas",
            icon: "question",
        }, async function () {
            await loaderbtn('saveStep3Btn')
            await ajaxAwaitFormData({ api: 1, ID_KILLSHEET }, 'killsheetQuestionsSave', 'formStep3', 'saveStep3Btn', { callbackAfter: true, callbackBefore: true }, () => {
                Swal.fire({
                    icon: 'info',
                    title: 'Espere un momento',
                    text: 'Estamos guardando la información',
                    showConfirmButton: false
                })
                $('.swal2-popup').addClass('ld ld-breath')
            }, function () {
                alertMensaje('success', 'Hoja de Matar completa', 'Todos los pasos han sido guardados')
                $('#killsheetModal').modal('hide')
                document.getElementById('formStep1').reset()
                document.getElementById('formStep2').reset()
                document.getElementById('formStep3').reset()
                // Aquí podrías recargar un datatable de killsheets si lo tienes
                // killsheetDatatable.ajax.reload()
            })
        }, 1)
    } else {
        alertToast('Por favor, complete todos los campos obligatorios.', 'error', 2000)
    }
})

//IWCF VERTICAL
