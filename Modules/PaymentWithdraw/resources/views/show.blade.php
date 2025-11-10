@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Withdraw Detail') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Withdraw Detail') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Manage Withdraw') }} >> {{ __('translate.Withdraw Detail') }}</p>
@endsection

@section('body-content')
    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">

                            <div class="crancy-table crancy-table--v3 mg-top-30">

                                <div class="crancy-customer-filter">
                                    <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch d-flex items-center justify-between create_new_btn_box">
                                        <div class="crancy-header__form crancy-header__form--customer create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Withdraw Detail') }}</h4>

                                        </div>
                                    </div>
                                </div>

                                <!-- crancy Table -->
                                <div id="crancy-table__main_wrapper" class=" dt-bootstrap5 no-footer">

                                    <table class="crancy-table__main crancy-table__main-v3 no-footer">

                                        <!-- crancy Table Body -->
                                        <tbody class="crancy-table__body review-detials">


                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.Seller') }}</h4>
                                                </td>

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title"><a href="{{ route('admin.seller-show', $withdraw->seller_id) }}">{{ html_decode($withdraw?->seller?->name) }}</a></h4>
                                                </td>
                                            </tr>


                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.Total Amount') }}</h4>
                                                </td>

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ currency($withdraw->total_amount) }}</h4>
                                                </td>
                                            </tr>

                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.Withdraw Amount') }}</h4>
                                                </td>

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ currency($withdraw->withdraw_amount) }}</h4>
                                                </td>
                                            </tr>

                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.Withdraw Charge') }}</h4>
                                                </td>

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ currency($withdraw->charge_amount) }}</h4>
                                                </td>
                                            </tr>

                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.Crated at') }}</h4>
                                                </td>


                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">
                                                        {{ $withdraw->created_at->format('d F Y') }}
                                                    </h4>
                                                </td>

                                            </tr>

                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.Withdraw Method') }}</h4>
                                                </td>


                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">
                                                        {{ $withdraw->withdraw_method_name }}
                                                    </h4>
                                                </td>

                                            </tr>


                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.Bank/Account Info') }}</h4>
                                                </td>

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{!! clean(nl2br(html_decode($withdraw->description))) !!}</h4>
                                                </td>
                                            </tr>

                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.Status') }}</h4>
                                                </td>

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    @if ($withdraw->status == 'approved')
                                                            <div class="crancy-table__status crancy-table__status--paid">{{ __('translate.Approved') }}</div>
                                                        @elseif ($withdraw->status == 'rejected')
                                                            <div class="crancy-table__status crancy-table__status--delete">{{ __('translate.Rejected') }}</div>
                                                        @else
                                                            <div class="crancy-table__status crancy-table__status--unpaid">{{ __('translate.Pending') }}</div>
                                                        @endif
                                                </td>
                                            </tr>





                                            <tr class="odd">

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.Action') }}</h4>
                                                </td>

                                                <td class="crancy-table__column-2 crancy-table__data-2">



                                                    @if ($withdraw->status == 'pending')
                                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#reviewApproval" class="crancy-btn approval_button"><i class="fas fa-check"></i> {{ __('translate.Make Approval') }}</a>

                                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#reviewRejected" class="crancy-btn"><i class="fas fa-check"></i> {{ __('translate.Make Reject') }}</a>
                                                    @endif

                                                    <a onclick="itemDeleteConfrimation({{ $withdraw->id }})" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal" class="crancy-btn delete_danger_btn"><i class="fas fa-trash"></i> </a>


                                                </td>
                                            </tr>


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
                    <form action="{{ route('admin.withdraw-list.destroy', $withdraw->id) }}" id="item_delect_confirmation" class="delet_modal_form" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('translate.Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('translate.Yes, Delete') }}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Approval Confirmation Modal -->
    <div class="modal fade" id="reviewApproval" tabindex="-1" aria-labelledby="reviewApprovalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reviewApprovalLabel">{{ __('translate.Approval Confirmation') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('translate.Are you realy want to approved this withdraw?') }}</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.withdraw-approval', $withdraw->id) }}" class="delet_modal_form" method="POST">
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
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reviewRejectedLabel">{{ __('translate.Rejected Confirmation') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('translate.Are you realy want to rejected this withdraw?') }}</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.withdraw-rejected', $withdraw->id) }}" class="delet_modal_form" method="POST">
                        @csrf

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('translate.Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('translate.Yes, Rejected') }}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>





@endsection


