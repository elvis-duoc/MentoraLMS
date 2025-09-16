<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('translate.Calendar') }}</title>

    <link rel="stylesheet" href="{{ asset('global/fullcalendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('global/fullcalendar/fullcalendar.print.css') }}" media='print' >
    <link rel="stylesheet" href="{{ asset('global/fullcalendar/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('global/fullcalendar/custom_calendar.css') }}">


</head>
<body>
    <div id="edc_meeting_cal"></div>



    <script src="{{ asset('global/js/jquery-3.7.1.min.js') }}"></script>

    <script src="{{ asset('global/fullcalendar/moment.min.js') }}"></script>
    <script src="{{ asset('global/fullcalendar/fullcalendar.min.js') }}"></script>

    <script>
        $(function() {
        "use strict"
        $('#edc_meeting_cal').fullCalendar({

            height: 700,
            themeSystem: 'jquery-ui',
            header: {
                left: 'month,agendaWeek,agendaDay,listMonth',
                center: 'title',
                right: 'today, prev,next'
            },
            weekNumbers: true,
            eventLimit: true,
            events: function(start, end, timezone, callback) {
                var events = [
                    @foreach($meetings as $meeting)
                        {
                            title: '{{ $meeting->title }}',
                            start: '{{ $meeting->start_time }}',
                            end: '{{ $meeting->end_time }}',
                            url: '{{ $meeting->meeting_link }}'
                        },
                    @endforeach
                ];

                callback(events);
            },
                eventClick: function(event, jsEvent, view) {

                    if (!confirm(`{{ __('translate.Are you sure want to join?') }}`)) {
                        return false;
                    }

                    if (event.url) {
                        window.open(event.url, '_blank');
                    }
                    return false;

                }

        });

        });
    </script>
</body>
</html>
