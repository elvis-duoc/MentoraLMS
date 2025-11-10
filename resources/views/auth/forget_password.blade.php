<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ __('translate.Forget Password') }}</title>
    <link rel="icon" href="{{ asset($general_setting->favicon) }}">
    <link rel="stylesheet" href="{{ asset('/backend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/font-awesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('global/toastr/toastr.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        /* 1. PALETA DE COLORES MENTORALMS (Morado/Verde) */
        :root {
            --primary-color: #6a00ff;
            /* Morado Oscuro */
            --secondary-color: #7b43ff;
            /* Morado */
            --accent-color: #9258f1;
            /* Morado más claro */
            --success-color: #17ad37;
            /* Verde para el botón de acción */
            --text-color: #333;
            --bg-degrade-start: #7b43ff;
            /* Morado del fondo principal */
            --bg-degrade-end: #00c6ff;
            /* Azul/Celeste del fondo principal */
        }

        /* 2. BASE Y FONDO ANIMADO DE PARTÍCULAS */
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, var(--bg-degrade-start), var(--bg-degrade-end));
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .animated-background {
            position: fixed;
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
            from {
                background-position: 0 0;
            }

            to {
                background-position: 100px 100px;
            }
        }

        /* 3. CONTENEDOR PRINCIPAL Y ESTRUCTURA DE DOS COLUMNAS */
        .main-container {
            position: relative;
            z-index: 1;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            min-height: 100vh;
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
            display: flex;
            width: 100%;
            max-width: 800px;
            height: 500px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        

        /* Columna Izquierda (Informativa - Morada) */
        .left-side {
            width: 40%;
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color)); /* Morado vibrante */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px 30px; /* Ajuste de padding para más aire */
            text-align: center;
            color: white;
        }

        .left-side h1 {
            font-size: 28px; /* Tamaño ligeramente reducido */
            font-weight: 700;
            margin-bottom: 15px;
        }

        .left-side p {
            font-size: 16px;
            line-height: 1.6; /* Aumentado line-height para más espacio */
            opacity: 0.9;
        }

        /* Columna Derecha (Formulario) */
        .right-side {
            width: 60%;
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* 4. LOGO Y TEXTOS */
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
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .welcome-text {
            text-align: center;
            margin-bottom: 30px;
            animation: fadeIn 1s ease-out;
        }

        .welcome-text h2 {
            color: var(--primary-color);
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .welcome-text p {
            color: #666;
            font-size: 14px;
            line-height: 1.4;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* 5. INPUTS */
        .form-input {
            width: 100%;
            padding: 14px;
            border: 2px solid rgba(106, 0, 255, 0.2); 
            border-radius: 12px;
            font-size: 15px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.95);
        }

        .form-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(106, 0, 255, 0.2);
            outline: none;
        }

        /* 6. BOTONES */
        @keyframes softPulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.03); /* Ligeramente más grande */
            }

            100% {
                transform: scale(1);
            }
        }

        .login-btn {
            width: 100%;
            padding: 12px 24px;
            background: linear-gradient(135deg, var(--success-color), #00b09b);
            color: white;
            border: none;
            border-radius: 14px; /* Un poco más redondeado */
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            animation: softPulse 3s infinite; /* Duración de animación ajustada a 3s */
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            position: relative;
            overflow: hidden;
            margin-top: 5px;
            text-decoration: none; /* Asegurar que no haya subrayado */
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
        }

        /* Eliminada la animación ::after del botón para consistencia */
        
        .forgot-password {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            display: block;
            text-align: center;
            margin-top: 25px;
            transition: all 0.3s ease;
        }

        .forgot-password:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }

        /* 7. RESPONSIVE (Vista de Móvil) */
        @media (max-width: 768px) {
            .main-container {
                padding: 15px;
            }
            .login-card {
                flex-direction: column;
                max-width: 90%;
                height: auto;
                border-radius: 15px;
            }

            .left-side {
                display: none;
            }

            .right-side {
                width: 100%;
                padding: 30px 20px;
            }

            .logo img {
                max-width: 120px;
            }

            .welcome-text h2 {
                font-size: 20px;
                margin-bottom: 5px;
            }
            .welcome-text p {
                font-size: 13px;
            }
            .form-input {
                padding: 12px;
                font-size: 14px;
            }
            .login-btn {
                padding: 12px;
                font-size: 15px;
                border-radius: 12px;
            }
            .forgot-password {
                font-size: 13px;
                margin-top: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="animated-background">
        <div class="particles"></div>
    </div>
    <div class="main-container">
        <div class="login-card">

            <div class="left-side">
                <h1>MentoraLMS</h1>
                <p>
                    Recupera tu acceso. 
                </p>
                <p>
                   Te enviaremos un enlace seguro a tu correo electrónico para que puedas
                   reestablecer tu contraseña y continuar con tu viaje educativo.
                </p>

            </div>

            <div class="right-side">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset($general_setting->logo) }}" alt="Logo" class="logo-img">
                    </a>
                </div>
                <div class="welcome-text">
                    <h2>{{ __('translate.Forget Password') }}</h2>
                    <p>Ingresa tu correo electrónico asociado a tu cuenta.</p>
                </div>
                <form method="POST" action="{{ route('student.send-forget-password') }}">
                    @csrf
                    <div class="form-group">
                        <input class="form-input" type="email" name="email"
                            placeholder="{{ __('translate.Email') }}" value="{{ old('email') }}" required>
                    </div>

                    @if ($general_setting->recaptcha_status == 1)
                        <div class="g-recaptcha" data-sitekey="{{ $general_setting->recaptcha_site_key }}"
                            style="margin: 20px 0;"></div>
                    @endif

                    <button class="login-btn" type="submit">
                        <i class="fas fa-paper-plane"></i>
                        {{ __('translate.Send Reset Link') }}
                    </button>
                    <a href="{{ route('student.login') }}" class="forgot-password">
                        <i class="fas fa-arrow-left"></i> Volver al Inicio de Sesión
                    </a>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('global/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('global/toastr/toastr.min.js') }}"></script>
    @if ($general_setting->recaptcha_status == 1)
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endif
    <script>
        // Script de Notificaciones (Mantenido)
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