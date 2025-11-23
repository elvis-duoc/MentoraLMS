@extends('student.master_layout')

@section('title')
<title>{{ __('translate.Wihslist') }}</title>
@endsection

@section('body-header')
<h3 class="crancy-header__title m-0">{{ __('translate.Wihslist') }}</h3>
<p class="crancy-header__text">{{ __('translate.Dashboard') }} >> {{ __('translate.Wihslist') }}</p>
@endsection

@section('body-content')
<!-- crancy Dashboard -->
<section class="crancy-adashboard crancy-show">
    <div class="container container__bscreen">
        <div class="row">
            <div class="col-12 mg-top-30">
                <div class="crancy-body">
                    <!-- Dashboard Inner -->
                    <div class="crancy-dsinner">
                        <div class="ed-watch-page-wrapper">
                            <div class="ed-watch-main-wrapper">
                                <div class="ed-watch-content-wrapper">
                                    <div class="ed-watch-content-main-wrapper">
                                        <div class="row">
                                            @foreach ($courses as $course)
                                                <div class="col-lg-4 col-md-6 mb-4">
                                                    <div class="d-block td_card td_radius_10 td_style_3">
                                                        @if ($course?->is_popular == 'enable')
                                                            <span class="td_card_label td_accent_bg td_white_color">{{ __('translate.Popular') }}</span>
                                                        @endif
                                                        <a href="javascript:;" class="add_to_wishlist d-block active" onclick="removeWishlist('{{ $course->id }}')">
                                                            <span class="td_cart_wishlist_icon">
                                                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M10.6803 2.51314L10.0002 3.24375L9.32017 2.51315C7.44229 0.495619 4.39763 0.495618 2.51974 2.51314C0.641857 4.53067 0.641856 7.80172 2.51974 9.81925L8.64013 16.3947C9.39128 17.2018 10.6091 17.2018 11.3603 16.3947L17.4807 9.81925C19.3586 7.80172 19.3586 4.53067 17.4807 2.51314C15.6028 0.495619 12.5581 0.495619 10.6803 2.51314Z"
                                                                        stroke="currentColor"
                                                                        stroke-linejoin="round"
                                                                    ></path>
                                                                </svg>
                                                            </span>
                                                        </a>

                                                        <a href="{{ route('course', $course->slug) }}" class="td_card_thumb">
                                                            <img src="{{ asset($course?->thumb_image) }}" alt="">
                                                        </a>

                                                        <div class="td_card_info td_white_bg">
                                                            <div class="td_card_info_in">
                                                                <ul class="td_card_meta td_mp_0 td_fs_18 td_medium td_heading_color">
                                                                    <li>
                                                                        @include('svg.course_seat')

                                                                        <span class="td_opacity_7">{{ $course->total_student }} {{ __('translate.Students') }}</span>
                                                                    </li>
                                                                    <li>

                                                                        @include('svg.course_semester')

                                                                        <span class="td_opacity_7">{{ $course->total_lesson }} {{ __('translate.Lessons') }}</span>
                                                                    </li>
                                                                </ul>
                                                                <div class="td_card_category_df td_mb_14">
                                                                    <a href="{{ route('courses', ['category' => $course?->category?->slug ?? 'slug']) }}"
                                                                        class="td_card_category td_fs_14 td_normal td_heading_color "><span>{{ $course?->category?->name }}</span>
                                                                    </a>
                                                                    <span class="td_card_price  td_fs_18 td_medium">
                                                                        @if ($course->offer_price)
                                                                            {{ currency($course->offer_price) }}
                                                                        @else
                                                                            {{ currency($course->regular_price) }}
                                                                        @endif
                                                                    </span>
                                                                </div>

                                                                <h2 class="td_card_title td_fs_24 mb-0"><a href="{{ route('course', $course->slug) }}">{{ html_decode($course?->title) }}</a></h2>
                                                                <p class="td_card_subtitle td_heading_color td_opacity_7 mb-3">
                                                                    {{ $course?->short_description }}
                                                                </p>
                                                                <div class="td_card_review">
                                                                    <div class="td_rating" data-rating="{{ $course->avg_rating }}">
                                                                        <i class="fa-regular fa-star"></i>
                                                                        <i class="fa-regular fa-star"></i>
                                                                        <i class="fa-regular fa-star"></i>
                                                                        <i class="fa-regular fa-star"></i>
                                                                        <i class="fa-regular fa-star"></i>
                                                                        <div class="td_rating_percentage">
                                                                            <i class="fa-solid fa-star fa-fw"></i>
                                                                            <i class="fa-solid fa-star fa-fw"></i>
                                                                            <i class="fa-solid fa-star fa-fw"></i>
                                                                            <i class="fa-solid fa-star fa-fw"></i>
                                                                            <i class="fa-solid fa-star fa-fw"></i>
                                                                        </div>
                                                                    </div>
                                                                    <span class="td_heading_color td_opacity_5 td_medium">({{ $course->total_rating }} {{ __('translate.Ratings') }})</span>
                                                                </div>
                                                                <div class="td_card_btn">
                                                                    <a href="javascript:;" class="td_btn td_style_1 td_radius_30 td_medium add_to_cart" data-course_id="{{ $course->id }}">
                                                                        <span class="td_btn_in td_white_color td_accent_bg">
                                                                            <span>{{ __('translate.Add to Cart') }}</span>
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <form action="{{ route('student.wishlist.destroy', $course->id) }}" class="d-none" method="post" id="remove_listing_{{ $course->id }}">
                                                    @csrf
                                                    @method('DELETE')

                                                </form>

                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Dashboard Inner -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End crancy Dashboard -->
@endsection


@push('js_section')

<script src="{{ asset('global/sweetalert/sweetalert2@11.js') }}"></script>


<script>
    "use strict";
    $(function() {

        $(".add_to_cart").on("click", function(e){

            let course_id = $(this).data('course_id');

            $.ajax({
                type : 'GET',
                url : "{{ url('add-to-card') }}" + "/" + course_id,
                success:function(response){
                    toastr.success(response.message);

                    let total_cart = $('#total_cart').html();
                    total_cart = parseInt(total_cart) + parseInt(1);
                    $('#total_cart').html(total_cart);

                },
                error:function(err){

                    if(err.status == 403){
                        toastr.error(err.responseJSON.message)
                    }else{
                        toastr.error(`{{ __('translate.Server error occured') }}`)
                    }

                }
            });

        })


    });

    function removeWishlist(id){
        Swal.fire({
            title: "{{ __('translate.Are you realy want to delete this item ?') }}",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "{{ __('translate.Yes, Delete It') }}",
            cancelButtonText: "{{ __('translate.Cancel') }}",
        }).then((result) => {
            if (result.isConfirmed) {
                $("#remove_listing_"+id).submit();
            }

        })
    }


    </script>
@endpush
