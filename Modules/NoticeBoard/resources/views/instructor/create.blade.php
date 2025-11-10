@extends('instructor.master_layout')
@section('title')
    <title>{{ __('translate.Create Notice') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Create Notice') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Support Ticket') }} >> {{ __('translate.Create Notice') }}</p>
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
                            <form action="{{ route('instructor.notice-board.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title">{{ __('translate.Create Notice') }}</h4>

                                                <a href="{{ route('instructor.notice-board.index') }}" class="crancy-btn "><i class="fa fa-list"></i> {{ __('translate.Notice List') }}</a>
                                            </div>

                                            <div class="row mg-top-30">

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-25">
                                                        <label class="crancy__item-label">{{ __('translate.Course') }} * </label>
                                                        <select class="form-select crancy__item-input" name="course_id">
                                                            <option value="">{{ __('translate.Select') }}</option>
                                                            @foreach ($courses as $course)
                                                                <option  {{ $course->id == old('course_id') ? 'selected' : '' }} value="{{ $course->id }}">{{ html_decode($course?->title) }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Subject') }} * </label>
                                                        <input class="crancy__item-input" type="text" name="title" id="title" value="{{ old('title') }}">
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Message') }} * </label>

                                                        <textarea class="crancy__item-input crancy__item-textarea"  name="description" id="description">{{ html_decode(old('description')) }}</textarea>

                                                    </div>
                                                </div>


                                            </div>

                                            <button class="crancy-btn mg-top-25" type="submit">{{ __('translate.Create Notice') }}</button>

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
