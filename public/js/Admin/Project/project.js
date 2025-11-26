ID_PROJECT = 0

let tagify = null;
let empresas = null;
let tagifyChangeHandler = null;
let isEditing = false;
let nombresP = null;
let selectize = null;

$(document).ready(function () {
    var $select3 = $('#BOP_TYPES_PROJECT').selectize({
        plugins: ['remove_button'],
        delimiter: ',',
        persist: false,
        maxItems: null,
        create: false,
        onInitialize: function () {
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
            this.$control_input.prop('readonly', true);
        }
    });
    var selectizeInstance4 = $select4[0].selectize;
    selectize = $('#COURSE_NAME_ES_PROJECT').selectize({
        options: nombresP,
        valueField: 'value',
        labelField: 'text',
        searchField: 'text',
        create: false,
        placeholder: "Selecciona un nombre",
        maxItems: 1
    })[0].selectize;
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
        // isEditing = false;
        // tagify.removeAllTags(); x

        // if (tagifyChangeHandler) {
        //     tagify.off('change', tagifyChangeHandler); 
        // }

        // tagifyChangeHandler = function(e) {
        //     if (!isEditing && window.wizard) {
        //         let empresasArray;
        //         try {
        //             if (typeof e.detail.value === 'string') {
        //                 empresasArray = JSON.parse(e.detail.value);
        //             } else if (Array.isArray(e.detail.value)) {
        //                 empresasArray = e.detail.value;
        //             } else {
        //                 empresasArray = tagify.value;
        //             }

        //             window.wizard.empresas = Array.isArray(empresasArray)
        //                 ? empresasArray.map(item => typeof item === 'string' ? item : item.value)
        //                 : [empresasArray.value || empresasArray];
        //         } catch (error) {
        //             window.wizard.empresas = tagify.value.map(item =>
        //                 typeof item === 'string' ? item : item.value
        //             );
        //         }
        //         console.log('Empresas actualizadas:', window.wizard.empresas);
        //     }
        // };

        // tagify.on('change', tagifyChangeHandler);
        isEditing = false;

        if (window.tagifyManager) {
            window.tagifyManager.setEditMode(false);
            window.tagifyManager.resetTagify();
        }
    });
});

class WizardManager {
    constructor() {
        this.currentStep = 1;
        this.totalSteps = 5;
        this.formData = {};
        this.students = [];
        this.empresas = [];
        this.isEditMode = false;
        this.init();
    }

    setEditMode(editMode) {
        this.isEditMode = editMode;
        this.updateWizard();
    }

    init() {
        this.bindEvents();
        this.updateProgressBar();
        this.renderDestroyButton();
    }

    renderDestroyButton() {
        const container = document.getElementById('wizardDestroyContainer');
        if (!container) return;

        container.innerHTML = `
            <button type="button" class="btn btn-danger" id="destroyWizardBtn">
                Reiniciar Formulario
            </button>
        `;

        document.getElementById('destroyWizardBtn').addEventListener('click', () => {
            if (confirm('¿Deseas reiniciar todo el formulario?')) {
                this.destroyWizard();
            }
        });
    }

    destroyWizard() {
        this.formData = {};
        this.students = [];
        this.empresas = [];

        const form = document.getElementById('wizardForm');
        if (form) form.reset();

        const photoPreview = document.getElementById('photoPreview');
        if (photoPreview) photoPreview.innerHTML = '';
        const signaturePreview = document.getElementById('signaturePreview');
        if (signaturePreview) signaturePreview.innerHTML = '';

        const studentsContainers = document.querySelectorAll('[id^="studentsContainer_"]');
        studentsContainers.forEach(c => c.style.display = 'none');
        const studentsTables = document.querySelectorAll('[id^="studentsTableBody_"]');
        studentsTables.forEach(t => t.innerHTML = '');
        const empresasContainer = document.getElementById('empresasContainer');
        if (empresasContainer) empresasContainer.innerHTML = '';

        document.querySelectorAll('.form-control, .form-select').forEach(input => {
            this.clearError(input);
        });

        this.currentStep = 1;
        this.updateWizard();
    }

    bindEvents() {
        document.querySelectorAll('.next-step').forEach(btn => {
            btn.addEventListener('click', () => this.nextStep());
        });

        document.querySelectorAll('.prev-step').forEach(btn => {
            btn.addEventListener('click', () => this.prevStep());
        });

        document.querySelectorAll('.wizard-nav li').forEach(nav => {
            nav.addEventListener('click', (e) => {
                // const step = parseInt(e.currentTarget.dataset.step);
                // if (step < this.currentStep) {
                //     this.goToStep(step);
                // }
                const step = parseInt(e.currentTarget.dataset.step);
                if (this.isEditMode || step <= this.currentStep) {
                    this.goToStep(step);
                }
            });
        });
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

    // goToStep(step) {
    //     this.currentStep = step;
    //     this.updateWizard();
    // }
    goToStep(step) {
        if (this.isEditMode || step <= this.currentStep + 1) {
            this.currentStep = step;
            this.updateWizard();
        }
    }

    updateNavigationButtons() {
        const prevButtons = document.querySelectorAll('.prev-step');
        const nextButtons = document.querySelectorAll('.next-step');
        prevButtons.forEach(btn => btn.style.display = 'inline-block');
        nextButtons.forEach(btn => btn.style.display = 'inline-block');
    }

    validateCurrentStep() {
        if (this.isEditMode) {
            return true;
        }
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
        document.querySelectorAll('.wizard-step').forEach(step => {
            step.classList.remove('active');
        });
        document.querySelector(`[data-step="${this.currentStep}"].wizard-step`).classList.add('active');

        document.querySelectorAll('.wizard-nav li').forEach((nav, index) => {
            nav.classList.remove('active', 'completed');

            if (this.isEditMode) {
                nav.classList.add('completed');
                if (index + 1 === this.currentStep) {
                    nav.classList.add('active');
                }
            } else {
                if (index + 1 === this.currentStep) {
                    nav.classList.add('active');
                } else if (index + 1 < this.currentStep) {
                    nav.classList.add('completed');
                }
            }
        });

        this.updateProgressBar();

        if (this.currentStep === 4) {
            if (window.tagifyManager) {
                const updatedCompanies = window.tagifyManager.getUpdatedCompanies();
                if (updatedCompanies && updatedCompanies.length > 0) {
                    this.empresas = updatedCompanies;
                    console.log('Empresas cargadas desde tagifyManager:', this.empresas);
                }
            }
            this.renderEmpresasSections();
        }

        const saveBtn = document.getElementById('proyectobtnModal');
        if (this.currentStep === this.totalSteps) {
            saveBtn.style.display = 'inline-block';
        } else {
            saveBtn.style.display = 'none';
        }

        this.updateNavigationButtons();
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

        document.getElementById('wizardForm').reset();
        document.getElementById('photoPreview').innerHTML = '';
        document.getElementById('signaturePreview').innerHTML = '';
        document.getElementById('studentsContainer').style.display = 'none';
        document.getElementById('studentsTableBody').innerHTML = '';
        document.querySelectorAll('.form-control, .form-select').forEach(input => {
            this.clearError(input);
        });

        this.updateWizard();
    }

    renderEmpresasSections() {
        const container = document.getElementById('empresasContainer');
        container.innerHTML = '';

        if (!this.empresas || this.empresas.length === 0) {
            container.innerHTML = '<div class="alert alert-warning">No se han agregado empresas</div>';
            return;
        }

        const isEditMode = typeof this.empresas[0] === 'object' && this.empresas[0].NAME_PROJECT !== undefined;

        this.empresas.forEach((empresa, index) => {
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
                            value="${studentCount || ''}" />
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
                                    <th>Apellidos</th>
                                    <th>Nombre</th>
                                    <th>Segundo nombre</th>
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
                        <button type="button" class="btn btn-warning btn-sm ms-2 regenerate-passwords"
                                data-empresa="${empresaId}">
                            <i class="ri-refresh-line me-2"></i>Regenerar Todas las Contraseñas
                        </button>
                    </div>
                </div>
            `;

            container.appendChild(section);

            section.querySelector(`.generate-students`).addEventListener('click', () => {
                this.generateStudentsForEmpresa(empresaId);
            });
            section.querySelector(`.regenerate-passwords`).addEventListener('click', () => {
                this.regenerateAllPasswordsForEmpresa(empresaId);
            });

            if (students.length > 0) {
                if (!this.students[empresaId]) {
                    this.students[empresaId] = [];
                }

                this.students[empresaId] = students.map((student, index) => ({
                    id: ID_PROJECT,
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

        if (!this.students[empresaId]) {
            this.students[empresaId] = [];
        }

        this.students[empresaId] = [];

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
                           value="${student.cr}">
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
                    <input type="text" class="form-control input-lg dob-input" 
                        name="dob" placeholder="dd/mm/aaaa" 
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
                </td>
            `;

            tbody.appendChild(row);
        });
        this.addDateFormatting(empresaId);
    }
    addDateFormatting(empresaId) {
    const dobInputs = document.querySelectorAll(`#studentsTableBody_${empresaId} .dob-input`);
    
    dobInputs.forEach(input => {
        input.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            
            // Aplicar formato dd/mm/aaaa
            if (value.length > 2) {
                value = value.substring(0, 2) + '/' + value.substring(2);
            }
            if (value.length > 5) {
                value = value.substring(0, 5) + '/' + value.substring(5, 9);
            }
            
            e.target.value = value;
        });
    });
}

    regeneratePassword(empresaId, studentIndex) {
        this.students[empresaId][studentIndex].password = this.generateRandomPassword();
        const passwordInput = document.querySelector(`#student-${empresaId}-${studentIndex} input[name="password"]`);
        passwordInput.value = this.students[empresaId][studentIndex].password;

        const copyBtn = document.querySelector(`#student-${empresaId}-${studentIndex} .copy-btn`);
        copyBtn.setAttribute('onclick', `wizard.copyToClipboard('${this.students[empresaId][studentIndex].password}', this)`);
    }

    regenerateAllPasswordsForEmpresa(empresaId) {
        if (confirm('¿Estás seguro de regenerar todas las contraseñas para esta empresa?')) {
            this.students[empresaId].forEach((student, index) => {
                this.regeneratePassword(empresaId, index);
            });
        }
    }

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

    sendMailsForEmpresa(empresaId) {
        alert(`Función de enviar correos para la empresa ${empresaId} sería implementada aquí`);
    }

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

        for (const empresaId in this.students) {
            if (this.students.hasOwnProperty(empresaId)) {
                const empresaSection = document.getElementById(`empresa-${empresaId}`);
                if (!empresaSection) continue;

                const empresaName = empresaSection.dataset.empresa;
                const emailInput = empresaSection.querySelector(`input[name="email_${empresaId}"]`);
                const empresaEmail = emailInput ? emailInput.value : '';

                const empresaObj = {
                    NAME_PROJECT: empresaName,
                    EMAIL_PROJECT: empresaEmail,
                    STUDENT_COUNT_PROJECT: this.students[empresaId].length.toString(),
                    STUDENTS_PROJECT: []
                };

                this.students[empresaId].forEach((student, index) => {
                    const row = document.querySelector(`#student-${empresaId}-${index}`);

                    if (row) {
                        empresaObj.STUDENTS_PROJECT.push({
                            ID_PROJECT: ID_PROJECT,
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

        this.formData.COMPANIES_PROJECT = JSON.stringify(companiesProject);
        return this.formData;
    }
}

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
        { data: 'nombreProyecto' },
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

function actualizarCentrosCapacitacion(acreditacionId = null) {
    const $select = $('#CERTIFICATION_CENTER_PROJECT');
    $select.html('<option value="" selected disabled>Cargando centros...</option>');
    
    // Si no se proporciona acreditacionId, intentar obtenerlo del select
    if (acreditacionId === null) {
        acreditacionId = $('#ACCREDITING_ENTITY_PROJECT').val() || 0;
    }
    
    $.ajax({
        url: '/centros-capacitacion',
        type: 'GET',
        data: { 
            tipo: 2,
            acreditacion: acreditacionId
        },
        success: function(response) {
            let options = '<option value="" selected disabled>Seleccione el centro de capacitación</option>';
            
            if (response.success && response.centros.length > 0) {
                response.centros.forEach(function(centro) {
                    options += `<option value="${centro.ID_CATALOGO_CENTRO}">${centro.NOMBRE_COMERCIAL_CENTRO}</option>`;
                });
            } else {
                options = '<option value="" selected disabled>No hay centros disponibles</option>';
            }
            
            $select.html(options);
        },
        error: function(xhr, status, error) {
            $select.html('<option value="" selected disabled>Error al cargar centros</option>');
        }
    });
}

// Evento cuando cambia la acreditación
$(document).ready(function() {
    // Cargar centros al inicio si ya hay una acreditación seleccionada
    const acreditacionInicial = $('#ACCREDITING_ENTITY_PROJECT').val();
    if (acreditacionInicial) {
        actualizarCentrosCapacitacion(acreditacionInicial);
    }
    
    // Escuchar cambios en el select de acreditación
    $('#ACCREDITING_ENTITY_PROJECT').on('change', function() {
        const acreditacionId = $(this).val() || 0;
        actualizarCentrosCapacitacion(acreditacionId);
    });
});
// Función para cargar datos del centro y mostrar contactos
function cargarDatosCentro(centroId) {
    // Limpiar campos primero
    limpiarCamposCentro();
    limpiarListaContactos();
    
    if (!centroId || centroId === '') {
        return;
    }

    // Mostrar loading
    $('#CENTER_NUMBER_PROJECT').val('Cargando...');
    mostrarLoadingContactos();

    $.ajax({
        url: '/obtener-datos-centro',
        type: 'GET',
        data: { 
            centro_id: centroId
        },
        timeout: 10000,
        success: function(response) {
            if (response.success && response.centro) {
                // Llenar número de centro
                $('#CENTER_NUMBER_PROJECT').val(response.centro.numero_centro || 'No disponible');
                
                // Mostrar contactos
                if (response.centro.contactos && response.centro.contactos.length > 0) {
                    mostrarContactos(response.centro.contactos);
                } else {
                    mostrarSinContactos();
                }
            } else {
                $('#CENTER_NUMBER_PROJECT').val('Error al cargar datos');
                mostrarErrorContactos();
            }
        },
        error: function(xhr, status, error) {
            $('#CENTER_NUMBER_PROJECT').val('Error de conexión');
            mostrarErrorContactos();
            console.error('Error al cargar datos del centro:', error);
        }
    });
}

// Función para mostrar la lista de contactos
function mostrarContactos(contactos) {
    const $contactosContainer = $('#contactos-container');
    
    let html = `
        <div class="mt-3">
            <h6 class="text-primary"><i class="fas fa-users me-2"></i>Contactos del Centro:</h6>
            <div class="table-responsive">
                <table class="table table-sm table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Nombre</th>
                            <th>Cargo</th>
                            <th>Email</th>
                            <th>Celular</th>
                            <th>Teléfono Fijo</th>
                        </tr>
                    </thead>
                    <tbody>
    `;
    
    contactos.forEach((contacto, index) => {
        html += `
            <tr>
                <td class="fw-semibold">${contacto.nombre || 'N/A'}</td>
                <td>${contacto.cargo || 'N/A'}</td>
                <td>
                    ${contacto.email ? 
                        `<a href="mailto:${contacto.email}" class="text-decoration-none">
                            <i class="fas fa-envelope me-1"></i>${contacto.email}
                         </a>` : 
                        'N/A'}
                </td>
                <td>
                    ${contacto.celular ? 
                        `<a href="tel:${contacto.celular}" class="text-decoration-none">
                            <i class="fas fa-mobile-alt me-1"></i>${contacto.celular}
                         </a>` : 
                        'N/A'}
                </td>
                <td>
                    ${contacto.fijo ? 
                        `<a href="tel:${contacto.fijo}" class="text-decoration-none">
                            <i class="fas fa-phone me-1"></i>${contacto.fijo}
                         </a>` : 
                        'N/A'}
                </td>
            </tr>
        `;
    });
    
    html += `
                    </tbody>
                </table>
            </div>
            <small class="text-muted">
                <i class="fas fa-info-circle me-1"></i>
                Se encontraron ${contactos.length} contacto(s) registrado(s)
            </small>
        </div>
    `;
    
    $contactosContainer.html(html);
}

// Función para mostrar estado sin contactos
function mostrarSinContactos() {
    const $contactosContainer = $('#contactos-container');
    $contactosContainer.html(`
        <div class="mt-3">
            <div class="alert alert-warning">
                <i class="fas fa-exclamation-triangle me-2"></i>
                No se encontraron contactos registrados para este centro.
            </div>
        </div>
    `);
}

// Función para mostrar error al cargar contactos
function mostrarErrorContactos() {
    const $contactosContainer = $('#contactos-container');
    $contactosContainer.html(`
        <div class="mt-3">
            <div class="alert alert-danger">
                <i class="fas fa-times-circle me-2"></i>
                Error al cargar los contactos del centro.
            </div>
        </div>
    `);
}

// Función para mostrar loading
function mostrarLoadingContactos() {
    const $contactosContainer = $('#contactos-container');
    $contactosContainer.html(`
        <div class="mt-3">
            <div class="text-center py-3">
                <div class="spinner-border spinner-border-sm text-primary me-2" role="status">
                    <span class="visually-hidden">Cargando...</span>
                </div>
                <small class="text-muted">Cargando contactos del centro...</small>
            </div>
        </div>
    `);
}

// Función para limpiar lista de contactos
function limpiarListaContactos() {
    $('#contactos-container').html('');
}

// Función para limpiar campos del centro
function limpiarCamposCentro() {
    $('#CENTER_NUMBER_PROJECT').val('');
    limpiarListaContactos();
}


$(document).ready(function() {
    // Para el select CERTIFICATION_CENTER_PROJECT
    $('#CERTIFICATION_CENTER_PROJECT').on('change', function() {
        const centroId = $(this).val();
        cargarDatosCentro(centroId);
    });

});

function limpiarModal() {
    ID_PROJECT = 0;
    document.getElementById('proyectoForm').reset();

    if (window.tagifyManager) {
        window.tagifyManager.resetTagify();
        window.tagifyManager = null;
    }

    const input = document.querySelector('#COMPANIES');
    window.tagifyManager = initializeTagifyForNew(input);

    ['ACCREDITATION_LEVELS_PROJECT', 'BOP_TYPES_PROJECT'].forEach(fieldId => {
        const $select = $('#' + fieldId);
        if ($select[0].selectize) {
            $select[0].selectize.clear();
        } else {
            $select.selectize({
                plugins: ['remove_button'],
                delimiter: ',',
                persist: false,
                create: false
            });
        }
    });

    window.wizard = new WizardManager();
    window.wizard.empresas = [];
    window.wizard.destroyWizard();

    selectize.clear();
}

function initializeTagifyWithEditSupport(tagifyInput) {
    let originalCompanies = [];
    let currentCompanies = [];
    let isEditMode = false;

    const tagify = new Tagify(tagifyInput, {
        dropdown: {
            enabled: 0,
            maxItems: 50
        },
        duplicates: false,
        whitelist: [],
        enforceWhitelist: false
    });

    function loadCompaniesForEdit(companiesData) {
        if (!companiesData || companiesData.length === 0) return;

        isEditMode = true;
        originalCompanies = Array.isArray(companiesData) ?
            [...companiesData] :
            JSON.parse(companiesData);

        currentCompanies = [...originalCompanies];

        const tagifyData = originalCompanies.map(empresa =>
            typeof empresa === 'string' ? empresa : empresa.NAME_PROJECT
        );

        tagify.removeAllTags();
        tagify.addTags(tagifyData);

        console.log('Empresas originales cargadas:', originalCompanies);
        console.log('Modo edición activado en Tagify');
    }

    tagify.on('change', function (e) {
        console.log('Evento change disparado:', e.detail);
        const currentTags = tagify.value.map(tag =>
            typeof tag === 'string' ? tag : tag.value
        );

        console.log('Tags actuales:', currentTags);
        console.log('Modo edición:', isEditMode);

        if (isEditMode) {
            handleEditModeChanges(currentTags);
        } else {
            if (window.wizard) {
                window.wizard.empresas = currentTags;
                console.log('Empresas actualizadas en wizard (modo nuevo):', window.wizard.empresas);
            }
        }
    });

    tagify.on('remove', function (e) {
        console.log('Evento remove disparado:', e.detail);
        if (isEditMode) {
            const removedCompany = e.detail.data.value;
            console.log('Empresa a eliminar:', removedCompany);
            showDeleteConfirmation(removedCompany);
        }
    });

    tagify.on('add', function (e) {
        console.log('Evento add disparado:', e.detail);
        if (isEditMode) {
            const currentTags = tagify.value.map(tag =>
                typeof tag === 'string' ? tag : tag.value
            );
            handleEditModeChanges(currentTags);
        }
    });

    function handleEditModeChanges(currentTags) {
        console.log('Manejando cambios en modo edición');

        const addedCompanies = currentTags.filter(tag =>
            !originalCompanies.some(orig =>
                (typeof orig === 'string' ? orig : orig.NAME_PROJECT) === tag
            )
        );

        const removedCompanies = originalCompanies.filter(orig => {
            const origName = typeof orig === 'string' ? orig : orig.NAME_PROJECT;
            return !currentTags.includes(origName);
        });

        console.log('Empresas agregadas:', addedCompanies);
        console.log('Empresas removidas:', removedCompanies);

        currentCompanies = currentTags.map(tag => {
            const existingCompany = originalCompanies.find(orig =>
                (typeof orig === 'string' ? orig : orig.NAME_PROJECT) === tag
            );

            if (existingCompany) {
                return existingCompany;
            } else {
                return { NAME_PROJECT: tag };
            }
        });

        if (window.wizard) {
            window.wizard.empresas = currentCompanies;
            console.log('Empresas actualizadas en wizard (modo edición):', window.wizard.empresas);
        }
    }

    function showDeleteConfirmation(companyName) {
        console.log('Mostrando confirmación para eliminar:', companyName);

        Swal.fire({
            title: '¿Eliminar empresa?',
            html: `¿Estás seguro de que deseas eliminar la empresa <strong>"${companyName}"</strong> y todos sus estudiantes?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar',
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                console.log('Confirmado eliminar:', companyName);

                if (window.wizard) {
                    window.wizard.empresas = window.wizard.empresas.filter(empresa => {
                        const empName = typeof empresa === 'string' ? empresa : empresa.NAME_PROJECT;
                        return empName !== companyName;
                    });

                    if (window.wizard.students) {
                        const empresaId = companyName.replace(/\s+/g, '-').toLowerCase();
                        delete window.wizard.students[empresaId];
                        console.log('Estudiantes eliminados para empresa:', empresaId);
                    }

                    console.log('Empresas después de eliminar:', window.wizard.empresas);
                }

                Swal.fire(
                    'Eliminada',
                    `La empresa "${companyName}" y sus estudiantes han sido eliminados.`,
                    'success'
                );
            } else {
                console.log('Cancelada eliminación, revertiendo...');
                setTimeout(() => {
                    tagify.addTags(companyName);
                }, 100);
            }
        });
    }

    function getUpdatedCompanies() {
        return currentCompanies;
    }

    function resetTagify() {
        isEditMode = false;
        originalCompanies = [];
        currentCompanies = [];
        tagify.removeAllTags();
        console.log('Tagify reseteado');
    }

    function setEditMode(mode) {
        isEditMode = mode;
        console.log('Modo edición establecido:', isEditMode);
    }

    return {
        loadCompaniesForEdit,
        getUpdatedCompanies,
        resetTagify,
        setEditMode,
        tagify
    };
}

function initializeTagifyForNew(tagifyInput) {
    isEditing = false;
    tagify = new Tagify(tagifyInput, {
        duplicates: false,
        maxTags: 20,
        placeholder: "Escribe el nombre de la empresa y presiona ENTER"
    });
    tagify.removeAllTags(); 

    if (tagifyChangeHandler) {
        tagify.off('change', tagifyChangeHandler); 
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
}


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
                await ajaxAwaitFormData(dataToSend, 'proyectoSave', 'proyectoForm', 'proyectobtnModal', { callbackAfter: true, callbackBefore: true }, () => {
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
                await ajaxAwaitFormData(dataToSend, 'proyectoSave', 'proyectoForm', 'proyectobtnModal', { callbackAfter: true, callbackBefore: true }, () => {

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

$("#btnUploadExcelProject").click(function (e) {
    e.preventDefault();

    const excelFile = document.getElementById('excelProject').files[0];

    if (!excelFile) {
        alertToast('Por favor, seleccione un archivo Excel.', 'error', 2000);
        return;
    }

    const allowedExtensions = ['.xlsx', '.xls'];
    const fileExtension = excelFile.name.toLowerCase().substring(excelFile.name.lastIndexOf('.'));

    if (!allowedExtensions.includes(fileExtension)) {
        alertToast('Por favor, seleccione un archivo Excel válido (.xlsx o .xls).', 'error', 2000);
        return;
    }
    alertMensajeConfirm({
        title: "¿Desea importar los datos del Excel?",
        text: "Se crearán proyectos y estudiantes según la plantilla",
        icon: "question",
    }, async function () {
        await loaderbtn('btnUploadExcelProject')

        const dataToSend = {
            api: 5,
            ID_PROJECT: ID_PROJECT,
            excel_file: excelFile
        };

        await ajaxAwaitFormData(dataToSend, 'projectExcelImport', 'uploadExcelProject', 'btnUploadExcelProject', {
            callbackAfter: true,
            callbackBefore: true
        }, () => {
            Swal.fire({
                icon: 'info',
                title: 'Espere un momento',
                text: 'Estamos procesando el archivo Excel',
                showConfirmButton: false
            });
            $('.swal2-popup').addClass('ld ld-breath');
        }, function (data) {
            if (data.code === 1) {
                ID_PROJECT = data.project.ID_PROJECT;
                alertMensaje('success', 'Excel importado correctamente',
                    `Proyecto creado con ${data.message}`, null, null, 1500);
                $('#proyectoExcelModal').modal('hide');
                document.getElementById('uploadExcelProject').reset();
                proyectoDatatable.ajax.reload();
            } else {
                alertMensaje('error', 'Error al importar', data.message, null, null, 3000);
            }
        });
    }, 1);
});

$('#excelProject').on('change', function (e) {
    const fileName = e.target.files[0]?.name;
    if (fileName) {
        $(this).next('.custom-file-label').remove();
        $(this).after(`<div class="text-success small mt-1"><i class="ri-file-excel-2-line"></i> ${fileName}</div>`);
    }
});

$('#proyecto-list-table tbody').on('click', 'td>button.EDITAR', function () {
    isEditing = true;
    window.wizard = new WizardManager();
    window.wizard.destroyWizard();

    var tr = $(this).closest('tr');
    var row = proyectoDatatable.row(tr);
    ID_PROJECT = row.data().ID_PROJECT;
    editarDatoTabla(row.data(), 'proyectoForm', 'proyectoModal', 1);

    window.wizard.setEditMode(true);

     if (window.tagifyManager) {
        window.tagifyManager.reset();
        window.tagifyManager = null;
    }

   
    const input = document.querySelector('#COMPANIES');
    window.tagifyManager = initializeTagifyWithEditSupport(input);
    

    window.tagifyManager.setEditMode(true);
    const companiesData = row.data().COMPANIES_PROJECT || row.data().COMPANIES;
    window.tagifyManager.loadCompaniesForEdit(companiesData);

    // if (tagifyChangeHandler) {
    //     tagify.off('change', tagifyChangeHandler);
    //     tagifyChangeHandler = null;
    // }

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
        'BOP_TYPES_PROJECT',
        'COURSE_NAME_ES_PROJECT'
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

    // console.log('Datos de empresas cargados:', window.wizard.empresas);

    setTimeout(() => {
        isEditing = false;
    }, 1000);

    $('#proyectoModal .modal-title').html(`Editar Proyecto ${row.data().FOLIO_PROJECT}`);
});
