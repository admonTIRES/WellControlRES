let currentExercises1 = getRandomExercises(allFracciones);
renderExercises(currentExercises1);

document.getElementById('reset_btn').addEventListener('click', function () {
    currentExercises1 = getRandomExercises(allFracciones);
    renderExercises(currentExercises1);
});

document.querySelectorAll('.nav-item').forEach(item => {
    item.addEventListener('click', function () {
        const section = this.getAttribute('data-section');
        resetExercises(section, section + '-container');
    });
});

document.getElementById('ejercicio1_btn').addEventListener('click', function () {
    let allCorrect = true;

    const inputs = document.querySelectorAll('.result-input');
    inputs.forEach((input, idx) => {
        const correct = parseFloat(document.querySelectorAll('.math-answer-exercise strong')[idx].textContent);
        const feedback = document.getElementById('feedback-' + (idx + 1));

        if (parseFloat(input.value) === correct) {
            feedback.textContent = "Correcto!";
            feedback.style.color = "green";
            input.style.borderColor = "green";
        } else {
            feedback.textContent = "Incorrecto!";
            feedback.style.color = "red";
            input.style.borderColor = "red";
            allCorrect = false;
        }
    });

    const answerDivs = document.querySelectorAll('.math-answer-exercise');
    answerDivs.forEach(div => div.style.display = 'flex');

    Swal.fire({
        title: allCorrect ? '¡Excelente!' : 'Algunos errores',
        text: allCorrect ? 'Has respondido correctamente a todas las preguntas.' : 'Hay respuestas incorrectas. Revisa los campos resaltados.',
        icon: allCorrect ? 'success' : 'error',
        confirmButtonText: 'OK',
    });
});

const exercisesData = {
    'cuadrado': allCuadrado,
    'despejes': allDespejes,
    'jerarquias': allJerarquia,
    'redondeos': allRedondeos
};
console.log(exercisesData);

const currentExercises = {};

function loadExercises(type, containerId) {
    const container = document.getElementById(containerId);
    container.innerHTML = ''; // Limpiar contenedor

    const allExercises = exercisesData[type];
    if (!allExercises || !Array.isArray(allExercises) || allExercises.length === 0) {
        const msg = document.createElement('p');
        msg.textContent = 'Ningún ejercicio disponible';
        msg.style.fontStyle = 'italic';
        msg.style.color = 'gray';
        container.appendChild(msg);
        return;
    }

    const shuffled = allExercises.sort(() => 0.5 - Math.random());
    currentExercises[type] = shuffled.slice(0, Math.min(5, allExercises.length));

    const calculatorIdMap = {
        'cuadrado': 4,
        'jerarquias': 5,
        'despejes': 6,
        'redondeos': 7
    };
    const calculatorButtonHTML = (type !== 'redondeos') ?
        `
        <button class="answer-button" 
            onclick="showExampleGlobal('${type}', \${qNum}, 'calculator\${calculatorIdMap[type]}')">
            Ver en calculadora
        </button>
        `
        : '';

    currentExercises[type].forEach((ex, index) => {
        const qNum = index + 1;
        const div = document.createElement('div');
        div.classList.add('question');

        div.innerHTML = `
                <p class="exercise-description">${ex.PREGUNTA_MATH}</p>
                <div class="text-grid"><div>${ex.FORMULA_MATH || ''}</div></div>
                <div class="options">
                    ${ex.OPCIONES_MATH.map((opt, i) => `
                        <label>
                            <input type="radio" name="${type}-q${qNum}" value="${i}">
                            ${String.fromCharCode(65 + i)}) ${opt.texto}
                        </label>
                    `).join('')}
                </div>
                <span class="feedback" id="feedback-${type}-q${qNum}"></span>
                <div class="math-answer-exercise ${type}" id="answer-${type}-${qNum}" style="display:none">
                    <p class="math-drilling-text">La respuesta correcta es <strong>${ex.OPCIONES_MATH.find(op => op.correcta).texto}</strong></p>
                    ${calculatorButtonHTML.replace(/\${qNum}/g, qNum)}
                    <button class="solution-button" onclick="showSolution('${type}', ${qNum})">Ver solución</button>
                </div>
                <div id="solution-${type}-${qNum}" class="math-drilling-solution" style="display:none">
                    ${ex.SOLUCIONIMG_MATH ? `<img src="${ex.SOLUCIONIMG_MATH}" class="solution-image" />` : ''}
                </div>
            `;
        container.appendChild(div);
    });

}

function checkExercises(type) {
    const exercises = currentExercises[type];
    if (!exercises) return;

    let allCorrect = true;

    exercises.forEach((ex, idx) => {
        const qNum = idx + 1;
        const selected = document.querySelector(`input[name="${type}-q${qNum}"]:checked`);
        const feedback = document.getElementById(`feedback-${type}-q${qNum}`);

        if (selected && selected.value === ex.FRACCION_MATH) {
            feedback.textContent = "Correcto!";
            feedback.style.color = "green";
        } else {
            feedback.textContent = "Incorrecto!";
            feedback.style.color = "red";
            allCorrect = false;
        }

        document.getElementById(`answer-${type}-${qNum}`).style.display = 'flex';
    });

    Swal.fire({
        title: allCorrect ? '¡Excelente!' : 'Algunos errores',
        text: allCorrect ? 'Has respondido correctamente a todas las preguntas.' : 'Hay respuestas incorrectas. Revisa los campos resaltados.',
        icon: allCorrect ? 'success' : 'error',
        confirmButtonText: 'OK',
    });
}

function showSolution(type, id) {
    const container = document.getElementById(`solution-${type}-${id}`);
    if (!container) return;

    const exercise = currentExercises[type][id - 1];
    if (!exercise || !exercise.SOLUCIONIMG_MATH) return;

    const url = `/exercise/image/${exercise.SOLUCIONIMG_MATH}`;

    container.innerHTML = `<img src="${url}" class="solution-image" />`;
    container.style.display = 'flex';
}

function showExampleGlobal(type, qNum, calculatorId) {
    const exercise = currentExercises[type][qNum - 1];
    if (!exercise) return;

    const calculator = document.getElementById(calculatorId);
    if (!calculator) return;

    const screen = calculator.querySelector('.screen');
    if (screen) screen.textContent = '0';

    const clearBtn = calculator.querySelector('#all-clear');
    if (clearBtn) clearBtn.click();

    const keyMap = {
        'X': 'multiply',
        '×': 'multiply',
        '*': 'multiply',
        '÷': 'divide',
        '/': 'divide',
        '+': 'add',
        '-': 'subtract',
        '−': 'subtract',
        '^': 'power',
        '(': 'open-parenthesis',
        ')': 'close-parenthesis',
        '0': 'zero',
        '1': 'one',
        '2': 'two',
        '3': 'three',
        '4': 'four',
        '5': 'five',
        '6': 'six',
        '7': 'seven',
        '8': 'eight',
        '9': 'nine',
        '.': 'decimal',
        ',': 'decimal',
        'DEL': 'delete',
        '=': 'equals',
        'AC': 'all-clear'
    };

    const clickSequence = async (sequence) => {
        for (const key of sequence) {
            await new Promise(resolve => setTimeout(resolve, 300));

            const btnId = keyMap[key] || key;
            const btn = calculator.querySelector(`#${btnId}`);

            if (btn) {
                btn.click();
                console.log(`Clicked: ${key} -> ${btnId}`);
            } else {
                console.warn(`Button not found for key: ${key} (mapped to: ${btnId})`);
            }
        }
    };

    clickSequence(exercise.CALCULADORA_MATH.sequence);

    calculator.scrollIntoView({ behavior: 'smooth', block: 'center' });
}


function resetExercises(type, containerId) {
    loadExercises(type, containerId);
}

function checkExercise(type) {
    const exercises = currentExercises[type];
    if (!exercises) return;

    let allCorrect = true;

    exercises.forEach((ex, idx) => {
        const qNum = idx + 1;
        const selected = document.querySelector(`input[name="${type}-q${qNum}"]:checked`);
        const feedback = document.getElementById(`feedback-${type}-q${qNum}`);

        if (!selected) {
            feedback.textContent = "Por favor selecciona una respuesta";
            feedback.style.color = "orange";
            allCorrect = false;
            return;
        }

        const correctIndex = ex.OPCIONES_MATH.findIndex(option => option.correcta === true);

        const isCorrect = parseInt(selected.value) === correctIndex;

        if (isCorrect) {
            feedback.textContent = "¡Correcto!";
            feedback.style.color = "green";
        } else {
            feedback.textContent = "Incorrecto!";
            feedback.style.color = "red";
            allCorrect = false;
        }

        document.getElementById(`answer-${type}-${qNum}`).style.display = 'flex';
    });

    Swal.fire({
        title: allCorrect ? '¡Excelente!' : 'Algunos errores',
        text: allCorrect ? 'Has respondido correctamente a todas las preguntas.' : 'Hay respuestas incorrectas. Revisa los campos resaltados.',
        icon: allCorrect ? 'success' : 'error',
        confirmButtonText: 'OK',
    });
}

document.addEventListener('DOMContentLoaded', () => {
    loadExercises('cuadrado', 'cuadrado-container');
    loadExercises('jerarquias', 'jerarquias-container');
    loadExercises('despejes', 'despejes-container');
    loadExercises('redondeos', 'redondeos-container');
});

document.getElementById('revisar-cuadrado-btn').addEventListener('click', () => checkExercise('cuadrado'));
document.getElementById('reset-cuadrado-btn').addEventListener('click', () => resetExercises('cuadrado', 'cuadrado-container'));
document.getElementById('new-cuadrado-btn').addEventListener('click', () => resetExercises('cuadrado', 'cuadrado-container'));

document.getElementById('revisar-jerarquias-btn').addEventListener('click', () => checkExercise('jerarquias'));
document.getElementById('reset-jerarquias-btn').addEventListener('click', () => resetExercises('jerarquias', 'jerarquias-container'));
document.getElementById('new-jerarquias-btn').addEventListener('click', () => resetExercises('jerarquias', 'jerarquias-container'));

document.getElementById('revisar-despejes-btn').addEventListener('click', () => checkExercise('despejes'));
document.getElementById('reset-despejes-btn').addEventListener('click', () => resetExercises('despejes', 'despejes-container'));
document.getElementById('new-despejes-btn').addEventListener('click', () => resetExercises('despejes', 'despejes-container'));

document.getElementById('revisar-redondeos-btn').addEventListener('click', () => checkExercise('redondeos'));
document.getElementById('reset-redondeos-btn').addEventListener('click', () => resetExercises('redondeos', 'redondeos-container'));
document.getElementById('new-redondeos-btn').addEventListener('click', () => resetExercises('redondeos', 'redondeos-container'));


function getRandomExercises(arr, count = 5) {
    const shuffled = [...arr].sort(() => 0.5 - Math.random());
    return shuffled.slice(0, Math.min(count, arr.length));
}
function renderExercises(exercises) {
    const exerciseContainer = document.getElementById('fraccionesContent');

    exerciseContainer.innerHTML = '';

    exercises.forEach((exercise, index) => {
        const html = `
            <div class="exercise-container">
                <p class="exercise-description">${exercise.FRACCION_MATH}</p>
                <label class="result-label" for="result-${index + 1}"></label>
                <input type="number" class="result-input" id="result-${index + 1}">
                <span class="feedback" id="feedback-${index + 1}"></span>
            </div>
            <div class="math-answer-exercise" style="display:none;">
                <p class="math-drilling-text">La respuesta correcta es <strong>${exercise.DECIMAL_MATH}</strong></p>
                <button class="answer-button" onclick="showExampleFromFractionByIndex(${index})">
                    Ver en calculadora
                </button>
            </div>
        `;
        exerciseContainer.insertAdjacentHTML('beforeend', html);
    });
}

function showExampleFromFractionByIndex(exerciseIndex) {
    const exercise = currentExercises1[exerciseIndex];
    if (!exercise || !exercise.CALCULADORA_MATH) {
        console.error('Ejercicio no encontrado o sin datos de calculadora');
        return;
    }

    showExampleFromFraction(exercise.CALCULADORA_MATH, exerciseIndex);
}

function showExampleFromFraction(calculatorData, exerciseIndex) {
    const calculator = document.querySelector('#fracciones .calculator');
    if (!calculator) {
        console.error('Calculadora no encontrada en la sección de fracciones');
        return;
    }

    const screen = calculator.querySelector('.screen');
    if (screen) screen.textContent = '0';

    const clearBtn = calculator.querySelector('#all-clear');
    if (clearBtn) clearBtn.click();

    const keyMap = {
        // Operadores
        'X': 'multiply',
        '×': 'multiply',
        '*': 'multiply',
        '÷': 'divide',
        '/': 'divide',
        '+': 'add',
        '-': 'subtract',
        '−': 'subtract',
        '^': 'power',

        // Paréntesis
        '(': 'open-parenthesis',
        ')': 'close-parenthesis',

        // Números
        '0': 'zero',
        '1': 'one',
        '2': 'two',
        '3': 'three',
        '4': 'four',
        '5': 'five',
        '6': 'six',
        '7': 'seven',
        '8': 'eight',
        '9': 'nine',

        // Otros
        '.': 'decimal',
        ',': 'decimal',
        'DEL': 'delete',
        '=': 'equals',
        'AC': 'all-clear',
        'a b/c': 'fraction'
    };

    const clickSequence = async (sequence) => {
        for (const key of sequence) {
            await new Promise(resolve => setTimeout(resolve, 300));

            const btnId = keyMap[key] || key;
            const btn = calculator.querySelector(`#${btnId}`);

            if (btn) {
                btn.click();
                console.log(`Clicked: ${key} -> ${btnId}`);
            } else {
                console.warn(`Button not found for key: ${key} (mapped to: ${btnId})`);
            }
        }
    };

    if (calculatorData && calculatorData.sequence) {
        clickSequence(calculatorData.sequence);
    }

    calculator.scrollIntoView({ behavior: 'smooth', block: 'center' });
}


