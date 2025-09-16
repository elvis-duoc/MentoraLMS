@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Withdraw List') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Withdraw List') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Manage Withdraw') }} >> {{ __('translate.Withdraw List') }}</p>
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
                                            <h4 class="crancy-product-card__title">{{ __('translate.Withdraw List') }}</h4>

                                        </div>
                                    </div>
                                </div>

                                <!-- crancy Table -->
                                <div id="crancy-table__main_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                                    <table class="crancy-table__main crancy-table__main-v3 dataTable no-footer" id="dataTable">
                                        <!-- crancy Table Head -->
                                        <thead class="crancy-table__head">
                                            <tr>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Serial') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Seller Name') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Total Amount') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Withdraw Amount') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Withdraw Charge') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Status') }}
                                                </th>

                                                <th class="crancy-table__column-3 crancy-table__h3 sorting">
                                                    {{ __('translate.Action') }}
                                                </th>

                                            </tr>
                                        </thead>
                                        <!-- crancy Table Body -->
                                        <tbody class="crancy-table__body">
                                            @foreach ($withdraw_list as $index => $withdraw)

                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ ++$index }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                            <a href="{{ route('admin.seller-show', $withdraw->seller_id) }}">{{ $withdraw?->seller?->name }}</a>
                                                        </h4>
                                                    </td>


                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ currency($withdraw->total_amount) }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ currency($withdraw->withdraw_amount) }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ currency($withdraw->charge_amount) }}</h4>
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

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <a href="{{ route('admin.withdraw-list.show', $withdraw->id) }}" class="crancy-btn"><i class="fas fa-eye"></i> {{ __('translate.Show') }}</a>

                                                        <a onclick="itemDeleteConfrimation({{ $withdraw->id }})" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal" class="crancy-btn delete_danger_btn"><i class="fas fa-trash"></i> </a>
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
            $("#item_delect_confirmation").attr("action",'{{ url("admin/withdraw-list/") }}'+"/"+id)
        }
    </script>
@endpush
