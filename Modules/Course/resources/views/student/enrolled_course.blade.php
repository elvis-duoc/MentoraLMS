@extends('student.master_layout')
@section('title')
    <title>{{ __('translate.Enrolled Course') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Enrolled Course') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Dashboard') }} >> {{ __('translate.Enrolled Course') }}</p>
@endsection

@section('body-content')
    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12 mg-top-30">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <div class="ed-watch-page-wrapper">
                                <div class="ed-watch-main-wrapper">

                                    <div class="ed-watch-content-wrapper">
                                        <div class="ed-watch-content-main-wrapper">
                                            <div class="row">
                                                <div class="col-12 col-xl-8 mb-xl-0 mb-3">
                                                    <div class="w-100">
                                                        <div class="ed-watch-video-player mb-lg-4 mb-2">
                                                            @if ($active_lesson)
                                                                <iframe class="ed-video-player_iframe"
                                                                src="{{ html_decode($active_lesson?->video_id) }}"
                                                                title="YouTube video player" frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe>
                                                            @else
                                                                <iframe class="ed-video-player_iframe"
                                                                src=""
                                                                title="YouTube video player" frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe>
                                                            @endif

                                                        </div>
                                                        <div class="ed-watch-video-details">
                                                            <div class="ed-watch-title-short-details">
                                                                <div class="ed-wv-info">
                                                                    <div class="d-flex gap-2 flex-wrap justify-content-between align-items-center mb-4">
                                                                        <h1 class="ed-wv-title line-clamp-2">
                                                                            {{ html_decode($course?->title) }}
                                                                        </h1>
                                                                       <div>
                                                                        <div class="ed-wv-category">
                                                                            <span>{{ $course?->category?->name }}</span>
                                                                            </div>
                                                                       </div>
                                                                    </div>
                                                                    <div class="d-flex flex-wrap gap-3 justify-content-between align-items-center">
                                                                        <div class="ed-wv-short-info">
                                                                            <div class="ed-wv-owner">
                                                                                <div class="ed-wv-owner-img">
                                                                                    @if ($course?->instructor?->image)
                                                                                        <img src="{{ asset($course?->instructor?->image) }}" alt="" class="w-100 h-100 object-fit-cover" />
                                                                                    @else
                                                                                        <img src="{{ asset($general_setting->default_avatar) }}" alt="" class="w-100 h-100 object-fit-cover"/>
                                                                                    @endif

                                                                                </div>
                                                                                <p class="text">{{ $course?->instructor?->name }}</p>
                                                                            </div>
                                                                            <div class="ed-wv-lessons">
                                                                                <div class="dot"></div>
                                                                                <div class="icon-text-wrap">
                                                                                    <div class="icon">
                                                                                        <svg width="22" height="22"
                                                                                            viewBox="0 0 22 22" fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <path fill-rule="evenodd"
                                                                                                clip-rule="evenodd"
                                                                                                d="M11 0.6875C5.30819 0.6875 0.6875 5.30819 0.6875 11C0.6875 16.6918 5.30819 21.3125 11 21.3125C16.6918 21.3125 21.3125 16.6918 21.3125 11C21.3125 5.30819 16.6918 0.6875 11 0.6875ZM11 2.0625C15.9328 2.0625 19.9375 6.06719 19.9375 11C19.9375 15.9328 15.9328 19.9375 11 19.9375C6.06719 19.9375 2.0625 15.9328 2.0625 11C2.0625 6.06719 6.06719 2.0625 11 2.0625ZM9.64493 6.91006C9.22006 6.655 8.69139 6.64881 8.26032 6.89288C7.82926 7.13694 7.5625 7.59412 7.5625 8.08912V13.3251C7.5625 13.8016 7.80932 14.2443 8.21494 14.4946C8.61988 14.7455 9.12588 14.7682 9.55213 14.5551C10.8164 13.9232 12.9917 12.8356 14.3124 12.1749C14.7613 11.9508 15.0521 11.4991 15.0714 10.9979C15.0906 10.4968 14.8349 10.0244 14.4045 9.76594L9.64493 6.91006ZM8.9375 13.3251V8.08912L13.6971 10.945L8.9375 13.3251Z"
                                                                                                fill="#00001B"/>
                                                                                        </svg>

                                                                                    </div>
                                                                                    <span class="text">{{ html_decode($course->total_lesson) }} {{ __('translate.Lessons') }}</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="ed-wv-duration">
                                                                                <div class="dot"></div>
                                                                                <div class="icon-text-wrap">
                                                                                    <div class="icon">
                                                                                        <svg width="24" height="24"
                                                                                            viewBox="0 0 24 24" fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <path
                                                                                                d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12"
                                                                                                stroke="#00001B"
                                                                                                stroke-width="1.5"
                                                                                                stroke-linecap="round"/>
                                                                                            <path
                                                                                                d="M12 22C6.47715 22 2 17.5228 2 12"
                                                                                                stroke="#00001B"
                                                                                                stroke-width="1.5"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round"
                                                                                                stroke-dasharray="0.5 3"/>
                                                                                            <path
                                                                                                d="M13.5 12C13.5 12.8284 12.8284 13.5 12 13.5C11.1716 13.5 10.5 12.8284 10.5 12C10.5 11.1716 11.1716 10.5 12 10.5C12.8284 10.5 13.5 11.1716 13.5 12Z"
                                                                                                stroke="#00001B"
                                                                                                stroke-width="1.5"/>
                                                                                            <path
                                                                                                d="M12 13.5L12 16M6 12L10.5 12"
                                                                                                stroke="#00001B"
                                                                                                stroke-width="1.5"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round"/>
                                                                                        </svg>
                                                                                    </div>
                                                                                    <span class="text">{{ html_decode($course->total_duration) }} {{ __('translate.Hour') }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        @if ($live_meeting)
                                                                            @php
                                                                                $current_time = \Carbon\Carbon::now();
                                                                                $start_time = \Carbon\Carbon::parse($live_meeting->start_time);
                                                                                $duration_in_minutes = $live_meeting->duration ?? 0;
                                                                                $end_time = $start_time->copy()->addMinutes($duration_in_minutes);
                                                                            @endphp

                                                                            @if ($current_time->between($start_time, $end_time))
                                                                                <a href="{{ $live_meeting->meeting_link }}" target="_blank" class="ed-live-class_btn">
                                                                                    <span>
                                                                                            <svg width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                        <path d="M22.903 2.53798C22.227 2.19998 21.43 2.27098 20.826 2.72598C20.787 2.75498 20.75 2.78798 20.716 2.82198L18.959 4.59498C18.748 2.02998 16.618 0.000976897 14 0.000976897H5C2.243 -2.31033e-05 0 2.24298 0 4.99998V11C0 13.757 2.243 16 5 16H14C16.629 16 18.768 13.953 18.962 11.373L20.718 13.127C20.752 13.16 20.787 13.19 20.825 13.219C21.177 13.483 21.593 13.617 22.013 13.617C22.316 13.617 22.619 13.548 22.903 13.406C23.58 13.068 24 12.387 24 11.632V4.31398C24 3.55698 23.58 2.87598 22.903 2.53798ZM14 14H5C3.346 14 2 12.654 2 11V4.99998C2 3.34598 3.346 1.99998 5 1.99998H14C15.654 1.99998 17 3.34598 17 4.99998V11C17 12.654 15.654 14 14 14ZM19 8.58298V7.39398L22 4.36598L22.025 11.604L19 8.58198V8.58298Z" fill="white"/>
                                                                                        </svg>

                                                                                    </span>
                                                                                    <span class="text">
                                                                                        {{ __('translate.Live Class') }}
                                                                                    </span>
                                                                                </a>
                                                                            @endif

                                                                        @endif

                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="ed-watch-more-details">
                                                                <div class="ed-watch-more-details-wrapper">
                                                                    <div class="ed-tab-content-wrapper">
                                                                        <h1 class="ed-crs-details-headline">{{ __('translate.What you will learn') }}</h1>
                                                                        <div class="ed-html-editor-elm">

                                                                            {!! clean(html_decode($active_lesson->description)) !!}

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-xl-4">
                                                    <div class="w-100">
                                                        <div class="ed-watch-playlist w-100">
                                                            <div class="ed-watch-playlist-main-wrapper">
                                                                <div class="ed-playlist-short-details w-100">
                                                                    <p class="ed-playlist-title">{{ __('translate.Course Content') }}</p>
                                                                    <div class="ed-crs-progress progress_box">
                                                                        <div class="ed-crs-progress-lvl-text">
                                                                            <span class="ed-crs-progress-lvl">{{ $percentage }}%</span>
                                                                            <span
                                                                                class="ed-crs-progress-lvl">{{ $total_checked }} / {{ html_decode($course->total_lesson) }}</span>
                                                                        </div>
                                                                        <div class="ed-crs-progress-bar">
                                                                            <div style="width:{{ $percentage }}%"
                                                                                 class="ed-crs-progress-inner"></div>
                                                                        </div>
                                                                    </div>
                                                                    @if ($percentage == 100)
                                                                        <a href="{{ route('student.download-certificate', $course->id) }}" class="ed-primary-btn ed-crs-download-btn has-icon">
                                                                            <div>
                                                                                  <span class="">

                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none">
<path fill-rule="evenodd" clip-rule="evenodd" d="M12 3.24992C12.5523 3.24992 13 3.69764 13 4.24992V10.7499H14.5C14.9045 10.7499 15.2691 10.9936 15.4239 11.3672C15.5787 11.7409 15.4931 12.171 15.2071 12.457L12.7071 14.957C12.3166 15.3476 11.6834 15.3476 11.2929 14.957L8.79292 12.457C8.50692 12.171 8.42137 11.7409 8.57615 11.3672C8.73093 10.9936 9.09557 10.7499 9.50003 10.7499H11V4.24992C11 3.69764 11.4477 3.24992 12 3.24992Z" fill="currentColor"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M3.83576 15.7637C4.38053 15.6729 4.89575 16.0409 4.98655 16.5857L5.20802 17.9145C5.28838 18.3967 5.70557 18.7501 6.19441 18.7501H17.8059C18.2947 18.7501 18.7119 18.3967 18.7923 17.9145L19.0138 16.5857C19.1046 16.0409 19.6198 15.6729 20.1646 15.7637C20.7093 15.8545 21.0773 16.3697 20.9865 16.9145L20.7651 18.2433C20.524 19.6898 19.2724 20.7501 17.8059 20.7501H6.19441C4.72789 20.7501 3.47632 19.6898 3.23523 18.2433L3.01376 16.9145C2.92297 16.3697 3.29099 15.8545 3.83576 15.7637Z" fill="currentColor"/>
</svg>
                                                                                    </span>
                                                                                <span class="text"> {{ __('translate.Download Certificate') }}</span>

                                                                            </div>
                                                                        </a>


                                                                    @endif

                                                                </div>

                                                                <div class="accordion ed-playlist-watch-list"
                                                                     id="accordionPanelsStayOpenExample">
                                                                     @foreach ($course_modules as $module_index => $course_module)

                                                                        @php
                                                                            $active_accordion = false;
                                                                            if($active_module && $active_module->id == $course_module->id){
                                                                                $active_accordion = true;
                                                                            }
                                                                        @endphp
                                                                        <div class="ed-playlist-item">
                                                                            <button class="ed-playlist-item-btn {{ $active_accordion ? 'collapsed' : '' }}"
                                                                                    id="panelsStayOpen-headingOne{{ $course_module->id }}"
                                                                                    type="button" data-bs-toggle="collapse"
                                                                                    data-bs-target="#panelsStayOpen-collapse1{{ $course_module->id }}"
                                                                                    aria-expanded="true"
                                                                                    aria-controls="panelsStayOpen-collapse1{{ $course_module->id }}">
                                                                                <span>
                                                                                    {{ html_decode($course_module?->name) }}
                                                                                </span>
                                                                                <span class="icon">
                                                                                    @include('course::instructor.svg.enrollment_dropdown')
                                                                                </span>
                                                                            </button>
                                                                            <div id="panelsStayOpen-collapse1{{ $course_module->id }}"
                                                                                class="ed-playlist-item-body  accordion-collapse collapse {{ $active_accordion ? 'show' : '' }}"
                                                                                aria-labelledby="panelsStayOpen-headingOne{{ $course_module->id }}"  data-bs-parent="#accordionPanelsStayOpenExample">
                                                                                <div class="ed-playlist-item-body-wrapper">
                                                                                    <div class="ed-playlist-video-list">
                                                                                        <ul class="ed-playlist-video-list-wrapper">

                                                                                            @foreach ($course_module->lessons ?? [] as $lesson)
                                                                                            @php
                                                                                                $play_now = false;
                                                                                                if($active_lesson && $active_lesson->id == $lesson->id){
                                                                                                    $play_now = true;
                                                                                                }
                                                                                            @endphp
                                                                                            <li>
                                                                                                <a href="{{ route('student.enrolled-course', ['id' => $course->id, 'lesson_id' => $lesson->id]) }}"
                                                                                                class="ed-playlist-video-item {{ $play_now ? 'play' : '' }}">
                                                                                                    <div
                                                                                                        class="ed-video-title-area">
                                                                                                        <input {{ in_array($lesson->id, $checklist_array) ? 'checked' : '' }} type="checkbox" class="ed-check-input mark_as_complete" data-lesson_id="{{ $lesson->id }}">
                                                                                                        <span class="ed-play-icon">
                                                                                                            @include('course::instructor.svg.enrollment_checkbox')
                                                                                                        </span>
                                                                                                        <span>{{ html_decode($lesson?->name) }}</span>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="ed-video-duration">
                                                                                                        <span>{{ html_decode($lesson?->video_duration) }}:00:00</span>
                                                                                                    </div>
                                                                                                </a>
                                                                                            </li>
                                                                                            @endforeach

                                                                                        </ul>
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




@push('js_section')

<script src="https://www.google.com/recaptcha/api.js" async defer></script>


<script>
    "use strict";
        $(function() {

            $(".mark_as_complete").on("click", function(e){

                let course_id = "{{ $course->id }}";
                let lesson_id = $(this).data('lesson_id');

                let _token = "{{ csrf_token() }}";

                $.ajax({
                    type : 'POST',
                    data : {_token, course_id, lesson_id},
                    url : "{{ route('student.mark-lesson-complete') }}",
                    success:function(response){
                        toastr.success(response.message);

                        let progress_html = `<div class="ed-crs-progress-lvl-text">
                                        <span class="ed-crs-progress-lvl">${response.percentage}%</span>
                                        <span
                                            class="ed-crs-progress-lvl">${response.total_checked} / {{ html_decode($course->total_lesson) }}</span>
                                    </div>
                                    <div class="ed-crs-progress-bar">
                                        <div style="width:${response.percentage}%"
                                                class="ed-crs-progress-inner"></div>
                                    </div>`;

                        $(".progress_box").html(progress_html)

                    },
                    error:function(err){
                        if(err.status == 404){
                            toastr.error(err.responseJSON.message);
                        }else{
                            toastr.error(`{{ __('translate.Server error occured') }}`)
                        }
                    }
                });

            })



        });



    </script>
@endpush
