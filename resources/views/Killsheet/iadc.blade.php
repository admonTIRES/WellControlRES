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
      padding: 20px;
    }
    
    .container {
      display: flex;
      max-width: 1200px;
      border: 2px solid #000;
      margin: 0 auto 20px auto;
    }
    
    .well-diagram {
      width: 230px;
      min-height: 850px;
      background-color: #f0f0f0;
      border-right: 2px solid #000;
      position: relative;
    }
    
    .calculation-form {
      flex: 1;
      padding: 10px;
    }
    
    .header {
      display: flex;
      justify-content: space-between;
      border-bottom: 1px solid #000;
      padding-bottom: 10px;
      margin-bottom: 10px;
    }
    
    .section {
      margin-bottom: 20px;
    }
    
    .section-title {
      text-align: center;
      color: blue;
      border: 1px solid blue;
      border-radius: 20px;
      padding: 5px;
      width: 80%;
      margin: 15px auto;
    }
    
    .calc-row {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
    }
    
    .label {
      width: 150px;
      font-size: 12px;
      text-align: center;
      border: 1px solid #000;
      padding: 5px;
    }
    
    .formula {
      flex: 1;
      display: flex;
      align-items: center;
    }
    
    input {
      width: 80px;
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
    
    .right-column {
      padding: 10px;
      border-left: 1px solid #000;
    }
    
    .blue-text {
      color: blue;
    }
    
    /* Styles for kill sheet */
    .kill-sheet {
      display: flex;
      max-width: 1200px;
      border: 2px solid #000;
      margin: 20px auto;
    }
    
    .left-column, .right-column {
      flex: 1;
      padding: 10px;
    }
    
    .info-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 15px;
    }
    
    .info-table td, .info-table th {
      border: 1px solid #888;
      padding: 5px;
      text-align: left;
    }
    
    .info-table th {
      background-color: #f0f0f0;
    }
    
    .formula-row {
      margin: 15px 0;
      padding-bottom: 10px;
      border-bottom: 1px solid #ddd;
    }
    
    .title {
      color: blue;
      font-weight: bold;
      margin-bottom: 10px;
    }
    
    .formula-content {
      display: flex;
      align-items: center;
      flex-wrap: wrap;
      gap: 5px;
    }
    
    .grid-table {
      width: 100%;
      border-collapse: collapse;
      margin: 15px 0;
    }
    
    .grid-table td, .grid-table th {
      border: 1px solid #888;
      padding: 5px;
      text-align: center;
    }
    
    .instruction {
      font-size: 0.85em;
      margin: 10px 0;
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
</head>
<body>
  <!-- First form: Volume Calculator -->
  <div class="container-centered">
  <div class="card pozo-data-card">
  <div class="card-header">
    <h3 class="card-title">Datos del Pozo</h3>
  </div>
  <div class="card-body">
    <div class="form-group">
      <label for="nombrePozo">Nombre del Pozo:</label>
      <input type="text" id="nombrePozo" class="underline-input">
    </div>
    
    <div class="form-group">
      <label for="profundidad">Profundidad (m):</label>
      <input type="number" id="profundidad" class="underline-input">
    </div>
    
    <div class="form-group">
      <label for="diametro">Diámetro (pulg):</label>
      <input type="number" id="diametro" class="underline-input">
    </div>
    
    <div class="form-group">
      <label for="temperatura">Temperatura (°C):</label>
      <input type="number" id="temperatura" class="underline-input">
    </div>
    
    <div class="form-group">
      <label for="presion">Presión (psi):</label>
      <input type="number" id="presion" class="underline-input">
    </div>
    
    <div class="form-group">
      <label for="tipo">Tipo de Pozo:</label>
      <select id="tipo" class="underline-input">
        <option value="vertical">Vertical</option>
        <option value="desviado">Desviado</option>
        <option value="horizontal">Horizontal</option>
      </select>
    </div>
    
    <div class="form-group">
      <label for="fechaPerforacion">Fecha de Perforación:</label>
      <input type="date" id="fechaPerforacion" class="underline-input">
    </div>
  </div>
</div>
</div>
  <div class="container">
    <!-- Left section: Well diagram (would be an image) -->
    <div class="well-diagram">
      <img src="/assets/images/killsheets/pozoiadc.png" alt="Well Diagram" style="width: 100%; height: 100%;">
    </div>
    
    <!-- Middle section: Calculations -->
    <div class="calculation-form">
      <div class="header">
        <div></div>
        <div class="section-title">Volumen de la sarta de perforación</div>
        <div></div>
      </div>
      
      <!-- Drilling String Volume Section -->
      <div class="section">
        <div class="calc-row">
          <div class="label">Tubería de perforación (DP)</div>
          <div class="formula">
            <span>Capacidad</span>
            <input type="text"> BBL/PIE x
            <span>Longitud</span>
            <input type="text"> PIES = 
            <input type="text"> BBL
          </div>
        </div>
        
        <div class="calc-row">
          <div class="label">Tubería pesada (HWDP)</div>
          <div class="formula">
            <span>Capacidad</span>
            <input type="text">      BBL/PIE x
            <span>Longitud</span>
            <input type="text">      PIES = 
            <input type="text">      BBL
          </div>
        </div>
        
        <div class="calc-row">
          <div class="label">Collares de perforación (DC)</div>
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
      
      <!-- Annular Space Volume Section -->
      <div class="section-title">Volumen del espacio anular</div>
      
      <div class="section">
        <div class="calc-row">
          <div class="label">Tubería de perforación en agujero revestido</div>
          <div class="formula">
            <span>Capacidad Anular</span>
            <input type="text"> BBL/PIE x
            <span>Longitud</span>
            <input type="text"> PIES = 
            <input type="text"> BBL
          </div>
        </div>
        
        <div class="calc-row">
          <div class="label">Tubería de perforación en agujero abierto</div>
          <div class="formula">
            <span>Capacidad Anular</span>
            <input type="text"> BBL/PIE x
            <span>Longitud</span>
            <input type="text"> PIES = 
            <input type="text"> BBL
          </div>
        </div>
        
        <div class="calc-row">
          <div class="label">HWDP en agujero abierto</div>
          <div class="formula">
            <span>Capacidad Anular</span>
            <input type="text"> BBL/PIE x
            <span>Longitud</span>
            <input type="text"> PIES = 
            <input type="text"> BBL
          </div>
        </div>
        
        <div class="calc-row">
          <div class="label">Collares de perforación en agujero abierto (DC)</div>
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
    
    <!-- Right section: Pump output and circulation -->
    <div class="right-column">
      <div class="header">
        <div></div>
        <div>
          <img src="/assets/images/killsheets/logosmithmason.png" alt="Smith Mason & Co Logo" style="float:right">
          <span>Hoja de matar - Superficie</span>
        </div>
      </div>
      
      <div style="text-align: center; margin: 20px 0;">
        <span>Salida de la bomba = </span>
        <input type="text"> BBL/EMB
      </div>
      
      <div class="section-title">Emboladas de circulación</div>
      
      <div class="section">
        <div class="blue-text">Emboladas hasta la barrena (STB)</div>
        <div style="margin: 10px 0;">
          <input type="text" style="width: 40px"> Volumen sarta perf. BBL + 
          <input type="text" style="width: 40px"> Salida de la bomba BBL/EMB = 
          <input type="text" style="width: 40px"> EMB
        </div>
        
        <div class="blue-text">Emboladas desde la barren hasta la zapata del revestimiento</div>
        <div style="margin: 10px 0;">
          <input type="text" style="width: 40px"> Vol. agujero abierto BBL + 
          <input type="text" style="width: 40px"> Salida de la bomba BBL/EMB = 
          <input type="text" style="width: 40px"> EMB
        </div>
        
        <div class="blue-text">Emboladas de fondo a superficie</div>
        <div style="margin: 10px 0;">
          <input type="text" style="width: 40px"> Vol. espacio anular BBL + 
          <input type="text" style="width: 40px"> Salida de la bomba BBL/EMB = 
          <input type="text" style="width: 40px"> EMB
        </div>
        
        <div class="blue-text">Circulación total del pozo</div>
        <div style="margin: 10px 0;">
          <input type="text" style="width: 40px"> Emb. hasta la barrena + 
          <input type="text" style="width: 40px"> Emb. fondo a superficie = 
          <input type="text" style="width: 40px"> EMB
        </div>
        
        <div class="blue-text">Emboladas línea de superficie (Método de Esperar y Pesar)</div>
        <div style="margin: 10px 0;">
          <input type="text" style="width: 40px"> Vol. línea de superf. BBL + 
          <input type="text" style="width: 40px"> Salida de la bomba BBL/EMB = 
          <input type="text" style="width: 40px"> EMB
        </div>
      </div>
    </div>
  </div>

  <!-- Second form: Kill Sheet -->
  <div class="kill-sheet">
    <!-- Left column -->
    <div class="left-column">
      <div class="header">
        <div style="color: blue;">Información del influjo</div>
        <div style="display: flex; align-items: center;">
          <h2>Hoja de matar - Superficie</h2>
          <div>www.smithmasonco.com</div>
        </div>
      </div>

      <!-- Influx Info Table -->
      <table class="info-table">
        <tr>
          <td>Presión de cierre en la tubería de perforación (SIDPP)</td>
          <td><input type="text"> PSI</td>
        </tr>
        <tr>
          <td>Presión de cierre en el revestimiento (SICP)</td>
          <td><input type="text"> PSI</td>
        </tr>
        <tr>
          <td>Ganancia en tanques</td>
          <td><input type="text"> BBL</td>
        </tr>
        <tr>
          <td>Densidad del lodo original (OMW)</td>
          <td><input type="text"> PPG</td>
        </tr>
        <tr>
          <td>Presión reducida de la bomba (SCRP)</td>
          <td><input type="text"> PSI</td>
        </tr>
      </table>

      <!-- KMW Calculation -->
      <div class="formula-row">
        <div class="title">Densidad del lodo para matar (KMW) (Redondear el primer decimal hacia arriba)</div>
        <div class="formula-content">
          (SIDPP <input type="text" class="small-input"> PSI ÷ 0.052÷TVD del pozo <input type="text" class="small-input"> PIES)+Dens. del lodo actual <input type="text" class="small-input"> PPG=KMW <input type="text" class="small-input"> PPG
        </div>
      </div>

      <!-- MAMW Calculation -->
      <div class="formula-row">
        <div class="title">Máxima densidad del lodo permitida (MAMW) (Redondear el primer decimal hacia abajo)</div>
        <div class="formula-content">
          Presión "Leak-off" en superficie <input type="text" class="small-input"> PSI÷0.052÷TVD zapata <input type="text" class="small-input"> PIES)+Dens. lodo durante la prueba <input type="text" class="small-input"> PPG
        </div>
        <div class="formula-content" style="margin-top: 5px; margin-left: 30px;">
          =MAMW <input type="text" class="small-input"> PPG
        </div>
        <div class="formula-content" style="margin-top: 10px;">
          O
        </div>
        <div class="formula-content" style="margin-top: 10px;">
          Gradiente de fractura <input type="text" class="small-input"> PSI/FT÷0.052=MAMW <input type="text" class="small-input"> PPG
        </div>
      </div>

      <!-- MAASP Calculation 1 -->
      <div class="formula-row">
        <div class="title">Presión anular máxima permitida en la superficie (MAASP) <span class="underline">ANTES</span> del influjo</div>
        <div class="formula-content">
          (MAMW <input type="text" class="small-input"> PPG - Dens. lodo actual <input type="text" class="small-input"> PPG )× 0.052 × TVD zapata <input type="text" class="small-input"> PIES = MAASP <input type="text" class="small-input"> PSI
        </div>
      </div>

      <!-- MAASP Calculation 2 -->
      <div class="formula-row">
        <div class="title">MAASP <span class="underline">DESPUÉS</span> de que el pozo está muerto</div>
        <div class="formula-content">
          (MAMW <input type="text" class="small-input"> PPG – Dens. lodo para matar(KMW) <input type="text" class="small-input"> PPG )× 0.052 × TVD zapata <input type="text" class="small-input"> PIES = MAASP <input type="text" class="small-input"> PSI
        </div>
      </div>

      <!-- Circulation Pressures -->
      <div class="formula-row">
        <div class="title" style="text-align: center;">Presiones de circulación</div>
        
        <!-- ICP Calculation -->
        <div style="margin: 15px 0;">
          <div class="title">Presión inicial de circulación (ICP)</div>
          <div class="formula-content">
            SIDPP <input type="text" class="small-input"> PSI + Presión reducida de la bomba (SCRP) <input type="text" class="small-input"> PSI = ICP <input type="text" class="small-input"> PSI
          </div>
        </div>
        
        <!-- FCP Calculation -->
        <div style="margin: 15px 0;">
          <div class="title">Presión final de circulación (FCP)</div>
          <div class="formula-content">
            Presión reducida bomba (SCRP) <input type="text" class="small-input"> PSI × (
            <div style="display: inline-block; text-align: center;">
              <div style="border-top: 1px solid black; border-bottom: 1px solid black; padding: 2px 5px;">
                Dens. lodo para matar (KMW) <input type="text" class="small-input"> PPG
                <hr style="margin: 2px 0;">
                Dens. lodo original (OMW) <input type="text" class="small-input"> PPG
              </div>
            </div>
            ) = FCP <input type="text" class="small-input"> PSI
          </div>
        </div>
      </div>
    </div>

    <!-- Right column -->
    <div class="right-column">
      <div class="header">
        <div style="flex: 1;"></div>
        <div>
          <img src="/assets/images/killsheets/logosmithmason.png" alt="Smith Mason & Co Logo" style="float: right;">
        </div>
      </div>

      <div style="display: flex; margin-top: 10px;">
        <div style="flex: 1; text-align: center; color: blue;">
          Información calculada
        </div>
        <div style="flex: 1; text-align: center; color: blue;">
          Programa de presión de la tubería de perforación
        </div>
      </div>

      <!-- Basic Info Table -->
      <div style="display: flex; margin-top: 10px;">
        <div style="flex: 1;">
          <table class="info-table">
            <tr>
              <td>Densidad del lodo para matar (KWM)</td>
              <td><input type="text"></td>
            </tr>
            <tr>
              <td>Presión inicial de circulación (ICP)</td>
              <td><input type="text"></td>
            </tr>
            <tr>
              <td>Presión final de circulación (FCP)</td>
              <td><input type="text"></td>
            </tr>
          </table>
          <table class="info-table">
            <tr>
              <td>Emboladas de superficie hasta la barrena (STB)</td>
              <td><input type="text"></td>
            </tr>
            <tr>
              <td>Emboladas desde la barrena hasta la zapata del revestimiento</td>
              <td><input type="text"></td>
            </tr>
            <tr>
              <td>Emboladas fondo a superficie</td>
              <td><input type="text"></td>
            </tr>
            <tr>
              <td>Emboladas totales de circulación</td>
              <td><input type="text"></td>
            </tr>
          </table>
        </div>
        <div style="flex: 1;">
          <table class="grid-table">
            <tr>
              <th>Emboladas o volumen</th>
              <th>Presión de la tubería de perforación calculada</th>
              <th>Presión de la tubería de perforación actual</th>
            </tr>
            <tr>
              <td>0</td>
              <td>ICP</td>
              <td></td>
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
      <div class="formula-row">
        <div class="title" style="text-align: center;">Preparación del programa de presión de la tubería de perforación</div>
        
        <div class="instruction">
          <strong>Emboladas de la bomba</strong><br>
          Anotar las emboladas desde superficie hasta la última celda (antes de llegar a STB), en la columna de emboladas o volumen del programa de presión de la tubería de perforación. Luego realice lo siguiente:
        </div>
        <div class="formula-content">
          Emb. superf. a barrena ÷10 = Incremento prom. de emboladas (emb) <input type="text" class="medium-input">
        </div>
        
        <div class="instruction">
          Anotar el incremento promedio de emboladas (emb) en la celda por debajo de cero (0) en la columna de emboladas o volumen. Realice lo siguiente:
        </div>
        <div class="formula-content">
          0 <input type="text" class="small-input"> + Incremento promedio de emboladas (emb) <input type="text" class="small-input">
        </div>
        
        <div class="instruction">
          Repita este proceso hasta completar la columna.
        </div>
      </div>

      <!-- Drill Pipe Pressure -->
      <div class="formula-row">
        <div class="title">Presión de la tubería de perforación</div>
        
        <div class="instruction">
          Anotar la presión inicial de circulación (ICP) y la presión final de circulación (FCP) calculada en los espacios indicados de presión de la tubería de perforación. Realice lo siguiente:
        </div>
        
        <table class="grid-table" style="width: 50%;">
          <tr>
            <td></td>
            <td>STB</td>
            <td>FCP</td>
          </tr>
          <tr>
            <td></td>
            <td><input type="text"></td>
            <td><input type="text"></td>
          </tr>
        </table>
        
        <div class="formula-content" style="margin-top: 15px;">
          Reducción de la presión por cada etapa = <div style="display: inline-block; text-align: center; border: 1px solid #000; padding: 0 5px;">
            (ICP − FCP)
            <hr style="margin: 2px 0;">
            10
          </div> = <input type="text" class="small-input">
        </div>
        
        <div class="instruction">
          Nota: si el programa de presión se basa en incrementos de 100 emboladas (emb), realice lo siguiente para calcular la reducción de presión:
        </div>
        
        <div class="formula-content">
          Reducción de la presión por cada 100 emb.= <div style="display: inline-block; text-align: center; border: 1px solid #000; padding: 0 5px;">
            (ICP − FCP)×100
            <hr style="margin: 2px 0;">
            Emboladas de superficie a barrena
          </div> = <input type="text" class="small-input">
        </div>
        
        <div class="instruction">
          Restar la reducción de presión promedio de la presión inicial de circulación (ICP) hasta llenar la celda por debajo de la (ICP). Repita este proceso hasta completar la columna.
        </div>
        
        <div class="formula-content">
          ICP<sub>PSI</sub> − Reducción promedio de presión en PSI <input type="text" class="small-input">
        </div>
      </div>
      
      <!-- Name and Date -->
      <div style="display: flex; margin-top: 20px;">
        <div style="flex: 1;">
          <div>Nombre: <input type="text" class="large-input"></div>
          <div style="margin-top: 10px;">Fecha: <input type="text" class="large-input"></div>
        </div>
        <div style="flex: 1; text-align: right;">
          <div>Hoja de matar #: <input type="text" class="medium-input"></div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>