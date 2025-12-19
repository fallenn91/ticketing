<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Reiniciar secuencias de PostgreSQL para instalación limpia
        if (DB::connection()->getDriverName() === 'pgsql') {
            $this->resetPostgresSequences();
        }

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            TicketSeeder::class,
        ]);
    }

    private function resetPostgresSequences(): void
    {
        $tables = ['users', 'ticket_categories', 'tickets', 'ticket_comments'];

        foreach ($tables as $table) {
            DB::statement("ALTER SEQUENCE {$table}_id_seq RESTART WITH 1");
        }
    }
}
