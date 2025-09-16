@extends('layout_inner_page')

@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection

@section('front-content')

  @include('breadcrumb')

    <!-- Start Contact Section -->
    <section>
      <div class="td_height_100 td_height_lg_50"></div>
      <div class="container">
        <div class="row">
          <div class="col-xxl-10 offset-xxl-1">
            <div class="row align-items-center td_gap_y_40">
              <div class="col-lg-7">
                  <div class="contact_modal contact_modal_page">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">{{ __('translate.Get In Touch') }}</h5>

                          </div>
                          <div class="modal-body">
                              <form class="contact_modal_form" action="{{ route('store-contact-message') }}" method="POST">
                                  @csrf

                                  <div class="contact_modal_form_item">
                                      <div class="contact_modal_form_inner">
                                        <input type="hidden" name="instructor_id" value="0">
                                          <input type="text" class="form-control"
                                                 placeholder="{{ __('translate.Full Name') }} *" name="name" value="{{ html_decode(old('name')) }}">
                                      </div>
                                      <div class="contact_modal_form_inner">
                                          <input type="text" class="form-control"
                                                 placeholder="{{ __('translate.Phone') }}" name="phone" value="{{ html_decode(old('phone')) }}">
                                      </div>
                                  </div>
                                  <div class="contact_modal_form_item">
                                      <div class="contact_modal_form_inner">
                                          <input type="email" class="form-control"
                                                 placeholder="{{ __('translate.Email') }}  *" name="email" value="{{ html_decode(old('email')) }}">
                                      </div>
                                      <div class="contact_modal_form_inner">
                                          <input type="text" class="form-control"
                                                 placeholder="{{ __('translate.Subject') }} *" name="subject" value="{{ html_decode(old('subject')) }}">
                                      </div>
                                  </div>
                                  <div class="contact_modal_form_item">
                                      <div class="contact_modal_form_inner">
                                <textarea class="form-control" placeholder="{{ __('translate.Message') }} *"
                                          rows="5" name="message">{{ html_decode(old('message')) }}</textarea>
                                      </div>
                                  </div>

                                  @if($general_setting->recaptcha_status==1)
                                      <div class="contact_modal_form_item">
                                          <div class="g-recaptcha" data-sitekey="{{ $general_setting->recaptcha_site_key }}"></div>
                                      </div>
                                  @endif

                                  <div class="contact_modal_form_item">
                                      <button type="submit" class="td_btn td_style_1 td_radius_30 td_medium td_with_shadow">
                                <span class="td_btn_in td_white_color td_accent_bg">
                                    <span>{{ __('translate.Send Message') }}</span>
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
                                      </button>

                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-4 offset-xl-1 col-lg-5">
                <div class="td_contact_info">
                  <div class="td_section_heading td_style_2 td_mb_20">
                    <h2 class="td_contact_info_title td_fs_36 mb-0">{{ __('translate.Our Office Address') }}</h2>
                  </div>
                  <div class="td_mb_40">
                    <h2 class="td_fs_24 td_semibold td_mb_20">{{ $contact_us->compus_one }}</h2>
                    <p class="td_fs_18 td_heading_color td_medium td_mb_10">{{ $contact_us->address }}</p>
                    <p class="td_fs_18 td_heading_color td_medium td_mb_10 td_opacity_7">
                      <a href="tel:{{ $contact_us->phone }}">{{ $contact_us->phone }}</a>
                    </p>
                    <p class="td_fs_18 td_heading_color td_medium mb-0 td_opacity_7">
                      <a href="mailto:{{ $contact_us->email }}">{{ $contact_us->email }}</a>
                    </p>
                  </div>
                  <div>
                    <h2 class="td_fs_24 td_semibold td_mb_20">{{ $contact_us->compus_two }}</h2>
                    <p class="td_fs_18 td_heading_color td_medium td_mb_10">{{ $contact_us->compus_two }}</p>
                    <p class="td_fs_18 td_heading_color td_medium td_mb_10 td_opacity_7">
                      <a href="tel:{{ $contact_us->phone2 }}">{{ $contact_us->phone2 }}</a>
                    </p>
                    <p class="td_fs_18 td_heading_color td_medium mb-0 td_opacity_7">
                      <a href="mailto:{{ $contact_us->email2 }}">{{ $contact_us->email2 }}</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="td_height_100 td_height_lg_50"></div>
      <div class="td_map">
        <iframe id="map"
          src="{{ html_decode($contact_us->map_code) }}"
          allowfullscreen=""></iframe>
      </div>
    </section>
    <!-- End Contact Section -->


@endsection

@push('js_section')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

@endpush
