<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $groups = [
          ['name' => 'Group A'],
          ['name' => 'Group B'],
          ['name' => 'Group C'],
        ];

        foreach ($groups as $group) {
          Group::firstOrCreate(
            ['name' => $group['name']]
          );
        }
    }
}
