<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body { 
            font-family: 'Arial', 'Helvetica', sans-serif; 
            font-size: 7px; 
            color: #333;
            padding: 10px;
        }
        
        .header-section { 
            width: 100%; 
            border-bottom: 3px solid #000; 
            margin-bottom: 10px;
            padding-bottom: 8px;
        }
        
        .header-row {
            display: table;
            width: 100%;
        }
        
        .header-col {
            display: table-cell;
            vertical-align: middle;
        }
        
        .header-col.left {
            width: 60%;
            text-align: left;
        }
        
        .header-col.right {
            width: 40%;
            text-align: right;
        }
        
        .company-title { 
            font-size: 12px; 
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 5px;
        }
        
        .header-info {
            font-size: 8px;
            line-height: 1.4;
        }
        
        .header-info strong {
            font-weight: bold;
        }
        
        .table-main { 
            width: 100%; 
            border-collapse: collapse;
            margin-top: 5px;
        }
        
        .table-main th, 
        .table-main td { 
            border: 1px solid #333; 
            padding: 3px 2px;
            text-align: center;
            vertical-align: middle;
            font-size: 6.5px;
            line-height: 1.2;
        }
        
        .table-main th { 
            background-color: #4a4a4a; 
            color: white;
            font-weight: bold;
            font-size: 7px;
        }
        
        .table-main td.left-align {
            text-align: left;
            padding-left: 4px;
        }
        
        /* Badges y estados */
        .badge {
            display: inline-block;
            padding: 2px 5px;
            border-radius: 3px;
            font-size: 6px;
            font-weight: bold;
            white-space: nowrap;
        }
        
        .badge-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .badge-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .badge-warning {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }
        
        .badge-info {
            background-color: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }
        
        .badge-secondary {
            background-color: #e2e3e5;
            color: #383d41;
            border: 1px solid #d6d8db;
        }
        
        .badge-primary {
            background-color: #cce5ff;
            color: #004085;
            border: 1px solid #b8daff;
        }
        
        /* Filas coloreadas */
        .row-pass {
            background-color: rgba(198, 239, 206, 0.3);
        }
        
        .row-fail {
            background-color: rgba(255, 199, 206, 0.3);
        }
        
        .row-desertor {
            background-color: rgba(137, 137, 137, 0.2);
        }
        
        .row-pendiente {
            background-color: rgba(255, 224, 140, 0.2);
        }
        
        /* Score display */
        .score-display {
            font-weight: bold;
            font-size: 7px;
        }
        
        .score-pass {
            color: #28a745;
        }
        
        .score-fail {
            color: #dc3545;
        }
        
        .small-text {
            font-size: 6px;
            color: #666;
            display: block;
            margin-top: 2px;
        }
        
        .resit-item {
            margin-bottom: 2px;
            font-size: 6px;
        }
        
        .footer-info {
            margin-top: 10px;
            font-size: 7px;
            text-align: right;
            color: #666;
        }
        
        .na-text {
            color: #999;
            font-style: italic;
        }
        
        /* Estilos para enlaces de certificado */
        .cert-link {
            color: #007bff;
            text-decoration: underline;
            font-weight: bold;
            font-size: 6.5px;
        }
        
        .cert-container {
            display: block;
        }
        
        .qr-code {
            width: 40px;
            height: 40px;
            margin: 2px auto;
        }
    </style>
</head>
<body>
    <!-- HEADER -->
    <div class="header-section">
        <div class="header-row">
            <div class="header-col left">
                <div class="company-title">SMITH MASON & CO / {{ $proyecto->ENTE_NOMBRE }}</div>
                <div class="header-info">
                    <strong>CURSO:</strong> {{ $proyecto->CURSO_NOMBRE ?? 'N/A' }}<br>
                    <strong>FOLIO:</strong> {{ $proyecto->FOLIO_PROJECT ?? 'N/A' }}<br>
                    <strong>TIPO OPERACIÓN:</strong> {{ $proyecto->TIPO_OPERACION ?? 'N/A' }}
                </div>
            </div>
            <div class="header-col right">
                <div class="header-info">
                    <strong>CENTRO:</strong> {{ $proyecto->CENTRO_NOMBRE ?? 'N/A' }}<br>
                    <strong>FECHA EXAMEN:</strong> {{ $proyecto->EXAM_DATE_PROJECT ? \Carbon\Carbon::parse($proyecto->EXAM_DATE_PROJECT)->format('d/m/Y') : 'N/A' }}<br>
                    <strong>UBICACIÓN:</strong> {{ $proyecto->LOCATION_PROJECT ?? 'N/A' }}
                </div>
            </div>
        </div>
    </div>

    <!-- TABLA PRINCIPAL -->
    <table class="table-main">
        <thead>
            <tr>
                <th style="width: 3%;">#</th>
                <th style="width: 11%;">ESTUDIANTE</th>
                <th style="width: 7%;">PROYECTO</th>
                <th style="width: 9%;">RAZÓN SOCIAL</th>
                <th style="width: 5%;">ENTE</th>
                <th style="width: 7%;">NIVEL</th>
                <th style="width: 6%;">BOP</th>
                <th style="width: 6%;">ASISTENCIA</th>
                <th style="width: 5%;">PRÁCTICO</th>
                <th style="width: 5%;">EQUIPOS</th>
                <th style="width: 5%;">P&P</th>
                <th style="width: 6%;">ESTADO</th>
                <th style="width: 7%;">RESIT INMEDIATO</th>
                <th style="width: 9%;">RESIT/RETEST</th>
                <th style="width: 6%;">FINAL</th>
                <th style="width: 7%;">CERTIFICADO</th>
                <th style="width: 7%;">VIGENCIA</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estudiantes as $index => $e)
            @php
                $rowClass = '';
                if ($e['estado_final'] == 'Completed') $rowClass = 'row-pass';
                elseif ($e['estado_final'] == 'Failed') $rowClass = 'row-fail';
                elseif ($e['estado_final'] == 'Desertó' || $e['estado_final'] == 'No Asistió') $rowClass = 'row-desertor';
                else $rowClass = 'row-pendiente';
                
                // Construir URL del certificado
                $certUrl = '';
                if (!empty($e['cert_path'])) {
                    $baseUrl = request()->getSchemeAndHttpHost();
                    $certUrl = $baseUrl . '/archivos/proyectos/' . $proyecto->ID_PROJECT . '/candidatos/' . $e['candidate_id'] . '/' . $e['cert_filename'];
                }
            @endphp
            <tr class="{{ $rowClass }}">
                <!-- # -->
                <td><strong>{{ $index + 1 }}</strong></td>
                
                <!-- ESTUDIANTE -->
                <td class="left-align">
                    <strong>{{ $e['nombre'] }}</strong>
                    <span class="small-text">{{ $e['email'] }}</span>
                </td>
                
                <!-- PROYECTO -->
                <td class="left-align">
                    <strong>{{ $proyecto->FOLIO_PROJECT }}</strong>
                </td>
                
                <!-- RAZÓN SOCIAL -->
                <td class="left-align">
                    <strong>{{ $e['empresa'] }}</strong>
                    <span class="small-text">{{ $e['razon_social'] }}</span>
                </td>
                
                <!-- ENTE -->
                <td>
                    <span class="badge badge-primary">{{ $proyecto->ENTE_NOMBRE }}</span>
                </td>
                
                <!-- NIVEL -->
                <td>{{ $e['nivel'] }}</td>
                
                <!-- BOP -->
                <td>{{ $e['bop'] }}</td>
                
                <!-- ASISTENCIA -->
                <td>
                    @if($e['asistencia'] == 'Asistió')
                        <span class="badge badge-success">Asistió</span>
                    @elseif($e['asistencia'] == 'Desertó')
                        <span class="badge badge-warning">Desertó</span>
                    @else
                        <span class="badge badge-danger">No Asistió</span>
                    @endif
                    <span class="small-text">{{ $e['asistencia_detalle'] }}</span>
                </td>
                
                <!-- PRÁCTICO -->
                <td>
                    <span class="score-display {{ $e['scores']['practical_status'] == 'Pass' ? 'score-pass' : 'score-fail' }}">
                        {{ $e['scores']['practical'] }}%
                    </span>
                    <span class="badge {{ $e['scores']['practical_status'] == 'Pass' ? 'badge-success' : 'badge-danger' }}">
                        {{ $e['scores']['practical_status'] == 'Pass' ? 'Aprobado' : 'No Aprobado' }}
                    </span>
                </td>
                
                <!-- EQUIPOS -->
                <td>
                    <span class="score-display {{ $e['scores']['equipament_status'] == 'Pass' ? 'score-pass' : 'score-fail' }}">
                        {{ $e['scores']['equipament'] }}%
                    </span>
                    <span class="badge {{ $e['scores']['equipament_status'] == 'Pass' ? 'badge-success' : 'badge-danger' }}">
                        {{ $e['scores']['equipament_status'] == 'Pass' ? 'Aprobado' : 'No Aprobado' }}
                    </span>
                </td>
                
                <!-- P&P -->
                <td>
                    @if($proyecto->ACCREDITING_ENTITY_PROJECT == 2)
                        <span class="score-display {{ $e['scores']['pyp_status'] == 'Pass' ? 'score-pass' : 'score-fail' }}">
                            {{ $e['scores']['pyp'] }}%
                        </span>
                        <span class="badge {{ $e['scores']['pyp_status'] == 'Pass' ? 'badge-success' : 'badge-danger' }}">
                            {{ $e['scores']['pyp_status'] == 'Pass' ? 'Aprobado' : 'No Aprobado' }}
                        </span>
                    @else
                        <span class="na-text">N/A</span>
                    @endif
                </td>
                
                <!-- ESTADO CURSO -->
                <td>
                    @if($e['estado_curso'] == 'Completed')
                        <span class="badge badge-success">Aprobado</span>
                    @elseif($e['estado_curso'] == 'Failed')
                        <span class="badge badge-danger">Reprobado</span>
                    @elseif($e['estado_curso'] == 'Desertó')
                        <span class="badge badge-warning">Desertó</span>
                    @else
                        <span class="badge badge-secondary">{{ $e['estado_curso'] }}</span>
                    @endif
                </td>
                
                <!-- RESIT INMEDIATO -->
                <td>
                    @if($e['resit_inmediato']['activo'])
                        @if($e['resit_inmediato']['date'])
                            <span class="small-text">{{ $e['resit_inmediato']['date'] }}</span>
                        @endif
                        <span class="score-display {{ $e['resit_inmediato']['status'] == 'Pass' ? 'score-pass' : 'score-fail' }}">
                            {{ $e['resit_inmediato']['score'] }}%
                        </span>
                        <span class="badge {{ $e['resit_inmediato']['status'] == 'Pass' ? 'badge-success' : 'badge-danger' }}">
                            {{ $e['resit_inmediato']['status'] == 'Pass' ? 'Aprobado' : 'Reprobado' }}
                        </span>
                    @else
                        <span class="na-text">N/A</span>
                    @endif
                </td>
                
                <!-- RESIT PROGRAMADO -->
                <td>
                    @if(!empty($e['resits_programados']))
                        @foreach($e['resits_programados'] as $resit)
                            <div class="resit-item">
                                <span class="badge {{ $resit['status'] == 'Aprobado' ? 'badge-success' : 'badge-danger' }}">
                                    {{ $resit['score'] }}% - {{ $resit['status'] }}
                                </span>
                                @if($resit['date'])
                                    <span class="small-text">{{ $resit['date'] }}</span>
                                @endif
                            </div>
                        @endforeach
                    @else
                        <span class="na-text">N/A</span>
                    @endif
                </td>
                
                <!-- ESTADO FINAL -->
                <td>
                    @if($e['estado_final'] == 'Completed')
                        <span class="badge badge-success">Aprobado</span>
                    @elseif($e['estado_final'] == 'Failed')
                        <span class="badge badge-danger">Reprobado</span>
                    @elseif($e['estado_final'] == 'Desertó')
                        <span class="badge badge-warning">Desertó</span>
                    @else
                        <span class="badge badge-secondary">{{ $e['estado_final'] }}</span>
                    @endif
                </td>
                
                <!-- CERTIFICADO CON ENLACE -->
                <td>
                    <div class="cert-container">
                        <strong>{{ $e['certificado'] }}</strong>
                        @if(!empty($e['cert_short_url']))
                            <br>
                            <a href="{{ $e['cert_short_url'] }}" 
                            class="cert-link" 
                            target="_blank" 
                            rel="noopener noreferrer">
                                 Ver Certificado
                            </a>
                            <a href="{{ $e['cert_short_url'] }}/download">
                                Descargar Certificado
                            </a>
                        @endif
                    </div>
                </td>
                <!-- VIGENCIA -->
                <td>
                    <strong>{{ $e['expiracion'] }}</strong>
                    @if($e['vigencia'] != 'N/A')
                        <span class="small-text">{{ $e['vigencia'] }}</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- FOOTER -->
    <div class="footer-info">
        <strong>Fecha de generación:</strong> {{ $fecha_generacion }}<br>
        <strong>Total de estudiantes:</strong> {{ count($estudiantes) }}
    </div>
</body>
</html>