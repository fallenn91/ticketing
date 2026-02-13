<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Group;
use App\Models\TicketStatus;
use App\Models\TicketPriority;
use App\Models\TicketCategory;
use Illuminate\Support\Str;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = User::all();
        $groups = Group::all();
        $statuses = TicketStatus::all();
        $priorities = TicketPriority::all();
        $categories = TicketCategory::all(); // RRHH, IT, Marketing, Web

        $number = Ticket::max('ticket_number') ?? 0; 

        // Crear 20 tickets de ejemplo
        for ($i = 1; $i <= 20; $i++) {
            $number++;

            $status = $statuses->random();
            $priority = $priorities->random();
            $category = $categories->random();

            // Opcional asignación a usuario o grupo o ambos
            $assignToUser = rand(0,1) ? $users->random()->id : null;
            $assignToGroup = rand(0,1) ? $groups->random()->id : null;

            Ticket::create([
                'ticket_number' => $number,
                'assigned_to_id' => $assignToUser,
                'user_id' => $users->random()->id, // usuario creador
                'title' => 'Ticket de prueba ' . $i,
                'description' => 'Descripción de ejemplo para el ticket ' . $i,
                'priority_id' => $priority->id,
                'status_id' => $status->id,
                'group_id' => $assignToGroup,
                'category_id' => $category->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
