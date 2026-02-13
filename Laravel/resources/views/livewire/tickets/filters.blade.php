
<div class="flex flex-wrap items-center align-center gap-3 mb-5 ml-4">
  <div class="relative inline-block ml-4 mb-6 mt-4">
    <button type="button" wire:click="toggleStatusDropdownGlobal"
      class="px-3 py-1 rounded-lg font-medium border items-center gap-1 transition-colors duration-200"
      style="background-color: {{ $statusFilter ? $statuses->firstWhere('id', $statusFilter)->color : '#458cf7'}}20;
      border: 1px solid {{ $statusFilter ? $statuses->firstWhere('id', $statusFilter)->color : '#458cf7'}}99;">
      
        {{ $statusFilter ? ucfirst(str_replace('_', ' ', $statuses->firstWhere('id', $statusFilter)->name)) : 'Status'}}
    </button>

    @if($openStatusDropdownGlobal)
      <div class="absolute z-20 mt-2 w-44 bg-white border rounded-lg shadow-lg overflow-hidden">
        @foreach ($statuses as $status)
          <button 
              wire:click="filterBy({{ $status->id }}, {{ $statusPriority ?? 'null' }})"
              class="block w-full text-left px-4 py-2 text-sm transition duration-150 hover:brightness-110"
              style="background-color: {{ $status->color }}50; color: black;"
          >
              {{ $status->name }}
          </button>
        @endforeach
      </div>
    @endif


  </div>
  
  <div class="relative inline-block mb-6 mt-4">
    <button type="button" wire:click="togglePriorityDropdownGlobal"
      class="px-3 py-1 rounded-lg font-medium border items-center gap-1 transition-colors duration-200"
      style="background-color: {{ $statusPriority ? $priorities->firstWhere('id', $statusPriority)->colorPriority : '#458cf7'}}20;
      border: 1px solid {{ $statusPriority ? $priorities->firstWhere('id', $statusPriority)->colorPriority : '#458cf7'}}99;">
      
        {{ $statusPriority ? ucfirst(str_replace('_', ' ', $priorities->firstWhere('id', $statusPriority)->name)) : 'Priority'}}
    </button>

    @if($openPriorityDropdownGlobal)
      <div class="absolute z-20 mt-2 w-44 bg-white border rounded-lg shadow-lg overflow-hidden transition-all duration-200">
        @foreach ($priorities as $priority)
          <button wire:click="filterBy({{ $statusFilter ?? 'null' }}, {{ $priority->id }})"
              class="block w-full text-left px-4 py-2 text-sm transition duration-150 hover:brightness-110"
              style="background-color: {{ $priority->colorPriority }}50; color: black;">
              {{ $priority->name }}
          </button>
        @endforeach
      </div>
    @endif

  </div>
    <select wire:model.lazy="order" class="bg-gray-100 border border-gray-300 text-sm font-medium px-4.5 py-1 rounded-lg h-[32px] ">
      <option value="asc">ASC</option>
      <option value="desc">DESC</option>
    </select>
    
    <select wire:model.lazy="userId" class="bg-gray-100 border border-gray-300 text-sm font-medium px-4.5 py-1 rounded-lg h-[32px] ">
      <option value = "">All</option>
      @foreach ($users as $user)
        <option value="{{ $user->id }}">{{ $user->name }}</option>
      @endforeach
    </select>

    

    <button wire:click="clearFilters"
            class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-700 transition-colors duration-200">
            CLEAR
    </button>

    <x-text-input
      id="search"
      type="text"
      class="block w-[150px]"
      wire:model.live.debounce.300ms="search"
      placeholder='Search...'
      autocomplete="search"
    />

</div>
