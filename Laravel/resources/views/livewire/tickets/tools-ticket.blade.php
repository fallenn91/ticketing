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


<div id="status" class="w-full bg-white overflow-hidden shadow-xl mt-5 sm:rounded-lg px-5 py-2.5">
  <h1 class="text-lg font-bold mb-2">Status</h1>
    <input type="text" 
    id="status" 
    class="mt-1 block"
    wire:model.defer="status" 
    autocomplete="status"/>
  <button type="submit" wire:click="createStatus" class="px-4 py-2 bg-blue-600 text-white rounded-lg mt-5">Create Status</button>
  <div class="bg-black text-white w-full">
    <ul class="text-sm text-semibold">
      <li>STATUS 1</li>
    </ul>
  </div>
</div>



