@extends('instructor.master_layout')
@section('title')
    <title>{{ __('translate.Account Delete') }}</title>
@endsection
@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Account Delete') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Dashboard') }} >> {{ __('translate.Account Delete') }}</p>
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
                            <form action="{{ route('instructor.confirm-account-delete') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('DELETE')

                                <div class="row">

                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">

                                            <div class="alert alert-warning alert-has-icon">
                                                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                                <div class="alert-body">
                                                    <div class="alert-title">{{ __('translate.Warning!') }}</div>
                                                    <p>{{ __('translate.Once your account is deleted, you will no longer be able to log in or recover this account. Please proceed with caution.') }}</p>
                                                </div>
                                            </div>

                                            <div class="crancy__item-form--group mg-top-25">
                                                <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Current Password') }} </label>
                                                <input class="crancy__item-input" type="password" name="current_password">
                                            </div>

                                            <button class="crancy-btn mg-top-25 delete_danger_btn ml-0" type="submit">{{ __('translate.Delete Now') }}</button>

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
