@extends('admin.master_layout')
@section('title')
<title>{{ __('translate.SEO Setup') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.SEO Setup') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Dashboard') }} >> {{ __('translate.SEO Setup') }}</p>
@endsection

@section('body-content')

<section class="crancy-adashboard crancy-show">
    <div class="container container__bscreen">
        <div class="row row__bscreen">
            <div class="col-12">
                <div class="crancy-body">
                    <!-- Dashboard Inner -->
                    <div class="crancy-dsinner">
                        <div class="crancy-personals mg-top-30">
                            <div class="row">
                                <div class="col-lg-3 col-md-2 col-12 crancy-personals__list">
                                    <div class="crancy-psidebar">
                                        <!-- Features Tab List -->
                                        <div class="list-group crancy-psidebar__list" id="list-tab" role="tablist">

                                            @foreach ($seo_setting as $index => $seo_item)
                                            <a class="list-group-item {{ $index == 0  ? 'active' : '' }}" data-bs-toggle="list" href="#id1{{ $seo_item->id }}" role="tab" aria-selected="{{ $index == 0  ? 'true' : 'false' }}">
                                                <span class="crancy-psidebar__icon">
                                                    <i class="fas fa-list    "></i>
                                                </span>
                                                <h4 class="crancy-psidebar__title">{{ $seo_item->page_name }}</h4>
                                            </a>
                                            @endforeach

                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-9 col-md-10 col-12  crancy-personals__content">
                                    <div class="crancy-ptabs">

                                        <div class="crancy-ptabs__inner">
                                            <div class="tab-content" id="nav-tabContent">
                                                <!--  Features Single Tab -->
                                                @foreach ($seo_setting as $index => $seo_item)
                                                <div class="tab-pane fade {{ $index == 0  ? 'active show' : '' }}" id="id1{{ $seo_item->id }}" role="tabpanel">
                                                    <form action="{{ route('admin.update-seo-setting',$seo_item->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="crancy-ptabs__separate">
                                                                    <div class="crancy-ptabs__form-main">
                                                                        <div class="crancy__item-group">
                                                                            <h3 class="crancy__item-group__title">{{ $seo_item->page_name }} {{ __('translate.Page') }}</h3>
                                                                            <div class="crancy__item-form--group">
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.SEO Title') }} </label>
                                                                                            <input class="crancy__item-input" type="text" value="{{ $seo_item->seo_title }}" name="seo_title">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.SEO Description') }} </label>
                                                                                            <textarea class="crancy__item-input crancy__item-textarea summernote" name="seo_description" id="" cols="30" rows="5">{{ $seo_item->seo_description }}</textarea>

                                                                                        </div>
                                                                                    </div>




                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mg-top-40">
                                                                            <button class="crancy-btn" type="submit">{{ __('translate.Update') }}</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                @endforeach
                                            </div>
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

@endsection



@push('style_section')

    <style>
        .tox .tox-promotion,
        .tox-statusbar__branding{
            display: none !important;
        }
    </style>
@endpush

@push('js_section')

    <script src="{{ asset('global/tinymce/js/tinymce/tinymce.min.js') }}"></script>


    <script>
        (function($) {
            "use strict"
            $(document).ready(function () {

                tinymce.init({
                    selector: '.summernote',
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                    tinycomments_mode: 'embedded',
                    tinycomments_author: 'Author name',
                    mergetags_list: [
                        { value: 'First.Name', title: 'First Name' },
                        { value: 'Email', title: 'Email' },
                    ]
                });


            });
        })(jQuery);

    </script>
@endpush
