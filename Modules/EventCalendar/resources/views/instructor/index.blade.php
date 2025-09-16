@extends('instructor.master_layout')
@section('title')
    <title>{{ __('translate.Meeting History') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Meeting History') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Zoom Meeting') }} >> {{ __('translate.Meeting History') }}</p>
@endsection

@section('body-content')
    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">


            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">

                            <div class="crancy-table crancy-table--v3 mg-top-30">

                                <div class="crancy-customer-filter">
                                    <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch d-flex items-center justify-between create_new_btn_box">
                                        <div class="crancy-header__form crancy-header__form--customer create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Meeting History') }}</h4>

                                        </div>
                                    </div>
                                </div>

                                <!-- crancy Table -->
                                <div id="crancy-table__main_wrapper" class=" dt-bootstrap5 no-footer">

                                    <table class="crancy-table__main crancy-table__main-v3  no-footer" id="dataTable">
                                        <!-- crancy Table Head -->
                                        <thead class="crancy-table__head">
                                            <tr>


                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Serial') }}
                                                </th>


                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Course') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Date & Time') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Duration') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Meeting Id') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Action') }}
                                                </th>

                                            </tr>
                                        </thead>

                                        <!-- crancy Table Body -->
                                        <tbody class="crancy-table__body">
                                            @foreach ($meetings as $index => $meeting)
                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ ++$index }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ html_decode($meeting?->course?->title) }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ date('Y-m-d h:i:A',strtotime($meeting->start_time)) }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                            {{ $meeting->duration }} {{__('translate.Minutes')}}
                                                        </h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                            {{ $meeting->meeting_id }}
                                                        </h4>
                                                    </td>

                                                     <td class="crancy-table__column-2 crancy-table__data-2">

                                                        <a href="javascript:;" class="crancy-btn copy-to-clipboard" data-toggle="tooltip" data-placement="top" title="{{ __('translate.Copy to clipboard') }}"  data-link="{{ $meeting->meeting_link }}">
                                                            <i class="fa fa-clipboard"></i> </a>

                                                        <a href="{{ $meeting->meeting_link }}" target="_blank" class="crancy-btn" data-toggle="tooltip" data-placement="top" title="{{ __('translate.Join Now') }}"><i class="fas fa-video"></i></a>



                                                    </td>





                                                </tr>
                                            @endforeach

                                        </tbody>
                                        <!-- End crancy Table Body -->
                                    </table>
                                </div>
                                <!-- End crancy Table -->
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->

@endsection


@push('js_section')

    <script>
        (function($) {
            "use strict"
            $(document).ready(function () {
                $('.copy-to-clipboard').click(function () {
                var meetingLink = $(this).data('link');
                var tempInput = $('<input>');
                $('body').append(tempInput);
                tempInput.val(meetingLink).select();
                document.execCommand('copy');
                tempInput.remove();

                toastr.success("{{ __('translate.Meeting link copied successfully!') }}");

            });

            });
        })(jQuery);

    </script>
@endpush
