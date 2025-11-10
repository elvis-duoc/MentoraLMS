@extends('instructor.master_layout')
@section('title')
    <title>{{ __('translate.Create Meeting') }}</title>
@endsection
@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Create Meeting') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Zoom Meeting') }} >> {{ __('translate.Create Meeting') }}</p>
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
                            <form action="{{ route('instructor.zoom-meeting.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Create Meeting') }}</h4>



                                            <p class="edc-meeting_warn mb-4">{{ __('translate.If you are facing unauthorised error, Please') }} <a class="crancy-underline"
                                                    href="{{ route('instructor.zoom.auth') }}" onclick="return confirm(`{{ __('translate.Are you sure ?') }}`)">
                                                    {{ __('translate.Click here') }}</a> </p>


                                            <div class="crancy__item-form--group mg-top-form-25">
                                                <label class="crancy__item-label">{{ __('translate.Course') }} * </label>
                                                <select class="form-select crancy__item-input" name="course_id">
                                                    <option value="">{{ __('translate.Select') }}</option>
                                                    @foreach ($courses as $course)
                                                        <option  {{ $course->id == old('course_id') ? 'selected' : '' }} value="{{ $course->id }}">{{ html_decode($course?->title) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="crancy__item-form--group mg-top-25">
                                                <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Topic') }} *</label>
                                                <input class="crancy__item-input" type="text" name="title" value="{{ old('title') }}" autocomplete="off">
                                            </div>

                                            <div class="crancy__item-form--group mg-top-25">
                                                <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Start Time') }} *</label>
                                                <input class="crancy__item-input" type="text" id="start_time" name="start_time" value="{{ old('start_time') }}" autocomplete="off">
                                            </div>

                                            <div class="crancy__item-form--group mg-top-25">
                                                <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Duration') }} *</label>
                                                <input class="crancy__item-input" type="number" name="duration" value="{{ old('duration') }}" autocomplete="off">
                                            </div>






                                            <button class="crancy-btn mg-top-25" type="submit">{{ __('translate.Create Meeting') }}</button>

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
    <link rel="stylesheet" href="{{ asset('global/datetimepicker/jquery.datetimepicker.css') }}">
@endpush

@push('js_section')
    <script src="{{ asset('global/datetimepicker/jquery.datetimepicker.js') }}"></script>

    <script>
        (function($) {
            "use strict"
            $(document).ready(function () {
                $("#start_time").datetimepicker({
                    format: 'Y-m-d H:i:s',
                    formatTime: 'H:i:s',
                    formatDate: 'Y-m-d',
                    step: 5,
                    minDate: 0,
                });
            });
        })(jQuery);

    </script>
@endpush
