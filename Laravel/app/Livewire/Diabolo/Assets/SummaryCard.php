<?php

namespace App\Livewire\Diabolo\Assets;

use Livewire\Component;
use App\Models\User;

class SummaryCard extends Component
{
    public $title;
    public $count;
    public $icon;

    public function mount($title)
    {
      // Pasar valores cuando se instancia el componente
      if ($title === 'Usuarios') {
        $this->count = User::count();
        $this->icon = 'fas fa-users';
      }
    }

    public function render()
    {
        return view('livewire.diabolo.assets.summary-card');
    }
}
