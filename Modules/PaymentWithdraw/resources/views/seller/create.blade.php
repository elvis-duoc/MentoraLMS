@extends('instructor.master_layout')
@section('title')
    <title>{{ __('translate.New Withdrawal') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.New Withdrawal') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Dashboard') }} >> {{ __('translate.New Withdrawal') }}</p>
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
                            <form action="{{ route('seller.my-withdraw.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title">{{ __('translate.New Withdrawal') }}</h4>

                                                <a href="{{ route('seller.my-withdraw.index') }}" class="crancy-btn "><i class="fa fa-list"></i> {{ __('translate.Withdrawal List') }}</a>
                                            </div>


                                            <div class="row mg-top-30">


                                                <div class="col-md-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Withdraw Method') }} * </label>
                                                        <select class="form-select crancy__item-input"  id="withdraw_method"
                                                        name="method_id">
                                                            <option value="">{{ __('translate.Select') }}</option>
                                                            @foreach ($methods as $method)
                                                                <option value="{{ $method->id }}">{{ $method->method_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>


                                                @foreach ($methods as $method)
                                                <div class="col-12 d-none method_box mg-top-form-20" id="method_id_{{ $method->id }}">
                                                    <div class="alert alert-primary withdraw-card" role="alert">
                                                        <h5 class="mb-2">{{ __('translate.Withdraw Limit') }} :
                                                            {{ currency($method->min_amount) }} - {{ currency($method->max_amount) }}
                                                        </h5 >
                                                        <h5 class="mb-2">{{ __('translate.Withdraw charge') }} : {{ $method->withdraw_charge }}%</h5>
                                                        {!! clean(nl2br($method->description)) !!}
                                                    </div>
                                                </div>
                                            @endforeach


                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Amount') }} * </label>
                                                        <input class="crancy__item-input" type="text" name="amount" id="amount" value="{{ old('amount') }}">
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Bank/Account Information') }} * </label>

                                                        <textarea class="crancy__item-input crancy__item-textarea"  name="description" id="description" placeholder="{{ __('translate.Bank/Account Information') }}">{{ old('description') }}</textarea>

                                                    </div>
                                                </div>

                                            </div>

                                            <button class="crancy-btn mg-top-25" type="submit">{{ __('translate.Save') }}</button>

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
        .withdraw-card{
            margin-bottom: 0px !important;
        }

        .withdraw-card p{
            color: #000 !important;
        }
    </style>

@endpush
@push('js_section')


    <script>
        (function($) {
            "use strict"
            $(document).ready(function () {
                $("#withdraw_method").on("change", function(){
                    $(".method_box").addClass('d-none');
                    $(`#method_id_${$(this).val()}`).removeClass('d-none');

                })

            });
        })(jQuery);


    </script>
@endpush


