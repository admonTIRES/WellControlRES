document.oncontextmenu = function () { return false }
document.addEventListener('DOMContentLoaded', function () {
    const navItems = document.querySelectorAll('.nav-item');

    navItems.forEach(item => {
        item.addEventListener('click', function () {
            navItems.forEach(navItem => navItem.classList.remove('active'));
            this.classList.add('active');

            const activeSection = document.querySelector('.content-section.active');
            const sectionId = this.getAttribute('data-section');
            const newSection = document.getElementById(sectionId);

            if (activeSection !== newSection) {
                activeSection.classList.add('fade-out');
                setTimeout(() => {
                    activeSection.classList.remove('active', 'fade-out');
                    activeSection.style.visibility = 'hidden';

                    newSection.style.visibility = 'visible';
                    newSection.classList.add('active', 'fade-in');
                    setTimeout(() => newSection.classList.remove('fade-in'), 500);
                }, 500);
            }
        });
    });
});

const modal = document.getElementById("exampleModalCenter");
const modalTitle = document.getElementById("exampleModalLongTitle");
const modalText = document.getElementById("exampleModalLText");
const modalImage = document.getElementById("modal-image");

function openModal(title, text, imageSrc) {
    modalTitle.textContent = title;
    modalText.textContent = text;
    if (imageSrc) {
        modalImage.src = imageSrc;
        modalImage.style.display = "block";
    } else {
        modalImage.style.display = "none";
    }
    $(modal).modal('show');
}

function openModal2(title, text) {
    modalTitle.textContent = title;
    modalText.textContent = text;
    $(modal).modal('show');
}

document.addEventListener("DOMContentLoaded", function () {
    const calculator1 = document.getElementById('calculator1');
    if (calculator1) {
        calculator1.querySelectorAll(".btn").forEach((button) => {
            button.addEventListener("click", () => {
                const id = button.id;
                let title = "";
                let text = "";
                let imageSrc = "";

                switch (id) {

                    // ==================== SECCIÓN 1: Sección principal ====================
                    case "shift":
                    case "alpha":
                    case "mode-clear":
                    case "on":
                        title = "Sección principal";
                        text = "Esta sección está conformada por las teclas SHIFT, ALFA, MODE y ON. En esta sección se puede encender y configurar la calculadora.";
                        imageSrc = "/assets/images/principal/calculadora_seccion1.png";
                        break;

                    // ==================== SECCIÓN 2: Funciones de teclas negras ====================
                    case "square":
                    case "square-root":
                    case "sin":
                    case "cos":
                    case "tan":
                    case "comma-xy":
                    case "close-parenthesis":
                    case "open-parenthesis":
                    case "engineering":
                    case "hyperbolic":
                    case "comma":
                    case "negative":
                    case "natural-log":
                    case "log":
                    case "power":
                    case "fraction":
                    case "cube-root":
                    case "polar":
                    case "combination":
                    case "inverse":
                    case "memory-add":
                        title = "Funciones avanzadas";
                        text = "Esta sección incluye funciones avanzadas como elevar al cuadrado, calcular raíces cuadradas y funciones trigonométricas (seno, coseno y tangente).";
                        imageSrc = "/assets/images/principal/calculadora_seccion2.png";
                        break;

                    // ==================== SECCIÓN 3: Operadores de matemáticas básicas ====================
                    case "add":
                    case "subtract":
                    case "multiply":
                    case "divide":
                        title = "Operadores de matemáticas básicas";
                        text = "En esta sección se encuentran los operadores básicos para realizar sumas, restas, multiplicaciones y divisiones.";
                        imageSrc = "/assets/images/principal/calculadora_seccion4.png";
                        break;

                    // ==================== SECCIÓN 4: Teclado numérico ====================
                    case "zero":
                    case "one":
                    case "two":
                    case "three":
                    case "four":
                    case "five":
                    case "six":
                    case "seven":
                    case "eight":
                    case "nine":
                    case "decimal":
                        title = "Teclado numérico";
                        text = "Esta sección permite ingresar números del 0 al 9 y el punto decimal.";
                        imageSrc = "/assets/images/principal/calculadora_seccion3.png";
                        break;

                    // ==================== SECCIÓN 5: Interruptor de apagado ====================
                    case "all-clear":
                    case "delete":
                        title = "Interruptor y borrado";
                        text = "Esta sección permite borrar el contenido de la calculadora o apagarla.";
                        imageSrc = "/assets/images/principal/calculadora_seccion5.png";
                        break;

                    // ==================== SECCIÓN 6: Signo igual y funciones adicionales ====================
                    case "equals":
                    case "answer":
                    case "exponent":
                        title = "Resultado y funciones adicionales";
                        text = "En esta sección puedes calcular el resultado de una operación y acceder a funciones adicionales como la última respuesta (Ans) o notación científica.";
                        imageSrc = "/assets/images/principal/calculadora_seccion6.png";
                        break;

                    default:
                        title = "Botón no reconocido";
                        text = "Este botón no tiene una función asignada.";
                        imageSrc = "/assets/images/principal/bocapozo.png";
                }


                openModal(title, text, imageSrc);
            });
        });
    }

    const calculator2 = document.getElementById('calculator2');
    if (calculator2) {
        calculator2.querySelectorAll(".btn").forEach((button) => {
            button.addEventListener("click", () => {
                const id = button.id;
                let title = "";
                let text = "";

                switch (id) {
                    case "shift":
                        title = "SHIFT";
                        text = "Activa funciones secundarias de los botones.";
                        break;
                    case "alpha":
                        title = "ALPHA";
                        text = "Activa el modo de entrada de letras.";
                        break;
                    case "inverse":
                        title = "Inverso (x⁻¹) / Factorial (x!)";
                        text = "Calcula el inverso de un número o su factorial.";
                        break;
                    case "combination":
                        title = "Combinación (nCr) / Permutación (nPr)";
                        text = "Calcula combinaciones o permutaciones.";
                        break;
                    case "mode-clear":
                        title = "MODE CLR";
                        text = "Cambia el modo o limpia la pantalla.";
                        break;
                    case "on":
                        title = "ON";
                        text = "Enciende la calculadora.";
                        break;
                    case "polar":
                        title = "Pol( / Rec(";
                        text = "Convierte entre coordenadas polares y rectangulares.";
                        break;
                    case "cube-root":
                        title = "x³ / ∛";
                        text = "Eleva un número al cubo o calcula su raíz cúbica.";
                        break;
                    case "fraction":
                        title = "Fracción (a b/c) / Conversión (d/c)";
                        text = "Ingresa fracciones o convierte entre formatos.";
                        break;
                    case "square-root":
                        title = "Raíz cuadrada (√)";
                        text = "Calcula la raíz cuadrada de un número.";
                        break;
                    case "square":
                        title = "x²";
                        text = "Eleva un número al cuadrado.";
                        break;
                    case "power":
                        title = "Exponente (^)";
                        text = "Eleva un número a una potencia.";
                        break;
                    case "log":
                        title = "Logaritmo (log) / 10ˣ";
                        text = "Calcula el logaritmo base 10 o 10 elevado a x.";
                        break;
                    case "natural-log":
                        title = "Logaritmo natural (ln) / eˣ";
                        text = "Calcula el logaritmo natural o e elevado a x.";
                        break;
                    case "negative":
                        title = "Negativo (-)";
                        text = "Ingresa un número negativo.";
                        break;
                    case "comma":
                        title = "Coma (,...)";
                        text = "Ingresa una coma decimal.";
                        break;
                    case "hyperbolic":
                        title = "Hiperbólico (hyp)";
                        text = "Activa funciones hiperbólicas.";
                        break;
                    case "sin":
                        title = "Seno (sin) / Arco seno (sin⁻¹)";
                        text = "Calcula el seno o el arco seno de un número.";
                        break;
                    case "cos":
                        title = "Coseno (cos) / Arco coseno (cos⁻¹)";
                        text = "Calcula el coseno o el arco coseno de un número.";
                        break;
                    case "tan":
                        title = "Tangente (tan) / Arco tangente (tan⁻¹)";
                        text = "Calcula la tangente o el arco tangente de un número.";
                        break;
                    case "recall":
                        title = "RCL / STO";
                        text = "Recupera o almacena un valor en memoria.";
                        break;
                    case "engineering":
                        title = "ENG / ←";
                        text = "Cambia a notación de ingeniería o retrocede.";
                        break;
                    case "open-parenthesis":
                        title = "Paréntesis abierto (()";
                        text = "Abre un paréntesis para agrupar operaciones.";
                        break;
                    case "close-parenthesis":
                        title = "Paréntesis cerrado ())";
                        text = "Cierra un paréntesis para agrupar operaciones.";
                        break;
                    case "comma-xy":
                        title = "Coma (,)";
                        text = "Separa valores en coordenadas.";
                        break;
                    case "memory-add":
                        title = "M+";
                        text = "Añade un valor a la memoria.";
                        break;
                    case "seven":
                        title = "7";
                        text = "Ingresa el número 7.";
                        break;
                    case "eight":
                        title = "8";
                        text = "Ingresa el número 8.";
                        break;
                    case "nine":
                        title = "9";
                        text = "Ingresa el número 9.";
                        break;
                    case "delete":
                        title = "DEL / INS";
                        text = "Borra o inserta un carácter.";
                        break;
                    case "all-clear":
                        title = "AC / OFF";
                        text = "Borra todo o apaga la calculadora.";
                        break;
                    case "four":
                        title = "4";
                        text = "Ingresa el número 4.";
                        break;
                    case "five":
                        title = "5";
                        text = "Ingresa el número 5.";
                        break;
                    case "six":
                        title = "6";
                        text = "Ingresa el número 6.";
                        break;
                    case "multiply":
                        title = "×";
                        text = "Multiplica dos números.";
                        break;
                    case "divide":
                        title = "÷";
                        text = "Divide dos números.";
                        break;
                    case "one":
                        title = "1";
                        text = "Ingresa el número 1.";
                        break;
                    case "two":
                        title = "2";
                        text = "Ingresa el número 2.";
                        break;
                    case "three":
                        title = "3";
                        text = "Ingresa el número 3.";
                        break;
                    case "add":
                        title = "+";
                        text = "Suma dos números.";
                        break;
                    case "subtract":
                        title = "−";
                        text = "Resta dos números.";
                        break;
                    case "zero":
                        title = "0";
                        text = "Ingresa el número 0.";
                        break;
                    case "decimal":
                        title = ".";
                        text = "Ingresa un punto decimal.";
                        break;
                    case "exponent":
                        title = "EXP / π";
                        text = "Ingresa notación científica o el valor de π.";
                        break;
                    case "answer":
                        title = "Ans / DRG▶";
                        text = "Recupera la última respuesta o cambia el modo angular.";
                        break;
                    case "equals":
                        title = "= / %";
                        text = "Calcula el resultado o convierte a porcentaje.";
                        break;
                    default:
                        title = "Botón no reconocido";
                        text = "Este botón no tiene una función asignada.";
                }
                openModal2(title, text);
            });

        });
    }

    // ================= CALCULADORA =================

    const calculator_3 = document.getElementById('calculator3');
    const calculator4 = document.getElementById('calculator4');
    const calculator5 = document.getElementById('calculator5');
    const calculator6 = document.getElementById('calculator6');

    if (calculator_3) {
        initializeCalculator(calculator_3);
    }

    if (calculator4) {
        initializeCalculator(calculator4);
    }
    if (calculator5) {
        initializeCalculator(calculator5);
    }
    if (calculator6) {
        initializeCalculator(calculator6);
    }



function initializeCalculator(calculator) {

        let displayInput = '';
        let evalInput = '';
        let currentInput = '';
        let shouldResetScreen = false;
        let modeState = 0;
        let fixedDecimals = null;

        const screen = calculator.querySelector('#screen');
        const FRACTION_SYMBOL = '⁄';


        const updateScreen = (value, overrideMessage = null) => {
            screen.textContent = overrideMessage ?? (value || '0');
        };

        const clearCalculator = () => {
            displayInput = '';
            evalInput = '';
            currentInput = '';
            shouldResetScreen = false;
            updateScreen('0');
        };

        const truncateDecimals = (value, max = 4) => {
            if (!value.includes('.')) return value;

            const [i, d] = value.split('.');
            const truncated = d.slice(0, max);
            const cleaned = truncated.replace(/0+$/, '');

            return cleaned ? `${i}.${cleaned}` : i;
        };

       const formatResult = (value) => {
            if (value === 'Error') return 'Error';

            const num = Number(value);
            if (!Number.isFinite(num)) return 'Error';

            const cleaned = Math.round(num * 1e12) / 1e12;

            const factor = 10 ** 4;

            const truncated = Math.trunc(cleaned * factor) / factor;

            return truncated.toString();
        };


        const evaluateExpression = () => {
            try {
                return Function('"use strict";return (' + evalInput + ')')().toString();
            } catch (e) {
                console.error('❌ ERROR eval:', e.message);
                return 'Error';
            }
        };

        const closePendingSqrtIfNeeded = (incomingValue) => {

            const hasOpenSqrt = /sqrt\([^)]*$/.test(evalInput);

            if (!hasOpenSqrt) return;

            if (/^[0-9.]$/.test(incomingValue)) {
                return;
            }

            if (
                incomingValue === '=' ||
                /^[+\-×÷*/^)]$/.test(incomingValue)
            ) {
                evalInput += ')';
            }
        };

        calculator.querySelectorAll('.btn').forEach((button) => {
            button.addEventListener('click', () => {

            const value = button.getAttribute('data-value')
                || button.textContent.split('\n')[0].trim();


            if (button.id === 'all-clear') {
                clearCalculator();
                return;
            }

            if (button.id === 'delete') {
                displayInput = displayInput.slice(0, -1);
                evalInput = evalInput.slice(0, -1);
                updateScreen(displayInput);
                return;
            }

            if (button.id === 'equals') {
                if (evalInput) {
                    closePendingSqrtIfNeeded('=');

                    const raw = evaluateExpression();
                    const final = formatResult(raw);

                    displayInput = final;
                    evalInput = final;
                    updateScreen(final);
                    shouldResetScreen = true;
                }
                return;
            }

            const isNumber = button.classList.contains('number') || button.id === 'decimal';
            const isOperator = button.classList.contains('operator');
            const isParen = button.classList.contains('parentesis');

            if (shouldResetScreen && isNumber) {
                if (!window.__reproduciendoEjemplo) {
                    displayInput = '';
                    evalInput = '';
                }
                shouldResetScreen = false;
            }

            if (value === '^2' || value === '²') {
                displayInput += '²';
                evalInput += '**2';
            }
            else if (value === '^') {
                displayInput += '^';
                evalInput += '**';
            }

            else if (value === '×') {
                closePendingSqrtIfNeeded(value);
                displayInput += '×';
                evalInput += '*';
            }
            else if (value === '÷') {
                closePendingSqrtIfNeeded(value);
                displayInput += '÷';
                evalInput += '/';
            }
            else if (value === '−') {
                closePendingSqrtIfNeeded(value);
                displayInput += '−';
                evalInput += '-';
            }

            else if (value === 'ab/c') {
                const lastEvalChar = evalInput.slice(-1);

                if (!lastEvalChar || /[+\-*/(]$/.test(lastEvalChar)) {
                    displayInput += '1' + FRACTION_SYMBOL;
                    evalInput += '1/';
                } else {
                    displayInput += FRACTION_SYMBOL;
                    evalInput += '/';
                }
            }

            else if (value === '√') {
                    displayInput += '√';
                    evalInput += 'Math.sqrt(';
            }


            else if (isNumber || isOperator || isParen) {

                const lastEvalChar = evalInput.slice(-1);

                const incomingIsNumber = /^[0-9.]$/.test(value);
                const incomingIsParenOpen = value === '(';

                const lastIsNumber = /[0-9.]$/.test(lastEvalChar);
                const lastIsParenClose = lastEvalChar === ')';

                if (
                    (lastIsParenClose && incomingIsParenOpen) ||
                    (lastIsParenClose && incomingIsNumber) ||
                    (lastIsNumber && incomingIsParenOpen)
                ) {
                    evalInput += '*';
                }

                closePendingSqrtIfNeeded(value);

                displayInput += value;
                evalInput += value;
            }

            updateScreen(displayInput);
        });
    });

}

    



    // ================= FIN CALCULADORA =================


});

function toggleSpeakText(audioId) {
    const audioPlayer = document.getElementById(audioId);
    const button = document.querySelector(`button[onclick="toggleSpeakText('${audioId}')"]`);

    document.querySelectorAll('audio').forEach(audio => {
        if (audio.id !== audioId) {
            audio.pause();
            audio.currentTime = 0;
            const otherButton = document.querySelector(`button[onclick="toggleSpeakText('${audio.id}')"]`);
            if (otherButton) {
                otherButton.querySelector('.material-icons').textContent = 'volume_up';
                otherButton.querySelector('span:last-child').textContent = 'Escuchar';
            }
        }
    });

    if (audioPlayer.paused) {
        audioPlayer.play();
        button.querySelector('.material-icons').textContent = 'volume_off';
        button.querySelector('span:last-child').textContent = 'Detener';
    } else {
        audioPlayer.pause();
        audioPlayer.currentTime = 0;
        button.querySelector('.material-icons').textContent = 'volume_up';
        button.querySelector('span:last-child').textContent = 'Escuchar';
    }
}

document.querySelectorAll("li").forEach((item) => {
    item.addEventListener("click", function () {
        iluminarSeccion(this);
    });

    item.addEventListener("mouseover", function () {
        iluminarSeccion(this);
    });

    item.addEventListener("mouseout", function () {
        quitarBorde();
    });
});

function iluminarSeccion(li) {
    let section = li.getAttribute("data-section");


    quitarBorde();

    if (section === "screen") {
        document.querySelectorAll(".screen").forEach(div => {
            div.style.border = "4px solid #d2ff93";
        });
    }
    if (section === "seccion1") {
        document.querySelectorAll(".seccion1").forEach(div => {
            div.style.border = "4px solid #A4D65E";
        });
    }
    if (section === "seccion2") {
        document.querySelectorAll(".seccion2").forEach(div => {
            div.style.border = "4px solid #5fbae8";
        });
    }
    if (section === "seccion3") {
        document.querySelectorAll(".seccion3").forEach(div => {
            div.style.border = "4px solid #007DBA";
        });
    }
    if (section === "seccion4") {
        document.querySelectorAll(".seccion4").forEach(div => {
            div.style.border = "4px solid #236192";
        });
    }
    if (section === "seccion5") {
        document.querySelectorAll(".seccion5").forEach(div => {
            div.style.border = "4px solid #FF585D";
        });
    }
    if (section === "seccion6") {
        document.querySelectorAll(".seccion6").forEach(div => {
            div.style.border = "4px solid #ff9da0";
        });
    }
    if (section === "sum") {
        document.querySelectorAll(".sum").forEach(div => {
            div.style.border = "4px solid #d2ff93";
            div.style.background = "#d2ff93";
            div.style.color = "black";
        });
        showExampleFunctions('sum');
    }
    if (section === "rest") {
        document.querySelectorAll(".rest").forEach(div => {
            div.style.border = "4px solid #A4D65E";
            div.style.background = "#A4D65E";
            div.style.color = "black";
        });
        showExampleFunctions('rest');
    }
    if (section === "multiplicate") {
        document.querySelectorAll(".multiplicate").forEach(div => {
            div.style.border = "4px solid #5fbae8";
            div.style.background = "#5fbae8";
            div.style.color = "black";
        });
        showExampleFunctions('multiplicate');
    }
    if (section === "division") {
        document.querySelectorAll(".division").forEach(div => {
            div.style.border = "4px solid #007DBA";
            div.style.background = "#007DBA";
            div.style.color = "black";
        });
        showExampleFunctions('division');
    }
    if (section === "elevate") {
        document.querySelectorAll(".elevate").forEach(div => {
            div.style.border = "4px solid #236192";
            div.style.background = "#236192";
            div.style.color = "black";
        });
        showExampleFunctions('elevate');
    }
    if (section === "parentesis") {
        document.querySelectorAll(".parentesis").forEach(div => {
            div.style.border = "4px solid #FF585D";
            div.style.background = "#FF585D";
            div.style.color = "black";
        });
        showExampleFunctions('parentesis');
    }
    if (section === "result") {
        document.querySelectorAll(".result").forEach(div => {
            div.style.border = "4px solid #ff9da0";
            div.style.background = "#ff9da0";
            div.style.color = "black";
        });
        showExampleFunctions('result');
    }
    if (section === "percent") {
        document.querySelectorAll(".result").forEach(div => {
            div.style.border = "4px solid #ff9da0";
            div.style.background = "#ff9da0";
            div.style.color = "black";
        });
        document.querySelectorAll(".shift").forEach(div => {
            div.style.border = "4px solid #ff9da0";
            div.style.background = "#ff9da0";
            div.style.color = "black";
        });
        showExampleFunctions('percent');
    }
}

function showExampleFunctions(type) {
    const screen = calculator2.querySelector('#screen');
    screen.innerHTML = '';
    switch (type) {
        case 'sum':
            const line1 = document.createElement('div');
            line1.textContent = '10 + 5';
            const line2 = document.createElement('div');
            line2.textContent = '15';
            line2.style.marginLeft = '200px';
            screen.appendChild(line1);
            screen.appendChild(line2);
            break;
        case 'rest':
            const restLine1 = document.createElement('div');
            restLine1.textContent = '10 - 5';
            const restLine2 = document.createElement('div');
            restLine2.textContent = '5';
            restLine2.style.marginLeft = '200px';
            screen.appendChild(restLine1);
            screen.appendChild(restLine2);
            break;

        case 'multiplicate':
            const multiLine1 = document.createElement('div');
            multiLine1.textContent = '10 x 5';
            const multiLine2 = document.createElement('div');
            multiLine2.textContent = '50';
            multiLine2.style.marginLeft = '200px';
            screen.appendChild(multiLine1);
            screen.appendChild(multiLine2);
            break;

        case 'division':
            const divLine1 = document.createElement('div');
            divLine1.textContent = '10 ÷ 5';
            const divLine2 = document.createElement('div');
            divLine2.textContent = '2';
            divLine2.style.marginLeft = '200px';
            screen.appendChild(divLine1);
            screen.appendChild(divLine2);
            break;

        case 'elevate':
            const elevateLine1 = document.createElement('div');
            elevateLine1.textContent = '10²';
            const elevateLine2 = document.createElement('div');
            elevateLine2.textContent = '100';
            elevateLine2.style.marginLeft = '200px';
            screen.appendChild(elevateLine2);
            break;

        case 'parentesis':
            const parenLine1 = document.createElement('div');
            parenLine1.textContent = '(10 ÷ 5) + 0.052';
            const parenLine2 = document.createElement('div');
            parenLine2.textContent = '2.052';
            parenLine2.style.marginLeft = '200px';
            screen.appendChild(parenLine1);
            screen.appendChild(parenLine2);
            break;
        case 'result':
            screen.textContent = '';
            break;
        case 'percent':
            const percentLine1 = document.createElement('div');
            percentLine1.textContent = '100 x 50%';
            const percentLine2 = document.createElement('div');
            percentLine2.textContent = '50';
            percentLine2.style.marginLeft = '200px';
            screen.appendChild(percentLine1);
            screen.appendChild(percentLine2);
            break;
        default:
            break;
    }

}

function quitarBorde() {
    document.querySelectorAll(".screen, .seccion1, .seccion2, .seccion3, .seccion4, .seccion5, .seccion6").forEach(div => {
        div.style.border = "none";
    });
    document.querySelectorAll(".parentesis, .elevate").forEach(div => {
        div.style.border = "none";
        div.style.background = "linear-gradient(145deg,rgb(42, 37, 37), rgb(0, 0, 0))";
        div.style.color = "white";
    });
    document.querySelectorAll(".sum, .rest, .multiplicate, .division, .result, .shift").forEach(div => {
        div.style.border = "none";
        div.style.background = " linear-gradient(145deg, rgba(200, 196, 196, 1), rgb(135, 135, 135))";
        div.style.color = "black";
    });
}


let currentExercises1 = getNonRepeatingExercises(
    'fracciones',
    allFracciones,
    5
);

renderExercises(currentExercises1);
document.getElementById('reset_btn').addEventListener('click', function () {
    currentExercises1 = getNonRepeatingExercises(
        'fracciones',
        allFracciones,
        5
    );
    renderExercises(currentExercises1);
});


document.querySelectorAll('.nav-item').forEach(item => {
    item.addEventListener('click', function () {
        const section = this.getAttribute('data-section');

        if (!exerciseSections.includes(section)) return;

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



const exerciseSections = [
    'cuadrado',
    'jerarquias',
    'despejes',
    'redondeos'
];



function loadExercises(type, containerId) {
    const container = document.getElementById(containerId);

    if (!container) {
        console.warn(`Contenedor no existe: ${containerId}`);
        return;
    }

    container.innerHTML = '';


    const allExercises = exercisesData[type];
    if (!allExercises || !Array.isArray(allExercises) || allExercises.length === 0) {
        const msg = document.createElement('p');
        msg.textContent = 'Ningún ejercicio disponible';
        msg.style.fontStyle = 'italic';
        msg.style.color = 'gray';
        container.appendChild(msg);
        return;
    }

   currentExercises[type] = getNonRepeatingExercises(
    type,
    allExercises,
    5
    );


    const calculatorIdMap = {
        'cuadrado': 'calculator4',
        'jerarquias': 'calculator5',
        'despejes': 'calculator6'
    };

    const calculatorButtonHTML = (type !== 'redondeos')
        ? (qNum) => `
            <button class="answer-button"
                onclick="showExampleGlobal('${type}', ${qNum}, '${calculatorIdMap[type]}')">
                Ver en calculadora
            </button>
        `
        : () => '';


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
                    ${calculatorButtonHTML(qNum)}
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


function getNonRepeatingExercises(type, allExercises, count = 5) {

    if (!window.exercisePool) window.exercisePool = {};
    if (!window.usedPool) window.usedPool = {};

    if (!exercisePool[type] || exercisePool[type].length === 0) {
        exercisePool[type] = [...allExercises];
        usedPool[type] = [];
    }

    if (exercisePool[type].length < count) {
        exercisePool[type] = [...allExercises];
        usedPool[type] = [];
    }

    exercisePool[type].sort(() => 0.5 - Math.random());

    const selected = exercisePool[type].splice(0, count);

    usedPool[type].push(...selected);

    return selected;
}





function showExampleGlobal(type, qNum, calculatorId) {

    const exercise = currentExercises[type][qNum - 1];
    if (!exercise || !exercise.CALCULADORA_MATH) return;

    const calculator = document.getElementById(calculatorId);
    if (!calculator) return;

    window.__reproduciendoEjemplo = true;

    const screen = calculator.querySelector('.screen');
    if (screen) screen.textContent = '0';

    const clearBtn = calculator.querySelector('#all-clear');
    if (clearBtn) clearBtn.click();

    const keyMap = {
        '×': 'multiply',
        '*': 'multiply',
        '÷': 'divide',
        '/': 'divide',
        '+': 'add',
        '-': 'subtract',
        '−': 'subtract',
        '^': 'power',
        '^2': 'square',
        '²': 'square',
        '(' : 'open-parenthesis',
        ')': 'close-parenthesis',
        'ab/c': 'fraction',
        '√': 'square-root',  
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
        '=': 'equals'
    };

    const clickSequence = async (sequence) => {

        for (const key of sequence) {

            await new Promise(r => setTimeout(r, 700));

            const btnId = keyMap[key];
            if (!btnId) continue;

            const btn = calculator.querySelector(`#${btnId}`);
            if (!btn) continue;

            btn.classList.add('btn-pressed');
            btn.click();

            setTimeout(() => btn.classList.remove('btn-pressed'), 400);
        }

        window.__reproduciendoEjemplo = false;
    };

    clickSequence(exercise.CALCULADORA_MATH.sequence);
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
        'ab/c': 'fraction',

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


