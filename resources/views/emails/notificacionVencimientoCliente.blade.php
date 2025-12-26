<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aviso de Vencimiento de Certificación de Control de Pozos</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: 'Poppins', Arial, sans-serif;
            line-height: 1.6;
            color: #333333;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background: #2C2A29;
            padding: 30px 40px;
            text-align: center;
            color: white;
        }
        .logo img {
            max-width: 180px;
            margin-bottom: 15px;
        }
        .header h1 {
            font-size: 22px;
            font-weight: 600;
            margin: 0;
            color: #A4D65E;
        }
        .content { padding: 40px; }
        .greeting {
            font-size: 17px;
            font-weight: 600;
            margin-bottom: 15px;
        }
        .status-alert {
            background-color: #fff3f3;
            border: 1px solid #ffcccc;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            margin: 25px 0;
        }
        .days-remaining {
            font-size: 24px;
            font-weight: 700;
            color: #FF585D;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 14px;
        }
        .info-table td {
            padding: 12px;
            border-bottom: 1px solid #edf2f7;
        }
        .info-label {
            font-weight: 600;
            color: #5a6c7d;
            width: 40%;
        }
        .info-value {
            color: #2c3e50;
            font-weight: 500;
        }
        .cta-button {
            display: block;
            background: #FF585D;
            color: white !important;
            text-decoration: none !important;
            padding: 16px 30px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            text-align: center;
            margin: 30px 0;
        }
        .footer {
            background-color: #222121;
            color: #ecf0f1;
            padding: 30px 40px;
            text-align: center;
        }
        .footer a { color: #A4D65E; text-decoration: none; }
    </style>
</head>

<body>
<div class="email-container">

    <div class="header">
        <div class="logo">
            <img src="https://wclearningexperience.results-in-performance.com/assets/images/Colorlargo.png" alt="Results In Performance">
        </div>
        <h1>Aviso de Vencimiento de Certificación de Control de Pozos</h1>
        <p style="opacity: 0.8;">Personal Operativo – Control de Pozos</p>
    </div>

    <div class="content">
        <div class="greeting">
            Estimado(a) {{ $nombreSupervisor }} / {{ $empresa }},
        </div>

        <p>
            Por medio del presente, <strong>Results In Performance</strong> se permite notificarle que la certificación de
            <strong>Control de Pozos</strong> de uno de sus colaboradores se encuentra próxima a vencer.
        </p>

        <div class="status-alert">
            <div style="font-size: 14px;">Días restantes de vigencia</div>
            <div class="days-remaining">{{ $diasRestantes }} días</div>
        </div>

        <p>
            Mantener las certificaciones vigentes es un requisito clave para el cumplimiento normativo,
            la seguridad operativa y la continuidad de las actividades en campo.
            A continuación, se detallan los datos del colaborador:
        </p>

        <table class="info-table">
            <tr>
                <td class="info-label">Nombre del trabajador:</td>
                <td class="info-value">{{ $nombreTrabajador }}</td>
            </tr>
            <tr>
                <td class="info-label">Puesto / Área:</td>
                <td class="info-value">{{ $puestoTrabajador }}</td>
            </tr>
            <tr>
                <td class="info-label">Curso:</td>
                <td class="info-value">{{ $nombreCurso }}</td>
            </tr>
            <tr>
                <td class="info-label">Nivel:</td>
                <td class="info-value">{{ $nivelAcreditacion }}</td>
            </tr>
            <tr>
                <td class="info-label">No. de Certificación:</td>
                <td class="info-value">#{{ $numeroCertificacion }}</td>
            </tr>
            <tr>
                <td class="info-label">Fecha de vencimiento:</td>
                <td class="info-value" style="color:#e74c3c;font-weight:700;">
                    {{ $fechaVencimiento }}
                </td>
            </tr>
        </table>

        <div style="background:#f8f9fa;padding:15px;border-radius:8px;border-left:4px solid #A4D65E;">
            <p style="margin:0;font-size:14px;">
                <strong>Results In Performance</strong>, como centro asociado de
                <strong>Smith Mason & Co</strong>, pone a disposición de su empresa
                nuestra programación de cursos para la renovación o recertificación del personal.
            </p>
        </div>

        <a href="https://results-in-performance.com/" class="cta-button" target="_blank">
            Consultar calendario de cursos
        </a>

        <p style="font-size:14px;color:#6c757d;text-align:center;">
            Para cotizaciones empresariales, fechas especiales o grupos cerrados,
            quedamos atentos a su confirmación respondiendo a este correo.
        </p>
    </div>

    <div class="footer">
        <h3>Results In Performance</h3>
        <p style="font-size:13px;">
            📧 <a href="mailto:vlicona@results-in-performance.com">vlicona@results-in-performance.com</a><br>
            📞 +52 (999) 357-8332<br>
            📍 Villahermosa, Tabasco, México
        </p>

        <p style="font-size:11px;color:#95a5a6;border-top:1px solid #444;padding-top:15px;">
            © {{ date('Y') }} Results In Performance · Centro asociado Smith Mason & Co.<br>
            Este mensaje forma parte de un aviso preventivo de vencimiento de certificación.
        </p>
    </div>

</div>
</body>
</html>
