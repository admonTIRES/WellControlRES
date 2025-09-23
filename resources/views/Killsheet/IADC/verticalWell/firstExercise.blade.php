@extends('Template/maestraUser')
@section('contenido') 
    
  <div class="info-container">
    <!-- Header -->
    <div class="header-section">
      <h1><i class="fas fa-oil-well"></i> Mi primer hoja de matar IADC para pozos verticales - superficie</h1>
      <p>Complete la hoja para matar dentro del tiempo indicado en el reloj y al finalizar responda las preguntas siguientes</p>
    </div>

    <div class="layout-container" id="datosPozoContenedor">
      <div class="well-data-container">
        <div class="scroll-wrapper">
          <div class="data-sections" id="dataSections">
            <!-- Información Básica del Pozo -->
            <div class="data-section section-basic">
              <div class="section-title">
                <div class="section-icon"><i class="fas fa-info"></i></div>
                Información Básica del Pozo
              </div>
              <div class="data-grid">
                <div class="data-item">
                  <span class="data-label">Tamaño del hueco</span>
                  <span class="data-value">8.5"</span>
                </div>
                <div class="data-item">
                  <span class="data-label">Profundidad medida</span>
                  <span class="data-value">6508 pies</span>
                </div>
                <div class="data-item">
                  <span class="data-label">Profundidad vertical verdadera</span>
                  <span class="data-value">6508 pies</span>
                </div>
                <div class="data-item">
                  <span class="data-label">Zapato del revestimiento 9-5/8"</span>
                  <span class="data-value">3900 pies</span>
                </div>
              </div>
            </div>

            <!-- Capacidades Internas -->
            <div class="data-section section-capacities">
              <div class="section-title">
                <div class="section-icon"><i class="fas fa-arrows-alt-v"></i></div>
                Capacidades Internas
              </div>
              <div class="data-grid">
                <div class="data-item">
                  <span class="data-label">Tubería de perforación (5")</span>
                  <span class="data-value">0.01776 BBL/PIE</span>
                </div>
                <div class="data-item">
                  <span class="data-label">Tubería pesada HWDP (5")(900 pies)</span>
                  <span class="data-value">0.0088 BBL/PIE</span>
                </div>
                <div class="data-item">
                  <span class="data-label">Collares de perforación (6-1/4)(450 pies)</span>
                  <span class="data-value">0.0074 BBL/PIE</span>
                </div>
              </div>
            </div>

            <!-- Capacidades Anulares -->
            <div class="data-section section-annular">
              <div class="section-title">
                <div class="section-icon"><i class="fas fa-circle-notch"></i></div>
                Capacidades Anulares
              </div>
              <div class="data-grid">
                <div class="data-item">
                  <span class="data-label">DC en hueco abierto</span>
                  <span class="data-value">0.0459 BBL/PIE</span>
                </div>
                <div class="data-item">
                  <span class="data-label">DP/HWDP en hueco abierto</span>
                  <span class="data-value">0.0702 BBL/PIE</span>
                </div>
                <div class="data-item">
                  <span class="data-label">DP/HWDP en hueco revestido</span>
                  <span class="data-value">0.0836 BBL/PIE</span>
                </div>
              </div>
            </div>

            <!-- Datos de Bomba -->
            <div class="data-section section-pump">
              <div class="section-title">
                <div class="section-icon"><i class="fas fa-cog"></i></div>
                Datos de la Bomba de Lodo
              </div>
              <div class="data-grid">
                <div class="data-item">
                  <span class="data-label">Salida bomba 95% eficiencia</span>
                  <span class="data-value">0.102 BBL/EMB</span>
                </div>
              </div>
              <div class="section-title">
                <div class="section-icon"><i class="fas fa-cog"></i></div>
                Datos de la tasa reducida de circulación de la bomba
              </div>
              <div class="data-grid">
                <div class="data-item">
                  <span class="data-label">Presión a 30 SPM</span>
                  <span class="data-value">350 PSI</span>
                </div>
              </div>
              <div class="section-title">
                <div class="section-icon"><i class="fas fa-cog"></i></div>
                Otra información
              </div>
              <div class="data-grid">
                <div class="data-item">
                  <span class="data-label">Volumen lodo activo superficie</span>
                  <span class="data-value">650 BBL</span>
                </div>
              </div>
            </div>

            <!-- Datos de Prueba -->
            <div class="data-section section-test">
              <div class="section-title">
                <div class="section-icon"><i class="fas fa-vial"></i></div>
                Datos de Prueba de Formación
              </div>
              <div class="data-grid">
                <div class="data-item">
                  <span class="data-label">Presión Leak-off (10.22 ppg)</span>
                  <span class="data-value">1,200 PSI</span>
                </div>
              </div>
            </div>

            <!-- Datos del Influjo -->
            <div class="data-section section-influx">
              <div class="section-title">
                <div class="section-icon"><i class="fas fa-exclamation-triangle"></i></div>
                Datos del Influjo
              </div>
              <div class="data-grid">
                <div class="data-item">
                  <span class="data-label">SIDPP</span>
                  <span class="data-value">450 PSI</span>
                </div>
                <div class="data-item">
                  <span class="data-label">SICP</span>
                  <span class="data-value">650 PSI</span>
                </div>
                <div class="data-item">
                  <span class="data-label">Ganancia en presas</span>
                  <span class="data-value">15 BBL</span>
                </div>
                <div class="data-item">
                  <span class="data-label">Vol. líneas superficie</span>
                  <span class="data-value">12 BBL</span>
                </div>
                <div class="data-item">
                  <span class="data-label">Densidad lodo actual</span>
                  <span class="data-value">10.22 PPG</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
       <div class="buttons-container">
            <button class="scroll-btn left" id="scrollLeft"> 
            <i class="fas fa-chevron-left"></i> 
          </button>
        <button class="scroll-btn right" id="scrollRight"> 
            <i class="fas fa-chevron-right"></i> 
          </button>
    </div>
  </div>
<style>
    .container-iadc-v {
        display: flex;
        max-width: 100%;
        border: 0.4vw solid #000;
        margin: 0 auto 20px auto;
        background: #fff;
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
        border-radius: 50%;
        padding: 0.5vw 1vw;
        margin: 15px auto;
        max-width: fit-content;
        font-size: 1.2vw;
        font-weight: bold;
        font-family: 'Calibri', Helvetica, Arial, sans-serif;
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
        color: #000;
        min-width: 12%;
        width: auto;
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

    .formula-section-anular {
        flex: 1;
        display: flex;
        align-items: center;
        font-size: 0.7vw;
    }
    .formula span{
        font-size: 1.1vw;
        font-family: Cambria,Georgia,serif; 
    }

    .formula-section-anular span{
        font-size: 1vw;
        font-family: Cambria,Georgia,serif; 
    }
      .input-iadc-v-sur {
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
    

    .formula input {
        width: 3vw;
        text-align: center;
        margin: 0 5px;
    }

      .formula-section-anular input {
        width: 3vw;
        text-align: center;
        margin: 0 5px;
    }
    
    .total-box {
        border: 1px solid #000;
        padding: 1vw 0.5vw;
        margin: 10px auto;
        max-width: fit-content;
        text-align: center;
    }
    
    .right-column-1 {
        padding: 10px;
        border-left: 0.4vw solid #000;
        justify-items: center;
        max-width: 35vw;
    }

    .header-iadc-v-f{
        width: 101%;
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
        font-family: 'Calibri', Helvetica, Arial, sans-serif;
        font-weight: bold;
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
        background: #fff;
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
    color: #000000;
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
    color: #000000;
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

    .min-text{
        min-width:6vw;
        padding: 0;
    }

    .input-number-data-well {
        width: 20%;
        text-align: center;
        margin: 0;
        border: none;
        min-width: 30px;
        border-bottom: 1px solid #000000;
        padding: 0;
        outline: none;
        background-color: transparent;
        transition: border-color 0.3s;
    }
</style>
<div class="container-iadc-v">
    <!-- Left section: Well diagram (would be an image) -->
    <div class="well-diagram-iadc-v">
        <div class="section" style="position: absolute; left:4.2vw; ">
            <div class="label-iadc-v" style=" border: 0.2vw solid #9DC3E6; min-width: 100%; background: #fff; font-size:0.7vw; padding: 0.1vw 0 0.3vw 0; margin-top:7vw; font-family: 'Calibri', Helvetica, Arial, sans-serif;"><strong> Longitud DP en agujero</strong><br style="padding: 0;"> <strong>revestido </strong><br style="padding: 0;"><input class="input-iadc-v-sur input-number-data-well" type="number" style="padding: 0; width: 5vw; "></div>
            <div class="label-iadc-v" style=" border: 0.1vw solid #000; min-width: 100%; background: #b3b3b3;  font-size:0.7vw; padding: 0.1vw 0 0.3vw 0; margin-top:3vw; font-family: 'Calibri', Helvetica, Arial, sans-serif;"><strong> Revestimiento MD </strong><input class="input-iadc-v-sur input-number-data-well validate-answer-question" type="number" data-correct-answer="400" data-answer-tip="Recuerda que este parámetro se obtiene restando SICP a la MAASP"> <br><strong>Revestimiento TVD</strong><input class="input-iadc-v-sur input-number-data-well" type="number" style="padding: 0; width: 2vw;"></div>
            <div class="label-iadc-v" style=" border: 0.2vw solid #FFC000;min-width: 100%;background: #fff;  font-size:0.66vw; padding: 0.1vw 0 0.3vw 0; margin-top:3vw; font-family: 'Calibri', Helvetica, Arial, sans-serif;"><strong>Longitud DP en agujero abierto</strong><br> <input class="input-iadc-v-sur input-number-data-well" type="number" style="padding: 0; width: 5vw;"> <br> <strong>(Agujero revestido MD, Longitud DC-MD-Longitud HWDP)</strong> </div>
            <div class="label-iadc-v" style=" border: 0.2vw solid #548235;min-width: 100%; background: #fff;  font-size:0.7vw; padding: 0.1vw 0 0.3vw 0; margin-top:11vw; font-family: 'Calibri', Helvetica, Arial, sans-serif;"><strong>Longitud HWDP</strong><br> <input class="input-iadc-v-sur input-number-data-well" type="number" style="padding: 0; width: 5vw;"> </div>
            <div class="label-iadc-v" style=" border: 0.2vw solid #7030A0;min-width: 100%; background: #fff;  font-size:0.7vw; padding: 0.1vw 0 0.3vw 0; margin-top: 11vw; font-family: 'Calibri', Helvetica, Arial, sans-serif;"><strong>Longitud DC</strong><br> <input class="input-iadc-v-sur input-number-data-well" type="number" style="padding: 0; width: 5vw;"> </div>
            <div class="label-iadc-v" style=" border: 0.1vw solid #000;min-width: 100%; background: #b3b3b3;font-size:0.7vw; padding: 0.1vw 0 0.3vw 0; margin-top:1vw; font-family: 'Calibri', Helvetica, Arial, sans-serif;"><strong>Tam. del agujero</strong> <input class="input-iadc-v-sur input-number-data-well" type="number"style="padding: 0; width: 2vw;"> <br> <strong>Agujero MD</strong> <input class="input-iadc-v-sur input-number-data-well" type="number"> <br> <strong>Agujero  TVD</strong> <input class="input-iadc-v-sur input-number-data-well" type="number"></div>
        </div>
        <img src="/assets/images/killsheets/iadc-v-sur.png" alt="Well Diagram" style="width: 100%; height: 100%;">
   
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
                <input class="input-iadc-v-sur min-text" type="number"> 
                <span><sub>BBL/PIE </sub> × Longitud</span>
                <input class="input-iadc-v-sur min-text" type="number"> 
                <span> <sub>PIES </sub> = </span>
                <input class="input-iadc-v-sur min-text" type="number"> 
                <span><sub>BBL</sub></span>
            </div>
        </div>
        
        <div class="calc-row">
        <div class="label-iadc-v">Tubería <br>pesada <br>(HWDP)</div>
        <div class="formula">
            <span>Capacidad</span>
            <input class="input-iadc-v-sur min-text" type="number">      
            <span><sub>BBL/PIE</sub> × Longitud</span>
            <input class="input-iadc-v-sur min-text" type="number">      <span><sub>PIES</sub> = </span>
            <input class="input-iadc-v-sur min-text" type="number">      <span><sub>BBL</sub></span>
        </div>
        </div>
        
        <div class="calc-row">
        <div class="label-iadc-v">Collares de<br> perforación <br>(DC)</div>
        <div class="formula" >
            <span >Capacidad</span>
            <input class="input-iadc-v-sur min-text" type="number"> <span><sub>BBL/PIE</sub> × Longitud</span>
            <input class="input-iadc-v-sur min-text" type="number"> <span><sub>PIES</sub> = </span>
            <input class="input-iadc-v-sur min-text" type="number"> <span><sub>BBL</sub></span>
        </div>
        </div>
    </div>
    
    <div class="total-box">
        <div class="blue-text">Volumen total de la sarta de perforación = <input class="input-iadc-v-sur min-text" type="number"> BBL</div>
    </div>
 <hr>
    <!-- Annular Space Volume Section -->
    <div class="section-title-iadc-v">Volumen del espacio anular</div>
    
    <div class="section">
        <div class="calc-row">
        <div class="label-iadc-v">Tubería de <br>perforación <br>en agujero <br>revestido</div>
        <div class="formula-section-anular">
            <span>Capacidad Anular</span>
            <input class="input-iadc-v-sur min-text" type="number"> <span><sub>BBL/PIE</sub> × Longitud</span>
            <input class="input-iadc-v-sur min-text" type="number"> <span><sub>PIES</sub> = </span>
            <input class="input-iadc-v-sur min-text" type="number"> <span><sub>BBL</sub></span>
        </div>
        </div>
        
        <div class="calc-row">
        <div class="label-iadc-v">Tubería de <br>perforación <br>en agujero <br>abierto</div>
        <div class="formula-section-anular">
            <span>Capacidad Anular</span>
            <input class="input-iadc-v-sur min-text" type="number"> <span><sub>BBL/PIE</sub> × Longitud</span>
            <input class="input-iadc-v-sur min-text" type="number"> <span><sub>PIES</sub> = </span>
            <input class="input-iadc-v-sur min-text" type="number"> <span><sub>BBL</sub></span>
        </div>
        </div>
        
        <div class="calc-row">
        <div class="label-iadc-v">HWDP en <br>agujero <br>abierto</div>
        <div class="formula-section-anular">
            <span>Capacidad Anular</span>
            <input class="input-iadc-v-sur min-text" type="number"> <span><sub>BBL/PIE</sub> × Longitud</span>
            <input class="input-iadc-v-sur min-text" type="number"> <span><sub>PIES</sub> = </span>
            <input class="input-iadc-v-sur min-text" type="number"> <span><sub>BBL</sub></span>
        </div>
        </div>
        
        <div class="calc-row">
        <div class="label-iadc-v">Collares de <br>perforación <br>en agujero <br>abierto (DC)</div>
        <div class="formula-section-anular">
            <span>Capacidad Anular</span>
            <input class="input-iadc-v-sur min-text" type="number"> <span><sub>BBL/PIE</sub> × Longitud</span>
            <input class="input-iadc-v-sur min-text" type="number"> <span><sub>PIES</sub> = </span>
            <input class="input-iadc-v-sur min-text" type="number"> <span><sub>BBL</sub></span>
        </div>
        </div>
    </div>
    
    <div class="total-box">
        <div class="blue-text">Volumen total de agujero abierto = <input class="input-iadc-v-sur min-text" type="number"> BBL</div>
    </div>
    
    <div class="total-box">
        <div class="blue-text">Volumen total del espacio anular = <input class="input-iadc-v-sur min-text" type="number"> BBL</div>
    </div>
    </div>
    
    <!--tercera columna -->
    <div class="right-column-1">
        <div class="header-iadc-v" style="  width: 100%;
        padding-bottom: 0.5vw;
        border-bottom: 1px solid #000;">
            <img src="/assets/images/killsheets/logoiadc.png" alt="IADC" style="float:left">
            <span class="titleIadcVS">Hoja de matar - Superficie</span>
            <img src="/assets/images/killsheets/logosmithmason.png" alt="Smith Mason & Co Logo" style="float:right">
            
        </div>
        
        <div class="formula" style="text-align: center; margin: 20px 0;">
            <span>Salida de la bomba = </span>
            <input class="input-iadc-v-sur" type="number"> BBL/EMB
        </div>
        
        <div class="section-title-iadc-v">Emboladas de circulación</div>
        
        <div class="section">
            <div class="blue-text">Emboladas hasta la barrena (STB)</div>
            <div style="margin: 10px 0;  font-family: Cambria,Georgia,serif; ">
            <input class="input-iadc-v-sur" type="number" style="width: 40px"> Volumen sarta perf. BBL + 
            <input class="input-iadc-v-sur" type="number" style="width: 40px"> Salida de la bomba BBL/EMB = 
            <input class="input-iadc-v-sur" type="number" style="width: 40px"> EMB
            </div>
            
            <div class="blue-text">Emboladas desde la barren hasta la zapata del revestimiento</div>
            <div style="margin: 10px 0;  font-family: Cambria,Georgia,serif; ">
            <input class="input-iadc-v-sur" type="number" style="width: 40px"> Vol. agujero abierto BBL + 
            <input class="input-iadc-v-sur" type="number" style="width: 40px"> Salida de la bomba BBL/EMB = 
            <input class="input-iadc-v-sur" type="number" style="width: 40px"> EMB
            </div>
            
            <div class="blue-text">Emboladas de fondo a superficie</div>
            <div style="margin: 10px 0;  font-family: Cambria,Georgia,serif; ">
            <input class="input-iadc-v-sur" type="number" style="width: 40px"> Vol. espacio anular BBL + 
            <input class="input-iadc-v-sur" type="number" style="width: 40px"> Salida de la bomba BBL/EMB = 
            <input class="input-iadc-v-sur" type="number" style="width: 40px"> EMB
            </div>
            
            <div class="blue-text">Circulación total del pozo</div>
            <div style="margin: 10px 0;  font-family: Cambria,Georgia,serif; ">
            <input class="input-iadc-v-sur" type="number" style="width: 40px"> Emb. hasta la barrena + 
            <input class="input-iadc-v-sur" type="number" style="width: 40px"> Emb. fondo a superficie = 
            <input class="input-iadc-v-sur" type="number" style="width: 40px"> EMB
            </div>
            
            <div class="blue-text">Emboladas línea de superficie (Método de Esperar y Pesar)</div>
            <div style="margin: 10px 0;  font-family: Cambria,Georgia,serif; ">
            <input class="input-iadc-v-sur" type="number" style="width: 40px"> Vol. línea de superf. BBL + 
            <input class="input-iadc-v-sur" type="number" style="width: 40px"> Salida de la bomba BBL/EMB = 
            <input class="input-iadc-v-sur" type="number" style="width: 40px"> EMB
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
                <td><input class="input-iadc-v-sur" type="number"> PSI</td>
                </tr>
                <tr>
                <td style="background-color: #0000001f;"><strong> Presión de cierre en el revestimiento (SICP)</strong></td>
                <td><input class="input-iadc-v-sur" type="number"> PSI</td>
                </tr>
                <tr>
                <td style="background-color: #0000001f;"><strong> Ganancia en tanques</strong></td>
                <td><input class="input-iadc-v-sur" type="number"> BBL</td>
                </tr>
                <tr>
                <td style="background-color: #0000001f;"><strong>Densidad del lodo original (OMW)</strong></td>
                <td style="min-width:7vw;"><input class="input-iadc-v-sur" type="number"> PPG</td>
                </tr>
                <tr>
                <td style="background-color: #0000001f;"><strong>Presión reducida de la bomba (SCRP)<strong></td>
                <td><input class="input-iadc-v-sur" type="number"> PSI</td>
                </tr>
            </table>
            <h2 style="padding-right: 1vw;">Hoja de matar - Superficie <br> www.smithmasonco.com</h2>
        </div>

        <!-- Influx Info Table -->
       

        <!-- KMW Calculation -->
        <div class="formula-row" style="border-top: 0.1vw solid #000; padding: 10px;">
            <div class="title">Densidad del lodo para matar (KMW) (Redondear el primer decimal hacia arriba)</div>
            <div class="formula-content">
            (SIDPP <input type="number" class="input-iadc-v-sur small-input"> PSI ÷ 0.052÷TVD del pozo <input type="number" class="input-iadc-v-sur small-input"> PIES)+Dens. del lodo actual <input type="number" class="input-iadc-v-sur small-input"> PPG=KMW <input type="number" class="input-iadc-v-sur small-input"> PPG
            </div>
        </div>

        <!-- MAMW Calculation -->
        <div class="formula-row" style="margin-top: 1vw; border-top: 0.1vw solid #000; padding: 10px; ">
            <div class="title" style="margin-top: 1vw;">Máxima densidad del lodo permitida (MAMW) (Redondear el primer decimal hacia abajo)</div>
            <div class="formula-content" style="font-size: 0.9vw;">
            Presión "Leak-off" en superficie <input type="number" class="input-iadc-v-sur small-input"> PSI÷0.052÷TVD zapata <input type="number" class="input-iadc-v-sur small-input"> PIES)+Dens. lodo durante la prueba <input type="number" class="input-iadc-v-sur small-input"> PPG
            </div>
            <div class="formula-content" style="margin-top: 0.5vw; margin-right: 0.5vw;justify-content: right;">
            =MAMW <input type="number" class="input-iadc-v-sur small-input"> PPG
            </div>
            <div class="formula-content" style="margin-top: 0.5vw;">
            O
            </div>
            <div class="formula-content" style="margin-top: 2vw;">
            Gradiente de fractura <input type="number" class="input-iadc-v-sur small-input"> PSI/FT÷0.052=MAMW <input type="number" class="input-iadc-v-sur small-input"> PPG
            </div>
        </div>

        <!-- MAASP Calculation 1 -->
        <div class="formula-row" style="margin-top: 1vw; padding: 10px;">
            <div class="title">Presión anular máxima permitida en la superficie (MAASP) <span class="underline">ANTES</span> del influjo</div>
            <div class="formula-content">
            (MAMW <input type="number" class="input-iadc-v-sur small-input"> <sub>PPG</sub> - Dens. lodo actual <input type="number" class="input-iadc-v-sur small-input"> PPG )× 0.052 × TVD zapata <input type="number" class="input-iadc-v-sur small-input"> <sub>PIES</sub> = MAASP <input type="number" class="input-iadc-v-sur small-input"> <sub>PSI</sub>
            </div>
        </div>

        <!-- MAASP Calculation 2 -->
        <div class="formula-row" style="margin-top: 3vw; padding: 10px;">
            <div class="title">MAASP <span class="underline">DESPUÉS</span> de que el pozo está muerto</div>
            <div class="formula-content" style="font-size: 0.9vw;">
            (MAMW <input type="number" class="input-iadc-v-sur small-input"> <sub>PPG</sub>  – Dens. lodo para matar(KMW) <input type="number" class="input-iadc-v-sur small-input"> PPG )× 0.052 × TVD zapata <input type="number" class="input-iadc-v-sur small-input"> <sub>PIES</sub> = MAASP <input type="number" class="input-iadc-v-sur small-input"> <sub>PSI</sub>
            </div>
        </div>

        <!-- Circulation Pressures -->
        <div class="formula-row" style="margin-top: 3vw; border-top: 0.1vw solid #000; padding: 10px;">
            <div class="title" style="text-align: center; font-size: 1vw;">Presiones de circulación</div>
            
            <!-- ICP Calculation -->
            <div style="margin-top: 2vw">
            <div class="title" style="margin-top: 2vw;" >Presión inicial de circulación (ICP)</div>
            <div class="formula-content">
                SIDPP <input type="number" class="input-iadc-v-sur small-input"> <sub>PSI</sub> + Presión reducida de la bomba (SCRP) <input type="number" class="input-iadc-v-sur small-input"> <sub>PSI</sub> = ICP <input type="number" class="input-iadc-v-sur small-input"> <sub>PSI</sub>
            </div>
            </div>
            
            <!-- FCP Calculation -->
            <div style="margin-top: 2vw;">
            <div class="title" style="margin-top: 2vw;">Presión final de circulación (FCP)</div>
            <div class="formula-content" >
                Presión reducida bomba (SCRP) <input type="number" class="input-iadc-v-sur small-input"><sub style="margin-top:1vw;">PSI</sub> x (
                <div style="display: inline-block; text-align: center;">
                <div style="padding: 2px 5px;">
                    Dens. lodo para matar (KMW) <input type="number" class="input-iadc-v-sur small-input"> <sub>PPG</sub>
                    <hr style="margin: 2px 0;">
                    Dens. lodo original (OMW) <input type="number" class="input-iadc-v-sur small-input"> <sub>PPG</sub>
                </div>
                </div>
                ) = FCP <input type="number" class="input-iadc-v-sur small-input"><sub>PSI</sub>
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
            <td><input class="input-iadc-v-sur" type="number"></td>
            </tr>
            <tr>
            <td style="background-color: #0000001f; ">Presión inicial de circulación (ICP)</td>
            <td><input class="input-iadc-v-sur" type="number"></td>
            </tr>
            <tr>
            <td style="background-color: #0000001f;">Presión final de circulación (FCP)</td>
            <td><input class="input-iadc-v-sur" type="number"></td>
            </tr>
             <tr>
            <td style="background-color: #0000001f;">Emboladas de superficie hasta la barrena (STB)</td>
            <td><input class="input-iadc-v-sur" type="number"></td>
            </tr>
            <tr>
            <td style="background-color: #0000001f;">Emboladas desde la barrena hasta la zapata del<br> revestimiento</td>
            <td><input class="input-iadc-v-sur" type="number"></td>
            </tr>
            <tr>
            <td style="background-color: #0000001f;">Emboladas fondo a superficie</td>
            <td><input class="input-iadc-v-sur" type="number"></td>
            </tr>
            <tr>
            <td style="background-color: #0000001f;">Emboladas totales de circulación</td>
            <td><input class="input-iadc-v-sur" type="number"></td>
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
            <td><input class="input-iadc-v-sur" type="number">ICP</td>
            <td><input class="input-iadc-v-sur" type="number"></td>
            </tr>
            <tr>
            <td><input class="input-iadc-v-sur" type="number"></td>
            <td><input class="input-iadc-v-sur" type="number"></td>
            <td><input class="input-iadc-v-sur" type="number"></td>
            </tr>
            <tr>
            <td><input class="input-iadc-v-sur" type="number"></td>
            <td><input class="input-iadc-v-sur" type="number"></td>
            <td><input class="input-iadc-v-sur" type="number"></td>
            </tr>
            <tr>
            <td><input class="input-iadc-v-sur" type="number"></td>
            <td><input class="input-iadc-v-sur" type="number"></td>
            <td><input class="input-iadc-v-sur" type="number"></td>
            </tr>
            <tr>
            <td><input class="input-iadc-v-sur" type="number"></td>
            <td><input class="input-iadc-v-sur" type="number"></td>
            <td><input class="input-iadc-v-sur" type="number"></td>
            </tr>
            <tr>
            <td><input class="input-iadc-v-sur" type="number"></td>
            <td><input class="input-iadc-v-sur" type="number"></td>
            <td><input class="input-iadc-v-sur" type="number"></td>
            </tr>
             <tr>
            <td><input class="input-iadc-v-sur" type="number"></td>
            <td><input class="input-iadc-v-sur" type="number"></td>
            <td><input class="input-iadc-v-sur" type="number"></td>
            </tr>
             <tr>
            <td><input class="input-iadc-v-sur" type="number"></td>
            <td><input class="input-iadc-v-sur" type="number"></td>
            <td><input class="input-iadc-v-sur" type="number"></td>
            </tr>
             <tr>
            <td><input class="input-iadc-v-sur" type="number"></td>
            <td><input class="input-iadc-v-sur" type="number"></td>
            <td><input class="input-iadc-v-sur" type="number"></td>
            </tr>
             <tr>
            <td><input class="input-iadc-v-sur" type="number"></td>
            <td><input class="input-iadc-v-sur" type="number"></td>
            <td><input class="input-iadc-v-sur" type="number"></td>
            </tr>
             <tr>
            <td><input class="input-iadc-v-sur" type="number"></td>
            <td><input class="input-iadc-v-sur" type="number"></td>
            <td><input class="input-iadc-v-sur" type="number"></td>
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
        </div> = <input type="number" class="input-iadc-v-sur small-input">
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
        </div> = <input type="number" class="input-iadc-v-sur small-input">
        </div>
        
        <div class="instruction">
        <strong> Restar la reducción de presión promedio de la presión inicial de circulación (ICP) hasta llenar la celda por debajo de la (ICP). Repita este proceso hasta completar la columna.
        </strong>
        </div>
        
        <div class="formula-content">
        ICP<sub>PSI</sub> − Reducción promedio de presión en PSI 
        </div>
       
    </div>
    <div style="border-top: 0.1vw solid #000; width:102%">Nombre: <input type="number" class="input-iadc-v-sur large-input"></div>
    <div style="display: flex; min-width:100%;">
        <div style="flex: 1; align-items:start; ">
            <div >Fecha: <input type="number" class="input-iadc-v-sur large-input"></div>
        </div>
        <div style="flex: 1; text-align:end;">
            <div>Hoja de matar #: <input type="number" class="input-iadc-v-sur medium-input"></div>
        </div>
    </div>
    </div>
    <!-- Name and Date -->
    
</div>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');


        .quiz-body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #fff;
            z-index: -1;
        }

        .quiz-main-container {
            border-radius: 25px;
            padding: 40px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .quiz-title {
            color: white;
            font-size: 2.5em;
            font-weight: 700;
            text-align: center;
            margin-bottom: 40px;
            text-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .quiz-grid {
            gap: 25px;
            width: 100%;
        }

        .quiz-column {
            gap: 25px;
        }

        .quiz-question-item {
            background: rgba(255, 255, 255, 0.068);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 30px;
            margin: 1vw;
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .quiz-question-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            background: rgba(255, 255, 255, 0.2);
        }

        .question-text {
            color: white;
            font-size: 1.1em;
            font-weight: 600;
            line-height: 1.6;
            margin-bottom: 25px;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }

        .input-container {
            position: relative;
            margin-top: 10px;
        }

        .user-answer-input {
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 2px solid rgba(255, 255, 255, 0.4);
            padding: 12px 50px 12px 0;
            font-size: 1.1em;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            color: white;
            transition: all 0.3s ease;
            outline: none;
        }

        .user-answer-input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .user-answer-input:focus {
            border-bottom: 2px solid rgba(255, 255, 255, 0.9);
            transform: translateY(-2px);
        }

        .user-answer-input.valid-answer {
            border-bottom: 2px solid #00ff88;
            color: #00ff88;
        }

        .user-answer-input.invalid-answer {
            border-bottom: 2px solid #ff4757;
            color: #ff4757;
            animation: shake 0.5s ease-in-out;
        }

        .input-unit {
            position: absolute;
            right: 0;
            bottom: 12px;
            color: rgba(255, 255, 255, 0.7);
            font-weight: 600;
            font-size: 0.9em;
            pointer-events: none;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        /* Estilos para SweetAlert personalizado */
        .swal-overlay {
            background: rgba(0, 0, 0, 0.7) !important;
            backdrop-filter: blur(10px) !important;
        }

        .swal-modal {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(20px) !important;
            border-radius: 20px !important;
            border: 1px solid rgba(255, 255, 255, 0.3) !important;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3) !important;
            animation: bounceInError 0.6s ease-out !important;
        }

        .swal-title {
            color: #ff4757 !important;
            font-family: 'Poppins', sans-serif !important;
            font-weight: 700 !important;
            font-size: 1.8em !important;
        }

        .swal-text {
            color: #333 !important;
            font-family: 'Poppins', sans-serif !important;
            font-weight: 500 !important;
            line-height: 1.6 !important;
        }

        .swal-button--confirm {
            background: linear-gradient(135deg, #ff4757, #ff3742) !important;
            border-radius: 15px !important;
            font-family: 'Poppins', sans-serif !important;
            font-weight: 600 !important;
            box-shadow: 0 10px 25px rgba(255, 71, 87, 0.4) !important;
            transition: all 0.3s ease !important;
        }

        .swal-button--confirm:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 15px 35px rgba(255, 71, 87, 0.6) !important;
        }

        @keyframes bounceInError {
            0% {
                transform: scale(0.3) rotate(-10deg);
                opacity: 0;
            }
            50% {
                transform: scale(1.05) rotate(2deg);
                opacity: 1;
            }
            70% {
                transform: scale(0.95) rotate(-1deg);
            }
            100% {
                transform: scale(1) rotate(0deg);
                opacity: 1;
            }
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .quiz-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .quiz-body {
                padding: 20px;
            }

            .quiz-main-container {
                padding: 25px;
            }

            .quiz-grid {
                grid-template-columns: 1fr;
            }

            .quiz-title {
                font-size: 2em;
            }

            .question-text {
                font-size: 1em;
            }
        }

        /* Efectos adicionales */
        .quiz-question-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 20px;
            padding: 1px;
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.3), transparent);
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            mask-composite: exclude;
            pointer-events: none;
        }

/* Contenedor principal de la alerta */
.swal2-popup.swal2-modal {
    border-radius: 25px !important;
    border: 3px solid #ff4444 !important;
    box-shadow: 0 0 30px rgba(255, 68, 68, 0.4), 
                0 0 60px rgba(255, 68, 68, 0.2) !important;
    background: #ffffff !important;
    padding: 30px !important;
}

/* Título personalizado */
.swal2-title {
    color: #ff4444 !important;
    font-weight: bold !important;
    font-size: 24px !important;
    text-shadow: 0 2px 4px rgba(255, 68, 68, 0.3) !important;
    margin-bottom: 20px !important;
}

/* Contenido del texto */
.swal2-html-container {
    color: #333333 !important;
    font-size: 16px !important;
    line-height: 1.5 !important;
    margin-bottom: 25px !important;
}

/* Botón de confirmación - SIN clases personalizadas */
.swal2-confirm {
    background: #236192 !important;
    border: none !important;
    border-radius: 20px !important;
    padding: 12px 30px !important;
    font-size: 16px !important;
    font-weight: 600 !important;
    color: white !important;
    box-shadow: 0 4px 15px rgba(35, 97, 146, 0.3) !important;
    transition: all 0.3s ease !important;
    text-transform: uppercase !important;
    letter-spacing: 1px !important;
}

/* Efecto hover del botón */
.swal2-confirm:hover {
    background: #1e5580 !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 6px 20px rgba(35, 97, 146, 0.4) !important;
}

/* Efecto activo del botón */
.swal2-confirm:active {
    transform: translateY(0) !important;
    box-shadow: 0 3px 10px rgba(35, 97, 146, 0.3) !important;
}

/* Personalizar el icono de error */
.swal2-icon.swal2-error {
    border-color: #ff4444 !important;
    color: #ff4444 !important;
}

.swal2-icon.swal2-error [class^='swal2-x-mark-line'] {
    background-color: #ff4444 !important;
}

/* Efecto de resplandor adicional para el contenedor */
.swal2-popup::before {
    content: '';
    position: absolute;
    top: -5px;
    left: -5px;
    right: -5px;
    bottom: -5px;
    background: linear-gradient(45deg, 
                rgba(255, 68, 68, 0.3), 
                rgba(255, 68, 68, 0.1), 
                rgba(255, 68, 68, 0.3));
    border-radius: 30px;
    z-index: -1;
    filter: blur(10px);
    opacity: 0.7;
}



/* Fondo oscurecido más suave */
.swal2-backdrop-show {
    background: rgba(0, 0, 0, 0.6) !important;
  backdrop-filter: blur(10px);
}
</style>
 <div class="quiz-main-container" id="contenedorPreguntasHoja">
        <h3 class="quiz-title">Preguntas</h3>
        
        <div class="quiz-grid">
            <div class="quiz-column">
                <div class="quiz-question-item">
                    <div class="question-text">1. Calcular el margen de seguridad de la presión en la zapata del revestimiento en esta condición estática, asumiendo que el tope del influjo está por debajo de la zapata del revestimiento</div>
                    <div class="input-container">
                        <input type="number" class="user-answer-input" placeholder="Ingresa tu respuesta" data-correct-answer="663" data-answer-tip="Recuerda que este parámetro se obtiene restando SICP a la MAASP">
                        <span class="input-unit">psi</span>
                    </div>
                </div>

                <div class="quiz-question-item">
                    <div class="question-text">2. Calcular la MAASP usando la densidad original del lodo</div>
                    <div class="input-container">
                        <input type="number" class="user-answer-input" placeholder="Ingresa tu respuesta" data-correct-answer="1269" data-answer-tip="Este valor lo calculaste en tu hoja de matar, es a lo que hemos llamado MAASP ANTES del influjo">
                        <span class="input-unit">psi</span>
                    </div>
                </div>

                <div class="quiz-question-item">
                    <div class="question-text">3. Determinar la presión de formación en el tope del influjo</div>
                    <div class="input-container">
                        <input type="number" class="user-answer-input" placeholder="Ingresa tu respuesta" data-correct-answer="2150" data-answer-tip="Utiliza la ecuación de presión hidrostática considerando la columna de lodo">
                        <span class="input-unit">psi</span>
                    </div>
                </div>

                <div class="quiz-question-item">
                    <div class="question-text">4. Calcular la presión diferencial en la zapata</div>
                    <div class="input-container">
                        <input type="number" class="user-answer-input" placeholder="Ingresa tu respuesta" data-correct-answer="485" data-answer-tip="La diferencia entre la presión de formación y la presión hidrostática del lodo">
                        <span class="input-unit">psi</span>
                    </div>
                </div>
            </div>

            <div class="quiz-column">
                <div class="quiz-question-item">
                    <div class="question-text">5. Determinar el equivalente de densidad de lodo (EMW) para balancear la formación</div>
                    <div class="input-container">
                        <input type="number" class="user-answer-input" placeholder="Ingresa tu respuesta" data-correct-answer="12.5" data-answer-tip="Convierte la presión de formación a densidad equivalente de lodo">
                        <span class="input-unit">ppg</span>
                    </div>
                </div>

                <div class="quiz-question-item">
                    <div class="question-text">6. Calcular la presión de circulación inicial (ICP)</div>
                    <div class="input-container">
                        <input type="number" class="user-answer-input" placeholder="Ingresa tu respuesta" data-correct-answer="850" data-answer-tip="Suma la presión de formación más las pérdidas por fricción en el sistema">
                        <span class="input-unit">psi</span>
                    </div>
                </div>

                <div class="quiz-question-item">
                    <div class="question-text">7. Determinar el gradiente de fractura en la zapata del revestimiento</div>
                    <div class="input-container">
                        <input type="number" class="user-answer-input" placeholder="Ingresa tu respuesta" data-correct-answer="0.85" data-answer-tip="Utiliza los datos de la prueba de presión de la zapata (LOT/FIT)">
                        <span class="input-unit">psi/ft</span>
                    </div>
                </div>
            </div>

            <div class="quiz-column">
                <div class="quiz-question-item">
                    <div class="question-text">8. Calcular el volumen del influjo detectado en superficie</div>
                    <div class="input-container">
                        <input type="number" class="user-answer-input" placeholder="Ingresa tu respuesta" data-correct-answer="15.2" data-answer-tip="Considera el aumento en el volumen de los tanques activos">
                        <span class="input-unit">bbl</span>
                    </div>
                </div>

                <div class="quiz-question-item">
                    <div class="question-text">9. Determinar la densidad final de lodo requerida (Kill Mud Weight)</div>
                    <div class="input-container">
                        <input type="number" class="user-answer-input" placeholder="Ingresa tu respuesta" data-correct-answer="13.2" data-answer-tip="Incluye el margen de seguridad sobre la densidad de balance">
                        <span class="input-unit">ppg</span>
                    </div>
                </div>

                <div class="quiz-question-item">
                    <div class="question-text">10. Calcular la presión final de circulación (FCP)</div>
                    <div class="input-container">
                        <input type="number" class="user-answer-input" placeholder="Ingresa tu respuesta" data-correct-answer="720" data-answer-tip="La presión requerida para circular con el lodo de control">
                        <span class="input-unit">psi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <script>
   const container = document.getElementById("dataSections");
    const btnLeft = document.getElementById("scrollLeft");
    const btnRight = document.getElementById("scrollRight");


    const targetDivId = "contenedorPreguntasHoja"; // Cambia esto por el ID de tu div
    const targetDiv = document.getElementById(targetDivId);

    // Variable para controlar el estado fijo
    let isFixed = true;
    let fixedElement = document.getElementById("datosPozoContenedor");

    function updateButtons() {
      const scrollLeft = container.scrollLeft;
      const maxScroll = container.scrollWidth - container.clientWidth;

      btnLeft.style.display = scrollLeft > 0 ? "block" : "none";
      btnRight.style.display = scrollLeft < maxScroll - 1 ? "block" : "none";
    }

    function checkTargetDivPosition() {
 
    }

    function scrollSections(direction) {
      const scrollAmount = 300;
      container.scrollBy({
        left: direction * scrollAmount,
        behavior: "smooth"
      });
    }

    btnLeft.addEventListener("click", () => scrollSections(-1));
    btnRight.addEventListener("click", () => scrollSections(1));
    container.addEventListener("scroll", updateButtons);
    window.addEventListener("resize", updateButtons);


    window.addEventListener("scroll", checkTargetDivPosition);

    // Drag con mouse/touch
    let isDown = false;
    let startX;
    let scrollLeftStart;

    container.addEventListener("mousedown", (e) => {
      isDown = true;
      startX = e.pageX - container.offsetLeft;
      scrollLeftStart = container.scrollLeft;
      container.classList.add("dragging");
    });
    container.addEventListener("mouseleave", () => isDown = false);
    container.addEventListener("mouseup", () => isDown = false);
    container.addEventListener("mousemove", (e) => {
      if (!isDown) return;
      e.preventDefault();
      const x = e.pageX - container.offsetLeft;
      const walk = (x - startX) * 1.5; // velocidad drag
      container.scrollLeft = scrollLeftStart - walk;
    });

    // Touch
    container.addEventListener("touchstart", (e) => {
      isDown = true;
      startX = e.touches[0].pageX - container.offsetLeft;
      scrollLeftStart = container.scrollLeft;
    });
    container.addEventListener("touchend", () => isDown = false);
    container.addEventListener("touchmove", (e) => {
      if (!isDown) return;
      const x = e.touches[0].pageX - container.offsetLeft;
      const walk = (x - startX) * 1.5;
      container.scrollLeft = scrollLeftStart - walk;
    });

    // Inicializar
    updateButtons();
    class DraggableTimer {
            constructor() {
                this.widget = document.getElementById('timerWidget');
                this.display = document.getElementById('timerDisplay');
                
                // Configurar tiempo inicial desde JavaScript (5 minutos)
                this.totalSeconds = 1 * 60; // 5 minutos
                this.isRunning = false;
                this.interval = null;
                
                this.isDragging = false;
                this.dragOffset = { x: 0, y: 0 };
                
                this.init();
            }
            
            init() {
                this.setupDragging();
                this.updateDisplay();
                // Iniciar automáticamente el timer
                this.startTimer();
            }
            
            setupDragging() {
                this.widget.addEventListener('mousedown', (e) => this.startDrag(e));
                this.widget.addEventListener('touchstart', (e) => this.startDrag(e));
                
                document.addEventListener('mousemove', (e) => this.drag(e));
                document.addEventListener('touchmove', (e) => this.drag(e));
                
                document.addEventListener('mouseup', () => this.stopDrag());
                document.addEventListener('touchend', () => this.stopDrag());
            }
            
            startDrag(e) {
                this.isDragging = true;
                this.widget.classList.add('timer-dragging');
                
                const rect = this.widget.getBoundingClientRect();
                const clientX = e.clientX || e.touches[0].clientX;
                const clientY = e.clientY || e.touches[0].clientY;
                
                this.dragOffset.x = clientX - rect.left - rect.width / 2;
                this.dragOffset.y = clientY - rect.top - rect.height / 2;
                
                e.preventDefault();
            }
            
            drag(e) {
                if (!this.isDragging) return;
                
                const clientX = e.clientX || e.touches[0].clientX;
                const clientY = e.clientY || e.touches[0].clientY;
                
                const x = clientX - this.dragOffset.x;
                const y = clientY - this.dragOffset.y;
                
                // Mantener dentro de los límites de la ventana
                const maxX = window.innerWidth - this.widget.offsetWidth / 2;
                const maxY = window.innerHeight - this.widget.offsetHeight / 2;
                const minX = this.widget.offsetWidth / 2;
                const minY = this.widget.offsetHeight / 2;
                
                const clampedX = Math.max(minX, Math.min(maxX, x));
                const clampedY = Math.max(minY, Math.min(maxY, y));
                
                this.widget.style.left = clampedX + 'px';
                this.widget.style.top = clampedY + 'px';
                this.widget.style.transform = 'translate(-50%, -50%) scale(1.05)';
            }
            
            stopDrag() {
                this.isDragging = false;
                this.widget.classList.remove('timer-dragging');
                this.widget.style.transform = 'translate(-50%, -50%)';
            }
            
            setupControls() {
                // Método eliminado - ya no hay controles
            }
            
            startTimer() {
                if (this.totalSeconds > 0) {
                    this.isRunning = true;
                    this.interval = setInterval(() => this.tick(), 1000);
                }
            }
            
            resetTimer() {
                this.isRunning = false;
                this.totalSeconds = 1 * 60; 
                clearInterval(this.interval);
                this.updateDisplay();
                this.updateColors();
                this.display.classList.remove('timer-blink');
                this.widget.classList.remove('timer-alert', 'timer-critical');
                // Reiniciar automáticamente
                setTimeout(() => this.startTimer(), 1000);
            }
            
            tick() {
                this.totalSeconds--;
                this.updateDisplay();
                this.updateColors();
                
                if (this.totalSeconds <= 0) {
                    this.resetTimer();
                    this.onTimerComplete();
                }
            }
            
            updateDisplay() {
                const minutes = Math.floor(this.totalSeconds / 60);
                const seconds = this.totalSeconds % 60;
                this.display.textContent = 
                    `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            }
            
            updateColors() {
                // Remover todas las clases de color y animación
                this.widget.classList.remove('timer-blue', 'timer-yellow', 'timer-red', 'timer-alert', 'timer-critical');
                this.display.classList.remove('timer-blink');
                
                if (this.totalSeconds > 30) {
                    // Más de 1 minuto - Azul
                    this.widget.classList.add('timer-blue');
                } else if (this.totalSeconds > 10) {
                    // Entre 3 y 10 segundos - Rojo con parpadeo y animación de alerta
                    this.widget.classList.add('timer-red', 'timer-alert');
                    this.display.classList.add('timer-blink');
                } else if (this.totalSeconds >= 0) {
                    // Últimos 3 segundos - Animación crítica más intensa
                    this.widget.classList.add('timer-red', 'timer-critical');
                    this.display.classList.add('timer-blink');
                } else {
                    // Tiempo agotado
                    this.widget.classList.add('timer-blue');
                }
            }
            
            onTimerComplete() {
                // Efecto visual al completar
                this.widget.style.animation = 'none';
                setTimeout(() => {
                    this.widget.style.animation = '';
                }, 100);
                
                // Opcional: reproducir sonido o mostrar notificación
                // if ('Notification' in window && Notification.permission === 'granted') {
                //     new Notification('¡Tiempo agotado!', {
                //         body: 'El cronómetro ha terminado.',
                //         icon: 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEyIDJDNi40OSAyIDIgNi40OSAyIDEyUzYuNDkgMjIgMTIgMjJTMjIgMTcuNTEgMjIgMTJTMTcuNTEgMiAxMiAyWk0xMyAxN0gxMVY5SDEzVjE3Wk0xMyA3SDExVjVIMTNWN1oiIGZpbGw9IiNGRjQxNkMiLz4KPC9zdmc+'
                //     });
                // } else if ('Notification' in window && Notification.permission !== 'denied') {
                //     Notification.requestPermission();
                // }
            }
        }
        
        // Inicializar el cronómetro cuando se carga la página
        document.addEventListener('DOMContentLoaded', () => {
            new DraggableTimer();
            
            // Solicitar permiso para notificaciones
            // if ('Notification' in window && Notification.permission === 'default') {
            //     Notification.requestPermission();
            // }
        });

    document.addEventListener('DOMContentLoaded', () => {
            const answerInputs = document.querySelectorAll('.user-answer-input');

            answerInputs.forEach(input => {
                input.addEventListener('blur', (event) => {
                    const userAnswer = parseFloat(event.target.value.trim());
                    const correctAnswer = parseFloat(event.target.getAttribute('data-correct-answer'));
                    const hint = event.target.getAttribute('data-answer-tip');

                    // Limpiar clases de validación anteriores
                    input.classList.remove('valid-answer', 'invalid-answer');

                    if (userAnswer && !isNaN(userAnswer)) {
                        // Permitir un margen de error del 5%
                        const tolerance = correctAnswer * 0.05;
                        const isCorrect = Math.abs(userAnswer - correctAnswer) <= tolerance;

                        if (isCorrect) {
                            input.classList.add('valid-answer');
                            
                            // Efecto visual de éxito
                            input.style.transform = 'scale(1.02)';
                            setTimeout(() => {
                                input.style.transform = 'scale(1)';
                            }, 200);

                        } else {
                            input.classList.add('invalid-answer');
                            
                            // Alerta personalizada con animación
                           Swal.fire({
                                title: 'Respuesta Incorrecta',
                                text: hint,
                                icon: 'error',
                                confirmButtonText: 'Entendido'
                            });
                        }
                    }
                });

                // Efecto de focus mejorado
                input.addEventListener('focus', (event) => {
                    event.target.style.transform = 'translateY(-2px)';
                });

                input.addEventListener('blur', (event) => {
                    if (!event.target.classList.contains('valid-answer') && 
                        !event.target.classList.contains('invalid-answer')) {
                        event.target.style.transform = 'translateY(0)';
                    }
                });
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            const answerInputs = document.querySelectorAll('.validate-answer-question');

            answerInputs.forEach(input => {
                input.addEventListener('blur', (event) => {
                    const userAnswer = parseFloat(event.target.value.trim());
                    const correctAnswer = parseFloat(event.target.getAttribute('data-correct-answer'));
                    const hint = event.target.getAttribute('data-answer-tip');

                    // Limpiar clases de validación anteriores
                    input.classList.remove('valid-answer', 'invalid-answer');

                    if (userAnswer && !isNaN(userAnswer)) {
                        // Permitir un margen de error del 5%
                        const tolerance = correctAnswer * 0.05;
                        const isCorrect = Math.abs(userAnswer - correctAnswer) <= tolerance;

                        if (isCorrect) {
                            input.classList.add('valid-answer');
                            
                            // Efecto visual de éxito
                            input.style.transform = 'scale(1.02)';
                            setTimeout(() => {
                                input.style.transform = 'scale(1)';
                            }, 200);

                        } else {
                            input.classList.add('invalid-answer');
                            
                            // Alerta personalizada con animación
                           Swal.fire({
                                title: 'Respuesta Incorrecta',
                                text: hint,
                                icon: 'error',
                                confirmButtonText: 'Entendido'
                            });
                        }
                    }
                });

                // Efecto de focus mejorado
                input.addEventListener('focus', (event) => {
                    event.target.style.transform = 'translateY(-2px)';
                });

                input.addEventListener('blur', (event) => {
                    if (!event.target.classList.contains('valid-answer') && 
                        !event.target.classList.contains('invalid-answer')) {
                        event.target.style.transform = 'translateY(0)';
                    }
                });
            });
        });
  </script>
@endsection  

@php
    $css_identifier = 'IADC_VW_FE';

@endphp

