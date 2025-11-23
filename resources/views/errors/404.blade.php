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

  <title>{{ env('APP_NAME') }} || {{ __('translate.404') }}</title>

  <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/odometer.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery-ui.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">


</head>

<body class="td_theme_2">


      <!-- Start Error Section Section -->
  <section>
    <div class="td_height_100 td_height_lg_50"></div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="courses_not_found_main">
            <div class="courses_not_found_thumb">
              <img src="{{ asset($general_setting->error_image) }}" alt="thumb">
            </div>
            <div class="courses_not_found_text">
              <h3>{{ __('translate.Oops! Page not found') }}</h3>
              <p>
                {{ __('translate.Oops! it could be you or us, there is no page here. It might have been moved or deleted.') }}
              </p>

              <a href="{{ route('home') }}" class="td_btn td_style_1 td_radius_30 td_medium td_with_shadow">
                <span class="td_btn_in td_white_color td_accent_bg">
                  <span>{{ __('translate.Back To Home') }}</span>
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
    </div>
    <div class="td_height_100 td_height_lg_50"></div>
  </section>
  <!-- End Error Section Section -->


</body>

</html>
