@extends('layout_inner_page')

@section('title')
    <title>{{ __('translate.Sign Up') }}</title>
@endsection

@section('front-content')

  @include('breadcrumb')

    <!-- Start Signin Section -->
    <section>
        <div class="td_height_100 td_height_lg_50"></div>
        <div class="container">
          <div class="row td_gap_y_40">
            <div class="col-lg-6">
              <div class="td_sign_thumb">
                <img src="{{ asset($general_setting->login_page_bg) }}" alt="" class="w-100 td_radius_10">
              </div>
            </div>
              <div class="col-lg-6">
                  <div class="td_form_card td_style_1 td_radius_10 td_gray_bg_5">
                      <form class="td_form_card_in" method="POST" action="{{ route('student.store-register') }}">
                          @csrf
                          <h2 class="td_fs_36 td_mb_20">{{ __('translate.Sign Up') }}</h2>
                          <hr>
                          <div class="td_height_30 td_height_lg_30"></div>

                          <input type="text" class="td_form_field td_mb_30 td_medium td_white_bg" placeholder="{{ __('translate.Name') }} *" name="name" value="{{ old('name') }}">
                          <input type="email" class="td_form_field td_mb_30 td_medium td_white_bg" placeholder="{{ __('translate.Email') }} *" name="email" value="{{ old('email') }}">
                          <input type="password" class="td_form_field td_mb_30 td_medium td_white_bg" placeholder="{{ __('translate.Password') }} *" name="password">
                          <input type="password" class="td_form_field  {{ $general_setting->recaptcha_status == 1 ? 'td_mb_10' : 'td_mb_30' }} td_medium td_white_bg" placeholder="{{ __('translate.Confirm Password') }} *" name="password_confirmation">

                          @if($general_setting->recaptcha_status==1)
                              <div class="td_mb_10">
                                  <div class="g-recaptcha" data-sitekey="{{ $general_setting->recaptcha_site_key }}"></div>
                              </div>
                          @endif

                          <div class="td_form_card_bottom td_mb_25">
                             <div class="w-100">

                                 <button type="submit" class="td_btn td_style_1 td_radius_30 td_medium edc-auth-btn" >
                  <span class="td_btn_in td_white_color td_accent_bg">
                    <span>{{ __('translate.Sign Up') }}</span>
                    <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M15.1575 4.34302L3.84375 15.6567" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path d="M15.157 11.4142C15.157 11.4142 16.0887 5.2748 15.157 4.34311C14.2253 3.41142 8.08594 4.34314 8.08594 4.34314" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                  </span>
                                 </button>
                                 <div>
                                     <p class="td_form_card_text td_fs_20 td_fs_sm_16 td_medium td_heading_color mb-0 text-center mt-3">{{ __('translate.Already have an account?') }} <a
                                             href="{{ route('student.login') }}">{{ __('translate.Sign in') }}</a></p>
                                 </div>
                             </div>

                              <div class="d-flex gap-3 justify-content-center align-items-center mt-4">
                                  <div class="edc-line-sperator"></div>
                                  <p class="td_fs_20 mb-0 td_medium td_heading_color">{{ __('translate.or sign up with') }}</p>
                                  <div class="edc-line-sperator"></div>
                              </div>
                              <div class="td_form_social td_fs_20">

                                  @if ($general_setting->is_gmail == 1)
                                      <a href="{{ route('student.login-google') }}" class="td_center">
                                          <i class="fa-brands fa-google"></i>
                                      </a>
                                  @endif

                                  @if ($general_setting->is_facebook == 1)
                                      <a href="{{ route('student.login-facebook') }}" class="td_center">
                                          <i class="fa-brands fa-facebook-f"></i>
                                      </a>
                                  @endif

                              </div>
                          </div>

                      </form>
                  </div>
              </div>
          </div>
        </div>
        <div class="td_height_100 td_height_lg_50"></div>
      </section>
      <!-- End Signin Section -->

  @endsection

  @push('js_section')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  @endpush
