@extends('instructor.master_layout')
@section('title')
    <title>{{ __('translate.Calendar') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Calendar') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Zoom Meeting') }} >> {{ __('translate.Calendar') }}</p>
@endsection

@section('body-content')
    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show mg-top-30">
        <div class="container container__bscreen">


            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner edc-calendar-wrapper">
                            <!-- <div id="calendar"></div> -->

                            <iframe class="edc-calendar-frame" src="{{ route('instructor.event-calendar-iframe') }}" frameborder="0"></iframe>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->

@endsection

