<?php

namespace App\Livewire\Traits;

trait DropdownTrait
{
    public $openStatusDropdownGlobal = false;
    public $openPriorityDropdownGlobal = false;

    public $openStatusDropdowns = [];
    public $openPriorityDropdowns = [];

    public function toggleStatusDropdownGlobal()
    {
        $this->openStatusDropdownGlobal = !$this->openStatusDropdownGlobal;
    }
    public function togglePriorityDropdownGlobal()
    {
        $this->openPriorityDropdownGlobal = !$this->openPriorityDropdownGlobal;
    }
    public function toggleStatusDropdown($ticketId)
    {
        $this->openStatusDropdowns[$ticketId] = ($this->openStatusDropdowns[$ticketId] ?? null) ? null : $ticketId;
    }
    public function togglePriorityDropdown($ticketId)
    {
        $this->openPriorityDropdowns[$ticketId] = ($this->openPriorityDropdowns[$ticketId] ?? null) ? null : $ticketId;
    }

    public function closeStatusDropdowns($ticketId)
    {
      $this->openStatusDropdowns[$ticketId] = null;
    }

    public function closePriorityDropdowns($ticketId)
    {
      $this->openPriorityDropdowns[$ticketId] = null;
    }

}
