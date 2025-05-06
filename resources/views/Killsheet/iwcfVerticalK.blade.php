<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Killsheet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 800px;
            margin: 0 auto;
            border: 2px solid #333;
        }
        .header {
            display: flex;
            justify-content: space-between;
            border-bottom: 2px solid #333;
            padding: 10px;
        }
        .header-left {
            width: 70%;
        }
        .header-right {
            width: 30%;
            border-left: 2px solid #333;
            padding-left: 10px;
        }
        .title {
            font-weight: bold;
            text-align: center;
            margin-bottom: 5px;
        }
        .subtitle {
            text-align: center;
            margin-bottom: 10px;
        }
        .page-number {
            text-align: right;
            font-size: 12px;
        }
        .form-section {
            display: flex;
            border-bottom: 1px solid #333;
        }
        .form-box {
            border: 1px solid #333;
            margin: 5px;
            padding: 10px;
            flex: 1;
        }
        .section-title {
            font-weight: bold;
            margin-bottom: 10px;
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
        }
        .formula {
            display: flex;
            align-items: center;
            margin: 5px 0;
        }
        .formula-eq {
            margin: 0 5px;
        }
        .equal {
            margin: 0 5px;
        }
        .pumps {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        .pump-box {
            flex: 1;
            text-align: center;
            border-bottom: 1px solid #333;
            padding: 5px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .table th, .table td {
            border: 1px solid #333;
            padding: 5px;
            text-align: center;
        }
        .diagram {
            text-align: center;
            margin: 10px;
        }
        .volumes-grid {
            display: grid;
            grid-template-columns: 3fr 1fr 1fr 1fr 1fr 1fr;
            gap: 2px;
            margin-top: 10px;
        }
        .volumes-grid > div {
            border: 1px solid #333;
            padding: 5px;
            text-align: center;
        }
        .volumes-row {
            display: flex;
        }
        .volumes-label {
            flex: 3;
            border: 1px solid #333;
            padding: 5px;
        }
        .volumes-calc {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #333;
        }
        .kill-mud-box {
            border: 1px solid #333;
            margin: 5px;
            padding: 10px;
        }
        .graph-container {
            display: flex;
            margin-top: 10px;
        }
        .graph-labels {
            flex: 1;
            border: 1px solid #333;
        }
        .graph {
            flex: 4;
            border: 1px solid #333;
        }
    </style>
</head>
<body>
    <!-- Page 1 -->
    <div class="container">
        <div class="page-number">Página 1 de 2</div>
        <div class="header">
            <div class="header-left">
                <div class="title">International Well Control Forum</div>
                <div class="subtitle">(Unidades de Campo API)</div>
                <div class="subtitle">Hoja de control de pozo (Hoja para matar) - BOP de superficie pozo vertical</div>
            </div>
            <div class="header-right">
                <div class="form-row">
                    <div class="form-label">FECHA:</div>
                    <div class="form-input"><input type="text"></div>
                </div>
                <div class="form-row">
                    <div class="form-label">NOMBRE:</div>
                    <div class="form-input"><input type="text"></div>
                </div>
            </div>
        </div>

        <div class="form-section">
            <div class="form-box">
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
                    <div class="form-label">(B) + ____ = </div>
                    <div class="form-input"><input type="text"></div>
                </div>
                <div class="form-row">
                    <div class="form-label">Profundidad vertical de la zapata x 0.052</div>
                </div>
                
                <div class="section-title">MAASP inicial (Presión anular máxima permitida en la superficie)</div>
                <div class="form-row">
                    <div class="form-label">(C) - Densidad del lodo actual) x Profundidad vertical de zapata x 0.052</div>
                </div>
                <div class="form-row">
                    <div class="form-label"> = </div>
                    <div class="form-input"><input type="text"></div>
                    <div class="form-unit">psi</div>
                </div>
                
                <div class="pumps">
                    <div class="pump-box">Desplazamiento de la bomba No.1</div>
                    <div class="pump-box">Desplazamiento de la bomba No. 2</div>
                </div>
                <div class="form-row">
                    <div class="form-label" style="text-align: center; font-size: 12px;">bbls / emboladas (Estroques)</div>
                </div>
                
                <div class="section-title">(PL) Caída de presión dinámica (psi)</div>
                <table class="table">
                    <tr>
                        <th>Datos de la tasa reducida (Emboladas)</th>
                        <th>BOMBA NO. 1</th>
                        <th>BOMBA NO. 2</th>
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
            
            <div class="form-box">
                <div class="section-title">Datos actuales del pozo:</div>
                <div class="diagram">
                    <img src="/assets/images/killsheets/pozoiwcf.png" alt="Diagrama de pozo">
                </div>
                <div class="section-title">Lado de perforación actual:</div>
                <div class="form-row">
                    <div class="form-label">Densidad</div>
                    <div class="form-input"><input type="text"></div>
                    <div class="form-unit">ppg</div>
                </div>
                
                <div class="section-title">Datos de la zapata del revestidor (revestimiento):</div>
                <div class="form-row">
                    <div class="form-label">Tamaño</div>
                    <div class="form-input"><input type="text"></div>
                    <div class="form-unit">pulg.</div>
                </div>
                <div class="form-row">
                    <div class="form-label">Profundidad medida</div>
                    <div class="form-input"><input type="text"></div>
                    <div class="form-unit">pies</div>
                </div>
                <div class="form-row">
                    <div class="form-label">Profundidad vertical verdadera</div>
                    <div class="form-input"><input type="text"></div>
                    <div class="form-unit">pies</div>
                </div>
                
                <div class="section-title">Datos del hoyo:</div>
                <div class="form-row">
                    <div class="form-label">Tamaño</div>
                    <div class="form-input"><input type="text"></div>
                    <div class="form-unit">pulg.</div>
                </div>
                <div class="form-row">
                    <div class="form-label">Profundidad medida</div>
                    <div class="form-input"><input type="text"></div>
                    <div class="form-unit">pies</div>
                </div>
                <div class="form-row">
                    <div class="form-label">Profundidad vertical verdadera</div>
                    <div class="form-input"><input type="text"></div>
                    <div class="form-unit">pies</div>
                </div>
            </div>
        </div>
        
        <div class="volumes-grid">
            <div>Datos pre -registrados del volumen</div>
            <div>LONGITUD Pies</div>
            <div>CAPACIDAD bbls / pie</div>
            <div>VOLUMEN Barriles</div>
            <div>EMBOLADAS (ESTROQUES) DE LA BOMBA Emboladas (Estroques)</div>
            <div>TIEMPO Minutos</div>
            
            <div>Tubería de perforación</div>
            <div><input type="text"></div>
            <div>x</div>
            <div>=</div>
            <div><input type="text"></div>
            <div><input type="text"></div>
            
            <div>Tubería de perforación extra pesada</div>
            <div><input type="text"></div>
            <div>x</div>
            <div>=</div>
            <div><input type="text"></div>
            <div><input type="text"></div>
            
            <div>Collares (Portamechas) de perforación</div>
            <div><input type="text"></div>
            <div>x</div>
            <div>=</div>
            <div><input type="text"></div>
            <div><input type="text"></div>
            
            <div>Volumen de la sarta de perforación</div>
            <div></div>
            <div></div>
            <div>(D) <input type="text"></div>
            <div>(E) <input type="text"></div>
            <div><input type="text"></div>
            
            <div>Collares de perforación en el hoyo (Hueco) abierto</div>
            <div><input type="text"></div>
            <div>x</div>
            <div>=</div>
            <div><input type="text"></div>
            <div><input type="text"></div>
            
            <div>Tubería de perforación / tubería extra pesada en el hoyo (Hueco) abierto</div>
            <div><input type="text"></div>
            <div>x</div>
            <div>=</div>
            <div><input type="text"></div>
            <div><input type="text"></div>
            
            <div>Volumen del hoyo (hueco) abierto</div>
            <div></div>
            <div></div>
            <div>(F) <input type="text"></div>
            <div><input type="text"></div>
            <div><input type="text"></div>
            
            <div>Tubería de perforación en el revestidor (Revestimiento)</div>
            <div><input type="text"></div>
            <div>x</div>
            <div>=(G) <input type="text"></div>
            <div><input type="text"></div>
            <div><input type="text"></div>
            
            <div>Volumen total del anular</div>
            <div></div>
            <div></div>
            <div>(F + G) = (H) <input type="text"></div>
            <div><input type="text"></div>
            <div><input type="text"></div>
            
            <div>Volumen total del sistema de pozo</div>
            <div></div>
            <div></div>
            <div>(D + H) = (I) <input type="text"></div>
            <div><input type="text"></div>
            <div><input type="text"></div>
            
            <div>Volumen activo en la superficie</div>
            <div></div>
            <div></div>
            <div>(J) <input type="text"></div>
            <div><input type="text"></div>
            <div><input type="text"></div>
            
            <div>Fluido total en el sistema activo</div>
            <div></div>
            <div></div>
            <div>(I + J) <input type="text"></div>
            <div><input type="text"></div>
            <div><input type="text"></div>
        </div>
        
        <div class="footer" style="text-align: right; font-size: 10px; margin-top: 10px;">
            Dr No SV 04 / 01 (Field Units)<br>
            27-01-2006
        </div>
    </div>

    <!-- Page 2 -->
    <div class="container" style="margin-top: 20px;">
        <div class="page-number">Página 2 de 2</div>
        <div class="header">
            <div class="header-left">
                <div class="title">International Well Control Forum</div>
                <div class="subtitle">(Unidades de Campo API)</div>
                <div class="subtitle">Hoja de control de pozo (Hoja para matar) - BOP de superficie pozo vertical</div>
            </div>
            <div class="header-right">
                <div class="form-row">
                    <div class="form-label">FECHA:</div>
                    <div class="form-input"><input type="text"></div>
                </div>
                <div class="form-row">
                    <div class="form-label">NOMBRE:</div>
                    <div class="form-input"><input type="text"></div>
                </div>
            </div>
        </div>

        <div class="kill-mud-box">
            <div class="section-title">Datos de la arremetida (del amago):</div>
            <div class="form-row">
                <div class="form-label">SIDP (Presión de cierre en la tubería de perforación)</div>
                <div class="form-input"><input type="text"></div>
                <div class="form-unit">psi</div>
                <div class="form-label">SICP (Presión de cierre en revestimiento)</div>
                <div class="form-input"><input type="text"></div>
                <div class="form-unit">psi</div>
                <div class="form-label">Aumento del volumen en los tanques (Ganancia en superficie)</div>
                <div class="form-input"><input type="text"></div>
                <div class="form-unit">bbls</div>
            </div>

            <div class="form-row">
                <div class="form-label">Densidad del lodo para matar</div>
                <div class="form-label">Densidad del lodo actual +</div>
                <div class="form-label">SIDPP</div>
                <div class="form-label">Profundidad vertical verdadera x 0.052</div>
            </div>
            <div class="form-row">
                <div class="form-label">KMD</div>
                <div class="form-label">..................... +</div>
                <div class="form-input"><input type="text"></div>
                <div class="form-label">x 0.052</div>
                <div class="form-label">=</div>
                <div class="form-input"><input type="text"></div>
                <div class="form-unit">ppg</div>
            </div>

            <div class="form-row">
                <div class="form-label">Presión inicial de circulación</div>
                <div class="form-label">Caída de presión dinámica + SIDPP</div>
            </div>
            <div class="form-row">
                <div class="form-label">ICP</div>
                <div class="form-input"><input type="text"></div>
                <div class="form-label">+</div>
                <div class="form-input"><input type="text"></div>
                <div class="form-label">=</div>
                <div class="form-input"><input type="text"></div>
                <div class="form-unit">psi</div>
            </div>

            <div class="form-row">
                <div class="form-label">Presión final de circulación</div>
                <div class="form-label">KMD</div>
                <div class="form-label">Densidad del lodo actual</div>
                <div class="form-label">x Caída de presión dinámica</div>
            </div>
            <div class="form-row">
                <div class="form-label">FCP</div>
                <div class="form-input"><input type="text"></div>
                <div class="form-label">x</div>
                <div class="form-input"><input type="text"></div>
                <div class="form-label">=</div>
                <div class="form-input"><input type="text"></div>
                <div class="form-unit">psi</div>
            </div>

            <div style="display: flex; margin-top: 20px;">
                <div style="flex: 1; border: 1px solid #333; padding: 10px;">
                    <div class="form-row">
                        <div class="form-label">(K) = ICP - FCP = ................. - ................. =</div>
                        <div class="form-input"><input type="text"></div>
                        <div class="form-unit">psi</div>
                    </div>
                </div>
                <div style="flex: 1; border: 1px solid #333; padding: 10px;">
                    <div class="form-row">
                        <div class="form-label">(K) x 100</div>
                        <div class="form-label">=</div>
                        <div class="form-input"><input type="text"></div>
                        <div class="form-label">x 100</div>
                        <div class="form-label">=</div>
                        <div class="form-input"><input type="text"></div>
                        <div class="form-unit">psi / 100 emb. (Estroques)</div>
                    </div>
                </div>
            </div>

            <div class="graph-container">
                <div class="graph-labels" style="display: flex; flex-direction: column;">
                    <div style="border-bottom: 1px solid #333; padding: 5px; display: flex;">
                        <div style="flex: 1;">EMBOLADAS (ESTROQUES)</div>
                        <div style="flex: 1;">PRESIÓN (psi)</div>
                    </div>
                    <div style="flex-grow: 1; display: flex;">
                        <div style="flex: 1; position: relative;">
                            <div style="position: absolute; bottom: 5px; transform: rotate(-90deg); transform-origin: left; white-space: nowrap; font-size: 10px;">
                                PRESIÓN ESTÁTICA Y DINÁMICA EN LA TUBERÍA DE PERFORACIÓN (psi)
                            </div>
                        </div>
                        <div style="flex: 1;"></div>
                    </div>
                </div>
                <div class="graph" style="display: grid; grid-template-columns: repeat(22, 1fr);">
                    <!-- Grid for the graph - 22x22 cells -->
                    <!-- Fill with 22*22=484 empty cells for the graph grid -->
                    <script>
                        document.write(Array(484).fill('<div style="border: 1px solid #eee; height: 10px;"></div>').join(''));
                    </script>
                </div>
            </div>
            <div style="text-align: center; margin-top: 5px;">Emboladas (Estroques) ⟶</div>
        </div>
        
        <div class="footer" style="text-align: right; font-size: 10px; margin-top: 10px;">
            Dr No SV 04 / 02 (Field Units) 27-01-2006
        </div>
    </div>
</body>
</html>