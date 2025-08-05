ID_PROJECT = 0

let tagify = null;
let empresas = null;

let tagifyChangeHandler = null;
let isEditing = false;

$(document).ready(function () {
    var $select3 = $('#BOP_TYPES_PROJECT').selectize({
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
     var $select4 = $('#ACCREDITATION_LEVELS_PROJECT').selectize({
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
    var selectizeInstance4 = $select4[0].selectize;
});




document.addEventListener('DOMContentLoaded', function () {
    window.wizard = new WizardManager();
    const input = document.querySelector('#COMPANIES');
    tagify = new Tagify(input, {
        duplicates: false,
        maxTags: 20,
        placeholder: "Escribe el nombre de la empresa y presiona ENTER"
    });
    
    let isEditing = false;

    $('button[data-bs-target="#proyectoModal"]').on('click', function () {
        isEditing = false;
        tagify.removeAllTags(); // Limpiar por si acaso

        if (tagifyChangeHandler) {
            tagify.off('change', tagifyChangeHandler); // Eliminar si ya había uno
        }

        tagifyChangeHandler = function(e) {
            if (!isEditing && window.wizard) {
                let empresasArray;
                try {
                    if (typeof e.detail.value === 'string') {
                        empresasArray = JSON.parse(e.detail.value);
                    } else if (Array.isArray(e.detail.value)) {
                        empresasArray = e.detail.value;
                    } else {
                        empresasArray = tagify.value;
                    }

                    window.wizard.empresas = Array.isArray(empresasArray)
                        ? empresasArray.map(item => typeof item === 'string' ? item : item.value)
                        : [empresasArray.value || empresasArray];
                } catch (error) {
                    window.wizard.empresas = tagify.value.map(item =>
                        typeof item === 'string' ? item : item.value
                    );
                }

                console.log('Empresas actualizadas:', window.wizard.empresas);
            }
        };

        tagify.on('change', tagifyChangeHandler);
    });
});

class WizardManager {
    constructor() {
        this.currentStep = 1;
        this.totalSteps = 5;
        this.formData = {};
        this.students = [];
        this.empresas = [];
        this.init();
    }

    init() {
        this.bindEvents();
        this.updateProgressBar();
    }

    bindEvents() {
        // Next step buttons
        document.querySelectorAll('.next-step').forEach(btn => {
            btn.addEventListener('click', () => this.nextStep());
        });

        // Previous step buttons
        document.querySelectorAll('.prev-step').forEach(btn => {
            btn.addEventListener('click', () => this.prevStep());
        });

        // Navigation clicks
        document.querySelectorAll('.wizard-nav li').forEach(nav => {
            nav.addEventListener('click', (e) => {
                const step = parseInt(e.currentTarget.dataset.step);
                if (step < this.currentStep) {
                    this.goToStep(step);
                }
            });
        });


        // Generate students button
        // document.getElementById('generateStudents').addEventListener('click', () => {
        //     this.generateStudents();
        // });

        // Export passwords button
        // document.getElementById('exportPasswords').addEventListener('click', () => {
        //     this.exportPasswords();
        // });

        // Regenerate all passwords button
        // document.getElementById('regenerateAllPasswords').addEventListener('click', () => {
        //     this.regenerateAllPasswords();
        // });

        // Modal reset on close
        // document.getElementById('proyectoModal').addEventListener('hidden.bs.modal', () => {
        //     this.resetWizard();
        // });
    }

    nextStep() {
        if (this.validateCurrentStep()) {
            this.saveStepData();
            if (this.currentStep < this.totalSteps) {
                this.currentStep++;
                this.updateWizard();
            }
        }
    }

    prevStep() {
        if (this.currentStep > 1) {
            this.currentStep--;
            this.updateWizard();
        }
    }

    goToStep(step) {
        this.currentStep = step;
        this.updateWizard();
    }

    validateCurrentStep() {
        const currentStepElement = document.querySelector(`[data-step="${this.currentStep}"].wizard-step`);
        const requiredInputs = currentStepElement.querySelectorAll('input[required], select[required]');
        let isValid = true;

        requiredInputs.forEach(input => {
            this.clearError(input);

            if (!input.value.trim()) {
                this.showError(input, 'Este campo es requerido');
                isValid = false;
            } else if (input.type === 'email' && !this.isValidEmail(input.value)) {
                this.showError(input, 'Por favor, ingresa un email válido');
                isValid = false;
            } else if (input.name === 'pwd' && input.value.length < 6) {
                this.showError(input, 'La contraseña debe tener al menos 6 caracteres');
                isValid = false;
            } else if (input.name === 'cpwd') {
                const password = currentStepElement.querySelector('input[name="pwd"]').value;
                if (input.value !== password) {
                    this.showError(input, 'Las contraseñas no coinciden');
                    isValid = false;
                }
            } else if (input.name === 'studentCount') {
                const count = parseInt(input.value);
                if (count < 1 || count > 50) {
                    this.showError(input, 'La cantidad debe estar entre 1 y 50');
                    isValid = false;
                }
            }
        });
        return isValid;
    }

    saveStepData() {
        const currentStepElement = document.querySelector(`[data-step="${this.currentStep}"].wizard-step`);
        const inputs = currentStepElement.querySelectorAll('input, select');

        inputs.forEach(input => {
            if (input.type === 'file') {
                this.formData[input.name] = input.files[0] || null;
            } else {
                this.formData[input.name] = input.value;
            }
        });

        // Save students data if on step 2
        if (this.currentStep === 2 && this.students.length > 0) {
            this.formData.students = this.students.map((student, index) => {
                const row = document.querySelector(`#student-${index}`);
                if (row) {
                    return {
                        id: index + 1,
                        empresa: row.querySelector('input[name="empresa"]').value,
                        fullName: row.querySelector('input[name="fullName"]').value,
                        cargo: row.querySelector('input[name="cargo"]').value,
                        email: row.querySelector('input[name="email"]').value,
                        password: row.querySelector('input[name="password"]').value
                    };
                }
                return student;
            });
        }
    }

    updateWizard() {
        // Update steps visibility
        document.querySelectorAll('.wizard-step').forEach(step => {
            step.classList.remove('active');
        });
        document.querySelector(`[data-step="${this.currentStep}"].wizard-step`).classList.add('active');

        // Update navigation
        document.querySelectorAll('.wizard-nav li').forEach((nav, index) => {
            nav.classList.remove('active', 'completed');
            if (index + 1 === this.currentStep) {
                nav.classList.add('active');
            } else if (index + 1 < this.currentStep) {
                nav.classList.add('completed');
            }
        });

        // Update progress bar
        this.updateProgressBar();


        if (this.currentStep === 4) {
            this.renderEmpresasSections();
        }

         const saveBtn = document.getElementById('saveProject');
        if (this.currentStep === this.totalSteps) {
            saveBtn.style.display = 'inline-block';
        } else {
            saveBtn.style.display = 'none';
        }
    }

    updateProgressBar() {
        const progress = (this.currentStep / this.totalSteps) * 100;
        document.getElementById('progressBar').style.width = `${progress}%`;
    }

    showError(input, message) {
        input.classList.add('is-invalid');
        const errorDiv = input.parentNode.querySelector('.error-message');
        errorDiv.textContent = message;
        errorDiv.style.display = 'block';
    }

    clearError(input) {
        input.classList.remove('is-invalid');
        const errorDiv = input.parentNode.querySelector('.error-message');
        if (errorDiv) {
            errorDiv.style.display = 'none';
        }
    }

    isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    previewImage(input, containerId) {
        const container = document.getElementById(containerId);

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                container.innerHTML = `
                            <img src="${e.target.result}" alt="Preview" 
                                 style="max-width: 150px; max-height: 150px; border-radius: 8px; border: 2px solid #dee2e6;">
                        `;
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            container.innerHTML = '';
        }
    }

    resetWizard() {
        this.currentStep = 1;
        this.formData = {};
        this.students = [];

        // Reset form
        document.getElementById('wizardForm').reset();

        // Clear previews
        document.getElementById('photoPreview').innerHTML = '';
        document.getElementById('signaturePreview').innerHTML = '';

        // Hide students container
        document.getElementById('studentsContainer').style.display = 'none';
        document.getElementById('studentsTableBody').innerHTML = '';

        // Clear errors
        document.querySelectorAll('.form-control, .form-select').forEach(input => {
            this.clearError(input);
        });

        this.updateWizard();
    }


    
    // renderEmpresasSections() {
    //     const container = document.getElementById('empresasContainer');
    //     container.innerHTML = '';
        
    //     if (!this.empresas || this.empresas.length === 0) {
    //         container.innerHTML = '<div class="alert alert-warning">No se han agregado empresas</div>';
    //         return;
    //     }

    //     this.empresas.forEach(empresa => {
    //         const empresaId = empresa.replace(/\s+/g, '-').toLowerCase();
            
    //         const section = document.createElement('div');
    //         section.className = 'empresa-section mb-4 p-3 border rounded';
    //         section.id = `empresa-${empresaId}`;
    //         section.dataset.empresa = empresa;
            
    //         section.innerHTML = `
    //             <div class="row mb-3">
    //                 <div class="col-md-3">
    //                     <label class="form-label">Nombre de la empresa: *</label>
    //                     <input type="text" class="form-control empresa-name" 
    //                            name="empresa_${empresaId}" value="${empresa}" readonly />
    //                 </div>
    //                  <div class="col-md-3">
    //                     <div class="form-group mb-3">
    //                         <label class="form-label">Correo de contacto de la empresa: *
    //                         </label>
    //                         <input type="email" class="form-control"  name="email_${empresaId}"
    //                             placeholder="Correo electrónico" />
    //                         <div class="error-message">El correo es requerido </div>
    //                     </div>
    //                 </div>
    //                 <div class="col-md-3">
    //                     <label class="form-label">Cantidad de estudiantes: *</label>
    //                     <input type="number" class="form-control student-count" 
    //                            name="studentCount_${empresaId}"
    //                            placeholder="Número de estudiantes" min="1" max="50" required />
    //                     <div class="error-message">Ingresa una cantidad válida (1-50)</div>
    //                 </div>
    //                 <div class="col-md-3 mt-3 d-flex align-items-center">
    //                     <button type="button" class="btn btn-info action-button generate-students"
    //                             data-empresa="${empresaId}">
    //                         <i class="ri-user-add-line me-2"></i>Generar Estudiantes
    //                     </button>
    //                 </div>
    //             </div>
    //             <div class="students-container" id="studentsContainer_${empresaId}" style="display: none;">
    //                 <hr class="mb-4">
    //                 <h5 class="mb-3">Lista de Estudiantes - ${empresa}</h5>
    //                 <div class="table-responsive" style="overflow-x: auto; max-width: 100%;">
    //                     <table class="table table-striped table-hover" style="min-width: 800px;">
    //                         <thead class="table-dark">
    //                             <tr>
    //                                 <th>#</th>
    //                                 <th>Empresa</th>
    //                                 <th>CR</th>
    //                                 <th>Family or last name</th>
    //                                 <th>First name</th>
    //                                 <th>Middle name</th>
    //                                 <th>Fecha de nacimiento</th>
    //                                 <th>ID</th>
    //                                 <th>Cargo</th>
    //                                 <th>Membresia</th>
    //                                 <th>Correo Electrónico</th>
    //                                 <th>Contraseña Generada</th>
    //                                 <th>Acciones</th>
    //                             </tr>
    //                         </thead>
    //                         <tbody id="studentsTableBody_${empresaId}"></tbody>
    //                     </table>
    //                 </div>
    //                 <div class="mt-3">
    //                     <button type="button" class="btn btn-success btn-sm export-passwords"
    //                             data-empresa="${empresaId}">
    //                         <i class="ri-download-line me-2"></i>Exportar Contraseñas
    //                     </button>
    //                     <button type="button" class="btn btn-warning btn-sm ms-2 regenerate-passwords"
    //                             data-empresa="${empresaId}">
    //                         <i class="ri-refresh-line me-2"></i>Regenerar Todas las Contraseñas
    //                     </button>
    //                     <button type="button" class="btn btn-info btn-sm ms-2 send-mails"
    //                             data-empresa="${empresaId}">
    //                         <i class="ri-mail-send-fill me-2"></i>Enviar correos con accesos
    //                     </button>
    //                 </div>
    //             </div>
    //         `;
            
    //         container.appendChild(section);
            
    //         section.querySelector(`.generate-students`).addEventListener('click', () => {
    //             this.generateStudentsForEmpresa(empresaId);
    //         });
            
    //         section.querySelector(`.export-passwords`).addEventListener('click', () => {
    //             this.exportPasswordsForEmpresa(empresaId);
    //         });
            
    //         section.querySelector(`.regenerate-passwords`).addEventListener('click', () => {
    //             this.regenerateAllPasswordsForEmpresa(empresaId);
    //         });
            
    //         section.querySelector(`.send-mails`).addEventListener('click', () => {
    //             this.sendMailsForEmpresa(empresaId);
    //         });
    //     });
    // }
  



   renderEmpresasSections() {
        const container = document.getElementById('empresasContainer');
        container.innerHTML = '';

        if (!this.empresas || this.empresas.length === 0) {
            container.innerHTML = '<div class="alert alert-warning">No se han agregado empresas</div>';
            return;
        }

        // Determinar si estamos en modo edición (datos completos) o creación (solo nombres)
        const isEditMode = typeof this.empresas[0] === 'object' && this.empresas[0].NAME_PROJECT !== undefined;

        this.empresas.forEach((empresa, index) => {
            // Obtener datos según el modo
            const empresaName = isEditMode ? empresa.NAME_PROJECT : empresa;
            const empresaEmail = isEditMode ? empresa.EMAIL_PROJECT : '';
            const studentCount = isEditMode ? (empresa.STUDENTS_PROJECT ? empresa.STUDENTS_PROJECT.length : 0) : '';
            const students = isEditMode ? (empresa.STUDENTS_PROJECT || []) : [];

            const empresaId = empresaName.replace(/\s+/g, '-').toLowerCase() + '-' + index;

            const section = document.createElement('div');
            section.className = 'empresa-section mb-4 p-3 border rounded';
            section.id = `empresa-${empresaId}`;
            section.dataset.empresa = empresaName;

            section.innerHTML = `
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Nombre de la empresa: *</label>
                        <input type="text" class="form-control empresa-name" 
                            name="empresa_${empresaId}" value="${empresaName}" readonly />
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-3">
                            <label class="form-label">Correo de contacto de la empresa: *
                            </label>
                            <input type="email" class="form-control"  name="email_${empresaId}"
                                placeholder="Correo electrónico" value="${empresaEmail || ''}" />
                            <div class="error-message">El correo es requerido </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Cantidad de estudiantes: *</label>
                        <input type="number" class="form-control student-count" 
                            name="studentCount_${empresaId}"
                            placeholder="Número de estudiantes" min="1" max="50" 
                            value="${studentCount || ''}" ${students.length > 0 ? 'readonly' : ''} />
                        <div class="error-message">Ingresa una cantidad válida (1-50)</div>
                    </div>
                    <div class="col-md-3 mt-3 d-flex align-items-center">
                        <button type="button" class="btn btn-info action-button generate-students"
                                data-empresa="${empresaId}">
                            <i class="ri-user-add-line me-2"></i>Generar Estudiantes
                        </button>
                    </div>
                </div>
                <div class="students-container" id="studentsContainer_${empresaId}" style="display: ${students.length > 0 ? 'block' : 'none'};">
                    <hr class="mb-4">
                    <h5 class="mb-3">Lista de Estudiantes - ${empresaName}</h5>
                    <div class="table-responsive" style="overflow-x: auto; max-width: 100%;">
                        <table class="table table-striped table-hover" style="min-width: 800px;">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Empresa</th>
                                    <th>CR</th>
                                    <th>Family or last name</th>
                                    <th>First name</th>
                                    <th>Middle name</th>
                                    <th>Fecha de nacimiento</th>
                                    <th>ID</th>
                                    <th>Cargo</th>
                                    <th>Membresia</th>
                                    <th>Correo Electrónico</th>
                                    <th>Contraseña Generada</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="studentsTableBody_${empresaId}"></tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        <button type="button" class="btn btn-success btn-sm export-passwords"
                                data-empresa="${empresaId}">
                            <i class="ri-download-line me-2"></i>Exportar Contraseñas
                        </button>
                        <button type="button" class="btn btn-warning btn-sm ms-2 regenerate-passwords"
                                data-empresa="${empresaId}">
                            <i class="ri-refresh-line me-2"></i>Regenerar Todas las Contraseñas
                        </button>
                        <button type="button" class="btn btn-info btn-sm ms-2 send-mails"
                                data-empresa="${empresaId}">
                            <i class="ri-mail-send-fill me-2"></i>Enviar correos con accesos
                        </button>
                    </div>
                </div>
            `;
            
            container.appendChild(section);
            
            // Eventos
            section.querySelector(`.generate-students`).addEventListener('click', () => {
                this.generateStudentsForEmpresa(empresaId);
            });
            
            section.querySelector(`.export-passwords`).addEventListener('click', () => {
                this.exportPasswordsForEmpresa(empresaId);
            });
            
            section.querySelector(`.regenerate-passwords`).addEventListener('click', () => {
                this.regenerateAllPasswordsForEmpresa(empresaId);
            });
            
            section.querySelector(`.send-mails`).addEventListener('click', () => {
                this.sendMailsForEmpresa(empresaId);
            });

            // Si hay estudiantes, cargarlos
            if (students.length > 0) {
                if (!this.students[empresaId]) {
                    this.students[empresaId] = [];
                }

                this.students[empresaId] = students.map((student, index) => ({
                    id: index + 1,
                    empresa: empresaName,
                    cr: student.CR_PROJECT || '',
                    lastName: student.LAST_NAME_PROJECT || '',
                    firstName: student.FIRST_NAME_PROJECT || '',
                    mdName: student.MIDDLE_NAME_PROJECT || '',
                    dob: student.BIRTH_DATE_PROJECT || '',
                    idExp: student.ID_NUMBER_PROJECT || '',
                    cargo: student.POSITION_PROJECT || '',
                    membresia: student.MEMBERSHIP_PROJECT || '',
                    email: student.EMAIL_PROJECT || '',
                    password: student.PASSWORD_PROJECT || this.generateRandomPassword(),
                    USER_ID_PROJECT: student.USER_ID_PROJECT || null
                }));

                this.renderStudentsTableForEmpresa(empresaId);
            }
        });
    }
    
    generateStudentsForEmpresa(empresaId) {
    
        const empresaSection = document.getElementById(`empresa-${empresaId}`);
        const countInput = empresaSection.querySelector('.student-count');
        const count = parseInt(countInput.value);
        const empresa = empresaSection.dataset.empresa;

        if (!count || count < 1 || count > 50) {
            this.showError(countInput, 'Ingresa una cantidad válida entre 1 y 50');
            return;
        }

        this.clearError(countInput);
        
        // Inicializar el array de estudiantes para esta empresa si no existe
        if (!this.students[empresaId]) {
            this.students[empresaId] = [];
        }

        // Limpiar estudiantes existentes
        this.students[empresaId] = [];

        // Generar nuevos estudiantes
        for (let i = 0; i < count; i++) {
            this.students[empresaId].push({
                id: i + 1,
                empresa: empresa,
                cr: '',
                lastName: '',
                firstName: '',
                mdName: '',
                dob: '',
                idExp: '',
                cargo: '',
                membresia: '',
                email: '',
                password: this.generateRandomPassword()
            });
        }

        this.renderStudentsTableForEmpresa(empresaId);
        document.getElementById(`studentsContainer_${empresaId}`).style.display = 'block';
    }

    // Renderizar tabla de estudiantes para una empresa específica
    renderStudentsTableForEmpresa(empresaId) {
        const tbody = document.getElementById(`studentsTableBody_${empresaId}`);
        tbody.innerHTML = '';

        this.students[empresaId].forEach((student, index) => {
            const row = document.createElement('tr');
            row.id = `student-${empresaId}-${index}`;
            row.className = 'student-row';

            row.innerHTML = `
                <td>
                    <input type="text" class="form-control input-lg2" 
                           name="id" placeholder="id" 
                           value="${student.id}">
                    <div class="error-message"></div>
                </td>
                <td>
                    <input type="text" class="form-control input-lg" 
                           name="empresa" value="${student.empresa}" readonly>
                    <div class="error-message"></div>
                </td>
                <td>
                    <input type="text" class="form-control input-lg" 
                           name="cr" placeholder="cr" 
                           value="${student.cr}" required>
                    <div class="error-message"></div>
                </td>
                <td>
                    <input type="text" class="form-control input-lg" 
                           name="lastName" placeholder="lastName" 
                           value="${student.lastName}" required>
                    <div class="error-message"></div>
                </td>
                <td>
                    <input type="text" class="form-control input-lg" 
                           name="firstName" placeholder="firstName" 
                           value="${student.firstName}" required>
                    <div class="error-message"></div>
                </td>
                <td>
                    <input type="text" class="form-control input-lg" 
                           name="mdName" placeholder="mdName" 
                           value="${student.mdName}" >
                    <div class="error-message"></div>
                </td>
                <td>
                    <input type="text" class="form-control input-lg" 
                           name="dob" placeholder="dob" 
                           value="${student.dob}" required>
                    <div class="error-message"></div>
                </td>
                <td>
                    <input type="text" class="form-control input-lg" 
                           name="idExp" placeholder="idExp" 
                           value="${student.idExp}" >
                    <div class="error-message"></div>
                </td>
                <td>
                    <input type="text" class="form-control input-lg" 
                           name="cargo" placeholder="cargo" 
                           value="${student.cargo}" >
                    <div class="error-message"></div>
                </td>
                <td>
                    <input type="text" class="form-control input-lg" 
                           name="membresia" placeholder="Membresia" 
                           value="${student.membresia}">
                    <div class="error-message"></div>
                </td>
                <td>
                    <input type="email" class="form-control input-lg" 
                           name="email" placeholder="correo@ejemplo.com" 
                           value="${student.email}" required>
                    <div class="error-message"></div>
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <input type="text" class="form-control form-control-sm generated-password" 
                               name="password" value="${student.password}" readonly>
                        <button type="button" class="btn btn-outline-primary btn-sm ms-2 copy-btn" 
                                onclick="wizard.copyToClipboard('${student.password}', this)" 
                                title="Copiar contraseña">
                            <i class="ri-file-copy-line"></i>
                        </button>
                    </div>
                </td>
                <td>
                    <button type="button" class="btn btn-outline-warning btn-sm" 
                            onclick="wizard.regeneratePassword('${empresaId}', ${index})" 
                            title="Regenerar contraseña">
                        <i class="ri-refresh-line"></i>
                    </button>
                    <button type="button" class="btn btn-outline-info btn-sm" 
                            title="Enviar correo">
                        <i class="ri-mail-send-fill"></i>
                    </button>
                </td>
            `;

            tbody.appendChild(row);
        });
    }

    // Regenerar contraseña para un estudiante específico
    regeneratePassword(empresaId, studentIndex) {
        this.students[empresaId][studentIndex].password = this.generateRandomPassword();
        const passwordInput = document.querySelector(`#student-${empresaId}-${studentIndex} input[name="password"]`);
        passwordInput.value = this.students[empresaId][studentIndex].password;

        // Update copy button
        const copyBtn = document.querySelector(`#student-${empresaId}-${studentIndex} .copy-btn`);
        copyBtn.setAttribute('onclick', `wizard.copyToClipboard('${this.students[empresaId][studentIndex].password}', this)`);
    }

    // Regenerar todas las contraseñas para una empresa
    regenerateAllPasswordsForEmpresa(empresaId) {
        if (confirm('¿Estás seguro de regenerar todas las contraseñas para esta empresa?')) {
            this.students[empresaId].forEach((student, index) => {
                this.regeneratePassword(empresaId, index);
            });
        }
    }

    // Exportar contraseñas para una empresa
    exportPasswordsForEmpresa(empresaId) {
        if (!this.students[empresaId] || this.students[empresaId].length === 0) {
            alert('No hay estudiantes para exportar');
            return;
        }

        const empresa = document.getElementById(`empresa-${empresaId}`).dataset.empresa;
        let csvContent = "Número,Empresa,Nombre Completo,Correo,Contraseña\n";

        this.students[empresaId].forEach((student, index) => {
            const row = document.querySelector(`#student-${empresaId}-${index}`);
            const fullName = row.querySelector('input[name="fullName"]').value || 'Sin nombre';
            const email = row.querySelector('input[name="email"]').value || 'Sin email';

            csvContent += `${student.id},"${empresa}","${fullName}","${email}","${student.password}"\n`;
        });

        const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        const url = URL.createObjectURL(blob);

        link.setAttribute('href', url);
        link.setAttribute('download', `estudiantes_${empresa}_contraseñas.csv`);
        link.style.display = 'none';

        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    // Enviar correos para una empresa (simulado)
    sendMailsForEmpresa(empresaId) {
        alert(`Función de enviar correos para la empresa ${empresaId} sería implementada aquí`);
    }

    // Resto de los métodos permanecen iguales...
    generateRandomPassword(length = 8) {
        const chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789';
        let password = '';
        for (let i = 0; i < length; i++) {
            password += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        return password;
    }

    copyToClipboard(text, button) {
        navigator.clipboard.writeText(text).then(() => {
            const originalIcon = button.innerHTML;
            button.innerHTML = '<i class="ri-check-line"></i>';
            button.classList.add('btn-success');
            button.classList.remove('btn-outline-primary');

            setTimeout(() => {
                button.innerHTML = originalIcon;
                button.classList.remove('btn-success');
                button.classList.add('btn-outline-primary');
            }, 1000);
        }).catch(() => {
            alert('Error al copiar al portapapeles');
        });
    }

   getFormData() {
        this.saveStepData();
        
        const companiesProject = [];
        
        // Recorrer todas las empresas
        for (const empresaId in this.students) {
            if (this.students.hasOwnProperty(empresaId)) {
                const empresaSection = document.getElementById(`empresa-${empresaId}`);
                if (!empresaSection) continue;
                
                const empresaName = empresaSection.dataset.empresa;
                const emailInput = empresaSection.querySelector(`input[name="email_${empresaId}"]`);
                const empresaEmail = emailInput ? emailInput.value : '';
                
                // Crear el objeto de la empresa
                const empresaObj = {
                    NAME_PROJECT: empresaName,
                    EMAIL_PROJECT: empresaEmail,
                    STUDENT_COUNT_PROJECT: this.students[empresaId].length.toString(),
                    STUDENTS_PROJECT: []
                };
                
                // Recorrer todos los estudiantes de esta empresa
                this.students[empresaId].forEach((student, index) => {
                    const row = document.querySelector(`#student-${empresaId}-${index}`);
                    
                    if (row) {
                        empresaObj.STUDENTS_PROJECT.push({
                            ID_PROJECT: student.id.toString(),
                            COMPANY_PROJECT: student.empresa,
                            CR_PROJECT: row.querySelector('input[name="cr"]')?.value || '',
                            LAST_NAME_PROJECT: row.querySelector('input[name="lastName"]')?.value || '',
                            FIRST_NAME_PROJECT: row.querySelector('input[name="firstName"]')?.value || '',
                            MIDDLE_NAME_PROJECT: row.querySelector('input[name="mdName"]')?.value || '',
                            BIRTH_DATE_PROJECT: row.querySelector('input[name="dob"]')?.value || '',
                            ID_NUMBER_PROJECT: row.querySelector('input[name="idExp"]')?.value || '',
                            POSITION_PROJECT: row.querySelector('input[name="cargo"]')?.value || '',
                            MEMBERSHIP_PROJECT: row.querySelector('input[name="membresia"]')?.value || '',
                            EMAIL_PROJECT: row.querySelector('input[name="email"]')?.value || '',
                            PASSWORD_PROJECT: student.password,
                            USER_ID_PROJECT: student.USER_ID_PROJECT
                        });
                    }
                });
                
                companiesProject.push(empresaObj);
            }
        }
        
        // Convertir a JSON string para asegurar el formato correcto
        this.formData.COMPANIES_PROJECT = JSON.stringify(companiesProject);
        
        return this.formData;
    }
}

// Initialize wizard when DOM is loaded
document.addEventListener('DOMContentLoaded', function () {
    window.wizard = new WizardManager();
});

var proyectoDatatable = $("#proyecto-list-table").DataTable({
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
        { data: 'BTN_EDITAR' }
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

$("#proyectobtnModal").click(function (e) {
    e.preventDefault();
    formularioValido = validarFormulario($('#proyectoForm'))
    if (formularioValido) {
        
       const formData = window.wizard.getFormData();
        
        const dataToSend = {
            api: 1,
            ID_PROJECT: ID_PROJECT,
            COMPANIES_PROJECT: formData.COMPANIES_PROJECT
        };

        $('#proyectoForm').serializeArray().forEach(item => {
            dataToSend[item.name] = item.value;
        });

        console.log('Datos a enviar:', JSON.stringify(window.wizard.getFormData(), null, 2));

        if (ID_PROJECT == 0) {
            alertMensajeConfirm({
                title: "¿Desea guardar la información?",
                text: "Se creará este proyecto",
                icon: "question",
            }, async function () {
                await loaderbtn('proyectobtnModal')
                await ajaxAwaitFormData( dataToSend, 'proyectoSave', 'proyectoForm', 'proyectobtnModal', { callbackAfter: true, callbackBefore: true }, () => {
                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })
                    $('.swal2-popup').addClass('ld ld-breath')
                }, function (data) {
                    ID_PROJECT = data.proyecto.ID_PROJECT
                    alertMensaje('success', 'Información guardada correctamente', 'Esta información esta lista para usarse', null, null, 1500)
                    $('#proyectoModal').modal('hide')
                    document.getElementById('proyectoForm').reset();
                    proyectoDatatable.ajax.reload()
                })
            }, 1)

        } else {
            alertMensajeConfirm({
                title: "¿Desea editar la información de este formulario?",
                text: "Al guardarla, se podra usar",
                icon: "question",
            }, async function () {

                await loaderbtn('proyectobtnModal')
                await ajaxAwaitFormData( dataToSend , 'proyectoSave', 'proyectoForm', 'proyectobtnModal', { callbackAfter: true, callbackBefore: true }, () => {

                    Swal.fire({
                        icon: 'info',
                        title: 'Espere un momento',
                        text: 'Estamos guardando la información',
                        showConfirmButton: false
                    })

                    $('.swal2-popup').addClass('ld ld-breath')


                }, function (data) {

                    setTimeout(() => {


                        ID_PROJECT = data.proyecto.ID_PROJECT
                        alertMensaje('success', 'Información editada correctamente', 'Información guardada')
                        $('#proyectoModal').modal('hide')
                        document.getElementById('proyectoForm').reset();
                        proyectoDatatable.ajax.reload()
                    }, 300);
                })
            }, 1)
        }

    } else {
        alertToast('Por favor, complete todos los campos del formulario.', 'error', 2000)
    }
});


$('#proyecto-list-table tbody').on('click', 'td>button.EDITAR', function () {
     isEditing = true; 
    var tr = $(this).closest('tr');
    var row = proyectoDatatable.row(tr);
    ID_PROJECT = row.data().ID_PROJECT;


    editarDatoTabla(row.data(), 'proyectoForm', 'proyectoModal', 1);

    
    if (tagifyChangeHandler) {
        tagify.off('change', tagifyChangeHandler);
        tagifyChangeHandler = null;
    }

    // Inicializar campos selectize
    function initializeSelectizedFields(row, fieldIds) {
        fieldIds.forEach(function (fieldId) {
            var values = row.data()[fieldId];
            var $select = $('#' + fieldId);

            if (!$select[0].selectize) {
                $select.selectize({
                    plugins: ['remove_button'],
                    delimiter: ',',
                    persist: false,
                    create: false
                });
            }

            var selectize = $select[0].selectize;
            selectize.clear();            
            selectize.setValue(values);  
        });
    }

    initializeSelectizedFields(row, [
        'ACCREDITATION_LEVELS_PROJECT',
        'BOP_TYPES_PROJECT'
    ]);

    tagify.removeAllTags();
    tagify.addTags(row.data().COMPANIES);

    if (row.data().COMPANIES_PROJECT) {
        const companiesProject = Array.isArray(row.data().COMPANIES_PROJECT) ? 
            row.data().COMPANIES_PROJECT : 
            JSON.parse(row.data().COMPANIES_PROJECT);
            
        window.wizard.empresas = companiesProject;
    } else {
        window.wizard.empresas = row.data().COMPANIES || [];
    }
    
    console.log('Datos de empresas cargados:', window.wizard.empresas);
    
    // Desactivar modo edición después de un breve tiempo
    setTimeout(() => {
        isEditing = false;
    }, 1000);

    $('#proyectoModal .modal-title').html(`Editar Proyecto #${row.data().ID_PROJECT}`);
});
