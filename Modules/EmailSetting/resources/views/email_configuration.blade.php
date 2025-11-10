@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Email Configuration') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Email Configuration') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Dashboard') }} >> {{ __('translate.Email Configuration') }}</p>
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
                            <form action="{{ route('admin.update-email-setting') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Email Configuration') }}</h4>

                                            <div class="row">

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Sender Name') }} </label>
                                                        <input class="crancy__item-input" type="text" name="sender_name" value="{{ $email_setting->sender_name }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Mail Host') }} </label>
                                                        <input class="crancy__item-input" type="text" name="mail_host" value="{{ $email_setting->mail_host }}">
                                                    </div>
                                                </div>



                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Email') }} </label>
                                                        <input class="crancy__item-input" type="text" name="email" value="{{ $email_setting->email }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.SMTP User Name') }} </label>
                                                        <input class="crancy__item-input" type="text" name="smtp_username" value="{{ $email_setting->smtp_username }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.SMTP Password') }} </label>
                                                        <input class="crancy__item-input" type="text" name="smtp_password" value="{{ $email_setting->smtp_password }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Mail Port') }} </label>
                                                        <input class="crancy__item-input" type="text" name="mail_port" value="{{ $email_setting->mail_port }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Mail Port') }} </label>
                                                        <select class="form-select crancy__item-input" name="mail_encryption">
                                                            <option {{ $email_setting->mail_encryption == 'tls' ? 'selected' : '' }} value="tls">{{ __('translate.TLS') }}</option>

                                                            <option {{ $email_setting->mail_encryption == 'ssl' ? 'selected' : '' }} value="ssl">{{ __('translate.SSL') }}</option>

                                                        </select>
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
