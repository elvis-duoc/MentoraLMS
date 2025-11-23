@extends('layout_inner_page')
@section('title')
<title>{{ $custom_page->page_name }}</title>
@endsection

@section('front-content')

  @include('breadcrumb')

    <section>
      <div class="td_height_100 td_height_lg_50"></div>
        <div class="container">
          <div class="row td_gap_y_50">
            <div class="col-lg-12">
              <div class="td_blog_details">

                {!! clean($custom_page->description) !!}

              </div>
            </div>

          </div>
        </div>
      <div class="td_height_100 td_height_lg_50"></div>
  </section>

@endsection


