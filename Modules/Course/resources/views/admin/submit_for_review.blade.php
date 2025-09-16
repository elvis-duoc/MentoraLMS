@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Submit for Review') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Submit for Review') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Manage Course') }} >> {{ __('translate.Submit for Review') }}</p>
@endsection

@section('body-content')

    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row row__bscreen">
                <div class="col-12">
                    <div class="crancy-body">

                        <div class="crancy-psidebar edc-edit-course-sidebar">
                            @include('course::admin.course_sidebar')

                        </div>

                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <div class="crancy-personals mg-top-30">
                                <div class="crancy-ptabs edc-edit-course-body">

                                    <div class="crancy-ptabs__inner mb-5">

                                        <div class="row">
                                            <div class="col-12">
                                                <h4>{{ __('translate.Instructor Message') }}:</h4>
                                                <p>{{ html_decode($course->submit_review_message) }}</p>

                                            </div>
                                        </div>

                                    </div>

                                    @if ($course->approved_by_admin == 'pending')
                                        {{-- <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#reviewApproval" class="crancy-btn approval_button"><i class="fas fa-check"></i> {{ __('translate.Make Approval') }}</a> --}}

                                        {{-- <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#reviewRejected" class="crancy-btn"><i class="fas fa-check"></i> {{ __('translate.Make Reject') }}</a> --}}


                                        <button class="crancy-btn mg-top-25" data-bs-toggle="modal" data-bs-target="#reviewApproval" type="button">{{ __('translate.Make Approval') }}</button>

                                        <button class="crancy-btn edc-crs-step-save-btn  mg-top-25" data-bs-toggle="modal" data-bs-target="#reviewRejected" type="button">{{ __('translate.Make Reject') }}</button>

                                    @endif

                                </div>

                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>



<!-- Approval Confirmation Modal -->
<div class="modal fade" id="reviewApproval" tabindex="-1" aria-labelledby="reviewApprovalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewApprovalLabel">{{ __('translate.Approval Confirmation') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>{{ __('translate.Are you realy want to approved this course?') }}</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.course-approved', $course->id) }}" class="delet_modal_form" method="POST">
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
        <form class="modal-content" action="{{ route('admin.course-rejected', $course->id) }}" method="POST">
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

@endsection


