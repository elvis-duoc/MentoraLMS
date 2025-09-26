@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Contact Us') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Contact Us') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Manage Pages') }} >> {{ __('translate.Contact Us') }}</p>
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
                            <form action="{{ route('admin.update-contact-us') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                @method('PUT')

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">

                                            <div class="row">

                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="crancy__item-form--group w-100 h-100">
                                                                <label class="crancy__item-label">{{ __('translate.Existing Image') }} </label>
                                                                <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                    <input type="file" class="btn-check" name="image" id="input-img1" autocomplete="off" onchange="previewImage(event)">
                                                                    <label class="crancy-image-video-upload__label" for="input-img1">
                                                                        <img id="view_img" src="{{ asset($contact_us->image) }}">
                                                                        <h4 class="crancy-image-video-upload__title">{{ __('translate.Click here to') }} <span class="crancy-primary-color">{{ __('translate.Choose File') }}</span> {{ __('translate.and upload') }} </h4>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.First Campus') }}  </label>
                                                        <input class="crancy__item-input" type="text" name="compus_one" id="compus_one" value="{{ $contact_us->compus_one }}">
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.First Campus Address') }}  </label>
                                                        <input class="crancy__item-input" type="text" name="address" id="address" value="{{ $contact_us->address }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.First Campus Phone') }}  </label>
                                                        <input class="crancy__item-input" type="text" name="phone" id="phone" value="{{ $contact_us->phone }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.First Campus Email') }}  </label>
                                                        <input class="crancy__item-input" type="email" name="email" id="email" value="{{ $contact_us->email }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Second Campus') }}  </label>
                                                        <input class="crancy__item-input" type="text" name="compus_two" id="compus_two" value="{{ $contact_us->compus_two }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Second Campus Address') }}  </label>
                                                        <input class="crancy__item-input" type="text" name="address_2" id="address_2" value="{{ $contact_us->address_2 }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Second Campus Phone') }}  </label>
                                                        <input class="crancy__item-input" type="text" name="phone2" id="phone2" value="{{ $contact_us->phone2 }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Second Campus Email') }}  </label>
                                                        <input class="crancy__item-input" type="email" name="email2" id="email2" value="{{ $contact_us->email2 }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Google Embed Map Link') }}  </label>
                                                        <textarea class="crancy__item-input crancy__item-textarea seo_description_box"  name="map_code" id="map_code">{{ $contact_us->map_code }}</textarea>
                                                    </div>
                                                </div>

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
        "use strict"

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

