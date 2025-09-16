@extends('layout3')

@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection

@section('front-content')


    <!-- Start Hero Section -->
  <section class="td_hero td_style_4 td_center text-center td_hobble">
    <div class="container">
      <div class="td_hero_text wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
        <p
          class="td_hero_subtitle_up td_accent_color text-uppercase td_semibold td_fs_18 td_mb_10 td_opacity_9 td_spacing_1">
          {{ getTranslatedValue($home3_hero_section, 'short_title') }}</p>
        <h1 class="td_hero_title td_fs_64 td_mb_20">{{ getTranslatedValue($home3_hero_section, 'title') }}</h1>
        <p class="td_hero_subtitle td_fs_18 td_heading_color text-capitalize td_mb_40">{{ getTranslatedValue($home3_hero_section, 'description') }}</p>
        <div class="td_btns_group">
          <a href="{{ route('courses') }}" class="td_btn td_style_1 td_radius_30 td_medium">
            <span class="td_btn_in td_white_color td_accent_bg">
              <span>{{ __('translate.Find Courses') }}</span>
              <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.1575 4.34302L3.84375 15.6567" stroke="currentColor" stroke-width="1.5"
                  stroke-linecap="round" stroke-linejoin="round" />
                <path
                  d="M15.157 11.4142C15.157 11.4142 16.0887 5.2748 15.157 4.34311C14.2253 3.41142 8.08594 4.34314 8.08594 4.34314"
                  stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </span>
          </a>
          <div class="td_avatars_wrap">

            <div class="td_avatars">
                <img src="{{ asset(getImage($home3_hero_section, 'total_student_image')) }}" alt="thumb">
              </div>
              <div>
                <h3 class="mb-0 td_fs_20 td_semibold">{{ getTranslatedValue($home3_hero_section, 'total_student') }}</h3>
                <p class="mb-0 td_fs_18 td_opacity_6">{{ getTranslatedValue($home3_hero_section, 'total_student_title') }}</p>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class="td_hero_img_box_left">
      <div class="td_hero_img_1 position-absolute wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.35s">
        <div class="td_hero_img_in">
          <img src="{{ asset(getImage($home3_hero_section, 'image_one')) }}" alt="">
        </div>
      </div>
      <div class="td_hero_img_2 position-absolute wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.35s">
        <div class="td_hero_img_in">
          <img src="{{ asset(getImage($home3_hero_section, 'image_two')) }}" alt="">
        </div>
      </div>
      <span class="td_hero_shape_1 position-absolute td_hover_layer_5">
        @include('svg.home3.hero_shape1')
      </span>
      <span class="td_hero_shape_2 position-absolute td_hover_layer_3">
        @include('svg.home3.hero_shape2')
      </span>
      <div class="td_hero_shape_5 position-absolute">
        @include('svg.home3.hero_shape10')
      </div>
    </div>
    <div class="td_hero_img_box_right">
      <div class="td_hero_img_3 position-absolute wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.35s">
        <div class="td_hero_img_in">
            <img src="{{ asset(getImage($home3_hero_section, 'image_three')) }}" alt="">
        </div>
      </div>
      <div class="td_hero_img_4 position-absolute wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.35s">
        <div class="td_hero_img_in">
            <img src="{{ asset(getImage($home3_hero_section, 'image_four')) }}" alt="">
        </div>
      </div>
      <span class="td_hero_shape_3 position-absolute td_hover_layer_5">
        @include('svg.home3.hero_shape3')
      </span>
      <span class="td_hero_shape_4 position-absolute td_hover_layer_3">
        @include('svg.home3.hero_shape4')
      </span>
    </div>
    <div class="td_hero_shape_6 position-absolute td_hover_layer_3">
        @include('svg.home3.hero_shape5')
    </div>
    <span class="td_hero_shape_7 position-absolute">
        @include('svg.home3.hero_shape6')
    </span>
    <span class="td_hero_shape_8 position-absolute td_hover_layer_3">
        @include('svg.home3.hero_shape7')
    </span>
    <span class="td_hero_shape_9 position-absolute">
        @include('svg.home3.hero_shape8')
    </span>
    <span class="td_hero_shape_10 position-absolute td_hover_layer_5">
        @include('svg.home3.hero_shape9')
    </span>
  </section>
  <!-- End Hero Section -->

  <!-- Start About Section -->
  <section class="td_shape_section_2">
    <div class="td_shape td_shape_position_1 td_accent_color">
      <svg xmlns="http://www.w3.org/2000/svg" width="51" height="37" viewBox="0 0 51 37" fill="none">
        <path opacity="0.51" d="M1.76764 36.4103L25.5 1.81671L49.2324 36.4103H1.76764Z" stroke="currentColor" />
      </svg>
    </div>
    <span class="td_shape td_shape_position_2">
        @include('svg.home3.about_shape')
    </span>
    <span class="td_shape td_shape_position_3">
        @include('svg.home3.about_shape2')
    </span>
    <div class="td_shape td_shape_position_4">
        @include('svg.home3.about_shape3')
    </div>
    <div class="td_shape td_shape_position_5"></div>
    <div class="td_height_100 td_height_lg_50"></div>
    <div class="container">
      <div class="row align-items-center td_gap_y_40">
        <div class="col-xl-6">
          <div class="td_image_box td_style_5">
            <div class="td_image_box_img_1 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
              <img src="{{ asset(getImage($home3_about_us, 'image_one')) }}" alt="">
            </div>
            <div class="td_image_box_img_2 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
              <img src="{{ asset(getImage($home3_about_us, 'image_two')) }}" alt="">
            </div>
            <div class="td_image_box_circle wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
              <div class="td_image_box_circle_in td_center">
                <span class="td_image_box_circle_icon">
                    @include('svg.home3.about_rotate')
                </span>

                <img src="{{ asset(getImage($home3_about_us, 'rotate_image')) }}" alt="" class="td_image_box_circle_text">
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.4s">
          <div class="td_section_heading td_style_1 td_mb_30">
            <p class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_accent_color">
                {{ getTranslatedValue($home3_about_us, 'short_title') }}</p>
            <h2 class="td_section_title td_fs_48 td_mb_30">{{ getTranslatedValue($home3_about_us, 'title') }}</h2>
            <p class="td_section_subtitle td_fs_18 mb-0">{{ getTranslatedValue($home3_about_us, 'description') }}</p>
          </div>
          <div class="td_mb_40">
            <ul class="td_list td_style_4 td_mp_0">
              <li>
                <div class="td_list_icon td_center">
                  <div class="td_list_icon_icon_in td_center">
                    <img src="{{ asset(getImage($home3_about_us, 'item_one_icon')) }}" alt="">
                  </div>
                </div>
                <div class="td_list_right">
                  <h3 class="td_fs_20 td_semibold td_mb_2">{{ getTranslatedValue($home3_about_us, 'item_one_title') }}</h3>
                  <p class="mb-0 td_fs_14 td_heading_color">{{ getTranslatedValue($home3_about_us, 'item_one_description') }}</p>
                </div>
              </li>

              <li>
                <div class="td_list_icon td_center">
                  <div class="td_list_icon_icon_in td_center">
                    <img src="{{ asset(getImage($home3_about_us, 'item_two_icon')) }}" alt="">
                  </div>
                </div>
                <div class="td_list_right">
                  <h3 class="td_fs_20 td_semibold td_mb_2">{{ getTranslatedValue($home3_about_us, 'item_two_title') }}</h3>
                  <p class="mb-0 td_fs_14 td_heading_color">{{ getTranslatedValue($home3_about_us, 'item_two_description') }}</p>
                </div>
              </li>

              <li>
                <div class="td_list_icon td_center">
                  <div class="td_list_icon_icon_in td_center">
                    <img src="{{ asset(getImage($home3_about_us, 'item_three_icon')) }}" alt="">
                  </div>
                </div>
                <div class="td_list_right">
                  <h3 class="td_fs_20 td_semibold td_mb_2">{{ getTranslatedValue($home3_about_us, 'item_three_title') }}</h3>
                  <p class="mb-0 td_fs_14 td_heading_color">{{ getTranslatedValue($home3_about_us, 'item_three_description') }}</p>
                </div>
              </li>

              <li>
                <div class="td_list_icon td_center">
                  <div class="td_list_icon_icon_in td_center">
                    <img src="{{ asset(getImage($home3_about_us, 'item_four_icon')) }}" alt="">
                  </div>
                </div>
                <div class="td_list_right">
                  <h3 class="td_fs_20 td_semibold td_mb_2">{{ getTranslatedValue($home3_about_us, 'item_four_title') }}</h3>
                  <p class="mb-0 td_fs_14 td_heading_color">{{ getTranslatedValue($home3_about_us, 'item_four_description') }}</p>
                </div>
              </li>

            </ul>
          </div>
          <a href="{{ route('about-us') }}" class="td_btn td_style_1 td_radius_30 td_medium">
            <span class="td_btn_in td_white_color td_accent_bg">
              <span>{{ __('translate.More About') }} </span>
              <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.1575 4.34302L3.84375 15.6567" stroke="currentColor" stroke-width="1.5"
                  stroke-linecap="round" stroke-linejoin="round"></path>
                <path
                  d="M15.157 11.4142C15.157 11.4142 16.0887 5.2748 15.157 4.34311C14.2253 3.41142 8.08594 4.34314 8.08594 4.34314"
                  stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </span>
          </a>
        </div>
      </div>
    </div>
    <div class="td_height_100 td_height_lg_50"></div>
  </section>
  <!-- End About Section -->

  <!-- Start Popular Courses Section -->
  <section class="td_gray_bg_7 td_shape_section_3">
    <span class="td_shape td_shape_position_1">
        @include('svg.home3.course_shape')

    </span>
    <span class="td_shape td_shape_position_2">
        @include('svg.home3.course_shape2')

    </span>
    <span class="td_shape td_shape_position_3">
        @include('svg.home3.course_shape3')


    </span>
    <div class="td_shape td_shape_position_4"></div>
    <div class="td_height_100 td_height_lg_75"></div>
    <div class="container">
      <div class="td_section_heading td_style_1 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
        <p class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_accent_color">
          {{ __('translate.Latest Courses') }}</p>
        <h2 class="td_section_title td_fs_48 mb-0">{{ __('translate.Academic Courses') }}</h2>
      </div>
      <div class="td_height_50 td_height_lg_50"></div>
      <div class="row td_gap_y_30">

        @foreach($courses as $course_index => $course)
            <div class="col-lg-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
            <div class="td_card td_style_3 td_type_1 d-block td_radius_10">
                <div class="td_card_thumb">

                    <img src="{{ asset($course?->thumb_image) }}" alt="">

                    <a href="javascript:;" class="add_to_wishlist {{ in_array($course->id, $wishlist_array) ? 'active' : '' }}" data-course_id="{{ $course->id }}">
                        <span class="td_cart_wishlist_icon">
                            @include('svg.course_wishlist')
                        </span>
                    </a>
                </div>
                <div class="td_card_info">
                <div class="td_card_info_in">
                    <a href="{{ route('courses', ['category' => $course?->category?->slug]) }}"
                    class="td_card_category td_fs_14 td_normal td_heading_color td_mb_14"><span>{{ html_decode($course?->category?->name) }}</span></a>
                    <h2 class="td_card_title td_fs_24 td_mb_16"><a href="{{ route('course', $course->slug) }}">{{ html_decode($course?->title) }}</a></h2>
                    <p class="td_card_subtitle td_heading_color td_opacity_7 td_mb_20">{{ html_decode($course?->short_description) }}</p>
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
                    <div class="td_card_btn">
                    <a href="javascript:;" class="td_btn td_style_1 td_radius_30 td_medium add_to_cart" data-course_id="{{ $course->id }}">
                        <span class="td_btn_in td_white_color td_accent_bg">
                        <span>{{ __('translate.Add to Cart') }}</span>
                        <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.1575 4.34302L3.84375 15.6567" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                            <path
                            d="M15.157 11.4142C15.157 11.4142 16.0887 5.2748 15.157 4.34311C14.2253 3.41142 8.08594 4.34314 8.08594 4.34314"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                        </span>
                    </a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        @endforeach
      </div>
      <div class="td_height_50 td_height_lg_40"></div>
      <div class="text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
        <a href="{{ route('courses') }}" class="td_btn td_style_3 td_medium td_heading_color td_fs_18">
          <span>{{ __('translate.See all Courses') }}</span>
          <i>
            <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M17 6L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round"></path>
              <path d="M12 11C12 11 17 7.31756 17 5.99996C17 4.68237 12 1 12 1" stroke="currentColor" stroke-width="1.5"
                stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </i>
        </a>
      </div>
    </div>
    <div class="td_height_100 td_height_lg_50"></div>
  </section>
  <!-- End Popular Courses Section -->

  <!-- Start FunFact Section -->
  <section>
    <div class="td_height_100 td_height_lg_50"></div>
    <div class="container-fluid td_plr_60">
      <div class="row td_gap_y_30">
        <div class="col-xxl-3 col-md-6 d-flex justify-content-center">
          <div class="td_funfact td_style_2">
            <div class="td_funfact_border"></div>
            <div class="td_funfact_icon td_center td_accent_bg">
              <img src="{{ asset(getImage($home3_fun_fact, 'item_one_icon')) }}" alt="">
            </div>
            <div class="td_funfact_right td_heading_bg">
              <h3 class="td_funfact_number mb-0 td_accent_color td_fs_36 d-flex">
                <span class="odometer" data-count-to="{{ getTranslatedValue($home3_fun_fact, 'item_one_quantity') }}"></span>+
              </h3>
              <p class="m-0 td_fs_16 td_accent_color td_medium">{{ getTranslatedValue($home3_fun_fact, 'item_three_title') }}</p>
            </div>
          </div>
        </div>
        <div class="col-xxl-3 col-md-6 d-flex justify-content-center">
          <div class="td_funfact td_style_2">
            <div class="td_funfact_border"></div>
            <div class="td_funfact_icon td_center td_accent_bg">
                <img src="{{ asset(getImage($home3_fun_fact, 'item_two_icon')) }}" alt="">
            </div>
            <div class="td_funfact_right td_heading_bg">
              <h3 class="td_funfact_number mb-0 td_accent_color td_fs_36 d-flex">
                <span class="odometer" data-count-to="{{ getTranslatedValue($home3_fun_fact, 'item_two_quantity') }}"></span>+
              </h3>
              <p class="m-0 td_fs_16 td_accent_color td_medium">{{ getTranslatedValue($home3_fun_fact, 'item_two_title') }}</p>
            </div>
          </div>
        </div>
        <div class="col-xxl-3 col-md-6 d-flex justify-content-center">
          <div class="td_funfact td_style_2">
            <div class="td_funfact_border"></div>
            <div class="td_funfact_icon td_center td_accent_bg">
                <img src="{{ asset(getImage($home3_fun_fact, 'item_three_icon')) }}" alt="">
            </div>
            <div class="td_funfact_right td_heading_bg">
              <h3 class="td_funfact_number mb-0 td_accent_color td_fs_36 d-flex">
                <span class="odometer" data-count-to="{{ getTranslatedValue($home3_fun_fact, 'item_three_quantity') }}"></span>+
              </h3>
              <p class="m-0 td_fs_16 td_accent_color td_medium">{{ getTranslatedValue($home3_fun_fact, 'item_three_title') }}</p>
            </div>
          </div>
        </div>
        <div class="col-xxl-3 col-md-6 d-flex justify-content-center">
          <div class="td_funfact td_style_2">
            <div class="td_funfact_border"></div>
            <div class="td_funfact_icon td_center td_accent_bg">
                <img src="{{ asset(getImage($home3_fun_fact, 'item_four_icon')) }}" alt="">
            </div>
            <div class="td_funfact_right td_heading_bg">
              <h3 class="td_funfact_number mb-0 td_accent_color td_fs_36 d-flex">
                <span class="odometer" data-count-to="{{ getTranslatedValue($home3_fun_fact, 'item_four_quantity') }}"></span>+
              </h3>
              <p class="m-0 td_fs_16 td_accent_color td_medium">{{ getTranslatedValue($home3_fun_fact, 'item_four_title') }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="td_height_100 td_height_lg_50"></div>
  </section>
  <!-- End FunFact Section -->

  <!-- Start FAQs Section -->
  <div class="td_gray_bg_5 td_shape_section_4 td_hobble">
    <span class="td_shape td_shape_position_1 td_hover_layer_5">
        @include('svg.home3.faq_shape')

    </span>
    <span class="td_shape td_shape_position_2">
        @include('svg.home3.faq_shape2')


    </span>
    <span class="td_shape td_shape_position_3 td_hover_layer_3">
        @include('svg.home3.faq_shape3')

    </span>
    <span class="td_shape td_shape_position_4">
        @include('svg.home3.faq_shape4')

    </span>
    <div class="td_height_100 td_height_lg_75"></div>
    <div class="container">
      <div class="row align-items-center td_gap_y_40">
        <div class="col-xl-6 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
          <div class="td_section_heading td_style_1">
            <p class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_accent_color">
                {{ getTranslatedValue($home3_faq, 'short_title') }}</p>
            <h2 class="td_section_title td_fs_48 mb-0">{{ getTranslatedValue($home3_faq, 'title') }}</h2>
          </div>
          <div class="td_height_50 td_height_lg_50"></div>
          <div class="td_accordians td_style_1 td_type_1">
            @foreach ($faqs_one as $index => $faq)
                <div class="td_accordian {{ $index == 0 ? 'active' : '' }}">
                <div class="td_accordian_head">
                    <h2 class="td_accordian_title td_fs_20 td_medium">{{ $faq->question }}</h2>
                    <span class="td_accordian_toggle">
                    <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.355 9L7 3.43725L1.645 9L0 7.28745L7 -9.53674e-07L14 7.28745L12.355 9Z" fill="white" />
                    </svg>
                    </span>
                </div>
                <div class="td_accordian_body">
                    {!! clean($faq->answer) !!}
                </div>
                </div><!-- .td_accordian -->
            @endforeach
          </div>
        </div>
        <div class="col-xl-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.4s">
          <div class="td_image_box td_style_9">
            <div class="td_image_box_img_1">
              <img src="{{ asset(getImage($home3_faq, 'image')) }}" alt="">
            </div>
            <span class="td_image_box_shape_2 position-absolute td_hover_layer_3">
                @include('svg.home3.faq_shape5')


            </span>
            <span class="td_image_box_shape_3 position-absolute td_hover_layer_5">
                @include('svg.home3.faq_shape6')

            </span>
            <span class="td_image_box_shape_4 position-absolute td_hover_layer_3">
                @include('svg.home3.faq_shape7')

            </span>
            <span class="td_image_box_shape_5 position-absolute">
              <svg width="37" height="28" viewBox="0 0 37 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M18.8333 0L23.0617 10.3647H36.7449L25.6749 16.7705L29.9033 27.1353L18.8333 20.7295L7.76338 27.1353L11.9917 16.7705L0.921768 10.3647H14.605L18.8333 0Z"
                  fill="#00001B" />
              </svg>

            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="td_height_100 td_height_lg_50"></div>
  </div>
  <!-- End FAQs Section -->

  <!-- Start Testimonials Section -->
  <section>
    <div class="td_height_100 td_height_lg_0"></div>
    <div class="td_testimonial_with_shape_wrap">
      <div class="td_testimonial_with_shape td_hobble">
        <div class="td_testimonial_shape_1 td_accent_color position-absolute td_hover_layer_3">
          <svg width="46" height="240" viewBox="0 0 46 240" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M44.61 1.48954C43.4975 0.625824 41.8935 0.827182 41.0441 1.95066C15.4219 35.8376 1.2421 77.0249 0.598928 119.547C-0.0442428 162.07 12.8834 203.667 37.469 238.314C38.2841 239.462 39.8812 239.712 41.0193 238.882C42.1575 238.053 42.4057 236.458 41.591 235.309C17.6568 201.557 5.0724 161.041 5.69884 119.625C6.32528 78.2082 20.1293 38.0916 45.0733 5.07867C45.9224 3.95492 45.7226 2.35325 44.61 1.48954Z"
              fill="currentColor" />
          </svg>
        </div>
        <div class="td_testimonial_shape_3 td_accent_color position-absolute td_hover_layer_3">
          <svg width="37" height="28" viewBox="0 0 37 28" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.55"
              d="M18.8333 0L23.0617 10.3647H36.7449L25.6749 16.7705L29.9033 27.1353L18.8333 20.7295L7.76338 27.1353L11.9917 16.7705L0.921768 10.3647H14.605L18.8333 0Z"
              fill="currentColor" />
          </svg>
        </div>
        <div class="td_testimonial_shape_4 td_accent_color position-absolute td_hover_layer_5">
          <svg width="40" height="344" viewBox="0 0 40 344" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M38.0243 1C38.0243 1 -2.76813 40.5632 1.28292 70.4758C4.53272 94.4719 32.5988 98.8059 38.0243 122.471C46.2303 158.263 -0.0606009 173.325 1.28292 209.875C2.51911 243.506 43.8038 255.981 38.0243 289.212C33.7698 313.675 1.28292 343 1.28292 343"
              stroke="currentColor" />
          </svg>
        </div>
        <div class="td_height_100 td_height_lg_50"></div>
        <div class="td_slider td_style_1">
          <div class="container">
            <div class="row align-items-center td_gap_y_40">

              <div class="col-lg-7 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                <div class="td_image_box td_style_8">
                  <img src="{{ asset(getImage($home3_testimonial, 'image_one')) }}" alt="" class="td_image_box_img_1">
                  <img src="{{ asset(getImage($home3_testimonial, 'image_two')) }}" alt=""
                    class="td_image_box_img_2 position-absolute">
                  <img src="{{ asset(getImage($home3_testimonial, 'image_three')) }}" alt=""
                    class="td_image_box_img_3 position-absolute">
                  <span class="td_image_box_shape_1 td_accent_color position-absolute">
                    @include('svg.home3.testimonial_shape')

                  </span>
                </div>
              </div>
              <div class="col-lg-5 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="td_section_heading td_style_1">
                  <p
                    class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_accent_color">
                    {{ getTranslatedValue($home3_testimonial, 'short_title') }}</p>
                  <h2 class="td_section_title td_fs_48 mb-0">{{ getTranslatedValue($home3_testimonial, 'title') }}</h2>
                </div>
                <div class="td_height_50 td_height_lg_50"></div>
                <div class="td_slider_container" data-autoplay="0" data-loop="1" data-speed="800" data-center="0"
                  data-variable-width="0" data-slides-per-view="1">
                  <div class="td_slider_wrapper">
                    @foreach ($testimonials as $testimonial)
                        <div class="td_slide">
                        <div class="td_testimonial td_style_1 td_type_3">
                            <div class="td_rating td_mb_35" data-rating="{{ $testimonial->rating }}">
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
                            <blockquote
                            class="td_testimonial_text td_fs_24 td_medium td_heading_color td_mb_35 td_opacity_9">{{ $testimonial->comment }}</blockquote>
                            <div class="td_testimonial_meta">
                                <img src="{{ asset($testimonial->image) }}" alt="">
                                <div class="td_testimonial_meta_right">
                                    <h3 class="td_fs_24 td_semibold td_mb_2">{{ $testimonial->name }}</h3>
                                    <p class="td_fs_14 mb-0 td_heading_color td_opacity_7">{{ $testimonial->designation }}</p>
                                </div>
                            </div>
                            <span class="td_quote_icon td_accent_color">
                            <svg width="65" height="46" viewBox="0 0 65 46" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                d="M4.64286 46H18.5714L27.8571 27.6V0H0V27.6H13.9286L4.64286 46ZM41.7857 46H55.7143L65 27.6V0H37.1429V27.6H51.0714L41.7857 46Z"
                                fill="currentColor" />
                            </svg>
                            </span>
                        </div>
                        </div>
                    @endforeach

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="td_slider_arrows td_style_2">
            <div class="td_left_arrow rounded-circle td_center td_white_color">
              <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.99995 1C6.99995 1 1.00001 5.41893 1 7.00005C0.999987 8.58116 7 13 7 13" stroke="#0F121C"
                  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </div>
            <div class="td_right_arrow rounded-circle td_center td_white_color">
              <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.00005 1C1.00005 1 6.99999 5.41893 7 7.00005C7.00001 8.58116 1 13 1 13" stroke="#0F121C"
                  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </div>
          </div>
        </div>
        <div class="td_height_100 td_height_lg_50"></div>
      </div>
    </div>
  </section>
  <!-- End Testimonials Section -->

  <!-- Start Team Section -->
  <section>
    <div class="td_height_100 td_height_lg_75"></div>
    <div class="container">
      <div class="td_section_heading td_style_1 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
        <p class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_accent_color">
            {{ __('translate.WE CHANGE YOUR LIFE & WORLD') }}</p>
        <h2 class="td_section_title td_fs_48 mb-0">{{ __('translate.We’re Dedicated To Excellent') }} <br>
            {{ __('translate.Service And Kids Care') }}</h2>
      </div>
      <div class="td_height_50 td_height_lg_50"></div>
      <div class="row td_gap_y_24">
        @foreach ($instructors->take(4) as $instructor)
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="td_team td_style_3 text-center position-relative">
                    <div class="td_team_thumb_wrap td_mb_20">
                    <div class="td_team_thumb qs-shaped-border">
                        @if ($instructor?->image)
                           <div class="qs-team-thumb-wrapper">
                           <img src="{{ asset($instructor?->image) }}" alt="" class="w-100 td_radius_10 h-100 object-fit-cover"/>
                           </div>
                        @else
                        <div class="qs-team-thumb-wrapper">
                        <img src="{{ asset($general_setting->default_avatar) }}" alt="" class="w-100 td_radius_10 h-100 object-fit-cover"/>
                        </div>

                        @endif
                    </div>

                    </div>

                    <a href="{{ route('instructor.profile', $instructor->username) }}" class="td_team_info td_white_bg">
                    <h3 class="td_team_member_title td_fs_24 td_semibold mb-0">{{ html_decode($instructor->name) }}</h3>
                    <p class="td_team_member_designation mb-0 td_fs_18 td_opacity_7 td_heading_color">{{ html_decode($instructor->designation) }}</p>
                    </a>

                </div>
            </div>
        @endforeach
      </div>
      <div class="td_height_50 td_height_lg_50"></div>
      <div class="td_team_3_footer text_center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
        <b class="td_fs_18 td_normal td_fs_18 td_heading_color">{{ __('translate.Our Valuable Expert Teachers Team') }}</b>
        <a href="{{ route('instructors') }}" class="td_btn td_style_1 td_radius_30 td_medium">
          <span class="td_btn_in td_white_color td_accent_bg">
            <span>{{ __('translate.See All Team') }}</span>
            <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M15.1575 4.34302L3.84375 15.6567" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round"></path>
              <path
                d="M15.157 11.4142C15.157 11.4142 16.0887 5.2748 15.157 4.34311C14.2253 3.41142 8.08594 4.34314 8.08594 4.34314"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </span>
        </a>
      </div>
    </div>
    <div class="td_height_100 td_height_lg_50"></div>
  </section>
  <!-- End Team Section -->

  <!-- Start CTA Section -->
  <section class="td_cta td_style_2 td_accent_bg td_hobble">
    <div class="td_height_100 td_height_lg_75"></div>
    <div class="container">
      <div class="td_cta_in wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <div class="td_section_heading td_style_1">
          <p class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_heading_color">
            {{ getTranslatedValue($home3_explore, 'short_title') }}</p>
          <h2 class="td_section_title td_fs_48 td_mb_20 td_white_color">{{ getTranslatedValue($home3_explore, 'title') }}</h2>
          <p class="td_section_subtitle td_fs_18 td_mb_28 td_white_color td_opacity_9">{{ getTranslatedValue($home3_explore, 'description') }}</p>
          <a href="{{ route('courses') }}" class="td_btn td_style_1 td_radius_30 td_medium">
            <span class="td_btn_in td_heading_color td_white_bg">
              <span>{{ __('translate.Get Started') }}</span>
            </span>
          </a>
        </div>
      </div>
    </div>
    <img class="td_cta_img wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s"
      src="{{ asset(getImage($home3_explore, 'image')) }}" alt="">
    <span class="position-absolute td_cta_shape_1 td_hover_layer_3">
        @include('svg.home3.explore_shape')

    </span>

    <span class="position-absolute td_cta_shape_2 td_hover_layer_5">
        @include('svg.home3.explore_shape2')

    </span>

    <span class="position-absolute td_cta_shape_3">
        @include('svg.home3.explore_shape3')

    </span>

    <span class="position-absolute td_cta_shape_4  td_hover_layer_5">
        @include('svg.home3.explore_shape4')
    </span>

    <span class="position-absolute td_cta_shape_5">
        @include('svg.home3.explore_shape5')

    </span>
    <span class="position-absolute td_cta_shape_6  td_hover_layer_3">
        @include('svg.home3.explore_shape6')

    </span>
    <span class="position-absolute td_cta_shape_7 ">
        @include('svg.home3.explore_shape7')

    </span>
    <span class="position-absolute td_cta_shape_8  td_hover_layer_5">
        @include('svg.home3.explore_shape8')

    </span>
    <div class="td_height_100 td_height_lg_50"></div>
  </section>
  <!-- End CTA Section -->

  <!-- Start Blog Section -->
  <section>
    <div class="td_height_100 td_height_lg_75"></div>
    <div class="container">
      <div class="td_section_heading td_style_1 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
        <p class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_accent_color">
            {{ __('translate.BLOG & ARTICLES') }}</p>
        <h2 class="td_section_title td_fs_48 mb-0">{{ __('translate.Take A Look At The Latest') }} <br>{{ __('translate.Articles') }}</h2>
      </div>
      <div class="td_height_50 td_height_lg_50"></div>
      <div class="row td_gap_y_24">
        @foreach ($blogs->take(4) as $blog)
            <div class="col-xl-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="td_post td_style_1 td_type_2">
                    <a href="{{ route('blog', $blog->slug) }}" class="td_post_thumb d-block">
                        <img src="{{ asset($blog->image) }}" alt="">
                    <span class="td_post_label">{{ $blog?->category?->name }}</span>
                    </a>
                    <div class="td_post_info">
                    <div class="td_post_meta td_fs_14 td_medium td_mb_16">
                        <span>
                            @include('svg.blog_date')
                            {{ $blog->created_at->format('d-m-Y') }}
                        </span>
                        <span>
                        @include('svg.blog_author')
                        {{ $blog?->author?->name }}
                        </span>
                    </div>
                    <h2 class="td_post_title td_fs_24 td_medium td_mb_16">
                        <a href="{{ route('blog', $blog->slug) }}">{{ $blog?->title }}</a>
                    </h2>
                    <p class="td_post_subtitle td_mb_20 td_heading_color td_opacity_7">{{ $blog?->short_description }}</p>
                    <a href="{{ route('blog', $blog->slug) }}" class="td_btn td_style_3 td_heading_color td_fs_18">
                        <span>{{ __('translate.Read More') }}</span>
                        <i>
                        <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17 6L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                            <path d="M12 11C12 11 17 7.31756 17 5.99996C17 4.68237 12 1 12 1" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        </i>
                    </a>
                    </div>
                </div>
            </div>
        @endforeach

      </div>
    </div>
    <div class="td_height_100 td_height_lg_50"></div>
  </section>
  <!-- End Blog Section -->

  <!-- Start Newsletter Section -->
  <div class="td_newsletter td_style_1 td_type_1 td_center">
    <div class="container wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
      <div class="d-flex justify-content-center">
      <h2 class="td_fs_36 td_mb_20 text-center td_semibold qs-custom-min-width-1">{{ getTranslatedValue($home3_newsletter, 'title') }}</h2>
      </div>
      <form action="{{ route('store-newsletter') }}" method="POST" class="td_newsletter_form">
        @csrf
        <input type="email" class="td_newsletter_input" placeholder="{{ __('translate.Email address') }}" name="email">
        <button type="submit" class="td_btn td_style_1 td_radius_30 td_medium">
          <span class="td_btn_in td_white_color td_accent_bg">
            <span>{{ __('translate.Subscribe Now') }}</span>
          </span>
        </button>
      </form>
    </div>
    <div class="td_newsletter_img_1 position-absolute wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
      <img src="{{ asset(getImage($home3_newsletter, 'image_one')) }}" alt="">
    </div>
    <div class="td_newsletter_img_2 position-absolute wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
      <img src="{{ asset(getImage($home3_newsletter, 'image_two')) }}" alt="">
    </div>
  </div>
  <!-- End Newsletter Section -->


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

        });

    </script>
@endpush
