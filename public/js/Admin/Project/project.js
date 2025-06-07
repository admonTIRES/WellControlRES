let tagify = null;
let empresas = null;
$(document).ready(function () {
    var $select3 = $('#BOP_PROJECT').selectize({
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
});
document.addEventListener('DOMContentLoaded', function () {
    const input = document.querySelector('#empresas');
    tagify = new Tagify(input, {
        duplicates: false,
        maxTags: 20,
        placeholder: "Escribe y presiona ENTER"
    });
     tagify.on('change', () => {
           empresas = tagify.value;
    });
});
class WizardManager {
    constructor() {
        this.currentStep = 1;
        this.totalSteps = 4;
        this.formData = {};
        this.students = [];
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
        document.getElementById('generateStudents').addEventListener('click', () => {
            this.generateStudents();
        });

        // Export passwords button
        document.getElementById('exportPasswords').addEventListener('click', () => {
            this.exportPasswords();
        });

        // Regenerate all passwords button
        document.getElementById('regenerateAllPasswords').addEventListener('click', () => {
            this.regenerateAllPasswords();
        });

        // Modal reset on close
        document.getElementById('proyectoModal').addEventListener('hidden.bs.modal', () => {
            this.resetWizard();
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

        // Additional validation for step 2 (students)
        if (this.currentStep === 3) {
            const studentsContainer = document.getElementById('studentsContainer');
            if (studentsContainer.style.display === 'none' || this.students.length === 0) {
                const generateBtn = document.getElementById('generateStudents');
                this.showError(generateBtn.parentNode.querySelector('input[name="studentCount"]'), 'Debes generar la lista de estudiantes');
                isValid = false;
            } else {
                // Validate student inputs
                const studentInputs = document.querySelectorAll('#studentsTableBody input[required]');
                studentInputs.forEach(input => {
                    if (!input.value.trim()) {
                        this.showError(input, 'Requerido');
                        isValid = false;
                    } else if (input.type === 'email' && !this.isValidEmail(input.value)) {
                        this.showError(input, 'Email inválido');
                        isValid = false;
                    }
                });
            }
        }

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

        // Show/hide save button
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

    generateStudents() {
        const countInput = document.querySelector('input[name="studentCount"]');
        const count = parseInt(countInput.value);

        if (!count || count < 1 || count > 50) {
            this.showError(countInput, 'Ingresa una cantidad válida entre 1 y 50');
            return;
        }

        this.clearError(countInput);
        this.students = [];

        // Generate students data
        for (let i = 0; i < count; i++) {
            this.students.push({
                id: i + 1,
                empresa: '',
                fullName: '',
                cargo: '',
                email: '',
                password: this.generateRandomPassword()
            });
        }

        this.renderStudentsTable();
        document.getElementById('studentsContainer').style.display = 'block';
    }

    generateRandomPassword(length = 8) {
        const chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789';
        let password = '';
        for (let i = 0; i < length; i++) {
            password += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        return password;
    }

    renderStudentsTable() {
    const tbody = document.getElementById('studentsTableBody');
    tbody.innerHTML = '';

    const empresas = tagify.value; // array de objetos { value: "nombre" }

    this.students.forEach((student, index) => {
        const row = document.createElement('tr');
        row.id = `student-${index}`;
        row.className = 'student-row';

        // Crear contenido HTML de la fila con ID único para cada select
        row.innerHTML = `
            <td>
                <input type="text" class="form-control input-lg2" 
                       name="id" placeholder="id" 
                       value="${student.id}">
                <div class="error-message"></div>
            </td>
            <td>
                <select id="empresaSelect-${index}" name="empresa" class="form-control input-lg">
                    <option value="">Selecciona una empresa</option>
                </select>
                <div class="error-message"></div>
            </td>
            <td>
                <input type="text" class="form-control input-lg" 
                       name="fullName" placeholder="Nombre completo" 
                       value="${student.fullName}">
                <div class="error-message"></div>
            </td>
            <td>
                <input type="text" class="form-control input-lg" 
                       name="cargo" placeholder="Cargo" 
                       value="${student.cargo}">
                <div class="error-message"></div>
            </td>
            <td>
                <input type="email" class="form-control input-lg" 
                       name="email" placeholder="correo@ejemplo.com" 
                       value="${student.email}">
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
                        onclick="wizard.regeneratePassword(${index})" 
                        title="Regenerar contraseña">
                    <i class="ri-refresh-line"></i>
                </button>
                <button type="button" class="btn btn-outline-info btn-sm" 
                        title="Enviar correo">
                    <i class="ri-mail-send-fill"></i>
                </button>
            </td>
        `;

        // Agregar la fila al tbody
        tbody.appendChild(row);

        // Obtener el select actual por su ID único
        const selectEmpresa = document.getElementById(`empresaSelect-${index}`);

        // Llenar las opciones del select con las empresas disponibles
        empresas.forEach(empresa => {
            const option = document.createElement('option');
            option.value = empresa.value;
            option.textContent = empresa.value;

            // Seleccionar automáticamente la empresa del estudiante
            if (empresa.value === student.empresa) {
                option.selected = true;
            }

            selectEmpresa.appendChild(option);
        });
    });
}


    regeneratePassword(studentIndex) {
        this.students[studentIndex].password = this.generateRandomPassword();
        const passwordInput = document.querySelector(`#student-${studentIndex} input[name="password"]`);
        passwordInput.value = this.students[studentIndex].password;

        // Update copy button
        const copyBtn = document.querySelector(`#student-${studentIndex} .copy-btn`);
        copyBtn.setAttribute('onclick', `wizard.copyToClipboard('${this.students[studentIndex].password}', this)`);
    }

    regenerateAllPasswords() {
        if (confirm('¿Estás seguro de regenerar todas las contraseñas?')) {
            this.students.forEach((student, index) => {
                this.regeneratePassword(index);
            });
        }
    }

    removeStudent(studentIndex) {
        if (confirm('¿Estás seguro de eliminar este estudiante?')) {
            this.students.splice(studentIndex, 1);

            // Renumber students
            this.students.forEach((student, index) => {
                student.id = index + 1;
            });

            this.renderStudentsTable();

            // Update count input
            document.querySelector('input[name="studentCount"]').value = this.students.length;
        }
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

    exportPasswords() {
        if (this.students.length === 0) {
            alert('No hay estudiantes para exportar');
            return;
        }

        let csvContent = "Número,Nombre Completo,Correo,Contraseña\n";

        this.students.forEach((student, index) => {
            const row = document.querySelector(`#student-${index}`);
            const fullName = row.querySelector('input[name="fullName"]').value || 'Sin nombre';
            const email = row.querySelector('input[name="email"]').value || 'Sin email';

            csvContent += `${student.id},"${fullName}","${email}","${student.password}"\n`;
        });

        const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        const url = URL.createObjectURL(blob);

        link.setAttribute('href', url);
        link.setAttribute('download', 'estudiantes_contraseñas.csv');
        link.style.display = 'none';

        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    getFormData() {
        this.saveStepData();
        return this.formData;
    }
}

// Initialize wizard when DOM is loaded
document.addEventListener('DOMContentLoaded', function () {
    window.wizard = new WizardManager();

});