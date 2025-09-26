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

  <title>{{ env('APP_NAME') }} || {{ __('translate.Maintenance') }}</title>

  <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/odometer.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery-ui.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">


</head>

<body class="td_theme_2">

    @php
        $maintenance_text = Modules\GlobalSetting\App\Models\GlobalSetting::where('key', 'maintenance_text')->first();
        $maintenance_image = Modules\GlobalSetting\App\Models\GlobalSetting::where('key', 'maintenance_image')->first();
    @endphp
      <!-- Start Error Section Section -->
  <section>
    <div class="td_height_100 td_height_lg_50"></div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="courses_not_found_main">
            <div class="courses_not_found_thumb">
              <img src="{{ asset($maintenance_image->value) }}" alt="thumb">
            </div>
            <div class="courses_not_found_text">

                {!! clean(nl2br($maintenance_text->value)) !!}

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
