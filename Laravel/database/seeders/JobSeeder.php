<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $offers = [
            [
                'user_id'     => 1,
                'title'       => 'Desarrollador Full Stack',
                'description' => 'Buscamos desarrollador con experiencia en Laravel y Vue.js para proyecto a largo plazo.',
                'salary'      => 2500.00,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'user_id'     => 1,
                'title'       => 'Diseñador UI/UX',
                'description' => 'Se requiere diseñador con experiencia en Figma y sistemas de diseño.',
                'salary'      => 2000.00,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'user_id'     => 2,
                'title'       => 'Desarrollador Backend PHP',
                'description' => 'Posición para desarrollador backend con conocimientos en Laravel y MySQL.',
                'salary'      => 2200.00,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'user_id'     => 2,
                'title'       => 'DevOps Engineer',
                'description' => 'Buscamos ingeniero DevOps con experiencia en Docker, CI/CD y AWS.',
                'salary'      => 3000.00,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'user_id'     => 2,
                'title'       => 'Frontend Developer React',
                'description' => 'Desarrollador frontend con sólidos conocimientos en React y TypeScript.',
                'salary'      => 2300.00,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'user_id'     => 1,
                'title'       => 'QA Engineer',
                'description' => 'Ingeniero de calidad con experiencia en pruebas automatizadas y manuales.',
                'salary'      => 1800.00,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'user_id'     => 1,
                'title'       => 'Data Analyst',
                'description' => 'Analista de datos con experiencia en SQL, Python y visualización de datos.',
                'salary'      => 2400.00,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'user_id'     => 2,
                'title'       => 'Product Manager',
                'description' => 'PM con experiencia en metodologías ágiles y gestión de roadmaps de producto.',
                'salary'      => 3200.00,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'user_id'     => 1,
                'title'       => 'Mobile Developer Flutter',
                'description' => 'Desarrollador mobile con experiencia en Flutter y publicación en App Store y Play Store.',
                'salary'      => 2600.00,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'user_id'     => 1,
                'title'       => 'Scrum Master',
                'description' => 'Scrum Master certificado para liderar equipos ágiles en proyectos de software.',
                'salary'      => 2800.00,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
        ];

        DB::table('job_offers')->insert($offers);
    }
}
