<?php

namespace App\Livewire\Tickets;
use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Models\User;
use App\Models\Group;
use App\Models\Ticket;
use App\Models\TicketStatus;
use App\Models\TicketPriority;
use Illuminate\Support\Facades\Gate;

class ToolsTicket extends Component
{
  public $users = [];
  public $group_name;
  public $allUsers;
  public $selectedUsers = [];
  public $selectedUser;
  public $allGroups;
  public $name;
  public $color = '#9ca3af';
  public $statuses;
  public $priorities;
  public $namePriority;
  public $priorityColor;
  public $statusName;
  


    protected $listeners = ['saved'];

    protected function rulesStatus()
    {
      return [
        'name' => 'required|string|max:15|unique:ticket_statuses,name',
        'color' => 'required|regex:/^#([A-Fa-f0-9]{6})$/',
      ];
    }

    protected function rulesPriority()
    {
      return [
        'namePriority' => 'required|string|max:15|unique:ticket_priorities,name',
        'priorityColor' => 'required|regex:/^#([A-Fa-f0-9]{6})$/',
      ];
    }

    protected $messages = [
      'name.unique' => 'Status already in use.',
      'name.string' => 'Max 15 character.',
      'color.required' => 'Color is required.',
      'namePriority.unique' => 'Priority already in use.', 
      'namePriority.string' => 'Max 15 characters.', 
      'priorityColor.required' => 'Color is required.'
    ];


    public function mount()
    {
      $this->allUsers = User::all();
      $this->allGroups = Group::all();
      $this->statuses = TicketStatus::all();
      $this->priorities = TicketPriority::all();
    }
    public function render()
    {
        return view('livewire.tickets.tools-ticket', ['statuses' => TicketStatus::all()]);
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

    public function createStatus()
    {
      $this->validate($this->rulesStatus());

      TicketStatus::create([
        'name' => strtolower($this->name),
        'color' => $this->color,
      ]);

      $this->statuses = TicketStatus::all();

      $this->reset(['name', 'color']);
    }

    public function createPriority()
    {
      $this->validate($this->rulesPriority());

      TicketPriority::create([
        'name' => strtolower($this->namePriority),
        'color' => $this->priorityColor,
      ]);

      $this->priorities = TicketPriority::all();
      $this->reset(['namePriority', 'priorityColor']);
    }

    public function deleteStatus($statusId)
    {
      $status = TicketStatus::findOrFail($statusId);
      if ($status->tickets()->exists()) {
        return redirect()->back()->with('error', 'Cannot delete status with assigned tickets.');
      }
    
      if ($status->is_default) {
        return redirect()->back()->with('default', 'Cannot delete default status.');
      }
      $status->delete();
      
      session()->flash('deleted', 'Status deleted successfully.');
    }

    public function deletePriority($priorityId)
    {
      $priority = TicketPriority::findOrFail($priorityId);

      if ($priority->tickets()->exists()) {
        return redirect()->back()->with('errorPriority', 'Cannot delete priorities with assigned tickets.');
      }

      if ($priority->is_default) {
        return redirect()->back()->with('defaultPriority', 'Cannot delete default priority.');
      }

      $priority->delete();

      session()->flash('deletedPriority', 'Priority deleted successfully.');
    }
    
    
}

