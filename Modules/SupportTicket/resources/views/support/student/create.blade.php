@extends('student.master_layout')
@section('title')
    <title>{{ __('translate.Create Ticket') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Create Ticket') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Support Ticket') }} >> {{ __('translate.Create Ticket') }}</p>
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
                            <form action="{{ route('student.support-ticket.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title">{{ __('translate.Create Ticket') }}</h4>

                                                <a href="{{ route('student.support-ticket.index') }}" class="crancy-btn "><i class="fa fa-list"></i> {{ __('translate.Ticket List') }}</a>
                                            </div>

                                            <div class="row mg-top-30">

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Subject') }} * </label>
                                                        <input class="crancy__item-input" type="text" name="subject" id="subject" value="{{ old('subject') }}">
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Message') }} * </label>

                                                        <textarea class="crancy__item-input crancy__item-textarea summernote"  name="message" id="message">{{ html_decode(old('message')) }}</textarea>

                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20 edu_support_files">
                                                        <label class="crancy__item-label">{{ __('translate.Attachements') }} </label>

                                                        <input class="form-control h-auto " type="file" name="documents[]" id="formFileMultiple" multiple>
                                                    </div>
                                                </div>


                                            </div>

                                            <button class="crancy-btn mg-top-25" type="submit">{{ __('translate.Create Ticket') }}</button>

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
