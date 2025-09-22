<style>

    .container-iwcf-d-sur {
        width: 800px;
        margin: 0 auto;
        border: 2px solid #333;
    }

    .header-iwcf-d-sur {
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

    .title-iwcf-d-sur {
        font-weight: bold;
        text-align: center;
        margin-bottom: 5px;
    }

    .subtitle-iwcf-d-sur {
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

    .section-title-iwcf-d {
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

    .table-iwcf-d {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    .table-iwcf-d th,
    .table-iwcf-d td {
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

    .volumes-grid>div {
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


<div class="container-iwcf-v-sur">
    <div class="header-iwcf-v-sur">
        <div class="header-left">
            <div class="title-iwcf-v-sur">International Well Control Forum</div>
            <div class="subtitle-iwcf-v-sur">HOJA DE MATAR PARA EL CONTROL DE POZO DESVIADO</div>
            <div class="subtitle-iwcf-v-sur">BOP DE SUPERFICIE (UNIDADES API)</div>
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
            <div class="section-title-iwcf-d">Datos de resistencia de la formación:</div>
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
                <div class="section-title-iwcf-d" style="text-align: center;">(PL) Caída de presión dinámica</div>
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
                <div class="section-title-iwcf-d">Densidad del lodo</div>
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
                <div class="section-title-iwcf-d">Datos de la desviación</div>
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
                <div class="section-title-iwcf-d">Datos de la TR de la zapata</div>
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
                <div class="section-title-iwcf-d">Datos del agujero</div>
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
    <div class="header-iwcf-v-sur">
        <div class="header-left">
            <div class="title-iwcf-v-sur">International Well Control Forum</div>
            <div class="subtitle-iwcf-v-sur">HOJA DE MATAR PARA EL CONTROL DE POZO DESVIADO</div>
            <div class="subtitle-iwcf-v-sur">EOP DE SUPERFICIE (UNIDADES API)</div>
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