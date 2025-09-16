<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('translate.Certificate') }}</title>
    <link rel="shortcut icon" href="{{ asset($general_setting->favicon) }}" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .certificate-body {
            width: 930px;
            height: 600px;
            background-image: url('{{ asset($certificate_setting->certificate_bg) }}');
            background-size: cover;
            background-position: center;
            position: relative;
            margin: 0 auto;
        }

        .draggable {
            position: absolute;
            cursor: default;
        }

        #student_name {
            font-size: 40px;
            left: {{ $certificate_setting->student_name_x }}px;
            top: {{ $certificate_setting->student_name_y }}px;
        }

        #course_name {
            font-size: 20px;
            left: {{ $certificate_setting->course_name_x }}px;
            top: {{ $certificate_setting->course_name_y }}px;
        }

        #signature {
            left: {{ $certificate_setting->signature_x }}px;
            top: {{ $certificate_setting->signature_y }}px;
        }

        #download_date {
            left: {{ $certificate_setting->download_date_x }}px;
            top: {{ $certificate_setting->download_date_y }}px;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

    <div class="certificate-body">
        @if ($certificate_setting->student_name)
            <div class="draggable" id="student_name"><i>{{ $certificate_setting->student_name }}</i></div>
        @endif
        @if ($certificate_setting->course_name)
            <div class="draggable course_name" id="course_name">{{ $certificate_setting->course_name }}</div>
        @endif
        @if ($certificate_setting->download_date)
            <div class="draggable" id="download_date">{{ $certificate_setting->download_date }}</div>
        @endif
        @if ($certificate_setting->signature)
            <div class="draggable" id="signature">
                <img src="{{ asset($certificate_setting->signature) }}" alt="Signature">
            </div>
        @endif
    </div>

</body>
</html>
