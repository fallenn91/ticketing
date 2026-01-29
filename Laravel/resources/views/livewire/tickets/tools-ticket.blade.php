<div>
<x-form-section submit="createGroup" id="groups">
    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4 ">

          <x-input-label for="group_name" value="{{ __('Group Name') }}" />

            <x-text-input
                id="group_name"
                type="text"
                class="mt-1 block w-full"
                wire:model.defer="group_name"
                autocomplete="name"
            />
          <x-input-label for="users" value="{{ __('Create New Group') }}" />
                <select wire:model = "selectedUser" class="mt-1 block w-full border rounded">
                  <option value="">-- Select Users --</option>
                    @foreach ($allUsers as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
          
                
                    
                  <button wire:click="addUser" type="button"
                  class="mt-3 px-5 py-2 bg-blue-600 text-white rounded"
                  >
                  Add User
                  </button>
                    
                
                <ul class="mt-3">
                  @foreach($selectedUsers as $userId)
                  @php $user = $allUsers->find($userId); @endphp
                  <li class="flex justify-between items-center mt-1">
                    {{ $user->name }}
                    <button wire:click="removeUser({{ $userId }})" class="px-2 py-1 bg-red-500 text-white rounded text-sm"> 
                      Remove User
                    </button>
                  </li>
                  @endforeach
                </ul>
        </div>
        <x-slot name="actions">
            
          <button wire:click="createGroup"
          class="px-4 py-2 bg-blue-600 text-white rounded"
          >
          Create Group
          </button>

          
        </x-slot>
    </x-slot>

</x-form-section>
<table class="table-auto w-full bg-white overflow-hidden shadow-xl mt-5 sm:rounded-lg">
  <thead>
    <tr>
      <th class="px-4 py-2">Groups</th>
      <th class="px-4 py-2">Users</th>
      <th class="px-4 py-2">Created At</th>
    </tr>

  </thead>
  <tbody>
    @if (session('success'))
    <p class="mt-3 text-red-600">{{ session('success')}} </p>
    
    @endif
    @foreach ($allGroups as $group)
      <tr>
        <td  class="border px-4 py-2">{{ $group->name }}</td>
        <td  class="border px-4 py-2">
          @foreach($group->users as $user)
            <span class="block">{{ $user->name }}</span>
          @endforeach
        </td>
        <td  class="border px-4 py-2">
          {{ $group->created_at }}

            
          <button type="button" wire:click="deleteGroup({{ $group->id }})"
            class="inline-block px-4 py-2 bg-red-600 text-white rounded ml-4"
            >
            Delete Group
          </button>
            

        </td>
      </tr>
    @endforeach
  </tbody>
</table>

<!----------------- STATUS ----------------->

<div id="status" class="w-full bg-white overflow-hidden shadow-xl mt-5 sm:rounded-lg px-5 py-2.5 ">
  <h1 class="text-lg font-bold mb-2">Ticket Status</h1>
  <div class="w-full flex items-center align-center gap-4 py-2">

    <input type="text" 
    id="statusName" 
    class="mt-1 block"
    wire:model.defer="name" 
    autocomplete="off"/>
  @error('name')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
  @enderror
    <input type="color"
      wire:model="color"
      class="w-100 h-10 rounded-lg cursor-pointer"
    />
  </div>
  <button type="submit" wire:click="createStatus" class="px-4 py-2 bg-blue-600 text-white rounded-lg mt-5">Create Status</button>
  
  <div class="w-full py-5 px-2.5 border mt-5">
    <ul class="space-y-2">
     @foreach($statuses as $item)
      <li class="mt-5">
        <span class="px-2.5 py-3 rounded-full text-sm font-semibold"
              style="background-color: {{ $item->color }}30; color: black; 
              border: 1px solid {{ $item->color}}99;">{{ $item->name }}
        </span>
        <button type="button" wire:click="deleteStatus({{ $item->id }})"
              class="inline-block px-2 py-1 text-sm bg-red-600 text-white rounded ml-4"
              >
              Delete Status
        </button>
      </li>
      
     @endforeach
    </ul>
  </div>

  <!-------------- PRIORITY -------------->

<div id="priority" class="w-full bg-white overflow-hidden shadow-xl mt-5 sm:rounded-lg px-5 py-2.5 ">
  <h1 class="text-lg font-bold mb-2">Ticket Priority</h1>
  <div class="w-full flex items-center align-center gap-4 py-2">

    <input type="text" 
    id="priorityName" 
    class="mt-1 block"
    wire:model.defer="namePriority" 
    autocomplete="off"/>
  @error('namePriority')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
  @enderror
    <input type="color"
      wire:model="priorityColor"
      class="w-100 h-10 rounded-lg cursor-pointer"
    />
  </div>
  <button type="submit" wire:click="createPriority" class="px-4 py-2 bg-blue-600 text-white rounded-lg mt-5">Create Priority</button>
  
  <div class="w-full py-5 px-2.5 border mt-5">
    <ul class="space-y-2">
     @foreach($priorities as $priority)
      <li class="mt-5">
        <span class="px-2.5 py-3 rounded-full text-sm font-semibold"
              style="background-color: {{ $priority->color }}30; color: black; 
              border: 1px solid {{ $priority->color}}99;">{{ $priority->name }}
        </span>
        <button type="button" wire:click="deletePriority({{ $priority->id }})"
              class="inline-block px-2 py-1 text-sm bg-red-600 text-white rounded ml-4"
              >
              Delete Priority
        </button>
      </li>
      
     @endforeach
    </ul>
  </div>
  
    @if(session('deleted'))
      <p class="mt-3 text-red-600">{{ session('deleted')}} </p>
    @endif
    @if(session('error'))
      <p class="mt-3 text-red-600">{{ session('error')}} </p>
    @endif
    @if(session('default'))
      <p class="mt-3 text-red-600">{{ session('default')}} </p>
    @endif
    @if(session('deletedPriority'))
      <p class="mt-3 text-red-600">{{ session('deletedPriority')}} </p>
    @endif
    @if(session('errorPriority'))
      <p class="mt-3 text-red-600">{{ session('errorPriority')}} </p>
    @endif
    @if(session('defaultPriority'))
      <p class="mt-3 text-red-600">{{ session('defaultPriority')}} </p>
    @endif
    
    
  
</div>



