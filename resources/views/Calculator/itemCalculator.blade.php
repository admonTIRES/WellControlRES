   <style>
      .calculator {
        width: 330px;
        max-height: 600px;
        padding: 40px 30px;
        border-radius: 20px 20px 60px 60px;
        font-family: Arial, sans-serif;
        
        /* Fondo con gradiente */
        background: linear-gradient(145deg, rgba(59, 68, 107, 1), rgba(40, 48, 79, 1));

        /* Sombras para el efecto 3D */
        box-shadow: 8px 8px 15px rgba(0, 0, 0, 0.3), 
                    -8px -8px 15px rgba(255, 255, 255, 0.3);
        box-shadow: inset -4px -4px 8px rgba(0, 0, 0, 0.5);

        /* Borde con efecto de profundidad */
        border: 3px solid rgba(75, 88, 120, 0.5);
        }


        .screen {
            background: #c3ceb0;
            padding: 15px;
            margin: 10px 0 20px;
            border-radius: 5px;
            min-height: 80px;
            box-shadow: inset 0 4px 8px rgba(0, 0, 0, 0.8);
        }

        .display-circle {
            width: 80px;
            height: 60px;
            background: #d9d9d9;
            border-radius: 50%;
            margin: 5px auto;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7em;
            color: #666;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.4),
                0 1px 2px rgba(255, 255, 255, 0.1);
        }

        .topButtons {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
            margin-bottom: 8px;
            margin-top: 8px;
        }


        .top-section {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
            margin-bottom: 8px;
        }

        .function-section {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 8px;
            margin-bottom: 8px;
        }

        .keypad-section {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 8px;
        }

        .btn {
            position: relative;
            padding: 8px 2px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .top-row {
            background:linear-gradient(145deg, rgb(226, 225, 225), rgb(187, 187, 187));
            color: black;
            font-size: 0.45em;
            max-height: 25px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2), 
            -5px -5px 10px rgba(0, 0, 0, 0.2);
        }

        .number,
        .operator {
            background: linear-gradient(145deg, rgba(200, 196, 196, 1), rgb(135, 135, 135));
            color: black;
            font-weight: bold;
            font-size: 1em;
            min-height: 20px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2), 
              -5px -5px 10px rgba(0, 0, 0, 0.2);
        }

        .function {
            background:linear-gradient(145deg,rgb(42, 37, 37), rgb(0, 0, 0));
            color: white;
            font-size: 0.7em;
            min-height: 28px;
            padding: 4px 2px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2), 
            -5px -5px 10px rgba(0, 0, 0, 0.2);
        }

        .shift-text {
            color:rgb(255, 166, 0);
            position: absolute;
            top: 2px;
            left: 3px;
            font-size: 0.6em;
            font-weight: bold;
        }

        .secondary-text {
            color: #ffd700;
            position: absolute;
            bottom: 2px;
            left: 3px;
            font-size: 0.6em;
        }

        .blue-text {
            color: #87CEEB;
            position: absolute;
            bottom: 2px;
            right: 3px;
            font-size: 0.6em;
        }

        .del-ac {
            background:linear-gradient(170deg,rgb(192, 75, 100), rgb(67, 39, 39));
            color: white;
            font-size: 0.9em;
            min-height: 40px;
        }

        .alpha-text {
            color: #ff4757;
            font-weight: bold;
        }
        .shift-title {
            color:rgb(255, 137, 20);
            font-weight: bold;
        }

        .letter-label {
            color: #ff4757;
            position: absolute;
            bottom: 2px;
            right: 3px;
            font-size: 0.6em;
        }

        .s-var {
            color: #4169e1;
            font-size: 0.6em;
        }

        .information {
            border-radius: 10px;
            font-family: Arial, sans-serif; 
            color: #fff; 
            max-width: 300px; 
            margin: 0 auto; 
            display: flex; 
            justify-content: space-between; 
            align-items: center;
        }

        .calculator-brand {
            font-size: 1.5rem; 
            font-weight: bold;
            margin: 10px 0; 
            color:rgb(255, 255, 255); 
        }

        .calculator-model {
            font-size: 1.2rem; 
            font-weight: normal; 
            margin: 10px 0; 
            color:rgb(255, 255, 255); 
        }
    </style>
<div id="{{ $id }}" name="{{ $id }}" class="calculator">
    <div class="information">
        <p class="calculator-brand">CASIO</p>
        <p class="calculator-model">fx-82MS</p>
    </div>
    <div id="screen" class="screen">Enter</div>

    <div class="top-section">
        <div class="parButtons">
            <div class="topButtons seccion1">
                <button id="shift" class="btn top-row shift"><span class="shift-title">SHIFT</span></button>
                <button id="alpha" class="btn top-row"><span class="alpha-text">ALPHA</span></button>
            </div>
            <div class="topButtons seccion2">
                <button id="inverse" class="btn function">x⁻¹<span class="shift-text">x!</span></button>
                <button id="combination" class="btn function">nCr<span class="shift-text">nPr</span></button>
            </div>
        </div>
        <div class="display-circle">REPLAY</div>
        <div class="parButtons">
            <div class="topButtons seccion1">
                <button id="mode-clear" class="btn top-row">MODE<span class="shift-text">CLR</span></button>
                <button id="on" class="btn top-row">ON</button>
            </div>
            <div class="topButtons seccion2">
                <button id="polar" class="btn function">Pol(<span class="shift-text">Rec( :</span></button>
                <button id="cube-root" class="btn function">x³<span class="shift-text"> ∛</span></button>
            </div>
        </div>
    </div>

    <div class="function-section seccion2">
        <button id="fraction" class="btn function">a b/c<span class="shift-text">d/c</span></button>
        <button id="square-root" class="btn function">√</button>
        <button id="square" class="btn function elevate">x²</button>
        <button id="power" class="btn function">^</button>
        <button id="log" class="btn function">log<span class="shift-text">10ˣ</span></button>
        <button id="natural-log" class="btn function">ln<span class="shift-text">eˣ</span></button>

        <button id="negative" class="btn function">(-)<span class="letter-label">A</span></button>
        <button id="comma" class="btn function">,...<span class="letter-label">B</span></button>
        <button id="hyperbolic" class="btn function">hyp<span class="letter-label">C</span></button>
        <button id="sin" class="btn function">sin<span class="shift-text">sin⁻¹</span></button>
        <button id="cos" class="btn function">cos<span class="shift-text">cos⁻¹</span></button>
        <button id="tan" class="btn function">tan<span class="shift-text">tan⁻¹</span></button>

        <button id="recall" class="btn function">RCL<span class="shift-text">STO</span></button>
        <button id="engineering" class="btn function">ENG<span class="shift-text">←</span></button>
        <button id="open-parenthesis" class="btn function parentesis">(</button>
        <button id="close-parenthesis" class="btn function parentesis">)<span class="letter-label">X</span></button>
        <button id="comma-xy" class="btn function">,<span class="letter-label">Y</span></button>
        <button id="memory-add" class="btn function">M+<span class="letter-label">M</span></button>
    </div>

    <div class="keypad-section">
        <button id="seven" class="btn number seccion3">7</button>
        <button id="eight" class="btn number seccion3">8</button>
        <button id="nine" class="btn number seccion3">9</button>
        <button id="delete" class="btn del-ac seccion4">DEL<span class="shift-text">INS</span></button>
        <button id="all-clear" class="btn del-ac seccion4">AC<span class="shift-text">OFF</span></button>

        <button id="four" class="btn number seccion3">4</button>
        <button id="five" class="btn number seccion3">5</button>
        <button id="six" class="btn number seccion3">6</button>
        <button id="multiply" class="btn operator seccion5 multiplicate">×</button>
        <button id="divide" class="btn operator seccion5 division">÷</button>

        <button id="one" class="btn number seccion3">1</button>
        <button id="two" class="btn number seccion3">2</button>
        <button id="three" class="btn number seccion3">3</button>
        <button id="add" class="btn operator seccion5 sum">+</button>
        <button id="subtract" class="btn operator seccion5 rest">−</button>

        <button id="zero" class="btn number seccion3">0</button>
        <button id="decimal" class="btn number seccion6">.</button>
        <button id="exponent" class="btn number seccion6">EXP<span class="shift-text">π</span></button>
        <button id="answer" class="btn number seccion6">Ans<span class="shift-text">DRG▶</span></button>
        <button id="equals" class="btn operator seccion6 result">=<span class="shift-text">%</span></button>
    </div>
</div>
