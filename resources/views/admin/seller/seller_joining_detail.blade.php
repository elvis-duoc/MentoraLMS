@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Instructor Joining Details') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Instructor Joining Details') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Dashboard') }} >> {{ __('translate.Instructor Joining Details') }}</p>
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
                                    <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch">
                                        <div class="crancy-header__form crancy-header__form--customer">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Instructor Joining Details') }}</h4>
                                        </div>
                                    </div>
                                </div>

                                <!-- crancy Table -->
                                <div id="crancy-table__main_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                                    <table class="crancy-table__main crancy-table__main-v3 dataTable no-footer">

                                        <!-- crancy Table Body -->
                                        <tbody class="crancy-table__body review-detials">

                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ __('translate.Name') }}</h4>
                                                    </td>


                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title"><a target="_blank" href="{{ route('admin.user-show', $user->id) }}">{{ html_decode($user->name) }}</a></h4>
                                                    </td>


                                                </tr>

                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ __('translate.Email') }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ html_decode($user->email) }}</h4>
                                                    </td>

                                                </tr>

                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ __('translate.Phone') }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ html_decode($user->phone) }}</h4>
                                                    </td>

                                                </tr>


                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ __('translate.Gender') }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ html_decode($user->gender) }}</h4>
                                                    </td>

                                                </tr>



                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ __('translate.Experience') }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ html_decode($user->instructor_experience) }} {{ __('translate.Years') }}</h4>
                                                    </td>

                                                </tr>



                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ __('translate.Designation') }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ html_decode($user->designation) }}</h4>
                                                    </td>

                                                </tr>

                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ __('translate.Bio') }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ html_decode($user->about_me) }}</h4>
                                                    </td>

                                                </tr>

                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ __('translate.Country') }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ html_decode($user->country) }}</h4>
                                                    </td>

                                                </tr>

                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ __('translate.State') }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ html_decode($user->state) }}</h4>
                                                    </td>

                                                </tr>

                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ __('translate.City') }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ html_decode($user->city) }}</h4>
                                                    </td>

                                                </tr>

                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ __('translate.Address') }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ html_decode($user->address) }}</h4>
                                                    </td>

                                                </tr>

                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ __('translate.Facebook') }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title"><a target="_blank" href="{{ html_decode($user->facebook) }}">{{ html_decode($user->facebook) }}</a></h4>
                                                    </td>

                                                </tr>

                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ __('translate.Linkedin') }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title"><a target="_blank" href="{{ html_decode($user->linkedin) }}">{{ html_decode($user->linkedin) }}</a></h4>
                                                    </td>

                                                </tr>

                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ __('translate.Twitter') }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title"><a target="_blank" href="{{ html_decode($user->twitter) }}">{{ html_decode($user->twitter) }}</a></h4>
                                                    </td>

                                                </tr>

                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ __('translate.Instagram') }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title"><a target="_blank" href="{{ html_decode($user->instagram) }}">{{ html_decode($user->instagram) }}</a></h4>
                                                    </td>

                                                </tr>

                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ __('translate.Skills & Expertise') }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">

                                                        <h4 class="crancy-table__product-title">
                                                            @foreach ($skills_expertises ?? [] as $index => $skills_expertise)
                                                                <p> <b>{{ $skills_expertise->skill }}</b> : {{ $skills_expertise->expertise }}%</p> <br>
                                                            @endforeach
                                                        </h4>
                                                    </td>

                                                </tr>

                                        </tbody>
                                        <!-- End crancy Table Body -->
                                    </table>

                                    @if ($user->instructor_joining_request == 'pending')
                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#reviewApproval" class="crancy-btn approval_button"><i class="fas fa-check"></i> {{ __('translate.Make Approval') }}</a>

                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#reviewRejected" class="crancy-btn"><i class="fas fa-check"></i> {{ __('translate.Make Reject') }}</a>
                                    @endif
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


    <!-- Approval Confirmation Modal -->
    <div class="modal fade" id="reviewApproval" tabindex="-1" aria-labelledby="reviewApprovalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reviewApprovalLabel">{{ __('translate.Approval Confirmation') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('translate.Are you realy want to approved this application?') }}</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.seller-joining-approval', $user->id) }}" class="delet_modal_form" method="POST">
                        @csrf
                        @method('PUT')

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
            <form class="modal-content" action="{{ route('admin.seller-joining-reject', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
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

@endsection
