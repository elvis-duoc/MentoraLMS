<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Site Title -->
        <title>Registrarse</title>

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
                                            <h3 class="crancy-wc__form-title crancy-wc__form-title__one m-0">Registrarse</h3>
                                            <p>Crea tu cuenta para acceder</p>
                                        </div>
                                        <!-- Sign up Form -->
                                        <form class="crancy-wc__form-main" action="{{ route('student.store-register') }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <div class="form-group__input">
                                                            <input class="crancy-wc__form-input" type="text" name="name" placeholder="Nombre" value="{{ old('name') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <div class="form-group__input">
                                                            <input class="crancy-wc__form-input" type="email" name="email" placeholder="Correo Electrónico" value="{{ old('email') }}">
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
                                                <div class="col-12">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <div class="form-group__input">
                                                            <input class="crancy-wc__form-input" placeholder="Confirmar Contraseña" id="password-confirmation-field" type="password" name="password_confirmation">
                                                            <span class="crancy-wc__toggle"><i class="fas fa-eye-slash" id="toggle-icon-confirmation"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @if($general_setting->recaptcha_status==1)
                                            <div class="form-group mg-top-20">
                                                <div class="g-recaptcha" data-sitekey="{{ $general_setting->recaptcha_site_key }}"></div>
                                            </div>
                                            @endif

                                            <!-- Form Group -->
                                            <div class="form-group mg-top-30">
                                                <div class="crancy-wc__button">
                                                    <button class="ntfmax-wc__btn" type="submit">Registrarse</button>
                                                </div>
                                            </div>

                                            <div class="crancy-wc__form-bottom text-center mg-top-20">
                                                <p class="td_form_card_text td_fs_20 td_fs_sm_16 td_medium td_heading_color mb-0">¿Ya tienes una cuenta?
                                                <a href="{{ route('student.login') }}" class="crancy-wc__forgot-password">
                                                    Iniciar Sesión
                                                </a>
                                                </p>
                                            </div>


                                        </form>
                                        <!-- End Sign up Form -->

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
        @if($general_setting->recaptcha_status==1)
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        @endif

        <script>
            // Password Field Toggle - for both password fields
            document.addEventListener('DOMContentLoaded', function() {
                const passwordField = document.getElementById('password-field');
                const toggleIcon = document.getElementById('toggle-icon');
                const passwordConfirmationField = document.getElementById('password-confirmation-field');
                const toggleIconConfirmation = document.getElementById('toggle-icon-confirmation');

                console.log('Password fields found:', !!passwordField, !!passwordConfirmationField);
                console.log('Toggle icons found:', !!toggleIcon, !!toggleIconConfirmation);

                const togglePassword = (field, icon) => {
                    console.log('Toggle clicked, current type:', field.type);

                    if (field && icon) {
                        if (field.type === 'password') {
                            // Mostrar contraseña
                            field.type = 'text';
                            icon.classList.remove('fa-eye-slash');
                            icon.classList.add('fa-eye');
                            console.log('Password shown, icon changed to fa-eye');
                        } else {
                            // Ocultar contraseña
                            field.type = 'password';
                            icon.classList.remove('fa-eye');
                            icon.classList.add('fa-eye-slash');
                            console.log('Password hidden, icon changed to fa-eye-slash');
                        }
                    }
                };

                // Setup toggle for password field
                if (toggleIcon && passwordField) {
                    toggleIcon.addEventListener('click', () => togglePassword(passwordField, toggleIcon));
                    console.log('Password field event listener attached successfully');

                    // También añadir al span contenedor por si acaso
                    const toggleContainer = toggleIcon.parentElement;
                    if (toggleContainer && toggleContainer.classList.contains('crancy-wc__toggle')) {
                        toggleContainer.addEventListener('click', () => togglePassword(passwordField, toggleIcon));
                        console.log('Password container event listener also attached');
                    }
                } else {
                    console.error('Missing elements - passwordField:', !!passwordField, 'toggleIcon:', !!toggleIcon);
                }

                // Setup toggle for password confirmation field
                if (toggleIconConfirmation && passwordConfirmationField) {
                    toggleIconConfirmation.addEventListener('click', () => togglePassword(passwordConfirmationField, toggleIconConfirmation));
                    console.log('Password confirmation field event listener attached successfully');

                    // También añadir al span contenedor por si acaso
                    const toggleContainerConfirmation = toggleIconConfirmation.parentElement;
                    if (toggleContainerConfirmation && toggleContainerConfirmation.classList.contains('crancy-wc__toggle')) {
                        toggleContainerConfirmation.addEventListener('click', () => togglePassword(passwordConfirmationField, toggleIconConfirmation));
                        console.log('Password confirmation container event listener also attached');
                    }
                } else {
                    console.error('Missing elements - passwordConfirmationField:', !!passwordConfirmationField, 'toggleIconConfirmation:', !!toggleIconConfirmation);
                }
            });

            (function($) {
                "use strict"
                $(document).ready(function () {

                    const session_notify_message = @if(session('message')) "{{ session('message') }}" @else null @endif;

                    if(session_notify_message != null){
                        const session_notify_type = @if(session('alert-type')) "{{ session('alert-type') }}" @else "info" @endif;
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

                    const validation_errors = @if($errors->any()) @json($errors->all()) @else [] @endif;

                    if (validation_errors.length > 0) {
                        validation_errors.forEach(error => toastr.error(error));
                    }

                });
            })(jQuery);

        </script>

    </body>
</html>