<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon Icon -->
  <link rel="shortcut icon" href="{{ asset($general_setting->favicon) }}" type="image/x-icon">

  <!-- Site Title -->
  @yield('title')

  <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/odometer.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery-ui.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/dev.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/cookie_consent.css') }}">

  <link rel="stylesheet" href="{{ asset('global/toastr/toastr.min.css') }}">

  @stack('style_section')


    @if ($general_setting->google_analytic_status == 1)
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $general_setting->google_analytic_id }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ $general_setting->google_analytic_id }}');
        </script>
    @endif


    @if ($general_setting->pixel_status == 1)
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '{{ $general_setting->pixel_app_id }}');
        fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id={{ $general_setting->pixel_app_id }}&ev=PageView&noscript=1"
    /></noscript>
    @endif

</head>

<body class="td_theme_2">

    @if ($general_setting->preloader_status == 'enable')
    <!-- Start Preloader -->
    <div class="td_preloader">
        <div class="td_preloader_in">
        <span></span>
        <span></span>
        </div>
    </div>
    <!-- End Preloader -->
    @endif

  <!-- Start Header Section -->
  <header class="td_site_header td_style_1 td_type_2 td_sticky_header td_medium td_heading_color">
    <div class="td_top_header td_heading_bg td_white_color">
      <div class="container">
        <div class="td_top_header_in">
          <div class="td_top_header_left">
            <ul class="td_header_contact_list td_mp_0 td_normal">
              <li>
                @include('svg.search_phone')
                <span>
                    {{ __('translate.Call') }}: <a href="tel:{{ $footer->phone }}">{{ $footer->phone }}</a>
                </span>
              </li>
              <li>
                @include('svg.search_email')
                <span>
                    {{ __('translate.Email') }}: <a href="mailto:{{ $footer->email }}">{{ $footer->email }}</a>
                </span>
              </li>
            </ul>
          </div>
          <div class="td_top_header_right">
              <div class="top_bar-curr-lang-wrapper">
                    <div class="curr-wrapper">
                        <span>
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="10.5" cy="10.5" r="8.75" stroke="white" stroke-width="1.5"/>
                                    <path
                                        d="M12.25 8.75C12.25 7.7835 11.4665 7 10.5 7C9.5335 7 8.75 7.7835 8.75 8.75C8.75 9.7165 9.5335 10.5 10.5 10.5"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                                    <path
                                        d="M10.5 10.5C11.4665 10.5 12.25 11.2835 12.25 12.25C12.25 13.2165 11.4665 14 10.5 14C9.5335 14 8.75 13.2165 8.75 12.25"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M10.5 5.6875V7" stroke="white" stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"/>
                                    <path d="M10.5 14V15.3125" stroke="white" stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"/>
                            </svg>

                        </span>
                        <select class="curr-select currency_code"  name="currency_code">
                            @foreach ($currency_list as $currency_item)
                                <option {{ Session::get('currency_code') == $currency_item->currency_code ? 'selected' : '' }} value="{{ $currency_item->currency_code }}">{{ $currency_item->currency_name }}</option>
                            @endforeach
                        </select>
                        <span>
                                <svg width="12" height="6" viewBox="0 0 12 6"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.48168 0.257257L1.15195 0.633128C1.0082 0.507022 0.880234 0.47264 0.6972 0.522982C0.591592 0.552689 0.533228 0.620723 0.511034 0.682062C0.489915 0.740432 0.498794 0.79213 0.537367 0.837247L0.537391 0.837227L0.540943 0.841477C0.554654 0.857879 0.574305 0.877369 0.617194 0.917969C1.18107 1.41263 1.74445 1.90717 2.30763 2.40154C3.43758 3.39343 4.56675 4.38463 5.6976 5.37472L5.69797 5.37504C5.85925 5.51653 6.03253 5.53326 6.19983 5.44822L6.20061 5.44782C6.22486 5.43555 6.25952 5.41023 6.32959 5.34876C6.74121 4.98767 7.1527 4.62651 7.5642 4.26535C8.79869 3.18185 10.0332 2.09833 11.2713 1.01657C11.4176 0.888233 11.4756 0.817164 11.5 0.763333L11.5 0.763256L11.5 0.76286L11.5 0.762465L11.5 0.762069L11.5 0.761673L11.5 0.761277L11.5 0.760881L11.5 0.760485L11.5 0.760089L11.5 0.759694L11.5 0.759298L11.5 0.758901L11.5 0.758505L11.5 0.758109L11.5 0.757713L11.5 0.757317L11.5 0.756921L11.5 0.756525L11.5 0.756129L11.5 0.755732L11.5 0.755336L11.5 0.75494L11.5 0.754544L11.5 0.754147L11.5 0.753751L11.5 0.753355L11.5 0.752958L11.5 0.752562L11.5 0.752165L11.5 0.751769L11.5 0.751372L11.5 0.750976L11.5 0.750579L11.5 0.750182L11.5 0.749786L11.5 0.749389L11.5 0.748992L11.5 0.748596L11.5 0.748199L11.5 0.747802L11.5 0.747405L11.5 0.747008L11.5 0.746612L11.5 0.746215L11.5 0.745818L11.5 0.745421L11.5 0.745024L11.5 0.744627L11.5 0.74423L11.5 0.743832L11.5 0.743435L11.5 0.743038L11.5 0.742641L11.5 0.742244L11.5 0.741847L11.5 0.741449L11.5 0.741052L11.5 0.740655L11.5 0.740257L11.5 0.73986L11.5 0.739462L11.5 0.739065L11.5 0.738667L11.5 0.73827L11.5 0.737872L11.5 0.737475L11.5 0.737077L11.5 0.736679L11.5 0.736282L11.5 0.735884L11.5 0.735486L11.5 0.735088L11.5 0.73469L11.5 0.734292L11.5 0.733895L11.5 0.733497L11.5 0.733099L11.5 0.732701L11.5 0.732303L11.5 0.731904L11.5 0.731506L11.5 0.731108L11.5 0.73071L11.5 0.730312L11.5 0.729913L11.5 0.729515L11.5 0.729117L11.5 0.728718L11.5 0.72832L11.5 0.727922L11.5 0.727523L11.5 0.727125L11.5 0.726726L11.5 0.726327L11.5 0.725929L11.5 0.72553L11.5 0.725131L11.5 0.724733L11.5 0.724334L11.5 0.723935L11.5 0.723536L11.5 0.723137L11.5 0.722738L11.5 0.722339L11.5 0.72194L11.5 0.721541L11.5 0.721142L11.5 0.720743L11.5 0.720344L11.5 0.719945L11.5 0.719546L11.5 0.719146L11.5 0.718747L11.5 0.718348L11.5 0.717948L11.5 0.717549L11.5 0.717149L11.5 0.71675L11.5 0.71635L11.5 0.715951L11.5 0.715551L11.5 0.715151L11.5 0.714752L11.5 0.714352L11.5 0.713952L11.5 0.713552L11.5 0.713152L11.5 0.712752L11.5 0.712686C11.4728 0.641646 11.4398 0.601009 11.3933 0.567314C11.2606 0.477334 11.0599 0.479312 10.9385 0.562808C10.892 0.596539 10.8496 0.629622 10.8124 0.662319L6.43668 4.50087L6.12015 4.14005L6.43668 4.50087C6.45898 4.4813 6.35887 4.58257 6.24201 4.65946L5.82635 4.93294L5.55084 4.51862C5.54079 4.50351 5.53244 4.48968 5.52579 4.47815C5.52369 4.47451 5.52169 4.47098 5.51982 4.46763C4.80043 3.83518 4.08022 3.20338 3.35977 2.57138L3.35929 2.57096C2.62327 1.92529 1.887 1.2794 1.15153 0.632758L1.48168 0.257257ZM1.48168 0.257257C1.22214 0.0295716 0.922659 -0.0579998 0.563286 0.0412478C0.040864 0.1872 -0.172097 0.776848 0.157328 1.16216L1.48168 0.257257Z"
                                        fill="#161B3D" stroke="white"/>
                                </svg>

                        </span>
                    </div>
                  <div class="separator">|</div>
                  <div class="lang-wrapper">
                        <span>
                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <ellipse cx="9.5" cy="9.5" rx="3.5" ry="8.75" stroke="white" stroke-width="1.5"/>
                                <path d="M18.2466 9.25547C16.6696 10.5514 13.3455 11.4444 9.5 11.4444C5.65447 11.4444 2.33041 10.5514 0.753351 9.25547M18.2466 9.25547C18.1172 4.53604 14.2507 0.75 9.5 0.75C4.74928 0.75 0.882847 4.53604 0.753351 9.25547M18.2466 9.25547C18.2489 9.33671 18.25 9.41822 18.25 9.5C18.25 14.3325 14.3325 18.25 9.5 18.25C4.66751 18.25 0.75 14.3325 0.75 9.5C0.75 9.41822 0.751122 9.33671 0.753351 9.25547" stroke="white" stroke-width="1.5"/>
                            </svg>
                        </span>
                        <select class="lang-select language_code" name="lang_code">
                            @foreach ($language_list as $language_item)
                                <option {{ Session::get('front_lang') == $language_item->lang_code ? 'selected' : '' }} value="{{ $language_item->lang_code }}">{{ $language_item->lang_name }}</option>
                            @endforeach

                        </select>
                    <span>
                        <svg width="12" height="6" viewBox="0 0 12 6"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.48168 0.257257L1.15195 0.633128C1.0082 0.507022 0.880234 0.47264 0.6972 0.522982C0.591592 0.552689 0.533228 0.620723 0.511034 0.682062C0.489915 0.740432 0.498794 0.79213 0.537367 0.837247L0.537391 0.837227L0.540943 0.841477C0.554654 0.857879 0.574305 0.877369 0.617194 0.917969C1.18107 1.41263 1.74445 1.90717 2.30763 2.40154C3.43758 3.39343 4.56675 4.38463 5.6976 5.37472L5.69797 5.37504C5.85925 5.51653 6.03253 5.53326 6.19983 5.44822L6.20061 5.44782C6.22486 5.43555 6.25952 5.41023 6.32959 5.34876C6.74121 4.98767 7.1527 4.62651 7.5642 4.26535C8.79869 3.18185 10.0332 2.09833 11.2713 1.01657C11.4176 0.888233 11.4756 0.817164 11.5 0.763333L11.5 0.763256L11.5 0.76286L11.5 0.762465L11.5 0.762069L11.5 0.761673L11.5 0.761277L11.5 0.760881L11.5 0.760485L11.5 0.760089L11.5 0.759694L11.5 0.759298L11.5 0.758901L11.5 0.758505L11.5 0.758109L11.5 0.757713L11.5 0.757317L11.5 0.756921L11.5 0.756525L11.5 0.756129L11.5 0.755732L11.5 0.755336L11.5 0.75494L11.5 0.754544L11.5 0.754147L11.5 0.753751L11.5 0.753355L11.5 0.752958L11.5 0.752562L11.5 0.752165L11.5 0.751769L11.5 0.751372L11.5 0.750976L11.5 0.750579L11.5 0.750182L11.5 0.749786L11.5 0.749389L11.5 0.748992L11.5 0.748596L11.5 0.748199L11.5 0.747802L11.5 0.747405L11.5 0.747008L11.5 0.746612L11.5 0.746215L11.5 0.745818L11.5 0.745421L11.5 0.745024L11.5 0.744627L11.5 0.74423L11.5 0.743832L11.5 0.743435L11.5 0.743038L11.5 0.742641L11.5 0.742244L11.5 0.741847L11.5 0.741449L11.5 0.741052L11.5 0.740655L11.5 0.740257L11.5 0.73986L11.5 0.739462L11.5 0.739065L11.5 0.738667L11.5 0.73827L11.5 0.737872L11.5 0.737475L11.5 0.737077L11.5 0.736679L11.5 0.736282L11.5 0.735884L11.5 0.735486L11.5 0.735088L11.5 0.73469L11.5 0.734292L11.5 0.733895L11.5 0.733497L11.5 0.733099L11.5 0.732701L11.5 0.732303L11.5 0.731904L11.5 0.731506L11.5 0.731108L11.5 0.73071L11.5 0.730312L11.5 0.729913L11.5 0.729515L11.5 0.729117L11.5 0.728718L11.5 0.72832L11.5 0.727922L11.5 0.727523L11.5 0.727125L11.5 0.726726L11.5 0.726327L11.5 0.725929L11.5 0.72553L11.5 0.725131L11.5 0.724733L11.5 0.724334L11.5 0.723935L11.5 0.723536L11.5 0.723137L11.5 0.722738L11.5 0.722339L11.5 0.72194L11.5 0.721541L11.5 0.721142L11.5 0.720743L11.5 0.720344L11.5 0.719945L11.5 0.719546L11.5 0.719146L11.5 0.718747L11.5 0.718348L11.5 0.717948L11.5 0.717549L11.5 0.717149L11.5 0.71675L11.5 0.71635L11.5 0.715951L11.5 0.715551L11.5 0.715151L11.5 0.714752L11.5 0.714352L11.5 0.713952L11.5 0.713552L11.5 0.713152L11.5 0.712752L11.5 0.712686C11.4728 0.641646 11.4398 0.601009 11.3933 0.567314C11.2606 0.477334 11.0599 0.479312 10.9385 0.562808C10.892 0.596539 10.8496 0.629622 10.8124 0.662319L6.43668 4.50087L6.12015 4.14005L6.43668 4.50087C6.45898 4.4813 6.35887 4.58257 6.24201 4.65946L5.82635 4.93294L5.55084 4.51862C5.54079 4.50351 5.53244 4.48968 5.52579 4.47815C5.52369 4.47451 5.52169 4.47098 5.51982 4.46763C4.80043 3.83518 4.08022 3.20338 3.35977 2.57138L3.35929 2.57096C2.62327 1.92529 1.887 1.2794 1.15153 0.632758L1.48168 0.257257ZM1.48168 0.257257C1.22214 0.0295716 0.922659 -0.0579998 0.563286 0.0412478C0.040864 0.1872 -0.172097 0.776848 0.157328 1.16216L1.48168 0.257257Z"
                                fill="#161B3D" stroke="white"/>
                        </svg>

                    </span>
                  </div>
              </div>
            <span>
              @guest('web')
                <a href="{{ route('student.login') }}" class="">{{ __('translate.Login') }}</a> /
                <a href="{{ route('student.register') }}" class="">{{ __('translate.Register') }}</a>
                @else
                <a href="{{ Auth::guard('web')->user()->is_seller == 1 ? route('instructor.dashboard') : route('student.dashboard') }}" class="">{{ __('translate.Dashboard') }}</a>
              @endguest

            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="td_main_header">
      <div class="container">
        <div class="td_main_header_in">
          <div class="td_main_header_left">
            <a class="td_site_branding" href="{{ route('home') }}">
              <img src="{{ asset($general_setting->logo) }}" alt="Logo">
            </a>
            <div class="td_header_category_wrap position-relative">
              <button class="td_header_dropdown_btn td_medium td_heading_color">
                <span class="td_header_dropdown_btn_icon">
                    @include('svg.home2.category_square')
                </span>
                <span>{{ __('translate.All Category') }}</span>
                <span class="td_header_dropdown_btn_tobble_icon td_center">
                  <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 4.99997C9 4.99997 6.05404 1.00001 4.99997 1C3.94589 0.999991 1 5 1 5"
                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </span>
              </button>
              <ul class="td_header_dropdown_list td_mp_0">
                @foreach ($menu_categories as $menu_category)
                    <li><a href="{{ route('courses', ['category' => $menu_category->slug]) }}">{{ $menu_category?->name }}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="td_main_header_right">
            <nav class="td_nav">
              <div class="td_nav_list_wrap">
                <div class="td_nav_list_wrap_in">
                  <ul class="td_nav_list">

                    @if ($general_setting->selected_theme == 'all_theme')
                      <li class="menu-item-has-children">
                        <a href="{{ route('home') }}">{{ __('translate.Home') }}</a>
                        <ul>

                          <li>
                            <a href="{{ route('home', ['theme' => 'one']) }}"><span>{{ __('translate.Online Educations') }}</span></a
                            >
                          </li>

                          <li>
                            <a href="{{ route('home', ['theme' => 'two']) }}" ><span>{{ __('translate.Education') }}</span></a
                            >
                          </li>

                          <li>
                            <a href="{{ route('home', ['theme' => 'three']) }}" ><span>{{ __('translate.KinderGarden') }}</span></a
                            >
                          </li>

                          <li>
                            <a href="{{ route('home', ['theme' => 'four']) }}" ><span>{{ __('translate.University') }}</span></a
                            >
                          </li>

                        </ul>
                      </li>
                    @else
                      <li><a href="{{ route('home') }}">{{ __('translate.Home') }}</a></li>
                    @endif


                    @if ($general_setting->course_theme == 'with_sidebar')
                      <li><a href="{{ route('courses', ['page_view' => 'sidebar_grid_view']) }}">{{ __('translate.Courses') }}</a></li>
                    @elseif ($general_setting->course_theme == 'without_sidebar')
                      <li><a href="{{ route('courses', ['page_view' => 'grid']) }}">{{ __('translate.Courses') }}</a></li>
                    @else
                      <li class="menu-item-has-children">
                        <a href="{{ route('courses') }}">{{ __('translate.Courses') }}</a>
                        <ul>
                          <li><a href="{{ route('courses', ['page_view' => 'grid']) }}">{{ __('translate.Courses Grid View') }}</a></li>
                          <li><a href="{{ route('courses', ['page_view' => 'list']) }}">{{ __('translate.Courses List View') }}</a></li>
                          <li><a href="{{ route('courses', ['page_view' => 'sidebar_grid_view']) }}">{{ __('translate.Courses Grid With Sidebar') }}</a></li>
                        </ul>
                      </li>
                    @endif

                    <li><a href="{{ route('instructors') }}">{{ __('translate.Instructors') }}</a></li>


                    @if ($general_setting->blog_theme == 'with_sidebar')
                    <li><a href="{{ route('blogs', ['page_view' => 'blogs_with_sidebar']) }}">{{ __('translate.Blogs') }}</a></li>
                    @elseif ($general_setting->blog_theme == 'without_sidebar')
                    <li><a href="{{ route('blogs') }}">{{ __('translate.Blogs') }}</a></li>
                    @else
                    <li class="menu-item-has-children">
                      <a href="javascript:;">{{ __('translate.Blogs') }}</a>
                      <ul>
                        <li><a href="{{ route('blogs') }}">{{ __('translate.Blogs') }}</a></li>
                        <li><a href="{{ route('blogs', ['page_view' => 'blogs_with_sidebar']) }}">{{ __('translate.Blog With Sidebar') }}</a></li>
                      </ul>
                    </li>
                    @endif

                    <li class="menu-item-has-children">
                      <a href="javascript:;">{{ __('translate.Pages') }}</a>
                      <ul>
                        <li><a href="{{ route('about-us') }}">{{ __('translate.About Us') }}</a></li>
                        <li><a href="{{ route('privacy-policy') }}"  >{{ __('translate.Privacy Policy') }}</a> </li>
                        <li><a href="{{ route('terms-conditions') }}">{{ __('translate.Terms & Conditions') }}</a></li>
                        <li><a href="{{ route('faq') }}">{{ __('translate.FAQ') }}</a></li>
                        @foreach ($custom_pages as $custom_page)
                          <li><a href="{{ route('custom-page', $custom_page->slug) }}">{{ $custom_page->page_name }}</a> </li>
                        @endforeach

                      </ul>
                    </li>


                    <li><a href="{{ route('contact-us') }}">{{ __('translate.Contact Us') }}</a></li>

                  </ul>
                </div>
                  <div class="top_bar-curr-lang-wrapper mt-4">
                      <div class="curr-wrapper">
                                <span>
                                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="10.5" cy="10.5" r="8.75" stroke="#000" stroke-width="1.5"/>
                                            <path
                                                d="M12.25 8.75C12.25 7.7835 11.4665 7 10.5 7C9.5335 7 8.75 7.7835 8.75 8.75C8.75 9.7165 9.5335 10.5 10.5 10.5"
                                                stroke="#000" stroke-width="1.5" stroke-linecap="round"/>
                                            <path
                                                d="M10.5 10.5C11.4665 10.5 12.25 11.2835 12.25 12.25C12.25 13.2165 11.4665 14 10.5 14C9.5335 14 8.75 13.2165 8.75 12.25"
                                                stroke="#000" stroke-width="1.5" stroke-linecap="round"/>
                                            <path d="M10.5 5.6875V7" stroke="#000" stroke-width="1.5"
                                                  stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M10.5 14V15.3125" stroke="#000" stroke-width="1.5"
                                                  stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                    </svg>

                                </span>
                                <select class="curr-select currency_code"  name="currency_code">
                                    @foreach ($currency_list as $currency_item)
                                        <option {{ Session::get('currency_code') == $currency_item->currency_code ? 'selected' : '' }} value="{{ $currency_item->currency_code }}">{{ $currency_item->currency_name }}</option>
                                    @endforeach
                                </select>
                          <span>
                                     <svg width="12" height="6" viewBox="0 0 12 6"
                                          fill="none"
                                          xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.48168 0.257257L1.15195 0.633128C1.0082 0.507022 0.880234 0.47264 0.6972 0.522982C0.591592 0.552689 0.533228 0.620723 0.511034 0.682062C0.489915 0.740432 0.498794 0.79213 0.537367 0.837247L0.537391 0.837227L0.540943 0.841477C0.554654 0.857879 0.574305 0.877369 0.617194 0.917969C1.18107 1.41263 1.74445 1.90717 2.30763 2.40154C3.43758 3.39343 4.56675 4.38463 5.6976 5.37472L5.69797 5.37504C5.85925 5.51653 6.03253 5.53326 6.19983 5.44822L6.20061 5.44782C6.22486 5.43555 6.25952 5.41023 6.32959 5.34876C6.74121 4.98767 7.1527 4.62651 7.5642 4.26535C8.79869 3.18185 10.0332 2.09833 11.2713 1.01657C11.4176 0.888233 11.4756 0.817164 11.5 0.763333L11.5 0.763256L11.5 0.76286L11.5 0.762465L11.5 0.762069L11.5 0.761673L11.5 0.761277L11.5 0.760881L11.5 0.760485L11.5 0.760089L11.5 0.759694L11.5 0.759298L11.5 0.758901L11.5 0.758505L11.5 0.758109L11.5 0.757713L11.5 0.757317L11.5 0.756921L11.5 0.756525L11.5 0.756129L11.5 0.755732L11.5 0.755336L11.5 0.75494L11.5 0.754544L11.5 0.754147L11.5 0.753751L11.5 0.753355L11.5 0.752958L11.5 0.752562L11.5 0.752165L11.5 0.751769L11.5 0.751372L11.5 0.750976L11.5 0.750579L11.5 0.750182L11.5 0.749786L11.5 0.749389L11.5 0.748992L11.5 0.748596L11.5 0.748199L11.5 0.747802L11.5 0.747405L11.5 0.747008L11.5 0.746612L11.5 0.746215L11.5 0.745818L11.5 0.745421L11.5 0.745024L11.5 0.744627L11.5 0.74423L11.5 0.743832L11.5 0.743435L11.5 0.743038L11.5 0.742641L11.5 0.742244L11.5 0.741847L11.5 0.741449L11.5 0.741052L11.5 0.740655L11.5 0.740257L11.5 0.73986L11.5 0.739462L11.5 0.739065L11.5 0.738667L11.5 0.73827L11.5 0.737872L11.5 0.737475L11.5 0.737077L11.5 0.736679L11.5 0.736282L11.5 0.735884L11.5 0.735486L11.5 0.735088L11.5 0.73469L11.5 0.734292L11.5 0.733895L11.5 0.733497L11.5 0.733099L11.5 0.732701L11.5 0.732303L11.5 0.731904L11.5 0.731506L11.5 0.731108L11.5 0.73071L11.5 0.730312L11.5 0.729913L11.5 0.729515L11.5 0.729117L11.5 0.728718L11.5 0.72832L11.5 0.727922L11.5 0.727523L11.5 0.727125L11.5 0.726726L11.5 0.726327L11.5 0.725929L11.5 0.72553L11.5 0.725131L11.5 0.724733L11.5 0.724334L11.5 0.723935L11.5 0.723536L11.5 0.723137L11.5 0.722738L11.5 0.722339L11.5 0.72194L11.5 0.721541L11.5 0.721142L11.5 0.720743L11.5 0.720344L11.5 0.719945L11.5 0.719546L11.5 0.719146L11.5 0.718747L11.5 0.718348L11.5 0.717948L11.5 0.717549L11.5 0.717149L11.5 0.71675L11.5 0.71635L11.5 0.715951L11.5 0.715551L11.5 0.715151L11.5 0.714752L11.5 0.714352L11.5 0.713952L11.5 0.713552L11.5 0.713152L11.5 0.712752L11.5 0.712686C11.4728 0.641646 11.4398 0.601009 11.3933 0.567314C11.2606 0.477334 11.0599 0.479312 10.9385 0.562808C10.892 0.596539 10.8496 0.629622 10.8124 0.662319L6.43668 4.50087L6.12015 4.14005L6.43668 4.50087C6.45898 4.4813 6.35887 4.58257 6.24201 4.65946L5.82635 4.93294L5.55084 4.51862C5.54079 4.50351 5.53244 4.48968 5.52579 4.47815C5.52369 4.47451 5.52169 4.47098 5.51982 4.46763C4.80043 3.83518 4.08022 3.20338 3.35977 2.57138L3.35929 2.57096C2.62327 1.92529 1.887 1.2794 1.15153 0.632758L1.48168 0.257257ZM1.48168 0.257257C1.22214 0.0295716 0.922659 -0.0579998 0.563286 0.0412478C0.040864 0.1872 -0.172097 0.776848 0.157328 1.16216L1.48168 0.257257Z"
                                                fill="#161B3D" stroke="#000"/>
                                        </svg>

                                 </span>
                      </div>
                      <div class="separator">|</div>
                      <div class="lang-wrapper">
                                 <span>
                                   <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <ellipse cx="9.5" cy="9.5" rx="3.5" ry="8.75" stroke="#000" stroke-width="1.5"/>
                                        <path d="M18.2466 9.25547C16.6696 10.5514 13.3455 11.4444 9.5 11.4444C5.65447 11.4444 2.33041 10.5514 0.753351 9.25547M18.2466 9.25547C18.1172 4.53604 14.2507 0.75 9.5 0.75C4.74928 0.75 0.882847 4.53604 0.753351 9.25547M18.2466 9.25547C18.2489 9.33671 18.25 9.41822 18.25 9.5C18.25 14.3325 14.3325 18.25 9.5 18.25C4.66751 18.25 0.75 14.3325 0.75 9.5C0.75 9.41822 0.751122 9.33671 0.753351 9.25547" stroke="#000" stroke-width="1.5"/>
                                   </svg>
                                </span>
                                <select class="lang-select language_code" name="lang_code">
                                    @foreach ($language_list as $language_item)
                                        <option {{ Session::get('front_lang') == $language_item->lang_code ? 'selected' : '' }} value="{{ $language_item->lang_code }}">{{ $language_item->lang_name }}</option>
                                    @endforeach

                                </select>
                          <span>
                                     <svg width="12" height="6" viewBox="0 0 12 6"
                                          fill="none"
                                          xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.48168 0.257257L1.15195 0.633128C1.0082 0.507022 0.880234 0.47264 0.6972 0.522982C0.591592 0.552689 0.533228 0.620723 0.511034 0.682062C0.489915 0.740432 0.498794 0.79213 0.537367 0.837247L0.537391 0.837227L0.540943 0.841477C0.554654 0.857879 0.574305 0.877369 0.617194 0.917969C1.18107 1.41263 1.74445 1.90717 2.30763 2.40154C3.43758 3.39343 4.56675 4.38463 5.6976 5.37472L5.69797 5.37504C5.85925 5.51653 6.03253 5.53326 6.19983 5.44822L6.20061 5.44782C6.22486 5.43555 6.25952 5.41023 6.32959 5.34876C6.74121 4.98767 7.1527 4.62651 7.5642 4.26535C8.79869 3.18185 10.0332 2.09833 11.2713 1.01657C11.4176 0.888233 11.4756 0.817164 11.5 0.763333L11.5 0.763256L11.5 0.76286L11.5 0.762465L11.5 0.762069L11.5 0.761673L11.5 0.761277L11.5 0.760881L11.5 0.760485L11.5 0.760089L11.5 0.759694L11.5 0.759298L11.5 0.758901L11.5 0.758505L11.5 0.758109L11.5 0.757713L11.5 0.757317L11.5 0.756921L11.5 0.756525L11.5 0.756129L11.5 0.755732L11.5 0.755336L11.5 0.75494L11.5 0.754544L11.5 0.754147L11.5 0.753751L11.5 0.753355L11.5 0.752958L11.5 0.752562L11.5 0.752165L11.5 0.751769L11.5 0.751372L11.5 0.750976L11.5 0.750579L11.5 0.750182L11.5 0.749786L11.5 0.749389L11.5 0.748992L11.5 0.748596L11.5 0.748199L11.5 0.747802L11.5 0.747405L11.5 0.747008L11.5 0.746612L11.5 0.746215L11.5 0.745818L11.5 0.745421L11.5 0.745024L11.5 0.744627L11.5 0.74423L11.5 0.743832L11.5 0.743435L11.5 0.743038L11.5 0.742641L11.5 0.742244L11.5 0.741847L11.5 0.741449L11.5 0.741052L11.5 0.740655L11.5 0.740257L11.5 0.73986L11.5 0.739462L11.5 0.739065L11.5 0.738667L11.5 0.73827L11.5 0.737872L11.5 0.737475L11.5 0.737077L11.5 0.736679L11.5 0.736282L11.5 0.735884L11.5 0.735486L11.5 0.735088L11.5 0.73469L11.5 0.734292L11.5 0.733895L11.5 0.733497L11.5 0.733099L11.5 0.732701L11.5 0.732303L11.5 0.731904L11.5 0.731506L11.5 0.731108L11.5 0.73071L11.5 0.730312L11.5 0.729913L11.5 0.729515L11.5 0.729117L11.5 0.728718L11.5 0.72832L11.5 0.727922L11.5 0.727523L11.5 0.727125L11.5 0.726726L11.5 0.726327L11.5 0.725929L11.5 0.72553L11.5 0.725131L11.5 0.724733L11.5 0.724334L11.5 0.723935L11.5 0.723536L11.5 0.723137L11.5 0.722738L11.5 0.722339L11.5 0.72194L11.5 0.721541L11.5 0.721142L11.5 0.720743L11.5 0.720344L11.5 0.719945L11.5 0.719546L11.5 0.719146L11.5 0.718747L11.5 0.718348L11.5 0.717948L11.5 0.717549L11.5 0.717149L11.5 0.71675L11.5 0.71635L11.5 0.715951L11.5 0.715551L11.5 0.715151L11.5 0.714752L11.5 0.714352L11.5 0.713952L11.5 0.713552L11.5 0.713152L11.5 0.712752L11.5 0.712686C11.4728 0.641646 11.4398 0.601009 11.3933 0.567314C11.2606 0.477334 11.0599 0.479312 10.9385 0.562808C10.892 0.596539 10.8496 0.629622 10.8124 0.662319L6.43668 4.50087L6.12015 4.14005L6.43668 4.50087C6.45898 4.4813 6.35887 4.58257 6.24201 4.65946L5.82635 4.93294L5.55084 4.51862C5.54079 4.50351 5.53244 4.48968 5.52579 4.47815C5.52369 4.47451 5.52169 4.47098 5.51982 4.46763C4.80043 3.83518 4.08022 3.20338 3.35977 2.57138L3.35929 2.57096C2.62327 1.92529 1.887 1.2794 1.15153 0.632758L1.48168 0.257257ZM1.48168 0.257257C1.22214 0.0295716 0.922659 -0.0579998 0.563286 0.0412478C0.040864 0.1872 -0.172097 0.776848 0.157328 1.16216L1.48168 0.257257Z"
                                                fill="#000" stroke="#000"/>
                                        </svg>

                                 </span>
                      </div>
                  </div>
              </div>
            </nav>
            <div class="td_hero_icon_btns position-relative">
              <div class="position-relative">
                  <div class="edc-searchbar-clickaway td_search_tobble_btn"></div>
                <button class="td_circle_btn td_center td_search_tobble_btn" type="button">
                    <span class="d-inline-flex">
                        @include('svg.search_menu')
                    </span>
                </button>
                <div class="td_header_search_wrap">
                  <form action="{{ route('courses') }}" class="td_header_search">
                    <input type="text" class="td_header_search_input" name="search" placeholder="{{ __('translate.Search Course') }}">
                    <button class="td_header_search_btn td_center">
                        <span class="d-inline-flex">
                            @include('svg.search_menu')
                        </span>
                    </button>
                  </form>
                </div>
              </div>
              <a class="td_circle_btn td_center td_wishlist_btn" href="{{ route('student.wishlist.index') }}">
                <span class="d-inline-flex">
                    @include('svg.menu_heart')
                </span>
                <span class="td_circle_btn_label" id="total_wishlist">{{ count($wishlist_array ?? []) }}</span>
              </a>
              <a class="td_circle_btn td_center" href="{{ route('carts') }}">
                <span class="d-inline-flex">
                    @include('svg.menu_cart')
                </span>
                @php
                  $carts = session()->get('cart', []);
                @endphp
                <span class="td_circle_btn_label" id="total_cart">{{ count($carts) }}</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End Header Section -->

  @yield('front-content')



  <!-- Start Footer Section -->
  <footer class="td_footer td_style_1 td_type_3 td_color_4">
    <div class="container">
      <h3 class="td_fs_64 td_white_color mb-0">{{ __('translate.Let’s Connect') }}</h3>
      <div class="td_footer_row">
        <div class="td_footer_col">
          <div class="td_footer_widget">
            <h2 class="td_footer_widget_title td_fs_32 td_white_color td_medium td_mb_30">{{ __('translate.Navigate') }}</h2>
            <ul class="td_footer_widget_menu">
              <li><a href="{{ route('home') }}">{{ __('translate.Home') }}</a></li>
              <li><a href="{{ route('about-us') }}">{{ __('translate.About') }}</a></li>
              <li><a href="{{ route('contact-us') }}">{{ __('translate.Contact') }}</a></li>
              <li><a href="{{ route('faq') }}">{{ __('translate.FAQ') }}</a></li>
              <li><a href="{{ route('terms-conditions') }}">{{ __('translate.Terms & Conditions') }}</a></li>
              <li><a href="{{ route('privacy-policy') }}">{{ __('translate.Privacy Policy') }}</a></li>
            </ul>
          </div>
        </div>
        <div class="td_footer_col">
          <div class="td_footer_widget">
            <h2 class="td_footer_widget_title td_fs_32 td_white_color td_medium td_mb_30">{{ __('translate.Categories') }}</h2>
            <ul class="td_footer_widget_menu">
              @foreach ($menu_categories->take(6) as $menu_category)
                    <li><a href="{{ route('courses', ['category' => $menu_category->slug]) }}">{{ $menu_category?->name }}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="td_footer_col">
          <div class="td_footer_widget">
            <h2 class="td_footer_widget_title td_fs_32 td_white_color td_medium td_mb_30">{{ __('translate.Subscribe Now') }}</h2>
            <div class="td_newsletter td_style_1">
              <p class="td_mb_20 td_opacity_7">{{ __('translate.Far far away, behind the word mountains, far from the Consonantia') }}</p>
              <form action="{{ route('store-newsletter') }}" method="POST" class="td_newsletter_form">
                @csrf
                <input type="email" class="td_newsletter_input" placeholder="{{ __('translate.Email address') }}" name="email">
                <button type="submit" class="td_btn td_style_1 td_radius_30 td_medium">
                  <span class="td_btn_in td_white_color td_accent_bg">
                    <span>{{ __('translate.Subscribe') }}</span>
                  </span>
                </button>
              </form>
            </div>
          </div>
        </div>
        <div class="td_footer_col">
          <div class="td_footer_widget">
            <div class="td_footer_address_widget_wrap">
              <ul class="td_footer_address_widget td_medium td_mp_0">
                <li><i class="fa-solid fa-phone-volume"></i><a href="tel:{{ $footer->phone }}">{{ $footer->phone }}</a></li>
                <li><i class="fa-solid fa-envelope"></i><a
                    href="mailto:{{ $footer->email }}">{{ $footer->email }}</a></li>
                <li><i class="fa-solid fa-location-dot"></i>{{ $footer->address }}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="td_footer_bottom td_fs_18">
      <div class="container">
        <div class="td_footer_bottom_in">
          <p class="td_copyright mb-0">{{ $footer->copyright }}</p>
          <div class="td_footer_logo">
            <img src="{{ asset($general_setting->logo) }}" alt="Logo">
          </div>
          <div class="td_footer_social_btns td_fs_20">
            <a target="_blank" href="{{ $footer->facebook }}" class="td_center">
              <i class="fa-brands fa-facebook-f"></i>
            </a>
            <a target="_blank" href="{{ $footer->twitter }}" class="td_center">
                <i class="fa-brands fa-x-twitter"></i>
              </a>
              <a target="_blank" href="{{ $footer->instagram }}" class="td_center">
                <i class="fa-brands fa-instagram"></i>
              </a>
              <a target="_blank" href="{{ $footer->linkedin }}" class="td_center">
                <i class="fa-brands fa-linkedin"></i>
              </a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- End Footer Section -->
  <!-- Start Scroll Up Button -->
  <div class="td_scrollup">
    <i class="fa-solid fa-arrow-up"></i>
  </div>
  <!-- End Scroll Up Button -->





  @if ($general_setting->tawk_status == 1)
        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src='{{ $general_setting->tawk_chat_link }}';
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
    @endif



    @if ($general_setting->cookie_consent_status == 1)
        <!-- common-modal start  -->
        <div class="common-modal cookie_consent_modal d-none bg-white" >
            <button type="button" class="btn-close cookie_consent_close_btn" aria-label="Close"></button>

            <h5>{{ __('translate.Cookies') }}</h5>
            <p>{{ $general_setting->cookie_consent_message }}</p>
            <a href="javascript:;" class="td_btn td_style_1 td_type_3 td_radius_30 td_medium td_fs_14 report-modal-btn cookie_consent_accept_btn">
                                        <span class="td_btn_in td_accent_color">
                                        <span>{{ __('translate.Accept') }}</span>
                                        </span>
                                    </a>

        </div>
        <!-- common-modal end  -->
    @endif


  <!-- Script -->
  <script src="{{ asset('global/js/jquery-3.7.1.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/jquery.slick.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/odometer.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/gsap.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

  <script src="{{ asset('global/toastr/toastr.min.js') }}"></script>

    <script>
        (function($) {
            "use strict"
            $(document).ready(function () {

                const session_notify_message = @json(Session::get('message'));
                const demo_mode_message = @json(Session::get('demo_mode'));
                
                if(session_notify_message != null){
                    const session_notify_type = @json(Session::get('alert-type', 'info'));
                    switch (session_notify_type) {
                        case 'info':
                            toastr.info(session_notify_message);
                            break;
                        case 'success':
                            toastr.success(session_notify_message);
                            break;
                        case 'warning':
                            toastr.warning(session_notify_message);
                            break;
                        case 'error':
                            toastr.error(session_notify_message);
                            break;
                    }
                }

                if(demo_mode_message != null){
                    toastr.warning("{{ __('translate.All Language keywords are not implemented in the demo mode') }}");
                    toastr.info("{{ __('translate.Admin can translate every word from the admin panel') }}");
                }

                const validation_errors = @json($errors->all());
                
                if (validation_errors.length > 0) {
                    validation_errors.forEach(error => toastr.error(error));
                }

                if (localStorage.getItem('educve-cookie') != '1') {
                    $('.cookie_consent_modal').removeClass('d-none');
                }

                $('.cookie_consent_close_btn').on('click', function(){
                    $('.cookie_consent_modal').addClass('d-none');
                });

                $('.cookie_consent_accept_btn').on('click',function() {
                    localStorage.setItem('educve-cookie','1');
                    $('.cookie_consent_modal').addClass('d-none');
                });

                $('.before_auth_wishlist').on("click", function(){
                    toastr.error("{{ __('translate.Please login first') }}")
                });

                $(".currency_code").on('change', function () {
                    var currency_code = $(this).val();

                    window.location.href = "{{ route('currency-switcher') }}" + "?currency_code=" + currency_code;
                });

                $(".language_code").on('change', function () {
                    var language_code = $(this).val();

                    window.location.href = "{{ route('language-switcher') }}" + "?lang_code=" + language_code;
                });

            });
        })(jQuery);

    </script>

    @stack('js_section')


</body>

</html>
