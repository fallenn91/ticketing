<?php

namespace App\Livewire\Diabolo\Assets;

use Livewire\Component;

class RecentActivities extends Component
{
    public $activities = [];

    public function mount()
    {
        // Datos de ejemplo; luego puedes traerlos de BD
        $this->activities = [
            ['user' => 'Ana Pérez', 'action' => 'subió un portfolio nuevo', 'time' => 'Hace 2 horas', 'icon' => 'fas fa-image'],
            ['user' => 'Luis Gómez', 'action' => 'comentó en Marketplace', 'time' => 'Hace 3 horas', 'icon' => 'fas fa-comment'],
            ['user' => 'Marta Ruiz', 'action' => 'publicó una oferta de trabajo', 'time' => 'Ayer', 'icon' => 'fas fa-briefcase'],
        ];
    }
    
    public function render()
    {
        return view('livewire.diabolo.assets.recent-activities');
    }
}
