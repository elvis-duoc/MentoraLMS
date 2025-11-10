

@extends('layout_inner_page')

@section('title')
    <title>{{ __('translate.Shopping Cart') }}</title>
@endsection

@section('front-content')

  <!-- Start Page Heading Section -->
    @include('breadcrumb')

        <!-- start Page Payment Section -->

        <section class="payment">
            <div class="container">
                <div class="row">
                    @if (count($cart_items) > 0)
                        <div class="col-lg-7 col-md-7">
                            <div class="payment_table">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ __('translate.Course') }}</th>
                                            <th>{{ __('translate.Price') }}</th>
                                            <th>{{ __('translate.Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart_items as $cart_item)
                                            <tr>
                                                <td>
                                                    <div class="payment_box_item">
                                                        <div class="payment_box_item_thumb">
                                                            <img src="{{ asset($cart_item?->thumb_image) }}" alt="thumb">
                                                        </div>
                                                        <div class="payment_box_item_text">
                                                            <a href="{{ route('course', $cart_item->slug) }}">
                                                                {{ html_decode($cart_item?->title) }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                {{ currency($cart_item->price) }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('cart-remove', $cart_item->id) }}" class="delet_btn">
                                                        <span>
                                                            <svg width="12" height="13" viewBox="0 0 12 13" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_4131_19194)">
                                                                    <path
                                                                        d="M6.0006 3.35157L10.1256 -0.773438L11.3039 0.404897L7.17893 4.5299L11.3039 8.65491L10.1256 9.83321L6.0006 5.70823L1.8756 9.83321L0.697266 8.65491L4.82227 4.5299L0.697266 0.404897L1.8756 -0.773438L6.0006 3.35157Z"
                                                                        fill="currentColor" />
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-lg-5 col-md-5">
                            <div class="payment_right">
                                <ul class="sub_total">
                                    <li>{{ __('translate.Subtotal') }} <span>{{ currency($sub_total_amount) }}</span></li>
                                    <li>{{ __('translate.Coupon') }} <span class="dis">(-) {{ currency($coupon_amount) }}</span></li>
                                    <li>{{ __('translate.Total') }} <span>{{ currency($total_amount) }}</span></li>
                                </ul>


                                <form class="coupon_box" method="POST" action="{{ route('apply-coupon') }}">
                                    @csrf
                                    <input type="text" class="form-control" id="coupon_code"
                                        placeholder="{{ __('translate.Coupon code') }}" name="coupon_code">
                                    <button type="submit" class="coupon_apply_btn">
                                        {{ __('translate.Apply') }}
                                    </button>
                                </form>



                                <div class="payment_select">
                                    <div class="payment_select_text">
                                        <h4>{{ __('translate.Select Payment') }}</h4>
                                    </div>


                                    <div class="payment_select_item_main">

                                        @if ($payment_setting->stripe_status == 1)
                                            <div class="payment_select_item_box">

                                                <a href="javascript:;" class="payment_select_item">
                                                    <div class="payment_select_item_thumb">
                                                        <img src="{{ asset($payment_setting->stripe_image) }}" class="w-100" alt="">
                                                    </div>
                                                </a>

                                                <div class="payment_select_modal">
                                                    <div class="payment_select_modal_head">
                                                        <h2>{{ __('translate.Stripe Payment') }}</h2>
                                                        <button type="button" class="close_modal_btn">
                                                            <span>
                                                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M16 1L1.00081 16" stroke="#FE2C55" stroke-width="1.8"
                                                                        stroke-linecap="round" />
                                                                    <path d="M16 16L1.00081 1.00001" stroke="#FE2C55"
                                                                        stroke-width="1.8" stroke-linecap="round" />
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <form class="payment_select_modal_form stripe-modal-form require-validation " role="form" action="{{ route('payment.stripe') }}" method="POST" data-cc-on-file="false" data-stripe-publishable-key="{{ $payment_setting->stripe_key }}" id="payment-form">
                                                        @csrf

                                                        <div class="payment_select_modal_form_item mt-0">
                                                            <div class="payment_select_modal_form_inner">
                                                                <label for="card_number" class="form-label">
                                                                    {{ __('translate.Card Number') }}*</label>
                                                                <input type="text" class="form-control card-number"
                                                                    id="card_number" placeholder="{{ __('translate.Card Number') }}" name="card_number" autocomplete="off">
                                                            </div>
                                                        </div>


                                                        <div class="payment_select_modal_form_item">
                                                            <div class="payment_select_modal_form_inner">
                                                                <label for="expiry_month" class="form-label">{{ __('translate.Expired Month') }} *</label>
                                                                <input type="text" class="form-control card-expiry-month"
                                                                    id="expiry_month" placeholder="{{ __('translate.MM') }}" name="month" autocomplete="off">
                                                            </div>
                                                        </div>


                                                        <div class="payment_select_modal_form_item">
                                                            <div class="payment_select_modal_form_inner">
                                                                <label for="expired_year"
                                                                    class="form-label">{{ __('translate.Expired Year') }}*</label>
                                                                <input type="text" class="form-control card-expiry-year"
                                                                    id="expired_year" placeholder="{{ __('translate.YYYY') }}" name="year" autocomplete="off">
                                                            </div>
                                                            <div class="payment_select_modal_form_inner">
                                                                <label for="cvc"
                                                                    class="form-label">{{ __('translate.CVC') }}*</label>
                                                                <input type="text" class="form-control card-cvc"
                                                                    id="cvc" placeholder="{{ __('translate.CVC') }}" name="cvc" autocomplete="off">
                                                            </div>
                                                        </div>

                                                        <div class="payment_select_modal_form_item stripe_error d-none">
                                                            <div class="stripe-modal-form-inner">
                                                                <div class='alert-danger alert '>{{ __('translate.Please provide your valid card information') }}</div>
                                                            </div>
                                                        </div>

                                                        <button type="submit"
                                                            class="td_btn td_style_1 td_radius_30 td_medium td_with_shadow">
                                                            <span class="td_btn_in td_white_color td_accent_bg">
                                                                <span>{{ __('translate.Pay Now') }}</span>
                                                                <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M15.1575 4.34302L3.84375 15.6567" stroke="currentColor"
                                                                        stroke-width="1.5" stroke-linecap="round"
                                                                        stroke-linejoin="round"></path>
                                                                    <path
                                                                        d="M15.157 11.4142C15.157 11.4142 16.0887 5.2748 15.157 4.34311C14.2253 3.41142 8.08594 4.34314 8.08594 4.34314"
                                                                        stroke="currentColor" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif



                                        @if ($payment_setting->paypal_status == 1)
                                            <div class="payment_select_item_box">
                                                <a href="{{ route('payment.paypal') }}" >
                                                    <div class="payment_select_item_thumb">
                                                        <img src="{{ asset($payment_setting->paypal_image) }}" class="w-100" alt="">
                                                    </div>
                                                </a>

                                            </div>
                                        @endif

                                        @if ($payment_setting->razorpay_status == 1)
                                            <div class="payment_select_item_box" id="razorpay_btn">
                                                <a href="javascript:;" >
                                                    <div class="payment_select_item_thumb">
                                                        <img src="{{ asset($payment_setting->razorpay_image) }}" class="w-100" alt="">
                                                    </div>
                                                </a>

                                            </div>

                                            <form action="{{ route('payment.razorpay') }}" method="POST" class="d-none">
                                                @csrf
                                                @php
                                                    $payable_amount = $total_amount * $razorpay_currency->currency_rate;
                                                    $payable_amount = round($payable_amount, 2);
                                                @endphp
                                                <script src="https://checkout.razorpay.com/v1/checkout.js"
                                                        data-key="{{ $payment_setting->razorpay_key }}"
                                                        data-currency="{{ $razorpay_currency->currency_code }}"
                                                        data-amount= "{{ $payable_amount * 100 }}"
                                                        data-buttontext="{{ __('translate.Pay') }}"
                                                        data-name="{{ $payment_setting->razorpay_name }}"
                                                        data-description="{{ $payment_setting->razorpay_description }}"
                                                        data-image="{{ asset($payment_setting->razorpay_image) }}"
                                                        data-prefill.name=""
                                                        data-prefill.email=""
                                                        data-theme.color="{{ $payment_setting->razorpay_theme_color }}">
                                                </script>
                                            </form>

                                        @endif





                                        @if ($payment_setting->flutterwave_status == 1)
                                            <div class="payment_select_item_box" id="payWithFlutterwave">
                                                <a href="javascript:;" >
                                                    <div class="payment_select_item_thumb">
                                                        <img src="{{ asset($payment_setting->flutterwave_logo) }}" class="w-100" alt="">
                                                    </div>
                                                </a>
                                            </div>
                                        @endif

                                        @if ($payment_setting->paystack_status == 1)
                                            <div class="payment_select_item_box" id="paystackPayment">
                                                <a href="javascript:;" >
                                                    <div class="payment_select_item_thumb">
                                                        <img src="{{ asset($payment_setting->paystack_image) }}" class="w-100" alt="">
                                                    </div>
                                                </a>
                                            </div>
                                        @endif



                                        @if ($payment_setting->mollie_status == 1)
                                            <div class="payment_select_item_box">
                                                <a href="{{ route('payment.mollie') }}">
                                                    <div class="payment_select_item_thumb">
                                                        <img src="{{ asset($payment_setting->mollie_image) }}" class="w-100" alt="">
                                                    </div>
                                                </a>
                                            </div>
                                        @endif


                                        @if ($payment_setting->instamojo_status == 1)
                                            <div class="payment_select_item_box">
                                                <a href="{{ route('payment.instamojo') }}">
                                                    <div class="payment_select_item_thumb">
                                                        <img src="{{ asset($payment_setting->instamojo_image) }}" class="w-100" alt="">
                                                    </div>
                                                </a>
                                            </div>
                                        @endif




                                        @if ($payment_setting->bank_status == 1)
                                            <div class="payment_select_item_box">

                                                <a href="javascript:;" class="payment_select_item">
                                                    <div class="payment_select_item_thumb">
                                                        <img src="{{ asset($payment_setting->bank_image) }}" class="w-100" alt="">
                                                    </div>
                                                </a>

                                                <div class="payment_select_modal">
                                                    <div class="payment_select_modal_head">
                                                        <h2>{{ __('translate.Bank Payment') }}</h2>
                                                        <button type="button" class="close_modal_btn">
                                                            <span>
                                                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M16 1L1.00081 16" stroke="#FE2C55" stroke-width="1.8"
                                                                        stroke-linecap="round" />
                                                                    <path d="M16 16L1.00081 1.00001" stroke="#FE2C55"
                                                                        stroke-width="1.8" stroke-linecap="round" />
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    </div>


                                                    <ul class="banck_text">
                                                        {!! clean(nl2br($payment_setting->bank_account_info)) !!}
                                                    </ul>


                                                    <form class="payment_select_modal_form mt-0" action="{{ route('payment.bank') }}" method="POST">
                                                        @csrf
                                                        <div class="payment_select_modal_form_item  mt-0">
                                                            <div class="payment_select_modal_form_inner">
                                                                <label for="tnx_info"
                                                                    class="form-label">{{ __('translate.Transaction information') }}*</label>
                                                                <textarea class="form-control" id="tnx_info"
                                                                    rows="3" name="tnx_info"></textarea>
                                                            </div>
                                                        </div>

                                                        <button type="submit"
                                                            class="td_btn td_style_1 td_radius_30 td_medium td_with_shadow">
                                                            <span class="td_btn_in td_white_color td_accent_bg">
                                                                <span>{{ __('translate.Submit Now') }}</span>
                                                                <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M15.1575 4.34302L3.84375 15.6567" stroke="currentColor"
                                                                        stroke-width="1.5" stroke-linecap="round"
                                                                        stroke-linejoin="round"></path>
                                                                    <path
                                                                        d="M15.157 11.4142C15.157 11.4142 16.0887 5.2748 15.157 4.34311C14.2253 3.41142 8.08594 4.34314 8.08594 4.34314"
                                                                        stroke="currentColor" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif


                                    </div>

                                </div>





                            </div>
                        </div>
                    @else
                        <div class="col-12">
                            <div class="courses_not_found_main">
                                <div class="courses_not_found_thumb">
                                    <img src="{{ asset($general_setting->not_found ?? '') }}" alt="thumb">
                                </div>
                                <div class="courses_not_found_text">
                                    <h3>{{ __('translate.Shipping Car is Empty!') }}</h3>
                                    <p>
                                        {{ __('translate.To add new course to your shopping cart, please click the button below') }}
                                    </p>

                                    <a href="{{ route('courses') }}"
                                        class="td_btn td_style_1 td_radius_30 td_medium td_with_shadow">
                                        <span class="td_btn_in td_white_color td_accent_bg">
                                            <span>{{ __('translate.Browse Courses') }}</span>
                                            <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.1575 4.34302L3.84375 15.6567" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M15.157 11.4142C15.157 11.4142 16.0887 5.2748 15.157 4.34311C14.2253 3.41142 8.08594 4.34314 8.08594 4.34314"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    @endif
                </div>
            </div>
        </section>

        <!-- End Page Payment Section -->


@endsection

@push('js_section')

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        "use strict";
        $(function() {

            var $form = $(".require-validation");
            $('form.require-validation').on('submit', function(e) {
                var $form         = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                                    'input[type=text]', 'input[type=file]',
                                    'textarea'].join(', '),
                $inputs       = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.stripe_error'),
                valid         = true;
                $errorMessage.addClass('d-none');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('d-none');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.stripe_error')
                        .removeClass('d-none')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

            $("#razorpay_btn").on("click", function(){
                $(".razorpay-payment-button").click();
            })

        });
    </script>




@if ($payment_setting->flutterwave_status == 1 && $user)

    <script src="https://checkout.flutterwave.com/v3.js"></script>

    @php
        $payable_amount = $total_amount * $flutterwave_currency->currency_rate;
        $payable_amount = round($payable_amount, 2);
    @endphp

    <script>
        "use strict";
        $(function() {
            $("#payWithFlutterwave").on("click", function(){

                var isDemo = "{{ env('APP_MODE') }}"
                if(isDemo == 'DEMO'){
                    toastr.error('This Is Demo Version. You Can Not Change Anything');
                    return;
                }

                FlutterwaveCheckout({
                    public_key: "{{ $payment_setting->flutterwave_public_key }}",
                    tx_ref: "{{ substr(rand(0,time()),0,10) }}",
                    amount: {{ $payable_amount }},
                    currency: "{{ $flutterwave_currency->currency_code }}",
                    country: "{{ $flutterwave_currency->country_code }}",
                    payment_options: " ",
                    customer: {
                    email: "{{ $user->email }}",
                    phone_number: "{{ $user->phone }}",
                    name: "{{ $user->name }}",
                    },
                    callback: function (data) {

                        var tnx_id = data.transaction_id;
                        var _token = "{{ csrf_token() }}";
                        $.ajax({
                            type: 'post',
                            data : {tnx_id,_token},
                            url: "{{ url('payment/flutterwave/') }}",
                            success: function (response) {

                                if(response.status == 'success'){
                                    toastr.success(response.message);
                                    window.location.href = "{{ route('student.enrolled-courses') }}";
                                }else{
                                    toastr.error(response.message);
                                    window.location.reload();
                                }
                            },
                            error: function(err) {
                                toastr.error("{{ __('translate.Something went wrong, please try again') }}");
                                window.location.reload();
                            }
                        });
                    },
                    customizations: {
                    title: "{{ $payment_setting->flutterwave_title }}",
                    logo: "{{ asset($payment_setting->flutterwave_logo) }}",
                    },
                });

            })
        });

    </script>
@endif




{{-- start paystack payment --}}

@if ($payment_setting->paystack_status == 1)
<script src="https://js.paystack.co/v1/inline.js"></script>

@php

    $public_key = $payment_setting->paystack_public_key;
    $currency = $paystack_currency->currency_code;
    $currency = strtoupper($currency);

    $ngn_amount = $total_amount * $paystack_currency->currency_rate;
    $ngn_amount = $ngn_amount * 100;
    $ngn_amount = round($ngn_amount);

@endphp

<script>
    "use strict";
    $(function() {
        $("#paystackPayment").on("click", function(){

            var isDemo = "{{ env('APP_MODE') }}"
            if(isDemo == 'DEMO'){
                toastr.error('This Is Demo Version. You Can Not Change Anything');
                return;
            }

            var handler = PaystackPop.setup({
                            key: '{{ $public_key }}',
                            email: '{{ $user->email ?? '' }}',
                            amount: '{{ $ngn_amount }}',
                            currency: "{{ $currency }}",
                            callback: function(response){
                                let reference = response.reference;
                                let tnx_id = response.transaction;
                                let _token = "{{ csrf_token() }}";
                                $.ajax({
                                    type: "POST",
                                    data: {reference, tnx_id, _token},
                                    url: "{{ url('payment/paystack') }}",
                                    success: function(response) {
                                        if(response.status == 'success'){
                                            toastr.success(response.message);
                                            window.location.href = "{{ route('student.enrolled-courses') }}";
                                        }else{
                                            toastr.error(response.message);
                                            window.location.reload();
                                        }
                                    },
                                    error: function(response){
                                            toastr.error('Server Error');
                                            window.location.reload();
                                    }
                                });
                            },
                            onClose: function(){
                                alert('window closed');
                            }
                        });
                handler.openIframe();

        })
    });
</script>

@endif

{{-- end paystack payment --}}




@endpush
