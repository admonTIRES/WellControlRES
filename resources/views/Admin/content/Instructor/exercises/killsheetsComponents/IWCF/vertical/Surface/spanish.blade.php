<style>
.container-iwcf-v-sur {
    width: 90%;
    margin: 0 auto;
    border: 2px solid #333;
}

.header-iwcf-v-sur {
    display: flex;
    justify-content: space-between;
    border: 0.8vw solid #1a1a1a;
}

.header-left-iwcf-v-sur {
    width: 70%;
    padding: 1vw;
    border-right: 0.8vw solid #1a1a1a;
}

.header-right-iwcf-v-sur {
    width: 30%;
    padding-left: 2vw;
    padding-top: 0.5vw;
    padding-right: 1vw;
}

.title-iwcf-v-sur {
    font-weight: bold;
    text-align: center;
    font-size: 2vw;
    margin-bottom: 5px;
    color: #000;
}

.subtitle-iwcf-v-sur {
    text-align: center;
    margin-bottom: 10px;
    color: #000;
    font-size: 1.6vw;
}

.page-number-iwcf-v-sur {
    text-align: right;
    font-size: 12px;
}

.form-section-iwcf-v-sur {
    display: flex;
    border-bottom: 1px solid #333;
}

.form-box-iwcf-v-sur {
    border: 1px solid #333;
    margin: 5px;
    padding: 10px;
    flex: 1;
}

.section-title-iwcf-v-sur {
    font-weight: bold;
    margin-bottom: 10px;
    color: #000;
}

.form-row-iwcf-v-sur {
    display: flex;
    margin-bottom: 5px;
    align-items:flex-end;
    width: 100%;
    
}

.form-label-iwcf-v-sur {
    flex: 1;
    padding: 0;
}

.form-input-iwcf-v-sur {
    flex: 3;
    display: flex; 
    width: 100%;
    padding-bottom: 1vw;
}

.form-input-iwcf-v-sur input {
    border: 0;
    width: 100%;
    border-bottom: 1px solid #000;
    flex-grow: 1; 
}

.form-unit-iwcf-v-sur {
    flex: 1;
    padding-left: 5px;
}

.formula-iwcf-v-sur {
    display: flex;
    align-items: center;
    margin: 5px 0;
}

.formula-eq-iwcf-v-sur {
    margin: 0 5px;
}

.equal-iwcf-v-sur {
    margin: 0 5px;
}

.pumps-iwcf-v-sur {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
}

.pump-box-iwcf-v-sur {
    flex: 1;
    text-align: center;
    border-bottom: 1px solid #333;
    padding: 5px;
}

.table-iwcf-v-sur {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.table-iwcf-v-sur th,
.table-iwcf-v-sur td {
    border: 1px solid #333;
    padding: 5px;
    text-align: center;
}

.diagram-iwcf-v-sur {
    text-align: center;
    margin: 10px;
}

.volumes-grid-iwcf-v-sur {
    display: grid;
    grid-template-columns: 3fr 1fr 1fr 1fr 1fr 1fr;
    gap: 2px;
    margin-top: 10px;
}

.volumes-grid-iwcf-v-sur>div {
    border: 1px solid #333;
    padding: 5px;
    text-align: center;
}

.volumes-row-iwcf-v-sur {
    display: flex;
}

.volumes-label-iwcf-v-sur {
    flex: 3;
    border: 1px solid #333;
    padding: 5px;
}

.volumes-calc-iwcf-v-sur {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 1px solid #333;
}

.kill-mud-box-iwcf-v-sur {
    border: 1px solid #333;
    margin: 5px;
    padding: 10px;
}

.graph-container-iwcf-v-sur {
    display: flex;
    margin-top: 10px;
}

.graph-labels-iwcf-v-sur {
    flex: 1;
    border: 1px solid #333;
}

.graph-iwcf-v-sur {
    flex: 4;
    border: 1px solid #333;
}
</style>
<div class="container-iwcf-v-sur">
    
    <div class="header-iwcf-v-sur">
        <div class="header-left-iwcf-v-sur">
            <div class="title-iwcf-v-sur">International Well Control Forum </div>
            <div class="subtitle-iwcf-v-sur" ><strong> (Unidades de Campo API)</strong> </div>
            <div class="subtitle-iwcf-v-sur" style="font-size: 1.4vw;"><strong> Hoja de control de pozo (Hoja para matar) - BOP de superficie pozo
                vertical</strong> </div>
        </div>
        <div class="header-right-iwcf-v-sur">
            <div class="page-number-iwcf-v-sur">Página 1 de 2</div>
            <div class="form-row-iwcf-v-sur">
                <div class="form-label-iwcf-v-sur">FECHA:</div>
                <div class="form-input-iwcf-v-sur"><input type="text"></div>
            </div>
            <div class="form-row-iwcf-v-sur" style="margin-top:2vw;">
                <div class="form-label-iwcf-v-sur">NOMBRE:</div>
                <div class="form-input-iwcf-v-sur"><input type="text"></div>
            </div>
        </div>
    </div>

    <div class="form-section-iwcf-v-sur">
        <div class="form-box-iwcf-v-sur">
            <div class="section-title-iwcf-v-sur">Datos de resistencia de la formación:</div>
            <div class="form-row-iwcf-v-sur">
                <div class="form-label-iwcf-v-sur">Presión de fuga (leak-off) en la superficie obtenida con la
                    prueba de resistencia de la formación</div>
                <div class="form-input-iwcf-v-sur">(A) <input type="text"></div>
                <div class="form-unit-iwcf-v-sur">psi</div>
            </div>
            <div class="form-row-iwcf-v-sur">
                <div class="form-label-iwcf-v-sur">Densidad del lodo durante la prueba</div>
                <div class="form-input-iwcf-v-sur">(B) <input type="text"></div>
                <div class="form-unit-iwcf-v-sur">ppg</div>
            </div>
            <div class="form-row-iwcf-v-sur">
                <div class="form-label-iwcf-v-sur">Máxima densidad del lodo permitida = (A) ÷ </div>
                <div class="form-input-iwcf-v-sur">(C) <input type="text"></div>
                <div class="form-unit-iwcf-v-sur">ppg</div>
            </div>
            <div class="form-row-iwcf-v-sur">
                <div class="form-label-iwcf-v-sur">(B) + ____ = </div>
                <div class="form-input-iwcf-v-sur"><input type="text"></div>
            </div>
            <div class="form-row-iwcf-v-sur">
                <div class="form-label-iwcf-v-sur">Profundidad vertical de la zapata x 0.052</div>
            </div>

            <div class="section-title-iwcf-v-sur">MAASP inicial (Presión anular máxima permitida en la
                superficie)</div>
            <div class="form-row-iwcf-v-sur">
                <div class="form-label-iwcf-v-sur">(C) - Densidad del lodo actual) x Profundidad vertical de
                    zapata x 0.052</div>
            </div>
            <div class="form-row-iwcf-v-sur">
                <div class="form-label-iwcf-v-sur"> = </div>
                <div class="form-input-iwcf-v-sur"><input type="text"></div>
                <div class="form-unit-iwcf-v-sur">psi</div>
            </div>

            <div class="pumps-iwcf-v-sur">
                <div class="pump-box-iwcf-v-sur">Desplazamiento de la bomba No.1</div>
                <div class="pump-box-iwcf-v-sur">Desplazamiento de la bomba No. 2</div>
            </div>
            <div class="form-row-iwcf-v-sur">
                <div class="form-label-iwcf-v-sur" style="text-align: center; font-size: 12px;">bbls /
                    emboladas (Estroques)</div>
            </div>

            <div class="section-title-iwcf-v-sur">(PL) Caída de presión dinámica (psi)</div>
            <table class="table-iwcf-v-sur">
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
            <div class="section-title-iwcf-v-sur">Datos actuales del pozo:</div>
            <div class="diagram">
                <img src="/assets/images/killsheets/pozoiwcf.png" alt="Diagrama de pozo">
            </div>
            <div class="section-title-iwcf-v-sur">Lado de perforación actual:</div>
            <div class="form-row-iwcf-v-sur">
                <div class="form-label-iwcf-v-sur">Densidad</div>
                <div class="form-input-iwcf-v-sur"><input type="text"></div>
                <div class="form-unit-iwcf-v-sur">ppg</div>
            </div>

            <div class="section-title-iwcf-v-sur">Datos de la zapata del revestidor (revestimiento):</div>
            <div class="form-row-iwcf-v-sur">
                <div class="form-label-iwcf-v-sur">Tamaño</div>
                <div class="form-input-iwcf-v-sur"><input type="text"></div>
                <div class="form-unit-iwcf-v-sur">pulg.</div>
            </div>
            <div class="form-row-iwcf-v-sur">
                <div class="form-label-iwcf-v-sur">Profundidad medida</div>
                <div class="form-input-iwcf-v-sur"><input type="text"></div>
                <div class="form-unit-iwcf-v-sur">pies</div>
            </div>
            <div class="form-row">
                <div class="form-label-iwcf-v-sur">Profundidad vertical verdadera</div>
                <div class="form-input-iwcf-v-sur"><input type="text"></div>
                <div class="form-unit-iwcf-v-sur">pies</div>
            </div>

            <div class="section-title-iwcf-v-sur">Datos del hoyo:</div>
            <div class="form-row-iwcf-v-sur">
                <div class="form-label-iwcf-v-sur">Tamaño</div>
                <div class="form-input-iwcf-v-sur"><input type="text"></div>
                <div class="form-unit-iwcf-v-sur">pulg.</div>
            </div>
            <div class="form-row-iwcf-v-sur">
                <div class="form-label-iwcf-v-sur">Profundidad medida</div>
                <div class="form-input-iwcf-v-sur"><input type="text"></div>
                <div class="form-unit-iwcf-v-sur">pies</div>
            </div>
            <div class="form-row-iwcf-v-sur">
                <div class="form-label-iwcf-v-sur">Profundidad vertical verdadera</div>
                <div class="form-input-iwcf-v-sur"><input type="text"></div>
                <div class="form-unit-iwcf-v-sur">pies</div>
            </div>
        </div>
    </div>

    <div class="volumes-grid-iwcf-v-sur">
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

    <div class="footer-iwcf-v-sur" style="text-align: right; font-size: 10px; margin-top: 10px;">
        Dr No SV 04 / 01 (Field Units)<br>
        27-01-2006
    </div>
</div>

<!-- Page 2 -->
<div class="container-iwcf-v-sur" style="margin-top: 20px;">
    <div class="page-number-iwcf-v-sur">Página 2 de 2</div>
    <div class="header-iwcf-v-sur">
        <div class="header-left-iwcf-v-sur">
            <div class="title-iwcf-v-sur">International Well Control Forum</div>
            <div class="subtitle-iwcf-v-sur">(Unidades de Campo API)</div>
            <div class="subtitle-iwcf-v-sur">Hoja de control de pozo (Hoja para matar) - BOP de superficie pozo
                vertical</div>
        </div>
        <div class="header-right-iwcf-v-sur">
            <div class="form-row-iwcf-v-sur">
                <div class="form-label-iwcf-v-sur">FECHA:</div>
                <div class="form-input-iwcf-v-sur"><input type="text"></div>
            </div>
            <div class="form-row-iwcf-v-sur">
                <div class="form-label-iwcf-v-sur">NOMBRE:</div>
                <div class="form-input-iwcf-v-sur"><input type="text"></div>
            </div>
        </div>
    </div>

    <div class="kill-mud-box-iwcf-v-sur">
        <div class="section-title-iwcf-v-iwcf-v-sur">Datos de la arremetida (del amago):</div>
        <div class="form-row-iwcf-v-sur">
            <div class="form-label-iwcf-v-sur">SIDP (Presión de cierre en la tubería de perforación)</div>
            <div class="form-input-iwcf-v-sur"><input type="text"></div>
            <div class="form-unit-iwcf-v-sur">psi</div>
            <div class="form-label-iwcf-v-sur">SICP (Presión de cierre en revestimiento)</div>
            <div class="form-input-iwcf-v-sur"><input type="text"></div>
            <div class="form-unit-iwcf-v-sur">psi</div>
            <div class="form-label-iwcf-v-sur">Aumento del volumen en los tanques (Ganancia en superficie)
            </div>
            <div class="form-input-iwcf-v-sur"><input type="text"></div>
            <div class="form-unit-iwcf-v-sur">bbls</div>
        </div>

        <div class="form-row-iwcf-v-sur">
            <div class="form-label-iwcf-v-sur">Densidad del lodo para matar</div>
            <div class="form-label-iwcf-v-sur">Densidad del lodo actual +</div>
            <div class="form-label-iwcf-v-sur">SIDPP</div>
            <div class="form-label-iwcf-v-sur">Profundidad vertical verdadera x 0.052</div>
        </div>
        <div class="form-row-iwcf-v-sur">
            <div class="form-label-iwcf-v-sur">KMD</div>
            <div class="form-label-iwcf-v-sur">..................... +</div>
            <div class="form-input-iwcf-v-sur"><input type="text"></div>
            <div class="form-label-iwcf-v-sur">x 0.052</div>
            <div class="form-label-iwcf-v-sur">=</div>
            <div class="form-input-iwcf-v-sur"><input type="text"></div>
            <div class="form-unit-iwcf-v-sur">ppg</div>
        </div>

        <div class="form-row-iwcf-v-sur">
            <div class="form-label-iwcf-v-sur">Presión inicial de circulación</div>
            <div class="form-label-iwcf-v-sur">Caída de presión dinámica + SIDPP</div>
        </div>
        <div class="form-row-iwcf-v-sur">
            <div class="form-label-iwcf-v-sur">ICP</div>
            <div class="form-input-iwcf-v-sur"><input type="text"></div>
            <div class="form-label-iwcf-v-sur">+</div>
            <div class="form-input-iwcf-v-sur"><input type="text"></div>
            <div class="form-label-iwcf-v-sur">=</div>
            <div class="form-input-iwcf-v-sur"><input type="text"></div>
            <div class="form-unit-iwcf-v-sur">psi</div>
        </div>

        <div class="form-row-iwcf-v-sur">
            <div class="form-label-iwcf-v-sur">Presión final de circulación</div>
            <div class="form-label-iwcf-v-sur">KMD</div>
            <div class="form-label-iwcf-v-sur">Densidad del lodo actual</div>
            <div class="form-label-iwcf-v-sur">x Caída de presión dinámica</div>
        </div>
        <div class="form-row-iwcf-v-sur">
            <div class="form-label-iwcf-v-sur">FCP</div>
            <div class="form-input-iwcf-v-sur"><input type="text"></div>
            <div class="form-label-iwcf-v-sur">x</div>
            <div class="form-input-iwcf-v-sur"><input type="text"></div>
            <div class="form-label-iwcf-v-sur">=</div>
            <div class="form-input-iwcf-v-sur"><input type="text"></div>
            <div class="form-unit-iwcf-v-sur">psi</div>
        </div>

        <div style="display: flex; margin-top: 20px;">
            <div style="flex: 1; border: 1px solid #333; padding: 10px;">
                <div class="form-row-iwcf-v-sur">
                    <div class="form-label-iwcf-v-sur">(K) = ICP - FCP = ................. - .................
                        =</div>
                    <div class="form-input-iwcf-v-sur"><input type="text"></div>
                    <div class="form-unit-iwcf-v-sur">psi</div>
                </div>
            </div>
            <div style="flex: 1; border: 1px solid #333; padding: 10px;">
                <div class="form-row-iwcf-v-sur">
                    <div class="form-label-iwcf-v-sur">(K) x 100</div>
                    <div class="form-label-iwcf-v-sur">=</div>
                    <div class="form-input-iwcf-v-sur"><input type="text"></div>
                    <div class="form-label-iwcf-v-sur">x 100</div>
                    <div class="form-label-iwcf-v-sur">=</div>
                    <div class="form-input-iwcf-v-sur"><input type="text"></div>
                    <div class="form-unit-iwcf-v-sur">psi / 100 emb. (Estroques)</div>
                </div>
            </div>
        </div>

        <div class="graph-container-iwcf-v-sur">
            <div class="graph-labels-iwcf-v-sur" style="display: flex; flex-direction: column;">
                <div style="border-bottom: 1px solid #333; padding: 5px; display: flex;">
                    <div style="flex: 1;">EMBOLADAS (ESTROQUES)</div>
                    <div style="flex: 1;">PRESIÓN (psi)</div>
                </div>
                <div style="flex-grow: 1; display: flex;">
                    <div style="flex: 1; position: relative;">
                        <div
                            style="position: absolute; bottom: 5px; transform: rotate(-90deg); transform-origin: left; white-space: nowrap; font-size: 10px;">
                            PRESIÓN ESTÁTICA Y DINÁMICA EN LA TUBERÍA DE PERFORACIÓN (psi)
                        </div>
                    </div>
                    <div style="flex: 1;"></div>
                </div>
            </div>
            <div class="graph-iwcf-v-sur" style="display: grid; grid-template-columns: repeat(22, 1fr);">
                <!-- Grid for the graph - 22x22 cells -->
                <!-- Fill with 22*22=484 empty cells for the graph grid -->
                <script>
                    document.write(Array(484).fill('<div style="border: 1px solid #eee; height: 10px;"></div>').join(''));
                </script>
            </div>
        </div>
        <div style="text-align: center; margin-top: 5px;">Emboladas (Estroques) ⟶</div>
    </div>

    <div class="footer-iwcf-v-sur" style="text-align: right; font-size: 10px; margin-top: 10px;">
        Dr No SV 04 / 02 (Field Units) 27-01-2006
    </div>
</div>
