@extends('layout_inner_page')

@section('title')
    <title>{{ html_decode($course->title) }}</title>
    <meta name="title" content="{{ $course->seo_title }}">
    <meta name="description" content="{{ $course->seo_description }}">
@endsection

@section('front-content')

    @include('breadcrumb')

    <!-- Start Course Details Section -->
    <section>
        <div class="td_height_100 td_height_lg_50"></div>
        <div class="container">
        <div class="row td_gap_y_50">
            <div class="col-lg-8">
            <div class="td_course_details">
                <div class="td_card td_style_3 d-block">
                    @if ($course?->is_popular == 'enable')
                        <span class="td_card_label td_accent_bg td_white_color">{{ __('translate.Popular') }}</span>
                    @endif
                    <div class="td_card_thumb">
                        <img src="{{ asset($course?->thumb_image) }}" alt="">
                    </div>
                </div>

                <span class="td_course_label td_mb_10">{{ $course?->category?->name }}</span>
                <h2 class="td_fs_36 td_mb_30">{{ html_decode($course?->title) }}</h2>
                <div class="td_course_meta td_mb_40">
                <div class="td_course_avatar">
                    @if ($instructor?->image)
                        <img src="{{ asset($instructor?->image) }}" alt="" />
                    @else
                        <img src="{{ asset($general_setting->default_avatar) }}" alt="" />
                    @endif
                    <p class="td_heading_color mb-0 td_medium"><span class="td_accent_color">{{ __('translate.Instructor') }}:</span> <a
                        href="{{ route('instructor.profile', $instructor?->username ?? 'slug') }}">{{ html_decode($instructor?->name) }}</a></p>
                </div>
                <div class="td_course_published td_medium td_heading_color"><span class="td_accent_color">
                    {{ __('translate.Created') }}:</span> {{ $course->created_at->format('d M, Y') }}</div>
                </div>
                <div class="td_tabs td_style_1 ">
                   <div class="position-relative edc-pd-tab-btns-wrapper">
                       <ul id="edc-pd-btns-contain" class="td_tab_links td_style_2 td_type_2 td_mp_0 td_medium td_fs_20 td_heading_color">
                           <li class="active scroll-section"><a href="#td_tab_1">{{ __('translate.Overview') }}</a></li>
                           <li class="scroll-section"><a href="#td_tab_2">{{ __('translate.Curriculum') }}</a></li>
                           <li class="scroll-section"><a href="#td_tab_3">{{ __('translate.Instructor') }}</a></li>
                           <li class="scroll-section"><a href="#td_tab_4">{{ __('translate.Reviews') }}</a></li>
                       </ul>
                       <button id="edc-pd-tab-btn-prev" type="button" class="edc-pd-tab-btn-prev">
                           <svg>
                               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                   <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                               </svg>

                           </svg>
                       </button>
                       <button id="edc-pd-tab-btn-next" type="button" class="edc-pd-tab-btn-next">
                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                               <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                           </svg>

                       </button>
                   </div>
                <div class="td_tab_body td_fs_18">
                    <div class="td_tab active" id="td_tab_1">
                        <h2 class="td_fs_36 td_mb_20">{{ __('translate.Courses Descriptions') }}</h2>

                        {!! clean(html_decode($course->description)) !!}

                    </div>
                    <div class="td_tab" id="td_tab_2">
                        <div class="accordion" id="accordionExample">

                            @foreach ($course_modules as $module_index => $course_module)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne{{ $course_module->id }}">
                                        <button class="accordion-button {{ $module_index != 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne{{ $course_module->id }}" aria-expanded="true" aria-controls="collapseOne{{ $course_module->id }}">
                                        {{ html_decode($course_module?->name) }}
                                        </button>
                                    </h2>
                                    <div id="collapseOne{{ $course_module->id }}" class="accordion-collapse collapse {{ $module_index == 0 ? 'show' : '' }}" aria-labelledby="headingOne{{ $course_module->id }}"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">

                                            @foreach ($course_module->lessons ?? [] as $lesson)
                                                <div class="audio-item">
                                                    <div class="left-section">
                                                        @if ($lesson?->is_public_lesson == 'enable')
                                                            <a href="{{ html_decode($lesson?->video_id) }}"
                                                                class="td_card_video_block td_video_open d-block">
                                                                <span class="td_player_btn td_center">
                                                                <span></span>
                                                                </span>
                                                            </a>
                                                        @else
                                                            <a href="javascript:;"
                                                                class="td_card_video_block d-block">
                                                                <span class="td_player_btn td_center">
                                                                <span></span>
                                                                </span>
                                                            </a>
                                                        @endif
                                                        <span class="audio-title lesson_click_to_play">{{ html_decode($lesson?->name) }}</span>
                                                    </div>
                                                    <div class="time">{{ html_decode($lesson?->video_duration) }}:00:00
                                                        @if ($lesson?->is_public_lesson == 'disable')
                                                            <span class="video_lock">
                                                                <i class="fa-solid fa-lock"></i>
                                                            </span>
                                                        @endif

                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="td_tab" id="td_tab_3">
                        <div class="instructor_box_main">
                            <div class="instructor_box_item">
                                <div class="instructor_box-head">
                                    <h4>{{ __('translate.Instructor') }}</h4>
                                </div>
                                <div class="instructor_box">
                                    <div class="instructor_box_thumb">
                                        @if ($instructor?->image)
                                            <img src="{{ asset($instructor?->image) }}" alt="" />
                                        @else
                                            <img src="{{ asset($general_setting->default_avatar) }}" alt="" />
                                        @endif

                                    </div>
                                    <div class="instructor_box_prof">
                                        <a class="instructor_box_prof_text" href="{{ route('instructor.profile', $instructor?->username ?? 'slug') }}">{{ html_decode($instructor?->name) }}</a>
                                    <p>
                                        {{ html_decode($instructor?->designation) }}
                                    </p>
                                    <div class="td_card_review">
                                        <div class="td_rating" data-rating="{{ $instructor->avg_rating }}">
                                            <i class="fa-regular fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                            <div class="td_rating_percentage">
                                            <i class="fa-solid fa-star fa-fw"></i>
                                            <i class="fa-solid fa-star fa-fw"></i>
                                            <i class="fa-solid fa-star fa-fw"></i>
                                            <i class="fa-solid fa-star fa-fw"></i>
                                            <i class="fa-solid fa-star fa-fw"></i>
                                            </div>
                                        </div>
                                        <span class="td_medium">({{ $instructor->total_rating }} {{ __('translate.Ratings') }})</span>
                                    </div>

                                    <div class="instructor_box_prof_d">
                                        <div class="instructor_box_prof_d_item">
                                        <span class="instructor_box_prof_d_icon">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.75 5.19098C3.69933 5.338 4.75833 5.58243 5.75 5.96591M2.75 8.19098C3.22962 8.26526 3.73722 8.3644 4.25 8.49377M8 3.54003V14.2269M1.99575 1.25845C3.65953 1.44646 5.89485 1.95224 7.48762 3.06833C7.79374 3.28284 8.20626 3.28284 8.51238 3.06833C10.1052 1.95224 12.3405 1.44646 14.0043 1.25845C14.8277 1.16541 15.5 1.85302 15.5 2.70138V11.15C15.5 11.9983 14.8277 12.6862 14.0043 12.7792C12.3405 12.9672 10.1052 13.473 8.51238 14.5891C8.20626 14.8036 7.79374 14.8036 7.48762 14.5891C5.89485 13.473 3.65953 12.9672 1.99575 12.7792C1.17232 12.6862 0.5 11.9983 0.5 11.15V2.70138C0.5 1.85302 1.17232 1.16541 1.99575 1.25845Z"
                                                stroke="#6440FB" stroke-linecap="round" />
                                            </svg>
                                        </span>
                                        <div class="instructor_box_prof_d_text">
                                            <p>
                                                {{ $instructor->total_course }}
                                            {{ __('translate.Courses') }}
                                            </p>
                                        </div>
                                        </div>
                                        <div class="instructor_box_prof_d_item">
                                        <span class="instructor_box_prof_d_icon">
                                            @include('svg.instructor_total_student')
                                        </span>
                                        <div class="instructor_box_prof_d_text">
                                            <p>
                                                {{ $instructor->total_student }} {{ __('translate.Students') }}
                                            </p>
                                        </div>
                                        </div>
                                    </div>

                                    <a href="{{ route('instructor.profile', $instructor?->username ?? 'slug') }}" class="td_btn td_style_1 td_radius_30 td_medium">
                                        <span class="td_btn_in td_white_color td_accent_bg">
                                        <span>{{ __('translate.View Details') }}</span>
                                        <svg width="18" height="12" viewBox="0 0 18 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17 6L1 6" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                            <path d="M12 11C12 11 17 7.31756 17 5.99996C17 4.68237 12 1 12 1" stroke="white"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        </span>
                                    </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="td_tab" id="td_tab_4">
                        <!-- reviews_top_box  -->
                        <div class="reviews_top_box">
                            <div class="reviews_top_box_df">
                            <div class="reviews_top_box_df_left">
                                <div class="reviews_top_box_df_left_text">
                                <h2>{{ $course->avg_rating }}</h2>
                                <p>{{ $course->total_rating }} {{ __('translate.Reviews') }}</p>
                                </div>
                            </div>
                            <div class="reviews_top_box_df_right">


                                @foreach ($rating_data as $rating => $data)
                                    <div class="reviews_top_box_df_right_item">
                                        <div class="reviews_top_box_df_right_text">
                                            <h6>{{ $rating }} {{ __('translate.Star') }}</h6>
                                        </div>
                                        <div class="reviews_top_box_df_progres_ber">
                                            <span class="reviews_top_box_df_progres_ber_per" style="width: {{ $data['percentage'] }}%"></span>
                                        </div>
                                        <div class="reviews_top_box_df_right_text per">
                                            <h6>({{ $data['count'] }})</h6>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            </div>
                        </div>

                        @if ($reviews->count() > 0)
                        <!-- all reviews box  -->
                        <div class="all_reviews_box">
                            <div class="all_reviews_box_item_main">
                                @foreach ($reviews as $review)
                                    <div class="all_reviews_box_item">
                                        <div class="all_reviews_box_item_thumb">
                                            @if ($review?->student?->image)
                                                <img src="{{ asset($review?->student?->image) }}" alt="" />
                                            @else
                                                <img src="{{ asset($general_setting->default_avatar) }}" alt="" />
                                            @endif
                                        </div>
                                        <div class="all_reviews_box_item_inner">
                                            <div class="all_reviews_box_item_text">
                                                <a href="javascript:;">
                                                    {{ html_decode($review?->student?->name) }}
                                                </a>
                                                <ul class="all_reviews_box_icon">
                                                    @for ($i = 1; $i <= 5 ; $i++)
                                                        @if ($i <= $review->rating)
                                                            <li><i class="fa-solid fa-star"></i></li>
                                                        @else
                                                            <li><i class="fa-regular fa-star"></i></li>
                                                        @endif
                                                    @endfor

                                                </ul>
                                            </div>
                                            <div class="all_reviews_box_text">
                                                <p>
                                                    {{ html_decode($review?->review) }}
                                                </p>
                                            </div>
                                        <div class="all_reviews_box_btm">
                                            <p class="date">
                                            {{ $review->created_at->format('d M, Y') }}
                                            </p>
                                        </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        @endif

                        <!-- Write a Review  -->
                        <form class="write_review_box_main" action="{{ route('student.store-review', $course->id) }}" method="POST">
                            @csrf
                            <div class="write_review_box">
                                <div class="write_review_box_text">
                                    <h2>
                                    {{ __('translate.Write a Review') }}
                                    </h2>
                                </div>
                                <ul class="write_review_box_reting_icon">
                                    <li ><i class="fa-solid fa-star active course_rat" data-rating="1" onclick="courseReview(1)"></i></li>
                                    <li ><i class="fa-solid fa-star active course_rat" data-rating="2" onclick="courseReview(2)"></i></li>
                                    <li ><i class="fa-solid fa-star active course_rat" data-rating="3" onclick="courseReview(3)"></i></li>
                                    <li ><i class="fa-solid fa-star active course_rat" data-rating="4" onclick="courseReview(4)"></i></li>
                                    <li ><i class="fa-solid fa-star active course_rat" data-rating="5" onclick="courseReview(5)"></i></li>
                                </ul>
                                <div class="write_review_box_form">
                                    <label for="review" class="form-label">{{ __('translate.Review') }} *</label>
                                    <textarea class="form-control" id="review" rows="5"
                                    placeholder="{{ __('translate.Write your review') }}" name="review" required>{{ old('review') }}</textarea>
                                </div>

                                @if($general_setting->recaptcha_status==1)
                                <div class="write_review_box_form">
                                <div class="g-recaptcha" data-sitekey="{{ $general_setting->recaptcha_site_key }}"></div>
                                </div>
                                @endif

                            </div>

                            <input type="hidden" name="rating" value="5" id="course_rating">

                            <button type="submit" class="td_btn td_style_1 td_radius_30 td_medium td_with_shadow">
                                <span class="td_btn_in td_white_color td_accent_bg">
                                    <span>{{ __('translate.Submit Review') }}</span>
                                    <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.1575 4.34302L3.84375 15.6567" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path
                                        d="M15.157 11.4142C15.157 11.4142 16.0887 5.2748 15.157 4.34311C14.2253 3.41142 8.08594 4.34314 8.08594 4.34314"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                    </svg>
                                </span>
                            </button>
                        </form>

                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="col-lg-4">
                <div class="td_card td_style_7">
                    <a href="{{ html_decode($course->preview_video_id) }}" class="td_card_video_block td_video_open d-block">
                        @if ($course->video_source == 'youtube')
                        <img src="{{ $preview_video_thumb }}" alt="">
                        @else
                        <img src="{{ asset($course->thumb_image) }}" alt="">
                        @endif

                    <span class="td_player_btn_wrap_2">
                        <span class="td_player_btn td_center">
                        <span></span>
                        </span>
                    </span>
                    </a>
                    <div class="td_height_30 td_height_lg_30"></div>
                    <h3 class="td_fs_20 td_semibold td_mb_15">{{ __('translate.Courses Includes') }}:</h3>
                    <ul class="td_card_list td_mp_0 td_fs_18 td_medium">
                    <li>
                        <span>
                            @include('svg.course_price')
                        {{ __('translate.Price') }} :
                        </span>
                        <span class="td_semibold td_accent_color">
                            @if ($course->offer_price)
                                {{ currency($course->offer_price) }}
                            @else
                                {{ currency($course->regular_price) }}
                            @endif
                        </span>
                    </li>
                    <li>
                        <span>
                            @include('svg.course_instructor')

                            {{ __('translate.Instructor') }} :
                        </span>
                        <span class="td_semibold td_accent_color">{{ html_decode($instructor?->name) }}</span>
                    </li>
                    <li>
                        <span>

                            @include('svg.course_duration')


                        {{ __('translate.Durations') }} :
                        </span>
                        <span class="td_semibold td_accent_color">{{ html_decode($course->total_duration) }} {{ __('translate.Hour') }}</span>
                    </li>
                    <li>
                        <span>
                            @include('svg.course_lesson')

                            {{ __('translate.Lessons') }} :
                        </span>
                        <span class="td_semibold td_accent_color">{{ html_decode($course->total_lesson) }}</span>
                    </li>
                    <li>
                        <span>
                            @include('svg.course_student')

                            {{ __('translate.Students') }} :
                        </span>
                        <span class="td_semibold td_accent_color">{{ $course->total_student }}</span>
                    </li>
                    <li>
                        <span>

                            @include('svg.course_language')

                            {{ __('translate.Language') }} :
                        </span>
                        <span class="td_semibold td_accent_color">{{ $course?->course_language?->name }}</span>
                    </li>

                    <li>
                        <span>

                            @include('svg.course_level')

                            {{ __('translate.Level') }} :
                        </span>
                        <span class="td_semibold td_accent_color">{{ $course?->course_level?->name }}</span>
                    </li>


                    <li>
                        <span>

                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22 5H21.25H22ZM22 15H22.75H22ZM2 15H2.75H2ZM2 5H1.25H2ZM20 3V2.25V3ZM20 17V16.25V17ZM19.5 16.25C19.0858 16.25 18.75 16.5858 18.75 17C18.75 17.4142 19.0858 17.75 19.5 17.75V16.25ZM9.5 17.75C9.91421 17.75 10.25 17.4142 10.25 17C10.25 16.5858 9.91421 16.25 9.5 16.25V17.75ZM4 17V17.75V17ZM6 6.25C5.58579 6.25 5.25 6.58579 5.25 7C5.25 7.41421 5.58579 7.75 6 7.75V6.25ZM18 7.75C18.4142 7.75 18.75 7.41421 18.75 7C18.75 6.58579 18.4142 6.25 18 6.25V7.75ZM6 10.25C5.58579 10.25 5.25 10.5858 5.25 11C5.25 11.4142 5.58579 11.75 6 11.75V10.25ZM10 11.75C10.4142 11.75 10.75 11.4142 10.75 11C10.75 10.5858 10.4142 10.25 10 10.25V11.75ZM13.75 17.5C13.75 17.0858 13.4142 16.75 13 16.75C12.5858 16.75 12.25 17.0858 12.25 17.5H13.75ZM13 21H12.25C12.25 21.2599 12.3846 21.5013 12.6057 21.638C12.8268 21.7746 13.1029 21.7871 13.3354 21.6708L13 21ZM15 20L15.3354 19.3292C15.1243 19.2236 14.8757 19.2236 14.6646 19.3292L15 20ZM17 21L16.6646 21.6708C16.8971 21.7871 17.1732 21.7746 17.3943 21.638C17.6154 21.5013 17.75 21.2599 17.75 21H17ZM17.75 17.5C17.75 17.0858 17.4142 16.75 17 16.75C16.5858 16.75 16.25 17.0858 16.25 17.5H17.75ZM21.25 5V15H22.75V5H21.25ZM2.75 15L2.75 5H1.25L1.25 15H2.75ZM4 3.75L20 3.75V2.25L4 2.25V3.75ZM20 16.25H19.5V17.75H20V16.25ZM9.5 16.25H4V17.75H9.5V16.25ZM2.75 5C2.75 4.30964 3.30964 3.75 4 3.75V2.25C2.48122 2.25 1.25 3.48122 1.25 5H2.75ZM1.25 15C1.25 16.5188 2.48122 17.75 4 17.75V16.25C3.30964 16.25 2.75 15.6904 2.75 15H1.25ZM21.25 15C21.25 15.6904 20.6904 16.25 20 16.25V17.75C21.5188 17.75 22.75 16.5188 22.75 15H21.25ZM22.75 5C22.75 3.48122 21.5188 2.25 20 2.25V3.75C20.6904 3.75 21.25 4.30964 21.25 5H22.75ZM17.25 15C17.25 16.2426 16.2426 17.25 15 17.25V18.75C17.0711 18.75 18.75 17.0711 18.75 15H17.25ZM15 17.25C13.7574 17.25 12.75 16.2426 12.75 15H11.25C11.25 17.0711 12.9289 18.75 15 18.75V17.25ZM12.75 15C12.75 13.7574 13.7574 12.75 15 12.75V11.25C12.9289 11.25 11.25 12.9289 11.25 15H12.75ZM15 12.75C16.2426 12.75 17.25 13.7574 17.25 15H18.75C18.75 12.9289 17.0711 11.25 15 11.25V12.75ZM6 7.75H18V6.25H6V7.75ZM6 11.75H10V10.25H6V11.75ZM12.25 17.5V21H13.75V17.5H12.25ZM13.3354 21.6708L15.3354 20.6708L14.6646 19.3292L12.6646 20.3292L13.3354 21.6708ZM14.6646 20.6708L16.6646 21.6708L17.3354 20.3292L15.3354 19.3292L14.6646 20.6708ZM17.75 21V17.5H16.25V21H17.75Z" fill="#6440FB"/>
                            </svg>


                            {{ __('translate.Certifications') }} :
                        </span>
                        <span class="td_semibold td_accent_color">{{ __('translate.Yes') }}</span>
                    </li>
                    </ul>
                    <div class="td_height_30 td_height_lg_30"></div>
                    <a href="javascript:;" class="td_btn td_style_1 td_radius_30 td_medium w-100 add_to_cart" data-course_id="{{ $course->id }}">
                    <span class="td_btn_in td_white_color td_accent_bg">
                        <span>{{ __('translate.Add to Cart') }}</span>
                    </span>
                    </a>
                    <div class="td_height_40 td_height_lg_30"></div>
                    <h3 class="td_fs_20 td_semibold td_mb_15">{{ __('translate.Share On') }}:</h3>
                    <div class="td_footer_social_btns td_fs_18 td_accent_color">
                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('course', $course->slug) }}&t={{ $course->title }}" class="td_center">
                            <i class="fa-brands fa-facebook-f"></i>
                          </a>
                          <a target="_blank" href="https://twitter.com/share?text={{ $course->title }}&url={{ route('course', $course->slug) }}" class="td_center">
                            <i class="fa-brands fa-x-twitter"></i>
                          </a>
                          <a target="_blank" href="https://www.instagram.com/?url={{ route('course', $course->slug) }}" class="td_center">
                            <i class="fa-brands fa-instagram"></i>
                          </a>
                          <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('course', $course->slug) }}&title={{ $course->title }}" class="td_center">
                            <i class="fa-brands fa-linkedin"></i>
                          </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End Course Details Section -->

    <!-- Start Popular Courses -->
    @if ($related_courses->count() > 0)
        <section>
            <div class="td_height_60 td_height_lg_60"></div>
            <div class="container">
                <h2 class="td_fs_48 td_mb_50">{{ __('translate.Related Courses') }}</h2>
                <div class="row td_gap_y_30 td_row_gap_30">
                    @foreach ($related_courses as $course)
                        <div class="col-lg-4 col-md-6">
                            <div class="td_card td_style_3 d-block td_radius_10">
                                @if ($course?->is_popular == 'enable')
                                    <span class="td_card_label td_accent_bg  td_white_color">{{ __('translate.Popular') }}</span>
                                @endif

                                <a href="javascript:;" class="add_to_wishlist {{ in_array($course->id, $wishlist_array) ? 'active' : '' }}" data-course_id="{{ $course->id }}">
                                    <span class="td_cart_wishlist_icon">
                                        @include('svg.course_wishlist')
                                    </span>
                                </a>

                                <a href="{{ route('course', $course->slug) }}" class="td_card_thumb">
                                <img src="{{ asset($course?->thumb_image) }}" alt="">
                                </a>
                                <div class="td_card_info td_white_bg">
                                <div class="td_card_info_in">
                                    <ul class="td_card_meta td_mp_0 td_fs_18 td_medium td_heading_color">
                                    <li>
                                        @include('svg.course_seat')

                                        <span class="td_opacity_7">{{ $course->total_student }} {{ __('translate.Students') }}</span>
                                    </li>
                                    <li>

                                        @include('svg.course_semester')

                                        <span class="td_opacity_7">{{ $course->total_lesson }} {{ __('translate.Lessons') }}</span>
                                    </li>
                                    </ul>
                                    <div class="td_card_category_df td_mb_14">
                                    <a href="{{ route('courses', ['category' => $course?->category?->slug ?? 'slug']) }}"
                                        class="td_card_category td_fs_14 td_normal td_heading_color "><span>{{ $course?->category?->name }}</span>
                                    </a>
                                    <span class="td_card_price  td_fs_18 td_medium">
                                        @if ($course->offer_price)
                                            {{ currency($course->offer_price) }}
                                        @else
                                            {{ currency($course->regular_price) }}
                                        @endif
                                    </span>
                                    </div>
                                    <h2 class="td_card_title td_fs_24 td_mb_16"><a href="{{ route('course', $course->slug) }}">{{ html_decode($course?->title) }}</a></h2>
                                    <p class="td_card_subtitle td_heading_color td_opacity_7 td_mb_20">
                                        {{ $course?->short_description }}
                                    </p>
                                    <div class="td_card_review">
                                    <div class="td_rating" data-rating="{{ $course->avg_rating }}">
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <div class="td_rating_percentage">
                                        <i class="fa-solid fa-star fa-fw"></i>
                                        <i class="fa-solid fa-star fa-fw"></i>
                                        <i class="fa-solid fa-star fa-fw"></i>
                                        <i class="fa-solid fa-star fa-fw"></i>
                                        <i class="fa-solid fa-star fa-fw"></i>
                                        </div>
                                    </div>
                                    <span class="td_heading_color td_opacity_5 td_medium">({{ $course->total_rating }} {{ __('translate.Ratings') }})</span>
                                    </div>
                                    <div class="td_card_btn">
                                    <a href="javascript:;" class="td_btn td_style_1 td_radius_30 td_medium add_to_cart" data-course_id="{{ $course->id }}">
                                        <span class="td_btn_in td_white_color td_accent_bg">
                                        <span>{{ __('translate.Add to Cart') }}</span>
                                        </span>
                                    </a>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="td_height_100 td_height_lg_50"></div>
        </section>
    @else
    <div class="td_height_100 td_height_lg_50"></div>
    @endif
    <!-- End Popular Courses -->

  @endsection



@push('js_section')

<script src="https://www.google.com/recaptcha/api.js" async defer></script>


<script>
    "use strict";
    // user dashboard scrollable sidebar responsive
    // handle sidebar scroll next prev button
    if (document.querySelector("#edc-pd-btns-contain")) {
        const scrollContainer = document.getElementById("edc-pd-btns-contain");
        const sections = document.querySelectorAll(".scroll-section");
        let currentIndex = 0;
        function toggleShow() {
            const scrollLeft = scrollContainer.scrollLeft; // Current scroll position
            const scrollWidth = scrollContainer.scrollWidth; // Total scrollable width
            const clientWidth = scrollContainer.clientWidth; // Visible width
            if (scrollLeft + clientWidth < scrollWidth) {
                document.getElementById("edc-pd-tab-btn-next").classList.remove("d-none");
            } else {
                document.getElementById("edc-pd-tab-btn-next").classList.add("d-none");
            }
            if (scrollLeft > 20) {
                document.getElementById("edc-pd-tab-btn-prev").classList.remove("d-none");
            } else {
                document.getElementById("edc-pd-tab-btn-prev").classList.add("d-none");
            }
        }
        if (scrollContainer) {
            scrollContainer.addEventListener("scroll", () => {
                toggleShow();
            });
        }
        if (document.getElementById("edc-pd-tab-btn-next")) {
            document.getElementById("edc-pd-tab-btn-next").addEventListener("click", () => {
                if (currentIndex < sections.length - 1) {
                    currentIndex++;
                    scrollContainer.scrollLeft += sections[currentIndex].clientWidth;
                }
            });
        }
        if (document.getElementById("edc-pd-tab-btn-prev")) {
            document.getElementById("edc-pd-tab-btn-prev").addEventListener("click", () => {
                if (currentIndex > 0) {
                    currentIndex--;
                    scrollContainer.scrollLeft -= sections[currentIndex].clientWidth;
                } else if (currentIndex === 0) {
                    scrollContainer.scrollLeft = 0;
                }
            });
        }
        function scrollToSection(index) {
            sections[index].scrollIntoView({ behavior: "smooth", inline: "start" });
        }
        window.addEventListener(onload, toggleShow());
    }
        $(function() {

            $(".add_to_cart").on("click", function(e){

                let course_id = $(this).data('course_id');

                $.ajax({
                    type : 'GET',
                    url : "{{ url('add-to-card') }}" + "/" + course_id,
                    success:function(response){
                        toastr.success(response.message);

                        let total_cart = $('#total_cart').html();
                        total_cart = parseInt(total_cart) + parseInt(1);
                        $('#total_cart').html(total_cart);

                    },
                    error:function(err){

                        if(err.status == 403){
                            toastr.error(err.responseJSON.message)
                        }else{
                            toastr.error(`{{ __('translate.Server error occured') }}`)
                        }

                    }
                });

            })


            $(".add_to_wishlist").on("click", function(e){

                var app_mode = "{{ env('APP_MODE') }}"
                if(app_mode == 'DEMO'){
                    toastr.error('This Is Demo Version. You Can Not Change Anything');
                    return;
                }

                let course_id = $(this).data('course_id');
                let current_item = $(this);

                current_item.addClass('active');

                let _token = "{{ csrf_token() }}";

                $.ajax({
                    type : 'POST',
                    data : {_token, item_id : course_id},
                    url : "{{ route('student.wishlist.store') }}",
                    success:function(response){
                        toastr.success(response.message);

                    if(response.type == 'added'){
                        current_item.addClass('active');

                        let total_wishlist = $('#total_wishlist').html();
                        total_wishlist = parseInt(total_wishlist) + parseInt(1);
                        $('#total_wishlist').html(total_wishlist);

                    }else if(response.type == 'removed'){
                        current_item.removeClass('active');

                        let total_wishlist = $('#total_wishlist').html();
                        total_wishlist = parseInt(total_wishlist) - parseInt(1);
                        $('#total_wishlist').html(total_wishlist);

                    }

                    },
                    error:function(err){
                        current_item.removeClass('active');
                        if(err.status == 401){
                            toastr.error(`{{ __('translate.Please login first') }}`)
                        }else{
                            toastr.error(`{{ __('translate.Server error occured') }}`)
                        }
                    }
                });

            })


            $(".lesson_click_to_play").on("click", function () {
                var videoLink = $(this).siblings("a");
                if (videoLink.attr("href") && videoLink.attr("href") !== "javascript:;") {
                    videoLink.trigger("click");
                }
            });

        });


        function courseReview(rating){
            $(".course_rat").each(function(){
                var course_rat = $(this).data('rating')
                if(course_rat > rating){
                    $(this).removeClass('active fa-solid').addClass('fa-regular');;
                }else{
                    $(this).addClass('active fa-solid').removeClass('fa-regular');
                }
            })
            $("#course_rating").val(rating);
        }


    </script>
@endpush
