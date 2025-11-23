@extends('layout2')

@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection

@section('front-content')

  <!-- Start Hero Section -->
  <section class="td_hero td_style_3 td_center td_hobble">
    <div class="container">
      <div class="td_hero_text wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
        <p class="td_hero_subtitle_up td_fs_18 td_accent_color td_spacing_1 td_semibold text-uppercase td_mb_14">
          {{ getTranslatedValue($home2_hero_section, 'short_heading') }}
        </p>
        <h1 class="td_hero_title td_fs_64 td_mb_20">{{ getTranslatedValue($home2_hero_section, 'heading') }}</h1>
        <p class="td_hero_subtitle td_fs_18 td_heading_color td_opacity_7 td_mb_30">
          {{ getTranslatedValue($home2_hero_section, 'description') }}
        </p>
        <div class="td_btns_group">
          <a href="{{ route('courses') }}" class="td_btn td_style_1 td_radius_30 td_medium">
            <span class="td_btn_in td_white_color td_accent_bg">
              <span>{{ __('translate.Explore All Courses') }}</span>
              <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.1575 4.34302L3.84375 15.6567" stroke="currentColor" stroke-width="1.5"
                  stroke-linecap="round" stroke-linejoin="round" />
                <path
                  d="M15.157 11.4142C15.157 11.4142 16.0887 5.2748 15.157 4.34311C14.2253 3.41142 8.08594 4.34314 8.08594 4.34314"
                  stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </span>
          </a>
          <a href="https://www.youtube.com/embed/{{ getTranslatedValue($home2_hero_section, 'youtube_video_id') }}"
            class="td_player_btn_wrap td_video_open td_medium td_heading_color">
            <span class="td_player_btn td_center">
              <span></span>
            </span>
            <span class="td_play_btn_text">{{ __('translate.Watch Demo Video') }}</span>
          </a>
        </div>
      </div>
    </div>
    <div class="td_hero_img_box">
      <img src="{{ asset(getImage($home2_hero_section, 'image')) }}" alt="" class="td_hero_img_1 wow fadeInRight" data-wow-duration="1s"
        data-wow-delay="0.3s">
      <div class="td_hero_shape_1 td_hover_layer_3 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s"></div>
      <span class="td_hero_shape_2">
        @include('svg.home2.intro_shape1')
      </span>
    </div>
    <div class="td_hero_shape_3 td_hover_layer_3"></div>
    <span class="td_hero_shape_4">
      @include('svg.home2.intro_shape2')
    </span>
    <span class="td_hero_shape_5">
      @include('svg.home2.intro_shape3')
    </span>
    <div class="td_hero_shape_6 td_hover_layer_3">
      @include('svg.home2.intro_shape4')
    </div>
    <div class="td_hero_shape_7 td_hover_layer_5"></div>
  </section>
  <!-- End Hero Section -->

  <!-- Start Rate Section -->
  <section class="td_heading_bg td_rate_section td_type_1">
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
                  <img src="{{ asset(getImage($home2_key_feature, 'item_one_image')) }}" alt="">
                </div>
                <div class="td_rate_feature_right">
                  <h3 class="td_fs_24 td_semibold td_white_color td_mb_4">{{ getTranslatedValue($home2_key_feature, 'item_one_title') }}</h3>
                  <p class="mb-0 td_white_color td_opacity_7">{{ getTranslatedValue($home2_key_feature, 'item_one_description') }}</p>
                </div>
              </li>
              <li>
                <div class="td_rate_feature_icon td_center td_white_bg">
                  <img src="{{ asset(getImage($home2_key_feature, 'item_two_image')) }}" alt="">
                </div>
                <div class="td_rate_feature_right">
                  <h3 class="td_fs_24 td_semibold td_white_color td_mb_4">{{ getTranslatedValue($home2_key_feature, 'item_two_title') }}</h3>
                  <p class="mb-0 td_white_color td_opacity_7">{{ getTranslatedValue($home2_key_feature, 'item_two_description') }}</p>
                </div>
              </li>
              <li>
                <div class="td_rate_feature_icon td_center td_white_bg">
                  <img src="{{ asset(getImage($home2_key_feature, 'item_three_image')) }}" alt="">
                </div>
                <div class="td_rate_feature_right">
                  <h3 class="td_fs_24 td_semibold td_white_color td_mb_4">{{ getTranslatedValue($home2_key_feature, 'item_three_title') }}</h3>
                  <p class="mb-0 td_white_color td_opacity_7">{{ getTranslatedValue($home2_key_feature, 'item_three_description') }}</p>
                </div>
              </li>
              <li>
                <div class="td_rate_feature_icon td_center td_white_bg">
                  <img src="{{ asset(getImage($home2_key_feature, 'item_four_image')) }}" alt="">
                </div>
                <div class="td_rate_feature_right">
                  <h3 class="td_fs_24 td_semibold td_white_color td_mb_4">{{ getTranslatedValue($home2_key_feature, 'item_four_title') }}</h3>
                  <p class="mb-0 td_white_color td_opacity_7">{{ getTranslatedValue($home2_key_feature, 'item_four_description') }}</p>
                </div>
              </li>
            </ul>
          </div>
          <div class="td_moving_box">
            <ul class="td_rate_feature_list td_mp_0">
              <li>
                <div class="td_rate_feature_icon td_center td_white_bg">
                  <img src="{{ asset(getImage($home2_key_feature, 'item_one_image')) }}" alt="">
                </div>
                <div class="td_rate_feature_right">
                  <h3 class="td_fs_24 td_semibold td_white_color td_mb_4">{{ getTranslatedValue($home2_key_feature, 'item_one_title') }}</h3>
                  <p class="mb-0 td_white_color td_opacity_7">{{ getTranslatedValue($home2_key_feature, 'item_one_description') }}</p>
                </div>
              </li>
              <li>
                <div class="td_rate_feature_icon td_center td_white_bg">
                  <img src="{{ asset(getImage($home2_key_feature, 'item_two_image')) }}" alt="">
                </div>
                <div class="td_rate_feature_right">
                  <h3 class="td_fs_24 td_semibold td_white_color td_mb_4">{{ getTranslatedValue($home2_key_feature, 'item_two_title') }}</h3>
                  <p class="mb-0 td_white_color td_opacity_7">{{ getTranslatedValue($home2_key_feature, 'item_two_description') }}</p>
                </div>
              </li>
              <li>
                <div class="td_rate_feature_icon td_center td_white_bg">
                  <img src="{{ asset(getImage($home2_key_feature, 'item_three_image')) }}" alt="">
                </div>
                <div class="td_rate_feature_right">
                  <h3 class="td_fs_24 td_semibold td_white_color td_mb_4">{{ getTranslatedValue($home2_key_feature, 'item_three_title') }}</h3>
                  <p class="mb-0 td_white_color td_opacity_7">{{ getTranslatedValue($home2_key_feature, 'item_three_description') }}</p>
                </div>
              </li>
              <li>
                <div class="td_rate_feature_icon td_center td_white_bg">
                  <img src="{{ asset(getImage($home2_key_feature, 'item_four_image')) }}" alt="">
                </div>
                <div class="td_rate_feature_right">
                  <h3 class="td_fs_24 td_semibold td_white_color td_mb_4">{{ getTranslatedValue($home2_key_feature, 'item_four_title') }}</h3>
                  <p class="mb-0 td_white_color td_opacity_7">{{ getTranslatedValue($home2_key_feature, 'item_four_description') }}</p>
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
  <section class="td_shape_section_9">
    <div class="td_shape_position_1 position-absolute">
      @include('svg.home2.about_shape3')
    </div>
    <div class="td_shape_position_2 position-absolute">
      @include('svg.home2.about_shape4')
    </div>
    <div class="td_height_100 td_height_lg_75"></div>
    <div class="container">
      <div class="row td_gap_y_40 align-items-center">
        <div class="col-lg-6">
          <div class="td_image_box td_style_3">
            <div class="td_image_box_img_1 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.25s">
              <img src="{{ asset(getImage($home2_about_us, 'image_one')) }}" alt="" class="td_radius_10">
            </div>
            <div class="td_image_box_img_2 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
              <img src="{{ asset(getImage($home2_about_us, 'image_two')) }}" alt="" class="td_radius_10">
            </div>
            <div class="td_review_box td_heading_bg text-center td_center wow fadeInUp" data-wow-duration="1s"
              data-wow-delay="0.35s">
              <div class="td_review_box_in">
                <img src="{{ asset(getImage($home2_about_us, 'rating_users_image')) }}" alt="">
                <h3 class="td_fs_32 td_medium td_white_color">{{ getTranslatedValue($home2_about_us, 'positive_rating') }}</h3>
                <p class="mb-0 td_light td_opacity_7 td_white_color">{{ getTranslatedValue($home2_about_us, 'positive_rating_title') }}</p>
              </div>
            </div>
            <div class="td_sign_box wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.4s">
              <div class="td_sign_box_in">
                <img src="{{ asset(getImage($home2_about_us, 'ceo_signature')) }}" alt="">
                <h3 class="td_fs_20 td_semibold mb-0">{{ getTranslatedValue($home2_about_us, 'ceo_name') }}</h3>
                <p class="mb-0 td_heading_color td_opacity_6">{{ getTranslatedValue($home2_about_us, 'ceo_designation') }}</p>
              </div>

              @include('svg.home2.about_shape1')

              <div class="td_award_box_icon td_center">
                @include('svg.home2.about_shape2')
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.4s">
          <div class="td_section_heading td_style_1 td_mb_40">
            <p class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_accent_color">
              {{ getTranslatedValue($home2_about_us, 'short_title') }}</p>
            <h2 class="td_section_title td_fs_48 td_mb_20">{{ getTranslatedValue($home2_about_us, 'title') }}</h2>
            <p class="td_section_subtitle td_fs_18 mb-0">{{ getTranslatedValue($home2_about_us, 'description') }}</p>
          </div>
          <div class="td_mb_40 position-relative">
            <div class="td_iconbox td_style_5">
              <div class="td_iconbox_icon">
                <div class="td_iconbox_icon_in td_center">
                  @include('svg.home2.about_item1')
                </div>
              </div>
              <div class="td_iconbox_right">
                <h3 class="td_iconbox_title td_fs_32 td_mb_4">{{ getTranslatedValue($home2_about_us, 'item_one_title') }} </h3>
                <p class="td_iconbox_subtitle mb-0 td_heading_color td_fs_18 td_opacity_7">{{ getTranslatedValue($home2_about_us, 'item_one_description') }}</p>
              </div>
            </div>
            <div class="td_height_30 td_height_lg_30"></div>
            <div class="td_iconbox td_style_5">
              <div class="td_iconbox_icon">
                <div class="td_iconbox_icon_in td_center">
                  @include('svg.home2.about_item2')
                </div>
              </div>
              <div class="td_iconbox_right">
                <h3 class="td_iconbox_title td_fs_32 td_mb_4">{{ getTranslatedValue($home2_about_us, 'item_two_title') }}</h3>
                <p class="td_iconbox_subtitle mb-0 td_heading_color td_fs_18 td_opacity_7">{{ getTranslatedValue($home2_about_us, 'item_two_description') }}</p>
              </div>
            </div>
          </div>
          <a href="{{ route('about-us') }}" class="td_btn td_style_1 td_radius_30 td_medium ">
            <span class="td_btn_in td_white_color td_accent_bg">
              <span>{{ __('translate.Explore More About') }} </span>
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

  <!-- Start Category Section -->
  <section class="td_gray_bg_5">
    <div class="td_height_100 td_height_lg_75"></div>
    <div class="container">
      <div class="td_section_heading td_style_1 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
        <p class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_accent_color">
          {{ __('translate.Browse Categories') }}</p>
        <h2 class="td_section_title td_fs_48 mb-0">{{ __('translate.Explore Top Category') }}</h2>
      </div>
      <div class="td_height_50 td_height_lg_50"></div>
      <div class="row td_gap_y_24">
        @foreach ($categories as $category)
          <div class="col-xxl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
            <a href="{{ route('courses', ['category' => $category->slug]) }}"
              class="td_iconbox td_style_3 td_fs_18 td_semibold td_radius_10 td_white_bg td_heading_color">
              <span class="td_iconbox_icon">
                <img src="{{ asset($category->icon) }}" alt="">
              </span>
              <span class="td_iconbox_title">{{ $category->name }}</span>
            </a>
          </div>
        @endforeach
      </div>
    </div>
    <div class="td_height_100 td_height_lg_50"></div>
  </section>
  <!-- End Category Section -->

  <!-- Start Courses Section -->
  <section>
    <div class="td_height_100 td_height_lg_75"></div>
    <div class="container">
      <div class="td_section_heading td_style_1 td_type_1 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
        <div class="td_section_heading_left">
          <p class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_accent_color">
            {{ __('translate.Our Latest courses') }}</p>
          <h2 class="td_section_title td_fs_48 mb-0">{{ __('translate.Pick Our Latest Courses') }} <br>{{ __('translate.and Build your Skills') }} </h2>
        </div>
        <div class="td_section_heading_right">
          <p class="td_section_subtitle td_fs_18 td_mb_16 td_heading_color td_opacity_9">
            {{ __('translate.Far far away, behind the word mountains, far from the Conson antia, there live the blind texts. Separated they marks') }}
          </p>
          <a href="{{ route('courses') }}" class="td_btn td_style_2 td_heading_color td_medium td_mb_10">
            {{ __('translate.See all Courses') }}
            <i>
              @include('svg.explore_more_category')
            </i>
          </a>
        </div>
      </div>
      <div class="td_height_40 td_height_lg_40"></div>
      <div class="td_tabs td_style_1">
        <ul class="td_tab_links td_style_2 td_type_1 td_mp_0 td_medium td_fs_20 td_heading_color wow fadeInUp"
          data-wow-duration="1s" data-wow-delay="0.25s">
          @foreach ($home_2_filter_categories as $category)
            <li class="{{ $loop->first ? 'active' : '' }}"><a href="#{{$category->slug}}">{{ $category?->name }}</a></li>
          @endforeach
        </ul>
        <div class="td_height_40 td_height_lg_40"></div>
        <div class="td_tab_body">
          @foreach ($home_2_filter_categories as $category)
            <div class="td_tab {{ $loop->first ? 'active' : '' }}" id="{{$category->slug}}">
              <div class="row td_gap_y_30 td_row_gap_30">
                @foreach($category?->courses->take(4) as $course_index => $course)
                  <div class="col-xl-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="td_card td_style_5">
                      <div class="td_card_thumb">
                        <span class="td_card_thumb_in td_radius_10">
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
            </div>
            <!-- .td_tab_item -->
          @endforeach

        </div>
      </div>
    </div>
    <div class="td_height_100 td_height_lg_50"></div>
  </section>
  <!-- End Courses Section -->

  <!-- Start Certificate Section -->
  <section class="td_heading_bg td_shape_section_9">
    <div class="td_shape_position_3 position-absolute"></div>
    <div class="td_height_100 td_height_lg_75"></div>
    <div class="container">
      <div class="td_section_heading td_style_1 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
        <p class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_white_color">
          {{ getTranslatedValue($home2_achievement, 'short_title') }}</p>
        <h2 class="td_section_title td_fs_48 mb-0 td_white_color">{{ getTranslatedValue($home2_achievement, 'title') }}</h2>
      </div>
      <div class="td_height_50 td_height_lg_50"></div>
      <div class="row align-items-center td_gap_y_40">
        <div class="col-xl-6 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
          <div class="td_pr_35">
            <img src="{{ asset(getImage($home2_achievement, 'feature_image')) }}" alt="" class="td_radius_5 w-100">
          </div>
        </div>
        <div class="col-xl-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
          <div class="row td_gap_y_30 td_row_gap_30">
            <div class="col-md-6">
              <div class="td_iconbox td_style_4 td_radius_10">
                <div class="td_iconbox_icon td_mb_16">
                  <img src="{{ asset(getImage($home2_achievement, 'item_one_icon')) }}" alt="">
                </div>
                <h3 class="td_iconbox_title td_fs_24 td_mb_12 td_semibold td_white_color">{{ getTranslatedValue($home2_achievement, 'item_one_title') }}</p></h3>
                <p class="td_iconbox_subtitle mb-0 td_fs_14 td_white_color td_opacity_7">{{ getTranslatedValue($home2_achievement, 'item_one_description') }}</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="td_iconbox td_style_4 td_radius_10">
                <div class="td_iconbox_icon td_mb_16">
                  <img src="{{ asset(getImage($home2_achievement, 'item_two_icon')) }}" alt="">
                </div>
                <h3 class="td_iconbox_title td_fs_24 td_mb_12 td_semibold td_white_color">{{ getTranslatedValue($home2_achievement, 'item_two_title') }}</p></h3>
                <p class="td_iconbox_subtitle mb-0 td_fs_14 td_white_color td_opacity_7">{{ getTranslatedValue($home2_achievement, 'item_two_description') }}</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="td_iconbox td_style_4 td_radius_10">
                <div class="td_iconbox_icon td_mb_16">
                  <img src="{{ asset(getImage($home2_achievement, 'item_three_icon')) }}" alt="">
                </div>
                <h3 class="td_iconbox_title td_fs_24 td_mb_12 td_semibold td_white_color">{{ getTranslatedValue($home2_achievement, 'item_three_title') }}</p></h3>
                <p class="td_iconbox_subtitle mb-0 td_fs_14 td_white_color td_opacity_7">{{ getTranslatedValue($home2_achievement, 'item_three_description') }}</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="td_iconbox td_style_4 td_radius_10">
                <div class="td_iconbox_icon td_mb_16">
                  <img src="{{ asset(getImage($home2_achievement, 'item_four_icon')) }}" alt="">
                </div>
                <h3 class="td_iconbox_title td_fs_24 td_mb_12 td_semibold td_white_color">{{ getTranslatedValue($home2_achievement, 'item_four_title') }}</p></h3>
                <p class="td_iconbox_subtitle mb-0 td_fs_14 td_white_color td_opacity_7">{{ getTranslatedValue($home2_achievement, 'item_four_description') }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="td_height_100 td_height_lg_50"></div>
  </section>
  <!-- End Certificate Section -->

  <!-- Start Testimonials Section -->
  <section class="td_shape_section_9 td_hobble">
    <div class="td_shape_position_4 position-absolute td_hover_layer_3">
      @include('svg.home2.testimonial_shape1')

    </div>
    <div class="td_shape_position_5 position-absolute td_accent_color td_hover_layer_5">
      @include('svg.home2.testimonial_shape2')

    </div>
    <div class="td_height_100 td_height_lg_75"></div>
    <div class="container">
      <div class="td_section_heading td_style_1 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
        <p class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_accent_color">
          {{ __('translate.Testimonials') }}</p>
        <h2 class="td_section_title td_fs_48 mb-0">{{ __('translate.What Our Students Say About') }} <br>{{ __('translate.Our Services') }}</h2>
      </div>
      <div class="td_height_50 td_height_lg_50"></div>
      <div class="td_slider td_style_1 td_slider_gap_24 td_remove_overflow wow fadeInUp" data-wow-duration="1s"
        data-wow-delay="0.3s">
        <div class="td_slider_container" data-autoplay="0" data-loop="1" data-speed="800" data-center="0"
          data-variable-width="0" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2"
          data-md-slides="2" data-lg-slides="2" data-add-slides="3">
          <div class="td_slider_wrapper">
            @foreach ($testimonials as $testimonial)
            <div class="td_slide">
              <div class="td_testimonial td_style_1 td_type_2 td_white_bg td_radius_5">
                <div class="td_rating td_mb_20" data-rating="{{ $testimonial->rating }}">
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
                <blockquote class="td_testimonial_text td_fs_18 td_medium td_heading_color td_mb_30 td_opacity_9">{{ $testimonial->comment }}</blockquote>
                <div class="td_testimonial_meta td_mb_24">
                  <img src="{{ asset($testimonial->image) }}" alt="">
                  <div class="td_testimonial_meta_right">
                      <h3 class="td_fs_24 td_semibold td_mb_2">{{ $testimonial->name }}</h3>
                      <p class="td_fs_14 mb-0 td_heading_color td_opacity_7">{{ $testimonial->designation }}</p>
                  </div>
                </div>
                <span class="td_quote_icon td_accent_color">
                  <svg width="65" height="46" viewBox="0 0 65 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.05"
                      d="M13.9305 26.6H1.00195V1H26.8591V27.362L17.9579 45H6.26959L14.8233 28.0505L15.5553 26.6H13.9305ZM51.0734 26.6H38.1448V1H64.002V27.362L55.1008 45H43.4124L51.9661 28.0505L52.6982 26.6H51.0734Z"
                      stroke="currentColor" stroke-width="2" />
                  </svg>
                </span>
              </div>
            </div>
            @endforeach

          </div>
        </div>
        <div class="td_height_40 td_height_lg_40"></div>
        <div class="td_slider_arrows td_style_1">
          <div class="td_left_arrow td_accent_bg rounded-circle td_center td_white_color">
            <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1.00194 6.00024L17.002 6.00024" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round" />
              <path d="M6.00191 1C6.00191 1 1.00196 4.68244 1.00195 6.00004C1.00194 7.31763 6.00195 11 6.00195 11"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
          <div class="td_right_arrow td_accent_bg rounded-circle td_center td_white_color">
            <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M17.002 5.99976L1.00195 5.99976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round" />
              <path d="M12.002 11C12.002 11 17.0019 7.31756 17.002 5.99996C17.002 4.68237 12.002 1 12.002 1"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Testimonials Section -->

  <!-- Start Feature Section -->
  <section class="td_features_2_wrap">
    <div class="td_height_100 td_height_lg_50"></div>
    <div class="container">
      <div class="td_features td_style_2">
        <div class="td_features_thumb td_radius_10 td_center td_bg_filed" data-src="{{ asset(getImage($home2_our_facilities, 'feature_image')) }}">
          <a href="https://www.youtube.com/embed/{{ getTranslatedValue($home2_our_facilities, 'youtube_video_id') }}"
            class="td_player_btn_wrap td_video_open td_medium td_heading_color wow zoomIn" data-wow-duration="1s"
            data-wow-delay="0.2s">
            <span class="td_player_btn td_center">
              <span></span>
            </span>
          </a>
        </div>
        <div class="td_features_content_wrap">
          <div class="td_features_content td_white_bg td_radius_10 wow fadeInRight" data-wow-duration="1s"
            data-wow-delay="0.3s">
            <div class="td_section_heading td_style_1">
              <h2 class="td_section_title td_fs_48 mb-0">{{ getTranslatedValue($home2_our_facilities, 'title') }}</h2>
              <p class="td_section_subtitle td_fs_18 mb-0">{{ getTranslatedValue($home2_our_facilities, 'description') }}</p>
            </div>
            <div class="td_height_40 td_height_lg_40"></div>
            <ul class="td_feature_list td_mp_0">
              <li>
                <div class="td_feature_icon">
                  <img src="{{ asset(getImage($home2_our_facilities, 'item_one_icon')) }}" alt="">
                </div>
                <div class="td_feature_info">
                  <h3 class="td_fs_20 td_semibold td_mb_4">{{ getTranslatedValue($home2_our_facilities, 'item_one_title') }}</h3>
                  <p class="td_fs_14 td_heading_color td_opacity_7 mb-0">{{ getTranslatedValue($home2_our_facilities, 'item_one_description') }}</p>
                </div>
              </li>

              <li>
                <div class="td_feature_icon">
                  <img src="{{ asset(getImage($home2_our_facilities, 'item_two_icon')) }}" alt="">
                </div>
                <div class="td_feature_info">
                  <h3 class="td_fs_20 td_semibold td_mb_4">{{ getTranslatedValue($home2_our_facilities, 'item_two_title') }}</h3>
                  <p class="td_fs_14 td_heading_color td_opacity_7 mb-0">{{ getTranslatedValue($home2_our_facilities, 'item_two_description') }}</p>
                </div>
              </li>

              <li>
                <div class="td_feature_icon">
                  <img src="{{ asset(getImage($home2_our_facilities, 'item_three_icon')) }}" alt="">
                </div>
                <div class="td_feature_info">
                  <h3 class="td_fs_20 td_semibold td_mb_4">{{ getTranslatedValue($home2_our_facilities, 'item_three_title') }}</h3>
                  <p class="td_fs_14 td_heading_color td_opacity_7 mb-0">{{ getTranslatedValue($home2_our_facilities, 'item_three_description') }}</p>
                </div>
              </li>

              <li>
                <div class="td_feature_icon">
                  <img src="{{ asset(getImage($home2_our_facilities, 'item_four_icon')) }}" alt="">
                </div>
                <div class="td_feature_info">
                  <h3 class="td_fs_20 td_semibold td_mb_4">{{ getTranslatedValue($home2_our_facilities, 'item_four_title') }}</h3>
                  <p class="td_fs_14 td_heading_color td_opacity_7 mb-0">{{ getTranslatedValue($home2_our_facilities, 'item_four_description') }}</p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Feature Section -->

  <!-- Start Funfact Section -->
  <div class="td_accent_bg">
    <div class="td_height_80 td_height_lg_80"></div>
    <div class="container">
      <div class="td_funfact_1_wrap">
        <div class="td_funfact td_style_1">
          <div class="td_funfact_in">
            <div class="td_funfact_icon">
              <img src="{{ asset(getImage($home2_fun_fact, 'item_one_icon')) }}" alt="">
            </div>
            <div class="td_funfact_right">
              <h3 class="td_fs_36 td_white_color mb-0"><span class="odometer" data-count-to="{{ getTranslatedValue($home2_fun_fact, 'item_one_quantity') }}"></span>+</h3>
              <p class="mb-0 td_white_color td_opacity_7">{{ getTranslatedValue($home2_fun_fact, 'item_one_title') }}</p>
            </div>
          </div>
          <svg width="140" height="120" viewBox="0 0 140 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="1" y="1" width="138" height="118" rx="9" stroke="white" stroke-width="2" stroke-dasharray="8 8" />
          </svg>
        </div>
        <div class="td_funfact td_style_1">
          <div class="td_funfact_in">
            <div class="td_funfact_icon">
              <img src="{{ asset(getImage($home2_fun_fact, 'item_two_icon')) }}" alt="">
            </div>
            <div class="td_funfact_right">
              <h3 class="td_fs_36 td_white_color mb-0"><span class="odometer" data-count-to="{{ getTranslatedValue($home2_fun_fact, 'item_two_quantity') }}"></span>+</h3>
              <p class="mb-0 td_white_color td_opacity_7">{{ getTranslatedValue($home2_fun_fact, 'item_two_title') }}</p>
            </div>
          </div>
          <svg width="140" height="120" viewBox="0 0 140 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="1" y="1" width="138" height="118" rx="9" stroke="white" stroke-width="2" stroke-dasharray="8 8" />
          </svg>
        </div>
        <div class="td_funfact td_style_1">
          <div class="td_funfact_in">
            <div class="td_funfact_icon">
              <img src="{{ asset(getImage($home2_fun_fact, 'item_three_icon')) }}" alt="">
            </div>
            <div class="td_funfact_right">
              <h3 class="td_fs_36 td_white_color mb-0"><span class="odometer" data-count-to="{{ getTranslatedValue($home2_fun_fact, 'item_three_quantity') }}"></span>+</h3>
              <p class="mb-0 td_white_color td_opacity_7">{{ getTranslatedValue($home2_fun_fact, 'item_three_title') }}</p>
            </div>
          </div>
          <svg width="140" height="120" viewBox="0 0 140 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="1" y="1" width="138" height="118" rx="9" stroke="white" stroke-width="2" stroke-dasharray="8 8" />
          </svg>
        </div>
        <div class="td_funfact td_style_1">
          <div class="td_funfact_in">
            <div class="td_funfact_icon">
              <img src="{{ asset(getImage($home2_fun_fact, 'item_four_icon')) }}" alt="">
            </div>
            <div class="td_funfact_right">
              <h3 class="td_fs_36 td_white_color mb-0"><span class="odometer" data-count-to="{{ getTranslatedValue($home2_fun_fact, 'item_four_quantity') }}"></span>+</h3>
              <p class="mb-0 td_white_color td_opacity_7">{{ getTranslatedValue($home2_fun_fact, 'item_four_title') }}</p>
            </div>
          </div>
          <svg width="140" height="120" viewBox="0 0 140 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="1" y="1" width="138" height="118" rx="9" stroke="white" stroke-width="2" stroke-dasharray="8 8" />
          </svg>
        </div>
      </div>
    </div>
    <div class="td_height_100 td_height_lg_50"></div>
  </div>
  <!-- End Funfact Section -->

  <!-- Start Expert Instructor Section -->
  <section class="td_gray_bg_4">
    <div class="td_height_100 td_height_lg_50"></div>
    <div class="container">
      <div class="row align-items-center td_gap_y_40">
        <div class="col-lg-6 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
          <div class="td_pr_50">
            <div class="td_section_heading td_style_1">
              <p
                class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_accent_color">
                {{ getTranslatedValue($home2_featured_instructor, 'short_title') }}</p>
              <h2 class="td_section_title td_fs_48 td_mb_20">{{ getTranslatedValue($home2_featured_instructor, 'title') }}</h2>
              <p class="td_section_subtitle td_fs_18 td_mb_43">
                {{ getTranslatedValue($home2_featured_instructor, 'description_one') }} <br><br>{{ getTranslatedValue($home2_featured_instructor, 'description_two') }}</p>
              <a href="{{ route('instructors') }}" class="td_btn td_style_1 td_radius_30 td_medium">
                <span class="td_btn_in td_white_color td_accent_bg">
                  <span>{{ __('translate.See All Instructors') }}</span>
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
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
          <div class="row td_gap_y_24 td_row_gap_30">
            @foreach ($instructors->take(4) as $instructor)
              <div class="col-md-6">
                <div class="td_team td_style_2 text-center position-relative td_radius_10">
                  <div class="td_team_in">
                    @if ($instructor?->image)
                        <img src="{{ asset($instructor?->image) }}" alt="" class="w-100 td_radius_10"/>
                    @else
                        <img src="{{ asset($general_setting->default_avatar) }}" alt="" class="w-100 td_radius_10"/>
                    @endif

                    <div class="td_team_info">
                      <div class="td_team_info_in tutor_custom_link">
                        <a href="{{ route('instructor.profile', $instructor->username) }}" class="td_team_member_title td_fs_16 td_semibold td_white_color mb-0">{{ html_decode($instructor->name) }}</a>
                        <p class="td_team_member_designation mb-0 td_fs_14 td_white_color td_opacity_9">{{ html_decode($instructor->designation) }}</p>
                        <ul class="td_team_member_meta_list td_mp_0">
                          <li>
                            @include('svg.home2.instructor_student')
                            <span class="td_white_color td_opacity_7 td_fs_14">{{ $instructor?->total_student }} {{ __('translate.Students') }}</span>
                          </li>
                          <li>
                            @include('svg.home2.instructor_course')
                            <span class="td_white_color td_opacity_7 td_fs_14">{{ $instructor?->total_course }} {{ __('translate.Courses') }}</span>
                          </li>
                        </ul>
                      </div>
                      <svg width="260" height="107" viewBox="0 0 260 107" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M0 35.3851C0 30.6836 3.27505 26.617 7.8685 25.6149L123.221 0.449038C124.579 0.152929 125.983 0.142865 127.344 0.419486L251.991 25.7468C256.651 26.6937 260 30.7913 260 35.5465V97C260 102.523 255.523 107 250 107H10C4.47716 107 0 102.523 0 97V35.3851Z"
                          fill="currentColor" />
                      </svg>
                    </div>
                  </div>
                  <div class="td_team_shape_1"></div>
                  <div class="td_team_shape_2"></div>
                </div>
              </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>
    <div class="td_height_100 td_height_lg_50"></div>
  </section>
  <!-- End Expert Instructor Section -->

  <!-- Start Instructor Section -->
  <section class="td_shape_section_9 td_hobble">
    <span class="td_shape_position_6 position-absolute td_hover_layer_3">
      @include('svg.home2.join_instructor_shape')
    </span>
    <span class="td_shape_position_7 position-absolute td_hover_layer_5">
      @include('svg.home2.join_instructor_shape2')
    </span>
    <span class="td_shape_position_8 position-absolute td_hover_layer_3">
      @include('svg.home2.join_instructor_shape3')
    </span>
    <span class="td_shape_position_9 position-absolute td_hover_layer_5">
      @include('svg.home2.join_instructor_shape4')
    </span>
    <div class="td_height_100 td_height_lg_75"></div>
    <div class="container">
      <div class="row td_gap_y_40">
        <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
          <div class="td_image_box td_style_4">
            <div class="td_image_box_img_1">
              <img src="{{ asset(getImage($home2_join_instructor, 'feature_image')) }}" alt="" class="td_radius_10">
            </div>
            <div class="td_image_box_shape_1 td_accent_color">
              <svg width="540" height="314" viewBox="0 0 540 314" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M0.642023 204.034C0.642023 199.857 3.23902 196.119 7.15436 194.662L525.953 1.59735C532.515 -0.844766 539.491 4.03967 539.44 11.0415L537.989 212.199C537.954 217.026 534.477 221.139 529.723 221.976L12.376 313.066C6.25379 314.144 0.642023 309.434 0.642023 303.218L0.642023 204.034Z"
                  fill="currentColor" />
              </svg>
            </div>
            <div class="td_image_box_shape_2">
                @include('svg.home2.join_instructor_shape5')
            </div>
            <div class="td_image_box_shape_3 td_accent_color">
              @include('svg.home2.join_instructor_shape6')
            </div>
            <div class="td_image_box_shape_4 td_accent_color">
              <svg width="321" height="179" viewBox="0 0 321 179" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.5"
                  d="M318.075 59.6884C322.237 81.8165 309.033 105.527 283.232 125.998C257.511 146.404 219.696 163.205 175.873 171.441C132.05 179.678 90.712 177.755 59.3334 168.081C27.8555 158.376 6.93756 141.08 2.7751 118.951C-1.38736 96.8233 11.8169 73.1129 37.6185 52.6421C63.3389 32.2358 101.155 15.4353 144.977 7.19844C188.8 -1.03841 230.138 0.884654 261.517 10.5587C292.995 20.2633 313.913 37.5602 318.075 59.6884Z"
                  stroke="currentColor" stroke-width="4" />
              </svg>
            </div>
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
          <div class="td_section_heading td_style_1">
            <p class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_accent_color">
              {{ getTranslatedValue($home2_join_instructor, 'short_title') }}</p>
            <h2 class="td_section_title td_fs_48 td_mb_20">{{ getTranslatedValue($home2_join_instructor, 'title') }}</h2>
            <p class="td_section_subtitle td_fs_18 td_mb_36">{{ getTranslatedValue($home2_join_instructor, 'description') }}</p>
            <div class="td_mb_40 td_list_3_wrap">
              <ul class="td_list td_style_3 td_mp_0">
                <li>
                  <div class="td_list_icon td_center">
                    <img src="{{ asset(getImage($home2_join_instructor, 'item_one_icon')) }}" alt="">
                  </div>
                  <div class="td_list_right">
                    <h3 class="td_fs_24 td_semibold td_mb_6">{{ getTranslatedValue($home2_join_instructor, 'item_one_title') }}</h3>
                    <p class="mb-0 td_heading_color td_opacity_7">{{ getTranslatedValue($home2_join_instructor, 'item_one_description') }}</p>
                  </div>
                </li>

                <li>
                  <div class="td_list_icon td_center">
                    <img src="{{ asset(getImage($home2_join_instructor, 'item_two_icon')) }}" alt="">
                  </div>
                  <div class="td_list_right">
                    <h3 class="td_fs_24 td_semibold td_mb_6">{{ getTranslatedValue($home2_join_instructor, 'item_two_title') }}</h3>
                    <p class="mb-0 td_heading_color td_opacity_7">{{ getTranslatedValue($home2_join_instructor, 'item_two_description') }}</p>
                  </div>
                </li>

                <li>
                  <div class="td_list_icon td_center">
                    <img src="{{ asset(getImage($home2_join_instructor, 'item_one_icon')) }}" alt="">
                  </div>
                  <div class="td_list_right">
                    <h3 class="td_fs_24 td_semibold td_mb_6">{{ getTranslatedValue($home2_join_instructor, 'item_one_title') }}</h3>
                    <p class="mb-0 td_heading_color td_opacity_7">{{ getTranslatedValue($home2_join_instructor, 'item_three_description') }}</p>
                  </div>
                </li>


              </ul>
              <div class="td_list_3_box td_accent_bg text-center">
                <h2 class="td_fs_64 td_white_color mb-0">{{ getTranslatedValue($home2_join_instructor, 'total_student') }}</h2>
                <p class="mb-0 td_fs_14 td_white_color td_opacity_8">{{ getTranslatedValue($home2_join_instructor, 'total_student_title') }}</p>
              </div>
            </div>
            <a href="{{ route('student.become-an-instructor') }}" class="td_btn td_style_1 td_radius_30 td_medium">
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
        </div>
      </div>
    </div>
    <div class="td_height_100 td_height_lg_50"></div>
  </section>
  <!-- End Instructor Section -->

  <!-- Start App Section -->
  <section class="td_heading_bg td_center td_cta td_style_1 td_hobble">
    <div class="container">
      <div class="td_cta_text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.4s">
        <div class="td_section_heading td_style_1 td_mb_40">
          <p
            class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_white_color td_opacity_7">
            {{ getTranslatedValue($home2_mobile_app, 'short_title') }} </p>
          <h2 class="td_section_title td_fs_48 mb-0 td_white_color">{{ getTranslatedValue($home2_mobile_app, 'title') }}</h2>
        </div>
        <div class="td_btns_group">
          <a href="courses-grid-view.html" class="td_btn td_style_1 td_type_3 td_radius_30 td_medium">
            <span class="td_btn_in td_white_color">
              @include('svg.home2.app_play_store')
              <span>{{ __('translate.Google play') }}</span>
            </span>
          </a>
          <a href="courses-grid-view.html" class="td_btn td_style_1 td_type_3 td_radius_30 td_medium">
            <span class="td_btn_in td_white_color">
              @include('svg.home2.app_apple_store')

              <span>{{ __('translate.Apple Store') }}</span>
            </span>
          </a>
        </div>
      </div>
    </div>
    <div class="td_cta_thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
      <img src="{{ asset(getImage($home2_mobile_app, 'feature_image')) }}" alt="">
      <div class="td_cta_thumb_shape"></div>
    </div>
    <div class="td_cta_shape_1 td_hover_layer_3"></div>
    <div class="td_cta_shape_2">
      @include('svg.home2.app_shape1')

    </div>
    <div class="td_cta_shape_3 td_hover_layer_5">
      @include('svg.home2.app_shape2')
    </div>
  </section>
  <!-- End App Section -->

  <!-- Start Blog Section -->
  <section>
    <div class="td_height_100 td_height_lg_75"></div>
    <div class="container">
      <div class="td_section_heading td_style_1 td_type_1 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
        <div class="td_section_heading_left">
          <p class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_accent_color">
            {{ __('translate.BLOG & ARTICLES') }}</p>
          <h2 class="td_section_title td_fs_48 mb-0">{{ __('translate.Explore A Look At The') }} <br>{{ __('translate.Latest Articles') }}</h2>
        </div>
        <div class="td_section_heading_right">
          <a href="blog.html" class="td_btn td_style_2 td_heading_color td_medium td_mb_10">
            {{ __('translate.See All Articles') }}
            <i>
              @include('svg.explore_more_category')
            </i>
          </a>
        </div>
      </div>
      <div class="td_height_50 td_height_lg_50"></div>
      <div class="row td_gap_y_24">
        @foreach ($blogs->take(3) as $blog)
          <div class="col-lg-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
            <div class="td_post td_style_1">
              <a href="{{ route('blog', $blog->slug) }}" class="td_post_thumb d-block">
                <img src="{{ asset($blog->image) }}" alt="">
                <i class="fa-solid fa-link"></i>
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
                <p class="td_post_subtitle td_mb_24 td_heading_color td_opacity_7">{{ $blog?->short_description }}</p>
                <a href="{{ route('blog', $blog->slug) }}" class="td_btn td_style_1 td_type_4 td_radius_30 td_medium">
                  <span class="td_btn_in td_accent_color">
                    <span class="td_btn_text">{{ __('translate.Read More') }}</span>
                    <span class="td_btn_icon">
                      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M8.5 4V2.5C8.5 2.15126 8.5 1.97689 8.46167 1.83383C8.35764 1.4456 8.0544 1.14236 7.66617 1.03833C7.52311 1 7.34874 1 7 1C6.65126 1 6.47689 1 6.33383 1.03833C5.9456 1.14236 5.64236 1.4456 5.53833 1.83383C5.5 1.97689 5.5 2.15126 5.5 2.5V4C5.5 4.70711 5.5 5.06066 5.28033 5.28033C5.06066 5.5 4.70711 5.5 4 5.5L2.5 5.5C2.15126 5.5 1.97689 5.5 1.83383 5.53833C1.4456 5.64236 1.14236 5.9456 1.03833 6.33383C1 6.47689 1 6.65126 1 7C1 7.34874 1 7.52311 1.03833 7.66617C1.14236 8.0544 1.4456 8.35764 1.83383 8.46167C1.97689 8.5 2.15126 8.5 2.5 8.5H4C4.70711 8.5 5.06066 8.5 5.28033 8.71967C5.5 8.93934 5.5 9.29289 5.5 10V11.5C5.5 11.8487 5.5 12.0231 5.53833 12.1662C5.64236 12.5544 5.9456 12.8576 6.33383 12.9617C6.47689 13 6.65126 13 7 13C7.34874 13 7.52311 13 7.66617 12.9617C8.0544 12.8576 8.35764 12.5544 8.46167 12.1662C8.5 12.0231 8.5 11.8487 8.5 11.5V10C8.5 9.29289 8.5 8.93934 8.71967 8.71967C8.93934 8.5 9.29289 8.5 10 8.5H11.5C11.8487 8.5 12.0231 8.5 12.1662 8.46167C12.5544 8.35764 12.8576 8.0544 12.9617 7.66617C13 7.52311 13 7.34874 13 7C13 6.65126 13 6.47689 12.9617 6.33383C12.8576 5.9456 12.5544 5.64236 12.1662 5.53833C12.0231 5.5 11.8487 5.5 11.5 5.5H10C9.29289 5.5 8.93934 5.5 8.71967 5.28033C8.5 5.06066 8.5 4.70711 8.5 4Z"
                          stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                    </span>
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
