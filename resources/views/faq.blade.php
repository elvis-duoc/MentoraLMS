@extends('layout_inner_page')

@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection

@section('front-content')

  @include('breadcrumb')

  <!-- Start Accordion Section -->
  <div class="td_height_100 td_height_lg_50"></div>
  <div class="td_faq_1 td_style_1 td_type_1">
    <div class="td_faq_1_left">
      <div class="td_faq_1_img td_bg_filed" data-src="{{ asset(getImage($faq_page, 'section_one_image')) }}"></div>
    </div>
    <div class="td_faq_1_right">
      <div class="td_section_heading td_style_1">
        <p class="td_section_subtitle_up td_fs_18 td_medium td_spacing_1 td_mb_10 td_accent_color">{{ getTranslatedValue($faq_page, 'section_one_title') }}</p>
      </div>
      <div class="td_accordians td_style_1 td_type_2 td_mb_40">
        @foreach ($faqs_one as $index => $faq)
          <div class="td_accordian {{ $index == 1 ? 'active' : '' }}">
            <div class="td_accordian_head">
              <h2 class="td_accordian_title td_fs_24">{{ $faq->question }}</h2>
              <span class="td_accordian_toggle"></span>
            </div>
            <div class="td_accordian_body td_fs_18">
              {!! clean($faq->answer) !!}
            </div>
          </div><!-- .td_accordian -->
        @endforeach

      </div>
      <a href="{{ route('contact-us') }}" class="td_btn td_style_2 td_type_2 td_heading_color td_medium">
        {{ __('translate.Get In Touch') }}
        <i>
          <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.1575 4.34302L3.84375 15.6567" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
              stroke-linejoin="round"></path>
            <path
              d="M15.157 11.4142C15.157 11.4142 16.0887 5.2748 15.157 4.34311C14.2253 3.41142 8.08594 4.34314 8.08594 4.34314"
              stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
          <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.1575 4.34302L3.84375 15.6567" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
              stroke-linejoin="round"></path>
            <path
              d="M15.157 11.4142C15.157 11.4142 16.0887 5.2748 15.157 4.34311C14.2253 3.41142 8.08594 4.34314 8.08594 4.34314"
              stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
        </i>
      </a>
    </div>
  </div>
  <div class="td_height_100 td_height_lg_50"></div>
  <div class="td_faq_1 td_style_1">
    <div class="td_faq_1_right">
      <div class="td_section_heading td_style_1">
        <p class="td_section_subtitle_up td_fs_18 td_medium td_spacing_1 td_mb_10 td_accent_color">{{ getTranslatedValue($faq_page, 'section_two_title') }}</p>
      </div>
      <div class="td_accordians td_style_1 td_type_2 td_mb_40">

        @foreach ($faqs_two as $index => $faq)
          <div class="td_accordian {{ $index == 1 ? 'active' : '' }}">
            <div class="td_accordian_head">
              <h2 class="td_accordian_title td_fs_24">{{ $faq->question }}</h2>
              <span class="td_accordian_toggle"></span>
            </div>
            <div class="td_accordian_body td_fs_18">
              {!! clean($faq->answer) !!}
            </div>
          </div><!-- .td_accordian -->
        @endforeach


      </div>
      <a href="{{ route('contact-us') }}" class="td_btn td_style_2 td_type_2 td_heading_color td_medium">
        {{ __('translate.Get In Touch') }}
        <i>
          <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.1575 4.34302L3.84375 15.6567" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
              stroke-linejoin="round"></path>
            <path
              d="M15.157 11.4142C15.157 11.4142 16.0887 5.2748 15.157 4.34311C14.2253 3.41142 8.08594 4.34314 8.08594 4.34314"
              stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
          <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.1575 4.34302L3.84375 15.6567" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
              stroke-linejoin="round"></path>
            <path
              d="M15.157 11.4142C15.157 11.4142 16.0887 5.2748 15.157 4.34311C14.2253 3.41142 8.08594 4.34314 8.08594 4.34314"
              stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
        </i>
      </a>
    </div>
    <div class="td_faq_1_left">
      <div class="td_faq_2_img td_bg_filed" data-src="{{ asset(getImage($faq_page, 'section_two_image')) }}"></div>
    </div>
  </div>
  <!-- End Accordion Section -->
  <!-- Start Blog Section -->
  <section>
    <div class="td_height_100 td_height_lg_75"></div>
    <div class="container">
      <div class="td_section_heading td_style_1">
        <p class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_accent_color">
          {{ __('translate.BLOG & ARTICLES') }}</p>
        <h2 class="td_section_title td_fs_48 mb-0">{{ __('translate.Take A Look At The Latest') }} <br>{{ __('translate.Articles') }}</h2>
      </div>
      <div class="td_height_50 td_height_lg_50"></div>
      <div class="row td_gap_y_24">
        @foreach($blogs as $blog)
          <div class="col-xl-6">
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
