<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{ __('Login Admin') }}</title>
        <link rel="icon" href="{{ asset($general_setting->favicon) }}">
        <link rel="stylesheet" href="{{ asset('/backend/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/css/font-awesome-all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('global/toastr/toastr.min.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
            :root {
                --primary-color: #2c7be5;
                --secondary-color: #1c5fa7;
                --accent-color: #17c671;
                --hover-color: #1a5fb0;
                --background-start: rgba(114, 43, 180, 0.801);
                --background-end: rgba(160, 56, 173, 0.1);
                --text-primary: #1f2a3b;
                --text-secondary: #5c6c7c;
                --card-background: rgba(114, 43, 180, 0.801);
            }

            body {
                font-family: 'Nunito', sans-serif;
                margin: 0;
                padding: 0;
                min-height: 100vh;
                background: linear-gradient(135deg, var(--background-start) 0%, var(--background-end) 100%);
                position: relative;
                overflow: hidden;
            }

            .animated-background {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 0;
            }

            .ai-element {
                position: absolute;
                pointer-events: none;
                opacity: 0.1;
                animation: float 20s infinite linear;
            }

            @keyframes float {
                0% {
                    transform: translateY(0) rotate(0deg);
                    opacity: 0;
                }
                10% {
                    opacity: 0.2;
                }
                90% {
                    opacity: 0.2;
                }
                100% {
                    transform: translateY(-1000px) rotate(360deg);
                    opacity: 0;
                }
            }

            .main-container {
                position: relative;
                z-index: 1;
                min-height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 20px;
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
            }

            .login-card {
                background: var(--card-background);
                backdrop-filter: blur(20px);
                border-radius: 24px;
                padding: 40px;
                width: 100%;
                max-width: 400px;
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
                animation: cardAppear 1s ease-out;
                border: 1px solid rgba(0, 4, 10, 0.938);
            }

            .logo {
                text-align: center;
                margin-bottom: 30px;
                display: flex;
                justify-content: center;
                align-items: center;
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

            .welcome-text {
                text-align: center;
                margin-bottom: 30px;
                animation: fadeIn 1s ease-out;
            }

            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(-20px); }
                to { opacity: 1; transform: translateY(0); }
            }

            .welcome-text h2 {
                color: var(--primary-color);
                font-size: 28px;
                font-weight: 700;
                margin-bottom: 10px;
            }

            .welcome-text p {
                color: var(--text-primary);
                font-size: 16px;
                line-height: 1.5;
            }

            .form-input {
                width: 100%;
                padding: 15px;
                padding-right: 40px;
                border: 2px solid rgba(44, 123, 229, 0.2);
                border-radius: 12px;
                font-size: 16px;
                transition: all 0.3s ease;
                background: rgba(255, 255, 255, 0.9);
                color: var(--text-primary);
                margin-bottom: 15px;
            }

            .form-input:focus {
                border-color: var(--primary-color);
                box-shadow: 0 0 0 3px rgba(44, 123, 229, 0.2);
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
                color: var(--text-secondary);
                transition: all 0.3s ease;
                z-index: 2;
            }

            .toggle-password:hover {
                color: var(--primary-color);
                transform: translateY(-50%) scale(1.1);
            }

            .login-btn {
                width: 100%;
                padding: 15px;
                background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
                color: white;
                border: none;
                border-radius: 12px;
                font-size: 16px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                position: relative;
                overflow: hidden;
            }

            .login-btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(44, 123, 229, 0.3);
            }

            .login-btn::after {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                width: 0;
                height: 0;
                background: rgba(255, 255, 255, 0.2);
                border-radius: 50%;
                transition: width 0.6s ease, height 0.6s ease;
                transform: translate(-50%, -50%);
            }

            .login-btn:hover::after {
                width: 300px;
                height: 300px;
            }

            .forgot-password {
                color: var(--text-secondary);
                text-decoration: none;
                font-size: 14px;
                display: block;
                text-align: center;
                margin-top: 20px;
                transition: all 0.3s ease;
            }

            .forgot-password:hover {
                color: var(--primary-color);
                transform: translateY(-1px);
            }

            /* Elementos AI animados */
            .ai-shape {
                position: absolute;
                opacity: 0.1;
                pointer-events: none;
            }

            .ai-shape:nth-child(3n) {
                animation: floatUpLeft 15s infinite;
            }

            .ai-shape:nth-child(3n+1) {
                animation: floatUpRight 20s infinite;
            }

            .ai-shape:nth-child(3n+2) {
                animation: floatUp 18s infinite;
            }

            @keyframes floatUpLeft {
                0% { transform: translate(0, 100vh) rotate(0deg); opacity: 0; }
                20% { opacity: 0.2; }
                80% { opacity: 0.2; }
                100% { transform: translate(-200px, -100vh) rotate(-360deg); opacity: 0; }
            }

            @keyframes floatUpRight {
                0% { transform: translate(0, 100vh) rotate(0deg); opacity: 0; }
                20% { opacity: 0.2; }
                80% { opacity: 0.2; }
                100% { transform: translate(200px, -100vh) rotate(360deg); opacity: 0; }
            }

            @keyframes floatUp {
                0% { transform: translateY(100vh); opacity: 0; }
                20% { opacity: 0.2; }
                80% { opacity: 0.2; }
                100% { transform: translateY(-100vh); opacity: 0; }
            }

            @media (max-width: 768px) {
                .login-card {
                    padding: 25px;
                    margin: 15px;
                }
            }
        </style>
    </head>
    <body>
        <div class="animated-background" id="animatedBackground"></div>
        <div class="main-container">
            <div class="login-card">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset($general_setting->logo) }}" alt="Logo" class="logo-img">
                    </a>
                </div>

                @if ($has_super_admin)
                    <div class="welcome-text">
                        <h2>Panel de Control</h2>
                        <p>Gestiona tu plataforma educativa de manera eficiente y segura.</p>
                    </div>
                    <form action="{{ route('admin.store-login') }}" method="post" id="loginForm">
                        @csrf
                        <div class="form-group">
                            <input class="form-input" type="email" name="email" placeholder="Correo electrónico administrativo" required>
                        </div>
                        <div class="password-container">
                            <input class="form-input" type="password" name="password" id="password-field" placeholder="Contraseña" required>
                            <i class="fas fa-eye-slash toggle-password" id="togglePassword"></i>
                        </div>
                        <button class="login-btn" type="submit">
                            <i class="fas fa-shield-alt"></i>
                            <span>Acceder al Sistema</span>
                            <div class="loading-indicator"></div>
                        </button>
                    </form>
                @else
                    <div class="form-heading">
                        <h3>Configuración Inicial</h3>
                        <p>Establece las credenciales del administrador principal</p>
                    </div>
                    <form action="{{ route('admin.store-register') }}" method="post" id="registerForm">
                        @csrf
                        <input class="form-input" type="text" name="name" placeholder="Nombre del administrador" required>
                        <input class="form-input" type="email" name="email" placeholder="Correo electrónico" required>
                        <div class="password-container">
                            <input class="form-input" type="password" name="password" id="password-field" placeholder="Contraseña" required>
                            <i class="fas fa-eye-slash toggle-password" id="togglePassword"></i>
                        </div>
                        <div class="password-container">
                            <input class="form-input" type="password" name="password_confirmation" id="confirm-password-field" placeholder="Confirmar contraseña" required>
                            <i class="fas fa-eye-slash toggle-password" id="toggleConfirmPassword"></i>
                        </div>
                        <button class="login-btn" type="submit">
                            <i class="fas fa-user-shield"></i>
                            <span>Crear Cuenta Administrativa</span>
                            <div class="loading-indicator"></div>
                        </button>
                    </form>
                @endif
            </div>
        </div>

        <script src="{{ asset('global/js/jquery-3.7.1.min.js') }}"></script>
        <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('global/toastr/toastr.min.js') }}"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script>
            // Crear partículas animadas
            function createAIElements() {
                const shapes = [
                    '📚', '🎓', '✏️', '📝', '💡', '🔍', '📱', '💻', '🎯', '🚀'
                ];

                const background = document.getElementById('animatedBackground');

                for (let i = 0; i < 30; i++) {
                    const shape = document.createElement('div');
                    shape.className = 'ai-shape';
                    shape.textContent = shapes[Math.floor(Math.random() * shapes.length)];
                    shape.style.left = `${Math.random() * 100}vw`;
                    shape.style.fontSize = `${Math.random() * 30 + 20}px`;
                    shape.style.animationDelay = `${Math.random() * 5}s`;
                    background.appendChild(shape);
                }
            }

            // Iniciar animaciones
            createAIElements();
            setInterval(createAIElements, 10000);

            // Manejar visibilidad de contraseña
            document.querySelectorAll('.toggle-password').forEach(toggle => {
                toggle.addEventListener('click', function() {
                    const passwordField = this.previousElementSibling;
                    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordField.setAttribute('type', type);
                    this.classList.toggle('fa-eye');
                    this.classList.toggle('fa-eye-slash');
                });
            });

            // Manejar envío de formulario
            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    const button = this.querySelector('.login-btn');
                    button.classList.add('btn-loading');
                });
            });

            // Notificaciones
            (function($) {
                "use strict"
                $(document).ready(function () {
                    const session_notify_message = @json(Session::get('message'));
                    if(session_notify_message != null){
                        const session_notify_type = @json(Session::get('alert-type', 'info'));
                        switch (session_notify_type) {
                            case 'info': toastr.info(session_notify_message); break;
                            case 'success': toastr.success(session_notify_message); break;
                            case 'warning': toastr.warning(session_notify_message); break;
                            case 'error': toastr.error(session_notify_message); break;
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
