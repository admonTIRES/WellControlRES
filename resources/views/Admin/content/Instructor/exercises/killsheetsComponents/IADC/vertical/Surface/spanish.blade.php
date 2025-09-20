<style>
    .container-iadc-v {
        display: flex;
        max-width: 100%;
        border: 0.4vw solid #000;
        margin: 0 auto 20px auto;
    }
    
    .well-diagram-iadc-v {
        width: 14vw;
        /* min-height: 750px; */
        background-color: #f0f0f0;
        border-right: 0.4vw solid #000;
        position: relative;
    }
    
    .calculation-form {
        flex: 1;
        padding: 10px;
    }
    
    .header-iadc-v {
        display: flex;
        justify-content: space-between;
        align-items: center;
        /* border-bottom: 1px solid #000; */
        /* padding-bottom: 10px; */
        /* margin-bottom: 10px; */
        
    }
    .header-iadc-v img{
        max-height: 3vw;
    }

    .header-iadc-v h2{
        font-weight: bold;
        font-size: 1.5vw;
    }

    .titleIadcVS{
        font-size: 1vw;
        margin-top: 1vw;
        margin-right: 1vw;
        font-weight: bold;
    }
    
    .section {
        font-size: 0.7vw;
        margin-bottom: 20px;
    }
    
    .section-title-iadc-v {
        text-align: center;
        color: #3366FF;
        border: 1px solid #3366FF;
        border-radius: 20px;
        padding: 0.5vw;
        margin: 15px auto;
        width: auto;
        height: auto;
    }
    
    .calc-row {
        display: flex;
         justify-content: space-between;
        /* align-items: center; */
        gap: 1vw;
        
    }
    
    .label-iadc-v {
        background: #0000000d;
        min-width: 20%;
        max-width: 20%;
        font-size: 0.7vw;
        text-align: center;
        border: 1px solid #000;
        padding: 5px;
        font-weight: bold; 
    }
    
    .formula {
        flex: 1;
        display: flex;
        align-items: center;
        font-size: 0.7vw;
    }
    .formula span{
        font-size: 1.1vw;
        font-family: Cambria,Georgia,serif; 
    }
    

    .formula input {
        width: 3vw;
        text-align: center;
        margin: 0 5px;
    }
    
    .total-box {
        border: 1px solid #000;
        padding: 10px;
        margin: 10px auto;
        width: 80%;
        text-align: center;
    }
    
    .right-column-1 {
        padding: 10px;
        border-left: 0.4vw solid #000;
        justify-items: center;
        max-width: 35vw;
    }

    .header-iadc-v-f{
        width: 103%;
        text-align: center;
        padding-bottom: 0.5vw;
        border-bottom: 0.3vw solid #000;
    }

    .right-column {
        padding: 10px;
        border-left: 0.4vw solid #000;
        justify-items: center;
        max-width: 50%;
    }
    
    .blue-text {
        color: #3366FF;
        font-size: 1vw;
    }
    
    .blue-text input{
        width: 3vw;
        font-size: 0.8vw;
    }
    
    /* Styles for kill sheet */
    .kill-sheet-iadc-v {
        display: flex;
        max-width: 100%;
        border: 0.4vw solid #000;
        margin: 20px auto;
    }
    
    .left-column, .right-column {
        flex: 1;
        padding: 10px;
    }
    
    .info-table {
        max-width: 24.2vw;
        min-width: 24.2vw;
        border-collapse: collapse;
        margin-bottom: 15px;
    }
    
    .info-table td, .info-table th {
        border: 1px solid #000000;
        text-align: center;
        font-size: 0.6vw;
        font-weight: bold;
        padding: 0;
    }


    .info-table td:input {
        max-width: 5%;
        font-size: 0.7vw;
    }
    
    
    .formula-row {
        margin: 0 0;
        padding-bottom: 10px;
        font-size: 0.9vw;
    }
    
    .title {
        color: #3366FF;
        font-weight: bold;
        margin-bottom: 10px;
        margin-top: 0.5vw;
        font-size: 0.8vw;
    }
    
    .formula-content {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        font-size: 0.94vw;
        font-family: Cambria,Georgia,serif; 
    }
    
    .formula-content input{
        font-size: 0.83vw;
        max-height: 0.1vw;
    }
    .grid-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .grid-table td, .grid-table th {
        border: 0.2vw solid #000000;
        text-align: center;
        padding: 0.5vw;
        font-size: 0.7vw;
        font-weight: bold;
    }
    
    .instruction {
        font-size: 0.85em;
        margin-right: 1vw;
        margin-top: 0.5vw;
        text-align: justify;
    }
    
    .small-input {
        width: 40px;
    }
    
    .medium-input {
        width: 60px;
    }
    
    .large-input {
        width: 120px;
    }
    
    .underline {
        text-decoration: underline;
    }

    .pozo-data-card {
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin: 20px;
    background-color: #ffffff;
    /* min-width: 500px; */
    }
    
    .card-header {
    background-color: #f8f9fa;
    padding: 15px;
    border-bottom: 1px solid #eaeaea;
    border-radius: 8px 8px 0 0;
    }
    
    .card-title {
    margin: 0;
    font-size: 18px;
    color: #333;
    }
    
    .card-body {
    padding: 20px;
    }
    
    .card-footer {
    padding: 15px;
    background-color: #f8f9fa;
    border-top: 1px solid #eaeaea;
    border-radius: 0 0 8px 8px;
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    }
    
    /* Estilos para los inputs */
    .form-group {
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    }
    
    .form-group label {
    flex-basis: 40%;
    font-weight: 500;
    color: #555;
    }
    
    input {
    width: 60%;
    text-align: center;
    margin: 0 5px;
    border: none;
    min-width: 40px;
    border-bottom: 1px solid #ccc;
    padding: 5px 0;
    outline: none;
    background-color: transparent;
    transition: border-color 0.3s;
    }
    
    .underline-input:focus {
    border-bottom: 2px solid #007bff;
    }
    
    /* Estilos para botones */
    .btn {
    padding: 8px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-weight: 500;
    }
    
    .btn-primary {
    background-color: #007bff;
    color: white;
    }
    
    .btn-secondary {
    background-color: #6c757d;
    color: white;
    }
    
    .btn:hover {
    opacity: 0.9;
    }

    .container-centered {
    display: flex;
    justify-content: center;
    min-height: 50vh;
    padding: 20px;
    }
</style>
<div class="container-iadc-v">
    <!-- Left section: Well diagram (would be an image) -->
    <div class="well-diagram-iadc-v">
    <img src="/assets/images/killsheets/iadc-v-sur.png" alt="Well Diagram" style="width: 100%; height: 100%;">
    <div class="section" style="position: ">
        <div class="calc-row">
            <div class="label-iadc-v">Tubería de <br> perforación <br>(DP)</div>
            <div class="formula">
                <span>Capacidad</span>
                <input class="min-text" type="text"> BBL/PIE x
                <span>Longitud</span>
                <input class="min-text" type="text"> PIES = 
                <input class="min-text" type="text"> BBL
            </div>
        </div>
        
        <div class="calc-row">
        <div class="label-iadc-v">Tubería <br>pesada <br>(HWDP)</div>
        <div class="formula">
            <span>Capacidad</span>
            <input type="text">      BBL/PIE x
            <span>Longitud</span>
            <input type="text">      PIES = 
            <input type="text">      BBL
        </div>
        </div>
        
        <div class="calc-row">
        <div class="label-iadc-v">Collares de<br> perforación <br>(DC)</div>
        <div class="formula">
            <span>Capacidad</span>
            <input type="text"> BBL/PIE x
            <span>Longitud</span>
            <input type="text"> PIES = 
            <input type="text"> BBL
        </div>
        </div>
    </div>
    </div>      
    
    <!-- Middle section: Calculations -->
    <div class="calculation-form">
    <div class="header-iadc-v">
        {{-- <div></div> --}}
        <div class="section-title-iadc-v">Volumen de la sarta de perforación</div>
        {{-- <div></div> --}}
    </div>
    
    <!-- Drilling String Volume Section -->
    <div class="section">
        <div class="calc-row">
            <div class="label-iadc-v">Tubería de <br> perforación <br>(DP)</div>
            <div class="formula">
                <span>Capacidad</span>
                <input class="min-text" type="text"> BBL/PIE x
                <span>Longitud</span>
                <input class="min-text" type="text"> PIES = 
                <input class="min-text" type="text"> BBL
            </div>
        </div>
        
        <div class="calc-row">
        <div class="label-iadc-v">Tubería <br>pesada <br>(HWDP)</div>
        <div class="formula">
            <span>Capacidad</span>
            <input type="text">      BBL/PIE x
            <span>Longitud</span>
            <input type="text">      PIES = 
            <input type="text">      BBL
        </div>
        </div>
        
        <div class="calc-row">
        <div class="label-iadc-v">Collares de<br> perforación <br>(DC)</div>
        <div class="formula">
            <span>Capacidad</span>
            <input type="text"> BBL/PIE x
            <span>Longitud</span>
            <input type="text"> PIES = 
            <input type="text"> BBL
        </div>
        </div>
    </div>
    
    <div class="total-box">
        <div class="blue-text">Volumen total de la sarta de perforación = <input type="text"> BBL</div>
    </div>
    <hr>
    <!-- Annular Space Volume Section -->
    <div class="section-title-iadc-v">Volumen del espacio anular</div>
    
    <div class="section">
        <div class="calc-row">
        <div class="label-iadc-v">Tubería de <br>perforación <br>en agujero <br>revestido</div>
        <div class="formula">
            <span>Capacidad Anular</span>
            <input type="text"> BBL/PIE x
            <span>Longitud</span>
            <input type="text"> PIES = 
            <input type="text"> BBL
        </div>
        </div>
        
        <div class="calc-row">
        <div class="label-iadc-v">Tubería de <br>perforación <br>en agujero <br>abierto</div>
        <div class="formula">
            <span>Capacidad Anular</span>
            <input type="text"> BBL/PIE x
            <span>Longitud</span>
            <input type="text"> PIES = 
            <input type="text"> BBL
        </div>
        </div>
        
        <div class="calc-row">
        <div class="label-iadc-v">HWDP en <br>agujero <br>abierto</div>
        <div class="formula">
            <span>Capacidad Anular</span>
            <input type="text"> BBL/PIE x
            <span>Longitud</span>
            <input type="text"> PIES = 
            <input type="text"> BBL
        </div>
        </div>
        
        <div class="calc-row">
        <div class="label-iadc-v">Collares de <br>perforación <br>en agujero <br>abierto (DC)</div>
        <div class="formula">
            <span>Capacidad Anular</span>
            <input type="text"> BBL/PIE x
            <span>Longitud</span>
            <input type="text"> PIES = 
            <input type="text"> BBL
        </div>
        </div>
    </div>
    
    <div class="total-box">
        <div class="blue-text">Volumen total de agujero abierto = <input type="text"> BBL</div>
    </div>
    
    <div class="total-box">
        <div class="blue-text">Volumen total del espacio anular = <input type="text"> BBL</div>
    </div>
    </div>
    
    <!--tercera columna -->
    <div class="right-column-1">
        <div class="header-iadc-v">
            <img src="/assets/images/killsheets/logoiadc.png" alt="IADC" style="float:left">
            <span class="titleIadcVS">Hoja de matar - Superficie</span>
            <img src="/assets/images/killsheets/logosmithmason.png" alt="Smith Mason & Co Logo" style="float:right">
            
        </div>
        
        <div class="formula" style="text-align: center; margin: 20px 0;">
            <span>Salida de la bomba = </span>
            <input type="text"> BBL/EMB
        </div>
        
        <div class="section-title-iadc-v">Emboladas de circulación</div>
        
        <div class="section">
            <div class="blue-text">Emboladas hasta la barrena (STB)</div>
            <div style="margin: 10px 0;  font-family: Cambria,Georgia,serif; ">
            <input type="text" style="width: 40px"> Volumen sarta perf. BBL + 
            <input type="text" style="width: 40px"> Salida de la bomba BBL/EMB = 
            <input type="text" style="width: 40px"> EMB
            </div>
            
            <div class="blue-text">Emboladas desde la barren hasta la zapata del revestimiento</div>
            <div style="margin: 10px 0;  font-family: Cambria,Georgia,serif; ">
            <input type="text" style="width: 40px"> Vol. agujero abierto BBL + 
            <input type="text" style="width: 40px"> Salida de la bomba BBL/EMB = 
            <input type="text" style="width: 40px"> EMB
            </div>
            
            <div class="blue-text">Emboladas de fondo a superficie</div>
            <div style="margin: 10px 0;  font-family: Cambria,Georgia,serif; ">
            <input type="text" style="width: 40px"> Vol. espacio anular BBL + 
            <input type="text" style="width: 40px"> Salida de la bomba BBL/EMB = 
            <input type="text" style="width: 40px"> EMB
            </div>
            
            <div class="blue-text">Circulación total del pozo</div>
            <div style="margin: 10px 0;  font-family: Cambria,Georgia,serif; ">
            <input type="text" style="width: 40px"> Emb. hasta la barrena + 
            <input type="text" style="width: 40px"> Emb. fondo a superficie = 
            <input type="text" style="width: 40px"> EMB
            </div>
            
            <div class="blue-text">Emboladas línea de superficie (Método de Esperar y Pesar)</div>
            <div style="margin: 10px 0;  font-family: Cambria,Georgia,serif; ">
            <input type="text" style="width: 40px"> Vol. línea de superf. BBL + 
            <input type="text" style="width: 40px"> Salida de la bomba BBL/EMB = 
            <input type="text" style="width: 40px"> EMB
            </div>
        </div>
    </div>
</div>
<div class="kill-sheet-iadc-v">
    <!-- Left column -->
    <div class="left-column" style="padding: 0;">
            
        <div class="title" style="padding-left:9vw;">Información del influjo</div>
        <div class="header-iadc-v" style="padding-left: 1vw;">
            <table class="info-table">
                <tr>
                <td style="background-color: #0000001f;"><strong> Presión de cierre en la tubería de perforación (SIDPP)</strong></td>
                <td><input type="text"> PSI</td>
                </tr>
                <tr>
                <td style="background-color: #0000001f;"><strong> Presión de cierre en el revestimiento (SICP)</strong></td>
                <td><input type="text"> PSI</td>
                </tr>
                <tr>
                <td style="background-color: #0000001f;"><strong> Ganancia en tanques</strong></td>
                <td><input type="text"> BBL</td>
                </tr>
                <tr>
                <td style="background-color: #0000001f;"><strong>Densidad del lodo original (OMW)</strong></td>
                <td style="min-width:7vw;"><input type="text"> PPG</td>
                </tr>
                <tr>
                <td style="background-color: #0000001f;"><strong>Presión reducida de la bomba (SCRP)<strong></td>
                <td><input type="text"> PSI</td>
                </tr>
            </table>
            <h2 style="padding-right: 1vw;">Hoja de matar - Superficie <br> www.smithmasonco.com</h2>
        </div>

        <!-- Influx Info Table -->
       

        <!-- KMW Calculation -->
        <div class="formula-row" style="border-top: 0.1vw solid #000; padding: 10px;">
            <div class="title">Densidad del lodo para matar (KMW) (Redondear el primer decimal hacia arriba)</div>
            <div class="formula-content">
            (SIDPP <input type="text" class="small-input"> PSI ÷ 0.052÷TVD del pozo <input type="text" class="small-input"> PIES)+Dens. del lodo actual <input type="text" class="small-input"> PPG=KMW <input type="text" class="small-input"> PPG
            </div>
        </div>

        <!-- MAMW Calculation -->
        <div class="formula-row" style="margin-top: 1vw; border-top: 0.1vw solid #000; padding: 10px; ">
            <div class="title" style="margin-top: 1vw;">Máxima densidad del lodo permitida (MAMW) (Redondear el primer decimal hacia abajo)</div>
            <div class="formula-content" style="font-size: 0.9vw;">
            Presión "Leak-off" en superficie <input type="text" class="small-input"> PSI÷0.052÷TVD zapata <input type="text" class="small-input"> PIES)+Dens. lodo durante la prueba <input type="text" class="small-input"> PPG
            </div>
            <div class="formula-content" style="margin-top: 0.5vw; margin-right: 0.5vw;justify-content: right;">
            =MAMW <input type="text" class="small-input"> PPG
            </div>
            <div class="formula-content" style="margin-top: 0.5vw;">
            O
            </div>
            <div class="formula-content" style="margin-top: 2vw;">
            Gradiente de fractura <input type="text" class="small-input"> PSI/FT÷0.052=MAMW <input type="text" class="small-input"> PPG
            </div>
        </div>

        <!-- MAASP Calculation 1 -->
        <div class="formula-row" style="margin-top: 1vw; padding: 10px;">
            <div class="title">Presión anular máxima permitida en la superficie (MAASP) <span class="underline">ANTES</span> del influjo</div>
            <div class="formula-content">
            (MAMW <input type="text" class="small-input"> <sub>PPG</sub> - Dens. lodo actual <input type="text" class="small-input"> PPG )× 0.052 × TVD zapata <input type="text" class="small-input"> <sub>PIES</sub> = MAASP <input type="text" class="small-input"> <sub>PSI</sub>
            </div>
        </div>

        <!-- MAASP Calculation 2 -->
        <div class="formula-row" style="margin-top: 3vw; padding: 10px;">
            <div class="title">MAASP <span class="underline">DESPUÉS</span> de que el pozo está muerto</div>
            <div class="formula-content" style="font-size: 0.9vw;">
            (MAMW <input type="text" class="small-input"> <sub>PPG</sub>  – Dens. lodo para matar(KMW) <input type="text" class="small-input"> PPG )× 0.052 × TVD zapata <input type="text" class="small-input"> <sub>PIES</sub> = MAASP <input type="text" class="small-input"> <sub>PSI</sub>
            </div>
        </div>

        <!-- Circulation Pressures -->
        <div class="formula-row" style="margin-top: 3vw; border-top: 0.1vw solid #000; padding: 10px;">
            <div class="title" style="text-align: center; font-size: 1vw;">Presiones de circulación</div>
            
            <!-- ICP Calculation -->
            <div style="margin-top: 2vw">
            <div class="title" style="margin-top: 2vw;" >Presión inicial de circulación (ICP)</div>
            <div class="formula-content">
                SIDPP <input type="text" class="small-input"> <sub>PSI</sub> + Presión reducida de la bomba (SCRP) <input type="text" class="small-input"> <sub>PSI</sub> = ICP <input type="text" class="small-input"> <sub>PSI</sub>
            </div>
            </div>
            
            <!-- FCP Calculation -->
            <div style="margin-top: 2vw;">
            <div class="title" style="margin-top: 2vw;">Presión final de circulación (FCP)</div>
            <div class="formula-content" >
                Presión reducida bomba (SCRP) <input type="text" class="small-input"><sub style="margin-top:1vw;">PSI</sub> x (
                <div style="display: inline-block; text-align: center;">
                <div style="padding: 2px 5px;">
                    Dens. lodo para matar (KMW) <input type="text" class="small-input"> <sub>PPG</sub>
                    <hr style="margin: 2px 0;">
                    Dens. lodo original (OMW) <input type="text" class="small-input"> <sub>PPG</sub>
                </div>
                </div>
                ) = FCP <input type="text" class="small-input"><sub>PSI</sub>
            </div>
            </div>
        </div>
    </div>

    <!-- Right column -->
    <div class="right-column">
        <div class="header-iadc-v-f">
           
            <img src="/assets/images/killsheets/logosmithmason.png" alt="Smith Mason & Co Logo" >
        </div>

    <!-- Basic Info Table -->
    <div style="display: flex;">
        <div style="flex-basis: 55%;">
        <div class="title" style="text-align: center;">Información calculada</div>
        <table class="info-table">
            <tr>
            <td style="background-color: #0000001f; min-width:20vw;">Densidad del lodo para matar (KWM)</td>
            <td><input type="text"></td>
            </tr>
            <tr>
            <td style="background-color: #0000001f; ">Presión inicial de circulación (ICP)</td>
            <td><input type="text"></td>
            </tr>
            <tr>
            <td style="background-color: #0000001f;">Presión final de circulación (FCP)</td>
            <td><input type="text"></td>
            </tr>
             <tr>
            <td style="background-color: #0000001f;">Emboladas de superficie hasta la barrena (STB)</td>
            <td><input type="text"></td>
            </tr>
            <tr>
            <td style="background-color: #0000001f;">Emboladas desde la barrena hasta la zapata del<br> revestimiento</td>
            <td><input type="text"></td>
            </tr>
            <tr>
            <td style="background-color: #0000001f;">Emboladas fondo a superficie</td>
            <td><input type="text"></td>
            </tr>
            <tr>
            <td style="background-color: #0000001f;">Emboladas totales de circulación</td>
            <td><input type="text"></td>
            </tr>
        </table>
        <div class="formula-row">
        <div class="title" style="text-align: center;">Preparación del programa de presión de la tubería de <br> perforación</div>
        
        <div class="instruction">
        <strong class="title">Emboladas de la bomba</strong><br>
           <strong> Anotar las emboladas desde superficie hasta la última celda (antes de llegar a STB), en la columna de emboladas o volumen del programa de presión de la tubería de perforación. Luego realice lo siguiente:
        </strong>
        </div>
        <div class="formula-content" style="text-align: center; margin-top:0.5vw;">
        Emb. superf. a barrena ÷10 = Incremento prom. de emboladas (emb)
        </div>
        
        <div class="instruction">
        <strong> Anotar el incremento promedio de emboladas (emb) en la celda por debajo de cero (0) en la columna de emboladas o volumen. Realice lo siguiente:
        </strong>
        </div>
        <div class="formula-content" style="text-align: center; margin-top:0.5vw;">
        0 emb + Incremento promedio de emboladas (emb)
        </div>
        
        <div class="instruction">
        <strong> Repita este proceso hasta completar la columna.</strong>
        </div>
         <div class="title">Presión de la tubería de perforación</div>
        
        <div class="instruction">
        <strong> Anotar la presión inicial de circulación (ICP) y la presión final de circulación (FCP) calculada en los espacios indicados de presión de la tubería de perforación. Realice lo siguiente:
        </strong>
        </div>
    </div>
    </div>
        <div style="flex-basis: 45%;">
        <div class="title" style="text-align: center;">Programa de presión de tubería de perforación</div>
        <table class="grid-table">
            <tr>
            <th style="background-color: #0000001f;  font-weight: bold;">Emboladas o <br> volumen</th>
            <th style="background-color: #0000001f;  font-weight: bold;">Presión de la <br> tubería de <br> perforación <br> calculada</th>
            <th style="background-color: #0000001f;  font-weight: bold;">Presión de la <br>tubería de <br>perforación actual</th>
            </tr>
            <tr>
            <td>0</td>
            <td><input type="text">ICP</td>
            <td><input type="text"></td>
            </tr>
            <tr>
            <td><input type="text"></td>
            <td><input type="text"></td>
            <td><input type="text"></td>
            </tr>
            <tr>
            <td><input type="text"></td>
            <td><input type="text"></td>
            <td><input type="text"></td>
            </tr>
            <tr>
            <td><input type="text"></td>
            <td><input type="text"></td>
            <td><input type="text"></td>
            </tr>
            <tr>
            <td><input type="text"></td>
            <td><input type="text"></td>
            <td><input type="text"></td>
            </tr>
            <tr>
            <td><input type="text"></td>
            <td><input type="text"></td>
            <td><input type="text"></td>
            </tr>
             <tr>
            <td><input type="text"></td>
            <td><input type="text"></td>
            <td><input type="text"></td>
            </tr>
             <tr>
            <td><input type="text"></td>
            <td><input type="text"></td>
            <td><input type="text"></td>
            </tr>
             <tr>
            <td><input type="text"></td>
            <td><input type="text"></td>
            <td><input type="text"></td>
            </tr>
             <tr>
            <td><input type="text"></td>
            <td><input type="text"></td>
            <td><input type="text"></td>
            </tr>
             <tr>
            <td><input type="text"></td>
            <td><input type="text"></td>
            <td><input type="text"></td>
            </tr>
        </table>
        </div>
    </div>

    <!-- Program Preparation -->
   

    <!-- Drill Pipe Pressure -->
    <div class="formula-row">

        <div class="formula-content">
        Reducción de la presión por cada etapa = <div style="display: inline-block; text-align: center; padding: 0 5px;">
            (ICP − FCP)
            <hr style="margin: 2px 0;">
            10
        </div> = <input type="text" class="small-input">
        </div>
        
        <div class="instruction">
        <strong> Nota: si el programa de presión se basa en incrementos de 100 emboladas (emb), realice lo siguiente para calcular la reducción de presión:
        </strong>
        </div>
        
        <div class="formula-content">
        Reducción de la presión por cada 100 emb.= <div style="display: inline-block; text-align: center; padding: 0 5px;">
            (ICP − FCP)×100
            <hr style="margin: 2px 0;">
            Emboladas de superficie a barrena
        </div> = <input type="text" class="small-input">
        </div>
        
        <div class="instruction">
        <strong> Restar la reducción de presión promedio de la presión inicial de circulación (ICP) hasta llenar la celda por debajo de la (ICP). Repita este proceso hasta completar la columna.
        </strong>
        </div>
        
        <div class="formula-content">
        ICP<sub>PSI</sub> − Reducción promedio de presión en PSI 
        </div>
       
    </div>
    <div style="border-top: 0.1vw solid #000; width:102%">Nombre: <input type="text" class="large-input"></div>
    <div style="display: flex; min-width:100%;">
        <div style="flex: 1; align-items:start; ">
            <div >Fecha: <input type="text" class="large-input"></div>
        </div>
        <div style="flex: 1; text-align:end;">
            <div>Hoja de matar #: <input type="text" class="medium-input"></div>
        </div>
    </div>
    </div>
    <!-- Name and Date -->
    
</div>

