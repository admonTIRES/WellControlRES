<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aviso de Vencimiento de Certificación - Results In Performance</title>
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
            height: auto;
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
            font-size: 18px;
            color: #2c3e50;
            margin-bottom: 15px;
            font-weight: 600;
        }
        .status-alert {
            background-color: #fff3f3;
            border: 1px solid #ffcccc;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            margin-bottom: 25px;
        }
        .days-remaining {
            font-size: 24px;
            font-weight: 700;
            color: #FF585D;
            display: block;
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
        .partnership-note {
            font-size: 13px;
            color: #7f8c8d;
            font-style: italic;
            text-align: center;
            margin-top: 10px;
        }
        .cta-button {
            display: block;
            background: #FF585D;
            color: white !important;
            text-decoration: none !important;
            padding: 18px 30px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            text-align: center;
            margin: 30px 0;
            box-shadow: 0 4px 15px rgba(255, 88, 93, 0.3);
        }
        .footer {
            background-color: #222121;
            color: #ecf0f1;
            padding: 30px 40px;
            text-align: center;
        }
        .footer a { color: #A4D65E; text-decoration: none; }
        @media (max-width: 600px) {
            .content { padding: 20px; }
            .info-label { width: 50%; }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <div class="logo">
                <img src="https://wclearningexperience.results-in-performance.com/assets/images/Colorlargo.png" alt="Results in Performance">
            </div>
            <h1>Certificación de Control de Pozos</h1>
            <p style="margin-top: 5px; opacity: 0.8;">Aviso de Vencimiento de Certificación</p>
        </div>
        
        <div class="content">
            <div class="greeting">Estimado(a) {{ $nombre }},</div>
            
            <p>Le contactamos de parte de <strong>Results In Performance</strong> para notificarle que su certificación actual de Control de Pozos está próxima a expirar. </p>

            <div class="status-alert">
                <span style="font-size: 14px; color: #666;">Días restantes de vigencia:</span>
                <span class="days-remaining">{{ $diasRestantes }} días</span>
            </div>

            <p>Mantener su certificación vigente es fundamental para garantizar la seguridad operativa y el cumplimiento de los estándares internacionales de la industria. A continuación, los detalles de su acreditación actual:</p>
            
            <table class="info-table">
                <tr>
                    <td class="info-label">Curso:</td>
                    <td class="info-value">{{ $nombreCurso }}</td>
                </tr>
                <tr>
                    <td class="info-label">Nivel:</td>
                    <td class="info-value">{{ $nivelAcreditacion }}</td>
                </tr>
                <tr>
                    <td class="info-label">No. Certificación:</td>
                    <td class="info-value">#{{ $numeroCertificacion }}</td>
                </tr>
                <tr>
                    <td class="info-label">Empresa / Razón Social:</td>
                    <td class="info-value">{{ $empresa }} / {{ $razonSocial }}</td>
                </tr>
                <tr>
                    <td class="info-label">Fecha del Curso:</td>
                    <td class="info-value">{{ $fechaCursoReferencia }}</td>
                </tr>
                <tr>
                    <td class="info-label">Fecha de Vencimiento:</td>
                    <td class="info-value" style="color: #e74c3c; font-weight: 700;">{{ $fechaVencimiento }}</td>
                </tr>
            </table>

            <div style="background-color: #f8f9fa; padding: 15px; border-radius: 8px; border-left: 4px solid #A4D65E;">
                <p style="margin: 0; font-size: 14px;">
                    <strong>Results In Performance</strong>, como centro asociado de <strong>Smith Mason & Co</strong>, pone a su disposición nuestra programación de cursos para la renovación de su certificado.
                </p>
            </div>

            <a href="https://results-in-performance.com/" class="cta-button" target="_blank">Ver Calendario de Cursos</a>
            
            <div style="font-size: 14px; color: #6c757d; text-align: center;">
                Si desea información personalizada sobre precios para grupos, consultas técnicas o agendar su lugar en un próximo curso, por favor contáctenos respondiendo a este correo.
            </div>
        </div>
        
        <div class="footer">
            <div style="margin-bottom: 20px;">
                <h3 style="margin-bottom: 10px;">Results In Performance</h3>
                <div style="font-size: 13px; opacity: 0.9;">
                    📧 <a href="mailto:vlicona@results-in-performance.com">vlicona@results-in-performance.com</a><br>
                    📞 +52 (999) 357-8332<br>
                    📍 Villahermosa, Tabasco, México
                </div>
            </div>
            
            <div style="font-size: 11px; color: #95a5a6; border-top: 1px solid #444; padding-top: 20px;">
                © {{ date('Y') }} Results In Performance. Todos los derechos reservados.<br>
                Centro asociado de Smith Mason & Co.<br>
                <p>Este es un recordatorio automático de su historial académico.</p>
            </div>
        </div>
    </div>
</body>
</html>