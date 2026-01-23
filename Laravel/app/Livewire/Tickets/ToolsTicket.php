<?php

namespace App\Livewire\Tickets;

use Livewire\Component;
use App\Models\User;
use App\Models\Group;
use Illuminate\Support\Facades\Gate;

class ToolsTicket extends Component
{
  public $users = [];
  public $group_name;
  public $allUsers;
  public $selectedUsers = [];
  public $selectedUser;
  public $allGroups;


  protected $listeners = ['saved'];

    public function mount()
    {
      $this->allUsers = User::all();
      $this->allGroups = Group::all();
    }
    public function render()
    {
        
        return view('livewire.tickets.tools-ticket');
    }
    public function createGroup()
    {
        $this->validate([
          'group_name' => 'required|string|max:50',
          'selectedUsers' => 'required|array',
          'selectedUsers.*' => 'exists:users,id',
        ]);

        $this->authorize('create', Group::class);

        $group = Group::create([
          'name' => $this->group_name,
        ]);
        $group->users()->sync($this->selectedUsers);

        $this->allGroups = Group::all();
        $this->group_name = '';
        $this->selectedUser = null;
        $this->selectedUsers = [];
        $this->dispatch('saved');

    }
    public function addUser()
    {
      if ($this->selectedUser && !in_array($this->selectedUser,  $this->selectedUsers)) {
        $this->selectedUsers[] = $this->selectedUser;
      }
    }
    public function removeUser($userId)
    {
      $this->selectedUsers = array_filter($this->selectedUsers, fn($id) => $id != $userId);
    }
    public function deleteGroup($id)
    {
      $group = Group::findOrFail($id);
      Gate::authorize('delete', $group);
      $group->delete();
      $this->allGroups = Group::all();
      session()->flash('success', 'Group deleted successfully.');
    }
    
    
}

