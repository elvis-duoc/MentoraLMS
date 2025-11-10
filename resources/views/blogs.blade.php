@extends('layout_inner_page')

@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}" />
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}" />
@endsection

@section('front-content')

    @include('breadcrumb')

    <section>
        <div class="td_height_100 td_height_lg_50"></div>
        <div class="container">
          <div class="row td_gap_y_30">
            @forelse ($blogs as $blog)
                <div class="col-lg-4">
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
            @empty
                <div class="col-12">
                    <div class="courses_not_found_main">
                        <div class="courses_not_found_thumb">
                            <img src="{{ asset($general_setting->not_found ?? '') }}" alt="thumb">
                        </div>
                        <div class="courses_not_found_text">
                            <h3>{{ __('translate.OOPS! Blog not Found') }}</h3>
                            <p>
                                {{ __('translate.Oops! this information is not available for a moment') }}
                            </p>

                            <a href="{{ route('blogs') }}"
                                class="td_btn td_style_1 td_radius_30 td_medium td_with_shadow">
                                <span class="td_btn_in td_white_color td_accent_bg">
                                    <span>{{ __('translate.Back to Blog') }}</span>
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
          @if ($blogs->hasPages())
              {{ $blogs->links('custom_pagination') }}
          @endif
        </div>
        <div class="td_height_100 td_height_lg_50"></div>
    </section>
      <!-- End Blog List -->



@endsection
