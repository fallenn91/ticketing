<div>
<x-form-section submit="createGroup">
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
                    <button wire:click="removeUser({{ $userId }})" class="px-2 py-1 bg-red-500 text-white rounded text-xs"> 
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
        @if(session()->has('message'))
          <p class="mt-3 text-green-600">{{ session('message')}} </p>
        @endif
    </x-slot>

</x-form-section>
<x-form-section submit="createGroup" class="mt-5">
    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4 ">

          <x-input-label for="groups" value="{{ __('Groups') }}" />

          @foreach($allGroups as $group)
            <p><strong>{{ $group->name }}</strong></p>
          @endforeach
          
         
        </div>
        
    </x-slot>

</x-form-section>
</div>


