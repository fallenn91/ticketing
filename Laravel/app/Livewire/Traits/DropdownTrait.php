<?php

namespace App\Livewire\Traits;

trait DropdownTrait
{
    public $openStatusDropdown1 = null;
    public $openPriorityDropdown1 = null;
    public $openStatusDropdown = null;
    public $openPriorityDropdown = null;

    public function toggleStatusDropdown1($ticketId)
    {
        $this->openStatusDropdown1 = $this->openStatusDropdown1 === $ticketId ? null : $ticketId;
    }
    public function togglePriorityDropdown1($ticketId)
    {
        $this->openPriorityDropdown1 = $this->openPriorityDropdown1 === $ticketId ? null : $ticketId;
    }
    public function toggleStatusDropdown($ticketId)
    {
        $this->openStatusDropdown = $this->openStatusDropdown === $ticketId ? null : $ticketId;
    }
    public function togglePriorityDropdown($ticketId)
    {
        $this->openPriorityDropdown = $this->openPriorityDropdown === $ticketId ? null : $ticketId;
    }

}
