<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>International Well Control Forum - Pozo Desviado</title>
    <style>
             body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        
        .kill-sheet {
            border: 2px solid #000;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .header {
            display: flex;
            border-bottom: 2px solid #000;
        }
        
        .header-left {
            width: 70%;
            padding: 10px;
            text-align: center;
            border-right: 2px solid #000;
        }
        
        .header-right {
            width: 30%;
            padding: 10px;
        }
        
        .title {
            font-weight: bold;
            text-align: center;
            margin: 5px 0;
        }
        
        .subtitle {
            text-align: center;
            margin: 5px 0;
        }
        
        .fecha-label {
            margin-bottom: 15px;
        }
        
        .nombre-label {
            margin-top: 15px;
        }
        
        .form-row {
            display: flex;
            border-bottom: 2px solid #000;
        }
        
        .form-label {
            width: 30%;
            padding: 10px;
            border-right: 2px solid #000;
            font-weight: bold;
        }
        
        .form-content {
            width: 70%;
            padding: 10px;
            display: flex;
            flex-direction: column;
        }
        
        .form-equation {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 5px 0;
        }
        
        .input-group {
            display: flex;
            align-items: center;
            margin: 5px 0;
        }
        
        .input-field {
            border: 1px solid #000;
            height: 25px;
            width: 120px;
            margin: 0 5px;
        }
        
        .operator {
            margin: 0 10px;
            font-weight: bold;
        }
        
        .unit {
            margin-left: 5px;
            color: #800000;
        }
        
        .small-title {
            font-weight: bold;
            text-align: center;
            margin: 5px 0;
            font-size: 0.9em;
        }
        
        .bracket {
            font-size: 24px;
            margin: 0 5px;
        }
        
        .advanced-equation {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 10px 0;
        }
        
        .parameter-row {
            display: flex;
            border-bottom: 2px solid #000;
            background-color: #f0f0f0;
        }
        
        .calculation-row {
            display: flex;
            justify-content: space-around;
            margin: 10px 0;
        }
        
        .calculation-group {
            display: flex;
            align-items: center;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 800px;
            margin: 0 auto;
            border: 2px solid #000;
        }
        .header {
            display: flex;
            justify-content: space-between;
            border-bottom: 2px solid #000;
        }
        .header-left {
            width: 65%;
            padding: 10px;
            text-align: center;
        }
        .header-right {
            width: 35%;
            border-left: 2px solid #000;
        }
        .title {
            font-weight: bold;
            text-align: center;
            margin-bottom: 5px;
        }
        .subtitle {
            text-align: center;
            font-weight: bold;
            color: darkgreen;
        }
        .form-row {
            display: flex;
            margin-bottom: 5px;
            align-items: center;
        }
        .form-label {
            flex: 3;
        }
        .form-input {
            flex: 1;
        }
        .form-unit {
            flex: 1;
            padding-left: 5px;
        }
        input {
            width: 90%;
            padding: 2px;
            border: 1px solid #000;
        }
        .main-content {
            display: flex;
        }
        .left-section {
            width: 60%;
            padding: 10px;
            border-right: 1px solid #000;
        }
        .right-section {
            width: 40%;
            padding: 10px;
        }
        .section-title {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .box {
            border: 1px solid #000;
            padding: 5px;
            margin-bottom: 10px;
        }
        .formula-box {
            display: flex;
            align-items: center;
            margin: 5px 0;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #000;
            padding: 5px;
            text-align: center;
        }
        .capacity-container {
            display: flex;
            justify-content: space-between;
        }
        .capacity-box {
            width: 48%;
            border: 1px solid #000;
            text-align: center;
            padding: 5px;
        }
        .volumes-grid {
            display: grid;
            grid-template-columns: 3fr 1fr 1fr 1fr 1fr 1fr;
            gap: 2px;
            margin-top: 10px;
        }
        .volumes-grid > div {
            border: 1px solid #000;
            padding: 5px;
            background-color: #f9f9f9;
        }
        .grid-highlighted {
            background-color: #e6e6e6 !important;
        }
        .right-diagram {
            text-align: center;
            margin-top: 20px;
        }
        .eq-box {
            display: flex;
            align-items: center;
            margin: 5px 0;
            border: 1px solid #000;
            padding: 5px;
        }
        .chart-area {
            width: 100%;
            height: 400px;
            border: 1px solid #000;
            background-color: #f0f0f0;
            margin-top: 10px;
            position: relative;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(25, 1fr);
            grid-template-rows: repeat(20, 1fr);
            height: 100%;
            width: 100%;
        }
        .grid-item {
            border: 1px solid #ccc;
        }
        .vertical-text {
            writing-mode: vertical-rl;
            transform: rotate(180deg);
            text-align: center;
            padding: 10px;
            font-size: 12px;
        }
        .bottom-chart {
            border: 1px solid #000;
            margin-top: 20px;
            padding: 5px;
            height: 60px;
        }
        .bottom-grid {
            display: grid;
            grid-template-columns: repeat(25, 1fr);
            grid-template-rows: 2;
            height: 100%;
        }
        .bottom-header {
            border-right: 1px solid #000;
            padding: 2px;
            font-size: 10px;
        }
    </style>
</head>
<body>
    <!-- Page 1 -->
    <div class="container">
        <div class="header">
            <div class="header-left">
                <div class="title">International Well Control Forum</div>
                <div class="subtitle">HOJA DE MATAR PARA EL CONTROL DE POZO DESVIADO</div>
                <div class="subtitle">BOP DE SUPERFICIE (UNIDADES API)</div>
            </div>
            <div class="header-right">
                <div class="form-row">
                    <div class="form-label" style="padding-left: 10px;">FECHA:</div>
                    <div class="form-input"><input type="text"></div>
                </div>
                <div class="form-row">
                    <div class="form-label" style="padding-left: 10px;">NOMBRE:</div>
                    <div class="form-input"><input type="text"></div>
                </div>
            </div>
        </div>

        <div class="main-content">
            <div class="left-section">
                <div class="section-title">Datos de resistencia de la formación:</div>
                <div class="form-row">
                    <div class="form-label">Presión de fuga (leak-off) en la superficie obtenida con la prueba de resistencia de la formación</div>
                    <div class="form-input">(A) <input type="text"></div>
                    <div class="form-unit">psi</div>
                </div>
                <div class="form-row">
                    <div class="form-label">Densidad del lodo durante la prueba</div>
                    <div class="form-input">(B) <input type="text"></div>
                    <div class="form-unit">ppg</div>
                </div>
                <div class="form-row">
                    <div class="form-label">Máxima densidad del lodo permitida = (A) ÷ </div>
                    <div class="form-input">(C) <input type="text"></div>
                    <div class="form-unit">ppg</div>
                </div>
                <div class="form-row">
                    <div class="form-label">TVD de la zapata de la TR x 0.052</div>
                </div>
                <div class="form-row">
                    <div class="form-label">MAASP inicial (Presión anular máxima permitida en la superficie)</div>
                </div>
                <div class="form-row">
                    <div class="form-label">(KD) - Densidad del lodo actual</div>
                    <div class="form-label">x</div>
                    <div class="form-label">TVD de la zapata</div>
                    <div class="form-label">x 0.052 =</div>
                    <div class="form-input"><input type="text"></div>
                    <div class="form-unit">psi</div>
                </div>

                <div class="capacity-container">
                    <div class="capacity-box">
                        <div>Capacidad de la bomba No.1</div>
                        <div>bbls/stroke</div>
                    </div>
                    <div class="capacity-box">
                        <div>Capacidad de la bomba No. 2</div>
                        <div>bbls/stroke</div>
                    </div>
                </div>

                <div class="box">
                    <div class="section-title" style="text-align: center;">(PL) Caída de presión dinámica</div>
                    <table class="table">
                        <tr>
                            <th>Tasa reducida de la bomba</th>
                            <th>Bomba No. 1</th>
                            <th>Bomba No. 2</th>
                        </tr>
                        <tr>
                            <td>SPM</td>
                            <td><input type="text"></td>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <td>SPM</td>
                            <td><input type="text"></td>
                            <td><input type="text"></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="right-section">
                <div class="box">
                    <div class="section-title">Densidad del lodo</div>
                    <div class="form-row">
                        <div class="form-label">Densidad:</div>
                        <div class="form-input"><input type="text"></div>
                        <div class="form-unit">ppg</div>
                    </div>
                    <div class="form-row">
                        <div class="form-label">Gradiente:</div>
                        <div class="form-input"><input type="text"></div>
                        <div class="form-unit">psi/pies</div>
                    </div>
                </div>

                <div class="box">
                    <div class="section-title">Datos de la desviación</div>
                    <div class="form-row">
                        <div class="form-label">Profundidad medida del KOP</div>
                        <div class="form-input"><input type="text"></div>
                        <div class="form-unit">pies</div>
                    </div>
                    <div class="form-row">
                        <div class="form-label">TVD del KOP</div>
                        <div class="form-input"><input type="text"></div>
                        <div class="form-unit">pies</div>
                    </div>
                    <div class="form-row">
                        <div class="form-label">Profundidad medida del EOB</div>
                        <div class="form-input"><input type="text"></div>
                        <div class="form-unit">pies</div>
                    </div>
                    <div class="form-row">
                        <div class="form-label">TVD del EOB</div>
                        <div class="form-input"><input type="text"></div>
                        <div class="form-unit">pies</div>
                    </div>
                </div>

                <div class="box">
                    <div class="section-title">Datos de la TR de la zapata</div>
                    <div class="form-row">
                        <div class="form-label">Tamaño</div>
                        <div class="form-input"><input type="text"></div>
                        <div class="form-unit">pulg</div>
                    </div>
                    <div class="form-row">
                        <div class="form-label">Profundidad medida</div>
                        <div class="form-input"><input type="text"></div>
                        <div class="form-unit">pies</div>
                    </div>
                    <div class="form-row">
                        <div class="form-label">TVD</div>
                        <div class="form-input"><input type="text"></div>
                        <div class="form-unit">pies</div>
                    </div>
                </div>

                <div class="box">
                    <div class="section-title">Datos del agujero</div>
                    <div class="form-row">
                        <div class="form-label">Tamaño</div>
                        <div class="form-input"><input type="text"></div>
                        <div class="form-unit">pulg</div>
                    </div>
                    <div class="form-row">
                        <div class="form-label">Profundidad medida</div>
                        <div class="form-input"><input type="text"></div>
                        <div class="form-unit">pies</div>
                    </div>
                    <div class="form-row">
                        <div class="form-label">TVD</div>
                        <div class="form-input"><input type="text"></div>
                        <div class="form-unit">pies</div>
                    </div>
                </div>

                <div class="right-diagram">
                    <img src="/api/placeholder/180/300" alt="Diagrama de pozo desviado">
                </div>
            </div>
        </div>

        <div style="margin-top: 10px;">
            <table class="table">
                <tr style="background-color: #f0f0f0;">
                    <th>Datos pre-registrados de los volúmenes</th>
                    <th>LONGITUD (pies)</th>
                    <th>CAPACIDAD (bbls/pie)</th>
                    <th>VOLUMEN (bbls)</th>
                    <th>Estroques de la bomba (Strokes)</th>
                    <th>Tiempo (min)</th>
                </tr>
                <tr>
                    <td>TP - De superficie a KOP</td>
                    <td><input type="text"></td>
                    <td>x</td>
                    <td>=</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <td>TP - De KOP a EOB</td>
                    <td><input type="text"></td>
                    <td>x</td>
                    <td>=</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <td>TP - De EOB a BHA</td>
                    <td><input type="text"></td>
                    <td>x</td>
                    <td>=</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <td>TP Estresada - (HWDP)</td>
                    <td><input type="text"></td>
                    <td>x</td>
                    <td>=</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <td>Drill Collar (Lastrabarrenas)</td>
                    <td><input type="text"></td>
                    <td>x</td>
                    <td>=</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
                <tr style="background-color: #f0f0f0;">
                    <td>Volumen de la sarta de perforación</td>
                    <td colspan="2"></td>
                    <td>(D) <input type="text" style="width: 70%;"></td>
                    <td><input type="text"></td>
                    <td>min</td>
                </tr>
                <tr>
                    <td>Lastrabarrenas x agujero abierto</td>
                    <td><input type="text"></td>
                    <td>x</td>
                    <td>=</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <td>TP/ HWDP x agujero abierto</td>
                    <td><input type="text"></td>
                    <td>x</td>
                    <td>=</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
                <tr style="background-color: #f0f0f0;">
                    <td>Volumen del agujero abierto</td>
                    <td colspan="2"></td>
                    <td>(F) <input type="text" style="width: 70%;"></td>
                    <td><input type="text"></td>
                    <td>min</td>
                </tr>
                <tr>
                    <td>TP x Tubería de Revestimiento</td>
                    <td><input type="text"></td>
                    <td>x</td>
                    <td>=(G) <input type="text" style="width: 50%;"></td>
                    <td><input type="text"></td>
                    <td>min</td>
                </tr>
                <tr style="background-color: #f0f0f0;">
                    <td>Volumen total del anular</td>
                    <td colspan="2"></td>
                    <td>(F+G) = (H) <input type="text" style="width: 50%;"></td>
                    <td><input type="text"></td>
                    <td>min</td>
                </tr>
                <tr style="background-color: #f0f0f0;">
                    <td>Volumen total del sistema</td>
                    <td colspan="2"></td>
                    <td>(D+H) = (I) <input type="text" style="width: 50%;"></td>
                    <td><input type="text"></td>
                    <td>min</td>
                </tr>
                <tr style="background-color: #f0f0f0;">
                    <td>Volumen activo en la superficie</td>
                    <td colspan="2"></td>
                    <td>(J) <input type="text" style="width: 70%;"></td>
                    <td><input type="text"></td>
                    <td>min</td>
                </tr>
                <tr style="background-color: #f0f0f0;">
                    <td>Sistema de fluido activo total</td>
                    <td colspan="2"></td>
                    <td>(I+J) <input type="text" style="width: 70%;"></td>
                    <td><input type="text"></td>
                    <td>min</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Page 2 -->
    <div class="kill-sheet">
        <!-- Header Section -->
        <div class="header">
            <div class="header-left">
                <div class="title">International Well Control Forum</div>
                <div class="subtitle">HOJA DE MATAR PARA EL CONTROL DE POZO DESVIADO</div>
                <div class="subtitle">EOP DE SUPERFICIE (UNIDADES API)</div>
            </div>
            <div class="header-right">
                <div class="fecha-label">FECHA:</div>
                <div class="nombre-label">NOMBRE:</div>
            </div>
        </div>
        
        <!-- Datos del influje -->
        <div class="form-row">
            <div class="form-label">Datos del influjo</div>
            <div class="form-content">
                <div class="input-group">
                    <span>PCTP</span>
                    <div class="input-field"></div>
                    <span>psi</span>
                    <span class="operator">-</span>
                    <span>PCTP</span>
                    <div class="input-field"></div>
                    <span>psi</span>
                    <span class="operator">=</span>
                    <span>Ganancia en</span>
                    <div class="input-field"></div>
                    <span class="unit">bbls</span>
                </div>
            </div>
        </div>
        
        <!-- Densidad del lodo para matar el pozo -->
        <div class="form-row">
            <div class="form-label">Densidad del lodo para matar el pozo (MMW)</div>
            <div class="form-content">
                <div class="small-title">Densidad del lodo actual</div>
                <div class="form-equation">
                    <div class="input-field"></div>
                    <span class="operator">+</span>
                    <span>PCTP</span>
                    <div class="input-field"></div>
                    <span>÷</span>
                    <span>0.052</span>
                    <span class="operator">=</span>
                    <div class="input-field"></div>
                    <span class="unit">ppg</span>
                </div>
            </div>
        </div>
        
        <!-- Presión inicial de circulación -->
        <div class="form-row">
            <div class="form-label">Presión inicial de circulación (PIC)</div>
            <div class="form-content">
                <div class="small-title">Caída de presión dinámica</div>
                <div class="form-equation">
                    <div class="input-field"></div>
                    <span class="operator">+</span>
                    <span>PCTP</span>
                    <div class="input-field"></div>
                    <span class="operator">=</span>
                    <div class="input-field"></div>
                    <span class="unit">psi</span>
                </div>
            </div>
        </div>
        
        <!-- Presión final de circulación -->
        <div class="form-row">
            <div class="form-label">Presión final de circulación (PFC)</div>
            <div class="form-content">
                <div class="small-title">Densidad del lodo para matar el pozo (MMW)</div>
                <div class="form-equation">
                    <div class="input-field"></div>
                    <span class="operator">×</span>
                    <div class="small-title">Caída de presión dinámica</div>
                    <div class="input-field"></div>
                    <span class="operator">=</span>
                    <div class="input-field"></div>
                    <span class="unit">psi</span>
                </div>
            </div>
        </div>
        
        <!-- Caída de presión dinámica en el KOP -->
        <div class="form-row">
            <div class="form-label">Caída de presión dinámica en el KOP (Q)</div>
            <div class="form-content">
                <div class="advanced-equation">
                    <span>PL</span>
                    <span class="operator">×</span>
                    <span class="bracket">[</span>
                    <span>(PFC - PL)</span>
                    <span class="operator">×</span>
                    <span>Profundidad medida del KOP</span>
                    <div class="input-field"></div>
                    <span class="bracket">]</span>
                    <span class="operator">=</span>
                    <div class="input-field"></div>
                    <span class="operator">×</span>
                    <span class="bracket">[</span>
                    <span>(</span>
                    <div class="input-field"></div>
                    <span class="operator">-</span>
                    <div class="input-field"></div>
                    <span>)</span>
                    <span class="operator">×</span>
                    <div class="input-field"></div>
                    <span class="bracket">]</span>
                    <span class="operator">=</span>
                    <div class="input-field"></div>
                    <span class="unit">psi</span>
                </div>
                
                <div class="advanced-equation">
                    <span>PCTP</span>
                    <span class="operator">-</span>
                    <span class="bracket">[</span>
                    <span>((MMW - Dens. Lodo actual) × 0.052 × KOP TVD)</span>
                    <span class="bracket">]</span>
                    <span class="operator">=</span>
                    <div class="input-field"></div>
                    <span class="operator">-</span>
                    <span class="bracket">[</span>
                    <span>(</span>
                    <div class="input-field"></div>
                    <span class="operator">-</span>
                    <div class="input-field"></div>
                    <span>) × 0.052 ×</span>
                    <div class="input-field"></div>
                    <span class="bracket">]</span>
                    <span class="operator">=</span>
                    <div class="input-field"></div>
                    <span class="unit">psi</span>
                </div>
            </div>
        </div>
        
        <!-- Presión de circulación en el KOP -->
        <div class="parameter-row">
            <div class="form-label">Presión de circulación en el KOP (KOP CP)</div>
            <div class="form-content">
                <div class="form-equation">
                    <span>(Q)</span>
                    <div class="input-field"></div>
                    <span class="operator">+</span>
                    <span>(P)</span>
                    <div class="input-field"></div>
                    <span class="operator">=</span>
                    <div class="input-field"></div>
                    <span class="unit">psi</span>
                </div>
            </div>
        </div>
        
        <!-- Caída de presión dinámica en el EOB -->
        <div class="form-row">
            <div class="form-label">Caída de presión dinámica en el EOB (R)</div>
            <div class="form-content">
                <div class="advanced-equation">
                    <span>PL</span>
                    <span class="operator">×</span>
                    <span class="bracket">[</span>
                    <span>(PFC - PL)</span>
                    <span class="operator">×</span>
                    <span>Profundidad medida del EOB</span>
                    <div class="input-field"></div>
                    <span class="bracket">]</span>
                    <span class="operator">=</span>
                    <div class="input-field"></div>
                    <span class="operator">×</span>
                    <span class="bracket">[</span>
                    <span>(</span>
                    <div class="input-field"></div>
                    <span class="operator">-</span>
                    <div class="input-field"></div>
                    <span>)</span>
                    <span class="operator">×</span>
                    <div class="input-field"></div>
                    <span class="bracket">]</span>
                    <span class="operator">=</span>
                    <div class="input-field"></div>
                    <span class="unit">psi</span>
                </div>
                
                <div class="advanced-equation">
                    <span>PCTP</span>
                    <span class="operator">-</span>
                    <span class="bracket">[</span>
                    <span>((MMW - Dens. Lodo actual) × 0.052 × EOB TVD)</span>
                    <span class="bracket">]</span>
                    <span class="operator">=</span>
                    <div class="input-field"></div>
                    <span class="operator">-</span>
                    <span class="bracket">[</span>
                    <span>(</span>
                    <div class="input-field"></div>
                    <span class="operator">-</span>
                    <div class="input-field"></div>
                    <span>) × 0.052 ×</span>
                    <div class="input-field"></div>
                    <span class="bracket">]</span>
                    <span class="operator">=</span>
                    <div class="input-field"></div>
                    <span class="unit">psi</span>
                </div>
            </div>
        </div>
        
        <!-- Presión de circulación en el EOB -->
        <div class="parameter-row">
            <div class="form-label">Presión de circulación en el EOB (EOB CP)</div>
            <div class="form-content">
                <div class="form-equation">
                    <span>(R)</span>
                    <div class="input-field"></div>
                    <span class="operator">+</span>
                    <span>(S)</span>
                    <div class="input-field"></div>
                    <span class="operator">=</span>
                    <div class="input-field"></div>
                    <span class="unit">psi</span>
                </div>
            </div>
        </div>
        
        <!-- Final calculations -->
        <div class="form-row">
            <div class="form-content" style="width: 100%; border-right: none;">
                <div class="calculation-row">
                    <div class="calculation-group">
                        <span>(T) = PIC - KOP CP</span>
                        <span class="operator">=</span>
                        <div class="input-field"></div>
                        <span class="operator">-</span>
                        <div class="input-field"></div>
                        <span class="operator">=</span>
                        <div class="input-field"></div>
                        <span class="unit">psi</span>
                    </div>
                    <div class="calculation-group">
                        <span>(T) × 100 / (L)</span>
                        <span class="operator">=</span>
                        <div class="input-field"></div>
                        <span class="operator">×</span>
                        <span>100</span>
                        <span class="operator">=</span>
                        <div class="input-field"></div>
                        <span class="unit">psi por 100 emboladas</span>
                    </div>
                </div>
                
                <div class="calculation-row">
                    <div class="calculation-group">
                        <span>(U) = KOP CP - EOB CP</span>
                        <span class="operator">=</span>
                        <div class="input-field"></div>
                        <span class="operator">-</span>
                        <div class="input-field"></div>
                        <span class="operator">=</span>
                        <div class="input-field"></div>
                        <span class="unit">psi</span>
                    </div>
                    <div class="calculation-group">
                        <span>(U) × 100 / (M)</span>
                        <span class="operator">=</span>
                        <div class="input-field"></div>
                        <span class="operator">×</span>
                        <span>100</span>
                        <span class="operator">=</span>
                        <div class="input-field"></div>
                        <span class="unit">psi por 100 emboladas</span>
                    </div>
                </div>
                
                <div class="calculation-row">
                    <div class="calculation-group">
                        <span>(W) = EOB CP - PFC</span>
                        <span class="operator">=</span>
                        <div class="input-field"></div>
                        <span class="operator">-</span>
                        <div class="input-field"></div>
                        <span class="operator">=</span>
                        <div class="input-field"></div>
                        <span class="unit">psi</span>
                    </div>
                    <div class="calculation-group">
                        <span>(W) × 100 / (N+Z+P+S)</span>
                        <span class="operator">=</span>
                        <div class="input-field"></div>
                        <span class="operator">×</span>
                        <span>100</span>
                        <span class="operator">=</span>
                        <div class="input-field"></div>
                        <span class="unit">psi por 100 emboladas</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>