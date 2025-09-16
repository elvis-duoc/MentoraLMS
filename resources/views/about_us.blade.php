@extends('layout_inner_page')

@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection

@section('front-content')

  @include('breadcrumb')

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
            <a href="{{ route('contact-us') }}" class="td_btn td_style_1 td_radius_30 td_medium td_with_shadow">
              <span class="td_btn_in td_white_color td_accent_bg">
                <span>{{ __('translate.Contact Us') }}</span>
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
          <div class="col-lg-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
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
