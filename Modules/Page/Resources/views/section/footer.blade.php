@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Footer Information') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Footer Information') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Manage Content') }} >> {{ __('translate.Footer Information') }}</p>
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
                                                <li><a href="{{ route('admin.footer', ['lang_code' => $language->lang_code] ) }}">
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
                            <form action="{{ route('admin.update-footer') }}" method="POST">
                                @csrf

                                @method('PUT')

                                <input type="hidden" name="lang_code" value="{{ request()->get('lang_code') }}">
                                <input type="hidden" name="translate_id" value="{{ $translate->id }}">

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Footer Information') }}</h4>

                                            <div class="row">


                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.About us') }} </label>
                                                        <textarea class="crancy__item-input crancy__item-textarea" name="about_us" id="" cols="30" rows="5">{{ $translate->about_us }}</textarea>
                                                    </div>
                                                </div>

                                                @if (admin_lang() == request()->get('lang_code'))


                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Phone') }} </label>
                                                        <input class="crancy__item-input" type="text" name="phone" value="{{ $footer->phone }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Email') }} </label>
                                                        <input class="crancy__item-input" type="email" name="email" value="{{ $footer->email }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Address') }} </label>
                                                        <input class="crancy__item-input" type="text" name="address" value="{{ $footer->address }}">
                                                    </div>
                                                </div>



                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Play store link') }} </label>
                                                        <input class="crancy__item-input" type="text" name="playstore" value="{{ $footer->playstore }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.App store link') }} </label>
                                                        <input class="crancy__item-input" type="text" name="appstore" value="{{ $footer->appstore }}">
                                                    </div>
                                                </div>



                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Copyright') }} </label>
                                                        <input class="crancy__item-input" type="text" name="copyright" value="{{ $footer->copyright }}">
                                                    </div>
                                                </div>

                                                @endif


                                            </div>

                                            @if (admin_lang() == request()->get('lang_code'))
                                            <h4 class="crancy-product-card__title mg-top-30">{{ __('translate.Social Media') }}</h4>

                                            <div class="row">

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Facebook') }} </label>
                                                        <input class="crancy__item-input" type="text" name="facebook" value="{{ $footer->facebook }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Twitter') }} </label>
                                                        <input class="crancy__item-input" type="text" name="twitter" value="{{ $footer->twitter }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Linkedin') }} </label>
                                                        <input class="crancy__item-input" type="text" name="linkedin" value="{{ $footer->linkedin }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Instagram') }} </label>
                                                        <input class="crancy__item-input" type="text" name="instagram" value="{{ $footer->instagram }}">
                                                    </div>
                                                </div>

                                            </div>

                                            @endif

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

