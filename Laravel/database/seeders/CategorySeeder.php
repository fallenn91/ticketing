<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TicketCategory;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TicketCategory::firstOrCreate(['name' => 'RRHH']);
        TicketCategory::firstOrCreate(['name' => 'IT']);
        TicketCategory::firstOrCreate(['name' => 'Web']);
        TicketCategory::firstOrCreate(['name' => 'Marketing']);
    }
}
