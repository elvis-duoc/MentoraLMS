@extends('instructor.master_layout')
@section('title')
    <title>{{ __('translate.Zoom Meeting Setting') }}</title>
@endsection
@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Zoom Meeting Setting') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Zoom Meeting') }} >> {{ __('translate.Zoom Meeting Setting') }}</p>
@endsection
@section('body-content')
    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">

                <div class="col-md-8">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <form action="{{ route('instructor.update-zoom-setting') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Zoom Meeting Setting') }}</h4>

                                            <div class="crancy__item-form--group mg-top-25">
                                                <label class="crancy__item-label crancy__item-label-product">{{ __('translate.API Key') }} </label>
                                                <input class="crancy__item-input" type="text" name="zoom_api_key" value="{{ $user->zoom_api_key }}" autocomplete="off">
                                            </div>

                                            <div class="crancy__item-form--group mg-top-25">
                                                <label class="crancy__item-label crancy__item-label-product">{{ __('translate.API Secret') }} </label>
                                                <input class="crancy__item-input" type="text" name="zoom_api_secret" value="{{ $user->zoom_api_secret }}" autocomplete="off">
                                            </div>



                                            <button class="crancy-btn mg-top-25" type="submit">{{ __('translate.Update Setting') }}</button>

                                        </div>
                                        <!-- End Product Card -->
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12 mg-top-30">
                                    <!-- Product Card -->
                                    <div class="crancy-product-card">
                                        <h4 class="crancy-product-card__title">{{ __('translate.How to Get Zoom Credentials?') }}</h4>
                                        <div class="crancy-product-card__content">
                                            <ol>
                                                <li>
                                                    {{ __('translate.Log in to the') }}
                                                    <a href="https://marketplace.zoom.us/" target="_blank">{{ __('translate.Zoom Marketplace') }}</a>.
                                                </li>
                                                <li>
                                                    {{ __('translate.Navigate to the') }}
                                                    <a href="https://marketplace.zoom.us/develop/create" target="_blank">{{ __('translate.Build App Section') }}</a>.
                                                </li>
                                                <li>{{ __('translate.Click on "Create" under the Meeting SDK section.') }}</li>
                                                <li>{{ __('translate.Enter a name for your app and click "Create".') }}</li>
                                                <li>
                                                    {{ __('translate.View your') }}
                                                    <strong>{{ __('translate.Client ID') }}</strong>
                                                    {{ __('translate.and') }}
                                                    <strong>{{ __('translate.Client Secret') }}</strong>,
                                                    {{ __('translate.which will be used for authentication.') }}
                                                </li>

                                                <li>
                                                    {{ __('translate.Set your') }}
                                                    <strong>{{ __('translate.OAuth Redirect URL') }}</strong>
                                                    {{ __('translate.to the following:') }}
                                                    <code>{{ route('instructor.zoom.callback') }}</code>
                                                </li>

                                            </ol>
                                        </div>

                                    </div>
                                    <!-- End Product Card -->
                                </div>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>




            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->
@endsection
