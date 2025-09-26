@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Cookie Consent') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Cookie Consent') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Website Setup') }} >> {{ __('translate.Cookie Consent') }}</p>
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
                            <form action="{{ route('admin.cookie-consent-update') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Cookie Consent') }}</h4>

                                            <div class="crancy__item-form--group mg-top-form-20">
                                                <label class="crancy__item-label">{{ __('translate.Visibility Status') }} </label>
                                                <div class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                    <label class="crancy__item-switch">
                                                    <input name="status" {{ $general_setting->cookie_consent_status == 1 ? 'checked' : '' }} type="checkbox" >
                                                    <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                    </label>
                                                </div>
                                            </div>


                                            <div class="crancy__item-form--group mg-top-25">
                                                <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Message') }}</label>
                                                <input class="crancy__item-input" type="text" name="message" value="{{ $general_setting->cookie_consent_message }}">
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

