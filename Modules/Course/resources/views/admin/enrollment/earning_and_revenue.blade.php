@extends('admin.master_layout')
@section('title')
    <title>{{ $title }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ $title }}</h3>
    <p class="crancy-header__text">{{ __('translate.Dashboard') }} >> {{ $title }}</p>
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
                            <form action="">
                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <div class="crancy-product-card">
                                            <div class="row align-items-md-end">
                                                <div class="col-xxl-3 col-md-4 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Invoice Id') }} </label>
                                                        <input class="crancy__item-input" type="text" name="order_id" id="order_id" autocomplete="off" value="{{ request()->get('order_id') }}">
                                                    </div>
                                                </div>

                                                <div class="col-xxl-3 col-md-4 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Instructor') }}</label>
                                                        <select class="form-select crancy__item-input" name="instructor_id">
                                                            <option value="">{{ __('translate.Select') }}</option>
                                                            @foreach ($instructors as $instructor)
                                                                <option  {{ $instructor->id == request()->get('instructor_id') ? 'selected' : '' }} value="{{ $instructor->id }}">{{ html_decode($instructor->name) }} - {{ $instructor->email }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-xxl-3 col-md-4 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Student') }} </label>
                                                        <select class="form-select crancy__item-input" name="student_id">
                                                            <option value="">{{ __('translate.Select') }}</option>
                                                            @foreach ($students as $student)
                                                                <option  {{ $student->id == request()->get('student_id') ? 'selected' : '' }} value="{{ $student->id }}">{{ html_decode($student->name) }} - {{ $student->email }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-xxl-3 col-md-4 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Course') }} </label>
                                                        <select class="form-select crancy__item-input" name="course_id">
                                                            <option value="">{{ __('translate.Select') }}</option>
                                                            @foreach ($courses as $course)
                                                                <option  {{ $course->id == request()->get('course_id') ? 'selected' : '' }} value="{{ $course->id }}">{{ html_decode($course->title) }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-xxl-3 col-md-4 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Start Date') }} </label>
                                                        <input class="crancy__item-input datepicker" type="text" name="start_date" id="start_date" autocomplete="off" value="{{ request()->get('start_date') }}">
                                                    </div>
                                                </div>

                                                <div class="col-xxl-3 col-md-4 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.End Date') }} </label>
                                                        <input class="crancy__item-input datepicker" type="text" name="end_date" id="end_date" autocomplete="off" value="{{ request()->get('end_date') }}">
                                                    </div>
                                                </div>


                                                <div class="col-xxl-3 col-md-4 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Sort By') }} </label>
                                                        <select class="form-select crancy__item-input" name="sort_by">
                                                            <option {{ request()->get('sort_by') == 'latest' ? 'selected' : '' }} value="latest">{{ __('translate.Latest') }}</option>
                                                            <option {{ request()->get('sort_by') == 'oldest' ? 'selected' : '' }} value="oldest">{{ __('translate.Oldest') }}</option>
                                                            <option {{ request()->get('sort_by') == 'amount_asc_to_des' ? 'selected' : '' }} value="amount_asc_to_des">{{ __('translate.ASC to DESC (Amount)') }}</option>
                                                            <option {{ request()->get('sort_by') == 'amount_desc_to_asc' ? 'selected' : '' }} value="amount_desc_to_asc">{{ __('translate.DESC to ASC (Amount)') }}</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="crancy__item-form--group">
                                                        <button class="crancy-btn mg-top-25" type="submit">{{ __('translate.Filter Now') }}</button>
                                                    </div>
                                                </div>

                                            </div>



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


            <div class="row row__bscreen">
                <div class="col-xxl-3 col-md-6 col-12 mg-top-30">
                    <div class="crancy-ecom-card crancy-ecom-card__v2">
                        <div class="flex-main">
                            <span>
                                @include('course::admin.svg.total_sale')
                            </span>
                            <div class="flex-1">
                                <div class="crancy-ecom-card__heading">
                                    <div class="crancy-ecom-card__icon">
                                        <h4 class="crancy-ecom-card__title">{{ __('translate.Total Sale') }} </h4>
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
                                @include('course::admin.svg.admin_earning')
                            </span>
                            <div class="flex-1">
                                <div class="crancy-ecom-card__heading">
                                    <div class="crancy-ecom-card__icon">
                                        <h4 class="crancy-ecom-card__title">{{ __('translate.Admin Earnings') }} </h4>
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
                                @include('course::admin.svg.instructor_earning')
                            </span>
                            <div class="flex-1">
                                <div class="crancy-ecom-card__heading">
                                    <div class="crancy-ecom-card__icon">
                                        <h4 class="crancy-ecom-card__title">{{ __('translate.Instructor Earnings') }} </h4>
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
                                @include('course::admin.svg.total_sold')
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
                                            <h3 class="crancy-ecom-card__amount">{{ $total_sold }}</h3>
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
                                            <h4 class="crancy-product-card__title">{{ $title }}</h4>

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
                                                    {{ __('translate.Student') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Instructor') }}
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
                                                    {{ __('translate.Instructor Earning') }}
                                                </th>

                                                <th class="crancy-table__column-3 crancy-table__h3 sorting">
                                                    {{ __('translate.Admin Earning') }}
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

                                                        <h4 class="crancy-table__product-title"><a target="_blank" href="{{ route('admin.course-enrollment', $enrollment?->course_enrollment?->order_id ?? 0) }}">#{{ $enrollment?->course_enrollment?->order_id }}</a></h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">


                                                        <h4 class="crancy-table__product-title"><a target="_blank" href="{{ route('admin.user-show', $enrollment?->course_enrollment?->student_id ?? 0) }}">{{ html_decode($enrollment?->course_enrollment?->student?->name) }}</a></h4>

                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">

                                                        <h4 class="crancy-table__product-title"><a target="_blank" href="{{ route('admin.seller-show', $enrollment->instructor_id) }}">{{ html_decode($enrollment?->instructor?->name) }}</a></h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title"><a href="{{ route('admin.courses.edit', ['course' => $enrollment->course_id, 'lang_code' => admin_lang()] ) }}" target="_blank">{{ Str::limit(html_decode($enrollment?->course?->title), 40) }}</a></h4>
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
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->

@endsection


@push('style_section')

<link rel="stylesheet" href="{{ asset('global/datepicker/bootstrap-datepicker.min.css') }}">
    <style>
        .datepicker.datepicker-dropdown{
            z-index: 10000 !important;
        }
    </style>
@endpush

@push('js_section')
<script src="{{ asset('global/datepicker/bootstrap-datepicker.min.js') }}"></script>

<script>
    (function($) {
        "use strict"
        $(document).ready(function () {
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd'
            });
        });
    })(jQuery);

</script>


@endpush
