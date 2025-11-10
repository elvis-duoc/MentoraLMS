@extends('admin.master_layout')
@section('title')
<title>{{ __('translate.Basic Gateway') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Basic Gateway') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Payment Gateway') }} >> {{ __('translate.Basic Gateway') }}</p>
@endsection

@section('body-content')

<section class="crancy-adashboard crancy-show">
    <div class="container container__bscreen">
        <div class="row row__bscreen">
            <div class="col-12">
                <div class="crancy-body">
                    <!-- Dashboard Inner -->
                    <div class="crancy-dsinner">
                        <div class="crancy-personals mg-top-30">
                            <div class="row">
                                <div class="col-lg-3 col-md-2 col-12 crancy-personals__list">
                                    <div class="crancy-psidebar">
                                        <!-- Features Tab List -->
                                        <div class="list-group crancy-psidebar__list" id="list-tab" role="tablist">

                                            <a class="list-group-item active" data-bs-toggle="list" href="#id1" role="tab" aria-selected="true">
                                                <span class="crancy-psidebar__icon">
                                                    <i class="fas fa-list    "></i>
                                                </span>
                                                <h4 class="crancy-psidebar__title">{{ __('translate.Stripe') }}</h4>
                                            </a>

                                            <a class="list-group-item" data-bs-toggle="list" href="#id2" role="tab" aria-selected="false"><span class="crancy-psidebar__icon">
                                                <i class="fas fa-list    "></i>
                                                </span>
                                                <h4 class="crancy-psidebar__title">{{ __('translate.Paypal') }}</h4>
                                            </a>

                                            <a class="list-group-item" data-bs-toggle="list" href="#id3" role="tab" aria-selected="false"><span class="crancy-psidebar__icon"><i class="fas fa-list    "></i>
                                                </span>
                                                <h4 class="crancy-psidebar__title">{{ __('translate.Razorpay') }}</h4>
                                            </a>

                                            <a class="list-group-item" data-bs-toggle="list" href="#id4" role="tab" aria-selected="false"><span class="crancy-psidebar__icon"><i class="fas fa-list    "></i>
                                                </span>
                                                <h4 class="crancy-psidebar__title">{{ __('translate.Flutterwave') }}</h4>
                                            </a>

                                            <a class="list-group-item" data-bs-toggle="list" href="#id5" role="tab" aria-selected="false"><span class="crancy-psidebar__icon"><i class="fas fa-list    "></i>
                                                </span>
                                                <h4 class="crancy-psidebar__title">{{ __('translate.Mollie') }}</h4>
                                            </a>

                                            <a class="list-group-item" data-bs-toggle="list" href="#id6" role="tab" aria-selected="false"><span class="crancy-psidebar__icon"><i class="fas fa-list    "></i>
                                                </span>
                                                <h4 class="crancy-psidebar__title">{{ __('translate.Paystack') }}</h4>
                                            </a>


                                            <a class="list-group-item" data-bs-toggle="list" href="#id7" role="tab" aria-selected="false"><span class="crancy-psidebar__icon"><i class="fas fa-list    "></i>
                                                </span>
                                                <h4 class="crancy-psidebar__title">{{ __('translate.Instamojo') }}</h4>
                                            </a>

                                            <a class="list-group-item" data-bs-toggle="list" href="#id8" role="tab" aria-selected="false"><span class="crancy-psidebar__icon"><i class="fas fa-list    "></i>
                                                </span>
                                                <h4 class="crancy-psidebar__title">{{ __('translate.Bank Payment') }}</h4>
                                            </a>

                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-9 col-md-10 col-12  crancy-personals__content">
                                    <div class="crancy-ptabs">

                                        <div class="crancy-ptabs__inner">
                                            <div class="tab-content" id="nav-tabContent">
                                                <!--  Features Single Tab -->
                                                <div class="tab-pane fade active show" id="id1" role="tabpanel">
                                                    <form action="{{  route('admin.update-stripe') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="crancy-ptabs__separate">
                                                                    <div class="crancy-ptabs__form-main">
                                                                        <div class="crancy__item-group">
                                                                            <h3 class="crancy__item-group__title">{{ __('translate.Stripe Configuration') }}</h3>
                                                                            <div class="crancy__item-form--group">
                                                                                <div class="row">

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Visibility Status') }} </label>
                                                                                            <div class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                                                                <label class="crancy__item-switch">
                                                                                                <input {{ $payment_setting->stripe_status == 1 ? 'checked' : '' }} name="status" type="checkbox" >
                                                                                                <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-4">
                                                                                                <div class="crancy__item-form--group w-100 h-100">
                                                                                                    <label class="crancy__item-label">{{ __('translate.Image') }} </label>
                                                                                                    <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                                                        <input type="file" class="btn-check" name="image" id="input-img1" autocomplete="off" onchange="previewImage(event)">
                                                                                                        <label class="crancy-image-video-upload__label" for="input-img1">
                                                                                                            <img id="view_img" src="{{ asset($payment_setting->stripe_image) }}">
                                                                                                            <h4 class="crancy-image-video-upload__title">{{ __('translate.Click here to') }} <span class="crancy-primary-color">{{ __('translate.Choose File') }}</span> {{ __('translate.and upload') }} </h4>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Currency') }} * </label>
                                                                                            <select class="form-select crancy__item-input" name="currency_id">
                                                                                                <option value="">{{ __('translate.Select') }}</option>
                                                                                                @foreach ($currency_list as $currency)
                                                                                                    <option {{ $payment_setting->stripe_currency_id == $currency->id ? 'selected' : '' }} value="{{ $currency->id }}">{{ $currency->currency_name }}
                                                                                                </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Stripe Key') }} * </label>
                                                                                            <input class="crancy__item-input" type="text" name="stripe_key" value="{{ $payment_setting->stripe_key }}">
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Stripe Secret') }} *</label>
                                                                                            <input class="crancy__item-input" type="text" name="stripe_secret" value="{{ $payment_setting->stripe_secret }}">
                                                                                        </div>
                                                                                    </div>


                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mg-top-40">
                                                                            <button class="crancy-btn" type="submit">{{ __('translate.Update') }}</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="tab-pane fade " id="id2" role="tabpanel">
                                                    <form action="{{  route('admin.update-paypal') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="crancy-ptabs__separate">
                                                                    <div class="crancy-ptabs__form-main">
                                                                        <div class="crancy__item-group">
                                                                            <h3 class="crancy__item-group__title">{{ __('translate.Paypal Configuration') }}</h3>
                                                                            <div class="crancy__item-form--group">
                                                                                <div class="row">

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Visibility Status') }} </label>
                                                                                            <div class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                                                                <label class="crancy__item-switch">
                                                                                                <input {{ $payment_setting->paypal_status == 1 ? 'checked' : '' }} name="status" type="checkbox" >
                                                                                                <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-4">
                                                                                                <div class="crancy__item-form--group w-100 h-100">
                                                                                                    <label class="crancy__item-label">{{ __('translate.Image') }} </label>
                                                                                                    <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                                                        <input type="file" class="btn-check" name="image" id="input-img-paypal" autocomplete="off" onchange="paypalPreviewImage(event)">
                                                                                                        <label class="crancy-image-video-upload__label" for="input-img-paypal">
                                                                                                            <img id="view_paypal_img" src="{{ asset($payment_setting->paypal_image) }}">
                                                                                                            <h4 class="crancy-image-video-upload__title">{{ __('translate.Click here to') }} <span class="crancy-primary-color">{{ __('translate.Choose File') }}</span> {{ __('translate.and upload') }} </h4>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Account Mode') }} * </label>
                                                                                            <select class="form-select crancy__item-input" name="account_mode">
                                                                                                <option {{ $payment_setting->paypal_account_mode == 'live' ? 'selected' : '' }} value="live">{{ __('translate.Live') }}</option>
                                                                                                <option {{ $payment_setting->paypal_account_mode == 'sandbox' ? 'selected' : '' }} value="sandbox">{{ __('translate.Sandbox') }}</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Currency') }} * </label>
                                                                                            <select class="form-select crancy__item-input" name="currency_id">
                                                                                                <option value="">{{ __('translate.Select') }}</option>
                                                                                                @foreach ($currency_list as $currency)
                                                                                                    <option {{ $payment_setting->paypal_currency_id == $currency->id ? 'selected' : '' }} value="{{ $currency->id }}">{{ $currency->currency_name }}
                                                                                                </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Client Id') }} * </label>
                                                                                            <input class="crancy__item-input" type="text" name="paypal_client_id" value="{{ $payment_setting->paypal_client_id }}">
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Secret Id') }} *</label>
                                                                                            <input class="crancy__item-input" type="text" name="paypal_secret_key" value="{{ $payment_setting->paypal_secret_key }}">
                                                                                        </div>
                                                                                    </div>


                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mg-top-40">
                                                                            <button class="crancy-btn" type="submit">{{ __('translate.Update') }}</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="tab-pane fade " id="id3" role="tabpanel">
                                                    <form action="{{  route('admin.update-razorpay') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="crancy-ptabs__separate">
                                                                    <div class="crancy-ptabs__form-main">
                                                                        <div class="crancy__item-group">
                                                                            <h3 class="crancy__item-group__title">{{ __('translate.Razorpay Configuration') }}</h3>
                                                                            <div class="crancy__item-form--group">
                                                                                <div class="row">

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Visibility Status') }} </label>
                                                                                            <div class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                                                                <label class="crancy__item-switch">
                                                                                                <input {{ $payment_setting->razorpay_status == 1 ? 'checked' : '' }} name="status" type="checkbox" >
                                                                                                <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-4">
                                                                                                <div class="crancy__item-form--group w-100 h-100">
                                                                                                    <label class="crancy__item-label">{{ __('translate.Image') }} </label>
                                                                                                    <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                                                        <input type="file" class="btn-check" name="image" id="input-img-razorpay" autocomplete="off" onchange="razorpayPreviewImage(event)">
                                                                                                        <label class="crancy-image-video-upload__label" for="input-img-razorpay">
                                                                                                            <img id="view_razorpay_img" src="{{ asset($payment_setting->razorpay_image) }}">
                                                                                                            <h4 class="crancy-image-video-upload__title">{{ __('translate.Click here to') }} <span class="crancy-primary-color">{{ __('translate.Choose File') }}</span> {{ __('translate.and upload') }} </h4>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Currency') }} * </label>
                                                                                            <select class="form-select crancy__item-input" name="currency_id">
                                                                                                <option value="">{{ __('translate.Select') }}</option>
                                                                                                @foreach ($currency_list as $currency)
                                                                                                    <option {{ $payment_setting->razorpay_currency_id == $currency->id ? 'selected' : '' }} value="{{ $currency->id }}">{{ $currency->currency_name }}
                                                                                                </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Razorpay Key') }} * </label>
                                                                                            <input class="crancy__item-input" type="text" name="razorpay_key" value="{{ $payment_setting->razorpay_key }}">
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Secret Key') }} *</label>
                                                                                            <input class="crancy__item-input" type="text" name="razorpay_secret" value="{{ $payment_setting->razorpay_secret }}">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Name') }} *</label>
                                                                                            <input class="crancy__item-input" type="text" name="name" value="{{ $payment_setting->razorpay_name }}">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Description') }} *</label>
                                                                                            <input class="crancy__item-input" type="text" name="description" value="{{ $payment_setting->razorpay_description }}">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Theme Color') }} *</label>
                                                                                            <input class="crancy__item-input" type="color" name="theme_color" value="{{ $payment_setting->razorpay_theme_color }}">
                                                                                        </div>
                                                                                    </div>


                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mg-top-40">
                                                                            <button class="crancy-btn" type="submit">{{ __('translate.Update') }}</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="tab-pane fade " id="id4" role="tabpanel">
                                                    <form action="{{  route('admin.update-flutterwave') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="crancy-ptabs__separate">
                                                                    <div class="crancy-ptabs__form-main">
                                                                        <div class="crancy__item-group">
                                                                            <h3 class="crancy__item-group__title">{{ __('translate.Flutterwave Configuration') }}</h3>
                                                                            <div class="crancy__item-form--group">
                                                                                <div class="row">

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Visibility Status') }} </label>
                                                                                            <div class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                                                                <label class="crancy__item-switch">
                                                                                                <input {{ $payment_setting->flutterwave_status == 1 ? 'checked' : '' }} name="status" type="checkbox" >
                                                                                                <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-4">
                                                                                                <div class="crancy__item-form--group w-100 h-100">
                                                                                                    <label class="crancy__item-label">{{ __('translate.Image') }} </label>
                                                                                                    <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                                                        <input type="file" class="btn-check" name="image" id="input-img-flutterwave" autocomplete="off" onchange="flutterwavePreviewImage(event)">
                                                                                                        <label class="crancy-image-video-upload__label" for="input-img-flutterwave">
                                                                                                            <img id="view_flutterwave_img" src="{{ asset($payment_setting->flutterwave_logo) }}">
                                                                                                            <h4 class="crancy-image-video-upload__title">{{ __('translate.Click here to') }} <span class="crancy-primary-color">{{ __('translate.Choose File') }}</span> {{ __('translate.and upload') }} </h4>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Currency') }} * </label>
                                                                                            <select class="form-select crancy__item-input" name="currency_id">
                                                                                                <option value="">{{ __('translate.Select') }}</option>
                                                                                                @foreach ($currency_list as $currency)
                                                                                                    <option {{ $payment_setting->flutterwave_currency_id == $currency->id ? 'selected' : '' }} value="{{ $currency->id }}">{{ $currency->currency_name }}
                                                                                                </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Public Key') }} * </label>
                                                                                            <input class="crancy__item-input" type="text" name="public_key" value="{{ $payment_setting->flutterwave_public_key }}">
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Secret Key') }} *</label>
                                                                                            <input class="crancy__item-input" type="text" name="secret_key" value="{{ $payment_setting->flutterwave_secret_key }}">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Title') }} *</label>
                                                                                            <input class="crancy__item-input" type="text" name="title" value="{{ $payment_setting->flutterwave_title }}">
                                                                                        </div>
                                                                                    </div>


                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mg-top-40">
                                                                            <button class="crancy-btn" type="submit">{{ __('translate.Update') }}</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="tab-pane fade " id="id5" role="tabpanel">
                                                    <form action="{{  route('admin.update-mollie') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="crancy-ptabs__separate">
                                                                    <div class="crancy-ptabs__form-main">
                                                                        <div class="crancy__item-group">
                                                                            <h3 class="crancy__item-group__title">{{ __('translate.Mollie Configuration') }}</h3>
                                                                            <div class="crancy__item-form--group">
                                                                                <div class="row">

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Visibility Status') }} </label>
                                                                                            <div class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                                                                <label class="crancy__item-switch">
                                                                                                <input {{ $payment_setting->mollie_status == 1 ? 'checked' : '' }} name="status" type="checkbox" >
                                                                                                <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-4">
                                                                                                <div class="crancy__item-form--group w-100 h-100">
                                                                                                    <label class="crancy__item-label">{{ __('translate.Image') }} </label>
                                                                                                    <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                                                        <input type="file" class="btn-check" name="image" id="input-img-mollie" autocomplete="off" onchange="molliePreviewImage(event)">
                                                                                                        <label class="crancy-image-video-upload__label" for="input-img-mollie">
                                                                                                            <img id="view_mollie_img" src="{{ asset($payment_setting->mollie_image) }}">
                                                                                                            <h4 class="crancy-image-video-upload__title">{{ __('translate.Click here to') }} <span class="crancy-primary-color">{{ __('translate.Choose File') }}</span> {{ __('translate.and upload') }} </h4>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Currency') }} * </label>
                                                                                            <select class="form-select crancy__item-input" name="mollie_currency_id">
                                                                                                <option value="">{{ __('translate.Select') }}</option>
                                                                                                @foreach ($currency_list as $currency)
                                                                                                    <option {{ $payment_setting->mollie_currency_id == $currency->id ? 'selected' : '' }} value="{{ $currency->id }}">{{ $currency->currency_name }}
                                                                                                </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Mollie Key') }} * </label>
                                                                                            <input class="crancy__item-input" type="text" name="mollie_key" value="{{ $payment_setting->mollie_key }}">
                                                                                        </div>
                                                                                    </div>




                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mg-top-40">
                                                                            <button class="crancy-btn" type="submit">{{ __('translate.Update') }}</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="tab-pane fade " id="id6" role="tabpanel">
                                                    <form action="{{  route('admin.update-paystack') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="crancy-ptabs__separate">
                                                                    <div class="crancy-ptabs__form-main">
                                                                        <div class="crancy__item-group">
                                                                            <h3 class="crancy__item-group__title">{{ __('translate.Paystack Configuration') }}</h3>
                                                                            <div class="crancy__item-form--group">
                                                                                <div class="row">

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Visibility Status') }} </label>
                                                                                            <div class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                                                                <label class="crancy__item-switch">
                                                                                                <input {{ $payment_setting->paystack_status == 1 ? 'checked' : '' }} name="status" type="checkbox" >
                                                                                                <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-4">
                                                                                                <div class="crancy__item-form--group w-100 h-100">
                                                                                                    <label class="crancy__item-label">{{ __('translate.Image') }} </label>
                                                                                                    <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                                                        <input type="file" class="btn-check" name="image" id="input-img-paystack" autocomplete="off" onchange="paystackPreviewImage(event)">
                                                                                                        <label class="crancy-image-video-upload__label" for="input-img-paystack">
                                                                                                            <img id="view_paystack_img" src="{{ asset($payment_setting->paystack_image) }}">
                                                                                                            <h4 class="crancy-image-video-upload__title">{{ __('translate.Click here to') }} <span class="crancy-primary-color">{{ __('translate.Choose File') }}</span> {{ __('translate.and upload') }} </h4>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Currency') }} * </label>
                                                                                            <select class="form-select crancy__item-input" name="paystack_currency_id">
                                                                                                <option value="">{{ __('translate.Select') }}</option>
                                                                                                @foreach ($currency_list as $currency)
                                                                                                    <option {{ $payment_setting->paystack_currency_id == $currency->id ? 'selected' : '' }} value="{{ $currency->id }}">{{ $currency->currency_name }}
                                                                                                </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Public Key') }} * </label>
                                                                                            <input class="crancy__item-input" type="text" name="paystack_public_key" value="{{ $payment_setting->paystack_public_key }}">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Secret Key') }} * </label>
                                                                                            <input class="crancy__item-input" type="text" name="paystack_secret_key" value="{{ $payment_setting->paystack_secret_key }}">
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mg-top-40">
                                                                            <button class="crancy-btn" type="submit">{{ __('translate.Update') }}</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="tab-pane fade " id="id7" role="tabpanel">
                                                    <form action="{{  route('admin.update-instamojo') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="crancy-ptabs__separate">
                                                                    <div class="crancy-ptabs__form-main">
                                                                        <div class="crancy__item-group">
                                                                            <h3 class="crancy__item-group__title">{{ __('translate.Instamojo Configuration') }}</h3>
                                                                            <div class="crancy__item-form--group">
                                                                                <div class="row">

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Visibility Status') }} </label>
                                                                                            <div class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                                                                <label class="crancy__item-switch">
                                                                                                <input {{ $payment_setting->instamojo_status == 1 ? 'checked' : '' }} name="status" type="checkbox" >
                                                                                                <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-4">
                                                                                                <div class="crancy__item-form--group w-100 h-100">
                                                                                                    <label class="crancy__item-label">{{ __('translate.Image') }} </label>
                                                                                                    <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                                                        <input type="file" class="btn-check" name="image" id="input-img-instamojo" autocomplete="off" onchange="instamojoPreviewImage(event)">
                                                                                                        <label class="crancy-image-video-upload__label" for="input-img-instamojo">
                                                                                                            <img id="view_instamojo_img" src="{{ asset($payment_setting->instamojo_image) }}">
                                                                                                            <h4 class="crancy-image-video-upload__title">{{ __('translate.Click here to') }} <span class="crancy-primary-color">{{ __('translate.Choose File') }}</span> {{ __('translate.and upload') }} </h4>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Account Mode') }} * </label>
                                                                                            <select class="form-select crancy__item-input" name="account_mode">
                                                                                                <option {{ $payment_setting->instamojo_account_mode == 'Sandbox' ? 'selected' : '' }} value="Sandbox">{{ __('translate.Sandbox') }}</option>
                                                                                                <option {{ $payment_setting->instamojo_account_mode == 'Live' ? 'selected' : '' }} value="Live">{{ __('translate.Live') }}</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Currency') }} * </label>
                                                                                            <select class="form-select crancy__item-input" name="currency_id">
                                                                                                <option value="">{{ __('translate.Select') }}</option>
                                                                                                @foreach ($currency_list as $currency)
                                                                                                    <option {{ $payment_setting->instamojo_currency_id == $currency->id ? 'selected' : '' }} value="{{ $currency->id }}">{{ $currency->currency_name }}
                                                                                                </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.API Key') }} * </label>
                                                                                            <input class="crancy__item-input" type="text" name="api_key" value="{{ $payment_setting->instamojo_api_key }}">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Auth Token') }} * </label>
                                                                                            <input class="crancy__item-input" type="text" name="auth_token" value="{{ $payment_setting->instamojo_auth_token }}">
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mg-top-40">
                                                                            <button class="crancy-btn" type="submit">{{ __('translate.Update') }}</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="tab-pane fade " id="id8" role="tabpanel">
                                                    <form action="{{  route('admin.update-bank') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="crancy-ptabs__separate">
                                                                    <div class="crancy-ptabs__form-main">
                                                                        <div class="crancy__item-group">
                                                                            <h3 class="crancy__item-group__title">{{ __('translate.Bank Configuration') }}</h3>
                                                                            <div class="crancy__item-form--group">
                                                                                <div class="row">

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Visibility Status') }} </label>
                                                                                            <div class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                                                                <label class="crancy__item-switch">
                                                                                                <input {{ $payment_setting->bank_status == 1 ? 'checked' : '' }} name="status" type="checkbox" >
                                                                                                <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-4">
                                                                                                <div class="crancy__item-form--group w-100 h-100">
                                                                                                    <label class="crancy__item-label">{{ __('translate.Image') }} </label>
                                                                                                    <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                                                        <input type="file" class="btn-check" name="image" id="input-img-bank" autocomplete="off" onchange="bankPreviewImage(event)">
                                                                                                        <label class="crancy-image-video-upload__label" for="input-img-bank">
                                                                                                            <img id="view_bank_img" src="{{ asset($payment_setting->bank_image) }}">
                                                                                                            <h4 class="crancy-image-video-upload__title">{{ __('translate.Click here to') }} <span class="crancy-primary-color">{{ __('translate.Choose File') }}</span> {{ __('translate.and upload') }} </h4>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Account Information') }} *</label>

                                                                                            <textarea class="crancy__item-input crancy__item-textarea seo_description_box"  name="account_info" id="account_info">{{ $payment_setting->bank_account_info }}</textarea>
                                                                                        </div>
                                                                                    </div>


                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mg-top-40">
                                                                            <button class="crancy-btn" type="submit">{{ __('translate.Update') }}</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>













                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Dashboard Inner -->
                </div>
            </div>
        </div>
    </div>
</section>

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

        function paypalPreviewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('view_paypal_img');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

        function razorpayPreviewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('view_razorpay_img');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

        function flutterwavePreviewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('view_flutterwave_img');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

        function molliePreviewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('view_mollie_img');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

        function paystackPreviewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('view_paystack_img');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

        function instamojoPreviewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('view_instamojo_img');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

        function bankPreviewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('view_bank_img');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

    </script>
@endpush
