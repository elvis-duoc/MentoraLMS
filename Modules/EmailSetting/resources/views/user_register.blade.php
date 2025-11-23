@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Edit Email Template') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Edit Email Template') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Dashboard') }} >> {{ __('translate.Edit Email Template') }}</p>
@endsection

@section('body-content')

    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12 mg-top-30">
                                    <!-- Product Card -->
                                    <div class="crancy-product-card">

                                        <div class="crancy-customer-filter">
                                            <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch">
                                                <div class="crancy-header__form crancy-header__form--customer">
                                                    <h4 class="crancy-product-card__title">{{ __('translate.Dynamic Keyword') }}</h4>
                                                </div>
                                            </div>
                                        </div>

                                       <!-- crancy Table -->
                                        <div id="crancy-table__main_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                                            <table class="crancy-table__main crancy-table__main-v3 dataTable no-footer">
                                                <!-- crancy Table Head -->
                                                <thead class="crancy-table__head">
                                                    <tr>
                                                        <th class="crancy-table__column-1 crancy-table__h1 sorting sorting_asc">
                                                            <div class="crancy-wc__checkbox">
                                                                <span>{{ __('translate.Keyword') }}</span>
                                                            </div>
                                                        </th>

                                                        <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                            {{ __('translate.Meaning') }}
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <!-- crancy Table Body -->
                                                <tbody class="crancy-table__body">
                                                    <tr class="odd">
                                                        <td class="crancy-table__column-2 crancy-table__data-2">
                                                            <h4 class="crancy-table__product-title">
                                                                @php
                                                                    $name = "{{user_name}}";
                                                                @endphp
                                                                {{ $name }}
                                                            </h4>
                                                        </td>

                                                        <td class="crancy-table__column-2 crancy-table__data-2">
                                                            <h4 class="crancy-table__product-title">{{ __('translate.User Name') }}</h4>
                                                        </td>
                                                    </tr>

                                                    <tr class="odd">
                                                        <td class="crancy-table__column-2 crancy-table__data-2">
                                                            <h4 class="crancy-table__product-title">
                                                                @php
                                                                    $varification_link="{{varification_link}}";
                                                                @endphp
                                                                {{ $varification_link }}
                                                            </h4>
                                                        </td>

                                                        <td class="crancy-table__column-2 crancy-table__data-2">
                                                            <h4 class="crancy-table__product-title">{{ __('translate.Verification Link') }}</h4>
                                                        </td>
                                                    </tr>


                                                </tbody>
                                                <!-- End crancy Table Body -->
                                            </table>

                                        </div>
                                        <!-- End crancy Table -->

                                    </div>
                                    <!-- End Product Card -->
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

    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <form action="{{ route('admin.update-email-template', $template_item->id) }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Edit') }} {{ $template_item->name }}</h4>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Subject') }} </label>
                                                        <input class="crancy__item-input" type="text" name="subject" value="{{ $template_item->subject }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Description') }} </label>
                                                        <input class="crancy__item-input crancy__item-textarea summernote" type="text" name="description" value="{{ $template_item->description }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <button class="crancy-btn mg-top-25" type="submit">{{ __('translate.Update') }}</button>

                                        </div>
                                        <!-- End Product Card -->
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->
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
            $(document).ready(function() {
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
