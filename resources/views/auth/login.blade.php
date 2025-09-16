

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
            (function($) {
                "use strict"
                $(document).ready(function () {

                    const togglePassword = document.querySelector('#toggle-icon');
                    const password = document.querySelector('#password-field');
					
                    if (togglePassword && password) {
                        togglePassword.addEventListener('click', function (e) {
                            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                            password.setAttribute('type', type);
                            this.classList.toggle('fa-eye');
                            this.classList.toggle('fa-eye-slash');
                        });
                    }

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
