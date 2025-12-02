@extends('Template/maestraAdmin')
@section('contenido') 
<div class="conatiner-fluid content-inner mt-5 py-0">
       <div class="row">
        <div class="col-md-12">
            <div class="card banner">
                <div class="card-body ">
                    <div class="row justify-content-center align-items-center banner-container">
                        <div class="col-lg-6 banner-item">
                            <div class="banner-text">
                                <h1 class="fw-bold mb-4">
                                 {{ __('Welcome') }}, 
                                    @if(session('ROLES_USER')['superusuario'] ?? false)
                                        <span class="text-secondary">{{ __('Superadministrador') }} !</span>
                                    @elseif(session('ROLES_USER')['admin'] ?? false)
                                        <span class="text-secondary">{{ __('Administrador') }} !</span>
                                    @elseif(session('ROLES_USER')['logistica'] ?? false)
                                        <span class="text-secondary">{{ __('Logística') }} !</span>
                                    @endif
                                </h1>
                            </div> 
                        <p class="mb-4">{{ __('This is your administrator panel. Here is a summary of some relevant data collected by the Results WCLE platform.') }}</p>
                        </div>
                        <div class="col-lg-6 banner-img">
                            <div class="img">
                                <img src="../assets/images/principal/personas.png" class="img-fluid w-55" alt="img8">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <p class="mb-4">{{ __('Totales generales desde 2024') }}</p>
        <div class="col-md-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="p-2 rounded bg-soft-warning">
                            <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V5H19V19ZM7 12H9V17H7V12ZM7 7H9V9H7V7Z" fill="currentColor"/>
                            </svg>
                        </div>
                        <div class="ms-3">
                            <h4 class="mb-1" id="totalProyectos">0</h4>
                            <small class="mb-0">Total Proyectos</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="p-2 rounded bg-soft-primary">
                            <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 5.5V7H9V5.5L3 7V9L9 10.5V12L3 13.5V15.5L9 14V16L3 17.5V19.5L9 18V22H15V18L21 19.5V17.5L15 16V14L21 15.5V13.5L15 12V10.5L21 9Z" fill="currentColor"/>
                            </svg>
                        </div>
                        <div class="ms-3">
                            <h4 class="mb-1" id="totalEstudiantes">0</h4>
                            <small class="mb-0">Total Estudiantes</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="p-2 rounded bg-soft-primary">
                            <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 5.5V7H9V5.5L3 7V9L9 10.5V12L3 13.5V15.5L9 14V16L3 17.5V19.5L9 18V22H15V18L21 19.5V17.5L15 16V14L21 15.5V13.5L15 12V10.5L21 9Z" fill="currentColor"/>
                            </svg>
                        </div>
                        <div class="ms-3">
                            <h4 class="mb-1" id="totalDesercion">0</h4>
                            <small class="mb-0">Total deserción</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="p-2 rounded bg-soft-success">
                            <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM9.29 16.29L5.7 12.7C5.31 12.31 5.31 11.68 5.7 11.29C6.09 10.9 6.72 10.9 7.11 11.29L10 14.17L16.88 7.29C17.27 6.9 17.9 6.9 18.29 7.29C18.68 7.68 18.68 8.31 18.29 8.7L10.7 16.29C10.32 16.68 9.68 16.68 9.29 16.29Z" fill="currentColor"/>
                            </svg>
                        </div>
                        <div class="ms-3">
                            <h4 class="mb-1" id="estudiantesAprobados">0</h4>
                            <small class="mb-0">Estudiantes Aprobados</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
         <div class="col-md-12">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Proyectos por Acreditación</h5>
                        </div>
                        <div class="card-body">
                            <div id="chartAcreditacion" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Proyectos por Año</h5>
                        </div>
                        <div class="card-body">
                            <div id="chartProyectosAnio" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Proyectos por Empresa</h5>
                        </div>
                        <div class="card-body">
                            <div id="chartProyectosEmpresa" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="col-md-12">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Estudiantes por Estado del Curso</h5>
                        </div>
                        <div class="card-body">
                            <div id="chartEstadoCurso" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Estudiantes con Resit</h5>
                        </div>
                        <div class="card-body">
                            <div id="chartEstudiantesResit" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Tipos de Resit</h5>
                        </div>
                        <div class="card-body">
                            <div id="chartTiposResit" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="mb-4">{{ __('Estudiantes') }}</p>
        <div class="col-12">
           <div class="card-body">
                <!-- Filtros -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="periodType" class="form-label">Tipo de Período:</label>
                        <select id="periodType" class="form-select" onchange="toggleDateFilters()">
                            <option value="year">Año</option>
                            <option value="month" selected>Mes</option>
                            <option value="day">Curso</option>
                        </select>
                    </div>

                    <!-- Filtro para Año: De año a año -->
                    <div class="col-md-4" id="yearRangeFilter" style="display:none;">
                        <label class="form-label">Rango de Años:</label>
                        <div class="row">
                            <div class="col-6">
                                <select id="startYear" class="form-select">
                                    <!-- Se llenará dinámicamente -->
                                </select>
                            </div>
                            <div class="col-6">
                                <select id="endYear" class="form-select">
                                    <!-- Se llenará dinámicamente -->
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Filtro para Mes: De mes-año a mes-año -->
                    <div class="col-md-4" id="monthRangeFilter" style="display:none;">
                        <label class="form-label">Rango de Meses:</label>
                        <div class="row">
                            <div class="col-6">
                                <input type="month" id="startMonth" class="form-control">
                            </div>
                            <div class="col-6">
                                <input type="month" id="endMonth" class="form-control">
                            </div>
                        </div>
                    </div>

                    <!-- Filtro para Curso: De día-mes-año a día-mes-año -->
                    <div class="col-md-4" id="dayRangeFilter" style="display:none;">
                        <label class="form-label">Rango de Fechas:</label>
                        <div class="row">
                            <div class="col-6">
                                <input type="date" id="startDate" class="form-control">
                            </div>
                            <div class="col-6">
                                <input type="date" id="endDate" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label for="chartType" class="form-label">Tipo de Gráfica:</label>
                        <select id="chartType" class="form-select">
                            <option value="column">Columnas Agrupadas</option>
                            <option value="line">Líneas</option>
                        </select>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="button" class="btn btn-primary w-100" onclick="loadChartData()">
                            <i class="fas fa-chart-bar"></i> Generar
                        </button>
                    </div>
                </div>

                <!-- Total General -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="alert alert-primary text-center" id="totalsContainer" style="margin-bottom: 0;">
                            <h4 class="mb-0"><strong>Total General de Candidatos:</strong> <span id="totalGeneral">-</span></h4>
                        </div>
                    </div>
                </div>

                <!-- Gráfica -->
                <div class="row">
                    <div class="col-12">
                        <div id="chartdiv" style="width: 100%; height: 600px;"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
    <div class="card-header text-white">
        <h5 class="mb-0"><i class="fas fa-chart-bar"></i> Gráfica de Barras Apiladas</h5>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-3">
                <label for="periodTypeStacked" class="form-label">Tipo de Período:</label>
                <select id="periodTypeStacked" class="form-select" onchange="toggleDateFiltersStacked()">
                    <option value="year">Año</option>
                    <option value="month" selected>Mes</option>
                    <option value="day">Curso</option>
                </select>
            </div>

            <!-- Filtro para Año: De año a año -->
            <div class="col-md-4" id="yearRangeFilterStacked" style="display:none;">
                <label class="form-label">Rango de Años:</label>
                <div class="row">
                    <div class="col-6">
                        <select id="startYearStacked" class="form-select">
                            <!-- Se llenará dinámicamente -->
                        </select>
                    </div>
                    <div class="col-6">
                        <select id="endYearStacked" class="form-select">
                            <!-- Se llenará dinámicamente -->
                        </select>
                    </div>
                </div>
            </div>

            <!-- Filtro para Mes: De mes-año a mes-año -->
            <div class="col-md-4" id="monthRangeFilterStacked" style="display:none;">
                <label class="form-label">Rango de Meses:</label>
                <div class="row">
                    <div class="col-6">
                        <input type="month" id="startMonthStacked" class="form-control">
                    </div>
                    <div class="col-6">
                        <input type="month" id="endMonthStacked" class="form-control">
                    </div>
                </div>
            </div>

            <!-- Filtro para Curso: De día-mes-año a día-mes-año -->
            <div class="col-md-4" id="dayRangeFilterStacked" style="display:none;">
                <label class="form-label">Rango de Fechas:</label>
                <div class="row">
                    <div class="col-6">
                        <input type="date" id="startDateStacked" class="form-control">
                    </div>
                    <div class="col-6">
                        <input type="date" id="endDateStacked" class="form-control">
                    </div>
                </div>
            </div>

            <div class="col-md-3 d-flex align-items-end">
                <button type="button" class="btn btn-success w-100" onclick="loadStackedChartData()">
                    <i class="fas fa-chart-bar"></i> Generar Apilada
                </button>
            </div>
        </div>

        <!-- Total General para gráfica apilada -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="alert alert-success text-center" id="totalsContainerStacked" style="margin-bottom: 0;">
                    <h4 class="mb-0"><strong>Total General de Candidatos:</strong> <span id="totalGeneralStacked">-</span></h4>
                </div>
            </div>
        </div>

        <!-- Gráfica Apilada -->
        <div class="row">
            <div class="col-12">
                <div id="chartdivStacked" style="width: 100%; height: 600px;"></div>
            </div>
        </div>
    </div>
</div>

<script>
let currentStackedChart = null;
const acreditadorColorsStacked = {};

function toggleDateFiltersStacked() {
    const periodType = document.getElementById('periodTypeStacked').value;
    
    // Ocultar todos los filtros
    document.getElementById('yearRangeFilterStacked').style.display = 'none';
    document.getElementById('monthRangeFilterStacked').style.display = 'none';
    document.getElementById('dayRangeFilterStacked').style.display = 'none';
    
    // Mostrar el filtro correspondiente
    if (periodType === 'year') {
        document.getElementById('yearRangeFilterStacked').style.display = 'block';
        populateYearSelectsStacked();
    } else if (periodType === 'month') {
        document.getElementById('monthRangeFilterStacked').style.display = 'block';
        setDefaultMonthRangeStacked();
    } else if (periodType === 'day') {
        document.getElementById('dayRangeFilterStacked').style.display = 'block';
        setDefaultDateRangeStacked();
    }
}

// Poblar los selectores de año (gráfica apilada)
function populateYearSelectsStacked() {
    const currentYear = new Date().getFullYear();
    const startYearSelect = document.getElementById('startYearStacked');
    const endYearSelect = document.getElementById('endYearStacked');
    
    startYearSelect.innerHTML = '';
    endYearSelect.innerHTML = '';
    
    for (let year = currentYear - 10; year <= currentYear + 2; year++) {
        startYearSelect.innerHTML += `<option value="${year}">${year}</option>`;
        endYearSelect.innerHTML += `<option value="${year}">${year}</option>`;
    }
    
    // Establecer valores por defecto
    startYearSelect.value = currentYear - 1;
    endYearSelect.value = currentYear;
}

// Establecer rango de meses por defecto (gráfica apilada)
function setDefaultMonthRangeStacked() {
    const today = new Date();
    const currentMonth = today.toISOString().slice(0, 7);
    const lastYear = new Date(today.getFullYear() - 1, today.getMonth(), 1);
    const lastYearMonth = lastYear.toISOString().slice(0, 7);
    
    document.getElementById('startMonthStacked').value = lastYearMonth;
    document.getElementById('endMonthStacked').value = currentMonth;
}

// Establecer rango de fechas por defecto (gráfica apilada)
function setDefaultDateRangeStacked() {
    const today = new Date();
    const thirtyDaysAgo = new Date(today.getTime() - (30 * 24 * 60 * 60 * 1000));
    
    document.getElementById('startDateStacked').value = thirtyDaysAgo.toISOString().split('T')[0];
    document.getElementById('endDateStacked').value = today.toISOString().split('T')[0];
}

// Actualizar totales (gráfica apilada)
function updateTotalsStacked(totals) {
    console.log('Totales recibidos (apilada):', totals);
    const totalGeneral = totals.total_general || 0;
    document.getElementById('totalGeneralStacked').textContent = totalGeneral.toLocaleString();
}

// Actualizar gráfica apilada
function updateStackedChart(data) {
    console.log('Datos originales recibidos (apilada):', data);
    
    // Para gráfica apilada, necesitamos todos los acreditadores en cada período
    const allAcreditadores = new Set();
    data.forEach(item => {
        Object.keys(item).forEach(key => {
            if (key !== 'period') {
                allAcreditadores.add(key);
            }
        });
    });
    
    const processedData = data.map(item => {
        const newItem = { period: String(item.period) };
        allAcreditadores.forEach(acred => {
            newItem[acred] = item[acred] || 0;
        });
        return newItem;
    });

    console.log('Datos procesados (apilada):', processedData);

    if (processedData.length === 0) {
        document.getElementById('chartdivStacked').innerHTML = `
            <div class="alert alert-warning text-center">
                <h5>No hay datos para mostrar</h5>
                <p>No se encontraron registros para el período seleccionado.</p>
            </div>
        `;
        return;
    }

    if (currentStackedChart) {
        currentStackedChart.dispose();
    }

    am5.ready(function() {
        const root = am5.Root.new("chartdivStacked");
        
        root.setThemes([
            am5themes_Animated.new(root)
        ]);

        // Crear gráfica de barras apiladas
        const chart = root.container.children.push(am5xy.XYChart.new(root, {
            panX: false,
            panY: false,
            wheelX: "panX",
            wheelY: "zoomX",
            layout: root.verticalLayout,
            paddingLeft: 0,
            paddingRight: 20
        }));

        // Cursor
        const cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
        cursor.lineY.set("visible", false);

        // Eje X
        const xRenderer = am5xy.AxisRendererX.new(root, { 
            minGridDistance: 30,
            minorGridEnabled: true
        });
        
        xRenderer.labels.template.setAll({
            rotation: -45,
            centerY: am5.p50,
            centerX: am5.p100,
            paddingRight: 15
        });

        const xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
            maxDeviation: 0.3,
            categoryField: "period",
            renderer: xRenderer,
            tooltip: am5.Tooltip.new(root, {})
        }));

        try {
            xAxis.data.setAll(processedData);
            console.log('Datos asignados al eje X correctamente (apilada)');
        } catch (error) {
            console.error('Error al asignar datos al eje X (apilada):', error);
            throw error;
        }

        // Eje Y
        const yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
            maxDeviation: 0.3,
            min: 0,
            renderer: am5xy.AxisRendererY.new(root, {
                strokeOpacity: 0.1
            })
        }));

        // Colores predefinidos
       const colors = [
        am5.color(0xFF585D), // Rojo coral
        am5.color(0xA4D65E), // Verde lima
        am5.color(0x236192), // Azul oscuro
        am5.color(0x007DBA), // Azul medio
        am5.color(0x2C2A29), // Gris oscuro/casi negro
    ];

        let colorIndex = 0;

        // Crear series apiladas para cada acreditador
        allAcreditadores.forEach(acreditador => {
            const color = colors[colorIndex % colors.length];
            acreditadorColorsStacked[acreditador] = color.toString();
            colorIndex++;

            const series = chart.series.push(am5xy.ColumnSeries.new(root, {
                name: acreditador,
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: acreditador,
                categoryXField: "period",
                fill: color,
                stroke: color,
                stacked: true,
                tooltip: am5.Tooltip.new(root, {
                    labelText: "{name}: {valueY}"
                })
            }));

            series.columns.template.setAll({
                tooltipY: 0,
                strokeOpacity: 0,
                width: am5.percent(80)
            });

            series.data.setAll(processedData);

            // Agregar etiquetas con los valores (solo si valor > 0)
            series.bullets.push(function(root, series, dataItem) {
                const value = dataItem.get("valueY");
                if (value > 0) {
                    return am5.Bullet.new(root, {
                        locationY: 0.5,
                        sprite: am5.Label.new(root, {
                            text: "{valueY}",
                            fill: am5.color(0xffffff),
                            centerY: am5.p50,
                            centerX: am5.p50,
                            fontSize: 12,
                            fontWeight: "bold",
                            populateText: true
                        })
                    });
                }
            });
        });

        // Leyenda con totales por acreditador
        const legend = chart.children.push(am5.Legend.new(root, {
            centerX: am5.p50,
            x: am5.p50,
            layout: root.horizontalLayout
        }));

        legend.data.setAll(chart.series.values);
        
        legend.labels.template.setAll({
            fontSize: 14,
            fontWeight: "600"
        });

        legend.valueLabels.template.setAll({
            fontSize: 14,
            fontWeight: "bold"
        });

        // Calcular y mostrar totales por acreditador en la leyenda
        chart.series.each(function(series) {
            let total = 0;
            series.data.each(function(dataItem) {
                const value = dataItem[series.get("valueYField")];
                total += value || 0;
            });
            
            series.set("legendLabelText", "[" + acreditadorColorsStacked[series.get("name")] + "]" + series.get("name") + "[/]");
            series.set("legendValueText", "[bold " + acreditadorColorsStacked[series.get("name")] + "]Total: " + total + "[/]");
        });

        chart.appear(1000, 100);
        currentStackedChart = root;
    });
}

// Cargar datos del gráfico apilado
async function loadStackedChartData() {
    console.log('Cargando datos del gráfico apilado...');
    
    const periodType = document.getElementById('periodTypeStacked').value;

    const params = new URLSearchParams({
        period_type: periodType,
        chart_type: 'column'
    });

    // Agregar parámetros según el tipo de período
    if (periodType === 'year') {
        const startYear = document.getElementById('startYearStacked').value;
        const endYear = document.getElementById('endYearStacked').value;
        params.append('start_year', startYear);
        params.append('end_year', endYear);
    } else if (periodType === 'month') {
        const startMonth = document.getElementById('startMonthStacked').value;
        const endMonth = document.getElementById('endMonthStacked').value;
        if (startMonth && endMonth) {
            params.append('start_date', startMonth + '-01');
            const endDate = new Date(endMonth + '-01');
            endDate.setMonth(endDate.getMonth() + 1);
            endDate.setDate(0);
            params.append('end_date', endDate.toISOString().split('T')[0]);
        }
    } else if (periodType === 'day') {
        const startDate = document.getElementById('startDateStacked').value;
        const endDate = document.getElementById('endDateStacked').value;
        if (startDate && endDate) {
            params.append('start_date', startDate);
            params.append('end_date', endDate);
        }
    }

    const chartDiv = document.getElementById('chartdivStacked');
    chartDiv.innerHTML = `
        <div class="text-center" style="padding: 50px;">
            <div class="spinner-border text-success" role="status">
                <span class="visually-hidden">Cargando...</span>
            </div>
            <p class="mt-2">Cargando datos...</p>
        </div>
    `;

    try {
        const response = await fetch(`/api/chart/candidates?${params}`);
        const data = await response.json();

        if (data.success) {
            console.log('Datos recibidos (apilada):', data);
            
            chartDiv.innerHTML = '';
            
            updateStackedChart(data.data);
            updateTotalsStacked(data.totals);
        } else {
            throw new Error(data.message);
        }
    } catch (error) {
        console.error('Error cargando datos del gráfico apilado:', error);
        
        chartDiv.innerHTML = `
            <div class="alert alert-danger text-center">
                <h5>Error al cargar los datos</h5>
                <p>${error.message}</p>
                <button class="btn btn-success btn-sm" onclick="loadStackedChartData()">Reintentar</button>
            </div>
        `;
        
        updateTotalsStacked({});
    }
}

// Inicializar filtros al cargar la página
document.addEventListener('DOMContentLoaded', function() {
    toggleDateFiltersStacked();
});
</script>
        
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

@endsection
@section('scripts')
 <script src="{{ asset('js/Admin/Dashboard/dashboard.js') }}?v=1.43"></script>

<!-- AMCharts -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/pie.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
@endsection