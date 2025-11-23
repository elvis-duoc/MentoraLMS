@extends('instructor.master_layout')
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
                            @include('course::instructor.course_sidebar')

                        </div>

                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <div class="crancy-personals mg-top-30">
                                <div class="crancy-ptabs edc-edit-course-body">

                                    <form action="{{ route('instructor.store-submit-review', $course->id) }}"
                                          method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="crancy-ptabs__inner">

                                            @if ($course->approved_by_admin == 'draft' || $course->approved_by_admin == 'rejected')

                                                <div class="row">

                                                    <div class="col-12">
                                                        <div class="crancy__item-form--group">
                                                            <label
                                                                class="crancy__item-label">{{ __('translate.Message to the Reviewer') }}
                                                                * </label>
                                                            <textarea
                                                                class="crancy__item-input crancy__item-textarea seo_description_box"
                                                                name="submit_review_message" id="submit_review_message"
                                                                required>{{ old('submit_review_message') }}</textarea>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="d-flex justify-content-end">

                                                    <div>
                                                        @if (request()->has('req_type') && request()->get('req_type') == 'from_create')
                                                            <a class="crancy-btn next-btn mg-top-25"
                                                               href="{{ route('instructor.course-seo', ['course_id' => $course->id, 'req_type' => 'from_create'] ) }}">
                                                                 {{ __('translate.Previous') }}
                                                            </a>
                                                        @else

                                                            <a class="crancy-btn  next-btn mg-top-25"
                                                               href="{{ route('instructor.course-seo', ['course_id' => $course->id,] ) }}">
                                                                {{ __('translate.Previous') }}
                                                            </a>

                                                        @endif

                                                        <button class="crancy-btn edc-crs-step-save-btn mg-top-25"
                                                                type="submit">{{ __('translate.Submit') }}</button>
                                                    </div>
                                                </div>

                                            @else
                                                <div class="row justify-content-center">
                                                    <div class="col-12">
                                                        <div class="d-flex justify-content-center">
                                                            <div class="crancy-body">
                                                                <!-- Dashboard Inner -->
                                                                <div class="crancy-dsinner">
                                                                    <div class="crancy-product-card">
                                                                        <div class="alert alert-success alert_box alert-has-icon">
                                                                            <div class="alert-icon mb-2 course_submit_warning">
                                                                                <span>
                                                                                    <svg width="90" height="90" viewBox="0 0 170 170" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                        <rect width="170" height="170" rx="85" fill="#5D30F9"/>
                                                                                        <path d="M85 128C73.5957 128 62.6585 123.47 54.5944 115.406C46.5303 107.342 42 96.4043 42 85C42 73.5957 46.5303 62.6585 54.5944 54.5944C62.6585 46.5303 73.5957 42 85 42C91.7011 41.9778 98.3108 43.5548 104.28 46.6C104.632 46.7786 104.945 47.0248 105.202 47.3244C105.459 47.6241 105.654 47.9715 105.777 48.3466C105.899 48.7218 105.947 49.1174 105.916 49.5109C105.886 49.9044 105.779 50.288 105.6 50.64C105.421 50.9919 105.175 51.3052 104.876 51.5621C104.576 51.8189 104.229 52.0141 103.853 52.1367C103.478 52.2593 103.083 52.3068 102.689 52.2764C102.296 52.2461 101.912 52.1386 101.56 51.96C96.4395 49.3209 90.7605 47.9492 85 47.96C77.6838 47.96 70.5318 50.129 64.4481 54.1928C58.3643 58.2567 53.6219 64.0329 50.8203 70.7915C48.0187 77.55 47.2836 84.9874 48.708 92.1636C50.1325 99.3398 53.6524 105.933 58.8229 111.109C63.9935 116.285 70.5825 119.812 77.7572 121.244C84.9318 122.676 92.37 121.949 99.1316 119.155C105.893 116.361 111.675 111.625 115.745 105.545C119.815 99.4658 121.992 92.3162 122 85C122.021 84.667 122.021 84.333 122 84C121.926 83.2043 122.171 82.4118 122.681 81.7967C123.191 81.1815 123.924 80.7943 124.72 80.72C125.516 80.6457 126.308 80.8906 126.923 81.4007C127.538 81.9108 127.926 82.6443 128 83.44V85C127.989 96.401 123.456 107.332 115.394 115.394C107.332 123.456 96.4011 127.989 85 128Z" fill="white"/>
                                                                                        <path d="M84.2813 98.6399C83.8925 98.6457 83.5067 98.5704 83.1486 98.4189C82.7905 98.2674 82.4679 98.043 82.2013 97.7599L62.8813 78.7999C62.3195 78.2374 62.0039 77.4749 62.0039 76.6799C62.0039 75.8849 62.3195 75.1224 62.8813 74.5599C63.4555 74.0051 64.2228 73.695 65.0213 73.695C65.8197 73.695 66.587 74.0051 67.1613 74.5599L84.3213 91.4799L122.921 53.5199C123.496 52.9651 124.263 52.655 125.061 52.655C125.86 52.655 126.627 52.9651 127.201 53.5199C127.763 54.0824 128.079 54.8449 128.079 55.6399C128.079 56.4349 127.763 57.1974 127.201 57.7599L86.4813 97.7599C86.1949 98.0502 85.8517 98.2782 85.4732 98.4296C85.0946 98.5811 84.6888 98.6527 84.2813 98.6399Z" fill="white"/>
                                                                                        </svg>

                                                                                </span>
                                                                            </div>
                                                                            <div class="alert-body">
                                                                                <div
                                                                                    class="alert-title">
                                                                                    <h3 class="crancy-header__title m-3">{{ __('translate.Your course has been submited') }}</h3>
                                                                                    </div>
                                                                                <p class="crancy-header__text">
                                                                                    {{ __('translate.Your course under the review. please wait sometimes. you will get notify after the course approval') }}</p>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('style_section')
    <style>
        .course_submit_warning i{
            font-size: 48px !important;
        }

        .crancy-product-card {
            width: 600px;
            text-align: center;
        }

        .alert_box{
            padding: 40px !important;
        }


        .crancy-product-card .alert-success {
            background-color: #6440fb24 !important;
            border: none !important;
        }

    </style>
@endpush


