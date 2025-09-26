@extends('admin.master_layout')
@section('title')
    <title>{{ $page_title }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ $page_title }}</h3>
    <p class="crancy-header__text">{{ __('translate.Frontend Section') }} >> {{ $page_title }}</p>
@endsection

@section('body-content')
    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show language_box">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12 mg-top-30">
                                    <!-- Product Card -->
                                    <div class="crancy-product-card translation_main_box">

                                        <div class="crancy-customer-filter">
                                            <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch">
                                                <div class="crancy-header__form crancy-header__form--customer">
                                                    <h4 class="crancy-product-card__title">{{ __('translate.Switch to language translation') }}</h4>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="translation_box">
                                            <ul >
                                                @foreach ($language_list as $language)
                                                    <li><a href="{{ route('admin.front-end.section', ['id'=> $key,'lang_code' => $language->lang_code] ) }}">
                                                            @if (request()->get('lang_code') == $language->lang_code)
                                                                <i class="fas fa-eye"></i>
                                                            @else
                                                                <i class="fas fa-edit"></i>
                                                            @endif

                                                            {{ $language->lang_name }}</a></li>
                                                @endforeach
                                            </ul>

                                            <div class="alert alert-secondary" role="alert">

                                                @php
                                                    $edited_language = $language_list->where('lang_code', request()->get('lang_code'))->first();
                                                @endphp

                                                <p>{{ __('translate.Your editing mode') }} : <b>{{ $edited_language->lang_name }}</b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- End crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <div class="crancy-product-card mg-top-30">


                                <form action="{{ route('admin.front-end.store', ['key' => $key, 'id' => $frontend->id ?? null]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="type" value="{{ $contentType }}">
                                    <input type="hidden" name="lang_code" value="{{ request()->get('lang_code') }}">

                                    <div class="row">
                                        @if($lang_code === 'en' && $imageCount > 0)
                                            <div class="col-md-3 pr-md-4">
                                                @if($content)
                                                    @foreach($content as $field => $value)
                                                        @if($field === 'images' && $imageCount > 0)
                                                            @foreach($value as $imageKey => $imageDetails)

                                                            @php
                                                                $existingImagePath = $dataValues['images'][$imageKey] ?? null;
                                                            @endphp

                                                            <div class="crancy__item-form--group @if (!$loop->first) mg-top-25 @endif w-100">
                                                                <label for="{{ $imageKey }}">
                                                                    {{ str_replace('_', ' ', ucfirst($imageKey)) }}

                                                                    <span data-toggle="tooltip" data-placement="top" class="fa fa-info-circle text--primary" title="@if(isset($imageDetails['size']))
                                                                        ({{ __('translate.Recommended image size') }}:  {{ $imageDetails['size'] }})
                                                                    @endif">
                                                                </label>

                                                                <div class="crancy-product-card__upload crancy-product-card__upload--border">

                                                                    <input
                                                                        type="file"
                                                                        id="{{ $imageKey }}"
                                                                        name="{{ $imageKey }}"
                                                                        class="custom-file-input d-none"
                                                                        accept="image/jpeg,image/png,image/gif,image/webp"
                                                                        onchange="previewImage(event, '{{ $imageKey }}')"
                                                                    >

                                                                    <label class="crancy-image-video-upload__label" for="{{ $imageKey }}">
                                                                        <img id="view_img_{{ $imageKey }}" src="{{ asset($existingImagePath) }}">
                                                                        <h4 class="crancy-image-video-upload__title">{{ __('translate.Click here to') }} <span class="crancy-primary-color">{{ __('translate.Choose File') }}</span> {{ __('translate.and upload') }} </h4>
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        @endif

                                        <div class="{{ $lang_code === 'en' && $imageCount > 0 ? 'col-md-9 pl-md-4 ' : 'col-12' }}">
                                            @if($content)
                                                @foreach($content as $field => $value)
                                                    @if($field !== 'images')
                                                        @if(is_array($value))
                                                            @foreach($value as $subField => $subValue)
                                                                <div class="form-group crancy__item-form--group @if (!$loop->first) mg-top-form-20 @endif">
                                                                    <label for="{{ $field }}_{{ $subField }}" class="crancy__item-label">
                                                                        {{ str_replace('_', ' ', ucfirst($field)) }} - {{ str_replace('_', ' ', ucfirst($subField)) }}


                                                                    </label>
                                                                    <input
                                                                        type="text"
                                                                        id="{{ $field }}_{{ $subField }}"
                                                                        name="{{ $field }}[{{ $subField }}]"
                                                                        class="crancy__item-input"
                                                                        value="{{ $dataValues[$field][$subField] ?? (is_scalar($subValue) ? $subValue : json_encode($subValue)) }}"
                                                                    >
                                                                </div>
                                                            @endforeach
                                                        @else
                                                            <div class="col-12">
                                                                <div class="crancy__item-form--group @if (!$loop->first) mg-top-form-20 @endif">
                                                                    <label for="{{ $field }}" class="crancy__item-label">{{ str_replace('_', ' ', ucfirst($field)) }}


                                                                        @php
                                                                            $colorfull = trans('translate.For highlight title, write the title inside <span>highlight</span> tag')
                                                                        @endphp

                                                                        @if ($key == 'main_demo_hero' && $field == 'heading')
                                                                            <code>({{ $colorfull }})</code>
                                                                        @elseif (($key == 'home1_join_instructor' && $field == 'first_item_title') || ($key == 'home1_join_instructor' && $field == 'second_item_title'))
                                                                            <code>({{ $colorfull }})</code>
                                                                        @elseif ($key == 'home4_hero' && $field == 'title')
                                                                            <code>({{ $colorfull }})</code>
                                                                        @endif

                                                                    </label>
                                                                    <input
                                                                        type="text"
                                                                        id="{{ $field }}"
                                                                        name="{{ $field }}"
                                                                        class="crancy__item-input"
                                                                        value="{{ $dataValues[$field] ?? $value }}"
                                                                    >
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @else
                                                <p>{{ __('translate.Nothing to display') }}</p>
                                            @endif

                                            <button type="submit" class="crancy-btn mg-top-25">{{ __('translate.Update') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


@push('style_section')

    <style>
        .crancy-product-card__upload--border img{
            max-height: 200px !important;
        }
    </style>

@endpush
@push('js_section')

<script>
    "use strict";

    function previewImage(event, target_view_id) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById(`view_img_${target_view_id}`);

                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

</script>
@endpush
