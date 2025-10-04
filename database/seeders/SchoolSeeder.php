<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\School;
use Illuminate\Support\Str;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        $schools = [
            [
                'name' => 'Instituto Tecnológico de Monterrey',
                'slug' => 'instituto-tecnologico-de-monterrey',
                'primary_color' => '#003366',
                'secondary_color' => '#FF6B35',
                'status' => 'active'
            ],
            [
                'name' => 'Universidad Nacional Autónoma de México',
                'slug' => 'universidad-nacional-autonoma-de-mexico',
                'primary_color' => '#1E3A8A',
                'secondary_color' => '#F59E0B',
                'status' => 'active'
            ],
            [
                'name' => 'Colegio San Patricio',
                'slug' => 'colegio-san-patricio',
                'primary_color' => '#059669',
                'secondary_color' => '#10B981',
                'status' => 'active'
            ],
            [
                'name' => 'Escuela Preparatoria Federal',
                'slug' => 'escuela-preparatoria-federal',
                'primary_color' => '#7C3AED',
                'secondary_color' => '#A78BFA',
                'status' => 'active'
            ],
            [
                'name' => 'Centro de Estudios Superiores',
                'slug' => 'centro-de-estudios-superiores',
                'primary_color' => '#DC2626',
                'secondary_color' => '#F87171',
                'status' => 'inactive'
            ]
        ];

        foreach ($schools as $schoolData) {
            School::create($schoolData);
        }
    }
}