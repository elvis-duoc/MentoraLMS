

@extends('layout_inner_page')

@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection

@section('front-content')

  <!-- Start Page Heading Section -->
    @include('breadcrumb')

  <!-- Start Courses Grid View -->
  <section>
    <div class="td_height_100 td_height_lg_50"></div>
    <div class="container">
      <div class="td_section_head_2">
        <div class="td_section_head_2_left">
          <div class="td_view_btns">
            <a href="{{ route('courses', array_merge(request()->query(), ['page_view' => 'grid'])) }}" class="td_view_btn td_center active">
                @include('svg.grid_view')
            </a>
            <a href="{{ route('courses', array_merge(request()->query(), ['page_view' => 'list'])) }}" class="td_view_btn td_center">
                @include('svg.list_view')
            </a>
          </div>

            @if ($courses->total() > 0)
                <span class=" td_heading_color td_medium">{{ __('translate.Showing') }} {{ ($courses->currentPage() - 1) * $courses->perPage() + 1 }}-{{ $courses->currentPage() * $courses->perPage() < $courses->total() ? $courses->currentPage() * $courses->perPage() : $courses->total() }} {{ __('translate.Courses Of') }} {{ $courses->total() }}</span>
            @else
                <span class=" td_heading_color td_medium">{{ __('translate.Showing') }} 0 {{ __('translate.Courses Of') }} {{ $courses->total() }}</span>
            @endif

        </div>
        <div class="td_section_head_2_right">
          <div class="td_section_head_select td_fs_20">
            <b class="td_semibold td_heading_color">{{ __('translate.Sort By') }}: </b>
            <select class="fm-pd td_form_field td_medium" id="sort_by_select">
                <option {{ request()->get('sort_by') == 'new' ? 'selected' : '' }} value="new">{{ __('translate.New') }}</option>
                <option {{ request()->get('sort_by') == 'oldest' ? 'selected' : '' }} value="oldest">{{ __('translate.Oldest') }}</option>
                <option {{ request()->get('sort_by') == 'popular' ? 'selected' : '' }} value="popular">{{ __('translate.Popular') }}</option>
            </select>
          </div>

          <button type="button" class="td_modal_btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <span>
                @include('svg.course_filter')
            </span>
          </button>
        </div>
      </div>
      <div class="td_height_60 td_height_lg_40"></div>
      <div class="row td_gap_y_30 td_row_gap_30">
            @forelse($courses as $course_index => $course)
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
            @empty
                <div class="col-12">
                    <div class="courses_not_found_main">
                        <div class="courses_not_found_thumb">
                            <img src="{{ asset($general_setting->not_found ?? '') }}" alt="thumb">
                        </div>
                        <div class="courses_not_found_text">
                            <h3>{{ __('translate.OOPS! Courses not Found') }}</h3>
                            <p>
                                {{ __('translate.Oops! this information is not available for a moment') }}
                            </p>

                            <a href="{{ route('courses') }}"
                                class="td_btn td_style_1 td_radius_30 td_medium td_with_shadow">
                                <span class="td_btn_in td_white_color td_accent_bg">
                                    <span>{{ __('translate.Search Again') }}</span>
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
      <div class="td_height_60 td_height_lg_40"></div>

            @if ($courses->hasPages())
                {{ $courses->links('custom_pagination') }}
            @endif

        </div>
    <div class="td_height_100 td_height_lg_50"></div>
  </section>


  <!-- filter modal -->
  <div class="modal filter_modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title td_semibold " id="exampleModalLabel">{{ __('translate.Search Filter') }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span>
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="16" cy="16" r="16" fill="#FF3838" />
                <path d="M22.2188 9.77734L8.88614 23.1107" stroke="white" stroke-width="1.8" stroke-linecap="round" />
                <path d="M22.2188 23.1094L8.88614 9.77605" stroke="white" stroke-width="1.8" stroke-linecap="round" />
              </svg>
            </span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" id="filter_form">
                <div class="td_modal_item">
                    <div class="td_modal_item_head">
                    <h4 class="td_medium">{{ __('translate.Search') }}</h4>
                    </div>
                    <div class="td_sidebar_search">
                    <input type="text" placeholder="{{ __('translate.Search keyword') }}" class="td_sidebar_search_input" name="search" value="{{ request()->get('search') }}">
                    <button type="submit" class="td_sidebar_search_btn td_center">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                    </div>
                </div>


                <div class="td_modal_item two">
                    <div class="td_modal_item_head">
                    <h4 class="td_medium">{{ __('translate.Price Filter') }}</h4>
                    </div>
                    <div class="st-range-slider-wrap">
                    <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                        <div class="ui-slider-range ui-corner-all ui-widget-header"></div><span tabindex="0"
                        class="ui-slider-handle ui-corner-all ui-state-default"></span><span tabindex="0"
                        class="ui-slider-handle ui-corner-all ui-state-default"></span>
                    </div>
                    <div class="td_amount_wrap">
                        <input type="text" id="amount" readonly="">
                    </div>
                    </div>
                </div>

                <input type="hidden" value="0" id="min_amount" name="min_amount">
                <input type="hidden" value="0" id="max_amount" name="max_amount">

                <input type="hidden" value="{{ request()->has('sort_by') ? request()->get('sort_by') : 'new' }}" id="sort_by_input" name="sort_by">


                <input type="hidden" value="{{ request()->has('page_view') ? request()->get('page_view') : 'grid' }}" id="page_view" name="page_view">

                <div class="td_modal_item three">
                    <div class="td_modal_item_head">
                    <h4 class="td_medium">{{ __('translate.Categories') }}</h4>
                    </div>
                    <select class="form-select " name="category">
                        <option value="">{{ __('translate.Select Categories') }}</option>

                        @foreach ($categories as $category)
                            <option {{ request()->get('category') == $category->slug ? 'selected' : '' }} value="{{ $category->slug }}">{{ $category?->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="row td_mt_40px">
                    <div class="col-12 col-sm-6">
                    <h3 class="td_filter_widget_title td_fs_20 td_mb_16">{{ __('translate.Language Skills') }}</h3>
                    <ul class="td_filter_widget_list td_mp_0">
                        @if (request()->has('course_languages'))
                            @foreach ($course_languages as $course_language)

                                    @php
                                        $is_request = false;
                                        foreach (request()->get('course_languages') as $request_course_language) {
                                            if ($request_course_language == $course_language->id) {
                                                $is_request = true;
                                            }
                                        }
                                    @endphp

                                <li>
                                    <div class="td_custom_checkbox_2">
                                    <input {{ $is_request == true ? 'checked' : '' }} type="checkbox" name="course_languages[]" value="{{ $course_language->id }}">
                                    <span>{{ $course_language?->name }}</span>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            @foreach ($course_languages as $course_language)
                                <li>
                                    <div class="td_custom_checkbox_2">
                                    <input type="checkbox" name="course_languages[]" value="{{ $course_language->id }}">
                                    <span>{{ $course_language?->name }}</span>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                    </div>

                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">

                    <h3 class="td_filter_widget_title td_fs_20 td_mb_16">{{ __('translate.Skills Level') }}</h3>
                    <ul class="td_filter_widget_list td_mp_0">

                        @if (request()->has('course_levels'))
                            @foreach ($course_levels as $course_level)

                                @php
                                    $is_level_request = false;
                                    foreach (request()->get('course_levels') as $request_course_level) {
                                        if ($request_course_level == $course_level->id) {
                                            $is_level_request = true;
                                        }
                                    }
                                @endphp

                                <li>
                                    <div class="td_custom_checkbox_2">
                                    <input {{ $is_level_request == true ? 'checked' : '' }} type="checkbox" name="course_levels[]" value="{{ $course_level->id }}">
                                    <span>{{ $course_level?->name }} ({{ $course_level?->total_course ?? 0  }})</span>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            @foreach ($course_levels as $course_level)
                                <li>
                                    <div class="td_custom_checkbox_2">
                                    <input type="checkbox" name="course_levels[]" value="{{ $course_level->id }}">
                                    <span>{{ $course_level?->name }} ({{ $course_level->total_course ?? 0  }})</span>
                                    </div>
                                </li>
                            @endforeach

                        @endif

                    </ul>
                    </div>

                </div>

                <div class="filter_modal_btn">
                    <button type="submit" class="td_btn td_style_1 td_radius_30 td_medium td_with_shadow">
                    <span class="td_btn_in td_white_color td_accent_bg">
                        <span>{{ __('translate.Filter Now') }}</span>
                        <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.1575 4.34302L3.84375 15.6567" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M15.157 11.4142C15.157 11.4142 16.0887 5.2748 15.157 4.34311C14.2253 3.41142 8.08594 4.34314 8.08594 4.34314"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </span>
                    </button>
                </div>
            </form>

        </div>
      </div>
    </div>
  </div>


@endsection


@push('js_section')
<script>
    "use strict";
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


        $("#sort_by_select").on("change", function(){
            $("#sort_by_input").val($(this).val());

            $("#filter_form").submit();

        })
        function rangeSlider() {

            let rang_slider_max_price = "{{ $rang_slider_max_price }}"
            rang_slider_max_price = parseInt(rang_slider_max_price);

            let req_min_amount = "{{ $req_min_amount }}"
            req_min_amount = parseInt(req_min_amount);

            let req_max_amount = "{{ $req_max_amount }}"
            req_max_amount = parseInt(req_max_amount);

            if ($.exists('#slider-range')) {
                $('#slider-range').slider({
                    range: true,
                    min: 0,
                    max: rang_slider_max_price,
                    values: [req_min_amount, req_max_amount],
                    slide: function (event, ui) {

                        $('#amount').val(`{{ __('translate.Price: ') }} $${ui.values[0]} - $${ui.values[1]}`);

                        $('#min_amount').val(ui.values[0]);
                        $('#max_amount').val(ui.values[1]);

                    },
                });
            }

            if ($.exists('#amount')) {

                $('#amount').val(`{{ __('translate.Price: ') }} $${$('#slider-range').slider('values', 0)} - $${$('#slider-range').slider('values', 1)}`);

                $('#min_amount').val($('#slider-range').slider('values', 0));
                $('#max_amount').val($('#slider-range').slider('values', 1));

            }
        }

        rangeSlider();
    });

    </script>
@endpush
