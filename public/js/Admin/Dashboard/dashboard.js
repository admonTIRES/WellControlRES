let chart = null;
let charts = [];
let currentChartType = 'column';
let currentColorPalette = 'results';
let currentChart = null;
const acreditadorColors = {};

const colorPalettes = {
    default: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'],

    vibrant: ['#FF6B6B', '#4ECDC4', '#45B7D1', '#96CEB4', '#FFEAA7', '#DDA0DD', '#98D8C8', '#F7DC6F'],

    pastel: ['#FFB3BA', '#BAFFC9', '#BAE1FF', '#FFFFBA', '#FFDFBA', '#E0BBE4', '#FEC8D8', '#D9F0FF'],

    results: ['#FF585D', '#A4D65E', '#007DBA', '#236192', '#2C2A29', '#BC6C25', '#D4A373', '#FAEDCD'],

    cool: ['#6A4C93', '#1982C4', '#8AC926', '#FF595E', '#6A0572', '#118AB2', '#06D6A0', '#FFD166'],

    earth: ['#8B4513', '#CD853F', '#D2691E', '#A0522D', '#DEB887', '#BC8F8F', '#F4A460', '#D2B48C'],

    ocean: ['#1E3A8A', '#3B82F6', '#60A5FA', '#93C5FD', '#1E40AF', '#2563EB', '#3B82F6', '#60A5FA'],

    forest: ['#14532D', '#15803D', '#16A34A', '#22C55E', '#4ADE80', '#86EFAC', '#BBF7D0', '#22C55E'],

    sunset: ['#F59E0B', '#F97316', '#EF4444', '#8B5CF6', '#EC4899', '#F59E0B', '#F97316', '#EF4444'],

    rainbow: ['#FF0000', '#FF7F00', '#FFFF00', '#00FF00', '#0000FF', '#4B0082', '#8B00FF', '#FF1493']
};
const actualizarBtn = document.createElement('button');

document.addEventListener('DOMContentLoaded', function () {


    const configEs = {
        locale: "es",
        disableMobile: "true"
    };

    flatpickr("#startDate", {
        ...configEs,
        dateFormat: "Y-m-d",
        altInput: true,
        altFormat: "d-m-Y",
        allowInput: true
    });

    flatpickr("#endDate", {
        ...configEs,
        dateFormat: "Y-m-d",
        altInput: true,
        altFormat: "d-m-Y",
        allowInput: true
    });

    const monthConfig = {
        ...configEs,
        plugins: [
            new monthSelectPlugin({
                shorthand: true,
                dateFormat: "Y-m",
                altFormat: "F Y",
                theme: "light"
            })
        ]
    };

    flatpickr("#startMonth", monthConfig);
    flatpickr("#endMonth", monthConfig);

    const periodType = document.getElementById('periodType');
    if (periodType) {
        periodType.dispatchEvent(new Event('change'));
    }
    setTimeout(() => {
        actualizarDatos();
        initializeEventListeners();
        loadAvailableYears();
        // loadChartData();
        // loadStackedChartData();
    }, 500);


    toggleDateFilters();

    actualizarBtn.innerHTML = '<i class="fas fa-sync-alt"></i> Actualizar Datos';
    actualizarBtn.className = 'btn btn-primary btn-sm position-fixed';
    actualizarBtn.style.bottom = '20px';
    actualizarBtn.style.right = '20px';
    actualizarBtn.style.zIndex = '1000';
    actualizarBtn.onclick = actualizarDatos;
    document.body.appendChild(actualizarBtn);

    // setInterval(actualizarDatos, 300000); // 5 minutos
});

document.addEventListener('DOMContentLoaded', function () {
    // console.log('DOM cargado, inicializando gráfica...');  

});
function showLoading() {
    const chartContainers = [
        'chartAcreditacion', 'chartProyectosAnio', 'chartProyectosEmpresa', 'totalProyectos', 'totalEstudiantes', 'totalDesercion', 'estudiantesAprobados', 'chartEstadoCurso', 'chartEstudiantesResit', 'chartTiposResit'
    ];

    document.getElementById('totalProyectos').textContent = '...';
    document.getElementById('totalEstudiantes').textContent = '...';
    document.getElementById('totalDesercion').textContent = '...';
    document.getElementById('estudiantesAprobados').textContent = '...';

    chartContainers.forEach(containerId => {
        const container = document.getElementById(containerId);
        if (container) {
            container.innerHTML = `
                    <div class="loading-spinner">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Cargando...</span>
                        </div>
                        <span class="ms-2">Cargando datos...</span>
                    </div>
                `;
        }
    });
}
function updateMetricas(metricas) {
    document.getElementById('totalProyectos').textContent = metricas.totalProyectos;
    document.getElementById('totalEstudiantes').textContent = metricas.totalEstudiantes;
    document.getElementById('totalDesercion').textContent = metricas.estudiantesDesercion;
    document.getElementById('estudiantesAprobados').textContent = metricas.estudiantesAprobados;
}
function showError(message) {
    const chartContainers = [
        'chartAcreditacion', 'chartProyectosAnio', 'chartProyectosEmpresa'
    ];

    document.getElementById('totalProyectos').textContent = 'Error';
    document.getElementById('totalEstudiantes').textContent = 'Error';
    document.getElementById('totalDesercion').textContent = 'Error';
    document.getElementById('estudiantesAprobados').textContent = 'Error';

    chartContainers.forEach(containerId => {
        const container = document.getElementById(containerId);
        if (container) {
            container.innerHTML = `
                    <div class="alert alert-danger text-center">
                        ${message}
                    </div>
                `;
        }
    });
}
function renderCharts(datos) {

    const chartContainers = [
        'chartAcreditacion', 'chartProyectosAnio', 'chartProyectosEmpresa'
    ];

    chartContainers.forEach(containerId => {
        const container = document.getElementById(containerId);
        if (container) {
            container.innerHTML = `
                `;
        }
    });
    charts = [];

    const colorsPalette = [
        '#007DBA', '#FF585D', '#A4D65E', '#764ba2', '#FF9F40',
        '#36A2EB', '#FF6384', '#4BC0C0', '#9966FF', '#C9CBCF',
        '#7CFFB2', '#FFB6C1', '#20B2AA', '#DEB887', '#9370DB',
        '#3CB371', '#FF4500', '#6A5ACD', '#FFD700', '#32CD32'
    ];

    const commonPieConfig = {
        chart: {
            type: 'pie',
            height: 300
        },
        legend: {
            position: 'bottom',
            fontSize: '12px',
            fontFamily: 'Arial, sans-serif',
            itemMargin: {
                horizontal: 10,
                vertical: 5
            }
        },
        tooltip: {
            y: {
                formatter: function (value) {
                    return value + ' proyectos';
                }
            }
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom',
                    fontSize: '10px'
                }
            }
        }]
    };

    if (datos.acreditacion.labels.length > 0 && datos.acreditacion.series.length > 0) {
        const chartAcreditacion = new ApexCharts(document.querySelector("#chartAcreditacion"), {
            ...commonPieConfig,
            series: datos.acreditacion.series,
            labels: datos.acreditacion.labels,
            colors: colorsPalette.slice(0, datos.acreditacion.labels.length)
        });
        chartAcreditacion.render();
        charts.push(chartAcreditacion);
    } else {
        document.getElementById('chartAcreditacion').innerHTML = '<div class="alert alert-warning text-center">No hay datos de acreditación</div>';
    }

    if (datos.proyectosAnio.labels.length > 0 && datos.proyectosAnio.series.length > 0) {
        const chartProyectosAnio = new ApexCharts(document.querySelector("#chartProyectosAnio"), {
            ...commonPieConfig,
            series: datos.proyectosAnio.series,
            labels: datos.proyectosAnio.labels.map(year => `Año ${year}`),
            colors: colorsPalette.slice(0, datos.proyectosAnio.labels.length)
        });
        chartProyectosAnio.render();
        charts.push(chartProyectosAnio);
    } else {
        document.getElementById('chartProyectosAnio').innerHTML = '<div class="alert alert-warning text-center">No hay datos por año</div>';
    }

    if (datos.proyectosEmpresa.labels.length > 0 && datos.proyectosEmpresa.series.length > 0) {
        const chartProyectosEmpresa = new ApexCharts(document.querySelector("#chartProyectosEmpresa"), {
            ...commonPieConfig,
            series: datos.proyectosEmpresa.series,
            labels: datos.proyectosEmpresa.labels,
            colors: colorsPalette.slice(0, datos.proyectosEmpresa.labels.length)
        });
        chartProyectosEmpresa.render();
        charts.push(chartProyectosEmpresa);
    } else {
        document.getElementById('chartProyectosEmpresa').innerHTML = '<div class="alert alert-warning text-center">No hay datos por empresa</div>';
    }

    // console.log('Todas las gráficas de pastel renderizadas correctamente');
}
function actualizarDatos() {
    // console.log('Actualizando datos del dashboard...');
    showLoading();
    const periodType = document.getElementById('periodType').value;
    const chartType = document.getElementById('chartType').value;

    const params = new URLSearchParams({
        period_type: periodType,
        chart_type: chartType
    });

    if (periodType === 'year') {
        const startYear = document.getElementById('startYear').value;
        const endYear = document.getElementById('endYear').value;
        params.append('start_year', startYear);
        params.append('end_year', endYear);
    } else if (periodType === 'month') {
        const startMonth = document.getElementById('startMonth').value;
        const endMonth = document.getElementById('endMonth').value;
        if (startMonth && endMonth) {
            params.append('start_date', startMonth + '-01');
            const endDate = new Date(endMonth + '-01');
            endDate.setMonth(endDate.getMonth() + 1);
            endDate.setDate(0);
            params.append('end_date', endDate.toISOString().split('T')[0]);
        }
    } else if (periodType === 'day') {
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;
        if (startDate && endDate) {
            params.append('start_date', startDate);
            params.append('end_date', endDate);
        }
    }

    const chartDiv = document.getElementById('chartdiv');
    chartDiv.innerHTML = `
        <div class="text-center" style="padding: 50px;">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Cargando...</span>
            </div>
            <p class="mt-2">Cargando datos...</p>
        </div>
    `;

    const chartDiv2 = document.getElementById('chartdivStacked');
    chartDiv2.innerHTML = `
        <div class="text-center" style="padding: 50px;">
            <div class="spinner-border text-success" role="status">
                <span class="visually-hidden">Cargando...</span>
            </div>
            <p class="mt-2">Cargando datos...</p>
        </div>
    `;

    fetch(`/dashboard/data?${params}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                charts.forEach(chart => {
                    if (chart && typeof chart.destroy === 'function') {
                        chart.destroy();
                    }
                });
                const chartContainers = [
                    'chartEstadoCurso', 'chartEstudiantesResit', 'chartTiposResit'
                ];

                chartContainers.forEach(containerId => {
                    const container = document.getElementById(containerId);
                    if (container) {
                        container.innerHTML = `
                        `;
                    }
                });

                // console.log('Datos recibidos:', data);

                chartDiv.innerHTML = '';

                updateChart(data.data.dataChartdiv, chartType);
                // updateTotals(data.totals);
                renderCharts(data.data);
                updateMetricas(data.data.metricas);
                // generateStudentCharts(data.estudiantes);
                 generateStatusChart(data.estudiantes, data.data.metricas);
                generateResitChart(data.estudiantes, data.data.tiposAprobacion);
                generateResitTypesChart(data.estudiantes, data.data.tiposReprobacion);
                chartDiv2.innerHTML = '';
                updateStackedChart(data.data.dataChartdivStacked);
                updateTotalsStacked(data.data.totalsChartdivStacked);
            }
        })
        .catch(error => {
            console.error('Error actualizando datos:', error);
            showEmptyCharts();
            chartDiv.innerHTML = `
                <div class="alert alert-danger text-center">
                    <h5>Error al cargar los datos</h5>
                    <p>${error.message}</p>
                    <button class="btn btn-primary btn-sm" onclick="actualizarDatos()">Reintentar</button>
                </div>
            `;
            chartDiv2.innerHTML = `
                <div class="alert alert-danger text-center">
                    <h5>Error al cargar los datos</h5>
                    <p>${error.message}</p>
                    <button class="btn btn-success btn-sm" onclick="actualizarDatos()">Reintentar</button>
                </div>
            `;

            // updateTotals({});
        });
}
function initializeEventListeners() {
    const periodType = document.getElementById('periodType');
    const chartType = document.getElementById('chartType');
    const yearSelectGroup = document.getElementById('yearSelectGroup');

    if (periodType) {
        periodType.addEventListener('change', function () {
            const periodTypeValue = this.value;
            const dateRange = document.getElementById('dateRange');
            const yearSelectGroup = document.getElementById('yearSelectGroup');

            if (periodTypeValue === 'day') {
                dateRange.style.display = 'block';
                yearSelectGroup.style.display = 'block';
            } else if (periodTypeValue === 'month') {
                dateRange.style.display = 'none';
                yearSelectGroup.style.display = 'block';
            } else if (periodTypeValue === 'year') {
                dateRange.style.display = 'none';
                yearSelectGroup.style.display = 'none';
            }
        });
    }

    if (chartType) {
        chartType.addEventListener('change', function () {
            currentChartType = this.value;
            // loadChartData();
            actualizarDatos();
            // loadStackedChartData();

        });
    }
}
function toggleDateFilters() {
    const periodType = document.getElementById('periodType').value;

    document.getElementById('yearRangeFilter').style.display = 'none';
    document.getElementById('monthRangeFilter').style.display = 'none';
    document.getElementById('dayRangeFilter').style.display = 'none';

    if (periodType === 'year') {
        document.getElementById('yearRangeFilter').style.display = 'block';
        populateYearSelects();
    } else if (periodType === 'month') {
        document.getElementById('monthRangeFilter').style.display = 'block';
        setDefaultMonthRange();
    } else if (periodType === 'day') {
        document.getElementById('dayRangeFilter').style.display = 'block';
        setDefaultDateRange();
    }
}
function populateYearSelects() {
    const currentYear = new Date().getFullYear();
    const startYearSelect = document.getElementById('startYear');
    const endYearSelect = document.getElementById('endYear');

    startYearSelect.innerHTML = '';
    endYearSelect.innerHTML = '';

    for (let year = currentYear - 10; year <= currentYear + 2; year++) {
        startYearSelect.innerHTML += `<option value="${year}">${year}</option>`;
        endYearSelect.innerHTML += `<option value="${year}">${year}</option>`;
    }

    startYearSelect.value = currentYear - 1;
    endYearSelect.value = currentYear;
}
function setDefaultMonthRange() {
    const today = new Date();
    const currentMonth = today.toISOString().slice(0, 7);
    const lastYear = new Date(today.getFullYear() - 1, today.getMonth(), 1);
    const lastYearMonth = lastYear.toISOString().slice(0, 7);

    document.getElementById('startMonth').value = lastYearMonth;
    document.getElementById('endMonth').value = currentMonth;
}
function setDefaultDateRange() {
    const today = new Date();
    const thirtyDaysAgo = new Date(today.getTime() - (30 * 24 * 60 * 60 * 1000));

    document.getElementById('startDate').value = thirtyDaysAgo.toISOString().split('T')[0];
    document.getElementById('endDate').value = today.toISOString().split('T')[0];
}
function updateTotals(totals) {
    // console.log('Totales recibidos:', totals);
    const totalGeneral = totals.total_general || 0;
    document.getElementById('totalProyectos').textContent = totalGeneral.toLocaleString();
}
function updateChart(data, chartType) {
    // console.log('Datos originales recibidos:', data);

    const filteredData = data.filter(item => {
        return Object.keys(item).some(key => {
            return key !== 'period' && item[key] > 0;
        });
    }).map(item => {
        const newItem = {};
        for (let key in item) {
            if (key === 'period') {
                newItem[key] = String(item[key]);
            } else {
                newItem[key] = item[key];
            }
        }
        return newItem;
    });

    // console.log('Datos filtrados:', filteredData);

    if (filteredData.length === 0) {
        document.getElementById('chartdiv').innerHTML = `
            <div class="alert alert-warning text-center">
                <h5>No hay datos para mostrar</h5>
                <p>No se encontraron registros para el período seleccionado.</p>
            </div>
        `;
        return;
    }

    if (currentChart) {
        currentChart.dispose();
    }

    am5.ready(function () {
        const root = am5.Root.new("chartdiv");

        root.setThemes([
            am5themes_Animated.new(root)
        ]);

        let chart;
        if (chartType === 'line') {
            chart = root.container.children.push(am5xy.XYChart.new(root, {
                panX: true,
                panY: true,
                wheelX: "panX",
                wheelY: "zoomX",
                pinchZoomX: true,
                paddingLeft: 0,
                paddingRight: 20
            }));
        } else {
            chart = root.container.children.push(am5xy.XYChart.new(root, {
                panX: false,
                panY: false,
                wheelX: "panX",
                wheelY: "zoomX",
                layout: root.verticalLayout,
                paddingLeft: 0,
                paddingRight: 20
            }));
        }

        const cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
        cursor.lineY.set("visible", false);

        const xRenderer = am5xy.AxisRendererX.new(root, {
            minGridDistance: 0,
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
            xAxis.data.setAll(filteredData);
            // console.log('Datos asignados al eje X correctamente');
        } catch (error) {
            console.error('Error al asignar datos al eje X:', error);
            throw error;
        }

        const yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
            maxDeviation: 0.3,
            min: 0,
            renderer: am5xy.AxisRendererY.new(root, {
                strokeOpacity: 0.1
            })
        }));

        const acreditadores = new Set();
        filteredData.forEach(item => {
            Object.keys(item).forEach(key => {
                if (key !== 'period') {
                    acreditadores.add(key);
                }
            });
        });

        const colors = [
            am5.color(0xFF585D), // Rojo coral
            am5.color(0xA4D65E), // Verde lima
            am5.color(0x236192), // Azul oscuro
            am5.color(0x007DBA), // Azul medio
            am5.color(0x2C2A29), // Gris oscuro
        ];

        let colorIndex = 0;

        acreditadores.forEach(acreditador => {
            const color = colors[colorIndex % colors.length];
            acreditadorColors[acreditador] = color.toString();
            colorIndex++;

            let series;
            if (chartType === 'line') {
                series = chart.series.push(am5xy.LineSeries.new(root, {
                    name: acreditador,
                    xAxis: xAxis,
                    yAxis: yAxis,
                    valueYField: acreditador,
                    categoryXField: "period",
                    stroke: color,
                    tooltip: am5.Tooltip.new(root, {
                        labelText: "{name}: {valueY}"
                    })
                }));

                series.strokes.template.setAll({
                    strokeWidth: 3
                });

                series.bullets.push(function () {
                    return am5.Bullet.new(root, {
                        sprite: am5.Circle.new(root, {
                            radius: 1,
                            fill: color
                        })
                    });
                });
            } else {
                series = chart.series.push(am5xy.ColumnSeries.new(root, {
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
                    cornerRadiusTL: 6,
                    cornerRadiusTR: 6
                });
            }

            series.data.setAll(filteredData);

            series.bullets.push(function () {
                return am5.Bullet.new(root, {
                    locationY: 1,
                    sprite: am5.Label.new(root, {
                        text: "{valueY}",
                        fill: am5.color(0xffffff),
                        centerY: am5.p100,
                        centerX: am5.p50,
                        fontSize: 12,
                        fontWeight: "bold",
                        populateText: true
                    })
                });
            });
        });

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
        chart.series.each(function (series) {
            let total = 0;
            series.data.each(function (dataItem) {
                total += dataItem[series.get("valueYField")] || 0;
            });

            series.set("legendLabelText", "[" + acreditadorColors[series.get("name")] + "]" + series.get("name") + "[/]");
            series.set("legendValueText", "[bold " + acreditadorColors[series.get("name")] + "]Total: " + total + "[/]");
        });

        chart.appear(1000, 100);
        currentChart = root;
    });
}
async function loadChartData() {
    // console.log('Cargando datos del gráfico...');

    const periodType = document.getElementById('periodType').value;
    const chartType = document.getElementById('chartType').value;

    const params = new URLSearchParams({
        period_type: periodType,
        chart_type: chartType
    });

    if (periodType === 'year') {
        const startYear = document.getElementById('startYear').value;
        const endYear = document.getElementById('endYear').value;
        params.append('start_year', startYear);
        params.append('end_year', endYear);
    } else if (periodType === 'month') {
        const startMonth = document.getElementById('startMonth').value;
        const endMonth = document.getElementById('endMonth').value;
        if (startMonth && endMonth) {
            params.append('start_date', startMonth + '-01');
            const endDate = new Date(endMonth + '-01');
            endDate.setMonth(endDate.getMonth() + 1);
            endDate.setDate(0);
            params.append('end_date', endDate.toISOString().split('T')[0]);
        }
    } else if (periodType === 'day') {
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;
        if (startDate && endDate) {
            params.append('start_date', startDate);
            params.append('end_date', endDate);
        }
    }

    const chartDiv = document.getElementById('chartdiv');
    chartDiv.innerHTML = `
        <div class="text-center" style="padding: 50px;">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Cargando...</span>
            </div>
            <p class="mt-2">Cargando datos...</p>
        </div>
    `;

    try {
        const response = await fetch(`/api/chart/candidates?${params}`);
        const data = await response.json();

        if (data.success) {
            // console.log('Datos recibidos:', data);

            chartDiv.innerHTML = '';

            updateChart(data.data, chartType);
            updateTotals(data.totals);
        } else {
            throw new Error(data.message);
        }
    } catch (error) {
        console.error('Error cargando datos del gráfico:', error);

        chartDiv.innerHTML = `
            <div class="alert alert-danger text-center">
                <h5>Error al cargar los datos</h5>
                <p>${error.message}</p>
                <button class="btn btn-primary btn-sm" onclick="actualizarDatos()">Reintentar</button>
            </div>
        `;

        updateTotals({});
    }
}
async function loadAvailableYears() {
    try {
        const response = await fetch('/api/chart/years');
        const data = await response.json();

        if (data.success) {
            const yearSelect = document.getElementById('yearSelect');
            if (yearSelect) {
                yearSelect.innerHTML = '';

                data.years.forEach(year => {
                    const option = document.createElement('option');
                    option.value = year;
                    option.textContent = year;
                    yearSelect.appendChild(option);
                });

                yearSelect.value = new Date().getFullYear();
            }
        }
    } catch (error) {
        console.error('Error cargando años:', error);
    }
}
function getColors(count) {
    const palette = colorPalettes[currentColorPalette] || colorPalettes.default;

    if (count <= palette.length) {
        return palette.slice(0, count);
    }

    const additionalColors = [];
    for (let i = palette.length; i < count; i++) {
        const hue = (i * 137.5) % 360;
        additionalColors.push(`hsl(${hue}, 70%, 65%)`);
    }

    return [...palette, ...additionalColors];
}
function createXYChart(chartData, chartType) {
    // console.log('Creando gráfica XY:', chartType);

    chart = am5.Root.new("chartdiv");

    chart.setThemes([
        am5themes_Animated.new(chart)
    ]);

    const xyChart = chart.container.children.push(
        am5xy.XYChart.new(chart, {
            panX: true,
            panY: false,
            wheelX: "panX",
            wheelY: "zoomX"
        })
    );

    const xAxis = xyChart.xAxes.push(
        am5xy.CategoryAxis.new(chart, {
            categoryField: "category",
            renderer: am5xy.AxisRendererX.new(chart, {
                minGridDistance: 30
            })
        })
    );

    const yAxis = xyChart.yAxes.push(
        am5xy.ValueAxis.new(chart, {
            renderer: am5xy.AxisRendererY.new(chart, {})
        })
    );

    xAxis.data.setAll(chartData.data);


    const colors = getColors(chartData.categories.length);

    if (chartData.categories && chartData.data) {
        chartData.categories.forEach((category, index) => {
            let series;

            if (chartType === 'line') {
                series = xyChart.series.push(
                    am5xy.LineSeries.new(chart, {
                        name: category,
                        xAxis: xAxis,
                        yAxis: yAxis,
                        valueYField: category,
                        categoryXField: "category",
                        tooltip: am5.Tooltip.new(chart, {
                            labelText: "{name}: {valueY}"
                        })
                    })
                );

                series.strokes.template.setAll({
                    strokeWidth: 3,
                    stroke: am5.color(colors[index])
                });

                series.bullets.push(function () {
                    return am5.Bullet.new(chart, {
                        sprite: am5.Circle.new(chart, {
                            radius: 5,
                            fill: am5.color(colors[index])
                        })
                    });
                });

            } else {
                series = xyChart.series.push(
                    am5xy.ColumnSeries.new(chart, {
                        name: category,
                        xAxis: xAxis,
                        yAxis: yAxis,
                        valueYField: category,
                        categoryXField: "category",
                        tooltip: am5.Tooltip.new(chart, {
                            labelText: "{name}: {valueY}"
                        })
                    })
                );
                series.columns.template.setAll({
                    fill: am5.color(colors[index]),
                    stroke: am5.color(colors[index])
                });
            }

            series.data.setAll(chartData.data);
        });
    }

    const legend = xyChart.children.push(
        am5.Legend.new(chart, {
            centerX: am5.p50,
            x: am5.p50
        })
    );
    legend.data.setAll(xyChart.series.values);

    xyChart.set("cursor", am5xy.XYCursor.new(chart, {}));

    xyChart.appear(1000, 100);
}
function createPieChart(chartData) {
    // console.log('Creando gráfica circular');

    chart = am5.Root.new("chartdiv");

    chart.setThemes([
        am5themes_Animated.new(chart)
    ]);

    const pieChart = chart.container.children.push(
        am5.PieChart.new(chart, {})
    );

    const pieSeries = pieChart.series.push(
        am5.PieSeries.new(chart, {
            name: "Candidatos",
            valueField: "value",
            categoryField: "category"
        })
    );

    pieSeries.slices.template.set("tooltipText", "{category}: {value}");

    pieSeries.data.setAll(chartData);

    const legend = pieChart.children.push(
        am5.Legend.new(chart, {
            centerX: am5.p50,
            x: am5.p50
        })
    );
    legend.data.setAll(pieSeries.dataItems);

    pieChart.appear(1000, 100);
}
function loadAllStudentCharts() {

    $.ajax({
        url: '/getAllCoursesData',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            if (response.success && response.estudiantes && response.estudiantes.length > 0) {
                // generateStudentCharts(response.estudiantes);
            } else {
                showEmptyCharts();
            }
        },
        error: function (xhr, status, error) {
            console.error('Error al cargar datos para gráficas:', error);
            showErrorCharts();
        }
    });
}

function generateStatusChart(estudiantes, metricasData) {
    // Validar que existan datos
    if (!metricasData) {
        console.warn('No hay datos de métricas para generar la gráfica de estado');
        // Si no hay datos de métricas pero sí estudiantes, usar la lógica antigua
        if (!estudiantes || estudiantes.length === 0) {
            console.warn('No hay estudiantes para generar la gráfica de estado');
            return;
        }
        // Llamar a la función original
        return generateStatusChartOriginal(estudiantes);
    }

    console.log('Datos de métricas del servidor:', metricasData);
    
    const estudiantesAprobados = metricasData.estudiantesAprobados || 0;
    const estudiantesReprobados = metricasData.estudiantesReprobados || 0;
    const estudiantesDesercion = metricasData.estudiantesDesercion || 0;
    const estudiantesNoAsistieron = metricasData.estudiantesNoAsistieron || 0;

    console.log('Aprobados:', estudiantesAprobados);
    console.log('Reprobados:', estudiantesReprobados);
    console.log('Deserción:', estudiantesDesercion);
    console.log('No Asistieron:', estudiantesNoAsistieron);

    // Preparar series para la gráfica
    const series = [];
    const labels = [];
    const colors = [];

    // Añadir aprobados si hay
    if (estudiantesAprobados > 0) {
        series.push(estudiantesAprobados);
        labels.push('Aprobados');
        colors.push('#A4D65E');
    }

    // Añadir reprobados si hay
    if (estudiantesReprobados > 0) {
        series.push(estudiantesReprobados);
        labels.push('Fallidos');
        colors.push('#FF585D');
    }

    // Añadir deserción si hay (como una categoría especial)
    if (estudiantesDesercion > 0) {
        series.push(estudiantesDesercion);
        labels.push('Deserción');
        colors.push('#FFA726'); // Naranja para deserción
    }

    // Añadir no asistieron si hay
    if (estudiantesNoAsistieron > 0) {
        series.push(estudiantesNoAsistieron);
        labels.push('No Asistieron');
        colors.push('#9E9E9E'); // Gris para no asistieron
    }

    // Solo generar gráfica si hay datos
    if (series.length === 0) {
        console.warn('No hay datos para mostrar en la gráfica de estado');
        return;
    }

    const options = {
        series: series,
        chart: {
            type: 'donut',
            height: 350
        },
        colors: colors,
        labels: labels,
        legend: {
            position: 'bottom',
            horizontalAlign: 'center'
        },
        plotOptions: {
            pie: {
                donut: {
                    size: '45%',
                    labels: {
                        show: true,
                        name: {
                            show: true,
                            fontSize: '14px',
                            fontWeight: 'bold'
                        },
                        value: {
                            show: true,
                            fontSize: '16px',
                            fontWeight: 'bold',
                            formatter: function (val) {
                                return val;
                            }
                        },
                        total: {
                            show: true,
                            label: 'Total',
                            color: '#373d3f',
                            formatter: function (w) {
                                return w.globals.seriesTotals.reduce((a, b) => a + b, 0);
                            }
                        }
                    }
                }
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function (val, opts) {
                const total = opts.w.config.series.reduce((a, b) => a + b, 0);
                const percentage = total > 0 ? ((opts.w.config.series[opts.seriesIndex] / total) * 100).toFixed(1) : 0;
                return opts.w.config.series[opts.seriesIndex] + ' (' + percentage + '%)';
            }
        },
        tooltip: {
            y: {
                formatter: function (value, { seriesIndex, w }) {
                    const total = w.config.series.reduce((a, b) => a + b, 0);
                    const percentage = total > 0 ? ((value / total) * 100).toFixed(1) : 0;
                    return value + ' estudiantes (' + percentage + '%)';
                }
            }
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 300
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    const chartElement = document.querySelector("#chartEstadoCurso");
    if (chartElement) {
        chartElement.innerHTML = '';
        const chart = new ApexCharts(chartElement, options);
        chart.render();
    }
}


function generateResitChart(estudiantes, tiposAprobacionData) {
    // Validar que existan datos
    if (!tiposAprobacionData) {
        console.warn('No hay datos de tipos de aprobación para generar la gráfica');
        return;
    }

    console.log('Datos de tipos de aprobación del servidor:', tiposAprobacionData);

    const aprobadosPrimerIntento = tiposAprobacionData.aprobadosPrimerIntento || 0;
    const aprobadosConResit = tiposAprobacionData.aprobadosConResit || 0;

    console.log('Aprobados primer intento:', aprobadosPrimerIntento);
    console.log('Aprobados con resit:', aprobadosConResit);

    // Solo generar gráfica si hay datos
    if (aprobadosPrimerIntento === 0 && aprobadosConResit === 0) {
        console.warn('No hay datos de resit para mostrar');
        return;
    }

    const options = {
        series: [aprobadosConResit, aprobadosPrimerIntento],
        chart: {
            type: 'donut',
            height: 350
        },
        colors: ['#FF585D', '#A4D65E'],
        labels: ['Con Resit', 'Sin Resit'],
        legend: {
            position: 'bottom',
            horizontalAlign: 'center'
        },
        plotOptions: {
            pie: {
                donut: {
                    size: '45%',
                    labels: {
                        show: true,
                        name: {
                            show: true,
                            fontSize: '14px',
                            fontWeight: 'bold'
                        },
                        value: {
                            show: true,
                            fontSize: '16px',
                            fontWeight: 'bold'
                        },
                        total: {
                            show: true,
                            label: 'Total',
                            color: '#373d3f',
                            formatter: function (w) {
                                return w.globals.seriesTotals.reduce((a, b) => a + b, 0);
                            }
                        }
                    }
                }
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function (val, opts) {
                return opts.w.config.series[opts.seriesIndex] + ' (' + val.toFixed(1) + '%)';
            }
        },
        tooltip: {
            y: {
                formatter: function (value, { seriesIndex, w }) {
                    const total = w.config.series.reduce((a, b) => a + b, 0);
                    const percentage = ((value / total) * 100).toFixed(1);
                    return value + ' estudiantes (' + percentage + '%)';
                }
            }
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 300
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    const chartElement = document.querySelector("#chartEstudiantesResit");
    if (chartElement) {
        chartElement.innerHTML = '';
        const chart = new ApexCharts(chartElement, options);
        chart.render();
    }
}

function generateResitTypesChart(estudiantes, tiposReprobacionData) {
    // Validar que existan datos
    if (!tiposReprobacionData) {
        console.warn('No hay datos de tipos de reprobación para generar la gráfica');
        return;
    }

    console.log('Datos de tipos de reprobación del servidor:', tiposReprobacionData);

    const reprobadosSinOportunidad = tiposReprobacionData.reprobadosSinOportunidad || 0;
    const reprobadosConOportunidadNoTomada = tiposReprobacionData.reprobadosConOportunidadNoTomada || 0;
    const reprobadosPresentaronResit = tiposReprobacionData.reprobadosPresentaronResit || 0;
    const reprobadosVencimiento = tiposReprobacionData.reprobadosVencimiento || 0;

    console.log('Reprobados sin oportunidad:', reprobadosSinOportunidad);
    console.log('Reprobados con oportunidad no tomada:', reprobadosConOportunidadNoTomada);
    console.log('Reprobados presentaron resit:', reprobadosPresentaronResit);
    console.log('Reprobados vencimiento:', reprobadosVencimiento);

    // Solo generar gráfica si hay datos
    const totalReprobados = reprobadosSinOportunidad + reprobadosConOportunidadNoTomada +
        reprobadosPresentaronResit;

    if (totalReprobados === 0) {
        console.warn('No hay estudiantes reprobados para mostrar');
        return;
    }

    const options = {
        series: [
            reprobadosPresentaronResit,
            reprobadosConOportunidadNoTomada,
            reprobadosSinOportunidad
        ],
        chart: {
            type: 'donut',
            height: 350
        },
        colors: ['#FF585D', '#236192', '#A4D65E'],
        labels: [
            'Re-sit reprobado',
            'Re-sit no tomado',
            'No re-sit'
        ],
        legend: {
            position: 'bottom',
            horizontalAlign: 'center'
        },
        plotOptions: {
            pie: {
                donut: {
                    size: '45%',
                    labels: {
                        show: true,
                        name: {
                            show: true,
                            fontSize: '14px',
                            fontWeight: 'bold'
                        },
                        value: {
                            show: true,
                            fontSize: '16px',
                            fontWeight: 'bold'
                        },
                        total: {
                            show: true,
                            label: 'Total Reprobados',
                            color: '#373d3f',
                            formatter: function (w) {
                                return w.globals.seriesTotals.reduce((a, b) => a + b, 0);
                            }
                        }
                    }
                }
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function (val, opts) {
                return opts.w.config.series[opts.seriesIndex] + ' (' + val.toFixed(1) + '%)';
            }
        },
        tooltip: {
            y: {
                formatter: function (value, { seriesIndex, w }) {
                    const total = w.config.series.reduce((a, b) => a + b, 0);
                    const percentage = ((value / total) * 100).toFixed(1);
                    return value + ' estudiantes (' + percentage + '%)';
                }
            }
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 300
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    const chartElement = document.querySelector("#chartTiposResit");
    if (chartElement) {
        chartElement.innerHTML = '';
        const chart = new ApexCharts(chartElement, options);
        chart.render();
    }
}
// function generateResitTypesChart(estudiantes) {

//     const soloInmediato = estudiantes.filter(est => {
//         const datos = est.datos_curso;
//         const tieneInmediato = datos.RESIT_INMEDIATO === '1' || datos.RESIT_INMEDIATO === 1 || datos.RESIT_INMEDIATO === 'Yes';
//         const tieneProgramado = datos.RESIT_PROGRAMADO === '1' || datos.RESIT_PROGRAMADO === 1 || datos.RESIT_PROGRAMADO === 'Yes';
//         return tieneInmediato && !tieneProgramado;
//     }).length;


//     const soloProgramado = estudiantes.filter(est => {
//         const datos = est.datos_curso;
//         const tieneInmediato = datos.RESIT_INMEDIATO === '1' || datos.RESIT_INMEDIATO === 1 || datos.RESIT_INMEDIATO === 'Yes';
//         const tieneProgramado = datos.RESIT_PROGRAMADO === '1' || datos.RESIT_PROGRAMADO === 1 || datos.RESIT_PROGRAMADO === 'Yes';
//         return !tieneInmediato && tieneProgramado;
//     }).length;


//     const ambosResit = estudiantes.filter(est => {
//         const datos = est.datos_curso;
//         const tieneInmediato = datos.RESIT_INMEDIATO === '1' || datos.RESIT_INMEDIATO === 1 || datos.RESIT_INMEDIATO === 'Yes';
//         const tieneProgramado = datos.RESIT_PROGRAMADO === '1' || datos.RESIT_PROGRAMADO === 1 || datos.RESIT_PROGRAMADO === 'Yes';
//         return tieneInmediato && tieneProgramado;
//     }).length;

//     const sinResitEspecifico = estudiantes.length - soloInmediato - soloProgramado - ambosResit;

//     const options = {
//         series: [soloInmediato, soloProgramado, ambosResit, sinResitEspecifico],
//         chart: {
//             type: 'pie',
//             height: 350
//         },
//         colors: ['#007DBA', '#FF585D', '#236192', '#A4D65E'],
//         labels: ['Solo Inmediato', 'Solo Programado', 'Ambos Resit', 'Sin Resit Específico'],
//         legend: {
//             position: 'bottom',
//             horizontalAlign: 'center'
//         },
//         dataLabels: {
//             enabled: true,
//             formatter: function (val, opts) {
//                 return opts.w.config.series[opts.seriesIndex] + ' (' + val.toFixed(1) + '%)';
//             }
//         },
//         tooltip: {
//             y: {
//                 formatter: function (value, { seriesIndex, w }) {
//                     const total = w.config.series.reduce((a, b) => a + b, 0);
//                     const percentage = ((value / total) * 100).toFixed(1);
//                     return value + ' estudiantes (' + percentage + '%)';
//                 }
//             }
//         },
//         responsive: [{
//             breakpoint: 480,
//             options: {
//                 chart: {
//                     width: 300
//                 },
//                 legend: {
//                     position: 'bottom'
//                 }
//             }
//         }]
//     };

//     const chart = new ApexCharts(document.querySelector("#chartTiposResit"), options);
//     chart.render();
// }
function showEmptyCharts() {
    const emptyOptions = {
        series: [1],
        chart: {
            type: 'pie',
            height: 350
        },
        colors: ['#6c757d'],
        labels: ['Sin datos'],
        legend: {
            show: false
        },
        title: {
            text: 'No hay datos disponibles',
            align: 'center',
            style: {
                fontSize: '16px',
                color: '#6c757d'
            }
        },
        dataLabels: {
            enabled: false
        },
        tooltip: {
            enabled: false
        }
    };

    new ApexCharts(document.querySelector("#chartEstadoCurso"), emptyOptions).render();
    new ApexCharts(document.querySelector("#chartEstudiantesResit"), emptyOptions).render();
    new ApexCharts(document.querySelector("#chartTiposResit"), emptyOptions).render();
}
function showErrorCharts() {
    const errorOptions = {
        series: [1],
        chart: {
            type: 'pie',
            height: 350
        },
        colors: ['#dc3545'],
        labels: ['Error'],
        legend: {
            show: false
        },
        title: {
            text: 'Error al cargar datos',
            align: 'center',
            style: {
                fontSize: '16px',
                color: '#dc3545'
            }
        },
        dataLabels: {
            enabled: false
        },
        tooltip: {
            enabled: false
        }
    };

    new ApexCharts(document.querySelector("#chartEstadoCurso"), errorOptions).render();
    new ApexCharts(document.querySelector("#chartEstudiantesResit"), errorOptions).render();
    new ApexCharts(document.querySelector("#chartTiposResit"), errorOptions).render();
}
function updateStudentCharts() {

    const charts = [
        document.querySelector("#chartEstadoCurso"),
        document.querySelector("#chartEstudiantesResit"),
        document.querySelector("#chartTiposResit")
    ];

    charts.forEach(chartElement => {
        if (chartElement) {
            chartElement.innerHTML = '';
        }
    });

    loadAllStudentCharts();
}

$(document).ready(function () {
    loadAllStudentCharts();
});


let currentStackedChart = null;
const acreditadorColorsStacked = {};

function toggleDateFiltersStacked() {
    const periodType = document.getElementById('periodType').value;

    document.getElementById('yearRangeFilter').style.display = 'none';
    document.getElementById('monthRangeFilter').style.display = 'none';
    document.getElementById('dayRangeFilter').style.display = 'none';

    if (periodType === 'year') {
        document.getElementById('yearRangeFilter').style.display = 'block';
        populateYearSelectsStacked();
    } else if (periodType === 'month') {
        document.getElementById('monthRangeFilter').style.display = 'block';
        setDefaultMonthRangeStacked();
    } else if (periodType === 'day') {
        document.getElementById('dayRangeFilter').style.display = 'block';
        setDefaultDateRangeStacked();
    }
}

function populateYearSelectsStacked() {
    const currentYear = new Date().getFullYear();
    const startYearSelect = document.getElementById('startYear');
    const endYearSelect = document.getElementById('endYear');

    startYearSelect.innerHTML = '';
    endYearSelect.innerHTML = '';

    for (let year = currentYear - 10; year <= currentYear + 2; year++) {
        startYearSelect.innerHTML += `<option value="${year}">${year}</option>`;
        endYearSelect.innerHTML += `<option value="${year}">${year}</option>`;
    }

    startYearSelect.value = currentYear - 1;
    endYearSelect.value = currentYear;
}

function setDefaultMonthRangeStacked() {
    const today = new Date();
    const currentMonth = today.toISOString().slice(0, 7);
    const lastYear = new Date(today.getFullYear() - 1, today.getMonth(), 1);
    const lastYearMonth = lastYear.toISOString().slice(0, 7);

    document.getElementById('startMonth').value = lastYearMonth;
    document.getElementById('endMonth').value = currentMonth;
}

function setDefaultDateRangeStacked() {
    const today = new Date();
    const thirtyDaysAgo = new Date(today.getTime() - (30 * 24 * 60 * 60 * 1000));

    document.getElementById('startDate').value = thirtyDaysAgo.toISOString().split('T')[0];
    document.getElementById('endDate').value = today.toISOString().split('T')[0];
}

function updateTotalsStacked(totals) {
    // console.log('Totales recibidos (apilada):', totals);
    const totalGeneral = totals.total_general || 0;
    document.getElementById('totalGeneralStacked').textContent = totalGeneral.toLocaleString();
}

function updateStackedChart(data) {
    // console.log('Datos originales recibidos (apilada):', data);

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

    // console.log('Datos procesados (apilada):', processedData);

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

    am5.ready(function () {
        const root = am5.Root.new("chartdivStacked");

        root.setThemes([
            am5themes_Animated.new(root)
        ]);

        const chart = root.container.children.push(am5xy.XYChart.new(root, {
            panX: false,
            panY: false,
            wheelX: "panX",
            wheelY: "zoomX",
            layout: root.verticalLayout,
            paddingLeft: 0,
            paddingRight: 20
        }));

        const cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
        cursor.lineY.set("visible", false);

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
            // console.log('Datos asignados al eje X correctamente (apilada)');
        } catch (error) {
            console.error('Error al asignar datos al eje X (apilada):', error);
            throw error;
        }

        const yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
            maxDeviation: 0.3,
            min: 0,
            renderer: am5xy.AxisRendererY.new(root, {
                strokeOpacity: 0.1
            })
        }));

        const colors = [
            am5.color(0xFF585D), // Rojo coral
            am5.color(0xA4D65E), // Verde lima
            am5.color(0x236192), // Azul oscuro
            am5.color(0x007DBA), // Azul medio
            am5.color(0x2C2A29), // Gris oscuro/casi negro
        ];

        let colorIndex = 0;

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

            series.bullets.push(function (root, series, dataItem) {
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

        chart.series.each(function (series) {
            let total = 0;
            series.data.each(function (dataItem) {
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

async function loadStackedChartData() {
    // console.log('Cargando datos del gráfico apilado...');

    const periodType = document.getElementById('periodType').value;

    const params = new URLSearchParams({
        period_type: periodType,
        chart_type: 'column'
    });

    if (periodType === 'year') {
        const startYear = document.getElementById('startYear').value;
        const endYear = document.getElementById('endYear').value;
        params.append('start_year', startYear);
        params.append('end_year', endYear);
    } else if (periodType === 'month') {
        const startMonth = document.getElementById('startMonth').value;
        const endMonth = document.getElementById('endMonth').value;
        if (startMonth && endMonth) {
            params.append('start_date', startMonth + '-01');
            const endDate = new Date(endMonth + '-01');
            endDate.setMonth(endDate.getMonth() + 1);
            endDate.setDate(0);
            params.append('end_date', endDate.toISOString().split('T')[0]);
        }
    } else if (periodType === 'day') {
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;
        if (startDate && endDate) {
            params.append('start_date', startDate);
            params.append('end_date', endDate);
        }
    }

    const chartDiv = document.getElementById('chartdiv');
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
            // console.log('Datos recibidos (apilada):', data);

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
                <button class="btn btn-success btn-sm" onclick="actualizarDatos()">Reintentar</button>
            </div>
        `;

        updateTotalsStacked({});
    }
}

document.addEventListener('DOMContentLoaded', function () {
    toggleDateFiltersStacked();
});



let currentEstudiantesChart = null;
const estudiantesColors = {};
function processCandidateData(data) {
    // console.log('Procesando datos de candidatos:', data);

    const categories = {
        'No tuvieron oportunidad de re-sit': 0,
        'No presentaron re-sit': 0,
        'Fallaron el re-sit': 0,
        'Aprobados sin fallas': 0,
        'Aprobados con resit': 0
    };

    data.forEach(candidate => {
        const equipPass = candidate.equipo_pass?.toUpperCase() || '';
        const pypPass = candidate.py_pass?.toUpperCase() || '';
        const resitInmediato = candidate.resit_inmediato?.toUpperCase() || '';
        const resitProgramado = candidate.resit_programado?.toUpperCase() || '';
        const finalStatus = candidate.final_status?.toUpperCase() || '';

        if (finalStatus === 'FAILED') {
            if (equipPass === 'FAILED' && pypPass === 'FAILED') {
                categories['No tuvieron oportunidad de re-sit']++;
            }
            else if (
                (equipPass === 'FAILED' || pypPass === 'FAILED') &&
                !resitInmediato && !resitProgramado
            ) {
                categories['No presentaron re-sit']++;
            }
            else if (resitInmediato === 'FAILED' || resitProgramado === 'FAILED') {
                categories['Fallaron el re-sit']++;
            }
            else {
                categories['No presentaron re-sit']++;
            }
        }
        else if (finalStatus === 'PASS') {
            if (equipPass === 'PASS' && pypPass === 'PASS') {
                categories['Aprobados sin fallas']++;
            }
            else if (
                (equipPass === 'FAILED' || pypPass === 'FAILED') ||
                (resitInmediato === 'PASS' || resitProgramado === 'PASS')
            ) {
                categories['Aprobados con resit']++;
            }
            else {
                categories['Aprobados sin fallas']++;
            }
        }
    });

    const processedData = [{
        period: 'Candidatos',
        ...categories
    }];

    // console.log('Datos procesados:', processedData);

    return {
        data: processedData,
        totals: {
            total_general: Object.values(categories).reduce((sum, count) => sum + count, 0)
        }
    };
}
function processEstudiantesAprobData(data) {
    // console.log('Procesando datos para gráfica de Estudiantes Aprobados:', data);

    const categoriasAprobados = {
        'Aprobados en primera oportunidad': 0,
        'Aprobados con resit inmediato': 0,
        'Aprobados con resit programado': 0
    };

    data.forEach(candidate => {
        const equipPass = candidate.equipo_pass?.toUpperCase() || '';
        const pypPass = candidate.py_pass?.toUpperCase() || '';
        const resitInmediato = candidate.resit_inmediato?.toUpperCase() || '';
        const resitProgramado = candidate.resit_programado?.toString() || '';
        const finalStatus = candidate.final_status?.toUpperCase() || '';

        if (finalStatus === 'PASS') {

            if (equipPass === 'PASS' && pypPass === 'PASS') {
                categoriasAprobados['Aprobados en primera oportunidad']++;
            }

            else if (resitInmediato === 'PASS') {
                categoriasAprobados['Aprobados con resit inmediato']++;
            }

            else if (resitProgramado === 'PASS' ||
                resitProgramado === '1' ||
                resitProgramado === 'true') {
                categoriasAprobados['Aprobados con resit programado']++;
            }

            else {
                categoriasAprobados['Aprobados en primera oportunidad']++;
            }
        }
    });

    const processedData = [{
        periodo: 'Estudiantes Aprobados',
        ...categoriasAprobados
    }];

    // console.log('Datos procesados para Estudiantes Aprobados:', processedData);

    return {
        data: processedData,
        totals: {
            total_aprobados: Object.values(categoriasAprobados).reduce((sum, count) => sum + count, 0),
            aprobados_primera: categoriasAprobados['Aprobados en primera oportunidad'] || 0,
            aprobados_resit_inmediato: categoriasAprobados['Aprobados con resit inmediato'] || 0,
            aprobados_resit_programado: categoriasAprobados['Aprobados con resit programado'] || 0
        }
    };
}
function updateEstudiantesAprobChart(processedData) {
    console.log('Actualizando gráfica de Estudiantes Aprobados:', processedData);

    if (!processedData || processedData.length === 0) {
        // document.getElementById('chartdivEstudiantesAprob').innerHTML = `
        //     <div class="alert alert-warning text-center">
        //         <h5>No hay datos para mostrar</h5>
        //         <p>No se encontraron estudiantes aprobados.</p>
        //     </div>
        // `;
        return;
    }

    if (currentEstudiantesChart) {
        currentEstudiantesChart.dispose();
    }

    // am5.ready(function() {
    //     // Crear raíz para la nueva gráfica
    //     const root = am5.Root.new("chartdivEstudiantesAprob");

    //     root.setThemes([
    //         am5themes_Animated.new(root)
    //     ]);

    //     // Crear gráfica
    //     const chart = root.container.children.push(am5xy.XYChart.new(root, {
    //         panX: false,
    //         panY: false,
    //         wheelX: "panX",
    //         wheelY: "zoomX",
    //         layout: root.verticalLayout,
    //         paddingLeft: 0,
    //         paddingRight: 20
    //     }));

    //     const cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
    //     cursor.lineY.set("visible", false);

    //     // Configurar eje X
    //     const xRenderer = am5xy.AxisRendererX.new(root, { 
    //         minGridDistance: 30,
    //         minorGridEnabled: true
    //     });

    //     xRenderer.labels.template.setAll({
    //         rotation: 0,
    //         centerY: am5.p50,
    //         centerX: am5.p50,
    //         fontSize: 14,
    //         fontWeight: "bold"
    //     });

    //     const xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
    //         maxDeviation: 0.3,
    //         categoryField: "periodo",
    //         renderer: xRenderer,
    //         tooltip: am5.Tooltip.new(root, {})
    //     }));

    //     try {
    //         xAxis.data.setAll(processedData);
    //         console.log('Datos asignados al eje X correctamente (Estudiantes Aprobados)');
    //     } catch (error) {
    //         console.error('Error al asignar datos al eje X (Estudiantes Aprobados):', error);
    //         throw error;
    //     }

    //     // Configurar eje Y
    //     const yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
    //         maxDeviation: 0.3,
    //         min: 0,
    //         renderer: am5xy.AxisRendererY.new(root, {
    //             strokeOpacity: 0.1
    //         })
    //     }));

    //     // Definir colores específicos para esta gráfica
    //     // Usamos diferentes tonos de verde/azul para diferenciar de la otra gráfica
    //     const colorsEstudiantes = {
    //         'Aprobados en primera oportunidad': am5.color(0x006400), // Verde oscuro
    //         'Aprobados con resit inmediato': am5.color(0x32CD32),   // Verde lima
    //         'Aprobados con resit programado': am5.color(0x00CED1)   // Turquesa
    //     };

    //     // Orden de las series
    //     const seriesOrder = [
    //         'Aprobados en primera oportunidad',
    //         'Aprobados con resit inmediato',
    //         'Aprobados con resit programado'
    //     ];

    //     // Crear series para cada categoría
    //     seriesOrder.forEach(categoria => {
    //         const color = colorsEstudiantes[categoria];
    //         estudiantesColors[categoria] = color.toString();

    //         const series = chart.series.push(am5xy.ColumnSeries.new(root, {
    //             name: categoria,
    //             xAxis: xAxis,
    //             yAxis: yAxis,
    //             valueYField: categoria,
    //             categoryXField: "periodo",
    //             fill: color,
    //             stroke: color,
    //             stacked: true,
    //             tooltip: am5.Tooltip.new(root, {
    //                 labelText: "{name}: {valueY}",
    //                 fontSize: 14
    //             })
    //         }));

    //         series.columns.template.setAll({
    //             tooltipY: 0,
    //             strokeOpacity: 0,
    //             width: am5.percent(60),
    //             cornerRadiusBR: 5,
    //             cornerRadiusTR: 5,
    //             cornerRadiusBL: 5,
    //             cornerRadiusTL: 5
    //         });

    //         series.data.setAll(processedData);

    //         // Añadir etiquetas en las barras
    //         series.bullets.push(function(root, series, dataItem) {
    //             const value = dataItem.get("valueY");
    //             if (value > 0) {
    //                 return am5.Bullet.new(root, {
    //                     locationY: 0.5,
    //                     sprite: am5.Label.new(root, {
    //                         text: "{valueY}",
    //                         fill: am5.color(0xffffff),
    //                         centerY: am5.p50,
    //                         centerX: am5.p50,
    //                         fontSize: 14,
    //                         fontWeight: "bold",
    //                         populateText: true
    //                     })
    //                 });
    //             }
    //         });
    //     });

    //     // Crear leyenda
    //     const legend = chart.children.push(am5.Legend.new(root, {
    //         centerX: am5.p50,
    //         x: am5.p50,
    //         layout: root.horizontalLayout,
    //         height: am5.percent(25),
    //         width: am5.percent(90),
    //         marginTop: 15,
    //         marginBottom: 15
    //     }));

    //     legend.data.setAll(chart.series.values);

    //     legend.labels.template.setAll({
    //         fontSize: 12,
    //         fontWeight: "normal",
    //         maxWidth: 180,
    //         textAlign: "left",
    //         oversizedBehavior: "wrap"
    //     });

    //     legend.valueLabels.template.setAll({
    //         fontSize: 12,
    //         fontWeight: "bold"
    //     });

    //     // Configurar etiquetas en la leyenda
    //     chart.series.each(function(series) {
    //         const categoriaNombre = series.get("name");
    //         const total = processedData[0][categoriaNombre] || 0;

    //         series.set("legendLabelText", 
    //             "[bold " + estudiantesColors[categoriaNombre] + "]●[/] " + 
    //             "[black]" + categoriaNombre + "[/]"
    //         );
    //         series.set("legendValueText", 
    //             "[bold black]" + total + "[/]"
    //         );
    //     });

    //     // Añadir título al gráfico
    //     const title = chart.children.push(am5.Label.new(root, {
    //         text: "Distribución de Estudiantes Aprobados",
    //         fontSize: 16,
    //         fontWeight: "bold",
    //         textAlign: "center",
    //         x: am5.percent(50),
    //         y: 10,
    //         centerX: am5.percent(50)
    //     }));

    //     chart.appear(1000, 100);
    //     currentEstudiantesChart = root;
    // });
}
function updateTotalesEstudiantes(totals) {
    console.log('Actualizando totales de estudiantes aprobados:', totals);

    // if (totals.total_aprobados !== undefined) {
    //     const elementoTotal = document.getElementById('totalEstudiantesAprobados');
    //     if (elementoTotal) {
    //         elementoTotal.textContent = totals.total_aprobados.toLocaleString();
    //     }
    // }

    // if (totals.aprobados_primera !== undefined) {
    //     const elementoPrimera = document.getElementById('aprobadosPrimeraOportunidad');
    //     if (elementoPrimera) {
    //         elementoPrimera.textContent = totals.aprobados_primera.toLocaleString();
    //     }
    // }

}
async function loadEstudiantesAprobData() {
    console.log('Cargando datos para gráfica de Estudiantes Aprobados...');

    // const chartDiv = document.getElementById('chartdivEstudiantesAprob');
    // chartDiv.innerHTML = `
    //     <div class="text-center" style="padding: 50px;">
    //         <div class="spinner-border text-primary" role="status">
    //             <span class="visually-hidden">Cargando...</span>
    //         </div>
    //         <p class="mt-2">Cargando datos de estudiantes aprobados...</p>
    //     </div>
    // `;

    try {
        const response = await fetch('/api/estadisticas-general');
        const result = await response.json();

        console.log('Resultado completo recibido:', result);

        if (!result.success) {
            throw new Error(result.message || 'Error en la respuesta del servidor');
        }

        const processedData = processEstudiantesAprobData(result.data || []);

        chartDiv.innerHTML = '';

        updateEstudiantesAprobChart(processedData.data);
        updateTotalesEstudiantes(processedData.totals);

    } catch (error) {
        console.error('Error cargando datos de estudiantes aprobados:', error);

        chartDiv.innerHTML = `
            <div class="alert alert-danger text-center">
                <h5>Error al cargar los datos</h5>
                <p>${error.message}</p>
                <button class="btn btn-primary btn-sm" onclick="loadEstudiantesAprobData()">Reintentar</button>
            </div>
        `;

        updateTotalesEstudiantes({});
    }
}
document.addEventListener('DOMContentLoaded', function () {
    loadEstudiantesAprobData();
});