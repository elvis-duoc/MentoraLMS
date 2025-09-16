@extends('admin.master_layout')
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
                                                                            <div class="ed-inv-paid-status"><span>{{ __('translate.Success') }}</span></div>
                                                                        @elseif ($enrollment->payment_status == 'rejected')
                                                                            <div class="ed-inv-paid-status rejected"><span>{{ __('translate.Rejected') }}</span></div>
                                                                        @else
                                                                            <div class="ed-inv-paid-status pending"><span>{{ __('translate.Pending') }}</span></div>
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

                                                @if ($enrollment->payment_status == 'pending')
                                                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#reviewApproval" class="crancy-btn approval_button"><i class="fas fa-check"></i> {{ __('translate.Payment Approval') }}</a>

                                                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#reviewRejected" class="crancy-btn"><i class="fas fa-check"></i> {{ __('translate.Payment Reject') }}</a>
                                            @elseif ($enrollment->payment_status == 'rejected')
                                                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#reviewApproval" class="crancy-btn approval_button"><i class="fas fa-check"></i> {{ __('translate.Payment Approval') }}</a>
                                            @endif

                                            <a onclick="itemDeleteConfrimation({{ $enrollment->id }})" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal" class="crancy-btn delete_danger_btn"><i class="fas fa-trash"></i> </a>

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


        <!-- Approval Confirmation Modal -->
        <div class="modal fade" id="reviewApproval" tabindex="-1" aria-labelledby="reviewApprovalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reviewApprovalLabel">{{ __('translate.Approval Confirmation') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>{{ __('translate.Are you realy want to approved this payment?') }}</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('admin.enrollment-payment-approved', $enrollment->id) }}" class="delet_modal_form" method="POST">
                            @csrf

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('translate.Close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('translate.Yes, Approved') }}</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Approval Confirmation Modal -->
        <div class="modal fade" id="reviewRejected" tabindex="-1" aria-labelledby="reviewRejectedLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" action="{{ route('admin.enrollment-payment-rejected', $enrollment->id) }}" method="POST">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" id="reviewRejectedLabel">{{ __('translate.Rejected Confirmation') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="crancy__item-form--group">
                            <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Write reason') }}</label>

                            <textarea class="crancy__item-input crancy__item-textarea seo_description_box"  name="reason" id="reason" required></textarea>

                        </div>
                    </div>
                    <div class="modal-footer delet_modal_form">
                        <button type="submit" class="btn btn-primary">{{ __('translate.Submit') }}</button>
                    </div>
                </form>

            </div>
        </div>

      <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('translate.Delete Confirmation') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>{{ __('translate.Are you realy want to delete this item?') }}</p>
                    </div>
                    <div class="modal-footer">
                        <form action="" id="item_delect_confirmation" class="delet_modal_form" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('translate.Close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('translate.Yes, Delete') }}</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection


@push('js_section')
    <script>
        "use strict"
        function itemDeleteConfrimation(id){
            $("#item_delect_confirmation").attr("action",'{{ url("admin/course-enrollment-delete/") }}'+"/"+id)
        }
    </script>
@endpush


