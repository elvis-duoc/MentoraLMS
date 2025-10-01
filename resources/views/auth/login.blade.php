<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ __('Iniciar Sesion Estudiante') }}</title>
    <link rel="icon" href="{{ asset($general_setting->favicon) }}">
    <link rel="stylesheet" href="{{ asset('/backend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/font-awesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('global/toastr/toastr.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1a73e8;
            --secondary-color: #174ea6;
            --accent-color: #4285f4;
            --text-color: #333;
        }

        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #1a73e8, #174ea6);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        /* Fondo animado con partículas suaves */
        .animated-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #1a73e8, #174ea6);
            z-index: 0;
            overflow: hidden;
        }

        .particles {
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: radial-gradient(rgba(255, 255, 255, 0.2) 1px, transparent 1px);
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

        /* Contenedor principal */
        .main-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Logo con animación pulse */
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

        /* Texto bienvenida */
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
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Inputs */
        .form-input {
            width: 100%;
            padding: 14px;
            border: 2px solid rgba(26, 115, 232, 0.2);
            border-radius: 12px;
            font-size: 15px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.95);
        }

        .form-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(26, 115, 232, 0.2);
            outline: none;
            transform: translateY(-2px);
        }

        .password-container {
            position: relative;
            margin-bottom: 20px;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #666;
            transition: all 0.3s ease;
        }

        .toggle-password:hover {
            color: var(--primary-color);
            transform: translateY(-50%) scale(1.1);
        }

        /* Botones Smart */
        .action-buttons {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        @keyframes softPulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.03);
            }

            100% {
                transform: scale(1);
            }
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
            animation: softPulse 3s infinite;
            transition: all 0.3s ease;
        }

        .smart-button .button-content {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .login-btn {
            background: linear-gradient(135deg, #00b09b, #96c93d);
        }

        .forgot-btn {
            background: linear-gradient(135deg, #ff6b6b, #ff8e8e);
        }

        .register-btn {
            background: linear-gradient(135deg, #4facfe, #00f2fe);
        }

        .smart-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-card {
                padding: 25px;
            }

            .welcome-text h2 {
                font-size: 22px;
            }

            .welcome-text p {
                font-size: 14px;
            }

            .smart-button {
                padding: 10px 20px;
                font-size: 14px;
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
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset($general_setting->logo) }}" alt="Logo MentoraLMS">
                </a>
            </div>
            <div class="welcome-text">
                <h2>¡Bienvenido de vuelta!</h2>
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

                    <a href="{{ route('manual-register') }}" class="smart-button register-btn">
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
