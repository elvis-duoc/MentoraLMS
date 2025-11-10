@extends('student.master_layout')
@section('title')
    <title>{{ __('translate.Invoice') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Invoice') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Dashboard') }} >> {{ __('translate.Invoice') }}</p>
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

                           <div class="row">
                            <div class="col-12 mg-top-30">
                               <div class="ed-invoice-page-wrapper">
                                <div class="ed-invoice-main-wrapper">

                                    <div class="ed-invoice-page">
                                        <div class="ed-inv-logo-area">
                                            <div class="ed-main-logo">
                                                <img src="{{ asset($general_setting->logo) }}" alt="logo" class="ed-logo">
                                            </div>
                                            <div>

                                            </div>
                                        </div>
                                        <div class="ed-inv-billing-info">
                                            <div class="ed-inv-info">
                                                <p class="ed-inv-info-title">{{ __('translate.Billed To') }}</p>
                                                <table>
                                                    <tr>
                                                        <td>{{ __('translate.Name') }}:</td>
                                                        <td> {{ html_decode($enrollment?->student?->name) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('translate.Phone') }}:</td>
                                                        <td>{{ html_decode($enrollment?->student?->phone) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('translate.Email') }}:</td>
                                                        <td>{{ html_decode($enrollment?->student?->email) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('translate.Address') }}:</td>
                                                        <td>{{ html_decode($enrollment?->student?->address) }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="ed-inv-more-info">
                                                <table>

                                                    <tr>
                                                        <td>{{ __('translate.Payment Status') }}:</td>
                                                        <td>
                                                             <div class="d-flex justify-content-start">
                                                                @if ($enrollment->payment_status == 'success')
                                                                    <div class="ed-inv-paid-status "><span>{{ __('translate.Success') }}</span></div>
                                                                @elseif ($enrollment->payment_status == 'rejected')
                                                                    <div class="ed-inv-paid-status rejected"><span>{{ __('translate.Rejected') }}</span></div>
                                                                @else
                                                                    <div class="ed-inv-paid-status pending "><span>{{ __('translate.Pending') }}</span></div>
                                                                @endif

                                                             </div>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('translate.Invoice No') }}:</td>
                                                        <td>#{{ $enrollment->order_id }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>{{ __('translate.Created at') }}:</td>
                                                        <td>{{ $enrollment->created_at->format('d M, Y') }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>{{ __('translate.Gateway') }}:</td>
                                                        <td>{{ html_decode($enrollment->payment_method) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('translate.Transaction') }}:</td>
                                                        <td>{!! clean($enrollment->transaction_id) !!}</td>
                                                    </tr>


                                                </table>
                                            </div>
                                        </div>
                                        <div class="ed-inv-table-content">
                                           <p class="ed-inv-table-headline">{{ __('translate.Course List') }} </p>
                                           <div class="ed-inv-invoice-table-main-wrapper">
                                           <div class="ed-inv-invoice-table-wrapper">
                                           <table class="ed-inv-invoice-table">
                                                <thead>
                                                    <tr>
                                                        <th >
                                                            {{ __('translate.SN') }}
                                                        </th>

                                                        <th >
                                                            {{ __('translate.Instructor') }}
                                                        </th>

                                                        <th >
                                                            {{ __('translate.Course') }}
                                                        </th>

                                                        <th>
                                                            {{ __('translate.Amount') }}
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($course_list as $index => $course_item)
                                                        <tr>
                                                            <td>{{ ++$index }}</td>
                                                            <td>{{ html_decode($course_item?->instructor?->name) }}</td>
                                                            <td>{{ html_decode($course_item?->course?->title) }}</td>
                                                            <td>{{ currency($course_item->total_amount) }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                           </div>
                                        </div>
                                           </div>
                                        <div class="ed-inv-billing-summary d-flex justify-content-md-end  ">
                                            <div class="ed-inv-summary-wrapper">
                                                <table>
                                                    <tr>
                                                        <td>{{ __('translate.Subtotal') }}:</td>
                                                        <td>{{ currency($enrollment->sub_total_amount) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('translate.Discount') }}(-):</td>
                                                        <td>{{ currency($enrollment->coupon_amount) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <div class="ed-summry-total-sparetor"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('translate.Total') }}:</td>
                                                        <td>{{ currency($enrollment->total_amount) }}</td>
                                                    </tr>
                                                </table>
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
    <!-- End crancy Dashboard -->
@endsection

