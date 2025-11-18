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
                                 {{ __('Welcome') }}, <span class="text-secondary"> {{ __('Instructor') }} !</span>
                                </h1>
                            </div>
                            <p class="mb-4">{{ __('Welcome to your instructor dashboard, create exercises and add students.') }}</p>
                            <!-- <button type="button" class="btn btn-primary">Get Started</button> -->
                        </div>
                        <div class="col-lg-6 banner-img">
                            <div class="img">
                                <img src="../assets/images/principal/plataforma.png" class="img-fluid w-55" alt="img8">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ESTADÍSTICAS DEL INSTRUCTOR -->
    <div class="row">
        <!-- Tarjetas de resumen -->
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
                            <h4 class="mb-1">{{ $totalEstudiantes ?? 0 }}</h4>
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
                        <div class="p-2 rounded bg-soft-success">
                            <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM9.29 16.29L5.7 12.7C5.31 12.31 5.31 11.68 5.7 11.29C6.09 10.9 6.72 10.9 7.11 11.29L10 14.17L16.88 7.29C17.27 6.9 17.9 6.9 18.29 7.29C18.68 7.68 18.68 8.31 18.29 8.7L10.7 16.29C10.32 16.68 9.68 16.68 9.29 16.29Z" fill="currentColor"/>
                            </svg>
                        </div>
                        <div class="ms-3">
                            <h4 class="mb-1">{{ $estudiantesAprobados ?? 0 }}</h4>
                            <small class="mb-0">Estudiantes Aprobados</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                            <h4 class="mb-1">{{ $totalProyectos ?? 0 }}</h4>
                            <small class="mb-0">Proyectos Asignados</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="p-2 rounded bg-soft-info">
                            <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM13 17H11V15H13V17ZM13 13H11V7H13V13Z" fill="currentColor"/>
                            </svg>
                        </div>
                        <div class="ms-3">
                            <h4 class="mb-1">{{ $totalCursos ?? 0 }}</h4>
                            <small class="mb-0">Cursos Impartidos</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- GRÁFICAS PRINCIPALES -->
    <div class="row">
        <!-- Gráfica 1: Cantidad de estudiantes por año -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Estudiantes por Año</h5>
                </div>
                <div class="card-body">
                    <div id="chartEstudiantesAnio" style="height: 300px;"></div>
                </div>
            </div>
        </div>

        <!-- Gráfica 2: Estudiantes por periodo -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Estudiantes por Periodo ({{ date('Y') }})</h5>
                </div>
                <div class="card-body">
                    <div id="chartEstudiantesPeriodo" style="height: 300px;"></div>
                </div>
            </div>
        </div>

        <!-- Gráfica 3: Estudiantes por proyecto -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Estudiantes por Proyecto</h5>
                </div>
                <div class="card-body">
                    <div id="chartEstudiantesProyecto" style="height: 300px;"></div>
                </div>
            </div>
        </div>

        <!-- Gráfica 4: Proyectos asignados -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Proyectos Asignados</h5>
                </div>
                <div class="card-body">
                    <div id="chartProyectosAsignados" style="height: 300px;"></div>
                </div>
            </div>
        </div>

        <!-- Gráfica 5: Rendimiento de estudiantes -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Rendimiento de Estudiantes</h5>
                <small class="text-muted">Entrenados vs Aprobados</small>
                </div>
                <div class="card-body">
                    <div id="chartRendimiento" style="height: 300px;"></div>
                </div>
            </div>
        </div>

        <!-- Gráfica 6: Distribución de notas -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Distribución de Notas</h5>
                    <small class="text-muted">Máxima: {{ $notaMaxima ?? 'N/A' }} - Mínima: {{ $notaMinima ?? 'N/A' }}</small>
                </div>
                <div class="card-body">
                    <div id="chartDistribucionNotas" style="height: 300px;"></div>
                </div>
            </div>
        </div>

        <!-- Gráfica 7: Estudiantes por ente acreditador -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Estudiantes por Ente Acreditador</h5>
                </div>
                <div class="card-body">
                    <div id="chartEnteAcreditador" style="height: 300px;"></div>
                </div>
            </div>
        </div>

        <!-- Gráfica 8: Cursos impartidos por año -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Cursos Impartidos por Año</h5>
                </div>
                <div class="card-body">
                    <div id="chartCursosAnio" style="height: 300px;"></div>
                </div>
            </div>
        </div>
    </div>

 
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const datos = {
        estudiantesAnio: {
            labels: ['2020', '2021', '2022', '2023', '2024'],
            series: [45, 52, 38, 60, 75]
        },
        estudiantesPeriodo: {
            labels: ['Ene-Mar', 'Abr-Jun', 'Jul-Sep', 'Oct-Dic'],
            series: [25, 30, 20, 25]
        },
        estudiantesProyecto: {
            labels: ['Proyecto A', 'Proyecto B', 'Proyecto C', 'Proyecto D'],
            series: [15, 20, 25, 15]
        },
        proyectosAsignados: {
            labels: ['Completados', 'En Progreso', 'Pendientes'],
            series: [8, 5, 3]
        },
        rendimiento: {
            entrenados: 150,
            aprobados: 120
        },
        distribucionNotas: {
            labels: ['0-50', '51-60', '61-70', '71-80', '81-90', '91-100'],
            series: [5, 15, 30, 45, 35, 20]
        },
        enteAcreditador: {
            labels: ['Ente A', 'Ente B', 'Ente C', 'Ente D'],
            series: [40, 35, 20, 15]
        },
        cursosAnio: {
            labels: ['2020', '2021', '2022', '2023', '2024'],
            series: [8, 12, 10, 15, 18]
        }
    };

    var chartEstudiantesAnio = new ApexCharts(document.querySelector("#chartEstudiantesAnio"), {
        series: [{
            name: 'Estudiantes',
            data: datos.estudiantesAnio.series
        }],
        chart: {
            type: 'bar',
            height: 300
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                horizontal: false,
            }
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: datos.estudiantesAnio.labels,
        },
        colors: ['#007DBA']
    });
    chartEstudiantesAnio.render();

    var chartEstudiantesPeriodo = new ApexCharts(document.querySelector("#chartEstudiantesPeriodo"), {
        series: [{
            name: 'Estudiantes',
            data: datos.estudiantesPeriodo.series
        }],
        chart: {
            type: 'area',
            height: 300,
            zoom: {
                enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        xaxis: {
            categories: datos.estudiantesPeriodo.labels,
        },
        colors: ['#A4D65E']
    });
    chartEstudiantesPeriodo.render();

    var chartEstudiantesProyecto = new ApexCharts(document.querySelector("#chartEstudiantesProyecto"), {
        series: datos.estudiantesProyecto.series,
        chart: {
            type: 'pie',
            height: 300
        },
        labels: datos.estudiantesProyecto.labels,
        colors: ['#007DBA', '#A4D65E', '#FF585D', '#FFB800'],
        legend: {
            position: 'bottom'
        }
    });
    chartEstudiantesProyecto.render();

    var chartProyectosAsignados = new ApexCharts(document.querySelector("#chartProyectosAsignados"), {
        series: datos.proyectosAsignados.series,
        chart: {
            type: 'donut',
            height: 300
        },
        labels: datos.proyectosAsignados.labels,
        colors: ['#A4D65E', '#007DBA', '#FFB800'],
        legend: {
            position: 'bottom'
        }
    });
    chartProyectosAsignados.render();

    var chartRendimiento = new ApexCharts(document.querySelector("#chartRendimiento"), {
        series: [{
            name: 'Estudiantes',
            data: [datos.rendimiento.entrenados, datos.rendimiento.aprobados]
        }],
        chart: {
            type: 'bar',
            height: 300
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
            },
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: ['Entrenados', 'Aprobados'],
        },
        colors: ['#007DBA', '#A4D65E']
    });
    chartRendimiento.render();

    var chartDistribucionNotas = new ApexCharts(document.querySelector("#chartDistribucionNotas"), {
        series: [{
            name: 'Estudiantes',
            data: datos.distribucionNotas.series
        }],
        chart: {
            type: 'bar',
            height: 300
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                horizontal: false,
            }
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: datos.distribucionNotas.labels,
        },
        colors: ['#FFB800']
    });
    chartDistribucionNotas.render();

    var chartEnteAcreditador = new ApexCharts(document.querySelector("#chartEnteAcreditador"), {
        series: datos.enteAcreditador.series,
        chart: {
            type: 'polar-area',
            height: 300
        },
        labels: datos.enteAcreditador.labels,
        colors: ['#007DBA', '#A4D65E', '#FF585D', '#FFB800'],
        legend: {
            position: 'bottom'
        }
    });
    chartEnteAcreditador.render();

    var chartCursosAnio = new ApexCharts(document.querySelector("#chartCursosAnio"), {
        series: [{
            name: 'Cursos',
            data: datos.cursosAnio.series
        }],
        chart: {
            type: 'line',
            height: 300,
            zoom: {
                enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        xaxis: {
            categories: datos.cursosAnio.labels,
        },
        colors: ['#FF585D']
    });
    chartCursosAnio.render();
});
</script>
@endsection