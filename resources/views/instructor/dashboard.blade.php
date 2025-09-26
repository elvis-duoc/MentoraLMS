@extends('instructor.master_layout')
@section('title')
<title>{{ __('translate.Dashboard') }}</title>
@endsection
@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Dashboard') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Dashboard') }} >> {{ __('translate.Dashboard') }}</p>
@endsection
@push('style_section')
    <link rel="stylesheet" href="{{ asset('backend/css/charts.min.css') }}">
@endpush
@section('body-content')
    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">

                            <div class="row row__bscreen">

                                <div class="col-xxl-3 col-md-6 col-12 mg-top-30">
                                    <div class="crancy-ecom-card crancy-ecom-card__v2">
                                        <div class="flex-main">
                                            <span>
                                                @include('course::instructor.svg.total_earning')
                                            </span>
                                            <div class="flex-1">
                                                <div class="crancy-ecom-card__heading">
                                                    <div class="crancy-ecom-card__icon">
                                                        <h4 class="crancy-ecom-card__title">{{ __('translate.Total Earnings') }} </h4>
                                                    </div>

                                                </div>
                                                <div class="crancy-ecom-card__content">
                                                    <div class="crancy-ecom-card__camount">
                                                        <div class="crancy-ecom-card__camount__inside">
                                                            <h3 class="crancy-ecom-card__amount">{{ currency($total_income) }}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-3 col-md-6 col-12 mg-top-30">
                                    <div class="crancy-ecom-card crancy-ecom-card__v2">
                                        <div class="flex-main">
                                            <span>
                                                @include('course::instructor.svg.commission_deducted')
                                            </span>
                                            <div class="flex-1">
                                                <div class="crancy-ecom-card__heading">
                                                    <div class="crancy-ecom-card__icon">
                                                        <h4 class="crancy-ecom-card__title">{{ __('translate.Commission Deducted') }} </h4>
                                                    </div>

                                                </div>
                                                <div class="crancy-ecom-card__content">
                                                    <div class="crancy-ecom-card__camount">
                                                        <div class="crancy-ecom-card__camount__inside">
                                                            <h3 class="crancy-ecom-card__amount">{{ currency($total_commission) }}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-3 col-md-6 col-12 mg-top-30">
                                    <div class="crancy-ecom-card crancy-ecom-card__v2">
                                        <div class="flex-main">
                                            <span>
                                                @include('course::instructor.svg.net_earning_two')
                                            </span>
                                            <div class="flex-1">
                                                <div class="crancy-ecom-card__heading">
                                                    <div class="crancy-ecom-card__icon">
                                                        <h4 class="crancy-ecom-card__title">{{ __('translate.Net Earnings') }} </h4>
                                                    </div>

                                                </div>
                                                <div class="crancy-ecom-card__content">
                                                    <div class="crancy-ecom-card__camount">
                                                        <div class="crancy-ecom-card__camount__inside">
                                                            <h3 class="crancy-ecom-card__amount">{{ currency($net_income) }}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-xxl-3 col-md-6 col-12 mg-top-30">
                                    <div class="crancy-ecom-card crancy-ecom-card__v2">
                                        <div class="flex-main">
                                            <span>
                                                @include('course::instructor.svg.available_balance')
                                            </span>
                                            <div class="flex-1">
                                                <div class="crancy-ecom-card__heading">
                                                    <div class="crancy-ecom-card__icon">
                                                        <h4 class="crancy-ecom-card__title">{{ __('translate.Available Balance') }} </h4>
                                                    </div>

                                                </div>
                                                <div class="crancy-ecom-card__content">
                                                    <div class="crancy-ecom-card__camount">
                                                        <div class="crancy-ecom-card__camount__inside">
                                                            <h3 class="crancy-ecom-card__amount">{{ currency($current_balance) }}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>





                                <div class="col-xxl-3 col-md-6 col-12 mg-top-30">
                                    <div class="crancy-ecom-card crancy-ecom-card__v2">
                                        <div class="flex-main">
                                            <span>
                                                @include('paymentwithdraw::seller.svg.total_withdraw')
                                            </span>
                                            <div class="flex-1">
                                                <div class="crancy-ecom-card__heading">
                                                    <div class="crancy-ecom-card__icon">
                                                        <h4 class="crancy-ecom-card__title">{{ __('translate.Total Withdraw') }} </h4>
                                                    </div>

                                                </div>
                                                <div class="crancy-ecom-card__content">
                                                    <div class="crancy-ecom-card__camount">
                                                        <div class="crancy-ecom-card__camount__inside">
                                                            <h3 class="crancy-ecom-card__amount">{{ currency($total_withdraw_amount) }}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-xxl-3 col-md-6 col-12 mg-top-30">
                                    <div class="crancy-ecom-card crancy-ecom-card__v2">
                                        <div class="flex-main">
                                            <span>
                                                @include('paymentwithdraw::seller.svg.pending_withdraw')
                                            </span>
                                            <div class="flex-1">
                                                <div class="crancy-ecom-card__heading">
                                                    <div class="crancy-ecom-card__icon">
                                                        <h4 class="crancy-ecom-card__title">{{ __('translate.Pending Withdraw') }} </h4>
                                                    </div>

                                                </div>
                                                <div class="crancy-ecom-card__content">
                                                    <div class="crancy-ecom-card__camount">
                                                        <div class="crancy-ecom-card__camount__inside">
                                                            <h3 class="crancy-ecom-card__amount">{{ currency($pending_withdraw) }}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-3 col-md-6 col-12 mg-top-30">
                                    <div class="crancy-ecom-card crancy-ecom-card__v2">
                                        <div class="flex-main">
                                            <span>
                                                @include('instructor.svg.total_sold')
                                            </span>
                                            <div class="flex-1">
                                                <div class="crancy-ecom-card__heading">
                                                    <div class="crancy-ecom-card__icon">
                                                        <h4 class="crancy-ecom-card__title">{{ __('translate.Total Sold') }} </h4>
                                                    </div>

                                                </div>
                                                <div class="crancy-ecom-card__content">
                                                    <div class="crancy-ecom-card__camount">
                                                        <div class="crancy-ecom-card__camount__inside">
                                                            <h3 class="crancy-ecom-card__amount">{{ $course_sale_qty }}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-3 col-md-6 col-12 mg-top-30">
                                    <div class="crancy-ecom-card crancy-ecom-card__v2">
                                        <div class="flex-main">
                                            <span>
                                                @include('instructor.svg.total_active_course')
                                            </span>
                                            <div class="flex-1">
                                                <div class="crancy-ecom-card__heading">
                                                    <div class="crancy-ecom-card__icon">
                                                        <h4 class="crancy-ecom-card__title">{{ __('translate.Active Course') }} </h4>
                                                    </div>

                                                </div>
                                                <div class="crancy-ecom-card__content">
                                                    <div class="crancy-ecom-card__camount">
                                                        <div class="crancy-ecom-card__camount__inside">
                                                            <h3 class="crancy-ecom-card__amount">{{ $total_active_course }}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>





                            </div>


                            <div class="row crancy-gap-30">
                                <div class="col-12">
                                    <!-- Charts One -->
                                    <div class="charts-main charts-home-one mg-top-30">
                                        <!-- Top Heading -->
                                        <div class="charts-main__heading  mg-btm-20">
                                            <h4 class="charts-main__title">{{ __('translate.Enrollment Statitics') }}</h4>

                                        </div>
                                        <div class="charts-main__one">
                                            <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="crancy-chart__s1" role="tabpanel" aria-labelledby="crancy-chart__s1">
                                                    <div class="crancy-chart__inside crancy-chart__three">
                                                        <!-- Chart One -->
                                                        <canvas id="myChart_recent_statics"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Charts One -->
                                </div>
                            </div>

                            <div class="crancy-table crancy-table--v3 mg-top-30">

                                <div class="crancy-customer-filter">
                                    <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch d-flex items-center justify-between create_new_btn_box">
                                        <div class="crancy-header__form crancy-header__form--customer create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Latest Enrollments') }}</h4>
                                        </div>
                                    </div>
                                </div>

                                <!-- crancy Table -->
                                <div id="crancy-table__main_wrapper" class="dt-bootstrap5 no-footer">

                                    <table class="crancy-table__main crancy-table__main-v3  no-footer">
                                        <!-- crancy Table Head -->
                                        <thead class="crancy-table__head">

                                            <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                {{ __('translate.Serial') }}
                                            </th>


                                            <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                {{ __('translate.Invoice') }}
                                            </th>

                                            <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                {{ __('translate.Student') }}
                                            </th>

                                            <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                {{ __('translate.Course') }}
                                            </th>

                                            <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                {{ __('translate.Date') }}
                                            </th>



                                            <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                {{ __('translate.Payment') }}
                                            </th>

                                            <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                {{ __('translate.Total Amount') }}
                                            </th>

                                            <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                {{ __('translate.Revenue') }}
                                            </th>

                                            <th class="crancy-table__column-3 crancy-table__h3 sorting">
                                                {{ __('translate.Commission') }}
                                            </th>

                                        </thead>

                                        <!-- crancy Table Body -->
                                        <tbody class="crancy-table__body">
                                            @foreach ($enrollments as $index => $enrollment)
                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ ++$index }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">#{{ $enrollment?->course_enrollment?->order_id }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ html_decode($enrollment?->course_enrollment?->student?->name) }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title"><a href="{{ route('instructor.courses.edit', ['course' => $enrollment->course_id, 'lang_code' => admin_lang()] ) }}" target="_blank">{{ html_decode($enrollment?->course?->title) }}</a></h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ $enrollment->created_at->format('d M, Y') }}</h4>
                                                    </td>



                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        @if ($enrollment?->course_enrollment?->payment_status == 'success')
                                                            <div class="crancy-table__status crancy-table__status--paid">{{ __('translate.Success') }}</div>
                                                        @elseif ($enrollment?->course_enrollment?->payment_status == 'rejected')
                                                            <div class="crancy-table__status crancy-table__status--delete">{{ __('translate.Rejected') }}</div>
                                                        @else
                                                            <div class="crancy-table__status crancy-table__status--unpaid">{{ __('translate.Pending') }}</div>
                                                        @endif
                                                    </td>


                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                            {{ currency($enrollment->total_amount) }}
                                                        </h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                            @if ($enrollment?->course_enrollment?->payment_status == 'success')
                                                            {{ currency(revenue_calculate($enrollment->total_amount)) }}
                                                            @else
                                                                ---
                                                            @endif
                                                        </h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                            @if ($enrollment?->course_enrollment?->payment_status == 'success')
                                                            {{ currency(commission_calculate($enrollment->total_amount)) }}
                                                            @else
                                                            ---
                                                            @endif
                                                        </h4>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                        <!-- End crancy Table Body -->
                                    </table>

                                </div>
                                <!-- End crancy Table -->
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



@push('js_section')
    <script src="{{ asset('backend/js/charts.js') }}"></script>

    <script>
        "use strict";

        let purchase_data = @json($data);
		purchase_data = JSON.parse(purchase_data);

        let date_lable = @json($lable);
		date_lable = JSON.parse(date_lable);

        // Chart Three
        const ctx_myChart_recent_statics = document.getElementById('myChart_recent_statics').getContext('2d');
        const gradientBgs = ctx_myChart_recent_statics.createLinearGradient(400, 100, 100, 400);

        gradientBgs.addColorStop(0, 'rgba(100, 64, 251, 0.1');
        gradientBgs.addColorStop(1, 'rgba(100, 64, 251, 0.5)');

        const myChart_recent_statics = new Chart(ctx_myChart_recent_statics, {
            type: 'line',

            data: {

                labels: date_lable,
                datasets: [{
                    label: 'Sells',
                    data: purchase_data,
                    backgroundColor: gradientBgs,
                    borderColor: '#6440FBFF',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    fillColor: '#fff',
                    fill: 'start',
                    pointRadius: 2,
                }]
            },

            options: {
                maintainAspectRatio: false,
                responsive: true,
                scales: {
                    x: {
                        ticks: {
                            color: '#6440FBFF',
                        },
                        grid: {
                            display: false,
                            drawBorder: false,
                            color: '#E6F3FF',
                        },
                        suggestedMax: 100,
                        suggestedMin: 50,

                    },
                    y: {
                        ticks: {
                            color: '#6440FBFF',
                            callback: function(value, index, values) {
                                return (value / 10) * 10 + '$';
                            }
                        },
                        grid: {
                            drawBorder: false,
                            color: '#D7DCE7',
                            borderDash: [5, 5]
                        },
                    },
                },
                plugins: {
                    tooltip: {
                        padding: 10,
                        displayColors: true,
                        yAlign: 'bottom',
                        backgroundColor: '#fff',
                        titleColor: '#000',
                        titleFont: {
                            weight: 'normal'
                        },
                        bodyColor: '#2F3032',
                        cornerRadius: 12,
                        boxPadding: 3,
                        usePointStyle: true,
                        borderWidth: 0,
                        font: {
                            size: 14
                        },
                        caretSize: 9,
                        bodySpacing: 100,
                    },
                    legend: {
                        position: 'bottom',
                        display: false,
                    },
                    title: {
                        display: false,
                        text: "{{ __('translate.Enrollments') }}"
                    }
                }
            }
        });

    </script>
@endpush
