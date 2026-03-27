<?php

namespace App\Livewire\Diabolo\Assets;

use Livewire\Component;

class HomeDashboard extends Component
{
    public $usuarios = 20;
    public $portfolios = 45;
    public $oferas = 7;
    public $transacciones = 12;

    public $activities = [
        ['mensaje' => 'Nuevo usuario registrado: Juan Pérez', 'hora' => 'Hace 1 hora'],
        ['mensaje' => 'Portfolio subido: Acrobacias en la cuerda', 'hora' => 'Hace 2 horas'],
        ['mensaje' => 'Nueva oferta de trabajo: Festival Circo Madrid', 'hora' => 'Hace 3 horas'],
    ];
    
    public function render()
    {
        return view('livewire.diabolo.assets.home-dashboard');
    }
}
