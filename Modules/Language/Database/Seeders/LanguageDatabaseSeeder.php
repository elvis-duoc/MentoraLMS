<?php

namespace Modules\Language\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Language\App\Models\Language;

class LanguageDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if languages already exist to avoid duplicates
        if (Language::count() == 0) {
            DB::table('languages')->insert([
                [
                    'lang_name' => 'English',
                    'lang_code' => 'en',
                    'lang_direction' => 'ltr',
                    'is_default' => 'Yes',
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'lang_name' => 'Español',
                    'lang_code' => 'es',
                    'lang_direction' => 'ltr',
                    'is_default' => 'No',
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]);
        }
    }
}
