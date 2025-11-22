

document.addEventListener('DOMContentLoaded', function() {
    let charts = []; 

    showLoading();

    fetch('/api/dashboard/data')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
              updateMetricas(data.data.metricas);
                renderCharts(data.data);
            } else {
                throw new Error(data.message);
            }
        })
        .catch(error => {
            console.error('Error cargando datos:', error);
            showError('Error al cargar los datos: ' + error.message);
        });

    function showLoading() {
        const chartContainers = [
            'chartAcreditacion', 'chartProyectosAnio', 'chartProyectosEmpresa'
        ];

        document.getElementById('totalProyectos').textContent = '...';
        document.getElementById('totalEstudiantes').textContent = '...';
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
        document.getElementById('estudiantesAprobados').textContent = metricas.estudiantesAprobados;
    }

    function showError(message) {
        const chartContainers = [
            'chartAcreditacion', 'chartProyectosAnio', 'chartProyectosEmpresa'
        ];

        document.getElementById('totalProyectos').textContent = 'Error';
        document.getElementById('totalEstudiantes').textContent = 'Error';
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
                    formatter: function(value) {
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

        console.log('Todas las gráficas de pastel renderizadas correctamente');
    }

    function actualizarDatos() {
        console.log('Actualizando datos del dashboard...');
        fetch('/api/dashboard/data')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    charts.forEach(chart => {
                        if (chart && typeof chart.destroy === 'function') {
                            chart.destroy();
                        }
                    });
                    
                    renderCharts(data.data);
                }
            })
            .catch(error => {
                console.error('Error actualizando datos:', error);
            });
    }

    const actualizarBtn = document.createElement('button');
    actualizarBtn.innerHTML = '<i class="fas fa-sync-alt"></i> Actualizar Datos';
    actualizarBtn.className = 'btn btn-primary btn-sm position-fixed';
    actualizarBtn.style.bottom = '20px';
    actualizarBtn.style.right = '20px';
    actualizarBtn.style.zIndex = '1000';
    actualizarBtn.onclick = actualizarDatos;
    document.body.appendChild(actualizarBtn);

    setInterval(actualizarDatos, 300000); // 5 minutos
});

let chart = null;
let currentChartType = 'column';
let currentColorPalette = 'results';

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

document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM cargado, inicializando gráfica...');
    initializeEventListeners();
    loadAvailableYears();
    
     const periodType = document.getElementById('periodType');
    if (periodType) {
        periodType.dispatchEvent(new Event('change'));
    }
    setTimeout(() => {
        loadChartData();
    }, 500);
});

function initializeEventListeners() {
    const periodType = document.getElementById('periodType');
    const chartType = document.getElementById('chartType');
    const yearSelectGroup = document.getElementById('yearSelectGroup'); 
    
    if (periodType) {
        periodType.addEventListener('change', function() {
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
        chartType.addEventListener('change', function() {
            currentChartType = this.value;
            loadChartData();
        });
    }
}

async function loadChartData() {
    console.log('Cargando datos del gráfico...');
    
    const periodType = document.getElementById('periodType').value;
    const yearSelect = document.getElementById('yearSelect');
    const year = yearSelect ? yearSelect.value : null;
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;
    const chartType = currentChartType;

    const params = new URLSearchParams({
        period_type: periodType,
        chart_type: chartType
    });

    if (periodType !== 'year' && year) {
        params.append('year', year);
    }

    if (startDate && endDate) {
        params.append('start_date', startDate);
        params.append('end_date', endDate);
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
            console.log('Datos recibidos:', data);
            
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
                <button class="btn btn-primary btn-sm" onclick="loadChartData()">Reintentar</button>
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


function updateChart(chartData, chartType) {
    console.log('Actualizando gráfica tipo:', chartType);
    
    if (chart) {
        chart.dispose();
        chart = null;
    }

    if (typeof am5 === 'undefined') {
        console.error('AMCharts no está cargado');
        alert('Error: La librería de gráficas no se cargó correctamente');
        return;
    }

    try {
        if (chartType === 'pie') {
            createPieChart(chartData);
        } else {
            createXYChart(chartData, chartType);
        }
    } catch (error) {
        console.error('Error creando gráfica:', error);
        alert('Error al crear la gráfica: ' + error.message);
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
    console.log('Creando gráfica XY:', chartType);
    
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
                
                series.bullets.push(function() {
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
    console.log('Creando gráfica circular');
    
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

function updateTotals(totals) {
    const container = document.getElementById('totalsContainer');
    if (!container) return;
    
    let html = '<strong>Totales por Ente Acreditador:</strong><br>';
    
    if (totals) {
        Object.keys(totals).forEach(key => {
            if (key !== 'general') {
                html += `<span class="badge bg-primary me-2 mb-1">${key}: ${totals[key]}</span>`;
            }
        });
        
        html += `<br><strong class="mt-2">Total General: ${totals.general || 0}</strong>`;
    }
    
    container.innerHTML = html;
}

// Función para cargar y generar las gráficas de todos los estudiantes
function loadAllStudentCharts() {
    $.ajax({
        url: '/getAllCoursesData',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.success && response.estudiantes && response.estudiantes.length > 0) {
                generateStudentCharts(response.estudiantes);
            } else {
                showEmptyCharts();
            }
        },
        error: function(xhr, status, error) {
            console.error('Error al cargar datos para gráficas:', error);
            showErrorCharts();
        }
    });
}

// Función para generar las gráficas
function generateStudentCharts(estudiantes) {
    // Gráfica 1: Estudiantes por Estado del Curso
    generateStatusChart(estudiantes);
    
    // Gráfica 2: Estudiantes con Resit
    generateResitChart(estudiantes);
    
    // Gráfica 3: Tipos de Resit
    generateResitTypesChart(estudiantes);
}

// Gráfica 1: Estudiantes por Estado del Curso
function generateStatusChart(estudiantes) {
    const completed = estudiantes.filter(est => est.datos_curso.STATUS === 'Completed').length;
    const failed = estudiantes.filter(est => est.datos_curso.STATUS === 'Failed').length;
    const inProgress = estudiantes.filter(est => est.datos_curso.STATUS === 'In Progress').length;
    const pending = estudiantes.filter(est => est.datos_curso.STATUS === 'Pending').length;
    const other = estudiantes.length - completed - failed - inProgress - pending;

    const options = {
        series: [completed, failed, inProgress, pending, other],
        chart: {
            type: 'donut',
            height: 350
        },
        colors: ['#A4D65E', '#FF585D', '#236192', '#ffc107', '#007DBA'],
        labels: ['Completados', 'Fallidos', 'En Progreso', 'Pendientes', 'Otros'],
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
        title: {
            text: `Estado del Curso - Total: ${estudiantes.length} estudiantes`,
            align: 'center',
            style: {
                fontSize: '16px',
                fontWeight: 'bold'
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

    const chart = new ApexCharts(document.querySelector("#chartEstadoCurso"), options);
    chart.render();
}

// Gráfica 2: Estudiantes con Resit
function generateResitChart(estudiantes) {
    const withResit = estudiantes.filter(est => 
        est.datos_curso.RESIT === '1' || 
        est.datos_curso.RESIT === 1 || 
        est.datos_curso.RESIT === 'Yes'
    ).length;
    
    const withoutResit = estudiantes.length - withResit;

    const options = {
        series: [withResit, withoutResit],
        chart: {
            type: 'donut',
            height: 350
        },
        colors: ['#A4D65E', '#FF585D'],
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
        title: {
            text: 'Estudiantes con Resit',
            align: 'center',
            style: {
                fontSize: '16px',
                fontWeight: 'bold'
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

    const chart = new ApexCharts(document.querySelector("#chartEstudiantesResit"), options);
    chart.render();
}

// Gráfica 3: Tipos de Resit
function generateResitTypesChart(estudiantes) {
    // Estudiantes con resit inmediato solamente
    const soloInmediato = estudiantes.filter(est => {
        const datos = est.datos_curso;
        const tieneInmediato = datos.RESIT_INMEDIATO === '1' || datos.RESIT_INMEDIATO === 1 || datos.RESIT_INMEDIATO === 'Yes';
        const tieneProgramado = datos.RESIT_PROGRAMADO === '1' || datos.RESIT_PROGRAMADO === 1 || datos.RESIT_PROGRAMADO === 'Yes';
        return tieneInmediato && !tieneProgramado;
    }).length;

    // Estudiantes con resit programado solamente
    const soloProgramado = estudiantes.filter(est => {
        const datos = est.datos_curso;
        const tieneInmediato = datos.RESIT_INMEDIATO === '1' || datos.RESIT_INMEDIATO === 1 || datos.RESIT_INMEDIATO === 'Yes';
        const tieneProgramado = datos.RESIT_PROGRAMADO === '1' || datos.RESIT_PROGRAMADO === 1 || datos.RESIT_PROGRAMADO === 'Yes';
        return !tieneInmediato && tieneProgramado;
    }).length;

    // Estudiantes con ambos tipos de resit
    const ambosResit = estudiantes.filter(est => {
        const datos = est.datos_curso;
        const tieneInmediato = datos.RESIT_INMEDIATO === '1' || datos.RESIT_INMEDIATO === 1 || datos.RESIT_INMEDIATO === 'Yes';
        const tieneProgramado = datos.RESIT_PROGRAMADO === '1' || datos.RESIT_PROGRAMADO === 1 || datos.RESIT_PROGRAMADO === 'Yes';
        return tieneInmediato && tieneProgramado;
    }).length;

    // Estudiantes sin ningún resit específico
    const sinResitEspecifico = estudiantes.length - soloInmediato - soloProgramado - ambosResit;

    const options = {
        series: [soloInmediato, soloProgramado, ambosResit, sinResitEspecifico],
        chart: {
            type: 'pie',
            height: 350
        },
        colors: ['#007DBA', '#FF585D', '#236192', '#A4D65E'],
        labels: ['Solo Inmediato', 'Solo Programado', 'Ambos Resit', 'Sin Resit Específico'],
        legend: {
            position: 'bottom',
            horizontalAlign: 'center'
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
        title: {
            text: 'Distribución de Tipos de Resit',
            align: 'center',
            style: {
                fontSize: '16px',
                fontWeight: 'bold'
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

    const chart = new ApexCharts(document.querySelector("#chartTiposResit"), options);
    chart.render();
}

// Funciones para manejar estados vacíos o errores
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

// Llamar a la función cuando se cargue la página
$(document).ready(function() {
    loadAllStudentCharts();
});

// Función para actualizar las gráficas
function updateStudentCharts() {
    // Destruir gráficas existentes
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
    
    // Recargar datos
    loadAllStudentCharts();
}