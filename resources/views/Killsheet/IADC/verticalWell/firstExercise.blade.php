@extends('Template/maestraUser')
@section('contenido') 

  <div class="info-container">
    <!-- Header -->
    <div class="header-section">
      <h1><i class="fas fa-oil-well"></i> Mi primer hoja de matar de IADC para pozos verticales</h1>
      <p>Complete la hoja para matar y al finalizar responda siguientes preguntas</p>
    </div>

    <div class="layout-container">
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
                  <span class="data-value">10,500 pies</span>
                </div>
                <div class="data-item">
                  <span class="data-label">Profundidad vertical verdadera</span>
                  <span class="data-value">10,500 pies</span>
                </div>
                <div class="data-item">
                  <span class="data-label">Zapato del revestimiento 9-5/8"</span>
                  <span class="data-value">8,500 pies</span>
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
                  <span class="data-value">0.0178 BBL/PIE</span>
                </div>
                <div class="data-item">
                  <span class="data-label">Tubería pesada HWDP</span>
                  <span class="data-value">0.0087 BBL/PIE</span>
                </div>
                <div class="data-item">
                  <span class="data-label">Collares de perforación</span>
                  <span class="data-value">0.0061 BBL/PIE</span>
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
   

  <div class="container-killFront">
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
  <script>
   const container = document.getElementById("dataSections");
    const btnLeft = document.getElementById("scrollLeft");
    const btnRight = document.getElementById("scrollRight");

    function updateButtons() {
      const scrollLeft = container.scrollLeft;
      const maxScroll = container.scrollWidth - container.clientWidth;

      btnLeft.style.display = scrollLeft > 0 ? "block" : "none";
      btnRight.style.display = scrollLeft < maxScroll - 1 ? "block" : "none";
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

  </script>
@endsection  

@php
    $css_identifier = 'IADC_VW_FE';
@endphp
