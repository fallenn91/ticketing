<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $posts = [
            [
                'user_id'     => 1,
                'image'       => 'posts/post-01.jpg',
                'title'       => 'Introducción a Laravel 11',
                'subtitle'    => 'Todo lo que necesitas saber para empezar',
                'description' => 'Laravel 11 trae consigo una serie de mejoras y nuevas funcionalidades que facilitan el desarrollo de aplicaciones web modernas.',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'user_id'     => 1,
                'image'       => 'posts/post-02.jpg',
                'title'       => 'Tailwind CSS: el futuro del diseño web',
                'subtitle'    => 'Cómo construir interfaces rápidas y elegantes',
                'description' => 'Tailwind CSS permite crear diseños personalizados sin salir del HTML, eliminando la necesidad de escribir CSS desde cero.',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'user_id'     => 2,
                'image'       => 'posts/post-03.jpg',
                'title'       => 'API REST con Laravel Sanctum',
                'subtitle'    => 'Autenticación segura para tus aplicaciones',
                'description' => 'Aprende a proteger tus endpoints con Laravel Sanctum y cómo gestionar tokens de acceso de forma eficiente.',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'user_id'     => 2,
                'image'       => null,
                'title'       => 'Patrones de diseño en PHP',
                'subtitle'    => 'Escribe código más limpio y mantenible',
                'description' => 'Los patrones de diseño son soluciones reutilizables a problemas comunes. En este post exploramos los más usados en proyectos PHP.',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'user_id'     => 1,
                'image'       => 'posts/post-05.jpg',
                'title'       => 'Vue 3 y la Composition API',
                'subtitle'    => 'Una nueva forma de organizar tu lógica',
                'description' => 'La Composition API de Vue 3 ofrece una manera más flexible y poderosa de reutilizar lógica entre componentes.',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'user_id'     => 2,
                'image'       => 'posts/post-06.jpg',
                'title'       => 'Docker para desarrolladores',
                'subtitle'    => 'Contenedores desde cero hasta producción',
                'description' => 'Docker simplifica la configuración de entornos de desarrollo y garantiza que tu aplicación funcione igual en cualquier máquina.',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'user_id'     => 2,
                'image'       => null,
                'title'       => 'Optimización de consultas en MySQL',
                'subtitle'    => 'Acelera tu base de datos con estos consejos',
                'description' => 'Aprende a usar índices, EXPLAIN y otras técnicas para mejorar el rendimiento de tus consultas SQL en proyectos Laravel.',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'user_id'     => 1,
                'image'       => 'posts/post-08.jpg',
                'title'       => 'Testing en Laravel con PHPUnit',
                'subtitle'    => 'Garantiza la calidad de tu código',
                'description' => 'Las pruebas automatizadas son esenciales en cualquier proyecto serio. Aprende a escribir tests unitarios y de integración en Laravel.',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'user_id'     => 2,
                'image'       => 'posts/post-09.jpg',
                'title'       => 'Introducción a Inertia.js',
                'subtitle'    => 'El puente entre Laravel y Vue/React',
                'description' => 'Inertia.js permite construir SPAs modernas usando Laravel como backend sin necesidad de una API separada.',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'user_id'     => 1,
                'image'       => 'posts/post-10.jpg',
                'title'       => 'Despliegue en producción con Forge',
                'subtitle'    => 'De local a producción en minutos',
                'description' => 'Laravel Forge automatiza la configuración de servidores y el despliegue de aplicaciones Laravel de forma segura y sencilla.',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
        ];

        DB::table('posts')->insert($posts);
    }
}
