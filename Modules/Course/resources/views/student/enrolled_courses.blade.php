@extends('student.master_layout')
@section('title')
    <title>{{ __('translate.Enrolled Courses') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Enrolled Courses') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Dashboard') }} >> {{ __('translate.Enrolled Courses') }}</p>
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

                                    @if ($courses->count() > 0)

                                        <div class="ed-course-page-wrapper">
                                            <div class="ed-course-main-wrapper">

                                                <div class="ed-crs-page-wrapper">
                                                    <div class="ed-crs-page-main-wrapper">
                                                        <div class="row">
                                                            <!-- course list -->
                                                            @foreach ($courses as $course)
                                                                <div class="col-sm-6 col-lg-4 col-xxl-3 mb-4">
                                                                    <div class="ed-course-progress_card">
                                                                        <div class="ed-crs-thumb">
                                                                            <img src="{{ asset($course?->thumb_image) }}" alt="course image" class="w-100 h-100 object-fit-cover"/>
                                                                        </div>
                                                                        <div class="ed-crs-info">
                                                                            <div class="ed-crs-owner-info">
                                                                                <div class="ed-crs-category">
                                                                                    {{ $course?->category?->name }}</div>
                                                                                <div class="ed-crs-owner">

                                                                                    @if ($course?->instructor?->image)
                                                                                        <img src="{{ asset($course?->instructor?->image) }}" alt="" class="w-100 h-100 object-fit-cover" />
                                                                                    @else
                                                                                        <img src="{{ asset($general_setting->default_avatar) }}" alt="" class="w-100 h-100 object-fit-cover"/>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <a href="{{ route('course', $course->slug) }}" class="ed-crs-title line-clamp-2">
                                                                                {{ html_decode($course?->title) }}
                                                                            </a>
                                                                            <div class="ed-crs-progress">

                                                                                <div class="ed-crs-progress-lvl-text">
                                                                                    <span class="ed-crs-progress-lvl">{{ $course?->percentage }}%</span>
                                                                                    <span
                                                                                        class="ed-crs-progress-lvl">{{ $course?->total_checked }} / {{ html_decode($course->total_lesson) }}</span>
                                                                                </div>
                                                                                <div class="ed-crs-progress-bar">
                                                                                    <div style="width:{{ $course?->percentage }}%"
                                                                                        class="ed-crs-progress-inner"></div>
                                                                                </div>

                                                                            </div>
                                                                            <div class="ed-crs-btn-area">
                                                                                <a href="{{ route('student.enrolled-course', $course->id) }}" class="ed-primary-btn has-icon">
                                                                                    <span class="text">{{ __('translate.Continue') }}</span>
                                                                                    <span class="">
                                                                                        <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                            <path d="M14.8491 4.34302L3.5354 15.6567" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                            <path d="M14.8494 11.4142C14.8494 11.4142 15.781 5.2748 14.8494 4.34311C13.9177 3.41142 7.77832 4.34314 7.77832 4.34314" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                        </svg>
                                                                                    </span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    @else

                                        <div class="row justify-content-center">
                                            <div class="col-lg-8">
                                                <div class="courses_not_found_main">
                                                    <div class="courses_not_found_thumb">
                                                        <img src="{{ asset($general_setting->not_found ?? '') }}" alt="thumb">
                                                    </div>
                                                    <div class="courses_not_found_text">
                                                        <h3>{{ __('translate.OOPS! Courses not Found') }}</h3>
                                                        <p>
                                                            {{ __('translate.You did not enrolled any course') }}
                                                        </p>

                                                        <a href="{{ route('courses') }}"
                                                           class="td_btn td_style_1 td_radius_30 td_medium td_with_shadow">
                                                    <span class="td_btn_in td_white_color td_accent_bg">
                                                        <span>{{ __('translate.Browse Courses') }}</span>
                                                        <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M15.1575 4.34302L3.84375 15.6567" stroke="currentColor"
                                                                  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path
                                                                d="M15.157 11.4142C15.157 11.4142 16.0887 5.2748 15.157 4.34311C14.2253 3.41142 8.08594 4.34314 8.08594 4.34314"
                                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </svg>
                                                    </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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
    <!-- End crancy Dashboard -->
@endsection

