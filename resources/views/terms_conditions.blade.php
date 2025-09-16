@extends('layout_inner_page')
@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection

@section('front-content')

  @include('breadcrumb')

    <section>
      <div class="td_height_100 td_height_lg_50"></div>
        <div class="container">
          <div class="row td_gap_y_50">
            <div class="col-lg-12">
              <div class="td_blog_details">

                {!! clean($terms_conditions->description) !!}

              </div>
            </div>

          </div>
        </div>
      <div class="td_height_100 td_height_lg_50"></div>
  </section>

@endsection


