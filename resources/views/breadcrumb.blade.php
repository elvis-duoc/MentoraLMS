
<section class="td_page_heading td_center td_bg_filed td_heading_bg text-center td_hobble"
data-src="{{ asset($general_setting->breadcrumb_image) }}">
<div class="container">
  <div class="td_page_heading_in">
    <h1 class="td_white_color td_fs_48 td_mb_10">{{ $breadcrumb_title }}</h1>
    <ol class="breadcrumb m-0 td_fs_20 td_opacity_8 td_semibold td_white_color">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('translate.Home') }}</a></li>
      <li class="breadcrumb-item active">{{ $breadcrumb_title }}</li>
    </ol>
  </div>
</div>
<div class="td_page_heading_shape_1 position-absolute td_hover_layer_3"></div>
<div class="td_page_heading_shape_2 position-absolute td_hover_layer_5"></div>
<span class="td_page_heading_shape_3 position-absolute">
  @include('svg.breadcrumb_shape1')
</span>
<span class="td_page_heading_shape_4 position-absolute">
    @include('svg.breadcrumb_shape1')
</span>
<span class="td_page_heading_shape_5 position-absolute">
    @include('svg.breadcrumb_shape3')
</span>
<div class="td_page_heading_shape_6 position-absolute td_hover_layer_3"></div>
</section>
<!-- End Page Heading Section -->
