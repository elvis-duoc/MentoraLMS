<?php

namespace Modules\CertificateBuilder\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'student_name', 'value' => '{{student_name}}'],
            ['key' => 'course_name', 'value' => '{{course_name}}'],
            ['key' => 'description', 'value' => 'This certificate is proudly presented to honor the achievement of completing the course {{course}} offered on the platform {{platform_name}} under the guidance of {{instructor_name}}. The recipient, {{student_name}}, has shown exceptional commitment and skill throughout the course.'],
            ['key' => 'signature', 'value' => 'signature.png'],
            ['key' => 'certificate_bg', 'value' => 'certificate_bg.png'],
            ['key' => 'download_date', 'value' => '{{download_date}}'],

            ['key' => 'student_name_x', 'value' => '10'],
            ['key' => 'course_name_x', 'value' => '20'],
            ['key' => 'description_name_x', 'value' => '30'],
            ['key' => 'signature_x', 'value' => '40'],
            ['key' => 'certificate_bg_x', 'value' => '50'],
            ['key' => 'download_date_x', 'value' => '60'],

            ['key' => 'student_name_y', 'value' => '15'],
            ['key' => 'course_name_y', 'value' => '25'],
            ['key' => 'description_name_y', 'value' => '35'],
            ['key' => 'signature_y', 'value' => '45'],
            ['key' => 'certificate_bg_y', 'value' => '55'],
            ['key' => 'download_date_y', 'value' => '65'],
        ];

        DB::table('certificate_settings')->insert($settings);

    }
}
