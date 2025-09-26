

@extends('layout_inner_page')

@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection

@section('front-content')

  <!-- Start Page Heading Section -->
    @include('breadcrumb')


    <!-- start Page instructors Section -->

    <section class="instructors">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="instructors_top">
                        <form class="instructors_form">
                            <div class="instructors_form_item">
                                <input type="text" class="form-control" id=""
                                    placeholder="{{ __('translate.Search keyword') }}" name="search" value="{{ request()->get('search') }}">
                            </div>
                            <div class="instructors_form_item">
                                <select class="form-select" name="category_id">
                                    <option value="">{{ __('translate.Select Category') }}</option>
                                    @foreach ($categories as $category)
                                        <option {{ request()->get('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category?->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="instructors_form_item">
                                <select class="form-select" name="course_language">
                                    <option value="">{{ __('translate.Select Language') }}</option>
                                    @foreach ($course_languages as $course_language)
                                        <option {{ request()->get('course_language') == $course_language->id ? 'selected' : '' }} value="{{ $course_language->id }}">{{ $course_language?->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="instructors_form_item">
                                <select class="form-select" name="course_level">
                                    <option value="">{{ __('translate.Course Level') }}</option>
                                        @foreach ($course_levels as $course_level)
                                        <option {{ request()->get('course_level') == $course_level->id ? 'selected' : '' }} value="{{ $course_level->id }}">{{ $course_level?->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="td_btn td_style_1 td_radius_30 td_medium">
                                <span class="td_btn_in td_white_color td_accent_bg">
                                    <span>{{ __('translate.Search Now') }}</span>
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row td_gap_y_30">
                @forelse ($instructors as $instructor)
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                        <div class="td_team td_style_1 text-center position-relative">
                            @if ($instructor?->image)
                                <img src="{{ asset($instructor?->image) }}" alt="" class="w-100 td_radius_10"/>
                            @else
                                <img src="{{ asset($general_setting->default_avatar) }}" alt="" class="w-100 td_radius_10"/>
                            @endif

                            <a href="{{ route('instructor.profile', $instructor->username) }}" class="td_team_info td_white_bg">
                                <h3 class="td_team_member_title td_fs_18 td_semibold mb-0">{{ html_decode($instructor->name) }}</h3>
                                <p class="td_team_member_designation mb-0 td_fs_14 td_opacity_7 td_heading_color">{{ html_decode($instructor->designation) }}</p>
                                </a>
                        </div>
                    </div>

                @empty
                    <div class="col-12">
                        <div class="courses_not_found_main">
                            <div class="courses_not_found_thumb">
                                <img src="{{ asset($general_setting->not_found ?? '') }}" alt="thumb">
                            </div>
                            <div class="courses_not_found_text">
                                <h3>{{ __('translate.OOPS! Instructor not Found') }}</h3>
                                <p>
                                    {{ __('translate.Oops! this information is not available for a moment') }}
                                </p>

                                <a href="{{ route('instructors') }}"
                                    class="td_btn td_style_1 td_radius_30 td_medium td_with_shadow">
                                    <span class="td_btn_in td_white_color td_accent_bg">
                                        <span>{{ __('translate.Back to Instructor') }}</span>
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
                @endforelse


            </div>

            <div class="row">
                <div class="col-lg-12">
                    @if ($instructors->hasPages())
                        {{ $instructors->links('custom_pagination') }}
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- End Page instructors Section -->

@endsection

