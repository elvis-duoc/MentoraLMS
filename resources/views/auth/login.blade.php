<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ __('Iniciar Sesion Estudiante - MentoraLMS') }}</title>
    <link rel="icon" href="{{ asset($general_setting->favicon) }}">
    <link rel="stylesheet" href="{{ asset('/backend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/font-awesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('global/toastr/toastr.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        /* 1. PALETA DE COLORES MENTORALMS (Morado/Verde) */
        :root {
            --primary-color: #6a00ff; /* Morado Oscuro para títulos y acentos (Similar al Admin) */
            --secondary-color: #7b43ff; /* Morado para el fondo de la columna de bienvenida */
            --accent-color: #9258f1; /* Morado más claro */
            --success-color: #17ad37; /* Verde de Login (MentoraLMS) */
            --text-color: #333;
            --bg-degrade-start: #7b43ff; /* Morado del fondo principal */
            --bg-degrade-end: #00c6ff; /* Azul/Celeste del fondo principal */
        }

        /* 2. BASE Y FONDO ANIMADO */
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, var(--bg-degrade-start), var(--bg-degrade-end));
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
        }

        .animated-background {
            position: fixed; /* Cambiado a fixed para cubrir toda la ventana sin scroll */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--bg-degrade-start), var(--bg-degrade-end));
            z-index: 0;
            overflow: hidden;
        }

        .particles {
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: radial-gradient(rgba(255, 255, 255, 0.3) 1px, transparent 1px);
            background-size: 40px 40px;
            animation: moveParticles 15s linear infinite;
        }

        @keyframes moveParticles {
            from { background-position: 0 0; }
            to { background-position: 100px 100px; }
        }

        /* 3. CONTENEDOR Y TARJETA */
        .main-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 420px; /* Tamaño móvil por defecto */
            padding: 20px;
            animation: cardAppear 0.8s ease-out;
        }

        @keyframes cardAppear {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* 4. LOGO (ANIMACIÓN ORIGINAL MANTENIDA) */
        .logo {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo img {
            max-width: 200px;
            height: auto;
            animation: logoPulse 2s infinite; 
        }

        @keyframes logoPulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        /* 5. TEXTO BIENVENIDA */
        .welcome-text {
            text-align: center;
            margin-bottom: 25px;
            animation: fadeIn 1s ease-out;
        }

        .welcome-text h2 {
            color: var(--primary-color);
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .welcome-text p {
            color: #666;
            font-size: 15px;
            line-height: 1.4;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* 6. INPUTS */
        .form-input {
            width: 100%;
            padding: 14px;

            border: 2px solid rgba(106, 0, 255, 0.2);

            border-radius: 12px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.95);
        }

        .form-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(106, 0, 255, 0.2);
            outline: none;
            transform: translateY(0); /* Eliminamos el -2px para ser más simple */

        }

        .form-group {
            margin-bottom: 15px;

        }

        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #666;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .toggle-password:hover {
            color: var(--primary-color);
            transform: translateY(-50%) scale(1.1);

        }        /* 7. BOTONES (ANIMACIÓN ORIGINAL MANTENIDA) */

        .action-buttons {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        @keyframes softPulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.03); }
            100% { transform: scale(1); }
        }

        .smart-button {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px 24px;
            border-radius: 14px;
            font-weight: 600;
            font-size: 15px;
            color: #fff;
            border: none;
            cursor: pointer;
            animation: softPulse 3s infinite; /* ANIMACIÓN ORIGINAL */
            transition: all 0.3s ease;
            text-decoration: none !important; /* Evitar subrayado en enlaces */
        }
        
        /* Asegurar que el focus no cause subrayado feo */
        .smart-button:focus,
        .smart-button:focus-visible,
        a.smart-button:focus,
        a.smart-button:focus-visible { 
            outline: none !important;
            box-shadow: none !important;
            text-decoration: none !important; 
        }

        .smart-button .button-content {
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none !important;
        }

        /* COLORES DE BOTONES ACTUALIZADOS AL LMS */
        .login-btn {
            /* Verde principal */
            background: linear-gradient(135deg, var(--success-color), #66bb6a); 
        }

        .forgot-btn {
            /* Botón de menor jerarquía: Blanco con borde morado */
            background: #fff;
            color: var(--primary-color) !important;
            border: 2px solid var(--accent-color);
            
        }
        .forgot-btn:hover {
            background: #f8f8f8;
            border-color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
        }

        .register-btn {
            /* Morado de registro */
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
        }

        .smart-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
        }
        

        /* 8. ESTRUCTURA DE DOS COLUMNAS (PC) */
        
        /* Ocultar en móvil */
        .desktop-content-area {
            display: none;
        }

        @media (min-width: 1024px) {
            .main-container {
                max-width: 960px;
                padding: 0;
                display: flex;
                border-radius: 18px;
                overflow: hidden;
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            }

            /* Columna Izquierda (Bienvenida) */
            .desktop-content-area {
                display: flex; /* Mostrar en PC */
                flex: 1; 
                background: linear-gradient(135deg, var(--secondary-color), var(--primary-color)); /* Morado vibrante */
                align-items: center;
                justify-content: center;
                padding: 50px;
                color: #fff;
                text-align: center;
                text-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            }
            .desktop-content-area h1 {
                font-size: 38px;
                font-weight: 800;
                margin-bottom: 10px;
            }
            .desktop-content-area p {
                font-size: 18px;
                margin-top: 0;
                opacity: 0.9;
            }
            
            /* Columna Derecha (Formulario) */
            .login-card {
                flex: 1;
                padding: 60px;
                border-radius: 0;
                box-shadow: none;
                border: none;
                display: flex;
                flex-direction: column;
                justify-content: center;
                min-height: 550px;
            }
            
            /* Ocultar texto de bienvenida duplicado en la columna derecha para PC */
            .login-card .welcome-text {
                display: none;
            }
        }
        
        /* 9. Responsive (Móvil) */
        @media (max-width: 768px) {
            .login-card { padding: 25px; }
            .welcome-text h2 { font-size: 22px; }
            .welcome-text p { font-size: 14px; }
            .smart-button { padding: 10px 20px; font-size: 14px; }
        }
    </style>
</head>

<body>
    <div class="animated-background">
        <div class="particles"></div>
    </div>
    
    <div class="main-container">
        
        <div class="desktop-content-area">
            <div>
                <h1>MentoraLMS</h1>
                <p>La plataforma que transforma tu educación.</p>
                <p>¡Ingresa Ahora!</p>
            </div>
        </div>

        <div class="login-card">
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset($general_setting->logo) }}" alt="Logo MentoraLMS">
                </a>
            </div>
            
            <div class="welcome-text">
                <h2>¡Bienvenido de Vuelta!</h2>
                <p>Tu viaje educativo continúa aquí. Accede a un mundo de conocimiento.</p>
            </div>
            
            <form action="{{ route('student.store-login') }}" method="post">
                @csrf
                <div class="form-group">
                    <input class="form-input" type="email" name="email" placeholder="Correo Electrónico"
                        value="{{ old('email') }}">
                </div>
                <div class="password-container">
                    <input class="form-input" type="password" name="password" id="password-field"
                        placeholder="Contraseña">
                    <i class="fas fa-eye-slash toggle-password" id="togglePassword"></i>
                </div>

                @if ($general_setting->recaptcha_status == 1)
                    <div class="g-recaptcha" data-sitekey="{{ $general_setting->recaptcha_site_key }}"
                        style="margin: 20px 0;"></div>
                @endif

                <div class="action-buttons">
                    <button type="submit" class="smart-button login-btn">
                        <span class="button-content">
                            <i class="fas fa-graduation-cap"></i>
                            <span class="button-text">Comenzar a Aprender</span>
                        </span>
                    </button>

                    <a href="{{ route('student.forget-password') }}" class="smart-button forgot-btn">
                        <span class="button-content">
                            <i class="fas fa-key"></i>
                            <span class="button-text">¿Olvidaste tu Contraseña?</span>
                        </span>
                    </a>

                    <a href="{{ route('register') }}" class="smart-button register-btn">
                        <span class="button-content">
                            <i class="fas fa-user-plus"></i>
                            <span class="button-text">Registrarse</span>
                        </span>
                    </a>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('global/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('global/toastr/toastr.min.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        // Toggle contraseña
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordField = document.getElementById('password-field');
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });

        // Notificaciones
        (function($) {
            "use strict"
            $(document).ready(function() {
                const session_notify_message = @json(Session::get('message'));
                if (session_notify_message != null) {
                    const session_notify_type = @json(Session::get('alert-type', 'info'));
                    switch (session_notify_type) {
                        case 'info':
                            toastr.info(session_notify_message);
                            break;
                        case 'success':
                            toastr.success(session_notify_message);
                            break;
                        case 'warning':
                            toastr.warning(session_notify_message);
                            break;
                        case 'error':
                            toastr.error(session_notify_message);
                            break;
                    }
                }
                const validation_errors = @json($errors->all());
                if (validation_errors.length > 0) {
                    validation_errors.forEach(error => toastr.error(error));
                }
            });
        })(jQuery);
    </script>
</body>

</html>