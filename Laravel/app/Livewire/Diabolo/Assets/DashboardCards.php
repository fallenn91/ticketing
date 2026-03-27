<?php

namespace App\Livewire\Diabolo\Assets;

use Livewire\Component;

class DashboardCards extends Component
{
    public $usuarios = 20;
    public $portfolios = 35;
    public $transacciones = 12;
    public $ofertas = 8;
    
    public function render()
    {
        return view('livewire.diabolo.assets.dashboard-cards');
    }
}
