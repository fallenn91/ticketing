<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\TicketStatus;

class TicketStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TicketStatus::firstOrCreate(
          ['name' => 'open'],
          [
            'color' => '#D3D5DB',
            'is_default' => true,
          ]
        );
        TicketStatus::firstOrCreate(
          ['name' => 'in_process'],
          [
            'color' => '#82A1FA',
            'is_default' => true,
          ]
        );
        TicketStatus::firstOrCreate(
          ['name' => 'resolved'],
          [
            'color' => '#8DE364',
            'is_default' => true,
          ]
        );
        TicketStatus::firstOrCreate(
          ['name' => 'closed'],
          [
            'color' => '#CC3D3D',
            'is_default' => true,
          ]
        );
    }
}
