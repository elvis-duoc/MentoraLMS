@extends('layout')

@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection

@section('front-content')


  <!-- Start Hero Section -->
  <section class="td_hero td_style_2 td_center text-center td_hobble">
    <div class="container">
      <div class="td_hero_text wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
        <h1 class="td_hero_title td_fs_64 td_mb_30">
            {!! strip_tags(clean(getTranslatedValue($home1_hero_section, 'heading')),'<span>') !!}
        </h1>
        <p class="td_hero_subtitle td_fs_18  td_mb_40">{{ getTranslatedValue($home1_hero_section, 'description') }}</p>
        <div class="td_btns_group">
          <a href="{{ route('courses') }}" class="td_btn td_style_1 td_radius_30 td_medium td_with_shadow">
            <span class="td_btn_in td_white_color td_accent_bg">
              <span>{{ __('translate.Explore Course') }}</span>
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
              <img src="{{ asset(getImage($home1_hero_section, 'student_image')) }}" alt="thumb">
            </div>
            <div>
              <h3 class="mb-0 td_fs_20 td_semibold">{{ getTranslatedValue($home1_hero_section, 'total_student') }}</h3>
              <p class="mb-0 td_fs_18">{{ getTranslatedValue($home1_hero_section, 'total_student_title') }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="td_hero_img_box_left">
      <div class="td_hero_img_1 position-absolute wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.25s">
        <img src="{{ asset(getImage($home1_hero_section, 'left_side_image_one')) }}" alt="">
      </div>
      <div class="td_hero_img_2 position-absolute wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.25s">
        <img src="{{ asset(getImage($home1_hero_section, 'left_side_image_two')) }}" alt="">
      </div>
      <div class="td_hero_img_3 position-absolute wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.25s">
        <img src="{{ asset(getImage($home1_hero_section, 'left_side_image_three')) }}" alt="">
      </div>
      <span class="td_hero_shape_1 position-absolute td_hover_layer_3">
        <svg width="329" height="316" viewBox="0 0 329 316" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g style="mix-blend-mode:luminosity" opacity="0.3">
            <circle cx="171" cy="157.998" r="157" stroke="#6440FB" stroke-width="2" stroke-dasharray="20 20" />
          </g>
          <g style="mix-blend-mode:luminosity" opacity="0.3">
            <circle cx="158" cy="157.998" r="157" stroke="#6440FB" stroke-width="2" stroke-dasharray="20 20" />
          </g>
        </svg>
      </span>
      <span class="td_hero_shape_2 position-absolute td_hover_layer_3">
        @include('svg.hero_light')

      </span>
    </div>
    <div class="td_hero_img_box_right">
      <div class="td_hero_img_4 position-absolute wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.25s">
        <img src="{{ asset(getImage($home1_hero_section, 'right_side_image_one')) }}" alt="">
      </div>
      <div class="td_hero_img_5 position-absolute wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.25s">
        <img src="{{ asset(getImage($home1_hero_section, 'right_side_image_two')) }}" alt="">
      </div>
      <div class="td_hero_img_6 position-absolute wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.25s">
        <img src="{{ asset(getImage($home1_hero_section, 'right_side_image_three')) }}" alt="">
      </div>
      <span class="td_hero_shape_3 position-absolute td_hover_layer_5">
        <svg width="329" height="316" viewBox="0 0 329 316" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g style="mix-blend-mode:luminosity" opacity="0.3">
            <circle cx="171" cy="157.998" r="157" stroke="#6440FB" stroke-width="2" stroke-dasharray="20 20"></circle>
          </g>
          <g style="mix-blend-mode:luminosity" opacity="0.3">
            <circle cx="158" cy="157.998" r="157" stroke="#6440FB" stroke-width="2" stroke-dasharray="20 20"></circle>
          </g>
        </svg>
      </span>
      <div class="td_hero_shape_4 position-absolute"></div>
    </div>
    <span class="td_hero_shape_5 position-absolute td_hover_layer_5">
        @include('svg.hero_light2')
    </span>

    <span class="td_hero_shape_6 position-absolute">
        @include('svg.hero_light3')
    </span>
  </section>

  <!-- End Hero Section -->


  <!-- Start Category Section -->
  <section>
    <div class="td_height_100 td_height_lg_75"></div>
    <div class="container">
      <div class="td_section_heading td_style_1 td_type_1 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
        <div class="td_section_heading_left">
          <p class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_accent_color">
            <i></i>
            {{ __('translate.Browse Categories') }}
            <i></i>
          </p>
          <h2 class="td_section_title td_fs_48 mb-0">{{ __('translate.Explore Online Courses') }}</h2>
        </div>
        <div class="td_section_heading_right">
          <p class="td_section_subtitle td_fs_18 td_mb_16 ">
           {{ __('translate. Far far away, behind the word mountains, far from the Consonantia, there live the blind texts. Separated') }}</p>
          <a href="{{ route('courses') }}" class="td_btn td_style_2 td_heading_color td_medium td_mb_10">
            {{ __('translate.See all Courses') }}
            <i>
              @include('svg.explore_more_category')
            </i>
          </a>
        </div>
      </div>

      <div class="td_height_50 td_height_lg_50"></div>
      <div class="row td_gap_y_24">
        @foreach ($categories as $category)
        <div class="col-xl-3 col-lg-4 col-sm-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
          <div class="td_iconbox td_style_2 text-center td_hobble">
            <div class="td_iconbox_in td_hover_layer_4">
              <div class="td_hover_layer_3">
                <div class="td_iconbox_icon td_mb_16">
                  <img src="{{ asset($category->icon) }}" alt="">
                </div>
                <h3 class="td_iconbox_title td_fs_20 td_semibold td_opacity_8 td_mb_16">{{ $category->name }}</h3>
                <p class="td_iconbox_subtitle mb-0">{{ __('translate.Courses') }} <span>({{ $category->total_course }})</span></p>
              </div>
            </div>
            <a href="{{ route('courses', ['category' => $category->slug]) }}" class="td_iconbox_link"></a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <div class="td_height_100 td_height_lg_50"></div>
  </section>
  <!-- End Category Section -->


  <!-- Start Rate Section -->
  <section class="td_accent_bg td_rate_section wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
    <div class="td_rate_heading td_fs_20 td_semibold td_white_color">
      {{ __('translate.Excellent Rated On Trustpilot') }}
      <div class="td_rating_wrap">
        <div class="td_rating" data-rating="5">
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
      </div>
    </div>
    <div class="td_rate_feature_list_wrap">
      <div class="td_moving_box_wrap">
        <div class="td_moving_box_in">
          <div class="td_moving_box">
            <ul class="td_rate_feature_list td_mp_0">
              <li>
                <div class="td_rate_feature_icon td_center td_white_bg">
                  <img src="{{ asset(getImage($home1_key_feature, 'item_one_image')) }}" alt="">
                </div>
                <div class="td_rate_feature_right">
                  <h3 class="td_fs_24 td_semibold td_white_color td_mb_4">{{ getTranslatedValue($home1_key_feature, 'item_one_title') }}</h3>
                  <p class="mb-0 td_white_color td_opacity_7">{{ getTranslatedValue($home1_key_feature, 'item_one_description') }}</p>
                </div>
              </li>

              <li>
                <div class="td_rate_feature_icon td_center td_white_bg">
                  <img src="{{ asset(getImage($home1_key_feature, 'item_two_image')) }}" alt="">
                </div>
                <div class="td_rate_feature_right">
                  <h3 class="td_fs_24 td_semibold td_white_color td_mb_4">{{ getTranslatedValue($home1_key_feature, 'item_two_title') }}</h3>
                  <p class="mb-0 td_white_color td_opacity_7">{{ getTranslatedValue($home1_key_feature, 'item_two_description') }}</p>
                </div>
              </li>

              <li>
                <div class="td_rate_feature_icon td_center td_white_bg">
                  <img src="{{ asset(getImage($home1_key_feature, 'item_three_image')) }}" alt="">
                </div>
                <div class="td_rate_feature_right">
                  <h3 class="td_fs_24 td_semibold td_white_color td_mb_4">{{ getTranslatedValue($home1_key_feature, 'item_three_title') }}</h3>
                  <p class="mb-0 td_white_color td_opacity_7">{{ getTranslatedValue($home1_key_feature, 'item_three_description') }}</p>
                </div>
              </li>

              <li>
                <div class="td_rate_feature_icon td_center td_white_bg">
                  <img src="{{ asset(getImage($home1_key_feature, 'item_four_image')) }}" alt="">
                </div>
                <div class="td_rate_feature_right">
                  <h3 class="td_fs_24 td_semibold td_white_color td_mb_4">{{ getTranslatedValue($home1_key_feature, 'item_four_title') }}</h3>
                  <p class="mb-0 td_white_color td_opacity_7">{{ getTranslatedValue($home1_key_feature, 'item_four_description') }}</p>
                </div>
              </li>

            </ul>
          </div>
          <div class="td_moving_box">
            <ul class="td_rate_feature_list td_mp_0">
                <li>
                    <div class="td_rate_feature_icon td_center td_white_bg">
                      <img src="{{ asset(getImage($home1_key_feature, 'item_one_image')) }}" alt="">
                    </div>
                    <div class="td_rate_feature_right">
                      <h3 class="td_fs_24 td_semibold td_white_color td_mb_4">{{ getTranslatedValue($home1_key_feature, 'item_one_title') }}</h3>
                      <p class="mb-0 td_white_color td_opacity_7">{{ getTranslatedValue($home1_key_feature, 'item_one_description') }}</p>
                    </div>
                  </li>

                  <li>
                    <div class="td_rate_feature_icon td_center td_white_bg">
                      <img src="{{ asset(getImage($home1_key_feature, 'item_two_image')) }}" alt="">
                    </div>
                    <div class="td_rate_feature_right">
                      <h3 class="td_fs_24 td_semibold td_white_color td_mb_4">{{ getTranslatedValue($home1_key_feature, 'item_two_title') }}</h3>
                      <p class="mb-0 td_white_color td_opacity_7">{{ getTranslatedValue($home1_key_feature, 'item_two_description') }}</p>
                    </div>
                  </li>

                  <li>
                    <div class="td_rate_feature_icon td_center td_white_bg">
                      <img src="{{ asset(getImage($home1_key_feature, 'item_three_image')) }}" alt="">
                    </div>
                    <div class="td_rate_feature_right">
                      <h3 class="td_fs_24 td_semibold td_white_color td_mb_4">{{ getTranslatedValue($home1_key_feature, 'item_three_title') }}</h3>
                      <p class="mb-0 td_white_color td_opacity_7">{{ getTranslatedValue($home1_key_feature, 'item_three_description') }}</p>
                    </div>
                  </li>

                  <li>
                    <div class="td_rate_feature_icon td_center td_white_bg">
                      <img src="{{ asset(getImage($home1_key_feature, 'item_four_image')) }}" alt="">
                    </div>
                    <div class="td_rate_feature_right">
                      <h3 class="td_fs_24 td_semibold td_white_color td_mb_4">{{ getTranslatedValue($home1_key_feature, 'item_four_title') }}</h3>
                      <p class="mb-0 td_white_color td_opacity_7">{{ getTranslatedValue($home1_key_feature, 'item_four_description') }}</p>
                    </div>
                  </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Rate Section -->


  <!-- Start About Section -->
  <section>
    <div class="td_height_100 td_height_lg_75"></div>
    <div class="container">
      <div class="row td_gap_y_40">
        <div class="col-lg-6">
          <div class="td_image_box td_style_2">
            <div class="td_image_box_img_1 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.25s">
              <img src="{{ asset(getImage($home1_about_us, 'image_one')) }}" alt="">
            </div>
            <div class="td_image_box_img_2 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
              <img src="{{ asset(getImage($home1_about_us, 'image_two')) }}" alt="" class="td_image_box_img_2_thumb">

              @include('svg.home1_about_shadow')
            </div>
            <div class="td_award_box wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.25s">
              <div class="td_award_box_icon td_center">
                @include('svg.home1_about_light')
              </div>
              <div class="td_award_box_in">
                <p class="td_fs_24 td_semibold td_white_color td_center td_accent_bg">{{ getTranslatedValue($home1_about_us, 'experience_year') }}+</p>
                <h3 class="td_fs_14 td_semibold mb-0">{{ getTranslatedValue($home1_about_us, 'experience_title') }}</h3>
              </div>
            </div>
            <div class="td_image_box_shape_1"></div>
            <div class="td_image_box_shape_2">
              <a href="https://www.youtube.com/embed/{{ getTranslatedValue($home1_about_us, 'youtube_video_id') }}"
                class="td_player_btn_wrap td_video_open td_medium td_heading_color">
                <span class="td_player_btn td_center">
                  <span></span>
                </span>
              </a>
            </div>
            <div class="td_image_box_shape_3 td_accent_color">
                @include('svg.home1_about_shadow2')
            </div>
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.35s">
          <div class="td_section_heading td_style_1 td_mb_40">
            <p class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_accent_color">
              <i></i>{{ getTranslatedValue($home1_about_us, 'short_title') }}<i></i>
            </p>
            <h2 class="td_section_title td_fs_48 td_mb_24">{{ getTranslatedValue($home1_about_us, 'title') }} </h2>
            <p class="td_section_subtitle td_fs_18 mb-0">{{ getTranslatedValue($home1_about_us, 'description') }}</p>
          </div>
          <div class="td_mb_40 position-relative">
            <ul class="td_list td_style_2 td_fs_24 td_medium td_heading_color td_mp_0">
              <li>
                @include('svg.home1_about_list_item')
                {{ getTranslatedValue($home1_about_us, 'item_one') }}
              </li>
              <li>
                @include('svg.home1_about_list_item')
                {{ getTranslatedValue($home1_about_us, 'item_two') }}
              </li>
              <li>
                @include('svg.home1_about_list_item')
                {{ getTranslatedValue($home1_about_us, 'item_three') }}
              </li>
              <li>
                @include('svg.home1_about_list_item')
                {{ getTranslatedValue($home1_about_us, 'item_four') }}
              </li>
            </ul>
            <div class="td_list_2_shape">
                @include('svg.home1_about_right_shadow')

            </div>
          </div>
          <a href="{{ route('about-us') }}" class="td_btn td_style_1 td_radius_30 td_medium td_with_shadow">
            <span class="td_btn_in td_white_color td_accent_bg">
              <span>{{ __('translate.More About') }}</span>
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


  <!-- Start Courses Section -->
  <section class="td_gray_bg_4">
    <div class="td_height_100 td_height_lg_75"></div>
    <div class="container">
      <div class="td_tabs td_style_1">
        <div class="td_section_heading td_style_1 td_type_2 td_with_tab_menu wow fadeInUp" data-wow-duration="1s"
          data-wow-delay="0.2s">
          <div class="td_section_heading_left">
            <p class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_accent_color">
              <i></i>
              {{ __('translate.Latest courses') }}
              <i></i>
            </p>
            <h2 class="td_section_title td_fs_48 mb-0">{{ __('translate.Pick Our Latest Courses') }} <br>{{ __('translate.and Build your Skills') }}</h2>
          </div>
          <div class="td_section_heading_right">
            <ul class="td_tab_links td_style_2 td_mp_0 td_medium td_fs_20 td_heading_color">
                @foreach ($home_1_filter_categories as $category)
                <li class="{{ $loop->first ? 'active' : '' }}"><a href="#{{$category->slug}}">{{ $category?->name }}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="td_height_50 td_height_lg_50"></div>
        <div class="td_tab_body">
            @foreach ($home_1_filter_categories as $category)
                <div class="td_tab {{ $loop->first ? 'active' : '' }}" id="{{$category->slug}}">
                    <div class="row td_gap_y_30 td_row_gap_30">
                        @foreach($category?->courses->take(4) as $course_index => $course)
                            <div class="col-xl-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                                <div class="td_card td_style_5 td_type_1">
                                <div class="td_card_thumb">
                                    <span class="td_card_thumb_in">
                                    <img src="{{ asset($course?->thumb_image) }}" alt="">
                                    @if ($course?->is_popular == 'enable')
                                        <span class="td_card_label td_fs_14 td_white_color td_accent_bg">{{ __('translate.Popular') }}</span>
                                    @endif
                                    <a href="javascript:;" class="add_to_wishlist {{ in_array($course->id, $wishlist_array) ? 'active' : '' }}" data-course_id="{{ $course->id }}">
                                        <span class="td_cart_wishlist_icon">
                                            @include('svg.course_wishlist')
                                        </span>
                                    </a>

                                    </span>

                                </div>
                                <div class="td_card_content">
                                    <ul class="td_card_meta td_mp_0 td_fs_16 td_heading_color">
                                    <li>
                                        @include('svg.course_seat')

                                        <span class="td_opacity_7">{{ $course->total_student }} {{ __('translate.Students') }}</span>
                                    </li>
                                    <li>
                                        @include('svg.course_semester')

                                        <span class="td_opacity_7">{{ $course->total_lesson }} {{ __('translate.Lessons') }}</span>
                                    </li>
                                    </ul>
                                    <h2 class="td_card_title td_fs_24 td_semibold td_mb_12"><a href="{{ route('course', $course->slug) }}">{{ html_decode($course?->title) }}</a></h2>
                                    <div class="td_card_price_wrap td_mb_12">
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
                                        <span class="td_heading_color td_opacity_5 td_fs_14">({{ $course->total_rating }} {{ __('translate.Ratings') }})</span>
                                    </div>
                                    <span class="td_card_price td_accent_bg td_white_color td_fs_18 td_medium">
                                        @if ($course->offer_price)
                                            {{ currency($course->offer_price) }}
                                        @else
                                            {{ currency($course->regular_price) }}
                                        @endif
                                    </span>
                                    </div>
                                    <div class="td_card_btns_wrap">
                                    <a href="javascript:;" class="td_btn td_style_1 td_type_3 td_radius_30 td_medium td_fs_14 add_to_cart" data-course_id="{{ $course->id }}">
                                        <span class="td_btn_in td_accent_color">
                                        <span>{{ __('translate.Add to Cart') }}</span>
                                        </span>
                                    </a>
                                    <span class="td_fs_18 td_medium td_heading_color">{{ html_decode($course?->instructor?->name) }}</span>
                                    </div>
                                </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div><!-- .td_tab_item -->
            @endforeach
        </div>
      </div>
    </div>
    <div class="td_height_100 td_height_lg_50"></div>
  </section>
  <!-- End Courses Section -->


  <!-- Start Brands Section -->
  <div class="td_height_100 td_height_lg_50"></div>
  <section class="td_heading_bg td_shape_section_6">
    <div class="td_shape_position_1 position-absolute"></div>
    <div class="td_shape_position_2 position-absolute"></div>
    <div class="td_shape_position_3 position-absolute"></div>
    <div class="td_half_white_bg">
      <div class="container">
        <div class="row td_gap_y_30">
          <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
            <div class="td_card td_style_4 td_accent_bg">
              <div class="td_card_left">
                <h3 class="td_fs_32 td_mb_16 td_white_color">
                    {!! strip_tags(clean(getTranslatedValue($home1_join_instructor, 'first_item_title')),'<span>') !!}

                </h3>
                <p class="td_fs_18 td_white_color td_opacity_9 td_mb_30">
                    {{ getTranslatedValue($home1_join_instructor, 'first_item_description') }}
                 </p>
                <a href="{{ route('student.become-an-instructor') }}" class="td_btn td_style_1 td_type_3 td_radius_30 td_medium td_with_shadow">
                  <span class="td_btn_in td_white_color td_accent_bg">
                    <span>{{ __('translate.Become A Instructor') }}</span>
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
              <div class="td_card_thumb">
                <img src="{{ asset(getImage($home1_join_instructor, 'first_item_image')) }}" alt="">
              </div>
              <div class="td_card_1">
                @include('svg.home1_join_instructor_left_shadow1')
              </div>
              <div class="td_card_2">
                @include('svg.home1_join_instructor_left_shadow2')
              </div>
            </div>
          </div>
          <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
            <div class="td_card td_style_4 td_accent_bg">
              <div class="td_card_left">
                <h3 class="td_fs_32 td_mb_16 td_white_color">
                    {!! strip_tags(clean(getTranslatedValue($home1_join_instructor, 'second_item_title')),'<span>') !!}
                </h3>
                <p class="td_fs_18 td_white_color td_opacity_9 td_mb_30">
                    {{ getTranslatedValue($home1_join_instructor, 'second_item_description') }}
                 </p>
                <a href="{{ route('student.register') }}" class="td_btn td_style_1 td_type_3 td_radius_30 td_medium td_with_shadow">
                  <span class="td_btn_in td_white_color td_accent_bg">
                    <span>{{ __('translate.Become A Student') }}</span>
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
              <div class="td_card_thumb">
                <img src="{{ asset(getImage($home1_join_instructor, 'second_item_image')) }}" alt="">
              </div>

              <div class="td_card_1">
                @include('svg.home1_join_instructor_left_shadow1')
              </div>
              <div class="td_card_2">
                @include('svg.home1_join_instructor_left_shadow2')
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="td_height_80 td_height_lg_80"></div>
      <h2 class="td_fs_32 td_semibold td_opacity_9 td_mb_50 text-center td_white_color wow fadeInUp"
        data-wow-duration="1s" data-wow-delay="0.2s">{{ __('translate.Trusted by Worlds 13k Plus Students &') }} <br>{{ __('translate.Teams it Recommended') }}
      </h2>
      <div class="td_slider td_style_1 td_slider_gap_24 td_remove_overflow wow fadeInUp" data-wow-duration="1s"
        data-wow-delay="0.3s">
        <div class="td_slider_container" data-autoplay="0" data-loop="1" data-speed="800" data-center="0"
          data-variable-width="0" data-slides-per-view="responsive" data-xs-slides="2" data-sm-slides="3"
          data-md-slides="4" data-lg-slides="5" data-add-slides="6">
          <div class="td_slider_wrapper">
                @foreach ($partners as $partner)
                    <a href="{{ $partner->link }}" target="_blank" class="td_slide">
                            <div class="td_brand td_style_1">
                            <img src="{{ asset($partner->logo) }}" alt="">
                            </div>
                    </a>
                @endforeach
          </div>
        </div>

      </div>
    </div>
    <div class="td_height_100 td_height_lg_50"></div>
  </section>

  <!-- End Brands Section -->


    <!-- Start Team Section -->
  <section class="td_shape_section_8 td_hobble">
    <span class="td_shape_position_1 position-absolute td_hover_layer_3">
        @include('svg.home1_instructor_shadow')
    </span>
    <span class="td_shape_position_2 position-absolute td_hover_layer_3">
        @include('svg.home1_instructor_shadow2')
    </span>
    <div class="td_height_100 td_height_lg_75"></div>
    <div class="container">
      <div class="td_section_heading td_style_1 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
        <p class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_accent_color">
          <i></i>
          {{ __('translate.Featured Instructor') }}
          <i></i>
        </p>
        <h2 class="td_section_title td_fs_48 mb-0">{{ __('translate.Our Expert Instructor') }}</h2>
        <p class="td_section_subtitle td_fs_18 mb-0">
            {{ __('translate.Far far away, behind the word mountains, far from the Consonantia, there') }} <br>{{ __('translate.live the blind texts. Separated they marks grove right') }}</p>
      </div>
      <div class="td_height_50 td_height_lg_50"></div>
      <div class="row td_gap_y_30">
        @foreach ($instructors->take(4) as $instructor)
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                <div class="td_team td_style_1 text-center position-relative qs-instructor-card_h1">

                    @if ($instructor?->image)
                        <img src="{{ asset($instructor?->image) }}" alt="" class="w-100 td_radius_10 qs-instructor-card_h1_img"/>
                    @else
                        <img src="{{ asset($general_setting->default_avatar) }}" alt="" class="w-100 td_radius_10 qs-instructor-card_h1_img"/>
                    @endif

                    <a href="{{ route('instructor.profile', $instructor->username) }}" class="td_team_info td_white_bg">
                    <h3 class="td_team_member_title td_fs_18 td_semibold mb-0">{{ html_decode($instructor->name) }}</h3>
                    <p class="td_team_member_designation mb-0 td_fs_14 td_opacity_7 td_heading_color">{{ html_decode($instructor->designation) }}</p>
                    </a>
                </div>
            </div>
        @endforeach
      </div>
      <div class="td_height_60 td_height_lg_40"></div>
      <div class="text-center wow zoomIn" data-wow-duration="1s" data-wow-delay="0.2s">

        <a href="{{ route('instructors') }}" class="td_btn td_style_1 td_radius_30 td_medium td_with_shadow">
          <span class="td_btn_in td_white_color td_accent_bg">
            <span>{{ __('translate.See All Instructors') }}</span>
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


  <!-- Start Testimonials Section -->
  <section class="td_shape_section_7 td_hobble">
    <span class="td_shape_position_1 position-absolute td_hover_layer_3">
        @include('svg.home1_testimonial_shape1')


    </span>
    <span class="td_shape_position_2 position-absolute td_hover_layer_5">
        @include('svg.home1_testimonial_shape2')


    </span>
    <span class="td_shape_position_3 position-absolute td_hover_layer_3">
        @include('svg.home1_testimonial_shape3')

    </span>
    <span class="td_shape_position_4 position-absolute td_hover_layer_5">
        @include('svg.home1_testimonial_shape4')
    </span>
    <div class="td_height_100 td_height_lg_75"></div>
    <div class="container">
      <div class="td_section_heading td_style_1 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
        <p class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_accent_color">
          <i></i>
          {{ __('translate.Testimonials') }}
          <i></i>
        </p>
        <h2 class="td_section_title td_fs_48 mb-0">{{ __('translate.What Our Students Say About') }} <br>{{ __('translate.Our Online Services') }} </h2>
        <p class="td_section_subtitle td_fs_18 mb-0">
            {{ __('translate.Far far away, behind the word mountains, far from the Consonantia, there live') }} <br>{{ __('translate.the blind texts. Separated they marks grove') }}</p>
      </div>
      <div class="td_height_50 td_height_lg_50"></div>
      <div class="td_slider td_style_1 td_slider_gap_24 td_remove_overflow wow fadeInUp qs-h1-testimonial_dots" data-wow-duration="1s"
        data-wow-delay="0.3s">
        <div class="td_slider_container" data-autoplay="0" data-loop="1" data-speed="800" data-center="0"
          data-variable-width="0" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2"
          data-md-slides="2" data-lg-slides="2" data-add-slides="2">
          <div class="td_slider_wrapper">

            @foreach ($testimonials as $testimonial)
                <div class="td_slide">
                <div class="td_testimonial td_style_1 td_type_1 td_white_bg td_radius_5">
                    <span class="td_quote_icon td_accent_color">
                    <svg width="65" height="46" viewBox="0 0 65 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.05"
                        d="M13.9286 26.6H1V1H26.8571V27.362L17.956 45H6.26764L14.8213 28.0505L15.5534 26.6H13.9286ZM51.0714 26.6H38.1429V1H64V27.362L55.0988 45H43.4105L51.9642 28.0505L52.6962 26.6H51.0714Z"
                        fill="currentColor" stroke="currentColor" stroke-width="2" />
                    </svg>
                    </span>
                    <div class="td_testimonial_meta td_mb_24">
                    <img src="{{ asset($testimonial->image) }}" alt="">
                    <div class="td_testimonial_meta_right">
                        <h3 class="td_fs_24 td_semibold td_mb_2">{{ $testimonial->name }}</h3>
                        <p class="td_fs_14 mb-0 td_heading_color td_opacity_7">{{ $testimonial->designation }}</p>
                    </div>
                    </div>
                    <blockquote class="td_testimonial_text td_fs_20 td_medium td_heading_color td_mb_24 td_opacity_9">
                        {{ $testimonial->comment }}
                    </blockquote>
                    <div class="td_rating" data-rating="{{ $testimonial->rating }}">
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
                </div>
                </div>
            @endforeach

          </div>
        </div>
        <div class="td_height_50 td_height_lg_40"></div>
        <div class="td_pagination td_style_1"></div>
      </div>
    </div>
    <div class="td_height_100 td_height_lg_50"></div>
  </section>

  <!-- End Testimonials Section -->

  <!-- Start Why Choose Us -->
  <section class="td_gray_bg_4 td_shape_section_1">
    <div class="td_shape td_shape_position_1">
      <svg width="87" height="113" viewBox="0 0 87 113" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M25.691 111.917C25.691 111.917 -7.02966 93.8525 2.38905 82.7066C11.2077 72.271 35.8654 92.8719 35.8654 92.8719C35.8654 92.8719 5.83058 76.9964 14.5061 67.298C22.5942 58.2562 43.8593 77.4658 43.8593 77.4658C43.8593 77.4658 16.9095 60.7077 25.7747 52.6174C34.0664 45.0504 51.6127 65.2129 51.6127 65.2129C51.6127 65.2129 29.1149 45.8206 38.378 39.1487C46.5941 33.2309 54.6422 57.4625 61.7897 50.2905C69.1571 42.8978 40.5552 34.9852 47.8295 27.501C54.9741 20.1502 62.8767 44.3479 71.3628 39.1278C79.849 33.9077 52.6662 22.2808 60.3126 15.6088C67.8059 9.07036 73.47 32.2249 82.5125 28.0853C93.6341 22.994 71.5868 9.86166 66.4881 1.17403"
          stroke="#6440FB" />
      </svg>

    </div>
    <div class="td_shape td_shape_position_2"></div>
    <div class="td_shape td_shape_position_3"></div>
    <div class="td_height_100 td_height_lg_75"></div>
    <div class="container">
      <div class="row align-items-center td_gap_y_40">
        <div class="col-xl-6">
          <div class="td_image_box td_style_1">
            <img src="{{ asset(getImage($home1_why_choose_us, 'feature_image')) }}" alt="" class="td_image_box_thumb wow fadeInUp"
              data-wow-duration="1s" data-wow-delay="0.2s">
            <div class="td_avatars_wrap td_type_2 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
              <h3 class="mb-0 td_fs_24 td_semibold">{{ getTranslatedValue($home1_why_choose_us, 'total_student') }}</h3>
              <div class="td_avatars">
                <img src="{{ asset(getImage($home1_why_choose_us, 'total_student_image')) }}" class="w-100" alt="thumb">
              </div>
            </div>
            <a href="https://www.youtube.com/embed/{{ getTranslatedValue($home1_why_choose_us, 'youtube_video_id') }}"
              class="td_player_btn_wrap_3 td_video_open td_center wow fadeInRight" data-wow-duration="1s"
              data-wow-delay="0.2s">
              <span class="td_player_btn td_center">
                <span></span>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.4s">
          <div class="td_section_heading td_style_1">
            <p class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_accent_color">
              <i></i>
              {{ getTranslatedValue($home1_why_choose_us, 'short_title') }}
              <i></i>
            </p>
            <h2 class="td_section_title td_fs_36 mb-0">{{ getTranslatedValue($home1_why_choose_us, 'title') }}</h2>
            <p class="td_section_subtitle td_fs_18 mb-0">{{ getTranslatedValue($home1_why_choose_us, 'description') }}</p>
          </div>
          <div class="td_height_40 td_height_lg_40"></div>
          <ul class="td_list td_style_1 td_mp_0 td_semibold td_heading_color">
            <li>
              <i class="td_list_icon td_center">
                @include('svg.home1_why_choose_list')
              </i>
              {{ getTranslatedValue($home1_why_choose_us, 'item_one') }}

            </li>
            <li>
                <i class="td_list_icon td_center">
                @include('svg.home1_why_choose_list')
                </i>
                {{ getTranslatedValue($home1_why_choose_us, 'item_two') }}
            </li>
            <li>
                <i class="td_list_icon td_center">
                    @include('svg.home1_why_choose_list')
                </i>
                {{ getTranslatedValue($home1_why_choose_us, 'item_three') }}
            </li>
            <li>
                <i class="td_list_icon td_center">
                    @include('svg.home1_why_choose_list')
                </i>
                {{ getTranslatedValue($home1_why_choose_us, 'item_four') }}
            </li>
            <li>
                <i class="td_list_icon td_center">
                    @include('svg.home1_why_choose_list')
                </i>
                {{ getTranslatedValue($home1_why_choose_us, 'item_five') }}
            </li>
            <li>
                <i class="td_list_icon td_center">
                    @include('svg.home1_why_choose_list')
                </i>
                {{ getTranslatedValue($home1_why_choose_us, 'item_six') }}
            </li>
          </ul>
          <div class="td_height_40 td_height_lg_40"></div>
          <a href="{{ route('courses') }}" class="td_btn td_style_1 td_radius_30 td_medium td_with_shadow">
            <span class="td_btn_in td_white_color td_accent_bg">
              <span>{{ __('translate.Get Started') }}</span>
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
    <div class="td_height_100 td_height_lg_75"></div>
  </section>
  <!-- End Why Choose Us -->


  <!-- Start Blog Section -->
  <section>
    <div class="td_height_100 td_height_lg_75"></div>
    <div class="container">
      <div class="td_section_heading td_style_1 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
        <p class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_accent_color">
          <i></i>
          {{ __('translate.BLOG & ARTICLES') }}
          <i></i>
        </p>
        <h2 class="td_section_title td_fs_48 mb-0">{{ __('translate.Take A Look At The Latest') }} <br>{{ __('translate.Articles') }}</h2>
      </div>
      <div class="td_height_50 td_height_lg_50"></div>
      <div class="row td_gap_y_24">

        @foreach ($blogs as $blog)
            <div class="col-xl-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.35s">
              <div class="td_post td_style_1 td_type_1">
                  <a href="{{ route('blog', $blog->slug) }}" class="td_post_thumb d-block">
                  <img src="{{ asset($blog->image) }}" alt="">
                  <span class="td_post_label">{{ $blog?->category?->name }}</span>
                  </a>
                  <div class="td_post_info">
                  <div class="td_post_meta td_fs_14 td_medium td_mb_20">
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
                  <p class="td_post_subtitle td_mb_24 td_heading_color td_opacity_7">
                      {{ $blog?->short_description }}
                  </p>
                  <a href="{{ route('blog', $blog->slug) }}" class="td_btn td_style_1 td_type_3 td_radius_30 td_medium">
                      <span class="td_btn_in td_accent_color">
                      <span>{{ __('translate.Read More') }}</span>
                      </span>
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
