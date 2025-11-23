@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Certificate Builder') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Certificate Builder') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Manage Coupon') }} >> {{ __('translate.Certificate Builder') }}</p>
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
                            <form action="{{ route('admin.certificatebuilder-setting') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-4 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title">{{ __('translate.Certificate Builder') }}</h4>

                                            </div>

                                            <div class="row mg-top-30">
                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Student Name') }} * </label>
                                                        <input class="crancy__item-input" type="text" name="student_name" id="student_name" value="{{ $certificate_setting->student_name }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Course Name') }} * </label>
                                                        <input class="crancy__item-input" type="text" name="course_name" id="course_name" value="{{ $certificate_setting->course_name }}">
                                                    </div>
                                                </div>

                                                <div class="col-12 mg-top-form-20">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="crancy__item-form--group w-100 h-100">
                                                                <label class="crancy__item-label">{{ __('translate.Background Image') }} (<code>762 x 562</code>) </label>
                                                                <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                    <input type="file" class="btn-check" name="certificate_bg" id="input-img1" autocomplete="off" onchange="previewImage(event)">
                                                                    <label class="crancy-image-video-upload__label" for="input-img1">
                                                                        <img id="view_img" src="{{ asset($certificate_setting->certificate_bg) }}">
                                                                        <h4 class="crancy-image-video-upload__title">{{ __('translate.Click here to') }} <span class="crancy-primary-color">{{ __('translate.Choose File') }}</span> {{ __('translate.and upload') }} </h4>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-12 mg-top-form-20">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="crancy__item-form--group w-100 h-100">
                                                                <label class="crancy__item-label">{{ __('translate.Signature') }} (<code>100 X 80</code>) </label>
                                                                <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                    <input type="file" class="btn-check" name="signature" id="input-img12" autocomplete="off" onchange="previewImage2(event)">
                                                                    <label class="crancy-image-video-upload__label" for="input-img12">
                                                                        <img id="view_img2" src="{{ asset($certificate_setting->signature) }}">
                                                                        <h4 class="crancy-image-video-upload__title">{{ __('translate.Click here to') }} <span class="crancy-primary-color">{{ __('translate.Choose File') }}</span> {{ __('translate.and upload') }} </h4>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <button class="crancy-btn mg-top-25" type="submit">{{ __('translate.Update') }}</button>

                                        </div>
                                        <!-- End Product Card -->
                                    </div>

                                    <div class="col-md-8 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">

                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title">{{ __('translate.Certificate Preview') }}</h4>
                                            </div>

                                            <div class="row mg-top-30">
                                                <div class="col-12">
                                                    <div class="certificate-body" id="certificate-body" style="background-image: url('{{ asset($certificate_setting->certificate_bg) }}')">
                                                        @if ($certificate_setting->student_name)
                                                            <div class="draggable" id="student_name">{{ $certificate_setting->student_name }}</div>
                                                        @endif
                                                        @if ($certificate_setting->course_name)
                                                            <div class="draggable" id="course_name">{{ $certificate_setting->course_name }}</div>
                                                        @endif
                                                        @if ($certificate_setting->download_date)
                                                            <div class="draggable" id="download_date">{{ $certificate_setting->download_date }}</div>
                                                        @endif
                                                        @if ($certificate_setting->signature)
                                                            <div class="draggable" id="signature"><img src="{{ asset($certificate_setting->signature) }}" alt="Signature"></div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

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


@push('style_section')

<style>

    #student_name{
        left: {{ $certificate_setting->student_name_x }}px;
        top: {{ $certificate_setting->student_name_y }}px;
    }

    #course_name{
        left: {{ $certificate_setting->course_name_x }}px;
        top: {{ $certificate_setting->course_name_y }}px;
    }

    #signature{
        left: {{ $certificate_setting->signature_x }}px;
        top: {{ $certificate_setting->signature_y }}px;
    }

    #download_date{
        left: {{ $certificate_setting->download_date_x }}px;
        top: {{ $certificate_setting->download_date_y }}px;
    }


    .certificate-container {
        display: flex;
        justify-content: space-between;
        gap: 20px;
    }

    .certificate-editor, .certificate-preview {
        width: 48%;
    }

    .certificate-body {
        width: 930px;
        height: 600px;
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .draggable {
        position: absolute;
        cursor: move;
    }

    .image-preview {
        width: 100%;
        height: 200px;
        background: #f0f0f0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

</style>

@endpush

@push('js_section')

<script src="{{ asset('global/js/jquery-ui.min.js') }}"></script>

<script>


    (function($) {
        "use strict"
        $(document).ready(function () {

             // Draggable Logic
            $('.draggable').draggable({
                containment: '#certificate-body',
                stop: function(event, ui) {
                    const name = $(this).attr('id');
                    const position = ui.position;

                    let position_x = position.left;
                    let position_y = position.top;
                    let  _token = '{{ csrf_token() }}';

                    $.ajax({
                        type : 'POST',
                        data : { _token, name, position_x , position_y},
                        url : "{{ route('admin.certificate-builder.position') }}",
                        success:function(response){
                            toastr.success(response.message);
                        },
                        error:function(err){
                            toastr.error(`{{ __('translate.Server error occured') }}`)
                        }
                    });

                }
            });


        });
    })(jQuery);

    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('view_img');
            output.src = reader.result;
        }

        reader.readAsDataURL(event.target.files[0]);
    };

    function previewImage2(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('view_img2');
            output.src = reader.result;
        }

        reader.readAsDataURL(event.target.files[0]);
    };



</script>


@endpush
