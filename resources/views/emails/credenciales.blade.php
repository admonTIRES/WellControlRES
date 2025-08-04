<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credenciales de Acceso - Results In Performance</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333333;
            background-color: #f5f7fa;
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
            background: linear-gradient(130deg, #2C2A29 20%, #2C2A29 80%);
            padding: 30px 40px;
            text-align: center;
            color: white;
        }
        
        .logo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            font-weight: 700;
        }
        
        .logo img {
            max-width: 80px;
            max-height: 80px;
            object-fit: contain;
        }
        
        .header h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 8px;
        }
        
        .header p {
            font-size: 16px;
            opacity: 0.9;
            font-weight: 300;
        }
        
        .content {
            padding: 40px;
        }
        
        .greeting {
            font-size: 18px;
            color: #2c3e50;
            margin-bottom: 25px;
            font-weight: 500;
        }
        
        .subtitle {
            font-size: 16px;
            color: #5a6c7d;
            margin-bottom: 30px;
            line-height: 1.6;
            text-align: justify;
        }
        
        .app-description {
            background: linear-gradient(135deg, #e8f4fd 0%, #f0f8ff 100%); 
            border-left: 4px solid #2196F3; 
            border-radius: 8px; 
            padding: 20px; 
            margin: 25px 0;
        }
        
        .app-description h3 {
            color: #1976D2; 
            font-size: 16px; 
            font-weight: 600; 
            margin-bottom: 12px; 
            display: flex; 
            align-items: center;
        }
        
        .app-description p {
            color: #424242; 
            font-size: 14px; 
            line-height: 1.6; 
            margin: 0;
        }
        
        .credentials-box {
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            border-left: 5px solid #A4D65E;
            border-radius: 8px;
            padding: 25px;
            margin: 30px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        
        .credentials-title {
            font-size: 18px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        
        .credentials-title::before {
            content: "🔐";
            margin-right: 10px;
            font-size: 20px;
        }
        
        .credential-item {
            background-color: #ffffff;
            border-radius: 6px;
            padding: 15px;
            margin-bottom: 12px;
            border: 1px solid #e0e6ed;
            display: flex;
            align-items: center;
        }
        
        .credential-item:last-child {
            margin-bottom: 0;
        }
        
        .credential-label {
            font-weight: 600;
            color: #495057;
            min-width: 100px;
            font-size: 14px;
        }
        
        .credential-value {
            padding: 8px 12px;
            border-radius: 4px;
            border: 1px solid #dee2e6;
            font-size: 14px;
            flex: 1;
            margin-left: 15px;
            color: #000000 !important;
            text-decoration: none !important;
        }
        
        .credential-value a {
            color: #000000 !important;
            text-decoration: none !important;
        }
        
        .important-note {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
            position: relative;
        }
        
        .important-note::before {
            content: "⚠️";
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 18px;
        }
        
        .important-note-content {
            margin-left: 35px;
        }
        
        .important-note h3 {
            font-size: 16px;
            font-weight: 600;
            color: #856404;
            margin-bottom: 8px;
        }
        
        .important-note p {
            font-size: 14px;
            color: #856404;
            line-height: 1.5;
        }
        
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #FF585D 0%, #FF585D 100%);
            color: white !important;
            text-decoration: none !important;
            padding: 15px 30px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            text-align: center;
            margin: 25px 0;
            box-shadow: 0 4px 15px rgba(255, 88, 93, 0.3);
            transition: all 0.3s ease;
        }
        
        .cta-button:hover {
            color: white !important;
            text-decoration: none !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 88, 93, 0.4);
        }
        
        .cta-button:visited,
        .cta-button:active {
            color: white !important;
            text-decoration: none !important;
        }
        
        .footer {
            background-color: #222121ff;
            color: #ecf0f1;
            padding: 30px 40px;
            text-align: center;
        }
        
        .footer-content {
            margin-bottom: 20px;
        }
        
        .footer h3 {
            color:#fff;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        .contact-info {
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        
        .contact-info a {
            color: #ffffff;
            text-decoration: none;
        }
        
        .social-links {
            margin: 20px 0;
        }
        
        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: #A4D65E;
            text-decoration: none;
            font-size: 14px;
        }
        
        .footer-note {
            font-size: 12px;
            color: #95a5a6;
            border-top: 1px solid #34495e;
            padding-top: 20px;
            margin-top: 20px;
        }
        
        .support-section {
            margin-top: 30px; 
            font-size: 14px; 
            color: #6c757d; 
            line-height: 1.6;
        }
        
        .tip-box {
            background-color: #f8f9fa; 
            border-radius: 6px; 
            padding: 15px; 
            margin-top: 20px; 
            border-left: 3px solid #28a745;
        }
        
        .tip-box p {
            margin: 0; 
            font-size: 13px; 
            color: #495057;
        }
        
        @media (max-width: 600px) {
            .email-container {
                margin: 10px;
                border-radius: 8px;
            }
            
            .header, .content, .footer {
                padding: 25px 20px;
            }
            
            .credentials-box {
                padding: 20px 15px;
            }
            
            .credential-item {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .credential-value {
                margin-left: 0;
                margin-top: 8px;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header con Logo -->
        <div class="header">
            <div class="logo">
                <img src="https://wclearningexperience.results-in-performance.com/assets/images/Colorlargo.png" alt="Results in Performance">
            </div>
            <h1>Results In Performance</h1>
            <p>Bienvenido a WellControl</p>
        </div>
        
        <!-- Contenido Principal -->
        <div class="content">
            <div class="greeting">
                ¡Buen día, Sr(a). {{ $nombre }}! 👋
            </div>
            
            <p class="subtitle">
                Nos complace darle la bienvenida a nuestro sistema de aprendizaje de control de pozos <strong>Well Control Learning Experience</strong>. Esta plataforma interactiva le permitirá desarrollar habilidades críticas en control de pozos a través de simulaciones realistas, casos de estudio y evaluaciones prácticas.<br><br>
                
                Hemos creado su cuenta exitosamente y estas son sus credenciales de acceso para comenzar su experiencia de aprendizaje.
            </p>
            
            <div class="app-description">
                <h3>
                    🎯 Sobre Well Control Learning Experience
                </h3>
                <p>
                    Nuestra plataforma combina teoría y práctica para ofrecer una experiencia de aprendizaje integral en control de pozos. Accederá a:<br>
                    • <strong>Matematicas básica</strong> para reforzar su uso de la calculadora científica y las funciones matemáticas necesarias para este curso. <br>
                    • <strong>Hojas de matar</strong> prácticas para aprender a completarla correctamente.<br>
                    • <strong>Evaluaciones progresivas</strong> para medir su conocimiento y simular el exámen final.<br>
                    • <strong>Recursos técnicos actualizados</strong> y demás herramientas para complementar su curso de control de pozos.
                </p>
            </div>
            
            <!-- Caja de Credenciales -->
            <div class="credentials-box">
                <div class="credentials-title">
                    Sus credenciales de acceso
                </div>
                
                <div class="credential-item">
                    <span class="credential-label">Email:</span>
                    <span class="credential-value">{{ $email }}</span>
                </div>
                
                <div class="credential-item">
                    <span class="credential-label">Contraseña:</span>
                    <span class="credential-value">{{ $password }}</span>
                </div>
            </div>
            
            <!-- Nota Importante -->
            <div class="important-note">
                <div class="important-note-content">
                    <h3>Importante - Política de Acceso</h3>
                    <p>Su licencia incluye acceso simultáneo para <strong>un (1) dispositivo únicamente</strong>. Para garantizar la seguridad de su cuenta y cumplir con los términos de licencia, el sistema cerrará automáticamente cualquier sesión previa al iniciar sesión desde un nuevo dispositivo.</p>
                    <br>
                    <p style="font-size: 13px; color: #856404;">
                        💡 <strong>Recomendación:</strong> Cierre siempre su sesión al terminar de usar la plataforma para evitar interrupciones en su próximo acceso.
                    </p>
                </div>
            </div>
            
            <!-- Botón de Acción -->
            <center>
                <a href="https://wclearningexperience.results-in-performance.com/" class="cta-button" target="_blank">Comenzar ahora</a>
            </center>
            
            <div class="support-section">
                <strong>¿Necesita ayuda?</strong><br>
                Nuestro equipo de soporte técnico especializado en Well Control está disponible para asistirle con cualquier consulta sobre el uso de la plataforma, contenido técnico o problemas de acceso. No dude en contactarnos.
            </div>
            
            <div class="tip-box">
                <p>
                    📚 <strong>Tip de inicio:</strong> Recomendamos comenzar con el módulo "Matemáticas para perforación" y asi familiarizarse con la interfaz y el contenido.
                </p>
            </div>
        </div>
        
        <!-- Pie de Página -->
        <div class="footer">
            <div class="footer-content">
                <h3>Results In Performance</h3>
                <div class="contact-info">
                    <strong>Contacto:</strong><br>
                    📧 <a href="mailto:vlicona@results-in-performance.com">vlicona@results-in-performance.com</a><br>
                    📞 +52 (999) 357-8332<br>
                    🏢 Villahermosa, Tabasco, México
                </div>
                
                <div class="social-links">
                    <a href="https://results-in-performance.com/">Página web</a>
                </div>
            </div>
            
            <div class="footer-note">
                © 2025 Results In Performance. Todos los derechos reservados.<br>
                Este correo fue enviado automáticamente, por favor no responder a esta dirección.<br>
            </div>
        </div>
    </div>
</body>
</html>