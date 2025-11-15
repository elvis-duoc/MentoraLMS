@extends('admin.master_layout')
@section('title')
    <title>Mi Perfil</title>
@endsection
@section('body-header')
    <h3 class="crancy-header__title m-0">Editar Perfil</h3>
    <p class="crancy-header__text">Panel de Control >> Editar Perfil</p>
@endsection
@section('body-content')
    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <form action="{{ route('admin.profile-update') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title">Información Básica</h4>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="crancy__item-form--group mg-top-25 w-100">
                                                        <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                            <input type="file" class="btn-check" name="image" id="input-img1" autocomplete="off" onchange="reviewImage(event)">
                                                            <label class="crancy-image-video-upload__label" for="input-img1">
                                                                @if ($admin->image)
                                                                <img id="view_img" src="{{ asset($admin->image) }}">
                                                                @else
                                                                <img id="view_img" src="{{ asset($general_setting->placeholder_image) }}">
                                                                @endif
                                                                <h4 class="crancy-image-video-upload__title">Haz clic aquí para <span class="crancy-primary-color">Elegir Archivo</span> y subir </h4>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="crancy__item-form--group mg-top-25">
                                                <label class="crancy__item-label crancy__item-label-product">Nombre</label>
                                                <input class="crancy__item-input" type="text" name="name" value="{{ $admin->name }}">
                                            </div>

                                            {{-- OCULTADO: Cargo --}}
                                            {{-- <div class="crancy__item-form--group mg-top-25">
                                                <label class="crancy__item-label crancy__item-label-product">Cargo</label>
                                                <input class="crancy__item-input" type="text" name="designation" value="{{ $admin->designation }}">
                                            </div> --}}

                                            <div class="crancy__item-form--group mg-top-25">
                                                <label class="crancy__item-label crancy__item-label-product">Correo Electrónico</label>
                                                <input class="crancy__item-input" type="email" name="email" value="{{ $admin->email }}">
                                            </div>

                                            {{-- OCULTADO: Facebook --}}
                                            {{-- <div class="crancy__item-form--group mg-top-25">
                                                <label class="crancy__item-label crancy__item-label-product">Facebook</label>
                                                <input class="crancy__item-input" type="text" name="facebook" value="{{ $admin->facebook }}">
                                            </div> --}}

                                            {{-- OCULTADO: Linkedin --}}
                                            {{-- <div class="crancy__item-form--group mg-top-25">
                                                <label class="crancy__item-label crancy__item-label-product">Linkedin</label>
                                                <input class="crancy__item-input" type="text" name="linkedin" value="{{ $admin->linkedin }}">
                                            </div> --}}

                                            {{-- OCULTADO: Twitter --}}
                                            {{-- <div class="crancy__item-form--group mg-top-25">
                                                <label class="crancy__item-label crancy__item-label-product">Twitter</label>
                                                <input class="crancy__item-input" type="text" name="twitter" value="{{ $admin->twitter }}">
                                            </div> --}}

                                            {{-- OCULTADO: Instagram --}}
                                            {{-- <div class="crancy__item-form--group mg-top-25">
                                                <label class="crancy__item-label crancy__item-label-product">Instagram</label>
                                                <input class="crancy__item-input" type="text" name="instagram" value="{{ $admin->instagram }}">
                                            </div> --}}

                                            {{-- OCULTADO: Acerca de Mí --}}
                                            {{-- <div class="crancy__item-form--group mg-top-25">
                                                <label class="crancy__item-label crancy__item-label-product">Acerca de Mí</label>

                                                <textarea class="crancy__item-input crancy__item-textarea seo_description_box"  name="about_me" id="about_me">{{ $admin->about_me }}</textarea>

                                            </div> --}}


                                            <button class="crancy-btn mg-top-25" type="submit">Actualizar</button>

                                        </div>
                                        <!-- End Product Card -->
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>

                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <form action="{{ route('admin.update-password') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title">Cambiar Contraseña</h4>

                                            <div class="crancy__item-form--group mg-top-25">
                                                <label class="crancy__item-label crancy__item-label-product">Contraseña Actual </label>
                                                <input class="crancy__item-input" type="password" name="current_password">
                                            </div>

                                            <div class="crancy__item-form--group mg-top-25">
                                                <label class="crancy__item-label crancy__item-label-product">Nueva Contraseña </label>
                                                <input class="crancy__item-input" type="password" name="password">
                                            </div>

                                            <div class="crancy__item-form--group mg-top-25">
                                                <label class="crancy__item-label crancy__item-label-product">Confirmar Contraseña </label>
                                                <input class="crancy__item-input" type="password" name="password_confirmation">
                                            </div>

                                            <button class="crancy-btn mg-top-25" type="submit">Cambiar Contraseña</button>

                                        </div>
                                        <!-- End Product Card -->
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->
@endsection

@push('js_section')
    <script>
        "use strict";

        function reviewImage(event) {
            console.log(event);
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('view_img');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
@endpush
