

<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Site Title -->
        <title>Sign In</title>

        <!-- Fav Icon -->
        <link rel="icon" href="https://lms.ideomaker.cl/uploads/website-images/favicon-2025-01-26-05-02-44-5347.png">

        <!--  Stylesheet -->
        <link rel="stylesheet" href="https://lms.ideomaker.cl/backend/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://lms.ideomaker.cl/backend/css/slick.min.css">
        <link rel="stylesheet" href="https://lms.ideomaker.cl/backend/css/font-awesome-all.min.css">
        <!-- FontAwesome CDN Backup -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="https://lms.ideomaker.cl/backend/css/nice-select.min.css">
        <link rel="stylesheet" href="https://lms.ideomaker.cl/backend/css/reset.css">
        <link rel="stylesheet" href="https://lms.ideomaker.cl/backend/css/style.css">
        <link rel="stylesheet" href="https://lms.ideomaker.cl/backend/css/dev.css">
        <link rel="stylesheet" href="https://lms.ideomaker.cl/global/toastr/toastr.min.css">
        
        <style>
            .crancy-wc__forgot-password {
                color: #6c757d;
                text-decoration: none;
                font-size: 14px;
                transition: color 0.3s ease;
            }
            .crancy-wc__forgot-password:hover {
                color: #007bff;
                text-decoration: underline;
            }
            .crancy-wc__toggle {
                position: absolute;
                right: 15px;
                top: 0;
                color: #a0aec0;
                cursor: pointer;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                width: 25px;
                z-index: 10;
                user-select: none;
            }

            .crancy-wc__toggle:hover {
                color: #007bff;
            }

            .crancy-wc__toggle i {
                pointer-events: none;
                cursor: pointer;
            }

            /* Asegurar que FontAwesome funcione */
            .crancy-wc__toggle i {
                font-family: "Font Awesome 6 Free", "Font Awesome 5 Free", "FontAwesome", sans-serif !important;
                font-weight: 900 !important;
                font-style: normal !important;
                font-variant: normal !important;
                text-transform: none !important;
                line-height: 1 !important;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
                speak: none;
            }

        </style>

    </head>
    <body id="crancy-dark-light">

        <div class="body-bg">

            <section class="crancy-wc crancy-wc__full crancy-bg-cover">
                <div class="crancy-wc__form">
                    <!-- Welcome Banner -->
                    <div class="crancy-wc__form--middle">
                        <div class="crancy-wc__banner crancy-bg-cover">
                            <div class="crancy-wc__banner--img w-100 h-100">
                                <img src="https://lms.ideomaker.cl/uploads/website-images/login-bg-image-2025-02-12-05-21-55-1191.png" alt="#" class="w-100 h-100">
                            </div>
                        </div>
                        <div class="crancy-wc__form-inner-flex">
                        <div class="crancy-wc__form-inner">
                            <div class="crancy-wc__logo">
                                <a href="https://lms.ideomaker.cl"><img src="https://i.ibb.co/ch45gPSw/Logo-Mentora-LMS-1.png" alt="Mentora LMS Logo"></a>
                            </div>

                            <div class="crancy-wc__form-inside-df">
                            <div class="crancy-wc__form-inside">
                                <div class="crancy-wc__form-middle">
                                    <div class="crancy-wc__form-top">

                                        <div class="crancy-wc__heading pd-btm-20">
                                            <h3 class="crancy-wc__form-title crancy-wc__form-title__one m-0">Iniciar Sesión</h3>
                                            <p>Bienvenido(a) al panel de acceso</p>
                                        </div>
                                        <!-- Sign in Form -->
                                        <form class="crancy-wc__form-main" action="https://lms.ideomaker.cl/student/store-login" method="post">
                                            <input type="hidden" name="_token" value="myJ54pMQIypFpE4MeVGMoLSAldShqPevkSCixqsF" autocomplete="off">                                            <div class="row">
                                                <div class="col-12">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <div class="form-group__input">
                                                            <input class="crancy-wc__form-input" type="email" name="email" placeholder="Correo Electrónico" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <div class="form-group__input">
                                                            <input class="crancy-wc__form-input" placeholder="Contraseña" id="password-field" type="password" name="password">
                                                            <span class="crancy-wc__toggle"><i class="fas fa-eye-slash" id="toggle-icon"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

											
                                            <!-- Form Group -->
                                            <div class="form-group mg-top-30">
                                                <div class="crancy-wc__button">
                                                    <button class="ntfmax-wc__btn" type="submit">Ingresar</button>
                                                </div>
                                            </div>

                                            <div class="crancy-wc__form-bottom text-center mg-top-20">
                                                <a href="https://lms.ideomaker.cl/student/forget-password" class="crancy-wc__forgot-password">
                                                    ¿Olvidaste tu contraseña?
                                                </a>
                                            </div>

                                        </form>
                                        <!-- End Sign in Form -->
										
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- End Welcome Banner -->
            </section>

        </div>

        <!--  Scripts -->
        <script src="https://lms.ideomaker.cl/global/js/jquery-3.7.1.min.js"></script>
        <script src="https://lms.ideomaker.cl/backend/js/jquery-migrate.js"></script>
        <script src="https://lms.ideomaker.cl/backend/js/popper.min.js"></script>
        <script src="https://lms.ideomaker.cl/backend/js/bootstrap.min.js"></script>
        <script src="https://lms.ideomaker.cl/backend/js/nice-select.min.js"></script>
        <script src="https://lms.ideomaker.cl/backend/js/main.js"></script>
        <script src="https://lms.ideomaker.cl/global/toastr/toastr.min.js"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

        <script>
            // Password Field Toggle - exactly like admin
            document.addEventListener('DOMContentLoaded', function() {
                const passwordField = document.getElementById('password-field');
                const toggleIcon = document.getElementById('toggle-icon');

                console.log('Password field found:', !!passwordField);
                console.log('Toggle icon found:', !!toggleIcon);

                const togglePassword = () => {
                    console.log('Toggle clicked, current type:', passwordField.type);

                    if (passwordField && toggleIcon) {
                        if (passwordField.type === 'password') {
                            // Mostrar contraseña
                            passwordField.type = 'text';
                            toggleIcon.classList.remove('fa-eye-slash');
                            toggleIcon.classList.add('fa-eye');
                            console.log('Password shown, icon changed to fa-eye');
                        } else {
                            // Ocultar contraseña
                            passwordField.type = 'password';
                            toggleIcon.classList.remove('fa-eye');
                            toggleIcon.classList.add('fa-eye-slash');
                            console.log('Password hidden, icon changed to fa-eye-slash');
                        }
                    }
                };

                if (toggleIcon && passwordField) {
                    toggleIcon.addEventListener('click', togglePassword);
                    console.log('Event listener attached successfully');

                    // También añadir al span contenedor por si acaso
                    const toggleContainer = toggleIcon.parentElement;
                    if (toggleContainer && toggleContainer.classList.contains('crancy-wc__toggle')) {
                        toggleContainer.addEventListener('click', togglePassword);
                        console.log('Container event listener also attached');
                    }
                } else {
                    console.error('Missing elements - passwordField:', !!passwordField, 'toggleIcon:', !!toggleIcon);
                }
            });

            (function($) {
                "use strict"
                $(document).ready(function () {

                    const session_notify_message = null;
					
                    if(session_notify_message != null){
                        const session_notify_type = "info";
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

                    const validation_errors = [];
					
                    if (validation_errors.length > 0) {
                        validation_errors.forEach(error => toastr.error(error));
                    }

                });
            })(jQuery);

        </script>

    </body>
</html>
