<x-form-section submit="create">
    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4 ">
          <!-- Ticket Title -->
          <x-input-label for="title" value="{{ __('Ticket Title') }}" />

            <x-text-input
                id="title"
                type="text"
                class="mt-1 block w-full"
                wire:model.defer="title"
                autocomplete="title"
            />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
          <!-- Ticket Category -->
          <x-input-label for="category" value="{{ __('Ticket Category') }}" />
                <select wire:model = "category_id" class="mt-1 block w-full">
                    <option value="">-- Select --</option>
                    @foreach ($tickets_category as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
          <!-- Ticket Comment -->
            <x-input-label for="comment" value="{{ __('Comment') }}" />

            <x-text-input
                id="comment"
                type="text"
                class="mt-1 block w-full"
                wire:model.defer="comment"
                autocomplete="comments"
            />
            <x-input-error :messages="$errors->get('comment')" class="mt-2" />
              
                <!-- Ticket Description -->
                <x-input-label for="description" value="{{ __('Description') }}" />
                
                <x-text-area
                id="description"
                type="text"
                class="mt-1 block w-full"
                wire:model.defer="description"
                autocomplete="small description"
                />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
          <!-- Assign User -->
          @can('viewAny', App\Models\Ticket::class)
            <x-input-label for="assigned_to_id" value="{{ __('Assign User') }}" />
            <select wire:model="assigned_to_id" class="mt-1 block w-full">
                <option value = "">-- Assign User --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
          @endcan
            <x-input-label for="group_id" value="{{ __('Assign Group') }}" />
            <select wire:model="group_id" class="mt-1 block w-full">
                <option value = "">-- Select Group --</option>
                @foreach ($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>
        </div>
    </x-slot>

    <x-slot name="actions">
        
      <button wire:click="create"
      class="px-4 py-2 bg-blue-600 text-white rounded"
      >
      Create
      </button>
        
    </x-slot>
</x-form-section>