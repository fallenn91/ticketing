<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TicketPriority;

class TicketPrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TicketPriority::firstOrCreate(
          ['name' => 'low'],
          [
            'colorPriority' => '#D3D5DB',
            'is_default' => true,
          ]
        );
        TicketPriority::firstOrCreate(
          ['name' => 'medium'],
          [
            'colorPriority' => '#f3d23c',
            'is_default' => true,
          ]
        );
        TicketPriority::firstOrCreate(
          ['name' => 'high'],
          [
            'colorPriority' => '#ff7b00',
            'is_default' => true,
          ]
        );
        TicketPriority::firstOrCreate(
          ['name' => 'critical'],
          [
            'colorPriority' => '#ff0000',
            'is_default' => true,
          ]
        );
    }
}
