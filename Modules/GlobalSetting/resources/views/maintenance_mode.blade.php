@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Maintenance mode') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Maintenance mode') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Website Setup') }} >> {{ __('translate.Maintenance mode') }}</p>
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
                            <form action="{{ route('admin.maintenance-mode-update') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Maintenance mode') }}</h4>

                                            <div class="crancy__item-form--group mg-top-form-20">
                                                <label class="crancy__item-label">{{ __('translate.Maintenance Status') }} </label>
                                                <div class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                    <label class="crancy__item-switch">
                                                    <input name="maintenance_status" {{ $general_setting->maintenance_status == 1 ? 'checked' : '' }} type="checkbox" >
                                                    <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="crancy__item-form--group mg-top-25 w-100">
                                                        <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                            <input type="file" class="btn-check" name="maintenance_image" id="input-img1" autocomplete="off" onchange="previewImage(event)">
                                                            <label class="crancy-image-video-upload__label" for="input-img1">
                                                                <img id="view_img" src="{{ asset($general_setting->maintenance_image) }}">
                                                                <h4 class="crancy-image-video-upload__title">{{ __('translate.Click here to') }} <span class="crancy-primary-color">{{ __('translate.Choose File') }}</span> {{ __('translate.and upload') }} </h4>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="crancy__item-form--group mg-top-25">
                                                <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Announcement Text') }}</label>
                                                <textarea class="crancy__item-input crancy__item-textarea" name="maintenance_text" id="" cols="30" rows="5">{{ $general_setting->maintenance_text }}</textarea>
                                            </div>

                                            <button class="crancy-btn mg-top-25" type="submit">{{ __('translate.Update') }}</button>

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

        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('view_img');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
@endpush
