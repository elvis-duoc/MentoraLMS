@extends('student.master_layout')
@section('title')
    <title>{{ __('translate.Dashboard') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Dashboard') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Dashboard') }} >> {{ __('translate.Dashboard') }}</p>
@endsection

@section('body-content')
    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">

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
                                        <h4 class="crancy-ecom-card__title">{{ __('translate.Enrolled Course') }} </h4>
                                    </div>

                                </div>
                                <div class="crancy-ecom-card__content">
                                    <div class="crancy-ecom-card__camount">
                                        <div class="crancy-ecom-card__camount__inside">
                                            <h3 class="crancy-ecom-card__amount">{{ $enrolled_corse }}</h3>
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
                                        <h4 class="crancy-ecom-card__title">{{ __('translate.Transaction') }} </h4>
                                    </div>

                                </div>
                                <div class="crancy-ecom-card__content">
                                    <div class="crancy-ecom-card__camount">
                                        <div class="crancy-ecom-card__camount__inside">
                                            <h3 class="crancy-ecom-card__amount">{{ currency($complete_transaction) }}</h3>
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
                                @include('course::instructor.svg.net_earning')
                            </span>
                            <div class="flex-1">
                                <div class="crancy-ecom-card__heading">
                                    <div class="crancy-ecom-card__icon">
                                        <h4 class="crancy-ecom-card__title">{{ __('translate.Support Ticket') }} </h4>
                                    </div>

                                </div>
                                <div class="crancy-ecom-card__content">
                                    <div class="crancy-ecom-card__camount">
                                        <div class="crancy-ecom-card__camount__inside">
                                            <h3 class="crancy-ecom-card__amount">{{ $support_tickets }}</h3>
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
                                @include('course::instructor.svg.wishlist_icon')
                            </span>
                            <div class="flex-1">
                                <div class="crancy-ecom-card__heading">
                                    <div class="crancy-ecom-card__icon">
                                        <h4 class="crancy-ecom-card__title">{{ __('translate.Wishlist') }} </h4>
                                    </div>

                                </div>
                                <div class="crancy-ecom-card__content">
                                    <div class="crancy-ecom-card__camount">
                                        <div class="crancy-ecom-card__camount__inside">
                                            <h3 class="crancy-ecom-card__amount">{{ $wishlists }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">

                            <div class="crancy-table crancy-table--v3 mg-top-30">

                                <div class="crancy-customer-filter">
                                    <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch d-flex items-center justify-between create_new_btn_box">
                                        <div class="crancy-header__form crancy-header__form--customer create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Latest Transaction') }}</h4>

                                        </div>
                                    </div>
                                </div>


                                <!-- crancy Table -->
                                <div id="crancy-table__main_wrapper" class=" dt-bootstrap5 no-footer">

                                    <table class="crancy-table__main crancy-table__main-v3  no-footer" id="dataTable">
                                        <!-- crancy Table Head -->
                                        <thead class="crancy-table__head">
                                            <tr>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Serial') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Invoice') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Course') }}
                                                </th>


                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Date') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Total Amount') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Payment') }}
                                                </th>

                                                 <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Action') }}
                                                </th>



                                            </tr>
                                        </thead>

                                        <!-- crancy Table Body -->
                                        <tbody class="crancy-table__body">
                                            @foreach ($enrollments as $index => $enrollment)
                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ ++$index }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">#{{ $enrollment?->order_id }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ $enrollment?->course_list?->count() }}</h4>
                                                    </td>


                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ $enrollment->created_at->format('d M, Y') }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                            {{ currency($enrollment->total_amount) }}
                                                        </h4>
                                                    </td>


                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        @if ($enrollment?->payment_status == 'success')
                                                            <div class="crancy-table__status crancy-table__status--paid">{{ __('translate.Success') }}</div>
                                                        @elseif ($enrollment?->payment_status == 'rejected')
                                                            <div class="crancy-table__status crancy-table__status--delete">{{ __('translate.Rejected') }}</div>
                                                        @else
                                                            <div class="crancy-table__status crancy-table__status--unpaid">{{ __('translate.Pending') }}</div>
                                                        @endif
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <a href="{{ route('student.invoice', $enrollment->order_id) }}" class="crancy-btn"><i class="fas fa-eye"></i> {{ __('translate.Details') }}</a>
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
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->

@endsection

