@extends('layout4')

@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection

@section('front-content')

  <!-- Start Hero Section -->
  <section class="td_hero td_style_1 td_heading_bg td_center td_bg_filed" data-src="{{ asset(getImage($home4_hero_section, 'image')) }}">
    <div class="container">
      <div class="td_hero_text wow fadeInRight" data-wow-duration="0.9s" data-wow-delay="0.35s">
        <p
          class="td_hero_subtitle_up td_fs_18 td_white_color td_spacing_1 td_semibold text-uppercase td_mb_10 td_opacity_9">
          {{ getTranslatedValue($home4_hero_section, 'short_title') }}</p>
        <h1 class="td_hero_title td_fs_64 td_white_color td_mb_12">{!! strip_tags(clean(getTranslatedValue($home4_hero_section, 'title')),'<span>') !!} </h1>
        <p class="td_hero_subtitle td_fs_18 td_white_color td_opacity_7 td_mb_30">{{ getTranslatedValue($home4_hero_section, 'description') }}</p>
        <a href="{{ route('about-us') }}" class="td_btn td_style_1 td_radius_30 td_medium">
          <span class="td_btn_in td_white_color td_accent_bg">
            <span>{{ __('translate.Explore Us') }}</span>
            <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M15.1575 4.34302L3.84375 15.6567" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round" />
              <path
                d="M15.157 11.4142C15.157 11.4142 16.0887 5.2748 15.157 4.34311C14.2253 3.41142 8.08594 4.34314 8.08594 4.34314"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </span>
        </a>
      </div>
    </div>
    <div class="td_lines">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
  </section>

  <div class="container">
    <div class="td_hero_btn_group">
      <a href="{{ route('courses') }}" class="td_btn td_style_1 td_radius_10 td_medium td_fs_20 wow fadeInUp"
        data-wow-duration="0.9s" data-wow-delay="0.35s">
        <span class="td_btn_in td_white_color td_accent_bg">
          <span>{{ __('translate.Browse Course') }}</span>
          <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.1575 4.34302L3.84375 15.6567" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
              stroke-linejoin="round" />
            <path
              d="M15.157 11.4142C15.157 11.4142 16.0887 5.2748 15.157 4.34311C14.2253 3.41142 8.08594 4.34314 8.08594 4.34314"
              stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </span>
      </a>
      <a href="{{ __('translate.faq') }}" class="td_btn td_style_1 td_radius_10 td_medium td_fs_20 wow fadeInUp"
        data-wow-duration="0.9s" data-wow-delay="0.35s">
        <span class="td_btn_in td_white_color td_accent_bg">
          <span>{{ __('translate.Our FAQ') }}</span>
          @include('svg.home4.faq')
        </span>
      </a>
      <a href="{{ route('contact-us') }}" class="td_btn td_style_1 td_radius_10 td_medium td_fs_20 wow fadeInUp"
        data-wow-duration="0.9s" data-wow-delay="0.35s">
        <span class="td_btn_in td_white_color td_accent_bg">
          <span>{{ __('translate.Contact with Us') }}</span>
          @include('svg.home4.contact')

        </span>
      </a>
    </div>
  </div>
  <!-- End Hero Section -->


  <!-- Start About Section -->
  <section>
    <div class="td_height_100 td_height_lg_50"></div>
    <div class="td_about td_style_1">
      <div class="container">
        <div class="row align-items-center td_gap_y_40">
          <div class="col-lg-6 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.25s">
            <div class="td_about_thumb_wrap">
              <div class="td_about_year text-uppercase td_fs_64 td_bold">{{ getTranslatedValue($about_us, 'est_year') }}</div>
              <div class="td_about_thumb_1">
                <img src="{{ asset(getImage($about_us, 'image_one')) }}" alt="">
              </div>
              <div class="td_about_thumb_2">
                <img src="{{ asset(getImage($about_us, 'image_two')) }}" alt="">
              </div>
              <a href="https://www.youtube.com/embed/{{ getTranslatedValue($about_us, 'youtube_video_id') }}" class="td_circle_text td_center td_video_open">
                <svg width="15" height="19" viewBox="0 0 15 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M14.086 8.63792C14.6603 9.03557 14.6603 9.88459 14.086 10.2822L2.54766 18.2711C1.88444 18.7303 0.978418 18.2557 0.978418 17.449L0.978418 1.47118C0.978418 0.664496 1.88444 0.189811 2.54767 0.649016L14.086 8.63792Z"
                    fill="white" />
                </svg>

                <img src="{{ asset(getImage($about_us, 'rotate_image')) }}" alt="" class="">

              </a>
              <div class="td_circle_shape"></div>
            </div>
          </div>
          <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
            <div class="td_section_heading td_style_1 td_mb_30">
                <p
                class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_accent_color">
                {{ getTranslatedValue($about_us, 'short_title') }}</p>
              <h2 class="td_section_title td_fs_48 mb-0">{{ getTranslatedValue($about_us, 'title') }}
              </h2>
              <p class="td_section_subtitle td_fs_18 mb-0">
                {{ getTranslatedValue($about_us, 'description') }}
              </p>

            </div>
            <div class="td_mb_40">
              <ul class="td_list td_style_5 td_mp_0">
                <li>
                    <h3 class="td_fs_24 td_mb_8">{{ getTranslatedValue($about_us, 'item_one_title') }}</h3>
                    <p class="td_fs_18 mb-0">{{ getTranslatedValue($about_us, 'item_one_description') }}</p>
                  </li>
                  <li>
                    <h3 class="td_fs_24 td_mb_8">{{ getTranslatedValue($about_us, 'item_two_title') }}</h3>
                    <p class="td_fs_18 mb-0">{{ getTranslatedValue($about_us, 'item_two_description') }}</p>
                  </li>
              </ul>
            </div>
            <a href="{{ route('about-us') }}" class="td_btn td_style_1 td_radius_30 td_medium">
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
    </div>
    <div class="td_height_100 td_height_lg_50"></div>
  </section>
  <!-- End About Section -->

  <!-- Start Popular Courses -->
  <section class="td_gray_bg_3">
    <div class="td_height_100 td_height_lg_75"></div>
    <div class="container">
      <div class="td_section_heading td_style_1 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.15s">
        <p class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_accent_color">
            {{ __('translate.Our Latest courses') }}</p>
        <h2 class="td_section_title td_fs_48 mb-0">{{ __('translate.Pick Our Latest Courses') }}</h2>
      </div>
      <div class="td_height_30 td_height_lg_30"></div>
      <div class="td_tabs">
        <ul class="td_tab_links td_style_1 td_mp_0 td_fs_20 td_medium td_heading_color wow fadeInUp"
          data-wow-duration="1s" data-wow-delay="0.2s">
          @foreach ($home_4_filter_categories as $category)
          <li class="{{ $loop->first ? 'active' : '' }}"><a href="#{{$category->slug}}">{{ $category?->name }}</a></li>
          @endforeach
        </ul>
        <div class="td_height_50 td_height_lg_50"></div>
        <div class="td_tab_body">
            @foreach ($home_4_filter_categories as $category)
                <div class="td_tab {{ $loop->first ? 'active' : '' }}" id="{{$category->slug}}">
                    <div class="row td_gap_y_24">
                        @foreach($category?->courses->take(6) as $course_index => $course)
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                                <div class="td_card td_style_3 d-block td_radius_10">
                                    @if ($course?->is_popular == 'enable')
                                        <span class="td_card_label td_accent_bg td_white_color">{{ __('translate.Popular') }}</span>
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
                                        <a href="{{ route('courses', ['category' => $course?->category?->slug]) }}"
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
                                        {{ html_decode($course->short_description) }}
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
            @endforeach
        </div>
      </div>
    </div>
    <div class="td_height_100 td_height_lg_50"></div>
  </section>
  <!-- End Popular Courses -->


  <!-- Start Feature Section -->
  <section>
    <div class="td_height_100 td_height_lg_50"></div>
    <div class="container">
      <div class="td_features td_style_1 td_hobble">
        <div class="td_features_thumb">
          <img src="{{ asset(getImage($our_campus, 'feature_image')) }}" alt="" class="td_radius_10 wow fadeInUp" data-wow-duration="1s"
            data-wow-delay="0.2s">
        </div>
        <div class="td_features_content td_white_bg td_radius_10 wow fadeInRight" data-wow-duration="1s"
          data-wow-delay="0.25s">
          <div class="td_section_heading td_style_1">
            <p class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_accent_color">
                {{ getTranslatedValue($our_campus, 'short_title') }}</p>
            <h2 class="td_section_title td_fs_48 mb-0">{{ getTranslatedValue($our_campus, 'title') }}</h2>
          </div>
          <div class="td_height_50 td_height_lg_50"></div>
          <ul class="td_feature_list td_mp_0">
            <li>
              <div class="td_feature_icon td_center">
                <img src="{{ asset(getImage($our_campus, 'item_one_icon')) }}" alt="">
              </div>
              <div class="td_feature_info">
                <h3 class="td_fs_32 td_semibold td_mb_15">{{ getTranslatedValue($our_campus, 'item_one_title') }}</h3>
                <p class="td_fs_14 td_heading_color td_opacity_7 mb-0">{{ getTranslatedValue($our_campus, 'item_one_description') }}</p>
              </div>
            </li>
            <li>
              <div class="td_feature_icon td_center">
                <img src="{{ asset(getImage($our_campus, 'item_two_icon')) }}" alt="">
              </div>
              <div class="td_feature_info">
                <h3 class="td_fs_32 td_semibold td_mb_15">{{ getTranslatedValue($our_campus, 'item_two_title') }}</h3>
                <p class="td_fs_14 td_heading_color td_opacity_7 mb-0">{{ getTranslatedValue($our_campus, 'item_two_description') }}</p>
              </div>
            </li>
            <li>
              <div class="td_feature_icon td_center">
                <img src="{{ asset(getImage($our_campus, 'item_three_icon')) }}" alt="">
              </div>
              <div class="td_feature_info">
                <h3 class="td_fs_32 td_semibold td_mb_15">{{ getTranslatedValue($our_campus, 'item_three_title') }}</h3>
                <p class="td_fs_14 td_heading_color td_opacity_7 mb-0">{{ getTranslatedValue($our_campus, 'item_three_description') }}</p>
              </div>
            </li>
            <li>
              <div class="td_feature_icon td_center">
                <img src="{{ asset(getImage($our_campus, 'item_four_icon')) }}" alt="">
              </div>
              <div class="td_feature_info">
                <h3 class="td_fs_32 td_semibold td_mb_15">{{ getTranslatedValue($our_campus, 'item_four_title') }}</h3>
                <p class="td_fs_14 td_heading_color td_opacity_7 mb-0">{{ getTranslatedValue($our_campus, 'item_four_description') }}</p>
              </div>
            </li>
          </ul>
        </div>
        <div class="td_features_shape_1 position-absolute td_accent_color td_hover_layer_3">
            @include('svg.home4.campus_shape')

        </div>
        <div class="td_features_shape_2 position-absolute td_accent_color td_hover_layer_5">
            @include('svg.home4.campus_shape2')

        </div>
      </div>
    </div>
    <div class="td_height_100 td_height_lg_50"></div>
  </section>
  <!-- End Feature Section -->


<!-- Start Campus Life -->
    <section class="td_accent_bg td_shape_section_1">
        <div class="td_shape_position_4 td_accent_color position-absolute">
          <svg width="37" height="40" viewBox="0 0 37 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g opacity="0.4">
              <rect y="12.3906" width="23.6182" height="31.0709" rx="1" transform="rotate(-30.4551 0 12.3906)"
                fill="white" />
              <rect x="4" y="14.8125" width="18.5361" height="2.62207" rx="1.31104" transform="rotate(-30.4551 4 14.8125)"
                fill="currentColor" />
              <rect x="7" y="19.8125" width="18.5361" height="2.62207" rx="1.31104" transform="rotate(-30.4551 7 19.8125)"
                fill="currentColor" />
            </g>
          </svg>
        </div>
        <div class="td_height_100 td_height_lg_50"></div>
        <div class="container">
          <div class="row td_gap_y_40">
            <div class="col-lg-5 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
              <div class="td_height_57 td_height_lg_0"></div>
              <div class="td_section_heading td_style_1">
                <h2 class="td_section_title td_fs_48 mb-0 td_white_color">{{ getTranslatedValue($our_program, 'title') }}</h2>
                <p class="td_section_subtitle td_fs_18 mb-0 td_white_color td_opacity_7">
                  {{ getTranslatedValue($our_program, 'description') }}
                </p>
              </div>
              <div class="td_btn_box">
                <svg width="299" height="315" viewBox="0 0 299 315" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g opacity="0.75" clip-path="url(#clip0_34_2222)">
                    <path
                      d="M242.757 275.771C242.505 275.771 242.253 275.75 242.005 275.707C32.3684 239.98 0.342741 8.13005 0.0437414 5.79468C-0.108609 4.51176 0.22739 3.21754 0.9787 2.19335C1.73001 1.16916 2.8359 0.497795 4.05598 0.32519C5.27606 0.152585 6.5117 0.492693 7.4943 1.27158C8.4769 2.05047 9.12704 3.20518 9.3034 4.48471C9.59772 6.7514 40.7872 231.477 243.5 266.022C244.658 266.22 245.702 266.868 246.426 267.838C247.15 268.808 247.5 270.028 247.406 271.256C247.312 272.484 246.782 273.63 245.921 274.467C245.06 275.303 243.93 275.769 242.757 275.771Z"
                      fill="white" />
                    <path
                      d="M299.002 275.455C271.709 283.305 237.446 297.872 215.562 314.617L235.465 269.602L223.318 221.648C242.099 242.137 273.428 262.728 299.002 275.455Z"
                      fill="white" />
                  </g>
                  <defs>
                    <clipPath id="clip0_34_2222">
                      <rect width="299" height="314" fill="white" transform="translate(0 0.421875)" />
                    </clipPath>
                  </defs>
                </svg>
                <div class="td_btn_box_in">
                  <a href="{{ getTranslatedValue($our_program, 'all_program_link') }}" target="_blank" class="td_btn td_style_1 td_radius_30 td_medium td_fs_18">
                    <span class="td_btn_in td_heading_color td_white_bg">
                      <span>{{ __('translate.View All Program') }}</span>
                    </span>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-lg-6 offset-lg-1">
              <div class="row">
                <div class="col-sm-6">

                  <div class="td_card td_style_2 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                    <a target="_blank" href="{{ getTranslatedValue($our_program, 'item_one_link') }}" class="td_card_thumb d-block">
                      <img src="{{ asset(getImage($our_program, 'item_one_image')) }}" alt="" class="w-100">
                    </a>
                    <div class="td_card_info">
                      <h2 class="td_card_title mb-0 td_fs_18 td_semibold td_white_color">
                        <a target="_blank" href="{{ getTranslatedValue($our_program, 'item_one_link') }}">{{ getTranslatedValue($our_program, 'item_one_title') }}</a>
                      </h2>
                      <a target="_blank" href="{{ getTranslatedValue($our_program, 'item_one_link') }}" class="td_card_btn">
                        <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M18.564 4.70161L4.42188 18.8438" stroke="white" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                          <path
                            d="M18.5654 13.5341C18.5654 13.5341 19.7299 5.85989 18.5654 4.69528C17.4008 3.53067 9.72656 4.69531 9.72656 4.69531"
                            stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M18.564 4.70161L4.42188 18.8438" stroke="white" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                          <path
                            d="M18.5654 13.5341C18.5654 13.5341 19.7299 5.85989 18.5654 4.69528C17.4008 3.53067 9.72656 4.69531 9.72656 4.69531"
                            stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                      </a>
                    </div>
                  </div>

                  <div class="td_height_40 td_height_lg_30"></div>
                  <div class="td_card td_style_2 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                    <a target="_blank" href="{{ getTranslatedValue($our_program, 'item_two_link') }}" class="td_card_thumb d-block">
                      <img src="{{ asset(getImage($our_program, 'item_two_image')) }}" alt="" class="w-100">
                    </a>
                    <div class="td_card_info">
                      <h2 class="td_card_title mb-0 td_fs_18 td_semibold td_white_color">
                        <a target="_blank" href="{{ getTranslatedValue($our_program, 'item_two_link') }}">{{ getTranslatedValue($our_program, 'item_two_title') }}</a>
                      </h2>
                      <a target="_blank" href="{{ getTranslatedValue($our_program, 'item_two_link') }}" class="td_card_btn">
                        <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M18.564 4.70161L4.42188 18.8438" stroke="white" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                          <path
                            d="M18.5654 13.5341C18.5654 13.5341 19.7299 5.85989 18.5654 4.69528C17.4008 3.53067 9.72656 4.69531 9.72656 4.69531"
                            stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M18.564 4.70161L4.42188 18.8438" stroke="white" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                          <path
                            d="M18.5654 13.5341C18.5654 13.5341 19.7299 5.85989 18.5654 4.69528C17.4008 3.53067 9.72656 4.69531 9.72656 4.69531"
                            stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="td_height_50 td_height_lg_30"></div>
                  <div class="td_card td_style_2 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                    <a target="_blank" href="{{ getTranslatedValue($our_program, 'item_three_link') }}" class="td_card_thumb d-block">
                      <img src="{{ asset(getImage($our_program, 'item_three_image')) }}" alt="" class="w-100">
                    </a>
                    <div class="td_card_info">
                      <h2 class="td_card_title mb-0 td_fs_18 td_semibold td_white_color">
                        <a target="_blank" href="{{ getTranslatedValue($our_program, 'item_three_link') }}">{{ getTranslatedValue($our_program, 'item_three_title') }}</a>
                      </h2>
                      <a target="_blank" href="{{ getTranslatedValue($our_program, 'item_three_link') }}" class="td_card_btn">
                        <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M18.564 4.70161L4.42188 18.8438" stroke="white" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                          <path
                            d="M18.5654 13.5341C18.5654 13.5341 19.7299 5.85989 18.5654 4.69528C17.4008 3.53067 9.72656 4.69531 9.72656 4.69531"
                            stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M18.564 4.70161L4.42188 18.8438" stroke="white" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                          <path
                            d="M18.5654 13.5341C18.5654 13.5341 19.7299 5.85989 18.5654 4.69528C17.4008 3.53067 9.72656 4.69531 9.72656 4.69531"
                            stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                      </a>
                    </div>
                  </div>
                  <div class="td_height_40 td_height_lg_30"></div>
                  <div class="td_card td_style_2 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                    <a target="_blank" href="{{ getTranslatedValue($our_program, 'item_four_link') }}" class="td_card_thumb d-block">
                      <img src="{{ asset(getImage($our_program, 'item_four_image')) }}" alt="" class="w-100">
                    </a>
                    <div class="td_card_info">
                      <h2 class="td_card_title mb-0 td_fs_18 td_semibold td_white_color">
                        <a target="_blank" href="{{ getTranslatedValue($our_program, 'item_four_link') }}">{{ getTranslatedValue($our_program, 'item_four_title') }}</a>
                      </h2>
                      <a target="_blank" href="{{ getTranslatedValue($our_program, 'item_four_link') }}" class="td_card_btn">
                        <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M18.564 4.70161L4.42188 18.8438" stroke="white" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                          <path
                            d="M18.5654 13.5341C18.5654 13.5341 19.7299 5.85989 18.5654 4.69528C17.4008 3.53067 9.72656 4.69531 9.72656 4.69531"
                            stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M18.564 4.70161L4.42188 18.8438" stroke="white" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                          <path
                            d="M18.5654 13.5341C18.5654 13.5341 19.7299 5.85989 18.5654 4.69528C17.4008 3.53067 9.72656 4.69531 9.72656 4.69531"
                            stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="td_height_100 td_height_lg_75"></div>
    </section>
<!-- End Campus Life -->


<!-- Start Departments Section -->
  <section>
    <div class="td_height_100 td_height_lg_75"></div>
    <div class="container">
      <div class="td_section_heading td_style_1 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
        <p class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_accent_color">
          {{ getTranslatedValue($popular_department, 'short_title') }}</p>
        <h2 class="td_section_title td_fs_48 mb-0">{{ getTranslatedValue($popular_department, 'title') }}</h2>
        <div class="d-flex justify-content-center">
        <p class="td_section_subtitle td_fs_18 mb-0 qs-custom-min-width-1">{{ getTranslatedValue($popular_department, 'description') }}</p>
        </div>
      </div>
      <div class="td_height_50 td_height_lg_50"></div>
      <div class="td_iconbox_1_wrap">
        <div class="td_iconbox td_style_1 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
          <div class="td_iconbox_icon td_accent_color td_mb_10">
            <img src="{{ asset(getImage($popular_department, 'department_one_image')) }}" alt="">
          </div>
          <h3 class="td_iconbox_title mb-0 td_medium td_fs_36">{{ getTranslatedValue($popular_department, 'department_one') }}</h3>
        </div>

        <div class="td_iconbox td_style_1 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
          <div class="td_iconbox_icon td_accent_color td_mb_10">
            <img src="{{ asset(getImage($popular_department, 'department_two_image')) }}" alt="">
          </div>
          <h3 class="td_iconbox_title mb-0 td_medium td_fs_36">{{ getTranslatedValue($popular_department, 'department_two') }}</h3>
        </div>

        <div class="td_iconbox td_style_1 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
          <div class="td_iconbox_icon td_accent_color td_mb_10">
            <img src="{{ asset(getImage($popular_department, 'department_three_image')) }}" alt="">
          </div>
          <h3 class="td_iconbox_title mb-0 td_medium td_fs_36">{{ getTranslatedValue($popular_department, 'department_three') }}</h3>
        </div>
        <div class="td_iconbox td_style_1 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
          <div class="td_iconbox_icon td_accent_color td_mb_10">
            <img src="{{ asset(getImage($popular_department, 'department_four_image')) }}" alt="">
          </div>
          <h3 class="td_iconbox_title mb-0 td_medium td_fs_36">{{ getTranslatedValue($popular_department, 'department_four') }}</h3>
        </div>
      </div>
    </div>
    <div class="td_height_100 td_height_lg_50"></div>
  </section>
  <!-- End Departments Section -->

  <!-- Start Video Section -->
  <section>
    <div class="td_video_block td_style_1 td_accent_bg td_bg_filed td_center text-center"
      data-src="{{ asset(getImage($about_video, 'video_background')) }}">
      <div class="container">
        <a href="https://www.youtube.com/embed/{{ getTranslatedValue($about_video, 'youtube_video_id') }}" class="td_player_btn_wrap_2 td_video_open wow zoomIn"
          data-wow-duration="1s" data-wow-delay="0.2s">
          <span class="td_player_btn td_center">
            <span></span>
          </span>
        </a>
        <div class="td_height_70 td_height_lg_50"></div>
        <h2 class="td_fs_48 td_white_color mb-0 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">{{ getTranslatedValue($about_video, 'video_title') }}</h2>
      </div>
    </div>
    <div class="container wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
      <div class="td_contact_box td_style_1 td_accent_bg td_radius_10">
        <div class="td_contact_box_left">
          <p class="td_fs_18 td_light td_white_color td_mb_4">{{ __('translate.Get In Touch') }}:</p>
          <h3 class="td_fs_36 mb-0 td_white_color"><a href="mailto:{{ getTranslatedValue($about_video, 'email') }}">{{ getTranslatedValue($about_video, 'email') }}</a></h3>
        </div>
        <div
          class="td_contact_box_or td_fs_24 td_medium td_white_bg td_white_bg td_center rounded-circle td_accent_color">
          {{ __('translate.or') }}
        </div>
        <div class="td_contact_box_right">
          <p class="td_fs_18 td_light td_white_color td_mb_4">{{ __('translate.Get In Touch') }}:</p>
          <h3 class="td_fs_36 mb-0 td_white_color"><a href="tel:{{ getTranslatedValue($about_video, 'phone') }}">{{ getTranslatedValue($about_video, 'phone') }}</a></h3>
        </div>
      </div>
    </div>
  </section>
  <!-- End Video Section -->


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
                    <div class="td_team td_style_1 td_style-home-four text-center position-relative">

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


  <!-- Start Testimonial Section -->
  <section class="td_heading_bg td_heading_bg_forth T td_hobble">
    <div class="td_height_100 td_height_lg_75"></div>
    <div class="container">
      <div class="td_section_heading td_style_1 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
        <h2 class="td_section_title td_fs_48 mb-0 td_white_color">{{ getTranslatedValue($home4_testimonial, 'title') }}</h2>
       <div class="d-flex justify-content-center">
       <p class="td_section_subtitle td_fs_18 mb-0 td_white_color td_opacity_7 qs-custom-min-width-1">
            {{ getTranslatedValue($home4_testimonial, 'description') }}
        </p>
       </div>
      </div>
      <div class="td_height_50 td_height_lg_50"></div>
      <div class="row align-items-center td_gap_y_40">
        <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
          <div class="td_testimonial_img_wrap">
            <img src="{{ asset(getImage($home4_testimonial, 'feature_image')) }}" alt="" class="td_testimonial_img">
            <span class="td_testimonial_img_shape_1"><span></span></span>
            <span class="td_testimonial_img_shape_2 td_accent_color td_hover_layer_3">
              <svg width="145" height="165" viewBox="0 0 145 165" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M145.003 25.9077L139.516 27.7024L143.814 31.5573L145.003 25.9077ZM69.5244 11.4999L69.2176 11.1051L69.5244 11.4999ZM69.5244 53.0379L69.3973 53.5215L69.5244 53.0379ZM141.65 28.8989C135.031 35.2997 125.943 38.4375 116.315 39.2654C106.688 40.0931 96.561 38.607 87.9207 35.8021C79.2649 32.9923 72.1739 28.8832 68.5572 24.5234C66.753 22.3484 65.8508 20.1579 65.9824 18.0635C66.1133 15.9807 67.2739 13.8818 69.8312 11.8948L69.2176 11.1051C66.5057 13.2123 65.1383 15.552 64.9844 18.0007C64.8313 20.4378 65.8877 22.8715 67.7876 25.1618C71.5792 29.7325 78.8783 33.9182 87.6119 36.7533C96.361 39.5934 106.622 41.1025 116.4 40.2617C126.177 39.4211 135.511 36.2268 142.346 29.6178L141.65 28.8989ZM69.8312 11.8948C76.1217 7.00714 81.1226 4.09865 85.0169 2.71442C88.9178 1.32781 91.6197 1.49918 93.4091 2.61867C95.1994 3.73872 96.231 5.90455 96.5629 8.8701C96.894 11.8276 96.5159 15.4895 95.5803 19.4474C93.7094 27.3612 89.6393 36.3356 84.7843 42.9886C82.3565 46.3156 79.7503 49.0371 77.1481 50.7594C74.545 52.4823 72.001 53.1717 69.6515 52.5543L69.3973 53.5215C72.1238 54.238 74.964 53.4042 77.7 51.5933C80.437 49.7818 83.1248 46.9592 85.5921 43.578C90.5275 36.8148 94.6527 27.7176 96.5534 19.6775C97.5035 15.6584 97.9053 11.8728 97.5567 8.75886C97.2091 5.65298 96.1014 3.12347 93.9395 1.77091C91.7766 0.417783 88.7131 0.33927 84.6819 1.77217C80.6441 3.20744 75.5463 6.18784 69.2176 11.1051L69.8312 11.8948ZM69.6515 52.5543C56.6241 49.1307 47.457 52.0938 41.14 58.6639C34.8623 65.1932 31.4678 75.2154 29.7777 85.7878C28.0854 96.3743 28.0905 107.589 28.673 116.58C28.9644 121.078 29.4007 125.024 29.843 128.065C30.2827 131.086 30.7341 133.255 31.0666 134.168L32.0062 133.825C31.7138 133.023 31.2736 130.952 30.8326 127.921C30.3942 124.908 29.9607 120.988 29.6709 116.516C29.0912 107.568 29.0886 96.4337 30.7652 85.9456C32.444 75.4434 35.7949 65.6661 41.8608 59.357C47.8875 53.0888 56.6625 50.1748 69.3973 53.5215L69.6515 52.5543Z"
                  fill="white" />
                <circle cx="34" cy="150" r="15" fill="currentColor" />
                <circle cx="15" cy="137" r="15" fill="currentColor" />
                <circle cx="24" cy="144" r="15" fill="white" />
              </svg>
            </span>
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
          <div class="td_slider td_style_1">
            <div class="td_slider_container" data-autoplay="0" data-loop="1" data-speed="800" data-center="0"
              data-variable-width="0" data-slides-per-view="1">
              <div class="td_slider_wrapper">
                @foreach ($testimonials as $testimonial)
                <div class="td_slide">
                  <div class="td_testimonial td_style_1 td_white_bg td_radius_5">
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
          </div>
        </div>
      </div>
    </div>
    <div class="td_height_100 td_height_lg_50"></div>
  </section>
  <!-- End Testimonial Section -->

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
      <div class="row td_gap_y_30">
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
