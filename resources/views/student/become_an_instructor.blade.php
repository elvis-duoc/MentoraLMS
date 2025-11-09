@extends('student.master_layout')
@section('title')
    <title>Convertirse en Instructor</title>
@endsection
@section('body-header')
    <h3 class="crancy-header__title m-0">Convertirse en Instructor</h3>
    <p class="crancy-header__text">Panel de Control >> Convertirse en Instructor</p>
@endsection
@section('body-content')


    <form action="{{ route('student.instructor-application') }}" enctype="multipart/form-data" method="POST">
    @csrf
        <!-- crancy Dashboard -->
        <section class="crancy-adashboard crancy-show">
            <div class="container container__bscreen">
                <div class="row">

                    @if ($user->instructor_joining_request == 'pending')
                    <div class="col-12  mg-top-30">
                        <div class="crancy-body">
                            <!-- Dashboard Inner -->
                            <div class="crancy-dsinner">
                                <div class="crancy-product-card">
                                <div class="alert alert-warning alert-has-icon">
                                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                    <div class="alert-body">
                                        <div class="alert-title">Aviso</div>
                                        <p>Su solicitud de instructor está bajo revisión. Por favor espere un momento. Recibirá una notificación después de la aprobación de la solicitud</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if ($user->instructor_joining_request == 'not_yet' || $user->instructor_joining_request == 'rejected')


                    <div class="col-12">
                        <div class="crancy-body">
                            <!-- Dashboard Inner -->
                            <div class="crancy-dsinner">
                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title">Escriba su Biografía</h4>

                                            <div class="row">
                                                <div class="crancy__item-form--group mg-top-25 col-md-6">
                                                    <label class="crancy__item-label crancy__item-label-product">Experiencia  * <i data-toggle="tooltip" data-placement="top" class="fa fa-info-circle text--primary" title="¿Cuántos años de experiencia tiene como instructor?"></i> </label>
                                                    <input class="crancy__item-input" type="text" name="instructor_experience" value="{{ old('instructor_experience') }}">
                                                </div>

                                                <div class="crancy__item-form--group mg-top-25 col-md-6">
                                                    <label class="crancy__item-label crancy__item-label-product">Designación *</label>
                                                    <input class="crancy__item-input" type="text" name="designation" value="{{ old('designation') }}">
                                                </div>
                                            </div>


                                            <div class="crancy__item-form--group mg-top-25">
                                                <label class="crancy__item-label crancy__item-label-product">Biografía Corta *</label>
                                                <textarea class="crancy__item-input crancy__item-textarea seo_description_box"  name="about_me" id="about_me">{{ old('about_me') }}</textarea>

                                            </div>

                                        </div>
                                        <!-- End Product Card -->
                                    </div>
                                </div>
                            </div>
                            <!-- End Dashboard Inner -->
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="crancy-body">
                            <!-- Dashboard Inner -->
                            <div class="crancy-dsinner">

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h4 class="crancy-product-card__title">Habilidades y Experiencia</h4>

                                                <button class="crancy-btn mg-top-25" type="button" id="add_new_skill_btn"> <i class="fas fa-plus"></i> Agregar Habilidad</button>
                                            </div>

                                            <div id="dyanmic_skill_wrapper">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="crancy__item-form--group mg-top-25">
                                                            <label class="crancy__item-label crancy__item-label-product">Habilidad </label>
                                                            <input class="crancy__item-input" type="text" name="skills[]">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="crancy__item-form--group mg-top-25">
                                                            <label class="crancy__item-label crancy__item-label-product">Experiencia(%) </label>
                                                            <input class="crancy__item-input" type="text" name="expertises[]">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="crancy-btn mg-top-25 remove_dynamic_area_btn" type="button"> <i class="fas fa-trash"></i>Eliminar</button>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <!-- End Product Card -->
                                    </div>
                                </div>

                            </div>
                            <!-- End Dashboard Inner -->
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="crancy-body">
                            <!-- Dashboard Inner -->
                            <div class="crancy-dsinner">

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title">Ubicación</h4>

                                            <div class="row">
                                                <div class="crancy__item-form--group mg-top-25 col-md-6">
                                                    <label class="crancy__item-label crancy__item-label-product">País *</label>
                                                    <input class="crancy__item-input" type="text" name="country" value="{{ old('country') }}">
                                                </div>

                                                <div class="crancy__item-form--group mg-top-25 col-md-6">
                                                    <label class="crancy__item-label crancy__item-label-product">Estado/Provincia *</label>
                                                    <input class="crancy__item-input" type="text" name="state" value="{{ old('state') }}">
                                                </div>

                                                <div class="crancy__item-form--group mg-top-25 col-md-6">
                                                    <label class="crancy__item-label crancy__item-label-product">Ciudad *</label>
                                                    <input class="crancy__item-input" type="text" name="city" value="{{ old('city') }}">
                                                </div>

                                                <div class="crancy__item-form--group mg-top-25 col-md-6">
                                                    <label class="crancy__item-label crancy__item-label-product">Dirección *</label>
                                                    <input class="crancy__item-input" type="text" name="address" value="{{ old('address') }}">
                                                </div>
                                            </div>

                                        </div>
                                        <!-- End Product Card -->
                                    </div>
                                </div>

                            </div>
                            <!-- End Dashboard Inner -->
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="crancy-body">
                            <!-- Dashboard Inner -->
                            <div class="crancy-dsinner">

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title">Redes Sociales</h4>


                                            <div class="row">
                                                <div class="crancy__item-form--group mg-top-25 col-md-6">
                                                    <label class="crancy__item-label crancy__item-label-product">Facebook</label>
                                                    <input class="crancy__item-input" type="text" name="facebook" value="{{ old('facebook') }}">
                                                </div>

                                                <div class="crancy__item-form--group mg-top-25 col-md-6">
                                                    <label class="crancy__item-label crancy__item-label-product">Linkedin</label>
                                                    <input class="crancy__item-input" type="text" name="linkedin" value="{{ old('linkedin') }}">
                                                </div>

                                                <div class="crancy__item-form--group mg-top-25 col-md-6">
                                                    <label class="crancy__item-label crancy__item-label-product">Twitter</label>
                                                    <input class="crancy__item-input" type="text" name="twitter" value="{{ old('twitter') }}">
                                                </div>

                                                <div class="crancy__item-form--group mg-top-25 col-md-6">
                                                    <label class="crancy__item-label crancy__item-label-product">Instagram</label>
                                                    <input class="crancy__item-input" type="text" name="instagram" value="{{ old('instagram') }}">
                                                </div>
                                            </div>


                                            <button class="crancy-btn mg-top-25" type="submit">Aplicar Ahora</button>
                                        </div>
                                        <!-- End Product Card -->
                                    </div>
                                </div>

                            </div>
                            <!-- End Dashboard Inner -->
                        </div>
                    </div>

                    @endif




                </div>
            </div>
        </section>
        <!-- End crancy Dashboard -->
    </form>

    <div id="new_dynamic_content" class="d-none">
        <div class="row new_dynamic_skill_body">
            <div class="col-md-6">
                <div class="crancy__item-form--group mg-top-25">
                    <label class="crancy__item-label crancy__item-label-product">Habilidad </label>
                    <input class="crancy__item-input" type="text" name="skills[]">
                </div>
            </div>
            <div class="col-md-4">
                <div class="crancy__item-form--group mg-top-25">
                    <label class="crancy__item-label crancy__item-label-product">Experiencia(%) </label>
                    <input class="crancy__item-input" type="text" name="expertises[]">
                </div>
            </div>
            <div class="col-md-2">
                <button class="crancy-btn mg-top-25 remove_dynamic_area_btn" type="button"> <i class="fas fa-trash"></i>Eliminar</button>
            </div>
        </div>

    </div>
@endsection

@push('style_section')
    <style>
        .remove_dynamic_area_btn {
            margin-top: 70px !important;
            background: #ff0808 !important;
        }
    </style>
@endpush
@push('js_section')
    <script>

        (function($) {
        "use strict";
        $(document).ready(function () {

            // start new skill
            $("#add_new_skill_btn").on("click", function(){

                let new_skill_item = $("#new_dynamic_content").html()

                $("#dyanmic_skill_wrapper").append(new_skill_item)
            });

            $(document).on('click', '.remove_dynamic_area_btn', function () {
                $(this).closest('.new_dynamic_skill_body').remove();
            });

            // end new skill

        })
    })(jQuery);

    </script>
@endpush
