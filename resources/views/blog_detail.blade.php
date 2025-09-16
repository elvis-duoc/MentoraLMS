@extends('layout_inner_page')

@section('title')
    <title>{{ $blog->seo_title }}</title>
    <meta name="title" content="{{ $blog->seo_title }}">
    <meta name="description" content="{{ $blog->seo_description }}">

    @php
        $tags = '';
        if($blog->tags){
            foreach (json_decode($blog->tags) as $key => $blog_tag) {
                $tags .= $blog_tag->value.', ';
            }
        }
    @endphp

    <meta name="keyword" content="{{ $tags }}">
@endsection

@section('front-content')


    @include('breadcrumb')

     <!-- Start Blog Details -->
  <section>
    <div class="td_height_100 td_height_lg_50"></div>
    <div class="container">
      <div class="row td_gap_y_50">
        <div class="col-lg-8">
          <div class="td_blog_details_head td_mb_40">
           <div class="td_blog_details_img_wrapper">
               <img src="{{ asset($blog->image) }}" alt="" class="td_blog_details_img_main"/>
           </div>
            <div class="td_blog_details_head_meta">
              <div class="td_blog_details_avatar">
                <img src="{{ asset($blog?->author?->image) }}" alt=""/>
                <p class="mb-0 td_heading_color td_bold"><span class="td_normal td_opacity_5">{{ __('translate.By') }}</span> {{ $blog?->author?->name }}
                </p>
              </div>
              <ul class="td_blog_details_head_meta_list td_mp_0 td_heading_color">
                <li>
                  <div class="td_icon_btns">
                    <span class="td_icon_btn td_center td_heading_color">
                      @include('svg.blog_calander')

                    </span>
                  </div>
                  {{ $blog->created_at->format('d-m-Y') }}
                </li>

                <li>
                  <div class="td_icon_btns">
                    <button type="button" class="td_icon_btn td_center td_heading_color">
                      <!-- @include('svg.blog_comment') -->
                      <svg width="18" height="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M10 3H14C18.4183 3 22 6.58172 22 11C22 15.4183 18.4183 19 14 19V22.5C9 20.5 2 17.5 2 11C2 6.58172 5.58172 3 10 3ZM12 17H14C17.3137 17 20 14.3137 20 11C20 7.68629 17.3137 5 14 5H10C6.68629 5 4 7.68629 4 11C4 14.61 6.46208 16.9656 12 19.4798V17Z"></path></svg>
                    </button>

                  </div>
                  {{ $blog->total_comment }} {{ __('translate.Comment') }}
                </li>

                <li>
                  <div class="td_icon_btns">
                    <a href="javascript:;" class="td_icon_btn td_center td_heading_color">
                      <!-- @include('svg.blog_view') -->
                      <svg width="18" height="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z"></path></svg>
                    </a>
                  </div>
                  {{ $blog->views }} {{ __('translate.views') }}
                </li>
              </ul>
            </div>
          </div>
          <div class="td_blog_details">
            <h2>{{ $blog?->title }}</h2>

            {!! clean($blog->description) !!}

          </div>
          <div class="td_height_50 td_height_lg_40"></div>
          <div class="td_post_share">
            <div class="td_categories">
              <h4 class="mb-0 td_fs_18">{{ __('translate.Tags') }}:</h4>
              @if ($blog->tags)
                  @foreach (json_decode($blog->tags) as $blog_tag)
                  <a href="javascript:;" class="td_category">#{{ $blog_tag->value }}</a>
                  @endforeach
              @endif
            </div>
            <div class="td_footer_social_btns td_fs_18 td_accent_color">
              <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('blog', $blog->slug) }}&t={{ $blog->title }}" class="td_center">
                <i class="fa-brands fa-facebook-f"></i>
              </a>
              <a target="_blank" href="https://twitter.com/share?text={{ $blog->title }}&url={{ route('blog', $blog->slug) }}" class="td_center">
                <i class="fa-brands fa-x-twitter"></i>
              </a>
              <a target="_blank" href="https://www.instagram.com/?url={{ route('blog', $blog->slug) }}" class="td_center">
                <i class="fa-brands fa-instagram"></i>
              </a>
              <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('blog', $blog->slug) }}&title={{ $blog->title }}" class="td_center">
                <i class="fa-brands fa-linkedin"></i>
              </a>
            </div>
          </div>
          <div class="td_height_40 td_height_lg_40"></div>
          <div class="td_author_card">
            <div class="td_author_card_in">
              <img src="{{ asset($blog?->author?->image) }}" alt="" class="td_author_card_thumb">
              <div class="td_author_card_right">
                <p class="td_medium td_accent_color td_mb_10">{{ __('translate.Author') }}</p>
                <h3 class="td_fs_20 td_semibold td_mb_10">{{ $blog?->author?->name }}</h3>
                <p class="mb-0">{{ $blog?->author?->about_me }}</p>
              </div>
            </div>
          </div>
          <div class="td_height_40 td_height_lg_40"></div>
          <div id="comments" class="comments-area">
            <h2 class="comments-title td_fs_20 td_semibold">{{ $blog->total_comment }} {{ __('translate.Comments') }}</h2>
            <ol class="comment-list">

              @foreach ($blog_comments as $blog_comment)
                <li class="comment cs-accent_4_bg">
                  <div class="comment-body">
                    <div class="comment-author vcard">
                      <img class="avatar" src="{{ asset($general_setting->default_avatar) }}" alt="Author">
                      <a href="javascipt:;" class="url">{{ html_decode($blog_comment->name) }}</a>
                    </div>
                    <div class="comment-meta">
                      <a href="javascipt:;">{{ $blog_comment->created_at->format('d M Y') }}</a>
                    </div>
                    <p>{{ html_decode($blog_comment->comment) }}</p>

                  </div>
                </li>
              @endforeach
            </ol>
          </div>
          <div class="td_height_60 td_height_lg_40"></div>
          <div class="td_comment_wrap">
            <h2 class="td_fs_24 td_semibold td_mb_10">{{ __('translate.Post a comment') }}</h2>
            <p class="td_mb_16 td_heading_color">{{ __('translate.Your email address will not be published. Required fields are marked') }} *
            </p>
            <form class="row td_gap_y_20" action="{{ route('store-blog-comment', $blog->id) }}" method="POST">
              @csrf
              <div class="col-lg-12">
                <textarea cols="30" rows="5" class="td_form_field" placeholder="{{ __('translate.Write Your Comment') }}*" name="comment">{{ old('comment') }}</textarea>
              </div>
              <div class="col-lg-4">
                <input type="text" class="td_form_field" placeholder="{{ __('translate.Name') }}*" name="name" value="{{ old('name') }}">
              </div>
              <div class="col-lg-4">
                <input type="email" class="td_form_field" placeholder="{{ __('translate.Email') }}*" name="email" value="{{ old('email') }}">
              </div>
              <div class="col-lg-4">
                <input type="text" class="td_form_field" placeholder="{{ __('translate.Phone') }}" name="phone" value="{{ old('phone') }}">
              </div>

              @if($general_setting->recaptcha_status==1)
                  <div class="col-lg-4">
                      <div class="g-recaptcha" data-sitekey="{{ $general_setting->recaptcha_site_key }}"></div>
                  </div>
              @endif

              <div class="col-lg-12">
                <button class="td_btn td_style_1 td_radius_30 td_medium" type="submit">
                  <span class="td_btn_in td_white_color td_accent_bg">
                    <span>{{ __('translate.Post Comment') }}</span>
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
        <div class="col-lg-4">
          <div class="td_left_sidebar">
            <div class="td_sidebar_widget">
              <h3 class="td_sidebar_widget_title td_fs_20 td_mb_30">{{ __('translate.Search Here') }}</h3>
              <form action="{{ route('blogs') }}" class="td_sidebar_search">
                <input type="text" placeholder="{{ __('translate.Keywords') }}" name="search" class="td_sidebar_search_input">
                <button type="submit" class="td_sidebar_search_btn td_center">
                  <i class="fa-solid fa-magnifying-glass"></i>
                </button>
              </form>
            </div>
            <div class="td_sidebar_widget">
              <h3 class="td_sidebar_widget_title td_fs_20 td_mb_30">{{ __('translate.Recent Post') }}</h3>
              <ul class="td_recent_post_list td_mp_0">
                @foreach ($latest_blogs as $latest_blog)
                  <li>
                    <div class="td_recent_post">
                      <a href="blog-details.html" class="td_recent_post_thumb">
                        <img src="{{ asset($latest_blog->image) }}" alt="">
                      </a>
                      <div class="td_recent_post_right">
                        <p class="td_recent_post_date mb-0 td_fs_14">
                          <i class="fa-regular fa-calendar"></i>
                          <span>{{ $latest_blog->created_at->format('d-m-Y') }}</span>
                        </p>
                        <h3 class="td_fs_16 td_semibold mb-0">
                          <a href="{{ route('blog', $latest_blog->slug) }}">{{ $latest_blog->title }}</a>
                        </h3>
                      </div>
                    </div>
                  </li>
                @endforeach

              </ul>
            </div>
            <div class="td_sidebar_widget">
              <h3 class="td_sidebar_widget_title td_fs_20 td_mb_30">{{ __('translate.Popular Category') }}</h3>
              <ul class="td_sidebar_widget_list">
                @foreach ($blog_categories as $blog_category)
                  <li class="cat-item">
                    <a href="{{ route('blogs', ['category' => $blog_category->id]) }}">
                      <span>{{ $blog_category?->name }}</span>
                      <span>({{ $blog_category->total_blog }})</span>
                    </a>
                  </li>
                @endforeach
              </ul>
            </div>
            <div class="td_sidebar_widget">
              <h3 class="td_sidebar_widget_title td_fs_20 td_mb_30">{{ __('translate.Tags') }}</h3>
              <div class="tagcloud">
                @foreach ($tags_array as $tag_item)
                  <a href="{{ route('blogs', ['search' => $tag_item]) }}" class="tag-cloud-link">{{ $tag_item }}</a>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="td_height_100 td_height_lg_50"></div>
  </section>
  <!-- Start Blog Details -->



@endsection

@push('js_section')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

@endpush
